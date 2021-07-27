@extends('master.master')
@section('title','Detail Laporan')
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
                            <strong>Laporan Progres Proyek CV. Hasil Utama Konsultan

                                <br> Proyek Rumah
                                <br>Jl. Sendang 16b Kota Madiun | Kode Pos : 63116
                                <br>hasilutamamadiun@gmail.com


                            </strong>


                        </h4>
                        <br><br><br><br>
                        <table id="table">
                            <tr>
                                <td>
                                    Penanggung Jawab &emsp;<br>
                                    </th>
                                <td>
                                    : {{ $proyek->pegawai->nama }} <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <form action="{{ url('/lapprogres/'.$proyek->idProyek.'/progress') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-6  inline-remember-me">
                                <div class="input-daterange input-group">
                                    <input type="date" class="form-control" name="tanggalpengerjaan"
                                        id="tanggalpengerjaan" />
                                    <span class="input-group-addon bg-custom b-0 text-white">sampai</span>
                                    <input type="date" class="form-control" name="tanggalberakhir"
                                        id="tanggalberakhir" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 pull-right inline-remember-me">

                                <button type="submit" name="search" title="search"
                                    class="btn btn-default btn-custom waves-effect waves-light center m-r-5">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>

                                    <tr>
                                        <th data-field="tanggal">Tanggal</th>
                                        <th data-field="progres">Progres</th>
                                        <th data-field="keterangan">Keterangan</th>
                                        <th data-field="gambar">Gambar</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($detailproyek as $detailproyek)
                                    <tr>
                                        <td>{{ $detailproyek->tanggal}}</td>

                                        <td>{{ $detailproyek->alurproyek->progres }} -
                                            {{ $detailproyek->alurproyek->tahapan }}</td>
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
