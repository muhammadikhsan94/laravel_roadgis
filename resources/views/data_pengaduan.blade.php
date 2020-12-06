@extends('layout')
@extends('header')
@extends('body')
@extends('footer')

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/"><span class="glyphicon glyphicon-home"></span></a></li>
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
    </div>
</div>
@endsection