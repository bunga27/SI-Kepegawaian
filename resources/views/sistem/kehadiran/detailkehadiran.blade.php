@extends('master.master')
@section('title','Detail Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Lihat Detail Kehadiran Pegawai')
@section('content')
@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="col-md-12 pull-left">
    @if (auth()->user()->level=="admin")
    <a href="{{ url('/detailkehadiran/create') }}"
        class="btn btn-default btn-custom  waves-effect waves-light pull-right m-r-5">
        <span>Tambah Kehadiran Pegawai</span>
    </a>
    @endif
</div>
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="tanggal">Tanggal</th>
                <th data-field="nama">Nama Pegawai</th>
                <th data-field="kehadiran">Data Datang</th>
                <th data-field="pulang">Data Pulang</th>
                <th data-field="keterangan">Keterangan</th>
                @if (auth()->user()->level=="admin" || auth()->user()->level=="karyawan" )
                <th data-field="action">Action</th>
                @endif

            </tr>
        </thead>

        <tbody>
            @foreach ($detailkehadiran as $detailkehadiran)


            <tr>

                <td>{{ date('d-m-Y', strtotime($detailkehadiran->created_at))}}</td>
                <td>{{ $detailkehadiran->pegawai->nama }}</td>
                <td>
                    <strong>{{ date('H:i:s', strtotime($detailkehadiran->created_at))}}</strong><br>
                    {{ $detailkehadiran->ketdatang }}<br>
                    <img src="{{ $detailkehadiran->buktidatang }}" width="100px">

                </td>
                    <td><strong>{{ date('H:i:s', strtotime($detailkehadiran->updated_at))}}</strong><br>
                        {{ $detailkehadiran->ketpulang }}<br>
                    <img src="{{ $detailkehadiran->buktipulang }}" width="100px">
                </td>

                <td>
                    {{ $detailkehadiran->keterangan }}<br>
                    {{ $detailkehadiran->ketepatanhadir}}<br>
                </td>
                @if (auth()->user()->level=="admin")
                <td>
                    {{-- @if ($loop->first)
                    <a href="{{ url('/detailkehadiran/'.$detailkehadiran->idDetailKehadiran.'/edit') }}"
                        class="btn btn-primary btn-custom  waves-effect waves-light pull-right m-r-5">
                        <i class="fa fa-pencil"></i>
                        <span>Daftar Pulang</span>
                    </a>
                    @endif --}}

                    <a class="pull-left m-l-5   ">
                        <form action="{{ url('/detailkehadiran/'.$detailkehadiran->idDetailKehadiran) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-custom   waves-effect waves-light "
                                onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </a>
                    <a href="{{ url('/detailkehadiran/'.$detailkehadiran->idDetailKehadiran.'/edit') }}"
                        class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-l-5">
                        <i class="fa fa-plus"></i> Daftar Pulang
                    </a>

                </td>

                </td>
                @endif
            </tr>

            @endforeach


        </tbody>
    </table>
</div>
@endsection
