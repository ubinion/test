@extends('layouts.signup')

@section('content')
	@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
	@endif

	<form action="{{ URL::route('account-chg-pw-post')}}" method="post">
		
		<div class="field">
			Password: <input type="password" name="old_password">
			@if($errors->has('old_password'))
				{{$errors->first('old_password')}}
			@endif
		</div>
<br>
		<div class="field">
			New Password: <input type="password" name="new_password">
			@if($errors->has('new_password'))
				{{$errors->first('new_password')}}
			@endif
		</div>
<br>
		<div class="field">
			Re-type New Password: <input type="password" name="new_password_2">
			@if($errors->has('new_password_2'))
				{{$errors->first('new_password_2')}}
			@endif
		</div>
<br>

		<input type="submit" value="Confirm password">
		{{ Form::token() }}
	</form>
@stop