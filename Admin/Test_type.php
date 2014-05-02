<?php
     include("../db/db_config.php");
	 include("../db/common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
       $page_submit = $_REQUEST["btn_add"];
	   $Test_type	= $_REQUEST["Test_type"];
	   $del			= $_REQUEST["del"];
	   $Type_id		= $_REQUEST["Type_id"];
	   
	   $up				= $_REQUEST["up"];

	   if($page_submit != "")
	   {		  
		    $query_insert_state = "Insert into test_type(Test_type) values ('".$Test_type."')";
		  mysql_query($query_insert_state,$conn);
		echo'<script> window.location="Test_type.php"</script>';
		  
		 
	   }
	   
	  
	   if($del == 1)
	   {
	   	$query_del_city = "Delete  from test_type where Type_id = '".$Type_id."'";
		  
		 	 mysql_query($query_del_city,$conn);
		    echo'<script> window.location="Test_type.php"</script>';
	   }
	    if($up == 1)
	   {
	      $msg = "Data Saved Sucessfully";
	   }
	   else if($up == 2)
	   {
	   	  $msg = "Data Deleted Sucessfully";	
	   }
?>
<body>
<form name="form1" id="form1" method="post" action="">
<table width="50%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td>Add Test Type</td>
    <td><input type="text" id="state_name" name="Test_type" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" id="btn_add" name="btn_add" value="Add" onclick="return validate()" /></td>
  </tr>
</table>
<br />
<br />
<div><?php echo $msg ?></div>
<table width="50%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>Test_type</td>
    <td>Action</td>
  </tr>
<?php
         $query_fetch_states = "select * from test_type";
		 $result = mysql_query($query_fetch_states,$conn);
		 
		 while($row = mysql_fetch_array($result))
		 {
?>
  <tr>
    <td><?php echo $row['Test_type'] ?></td>
    <td><a href="#" onclick="delete_state('<?php echo $row['Type_id'] ?>')">Delete</a></td>
  </tr>
<?php
        }
?>
</table>

</form>
</body>
</html>

<script type="text/javascript">

function validate()
{
   var txt_state_name1 = document.getElementById("txt_state_name").value;
   
   if(txt_state_name1 == "")
   {
      alert("Please Enter Test Type");
	  return false;
   }
}

function delete_state(id)
{
   if(confirm("Sure you want to Delete State?"))
   {
      document.location.href = "Test_type.php?del=1&Type_id="+id;
   }
}

</script>
