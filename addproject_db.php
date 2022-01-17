<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_product'])) {
    $projectname = mysqli_real_escape_string($conn, $_POST['projectname']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);

    if (empty($projectname)) {
        array_push($errors, "กรุณากรอกหัวข้อโครงงาน");
        $_SESSION['error'] = "กรุณากรอกหัวข้อโครงงาน";
        header('location: admin-addproject.php');
    }
    if (empty($class)) {
        array_push($errors, "กรุณากรอกระดับชั้น");
        $_SESSION['error'] = "กรุณากรอกระดับชั้น";
        header('location: admin-addproject.php');
    }
    if (empty($year)) {
        array_push($errors, "กรุณากรอกปีการศึกษา");
        $_SESSION['error'] = "กรุณากรอกปีการศึกษา";
        header('location: admin-addproject.php');
    }
    if (empty($url)) {
        array_push($errors, "กรุณากรอกปีการศึกษา");
        $_SESSION['error'] = "กรุณากรอกปีการศึกษา";
        header('location: admin-addproject.php');
    }
    if (!empty($url) && !empty($projectname) && !empty($class) && !empty($year)) {
        $sql = "INSERT INTO project_tb (project_topic, class_name, year,url) VALUES ('$projectname', '$class', '$year', '$url');";
        mysqli_query($conn, $sql);
        header('location: index.php');
    }
}
