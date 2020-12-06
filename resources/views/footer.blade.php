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

@stack('scripts')
@endsection