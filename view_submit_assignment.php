<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>

<?php $get_id = $_GET['id']; ?>
<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
		<script>
		window.location = "assignment_student.php<?php echo '?id='.$get_id; ?>";
		</script>
	  <?php
	  }
	
 ?>
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
	<script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
		<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>
	
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
                    <?php $class_query = mysqli_query($conn,"select * from teacher_class
	LEFT JOIN class ON class.class_id = teacher_class.class_id
	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
	where teacher_class_id = '$get_id'")or die(mysqli_error());
	$class_row = mysqli_fetch_array($class_query);
	?>
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Devoir pour la classe : <?php echo $class_row['class_name']; ?> <span class="divider">/</span><?php echo $class_row['subject_code']; ?></b></a></h6>
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
                    <div class="row">
                        <!-- User Summary -->
                      
                        <!-- /.widget-holder -->
                        <!-- Tabs Content -->
                        <div class="col-12 col-md-12 mr-b-30">
                            <ul class="nav nav-tabs contact-details-tab">
                                <li class="nav-item"><a href="#activity-tab-bordered-1" class="nav-link active" data-toggle="tab">
								<?php
										$query1 = mysqli_query($conn,"select * FROM assignment where assignment_id = '$post_id'")or die(mysqli_error());
										$row1 = mysqli_fetch_array($query1);
									
									?> Pour le  travail : <?php echo $row1['fname']; ?></a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="activity-tab-bordered-1">
                                    <div class="widget-user-activities">
                                    
                                            <div class="span3" id="">
	<div class="row-fluid">
				     
                        <!-- /block -->
					
		
						

	</div>
</div>
                                            <div class="media-body">
                                                <div class="single-header clearfix">
                                                    <div class="float-left float-right-rtl"> 
                                                    </div>
                                                    <!-- /.float-left -->	
			
			

			
				
					
                                                    <!-- /.float-right -->
                                                </div>

                                                <!-- /.single-attachment -->
                                            </div>
                                            <!-- /.media -->
                                   
									
                                        <!-- /.single -->
										<h5  class="text-center"> liste des travaux </h5>
                                        <div class="single media">
                                         	
                                    <table class="table">
                                        <thead>
                                            <tr class="thead-inverse bg-primary">
                                                <th> date d'ajout
						</th>
						
								
                                                <th> document</th>
												<th> description</th>
                                                <th> Etudiant</th>
												<th>Télecharger</th>
												<th>note</th>
												<th></th>
 
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$query = mysqli_query($conn,"select * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										where assignment_id = '$post_id'  order by assignment_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_assignment_id'];
									?> 
                                          	<tr>
										 <td><?php echo $row['assignment_fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                                                        
                                         <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>                                                                        
                                         <td><a href="<?php echo $row['floc']; ?>"><i class="material-icons list-icon">file_download</i></a></td>                                                                        
                                         <td Width="150" >
										 <form method="post" action="save_grade.php">
										 <input type="hidden" class="span4" name="id" value="<?php echo $id; ?>">
										 <input type="hidden" class="span4" name="post_id" value="<?php echo $post_id; ?>">
										 <input type="hidden" class="span4" name="get_id" value="<?php echo $get_id; ?>">
										
										 <input type="text" class="form-control col-sm-8" name="grade" value="<?php echo $row['grade']; ?>">
										</td>
										 <td>
										<button name="save" class="btn btn-success" id="btn_s"><i class="icon-save"></i> Enregistrer</button>
										
									</form>
										 </td>                                                                        
                                </tr>
											<?php } ?>
                                       
                                        </tbody>
                                    </table>
                                            <!-- /.media-body -->
                                        </div>
                                        <!-- /.single -->
                           
                                        <!-- /.single -->
                                    </div>
                                    <!-- /.widget-user-activities -->
                                </div>
                                <!-- /.tab-pane -->
                             
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.col-sm-8 -->
                    </div>
                    <!-- /.row -->
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

	<script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
	
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