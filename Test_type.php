<?php
      include("db/db_config.php");
	  include("db/common.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shotcut icon" href="images/G_logo.png">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php

$query_gournments = "select * from test_type";
	
	$result = mysql_query($query_gournments);
	?> 
	<body>
	<?php include("header.php") ?>
<div id="content">
<div id="about" class="page">
	
	<table border="0"  align="center"  width="100%" cellpadding="25" class="gourments_tbl">

	<?php
	while($row = mysql_fetch_array($result))
	{
	?>
	<tr>
	
	<td><span style="color:#6600CC; font-weight:bold; font-size:18px; margin-top:-1px; text-decoration:none; float:left; width:100px;"><a class="about" href="Test.php?Type_id=<?php echo $row["Type_id"] ?>" style="text-decoration: none"><?php echo $row["Test_type"] ?></a></span></td>
	</tr>
	
	<?php
	}
	?>
	</table>
	</div>
	</div>
</body>
</html>
	