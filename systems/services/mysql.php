<?
$connect = mysqli_connect("$mysql_host","$mysql_username","$mysql_password","$mysql_database");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connect,"$mysql_charset");