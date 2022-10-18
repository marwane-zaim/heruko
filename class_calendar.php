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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="student/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="student/assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="student/assets/js/pace.min.js"></script>
	<style>
		a:not([href]):not([tabindex]) {
    color: white;
    text-decoration: none;
}
html, body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}


	</style>
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
                    <h6 class="page-title-heading mr-0 mr-r-5"><b> Calendrier pour la classe : <?php echo $class_row['class_name']; ?> <span class="divider">/</span><?php echo $class_row['subject_code']; ?></b></a></h6>
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
                                                <h6 class="card-title"><a role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse41" aria-expanded="true" aria-controls="collapse41"><i class="align-middle material-icons md-18 mr-1 mr-0-rtl ml-1-rtl">event_available</i> Calendrier</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse41" class="card-collapse collapse show" role="tabpanel" aria-labelledby="heading10">
                                                <div class="card-body">
												<div class="widget-list ">
					
                    <!-- Events List -->
                    <div class="col-md-12 widget-holder widget-full-content border-all px-0">
                        <div class="widget-bg">
                            <div class="widget-body">
                                <div class="row no-gutters">
                                    <!-- Calender Sidebar -->
                               
                                    <!-- /.col-md-3 -->
                                    <!-- Calender App -->
                                    <div class="col-12">
									<div id='calendar'></div>
									
                                        <!-- /.fullcalendar -->
                                    </div>
                                    <!-- /.col-md-9 -->
                                </div>
                                <!-- /.row -->
                            </div>
							</div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->

																	
				
			
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card-collapse -->
                                        </div>
                                        <!-- /.panel -->
                                        <div class="card card-outline-info">
                                            <div class="card-header" role="tab" id="heading11">
                                                <h6 class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-4" href="#collapse42" aria-expanded="false" aria-controls="collapse42"><i class="material-icons md-18 align-middle mr-1 mr-0-rtl ml-1-rtl">event</i>Ajouter Evenement</a></h6>
                                            </div>
                                            <!-- /.card-header -->
                                            <div id="collapse42" class="card-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                                <div class="card-body">
												<div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body clearfix">
                       
									<form id="signin_student" class="form-signin" method="post">

	    <input type="datetime-local" class="form-control col-sm-8 " name="date_start" id="date01" placeholder="Date Début" required/>
		<br>
	    <input type="datetime-local" class="form-control col-sm-8" name="date_end" id="date01" placeholder="Date Fin" required/>
		<br>
		<input type="text" class="form-control col-sm-8" id="username" name="title" placeholder="Description" required/>
		<br>
	<button id="signin" name="add" class="btn btn-info" type="submit"><i class="icon-save"></i> Enregistrer</button>
</form>
<?php
if (isset($_POST['add'])){
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$title = $_POST['title'];
	
	$query = mysqli_query($conn,"insert into event (date_end,date_start,event_title,teacher_class_id) values('$date_end','$date_start','$title','$get_id')")or die(mysqli_error());
	?>
	<script>
	window.location = "class_calendar.php<?php echo '?id='.$get_id; ?>";
	</script>
<?php
}
?>

		<table class="table table-hover">
									
							
										<thead>
										        <tr>
												<th>Evenement</th>
												<th>Date</th>
												<th></th>
												
												</tr>
												
										</thead>
										<tbody>
											
                             
									<?php $event_query = mysqli_query($conn,"select * from event where teacher_class_id = '$get_id' ")or die(mysqli_error());
										while($event_row = mysqli_fetch_array($event_query)){
										$id  = $event_row['event_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
									
										 <td><?php echo $event_row['event_title']; ?></td>
                                         <td><span>Du</span>
											 <?php  echo $event_row['date_start']; ?>
											<br>
											<span>Au<span> <?php  echo $event_row['date_end']; ?>
										 </td>                                    
                                         <td width="40">
										 <form method="post" action="delete_class_event.php">
										 <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
										 <input type="hidden" name="id" value="<?php echo $id; ?>">
										 <button class="btn btn-danger" name="delete_event"><i class="material-icons list-icon">delete</i></button>
										 </form>
										 </td>                                      
									
                             

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>

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
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="student/assets/js/bootstrap.min.js"></script>
    <script src="student/assets/js/template.js"></script>
    <script src="student/assets/js/custom.js"></script>
	
		<script>
        $(function() {
            // Easy pie charts
            var calendar = $('#calendar').fullCalendar({
			
				header: {
      left: 'month,basicWeek,basicDay',
      center: 'title',
      right: 'custom2 prevYear,prev,next,nextYear'
    },
			
     
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped
            
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                
                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                
                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#fullcalendar-1').fullCalendar('renderEvent', copiedEventObject, true);
                
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
                
            },
			editable: true,
			// US Holidays
				 events:
		[
		<?php $event_query = mysqli_query($conn,"select * from event where teacher_class_id = '$get_id' or teacher_class_id = '' ")or die(mysqli_error());
			  while($event_row = mysqli_fetch_array($event_query)){
		?>
        {
            title  : '<?php echo $event_row['event_title']; ?> ',
            start  : '<?php echo $event_row['date_start']; ?>',
            end  : '<?php echo $event_row['date_end']; ?>'
        },
		<?php } ?>
		]
			
			});
        });


        </script>
				
</body>
<?php include('avatar_modal_student.php'); ?>	
</html>