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
            
            <!-- <div class="container">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -90px; margin-right: 394px; margin-top: 29px; width: 205px;"> -->
                        <?php include('menu_l.php'); ?>
                    <!-- </div> -->
                    <div class="col-md-10" style="margin-left: 208px; margin-top: -144px;">
                        <?php
                        require("../connect_db.php");
                        $sql = "SELECT * FROM menu ORDER BY menu_id ASC";
                        $rs = mysqli_query($conn, $sql);
                        ?>
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <center>ID</center>
                                    </th>
                                    <th>
                                        <center>Image</center>
                                    </th>
                                    <th>
                                        <center>Name</center>
                                    </th>
                                    <th>
                                        <center>Details</center>
                                    </th>
                                    <th>
                                        <center>Price</center>
                                    </th>
                                    <th>
                                        <center>Edit</center>
                                    </th>
                                    <th>
                                        <center>Delete</center>
                                    </th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($rs)) {
                                echo ("<tr>");
                                echo ("<td style='width: 53px;'>" . $row["menu_id"] . "</td>");
                                echo ("<td align=center>" . "<img src=../" . $row["image"] . " style='width: 60%'>" . "</td>");
                                echo ("<td>" . $row["n_menu"] . "</td>");
                                echo ("<td>" . $row["detail"] . "</td>");
                                echo ("<td style='width: 53px;'>" . $row["price"] . " ฿" . "</td>");
                                echo ("<td><a href=edit_menu.php?ID=" . $row["menu_id"] . " class='btn btn-warning btn-xs'>edit</a></td> ");
                                echo ("<td><a href=delete_menu.php?ID=" . $row["menu_id"] . " onclick=\"return confirm('Are you sure?')\"class='btn btn-danger btn-xs'>Delete</a></td>");
                                echo ("</tr>\n");
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
    </body>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
<?php include('footer.php'); ?>
