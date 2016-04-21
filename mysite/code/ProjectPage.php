<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 10:40 AM
 */

class ProjectPage extends Page {

    private static $can_be_root = false;

    private static $db = array(
        'ProjectName' => 'Text',
        'Client' => 'Text'

    );

    private static $has_many = array(
        'DevEnvironments' => 'Dev',
        'UatEnvironments' => 'Uat',
        'LiveEnvironments' => 'Live',
        'Extras' => 'Extra',
        'Keys' => 'Key'
    );


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', TextField::create('ProjectName', 'Name of the project'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Client', 'Who is the project for'), 'Content');

        $fields->addFieldToTab('Root.Dev', GridField::create(
            'Dev Environment',
            'Dev environments for this project',
            $this->DevEnvironments(),
            GridFieldConfig_RecordEditor::create()
        ));

        $fields->addFieldToTab('Root.Uat', GridField::create(
            'Uat Environment',
            'Uat environments for this project',
            $this->UatEnvironments(),
            GridFieldConfig_RecordEditor::create()
        ));

        $fields->addFieldToTab('Root.Live', GridField::create(
            'Live Environment',
            'Live environments for this project',
            $this->LiveEnvironments(),
            GridFieldConfig_RecordEditor::create()
        ));

        $fields->addFieldToTab('Root.Extra', GridField::create(
            'Extra accounts',
            'Extra accounts',
            $this->Extras(),
            GridFieldConfig_RecordEditor::create()
        ));

        $fields->addFieldToTab('Root.Keys', GridField::create(
            'ssh keys etc',
            'ssh keys for this project',
            $this->Keys(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }

}

class ProjectPage_Controller extends Page_Controller {

}