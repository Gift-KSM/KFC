<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

      
        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอก username';
            header("location: signin.php");
        // } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //     $_SESSION['error'] = 'รูปแบบ username ไม่ถูกต้อง';
        //     header("location: signin.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signin.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signin.php");
        } else {
            try {

                $check_data = $con->prepare("SELECT * FROM users WHERE username = :username");
                $check_data->bindParam(":username", $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($username == $row['username']) {
                        if (password_verify($password, $row['password'])) {

                            $_SESSION['admin_login'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['name'] = $row['name_user'];
                            $_SESSION['last_name'] = $row['last_name'];
                            $_SESSION['address'] = $row['address'];
                            $_SESSION['phone'] = $row['phone_number'];
                            $_SESSION['pass'] = $row['password'];
                            
                            if ($row['urole'] == 'admin') {
                                header("location:../admin/home_admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: ../home2.php");
                            }
                        } else {
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location: signin.php");
                        }
                    } else {
                        $_SESSION['error'] = 'อีเมลผิด';
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                    header("location: signin.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>