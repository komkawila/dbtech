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
        echo '    document.location = "deleteuser.php?id=" + id;';
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
            <a class="navbar-brand" href="">
                <img src="assets/logo.png" alt="" width="180" height="50">
            </a>
            <h2 class="navbar-brand" href="" style="color: #9A4795;">ระบบสืบค้น DBTech Project Database</h2>
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
                            <a class="nav-link" aria-current="page" href="admin-1.php" style="color: #A2239A;">หน้าหลัก</a>
                            <!-- <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-2.php" style="color: #A2239A;">จัดการข้อมูลสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-1.php" style="color: #A2239A;">จัดการข้อมูลโครงงาน</a>
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
            <form>
                <div class="mb-1">
                    <div class="d-flex justify-content-center">
                        <div class="row align-items-center">
                            <label for="exampleInputEmail1" class="form-label bi bi-people">
                                <img src="assets/people.svg" alt="" width="50" height="50" class="navbar-brand mx-auto" />
                                ข้อมูลสมาชิก

                            </label>

                            <div class="col-7">
                                <div id="emailHelp" class="form-text">ค้นหาสมาชิก</div>
                                <input type="text" class="form-control" name="email"></input>
                            </div>
                            <div class="col-1 ">
                                <div id="emailHelp" class="form-text">ค้นหา</div>
                                <!-- <br /> -->
                                <button type="submit" class="btn btn-light"><img src="assets/search.svg" alt="" class="navbar-brand mx-auto" style='--color_fill: #000;'" /></button>
                                
                            </div>
                            <div class=" col-4 ">
                                <div id="emailHelp" class="form-text">เพิ่มข้อมูลสมาชิก
                            </div>
                            <!-- <br /> -->
                            <a href="admin-adduser.php" class="btn btn-success">เพิ่มข้อมูลสมาชิก</a>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <div class=" mb-3">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">โรงเรียน</th>
                            <th scope="col">ระดับชั้น</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $email = $_GET['email'];
                        if (!empty($_GET['email'])) {  // invalue
                            $search_query = "SELECT * FROM users_tb where permission = 1 and email LIKE '%$email%';";
                            $query_2 = mysqli_query($conn, $search_query);
                            $conunt = 0;
                            while ($rows[] = mysqli_fetch_array($query_2)) {
                                echo '<tr>';
                                echo '<th scope="row">' . ($conunt + 1) . ' </th>';
                                echo '<td>' . $rows[$conunt]['name'] . '</td>';
                                echo '<td>' . $rows[$conunt]['school'] . '</td>';
                                echo '<td>' . $rows[$conunt]['class_name'] . '</td>';
                                echo '<td>' . $rows[$conunt]['email'] . '</td>';
                                echo '<td> <a type="button" class="btn btn-warning btn-sm" href="admin-edituser.php?id=' . $rows[$conunt]['id'] . '">แก้ไข</a> <a type="button" href="javascript:openulr(' . $rows[$conunt]['id'] . ');" class="btn btn-danger btn-sm">ลบ</a> </td>';
                                echo '</tr>';
                                $conunt++;
                            }
                        } else { // emtry
                            $search_query = "SELECT * FROM users_tb where permission = 1 limit 10 ;";
                            $query_2 = mysqli_query($conn, $search_query);
                            $conunt = 0;
                            while ($rows[] = mysqli_fetch_array($query_2)) {
                                echo '<tr>';
                                echo '<th scope="row">' . ($conunt + 1) . ' </th>';
                                echo '<td>' . $rows[$conunt]['name'] . '</td>';
                                echo '<td>' . $rows[$conunt]['school'] . '</td>';
                                echo '<td>' . $rows[$conunt]['class_name'] . '</td>';
                                echo '<td>' . $rows[$conunt]['email'] . '</td>';
                                echo '<td> <a type="button" class="btn btn-warning btn-sm" href="admin-edituser.php?id=' . $rows[$conunt]['id'] . '">แก้ไข</a> <a type="button" href="javascript:openulr(' . $rows[$conunt]['id'] . ');" class="btn btn-danger btn-sm">ลบ</a> </td>';
                                echo '</tr>';
                                $conunt++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        if (!empty($_GET['email'])) {
            echo '<a href="admin-2.php" class="btn btn-light"><img src="assets/box-arrow-left.svg" class="navbar-brand mx-auto" /></a>';
        }
        ?>

    </div>
    <div class="col-2">
        <!-- One of three columns -->
    </div>
    </div>
</body>





</html>