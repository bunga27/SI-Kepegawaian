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
                {{-- <th data-field="gambar">Detail</th> --}}
                @if (auth()->user()->level=="admin")
                <th data-field="action">Action</th>
                @endif

            </tr>
        </thead>

        <tbody>
            @foreach ($detailproyek as $detailproyek)
            <tr>
                <td>{{ date('d-m-Y', strtotime($detailproyek->tanggal))}}</td>
                <td>{{ $detailproyek->alurproyek->progres }} - {{ $detailproyek->alurproyek->tahapan }}</td>
                {{-- <td></td> --}}
                <td>{{ $detailproyek->keterangan }}</td>
                <td><img src="{{ asset($detailproyek->gambar) }}" width="100"></td>

                @if (auth()->user()->level=="admin")
                <td>
                    <a href="{{ url('/detailproyek/'.$detailproyek->idDetailProyek.'/edit') }}"
                        class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-l-5">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="pull-left m-l-5 ">
                        <form action="{{ url('/detailproyek/'.$detailproyek->idDetailProyek) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-custom   waves-effect waves-light "
                                onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </a>
                </td>
                @endif
            </tr>

            @endforeach


        </tbody>
    </table>
</div>
@endsection
