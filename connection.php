<?php
  $dbhost = "localhost";
  $dbuser = "pointerr_foodbank";
  $dbpass = "CVNJB-XVD7X-T392H-RQQTV-9BT4M";
  $dbname = "pointerr_foodbank";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if(mysqli_connect_errno()) 
  {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
    
?>