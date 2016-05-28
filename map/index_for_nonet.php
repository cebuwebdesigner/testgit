<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amMap example</title>

        <link rel="stylesheet" href="ammap/ammap.css" type="text/css">
        <script src="ammap/ammap.js" type="text/javascript"></script>
        <!-- check ammap/maps/js/ folder to see all available countries -->
        <!-- map file should be included after ammap.js -->
		<script src="ammap/maps/js/philippinesHigh.js" type="text/javascript"></script>
        <script>
			var map = AmCharts.makeChart("mapdiv", {
				type: "map",

				balloon: {
					color: "#000000"
				},

				dataProvider: {
					map: "philippinesHigh",
					zoomLevel: 2,
				    zoomLongitude: 123.650034,
    				zoomLatitude:9.768751,

					getAreasFromMap: true,
					images: [
							 
							 
							 
							  {
								//"type": "circle",
								//"label": "Circle Test",
								"latitude":10.2934,
								"longitude":123.9019,
								"imageURL": "images/circle.png",
								"width":20,
								"height":20,
								"color":"BLUE",
								 "title":"Head Office", 
								 "description":"Trans-Asia Shipping Lines Bldg.M.J. Cuenco corner Osmeña Bvd., Cebu City<br /><br />Trunkline connecting all departments<br />+63 (032) 254-6491<br /><br />Trunkline connecting all departments<br />+63 (032) 254-6491 to 98",
								"descriptionWindowTop":10, "descriptionWindowLeft":5
							  }
							  <?php 
							  $admin = 2;
							  include '../zconfig.php';
							  
							  $result2 = mysql_query("SELECT * FROM iplace");// WHERE luserid
while($row2 = mysql_fetch_array($result2)) {
	
	
	$enumber = '';
	$enumber2 = '';
	
	if($row2['ecnumber']!=""){$enumber = 'Contact Number:<br />'.$row2['ecnumber'];}
	if($row2['ecnumber2']!=""){$enumber2 = '<br /><br />Mobile Number:<br />'.$row2['ecnumber2'];}
	
	
	if($row2['elatitude']!=""&&$row2['elongitude']!=""){
	
	echo ',{
								"latitude":'.$row2['elatitude'].',
								"longitude":'.$row2['elongitude'].',
								"imageURL": "images/circle.png",
								"width":10,
								"height":10,
								"color":"BLUE",
								 "title":"'.$row2['epname'].'", 
								 "description":"'.$row2['eaddress'].'<br /><br />'.$enumber.$enumber2.'",
								"descriptionWindowTop":10, "descriptionWindowLeft":5
							  }';
							  
	}
	
	
	
	}
							  
							  ?>
							  
							  
   							 ]
					
				},

				areasSettings: {
					autoZoom: true,
					adjustOutlineThickness:true,
					outlineThickness:1,
					selectedColor: "#CC0000"
				},
                
				
				smallMap: {}
			});
			
			
			
			
	
		

		
        </script>
        <style>
		html, body {margin:0;padding:0;height:100%;}
		.board{
			height:90%;
			}
			</style>
    </head>

    <body style="height:100%;">
    
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
    
    
        <div id="mapdiv" class="board" style="width:100%; background-color:#EEEEEE; "></div><br />
    </body>

</html>