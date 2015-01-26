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
	            	<legend class="text-center">Sign Up by Facebook</legend>
				</div>
                

			    @if(Session::has('success_signup_msg'))

			    	{{-- Display successfully sign up --}}
			    	<br>
					{{Session::get('success_signup_msg')}}

				@elseif(Session::has('user_fb'))
					<?php $user_fb=Session::get('user_fb'); ?>

					{{-- Display sign up form--}}
					<form class="form" action="{{ URL::route('account-fb-signup-post')}}" method="post">
		            	<label for="inputUsername">Name</label>
	                    <div class="row">	
	                        <div class="col-xs-6 col-md-6">
	                            <input class="form-control" type="text" name="first_name" {{ $user_fb['first_name'] ? 'value="' .e($user_fb['first_name']). '"':'' }} placeholder="First Name" required/>
	                        </div>
	                        <div class="col-xs-6 col-md-6">
	                            <input class="form-control" type="text" name="last_name" {{ $user_fb['last_name'] ? 'value="' .e($user_fb['last_name']). '"':'' }} placeholder="Last Name" required/>                        
	                        </div>
	                    </div>
	                    @if($errors->has('first_name'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span> 
							  	{{$errors->first('first_name')}}
							</div>							  		                    
						@elseif($errors->has('last_name'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span> 
							  	{{$errors->first('last_name')}}
							</div>							  		                    
						@endif
	                    <label for="inputUsernameEmail">Email</label>
	                    <input class="form-control" type="email" name="email" {{ $user_fb['email'] ? 'value="' .e($user_fb['email']). '" readonly':'' }} placeholder="Your Email" required/>
	                    @if($errors->has('email'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span> 
							  	{{$errors->first('email')}}
							</div>							  		                    
						@endif
	                   	<label for="inputPassword">Password</label>
	                    <input type="password" name="password" value="" class="form-control " placeholder="Password" required/>
	                    @if($errors->has('password'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span>
							  	{{$errors->first('password')}}
							</div>
						@endif

	                    <input type="password" name="confirm_password" value="" class="form-control" placeholder="Confirm Password" required/>
	                    @if($errors->has('confirm_password'))
	                    	<div class="alert alert-danger" role="alert">
							  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  	<span class="sr-only">Error:</span>
							  	{{$errors->first('confirm_password')}}
							</div>
						@endif

						<input type="hidden" name="fb_uid" {{ $user_fb['id'] ? 'value="' .e($user_fb['id']). '"':'' }} />
						<input type="hidden" name="gender" {{ !empty($user_fb['gender']) ? 'value="' .e($user_fb['gender']). '"':'' }} />
						<input type="hidden" name="birthday" {{ !empty($user_fb['birthday']) ? 'value="' .e($user_fb['birthday']). '"':'' }} />

						<?php
							if(!empty($user_fb['education'])){

								$totalSch=count($user_fb['education']);
								$schName = $user_fb['education'][--$totalSch]->school->name;
							}else{
								$schName=null;
							}

							if(!empty($user_fb['work'])){

								$work_company = $user_fb['work'][0]->employer->name;
								$work_pos	= $user_fb['work'][0]->position->name;
							}else{
								$work_company = null;
								$work_pos = null;
							}
						?>
	
						<input type="hidden" name="uni_name" {{ $schName ? 'value="' .e($schName). '"':'' }} />
						<input type="hidden" name="uni_college" value='' />
						<input type="hidden" name="uni_course" value='' />
						
						@if(!empty($user_fb['location']))
						<input type="hidden" name="city_current"  {{ $user_fb['location']->name ? 'value="' .e($user_fb['location']->name). '"':'' }}/>
						@else
						<input type="hidden" name="city_current" value""/>
						@endif

						@if(!empty($user_fb['hometown']))
						<input type="hidden" name="city_hometown" {{ $user_fb['hometown']->name ? 'value="' .e($user_fb['hometown']->name). '"':'' }} />
						@else
						<input type="hidden" name="city_hometown" value""/>
						@endif
	
	                    {{ Form::token() }}

	                    <div class="text-center">   
		                	<button class="btn btn-success" type="submit">CREATE MY ACCOUNT</button>
		            	</div>
		            </form>

		        @else
		        	<h1>Error in facebook sign up... no data here</h1>
				@endif  

	        </div><!--/.col-md-6 col-md-offset-3-->
		</div><!--/.row-->            
	</div><!--/.container-->
@stop