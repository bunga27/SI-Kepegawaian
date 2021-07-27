@extends('master.master')
@section('title','Tambah Proyek | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data Proyek')
@section('content')
<div class="row">
    <div class="col-md-8">
        <form class="form-horizontal" method="POST" action="/proyek" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="client" class="col-md-4 control-label">Client</label>
                <div class="col-md-8">
                    <input required type="text" class="form-control" id="client" name="client" placeholder="Masukan Nama Client">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-4 control-label">Nama Pegawai</label>
                <div class="col-md-8">
                    <select class="form-control" placeholder="-- Pilih Nama Pegawai --" id="nik" name="nik" required>
                        @foreach ($pegawai as $pgw)
                        <option value="{{ $pgw->nik }}">{{ $pgw->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-4 control-label">Nama Proyek</label>
                <div class="col-md-8">
                    <input required type="text"  class="form-control" id="nama" name="nama" placeholder="Masukan Nama Proyek">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-4 control-label">Alamat Proyek</label>
                <div class="col-md-8">
                    <input required type="text" class="form-control" id="alamat" name="alamat"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Waktu Pengerjaan</label>
                <div class="col-sm-8">
                    <div class="input-daterange input-group" >
                        <input type="date" class="form-control" name="tanggalpengerjaan" id="tanggalpengerjaan"/>
                        <span class="input-group-addon bg-custom b-0 text-white">sampai</span>
                        <input type="date" class="form-control" name="tanggalberakhir" id="tanggalberakhir" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jenjang" class="col-md-4 control-label">Tahapan </label>
                <div class="child-repeater-table table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Presentase</th>
                                <th>Tahapan</th>
                                <th><a href="javascript:void(0)" class="btn btn-default addRow2"><i class="fa fa-plus"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>

                                <td><input name="progres[]" id="progres[]" type="number" class="form-control col-lg-3" placeholder="%"> </td>
                                <td><input type="text" id="tahapan[]" name="tahapan[]" class="form-control" placeholder="Tahapan"></td>
                                <th><a href="javascript:void(0)" class="btn btn-danger deleteRow2"><i class="fa fa-minus"></i></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/proyek">Cancel</a>
            </div>

        </form>

    </div>
</div>
@endsection
