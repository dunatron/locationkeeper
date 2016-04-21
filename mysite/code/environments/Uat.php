<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 11:20 AM
 */

class Uat extends DataObject
{

    private static $db = array(
        'ServerName' => 'Text',
        'ServerAddress' => 'Varchar(100)',
        'ServerUser' => 'Varchar(100)',
        'ServerPass' => 'Varchar(100)',
        'SiteURL' => 'Text',
        'BackEndAddress' => 'Text',
        'BackEndUser' => 'Text',
        'BackEndPass' => 'Text',
        'HtaccessUser' => 'Text',
        'HtaccessPass' => 'Text'
    );

    private static $has_one = array(
        'ProjectPage' => 'ProjectPage'
    );


    public function updateCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('ServerName'),
            TextField::create('ServerAddress'),
            TextField::create('ServerUser'),
            TextField::create('ServerPass'),
            TextField::create('SiteURL'),
            TextField::create('BackEndAddress'),
            TextField::create('BackEndUser'),
            TextField::create('BackEndPass'),
            TextField::create('HtaccessUser'),
            TextField::create('HtaccessPass')

        );

        return $fields;
    }

    public function makeSSH()
    {

        $ssh = $this->ProjectPage()->ServerName;
        $ssh = 'dam it';
        return $ssh;
    }

}