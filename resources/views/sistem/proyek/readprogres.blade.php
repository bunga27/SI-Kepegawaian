@extends('master.master')
@section('title','Detail Proyek | CV Hasil Utama Konsultan')
@section('ket','Lihat Detail Proyek')
@section('content')
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="tanggal">Tanggal</th>
                <th data-field="proyek">Proyek</th>
                <th data-field="pegawai">Pegawai</th>
                <th data-field="progres">Progres</th>
                <th data-field="keterangan">Keterangan</th>
                <th data-field="gambar">Gambar</th>
                @if (auth()->user()->level=="super")
                <th data-field="action">Action</th>
                @endif

            </tr>
        </thead>

        <tbody>
            @foreach ($proyek->detailproyek as $detailproyek)
            <tr>
                <td>{{ $detailproyek->tanggal}}</td>
                <td>{{ $detailproyek->proyek->nama}}</td>
                <td>{{ $detailproyek->proyek->pegawai->nama}}</td>
                <td>{{ $detailproyek->progres }}%</td>
                <td>{{ $detailproyek->keterangan }}</td>
                <td><img src="{{ asset($detailproyek->gambar) }}" width="100"></td>
                @if (auth()->user()->level=="super")
                <td>
                    <form action="{{ url('/detailproyek/'.$detailproyek->idDetailProyek) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-custom waves-effect waves-light m-r-5"
                            onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                            <i class="fa fa-trash"></i>
                            <span> Hapus</span>
                        </button>
                    </form>

                </td>
                @endif
            </tr>

            @endforeach


        </tbody>
    </table>
</div>
</div>
</div>
@endsection
