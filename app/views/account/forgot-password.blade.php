@extends('layouts.level-two-no-m-search-bar')

@section('content')

	<div class="login-form">
    	<div class="text-center">
    		<img src="../img/logo/logo_login.png" alt="logo" width="60px" height="60px" class="display_logo">
    		<legend class="login-title">Password Recovery</legend>
    	</div>
	  	
	    <form action="{{ URL::route('account-forgot-pw-post')}}" method="post" role="form">
	        <div class="form-group">
	          	<label for="inputUsernameEmail">Please enter your Email, we will send you a new password</label>
	          	<input id="inputUsernameEmail" class="form-control" type="email" name="email" placeholder="Email Address" {{ Input::old('email') ? 'value="' .Input::old('email'). '"':'' }} required>
	          	@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
	        </div>
	        
	        {{ Form::token() }}

	        <button type="submit" class="btn btn-success btn-block">
	          	Send
	        </button>
	    </form>
	    <br>
	    @if(Session::has('global'))
			{{Session::get('global')}}
		@endif      		          
    </div><!--/.login-form -->	
@stop