<meta charset="utf-8">
<?php
include('../connect_db.php');

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone_num = $_POST["phone_num"];
$user_name = $_POST["user_name"];


$sql = "UPDATE users SET name_user = '$name',last_name = '$lastname', email = '$email', address = '$address', phone_number = '$phone_num' WHERE username='$user_name'";

echo $sql;
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

// if ($result) {
//     echo "<script type='text/javascript'>";
//     echo "alert('แก้ไขข้อมูลสำเร็จ');";
//     echo "window.location = 'index.php?act=edit';";
//     echo "</script>";
// } else {
//     echo "<script type='text/javascript'>";
//     echo "window.location = 'member.php';";
//     echo "</script>";
// }
?>