<nav>
	<ul>
		<a href="{{ URL::route('landing')}}"> Home</a>

		@if (Auth::check())
			<br><a href="{{ URL::route('account-signout')}}"> Sign Out </a>
		@else
			<br><a href="{{ URL::route('account-signin')}}"> Sign In </a>
			<br><a href="{{ URL::route('account-create')}}"> Create account </a>
		@endif
	</ul>
</nav>