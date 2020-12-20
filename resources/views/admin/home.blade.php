@extends('admin.layout')
@extends('admin.header')
@extends('admin.body')
@extends('admin.footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="{{route('admin.home')}}"><span class="glyphicon glyphicon-home"></span> Admin</a></li>
	</ul>
	<!-- END BREADCRUMB -->                       
					
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap" style="padding:10px;">
		@if (empty($data))
			<h3 class="text-center title-login">{{ __('Data Not Found') }}</h3>
		@else
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
				@if ($user == '3')

					@foreach($data as $key => $data)
					<tr>
						<td>{{ $data->lapor['tanggal_lapor'] }}</td>
						<td>{{ $data->lapor['nama_pelapor'] }}</td>
						<td>{{ $data->lapor['nama_jalan'] }}</td>
						<td>{{ $data->admin['name']}}</td>
						<td>
							@if ($data->disposisi == '3')
								<a href="{{route('admin.read', array($data->id_lapor))}}" class="btn btn-success" role="button" aria-pressed="true">EDIT</a>
								<a href="{{url('delete',array($data->id))}}" class="btn btn-danger" role="button" aria-pressed="true">DELETE</a>
							@else
								<a href="{{url('delete',array($data->id))}}" class="btn btn-danger" role="button" aria-pressed="true">DELETE</a>
							@endif
						</td>
					</tr>
					@endforeach

				@else

					@foreach($data->where('disposisi', $user) as $key => $data)
					<tr>
						<td>{{ $data->lapor['tanggal_lapor'] }}</td>
						<td>{{ $data->lapor['nama_pelapor'] }}</td>
						<td>{{ $data->lapor['nama_jalan'] }}</td>
						<td>{{ $data->admin['name']}}</td>
						<td>
							<a href="{{route('admin.read', array($data->id_lapor))}}" class="btn btn-success" role="button" aria-pressed="true">EDIT</a>
							<a href="{{url('delete',array($data->id))}}" class="btn btn-danger" role="button" aria-pressed="true">DELETE</a>
						</td>
					</tr>
					@endforeach
				
				@endif
			</tbody>
			<caption>List of Complaints</caption>
		</table>
		@endif
	</div>
</div>

@endsection