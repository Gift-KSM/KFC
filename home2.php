<?php
include 'header.php';
include 'body_user.php';

?>


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
<main>
    <header class="row tm-welcome-section" style="margin-bottom: 0px;">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="/lib/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <h2 class="col-12 text-center tm-section-title" style="font-size: 3.00rem;font-family: Lobster;">Welcome to KFC Delivery</h2>
        <!-- <p class="col-12 text-center">Total 3 HTML pages are included in this template. Header image has a parallax effect. You can feel free to download, edit and use this TemplateMo layout for your commercial or non-commercial websites.</p> -->
    </header>

    <div class="row" id="rin" style="padding-left : 140px"></div>
</main>
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
        <!-- <div class="containerbtn">
            <button class="btn" style="top:-60px;" onclick="to_login()">SHOP NOW</button>
        </div> -->
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

</div>

</html>
<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var myIndex = 0;
    carousel();
    var slideIndex = 1;

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