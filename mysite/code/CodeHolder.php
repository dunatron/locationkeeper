<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/12/16
 * Time: 2:34 PM
 */
class CodeHolder extends Page
{

    private static $singular_name        = "Code Holder";
    private static $plural_name          = "Code Holders";
    private static $db = array();
    
    static $defaults = array (
	    'ShowInMenus' => false,
	    'ShowInSearch' => false
    );
    
    private static $has_one = array();

    private static $has_many = array(
        'CodeObjects'  =>  'Code'
    );

    private static $many_many = array();

    private static $belongs_many_many = array();

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $default_child = "";

    private static $can_be_root = true;

    private static $hide_ancestor = null;
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Code', GridField::create(
            'CodeObjects',
            'Code under this holder',
            $this->CodeObjects(),
            GridFieldConfig_RecordEditor::create()
        ));
        
        return $fields;
    }
    
}
class CodeHolder_Controller extends Page_Controller
{

    /**
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if >checkAction() returns true
     * );
     * @var array
     */
    private static $allowed_actions = array(
        'EditCodeForm',
        'doCodeEdit',
        'updateCode'
    );

    public function init()
    {
        parent::init();
    }

    public function EditCodeForm()
    {
        $TitleField = TextField::create('Title', 'Code Title');
        $DescField  = HtmlEditorField::create('Desc', 'Description');
        $Tags = StringTagField::create('Tags', 'Tags field',
            CodeTag::get()->map('ID', 'Title')->toArray());

        $fields = FieldList::create(
            $TitleField, $DescField, $Tags
        );

        $actions = FieldList::create(
            FormAction::create('doCodeEdit', 'Save')->addExtraClass('code-save-btn')->setUseButtonTag(true)->addExtraClass('button')
        );

        $form = Form::create($this, 'EditCodeForm', $fields, $actions);

        return $form;
    }

    public function doCodeEdit($data, $form = '')
    {
        $CodeID = NULL;
        if (isset($data['CodeID'])) {
            $CodeID = $data['CodeID'];
        }
        $code = Code::get()->byID($CodeID);
        $formData = new stdClass();
        $formData->Title = $code->Title;
        $formData->Desc = $code->Desc;
        $formData->Tags = $code->Tags;
        $encodeCode = json_encode($formData);
        return $encodeCode;
    }

    public function updateCode($data, $form = '')
    {
        $CodeID = NULL; $Title = ''; $Html = ''; $Tags = '';
        if (isset($data['CodeID'])) {
            $CodeID = $data['CodeID'];
        }
        if (isset($data['Title'])) {
            $Title = $data['Title'];
        }
        if (isset($data['Html'])) {
            $Html = $data['Html'];
        }
        if (isset($data['Tags'])) {
            $Tags = implode(',', $data['Tags']);
        }

        $code = Code::get()->byID($CodeID);

        $code->Title = $Title;
        $code->Desc = $Html;
        $code->Tags = $Tags;

        $code->write();

        return $code->Title .' Has been updated';
    }


}


