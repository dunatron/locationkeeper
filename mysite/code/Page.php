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
        'UploadCodeForm',
        'doCreateCode',
        'EditCodeForm',
        'doCodeEdit'
    );

    public function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
        Requirements::css($this->ThemeDir() . "/public/css/app.css");
        Requirements::css($this->ThemeDir() . "/public/css/codehighlight/prism.css");
        Requirements::set_force_js_to_bottom(true);
        Requirements::javascript('http://code.jquery.com/jquery-2.1.4.min.js');
        Requirements::javascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
        Requirements::javascript($this->ThemeDir() . "/js/codehighlight/prism.js");
        Requirements::javascript($this->ThemeDir() . "/js/codehighlight/add-code-form.js");
        Requirements::javascript($this->ThemeDir() . "/js/search/code-search.js");
        Requirements::javascript($this->ThemeDir() . "/js/code/edit-code-form.js");

    }

    public function CodeSearchForm()
    {
        $searchField = TextField::create('keyword', 'Keyword search')->setAttribute('placeholder', 'Key-word search...');

        $fields = FieldList::create(
            $searchField
        );

        $actions = FieldList::create(
            FormAction::create('searchCode', 'Search')->addExtraClass('code-search-btn')
        );

        $form = Form::create($this, 'CodeSearchForm', $fields, $actions)->addExtraClass('code-search-form');

        return $form;
    }

    public function searchCode($data, $form = '')
    {
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

        $searchData = ArrayData::create(array(
            'Results' => $ResultsList,
            'KeyWord' => $Search,
        ));

        return $this->owner->customise($searchData)->renderWith('Search_Results');
    }

    public function UploadCodeForm()
    {

        $Title = TextField::create('Title', 'Title of Code Piece')->addExtraClass('required-field');

        $Description = HtmlEditorField::create('Desc', 'Description')->addExtraClass('required-field');

        $Tags = StringTagField::create('Tags', 'Tags field',
            CodeTag::get()->map('ID', 'Title')->toArray());

        

        $fields = FieldList::create(
            $Title, $Description, $Tags
        );

        $actions = FieldList::create(
            FormAction::create('doCreateCode', 'Submit')->addExtraClass('FormClass')
                ->setUseButtonTag(true)->addExtraClass('button')
        );

        $required = new RequiredFields(array(
            'Title'
        ));

        $form = Form::create($this, 'UploadCodeForm', $fields, $actions, $required);

        //return $form;
        $data = Session::get("FormData.{$form->getName()}.data");
        return $data ? $form->loadDataFrom($data) : $form;
    }

    public function doCreateCode()
    {

        $Title = '';
        $Html = '';
        $Tags = '';
        if (isset($_POST['Title'])) {
            $Title = $_POST['Title'];
        }

        if (isset($_POST['Html'])) {
            $Html = $_POST['Html'];
        }

        if (isset($_POST['Tags'])) {
            $Tags = $_POST['Tags'];
        }

        $code = Code::create();

        $code->Title = $Title;
        $code->Desc = $Html;
        $code->Tags = $Tags;

        $code->write();

        $messageResponse = 'thankyou for the <span class="message-code-title">'.$Title.'</span> code submission';

        //return $this->redirectBack();
        return '<p id="MessageCodeAddSuccess" class="message good" style="display: block">'.$messageResponse.'</p>';
    }

    /**
     * All CodeTags
     */
    public function getCodeTags()
    {
        $Tags = CodeTag::get();
        return $Tags;
    }

    /**
     * SVG Icons
     */
    public function getEditSVGIcon()
    {
        $theme = $this->ThemeDir();
        return file_get_contents('../' . $theme . '/images/svg/edit.svg');
    }
    public function getKeySVGIcon()
    {
        $theme = $this->ThemeDir();
        return file_get_contents('../' . $theme . '/images/svg/key.svg');
    }
    public function getCrossSVGIcon()
    {
        $theme = $this->ThemeDir();
        return file_get_contents('../' . $theme . '/images/svg/cross.svg');
    }


}
