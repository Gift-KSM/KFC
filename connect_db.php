<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project_kfc";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_error()) {
  echo "Connection failed: " .mysqli_connect_error();
}
    //echo"Connected successfully";
   
?>