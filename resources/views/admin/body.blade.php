@section('body')

<body>
	<!-- START PAGE CONTAINER -->
	<div class="page-container">
		<!-- START PAGE SIDEBAR -->
		<div class="page-sidebar">
			<!-- START X-NAVIGATION -->
			<ul class="x-navigation">
				<li class="xn-logo">
					<a href="{{route('admin.home')}}"><img style="margin-bottom: 5px;" src="{{asset('icon/dbm.png')}}" width="20px" height="20px"/> ROAD GIS</a>
					<a href="#" class="x-navigation-control"></a>
				</li>
				<li class="xn-title" style="color:white;">Selamat Datang, {{ $data->admin['name'] }}.</li>
				<li class="xn-title">Menu Utama</li>
				<li><a href="{{route('admin.home')}}"><span class="glyphicon glyphicon-home"></span> Halaman Utama</a></li> 
				<li><a href="{{route('admin.logout')}}"><span class="glyphicon glyphicon-home"></span> Logout</a></li> 
			</ul>
			<!-- END X-NAVIGATION -->
		</div>
		<!-- END PAGE SIDEBAR -->

		@yield('content')

	</div>
</body>
@endsection