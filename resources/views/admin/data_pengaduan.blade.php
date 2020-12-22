@extends('admin.layout')
@extends('admin.header')
@extends('admin.body')
@extends('admin.footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home"></span></a></li>                    
		<li class="active">Buat Pengaduan</li>
	</ul>
	<!-- END BREADCRUMB -->                       
		
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">
		<div class="row">
			<div class="col-lg-7">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #1caf9a;color: white;">Data Pengaduan</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-3">Nama Pelapor</label>
								<div class="col-md-4">
									<label style="color:green;">{{$data->nama_pelapor}}</label>
								<!--<input class="form-control" value="{{$data->nama_pelapor}}" type="text" readonly>-->
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Nomor Identitas</label>
								<div class="col-md-4">
									<label style="color:green;">{{$data->nik}}</label>
									<!--<input class="form-control" value="{{$data->nik}}" type="text" readonly>-->
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Alamat Pelapor</label>
								<div class="col-md-9">
									<!--<input class="form-control" value="{{$data->alamat}}" type="text" readonly>-->
									<label style="color:green;">{{$data->alamat}}</label>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Nomor HP</label>
								<div class="col-md-4">
									<!--<input class="form-control" value="{{$data->no_hp}}" id="no_hp" name="no_hp" type="text" readonly>-->
									<label style="color:green;">{{$data->no_hp}}</label>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Nama Jalan Rusak</label>
								<div class="col-md-9">
									<!--<input class="form-control" type="text" value="{{$data->nama_jalan}}" readonly>-->
									<label style="color:green;">{{$data->nama_jalan}}</label>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Kategori Rusak</label>
								<div class="col-md-4">
									<!--<input class="form-control" value="{{$data->kategori['nama_kategori']}}" type="text" readonly>-->
									<label style="color:green;">{{$data->kategori['nama_kategori']}}</label>
								</div>
							</div>

							<input type="hidden" id="lat" name="lat" value="{{$data->lat}}">
							<input type="hidden" id="lng" name="lng" value="{{$data->lng}}">

							<div class="form-group">
								<label class="col-md-3">Foto Jalan</label>
								<div class="col-md-9">
									@foreach($data->foto as $key => $foto)
									<div class="col-sm-4">
										<img style="height: 100px;margin-bottom: 10px;" class="media-object" src="{{asset('images/'.$foto->foto_jalan)}}" alt="Foto Jalan Rusak" title="Foto Jalan Rusak">
									</div>
									@endforeach
								</div>
							</div>
						</form>
					</div>
				</div>
			</div> 
			<div class="col-lg-5">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #1caf9a;color: white;">Status</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" action="{{ route('admin.update') }}" method="post" enctype="multipart/form-data">
						@csrf

							<input type="hidden" id="id_lapor" name="id_lapor" value={{ $data->id_lapor }}>

							<div class="form-group">
								<label class="col-md-4">Status</label>
								<div class="col-md-8">
									<label style="color:green;">{{ $data->detaillapor['status'] }}</label>
								</div>
							</div>

							@if ($user == '3')

							<div class="form-group">
								<label class="col-md-4">Disposisi</label>
								<div class="col-md-8">
									<select id="disposisi" name="disposisi" class="form-control">
										<option value="0">Pilih</option>
										<option value="1">Dinas Bina Marga Kota Bandar Lampung</option>
										<option value="2">Dinas Bina Marga Provinsi Lampung</option>
									</select>
								</div>
							</div>

							<!--<input type="hidden" id="proses_perbaikan" name="proses_perbaikan" value={{ $data->detaillapor['proses_perbaikan'] }}>-->

							@else

							<div class="form-group">
								<label class="col-md-4">Disposisi</label>
								<div class="col-md-8">
									<label style="color:green;">{{ $data->detaillapor['admin']['name'] }}</label>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4">Proses Perbaikan</label>
								<div class="col-md-2">
									<input class="form-control" id="proses_perbaikan" name="proses_perbaikan" value="{{ $data->detaillapor['proses_perbaikan'] }}" min="0" max="100">
								</div>
								<div class="col-md-1">
									<span class="fa fa-percent" style="margin-top:5px;font-size:18px;"></span>
								</div>
							</div>

							<input class="form-control" value="{{$data->lapor['id_kategori']}}" type="hidden">

							@endif


							<div class="col-md-offset-4">
								<input type="submit" name="send" id="send" value="Simpan" class="btn btn-success">
								<a href="{{route('admin.home')}}" class="btn btn-primary active" role="button" aria-pressed="true">Kembali</a>
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #1caf9a;color: white;">Peta</div>
					<div class="panel-body">
					<div style="width: auto;height: 300px;" id="Mymap"></div>
					<div id="output"></div>
					</div>
				</div>
			</div>
		</div>        
	</div>
	<!-- END PAGE CONTENT WRAPPER -->    

	<!-- Modal -->
	<div id="ket" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">KATEGORI RUSAK</h4>
				</div>
				<div class="modal-body">
					<p><b>Ringan:</b> Jalan berlubang/retak/bergelombang sedalam 1-5cm sepanjang 1-2 meter.</p>
					<p><b>Sedang:</b> Jalan berlubang/retak/bergelombang sedalam 5-10cm sepanjang 3-4 meter</p>
					<p><b>Berat:</b> Jalan berlubang/retak/bergelombang sedalam >10cm sepanjang >5 meter.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- End Modal content-->
		</div>
	</div>
	<!-- End Modal -->                            
</div>            
<!-- END PAGE CONTENT -->

<!-- JAVASCRIPT -->
@push('scripts')    
<script type='text/javascript'>

	var map;

    function GetMap() {
        map = new Microsoft.Maps.Map('#Mymap', {
			credentials: 'AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq'
		});

		var loc = new Microsoft.Maps.Location({{ $data->lat }}, {{ $data->lng }});
			pin = new Microsoft.Maps.Pushpin(loc, {
				icon: '{{ asset('icon/markers.png') }}'
			});
		
		map.entities.push(pin);

		//Determine a bounding box to best view the results.
		var bounds;

		
		//Use the locations from the results to calculate a bounding box.
		bounds = Microsoft.Maps.LocationRect.fromLocations(loc);

		map.setView({ bounds: bounds });
    }

</script>
<script>
	$('#slider').slider({
		slide:function(event, ui) {
			$('#data-1').val(ui.value);
		}
	});
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&countryFilter=ID&key=[AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq]' async defer></script>
@endpush
@endsection