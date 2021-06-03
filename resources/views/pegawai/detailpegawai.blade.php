@extends('master.master')
@section('title','Detail Data Pegawai | CV Hasil Utama Konsultan')
@section('ket','Detail data pegawai yang telah dipilih sebelumnya')
@section('content')

<div class="row" >
<form class="form-horizontal" method="GET" action="/pegawai/{{ $pegawai->idPegawai }}" enctype="multipart/form-data">
    @csrf
    @method('get')
    <div class="col-sm-4 center">
        <div><img width="300" src="{{ $pegawai->pasfoto }}" alt=""></a>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="product-right-info">
            <h3><b>{{ $pegawai->nama }}</b></h3>
            <a href="{{ url('/user/'.$pegawai->user->id.'/edit') }}"
                class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-pencil"></i>
                <span> Ubah Data User</span>
            </a>


            <h5> <b>{{ $pegawai->user->email }}</b></h5>

            <h5 class="m-t-20"> <span class="label label-default m-l-5">{{ $pegawai->user->level}}</span></h5>



            <hr />

            <div class="row m-t-30">
                <div class="col-xs-12">
                    <h4><b>Data Pegawai</b></h4>
                    <div class="table-responsive m-t-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="400">Nama</td>
                                    <td>{{ $pegawai->nama }}</td>
                                </tr>
                                <tr>
                                    <td width="400">NIK</td>
                                    <td>{{ $pegawai->nik }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Jenis Kelamin</td>
                                    <td>{{ $pegawai->jeniskelamin }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Tempat, Tanggal Lahir</td>
                                    <td>{{ $pegawai->tempatlahir }} , {{ $pegawai->tanggallahir }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Alamat</td>
                                    <td>{{ $pegawai->alamat }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Agama</td>
                                    <td>{{ $pegawai->agama }}</td>
                                </tr>
                                <tr>
                                    <td width="400">No Telpon</td>
                                    <td>{{ $pegawai->telp }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Tanggal Bergabung</td>
                                    <td>{{ $pegawai->tanggalgabung }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Pendidikan</td>
                                    <td>{{ $pegawai->sd }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>{{ $pegawai->smp }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>{{ $pegawai->sma }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>{{ $pegawai->lanjutan }}</td>
                                </tr>

                                <tr>
                                    <td width="400">Data Fisik</td>
                                    <td>Riwayat Penyakit : {{ $pegawai->riwayatpenyakit }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>Tinggi Badan : {{ $pegawai->tinggi }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>Berat Badan: {{ $pegawai->berat }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Status Perkawinan</td>
                                    <td>{{ $pegawai->status }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Tanggungan</td>
                                    <td>{{ $pegawai->tanggungan }}</td>
                                </tr>
                                <tr>
                                    <td width="400">Data Wali</td>
                                    <td>{{ $pegawai->namawali }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>{{ $pegawai->hubungan }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>{{ $pegawai->alamatwali }}</td>
                                </tr>
                                <tr>
                                    <td width="400"></td>
                                    <td>{{ $pegawai->telpwali }}</td>
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


