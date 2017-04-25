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
        'Desc' => 'HTMLText',
        'Tags'  =>  'Text'
    );

    private static $create_table_options = array(
        'MySQLDatabase' =>  'ENGINE=MyISAM'
    );

    private static $indexes = array(
        'SearchFields'  =>  array(
            'type'  =>  'fulltext',
            'name'  =>  'SearchFields',
            'value' =>  '"Title", "Desc"',
        )
    );

    static $defaults = array (
        'ShowInMenus' => false,
        'ShowInSearch' => true
    );

    private static $has_one = array(
        'CodeHolder' => 'CodeHolder'
    );

    private static $many_many = array(
        'CodeTags' =>   'CodeTag'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
//        $fields->addFieldToTab('Root.CodeTags', TagField::create(
//            'CodeTags',
//            'Code Tags',
//            CodeTag::get(),
//            $this->CodeTags()
//        )->setShouldLazyLoad(true)->setCanCreate(true));
//        $fields->addFieldToTab('Root.Main', StringTagField::create(
//        'Tags',
//        'Tags',
//            CodeTag::get(),
//        explode(',', $this->Tags))->setShouldLazyLoad(true)->setCanCreate(true));

        $fields->addFieldToTab('Root.Main',  StringTagField::create(
            'Tags',
            'Tags',
            CodeTag::get()->map('ID', 'Title')->toArray()

        )->setShouldLazyLoad(false)
            ->setCanCreate(true));


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
