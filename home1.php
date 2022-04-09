<?php
include 'header.php';
// include 'body.php';
// include '1.php';


?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<style>
    .mySlides {
        display: none;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #CD0000;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 20px 25px;
        text-decoration: none;
        font-size: 25px;
    }

    .topnav a:hover {
        background-color: #CC0000;
        color: black;
    }

    .topnav a.active {
        background-color: black;
        color: white;
    }

    .containerbtn {
        position: relative;
        width: 100%;
        /* max-width: 400px; */
    }

    .containerbtn .btn {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #CC0000;
        color: white;
        font-size: 25px;
        padding: 18px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }

    .containerbtn .btn:hover {
        background-color: black;
    }
</style>

</body>
<!-- Begin head nav bar -->
<div class="container-fluid">
    <!-- Top box -->
    <!-- Logo & Site Name -->
    <div class="placeholder">
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/KFC1.jpg">
            <div class="tm-header">
                <div class="row tm-header-inner">
                    <div class="col-md-6 col-12">
                        <img style="margin-right: 40px; margin-top: 100px;" src="img/logo_kfc.png" alt="Logo" class="tm-site-logo" />
                        <div class="tm-site-text-box">
                            <h1 class="tm-site-title" style="font-size: 5.2rem; margin-bottom: -20px;">KFC Delivery</h1>
                        </div>
                    </div>
                    <!-- <nav class="col-md-6 col-12 tm-nav" style="margin-top: 150px;">
                        <ul class="tm-nav-ul">
                            <li class="tm-nav-li"><a href="home1.php" class="tm-nav-link active">Home</a></li>
                            <li class="tm-nav-li"><a href="menu.php" class="tm-nav-link active">MENU</a></li>
                            <li class="tm-nav-li"><a href="login/signin.php" class="tm-nav-link">Login Now</a></li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="topnav">
        <a class="active" href="home1.php" class=".topnav a:hover">HOME</a>
        <a class="active" href="menu.php" class=".topnav a:hover">MENU</a>
        <a class="active" href="login/signin.php" class=".topnav a:hover">LOGIN NOW</a>
        <!-- <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a> -->
    </div>
</div>
<!-- End nhead nav bar -->

<!-- Begin Content -->
<div class="container-fluid">


    <div class="row">

        <div class="col-12" style="margin-top:7px;">
            <img class="mySlides" src="img/KFCn10.jpg" style="width:100%">
            <img class="mySlides" src="img/KFCn7.jpg" style="width:100%">
            <img class="mySlides" src="img/KFCn9.jpg" style="width:100%">
            <!-- <img class="mySlides" src="img/KFCn12.png" style="width:100%"> -->
            <img class="mySlides" src="img/KFCn11.jpg" style="width:100%">
        </div>
        <div class="containerbtn">
            <button class="btn" style="top:-60px;" onclick="to_login()">SHOP NOW</button>
        </div>
        <div class="col-12">
            <picture>
                <div class="container" style="padding-left: 16spx;margin-top: 12px;">
                    <img src="img/K2.jpg" style="margin-right: 8px;" class="" alt="images">
                    <img src="img/K3.jpg" style="margin-right: 8px;" class="" alt="images">
                    <img src="img/K1.jpg" class="" alt="images">

                </div>
            </picture>
        </div>
    </div>

</div>
<!-- End Content -->

<body>




    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function to_login(){
            window.location = "http://localhost/project_kfc/login/signin.php";    
        }
        function button() {

            Swal.fire({
                title: 'คุณยังไม่ได้เข้าสู่ระบบ คุณต้องการเข้าสู่ระบบหรือไม่',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'ใช่',
                denyButtonText: `ไม่ใช่`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Swal.fire('Saved!', '', 'success')
                    // var win = window.open('http://localhost/project_kfc/login/signin.php');
                    // if (win) {
                    // win.focus();
                    // }
                    window.location.href = "http://localhost/project_kfc/login/signin.php";
                }
                // else if (result.isDenied) {
                //     Swal.fire('Changes are not saved', '', 'info')
                // }
            })
        }

        var myIndex = 0;
        carousel();
        var slideIndex = 1;
        // showDivs(slideIndex);

        // function plusDivs(n) {
        //     showDivs(slideIndex += n);
        // }

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>