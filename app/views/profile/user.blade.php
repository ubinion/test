@extends('layouts.signup')

@section('content')
	@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
	@endif

	User profile<br>
	<h1>Hi, {{e($user->first_name)}} {{e($user->last_name)}}</h1>

@stop