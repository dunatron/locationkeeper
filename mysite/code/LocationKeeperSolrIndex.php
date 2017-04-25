<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/16
 * Time: 5:40 PM
 */
class LocationKeeperSolrIndex extends SolrIndex {
    public function init() {
        $this->addClass('SiteTree');
        $this->addClass('Code');
        //$this->addClass('CodeTag');

        $this->addAllFulltextFields();

        $this->addStoredField('Title');
        $this->addStoredField('Desc');
        $this->addStoredField('Tags');
        $this->addStoredField('Content');

        $this->addBoostedField('Title', null, array(), 3);
        $this->addBoostedField('Tags', null, array(), 2.5);
        $this->addBoostedField('Desc', null, array(), 2);


        //$this->excludeVariantState(array('SearchVariantVersioned' => 'Stage'));
    }
}