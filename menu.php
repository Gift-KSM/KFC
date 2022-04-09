<?php
include 'header.php';
include 'body.php';

?>

</body>
<main>
    <header class="row tm-welcome-section">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
        <h2 class="col-12 text-center tm-section-title" style="font-size: 4.50rem;font-family:Bebas Neue;">Welcome to KFC Delivery</h2>
        <!-- <p class="col-12 text-center">Total 3 HTML pages are included in this template. Header image has a parallax effect. You can feel free to download, edit and use this TemplateMo layout for your commercial or non-commercial websites.</p> -->
    </header>

    <div class="row" id="rin" style="padding-left : 140px"></div>
</main>

</div>

</html>


<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    function basket() {



        Swal.fire({
            title: 'You are not logged in. Do you want to login?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'YES',
            denyButtonText: 'NO',
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

    // span.onclick = function() {
    // 	modal.style.display = "none";
    // }          
</script>