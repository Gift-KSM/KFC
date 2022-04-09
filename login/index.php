<?php

session_start();
require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System PDO</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet"> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-image: url(../img/background1.jpg);background-attachment: fixed;background-size: cover;">

    <div class="container"><br>
        <h3 class="register" style="margin-top: 10px;font-size: 2.75rem;">Register</h3>
        <br>

        <form action="signup_db.php" method="post" style="width: 40%;">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="username" class="form-label" style="font-family:Kanit;">Username</label>
                <input type="username" class="form-control" id="username" name="username" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="font-family:Kanit;">Email</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-family:Kanit;">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="confirm password" class="form-label" style="font-family:Kanit;">Confirm Password</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <div class="mb-3">
                <label for="name_user" class="form-label" style="font-family:Kanit;">Name</label>
                <input type="text" class="form-control" name="name_user" aria-describedby="name_user">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label" style="font-family:Kanit;">Last name</label>
                <input type="text" class="form-control" name="last_name" aria-describedby="last_name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label" style="font-family:Kanit;">Address</label>
                <input type="text" class="form-control" name="address" aria-describedby="address">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label" style="font-family:Kanit;">Phone number</label>
                <input type="text" class="form-control" name="phone_number" aria-describedby="phone_number">
            </div>
            <button type="submit" name="signup" class="btn btn-primary" style="background-color: #e10000;border-color: #a50000;">Sign Up</button>
        </form>
        <br>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
        <p style="font-family:Kanit;text-align:center;font-size:30px">เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signin.php" style="color: #f30000;">เข้าสู่ระบบ</a></p>
    </div>

</body>

</html>