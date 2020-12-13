<!DOCTYPE html>
<head>
		<title>Login Form!</title>
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}"/>
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="col-md-4 col-md-offset-4 form-login">
	<div class="outter-form-login">
		<div class="logo-login">
			<em class="glyphicon glyphicon-user"></em>
		</div>
		<form class="form" action="{{ url('login') }}" method="post">
			<h3 class="text-center title-login">Login Admin</h3>
				@csrf
				<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="Username" autofocus>
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
					
				<input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
		</form>
	</div> <!--/ Login-->
</div>

</body>
</html>