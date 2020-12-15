@extends('v1.admin.layout')
@extends('v1.admin.header')
@extends('v1.admin.body')
@extends('v1.admin.footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="{{route('admin.home')}}"><span class="glyphicon glyphicon-home"></span> Admin</a></li>
	</ul>
	<!-- END BREADCRUMB -->                       
					
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col" width="15%">Tanggal Lapor</th>
					<th scope="col" width="15%">Pelapor</th>
					<th scope="col" width="40%">Nama Jalan</th>
					<th scope="col" width="15%">Disposisi</th>
					<th scope="col" width="15%">Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($data as $key => $d)
				<tr>
					<td>{{ $d->tanggal_lapor }}</td>
					<td>{{ $d->nama_pelapor }}</td>
					<td>{{ $d->nama_jalan }}</td>
					<td>{{ $d->detaillapor['disposisi'] }}</td>
					<td>
						<a href="{{route('v1admin.read', array($d->id_lapor))}}" class="btn btn-success" role="button" aria-pressed="true">EDIT</a>
						<a href="{{url('delete',array($d->id))}}" class="btn btn-danger" role="button" aria-pressed="true">DELETE</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<caption>List of Complaints</caption>
		</table>
	</div>
</div>

@endsection