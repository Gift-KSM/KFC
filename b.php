<?php
include 'header.php';
// include 'body.php';
?>

<body>
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
                        <nav class="col-md-6 col-12 tm-nav" style="margin-top: 150px;">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="home_user.php" class="tm-nav-link active">Home</a></li>
                                <!-- <li class="tm-nav-li"><a href="menu.php" class="tm-nav-link active">MENU</a></li> -->
                                <li class="tm-nav-li"><a href="login/logout.php" class="tm-nav-link">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="row">
            <div id="menu_slect"></div>
        </div>
    </main>
</body>

</html>

<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle click on paging links
        $('.tm-paging-link').click(function(e) {
            e.preventDefault();

            var page = $(this).text().toLowerCase();
            $('.tm-gallery-page').addClass('hidden');
            $('#tm-gallery-page-' + page).removeClass('hidden');
            $('.tm-paging-link').removeClass('active');
            $(this).addClass("active");
        });

        basket_load_data();
    });

    function basket_load_data() {


        var get_url = window.location.search;
        var menu_id = get_url.substring(1);

        $.ajax({
            async: false,
            url: "ajax/basket_load_data.php",
            type: "POST",
            data: {
                "menu_id": menu_id
            },
            success: function(data) {
                $('#menu_slect').html(data);
            },
            error: function(e) {
                alert("error");
            }
        });
    }

    function select() {

        modal.style.display = "block";
    }

    // span.onclick = function() {
    // 	modal.style.display = "none";
    // }
</script>