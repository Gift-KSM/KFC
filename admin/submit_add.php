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
                $insert = $conn->query("INSERT INTO menu (image,n_menu,detail,price,menu_code)VALUES ('" . str_replace('../','',$path) . "','" . $name . "','" . $detail . "','" . $price . "','" . $menu_code . "')");
                echo $insert;
                // echo $insert?'ok':'err';
            }
        } else {
            echo 'invalid';
        }
    }
