@extends('master.master')
@section('title','Tambah Pembiayaan Proyek | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data Pembiayaan Proyek')
@section('content')
<div class="row center">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/pembiayaan" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama" class="col-md-4 control-label">Nama Proyek</label>
                <div class="col-md-8">
                    <select class="form-control" placeholder="-- Pilih Nama Proyek --" id="proyek_id" name="proyek_id"
                        required>
                        @foreach ($proyek as $pry)
                        <option value="{{$pry->idProyek}}">{{$pry->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal" class="col-md-4 control-label">Tanggal Pembiayaan</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jenispekerjaan" class="col-md-4 control-label">Jenis Pekerjaan</label>
                <div class="col-md-8">
                    <div class="form-select-list">
                        <select id="jenispekerjaan" type="text" class="form-control custom-select-value" name="jenispekerjaan">
                            <option value="Pekerjaan Persiapan">Pekerjaan Persiapan</option>
                            <option value="Pekerjaan Struktur">Pekerjaan Struktur</option>
                            <option value="Pekerjaan Arsitektur">Pekerjaan Arsitektur</option>
                            <option value="Pekerjaan Mekanikal">Pekerjaan Mekanikal</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="uraianpekerjaan" class="col-md-4 control-label">Uraian Pekerjaan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="uraianpekerjaan" name="uraianpekerjaan">
                </div>
            </div>

            <div class="form-group">
                <label for="vol" class="col-md-4 control-label">Volume</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="vol" name="vol"
                        placeholder="Masukan vol">
                </div>
            </div>
            <div class="form-group">
                <label for="hargasatuan" class="col-md-4 control-label">Harga Satuan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="hargasatuan" name="hargasatuan" placeholder="Masukan Harga Satuan">
                </div>
            </div>
            <div class="form-group">
                <label for="hargatotal" class="col-md-4 control-label">Harga Total</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="hargatotal" name="hargatotal" placeholder="Masukan Harga Satuan">
                </div>
            </div>
            <div class="form-group">
                <label for="nota" class="col-md-4 control-label">Nota</label>
                <div class="col-md-8">
                    <img class="col-form-label text-md-right col-12 col-md-4 col-lg-3" id="output" width="100px" />
                    <input onchange="loadFile(event)" type="file" class="filestyle" id="nota" name="nota"
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
