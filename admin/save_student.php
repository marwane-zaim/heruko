<?php
include('dbcon.php');
        
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
               $class_id = $_POST['class_id'];
               $pass = $_POST['pass'];

               mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,password,status)
		values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','$pass','Unregistered')                                    
		") or die(mysqli_error()); ?>
<?php    ?>