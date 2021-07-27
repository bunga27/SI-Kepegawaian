@extends('master.master')
@section('title','Data Alur Proyek | CV Hasil Utama Konsultan')
@section('ket','Data Proyek dapat dilihat pada tabel dibawah ini')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- <div class="row">
    <div class="col-md-12">
        <span>Tahapan Alur Proyek {{ $proyeknya->nama }}</span>
        <a href="alurproyek/create"
            class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Alur</span>
        </a>
    </div>
</div> --}}
<div class="row">
    <div class="col-md-6 pull-right">
        <form class="form-horizontal" method="POST" action="/alur" enctype="multipart/form-data">
            @csrf
            <div hidden class="form-group">
                <div hidden class="col-md-8">
                    <input hidden type="text" class="form-control" id="idProyek" name="idProyek" value="{{ $proyeknya->idProyek }}"> </textarea>
                </div>
            </div>
            <div class="form-group">

                <div class="child-repeater-table table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Presentase</th>
                                <th>Tahapan</th>
                                <th><a href="javascript:void(0)" class="btn btn-default addRow2"><i
                                            class="fa fa-plus"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>

                                <td><input name="progres[]" id="progres[]" type="number" class="form-control col-lg-3"
                                        placeholder="%"> </td>
                                <td><input type="text" id="tahapan[]" name="tahapan[]" class="form-control"
                                        placeholder="Tahapan">
                                </td>
                                <th><a href="javascript:void(0)" class="btn btn-danger deleteRow2"><i
                                            class="fa fa-minus"></i></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pull-right inline-remember-me">
                <button class="btn btn-default btn-custom waves-effect waves-light" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="row">

    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>

                    <th data-field="presentase">Presentase</th>
                    <th data-field="alamat">Tahapan</th>
                    <th data-field="aksi">Aksi</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($alur as $alur)
                <tr>

                    <td>{{ $alur->progres }}</td>
                    <td>{{ $alur->tahapan }}</td>

                    <td>
                        <a href="{{ url('/alur/'.$alur->idAlurProyek.'/edit') }}"
                            class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-l-5">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="pull-left m-l-5 ">
                            <form action="{{ url('/alur/'.$alur->idAlurProyek) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-custom   waves-effect waves-light "
                                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
