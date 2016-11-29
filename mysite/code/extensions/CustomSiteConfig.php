<?php
/**
 * Created by PhpStorm.
 * User: Heath
 * Date: 16/02/16
 * Time: 11:22 PM
 */
class CustomSiteConfig extends DataExtension {
    private static $db = array(
        'FacebookLink' => 'Text',
        'TwitterLink' => 'Text',
        'LinkedInLink' => 'Text',
        'Phone' => 'Text',
        'Email' => 'Text'
    );

    private static $has_one = array(
        'SiteLogo' => 'Image',
    );

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Main",
            $uploader = new UploadField('SiteLogo')
        );
        $uploader->setFolderName('site-logos');
        $uploader->getValidator()->setAllowedExtensions(array(
            'png', 'gif', 'jpeg', 'jpg'
        ));
        return $fields;
    }
}