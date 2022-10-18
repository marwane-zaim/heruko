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
    <title>Espace Etudiant</title>
    <!-- CSS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
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
	.blue{
		color:#77ACF1;
	}
	</style>
</head>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include('headernavStudentClas.php'); ?>
                <!-- /.site-sidebar -->
		<main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                        <h6 class="page-title-heading mr-0 mr-r-5">Mes Cours</h6>
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
                  
                    <!-- /.row -->
                    <div class="row">
                   
                        <!-- /.widget-holder -->
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
								<?php 	$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error());
									$count = mysqli_num_rows($query);
							?>
                                    <h5 class="box-title mr-b-0">Cours Ajoutés :</h5>

                                    </p>

<div class="row">
									<?php
									$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error());
									$count = mysqli_num_rows($query);	
								if ($count == '0'){ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> Aucun Cours disponible pour le moment.</div>
								<?php
								}else{
								?>¨
									<?php
										$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['file_id'];
									?>   
									
										<div class="col-md-4 mr-b-30 d-flex">
                                            <div class="blog-post blog-post-card text-center">
                                                <figure>
                                                    <a href="#">
                                                        <img src="student/assets/demo/users/class.jpg" alt="">
                                                    </a>
                                                </figure>
                                                <header>
                                                 
                                                    <div class="text-muted blog-post-tags">
                                                        <ul class="ml-1 inline-block list-unstyled list-inline">
                                                            <li class="list-inline-item"><a >Ajouté par : <strong class="blue"><?php echo $row['uploaded_by']; ?></a></strong><br>
                                                            </li>
                                                            <li class="list-inline-item"><a ><strong class="blue"><?php echo $row['fdatein']; ?></strong></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="h3 fw-300 m-1 blog-post-title"><a href="#"><?php  echo $row['fname']; ?></a></h4>
                                                </header>
                                                <footer class="mr-t-30">
													
												<a   id="<?php echo $id; ?>Download" href="<?php echo $row['floc']; ?>" class="btn btn-outline-primary btn-rounded">Télécharger</a>
                                                <script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Download').tooltip('show');
															$('#<?php echo $id; ?>Download').tooltip('hide');
														});
														</script>	
											</footer>
                                            </div>
                                            <!-- /.blog-post -->
                                        </div>
										<?php } ?>	
										<?php } ?>
                                </div>
								</div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                        <!-- /.widget-holder -->
                  
                        <!-- /.widget-holder -->
                    
                        <!-- /.widget-holder -->
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