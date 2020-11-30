@section('footer')

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{asset('assets/js/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/jquery/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src="{{asset('assets/js/plugins/icheck/icheck.min.js')}}"></script>        
<script type="text/javascript" src="{{asset('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
<script type='text/javascript' src="{{asset('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script type='text/javascript' src="{{asset('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>   
<!-- END THIS PAGE PLUGINS-->        

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{asset('assets/js/plugins.js')}}"></script>        
<script type="text/javascript" src="{{asset('assets/js/actions.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/demo_dashboard.js')}}"></script>
<!-- END TEMPLATE -->

<style>
	#marker {
	background-image: url('https://docs.mapbox.com/mapbox-gl-js/assets/washington-monument.jpg');
	background-size: cover;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	cursor: pointer;
	}
	
	.mapboxgl-popup {
	max-width: 600px;
	}
</style>

@push('scripts')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibXVoYW1tYWRpa2hzYW45NCIsImEiOiJja2h3dm5lZjEwMG1sMnNvZ25xOXBvdzlpIn0.b8gZzLgBBoZYa0km0EUj1w';
	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11',
		center: [105.269748, -5.385338],
		zoom: 10
	});
	
	//const markers = []

	//<?php

	//$js = "";
	//$i = 0;

	//$query = mysqli_query($koneksi, "SELECT * FROM tbl_lapor 
	//					INNER JOIN tbl_kategori 
	//					ON (tbl_lapor.id_kategori = tbl_kategori.id_kategori)
	//					INNER JOIN tbl_foto
	//					ON (tbl_foto.id_lapor = tbl_lapor.id_lapor)
	//					INNER JOIN tbl_detaillapor
	//					ON (tbl_detaillapor.id_lapor = tbl_lapor.id_lapor)
	//					ORDER BY tbl_lapor.id_lapor");

	//while ($value = mysqli_fetch_assoc($query)) {

	//	//$js = 'nama['.$i.'] = "'.$value['nama_jalan'].'";
	//	//				kategori['.$i.'] = "'.$value['nama_kategori'].'";
	//	//				x['.$i.'] = "'.$value['lat'].'";
	//	//				y['.$i.'] = "'.$value['lng'].'";
	//	//				foto['.$i.'] = "'.$value['foto_jalan'].'";
	//	//				proses['.$i.'] = "'.$value['proses_perbaikan'].'";
	//	//				disposisi['.$i.'] = "'.$value['disposisi'].'";
	//	//				informasi['.$i.'] = "'.$value['id_lapor'].'";
	//	//				status['.$i.'] = "'.$value['status_lapor'].'";
	//	//				';
	//	$i++;
	//}

	//?>

	//// create the popup
	//var popup = new mapboxgl.Popup({ offset: 25 }).setText(
	//	'Construction on the Washington Monument began in 1848.'
	//);
	
	//// create DOM element for the marker
	//var el = document.createElement('div');

	//const locations = [
	//		[6.055737, 46.233226],
	//		[6.0510, 46.2278],
	//		[6.0471, 46.23336]
	//];
	//locations.forEach(function(coords) {
	//		new mapboxgl.Marker().setLngLat(coords).addTo(map);
	//});
</script>
<!-- END SCRIPTS -->
@endpush
@endsection