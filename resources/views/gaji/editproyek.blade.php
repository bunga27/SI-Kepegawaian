@extends('master.master')
@section('title','Ubah Data Proyek | CV Hasil Utama Konsultan')
@section('ket','Ubah data proyek yang telah dipilih sebelumnya')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/proyek/{{ $proyek->idProyek }}"enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="client" class="col-md-3 control-label">Client</label>
                <div class="col-md-9">
                   <input required value="{{ $proyek->client}}" type="text" class="form-control" id="client" name="client" placeholder="Masukan Nama Client">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama Pegawai</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Nama Pegawai --" id="nik" name="nik" required>
                        @foreach ($pegawai as $pgw)
                        <option value="{{$pgw->nik}}" @if ($pgw->nik == $proyek->pegawai_id)
                            selected
                            @endif
                            >{{$pgw->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama Proyek</label>
                <div class="col-md-9">
                   <input required value="{{ $proyek->nama}}" type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Proyek">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-3 control-label">Alamat</label>
                <div class="col-md-9">
                   <input required value="{{ $proyek->alamat}}" type="text" class="form-control" id="alamat" name="alamat"> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggalpengerjaan" class="col-md-3 control-label">Tanggal Pengerjaan</label>
                <div class="col-md-9">
                    <div class="input-group">
                       <input required value="{{ $proyek->tanggalpengerjaan}}" type="date" class="form-control" id="tanggalpengerjaan" name="tanggalpengerjaan"
                            placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
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
