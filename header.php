<?php
session_start();
if(isset($_SESSION['user_name']))
		{		
			  if(empty($_SESSION['user_name']) || $_SESSION['user_name'] == "0")
			  {
				   header("Location:Test_type.php");
			  }
			  else
			  {
					$usr_id=$_SESSION['user_name'];
			  		$id=$_SESSION['user_logged_id'];
					
					
			  }
		}
		else
		{
		    
		}
         
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Cardex - Personal site template</title>
		<!------------------style and script for dropdown list end------>

<style type="text/css">





h1 { text-align: center; padding: 0 0 0.25em 0; margin: 0; }
ul { list-style: none; padding: 0; margin: 0;  margin-top:20px; margin-left:-50px; }
#drop a { font-weight: bold; color:#800000 ; }
#drop a { text-decoration: none;  }
#drop li li a { display: block; font-weight: normal; color: white; padding: 0.2em 10px; }
#drop li li a:hover { padding: 0.2em 5px; border: 5px solid #7d6340; border-width: 0 5px; }
#drop li { float: left; position: relative; width: 10em; text-align: left; cursor: default;  }
li ul { display: none; position: absolute; top: 100%;font-weight: normal; background: #800000; 	padding: 0.5em 0 1em 0;}
li>ul { top: auto; margin-top:0.1px; }
#drop li li { display: block; float: none; background-color: transparent; border: 0; text-align:center;}
#drop li:hover ul, li.over ul { display: block; }

</style>



<script type="text/javascript"><!--

startList = function() {
	if (document.all&&document.getElementById) {
		navRoot = document.getElementById("nav");
		for (i=0; i<navRoot.childNodes.length; i++) {
			node = navRoot.childNodes[i];
			if (node.nodeName=="LI") {
				node.onmouseover=function() {
					this.className+=" over";
				}
				node.onmouseout=function() {
					this.className=this.className.replace(" over", "");
				}
			}
		}
	}
}
window.onload=startList;

//--></script>
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

<!------------------style and script for dropdown list------>

<!---style for select box--------->
<style>
.styled-select {
width: 160px;
height: 34px;
overflow: hidden;

border-radius: 10px;
}
.styled-select select {

width: 160px;
padding: 5px;
border: 1px solid #CCC;
font-size: 16px;
height: 34px;
font-weight: bold;
outline:0px;
-webkit-appearance: none;
border-radius: 10px;
}
.styled-select option {
background: lightgrey;

border: 0px solid #CCC;
font-size: 12px;
height: 25px;
outline:0px;

}
</style>
<!---style for select box end--------->



		<link rel="stylesheet" type="text/css" href="style.css" media="screen">
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="ie.css" media="screen">
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="lightbox.css" media="screen">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/Desyrel_400.font.js"></script>
		
		<!-- Cufon text replacement -->
		<script type="text/javascript">
			$(document).ready(function(){
				Cufon.replace('#about .right ul li');
				Cufon.replace('h2', { textShadow: '0 2px rgba(0, 0, 0, 0.15)' });
				Cufon.replace('#social .right a', {hover:true});
				Cufon.replace('#work .left h3', {hover:true});
				Cufon.replace('h3', { textShadow: '0 2px rgba(0, 0, 0, 0.15)' });
				Cufon.replace('#contactinfo'), {hover:true};
			});
		</script>
		
		<!-- jQuery lightbox -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('#work .right a').lightBox();
			});
		</script>
		
		<!-- Navigation and Content effects -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.page').hide();
				$('#navigation li:first').addClass('active').show();
				$('.page:first').show();
				
				$('#navigation li').click(function(){
					$('#navigation li').removeClass('active');
					$(this).addClass('active');
					
					$('.page').hide();
					var activeTab = $(this).find('a').attr('href');
					$(activeTab).fadeIn('slow');
					return false;
				});
			});
		</script>

	</head>
	<body>
<body>
<div id="header">
				<div class="header_loginbx">
		  <?php if(empty($_SESSION['user_name']) || $_SESSION['user_name'] == "0")
			  {?>
			<a href="User_reg.php"><img src="images/register.png" width="95" height="34" border="0" onclick="call_popup()" /></a>
			<a href="Login.php"><img src="images/login.png" width="95" height="34" border="0" onclick="call_login_popup()" /></a>	 
			<?php } 			 
			 else
			  {
					?>
					<div class="welcome"><span style="font-style:italic;font-size:20px;font-weight:bold;">Welcome,&nbsp; </span></div>
					
					<ul id="drop">
<li id="first" class="drop">
<div><a href="profile.php?user_id=<?php echo $id ?>"><?php echo($_SESSION['user_name']);?></a></div><ul>
					
					<li class="drop"><a href="Edit_user.php?user_id=<?php echo $id ?>">Manage Account</a></li>
			  		<li class="drop"><a href="logout.php">Logout</a></li>
					</ul>




</div>
<?php
}
?>
	
		
		
		
		
	
</div>
	<div class="login_bottom"></div>

</div><!---1--->
	</div>
	<!--<div id="backgroundPopup"></div>-->
<!--pop up Ends-->

<!--Login Pop Up Starts-->

	
</body>
</html>