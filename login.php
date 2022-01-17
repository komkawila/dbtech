<?php
session_start();
include('server.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="globalcss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
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
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="row align-items-start">
            <div class="col-3 ">
            </div>
            <div class="col-6 ">
                <div class="card text-center">
                    <div class="card-header" style="background-color: #FED3FB;">
                        <br />
                        <h2 style="color: #A2239A; margin-Bottom: 1.05rem;">เข้าสู่ระบบ</h2>
                    </div>
                    <div class="card-body">

                        <form action="login_db.php" method="post">
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php endif ?>

                            <div class="row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">อีเมล</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <br />

                            <button type="submit" name="login_user" class="btn" style="background-color: #FED3FB;">
                                <h4 style="color: #A2239A; margin: 0.11rem;">เข้าสู่ระบบ</h4>
                            </button>
                        </form>
                        <br />
                        <a href="register.php" class="btn" style="background-color: #F2A0F2;">
                            <h5 style="color: #A2239A; margin: 0.11rem;">ลงทะเบียน</h5>
                        </a>

                    </div>
                    <!-- <div class="card-footer text-muted">
                        2 days ago
                    </div> -->
                </div>
            </div>
            <div class="col-3">
                <!-- One of three columns -->
            </div>
        </div>
        <div class="fixed-bottom">
            <!-- <nav class="nav justify-content-center lg" style="background-color: #FED3FB;"> -->
            <nav class="nav py-md-4 justify-content-center" style="background-color: #FED3FB;">
                <h4 class="navbar-brand text-center" href="#" style="color: #9A4795;">ระบบสืบค้น DBTech Project Database สาขาวิชาเทคโนโลยีธุรกิจดิจิทัล วิทยาลัยอาชีวศึกษาเชียงใหม่</h4>
            </nav>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>