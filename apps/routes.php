<?php
$routes = array(
	"" => array(
		"module" => "index",
		"action" => "index.php"
	),
	"login" => array(
		"module" => "login",
		"action" => "index.php"
	),
	"profile" => array(
		"module" => "index",
		"action" => "index.php"
	),

	"member/add" => array(
		"module" => "members",
		"action" => "member.php"
	),

	"member/edit" => array(
		"module" => "members",
		"action" => "member.php"
	),

	"members" => array(
		"module" => "members",
		"action" => "index.php"
	),

	"products" => array(
		"module" => "product",
		"action" => "index.php"
	),

	"signup" => "login.php",


	"product/new" => array(
		"module" => "product",
		"action" => "product.php"
	),

	"product/edit" => array(
		"module" => "product",
		"action" => "product.php"
	),

	"packages" => array(
		"module" => "product",
		"action" => "packages.php"
	),
	"reports" => array(
		"module" => "reports",
		"action" => "index.php"
	),
	"invoices" => array(
		"module" => "reports",
		"action" => "invoices.php"
	),
	"invoices/view" => array(
		"module" => "reports",
		"action" => "invoices.php"
	),

	"pos" => array(
		"module" => "pos",
		"action" => "index.php"
	),

	"settings/rank" => array(
		"module" => "settings",
		"action" => "member-rank.php"
	),

	"error/404" => array(
		"module" => "error",
		"action" => "404.php"
	),
	"error/500" => array(
		"module" => "error",
		"action" => "500.php"
	),

);
