<?php
require("../connect_db.php");
 $id =$_GET["ID"];
 $sql = "DELETE FROM menu WHERE menu_id = '".$id."' ";
 $rs = mysqli_query($conn,$sql);
  
 if (mysqli_affected_rows($conn)){
     header("location:home_admin.php?delete=pass");
     exit();
 }
 mysqli_close($conn);
?>