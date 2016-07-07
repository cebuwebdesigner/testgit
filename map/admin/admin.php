<?php
session_start();

if($_POST['op']=="logout")
{
	$_SESSION['access'] = ""; $access = "";
	$_SESSION['passaccess'] = ""; $passaccess = "";
	$_SESSION['grant']='';
	session_unset(); 
}

if($_POST['op']=="access")
{
	$access= $_POST['username'];
	$passaccess=$_POST['pass'];
	$_SESSION['access'] = $_POST['username']; $_SESSION['passaccess'] = $_POST['pass'];  
/*$passaccess = $_SESSION['passaccess'];
$access = $_SESSION['access'];}*/


$user5 = "admin";
$pass5 = "transgate";

//echo $access.$passaccess;



if($access==$user5&&$passaccess==$pass5){$_SESSION['grant']=1; $_SESSION['settings']="on^on^on^on^on^on^on^on^on^on";}else{
	
//$admin = 2;
//include '../konfig.php';
	
/*$result2 = mysql_query("SELECT * FROM p5_users WHERE eemail='$access' AND  epass='$passaccess'");// WHERE luserid
while($row2 = mysql_fetch_array($result2)) {
$settings = $row2['adminset'];
}*/

$findme   = 'on'; $pos = strpos($settings, $findme);
if ($pos === false) {
    //not found 
	} else {
$_SESSION['grant']=1;
$_SESSION['settings'] = $settings;

}

}

}


if($_SESSION['grant']!=1){include "log.php";  exit();}

////////////////////
	
			
			



?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<style type="text/css" title="currentStyle">
			
			@import "tables/css/demo_table_jui.css";
			@import "tables/jquery-ui-1.8.4.custom.css";
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<script type="text/javascript" src="tables/js/jquery-latest.js"></script>
<script type="text/javascript" src="tables/js/thickbox.js"></script>
<link rel="stylesheet" href="tables/css/thickbox.css" type="text/css" media="screen" />



<script type="text/javascript" language="javascript" src="tables/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="tables/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			} );
		</script>
        
        <style type="text/css">
<!--
body {
	background-color: #b9e1ea;
}
-->
</style>

</head>

<body>


<div style="width:200px; float:right">
<?php
if($_POST['op']=="invite"){
	
	
	
	$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 5) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 
	
	
	
	$admin = 2;
	include 'zconfig.php';
   	
	
	$result = mysql_query("SELECT eidplace FROM iplace");
	while ($row = mysql_fetch_array($result)) 
	{    $lastid = $row['eidplace'];  	}
	
	
	
	$dateissue = date('l jS \of F Y h:i:s A');
	$to = $_POST['email']; // client email
	$lastid =$lastid+1;
	$theidcode = $lastid.'$'.$pass;
	
	
	
	$result = mysql_query("INSERT INTO iplace (edatereg,ecode,eemail) VALUES ('$dateissue','$theidcode','$to')");

//http://www.transasiashipping.com/map.php
	
		$from = 'TransAsiaShipping';
		$visitor_email = 'noreply@transasiashipping.com';
		$subject = 'TRANSASIA OUTLET MAPPING - '.$datetoday;
		$body = 'here is the link to use: http://www.transasiashipping.com/agencies-outlet/login/?id='.$theidcode;
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		if($_POST['sendcopy']!='on'){
		mail($to, $subject, $body,$headers);
		}
		//http://buildwebdesign.com/transmap/createplaces.php?id=
		echo 'Successfuly send invitation to: '.$to.' <br/>CODE:<b><a target="_blank" href="http://www.transasiashipping.com/agencies-outlet/login/?id='.$theidcode.'">'.$theidcode.'</a></b>';
}
?>
<form method="post"><input type="hidden" name="op" value="invite"/><b>INVITE OUTLET</b><br />
<input type="text" name="email" id="email" placeholder="email"><br />
<input name="sendcopy" type="checkbox" value=""> disable sending a copy<br />
<input type="submit">
</form>
</div>


<?php

//if($_GET[p]!=""){ include $_GET[p].'z.php';  }
include 'place'.'z.php';




echo '<form name="nstic" action="admin.php" method="post">
 <input type="hidden" name="op" value="logout" />
<input type="submit" name="button" id="button" style="width:186px; height:55px; font-size:25px; font-weight:bold; color:#007eff; font-family: Century Gothic" value=" &nbsp;&nbsp;LOGOUT&nbsp;&nbsp; ">
</form></div><div style="float:left; padding-left:2px; width:1100px">
';
?>
</body>
</html>