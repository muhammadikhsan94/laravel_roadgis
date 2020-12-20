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
		<li class="active">Buat Pengaduan</li>
	</ul>
	<!-- END BREADCRUMB -->                       
		
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">
		<div class="row">
			<div class="col-lg-7">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #1caf9a;color: white;">Buat Pengaduan</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" action="{{ url('store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label class="col-md-3">Nama Pelapor*</label>
								<div class="col-md-4">
								<input class="form-control" placeholder="Nama Lengkap " id="nama_pelapor" name="nama_pelapor" type="text" autofocus>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Nomor Identitas</label>
								<div class="col-md-4">
								<input class="form-control" placeholder="NIK " id="nik" name="nik" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Alamat Pelapor</label>
								<div class="col-md-9">
								<input class="form-control" placeholder="Alamat Anda " id="alamat" name="alamat" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Nomor HP</label>
								<div class="col-md-4">
								<input class="form-control" placeholder="Nomor HP " id="no_hp" name="no_hp" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Nama Jalan Rusak*</label>
								<div class="col-md-9">
								<input class="form-control" id="nama_jalan" name="nama_jalan" type="text" placeholder="nama jalan " onchange="Search()">
								<!--<input class="form-control" placeholder="Nama Jalan " id="nama_jalan" name="nama_jalan" type="text">-->
								<i>* Contoh : Jalan Bumi Manti 1 Kampung Baru Bandar Lampung</i>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3">Kategori Rusak*</label>
								<div class="col-md-3">
								<select id="id_kategori" name="id_kategori" class="form-control">
									<option value="1">Jalan Rusak Ringan</option>
									<option value="2">Jalan Rusak Sedang</option>
									<option value="3">Jalan Rusak Berat</option>
								</select>
								</div>
								<a href="#" data-toggle="modal" data-target="#ket"><span class="glyphicon glyphicon-question-sign" style="margin-top:5px;font-size:18px;"></span></a>
							</div>

							<input type="text" id="lat" name="lat">
							<input type="text" id="lng" name="lng">

							<div class="form-group">
								<label class="col-md-3">Foto Jalan*</label>
								<div class="col-md-9">
								<input class="form-control" id="foto_jalan" name="foto_jalan[]" type="file" multiple accept="{{ asset('images/*') }}">
								</div>
							</div>

							<div class="col-md-offset-3">
								<input type="submit" name="send" id="send" value="Simpan" class="btn btn-success">
								<input type="reset" name="reset" id="reset" value="Reset" class="btn btn-reset">
							</div>
						</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #1caf9a;color: white;">Peta</div>
							<div class="panel-body">
							<div style="width: auto;height: 300px;" id="Mymap"></div>
							<p style="margin-top: 5px;text-align: center;color: red"><b>* Tarik Titik Marker Jika Kordinat Tidak Sesuai *</b></p>
							<div id="output"></div>
							</div>
						</div>
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

	document.getElementById("lat").style.display = "none";
	document.getElementById("lng").style.display = "none";
	//BING MAPS
	var map, searchManager;

    function GetMap() {
        map = new Microsoft.Maps.Map('#Mymap', {
			credentials: 'AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq'
		});
    }

    function Search() {
        if (!searchManager) {
            //Create an instance of the search manager and perform the search.
            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
                searchManager = new Microsoft.Maps.Search.SearchManager(map);
                Search()
            });
        } else {
            //Remove any previous results from the map.
            map.entities.clear();

            //Get the users query and geocode it.
            var query = document.getElementById('nama_jalan').value;
            geocodeQuery(query);
        }
    }

    function geocodeQuery(query) {
        var searchRequest = {
            where: query,
            callback: function (r) {
                if (r && r.results && r.results.length > 0) {
                    var lat, lng, pin, pins = [], locs = [], output = 'Saran:<br/>';

                    for (var i = 0; i < r.results.length; i++) {
                        //Create a pushpin for each result. 
                        pin = new Microsoft.Maps.Pushpin(r.results[i].location, {
                            icon: '{{asset('icon/markers.png')}}'
                        });
                        pins.push(pin);
                        locs.push(r.results[i].location);

                        output += i + ') ' + r.results[i].name + '<br/>';

						lat = r.results[i].location.latitude;
						lng = r.results[i].location.longitude;
                    }

                    //Add the pins to the map
                    map.entities.push(pins);

                    //Display list of results
					document.getElementById('lat').value = lat;
					document.getElementById('lng').value = lng;
                    document.getElementById('output').innerHTML = output;

                    //Determine a bounding box to best view the results.
                    var bounds;

                    
					//Use the locations from the results to calculate a bounding box.
					bounds = Microsoft.Maps.LocationRect.fromLocations(locs);

                    map.setView({ bounds: bounds });
                }
            },
            errorCallback: function (e) {
                //If there is an error, alert the user about it.
                alert("No results found.");
            }
        };

        //Make the geocode request.
        searchManager.geocode(searchRequest);
    }
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&countryFilter=ID&key=[AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq]' async defer></script>
@endpush
@endsection