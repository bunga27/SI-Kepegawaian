@extends('master.master')
@section('title','Tambah Jabatan | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data Jabatan')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/jabatan" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="jabatan" class="col-md-3 control-label">Nama Jabatan</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Nama Jabatan">
                </div>
            </div>
            <div class="form-group">
                <label for="gajiharian" class="col-md-3 control-label">Gaji Harian</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="gajiharian" name="gajiharian" placeholder="Masukan Gaji Harian">
                </div>
            </div>
            <div class="form-group">
                <label for="gajilembur" class="col-md-3 control-label">Gaji Lembur</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="gajilembur" name="gajilembur" placeholder="Masukan Gaji Lembur">
                </div>
            </div>
            <div class="form-group">
                <label for="uangmakan" class="col-md-3 control-label">Uang Makan</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="uangmakan" name="uangmakan" placeholder="Masukan Uang Makan">
                </div>
            </div>
            <div class="form-group">
                <label for="bonusproyek" class="col-md-3 control-label">Bonus Proyek</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="bonusproyek" name="bonusproyek" placeholder="Masukan Bonus Proyek">
                </div>
            </div>
            <div class="form-group">
                <label for="hariraya" class="col-md-3 control-label">Hari Raya</label>
                <div class="col-md-9">
                    <input required type="number" class="form-control" id="hariraya" name="hariraya" placeholder="Masukan Tunjangan Hari Raya">
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/jabatan">Cancel</a>
            </div>

        </form>

    </div>
</div>
@endsection
