<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $school = mysqli_real_escape_string($conn, $_POST['school']);
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);        

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
    if (!empty($name) && !empty($school) && !empty($class_name) && !empty($email)) {
        $sql = "UPDATE users_tb SET name='$name',school='$school',class_name='$class_name',email='$email' WHERE id = '$id';";
        mysqli_query($conn, $sql);
        echo $sql;
        header('location: admin-2.php');
    }
}
