<?php
include "settings/database.php";

try
{
	$connectDB = new PDO("mysql:host={$mysql_host};dbname={$mysql_db}",$mysql_user,$mysql_pass);
	$connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connectDB->exec("set names ".$mysql_charset);
}
catch(PDOException $e)
{
	echo $e->getMessage();
} 