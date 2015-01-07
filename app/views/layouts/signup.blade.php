<!doctype html>
<html lang="en" class="no-js">
<head>
    @include('includes.head2')
</head>
<body>
	@include('includes.header2')
	
	<div class="container">	
		@yield('content')
		
	</div>
	
	
	<footer class="footer">
        @include('includes.footer')
    </footer>
	
	 @include('includes.js-source2')
	
</body>
</html>