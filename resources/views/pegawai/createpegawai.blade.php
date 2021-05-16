@extends('master.master')
@section('title','Tambah Pegawai | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data pegawai')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/pegawai" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                </div>
            </div>
            <div class="form-group">
                <label for="pasfoto" class="col-md-3 control-label">Pas Foto</label>
                <div class="col-md-9">
                    <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" />
                    <input required onchange="loadFile(event)" type="file" class="filestyle" id="pasfoto" name="pasfoto" data-iconname="fa fa-cloud-upload"id="output">
                </div>
            </div>
            <div class="form-group">
                <label for="nik" class="col-md-3 control-label">NIK</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="nik" name="nik" placeholder="Masukan No.NIK">
                </div>
            </div>
            <div class="form-group">
                <label for="jeniskelamin" class="col-md-3 control-label">Jabatan</label>
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
                    <input required type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                        placeholder="Masukan Tempat Lahir">
                </div>
            </div>
            <div class="form-group">
                <label for="tanggallahir" class="col-md-3 control-label">Tanggal Lahir</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input required type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                            placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-3 control-label">Alamat</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="alamat" name="alamat"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="agama" class="col-md-3 control-label">Agama</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="agama" name="agama" placeholder="Masukan Nama Agama">
                </div>
            </div>
            <div class="form-group">
                <label for="telp" class="col-md-3 control-label">No. Telephone</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="telp" name="telp" placeholder="Masukan No.Telephone">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-3 control-label">E-Mail</label>
                <div class="col-md-9">
                    <input required type="email" class="form-control" id="email" name="email" placeholder="Masukan E-Mail">
                </div>
            </div>
            <div class="form-group">
                <label for="jabatan" class="col-md-3 control-label">Jabatan</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="jabatan" type="text" class="form-control custom-select-value" name="jabatan">
                            <option value="pemilik">Pemilik</option>
                            <option value="admin">Administrator</option>
                            <option value="pegawai">Pegawai</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggalgabung" class="col-md-3 control-label">Tanggal Gabung</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input required type="date" id="tanggalgabung" name="tanggalgabung" class="form-control"
                            placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="statuskerja" class="col-md-3 control-label">Status Kerja</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="statuskerja" name="statuskerja" type="text"
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
                    <input required type="text" id="sd" name="sd" class="form-control" placeholder="Masukan Nama SD">
                </div>
            </div>
            <div class="form-group">
                <label for="smp" class="col-md-3 control-label">Nama SMP</label>
                <div class="col-md-9">
                    <input required type="text" id="smp" name="smp" class="form-control" placeholder="Masukan Nama SMP">
                </div>
            </div>
            <div class="form-group">
                <label for="sma" class="col-md-3 control-label">Nama SMA</label>
                <div class="col-md-9">
                    <input required type="text" name="sma" id="sma" class="form-control" placeholder="Masukan Nama SMA">
                </div>
            </div>
            <div class="form-group">
                <label for="lanjutan" class="col-md-3 control-label"> Pendidikan Lanjutan</label>
                <div class="col-md-9">
                    <input required type="text" id="lanjutan" name="lanjutan" class="form-control"
                        placeholder="Masukan Nama Pendidikan Lanjutan">
                </div>
            </div>

            <div class="form-group">
                <label for="riwayatpenyakit" class="col-md-3 control-label">Riwayat Penyakit</label>
                <div class="col-md-9">
                    <input required type="text" id="riwayatpenyakit" name="riwayatpenyakit" class="form-control"
                        placeholder="Masukan Riwayat Penyakit">
                </div>
            </div>
            <div class="form-group">
                <label for="tinggi" class="col-md-3 control-label">Tinggi Badan</label>
                <div class="col-md-3">
                    <input required type="number" id="tinggi" name="tinggi" class="form-control" placeholder="cm">
                </div>
            </div>
            <div class="form-group">
                <label for="berat" class="col-md-3 control-label">Berat Badan</label>
                <div class="col-md-3">
                    <input required type="number" id="berat" name="berat" class="form-control" placeholder="kg">
                </div>
            </div>

            <div class="form-group ">
                <label for="status" class="col-md-3 control-label">Status</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select name="status" id="status" type="text" class="form-control custom-select-value">
                            <option value="pemilik">Kawin</option>
                            <option value="admin">Belum Kawin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <label for="tanggungan" class="col-md-3 control-label">Tanggungan</label>
                <div class="col-md-3">
                    <input required name="tanggungan" id="tanggungan" type="number" class="form-control" placeholder="orang">
                </div>
            </div>

            <div class="form-group">
                <label for="namawali" class="col-md-3 control-label">Nama Wali</label>
                <div class="col-md-9">
                    <input required name="namawali" id="namawali" type="text" class="form-control"
                        placeholder="Masukan Nama Wali">
                </div>
            </div>
            <div class="form-group">
                <label for="hubungan" class="col-md-3 control-label">Hubungan</label>
                <div class="col-md-9">
                    <input required name="hubungan" id="hubungan" type="text" class="form-control"
                        placeholder="Masukan Hubungan Wali">
                </div>
            </div>
            <div class="form-group">
                <label for="telpwali" class="col-md-3 control-label">No. Telephone Wali</label>
                <div class="col-md-9">
                    <input required type="number" id="telpwali" name="telpwali" class="form-control"
                        placeholder="Masukan No.Telephone Wali">
                </div>
            </div>
            <div class="form-group">
                <label for="alamatwali" class="col-md-3 control-label">Alamat Wali</label>
                <div class="col-md-9">
                    <input required type="text" id="alamatwali" name="alamatwali" class="form-control"></textarea>
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/pegawai">Cancel</a>
            </div>

        </form>

    </div>
</div>
@endsection
