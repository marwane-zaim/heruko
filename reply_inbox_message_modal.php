
                   
                                
                                    <div id="reply<?php echo $id; ?>" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                                        <div class="modal-dialog modal-lg primary">
                                            <div class="modal-content">
                                                
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="text-center" id="myLargeModalLabel">Réponse</h5>
               
                                                <div class="modal-body">
												<form method="post" id="reply">
												<center>

<div class="control-group">
	<label class="control-label" for="inputEmail">Envoyé à :</label>
	<div class="controls">
	<input type="hidden" name="sender_id" id="inputEmail" value="<?php echo $sender_id; ?>" readonly>
				<input type="hidden" name="my_name" value="<?php echo $reciever_name; ?>" readonly>
				<input type="text" name="name_of_sender"  id="inputEmail" value="<?php echo $sender_name; ?>" readonly>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="inputPassword">Message:</label>
	<div class="controls">
		<textarea  class="form-control col-sm-6" name="my_message"></textarea>
	</div>
</div>
<br>
<div class="control-group">
	<div class="controls">
	<button type="submit" name="reply" id="<?php echo $id; ?>" class="btn btn-info reply"><i class="icon-reply"></i> Reply</button>
	</div>
</div>

</center>
</form>
                                                </div>
                                                <div class="modal-footer">
													
                                                    <button type="button" class="btn btn-danger btn-rounded ripple text-left" data-dismiss="modal">Close this</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div class="modal modal-primary fade bs-modal-lg-primary" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true" style="display: none">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
												
                                                <div class="modal-header text-inverse">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="myLargeModalLabel2">Large Modal Heading</h5>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                </div>
                                                <div class="modal-footer">
												<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
                                                    <button type="button" class="btn btn-danger btn-rounded ripple text-left" data-dismiss="modal">Close this</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                             
                       