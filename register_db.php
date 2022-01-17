<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $school = mysqli_real_escape_string($conn, $_POST['school']);
        $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);        
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($name)) {
            array_push($errors, "กรุณากรอกชื่อ-นามสกุล");
            $_SESSION['error'] = "กรุณากรอกชื่อ-นามสกุล";
        }
        if (empty($school)) {
            array_push($errors, "กรุณากรอกโรงเรียน");
            $_SESSION['error'] = "กรุณากรอกโรงเรียน";
        }
        if (empty($class_name)) {
            array_push($errors, "กรุณากรอกเลือกระดับชั้น");
            $_SESSION['error'] = "กรุณากรอกเลือกระดับชั้น";
        }
        if (empty($email)) {
            array_push($errors, "กรุณากรอกอีเมล");
            $_SESSION['error'] = "กรุณากรอกอีเมล";
        }
        if (empty($password_1)) {
            array_push($errors, "กรุณากรอกรหัสผ่านให้ครบถ้วน");
            $_SESSION['error'] = "กรุณากรอกรหัสผ่านให้ครบถ้วน";
        }
        if (empty($password_2)) {
            array_push($errors, "กรุณากรอกรหัสผ่านให้ครบถ้วน");
            $_SESSION['error'] = "กรุณากรอกรหัสผ่านให้ครบถ้วน";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "รหัสผ่านไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        }

        $user_check_query = "SELECT * FROM users_tb WHERE email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = $password_1;
            // $password = md5($password_1);

            $sql = "INSERT INTO users_tb (name,school,class_name, email, password) VALUES ('$name', '$school', '$class_name', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            header("location: register.php");
        }
    }
