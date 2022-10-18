    <?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php include('count.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="student/assets/img/favicon.png">
    <link rel="stylesheet" href="student/assets/css/pace.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Espace Etudiant</title>
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
        <?php include('headernav.php'); ?>
     <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Notifications </b></h6>
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
                    <div class="row no-gutters">
                        <div class="col-md-12 widget-holder widget-full-content">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                                    <div class="mail-inbox border-all row no-gutters" style="height: 90vh">
                                        <!-- Mail Sidebar -->
                                        <div class="col-md-12 d-none d-md-flex flex-column mail-sidebar h-100">
                                            <div class="mail-inbox-header">
											<form action="read.php" method="post">
                                                <div class="mail-inbox-tools flex-1 d-flex align-items-center">
                                        
                                              
                                                    <div class="flex-1"></div>
                                                    <div class="btn-group">
													
												
                                                    
                                                <!-- /.dropdown -->
                                            </div>
                                            <!-- /.btn-group -->
                                          
                                        </div>
                                        <!-- /.mail-inbox-tools -->
                                    </div>




									<?php $query = mysqli_query($conn,"select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 	
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year'  order by notification.date_of_notification DESC
					")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					if ($count  > 0){
					while($row = mysqli_fetch_array($query)){
					$get_id = $row['teacher_class_id'];
					$id = $row['notification_id'];
					
                    
					
					$query_yes_read = mysqli_query($conn,"select * from notification_read where notification_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
					$read_row = mysqli_fetch_array($query_yes_read);
					if($read_row){
					$yes = $read_row['student_read'] ;
                    }
					?>		
                                    <!-- /.mail-inbox-header -->
                                    <div class="mail-list flex-1 scrollbar-enabled pr-0">
							

                                        <div class="mail-list-item read media" id="del<?php echo $id; ?>">
									
                                            <a href="#" class="pos-absolute pos-0 zi-0"></a>
                                          
									
                                            <!-- /.checkbox -->
                                            <div class="media-body">
                                                <div class="d-flex">
                                                    <div class="headings-font-family">
														<span class="mail-title headings-color d-block zi-3"><?php echo $row['firstname']." ".$row['lastname'];  ?></span>  
														<small class="text-muted fw-semibold"><?php echo $row['notification']; ?></small>
                                                    </div>
                                                    <div class="flex-1"></div>
                                               
                                                </div>
                                                <!-- /.d-flex -->
                                                <div class="d-flex align-items-center mt-3">
													<a href="<?php echo $row['link']; ?><?php echo '?id='.$get_id; ?>" class="zi-2">
                                                    <i class="material-icons">trending_flat</i>
												 <span class="text-muted fs-12"><?php echo $row['class_name']; ?> 
											<?php echo $row['subject_code']; ?> </span></a>
                                                    <div class="flex-1"></div><span class="text-muted fs-12"><?php echo $row['date_of_notification']; ?> </span>
                                                </div>
                                                <!-- /.d-flex -->
                                            </div>
                                            <!-- /.media-body -->
					
                                        </div>
										<?php
					} }else{
					?>
						<div class="alert alert-info"><strong><i class="icon-info-sign"></i> Aucune notifiaction</strong></div>
					<?php
					}
					?>
                                        <!-- /.mail-list-item -->
                                     
                                        <!-- /.mail-list-item -->
                               
                                        <!-- /.mail-list-item -->
                                      
                                        <!-- /.mail-list-item -->
                                      
                                        <!-- /.mail-list-item -->
                                    </div>
                                    <!-- /.mail-inbox -->
                                </div>
                                <!-- /.mail-sidebar -->
                               
                                <!-- /.col-lg-9 -->
                            </div>
                            <!-- /.mailbox -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.widget-list -->
    </div>
				</form>
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