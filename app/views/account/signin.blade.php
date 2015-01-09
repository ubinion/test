@extends('layouts.signup')

@section('content')
	@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
	@endif

	<form action="{{ URL::route('account-signin-post')}}" method="post">
		
		<div class="field">
			Email: <input type="text" name="email" {{ Input::old('email') ? 'value="' .e(Input::old('email')). '"':'' }}>
			@if($errors->has('email'))
				{{$errors->first('email')}}
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
		<input type="submit" value="Submit">
		{{ Form::token() }}
	</form>
@stop