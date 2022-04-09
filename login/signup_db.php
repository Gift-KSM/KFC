<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $name_user = $_POST['name_user'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $urole = 'user';

        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอก username';
            header("location: index.php");      
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: index.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: index.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: index.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: index.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: index.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: index.php");
        } else if (empty($name_user)) {
            $_SESSION['error'] = 'กรุณากรอก Name';
            header("location: index.php");
        } else if (empty($last_name)) {
            $_SESSION['error'] = 'กรุณากรอก Lastname';
            header("location: index.php");
        } else if (empty($address)) {
            $_SESSION['error'] = 'กรุณากรอก address';
            header("location: index.php");
        } else if (empty($phone_number)) {
            $_SESSION['error'] = 'กรุณากรอก phone number';
            header("location: index.php");
        } else {
            try {
                $check_username = $con->prepare("SELECT username FROM users WHERE username = :username");
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = "มี user นี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $con->prepare("INSERT INTO users(username, email, password,name_user, last_name, address, phone_number, urole) 
                                            VALUES(:username, :email, :password, :name_user, :last_name, :address, :phone_number, :urole)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":name_user", $name_user);
                    $stmt->bindParam(":last_name", $last_name);
                    $stmt->bindParam(":address", $address);
                    $stmt->bindParam(":phone_number", $phone_number);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: index.php");
                }

              

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>