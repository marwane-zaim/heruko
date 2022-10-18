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
	<style>
		@media print {
  #printPageButton {
    display: none;
  }
}
	</style>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="student/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="student/assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="student/assets/js/pace.min.js"></script>
    <style>
        .cc {
            color : white;
        }
        </style>
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
                    <?php $class_query = mysqli_query($conn,"select * from teacher_class
	LEFT JOIN class ON class.class_id = teacher_class.class_id
	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
	where teacher_class_id = '$get_id'")or die(mysqli_error());
	$class_row = mysqli_fetch_array($class_query);
	?>
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Liste d'étudiants  pour classe : <?php echo $class_row['class_name']; ?> <span class="divider">/</span><?php echo $class_row['subject_code']; ?></b></a></h6>
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
                        
                    </div>
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            </li>
                          
                        </ol>
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

													
                                         
									
							      
												<button id="printPageButton" onclick="window.print()"  class="btn btn-primary btn-rounded ripple float-left cc">                             <i class="material-icons list-icon">local_printshop</i>&nbsp; Imprimer la liste</button>
						

                                                 
                                      
                                            <!-- /.dropdown -->
                                    
                                        <!-- /.btn-group -->
                                   
                                    <!-- /.mail-inbox-tools -->
                                  
              
                                </div>
								<br>
                                <!-- /.mail-inbox-header -->
                                <div class="px-4">
                   
									<table class="table table-bordered">
                                        <thead>
                                            <tr>
											<th>Prénom</th>
                                                <th>Nom</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
														$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
														while($row = mysqli_fetch_array($my_student)){
														$id = $row['teacher_class_student_id'];
														?>  
                                            <tr id="del<?php echo $id; ?>">
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php  echo $row['lastname']; ?></td>
                                               
                                            </tr>
											<?php } ?>
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
    <!--/ #wrapper -->		<?php include('script.php'); ?>
    <!-- Scripts -->
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