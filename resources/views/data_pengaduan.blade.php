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

        <!-- FORM PENCARIAN DATA -->
        <div class="row">
            <form method="post" action="cari_data.php">
                <div class="row">
                    <div style="float: right;margin-right: 50px;margin-bottom: 10px;">
                        <div class="col-md-10">
                            <input type="text" name="search" placeholder="Cari Data Berdasarkan Nama Jalan" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="submit" name="submit" value="search" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END FORM PENCARIAN DATA -->

        <div class="col-lg-12">
            @if(!empty($data))
                @foreach($data as $key => $d)
                <!-- LOOPING DATA LAPOR MENURUT ID LAPOR -->
                <div style="padding: 10px; border:1px solid #999;" class="media">
                    <div class="media-left media-middle">
                        <img style="width: 120px;height: 120px;" class="media-object" src="{{ asset('images/'.$d->foto[0]['foto_jalan']) }}" alt="...">
                    </div>
                    <div class="media-body">
                        <p style="font-size: 15px;">
                            <b>Nama Pelapor :</b> {{ $d->nama_pelapor }} <br>
                            <b>Tanggal Lapor :</b> {{ $d->tanggal_lapor }} <br>
                            <b>Jalan Rusak :</b> {{ $d->nama_jalan }} <br>
                            <b>Kategori Rusak :</b> {{ $d->kategori['nama_kategori'] }}
                        </p>
                        <div style="float: left;">
                            <a href="{{ url('read/id_lapor='.$d->id_lapor) }}" class="btn btn-primary"> Detail <span class="glyphicon glyphicon-new-window"></span></a>
                        </div>
                    </div>
                </div>
                <!-- END LOOPING DATA LAPOR MENURUT ID LAPOR -->
                @endforeach
            @else
                <div style="text-align:center;"><img src="{{asset('icon/notfound.png')}}"/></div>
            @endif
        </div>
    </div>
</div>
@endsection