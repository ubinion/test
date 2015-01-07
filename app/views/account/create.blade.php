@extends('layouts.signup')

@section('content')
	<form action="{{ URL::route('account-create-post')}}" method="post">
		<input type="submit" value="Submit">
		{{ Form::token() }}
	</form>
@stop