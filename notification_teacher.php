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
		<?php include('headernavTeacherMessage.php'); ?>	
        <!-- /.site-sidebar -->
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
                                                <?php if($not_read == '0'){
									}else{ ?>
                                                    <span class="checkbox checkbox-primary bw-3 heading-font-family fs-14 fw-semibold headings-color mail-inbox-select-all"><label><input type="checkbox"> <span class="label-text">Select all</span>
                                                    </label>
                                                    </span>
                                                    <div class="flex-1"></div>
                                                    <div class="btn-group">
													<button id="delete" type="submit" class="btn btn-info" name="read"><i class="icon-check"></i> Read</button>
												
                                                    
                                                <!-- /.dropdown -->
                                            </div>
                                            <!-- /.btn-group -->
                                            <?php } ?>
                                        </div>
                                        <!-- /.mail-inbox-tools -->
                                    </div>




									<?php $query = mysqli_query($conn,"select * from teacher_notification
					LEFT JOIN teacher_class on teacher_class.teacher_class_id = teacher_notification.teacher_class_id
					LEFT JOIN student on student.student_id = teacher_notification.student_id
					LEFT JOIN assignment on assignment.assignment_id = teacher_notification.assignment_id 
					LEFT JOIN class on teacher_class.class_id = class.class_id
					LEFT JOIN subject on teacher_class.subject_id = subject.subject_id
					where teacher_class.teacher_id = '$session_id'  order by  teacher_notification.date_of_notification DESC
					")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					while($row = mysqli_fetch_array($query)){
					$assignment_id = $row['assignment_id'];
					$get_id = $row['teacher_class_id'];
					$id = $row['teacher_notification_id'];
					
					
					$query_yes_read = mysqli_query($conn,"select * from notification_read_teacher where notification_id = '$id' and teacher_id = '$session_id'")or die(mysqli_error());
					$read_row = mysqli_fetch_array($query_yes_read);
					
					$yes = $read_row['student_read']='no'; 
					
					?>	
                                    <!-- /.mail-inbox-header -->
                                    <div class="mail-list flex-1 scrollbar-enabled pr-0">
							

                                        <div class="mail-list-item read media" id="del<?php echo $id; ?>">
										<?php if ($yes == 'yes'){
										}else{
										?>
                                            <a href="#" class="pos-absolute pos-0 zi-0"></a>
              
											<?php } ?>	
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
													<a href="<?php echo $row['link']; ?><?php echo '?id='.$get_id; ?>&<?php echo 'post_id='.$assignment_id; ?>" class="zi-2"><i class="material-icons">trending_flat</i>
												 <span class="text-muted fs-12"><?php echo $row['class_name']; ?> 
											<?php echo $row['subject_code']; ?> </span></a>
                                                    <div class="flex-1"></div><span class="text-muted fs-12"><?php echo $row['date_of_notification']; ?> </span>
                                                </div>
                                                <!-- /.d-flex -->
                                            </div>
                                            <!-- /.media-body -->
					
                                        </div>
					
										<?php }?>
					
										
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