<?php
include('header.php');
include('body_user.php')
?>
<main>
    <div class="row">
        <div id="menu_slect"></div>
    </div>

    <!--<a href='ส่งไปที่.php?=$row[]&act=add'> เพิ่มลงตะกร้าสินค้า </a></td>-->

    <!-- <div class="row" id="rin" style="padding-left : 50px"></div> -->
</main>
<!-- <footer class="tm-footer text-center">
            <p>Copyright &copy; 2020 Simple House

                | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
        </footer> -->
<!-- </div>
</body>

</html> -->


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