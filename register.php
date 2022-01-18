<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="globalcss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg " style="background-color: #FED3FB;">
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
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php" style="color: #A2239A;">เข้าสู่ระบบ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php" style="color: #A2239A;">ลงทะเบียน</a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <br />
        <div class="row align-items-start">
            <div class="col-3 ">
            </div>
            <div class="col-6 ">
                <form action="register_db.php" method="post">
                    <div class="card text-center">
                        <div class="card-header" style="background-color: #FED3FB;">
                            <br />
                            <h2 style="color: #A2239A; margin-Bottom: 1.05rem;">สมัครสมาชิก</h2>
                        </div>
                        <div class="card-body">

                            <?php include('errors.php'); ?>
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php endif ?>

                            <div class="row">
                                <label for="name" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <label for="school" class="col-sm-3 col-form-label">โรงเรียน</label>
                                <div class="col-sm-9">
                                    <input type="text" name="school" class="form-control">
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <label for="class_name" class="col-sm-3 col-form-label">ระดับชั้น</label>
                                <div class="col-sm-9 text-start">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="class_name" value="มัธยม" checked>
                                        <label class="form-check-label" for="inlineRadio1">มัธยม</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="class_name" value="ปวช" >
                                        <label class="form-check-label" for="inlineRadio1">ปวช</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="class_name" value="ปวส">
                                        <label class="form-check-label" for="inlineRadio2">ปวส</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="class_name" value="อื่นๆ">
                                        <label class="form-check-label" for="inlineRadio2">อื่นๆ</label>
                                    </div>
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <label for="email" class="col-sm-3 col-form-label">อีเมล</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <label for="password_1" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_1" class="form-control">
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <label for="password_2" class="col-sm-3 col-form-label">ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_2" class="form-control">
                                </div>
                            </div>
                            <br />
                            <button type="submit" name="reg_user" class="btn" style="background-color: #FED3FB;">
                                <h6 style="color: #A2239A; margin: 0.11rem;">สมัครสมาชิก</h6>
                            </button>
                            <br />

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <!-- One of three columns -->
            </div>
        </div>
        <div class="fixed-bottom">
            <nav class="nav py-md-4 justify-content-center" style="background-color: #FED3FB;">
                <h4 class="navbar-brand text-center" href="#" style="color: #9A4795;">ระบบสืบค้น DBTech Project Database สาขาวิชาเทคโนโลยีธุรกิจดิจิทัล วิทยาลัยอาชีวศึกษาเชียงใหม่</h4>
            </nav>
        </div>
    </div>

    <div class="fixed-bottom">
        <nav class="nav py-md-4 justify-content-center" style="background-color: #FED3FB;">
            <h4 class="navbar-brand text-center" href="#" style="color: #9A4795;">ระบบสืบค้น DBTech Project Database สาขาวิชาเทคโนโลยีธุรกิจดิจิทัล วิทยาลัยอาชีวศึกษาเชียงใหม่</h4>
        </nav>
    </div>
</body>

</html>