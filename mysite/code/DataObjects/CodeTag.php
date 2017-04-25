<?php
/**
 * Created by PhpStorm.
 * User: Heath
 * Date: 25/04/17
 * Time: 12:57 AM
 */
class CodeTag extends DataObject
{
    private static $db = array(
        'Title' => 'Varchar(200)'
    );

    private static $belongs_many_many = array(
        'Codes' => 'Code'
    );

    private static $create_table_options = array(
        'MySQLDatabase' =>  'ENGINE=MyISAM'
    );

    private static $indexes = array(
        'SearchFields'  =>  array(
            'type'  =>  'fulltext',
            'name'  =>  'SearchFields',
            'value' =>  'Title',
        )
    );
}