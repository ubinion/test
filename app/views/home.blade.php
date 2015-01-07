@extends('layouts.main')

@section('content')

	<h1>Hello World 3 .</h1>
	
	@if(Session::has('msg'))
		<p style="color:green">{{Session::get('msg') }}</p>
	@endif
@stop		
