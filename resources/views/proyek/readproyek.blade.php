@extends('master.master')
@section('title','Data Proyek | CV Hasil Utama Konsultan')
@section('ket','Data Proyek dapat dilihat pada tabel dibawah ini')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row">
    <div class="col-md-12">
        <a href="proyek/create"
            class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Data Proyek </span>
        </a>
    </div>
</div>
<div class="row">

    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>

                    <th data-field="proyek">Proyek</th>
                    <th data-field="pj">Penanggung Jawab</th>
                    <th data-field="client">Client</th>
                    <th data-field="alamat">Alamat</th>
                    <th data-field="tglpengerjaan">Tanggal Pengerjaan</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($proyek as $pry)
                <tr>

                    <td>{{ $pry->nama }}</td>
                    <td>{{ $pry->pegawai->nama }}</td>
                    <td>{{ $pry->client }}</td>
                    <td>{{ $pry->alamat }}</td>
                    <td>{{ $pry->tanggalpengerjaan }}</td>
                    <td><a>
                            <form action="{{ url('/proyek/'.$pry->idProyek) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-custom waves-effect waves-light pull-right m-r-5"
                                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </a>

                        <a href="{{ url('/proyek/'.$pry->idProyek.'/edit') }}"
                            class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
                            <i class="fa fa-pencil"></i>
                        </a></td>

                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
</div>

{{-- <div class="row">
    @foreach($proyek as $proyek)
    <div class="col-md-3 m-t-15">
        <div class="thumbnail">
            <img src="{{ asset('menu_2') }}/assets/images/build.png" alt="user-img" class="img-rounded m-t-10" width="400">
            <h4>{{ $proyek->nama }}</h4>
            <h5>Client : {{ $proyek->client }}</h5>

            <h5>{{ $proyek->alamat }}</h5>
            @if (auth()->user()->level=="super")
            <a>
                <form action="{{ url('/proyek/'.$proyek->idProyek) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-custom waves-effect waves-light pull-right m-r-5"
                        onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </a>
            @endif

            <a href="{{ url('/proyek/'.$proyek->idProyek.'/edit') }}"
                class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-pencil"></i>
            </a>

            <a href="{{ url('/proyek/'.$proyek->idProyek.'/show') }}"
                class="btn btn-default btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-money"></i>
                <span> Ubah</span>
            </a>
            <a href="{{ url('/proyek/'.$proyek->idProyek.'/progres') }}"
                class="btn btn-default btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-line-chart"></i>
                <span> Ubah</span>
            </a>

            <br><br>
        </div>
    </div>
    @endforeach
</div> --}}

@endsection
