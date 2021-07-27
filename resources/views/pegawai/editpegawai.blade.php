@extends('master.master')
@section('title','Ubah Data Pegawai | CV Hasil Utama Konsultan')
@section('ket','Ubah data pegawai yang telah dipilih sebelumnya')
@section('content')
<div class="row">
    <div class="col-md-8">
        <form class="form-horizontal" method="POST" action="/pegawai/{{ $pegawai->nik }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    {{-- @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach --}}

                    {{-- @if ($errors = 'The nik must be at least 999999999999999.')
                    <li>Minimal NIK 16 Digit</li>
                    @endif --}}
                    @if ($errors = 'The nik may not be greater than 9999999999999999.')
                            <li>Maksimal NIK 16 Digit</li>
                            @endif
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->nama}}" required type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                </div>
            </div>
            <div class="form-group">
                <label for="pasfoto" class="col-md-3 control-label">Pas Foto</label>
                <div class="col-md-9">
                   <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" src="{{  $pegawai->pasfoto }}" />
                    <input value="{{ $pegawai->pasfoto}}" onchange="loadFile(event)" type="file" class="filestyle" id="pasfoto" name="pasfoto"
                        data-iconname="fa fa-cloud-upload" id="output">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label"> Jabatan</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Jabatan --" id="jabatan_id" name="jabatan_id" required>

                        @foreach ($jabatan as $j)
                        <option value="{{$j->idJabatan}}">{{$j->jabatan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nik" class="col-md-3 control-label">NIK</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->nik}}" type="number" class="form-control" id="nik" name="nik" placeholder="Masukan No.NIK" value="{{old('nik')}}"">

                </div>
            </div>
            <div class="form-group">
                <label for="jeniskelamin" class="col-md-3 control-label">Jenis Kelamin</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="jeniskelamin" type="text" class="form-control custom-select-value" name="jeniskelamin">
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tempatlahir" class="col-md-3 control-label">Tempat Lahir</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->tempatlahir}}" required type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                        placeholder="Masukan Tempat Lahir">
                </div>
            </div>
            <div class="form-group">
                <label for="tanggallahir" class="col-md-3 control-label">Tanggal Lahir</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input value="{{ $pegawai->tanggallahir}}" required type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                            placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-3 control-label">Alamat</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->alamat}}" required type="text" class="form-control" id="alamat" name="alamat"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="agama" class="col-md-3 control-label">Agama</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->agama}}" required type="text" class="form-control" id="agama" name="agama" placeholder="Masukan Nama Agama">
                </div>
            </div>
            <div class="form-group">
                <label for="telp" class="col-md-3 control-label">No. Telephone</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->telp}}" required type="number" class="form-control" id="telp" name="telp" placeholder="Masukan No.Telephone"
                        minlength="8" min="0">
                </div>
            </div>

            <div class="form-group">
                <label for="tanggalgabung" class="col-md-3 control-label">Tanggal Gabung</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input value="{{ $pegawai->tanggalgabung}}" required type="date" id="tanggalgabung" name="tanggalgabung" class="form-control"
                            placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="statuskerja" class="col-md-3 control-label">Status Kerja</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="statuskerja" name="statuskerja" type="text" class="form-control custom-select-value">
                            <option value="aktif">Aktif</option>
                            <option value="tidakaktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jenjang" class="col-md-3 control-label">Pendidikan</label>
                <div class="child-repeater-table table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Jenjang</th>
                                <th>Tempat</th>
                                <th>Tahun</th>
                                <th><a href="javascript:void(0)" class="btn btn-default addRow"><i class="fa fa-plus"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($riwayatpendidikan as $pnd)
                               <tr>
                                <td>
                                    <select id="jenjang[]" name="jenjang[]" type="text" class="form-control custom-select-value">
                                        <option value="{{ $pnd->jenjang }}">{{ $pnd->jenjang }}</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </td>
                                <td><input value="{{ $pnd->tempat}}" name="tempat[]" id="tempat[]" type="text" class="form-control" placeholder="Tempat"></td>
                                <td><input value="{{ $pnd->tahun}}" type="number" id="tahun[]" name="tahun[]" class="form-control" placeholder="Tahun"></td>
                                <th><a href="javascript:void(0)" class="btn btn-danger deleteRow"><i class="fa fa-minus"></i></th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="form-group">
                <label for="riwayatpenyakit" class="col-md-3 control-label">Riwayat Penyakit</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->riwayatpenyakit}}" required type="text" id="riwayatpenyakit" name="riwayatpenyakit" class="form-control"
                        placeholder="Masukan Riwayat Penyakit">
                </div>
            </div>
            <div class="form-group">
                <label for="tinggi" class="col-md-3 control-label">Tinggi Badan</label>
                <div class="col-md-3">
                    <input value="{{ $pegawai->tinggi}}" required min="0" type="number" id="tinggi" name="tinggi" class="form-control" placeholder="cm">
                </div>
            </div>
            <div class="form-group">
                <label for="berat" class="col-md-3 control-label">Berat Badan</label>
                <div class="col-md-3">
                    <input value="{{ $pegawai->berat}}" required min="0" type="number" id="berat" name="berat" class="form-control" placeholder="kg">
                </div>
            </div>

            <div class="form-group ">
                <label for="status" class="col-md-3 control-label">Status</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select name="status" id="status" type="text" class="form-control custom-select-value">
                            <option value="kawin">Kawin</option>
                            <option value="belum kawin">Belum Kawin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <label for="tanggungan" class="col-md-3 control-label">Tanggungan</label>
                <div class="col-md-3">
                    <input value="{{ $pegawai->tanggungan}}" required min="0" name="tanggungan" id="tanggungan" type="number" class="form-control"
                        placeholder="orang">
                </div>
            </div>

            <div class="form-group">
                <label for="namawali" class="col-md-3 control-label">Nama Keluarga</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->namawali}}" required name="namawali" id="namawali" type="text" class="form-control" placeholder="Masukan Nama Keluarga">
                </div>
            </div>
            <div class="form-group">
                <label for="hubungan" class="col-md-3 control-label">Hubungan</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->hubungan}}" required name="hubungan" id="hubungan" type="text" class="form-control"
                        placeholder="Masukan Hubungan Keluarga">
                </div>
            </div>
            <div class="form-group">
                <label for="telpwali" class="col-md-3 control-label">No. Telephone Keluarga</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->telpwali}}" required type="number" id="telpwali" name="telpwali" class="form-control"
                        placeholder="Masukan No.Telephone Keluarga">
                </div>
            </div>
            <div class="form-group">
                <label for="alamatwali" class="col-md-3 control-label">Alamat Keluarga</label>
                <div class="col-md-9">
                    <input value="{{ $pegawai->alamatwali}}" required type="text" id="alamatwali" name="alamatwali" class="form-control"></textarea>
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/pegawai">Cancel</a>
            </div>
            {{-- <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="nama" name="nama" value="{{ $pegawai->nama}}">
                </div>
            </div>
            <div class="form-group">
                <label for="pasfoto" class="col-md-3 control-label">Pas Foto</label>
                <div class="col-md-9">
                    <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px"
                        src="{{  $pegawai->pasfoto }}" />
                    <input onchange="loadFile(event)" type="file" class="filestyle" id="pasfoto" name="pasfoto" value="{{ $pegawai->pasfoto}}" data-iconname="fa fa-cloud-upload">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Jabatan</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Nama Pegawai --" id="jabatan_id" name="jabatan_id" required>
                        @foreach ($jabatan as $j)
                        <option value="{{$j->idJabatan}}">{{$j->jabatan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nik" class="col-md-3 control-label">NIK</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="nik" name="nik" value="{{ $pegawai->nik}}"
                        placeholder="Masukan No.NIK">
                </div>
            </div>
            <div class="form-group">
                <label for="jeniskelamin" class="col-md-3 control-label">Jenis Kelamin</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="jeniskelamin" name="jeniskelamin"
                        value="{{ $pegawai->jeniskelamin}}" placeholder="Perempuan atau Laki-Laki">
                </div>
            </div>
            <div class="form-group">
                <label for="tempatlahir" class="col-md-3 control-label">Tempat Lahir</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                        value="{{ $pegawai->tempatlahir}}" placeholder="Masukan Tempat Lahir">
                </div>
            </div>
            <div class="form-group">
                <label for="tanggallahir" class="col-md-3 control-label">Tanggal Lahir</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input required type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                            value="{{ $pegawai->tanggallahir}}" placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-3 control-label">Alamat</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="alamat" name="alamat" value="{{ $pegawai->alamat}}">
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="agama" class="col-md-3 control-label">Agama</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="agama" name="agama" value="{{ $pegawai->agama}}"
                        placeholder="Masukan Nama Agama">
                </div>
            </div>
            <div class="form-group">
                <label for="telp" class="col-md-3 control-label">No. Telephone</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="telp" name="telp" value="{{ $pegawai->telp}}"
                        placeholder="Masukan No.Telephone">
                </div>
            </div>

            <div class="form-group">
                <label for="tanggalgabung" class="col-md-3 control-label">Tanggal Gabung</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input required type="date" id="tanggalgabung" name="tanggalgabung" value="{{ $pegawai->tanggalgabung}}"
                            class="form-control" placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="statuskerja" class="col-md-3 control-label">Status Kerja</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="statuskerja" name="statuskerja" type="text" value="{{ $pegawai->statuskerja}}"
                            class="form-control custom-select-value">
                            <option value="pemilik">Aktif</option>
                            <option value="admin">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="sd" class="col-md-3 control-label">Nama SD</label>
                <div class="col-md-9">
                    <input required type="text" id="sd" name="sd" class="form-control" value="{{ $pegawai->sd}}"
                        placeholder="Masukan Nama SD">
                </div>
            </div>
            <div class="form-group">
                <label for="smp" class="col-md-3 control-label">Nama SMP</label>
                <div class="col-md-9">
                    <input required type="text" id="smp" name="smp" class="form-control" value="{{ $pegawai->smp}}"
                        placeholder="Masukan Nama SMP">
                </div>
            </div>
            <div class="form-group">
                <label for="sma" class="col-md-3 control-label">Nama SMA</label>
                <div class="col-md-9">
                    <input required type="text" name="sma" id="sma" class="form-control" value="{{ $pegawai->sma}}"
                        placeholder="Masukan Nama SMA">
                </div>
            </div>
            <div class="form-group">
                <label for="lanjutan" class="col-md-3 control-label"> Pendidikan Lanjutan</label>
                <div class="col-md-9">
                    <input required type="text" id="lanjutan" name="lanjutan" class="form-control"
                        value="{{ $pegawai->lanjutan}}" placeholder="Masukan Nama Pendidikan Lanjutan">
                </div>
            </div>

            <div class="form-group">
                <label for="riwayatpenyakit" class="col-md-3 control-label">Riwayat Penyakit</label>
                <div class="col-md-9">
                    <input required type="text" id="riwayatpenyakit" name="riwayatpenyakit" class="form-control"
                        value="{{ $pegawai->riwayatpenyakit}}" placeholder="Masukan Riwayat Penyakit">
                </div>
            </div>
            <div class="form-group">
                <label for="tinggi" class="col-md-3 control-label">Tinggi Badan</label>
                <div class="col-md-3">
                    <input required type="number" id="tinggi" name="tinggi" class="form-control" value="{{ $pegawai->tinggi}}"
                        placeholder="cm">
                </div>
            </div>
            <div class="form-group">
                <label for="berat" class="col-md-3 control-label">Berat Badan</label>
                <div class="col-md-3">
                    <input required type="number" id="berat" name="berat" class="form-control" value="{{ $pegawai->berat}}"
                        placeholder="kg">
                </div>
            </div>

            <div class="form-group ">
                <label for="status" class="col-md-3 control-label">Status</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select name="status" id="status" type="text" class="form-control custom-select-value"
                            value="{{ $pegawai->status}}">
                            <option value="pemilik">Kawin</option>
                            <option value="admin">Belum Kawin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <label for="tanggungan" class="col-md-3 control-label">Tanggungan</label>
                <div class="col-md-3">
                    <input required name="tanggungan" id="tanggungan" type="number" class="form-control"
                        value="{{ $pegawai->tanggungan}}" placeholder="orang">
                </div>
            </div>

            <div class="form-group">
                <label for="namawali" class="col-md-3 control-label">Nama Wali</label>
                <div class="col-md-9">
                    <input required name="namawali" id="namawali" type="text" value="{{ $pegawai->namawali}}"
                        class="form-control" placeholder="Masukan Nama Wali">
                </div>
            </div>
            <div class="form-group">
                <label for="hubungan" class="col-md-3 control-label">Hubungan</label>
                <div class="col-md-9">
                    <input required name="hubungan" id="hubungan" type="text" class="form-control"
                        value="{{ $pegawai->hubungan}}" placeholder="Masukan Hubungan Wali">
                </div>
            </div>
            <div class="form-group">
                <label for="telpwali" class="col-md-3 control-label">No. Telephone Wali</label>
                <div class="col-md-9">
                    <input required type="number" id="telpwali" name="telpwali" class="form-control"
                        value="{{ $pegawai->telpwali}}" placeholder="Masukan No.Telephone Wali">
                </div>
            </div>
            <div class="form-group">
                <label for="alamatwali" class="col-md-3 control-label">Alamat Wali</label>
                <div class="col-md-9">
                    <input required type="text" id="alamatwali" name="alamatwali" value="{{ $pegawai->alamatwali}}"
                        class="form-control"></textarea>
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/pegawai">Cancel</a>
            </div> --}}

        </form>

    </div>
</div>

@endsection
