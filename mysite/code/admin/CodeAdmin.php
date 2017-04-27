<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27/04/17
 * Time: 9:49 AM
 */
class CodeAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array('Code');

    /**
     * @var string
     */
    private static $url_segment = 'codes';

    /**
     * @var string
     */
    private static $menu_title = 'Code';

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
                'Desc' => 'Desc'
            ));

        return $form;
    }
}