 <script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function jsFunction(){
  var myselect = document.getElementById("country");
  var codedata = myselect.options[myselect.selectedIndex].value;
  //input.document.getElementById('themobile') = codedata;
  var res = codedata.split("^");
  document.getElementById('mobile').value=res[1];
}
</script>

<?php
 
//foreach (glob("db/individual/final/*.csv") as $filename) {
	
//echo '<tr class="gradeX">';	
//$fname = basename("$filename", ".csv").PHP_EOL;
$file = 'areacode.csv';
$row = 1; 
$ecountry='Philippines^+63';

 echo '<!--<select name="country" id="country" style="width:180px; margin-left:2px" onChange="jsFunction()">';
                 
				 	if($ecountry!=""){ echo '<option value="'.$ecountry.'">'.$ecountry.'</option>'; }
               
if (($handle = fopen("$file", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
           $thedata[$c]=$data[$c];
		  
        }
		
		     $pos = strpos($thedata[1], '+');
			 if ($pos === false) {
				 $thedata[1] = '+'.$thedata[1];
   // echo "The string '$findme' was not found in the string '$mystring'";
} else {
    //echo "The string '$findme' was found in the string '$mystring'";
    //echo " and exists at position $pos";
}
			 
			  echo '<option value="'.$thedata[0].'^'.$thedata[1].'">'.$thedata[0].'</option>';
    }
    fclose($handle);
}

 echo '</select>-->';
/* ('.$thedata[1].')echo '<td>'.$fname.'</td>
 <td>'.$thedata[0].'</td>
 <td><a href="editor/individual.php?refno='.$fname.'&keepThis=true&amp;TB_iframe=true&amp;height=600&amp;width=900" title="'.$fname.'" class="thickbox">VIEW / UPDATE</a></td>
 <td>'.$thedata[1].'</td>
  <td>DELETE | ARCHIVE</td>';
if($_SESSION['clientid']!=''){ echo '<td><a href="secure.php?p=invoice&prodid=1,1,'.$fname.',,,">ADD TO ORDER</a></td>'; }

echo '</tr>';

}*/
  
  ////productid,quantity,ref,desc,unit/usd $addedprod='1,1,0151,,2.95';
  
  ?>
  
  