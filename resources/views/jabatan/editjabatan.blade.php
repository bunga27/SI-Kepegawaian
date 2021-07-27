{{-- @extends('master.master')
@section('title','Ubah Data Jabatan | CV Hasil Utama Konsultan')
@section('ket','Ubah data Jabatan yang telah dipilih sebelumnya')
@section('content') --}}
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="/jabatan/{{ $jabatan->idJabatan }}"enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="form-group">
                    <label for="jabatan" class="col-md-3 control-label">Nama Jabatan</label>
                    <div class="col-md-9">
                        <input required type="text" class="form-control" id="jabatan" name="jabatan"  value="{{ $jabatan->jabatan}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gajiharian" class="col-md-3 control-label">Gaji Harian</label>
                    <div class="col-md-9">
                        <input required type="number" class="form-control" id="gajiharian" name="gajiharian"
                            value="{{ $jabatan->gajiharian}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gajilembur" class="col-md-3 control-label">Gaji Lembur</label>
                    <div class="col-md-9">
                        <input required type="number" class="form-control" id="gajilembur" name="gajilembur"
                            value="{{ $jabatan->gajilembur}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uangmakan" class="col-md-3 control-label">Uang Makan</label>
                    <div class="col-md-9">
                        <input required type="number" class="form-control" id="uangmakan" name="uangmakan"
                            value="{{ $jabatan->uangmakan}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bonusproyek" class="col-md-3 control-label">Bonus Proyek</label>
                    <div class="col-md-9">
                        <input required type="number" class="form-control" id="bonusproyek" name="bonusproyek"
                            value="{{ $jabatan->bonusproyek}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="hariraya" class="col-md-3 control-label">Hari Raya</label>
                    <div class="col-md-9">
                        <input required type="number" class="form-control" id="hariraya" name="hariraya"
                            value="{{ $jabatan->hariraya}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="potongantelat" class="col-md-3 control-label">Potongan Telat</label>
                    <div class="col-md-9">
                        <input required type="number" class="form-control" id="potongantelat" name="potongantelat"
                            placeholder="Masukan Tunjangan Hari Raya" value="{{ $jabatan->potongantelat}}">
                    </div>
                </div>
                <div class="pull-right inline-remember-me">
                    <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                    <a class="btn btn-danger btn-custom waves-effect waves-light" href="/jabatan">Cancel</a>
                </div>

        </form>

    </div>
</div>

{{-- @endsection --}}
