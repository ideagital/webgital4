<?php
session_start();


//session_set_cookie_params(0, '/', '.$site_url');
$pageload_start = microtime( true ); // Start page load time
require('../apps/config.php');


if(SITE_ENVIRONMENT == 'development'){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}


// Services Loader

// require(SITE_ROOT.'apps/databases/mongodb.php');
require(SITE_ROOT.'systems/services/routes.php');

/**
 * Functions Loader
 */
include(SITE_ROOT.'systems/functions/default.php');



/**
 * App Main MVC
 */
// require(SITE_ROOT.'apps/models.php');
// require(SITE_ROOT.'apps/controllers.php');
// require('apps/views.php');


/**
 * Model Loader
 */
if (is_file(SITE_ROOT.'apps/modules/'.MODULE.'/'.'models/'.ACTION)) require(SITE_ROOT.'apps/modules/'.MODULE.'/'.'models/'.ACTION);



/**
 * Controller Loader
 */
if (is_file(SITE_ROOT.'apps/modules/'.MODULE.'/'.'controllers/'.ACTION)) require(SITE_ROOT.'apps/modules/'.MODULE.'/'.'controllers/'.ACTION);



/**
 * View Loader
 */
if (is_file(SITE_ROOT."apps/views/templates/".SITE_TEMPLATE."/".RENDERFILE)) require(SITE_ROOT."apps/views/templates/".SITE_TEMPLATE."/".RENDERFILE);
else include(SITE_ROOT."apps/views/templates/".SITE_TEMPLATE."/404.php");
