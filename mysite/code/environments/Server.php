<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 21/04/16
 * Time: 4:48 PM
 */

class Server extends DataObject
{

    private static $db = array(
        'ServerName' => 'Text',
        'ServerAddress' => 'Text',
        'Description' => 'Text',
        // Mysql Stuff
        'SQLHost' => 'Text',
        'SQLUser' => 'Text',
        'SQLPass' => 'Text',
        // ssh stuff
        'SSHHost' => 'Text',
        'SSHUser' => 'Text',
        'SSHPass' => 'Text',
        'SSHKey' => 'HTMLText'

    );

    private static $has_one = array(
        'ProjectPage' => 'ProjectPage'
    );


    public function updateCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('ServerName'),
            TextField::create('ServerAddress'),
            TextField::create('Description'),
            TextField::create('SQLHost'),
            TextField::create('SQLUser'),
            TextField::create('SQLPass'),
            TextField::create('SSHHost'),
            TextField::create('SSHUser'),
            TextField::create('SSHPass'),
            HTMLText::create('SSHKey')

        );

        return $fields;
    }

}