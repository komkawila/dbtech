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
$user_check_query = "SELECT * FROM users_tb WHERE id = $id";
$query = mysqli_query($conn, $user_check_query);
$result = mysqli_fetch_assoc($query);
$email = $result["email"];
$password = $result["password"];
$name = $result["name"];
$school = $result["school"];
$class_name = $result["class_name"];
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
            echo '<form action="edituser_db.php?id=' . $id . '" method="post">';
            ?>
            <!-- <form action="edituser_db.php" method="post"> -->
            <div class="">
                <div class="d-flex justify-content-center">
                    <div class="row align-items-center">
                        <label for="exampleInputEmail1" class="form-label bi bi-people">
                            <img src="assets/folder-plus.svg" alt="" width="50" height="50" class="navbar-brand mx-auto" />
                            แก้ไขข้อมูลสมาชิก
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
                            <div id="emailHelp" class="form-text">ชื่อ-นามสกุล</div>
                            <!-- <input type="text" class="form-control" name="name" placeholder="กรุณากรอก ชื่อ-นามสกุล"></input> -->

                            <?php
                            echo '<input type="text" class="form-control" name="name" placeholder="กรุณากรอก ชื่อ-นามสกุล" value="' . $name . '"></input>';
                            ?>
                        </div>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">โรงเรียน</div>
                            <!-- <input type="text" class="form-control" name="school" placeholder="กรุณากรอก โรงเรียน"></input> -->

                            <?php
                            echo '<input type="text" class="form-control" name="school" placeholder="กรุณากรอก โรงเรียน" value="' . $school . '"></input>';
                            ?>
                        </div>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">ระดับชั้น</div>
                            <select class="form-select" name="class_name">

                                <option value="มัธยม" <?php if ($class_name == 'มัธยม') echo 'selected' ?>>มัธยม</option>
                                <option value="ปวช" <?php if ($class_name == 'ปวช') echo 'selected' ?>>ปวช</option>
                                <option value="ปวส" <?php if ($class_name == 'ปวส') echo 'selected' ?>>ปวส</option>
                                <option value="อื่นๆ" <?php if ($class_name == 'อื่นๆ') echo 'selected' ?>>อื่นๆ</option>
                            </select>
                        </div>
                        <div class="row ">
                            <div id="emailHelp" class="form-text">อีเมล</div>
                            <!-- <input type="email" class="form-control" name="email" placeholder="กรุณากรอกอีเมล"></input> -->
                            <?php
                            echo '<input type="email" class="form-control" name="email" placeholder="กรุณากรอกอีเมล" value="' . $email . '"></input>';
                            ?>
                        </div>
                        <div class="row">
                            <br />
                            <div class="col-md-9 offset-md-9">
                                <button type="submit" name="reg_user" class="btn btn-success">บันทึกข้อมูล</button>
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