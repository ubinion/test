@extends('layouts.level-two-no-m-search-bar')

@section('content')

	<div class="login-form">
    	<div class="text-center">
    		<img src="../img/logo/logo_login.png" alt="logo" width="60px" height="60px" class="display_logo">
    		<legend class="login-title">Change password</legend>
    	</div>
   	  	
	    <form action="{{ URL::route('account-chg-pw-post')}}" method="post" role="form">
	        <div class="form-group">
	          	<label for="old_password">Old password</label>
	          	<input id="old_password" class="form-control" type="password" name="old_password" required>
	        </div>
		    @if($errors->has('new_password_2'))
	        	<div class="alert alert-danger" role="alert">
				  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  	<span class="sr-only">Error:</span>
				  	The password do not match
				</div>
			@endif
	        <div class="form-group">
	          	<label for="new_password">New password</label>
	          	<input id="new_password" class="form-control" type="password" name="new_password" pattern="^([a-zA-Z0-9_-]){6,20}$" title="Password must be 6-20 characters (alphabet, number or underscore only)" required>
	        </div>

	        <div class="form-group">
	          	<label for="new_password_2">Retype your new password</label>
	          	<input id="new_password_2" class="form-control" type="password" name="new_password_2" pattern="^([a-zA-Z0-9_-]){6,20}$" title="Password must be 6-20 characters (alphabet, number or underscore only)" required>
	        </div>

      
	        {{ Form::token() }}

	        <button type="submit" class="btn btn-success btn-block">
	          	Confirm
	        </button>
	    </form>
	    <br>				
	    @if(Session::has('global'))
			{{Session::get('global')}}
		@endif        
    </div><!--/.login-form -->	
@stop