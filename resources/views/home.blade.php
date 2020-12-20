@extends('layouts/layout')
@extends('layouts/header')
@extends('layouts/body')
@extends('layouts/footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content" onload="GetMap()">
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
				<img style='width: 25px; height: 25px' src="{{asset('icon/ringan.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK RINGAN</b></span> 
				<img style='width: 25px; height: 25px' src="{{asset('icon/sedang.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK SEDANG</b></span>
				<img style='width: 25px; height: 25px' src="{{asset('icon/berat.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN RUSAK BERAT</b></span>
				<img style='width: 25px; height: 25px' src="{{asset('icon/perbaikan.png')}}"/>
				<span style="margin-left: 5px;margin-right: 20px;"><b>JALAN DALAM PERBAIKAN</b></span>
				<img style='width: 25px; height: 25px' src="{{asset('icon/selesai.png')}}"/>
				<span style="margin-left: 5px;"><b>JALAN SELESAI DIPERBAIKI</b></span>
			</div>
		</div>
	</div>
	<!-- END CONTENT WRAPPER -->
</div>
<!-- END CONTENT -->

<!-- JAVASCRIPT -->
@push('scripts')    
<script type='text/javascript'>
	//BING MAPS
	var map;

    function GetMap() {
        map = new Microsoft.Maps.Map('#Mymap', {
			credentials: 'AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq'
		});

		var infoboxLayer = new Microsoft.Maps.EntityCollection();
		var pinLayer = new Microsoft.Maps.EntityCollection();
		var pin, locs = [], output = 'Saran:<br/>';

		// Create the info box for the pushpin
		pinInfobox = new Microsoft.Maps.Infobox(new Microsoft.Maps.Location(0, 0), { visible: false });
		infoboxLayer.push(pinInfobox);

		// Get Data from Database
		@foreach($data as $key => $d)
			var loc = new Microsoft.Maps.Location({{ $d->lat }}, {{ $d->lng }});
			pin = new Microsoft.Maps.Pushpin(loc, {
				icon: '{{ asset('icon/'.$d->kategori['ikon']) }}'
			});
			pin.Title = '{{ $d->nama_jalan }}';
			pinLayer.push(pin);
			locs.push(loc);
			Microsoft.Maps.Events.addHandler(pin, 'click', displayInfobox);
		@endforeach

		//Add the pins to the map
		map.entities.push(pinLayer);
		map.entities.push(infoboxLayer);

		//Determine a bounding box to best view the results.
		var bounds;

		//Use the locations from the results to calculate a bounding box.
		bounds = Microsoft.Maps.LocationRect.fromLocations(locs);

		map.setView({ center: bounds.center, zoom: 12});
    }

	function displayInfobox(e) {
		pinInfobox.setOptions({ title: e.target.Title, visible: true, offset: new Microsoft.Maps.Point(0, 25) });
		pinInfobox.setLocation(e.target.getLocation());
	}

	function hideInfobox(e) {
		pinInfobox.setOptions({ visible: false });
	}
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&countryFilter=ID&key=[AsvrlFVEvd8hivhOL3VM_na5QJ9cmdF0LmAznQpJtJhmUt5OkHcWvegTrt-qHEYq]' async defer></script>
<!-- END SCRIPTS -->
@endpush
@endsection