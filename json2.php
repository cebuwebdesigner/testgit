<?php 
error_reporting(0);
include 'matrix/paydb.php';
include 'db/destination.php';
$key = array_search($_POST['des'],$alldestination);
//$key = $_POST['des'];




switch($key){
case 0: $fare = explode("-", $des1); break;
case 1: $fare = explode("-", $des2); break;
case 2: $fare = explode("-", $des3); break;
case 3: $fare = explode("-", $des4); break;
case 4: $fare = explode("-", $des5); break;
case 5: $fare = explode("-", $des6); break;
case 6: $fare = explode("-", $des7); break;
case 7: $fare = explode("-", $des8); break;
case 8: $fare = explode("-", $des9); break;
case 9: $fare = explode("-", $des10); break;
case 10: $fare = explode("-", $des11); break;
case 11: $fare = explode("-", $des12); break;
case 12: $fare = explode("-", $des13); break;
case 13: $fare = explode("-", $des14); break;
case 14: $fare = explode("-", $des15); break;
case 15: $fare = explode("-", $des16); break;
case 16: $fare = explode("-", $des17); break;
case 17: $fare = explode("-", $des18); break;
case 18: $fare = explode("-", $des19); break;
case 19: $fare = explode("-", $des20); break;

}


// TIME = '.$thetime[0].' to '.$thetime2[0].' SHIP = '.$theship[0].' : DATE = '.$thedatefiles[$i].' TIME = '.$thetime[0].' to '.$thetime2[0].' SHIP = '.$theship[0].'"';

$index = $_POST['index'];


echo $fare[$index];

?>