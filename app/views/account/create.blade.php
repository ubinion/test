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
			Username: <input type="text" name="uid_fb">
			@if($errors->has('uid_fb'))
				{{$errors->first('uid_fb')}}
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