@extends('master.master')
@section('title','Tambah Detail Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Detail Kehadiran Pegawai')
@section('content')
<div class="row">
    <div class="col-md-6">

        <form class="form-horizontal" method="POST" action="{{url('/detailkehadiran/'.$detailkehadiran->idDetailKehadiran)}}" enctype="multipart/form-data">
            @csrf
            @method('   PATCH')
            <div class="form-group">
                <div class="col-md-9 hidden">
                    <select class="form-control" id="pegawai_id" name="pegawai_id" required>
                        @foreach ($pegawai as $pgw)
                        <option value="{{$pgw->idPegawai}}" @if ($pgw->idPegawai == $detailkehadiran->pegawai_id)
                            selected
                            @endif
                            >{{$pgw->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="buktipulang" class="col-md-3 control-label">Bukti Pulang</label>
                <div class="col-md-9">
                    <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" />
                    <input required onchange="loadFile(event)" type="file" class="filestyle" id="buktipulang" name="buktipulang"
                        data-iconname="fa fa-cloud-upload" id="output">
                </div>
            </div>
            <div class="form-group">
                <label for="ketpulang" class="col-md-3 control-label">Keterangan Pulang</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="ketpulang" name="ketpulang" placeholder="Masukan keterangan">
                </div>
            </div>



            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/detailkehadiran">Cancel</a>
            </div>

        </form>

    </div>
</div>
@endsection
