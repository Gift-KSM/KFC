<?php

session_start();
require_once '../login/config/db.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}
?>

<?php
include 'head_backend.php';
?>

<main>

    <body>
        <div class="container">
            <?php

            if (isset($_SESSION['admin_login'])) {
                $admin_id = $_SESSION['admin_login'];
                $stmt = $con->query("SELECT * FROM users WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3" style="padding-top: 20px; margin-left: -203px;">
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
                    <div class="col-md-2" style="margin-left: 322px; margin-right: 394px; margin-top: 24px; width: 500px;">
                        <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">NAME</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter menu name" style="width: 500px;" required />
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label ">DETAIL</label>
                                <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Enter detail" style="height: 200px; width: 500px;" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">PRICE</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" style="width: 500px;" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">MENU CODE</label>
                                <input type="text" class="form-control" name="menu_code" required />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">IMAGE</label>
                                <input class="form-control" id="uploadImage" type="file" accept="image/*" name="image" style="width: 500px;" />
                                <span id="preview"></span>
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
        </div>

    </body>
</main>

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
</script>
</body>

</html>
<?php
include 'function_addmenu.php';
?>
<?php include('footer.php'); ?>