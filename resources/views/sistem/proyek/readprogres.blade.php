@extends('master.master')
@section('title','Detail Progres Proyek | CV Hasil Utama Konsultan')
@section('ket','Lihat Detail Proyek' )
@section('content')
<div class="row">
    <div class="col-md-12">
        <div>
            <a href="{{ url('/proyek/'.$proyek->idProyek.'/progres') }}"
                class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
                <i class="fa fa-plus"></i>
                <span> Tambahkan Progres </span>
            </a>
        </div>
    </div>
</div>

<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="tanggal">Tanggal</th>
                <th data-field="progres">Progres</th>
                <th data-field="keterangan">Keterangan</th>
                <th data-field="gambar">Foto</th>
                <th data-field="gambar">Foto Detail</th>
                @if (auth()->user()->level=="admin")
                <th data-field="action">Action</th>
                @endif

            </tr>
        </thead>

        <tbody>
            @foreach ($proyek->detailproyek as $detailproyek)
            <tr>
                <td>{{ date('d-m-Y', strtotime($detailproyek->tanggal))}}</td>
                <td>{{ $detailproyek->progres }}%</td>
                <td>{{ $detailproyek->keterangan }}</td>
                <td><img src="{{ asset($detailproyek->gambar) }}" width="100"></td>
                <td>Lihat Detail</td>
                {{-- <td>
                @foreach ( $detailproyek->gambarprogres as $g)
                <img src="{{ asset($g->gambar2) }}" width="100">
                @endforeach
                </td> --}}
                @if (auth()->user()->level=="admin")
                <td>
                    <form action="{{ url('/detailproyek/'.$detailproyek->idDetailProyek) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-custom waves-effect waves-light m-r-5 d-inline"
                            onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                            <i class="fa fa-trash"></i>
                            <span> Hapus</span>
                        </button>
                    </form>
                    <a href="{{ url('/detailproyek/'.$detailproyek->idDetailProyek. '/edit') }}" >
                        <button class="btn btn-primary btn-custom waves-effect waves-light d-inline m-r-5">
                            <i class="fa fa-trash"></i>
                            <span> Ubah</span>
                        </button>
                    </a>
                </td>
                @endif
            </tr>

            @endforeach


        </tbody>
    </table>
</div>
@endsection
