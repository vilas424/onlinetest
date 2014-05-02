<?php
     include("../db/db_config.php");
	 include("../db/common.php");
	 /* validate_admin_session();*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
	   $msg = "";	
       $page_submit 	= $_REQUEST["btn_add"];
	   $del				= $_REQUEST["del"];
	   $question		= $_REQUEST["question"];
	   $Type_id			= $_REQUEST["Type_id"];
	   $opt1   			= $_REQUEST["opt1"];
	   $opt2   			= $_REQUEST["opt2"];
	   $opt3  			= $_REQUEST["opt3"];
	   $opt4   			= $_REQUEST["opt4"];
	   $ans  			= $_REQUEST["ans"];
	   $up				= $_REQUEST["up"];
	   $Que_id				= $_REQUEST["Que_id"];

	   if($page_submit != "")
	   {
		  
		  $query_insert_que = "Insert into questions(Type_id,Question,Opt_a,Opt_b,Opt_c,Opt_d,Ans) values ('".$Type_id."','".$question."','".$opt1."','".$opt2."','".$opt3."','".$opt4."','".$ans."')";
		  mysql_query($query_insert_que,$conn);
		  
		  $last_que_id = mysql_insert_id();
			 
			 $query_insert_user_id = "Insert into opt_table(Que_id,Opt_a,Opt_b,Opt_c,Opt_d,Ans) values ('".$last_que_id."','".$opt1."','".$opt2."','".$opt3."','".$opt4."','".$ans."')";
			 mysql_query($query_insert_user_id);
		  
		  
		  
		  echo'<script> window.location="Add_que.php"</script>';
	   }
	   
	   if($del == 1)
	   {
	   
		  $query_del_opt = "Delete  from opt_table where Que_id = '".$Que_id."'";
		  mysql_query($query_del_opt,$conn);
			
	      $query_del_que = "Delete  from questions where Que_id = '".$Que_id."'";
		  mysql_query($query_del_que,$conn);
		  
		  
		  
		  
		   echo'<script> window.location="Add_que.php"</script>';	
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
    <td>Test Type</td>
    <td>
	  <select id="Type_id" name="Type_id">
	  <option value="">Select type</option>
	  <?php
	    	$query_state = "select * from test_type";
	  		$result = mysql_query($query_state,$conn);
			while($row = mysql_fetch_array($result))
	  	    {
	   ?>	
	   <option value="<?php echo $row['Type_id'] ?>"><?php echo $row['Test_type'] ?></option>	
 	   <?php
	        } 
	   ?>		
	  </select>
	</td>
  </tr>
  <tr>
		<td>Enter Question here </td>
		<td><input type="text" name="question"  id="question"/></td>
		</tr>
		<tr>
		<td>Enter First option</td>
		<td><input type="text" name="opt1" id="opt1" /></td>
		</tr>
		<tr>
		<td>Enter Second option</td>
		<td><input type="text" name="opt2" id="opt2" /></td>
		</tr>
		<tr>
		<td>Enter Third option</td>
		<td><input type="text" name="opt3" id="opt3" /></td>
		</tr>
		<tr>
		<td>Enter Fourth option</td>
		<td><input type="text" name="opt4" id="opt4" /></td>
		</tr>
		<tr>
		<td>Select Right Option code</td>
		<td><select name="ans" id="ans">
		<option value="a">A</option>
		<option value="b">B</option>
		<option value="c">C</option>
		<option value="d">D</option>
		</select>
		</td>

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
    <td>Question</td>
    <td>Test Type</td>
    <td>Action</td>
  </tr>
  <?php
         $query_fetch_cities = "select Que_id,(select Test_type from test_type where Type_id = a.Type_id) as Test_type,question from questions a order by Que_id desc";
		 $result = mysql_query($query_fetch_cities,$conn);
		 
		 while($row = mysql_fetch_array($result))
		 {
  ?>
  <tr>
    <td><?php echo $row['Test_type'] ?></td>
    <td><?php echo $row['question'] ?></td>
    <td><a href="#" onclick="delete_city('<?php echo $row['Que_id'] ?>')">Delete</a></td>
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
   var quetion = document.getElementById("quetion").value;
   
   if(quetion == "")
   {
      alert("Please Enter quetion");
	  return false;
   }
}

function delete_city(id)
{
   if(confirm("Sure you want to Delete Question?"))
   {
      document.location.href = "Add_que.php?del=1&Que_id="+id;
   }
}

</script>
