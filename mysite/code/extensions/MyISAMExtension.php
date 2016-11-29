<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22/11/16
 * Time: 5:35 PM
 */
class MyISAMExtension extends DataExtension
{
    private static $create_table_options = array(
        'MySQLSchemaManager'    =>  'ENGINE=MyISAM'
    );
}