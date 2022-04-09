<?php
include 'header.php';
include 'body_user.php';

?>

<style>
    .tm-gallery-title{
        font-family: 'Noto Sans Thai';
    }
</style>

<main>
    <header class="row tm-welcome-section">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <link href='https://fonts.googleapis.com/css?family=Noto Sans Thai' rel='stylesheet'>
        <h2 class="col-12 text-center tm-section-title" style="font-size: 3.00rem;font-family:Lobster;">Welcome to KFC Delivery</h2>
    </header>

    <div class="row" id="rin" style="padding-left :62px"></div>
</main>

</div>
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

        load_data();
    });

    function load_data() {
        $.ajax({
            url: "load_menu.php",
            type: "POST",
            // data: new FormData(this),
            // contentType: false,
            // cache: false,
            // processData: false,
            // beforeSend: function() {
            //     //$("#preview").fadeOut();
            //     $("#err").fadeOut();
            // },
            success: function(data) {
                $('#rin').html(data);
            },
            error: function(e) {
                alert("error");
            }
        });
    }

    function basket(menu_id) {

        var menu_id = menu_id;
        console.log(menu_id);

        var win = window.open('http://localhost/project_kfc/basket_kfc.php?' + menu_id, '_blank');

        if (win) {
            win.focus();
        }
    }

    // span.onclick = function() {
    // 	modal.style.display = "none";
    // }          
</script>