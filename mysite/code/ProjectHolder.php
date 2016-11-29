<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 10:40 AM
 */

class ProjectHolder extends Page {

    private static $allowed_children = array ('ProjectPage');



}

class ProjectHolder_Controller extends Page_Controller {

    public function SortedChildren(){
        // $children will be a DataObjectSet
        $children = $this->Children();

        if( !$children )
            return null; // no children, nothing to work with

        // sort the DataObjectSet
        // see http://doc.silverstripe.com/doku.php?id=dataobjectset#sorting
        $children->sort('Title', 'DESC');

        // return sorted set
        return $children;
    }

}