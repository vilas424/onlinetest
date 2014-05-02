<?php
		session_start();
		$conn = mysql_connect("localhost","root","root");
		if($conn)
		{
		  	
			mysql_select_db("online_test",$conn);
			
		}
		else
		{
			echo "DisConnected";
		}
?>

