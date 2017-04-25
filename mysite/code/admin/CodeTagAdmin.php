<?php
/**
 * Created by PhpStorm.
 * User: Heath
 * Date: 25/04/17
 * Time: 12:57 PM
 */
class CodeTagAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array('CodeTag');

    /**
     * @var string
     */
    private static $url_segment = 'code-tags';

    /**
     * @var string
     */
    private static $menu_title = 'Code Tags';

    /**
     * @param null $id
     * @param null $fields
     * @return \Form
     */
    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        $gridField = $form->Fields()
            ->fieldByName($this->sanitiseClassName($this->modelClass));

        $config = $gridField->getConfig();

        $config->getComponentByType('GridFieldPaginator')->setItemsPerPage(20);
        $config->getComponentByType('GridFieldDataColumns')
            ->setDisplayFields(array(
                'Title'  => 'Title',
            ));

        return $form;
    }
}