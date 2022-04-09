<?php
include('header.php');
// include('../body.php');
session_start();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
        <!-- Top box -->
        <!-- Logo & Site Name -->
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" id="img_head" style="background-image:url(../img/KFC1.jpg)">
                <div class="tm-header">
                    <div class="row tm-header-inner">
                        <div class="col-md-6 col-12">
                            <img style="margin-right: 40px; margin-bottom: 44px;" src="../img/logo_kfc.png" alt="Logo" class="tm-site-logo" />
                            <div class="tm-site-text-box">
                                <h1 class="tm-site-title" style="font-size: 5.2rem; margin-bottom: -20px;">KFC Delivery</h1>
                            </div>
                        </div>
                        <!-- <nav class="col-md-6 col-12 tm-nav" style="margin-top: 150px;">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="../home_user.php" class="tm-nav-link active">Home</a></li>
                            </ul>
                        </nav> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
        <div class="topnav" style="overflow: hidden; background-color: #CD0000;">
            <a class="active" href="../home_user.php" class=".topnav a:hover">MENU</a>
            <a class="active" href="home_member.php" class=".topnav a:hover">SETTING</a>
            <!-- <a class="active" href="#" class=".topnav a:hover">BASKET</a> -->
            <a class="active" href="../logout.php" class=".topnav a:hover">LOGOUT</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3" style="padding-top: 20px;">
                <div class="list-group" style="width: 75%;">
                    <a href="home_member.php" class="list-group-item active">
                        Follow
                    </a>
                    <a href="home_member.php?act=edit" class="list-group-item">
                        Edit Profile
                    </a>
                    <a href="home_member.php?act=pwd" class="list-group-item">
                        Edit Password
                    </a>
                    <a href="logout.php" class="list-group-item list-group-item-danger">
                        Logout
                    </a>
                </div>
            </div>
            <div class="col-9 align-self-center" style="padding-top: 20px;">
                <?php
                $act = (isset($_GET['act']) ? $_GET['act'] : '');
                if ($act == 'edit') {
                    include('member_form_edit.php');
                } elseif ($act == 'pwd') {
                    include('member_from_rwd.php');
                } else {
                    echo '<nav class="navbar navbar-light bg-light" style="width: 85%">
                            <div class="row justify-content-center" style="width: 100%">
                                <form class="form-inline" action="" method="post" enctype="multipart/from-data">
                                    <div class="col" style="text-align: center;">
                                        <button id="watting" onclick="load_order(id);" class="btn btn-sm btn-outline-primary" type="button">ตะกร้าสินค้า</button>
                                    </div>
                                    <div class="col" style="text-align: center;">
                                        <button id="shipping" onclick="load_order(id);" class="btn btn-sm btn-outline-info" type="button">กำลังจัดส่ง</button>
                                    </div>
                                    <div class="col" style="text-align: center;">
                                        <button id="compl" onclick="load_order(id);" class="btn btn-sm btn-outline-success" type="button">จัดส่งเรียบร้อย</button>
                                    </div>
                                </form>
                            </div>
                        </nav>
                        
                        <br/>
                    ';
                    // include('follow_up.php');
                    echo '<div id="order"></div>';
                    echo '<button id="confirm_order" onclick="confirm_menu();" class="btn btn-sm btn-success" type="button">สั่งซื้อสินค้า</button>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

<script src="../js/jquery.min.js"></script>
<script src="../js/parallax.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        load_order("watting");
    });

    function load_order(a) {

        let status = a;

        if (status == 'watting') {
            document.getElementById(status).className = "btn btn-primary";
            document.getElementById("shipping").className = "btn btn-sm btn-outline-warning";
            document.getElementById("compl").className = "btn btn-sm btn-outline-success";
            document.getElementById("confirm_order").style.display = "block";
        }
        if (status == 'shipping') {
            document.getElementById("watting").className = "btn btn-sm btn-outline-primary";
            document.getElementById(status).className = "btn btn-warning";
            document.getElementById("compl").className = "btn btn-sm btn-outline-success";
            document.getElementById("confirm_order").style.display = "none";
        }
        if (status == 'compl') {
            document.getElementById("watting").className = "btn btn-sm btn-outline-primary";
            document.getElementById("shipping").className = "btn btn-sm btn-outline-warning";
            document.getElementById(status).className = "btn btn-success";
            document.getElementById("confirm_order").style.display = "none";
        }


        $.ajax({
            url: "follow_up.php",
            type: "POST",
            data: {
                "status": status
            },
            // contentType: false,
            // cache: false,
            // processData: false,
            // beforeSend: function() {
            //     //$("#preview").fadeOut();
            //     $("#err").fadeOut();
            // },
            success: function(data) {
                $('#order').html(data);
            },
            error: function(e) {
                alert("error");
            }
        });
    }

    function confirm(order_id) {

        let get_order_id = order_id;
        // console.log(get_order_id);

        $.ajax({
            url: "confirm_order.php",
            type: "POST",
            data: {
                "get_order_id": get_order_id
            },
            success: function(data) {
                // $('#order').html(data);
                if (data == 'completed') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Order confirmation successful',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Order confirmation failed.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                load_order("watting");
            },
            error: function(e) {
                alert("error");
            }
        });
    }

    function confirm_menu() {

        $.ajax({
            url: "confirm_menu.php",
            type: "POST",
            data: {
                username: "TEST"
            },
            success: function(data) {
                // $('#order').html(data);
                if (data == 'completed') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'order successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'order failed',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                load_order("watting");
            },
            error: function(e) {
                alert("error");
            }
        });
    }
</script>