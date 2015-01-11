<nav>
	<ul>
		<a href="{{ URL::route('landing')}}"> Home</a>

		@if (Auth::check())
			<br><a href="{{ URL::route('account-signout')}}"> Sign Out </a>
			<br><a href="{{ URL::route('account-chg-pw')}}"> Change Password </a>
		@else
			<br><a href="{{ URL::route('account-signin')}}"> Sign In </a>
			<br><a href="{{ URL::route('account-create')}}"> Create account </a>
			<br><a href="{{ URL::route('account-forgot-pw')}}"> Forgot password </a>
		@endif
	</ul>
</nav>