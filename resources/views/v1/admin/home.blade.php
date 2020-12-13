@extends('v1.admin.layout')
@extends('v1.admin.header')
@extends('v1.admin.body')
@extends('v1.admin.footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="{{route('index')}}"><span class="glyphicon glyphicon-home"></span> Admin</a></li>
	</ul>
	<!-- END BREADCRUMB -->                       
					
	<!-- PAGE CONTENT WRAPPER -->
	<!--<div class="page-content-wrap" style="padding:10px;">-->
		<div class="container-fluid">
			<div class="card card-default color-palette-box">
				<div class="card-body">
				<table id="user-table" class="table table-striped table-bordered" style="width:100%">
					<thead>
					<tr>
						<th>Pelapor</th>
						<th>Nama Jalan</th>
						<th>Disposisi</th>
						<th>Status</th>
						<th>Proses Perbaikan</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($data as $key => $d)
					<tr>
						<td>{{ $d->nama_pelapor }}</td>
						<td>{{ $d->nama_jalan }}</td>
						<td>{{ $d->detaillapor['disposisi'] }}</td>
						<td>{{ $d->detaillapor['status'] }}</td>
						<td>{{ $d->detaillapor['proses_perbaikan'] }}</td>
						<td>
							<a href="{{url('read',array($d->id))}}">Read</a>
							<a href="{{url('delete',array($d->id))}}">Delete</a>
							<a href="{{url('edit',array($d->id))}}">Edit</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
				</div>
			</div>
		</div>
		<!--<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Pelapor</th>
					<th>Nama Jalan</th>
					<th>Disposisi</th>
					<th>Status</th>
					<th>Proses Perbaikan</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($data as $key => $d)
				<tr>
					<td>{{ $d->nama_pelapor }}</td>
					<td>{{ $d->nama_jalan }}</td>
					<td>{{ $d->detaillapor['disposisi'] }}</td>
					<td>{{ $d->detaillapor['status'] }}</td>
					<td>{{ $d->detaillapor['proses_perbaikan'] }}</td>
					<td>
						<a href="{{url('read',array($d->id))}}">Read</a>
						<a href="{{url('delete',array($d->id))}}">Delete</a>
						<a href="{{url('edit',array($d->id))}}">Edit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>-->
	<!--</div>-->
</div>

@endsection