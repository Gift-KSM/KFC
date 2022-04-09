<?php
require("../connect_db.php");
$id = $_GET["ID"];


$sql = "SELECT * FROM menu WHERE menu_id='" . $id . "'";
$query = mysqli_query($conn, $sql);
$menu = mysqli_fetch_assoc($query);
if (isset($_POST["submit"])) {
    // print_r($_FILES);
    $images = $_FILES['image']['name'];
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($images);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['image']['tmp_name'],  $target_file);
    // print_r($images);
    // Check if image file is a actual image or fake image
    //   $check = getimagesize($_FILES['image']['tmp_name']);
    //   if($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    //   } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    //   }



    $sql = "UPDATE menu SET n_menu='" . $_POST['n_menu'] . "',detail ='" . $_POST['detail'] . "',price='" . $_POST['price'] . $_POST['menu_code'] . "',image='uploads/{$images}' WHERE menu_id='" . $id . "'";
    mysqli_query($conn, $sql);
    // print_r($_FILES['image']['name']);
    header("location:home_admin.php?update=PASS");
}
?>
<?php
include 'head_backend.php';
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
</body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin-left: 356px; margin-top: -169px;"><br>

                <!-- <form method="post" enctype="multipart/form-data"> -->
                <!-- <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">NAME</label>
                        <input type="text" class="form-control" id="n_menu" name="n_menu" value="<?php echo $menu['n_menu']; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DETAIL</label>
                        <textarea type="text" class="form-control" id="detail" name="detail" required><?php echo $menu['detail']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PRICE</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $menu['price']; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">MENU CODE</label>
                        <input type="text" class="form-control" id="menu_code" name="menu_code" value="<?php echo $menu['menu_code']; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IMAGE</label>
                        <input class="form-control" id="uploadImage" type="file" accept="image/*" name="image" />
                        <div id="preview"><img src="../<?php echo $menu['image']; ?>" /></div><br>
                    </div>
                    <div class="col-auto">
                        <input class="btn btn-success" type="submit" name="submit" id+="submit" value="Upload">
                    </div>
                </form> -->
                <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">NAME</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter menu name" style="width: 500px;"  value="<?php echo $menu['n_menu']; ?>"  required />
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label ">DETAIL</label>
                        <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Enter detail" style="height: 200px; width: 500px;" value="<?php echo $menu['detail']; ?>" required><?php echo $menu['detail']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">PRICE</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" style="width: 500px;" value="<?php echo $menu['price']; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">MENU CODE</label>
                        <input type="text" class="form-control" name="menu_code" value="<?php echo $menu['menu_code']; ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">IMAGE</label>
                        <input class="form-control" id="uploadImage" type="file" accept="image/*" name="image" style="width: 500px;" />
                        <!-- <span id="preview" src="../<?php echo $menu['image']; ?>"></span> -->
                        <div id="preview"><img src="../<?php echo $menu['image']; ?>" /></div><br>
                        <br>
                    </div>
                    <div class="col-auto">
                        <input class="btn btn-success" type="submit" value="Upload">
                    </div>
                </form>
                <div id="err"></div>

            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    // $(document).ready(function(e) {
    //     $("#form").on('submit', (function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: "edit_menu.php",
    //             type: "POST",
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             beforeSend: function() {
    //                 //$("#preview").fadeOut();
    //                 $("#err").fadeOut();
    //             },
    //             success: function(data) {
    //                 if (data == 'invalid') {
    //                     // invalid file format.
    //                     $("#err").html("Invalid File !").fadeIn();
    //                 } else {
    //                     // view uploaded file.
    //                     $("#preview").html(data).fadeIn();
    //                     $("#form")[0].reset();
    //                     console.log(data);
    //                 }
    //             },
    //             error: function(e) {
    //                 $("#err").html(e).fadeIn();
    //             }
    //         });
    //     }));
    // });

    $(document).ready(function(e) {
        $("#form").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "ajax_edit_menu.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    //$("#preview").fadeOut();
                    $("#err").fadeOut();
                },
                success: function(data) {
                    // if (data == 'invalid') {
                    //     // invalid file format.
                    //     $("#err").html("Invalid File !").fadeIn();
                    // } else {
                    //     // view uploaded file.
                    //     $("#preview").html(data).fadeIn();
                    //     $("#form")[0].reset();
                    //     console.log(data);
                    // }
                    console.log(data);
                },
                error: function(e) {
                    $("#err").html(e).fadeIn();
                }
            });
        }));
    });
</script>

<footer class="tm-footer text-center">

</footer>
</div>
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
    });

    // function edit_menu(){
    //     $.ajax({
    //         url: "ajax_edit_menu.php",
    //         type: "POST",
    //         data: new FormData(this),
    //         success: function(data) {
    //             // $('#order').html(data);
    //             if(data == 'completed'){
    //                 Swal.fire({
    //                     position: 'center',
    //                     icon: 'success',
    //                     title: 'order successfully',
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 })
    //             }else{
    //                 Swal.fire({
    //                     position: 'center',
    //                     icon: 'error',
    //                     title: 'order failed',
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 })
    //             }
    //             load_order("watting");
    //         },
    //         error: function(e) {
    //             alert("error");
    //         }
    //     });
    // }
</script>
</body>

</html>