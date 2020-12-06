@extends('layout')
@extends('header')
@extends('body')
@extends('footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="/"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
	</ul>
	<!-- END BREADCRUMB -->                       
					
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">
		<div class="row">
			<div style="max-width: auto;height: 530px;margin-bottom: 10px;" id="Mymap"></div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<img style='width: 25px; height: 25px' src="{{asset('assets/icon/ringan.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK RINGAN</b></span> 
				<img style='width: 25px; height: 25px' src="{{asset('assets/icon/sedang.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK SEDANG</b></span>
				<img style='width: 25px; height: 25px' src="{{asset('assets/icon/berat.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK BERAT</b></span>
				<img style='width: 25px; height: 25px' src="{{asset('assets/icon/perbaikan.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN DALAM PERBAIKAN</b></span>
				<img style='width: 25px; height: 25px' src="{{asset('assets/icon/selesai.png')}}"/>
				<span style="margin-left: 5px;"><b>JALAN SELESAI DIPERBAIKI</b></span>
			</div>
		</div>
	</div>
	<!-- END CONTENT WRAPPER -->
</div>
<!-- END CONTENT -->

@push('scripts')
<script>
	var map;
	function GetMap() {
        map = new Microsoft.Maps.Map('#Mymap', {
			credentials: 'AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq'
		});
    }
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&countryFilter=ID&key=[AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq]' async defer></script>
<!-- END SCRIPTS -->
@endpush
@endsection