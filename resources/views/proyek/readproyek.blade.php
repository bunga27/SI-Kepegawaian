@extends('master.master')
@section('title','Lihat Proyek | CV Hasil Utama Konsultan')
@section('ket','Data Proyek dapat dilihat pada tabel dibawah ini')
@section('content')


<div class="row">
    <div class="col-md-12">
        <a href="proyek/create"
            class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Data Proyek </span>
        </a>
        <br><br><br>
        {{-- <a href="{{ url('/detailproyek') }}" class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-r-5">
            <i class="fa fa-search"></i>
            <span> Lihat Detail Progres Proyek</span>
        </a> --}}
    </div>
</div>

<div class="row">
    @foreach($proyek as $proyek)
    <div class="col-md-3 m-t-15">
        <div class="thumbnail">
            <img src="{{ asset('menu_2') }}/assets/images/build.png" alt="user-img" class="img-rounded m-t-10" width="400">
            <h4>{{ $proyek->nama }}</h4>
            <h5>Client : {{ $proyek->client }}</h5>
            {{-- @foreach ($proyek->pegawai as $pgw)
            <h5>Pekerja :{{ $pgw->nama }}</h5>
            @endforeach --}}
            <h5>{{ $proyek->alamat }}</h5>
            @if (auth()->user()->level=="super")
            <a>
                <form action="{{ url('/proyek/'.$proyek->idProyek) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-custom waves-effect waves-light pull-right m-r-5"
                        onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                        <i class="fa fa-trash"></i>
                        {{-- <span> Hapus</span> --}}
                    </button>
                </form>
            </a>
            @endif

            <a href="{{ url('/proyek/'.$proyek->idProyek.'/edit') }}"
                class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-pencil"></i>
                {{-- <span> Ubah</span> --}}
            </a>

            {{-- <a href="{{ url('/proyek/'.$proyek->idProyek.'/show') }}"
                class="btn btn-default btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-money"></i>
                <span> Ubah</span>
            </a> --}}
            <a href="{{ url('/proyek/'.$proyek->idProyek.'/progres') }}"
                class="btn btn-default btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-line-chart"></i>
                {{-- <span> Ubah</span> --}}
            </a>

            <br><br>
        </div>
    </div>
    @endforeach
</div>

@endsection
