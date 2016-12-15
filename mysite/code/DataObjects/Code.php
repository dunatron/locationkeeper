<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/12/16
 * Time: 2:35 PM
 */
class Code extends DataObject
{
    private static $db = array(
        'Title' => 'Text',
        'Desc' => 'HTMLText'
    );

    private static $create_table_options = array(
        'MySQLDatabase' => 'ENGINE=MyISAM'
    );

    private static $indexes = array(
        'SearchFields' => array(
            'type'  =>  'fulltext',
            'name'  =>  'SearchFields',
            'value' =>  '"Title", "Desc"',
        )
    );

    private static $has_one = array(
        'CodeHolder' => 'CodeHolder'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    /**
     * Environment Summary
     */
    private static $summary_fields = array(
        'Title' => 'Title',
        'Desc' => 'Desc',
    );

}
