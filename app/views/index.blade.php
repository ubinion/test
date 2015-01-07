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
		
		@if(Session::has('message'))
			<p>{{Session::get('message')}}</p>


		@endif

		@if(empty($data))
			<h1>No No No.</h1>
			{{ HTML::link('/login/fb','Login with Facebook') }}
		@else
			<h1>Hello World</h1>
			<img src="{{$data->photo_url}}" alt=""/>
			<p>{{ $data->email}}</p>
			{{HTML::link('logout','logout')}}
		@endif

		<br>
		<a href="{{ URL::route('account-create') }}"> Create Account </a>

	</div>
</body>
</html>
