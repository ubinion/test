@extends('layouts.signup')

@section('content')
	@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
	@endif

	<form action="{{ URL::route('account-forgot-pw-post')}}" method="post">
		
		<div class="field">
			Enter your email address : <input type="email" name="email" required {{ Input::old('email') ? 'value="' .e(Input::old('email')). '"':'' }}>
		</div>
<br>

		<input type="submit" value="Send">
		{{ Form::token() }}
	</form>
@stop