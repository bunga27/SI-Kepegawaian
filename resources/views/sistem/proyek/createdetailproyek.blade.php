@extends('master.master')
@section('title','Tambah Data Progres | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data Progres')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/detailproyek" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama Proyek</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Nama Proyek --" id="proyek_id" name="proyek_id"
                        required>
                        @foreach ($proyek as $pry)
                        <option value="{{$pry->idProyek}}">{{$pry->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal" class="col-md-3 control-label">Tanggal Progres</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="progres" class="col-md-3 control-label">Progres</label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="progres" name="progres"> %
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                        placeholder="Masukan keterangan">
                </div>
            </div>
            <div class="form-group">
                <label for="gambar" class="col-md-3 control-label">Gambar</label>
                <div class="col-md-9">
                    <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" />
                    <input onchange="loadFile(event)" type="file" class="filestyle" id="gambar" name="gambar"
                        data-iconname="fa fa-cloud-upload" id="output">
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
