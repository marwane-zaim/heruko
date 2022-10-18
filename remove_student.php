<?php
include('admin/dbcon.php');
$id = $_GET['id'];
mysqli_query($conn,"delete from teacher_class_student where teacher_class_student_id = '$id'")or die(mysqli_error());


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

