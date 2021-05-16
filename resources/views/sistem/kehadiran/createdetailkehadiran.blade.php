@extends('master.master')
@section('title','Tambah Detail Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Detail Kehadiran Pegawai')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/detailkehadiran" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggalkehadiran" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Tanggal Kehadiran --" id="idKehadiran" name="idKehadiran" required>
                        @foreach ($kehadiran as $hdr)
                        <option value="{{$hdr->idKehadiran}}">{{$hdr->tanggalkehadiran}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama Pegawai</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Nama Pegawai --" id="idPegawai" name="idPegawai"
                        required>
                        @foreach ($pegawai as $pgw)
                        <option value="{{$pgw->idPegawai}}">{{$pgw->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="ketkehadiran" class="col-md-3 control-label">Kehadiran</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="ketkehadiran" type="text" class="form-control custom-select-value" name="ketkehadiran">
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan keterangan">
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
