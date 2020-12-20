@extends('layouts/layout')
@extends('layouts/header')
@extends('layouts/body')
@extends('layouts/footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Data Pengaduan</li>
    </ul>
    <!-- END BREADCRUMB -->     

	<!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #1caf9a;color: white;">Data Lengkap Pengaduan Jalan Rusak</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Tanggal Lapor:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->tanggal_lapor }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Nama Pelapor:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->nama_pelapor }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Nomor Identitas:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->nik }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Alamat:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->alamat }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Nomor HP:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->no_hp }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Nama Jalan Rusak:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->nama_jalan }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Foto Jalan:</b></p>
							</div>
							<div class="col-md-9 bg">
							@foreach($data->foto as $key => $foto)
								<img style="height: 200px;margin-bottom: 10px;" class="media-object" src="{{ asset('images/'.$foto->foto_jalan) }}" alt="Foto Jalan Rusak" title="Foto Jalan Rusak">
							@endforeach	
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Kategori Rusak</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->kategori['nama_kategori'] }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Disposisi:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->detaillapor['admin']['nama_admin'] }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Status:</b></p>
							</div>
							<div class="col-md-9 bg">
								<p><b>{{ $data->detaillapor['status'] }}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 bg">
								<p><b>Proses Perbaikan</b></p>
							</div>
							<div class="col-md-5 bg">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="{{ $data->detaillapor['proses_perbaikan'] }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $data->detaillapor['proses_perbaikan'] }}%;"> {{ $data->detaillapor['proses_perbaikan'] }}% </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>
@endsection