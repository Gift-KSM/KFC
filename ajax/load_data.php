<?php
    $servername = "localhost";
    $username = "root";
    $password = "6340204905";
    $dbname = "project_kfc";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql="SELECT * FROM menu";
    $data_set=array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        // echo "ID : ".$row['menu_id']."image : ".$row['image']. "Menu : ".$row['n_menu']."Details : ".$row['detail']."Price : ".$row['price']."<br>"; 
        $data_set[]=$row;
    }
    // echo "<pre>";
    // print_r($data_set);

    
    foreach($data_set as $key){

        if(strpos($key['detail'],',')!==false){
            $detail='๐'.str_replace(",","<br>๐ ",$key['detail']);
        }else{
            $detail=$key['detail'];
        }

        
        echo '<div class="col-3"style="margin-bottom: 60px;">';
        echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
        echo '<figure style="cursor: pointer;" onclick="select();">';
        echo '<img src="'.$key['image'].'" alt="Image" class="img-fluid tm-gallery-img" />';
        echo '<figcaption style="text-align: center; cursor: pointer;" >';
        echo '<h4 class="tm-gallery-title">'.$key['n_menu'].'</h4>';
        // echo '<p class="tm-gallery-description"> '.$detail.'</p>';
        // echo '<p class="tm-gallery-price">'.$key['price'].' ฿</p>';
        // echo '<div class="row">
        //             <div class="col-5">
        //                 จำนวน 
                        
        //                 <input type="number" min="0" oninput="this.value = Math.abs(this.value)" style="width: 50px;"/>
                        
        //             </div>
        //             <div class="col" style="padding-left:20px">
        //                 <button type="button">เพิ่มลงตะกร้า</button>
        //             </div>
        //         </div>';
        echo '</figcaption>';
        echo '</figure>';
        echo '</article>';
        echo '</div>';
    }
?>

<!-- <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
    <figure>
        <img src="img/gallery/01.jpg" alt="Image" class="img-fluid tm-gallery-img" />
        <figcaption>
            <h4 class="tm-gallery-title">Fusce dictum finibus</h4>
            <p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
            <p class="tm-gallery-price">$45 / $55</p>
        </figcaption>
    </figure>
</article> -->