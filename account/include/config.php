<?php
session_start();
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'eracreatix');
// $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// // Check connection
// if (mysqli_connect_errno())
// {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

define('DB_SERVER','localhost');
define('DB_USER','glintqnj_eracreatixclon');
define('DB_PASS' ,'12qw!@QW9984');
define('DB_NAME', 'glintqnj_eracreatixclon');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
date_default_timezone_set('asia/kolkata');
?>
