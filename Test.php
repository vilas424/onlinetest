<?php
      include("db/db_config.php");
	  include("db/common.php");
	  
	  $Type_id = $_REQUEST["Type_id"];
	  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shotcut icon" href="images/G_logo.png">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<body>
<?php include("header.php") ?>
<div id="content">
<div id="about" class="page">

<?php



$query_type = "select * from questions where Type_id='".$Type_id. "'";
$result = mysql_query($query_type);
?> 
<table border="0"  align="center"  width="100%" cellpadding="1" class="gourments_tbl">
	<?php
	while($row = mysql_fetch_array($result))
	{
		$i = $i + 1;
		$Que_id=$row["Que_id"];
	?>
	<tr>
	
	<td><span style="font-size:18px;font-weight:bold;"><?php echo $i ;?>)<?php echo $row["Question"] ?></span></td>
	</tr>
	<tr>
	<td><input type="radio" value="a" id=" opt1" name="<?php echo $row["Que_id"] ?>"><?php echo $row["Opt_a"] ?></td></tr>
	<tr><td><input type="radio" value="b" id="opt2" name="<?php echo $row["Que_id"] ?>"><?php echo $row["Opt_b"] ?></td></tr>
	<tr><td><input type="radio" value="c" id="opt3" name="<?php echo $row["Que_id"] ?>"><?php echo $row["Opt_c"] ?></td></tr>
	<tr><td><input type="radio" value="d" id="opt3" name="<?php echo $row["Que_id"] ?>"><?php echo $row["Opt_d"] ?></td>
	
	
	</tr>
	<?php
	}
	?>
	
	<tr><td><a class="about" href="#about"><span style="font-size:24px;font-weight:bold;">Submit</span></a></td></tr>
	</table>
	</div>
	</div>
	
</body>
</html>