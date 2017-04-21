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
    private static $allowed_actions = array();

    public function init()
    {
        parent::init();
    }

    public function index(SS_HTTPRequest $request) {

        if($request->isAjax()) {
            //https://github.com/silverstripe/silverstripe-fulltextsearch/blob/master/docs/en/Solr.md
            $Search = '';
            //$data['Keyword']

            if (isset($data['Keyword'])) {
                $Search = $data['Keyword'];
            }

            $index = new LocationKeeperSolrIndex();
            $query = new SearchQuery();
            $query->inClass('Code');

            $query->search($Search);

            $params = array(
                'hl'    =>  'true'
            );
            $results = $index->search($query,-1,20, $params);

            $results->spellcheck;

            $ResultsList = ArrayList::create();

            foreach ($results->Matches as $r) {
                {
                    $ResultsList->add($r);

                }
            }

            error_log(var_export($Search, true));
            error_log(var_export($ResultsList, true));


            $searchData = ArrayData::create(array(
                'Results' => $ResultsList,
                'KeyWord' => $Search,
            ));

            return $this->owner->customise($searchData)->renderWith('Search_Results');
        }

        return $this;


    }
}


