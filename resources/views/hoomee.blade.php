

@extends('master.master')
@section('title','Beranda | CV Hasil Utama Konsultan')
@section('ket','Pilih data yang ingin dilihat')
@section('content')

<!-- Page-Title -->

@if (auth()->user()->level=="karyawan")
<div class="row">
    <h3>
        <strong> Selamat Datang, {{ auth()->user()->pegawai->nama }} </strong>
        <br>
    </h3>
    <span>Silakan memilih menu dibawah ini</span>
    <br><br><br>
        <div class="col-md-12">
            <div>
                <a href="/mobileprofil"
                    class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('menu_2') }}/assets/images/users/user.png" class="img-rounded m-t-1" width="200"><br>
                    <span>Data Diri Pegawai</span>
                    <br>
                </a>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-12">

            <div>
                <a href="/detailkehadiran/create" class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('menu_2') }}/assets/images/absen.png" class="img-rounded m-t-1" width="150"><br>
                    <span> Isi Daftar Hadir </span>
                    <br>
                </a>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-12 m-b-2">
            <div>
                <a href="/detailproyek/"
                    class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12 ">
                    <img src="{{ asset('menu_2') }}/assets/images/progres.png" class="img-rounded m-t-2" width="200"><br>
                    <span> Tambahkan Progres Proyek </span>
                    <br>
                </a>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-12 m-b-2">
            <div>
                <a href="/pembiayaan/create"
                    class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12 ">
                    <img src="{{ asset('menu_2') }}/assets/images/money.png" class="img-rounded m-t-2" width="200"><br>
                    <span> Tambahkan Pembiayaan Proyek </span>
                    <br>
                </a>
            </div>
        </div>

</div>
@else
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
@endif
@endsection
