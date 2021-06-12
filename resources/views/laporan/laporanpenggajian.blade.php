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
                        <img src="{{ asset('menu_2') }}/assets/images/build.png" width="100px">
                    </div>

                    <div class="center">
                        <h4 class="text-center">
                            <strong>Laporan Pembiayaan Proyek CV. Hasil Utama Konsultan</strong>
                            <br>Jl. Sendang 16b Kota Madiun | Kode Pos : 63116
                            <br>hasilutamamadiun@gmail.com

                        </h4>

                    </div>

                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>

                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Pegawai</th>
                                        <th>Penghasilan</th>
                                        <th>Potongan</th>
                                        <th>Total Gaji</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $g)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($g->created_at))}}</td>
                                        <td>{{ $g->pegawai->nama }}</td>
                                        <td>{{ $g->totalgaji+$g->potongantelat }}</td>
                                        <td>{{ $g->potongantelat }}</td>
                                        <td>{{ $g->totalgaji }}</td>

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
