@extends('layouts.main')

@section('content')

	<header>
		<h1><img src="img/logo/logo_homepage.beta.png" alt="Ubinion" class="logo_homepage" height="180" width="250"></h1>
	</header>
	<div class="clearfix">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-xs-12">	
				<div class="input-group">
				  <input type="text" class="form-control search-bar" aria-label="...">
				  <div class="input-group-btn">
					<button type="button" class="btn btn-default search-option dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Lecturer <span class="caret"></span></button>
					<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>					        
					<ul class="dropdown-menu dropdown-menu-right" role="menu">
					  <li><a href="#" id="lecturer">Lecturer</a></li>	
					  <li><a href="#" id="past-year">Past Year Paper</a></li>
					  <li><a href="#">Hints</a></li>
					  <li><a href="#">Confession</a></li>
					</ul>
				  </div><!-- /btn-group -->
				</div><!-- /input-group -->
			</div><!--/. col grid-->
		</div><!--/. row-->
	</div><!--/. clearrfix-->
	<div class="row" id="paper-result-area">							
		<!-- NOTE : The Area to display search result for subject-->
	</div>			
@stop

@section('modal')

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

	<!--pass year modal -->
	<div id="PastYearModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Past Year Question</h4>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
				<tr>
					<th>Sem</th><th>Code</th><th>Subject</th><th>Download</th>	
				</tr>	
				<tr>
					Searching Papers...
				</tr>
				</table>
			</div>
		  </div>
		</div>
	</div><!--/.pass year modal -->			
@stop				
