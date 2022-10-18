<?php
include('admin/dbcon.php');
$id = $_GET['id'];
mysqli_query($conn,"delete from files where file_id = '$id' ")or die(mysqli_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
