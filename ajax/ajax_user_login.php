<?php		
	 include("../db/db_config.php");
	 include("../db/common.php");
	 
	/* session_start();*/
	 $user_name   = get_request(user_name);
	 $pass_word    = get_request(pass_word);
	 
	 $query_login = "select * from user_id where user_id ='".$user_name."' and password = '".$pass_word."'";
	/* echo($query_login);*/
	 $result = mysql_query($query_login);
	 
	 if($row = mysql_fetch_array($result))
	 {
	     
		 $_SESSION['user_logged_id'] = $row["id"];
		 $_SESSION['user_name'] 	 = $row["user_id"];
		 
		 echo  $row["id"];
		 echo "1";
		
	 }
	 else
	 {
	    
	 }
	 
?>