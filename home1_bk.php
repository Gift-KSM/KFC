<?php
include 'header.php';
include 'body.php';
include '1.php';


?>

</body>
<main>
    <header class="row tm-welcome-section;margin: 20px">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <!-- <h2 class="col-12 text-center tm-section-title" style="font-size: 4.00rem;font-family:Lobster">Welcome to KFC Delivery</h2> -->
    </header>


    <div class="row" id="rin" style="padding-left : 140px"></div>
</main>

</div>

</html>
<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<picture>
    <div class="container" style="padding-left: 25px;margin-top: 12px;">
        <img src="img/K2.jpg" style="margin-right: 8px;" class="" alt="images">
        <img src="img/K3.jpg" style="margin-right: 8px;" class="" alt="images">
        <img src="img/K1.jpg" class="" alt="images">
        
    </div>
</picture>


</style>
</head>
<body>






<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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
</script>