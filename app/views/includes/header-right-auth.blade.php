<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <strong>{{ $user->last_name ? $user->last_name : 'Set your last name' }}</strong>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu user-dropdown-menu">
                <li>
                    <div class="navbar-login mobile-view">
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="text-center">
								<img src="{{ $user->photo_url ? $user->photo_url : 'http://placehold.it/120x120'}}" alt="user" class="img-circle" width="90px" height="90px"/>
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <p class="text-left text-center"><strong>{{ $user->first_name." ".$user->last_name }}</strong></p>
                                <p class="text-left small text-center">Universiti Utara Malaysia</p>

                                <p class="text-left text-center">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 
                                    <a href="{{ URL::route('account-chg-pw')}}">Change Password</a>
                                </p>

                                <!------------- Temporary space between ---------->
                                <span class="clearfix" style="
                                    height: 5px;
                                "></span>
                                <!------------- /.Temporary space between ---------->

                                <p class="text-left text-center">
                                    <legend id="divide">
                                    	<a href="{{ URL::route('profile-edit',Auth::id())}}" class="btn btn-primary btn-block btn-sm">Edit Profile</a>
                                    </legend>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="divider hidden-xs"></li>
                <li>
                    <div class="navbar-login navbar-login-session">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>
                                    <a href="{{ URL::route('account-signout')}}" class="btn btn-default btn-block">Sign Out</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>		        	
</div><!--/.nav-collapse -->