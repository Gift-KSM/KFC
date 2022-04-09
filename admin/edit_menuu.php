<?php
include 'head_backend.php' ?>
<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-3" style="padding-top: 20px; margin-left: 2px;">
            <div class="list-group" style="width: 75%;">
                <a href="home_admin.php" class="list-group-item active">
                    Menu
                </a>
                <a href="body_addmenu.php" class="list-group-item">
                    Add New Menu
                </a>
                <a href="check_order.php" class="list-group-item">
                    Check Order
                </a> -->
<!-- <a href="logout.php" class="list-group-item list-group-item-danger">
                    Logout
                </a> -->
<!-- </div>
        </div> -->
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



    $sql = "UPDATE menu SET n_menu='" . $_POST['n_menu'] . "',detail ='" . $_POST['detail'] . "',price='" . $_POST['price'] . "',image='uploads/{$images}' WHERE menu_id='" . $id . "'";
    mysqli_query($conn, $sql);
    // print_r($_FILES['image']['name']);
    header("location:home_admin.php?update=PASS");
}
?>
<?php
include('edit_form.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function(e) {
        $("#form").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "edit_menu.php",
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
                    if (data == 'invalid') {
                        // invalid file format.
                        $("#err").html("Invalid File !").fadeIn();
                    } else {
                        // view uploaded file.
                        $("#preview").html(data).fadeIn();
                        $("#form")[0].reset();
                        console.log(data);
                    }
                },
                error: function(e) {
                    $("#err").html(e).fadeIn();
                }
            });
        }));
    });
</script>
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
</script>
<?php include('footer.php'); ?>