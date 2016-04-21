<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 4:33 PM
 */

class Key extends DataObject
{
    private static $db = array(
        'Type' => 'Text',
        'Description' => 'Text',
        'Key' => 'HTMLText'

    );

    private static $has_one = array(
        'ProjectPage' => 'ProjectPage'
    );


    public function updateCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Type'),
            TextField::create('Description'),
            HTMLText::create('Key')

        );

        return $fields;
    }
}