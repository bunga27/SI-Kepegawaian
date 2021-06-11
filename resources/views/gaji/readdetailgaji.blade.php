@extends('master.master')
@section('title','Lihat Detail Penggajian| CV Hasil Utama Konsultan')
@section('ket','Data detail penggajian pegawai yang dipilih dapat dilihat pada tabel dibawah ini')
@section('content')


{{-- <div class="row">
    <div class="col-md-12">
        <a href="gaji/create"
            class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Data Jabatan </span>
        </a>
    </div>
</div> --}}
<div class="row">

    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>

                    <th data-field="bulan">Bulan</th>
                    <th data-field="gajibulan">Gaji Bulanan</th>
                    <th data-field="action">Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($pegawai->gaji as $g)
                <tr>

                    <td>{{ $g->bulan }}</td>
                    <td>{{ $g->gajibulan }}</td>
                    <td><a>
                            {{-- <form action="{{ url('/gaji/'.$pegawai->gaji->idGaji) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-custom waves-effect waves-light pull-right m-r-5"
                                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                    <i class="fa fa-trash"></i>
                                    <span> Hapus</span>
                                </button>
                            </form> --}}
                        </a>

                    </td>

                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
</div>

@endsection
