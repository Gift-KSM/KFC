<?php
include('../connect_db.php');
session_start();
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$sql = "UPDATE `order` SET status = 'กำลังจัดส่ง' WHERE  status = 'กำลังจัดทำ'";

$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

mysqli_close($conn);

if(isset($result)){
    echo 'completed';
}else{
    echo 'fail';
}

?>