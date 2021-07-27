@extends('master.master')
@section('title','Ubah Data Progres | CV Hasil Utama Konsultan')
@section('ket','Ubah Data Progres')
@section('content')
<div class="row">
    <div class="col-md-6">
        <label>Progres Proyek {{ $detailproyek->proyek->nama }}</label> <br>
        <input hidden id="nama" name="nama" value="{{ $detailproyek->proyek->nama }}">
        <input hidden id="proyek_id" name="proyek_id" value="{{ $detailproyek->proyek->idProyek }}">
        <form class="form-horizontal" method="POST" action="/detailproyek/{{ $detailproyek->idDetailProyek }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <br>
            <div class="form-group">
                <label for="tanggal" class="col-md-3 pull-left">Tanggal</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input required type="date" class="form-control" id="tanggal" name="tanggal"
                             value="{{ $detailproyek->tanggal }}">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-md-3 pull-left">Tahapan</label>
                <div class="col-md-9">
                    <select class="form-control" placeholder="-- Pilih Tahap --" id="idAlurProyek" name="idAlurProyek" required>

                        @foreach ($alurproyek as $alur)
                        <option value="{{$alur->idAlurProyek}}">{{$alur->progres}}% - {{ $alur->tahapan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan" class="col-md-3 pull-left">Keterangan</label>
                <div class="col-md-9">
                    <input required type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $detailproyek->keterangan }}"" placeholder="Masukan keterangan">
                </div>
            </div>
            <div class="form-group">
                <label for="gambar" class="col-md-3 pull-left">Foto Utama</label>
                <div class="col-md-9">
                    <img class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="output" width="100px" src="{{ asset($detailproyek->gambar) }}" />
                    <input onchange="loadFile(event)" type="file" class="filestyle" id="gambar" name="gambar" value="{{ $detailproyek->gambar }} data-iconname="fa fa-cloud-upload" id="output">
                </div>
            </div>

            <div class="pull-right inline-remember-me">
                @if (auth()->user()->level=="karyawan")
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/home">Cancel</a>

                @else
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/proyek">Cancel</a>
                @endif
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
            </div>

        </form>

    </div>
    <div class="col-md-6">
        <label class="col-md-3 pull-left pull-left">Progres Detail</label>
        <br><br>

        <form class="form-horizontal" method="POST" action="/gambarprogres" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <div class="col-md-10">
                        <input required type="file" class="filestyle" id="gambar2" name="gambar2[]" data-iconname="fa fa-cloud-upload"
                            multiple>
                    </div>
                    <input hidden id="detailproyek_id" name="detailproyek_id" value={{ $detailproyek->idDetailProyek }}>
                    <div class="col-md-2">
                    <button class="btn btn-default fa fa-plus waves-light" type="submit"></button>
                    </div>
                </div>
        </form>
        <table class="table table-striped m-0">
            <tbody>
                @foreach($gambarprogres as $gambarprogres)
                <tr>
                    <td>
                        <img class="col-form-label col-12 col-md-3 col-lg-3" src="{{ asset($gambarprogres->gambar2) }}" width="100px"/>
                        <form action="{{ url('/gambarprogres/'.$gambarprogres->idGambarprogres) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-custom waves-effect waves-light m-r-5" onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                            <i class="fa fa-trash"></i><span> Hapus</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
