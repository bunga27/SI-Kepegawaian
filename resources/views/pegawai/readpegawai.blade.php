@extends('master.master')
@section('title','Data Pegawai | CV Hasil Utama Konsultan')
@section('ket','Data pegawai dapat dilihat dibawah ini')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div>
            <a href="pegawai/create"
                class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
                <i class="fa fa-plus"></i>
                <span> Tambahkan Data Pegawai </span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>
                    <th data-field="id">ID</th>
                    <th data-field="action">Action</th>
                    <th data-field="nama">Nama</th>
                    <th data-field="pasfoto">Pas Foto</th>
                    <th data-field="nik">NIK</th>
                    <th data-field="jeniskelamin">Jenis Kelamin</th>
                    <th data-field="tempatlahir">Tempat Lahir</th>
                    <th data-field="tanggallahir">Tanggal Lahir</th>
                    <th data-field="alamat">Alamat</th>
                    <th data-field="agama">Agama</th>
                    <th data-field="telp">No.Tel</th>
                    <th data-field="jabatan">Jabatan</th>
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
                    <td>
                        <a>
                            <form action="{{ url('/pegawai/'.$pegawai->idPegawai) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-custom waves-effect waves-light center m-r-5"
                                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </a>

                        <a href="{{ url('/pegawai/'.$pegawai->idPegawai.'/edit') }}"
                            class="btn btn-primary btn-custom waves-effect waves-light center m-r-5 ">
                            <i class="fa fa-pencil d-inline"></i>
                        </a>
                        <a href="{{ url('/pegawai/'.$pegawai->idPegawai.'/show') }}"
                            class="btn btn-default btn-custom waves-effect waves-light center m-r-5">
                            <i class="fa fa-search"></i>
                        </a>
                    </td>
                    <td>{{ $pegawai->nama }}</td>
                    <td><img src="{{ asset($pegawai->pasfoto) }}" width="100"> </td>
                    <td>{{ $pegawai->nik }}</td>
                    <td>{{ $pegawai->jeniskelamin }}</td>
                    <td>{{ $pegawai->tempatlahir }}</td>
                    <td>{{ $pegawai->tanggallahir }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>{{ $pegawai->agama }}</td>
                    <td>{{ $pegawai->telp }}</td>
                    {{-- <td>{{ $pegawai->user->email }}</td> --}}
                    <td>{{ $pegawai->jabatan->jabatan }}</td>
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
{{--  TAMPILAN CARD VIEW
@foreach($pegawai as $pegawai)
<div class="col-md-3 m-t-15">
    <div class="thumbnail">
        <img src="{{ $pegawai->pasfoto }}" alt="user-img" class="img-rounded m-t-10" width="100">
        <h4>{{ $pegawai->nama }}</h4>
        <h5>{{ $pegawai->telp }}</h5>
        <h5>{{ $pegawai->alamat }}</h5>

        <a>
            <form action="{{ url('/pegawai/'.$pegawai->idPegawai) }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-custom waves-effect waves-light pull-right m-r-5"
                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                    <i class="fa fa-trash"></i>
                    <span> Hapus</span>
                </button>
            </form>
        </a>

        <a href="{{ url('/pegawai/'.$pegawai->idPegawai.'/edit') }}"
            class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
            <i class="fa fa-pencil"></i>
            <span> Ubah</span>
        </a>
        <a href="{{ url('/pegawai/'.$pegawai->idPegawai.'/show') }}"
            class="btn btn-default btn-custom waves-effect waves-light pull-right m-r-5">
            <i class="fa fa-search"></i>
            <span> Ubah</span>
        </a>


        <br><br>
    </div>
</div>
@endforeach --}}


@endsection
