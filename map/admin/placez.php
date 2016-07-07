<?php 


$admin = 2;
include 'zconfig.php';


if($_GET['del8']!=""){
	$delthis=$_GET['del8'];
	$result = mysql_query("DELETE FROM iplace WHERE eidplace='$delthis' ");  $status='Successfully deleted...';
     }		

if($_GET['suredel']!=""){
	echo 'Are you sure you want to delete this '.$_GET['title'].'? [ <a href="?p=place&amp;del8='.$_GET['suredel'].'">yes</a> ]  [ <a href="?p=user">no</a> ]';
	}	
			


if($_POST['placeid']!=""){
	$idzz = $_POST['placeid'];
	$selectc = $_POST['selectc'];
	
	$result = mysql_query("UPDATE iplace SET estatus='$selectc' WHERE eidplace = '$idzz'");
	//echo "UPDATE iplace SET estatus='$selectc' WHERE eidplace = '$idzz'";
	}
 ?>       
         <!--<div style="text-align:right; padding:10px;"> [<a href="http://www.igogoe.com/idmin/?p=country">update countries</a>]  [<a href="createplaces.php?new=1&amp;keepThis=true&amp;TB_iframe=true&amp;height=550&amp;width=1000" title="" class="thickbox">add new places</a>] </div>-->
         
         
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
	<tr>
            <th>PLACEID</th>
            <th>PLACE NAME</th>
            <th>ADDRESS</th>
         <th>MOBILE</th>
          <th>PHONE</th>
           <th>EMAIL</th>
          <!--     <th>PHOTOS(open to edit)</th>
           	<th>RATE</th>-->
            <th>OPTION</th>
            
	</tr>
    </thead>
    
<tbody>
<?php

$result2 = mysql_query("SELECT * FROM iplace");// WHERE luserid
while($row2 = mysql_fetch_array($result2)) {
//$email76 = $row2['lemail'];
$status0 = ''; $status1 = ''; $status2 = '';
if($row2['estatus']=='1'){$status0 = ''; $status2 = ''; $status1 = 'selected="selected"'; }
if($row2['estatus']=='0'){$status1 = ''; $status2 = ''; $status0 = 'selected="selected"'; }
if($row2['estatus']=='2'){$status1 = ''; $status0 = ''; $status2 = 'selected="selected"'; }

$type0 = ''; $type1 = ''; $type2='';
if($row2['etype']=='0'){$thetype='Map'; }
if($row2['etype']=='1'){$thetype='Entertainment'; }
if($row2['etype']=='2'){$thetype='Residence'; }



//http://www.igogoe.com/dev/addphoto/?title=Adding%20Photo%20to%20Magelans%20Cross&dir=place&id=1
//gallery.php?array='.$row2['eaphotos'].
echo '<tr class="gradeX">

<td><a href="createplaces.php?id='.$row2['eidplace'].'&keepThis=true&amp;TB_iframe=true&amp;height=550&amp;width=1000" title="PLACES INFO" class="thickbox">'.$row2['eidplace'].'</a></td>

<td>'.$row2['epname'].'</td><td>'.$row2['eaddress'].'</td>
<td>'.$row2['ecnumber'].'</td>
<td>'.$row2['ecnumber2'].'</td>
<td>'.$row2['eemail'].'</td>




<td>

<form method="post" action="" style="float:left">
<label>
  <select name="selectc" id="selectc">
    <option value="0" '.$status0.'>to verify</option>
    <option value="1" '.$status1.'>verified</option>
	<option value="2" '.$status2.'>block</option>
  </select>
</label>

<input name="placeid" value="'.$row2['eidplace'].'" type="hidden" />

<input name="send" value="UPDATE" type="submit" />



</form><a  style="float:left" href="?p=place&item=&suredel='.$row2['eidplace'].'"><button>DELETE</button></a>




</td>
</tr>';
}



?>

</tbody>
</table>
