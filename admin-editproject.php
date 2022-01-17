<?php
session_start();
include('server.php');

$email = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} ?>

<?php if (!isset($_SESSION['email'])) {
    header("location: login.php");
} ?>

<?php
$id = $_GET['id'];
$user_check_query = "SELECT * FROM project_tb WHERE project_id = $id";
$query = mysqli_query($conn, $user_check_query);
$result = mysqli_fetch_assoc($query);
$project_topic = $result["project_topic"];
$class_name = $result["class_name"];
$year = $result["year"];
$url = $result["url"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="globalcss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <?php
    function  createConfirmationmbox()
    {
        echo '<script type="text/javascript"> ';
        echo ' function openulr(id) {';
        echo '  if (confirm("ยืนยันการลบข้อมูล")) {';
        echo '    document.location = "deleteproject.php?id=" + id;';
        echo '  }';
        echo '}';
        echo '</script>';
    }
    ?>
    <?php
    createConfirmationmbox();

    ?>

    <nav class="navbar navbar-expand-lg" style="background-color: #FED3FB;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/logo.png" alt="" width="180" height="50">
            </a>
            <h2 class="navbar-brand" href="#" style="color: #9A4795;">ระบบสืบค้น DBTech Project Database</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <h2 class="navbar-brand">ระบบสืบค้น DBTech Project Database</h2> -->
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#" style="color: #A2239A;">หน้าหลัก</a>
                            <!-- <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #A2239A;">จัดการข้อมูลสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #A2239A;">จัดการข้อมูลโครงงาน</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="#">ออกจากระบบ</a> -->
                            <?php if (isset($_SESSION['email'])) : ?>
                                <a class="nav-link" href="index.php?logout='1'" style="color: #A2239A;">ออกจากระบบ</a>
                            <?php endif ?>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>

</head>



<body>

    <br />
    <br />
    <!-- Main -->
    <div class="row align-items-start">
        <div class="col-2 ">
        </div>
        <div class="col-8 ">
            <?php
            echo '<form action="editproject_db.php?id=' . $id . '" method="post">';
            ?>

            <div class="">
                <div class="d-flex justify-content-center">
                    <div class="row align-items-center">
                        <label for="exampleInputEmail1" class="form-label bi bi-people">
                            <img src="assets/folder-plus.svg" alt="" width="50" height="50" class="navbar-brand mx-auto" />
                            แก้ไขข้อมูลโครงงาน
                        </label>
                        <?php include('errors.php'); ?>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php endif ?>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">หัวข้อโครงงาน</div>
                            <?php
                            echo '<input type="text" class="form-control" name="projectname" placeholder="กรุณากรอกหัวข้อโครงงาน" value="' . $project_topic . '"></input>';
                            ?>

                        </div>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">ระดับชั้น</div>
                            <select class="form-select" name="class">
                                <option value="มัธยม" <?php if ($class_name == 'มัธยม') echo 'selected' ?>>มัธยม</option>
                                <option value="ปวช" <?php if ($class_name == 'ปวช') echo 'selected' ?>>ปวช</option>
                                <option value="ปวส" <?php if ($class_name == 'ปวส') echo 'selected' ?>>ปวส</option>
                            </select>
                        </div>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">ปีการศึกษา</div>
                            <select class="form-select" name="year">
                                <option value="2561" <?php if ($year == '2561') echo 'selected' ?>>2561</option>
                                <option value="2562" <?php if ($year == '2562') echo 'selected' ?>>2562</option>
                                <option value="2563" <?php if ($year == '2563') echo 'selected' ?>>2563</option>
                            </select>

                        </div>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">ลิ้งค์ URL</div>
                            <?php
                            echo '<input type="text" class="form-control" name="url" placeholder="กรุณากรอกลิ้งค์ URL" value="' . $url . '"></input>';
                            ?>
                        </div>
                        <div class="row">
                            <br />
                            <div class="col-md-9 offset-md-9">
                                <button type="submit" name="reg_product" class="btn btn-success">บันทึกข้อมูล</button>
                                <a href="admin-1.php" class="btn btn-danger">ย้อนกลับ</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class=" mb-3">
        <div class="col-12">

        </div>
    </div>

    </div>
    <div class="col-2">
        <!-- One of three columns -->
    </div>
    </div>
</body>





</html>