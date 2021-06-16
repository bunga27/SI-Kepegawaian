@extends('master.master')
@section('title','Detail Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Lihat Detail Kehadiran Pegawai')
@section('content')
<div class="col-md-12 pull-left">
    <a href="{{ url('/detailkehadiran/create') }}"
        class="btn btn-default btn-custom  waves-effect waves-light pull-right m-r-5">
        <span>Tambah Kehadiran Pegawai</span>
    </a>
</div>
<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="tanggal">Tanggal</th>
                <th data-field="kehadiran">Data Datang</th>
                <th data-field="pulang">Data Pulang</th>
                <th data-field="keterangan">Keterangan</th>

                <th data-field="action">Action</th>


            </tr>
        </thead>

        <tbody>
            @foreach ($pegawai->detailkehadiran as $detailkehadiran)


            <tr>

                <td>{{ date('d-m-Y', strtotime($detailkehadiran->created_at))}}</td>
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
                <td>
                    @if ($loop->last)
                    <a href="{{ url('/detailkehadiran/'.$detailkehadiran->idDetailKehadiran.'/edit') }}"
                    class="btn btn-primary btn-custom waves-effect waves-light center m-r-5">
                    <i class="fa fa-pencil"></i>
                    <span>Daftar Pulang</span>
                    </a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
