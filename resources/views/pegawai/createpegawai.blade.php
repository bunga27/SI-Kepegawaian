@extends('master.master')
@section('title','Tambah Pegawai | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data pegawai')
@section('content')
<div class="row">
    <div class="col-md-8">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                {{-- @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach --}}

                @if ($errors = 'The nik must be at least 999999999999999.')
                <li>Minimal NIK 16 Digit</li>
                @endif
                {{-- @if ($errors = 'The nik may not be greater than 9999999999999999.')
                <li>Maksimal NIK 16 Digit</li>
                @endif --}}
            </ul>
        </div>
        @endif
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
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan Nik" required value="{{old('nik')}}">
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
                    <input required type="number" class="form-control" id="telp" name="telp" placeholder="Masukan No.Telephone" minlength="8" min="0">
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
                            <tr>
                                <td>
                                    <select id="jenjang[]" name="jenjang[]" type="text" class="form-control custom-select-value">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </td>
                                <td><input name="tempat[]" id="tempat[]" type="text" class="form-control" placeholder="Tempat"></td>
                                <td><input type="number" id="tahun[]" name="tahun[]" class="form-control" placeholder="Tahun"></td>
                                <th><a href="javascript:void(0)" class="btn btn-danger deleteRow"><i class="fa fa-minus"></i></th>
                            </tr>
                        </tbody>
                    </table>
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
                    <input required min="0" type="number" id="tinggi" name="tinggi" class="form-control" placeholder="cm">
                </div>
            </div>
            <div class="form-group">
                <label for="berat" class="col-md-3 control-label">Berat Badan</label>
                <div class="col-md-3">
                    <input required min="0" type="number" id="berat" name="berat" class="form-control" placeholder="kg">
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
                    <input required min="0" name="tanggungan" id="tanggungan" type="number" class="form-control" placeholder="orang">
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
