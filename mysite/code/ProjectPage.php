<?php

/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 10:40 AM
 */
class ProjectPage extends Page
{

    private static $can_be_root = false;

    private static $searchable_fields = array(
        'ProjectName',
        'Client'
    );

    private static $indexes = array(
        'SearchFields' => array(
            'type' => 'fulltext',
            'name' => 'SearchFields',
            'value' => '"Client"',
        )
    );

    private static $create_table_options = array(
        'MySQLDatabase' => 'ENGINE=MyISAM'
    );

    private static $db = array(
        'ProjectName' => 'Text',
        'Client' => 'Text',
        'CMS' => 'Text',
        'GitRepo' => 'Text'
    );

    private static $has_many = array(
        'DevEnvironments' => 'Dev',
        'UatEnvironments' => 'Uat',
        'LiveEnvironments' => 'Live',
        'Extras' => 'Extra',
        'Keys' => 'Key',
        'Notes' => 'Note'
    );

    public function getCMSType()
    {
        $framework = DataObject::get_by_id('CMSType', $this->CMS);
        return $framework;
    }


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', TextField::create('ProjectName', 'Name of the project'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Client', 'Who is the project for'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('GitRepo', 'Git repository link'), 'Content');

        // Hook CMSType DataObject
        $fields->addFieldToTab('Root.Main', new DropdownField(
            'CMS',
            'What CMS does this site use',
            CMSType::get()->map('ID', 'CMSName')->toArray(),
            null,
            true
        ), 'ProjectName');

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

        $fields->addFieldToTab('Root.Notes', GridField::create(
            'Notes | Title and Body',
            'Notes About this Site',
            $this->Notes(),
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

class ProjectPage_Controller extends Page_Controller
{

    public function ChronologicalNotes()
    {
        $notes = Note::get()->filter(array(
            'ProjectPageID' => $this->ID
        ))->sort('Created', 'DESC');
        return $notes;
    }


    public function PaginatedNotes()
    {
        $pages = new PaginatedList($this->ChronologicalNotes(), $this->getRequest());
        $pages->setPageLength(10);
        return $pages;
    }

}