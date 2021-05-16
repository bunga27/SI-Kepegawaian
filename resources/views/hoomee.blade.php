@extends('master.master')
@section('title','Beranda | CV Hasil Utama Konsultan')
@section('ket','Pilih data yang ingin dilihat')
@section('content')

<!-- Page-Title -->


<div class="row">
    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-account-child text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_pegawai }}</b></h4>
                <p class="text-muted">Pegawai</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-home text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_proyek }}</b></h4>
                <p class="text-muted">Proyek</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    {{-- <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-done-all text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_proyek }}</b></h4>
                <p class="text-muted">Progres</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-attach-money text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_proyek }}</b></h4>
                <p class="text-muted">Pembiayaan</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div> --}}
</div>
<div class="row">
    <div class="col-md-3 m-t-1">
        <div class="thumbnail center">
            <a href="/kehadiran">
                <img src="{{ asset('menu_2') }}/assets/images/users/user.png" class="img-rounded m-t-1" width="200"><br>

                <h4 class="text-dark center">Lihat Kehadiran Pegawai</h4>
            </a>
        </div>
    </div>
    <div class="col-md-3 m-t-1">
        <div class="thumbnail center">
            <a href="/proyek">
                <img src="{{ asset('menu_2') }}/assets/images/progres.png" class="img-rounded m-t-1" width="200"><br>
                <h4 class="text-dark center">Lihat Progress Proyek</h4>
            </a>
        </div>
    </div>
    <div class="col-md-3 m-t-1">
        <div class="thumbnail center">
            <a href="/pembiayaan">
                <img src="{{ asset('menu_2') }}/assets/images/build.png" class="img-rounded m-t-1" width="200"><br>
                <h4 class="text-dark center">Lihat Pembiayaan Proyek</h4>
            </a>
        </div>
    </div>

</div>
@endsection

