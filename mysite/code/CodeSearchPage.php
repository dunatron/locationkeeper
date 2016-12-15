<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/12/16
 * Time: 3:01 PM
 */class CodeSearchPage extends Page
{

    private static $singular_name        = "CodeSearchPage";
    private static $plural_name          = "CodeSearchPages";
    private static $db = array();
    
    static $defaults = array (
	    'ShowInMenus' => false,
	    'ShowInSearch' => false
    );
    
    private static $has_one = array();

    private static $has_many = array();

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
        
        return $fields;
    }
    
}
class CodeSearchPage_Controller extends Page_Controller
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
    private static $allowed_actions = array();

    public function init()
    {
        parent::init();
    }

    public function index(SS_HTTPRequest $request)
    {
        $codes = Code::get()->limit(20);

        // If Title has value
        if($search = $request->getVar('Title')){
            $codes = $codes->filter(array(
                'Title:PartialMatch'    =>  $search,
            ));
        }
        // If Desc has value
        if($desc = $request->getVar('Desc')){
            $codes = $codes->filter(
                'SearchFields:fulltext', $desc
            );
        }

        return array(
            'Results'   =>  $codes
        );
    }

    public function CodeSearchForm()
    {
        $title  =   TextField::create('Title')
            ->setAttribute('placeholder', 'Search for code');
        $desc   =   TextField::create('Desc')
            ->setAttribute('placeholder', 'Search Desc');

        $form = Form::create(
            $this,
            'CodeSearchForm',
            FieldList::create(
                $title,
                $desc
            ),
            FieldList::create(
                FormAction::create('doCodeSearch', 'Search')
            )
        );

        $form->setFormMethod('GET')
            ->setFormAction($this->Link())
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        return $form;
    }
}


