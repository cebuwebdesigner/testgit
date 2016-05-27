  <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
#myForm .form-group table {
	color: #FFF;
}
#myForm .form-group table tr td {
	color: #000;
}
</style>
<div style="padding:0px; margin:30px">&nbsp;</div><script>  

localStorage.setItem("cmsub1",0);
localStorage.setItem("cmsub2",0);
localStorage.setItem("cmsub3",0);
localStorage.setItem("cmsub4",0);
localStorage.setItem("cmsub5",0);

var AAA = localStorage['settings'].split(',');
document.write('<link rel="stylesheet" href="themes/'+AAA[8]+'/jquery.mobile-1.3.1.css" />');



window.onload = function () {
          var stateSel = document.getElementById("destination-remote-2");
			stateSel.onchange = function () {
			var transdes = document.getElementById("destination-remote-2").value;
			var imgarraydes = transdes.split(' to ');
			   var img1 = '<img src="images/destA/'+imgarraydes[0]+'.jpg" />';
			   $('#dest1').html(img1);
			   var img2 = '<img src="images/destB/'+imgarraydes[1]+'.jpg" />';
				$('#dest2').html(img2);
			}	
			
			
			
		  var dateSel = document.getElementById("dates-remote-2");
			dateSel.onchange = function () {
			var transdate = document.getElementById("dates-remote-2").value;
			//alert(transdate);
			var imgarraydate = transdate.split('###');
			var img3 = '';
			if(imgarraydate[4]!=undefined){
			 img3 = '<img src="images/vessel/'+imgarraydate[4]+'.jpg" width="100%" style="max-width:450px" /><br /><h3 style="font-size:25px">VESSEL : '+imgarraydate[4]+'</h3>';
			}else{img3 = '';}//var img3 = 'VESSEL : '+imgarraydate[4];
			 $('#dest3').html(img3);
			
			}	
			
			
			
			///////////////////////////////////////////////////////////////
			
			///////////////////////////////////////////////////////////////
function compsub(loc0,num1,accom1,age1,subid){

	var acoomage='';
	
	if(accom1=='2nd Class')
	{
		switch(age1){
		case 'Adult': acoomage='0'; break;
		case '0 to 2 yrs old': acoomage='1'; break;
		case '3 to 11 yrs old': acoomage='2'; break;
		case '60 yrs & up': acoomage='3'; break;
		case 'Student': acoomage='4'; break;
		}
	}
	
	
	
	if(accom1=='Tourist')
	{
		switch(age1){
		case 'Adult': acoomage='5'; break;
		case '0 to 2 yrs old': acoomage='6'; break;
		case '3 to 11 yrs old': acoomage='7'; break;
		case '60 yrs & up': acoomage='8'; break;
		case 'Student': acoomage='9'; break;
		}
	}
	
	
	if(accom1=='Cabin')
	{
		switch(age1){
		case 'Adult': acoomage='10'; break;
		case '0 to 2 yrs old': acoomage='11'; break;
		case '3 to 11 yrs old': acoomage='12'; break;
		case '60 yrs & up': acoomage='13'; break;
		case 'Student': acoomage='14'; break;
		}
	}
	
	
	if(accom1=='Private Room')
	{
		switch(age1){
		case 'Adult': acoomage='15'; break;
		case '0 to 2 yrs old': acoomage='16'; break;
		case '3 to 11 yrs old': acoomage='17'; break;
		case '60 yrs & up': acoomage='18'; break;
		case 'Student': acoomage='19'; break;
		}
	}
	
 $.ajax({
            type: "POST",
            url: "../json2.php",
            data: {des : loc0,index : acoomage}, 
            cache: false,
            success: function(data) {
            var returnedvalue = parseInt(data);
                 
				 
				 
				 if(num1>1){sub1='<strong>SUB TOTAL</strong>: Php '+returnedvalue*num1+'('+returnedvalue+' per person)'; sub2=returnedvalue*num1;}else{
				 sub1='<strong>SUB TOTAL</strong>: Php '+returnedvalue*num1;
				 sub2=returnedvalue*num1;
				 }
				 
				 
				 if(returnedvalue=='N.A.'||returnedvalue==''||returnedvalue==NaN){
					 sub2 = 0; sub1 = 'N.A.';
					 }
				 
				 
				 $('#'+subid).html(sub1);
				 // $('#cm'+subid).html(sub2);
				localStorage.setItem('cm'+subid, sub2);
				 
				/* alert(sub2); 
				 cms1 = document.getElementById('cmsub1').innerHTML;
				cms2 = document.getElementById('cmsub1').innerHTML;
				cms3 = document.getElementById('cmsub1').innerHTML;
				cms4 = document.getElementById('cmsub1').innerHTML;
				 cms5 = document.getElementById('cmsub1').innerHTML;
				 */
				
				 cms1 =  localStorage.getItem("cmsub1");
				cms2 =  localStorage.getItem("cmsub2");
				cms3 =  localStorage.getItem("cmsub3");
				cms4 =  localStorage.getItem("cmsub4");
				 cms5 = localStorage.getItem("cmsub5");
				 
				cmtotal = parseInt(cms1)+parseInt(cms2)+parseInt(cms3)+parseInt(cms4)+parseInt(cms5);
				 
				 $('#cmtotal').html("GRAND TOTAL: Php "+cmtotal);
				 
				 
            }
        });
                     }






function letscompute(theid){
	var loc0 = document.getElementById("destination-remote-2").value;
	var num1 = document.getElementById("num"+theid).value;
	var accom1 = document.getElementById("accom"+theid).value;
	var age1 = document.getElementById("age"+theid).value;
	var sub1 = "sub"+theid;
	compsub(loc0,num1,accom1,age1,sub1);
	}


///////////////////////////////////////////////////////////////////////////////////selection


			
var computeSel1 = document.getElementById("num1");
computeSel1.onchange = function () {
	letscompute('1');
}


var computeSel2 = document.getElementById("accom1");
computeSel2.onchange = function () {
	letscompute('1');
}
	
	
	
var computeSel3 = document.getElementById("age1");
computeSel3.onchange = function () {
	letscompute('1');
}


//////////////////////////////////////////////////////////////////////////////////selection2

var computeSel12 = document.getElementById("num2");
computeSel12.onchange = function () {
	letscompute('2');
}


var computeSel22 = document.getElementById("accom2");
computeSel22.onchange = function () {
	letscompute('2');
}
	
	
	
var computeSel32 = document.getElementById("age2");
computeSel32.onchange = function () {
	letscompute('2');
}




//////////////////////////////////////////////////////////////////////////////////selection3

var computeSel13 = document.getElementById("num3");
computeSel13.onchange = function () {
	letscompute('3');
}


var computeSel23 = document.getElementById("accom3");
computeSel23.onchange = function () {
	letscompute('3');
}
	
	
	
var computeSel33 = document.getElementById("age3");
computeSel33.onchange = function () {
	letscompute('3');
}


//////////////////////////////////////////////////////////////////////////////////selection4

var computeSel14 = document.getElementById("num4");
computeSel14.onchange = function () {
	letscompute('4');
}


var computeSel24 = document.getElementById("accom4");
computeSel24.onchange = function () {
	letscompute('4');
}
	
	
	
var computeSel34 = document.getElementById("age4");
computeSel34.onchange = function () {
	letscompute('4');
}
//////////////////////////////////////////////////////////////////////////////////selection5

var computeSel15 = document.getElementById("num5");
computeSel13.onchange = function () {
	letscompute('5');
}


var computeSel25 = document.getElementById("accom5");
computeSel25.onchange = function () {
	letscompute('5');
}
	
	
	
var computeSel35 = document.getElementById("age5");
computeSel35.onchange = function () {
	letscompute('5');
}
			
			/////////////////////////////////////////////////////////////
			
			////////////////////////////////////////////////////////////
			
			
			
			
}
    
</script>


  <script src="jquery-1.9.1.min.js"></script>
  <script src="jquery.mobile-1.3.1.min.js"></script>



<center>
<div  style="width:50%; text-align:right; float:left" id="dest1">
</div>
<div style="width:50%; text-align:left; float:left"  id="dest2">
</div>
<br style="clear:both">
 <div style="visibility:hidden" id="cmsub1"></div>
 <div style="visibility:hidden" id="cmsub2"></div>
 <div style="visibility:hidden" id="cmsub3"></div>
 <div style="visibility:hidden" id="cmsub4"></div>
 <div style="visibility:hidden" id="cmsub5"></div>
 
 
 <form class="form-inline bs-margin" role="form" name="myform" id="myForm">
 <div class=form-group> 

 <select id='destination-remote-2' name='destination'> 
 <option value="">Please select Destination</option> 
 <option value='Cebu to Cagayan'>Cebu to Cagayan</option> 
 <option value='Cagayan to Cebu'>Cagayan to Cebu</option> 
 <option value='Cebu to Iloilo'>Cebu to Iloilo</option> 
 <option value='Iloilo to Cebu'>Iloilo to Cebu</option> 
 <option value='Cebu to Ozamiz'>Cebu to Ozamiz</option> 
 <option value='Ozamiz to Cebu'>Ozamiz to Cebu</option> 
 <option value='Cebu to Masbate'>Cebu to Masbate</option> 
 <option value='Masbate to Cebu'>Masbate to Cebu</option> 
 <option value='Cagayan to Tagbilaran'>Cagayan to Tagbilaran</option> 
 <option value='Tagbilaran to Cagayan'>Tagbilaran to Cagayan</option> 
 </select> 
 <select id='dates-remote-2' name='dates'> 
 <option value='--'>--</option> </select> 
<div  style="width:100%; text-align:center;" id="dest3">
</div>

<div style="width:35%; overflow:hidden; float:left; text-align:center; background-color:#003; color:#FFF; font-weight:bold; height:30px">Accomodation</div>
<div style="width:35%; overflow:hidden; float:left; text-align:center; background-color:#003; color:#FFF; font-weight:bold; height:30px">Age</div>
<div style="width:30%; overflow:hidden; float:left; text-align:center; background-color:#003; color:#FFF; font-weight:bold; height:30px">No. of Persons</div>

<br style="clear:both"/>











<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold;"> <select name="accom1" id="accom1" size="1" class="form-control">
        <option value="">Select Type</option>
    <option value="2nd Class">2nd Class</option><option value="Tourist">Tourist</option><option value="Cabin">Cabin</option><option value="Private Room Suite">Private Room</option></select>
    </div> 
    
    
<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"> <select name="age1" id="age1" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
        <option value="">Select Group</option>
    <option value="Adult">Adult</option>
    <option value="0 to 2 yrs old">0 to 2 yrs old</option>
    <option value="3 to 11 yrs old">3 to 11 yrs old</option>
    <option value="60 yrs &amp; up">60 yrs &amp; up</option>
    <option value="Student">Student</option></select>
  </div>  
    
   <div style="width:30%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"><select name="num1" id="num1" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
      <option value="">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19"1>19</option>
      <option value="20">20</option>
    </select></div>
    
     <div style="width:100%;" id="sub1"></div>
    <br style="clear:both"/>
    












<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold;"> <select name="accom2" id="accom2" size="1" class="form-control">
        <option value="">Select Type</option>
    <option value="2nd Class">2nd Class</option><option value="Tourist">Tourist</option><option value="Cabin">Cabin</option><option value="Private Room Suite">Private Room</option></select>
    </div> 
    
    
<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"> <select name="age2" id="age2" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
        <option value="">Select Group</option>
    <option value="Adult">Adult</option>
    <option value="0 to 2 yrs old">0 to 2 yrs old</option>
    <option value="3 to 11 yrs old">3 to 11 yrs old</option>
    <option value="60 yrs &amp; up">60 yrs &amp; up</option>
    <option value="Student">Student</option></select>
  </div>  
    
   <div style="width:30%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"><select name="num2" id="num2" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
      <option value="">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19"1>19</option>
      <option value="20">20</option>
    </select></div>
    
     <div style="width:100%;" id="sub2"></div>
    <br style="clear:both"/>
        












<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold;"> <select name="accom3" id="accom3" size="1" class="form-control">
        <option value="">Select Type</option>
    <option value="2nd Class">2nd Class</option><option value="Tourist">Tourist</option><option value="Cabin">Cabin</option><option value="Private Room Suite">Private Room</option></select>
    </div> 
    
    
<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"> <select name="age3" id="age3" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
        <option value="">Select Group</option>
    <option value="Adult">Adult</option>
    <option value="0 to 2 yrs old">0 to 2 yrs old</option>
    <option value="3 to 11 yrs old">3 to 11 yrs old</option>
    <option value="60 yrs &amp; up">60 yrs &amp; up</option>
    <option value="Student">Student</option></select>
  </div>  
    
   <div style="width:30%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"><select name="num3" id="num3" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
      <option value="">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19"1>19</option>
      <option value="20">20</option>
    </select></div>
    
     <div style="width:100%;" id="sub3"></div>
    <br style="clear:both"/>
       












<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold;"> <select name="accom4" id="accom4" size="1" class="form-control">
        <option value="">Select Type</option>
    <option value="2nd Class">2nd Class</option><option value="Tourist">Tourist</option><option value="Cabin">Cabin</option><option value="Private Room Suite">Private Room</option></select>
    </div> 
    
    
<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"> <select name="age4" id="age4" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
        <option value="">Select Group</option>
    <option value="Adult">Adult</option>
    <option value="0 to 2 yrs old">0 to 2 yrs old</option>
    <option value="3 to 11 yrs old">3 to 11 yrs old</option>
    <option value="60 yrs &amp; up">60 yrs &amp; up</option>
    <option value="Student">Student</option></select>
  </div>  
    
   <div style="width:30%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"><select name="num4" id="num4" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
      <option value="">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19"1>19</option>
      <option value="20">20</option>
    </select></div>
    
     <div style="width:100%;" id="sub4"></div>
    <br style="clear:both"/>
    

   












<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold;"> <select name="accom5" id="accom5" size="1" class="form-control">
        <option value="">Select Type</option>
    <option value="2nd Class">2nd Class</option><option value="Tourist">Tourist</option><option value="Cabin">Cabin</option><option value="Private Room Suite">Private Room</option></select>
    </div> 
    
    
<div style="width:35%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"> <select name="age5" id="age5" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
        <option value="">Select Group</option>
    <option value="Adult">Adult</option>
    <option value="0 to 2 yrs old">0 to 2 yrs old</option>
    <option value="3 to 11 yrs old">3 to 11 yrs old</option>
    <option value="60 yrs &amp; up">60 yrs &amp; up</option>
    <option value="Student">Student</option></select>
  </div>  
    
   <div style="width:30%; overflow:hidden; float:left; text-align:center; color:#FFF; font-weight:bold"><select name="num5" id="num5" size="1" class="form-control" style="height:50px; font-family: Arial Unicode MS, Lucida Sans Unicode, Code2000, sans-serif;">
      <option value="">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19"1>19</option>
      <option value="20">20</option>
    </select></div>
    
     <div style="width:100%;" id="sub5"></div>
    <br style="clear:both"/>
    





<!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->


















 <!--<input type="button" onClick="jumprates()" value="Send a Copy to Ticketing Outlet"   class="btn btn-primary" />-->



 </div>   <h1 style="width:100%; font-weight:bold; font-size:24px" id="cmtotal"></h1>
 </form> 


 <br>
    <br>
 
 
 <script src="jquery.chained.remote.min.js" charset=utf-8></script> <script charset=utf-8>
$(function(){
  $("#dates-remote-2").remoteChained({
      parents : "#destination-remote-2",
      url : "../json.php"
  });
});
</script>







<p><!--
  <input type="button" onClick="jumptomap()" value="View Ticketing Outlets Location"   class="btn btn-primary" />-->
</p>


</center>

<script>


function jumprates(schedindex){
	//alert(schedindex); 
	location.href = "compute.html";
}

function jumptomap(schedindex){
	//alert(schedindex); 
	location.href = "http://www.buildwebdesign.com/transmap/apps/";
}
</script>