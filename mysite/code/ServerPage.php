<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 21/04/16
 * Time: 4:43 PM
 */
class ServerPage extends Page {

    private static $can_be_root = true;

    private static $db = array(

    );

    private static $has_many = array(
        'Servers' => 'Server',
    );


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Servers', GridField::create(
            'Servers',
            'Company servers',
            $this->Servers(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }

}

class ServerPage_Controller extends Page_Controller {

}