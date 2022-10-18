<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="student/assets/img/favicon.png">
    <link rel="stylesheet" href="student/assets/css/pace.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Espace Enseignant</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="student/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="student/assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="student/assets/js/pace.min.js"></script>
</head>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include('headernavTeacherStudent.php'); ?>
		<main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5"><b>Ajouter Etudiant : </b></a></h6>
					<?php $query = mysqli_query($conn,"select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					JOIN class ON class.class_id = teacher_class.class_id 
					JOIN subject ON subject.subject_id = teacher_class.subject_id
					where student_id = '$session_id'
					")or die(mysqli_error());
					$row = mysqli_fetch_array($query);
					$id = $row['teacher_class_student_id'];	
					?>
                        <h6 class="page-title-heading mr-0 mr-r-5"><?php echo $row['class_name']; ?></h6>
                        <p class="page-title-description mr-0 d-none d-md-inline-block"><?php echo $row['subject_code']; ?></p>
                    </div>
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                     
                    </div>
                    <!-- /.page-title-right -->
                </div>
                <!-- /.page-title -->
            </div>
            <!-- /.container-fluid -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="container-fluid">
                <div class="widget-list">
                    <div class="col-md-12 widget-holder widget-full-content border-all px-0">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <div class="row no-gutters">
                                    <!-- Mail Sidebar -->
                                 
                                    <!-- /.mail-sidebar -->
                                    <!-- Mails List -->
                                    <div class="col-lg-9 col-md-9 mail-inbox">
                                        <div class="mail-inbox-header">
                                            <div class="mail-inbox-tools d-flex align-items-center">

												
                                              
                                                <div class="btn-group">
                                                <form method="post" action="">
                                                 
                            <button class="btn btn-primary btn-rounded ripple float-left" name="submit" type="submit"  class="btn btn-success cc"> 
                            <i class="material-icons list-icon">add_circle_outline</i>&nbsp;Enregistrer</button>
                                            <!-- /.dropdown -->
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.mail-inbox-tools -->
                                    <div class="flex-1"></div>
                                    <div class="d-none d-sm-block text-right">

                                    </div>
                                </div>
                                <!-- /.mail-inbox-header -->
                                <div class="px-4">
								

							

		<br>
		<br>

<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

<thead>

<tr>

<th>Photo</th>
<th> Nom & Prénom</th>
<th>Classe</th>

<th></th>
</tr>
</thead>
<tbody>

 <?php


$a = 0 ;
$query = mysqli_query($conn,"select * from student LEFT JOIN class on class.class_id = student.class_id
		
") or die(mysqli_error());
while ($row = mysqli_fetch_array($query)) {
$id = $row['student_id'];
$a++;

?>

<tr>
<input type="hidden" name="test" value="<?php echo $a; ?>">
<td width="70" >
<figure class="thumb-xs2">
                                                            <img class="rounded-circle" src="admin/<?php echo $row['location']; ?>" alt="">
                                                        </figure>

</td>
<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
<td><?php echo $row['class_name']; ?></td> 

<td width="80">
<select name="add_student<?php echo $a; ?>" class="span12">
<option></option>
<option>Ajouter</option>
</select>

<input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $id; ?>">
<input type="hidden" name="class_id<?php echo $a; ?>" value="<?php echo $get_id; ?>">
<input type="hidden" name="teacher_id<?php echo $a; ?>" value="<?php echo $session_id; ?>">

</td>

<?php } ?>    

</tr>

</tbody>
</table>

</form>

  
<?php

if (isset($_POST['submit'])){

$test = $_POST['test'];
for($b = 1; $b <=  $test; $b++)
{




$test1 = "student_id".$b;
$test2 = "class_id".$b;
$test3 = "teacher_id".$b;
$test4 = "add_student".$b;

$id = $_POST[$test1];
$class_id = $_POST[$test2];
$teacher_id = $_POST[$test3];
$Add = $_POST[$test4];

$query = mysqli_query($conn,"select * from teacher_class_student where student_id = '$id' and teacher_class_id = '$class_id' ")or die(mysqli_error());
$count = mysqli_num_rows($query); 

if ($count > 0){ ?>

<script>
window.location = "my_students.php<?php echo '?id='.$get_id; ?>"; 
</script>

<?php
}else  
if($Add == 'Ajouter'){


mysqli_query($conn,"insert into teacher_class_student (student_id,teacher_class_id,teacher_id) values('$id','$class_id','$teacher_id') ")or die(mysqli_error());


}else{



}



?>
<script>
window.location = "my_students.php<?php echo '?id='.$get_id; ?>"; 
</script>

<?php
}



}


?>





</tbody>
</table>
                                    <!-- /.contact-list -->
                                </div>
                                <!-- /.px-4 -->
                                <!-- Mails Navigation -->
                            
                            </div>
                            <!-- /.mail-inbox -->
                        </div>
                        <!-- /.mailbox -->
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>
            <!-- /.widget-holder -->
    </div>
    <!-- /.widget-list -->
    </div>
    <!-- /.container-fluid -->
    </main>
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
      
        <!-- CHAT PANEL -->
     
        <!-- /.chat-panel -->
		
    </div>
	
	
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <footer class="footer bg-primary text-inverse text-center">
        <div class="container-fluid"><span class="fs-13 heading-font-family">Copyright @ 2021. Tous les Droits sont réservés. John Nash</span>
        </div>
        <!-- /.container-fluid -->
    </footer>
    </div>
    <!--/ #wrapper -->
    <!-- Scripts -->
	<?php include('script.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    <script src="student/assets/js/bootstrap.min.js"></script>
    <script src="student/assets/js/template.js"></script>
    <script src="student/assets/js/custom.js"></script>
</body>
<?php include('avatar_modal_student.php'); ?>	
</html>