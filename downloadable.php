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
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Cours pour la classe : <?php echo $class_row['class_name']; ?> <span class="divider">/</span><?php echo $class_row['subject_code']; ?></b></a></h6>
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
                                                <h6 class="card-title"><a role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse41" aria-expanded="true" aria-controls="collapse41"><i class="align-middle material-icons md-18 mr-1 mr-0-rtl ml-1-rtl">description</i> Mes cours</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse41" class="card-collapse collapse show" role="tabpanel" aria-labelledby="heading10">
                                                <div class="card-body">
												<table class="table table-hover">
                                                        <thead>
                                                            <tr class="bg-info text-inverse">
                                                                <th>Date d'ajout </th>
                                                                <th>Nom du cours</th>
                                                                <th>Description</th>
																<th>Action</th>
												<th></th>
                                                            </tr>
                                                        </thead>
                                                        
														<tbody>
														<?php
										$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id'  order by fdatein DESC ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['file_id'];
									?>  
                                                            <tr id="del<?php echo $id; ?>">
                                                                <td><?php echo $row['fdatein']; ?></td>
                                                                <td><?php  echo $row['fname']; ?></td>
															
                                                                <td>
																<?php echo $row['fdesc']; ?></td>
																
										 <td>
										 <a data-placement="bottom"  id="<?php echo $id; ?>download" href="<?php echo $row['floc']; ?>"><i class="material-icons list-icon">file_download</i></a >
										 <a    href="delete_file.php<?php echo '?id='.$id; ?>"><i class="material-icons list-icon">delete_forever</i></a >
										 
										 </td>
										 <script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>
										 	<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>remove').tooltip('show');
															$('#<?php echo $id; ?>remove').tooltip('hide');
														});
														</script>
															</tr>
															<?php } ?>
                                                      
                                                        </tbody>
                                                    </table>
																	
				
			
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card-collapse -->
                                        </div>
                                        <!-- /.panel -->
                                        <div class="card card-outline-info">
                                            <div class="card-header" role="tab" id="heading11">
                                                <h6 class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse42" aria-expanded="false" aria-controls="collapse42"><i class="material-icons md-18 align-middle mr-1 mr-0-rtl ml-1-rtl">add_circle_outline</i> Ajouter un cours</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse42" class="card-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                                <div class="card-body">
												<div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                                  
                                    <form class="" id="add_downloadble" method="post" enctype="multipart/form-data" name="upload">
						
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l0">Cours</label>
                                            <div class="col-md-9">
                                                <input class="form-control"type="text" name="name" Placeholder="Choisir un non pour le cours"  class="input" required>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l0">Description</label>
                                            <div class="col-md-9">
                                                <input  class="form-control" type="text" name="desc" Placeholder="Description"  class="input" required>
                                            </div>
                                        </div>
                             
                                        <!-- /.form-group -->
                                       
                                        <!-- /.form-group -->
                                    
                       
                                   
                                      
                          
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="l16">Document</label>
                                            <div class="col-md-9">
                                            <input name="uploaded_file"  class="form-control"id="fileInput" type="file" required>
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="form-group row">
                                                <div class="col-md-9 ml-md-auto btn-list">
                                                    <button class="col-md-3 btn btn-info btn-rounded" type="submit">Ajouter</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
						<script>
			jQuery(document).ready(function($){
				$("#add_downloadble").submit(function(e){
					$.jGrowl("cours est entrain de téléchargement......", { sticky: true });
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "upload_save.php",
						data: formData,
						success: function(html){
							$.jGrowl("cours a été bien ajouté", );
                            setTimeout(function(){
                                window.location = 'downloadable.php<?php echo '?id='.$get_id; ?>';
                            },2000)
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>
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