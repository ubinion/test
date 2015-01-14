@extends('layouts.level-two-no-m-search-bar')

{{-- this is to include the mobile search bar
@section('header-m-search-bar')
	@include('includes.header-m-search-bar')
@overwrite
--}}

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-6 col-md-offset-3">
				<div class="text-center">
					<img src="../img/logo/logo_login.png" alt="logo" width="60px" height="60px" class="display_logo">   
	            	<legend class="text-center">Sign Up</legend>
				</div>
                

			     @if(Session::has('success_signup_msg'))

			    	{{-- Display successfully sign up --}}
			    	<br>
					{{Session::get('success_signup_msg')}}

				@else

					{{-- Display sign up form--}}
					<div class="text-center"> 				     		      
	          			<a href="#" class="btn btn-primary">Sign Up by Facebook</a>
	          		</div>					
					<div class="login-or">
				        <hr class="hr-or">
				        <span class="span-or">or</span>
				    </div><!--login-or-->
					<form class="form" action="{{ URL::route('account-signup-post')}}" method="post">
		            	<label for="inputUsername">Name</label>
	                    <div class="row">	
	                        <div class="col-xs-6 col-md-6">
	                            <input class="form-control" type="text" name="first_name" {{ Input::old('first_name') ? 'value="' .e(Input::old('first_name')). '"':'' }} placeholder="First Name" required/>
	                        </div>
	                        <div class="col-xs-6 col-md-6">
	                            <input class="form-control" type="text" name="last_name" {{ Input::old('last_name') ? 'value="' .e(Input::old('last_name')). '"':'' }} placeholder="Last Name" required/>                        
	                        </div>
	                    </div>
	                    <label for="inputUsernameEmail">Email</label>
	                    <input class="form-control" type="email" name="email" {{ Input::old('email') ? 'value="' .e(Input::old('email')). '"':'' }} placeholder="Your Email" required/>
	                    @if($errors->has('email'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span> 
							  	{{$errors->first('email')}}
							</div>							  		                    
						@endif

	                   	<label for="inputPassword">Password</label>
	                    <input type="password" name="password" value="" class="form-control " placeholder="Password" pattern="^([a-zA-Z0-9_-]){6,20}$" title="Password must be 6-20 characters (alphabet, number or underscore only)" required/>

	                    <input type="password" name="confirm_password" value="" class="form-control" placeholder="Confirm Password" pattern="^([a-zA-Z0-9_-]){6,20}$" title="Password must be 6-20 characters (alphabet, number or underscore only)" required/>
	                    @if($errors->has('confirm_password'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span>
							  	The password do not match
							</div>
						@endif

						<input type="hidden" name="uid_fb" value="" />

	                    {{ Form::token() }}

	                    <div class="text-center">   
		                	<button class="btn btn-success" type="submit">CREATE MY ACCOUNT</button>
		            	</div>
		            </form>

				@endif  

	        </div><!--/.col-md-6 col-md-offset-3-->
		</div><!--/.row-->            
	</div><!--/.container-->
@stop