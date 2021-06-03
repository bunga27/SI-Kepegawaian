@extends('master.master')
@section('title','Lihat Pembiayaan Proyek | CV Hasil Utama Konsultan')
@section('ket','Lihat Pembiayaan Proyek')
@section('content')
<div class="col-md-12 pull-left">
    <a href="{{ url('/pembiayaan/create') }}"
        class="btn btn-default btn-custom  waves-effect waves-light pull-right m-r-5">
        <i class="fa fa-plus"></i>
        <span>Tambah Pembiayaan Proyek</span>
    </a>
</div>
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="tanggal">Tanggal</th>
                <th data-field="proyek">Proyek</th>
                <th data-field="jenispekerjaan">Jenis Pekerjaan</th>
                <th data-field="uraianpekerjaan">Uraian Pekerjaan</th>
                <th data-field="vol">Volume</th>
                <th data-field="hargasatuan">Harga Satuan</th>
                <th data-field="hargatotal">Harga Total</th>
                <th data-field="nota">Nota</th>
                <th data-field="action">Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($proyek->pembiayaan as $pembiayaan)
            <tr>
                <td>{{ $pembiayaan->tanggal}}</td>
                <td>{{ $pembiayaan->proyek->nama}}</td>
                <td>{{ $pembiayaan->jenispekerjaan }}</td>
                <td>{{ $pembiayaan->uraianpekerjaan }}</td>
                <td>{{ $pembiayaan->vol }}</td>
                <td>{{ $pembiayaan->hargasatuan }}</td>
                <td>{{ $pembiayaan->hargatotal }}</td>
                <td><img src="{{ asset($pembiayaan->nota) }}" width="100"></td>
                <td>
                    <form action="{{ url('/pembiayaan/'.$pembiayaan->idPembiayaan) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-custom waves-effect waves-light m-r-5"
                            onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                            <i class="fa fa-trash"></i>
                            <span> Hapus</span>
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
