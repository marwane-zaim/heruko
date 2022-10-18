<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $subject_id = $_GET['subject_id']; ?>
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
	
	<script src="student/ckeditor/ckeditor.js"></script>
    <script src="student/assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="student/assets/js/pace.min.js"></script>
</head>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
    <?php include('headernavTeacherStudent.php'); ?>	
        <!-- /.site-sidebar -->
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
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Information pour la classe : <?php echo $class_row['class_name']; ?> <span class="divider">/</span><?php echo $class_row['subject_code']; ?></b></a></h6>
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
                 
                        <div class="col-12 col-md-2 widget-holder widget-full-content"></div>
                        <!-- User Summary -->
                        <div class="col-12 col-md-8 widget-holder widget-full-content">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                                    <div class="widget-user-profile">
                                        <figure class="profile-wall-img">
                                            <img src="student/assets/demo/user-widget-bg.jpeg" alt="User Wall">
                                        </figure>
                                        <div class="profile-body">
                                            
                                            
										<?php 
								$subject_query = mysqli_query($conn,"select * from class_subject_overview where  class_subject_overview_id  = '$subject_id'")or die(mysqli_error());
								$subject_row = mysqli_fetch_array($subject_query);
								?>
														<form class="form-horizontal" method="post">
																<div class="control-group">
																	<label class="control-label" for="inputPassword">Déscription :</label>
																	<div class="controls">
																			
																	<textarea name="content" id="ckeditor_full"><?php echo $subject_row['content']; ?></textarea>
																	
    <script>
                CKEDITOR.replace('ckeditor_full')    ;

    </script>
																</div>
																</div>
                                                                <br>
														<div class="control-group">
														<div class="controls">
														
														<button name="save" type="submit" class="btn btn-primary btn-rounded ripple float-right">
                                                            <i class="material-icons list-icon">save</i>&nbsp; Enregistrer</button>
														</div>
														</div>
														</form>
										<?php
										if (isset($_POST['save'])){
										$content = $_POST['content'];
										mysqli_query($conn,"update class_subject_overview set content = '$content' where class_subject_overview_id = '$subject_id'")or die(mysqli_error());
										?>
										<script>
											window.location = 'subject_overview.php<?php echo '?id='.$get_id; ?>';
										</script>
										<?php
										}
										
										?>
                                            <!-- /.profile-user-description -->
                                          
                                        </div>
                                        <!-- /.d-flex -->
                                      
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.widget-user-profile -->
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                        <!-- /.widget-holder -->
                        <!-- Tabs Content -->
                        
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