<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($email)) {
            array_push($errors, "กรุณากรอกอีเมล");
        }

        if (empty($password)) {
            array_push($errors, "กรุณากรอกรหัสผ่าน");
        }

        if (count($errors) == 0) {
            $password = $password;
            // $password = md5($password);
            $query = "SELECT * FROM users_tb WHERE email = '$email' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "คุณกำลังเข้าสู่ระบบ";
                header("location: index.php");
            } else {
                array_push($errors, "อีเมล & รหัสผ่าน ไม่ถูกต้อง");
                $_SESSION['error'] = "อีเมล & รหัสผ่าน ไม่ถูกต้อง!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "อีเมล & รหัสผ่าน ไม่ถูกต้อง");
            $_SESSION['error'] = "อีเมล & รหัสผ่าน ไม่ถูกต้อง";
            header("location: login.php");
        }
    }

?>
