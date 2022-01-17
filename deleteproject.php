<?php
session_start();
include('server.php');
$id = $_GET['id'];
$delete_query = "DELETE FROM project_tb WHERE project_id = $id";
$query = mysqli_query($conn, $delete_query);
$result = mysqli_fetch_assoc($query);
echo $delete_query;
header('location: admin-1.php');
?>
