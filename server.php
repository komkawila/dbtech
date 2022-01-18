<?php 

    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "dbtech_db";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($conn,'SET NAMES UTF8');
    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }
