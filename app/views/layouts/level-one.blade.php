<!doctype html>
<html lang="en" class="no-js">
<head>
    @include('includes.head')
</head>
<body>
	<!---------- Header ---------->
	<!-- Container -->
	<div class="container">
		<!-- Fixed navbar -->
	    <nav class="navbar navbar-inverse navbar-fixed-top visible" id="desktop-header" role="navigation">
	      	<div class="container">
		        <div class="navbar-header">
				  	@include('includes.header-left')
				 	@include('includes.header-d-search-bar')
				</div>

				@if(Auth::check())
					<!-- Show the Edit profile if user logged in -->
					@include('includes.header-right-auth')

				@else
					<!-- Show the login/signup button if user not logged in -->
					@include('includes.header-right-not-auth')
				@endif
		        
	      	</div><!--/.container -->
	    </nav>
	    @include('includes.header-m-search-bar')

	    <!------------ Content ---------->
	    @yield('content')
		<!------------ /.Content ---------->

	</div><!--/.container -->
	<!---------- /.Header ---------->
	
	@include('includes.modal-login')
	@include('includes.modal-signup')
	@include('includes.modal-contact')
	@include('includes.modal-pastyear')
	
	<footer class="footer">
        @include('includes.footer')
    </footer>
	
	 @include('includes.js-source')
	
</body>
</html>