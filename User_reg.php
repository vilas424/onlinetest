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

function validate()
{

  var first_name 	= document.getElementById("first_name").value;
 	
  var	email       = document.getElementById("email").value;
 
  
  
  var	user_id 	= document.getElementById("user_id").value;
  var	pwd 		= document.getElementById("pwd").value;
  var	confirm_pwd = document.getElementById("confirm_pwd").value;
  
  var namePat=/^[A-Z a-z]{6,25}$/;
  

  if(first_name == "")
	{
	   alert("Please Enter First Name");
	   document.getElementById("first_name").focus();
	   return false;
	}
	
	
	
	if(!namePat.test(first_name))
	{
	
	alert("Enter Minimum 6 Characters");
	return false;
	}
  
    if(document.getElementById("email").value == "")
	{
	   alert("Please Enter Email ID");
	   document.getElementById("email").focus();
	   return false;
	}
	
	var reg = /^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$/;
	if(reg.test(email) == false)
	{
	alert("Enter Valid Email");
	return false;
	}
if(user_id == "")
	{
	   alert("Please Enter User ID");
	    document.getElementById("user_id").focus();
	   return false;
	}
	if(pwd == "")
	{
	   alert("Please Enter Password");
	    document.getElementById("pwd").focus();
	   return false;
	}
	if(confirm_pwd == "")
	{
	   alert("Please Confirm Passowrd");
	    document.getElementById("confirm_pwd").focus();
	   return false;
	}
	
	if(pwd != confirm_pwd)
	{
		alert("Please Confirm the Password Correctly");
		document.getElementById("confirm_pwd").focus();
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
		   /* alert(xmlhttp1.responseText);*/
				if(xmlhttp1.responseText == 0)
				{
				   alert("User ID Already Exists");
				   
				}
				else if(xmlhttp1.responseText == 1)
				{
				 		 alert("User Registered Sucessfully");
				  		 document.location.href = "Index.php";
				}
				 /*document.getElementById("div_city").innerHTML = xmlhttp.responseText;*/
		}
  	}
/*alert("ajax/ajax_add_user.php?first_name="+first_name+"&last_name="+last_name+"&mobile="+mobile+"&email="+email+"&state_id="+state_id+"&city_id="+city_id+"&address="+address+"&pin="+pin+"&reg_city_id="+reg_city_id+"&user_id="+user_id+"&pwd="+pwd+"&confirm_pwd="+confirm_pwd);*/
		
	xmlhttp1.open("GET","ajax/ajax_add_user.php?first_name="+first_name+"&email="+email+"&user_id="+user_id+"&pwd="+pwd+"&confirm_pwd="+confirm_pwd,true);
	xmlhttp1.send();
}

</script>

<body>
<?php include("header.php") ?>
<div id="content">
<div id="about" class="page">
	<div class="login_header"><p>Registration</p></div>
		<div class="left_right" style=" font-family:Arial, Helvetica, sans-serif; font-size:12px;">
		<form name="form1" id="form1" action="" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr>
		<td colspan="2">&nbsp;</td>
		</tr>
  <tr>
    <td>Full Name</td>
    <td><input type="text" id="first_name" name="first_name" /></td>
  </tr>
  <tr>
		<td colspan="2">&nbsp;</td>
		</tr>
  

  <tr>
    <td>Email</td>
    <td><input type="text" id="email" name="email" /></td>
  </tr>
   <tr>
		<td colspan="2">&nbsp;</td>
		</tr>
  
  <tr>
    <td>User ID</td>
    <td><input type="text" id="user_id" name="user_id" /></td>
  </tr>
   <tr>
		<td colspan="2">&nbsp;</td>
		</tr>
  <tr>
    <td>Password</td>
    <td><input type="password" id="pwd" name="pwd" /></td>
  </tr>
   <tr>
		<td colspan="2">&nbsp;</td>
		</tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" id="confirm_pwd" name="confirm_pwd" /></td>
  </tr>
   <tr>
		<td colspan="2">&nbsp;</td>
		</tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="#" onclick="return validate();"><img src="images/register.png" width="75" height="30" /></a>&nbsp;<a href="#"  ><img src="images/cancel.png" width="75" height="30"  onclick="disablePopup()"/></a></td>
  </tr>
</table>
</form>
</div>
</div>
</body>
</html>