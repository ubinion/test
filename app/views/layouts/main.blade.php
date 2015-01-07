<!doctype html>
<html lang="en" class="no-js">
<head>
    @include('includes.head')
</head>
<body>
	@include('includes.header')
	
	<div class="container">	
		@yield('content')
		@yield('modal')
		
	</div>
	
	
	<footer class="footer">
        @include('includes.footer')
    </footer>
	
	 @include('includes.js-source')
	
</body>
</html>