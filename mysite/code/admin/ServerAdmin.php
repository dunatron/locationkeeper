<?php

/**
 * Class AgencyAdmin
 * The admin class for managing agencies data (edit/add/delete)
 */
class ServerAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array('Server');

    /**
     * @var string
     */
    private static $url_segment = 'servers';

    /**
     * @var string
     */
    private static $menu_title = 'Servers';

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
                'ServerName'  => 'ServerName',
                'ServerAddress' => 'ServerAddress',
                'DevSSHUser' => 'DevSSHUser',
                'DevSSHPass' => 'DevSSHPass'
            ));
//        $config->getComponentByType('GridFieldDataColumns')
//            ->setFieldFormatting(array(
//                'Logo' => function ($val, $obj) {
//                    if (method_exists($obj, 'getThumbnail')) {
//                        return $obj->getThumbnail();
//                    } else {
//                        return $obj;
//                    }
//                },
//            ));

        return $form;
    }
}