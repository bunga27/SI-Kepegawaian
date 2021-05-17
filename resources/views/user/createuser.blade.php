@extends('master.master')
@section('title','Tambah User | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data User')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/user" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama" class="col-md-3 control-label">Nama Pegawai</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Nama Pegawai --" id="idPegawai" name="idPegawai" required>

                        @foreach ($pegawai as $pgw)
                        <option value="{{$pgw->idPegawai}}">{{$pgw->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="level" class="col-md-3 control-label">Level</label>
                <div class="col-md-9">
                    <div class="form-select-list">
                        <select id="level" type="text" class="form-control custom-select-value" name="level">
                            <option value="super">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="owner">Pemilik</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-3 control-label">E-Mail</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan E-Mail">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/user">Cancel</a>
            </div>

        </form>

    </div>
</div>
@endsection
