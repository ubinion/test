@extends('layouts.signup')

@section('content')
	<pre> {{ print_r($errors)}} </pre>

	<form action="{{ URL::route('account-create-post')}}" method="post">
		
		<div class="field">
			Email: <input type="text" name="email" {{ Input::old('email') ? 'value="' .e(Input::old('email')). '"':'' }}>
			@if($errors->has('email'))
				{{$errors->first('email')}}
			@endif
		</div>
<br>
		<div class="field">
			FB UID: <input type="text" name="uid_fb">
			@if($errors->has('uid_fb'))
				{{$errors->first('uid_fb')}}
			@endif
		</div>
<br>
		<div class="field">
			First Name: <input type="text" name="first_name" {{ Input::old('first_name') ? 'value="' .e(Input::old('first_name')). '"':'' }}>
			@if($errors->has('first_name'))
				{{$errors->first('first_name')}}
			@endif
		</div>
<br>
		<div class="field">
			Last Name: <input type="text" name="last_name" {{ Input::old('last_name') ? 'value="' .e(Input::old('last_name')). '"':'' }}>
			@if($errors->has('last_name'))
				{{$errors->first('last_name')}}
			@endif
		</div>
<br>
		<div class="field">
			Password: <input type="password" name="password">
			@if($errors->has('password'))
				{{$errors->first('password')}}
			@endif
		</div>
<br>
		<div class="field">
			Retype password: <input type="password" name="password2">
			@if($errors->has('password2'))
				{{$errors->first('password2')}}
			@endif
		</div>
<br>
		<input type="submit" value="Submit">
		{{ Form::token() }}
	</form>
@stop