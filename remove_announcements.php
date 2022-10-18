<?php include('admin/dbcon.php'); ?>
<?php
$id = $_GET['id'];
mysqli_query($conn,"delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error());
mysqli_query($conn,"delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

