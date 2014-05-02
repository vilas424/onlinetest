<?php		
	 include("../db/db_config.php");
	 include("../db/common.php");

	 $first_name   = get_request(first_name);
	
     
	 $email 	   = get_request(email);
	
	 
	 $user_id	   = get_request(user_id);
	 $pwd		   = get_request(pwd);	
	 

      $query_user_check = "SELECT u_id from user_id where user_id = '".$user_id."'";
	 
	  $result = mysql_query($query_user_check);
	  
	  if($row = mysql_fetch_array($result))
	  {
	     echo "0";
		    
	  }
	  else
		  {
		     $query_insert = "Insert into user_info(f_name,email) values ('".$first_name."','".$email."')";
            
			 mysql_query($query_insert);
			 $last_user_id = mysql_insert_id();
			 
			 $query_insert_user_id = "Insert into user_id(id,user_id,password) values ('".$last_user_id."','".$user_id."','".$pwd."')";
			 mysql_query($query_insert_user_id);
			 
			 
			
				
				echo "1";
		  
		  }  

?>