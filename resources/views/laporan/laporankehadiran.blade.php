@extends('master.master')
@section('title','Laporan Kehadiran Proyek')
@section('ket','CV. Hasil Utama Konsultan')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <img src="{{ asset('menu_2') }}/assets/images/users/logo.png" width="120px">
                    </div>
                    <div class="pull-left">
                        <h4 class="text-right">
                            <strong>Laporan Kehadiran Pegawai CV. Hasil Utama Konsultan</strong>
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
                                        <th>Nama</th>
                                        <th>Kehadiran</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailkehadiran as $detailkehadiran)
                                    <tr>
                                        <td>{{ $detailkehadiran->kehadiran->tanggalkehadiran }}</td>
                                        <td>{{ $detailkehadiran->pegawai->nama }}</td>
                                        <td>{{ $detailkehadiran->ketkehadiran }}</td>
                                        <td>{{ $detailkehadiran->keterangan}}</td>

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
