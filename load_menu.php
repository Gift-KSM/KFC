<?php
// require("connect_db.php");
// $sql = "SELECT * FROM menu";
// $data_set = array();
// $result = mysqli_query($conn, $sql);
// while ($row = mysqli_fetch_array($result)) {
//     $data_set[] = $row;
// }
// foreach ($data_set as $key) {

//     if (strpos($key['detail'], ',') !== false) {
//         $detail = '๐' . str_replace(",", "<br>๐ ", $key['detail']);
//     } else {
//         $detail = $key['detail'];
//     }
//     echo '<div class="col-3"style="margin-bottom: 60px;">';
//     echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
//     echo '<figure style="cursor: pointer;" onclick="select();">';
//     echo '<img src="' . $key['image'] . '" alt="Image" class="img-fluid tm-gallery-img" />';
//     echo '<figcaption style="text-align: center; cursor: pointer;" >';
//     echo '<h4 class="tm-gallery-title">' . $key['n_menu'] . '</h4>';
//     echo '</figcaption>';
//     echo '</figure>';
//     echo '</article>';
//     echo '</div>';
// }

require("connect_db.php");
$sql = "SELECT * FROM menu";
$data_set = array();
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $data_set[] = $row;
}

$n = 1;
foreach ($data_set as $key) {

    if (strpos($key['detail'], ',') !== false) {
        $detail = '๐' . str_replace(",", "<br>๐ ", $key['detail']);
    } else {
        $detail = $key['detail'];
    }
       
    echo '<div class="col-3"style="margin-bottom: 60px;">';
    echo '<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
    echo '<figure style="cursor: pointer;"  onclick="basket(' .$key['menu_id']. ');" id="id_menu_'.$n.'">';
    echo '<img src="' . $key['image'] . '" alt="Image" class="img-fluid tm-gallery-img" />';
    echo '<figcaption style="text-align: center; cursor: pointer;" >';
    echo '<h4 class="tm-gallery-title">' . $key['n_menu'] . '</h4>';
    echo '</figcaption>';
    echo '</figure>';
    echo '</article>';
    echo '</div>';

    $n++;
}
?>

