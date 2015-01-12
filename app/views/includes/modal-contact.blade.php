<!--contact modal -->
<div id="ContactModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	          	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	          	<h4 class="modal-title" id="myModalLabel">Ubinion'd love to hear from you :)</h4>
	        </div>
	        <div class="modal-body">
	          	<form role="form" id="contact-form">
		          	<div class="form-group">
		           		<label for="recipient-email" class="control-label">Email</label><!-- Sender Email-->
		            	<input type="text" class="form-control" placeholder="user@email.com" name="cf_email" id="recipient-email">
		          	</div>
		          	<div class="form-group">
		            	<label for="recipient-subject" class="control-label">Subject</label><!-- Sender Subject-->
		            	<input type="subject" class="form-control" name="cf_subject" id="recipient-subject">
		          	</div>
		          	<div class="form-group">
		            	<label for="message-text" class="control-label">Message:</label><!-- Sender Message-->
		            	<textarea class="form-control" rows="4" name="cf_message" id="message-text"></textarea>
						<span class="help-block contact-form-status"></span>
		         	</div>
		           	<div class="modal-footer">	
		             	<button type="submit" class="btn btn-success" value="send">Send</button>
		           	</div>		          
	       		</form>
	        </div>
	    </div>
    </div>
</div><!--/.contact modal -->