<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/16
 * Time: 3:58 PM
 */
class CMSAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array('CMSType');

    /**
     * @var string
     */
    private static $url_segment = "CMS's";

    /**
     * @var string
     */
    private static $menu_title = "CMS's";
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
                'CMSName'  => 'CMSName',
                'About' => 'About'
            ));

        return $form;
    }
}