<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_kfc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$menu_id = $_POST['menu_id'];
// $menu_id = '11';

$sql = "SELECT * FROM menu
          WHERE menu_id = '" . $menu_id . "'";

$data_set = array();
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    // echo "ID : ".$row['menu_id']."image : ".$row['image']. "Menu : ".$row['n_menu']."Details : ".$row['detail']."Price : ".$row['price']."<br>"; 
    $data_set[] = $row;
}
// echo "<pre>";
// print_r($data_set);


foreach ($data_set as $key) {

    if (strpos($key['detail'], ',') !== false) {
        $detail = '๐' . str_replace(",", "<br>๐ ", $key['detail']);
    } else {
        $detail = $key['detail'];
    }

    echo   '
            <div class="col-3" style="margin-bottom: -130px; margin-left: 200px;padding-top=100px;">
                    <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                        <figure style="cursor: pointer;"><img src="' . $key['image'] . '" alt="Image" id="image" class="img-fluid tm-gallery-img" style="margin-left: 287px; margin-top: 75px; margin-bottom: -123px;">
                            
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-12" style="margin-left: 860px;">
                            <h4>Topic</h4>
                            <input id="imagesrc" value="' . $key['image'] . '" hidden>
                            <input id="menu_code" value="' . $key['menu_code'] . '" hidden>
                            <span id="name">' . $key['n_menu'] . '</span>
                        </div>
                        <div class="col-12" style="margin-left: 860px;">
                            <h4>Details</h4>
                            <span id="detail">' . $detail . '</span>
                        </div>
                        <div class="col-12" style="margin-left: 860px;">
                            <h4>Price</h4>
                            <span id="price" style="padding-left: 40px;"value="' . $key['price'] . '">' . $key['price'] . '</span>
                        </div>
                        <div class="col-12" style="margin-left: 860px;">
                            <h4>Quantity</h4>
                            <input type="number" id="quantity" onchange=total(); />
                        </div>
                        <div class="col-12" style="margin-left: 860px;">
                            <h4>Total</h4>
                            <span id="total_text">0</span>
                            <input type="text" id="total" name="total" hidden />
                        </div>
                        <div class="col-12" style="margin-left: 860px;">
                        <button onclick=add_cart();>Add Product</button>
                    </div>
                        <div>
                </div>';
}

?>
<footer class="tm-footer text-center">
    <p>

</footer>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var total = () => {
        let quantity = $('#quantity').val();
        let price = $('#price').text();

        $('#total_text').text(quantity * parseInt(price));
        $('#total').val(quantity * parseInt(price));
        console.log(price, quantity)

    }

    var add_cart = () => {
        let total = $('#total').val();
        let menu_code = $('#menu_code').val();
        let menu_name = $('#name').text();
        let quantity = $('#quantity').val();
        let images = $('#imagesrc').val();
        console.log(images)
        $.post('ajax/addto_basket.php', {
            menu_code: menu_code,
            name: menu_name,
            total: total,
            quantity:quantity,
            images:images
        }, function(result) {
            console.log(result)
            if(result == 'completed'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Product added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Unable to add products',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
        })
    }
</script>
</body>

</html>