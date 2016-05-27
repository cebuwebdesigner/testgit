<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>

 <form><div class="ui-field-contain"><label for="select-native-1"></label><select name="select-native-1" id="select-native-1" style="width:100%"><option value="1">SELECT REGION</option>
    
    <option value="5">Region 5</option>
    <option value="6">Region 6</option>
    <option value="7">Region 7</option>
    <option value="8">Region 8</option>
    <option value="9">Region 9</option>
    <option value="10">Region 10</option>
    <option value="11">Region 11</option>
    <option value="SOCCSKARGEN">SOCCSKARGEN</option>
    
    </select></div></form>

  <div id="map" style="width: 100%; height: 400px; padding-top:80px"></div>

  <script type="text/javascript">
    var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4]<?php 
							  $admin = 2;
							  include '../zconfig.php';
							  
							  $result2 = mysql_query("SELECT * FROM iplace");// WHERE luserid
while($row2 = mysql_fetch_array($result2)) {
	
	
	$enumber = '';
	$enumber2 = '';
	
	if($row2['ecnumber']!=""){$enumber = 'Contact Number:<br />'.$row2['ecnumber'];}
	if($row2['ecnumber2']!=""){$enumber2 = '<br /><br />Mobile Number:<br />'.$row2['ecnumber2'];}
	
	
	if($row2['elatitude']!=""&&$row2['elongitude']!=""){
	
	
	echo ",['".$row2['epname']."<br /><br />".$row2['eaddress']."<br /><br />".$enumber.$enumber2."', ".$row2['elatitude'].", ".$row2['elongitude'].", 5]";
	
							  
	}
	
	
	
	}
							  
							  ?>
	  
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(10.2934, 123.9019),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>