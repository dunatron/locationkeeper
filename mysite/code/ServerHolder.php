<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21/10/16
 * Time: 8:56 AM
 */
class ServerHolder extends Page
{

    private static $singular_name        = "Server Holder";
    private static $plural_name          = "Server Holders";
    private static $db = array();
    
    static $defaults = array (
	    'ShowInMenus' => true,
	    'ShowInSearch' => true
    );
    
    private static $has_one = array();

    private static $has_many = array();

    private static $many_many = array();

    private static $belongs_many_many = array();

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $default_child = "";

    private static $can_be_root = true;

    private static $hide_ancestor = null;
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        
        return $fields;
    }
    
}
class ServerHolder_Controller extends Page_Controller
{
    /**
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if >checkAction() returns true
     * );
     * @var array
     */
    private static $allowed_actions = array();

    public function init()
    {
        parent::init();
    }

    public function GetServers()
    {
        $servers = Server::get();
        return $servers;
    }
}


