<?php
include('head_backend.php');
// include('../body.php');
session_start();
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3" style="padding-top: 20px;">
                <div class="list-group" style="width: 75%;">
                    <a href="home_admin.php" class="list-group-item active">
                        Menu
                    </a>
                    <a href="body_addmenu.php" class="list-group-item">
                        Add New Menu
                    </a>
                    <a href="check_order.php" class="list-group-item">
                        Check Order
                    </a>
                    <!-- <a href="logout.php" class="list-group-item list-group-item-danger">
                        Logout
                    </a> -->
                </div>
            </div>
            <div class="col-9 align-self-center" style="padding-top: -6px; ">
                <nav class="navbar navbar-light bg-light" style="width: 85%">
                    <div class="row justify-content-center" style="width: 100%">
                        <form class="form-inline" action="" method="post" enctype="multipart/from-data">
                            <!-- <div class="col" style="text-align: center;">
                        <button id="watting" onclick="load_order(id);" class="btn btn-sm btn-outline-primary" type="button">ตะกร้าสินค้า</button>
                    </div> -->
                            <div class="col" style="text-align: center;">
                                <button id="confirm" onclick="load_order(id);" class="btn btn-sm btn-outline-warning" type="button">แอดมินยินยันออเดอร์แล้ว กำลังจัดทำ</button>
                            </div>
                            <div class="col" style="text-align: center;">
                                <button id="shipping" onclick="load_order(id);" class="btn btn-sm btn-outline-info" type="button">กำลังทำการจัดส่ง</button>
                            </div>
                            <div class="col" style="text-align: center;">
                                <button id="compl" onclick="load_order(id);" class="btn btn-sm btn-outline-success" type="button">จัดส่งเรียบร้อย</button>
                            </div>
                        </form>
                    </div>
                </nav>


                <br />
                <div id="order"></div>
                <button id="confirm_order" onclick="confirm_menu();" class="btn btn-sm btn-success" type="button">จัดส่งสินค้า</button>

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
        load_order("confirm");
    });

    function load_order(a) {

        let status = a;

        // if (status == 'watting') {
        //     document.getElementById(status).className = "btn btn-primary";
        //     document.getElementById("confirm").className = "btn btn-sm btn-outline-info";
        //     document.getElementById("shipping").className = "btn btn-sm btn-outline-warning";
        //     document.getElementById("compl").className = "btn btn-sm btn-outline-success";
        //     document.getElementById("confirm_order").style.display = "block";
        // }
        if (status == 'confirm') {
            // document.getElementById("watting").className = "btn btn-sm btn-outline-primary";
            document.getElementById(status).className = "btn btn-info";
            document.getElementById("shipping").className = "btn btn-sm btn-outline-warning";
            document.getElementById("compl").className = "btn btn-sm btn-outline-success";
            document.getElementById("confirm_order").style.display = "block";
        }
        if (status == 'shipping') {
            // document.getElementById("watting").className = "btn btn-sm btn-outline-primary";
            document.getElementById("confirm").className = "btn btn-sm btn-outline-info";
            document.getElementById(status).className = "btn btn-warning";
            document.getElementById("compl").className = "btn btn-sm btn-outline-success";
            document.getElementById("confirm_order").style.display = "none";
        }
        if (status == 'compl') {
            // document.getElementById("watting").className = "btn btn-sm btn-outline-primary";
            document.getElementById("confirm").className = "btn btn-sm btn-outline-info";
            document.getElementById("shipping").className = "btn btn-sm btn-outline-warning";
            document.getElementById(status).className = "btn btn-success";
            document.getElementById("confirm_order").style.display = "none";
        }


        $.ajax({
            url: "follow_up_admin.php",
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
            url: "confirm_order_admin.php",
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
                        title: 'ยืนยันออร์เดอร์สำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ยืนยันออร์เดอร์ไม่สำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                load_order("confirm");
            },
            error: function(e) {
                alert("error");
            }
        });
    }

    function confirm_menu() {
        $.ajax({
            url: "confirm_menu_admin.php",
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
                        title: 'สั่งซื้อสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'สั่งซื้อไม่สำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                load_order("confirm");
            },
            error: function(e) {
                alert("error");
            }
        });
    }
</script>