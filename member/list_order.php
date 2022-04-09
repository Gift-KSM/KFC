<?php
require("connect_db.php");
$sql_order = "SELECT * FROM order WHERE user_id=user_id";
$rs_order = mysqli_query($conn, $sql_order);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h3>Order History</h3>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr class="danger">
            <th width="5%">
                <center>#</center>
            </th>
            <th width="10%">
                <center>List</center>
            </th>
            <th width="15%">
                <center>Date</center>
            </th>
            <th width="10%">
                <center>Total</center>
            </th>
            <th width="10%">
                <center>Status</center>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rs_order as $q_order) { ?>
            <tr>
                <td><?php echo $q_order['order_id']; ?></td>
                <td><?php echo $q_order['n_menu']; ?></td>
                <td><?php echo $q_order['order_date']; ?></td>
                <td align="right"><?php echo $q_order['total']; ?></td>
                <td>
                    <?php
                    echo $q_order['order_status'];
                    $st = $q_order['order_status'];
                    if ($st == 1) {
                        // echo "<font color='yellow'>";
                        echo 'Wait for admin to confirm the order.';
                        // echo "</font>";
                    } elseif ($st == 2) {
                        echo "<font color='orange'>";
                        echo 'Admin confirmed the order, preparing';
                        echo "</font>";
                    } elseif ($st == 3) {
                        echo "<font color='blue'>";
                        echo 'In progress';
                        echo "</font>";
                    } elseif ($st == 4) {
                        echo "<font color='green'>";
                        echo 'Already shipped';
                        echo "</font>";
                    } else {
                        echo "<font color='red'>";
                        echo 'Cancel';
                        echo "</font>";
                    }
                    ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>