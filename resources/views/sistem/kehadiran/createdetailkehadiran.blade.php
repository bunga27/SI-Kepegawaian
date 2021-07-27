@extends('master.master')
@section('title','Tambah Detail Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Detail Kehadiran Pegawai')
@section('content')
@if (auth()->user()->level=="karyawan")
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="POST" action="/detailkehadiran" enctype="multipart/form-data">
                @csrf
                <div hidden class="form-group">
                    <label for="ketdatang" class="col-md-3 control-label">Keterangan Datang</label>
                    <div class="col-md-9">
                        <input required type="text" class="form-control" id="pegawai_id" name="pegawai_id"
                            placeholder="Masukan keterangan" value={{ auth()->user()->pegawai->nik }}>
                    </div>
                </div>
                <div class="form-group">
                    <label for="buktidatang" class="col-md-3 control-label">Bukti Datang</label>
                    <div class="col-md-9">
                        <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" />
                        <input required onchange="loadFile(event)" type="file" class="filestyle" id="buktidatang"
                            name="buktidatang" data-iconname="fa fa-cloud-upload" id="output">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ketdatang" class="col-md-3 control-label">Keterangan Datang</label>
                    <div class="col-md-9">
                        <input required type="text" class="form-control" id="ketdatang" name="ketdatang"
                            placeholder="Masukan keterangan">
                    </div>
                </div>
                <div class="pull-right inline-remember-me">
                    <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                    <a class="btn btn-danger btn-custom waves-effect waves-light" href="/detailkehadiran">Cancel</a>
                </div>
            </form>

        </div>
    </div>
@else

<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/detailkehadiran" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pegawai_id" class="col-md-3 control-label">Nama Pegawai</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Nama Pegawai --" id="pegawai_id"  name="pegawai_id" required>

                        @foreach ($pegawai as $pgw)
                        <option value="{{$pgw->nik}}">{{$pgw->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="buktidatang" class="col-md-3 control-label">Bukti Datang</label>
                <div class="col-md-9">
                    <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" />
                    <input required onchange="loadFile(event)" type="file" class="filestyle" id="buktidatang" name="buktidatang"
                        data-iconname="fa fa-cloud-upload" id="output">
                </div>
            </div>
            <div class="form-group">
                <label for="ketdatang" class="col-md-3 control-label">Keterangan Datang</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="ketdatang" name="ketdatang" placeholder="Masukan keterangan">
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/detailkehadiran">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endif
@endsection
