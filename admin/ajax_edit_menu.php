<?php
require("../connect_db.php");
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
    $path = '../uploads/'; // upload directory
    if (!empty($_POST['name']) || $_FILES['image'] || !empty($_POST['detail']) || !empty($_POST['price'])) {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000, 1000000) . $img;
        // check's valid format
        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);
            if (move_uploaded_file($tmp, $path)) {
                echo "<img src='$path' />";
                $name = $_POST['name'];
                $detail = $_POST['detail'];
                $price = $_POST['price'];
                $menu_code = $_POST['menu_code'];
                $sql = "UPDATE `menu` SET `image` = '".str_replace('../','',$path)."', n_menu = '".$name."', detail = '".$detail."', price = '".$price."' WHERE menu_code = '".$menu_code."'";
                echo $sql;
                $query = mysqli_query($conn, $sql);
                $sql_order = "UPDATE `order` SET `image` = '".str_replace('../','',$path)."' WHERE `image` = '".str_replace('../','',$path)."'";
                echo $sql_order;
                $query = mysqli_query($conn, $sql_order);
                
                // $insert = $conn->query("INSERT INTO menu (image,n_menu,detail,price)VALUES ('" . str_replace('../','',$path) . "','" . $name . "','" . $detail . "','" . $price . "','" . $menu_code . "')");
                // $update = $conn->query("UPDATE `menu` SET `image` = '".str_replace('../','',$path)."', n_menu = '".$name."', detail = '".$detail."', price = '".$price."' WHERE menu_code = '".$menu_code."'");
                // $update_order = $conn->query("UPDATE `order` SET `image` = '".str_replace('../','',$path)."' WHERE `image` = '".str_replace('../','',$path)."'");
                // echo $update;
                // echo $insert?'ok':'err';
            }
        } else {
            echo 'invalid';
        }
    }
