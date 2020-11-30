@section('header')

<head>        
<!-- META SECTION -->
<title>Aplikasi Pengaduan Jalan Rusak Berbasis GIS</title>            
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
			
<link rel="icon" href="{{asset('assets/icon/dbm.png')}}" type="image/x-icon" />
<!-- END META SECTION -->

<!-- Google Maps API -->
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl9cbc9lKYCPmzqQr1HJjhA5o0ASZhLPM&libraries=places&callback=initMap" async defer></script>
<!-- End Google Maps API -->

<!-- CSS INCLUDE -->        
<link rel="stylesheet" type="text/css" id="theme" href="{{asset('assets/css/theme-default.css')}}"/>
<!-- END CSS INCLUDE -->                                    
</head>
@endsection