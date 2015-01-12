<nav>
	<ul>
		<a href="{{ URL::route('home')}}"> Home</a>

		@if (Auth::check())
			<br><a href="{{ URL::route('account-signout')}}"> Sign Out </a>
			<br><a href="{{ URL::route('account-chg-pw')}}"> Change Password </a>
		@else
			<br><a href="{{ URL::route('account-login')}}"> Sign In </a>
			<br><a href="{{ URL::route('account-signup')}}"> Create account </a>
			<br><a href="{{ URL::route('account-forgot-pw')}}"> Forgot password </a>
		@endif
	</ul>
</nav>