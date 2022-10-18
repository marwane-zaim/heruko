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
    <title>Espace d'étudiant</title>
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
        <?php include('headernavClasse.php'); ?>	
		<main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5"><b>Mes Classes : </b></a></h6>
                    </div>
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                    <?php $query = mysqli_query($conn,"select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysqli_error());
														$count = mysqli_num_rows($query);
									?>
 
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
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg-transparent">
                                <div class="widget-body clearfix">
                                    <!-- Products List -->
                                    <div class="ecommerce-products list-unstyled row">
                                    <?php
														if ($count != '0'){
														while($row = mysqli_fetch_array($query)){
														$id = $row['teacher_class_id'];	
													?>
                                        <div class="product col-12 col-sm-6 col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="javascript:void(0);">
                                                    <a href="my_classmates.php<?php echo '?id='.$id; ?>">
														
                                                        <img src="<?php echo $row['thumbnails'] ?>" alt=""> </span>
                                                    </a>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <h5 class="product-title"><?php echo $row['class_name']; ?></h5><span class="product-price"><?php echo $row['subject_code']; ?></span>
                                                    </div>
                                                    <!-- /.d-flex --> <span class="text-muted"> Enseignant : <?php echo $row['firstname']." ".$row['lastname']?></span>
                                                </div>
                                                
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <div class="product-info"><a href="my_classmates.php<?php echo '?id='.$id; ?>"><i class="list-icon material-icons">remove_red_eye</i>&nbsp; acceder</a>
                                                    </div>
                                                  
                                                </div>
                                                <!-- /.card-footer -->
                                                
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <?php }}else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> Vous n'etes pas inscrit dans une classe.</div>
									<?php } ?>	
                                        <!-- /.product -->
           
                                                                   <!-- /.ecommerce-products -->
                                    <!-- Product Navigation -->
                                    
                                    <!-- /.col-md-12 -->
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