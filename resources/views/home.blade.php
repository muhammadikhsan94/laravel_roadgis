@extends('layout')

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
			<div style="max-width: auto;height: 550px;margin-bottom: 10px;" id="map"></div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<img style='width: 25px; height: 25px' src='assets/icon/ringan.png'/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK RINGAN</b></span> 
				<img style='width: 25px; height: 25px' src='assets/icon/sedang.png'/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK SEDANG</b></span>
				<img style='width: 25px; height: 25px' src='assets/icon/berat.png'/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK BERAT</b></span>
				<img style='width: 25px; height: 25px' src='assets/icon/perbaikan.png'/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN DALAM PERBAIKAN</b></span>
				<img style='width: 25px; height: 25px' src='assets/icon/selesai.png'/>
				<span style="margin-left: 5px;"><b>JALAN SELESAI DIPERBAIKI</b></span>
			</div>
		</div>
	</div>
	<!-- END CONTENT WRAPPER -->
</div>
<!-- END CONTENT -->
@endsection