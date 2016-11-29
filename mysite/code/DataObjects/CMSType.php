<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/16
 * Time: 3:54 PM
 */
class CMSType extends DataObject
{
    /**
     * Database Fields
     */
    private static $db = array(
        'CMSName' => 'Text',
        'About' => 'Text'
    );

    private static $summary_fields = array(
        'CMSName' => 'CMSName',
        'About' => 'About',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields; // TODO: Change the autogenerated stub
    }

}
