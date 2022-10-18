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

 
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="student/assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="student/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->

		
			
	<style>
				div.scrollmenu {
  
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  
}

div.scrollmenu a:hover {
 
}
			</style>
	

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
        <?php include('headernavTeacherMessages.php'); ?>	
		<main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
				
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Inbox </b></h6>
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
                                        <div class="col-md-8 d-none d-md-flex flex-column mail-sidebar h-100">
                                            <div class="mail-inbox-header">

									
                                    </div>
                                    <!-- /.mail-inbox-header -->
                                    <div class="mail-list flex-1 scrollbar-enabled pr-0">
									<?php
								 $query_announcement = mysqli_query($conn,"select * from message
																	LEFT JOIN teacher ON teacher.teacher_id = message.sender_id
																	where  message.reciever_id = '$session_id' order by date_sended DESC
																	")or die(mysqli_error());
								$count_my_message = mysqli_num_rows($query_announcement);	
								if ($count_my_message != '0'){
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['message_id'];
								 $sender_id = $row['sender_id'];
								 $sender_name = $row['sender_name'];
								 $reciever_name = $row['reciever_name'];
								 ?>
                                        <div class="mail-list-item unread media scrollmenu" id="del<?php echo $id; ?>">
                                            <a href="#" class="pos-absolute pos-0 zi-0"></a>
										
											
                                            <!-- /.checkbox -->
                                            <div class="media-body">
                                                <div class="d-flex">
                                                    <div class="headings-font-family"><span class="mail-title headings-color d-block zi-3"><?php echo $row['content']; ?></span>  <small class="text-muted fw-semibold"><?php echo $row['sender_name']; ?></small>
                                                    </div>
                                                    <div class="flex-1"></div>
													
                                                    <div class="checkbox checkbox-star fs-18">
                                                        <label>
														<a class=" btn btn-info "  href="#<?php echo $id; ?>" data-toggle="modal"  data-target=".bs-modal-lg-primary" >
														
															<i class="list-icon  feather feather-trash-2"></i>
                                                        </a>
                                                        </label>
														<?php include("remove_inbox_message_modal.php"); ?>

								
                                                    </div>
																		

                                                </div>
                                                <!-- /.d-flex -->
                                                <div class="d-flex align-items-center mt-3"><a href="#reply<?php echo $id; ?>" data-toggle="modal" class="zi-2"><i class="feather feather-message-circle fs-16 align-middle mr-1"></i> <span class="text-muted fs-12">Repondre</span></a>
												<?php include("reply_inbox_message_modal.php"); ?>
                                                    <div class="flex-1"></div><span class="text-muted fs-12"><?php echo $row['date_sended']; ?></span>
                                                </div>
                                                <!-- /.d-flex -->
                                            </div>
                                            <!-- /.media-body -->
                                        </div>
										<?php }}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> Aucun message trouvé</div>
								<?php } ?>
								<script>
			jQuery(document).ready(function(){
			jQuery("#reply").submit(function(e){
					e.preventDefault();
					var id = $('.reply').attr("id");
					var _this = $(e.target);
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "reply.php",
						data: formData,
						success: function(html){
						$.jGrowl(" Message Envoyés");
						$('#reply'+id).modal('hide');
						}
						
					});
					return false;
				});
			});
			</script>
                                        <!-- /.mail-list-item -->
                                    </div>
                                    <!-- /.mail-inbox -->
										</form>
                                </div>
                                <!-- /.mail-sidebar -->
                                
								<div class="col-md-4 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                                    
									<div class="mail-inbox-header">
                                        <ul class="mail-inbox-categories list-unstyled list-inline headings-font-family fw-semibold mb-0">
                                            <li class="list-inline-item active"><a href="teacher_message.php">Inbox </a>
                                            </li>
                                            <li class="list-inline-item"><a href="sent_message.php">Message Envoyés</a>
                                            </li>
                                         
                                        </ul>
                                        <div class="flex-1"></div>
                                        <div class="d-none d-sm-block text-right">
											
                                        </div>
                                    </div>
                                    <div class="tabs">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="nav-item"><a class="nav-link" href="#home-tab2" data-toggle="tab" aria-expanded="true">Enseignant</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link active" href="#profile-tab2" data-toggle="tab" aria-expanded="true">Etudiant</a>
                                            </li>
                                          
                                        </ul>
                                        <!-- /.nav-tabs -->
                                        <div class="tab-content">
                                            <div class="tab-pane" id="home-tab2">
                                               
											<form method="post" id="send_message">
									<div class="control-group">
											<label>A :</label>
                                          <div class="controls">
                                            <select name="teacher_id"  class="form-control col-sm-12" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from teacher order by firstname");
											while($row = mysqli_fetch_array($query)){
											
											?>
											
											<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											
											<?php } ?>
                                            </select>
							
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Message :</label>
                                          <div class="controls">
											<textarea name="my_message" class="form-control col-sm-12" required></textarea>
                                          </div>
                                        </div>
										<br>
										<center>
										<div class="control-group">
                                          <div class="controls">
												<button  class="btn btn-info"><i class="material-icons">send</i> Envoyer </button>

                                          </div>
                                        </div>
											</center>
                                </form>

						
								
							
								
								
										<script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Message est envoyé");
						var delay = 2000;
							setTimeout(function(){ window.location = 'teacher_message.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
                                                   
                                            </div>
                                            <div class="tab-pane active" id="profile-tab2">
											<form method="post" id="send_message_student">
									<div class="control-group">
											<label>A :</label>
                                          <div class="controls">
                                            <select name="student_id"  class="form-control col-sm-12" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from teacher_class_student
																  LEFT JOIN student ON student.student_id = teacher_class_student.student_id
											 group by teacher_class_student.student_id order by firstname ASC");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Message :</label>
                                          <div class="controls">
											<textarea name="my_message" class="form-control col-sm-12" required></textarea>
                                          </div>
                                        </div>
										<br>
										<center>
										<div class="control-group">
                                          <div class="controls">
												<button  class="btn btn-info"><i class="material-icons">send</i> Envoyer </button>

                                          </div>
                                        </div>
											</center>
                                </form>
						
								
			<script>
			jQuery(document).ready(function(){
			jQuery("#send_message_student").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message_teacher_to_student.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Message est envoyé");
						var delay = 2000;
							setTimeout(function(){ window.location = 'teacher_message.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
                                            </div>
                                          
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- /.tabs -->
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                                    <!-- /.mail-inbox-header -->
                                  
                                    <!-- /.mail-single -->
                              
                                <!-- /.col-lg-9 -->
                            </div>
		
	
							
                            <!-- /.mailbox -->
                        </div>
														</row>
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
	<script type="text/javascript">
	$(document).ready( function() {
		$('.remove').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_inbox_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl(" Message Supprimé ");	
			}
			}); 		
			return true;
		});				
	});
</script>
	
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <footer class="footer bg-primary text-inverse text-center">
        <div class="container-fluid"><span class="fs-13 heading-font-family">Copyright @ 2021. Tous les Droits sont réservés. John Nash</span>
        </div>
        <!-- /.container-fluid -->
    </footer>
    </div>
	

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    <script src="student/assets/js/bootstrap.min.js"></script>
    <script src="student/assets/js/template.js"></script>
    <script src="student/assets/js/custom.js"></script>
</body>
<?php include('avatar_modal_student.php'); ?>	
</html>