<!DOCTYPE html>
<head>
	<title>Login Form!</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"/>
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="col-md-4 col-md-offset-4 form-login">
	<div class="outter-form-login">
		<!--<div class="text-center logo-login">
			<em class="glyphicon glyphicon-user"></em>
		</div>-->
		<form class="form" role="form" action="{{ url('login_in') }}" method="post" action="">
		@csrf
			<h3 class="text-center title-login">{{ __('Login') }}</h3>
			<div class="form-group">
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<!--<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>-->
			</div>
			<div class="form-group">
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<!--<input type="password" class="form-control" id="password" name="password" placeholder="Password">-->
			</div>

			<div class="form-group row">
				<div class="col-md-6 offset-md-4">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

						<label class="form-check-label" for="remember">
							{{ __('Remember Me') }}
						</label>
					</div>
				</div>
			</div>
				
			<!--<input type="submit" name="send" id="send" class="btn btn-block btn-custom-green" value="LOGIN" />-->
			<button type="submit" class="btn btn-primary">
				{{ __('Login') }}
			</button>
			@if (Route::has('password.request'))
				<a class="btn btn-link" href="{{ route('password.request') }}">
					{{ __('Forgot Your Password?') }}
				</a>
			@endif

			@if(session('failed'))
			<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:10px;">
				{{ session('failed') }}.
			</div>
			@endif
		</form>
	</div> <!--/ Login-->
</div>
</body>
</html>