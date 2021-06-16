@extends('master.master')
@section('title','Laporan Kehadiran Pegawai')
@section('ket','CV. Hasil Utama Konsultan')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <img src="{{ asset('menu_2') }}/assets/images/build.png" width="100px">
                    </div>

                    <div class="center">
                        <h4 class="text-center">
                            <strong>Laporan Progres Proyek CV. Hasil Utama Konsultan</strong>
                            <br>Jl. Sendang 16b Kota Madiun | Kode Pos : 63116
                            <br>hasilutamamadiun@gmail.com

                        </h4>

                    </div>

                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>

                                    <tr>
                                        <th data-field="tanggal">Tanggal</th>
                                        <th data-field="pegawai">Pegawai</th>
                                        <th data-field="progres">Progres</th>
                                        <th data-field="keterangan">Keterangan</th>
                                        <th data-field="gambar">Gambar</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($proyek->detailproyek as $detailproyek)
                                    <tr>
                                        <td>{{ $detailproyek->tanggal}}</td>

                                        <td>{{ $detailproyek->proyek->pegawai->nama}}</td>
                                        <td>{{ $detailproyek->progres }}%</td>
                                        <td>{{ $detailproyek->keterangan }}</td>
                                        <td><img src="{{ asset($detailproyek->gambar) }}" width="100"></td>

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
