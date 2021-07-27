@extends('master.master')
@section('title','Ubah Data alur | CV Hasil Utama Konsultan')
@section('ket','Ubah data alur yang telah dipilih sebelumnya')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="/alurproyek/{{ $alurproyek->idAlurProyek }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="progres" class="col-md-3 control-label">Progres</label>
                <div class="col-md-9">
                    <input required value="{{ $alurproyek->progres}}" type="text" class="form-control" id="progres" name="progres">
                </div>
            </div>
            <div class="form-group">
                <label for="tahapan" class="col-md-3 control-label">Tahaapan</label>
                <div class="col-md-9">
                    <input required value="{{ $alurproyek->tahapan}}" type="text" class="form-control" id="tahapan" name="tahapan">
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
