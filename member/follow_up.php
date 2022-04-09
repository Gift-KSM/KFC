<meta charset="utf-8">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_kfc";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$status = $_POST['status'];
if($status == "watting"){
    $sql = "SELECT od.* ,menu.detail 
            FROM `order` AS od 
            LEFT JOIN menu AS menu on od.n_menu = menu.n_menu 
            WHERE status = 'กำลังสั่งซื้อ' AND username = '".$_SESSION['username']."';
        ";
}elseif($status == "confirm"){
    $sql = "SELECT od.* ,menu.detail 
            FROM `order` AS od 
            LEFT JOIN menu AS menu on od.n_menu = menu.n_menu 
            WHERE status = 'กำลังจัดทำ' AND username = '".$_SESSION['username']."';
        ";
}elseif($status == "shipping"){
    $sql = "SELECT od.* ,menu.detail 
            FROM `order` AS od 
            LEFT JOIN menu AS menu on od.n_menu = menu.n_menu 
            WHERE status = 'กำลังจัดส่ง' AND username = '".$_SESSION['username']."';
        ";
}elseif($status == "compl"){
    $sql = "SELECT od.* ,menu.detail 
            FROM `order` AS od 
            LEFT JOIN menu AS menu on od.n_menu = menu.n_menu 
            WHERE status = 'จัดส่งเรียบร้อย' AND username = '".$_SESSION['username']."';
        ";
}

$data_set = array();
$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    // echo "ID : ".$row['menu_id']."image : ".$row['image']. "Menu : ".$row['n_menu']."Details : ".$row['detail']."Price : ".$row['price']."<br>"; 
    $data_set[] = $row;
}
// echo "<pre>";
// print_r($data_set);


foreach ($data_set as $key) {

    if (strpos($key['detail'], ',') !== false) {
        $detail = '- ' . str_replace(",", "<br>- ", $key['detail']);
    } else {
        $detail = $key['detail'];
    }

    echo '
        <div class="card" style="width: 85%">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-3" style="text-align: center; ">
                        <img style="width: 100%;" src="../'. $key['image'] .'" alt="Logo" class="tm-site-logo" />
                    </div>
                    <div class="col">
                        <h5 class="card-title">'.$key['n_menu'].'</h5>
                        <p class="card-text">'. $detail .'</p>
                    </div>
                    <div class="col">
                        <h6>Quantity</h6>
                        <p class="card-text">'. $key['quantity'] .'</p>
                        <h6>Price</h6>
                        <p class="card-text">'. $key['total'] .'</p>
                    </div>
                    <div class="col">
                        <h6>Status</h6>
                        <p class="card-text">'. $key['status'] .'</p>';
    if($key['status'] == 'กำลังจัดส่ง'){
                        echo '
                            <h6>Confirm delivery is complete</h6>
                            <button id="'.$key['order_id'].'" onclick="confirm(id);" class="btn btn-success" type="button">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            ';
    }else{
                        echo ' </div>
                        </div>
                    </div>
                </div>
                <br>
            ';
    }
    
                    
}



?>