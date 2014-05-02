<?php
function page_request($str, $typ=1)
{
 // 1 - $_REQUEST, 2-$_GET, 3-4_POST
 if($typ == 1)
 { 
   $str = $_REQUEST[$str]; 
   $str = str_replace("'","''",$str);
   $str = str_replace("\\","\\\\",$str);
   $str = trim($str);
 }
 return $str; 
}

function make_int($x) 
{
   //return (int)$x;
   if((string)((int)$x+0) == $x)
   {
     return $x;
   }
   return 0;
}


function header_redirect($str, $ext=1)
{
  header("Location: ". $str);
  if($ext == 1)
  {
   exit(0);
  }
}

function e($echo_str, $is_exit=0)
{
  echo $echo_str;
  
  if($is_exit == 1)
  {
    exit(0);
  }
}


function run_query($query, $show_query = 0)
{
  if($show_query == 1)
  {
    e($query);
  }
  else if($show_query == 2)
  {
    e($query,1);
  } 
  
  $result = mysql_query($query);
  return $result; 
}

function get_inserted_id()
{
  return mysql_insert_id();
}

function get_field($query, $show_query = 0)
{
  if($show_query == 1)
  {
    e($query);
  }
  else if($show_query == 2)
  {
    e($query,1);
  }
  
  $result = run_query($query);
  $row = mysql_fetch_array($result);
  return $row[0];
}

function get_row($query, $show_query = 0)
{
  if($show_query == 1)
  {
    e($query);
  }
  else if($show_query == 2)
  {
    e($query,1);
  }
  
  $result = run_query($query);
  $row = mysql_fetch_array($result);
  return $row;
}

function has_rows($result)
{
  return make_int(mysql_num_rows($result));
}

function make_dropdown($name,$id,$table_name,$field_val,$field_name,$wh_cls,$select_val,$default_select_name,$cssclass, $show_query=0, $other="")
{
  $ret_str = "";
  $ret_str = "<select name=\"$name\" id=\"$id\" class=\"$cssclass\" $other>";
  $ret_str = $ret_str . "<option value=\"0\">$default_select_name</option>";
  $query = "select $field_val,$field_name from $table_name where 1=1 $wh_cls";
  
  if($show_query == 1)
  {
    e($query);
  }
  else if($show_query == 2)
  {
    e($query,1);
  }
  
  $result = run_query($query);
  while($row = mysql_fetch_array($result))
  {
    $sel = "";
    if($row[0] == $select_val)
    {
      $sel = "selected=\"selected\"";
    }
    $ret_str = $ret_str . "<option value=\"$row[0]\" $sel>$row[1]</option>";
  }
  $ret_str = $ret_str . "</select>";
  return $ret_str;
}
 

function make_dropdown_query($drop_name, $query, $select_val, $cssclss, $default_select_name = "Select", $show_query=0)
{
  $ret_str = "";
  $ret_str = "<select name=\"$drop_name\" id=\"$drop_name\" class=\"$cssclass\">";
  $ret_str = $ret_str . "<option value=\"0\">$default_select_name</option>";
  
  if($show_query == 1)
  {
    e($query);
  }
  else if($show_query == 2)
  {
    e($query,1);
  }
  
  $result = run_query($query);
  while($row = mysql_fetch_array($result))
  {
    $sel = "";
    if($row[0] == $select_val)
    {
      $sel = "selected=\"selected\"";
    }
    $ret_str = $ret_str . "<option value=\"$row[0]\" $sel>$row[1]</option>";
  }
  $ret_str = $ret_str . "</select>";
  return $ret_str;
}



function get_session_value($str)
{
  make_int($_SESSION[$str]);
}

function check_module_security($module_no, $is_echo=0)
{
  if($is_echo == 1)
  {
	  e("-2",1);
  }
}

function validate_user_session($is_echo=0)
{
  if(make_int($_SESSION["user_id"]) == 0)
  {
    if($is_echo == 1)
	{
	  e("-1",1);
	}
    header_redirect("login.php?session_out=1",1);
  }
}


function get_user_session()
{
  return make_int($_SESSION["user_id"]);
  //return 1;
}

function get_active_status($num)
{
  $ret_str = "Blocked";
  
  if($num == 1)
  {
    $ret_str = "Active";
  }
  return $ret_str;
}

function get_cleared_status($num)
{
  $ret_str = "No";
  
  if($num == 1)
  {
    $ret_str = "Yes";
  }
  return $ret_str;
}

function get_admin_page_size()
{
  return 20;
}

function make_db_date($date)
{
  $ret_date = "0000-00-00";
  $date_split = explode("-",$date);
  if(count($date_split) == 3)
  {
    $ret_date = $date_split[2] ."-". $date_split[1] ."-". $date_split[0];
  }
  
  return $ret_date;
}


function make_db_datetime($date)
{
  $ret_date_time = "0000-00-00 00:00:00";
  $date_time_split = explode(" ",$date);
  
  if(count($date_time_split) == 2)
  {
      $date_split = explode("-",$date_time_split[0]);
      if(count($date_split) == 3)
      {
        $ret_date = $date_split[2] ."-". $date_split[1] ."-". $date_split[0]. " ". $date_time_split[1];
      }
  }
  return $ret_date_time;
}

function get_ip_address()
{
  return $_SERVER['REMOTE_ADDR'];
}
?>