<?php
      include("db/db_config.php");
	  include("db/common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shotcut icon" href="images/G_logo.png">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">



function call_login()
{

    var user_name = document.getElementById("user_name").value;
	 var pass_word = document.getElementById("pass_word").value;
	 
	 if(user_name == "")
	{
	   alert("Please Enter User Name");
	    document.getElementById("user_name").focus();
	   return false;
	}
	if(pass_word == "")
	{
	   alert("Please Enter Password");
	    document.getElementById("pass_word").focus();
	   return false;
	}
	
	if (window.XMLHttpRequest)
	{
	  	xmlhttp1=new XMLHttpRequest();
	}
	else
  	{// code for IE6, IE5
  		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp1.onreadystatechange=function()
  	{
	  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
		   
				if(xmlhttp1.responseText == 0)
				{
				   alert("Invalid Login Details");
				   
				}
				else if(xmlhttp1.responseText > 1)
				{
				 		 /*alert("User Registered Sucessfully");*/
				  		 document.location.href = "Test_type.php";
				}
				 /*document.getElementById("div_city").innerHTML = xmlhttp.responseText;*/
		}
  	}
	/*alert("ajax/ajax_user_login.php?user_name="+user_name+"&pass_word="+pass_word);*/
	xmlhttp1.open("GET","ajax/ajax_user_login.php?user_name="+user_name+"&pass_word="+pass_word,true);
	xmlhttp1.send();
}
</script>
<body>
<?php include("header.php") ?>
<div id="content">
<div id="about" class="page">
<div id="login_popup">
<div class="user_login_wrapper"><!---1--->
		<div class="user_login_top"></div>
		<div class="user_login_middle"><!---2--->
			<table width="70%" border="0" class="user_login_TBL" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>User Id :</p></td>
    <td><input type="text" id="user_name" name="user_name" /></td>
  </tr>
  <tr>
    <td><p>Password :</p></td>
    <td><input type="password" id="pass_word" name="pass_word" /></td>
  </tr>
  
  <tr>
  <td></td>
  <td><a href="#"><img src="images/login.png" width="64" height="27" border="0" style="padding-right:10px;" onclick="call_login();" /></a><a href="javascript:ret()"><img src="images/cancel.png" width="64"  height="27" border="0" onclick="disable_login_popup()" /></a></td>
   </tr>
  
  		<tr> 
      	<td></td>
		<td></td>
		</tr>
  		
		<tr> 
      	<td></td>
		<td></td>
		</tr>	
  
 		<tr> 
      	<td colspan="2"><span style="font-size:12px; padding-top:10px; color:#00FF66; font-family:Arial, Helvetica, sans-serif;">Forgotten Password<a href="#" style="color:#00FFFF; text-decoration:none;"> Click Here !</a></span></td>
    	</tr>
</table>

		
		</div><!---2--->
		<div class="user_login_bottom"></div>
	
	
	
	
	
	</div><!---1--->
	</div>