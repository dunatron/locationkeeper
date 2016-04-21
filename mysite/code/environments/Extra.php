<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 2:37 PM
 */

class Extra extends DataObject
{

    private static $db = array(
        'Type' => 'Text',
        'Value' => 'Text',
        'Comment' => 'Text'
    );

    private static $has_one = array(
        'ProjectPage' => 'ProjectPage'
    );


    public function updateCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Type'),
            TextField::create('Value'),
            TextField::create('Comment')
        );

        return $fields;
    }

}