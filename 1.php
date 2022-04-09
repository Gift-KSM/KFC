<!DOCTYPE html>
<html>

<body>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/lib/w3.css">
    <style>
        .mySlides {
            display: none;
        }
    </style>

    <body>
        <!-- <button class="button button1">SHOP NOW</button> -->
        <div class="w3-content" style="max-width:1200px;position:relative;margin-top:7px;margin-left:90px;">
            <img class="mySlides" src="img/KFCn10.jpg" style="width:100%">
            <img class="mySlides" src="img/KFCn7.jpg" style="width:100%">
            <img class="mySlides" src="img/KFCn9.jpg" style="width:100%">
            <!-- <img class="mySlides" src="img/KFCn12.png" style="width:100%"> -->
            <img class="mySlides" src="img/KFCn11.jpg" style="width:100%">


            <!-- <a class="w3-btn-floating" style="position:absolute;top:50%;left:0;font-size: 40px" onclick="plusDivs(-1)">❮</a> -->
            <!-- <a class="w3-btn-floating" style="position:absolute;top:50%;right:0; font-size: 40px" onclick="plusDivs(1)">❯</a> -->
        </div>
        <?php
        // include 'test.php';
        ?>


        <script>
            var myIndex = 0;
            carousel();
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

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

        </div>
    </body>

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
</script>