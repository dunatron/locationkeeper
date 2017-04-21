<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController
{

    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array(
        'CodeSearchForm',
        'searchCode',
        'goSearch'
    );

    public function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
        Requirements::set_force_js_to_bottom(true);
        Requirements::javascript('http://code.jquery.com/jquery-2.1.4.min.js');
        Requirements::javascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
        Requirements::javascript($this->ThemeDir() . "/js/search/code-search.js");

    }

    public function CodeSearchForm()
    {
        $searchField = TextField::create('keyword', 'Keyword search')->setAttribute('placeholder', 'Key-word search...');

        $fields = FieldList::create(
            $searchField
        );

        $actions = FieldList::create(
            FormAction::create('goSearch', 'Search')->addExtraClass('code-search-btn')
        );

        $form = Form::create($this, 'CodeSearchForm', $fields, $actions)->addExtraClass('code-search-form');
        $form->disableSecurityToken();
        $form->setFormMethod('GET', true);
        $form->setTemplate('CodeSearchForm');
        $form->addExtraClass('searchForm');

        return $form;
    }

    public function goSearch($data, $form, SS_HTTPRequest $request)
    {
        //https://github.com/silverstripe/silverstripe-fulltextsearch/blob/master/docs/en/Solr.md
        $Search = '';
        //$data['Keyword']

        if (isset($data['Keyword'])) {
            $Search = $data['Keyword'];
        }

        $index = new LocationKeeperSolrIndex();
        $query = new SearchQuery();
        //$query->inClass('Code');

        $query->search($Search);

        $params = array(
            'hl' => 'true'
        );
        $results = $index->search($query, -1, 20, $params); // third param is the amount of results in one go -1 not working. I think 9000 is a good base ;) ;) ;)

        $results->spellcheck;

        $ResultsList = ArrayList::create();
        $resultsIDArr = array();
        foreach ($results->Matches as $r) {
            {
                $ResultsList->add($r);
                array_push($resultsIDArr, $r->ID);
            }
        }

        error_log(var_export($Search, true));
        error_log(var_export($ResultsList, true));

        if(empty($ResultsList))
        {
            $IsEmpty = 'It is empty';
        }
        else
        {
            $IsEmpty = 'NOT EMPTY horray';
        }

        $searchData = ArrayData::create(array(
            'Results' => $ResultsList,
            'KeyWord' => $Search,
            'IsEmpty' => $IsEmpty
        ));

        return $this->owner->customise($searchData)->renderWith('Search_Test');
    }

}
