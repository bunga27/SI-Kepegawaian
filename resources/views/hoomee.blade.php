

@extends('master.master')
@section('title','Beranda | CV Hasil Utama Konsultan')
@section('ket','Selamat Datang !')
@section('content')

<!-- Page-Title -->

@if (auth()->user()->level=="karyawan")
<div class="row">
    <h3>
        <strong> Selamat Datang, {{ auth()->user()->pegawai->nama }} </strong>
        <br>
    </h3>
    <span>Silakan memilih menu dibawah ini</span>
    <br><br><br>
        <div class="col-md-12">
            <div>
                <a href="/mobileprofil"
                    class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('menu_2') }}/assets/images/users/user.png" class="img-rounded m-t-1" width="200"><br>
                    <span>Data Diri Pegawai</span>
                    <br>
                </a>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-12">

            <div>
                <a href="/detailkehadiran/" class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('menu_2') }}/assets/images/absen.png" class="img-rounded m-t-1" width="150"><br>
                    <span> Isi Daftar Hadir </span>
                    <br>
                </a>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-12 m-b-2">
            <div>
                <a href="/detailproyek/"
                    class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12 ">
                    <img src="{{ asset('menu_2') }}/assets/images/progres.png" class="img-rounded m-t-2" width="200"><br>
                    <span> Tambahkan Progres Proyek </span>
                    <br>
                </a>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-12 m-b-2">
            <div>
                <a href="/pegawai/{{auth()->user()->pegawai->idPegawai}}/addgaji"
                    class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12 ">
                    <img src="{{ asset('menu_2') }}/assets/images/money.png" class="img-rounded m-t-2" width="200"><br>
                    <span> Lihat Penggajian </span>
                    <br>
                </a>
            </div>
        </div>

</div>
@else
<div class="row">
    <h3>Master Data</h3>
    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-account-circle text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_user }}</b></h4>
                <p class="text-muted">User</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-account-child text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_pegawai }}</b></h4>
                <p class="text-muted">Pegawai</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-work text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_jabatan }}</b></h4>
                <p class="text-muted">Jabatan</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>


    <div class="col-md-3 ">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-home text-info"></i>
            </div>
            <div class="text-right">
                <h4 class="text-dark"><b class="counter">{{ $data_proyek }}</b></h4>
                <p class="text-muted">Proyek</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">

    <h3>Progres Proyek</h3>
    <div class="col-md-12">

        <div class="card-box table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>

                    <tr>
                        <th data-field="tanggal">Tanggal</th>
                        <th data-field="proyek">Proyek</th>
                        <th data-field="pegawai">Pegawai</th>
                        <th data-field="progres">Progres</th>
                        <th data-field="keterangan">Keterangan</th>
                        <th data-field="gambar">Gambar</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($detailproyek as $detailproyek)
                    <tr>
                        <td>{{ $detailproyek->tanggal}}</td>
                        <td>{{ $detailproyek->proyek->nama}}</td>
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

<div class="row">
    <h3>Kehadiran Pegawai</h3>
    <div class="col-md-12">
        <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>

                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Ketepatan Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailkehadiran as $detailkehadiran)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($detailkehadiran->created_at))}}</td>
                        <td>{{ $detailkehadiran->pegawai->nama }}</td>
                        <td>{{ $detailkehadiran->keterangan}}</td>
                        <td>{{ $detailkehadiran->ketepatanhadir }}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>



@endif


@endsection


