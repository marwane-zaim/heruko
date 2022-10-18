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
	<script src="student/ckeditor/ckeditor.js"></script>
    <script src="student/assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="student/assets/js/pace.min.js"></script>
</head>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
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
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Annonces pour la classe : <?php echo $class_row['class_name']; ?> <span class="divider">/</span><?php echo $class_row['subject_code']; ?></b></a></h6>
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
                            <div class="widget-bg-transparent">
                                <div class="widget-body clearfix">
                                   
                                    <div class="accordion" id="accordion-4" role="tablist" aria-multiselectable="true">
                                        <div class="card card-outline-primary">
                                            <div class="card-header" role="tab" id="heading10">
                                                <h6 class="card-title"><a role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse41" aria-expanded="true" aria-controls="collapse41"><i class="align-middle material-icons md-18 mr-1 mr-0-rtl ml-1-rtl">add_box</i> Ajouter Annonce</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse41" class="card-collapse collapse " role="tabpanel" aria-labelledby="heading10">
                                                <div class="card-body">
												<form class="form-horizontal" method="post">
														<form class="form-horizontal" method="post">
																<div class="control-group">
																	
																	<div class="controls">
																			
																	<textarea name="content" id="ckeditor_full"></textarea>
																	
    <script>
                CKEDITOR.replace('ckeditor_full')    ;

    </script>
																</div>
																</div>
                                                                <br>
														<div class="control-group">
														<div class="controls">
														
														<button name="post" class="btn btn-info"><i class="material-icons list-icon">send</i> Poster</button>
														</div>
														</div>
														</form>
														<?php
									if (isset($_POST['post'])){
									$content = $_POST['content'];
									mysqli_query($conn,"insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$get_id','$session_id','$content',NOW())")or die(mysqli_error());
									mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','A ajouter une annonces',NOW(),'announcements_student.php')")or die(mysqli_error());
									?>
									<script>
									window.location = 'announcements.php<?php echo '?id='.$get_id; ?>';
									</script>
									<?php
									}
								?>
																	
				
			
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card-collapse -->
                                        </div>
                                        <!-- /.panel -->
                                        <div class="card card-outline-info">
                                            <div class="card-header" role="tab" id="heading11">
                                                <h6 class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse42" aria-expanded="false" aria-controls="collapse42"><i class="material-icons md-18 align-middle mr-1 mr-0-rtl ml-1-rtl">announcement</i> Mes annonces</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse42" class="card-collapse collapse show" role="tabpanel" aria-labelledby="heading11">
                                                <div class="card-body">
												<div class="col-md-12 d-none d-md-flex flex-column mail-sidebar h-100">
                                            
                                    <!-- /.mail-inbox-header -->
                                    <div class="mail-list flex-1 scrollbar-enabled pr-0">
									<?php
								 $query_announcement = mysqli_query($conn,"select * from teacher_class_announcements
																	where teacher_id = '$session_id'  and  teacher_class_id = '$get_id' order by date DESC
																	")or die(mysqli_error());
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['teacher_class_announcements_id'];
								 ?>
									<div class="mail-list-item unread media">
                                            <a href="#" class="pos-absolute pos-0 zi-0"></a>
									
                                            <!-- /.checkbox -->
                                            <div class="media-body "  id="del<?php echo $id; ?>">
                                                <div class="d-flex">
                                                    <div class="headings-font-family"><span class="mail-title headings-color d-block zi-3"><?php echo $row['content']; ?></span> 
													 
                                                    </div>
                                                    <div class="flex-1"></div>
                                                    <div class="checkbox checkbox-star fs-18">
                                                        <label>
														<form method="post" action="edit_post.php<?php echo '?id='.$get_id; ?>">
												<input type="hidden" name="id" value="<?php echo $id; ?>">
												<button class="btn btn-link" name="edit"><i class="material-icons">edit_note</i>  </button> 
												</form>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- /.d-flex -->
                                                <div class="d-flex align-items-center mt-3">
													<a href="remove_announcements.php<?php echo '?id='.$id; ?>" class="zi-2"><i class="material-icons list-icon align-middle mr-1"> delete_sweep</i> <span class="text-muted fs-12"></span></a>
                                                    <div class="flex-1"></div><span class="text-muted fs-12"><?php echo $row['date']; ?></span>
                                                </div>
                                                <!-- /.d-flex -->
                                            </div>
                                            <!-- /.media-body -->
                                        </div>
										<?php } ?>
                                        <!-- /.mail-list-item -->
                                   
                                        <!-- /.mail-list-item -->
                                    </div>
                                    <!-- /.mail-inbox -->
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
                        <!-- /.widget-holder -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.widget-list -->
            </div>
            <!-- /.container-fluid -->
        </main>
        <!-- /.main-wrappper -->
      
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