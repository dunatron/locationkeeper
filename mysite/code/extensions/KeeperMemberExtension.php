<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/05/17
 * Time: 11:55 AM
 */
class KeeperMemberExtension extends DataExtension
{
    /**
     * Modify the field set to be displayed in the CMS detail pop-up
     */
    public function updateCMSFields(FieldList $currentFields) {
        // Only show the additional fields on an appropriate kind of use
        if(Permission::checkMember($this->owner->ID, "VIEW_FORUM")) {
            // Edit the FieldList passed, adding or removing fields as necessary
        }
    }

    // define additional properties
    private static $db = array(
        'ViewSensitive' =>  'Boolean'
    );
    private static $has_one = array();
    private static $has_many = array();
    private static $many_many = array();
    private static $belongs_many_many = array();

    public function somethingElse() {
        // You can add any other methods you like, which you can call directly on the member object.
    }
}