@extends('master.master')
@section('title','Detail Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Lihat Detail Kehadiran Pegawai')
@section('content')
<div class="col-md-12 pull-left">
    <a href="{{ url('/detailkehadiran/create') }}"
        class="btn btn-default btn-custom  waves-effect waves-light pull-right m-r-5">
        <i class="fa fa-plus"></i>
        <span>Tambah Kehadiran Pegawai</span>
    </a>
</div>
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="tanggal">Tanggal</th>
                <th data-field="nama">Nama Pegawai</th>
                <th data-field="kehadiran">Kehadiran</th>
                <th data-field="keterangan">Keterangan</th>
                <th data-field="action">Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($detailkehadiran as $detailkehadiran)
            <tr>

                <td>{{ $detailkehadiran->kehadiran->tanggalkehadiran}}</td>
                <td>{{ $detailkehadiran->pegawai->nama }}</td>
                <td>{{ $detailkehadiran->ketkehadiran }}</td>
                <td>{{ $detailkehadiran->keterangan }}</td>
                <td>


                    <form action="/detailkehadiran/{{ $detailkehadiran->idDetailKehadiran }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Yakin akan menghapus?')"
                            class="btn btn-danger waves-effect waves-light">
                            <i class="fa fa-trash"></i>
                            <span>Hapus </span>

                        </button>
                    </form>
                </td>
            </tr>

            @endforeach


        </tbody>
    </table>
</div>
</div>
</div>
@endsection
