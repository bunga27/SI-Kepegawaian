@extends('master.master')
@section('title','Laporan Pembiayaan Proyek')
@section('ket','CV. Hasil Utama Konsultan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <img src="{{ asset('menu_2') }}/assets/images/build.png" width="120px">
                    </div>
                    <div class="pull-left">
                        <h4 class="text-right">
                            <strong>Laporan Pembiayaan Pegawai CV. Hasil Utama Konsultan</strong>
                            <h5>Jl. Sendang 16b Kota Madiun | Kode Pos : 63116</h5>
                            <h5>hasilutamamadiun@gmail.com </h5>
                            <h5>081 216 116 623</h5>

                        </h4>

                    </div>

                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>

                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Proyek</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Uraian Pekerjaan</th>
                                        <th>Volume</th>
                                        <th>Harga Satuan</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembiayaan as $pembiayaan)
                                    <tr>
                                        <td>{{ $pembiayaan->tanggal }}</td>
                                        <td>{{ $pembiayaan->proyek->nama }}</td>
                                        <td>{{ $pembiayaan->jenispekerjaan }}</td>
                                        <td>{{ $pembiayaan->uraianpekerjaan }}</td>
                                        <td>{{ $pembiayaan->vol }}</td>
                                        <td>{{ $pembiayaan->hargasatuan }}</td>
                                        <td>{{ $pembiayaan->hargatotal }}</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="hidden-print">
                    <div class="pull-right">
                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i
                                class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
