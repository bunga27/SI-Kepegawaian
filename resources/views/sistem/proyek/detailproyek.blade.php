@extends('master.master')
@section('title','Progres Proyek| CV Hasil Utama Konsultan')
@section('ket','Lihat Detail Proyek')
@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (auth()->user()->level=="super" || auth()->user()->level=="admin" || auth()->user()->level=="owner")
<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="nama">Nama Proyek</th>
                <th data-field="alamat">Alamat</th>
                <th data-field="client">Client</th>
                <th data-field="pegawai">Pegawai Penanggung Jawab</th>
                @if (auth()->user()->level=="admin")
                <th data-field="action">Progres</th>
                @endif

            </tr>
        </thead>

        <tbody>
            @foreach ($proyek as $p)
            <tr>
                <td>{{ $p->nama}}</td>
                <td>{{ $p->alamat}}</td>
                <td>{{ $p->client}}</td>
                <td>{{ $p->pegawai->nama}}</td>
                @if (auth()->user()->level=="admin")
                <td>
                    <a href="{{ url('/proyek/'.$p->idProyek.'/showprogres') }}"
                        class="btn btn-default btn-custom waves-effect waves-light m-r-5">
                        <i class="fa fa-eye"></i>
                        <span> Lihat  </span>
                    </a>
                    {{-- <a href="{{ url('/proyek/'.$p->idProyek.'/progres') }}"
                        class="btn btn-primary btn-custom waves-effect waves-light m-r-5">
                        <i class="fa fa-plus"></i>
                        <span> Tambah  </span>
                    </a> --}}

                </td>
                @endif
            </tr>

            @endforeach


        </tbody>
    </table>
</div>
@else
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="nama">Nama Proyek</th>
                <th data-field="client">Client</th>
                <th data-field="pegawai">Pegawai Penanggung Jawab</th>

                <th data-field="action">Progres</th>


            </tr>
        </thead>

        <tbody>
            @foreach ($pegawai->proyek as $p)
            <tr>
                <td>{{ $p->nama}}</td>
                <td>{{ $p->client}}</td>
                <td>{{ $p->pegawai->nama}}</td>

                <td>
                    <a href="{{ url('/proyek/'.$p->idProyek.'/showprogres') }}"
                        class="btn btn-default btn-custom waves-effect waves-light m-r-5">
                        <i class="fa fa-eye"></i>
                        <span> Lihat </span>
                    </a>
                    <a href="{{ url('/proyek/'.$p->idProyek.'/progres') }}"
                        class="btn btn-primary btn-custom waves-effect waves-light m-r-5">
                        <i class="fa fa-plus"></i>
                        <span> Tambah </span>
                    </a>

                </td>

            </tr>

            @endforeach


        </tbody>
    </table>
</div>
@endif
@endsection
