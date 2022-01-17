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
$user_check_query = "SELECT * FROM users_tb WHERE email = '$email' LIMIT 1";
$query = mysqli_query($conn, $user_check_query);
$result = mysqli_fetch_assoc($query);
$email = $result["email"];
$password = $result["password"];
$permission = $result["permission"];
if ($permission == 0) header("location: admin-1.php");
?>

<!-- SELECT * FROM project_tb where project_topic LIKE '%project%' -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="globalcss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <nav class="navbar navbar-expand-lg" style="background-color: #FED3FB;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-0 mb-lg-0">
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="userpage.php" style="color: #A2239A;">หน้าหลัก</a>
                        </li>
                        <?php if ($permission == 0) {

                            echo '<li class="nav-item">
                                <a class="nav-link" href="#" style="color: #A2239A;">จัดการข้อมูลสมาชิก</a>
                                </li>';
                            echo '<li class="nav-item">
                                <a class="nav-link" href="#" style="color: #A2239A;">จัดการข้อมูลโครงงาน</a>
                                </li>';
                        } ?>


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

    <nav class="navbar navbar-expand-md" style="background-color: #FBE1FB;">
        <div class="container-fluid">
            <div class="mx-auto order-0">
                <div class="row align-items-start">
                    <div class="col-3">
                        <img src="assets/logo.png" alt="" width="350" height="180" class="navbar-brand mx-auto">
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-7 text-center bottom">
                        <br />
                        <br />
                        <div class="row">
                            <h2 class="navbar-brand mx-auto" href="#" style="color: #9A4795;">ระบบสืบค้น DBTech Project Database</h2>
                        </div>
                        <div class="row">
                            <h2 class="navbar-brand mx-auto" href="#" style="color: #9A4795;">สาขาวิชาเทคโนโลยีธุรกิจดิจิทัล วิทยาลัยอาชีวศึกษาเชียงใหม่</h2>
                        </div>

                    </div>
                </div>
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
                                ข้อมูลโครงงาน
                            </label>
                            <div class="col-2 ">
                                <div id="emailHelp" class="form-text">ระดับชั้น</div>
                                <select class="form-select" name="class">
                                    <option value="มัธยม">มัธยม</option>
                                    <option value="ปวช">ปวช</option>
                                    <option value="ปวส">ปวส</option>
                                </select>
                            </div>
                            <div class="col-2 ">
                                <div id="emailHelp" class="form-text">ปีการศึกษา</div>
                                <select class="form-select" name="year">
                                    <option value="2561">2561</option>
                                    <option value="2562">2562</option>
                                    <option value="2563">2563</option>
                                </select>

                            </div>
                            <div class="col-6 ">
                                <div id="emailHelp" class="form-text">ค้นหาโครงงาน</div>
                                <input type="text" class="form-control" name="searchmsg"></input>
                            </div>
                            <div class="col-2 ">
                                <div id="emailHelp" class="form-text">ค้นหา</div>
                                <!-- <br /> -->
                                <button type="submit" class="btn btn-light"><img src="assets/search.svg" alt="" class="navbar-brand mx-auto" style='--color_fill: #000;'" /></button>
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
                                                    <th scope="col">หัวข้อโครงการ</th>
                                                    <th scope="col">ระดับชั้น</th>
                                                    <th scope="col">ปีการศึกษา</th>
                                                    <th scope="col">URL</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $searchmsg = $_GET['searchmsg'];
                                                $class = $_GET['class'];
                                                $year = $_GET['year'];
                                                if (!empty($_GET['searchmsg']) && !empty($_GET['class']) && !empty($_GET['year'])) {  // invalue
                                                    $search_query = "SELECT * FROM project_tb where project_topic LIKE '%$searchmsg%' and year = '$year' and class_name = '$class';";
                                                    $query_2 = mysqli_query($conn, $search_query);
                                                    $conunt = 0;
                                                    while ($rows[] = mysqli_fetch_array($query_2)) {
                                                        echo '<tr>';
                                                        echo '<th scope="row">' . ($conunt + 1) . ' </th>';
                                                        echo '<td>' . $rows[$conunt]['project_topic'] . '</td>';
                                                        echo '<td>' . $rows[$conunt]['class_name'] . '</td>';
                                                        echo '<td>' . $rows[$conunt]['year'] . '</td>';
                                                        echo '<td><a target = "_blank" href= "' . $rows[$conunt]['url'] . '">' . $rows[$conunt]['url'] . '</a></td>';

                                                        echo '</tr>';
                                                        $conunt++;
                                                    }
                                                } else { // emtry
                                                    $search_query = "SELECT * FROM project_tb limit 5;";
                                                    $query_2 = mysqli_query($conn, $search_query);
                                                    $conunt = 0;
                                                    while ($rows[] = mysqli_fetch_array($query_2)) {
                                                        echo '<tr>';
                                                        echo '<th scope="row">' . ($conunt + 1) . ' </th>';
                                                        echo '<td>' . $rows[$conunt]['project_topic'] . '</td>';
                                                        echo '<td>' . $rows[$conunt]['class_name'] . '</td>';
                                                        echo '<td>' . $rows[$conunt]['year'] . '</td>';
                                                        echo '<td><a target = "_blank" href= "' . $rows[$conunt]['url'] . '">' . $rows[$conunt]['url'] . '</a></td>';

                                                        echo '</tr>';
                                                        $conunt++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                        </div>
                        <div class="col-2">
                            <!-- One of three columns -->
                        </div>
                    </div>
</body>