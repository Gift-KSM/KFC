<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<!-- style="background-image: url(../img/background1.jpg);" -->
<body style="background-image: url(../img/background1.jpg);background-attachment: fixed;background-size: cover;">
    <div class="container" >
        <br>
        <div class="head">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik Glitch">
            <h3 style="font-size: 3.75rem;">Login</h3>


        </div>
        <br>
        <!-- <hr> -->
        <form action="signin_db.php" method="post" style="width: 40%;">
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
            <div class="mb-3">
                <label for="username" class="form-label" style="font-family:Kanit;">Username</label>
                <input type="username" class="form-control" name="username" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-family:Kanit;">Password</label>
                
                <input type="password" type="password" value="" id="myInput" class="form-control" name="password">
                <br>
                <input type="checkbox" onclick="myFunction()" > Show Password 
            </div>
            <button type="submit" name="signin" class="btn btn-primary" style="background-color: #e10000;border-color: #a50000;">Sign In</button>
        </form>
        <br>
        <!-- <hr> -->

        <p>
        <div class="head">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
            <h3 style="font-family:Kanit;">ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ</h3><a href="index.php" style="font-family:Kanit;font-size: 30px;color: #f30000;">สมัครสมาชิก</a></p>
        </div>

    </div>

</body>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>