 

    <!-- Head Libs -->

<style type="text/css">
	
	.red{
		color: red;

	}
</style>
<center>
<br>
    <form id="signin_student" class="form-signin" method="post">
	<h4 class="form-signin-heading"><i class="icon-plus-sign"></i> Ajouter Evenement</h4><br>
	 <label class="col-md-2 col-form-label" for="5">Date de debut</label>
	    <input type="date"  name="date_start" id="date01" placeholder="Date de debut" required/><br>
	    <label class="col-md-2 col-form-label" for="5">Date de fin</label>
	    <input type="date"  name="date_end" id="date01" placeholder="Date de fin" required/><br>
	    <label class="col-md-2 col-form-label" for="5">Titre</label>
		<input type="text"  id="username" name="title" placeholder="Titre" required/><br><br>
	<button id="signin" name="add" class="btn btn-info" type="submit"><i class="icon-save"></i> Enregister</button>
</form>
</center>
<?php
if (isset($_POST['add'])){
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$title = $_POST['title'];
	
	$query = mysqli_query($conn,"insert into event (date_end,date_start,event_title) values('$date_end','$date_start','$title')")or die(mysqli_error());
	?>
	<script>
	window.location = "calendar_of_events.php";
	</script>
<?php
}
?>

		<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
									
		
										<thead>
										        <tr>
												<th>Evenenement</th>
												<th>Date</th>
												<th></th>
												
												</tr>
												
										</thead>
										<tbody>
											
                             
									<?php $event_query = mysqli_query($conn,"select * from event where teacher_class_id = '' ")or die(mysqli_error());
										while($event_row = mysqli_fetch_array($event_query)){
										$id  = $event_row['event_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
									
										 <td><?php echo $event_row['event_title']; ?> </td>
                                         <td class="datepicker"><?php  echo $event_row['date_start']; ?>
											<br>To
											 <?php  echo $event_row['date_end']; ?>
										 </td>                                    
                                         <td width="40">
							
										

										  <a class="col-md-2 col-sm-3 col-4 red"  href="delete_event.php<?php echo '?id='.$id; ?>"  name=""><i class="material-icons">delete</i>
                                            
                                        </a>
								
										 </td>                                      
									
                             

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
