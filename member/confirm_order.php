<?php
include('../connect_db.php');

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$order_id = $_POST["get_order_id"];


$sql = "UPDATE `order` SET status = 'จัดส่งเรียบร้อย' WHERE order_id = '$order_id'";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);

if(isset($result)){
    echo 'completed';
}else{
    echo 'fail';
}

?>