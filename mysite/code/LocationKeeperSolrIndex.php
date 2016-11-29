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

        $this->addAllFulltextFields();
        $this->addFilterField('ShowInSearch');
        $this->excludeVariantState(array('SearchVariantVersioned' => 'Stage'));
    }
}