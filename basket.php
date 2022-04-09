<?php
include('header.php');
include('body_user.php');
?>

<!-- 
<?php
session_start();

$p_id = $_GET['id'];
$act = $_GET['act'];

if ($act == 'add' && !empty($p_id)) {
	if (isset($_SESSION['cart'][$p_id])) {
		$_SESSION['cart'][$p_id]++;
	} else {
		$_SESSION['cart'][$p_id] = 1;
	}
}

if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
	unset($_SESSION['cart'][$p_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['cart'][$p_id] = $amount;
	}
}
?> -->
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shopping Cart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<form id="frmcart" name="frmcart" method="post" action="?act=update">
		<table class="table table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col"><center>Image</center></th>
					<th scope="col"><center>Product</center></th>
					<th scope="col"><center>Price</center></th>
					<th scope="col"><center>Quantity</center></th>
					<th scope="col"><center>Total</center></th>
					<th scope="col"><center>Delete</center></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row"></th>
					<td><center>ss</center></td>
					<td><center>a</center></td>
					<td><center>a</center></td>
					<td><center>a</center></td>
					<td><center>a</center></td>
					<td><center>a</center></td>
					
				</tr>
			</tbody>
			<?php
			$total = 0;
			if (!empty($_SESSION['cart'])) {
				include("connect_db.php");
				foreach ($_SESSION['cart'] as $id => $qty) {
					$sql = "SELECT * FORM order where p_id=$id";
					$query = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($query);
					$sum = $row['p_price'] * $qty;
					$total += $sum;
					echo "<tr>";
					echo "<td width='300'>" . $row["image"] . "</td>";
					echo "<td width='334'>" . $row["n_menu"] . "</td>";
					echo "<td width='46' align='right'>" . number_format($row["price"], 2) . "</td>";
					echo "<td width='57' align='right'>";
					echo "<input type='text' name='amount[$id]' value='$qty' size='2'/></td>";
					echo "<td width='93' align='right'>" . number_format($sum, 2) . "</td>";
					//remove product
					echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
					echo "</tr>";
				}
				echo "<tr>";
				echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>Total</b></td>";
				echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
				echo "<td align='left' bgcolor='#CEE7FF'></td>";
				echo "</tr>";
			}
			?>
			<tr>
				<!-- <td><a href="product.php">กลับหน้ารายการสินค้า</a></td> -->
				<td colspan="4" align="right">
					<input type="submit" name="button" id="button" value="Calculate money" />
					<input type="button" name="Submit2" value="Confirm" onclick="window.location='confirm.php';" />
				</td>
			</tr>
		</table>
	</form>
</body>

</html>