@extends('master.master')
@section('title','Tambah Proyek | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data Proyek')
@section('content')
<div class="row">
    <div class="col-md-8">
        <form class="form-horizontal" method="POST" action="/proyek" enctype="multipart/form-data">
            @csrf

            <input hidden type="text" class="form-control" id="idProyek" name="idProyek">

            <div class="form-group">
                <label for="nama" class="col-md-4 control-label">Tahapan</label>
                <div class="col-md-8">
                    <input required type="text" class="form-control" id="nama" name="nama"
                        placeholder="Masukan Nama Proyek">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-4 control-label">Alamat Proyek</label>
                <div class="col-md-8">
                    <input required type="text" class="form-control" id="alamat" name="alamat"> </textarea>
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
