<?php

global $project;
$project = 'mysite';

global $database;
$database = 'SS_locationkeeper_db';

require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_US');

FulltextSearchable::enable();
Code::add_extension("FulltextSearchable('Title','Desc')");

Solr::configure_server(array(
    'host' => 'localhost',
    'indexstore' => array(
        'mode' => 'file',
        'path' => BASE_PATH . '/.solr'
    ),
    'port'  =>  '8983'
));