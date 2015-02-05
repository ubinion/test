<div class="footer_container">
	<div class="row footer_row">
		<div class="col-md-6 col-xs-12">
			<p class="text-muted">
				Ubinion &copy;<?PHP echo date("Y"); ?>
			  	<a href="{{ URL::route('about-page')}}" class="about">About</a> 
				<a href="url" class="about" data-toggle="modal" data-target="#ContactModal">Contact</a>
			</p>
		</div>
	  	<div class="col-md-6 col-xs-12">
	  		<p class="text-muted">
			  	<a href="{{ URL::route('privacy-page')}}">Privacy</a> 
				<a href="{{ URL::route('terms-page')}}">Terms</a>
			</p>
	  	</div>
	</div>	
	<!--p class="text-muted"> 
		<a href="{{ URL::route('about-page')}}" class="about">About</a> 
		Ubinion &copy;<?PHP echo date("Y"); ?> 
		<a href="url" class="about" data-toggle="modal" data-target="#ContactModal">Contact</a>
	<div class="privacy_terms">	 
		<a href="#">Privacy</a> 
		<a href="#">Terms</a>
	</div>	
	</p-->
</div>