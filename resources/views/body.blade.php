@section('body')

<body>
	<!-- START PAGE CONTAINER -->
	<div class="page-container">
		<!-- START PAGE SIDEBAR -->
		<div class="page-sidebar">
			<!-- START X-NAVIGATION -->
			<ul class="x-navigation">
				<li class="xn-logo">
					<a href="{{route('home')}}"><img style="margin-bottom: 5px;" src="{{asset('assets/icon/dbm.png')}}" width="20px" height="20px"/> ROAD GIS</a>
					<a href="#" class="x-navigation-control"></a>
				</li>
				<li class="xn-title">Menu Utama</li>
				<li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home"></span> Halaman Utama</a></li> 
				<li><a href="{{route('create')}}"><span class="glyphicon glyphicon-plus"></span> <span class="xn-text">Buat Pengaduan</span></a></li>
				<li><a href="{{route('read')}}"><span class="glyphicon glyphicon-th-list"></span> <span class="xn-text">Data Pengaduan</span></a></li>
			</ul>
			<!-- END X-NAVIGATION -->
		</div>
		<!-- END PAGE SIDEBAR -->

		@yield('content')

	</div>
</body>
@endsection