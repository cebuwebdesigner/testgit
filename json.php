<?php 

$folder=dir("db/");

$datecount=0;
while($folderEntry=$folder->read()){
      //echo $folderEntry."<br>";
$phpcheck=substr($folderEntry, -4);
if($phpcheck==".php"){
//
	if($folderEntry!="."&&$folderEntry!=".."&&$folderEntry!="error_log"&&$folderEntry!="index2.php"&&$folderEntry!="index.php"&&$folderEntry!="destination.php"&&$folderEntry!="ship.php"&&$folderEntry!="scheduler.php"&&$folderEntry!="adddes.php"&&$folderEntry!="addshp.php"&&$folderEntry!="time.php"&&$folderEntry!="addtime.php"){ $folderEntry=substr($folderEntry, 0, -4); 
//loopz
$thedatefiles[$datecount] = $folderEntry;
$datecount++;
}}}
$folder->close();

$dest = $_GET['destination'];


include 'db/destination.php';	

$key = array_search($dest,$alldestination);




echo '{"":"Select Date"';
for($i=0;$i<$datecount;$i++){
include 'db/'.$thedatefiles[$i].'.php';	



///////////////////////////////////////////////////////////////////////////
list($checkfileMonth, $checkfileDay) = split(' ',$thedatefiles[$i]);

date_default_timezone_set('Asia/Taipei');
$monthtoday = date("n"); $daytoday = date("j"); 	$yeartoday = date("Y");




if($monthtoday==10||$monthtoday==11||$monthtoday==12){
$yeartodayplus=$yeartoday+1; $yeartouse = $yeartodayplus;
 if($checkfileMonth==1||$checkfileMonth==2||$checkfileMonth==3||$checkfileMonth==4){$h = mktime(0, 0, 0, $checkfileMonth, $checkfileDay, $yeartodayplus);} else {$h = mktime(0, 0, 0, $checkfileMonth, $checkfileDay, $yeartoday);}
 }else{$h = mktime(0, 0, 0, $checkfileMonth, $checkfileDay, $yeartoday); $yeartouse = $yeartoday; }

 $w= date("l", $h) ;


switch($checkfileMonth){
case 1: $checkthedate = "January $checkfileDay, $yeartouse on $w"; break;
case 2: $checkthedate = "February $checkfileDay, $yeartouse on $w"; break;
case 3: $checkthedate = "March $checkfileDay, $yeartouse on $w"; break;
case 4: $checkthedate = "April $checkfileDay, $yeartouse on $w"; break;
case 5: $checkthedate = "May $checkfileDay, $yeartouse on $w"; break;
case 6: $checkthedate = "June $checkfileDay, $yeartouse on $w"; break;
case 7: $checkthedate = "July $checkfileDay, $yeartouse on $w"; break;
case 8: $checkthedate = "August $checkfileDay, $yeartouse on $w"; break;
case 9: $checkthedate = "September $checkfileDay, $yeartouse on $w"; break;
case 10: $checkthedate = "October $checkfileDay, $yeartoday on $w"; break;
case 11: $checkthedate = "November $checkfileDay, $yeartoday on $w"; break;
case 12: $checkthedate = "December $checkfileDay, $yeartoday on $w"; break;
}
//////////////////////////////////////////////////////////////////////////////







if($theship[$key]!='Select the Ship'){
echo ',"'.$dest.'###'.$checkthedate.'###'.$thetime[$key].'###'.$thetime2[$key].'###'.$theship[$key].'":"'.$checkthedate.' '.$thetime[$key].' '.$thetime2[$key].'"';
}


}
echo '}';


// TIME = '.$thetime[0].' to '.$thetime2[0].' SHIP = '.$theship[0].' : DATE = '.$thedatefiles[$i].' TIME = '.$thetime[0].' to '.$thetime2[0].' SHIP = '.$theship[0].'"';



?>