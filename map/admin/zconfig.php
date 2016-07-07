<?php


$siteaddress = '';
$to = 'info@oliverconcepts.com';
/*if($admin==1){
$user="@ymph0ny";

}*/



if($admin==2){
$dbhost = 'localhost';
$dbuser = 'olivergo_zach2'; 
$dbpass = 'Ms9@.ph';
$dbname = 'olivergo_transmap';

$con = mysql_connect($dbhost,$dbuser,$dbpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
///test2=database
mysql_select_db($dbname, $con); 
}

?>