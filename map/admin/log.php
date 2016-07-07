<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background: url(images/login.jpg) no-repeat top center;
}
-->
</style>
<?php 
//include '../konfig.php';


echo '<div style="padding-top:235px; color:#fff;"><center><form name="nstic" action="'.$siteaddress.'" method="post">
<input type="hidden" name="op" value="access" />
<table width="22" border="0">
  <tr>
    <td>Username</td>
    <td><input type="text" name="username" id="username"></td>
  </tr>
 <tr>
    <td>Password</td>
    <td><input type="password" name="pass" id="pass"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right">
      <input type="submit" name="button" id="button" value="Submit">
    </div></td>
  </tr>
</table> 
</form><span style="color:#fff; font-size:11px"></span></center></div>';

?>
