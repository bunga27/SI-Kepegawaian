@extends('master.master')
@section('title','Laporan Data Pegawai ')
@section('ket','Data pegawai dapat dilihat dibawah ini')
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
                            <strong>Laporan Data Pegawai CV. Hasil Utama Konsultan</strong>
                            <br>Jl. Sendang 16b Kota Madiun | Kode Pos : 63116
                            <br>hasilutamamadiun@gmail.com

                        </h4>

                    </div>

                </div>
                <div class="m-h-50"></div>
               <div class="row">

                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>

                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="nama">Nama</th>
                                <th data-field="pasfoto">Pas Foto</th>
                                <th data-field="nik">NIK</th>
                                <th data-field="jeniskelamin">Jenis Kelamin</th>
                                <th data-field="tempatlahir">Tempat Lahir</th>
                                <th data-field="tanggallahir">Tanggal Lahir</th>
                                <th data-field="alamat">Alamat</th>
                                <th data-field="agama">Agama</th>
                                <th data-field="telp">No.Tel</th>
                                <th data-field="tanggalgabung">Gabung</th>
                                <th data-field="statuskerja">Kerja</th>
                                <th data-field="sd">SD</th>
                                <th data-field="smp">SMP</th>
                                <th data-field="sma">SMA</th>
                                <th data-field="lanjutan">Lanjutan</th>
                                <th data-field="riwayatpenyakit">Penyakit</th>
                                <th data-field="tinggi">Tinggi </th>
                                <th data-field="berat">Berat </th>
                                <th data-field="status">Status</th>
                                <th data-field="tanggungan">Tanggungan</th>
                                <th data-field="namawali">Wali</th>
                                <th data-field="hubungan">Hubungan</th>
                                <th data-field="telpwali">No.Telp</th>
                                <th data-field="alamatwali">Alamat</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pegawai as $pegawai)
                            <tr>
                                <td></td>

                                <td>{{ $pegawai->nama }}</td>
                                <td><img src="{{ asset($pegawai->pasfoto) }}" width="100"> </td>
                                <td>{{ $pegawai->nik }}</td>
                                <td>{{ $pegawai->jeniskelamin }}</td>
                                <td>{{ $pegawai->tempatlahir }}</td>
                                <td>{{ $pegawai->tanggallahir }}</td>
                                <td>{{ $pegawai->alamat }}</td>
                                <td>{{ $pegawai->agama }}</td>
                                <td>{{ $pegawai->telp }}</td>
                                <td>{{ $pegawai->tanggalgabung }}</td>
                                <td>{{ $pegawai->statuskerja }}</td>


                                <td>{{ $pegawai->sd }}</td>
                                <td>{{ $pegawai->smp }}</td>
                                <td>{{ $pegawai->sma }}</td>
                                <td>{{ $pegawai->lanjutan }}</td>

                                <td>{{ $pegawai->riwayatpenyakit }}</td>
                                <td>{{ $pegawai->tinggi }}</td>
                                <td>{{ $pegawai->berat }}</td>

                                <td>{{ $pegawai->status }}</td>
                                <td>{{ $pegawai->tanggungan }}</td>
                                <td>{{ $pegawai->namawali }}</td>
                                <td>{{ $pegawai->hubungan }}</td>
                                <td>{{ $pegawai->telpwali }}</td>
                                <td>{{ $pegawai->alamatwali}}</td>

                            </tr>

                            @endforeach


                        </tbody>
                    </table>
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

