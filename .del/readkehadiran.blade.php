@extends('master.master')
@section('title','Data Kehadiran | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data untuk Tanggal Kehadiran Pegawai')
@section('content')
<div class="row">
    <div class="col-md-6 pull-left">
        <form class="form-horizontal" method="POST" action="/kehadiran" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggalkehadiran" class="col-md-4 control-label">Tanggal Kehadiran</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input required type="date" class="form-control" id="tanggalkehadiran" name="tanggalkehadiran"
                            placeholder="mm/dd/yyyy">
                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                    </div>
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
                    <th data-field="tanggalkehadiran">Tanggal Kehadiran</th>
                    <th data-field="action">Action</th>


                </tr>
            </thead>

            <tbody>
                @foreach ($kehadiran as $kehadiran)
                <tr>
                    <td>{{ $kehadiran->tanggalkehadiran }}</td>
                    <td>

                        <a href="{{ url('/kehadiran/'.$kehadiran->idKehadiran.'/detail') }}" class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-r-5">
                            <i class="fa fa-search"></i>
                            <span> Detail</span>
                        </a>


                        <a>
                            <form action="{{ url('/kehadiran/'.$kehadiran->idKehadiran) }}" method="post" class="center m-r-5">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-custom   waves-effect waves-light pull-left m-r-5"
                                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                    <i class="fa fa-trash"></i>
                                    <span> Hapus</span>
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
