<?php
/*
replace array indexes:
1) fix windows slashes
2) strip up-tree ../ as possible hack attempts
*/
$URL = str_replace(
	array( '\\', '../' ),
	array( '/',  '' ),
	$_SERVER['REQUEST_URI']
);
if ($offset = strpos($URL,'?')){
	// strip getData
	$URL = substr($URL,0,$offset);
}else if($offset = strpos($URL,'#')){
	// Since hashes are after getData, you only need to strip hashes when there is no getData
	$URL = substr($URL,0,$offset);
}



/*
the path routes below aren't just handy for stripping out
the REQUEST_URI and looking to see if this is an attempt at
direct file access, they're also useful for moving uploads,
creating absolute URI's if needed, etc, etc
*/
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));



// strip off the URL root from REQUEST_URI
if (URL_ROOT != '/') $URL=substr($URL,strlen(URL_ROOT));



// strip off excess slashes
$URL = trim($URL,'/');



// 404 if trying to call a real file
if(
	file_exists(DOC_ROOT.$URL) 
	&& ($_SERVER['SCRIPT_FILENAME'] == DOC_ROOT.$URL)
	&& ($URL != '')
	&& ($URL == 'index.php' || $URL == 'site' || $URL == 'system')
){
	$pagefile="404.php";
}




// If $url is empty of default value, set action to 'default' otherwise, explode $URL into an array
$uri = (($URL == '') || ($URL == 'index.php') || ($URL == 'index.html')) ? array(SITE_HOMEPAGE) : explode('/',html_entity_decode($URL));


if($uri[0] != false) 
	$uri_base = preg_replace('/[^\w]/','',$uri[0]);
else 
	$uri_base = $site_homepage;



include(SITE_ROOT.'apps/routes.php');



/**
 * [$module description]
 * @var [type]
 */	

isset($uri[0]) ? $module = $uri[0] : $module = $site_homepage;
isset($uri[1]) ? $action = $uri[1] : $action = '';

$get_url = $module;
if($action!='') $get_url.= "/".$action;

if(isset($routes[$get_url])){
	/**
	 * Set App & Action
	 * @var app
	 */
	if(isset($routes[$get_url]['app'])) $module = $routes[$get_url]['app'];
	else $module = $uri_base;

	if(isset($routes[$get_url]['action'])) $action = $routes[$get_url]['action'];
	else $action = "index.php";

}else{
	$action = $uri_base.".php";
} 


define('MODULE',$module);
define('ACTION',$action);