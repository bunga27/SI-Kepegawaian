@extends('mobile.master')
@section('title','Data Diri Pegawai | CV Hasil Utama Konsultan')
@section('content')
@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row">
    <form class="form-horizontal" method="GET" action="/pegawai/{{ auth()->user()->pegawai->nik }}"
        enctype="multipart/form-data">
        @csrf
        @method('get')
        <div class="col-sm-4 center">
            <div><img width="200" src="{{ auth()->user()->pegawai->pasfoto }}" alt=""></a>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="product-left-info">
                <h3><b>{{ auth()->user()->pegawai->nama }}</b></h3>

                <a href="{{ url('/user/'.auth()->user()->id.'/edit') }}"
                    class="btn btn-primary btn-custom waves-effect waves-light pull-left">
                    <i class="fa fa-gear"></i>
                    <span>Setting Akun</span>
                </a>

                <a href="{{ url('/pegawai/'.auth()->user()->pegawai->nik.'/edit') }}"
                    class="btn btn-warning btn-custom waves-effect waves-light pull-right">
                    <i class="fa fa-pencil"></i>
                    <span> Ubah Data Diri</span>
                </a>

                <br><br>
                <div class="row m-t-30">
                    <div class="col-xs-12">
                        <h4><b>Data Diri Pegawai</b></h4>
                        <div class="table-responsive m-t-20">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="400">Nama</td>
                                        <td>{{ auth()->user()->pegawai->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">NIK</td>
                                        <td>{{ auth()->user()->pegawai->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Jenis Kelamin</td>
                                        <td>{{ auth()->user()->pegawai->jeniskelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Tempat, Tanggal Lahir</td>
                                        <td>{{ auth()->user()->pegawai->tempatlahir }} ,
                                            {{ auth()->user()->pegawai->tanggallahir }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Alamat</td>
                                        <td>{{ auth()->user()->pegawai->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Agama</td>
                                        <td>{{ auth()->user()->pegawai->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">No Telpon</td>
                                        <td>{{ auth()->user()->pegawai->telp }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Tanggal Bergabung</td>
                                        <td>{{ auth()->user()->pegawai->tanggalgabung }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Pendidikan</td>
                                        <td>{{ auth()->user()->pegawai->sd }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>{{ auth()->user()->pegawai->smp }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>{{ auth()->user()->pegawai->sma }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>{{ auth()->user()->pegawai->lanjutan }}</td>
                                    </tr>

                                    <tr>
                                        <td width="400">Data Fisik</td>
                                        <td>Riwayat Penyakit : {{ auth()->user()->pegawai->riwayatpenyakit }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>Tinggi Badan : {{ auth()->user()->pegawai->tinggi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>Berat Badan: {{ auth()->user()->pegawai->berat }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Status Perkawinan</td>
                                        <td>{{ auth()->user()->pegawai->status }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Tanggungan</td>
                                        <td>{{ auth()->user()->pegawai->tanggungan }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400">Data Wali</td>
                                        <td>{{ auth()->user()->pegawai->namawali }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>{{ auth()->user()->pegawai->hubungan }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>{{ auth()->user()->pegawai->alamatwali }}</td>
                                    </tr>
                                    <tr>
                                        <td width="400"></td>
                                        <td>{{ auth()->user()->pegawai->telpwali }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </form>
</div>


@endsection
