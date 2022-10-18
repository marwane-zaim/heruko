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
        <?php include('headernavMessage.php'); ?>
		<main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5"><b>Mes Messages: </b></a></h6>
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

											<form action="read_message.php" method="post">
											<?php if($count_message == '0'){
				}else{ ?>
											<div class="mail-inbox-tools flex-1 d-flex align-items-center">
                                     
                                                    
                                                
                                        
                                                    <div class="flex-1"></div>
                                                    <div class="btn-group">
													
												
                                                    
                                                <!-- /.dropdown -->
                                            </div>
                                            <!-- /.btn-group -->
                                          
                                        </div>
                                        <!-- /.mail-inbox-tools -->
										<?php } ?>
                                    </div>
                                    <!-- /.mail-inbox-header -->
                                    <div class="mail-list flex-1 scrollbar-enabled pr-0 ">
									<?php
								 $query_announcement = mysqli_query($conn,"select * from message_sent
																	LEFT JOIN student ON student.student_id = message_sent.reciever_id
																	where  sender_id = '$session_id'  order by date_sended DESC
																	")or die(mysqli_error());
								 $count_my_message = mysqli_num_rows($query_announcement);
								 if ($count_my_message != '0'){
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['message_sent_id'];
								 ?>
                                        <div class="mail-list-item unread media scrollmenu" id="del<?php echo $id; ?>">
                                            <a href="#" class="pos-absolute pos-0 zi-0"></a>
											
                                            <!-- /.checkbox -->
                                            <div class="media-body">
                                                <div class="d-flex">
                                                    <div class="headings-font-family">
														<span class="mail-title headings-color d-block zi-3">
														<?php echo $row['content']; ?></span>  <small class="text-muted fw-semibold"> Envoyé à : <?php echo $row['reciever_name']; ?></small>
                                                    </div>
                                                    <div class="flex-1"></div>
													
                                                    <div class="checkbox checkbox-star fs-18">
                                                        <label>
														<a class=" btn btn-info "  href="#<?php echo $id; ?>" data-toggle="modal"  data-target=".bs-modal-lg-primary" >
														
															<i class="list-icon  feather feather-trash-2"></i>
                                                        </a>
                                                        </label>
														<?php include("remove_sent_message_modal.php"); ?>

								
                                                    </div>
																		

                                                </div>
                                                <!-- /.d-flex -->
                                                <div class="d-flex align-items-center mt-3">
												
                                                    <div class="flex-1"></div><span class="text-muted fs-12"><?php echo $row['date_sended']; ?></span>
                                                </div>
                                                <!-- /.d-flex -->
                                            </div>
                                            <!-- /.media-body -->
                                        </div>
										<?php }}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i>  Aucun Message pour le moment.</div>
								<?php } ?>
                              
                                        <!-- /.mail-list-item -->
                                    </div>
                                    <!-- /.mail-inbox -->
										</form>
                                </div>
                                <!-- /.mail-sidebar -->
								<div class="col-md-4 col-12 h-100 d-flex flex-column">
                                    <div class="mail-inbox-header">
                                        <ul class="mail-inbox-categories list-unstyled list-inline headings-font-family fw-semibold mb-0">
                                            <li class="list-inline-item"><a href="student_message.php">Inbox </a>
                                            </li>
                                            <li class="list-inline-item active"><a href="sent_message_student.php">Messages Envoyés</a>
                                            </li>
                                         
                                        </ul>
                                        <div class="flex-1"></div>
                                        <div class="d-none d-sm-block text-right">
                                        </div>
                                    </div>
									<ul class="nav nav-tabs contact-details-tab">
                                <li class="nav-item"><a href="#activity-tab-bordered-1" class="nav-link active" data-toggle="tab">Envoyer un Message</a>
                                </li>

                            </ul>
							<row>
							<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="activity-tab-bordered-1">
                                    <div class="widget-user-activities">
  
                                        <!-- /.single -->
                                        
                      

							

						

										<form method="post" id="send_message_student">
									<div class="control-group">
											<label>A :</label>
                                        
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
										
										<div class="control-group">
											<label>Message :</label>
                                          <div class="controls">
											<textarea name="my_message" class="form-control" required></textarea>
                                          </div>
                                        </div>
										<br>
										<div class="control-group">
                                          <div class="controls">
											  <center>
												<button  class="btn btn-info col-sm-4"><i class="icon-envelope-alt"></i> Envoyer </button>
											</center>
                                          </div>
                                        </div>
                                </form>
												<script>
															jQuery(document).ready(function(){
															jQuery("#send_message_student").submit(function(e){
																	e.preventDefault();
																	var formData = jQuery(this).serialize();
																	$.ajax({
																		type: "POST",
																		url: "send_message_student.php",
																		data: formData,
																		success: function(html){
																		
																		$.jGrowl("Message Envoyé");
																		var delay = 2000;
																			setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
																		}
																	});
																	return false;
																});
															});
												</script>
                                       
                                            <!-- /.media -->
                                     
                                        <!-- /.single -->
                                    </div>
                                    <!-- /.widget-user-activities -->
                                </div>
										</div>
                                    <!-- /.mail-inbox-header -->
                                  
                                    <!-- /.mail-single -->
                                </div>
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
			$.jGrowl("Message supprimé");	
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