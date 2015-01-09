<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="welcome">
		
		@if(Auth::check())
			<h1>Hello, {{Auth::user()->last_name}}</h1>
		@else
			<p>not logged in</p>
		@endif

		@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
		@endif

		@if(Session::has('message'))
			<p>{{Session::get('message')}}</p>

		@endif

		@if(empty($data))
			<h1>No No No.</h1>
			{{ HTML::link('/login/fb','Login with Facebook') }}
		@else
			<img src="{{$data->photo_url}}" alt=""/>
			<p>{{ $data->email}}</p>
		@endif

		<br>
		@include('includes.navigation')

	</div>
</body>
</html>
