@extends('layouts.level-two-no-m-search-bar')

@section('content')

	<div class="login-form">
    	<div class="text-center">
    		<img src="../img/logo/logo_login.png" alt="logo" width="60px" height="60px" class="display_logo">
    		<legend class="login-title">Login</legend>
    	</div>
    	<a href="#" class="btn btn-primary btn-block">Login In with Facebook</a>
	    <div class="login-or">
	        <hr class="hr-or">
	        <span class="span-or">or</span>
	    </div>	    	  	
	    <form action="{{ URL::route('account-login-post')}}" method="post" role="form">
	        <div class="form-group">
	          	<label for="inputUsernameEmail">Email</label>
	          	<input id="inputUsernameEmail" class="form-control" type="email" name="email" {{ Input::old('email') ? 'value="' .Input::old('email'). '"':'' }} required>
	          	@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
	        </div>
	        <div class="form-group">
	          	<a class="pull-right" href="{{ URL::route('account-forgot-pw') }}">Forgot password?</a>
	          	<label for="inputPassword">Password</label>
	          	<input id="inputPassword" class="form-control" type="password" name="password" pattern="^([a-zA-Z0-9_-]){6,20}$" title="Password must be 6-20 characters (alphabet, number or underscore only)" required>
	        </div>
	        <div class="checkbox pull-right">
	          	<label><input id="remember" type="checkbox" name="checkbox">Remember me </label>
	        </div>
      
	        {{ Form::token() }}

	        <button type="submit" class="btn btn-success btn-block">
	          	Login
	        </button>
	    </form>
	    <br>
	    @if(Session::has('global'))
			{{Session::get('global')}}
		@endif      		          
    </div><!--/.login-form -->	
@stop