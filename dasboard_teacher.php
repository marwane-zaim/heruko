<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php include('count.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" >
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
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="student/assets/js/pace.min.js"></script>
</head>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include('headernavTeacherClass.php'); ?>	
		<main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                    <?php
						$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
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
									<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);
										
										if ($count > 0){
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>
                                        <div class="product col-12 col-sm-6 col-md-4" id="del<?php echo $id; ?>">
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="javascript:void(0);">
                                                    <a href="my_students.php<?php echo '?id='.$id; ?>">
														
                                                        <img src="<?php echo $row['thumbnails'] ?>" alt=""> </span>
                                                    </a>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <h5 class="product-title"><?php echo $row['class_name']; ?></h5><span class="product-price"><?php echo $row['subject_code']; ?></span>
                                                    </div>
                                                    <!-- /.d-flex --> <span class="text-muted"> </span>
                                                </div>
                                                
                                                <!-- /.card-body -->
                                                <div class="card-footer">
													
			
                                                    <div class="product-info">
                                                       
                                                    <a href="my_students.php<?php echo '?id='.$id; ?>"><i class=" material-icons">remove_red_eye</i></a>
                                                
                                                    <a href="delete_class.php<?php echo '?id='.$id; ?> "><i class="material-icons " >delete_forever</i></a>
                                                </div>
                                                    
                                                </div>
                                                <!-- /.card-footer -->
												
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <?php }}else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> Aucun classe est ajouté</div>
									<?php } ?>	
                                        <!-- /.product -->
           
                                                                   <!-- /.ecommerce-products -->
                                    <!-- Product Navigation -->
                                    
                                    <!-- /.col-md-12 -->
                                </div>
								<div class="col-md-12 widget-holder">
                            <div class="widget-bg-transparent">
                                <div class="widget-body clearfix">
                                    <h5 class="box-title">Ajouter une classe</h5>
                                    <div class="accordion" id="accordion-4" role="tablist" aria-multiselectable="true">
                                   
                                        <!-- /.panel -->
                                        <div class="card card-outline-info">
                                            <div class="card-header" role="tab" id="heading11">
                                                <h6 class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse42" aria-expanded="false" aria-controls="collapse42"><i class="material-icons md-18 align-middle mr-1 mr-0-rtl ml-1-rtl">add_circle_outline</i> Ajouter une classe</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse42" class="card-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                                <div class="card-body">
												<div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                                  
                                
                                    
									<form method="post" id="add_class">
										<div class="control-group">
										<label class="col-md-3 col-form-label" for="l0"> Nom de la classe:</label>
                                          <div class="col-md-9">
											<input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                                            <select name="class_id"   class="form-control" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from class order by class_name");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="col-md-9">
										<label class="col-md-3 col-form-label" for="l0"> Matiere:</label>
                                          <div class="controls">
                                            <select name="subject_id"   class="form-control" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from subject order by subject_code");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
										<label class="col-md-3 col-form-label" for="l0">Année scolaire:</label>
                                          <div class="col-md-9">
											<?php
											$query = mysqli_query($conn,"select * from school_year order by school_year DESC");
											$row = mysqli_fetch_array($query);
											?>
											<input id=""  type="text"  class="form-control" name="school_year" value="<?php  echo $row['school_year']; ?>" >
                                          </div>
                                        </div>
										<br>
											<div class="col-md-9">
                                          <div class="col-md-9">
												<button name="save" class="btn btn-info col-sm-6"><i class="material-icons list-icon">add_circle_outline</i>  Ajouter</button>
                                          </div>
                                        </div>
                                </form>
								
            <script>
			jQuery(document).ready(function($){
				$("#add_class").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "add_class_action.php",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("La classe existe déja");
						}else{
							$.jGrowl("Classe Ajouté");
							var delay = 500;
							setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
						}
						}
					});
				});
			});
			</script>	
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
												</div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card-collapse -->
                                        </div>
                                        <!-- /.panel -->
                                    
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.panel-group -->
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
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

    
    <script src="student/assets/js/bootstrap.min.js"></script>
    
    <script src="student/assets/js/custom.js"></script>
</body>

</html>