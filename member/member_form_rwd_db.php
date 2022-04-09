
<?php

include_once '../connect_db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_pass = $_POST["password"];
    $new_pass = $_POST["newpassword"];
    $con_pass = $_POST['c_password'];
    $username = $_SESSION['username'];
    $real_paas = $_SESSION['pass'];
    $hashpass =  password_hash($new_pass,PASSWORD_DEFAULT);
    $hashold_pass = password_verify($old_pass, $real_paas);


// print_r($real_paas);
print_r($conn);

if ($real_paas != $hashold_pass) {
    echo "<script type='text/javascript'>";
    // echo "alert('password ไม่ตรงกัน กรุณาใส่ใหม่อีกครั้ง');";
    // echo "window.location = 'index.php?act=pwd';";
    echo "console.log('33333333333');";
    echo "</script>";
    
} else {

    if($new_pass == $con_pass){
        $sql = "UPDATE users SET password = '$hashpass' WHERE username = '$username'";
        // $result = mysqli_query($condb, $sql);
        // // mysqli_close($condb);
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        if ($result) {
            echo "<script type='text/javascript'>";
            echo "alert('Successfully.');";
            echo "window.location = 'home_member.php';";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "window.location = 'home_member.php';";
            echo "</script>";
        }
        // echo "<script type='text/javascript'>";
        // // echo "alert('Successfully.');";
        // // echo "window.location = 'home_member.php';";
        // echo "console.log('11111111111');";
        // echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        // echo "alert('password ใหม่ไม่ตรงกัน กรุณาใส่ใหม่อีกครั้ง');";
        // echo "window.location = 'index.php?act=pwd';";
        echo "console.log('2222222222');";
        echo "</script>";
    }

    
}




}

?>