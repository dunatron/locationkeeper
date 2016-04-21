<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 11:21 AM
 */

class Dev extends DataObject
{

    private static $db = array(
        'ServerName' => 'Text',
        'ServerAddress' => 'Varchar(100)',
        'ServerUser' => 'Varchar(100)',
        'ServerPass' => 'Varchar(100)',
        'SiteURL' => 'Text',
        'BackEndAddress' => 'Text',
        'BackEndUser' => 'Text',
        'BackEndPass' => 'Text'
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
            TextField::create('BackEndPass')

        );

        return $fields;
    }

}