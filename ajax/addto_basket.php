<?php
session_start();
include_once '../connect_db.php';
date_default_timezone_set('Asia/Bangkok');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $menu_name = $_POST['name'];
    $total = $_POST['total'];
    $username = $_SESSION['username'];
    $quantity = $_POST['quantity'];
    $status = "กำลังสั่งซื้อ";
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `order` (n_menu,username,quantity,total,status,image,order_date) VALUES('".$_POST['name']."','".$_SESSION['username']."','".$_POST['quantity']."','".$_POST['total']."','กำลังสั่งซื้อ','".$_POST['images']."','$date')";
    $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    // print_r($sql);

    if(isset($result)){
        echo 'completed';
    }else{
        echo 'fail';
    }
    // $itemArray = array($_POST['menu_code']=>array('menu_code'=>$_POST['menu_code'],'menu_name'=>$_POST['name'], 'price'=>$_POST['total']));
    // $_SESSION['name'] = $_POST['name'];
    // $_SESSION['total'] = $_POST['total'];


    // if(!empty($_SESSION["cart_item"])) {
    //     if(in_array($_POST['menu_code'],$_SESSION["cart_item"])) {
    //         foreach($_SESSION["cart_item"] as $k => $v) {
    //                 if($_POST['menu_code'] == $k)
    //                     $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
    //                     $_SESSION["cart_item"][$k]["delivery_charge"] = $_POST["delivery_charge"];
    //                     $_SESSION["cart_item"][$k]["charge"] = $_POST["charge"];
    //                     $_SESSION["cart_item"][$k]["customer"] = $_POST["customer"];
    //                     $_SESSION["cart_item"][$k]["discount"] = $_POST["discount"];
    //         }
    //     } else {
    //         $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
    //     }
    // } else {
    //     $_SESSION["cart_item"] = $itemArray;
    // }
    // print_r($_SESSION);
}

?>