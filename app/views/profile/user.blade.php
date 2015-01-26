@extends('layouts.level-two-no-m-search-bar')

@section('content')
	<div class="container">
		<div class="row">
		    <!-- left column -->
		    <div class="col-md-3">
		        <div class="text-center">
		        	<img src="{{ $user->photo_url ? $user->photo_url : '../img/team/wanted-1.jpg'}}" class="avatar img-circle" alt="avatar" width="120px" height="120px">
		        </div>
		        <div class="text-center">
				    <span class="btn btn-default btn-file">
				    	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Browse<input type="file">    
				    </span> 
				    <h6>Update Profile Picture</h6>
			   	</div>
		    </div>
		      
		    <!-- edit form column -->
		    <div class="col-md-9 personal-info">
		        <!--div class="alert alert-info alert-dismissable">
		        	<a class="panel-close close" data-dismiss="alert">×</a> 
		        	<i class="fa fa-coffee"></i>
		        	This is an <strong>.alert</strong>. Use this to show important messages to the user.
		        </div-->
		        <legend>Personal info</legend>
		        
		        <form class="form-horizontal" role="form" action="{{ URL::route('profile-edit-post')}}">
			        <div class="form-group">
			            <label class="col-lg-3 control-label">First name</label>
			            <div class="col-lg-8">
			            	<input class="form-control" type="text" name="first_name" {{ $user->first_name ? 'value="' .$user->first_name. '"':'' }}>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-lg-3 control-label">Last name</label>
			            <div class="col-lg-8">
			            	<input class="form-control" type="text" name="last_name" {{ $user->last_name ? 'value="' .$user->last_name. '"':'' }}>
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="col-lg-3 control-label">Gender</label>
			            <div class="col-lg-8">
			            	<input class="form-control" type="text" name="gender" {{ $user->gender ? 'value="' .$user->gender. '"':'' }}>
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="col-lg-3 control-label">Email</label>
			            <div class="col-lg-8">
			            	<input class="form-control" type="text"  name="email" {{ $user->email ? 'value="' .$user->email. '"':'' }} readonly>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-lg-3 control-label">Birthday</label>
			            <div class="col-lg-8">
			              	<input class="form-control" type="text" name="birthday" {{ $user->birthday ? 'value="' .$user->birthday. '"':'' }}>
			            </div>
			        </div>			        
			        <div class="form-group">
			            <label class="col-lg-3 control-label">Semester</label>
			            <div class="col-lg-8">
			                <select id="user_time_zone" class="form-control" name="uni_sem">
			                	<option value="1">One</option>
			                	<option value="2">Two</option>
			                	<option value="3">Three</option>
			                	<option value="4">Four</option>
			                	<option value="5">Five</option>
			                	<option value="6">Six</option>
			                	<option value="internship">Internship</option>
			                	<option value="graduate">Graduated</option>
			                </select>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="col-lg-3 control-label">University</label>
			            <div class="col-lg-8">
			                <select id="user_time_zone" class="form-control" name="uni_name">
			                	<option value="uum" {{ $user->uni_name=='Universiti Utara Malaysia' ? ' selected':'' }}>(UUM) Universiti Utara Malaysia</option>
			                	<option value="unimap" {{ $user->uni_name=='Universiti Malaysia Perlis' ? ' selected':'' }}>(UNIMAP) Universiti Malaysia Perlis</option>
			                	<option value="usm" {{ $user->uni_name=='Universiti Sains Malaysia' ? ' selected':'' }}>(USM) Universiti Sains Malaysia</option>
			                	<!--option value="upsi">(UPSI) Universiti Pendidikan Sultan Idris</option>
				                <option value="um">(UM) Universiti Malaya</option>
				                <option value="upnm">(UPNM) Universiti Pertahanan Nasional Malaysia</option>
				                <option value="ukm">(UKM) Universiti Kebangsaan Malaysia</option>
				                <option value="upm">(UPM) Universiti Putra Malaysia</option>
				                <option value="uitm">(UITM) Universiti Teknologi MARA</option>
				                <option value="iium">(IIUM) Universiti Islam Antarabangsa Malaysia</option>
				                <option value="uim">(UIM) Universiti Islam Malaysia</option>
				                <option value="usim">(USIM) Universiti Sains Islam Malaysia</option>
				                <option value="umk">(UMk) Universiti Malaysia Kelantan</option>
				                <option value="ump">(UMP) Universiti Malaysia Pahang</option>
				                <option value="unisza">(UNISZA) Universiti Sultan Zainal Abidin</option>
				                <option value="umt">(UMT) Universiti Malaysia Terengganu</option>
				                <option value="utem">(UTEM) Universiti Teknologi Malaysia Melaka</option>
				                <option value="uthm">(UTHM) Universiti Tun Hussein Onn Malaysia</option>
				                <option value="utm">(UTM) Universiti Teknologi Malaysia</option>
				                <option value="ums">(UMS) Universiti Malaysia Sabah</option>
				                <option value="unimas">(UNIMAS) Universiti Malaysia Sarawak</option-->
			                </select>
			            </div>
			        </div>		          
			        <div class="form-group">
			            <label class="col-lg-3 control-label">Course</label>
			            <div class="col-lg-8">
			            	<input class="form-control" value="Course" type="text" name="uni_course" {{ $user->uni_courser? 'value="' .$user->uni_course. '"':'' }}>
			            </div>
			        </div>
			        <!--
					<div class="form-group">
		            	<label class="col-lg-3 control-label">Graduation Year</label>
			            <div class="col-lg-8">
			                <select id="grad-year" class="form-control">
				                <option value="1">2001</option>
				                <option value="2">2002</option>
				                <option value="3">2003</option>
				                <option value="4">2004</option>
				                <option value="5">2005</option>
				                <option value="6">2006</option>
				                <option value="7">2007</option>
				                <option value="8">2008</option>
				                <option value="9">2009</option>
				                <option value="10">2010</option>
				                <option value="11">2011</option>
				                <option value="12">2012</option>
				                <option value="13">2013</option>
				                <option value="14">2014</option>
				                <option value="15" selected>2015</option>
			                </select>
			            </div>
		          	</div>-->
					<div class="form-group">
		            	<label class="col-lg-3 control-label">Home Town</label>
			            <div class="col-lg-8">
			              	<input class="form-control" type="text" name="city_hometown" {{ $user->city_hometown ? 'value="' .$user->city_hometown. '"':'' }}>
			            </div>
		          	</div>
					<div class="form-group">
			            <label class="col-lg-3 control-label">Current City</label>
			            <div class="col-lg-8">
			              	<input class="form-control" type="text" name="city_current" {{ $user->city_current ? 'value="' .$user->city_current. '"':'' }}>
			            </div>
		          	</div>
			         <div class="form-group">
			            <label class="col-lg-3 control-label">Prev Work Company</label>
			            <div class="col-lg-8">
			              	<input class="form-control" type="text" name="work_company" {{ $user->work_company ? 'value="' .$user->work_company. '"':'' }}>
			            </div>
			        </div>
 					<div class="form-group">
		            	<label class="col-lg-3 control-label">Job Title</label>
			            <div class="col-lg-8">
			              	<input class="form-control" type="text" name="work_pos" {{ $user->work_pos ? 'value="' .$user->work_pos. '"':'' }}>
			            </div>
		          	</div>			        		          			          			          	
			        <div class="form-group">
			            <label class="col-lg-3 control-label"></label>
			            <div class="col-lg-8 account-btn">
			            	<input class="btn btn-success" value="Save Changes" type="button">
			            	<input class="btn btn-default" value="Cancel" type="reset">
			            </div>
			        </div>

			        {{ Form::token() }}
		        </form>
		    </div>
		</div>
	</div>
	
	@if(Session::has('global'))
			<p>{{Session::get('global')}}</p>
	@endif

@stop