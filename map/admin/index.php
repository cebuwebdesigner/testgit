<?php
$admin = 2;
include 'zconfig.php';

if($_GET['id']==""){exit();}
$upload_dir='outlet/';
$idzz = $_GET['id'];


if($_POST['op']=="edit"){
$edetails = $_POST['details'];
$epname = $_POST['pname'];
$pizza = $_POST['country'];
//$pieces = explode("^", $pizza);
//$ecountry = $pieces[0];
$estatus = $_POST['status'];
//$eadminid = $_POST['adminid'];
//$erank = $_POST['rank'];
$etype = $_POST['type'];
$ecity = $_POST['city'];
$eaddress = $_POST['address'];
$eemail = $_POST['email'];
$ecnumber = $_POST['cnumber'];
$ecnumber2 = $_POST['cnumber2'];
$esubtype = $_POST['opttwo'];
$elatitude = $_POST['latitude'];
$elongitude = $_POST['longitude'];

$edatereg = $_POST['datereg'];
$imgdb = "";

if( $_FILES["file"]["name"]!= ""){
/*	if (file_exists("../temp/" . $_FILES["file"]["name"])){
      echo 'WARNING:'.$_FILES["file"]["name"] . " already exists. (please change the filename and add again...)<br />";}else{*/
move_uploaded_file($_FILES["file"]["tmp_name"],"../temp/" . $_FILES["file"]["name"]);
$result = mysql_query("SELECT * FROM iplace WHERE eemail='$eemail'");
	while($row = mysql_fetch_array($result)) {
	$idplace = $row['eidplace'];
	}
$picname = $idplace.'.jpg';
	  $eppic = $picname;
      $path1 ="../temp/".$_FILES["file"]["name"];
	  //$path1main = $upload_dir."".$picname;
	 // $pathlargewall = $upload_dir."cover/".$picname;
	  $pathlarge = $upload_dir."large/".$picname;
	  $pathmedium = $upload_dir."medium/".$picname;
	  $path1small = $upload_dir."small/".$picname;
	  include('SimpleImagez.php');
      $image = new SimpleImage();
	  $image->load($path1);
      //$image->resizeToHeight(960);
      //$image->save($pathlargewall);
	  $image->resizeToHeight(550);
      $image->save($pathlarge);
      $image->resizeToHeight(320);
      $image->save($pathmedium);
	  $image->resizeToHeight(60);
      $image->save($path1small);
 	   unlink($path1);
$imgdb = "eppic='$picname',";
//}
}else{$picname=$_POST[oldfile]; }

//
$admin = 2;
include 'zconfig.php';

$result = mysql_query("UPDATE iplace SET $imgdb elatitude='$elatitude',elongitude='$elongitude',eaddress='$eaddress',eemail='$eemail',ecnumber='$ecnumber',ecnumber2='$ecnumber2',ecity='$ecity',etype='$etype',epname='$epname',edetails='$edetails' WHERE ecode = '$idzz'");



}

if($idzz!="")	{
	$result = mysql_query("SELECT * FROM iplace WHERE ecode = '$idzz'");
	while($row = mysql_fetch_array($result)) {
	//$product_name = $row['product_name'];
	$theidcode = $row['eidplace'];
	$eppic = $row['eppic'];
	$epname = $row['epname'];
	$ecountry = $row['elocation'];
	$estatus = $row['estatus'];
	$eadminid = $row['eadminid'];
	$erank = $row['erank'];
	$edatereg = $row['edatereg'];
	$etype = $row['etype'];
	$etype = $row['etype'];
    $ecity = $row['ecity'];
	$eaddress = $row['eaddress'];
	$eemail = $row['eemail'];
	$ecnumber = $row['ecnumber'];
	$ecnumber2 = $row['ecnumber2'];
	$esubtype = $row['esubtype'];
	$elatitude = $row['elatitude'];
    $elongitude = $row['elongitude'];
	$edetails = $row['edetails'];
}}



mysql_close($con); 
?>


<!--<link href="CalendarControl.css" rel="stylesheet" type="text/css" />
<script src="CalendarControl.js"  type="text/javascript"></script>-->

<style type="text/css">
<!--
body,td,th {
	font-family: Century Gothic, Impact, Haettenschweiler, "Franklin Gothic Bold", "Arial Black", sans-serif;
	font-size: 12px;
}
-->
</style>

<body >
<form name="form1" enctype="multipart/form-data" method="post" action="index.php?id=<?php echo $idzz; ?>">


<div style="text-align:right; position:fixed; outline:none; top:0px; right:0px; padding-right:10px; z-index:1000; background:#F3C; width:100%;">
<?php 
if($_GET['new']==1){ echo '<h2 style="text-align:right">NEW LOCATION';}  
if($epname!=''){ echo '<h2 style="text-align:right">'.$epname.'';}
?>
<input type="submit" name="button" id="button" value="<?php if($epname!=''){ echo 'UPDATE';}else{echo 'SAVE';} ?>"></h2>
</div>



<input type="hidden" name="op" value="<?php if($_GET['new']==1){ echo 'add';} if($eemail!=''){ echo 'edit';}  ?>" />

<table width="100%" border="0" style="margin-top:100px">
  
  <tr>
    <td bgcolor="">Logo/Photo</td>
    <td bgcolor="">
          <?php if($eppic!=""){echo '<img src="outlet/small/'.$eppic.'"/><br />';} ?>
          <input type="file" name="file" id="file" /><input type="hidden" name="oldfile" id="oldfile" value="<?php echo $eppic; ?>" />
     </td>
  </tr>
  <tr>
    <td bgcolor="">Establishment:</td>
    <td bgcolor=""><label>
      <input type="text" name="pname" id="pname" value="<?php echo $epname; ?>">
    </label><?php include 'acode2.php'; ?></td>
  </tr>
  
   <tr>
      <td bgcolor="">Phone Number</td>
      <td bgcolor=""><label>
        <input type="text" name="cnumber" id="cnumber" value="<?php echo $ecnumber; ?>">
      </label></td>
    </tr>
    
     <tr>
      <td bgcolor="">Mobile Number</td>
      <td bgcolor=""><label>
        <input type="text" name="cnumber2" id="cnumber2" value="<?php echo $ecnumber2; ?>">
      </label></td>
    </tr> 
    
     <tr>
    <td bgcolor="">Email Address</td>
    <td bgcolor=""><label>
      <input type="text" name="email" id="email" value="<?php echo $eemail; ?>">
    </label></td>
  </tr>
    <!--<tr>
    <td bgcolor="">City</td>
    <td bgcolor=""><label>
      <input type="text" name="city" id="city" value="<?php echo $ecity; ?>">
    </label></td>
  </tr>-->
  
  <tr>
    <td bgcolor="">Address(Residence/Entertainment)</td>
    <td bgcolor=""><label>
      <input type="text" name="address" id="address" value="<?php echo $eaddress; ?>">
    </label></td>
  </tr>
    
   
  

   <tr>
    <td bgcolor=""><!--[click here open the photo album]-->Coordinates</td>
    <td bgcolor="">
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<div id="canvas" style="width: 600px;  height: 400px;"></div>
	<br />
	<label for="latitude">Latitude:</label>
	<input id="latitude" name="latitude" type="text" value="<?php echo $elatitude; ?>" />
	<label for="longitude">Longitude:</label>
	<input id="longitude" name="longitude" type="text" value="<?php echo $elongitude; ?>" />

	<!--<script type="text/javascript" src="gmap.js"></script>-->
    
    <script>
	$.get("http://ipinfo.io", function (response) {
	var theloc = response.loc;
	
	// $("#ip").html(defaultLat);
   // $("#ip").html("IP: " + response.ip);
   // $("#address").html("Location: " + response.city + ", " + response.region);
   // $("#details").html(JSON.stringify(response, null, 4));
   
   
   // configuration
var myZoom = 15;
var myMarkerIsDraggable = true;
var myCoordsLenght = 6;

var res = theloc.split(","); //10.328057; //123.881462; //
var defaultLat = <?php if($elatitude!=""){ echo $elatitude; }else{ echo 'res[0]'; } ?>;//37.973787;
var defaultLng = <?php if($elongitude!=""){ echo $elongitude; }else{ echo 'res[1]'; } ?>; //23.722426;

// creates the map
// zooms
// centers the map
// sets the map's type 
var map = new google.maps.Map(document.getElementById('canvas'), {
	zoom: myZoom,
	center: new google.maps.LatLng(defaultLat, defaultLng),
	mapTypeId: google.maps.MapTypeId.ROADMAP
});

// creates a draggable marker to the given coords
var myMarker = new google.maps.Marker({
	position: new google.maps.LatLng(defaultLat, defaultLng),
	draggable: myMarkerIsDraggable
});

// adds a listener to the marker
// gets the coords when drag event ends
// then updates the input with the new coords
google.maps.event.addListener(myMarker, 'dragend', function(evt){
	document.getElementById('latitude').value = evt.latLng.lat().toFixed(myCoordsLenght);
	document.getElementById('longitude').value = evt.latLng.lng().toFixed(myCoordsLenght);
});

// centers the map on markers coords
map.setCenter(myMarker.position);

// adds the marker on the map
myMarker.setMap(map);
   
}, "jsonp");
	</script>
    
    
    
    </td>
  </tr>
  
  
  
  
 
  
  
 <!-- 
  
  <tr>
    <td colspan="2" bgcolor="">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#003366" style="color:#FFF"><strong>Auto Generate(admin preview)</strong></td>
    </tr>
  <tr>
    <td bgcolor="">Date Registered</td>
    <td bgcolor=""><input type="text" name="datereg" id="datereg" value="<?php  date_default_timezone_set('Asia/Taipei');
        
		if($edatereg==""){ echo date("Y-m-d H:i:s"); }else{echo $edatereg; }
		
		
		?>">
      (auto)</td>
  </tr>
  <tr>
    <td bgcolor="">UserID of Creator(merchant id or by admin)</td>
    <td bgcolor=""><input type="text" name="adminid" id="adminid" value="<?php if($eadminid==""){ echo 'admin'; }else {echo $eadminid;} ?>" />
      (auto)</td>
  </tr>
  <tr>
    <td bgcolor="">Status</td>
    <td bgcolor="">
    <label>
      <select name="status" id="status">
      
        <option value="0"  <?php if($estatus=="0"){echo 'selected';}?>>to verify</option>
        <option value="1" <?php if($estatus=="1"){echo 'selected';}?>>verified</option>
        <option value="2" <?php if($estatus=="2"){echo 'selected';}?>>block</option>
 
       
      </select>
    </label>
    
    </td>
  </tr>
 
 -->
 
 <!-- <tr>
    <td bgcolor="">Use the main photo on slideshow</td>
    <td bgcolor=""><label>
      <input type="checkbox" name="checkbox" id="checkbox" />
    </label></td>
  </tr>-->
</table>
 
</form>

</body>