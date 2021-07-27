@extends('master.master')
@section('title','Data Jabatan | CV Hasil Utama Konsultan')
@section('ket','Data Jabatan dapat dilihat pada tabel dibawah ini')
@section('content')

@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row">
    {{-- <div class="col-md-12">
        <a href="jabatan/create"
            class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Data Jabatan </span>
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Tambahkan Data Jabatan</button>
        </a>
    </div> --}}
    <div class="pull-right">
        <a data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-icon icon-left btn-default"></i>Tambahkan Data Jabatan</a>
    </div>
</div>


<div class="row">

    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>

                    <th data-field="jabatan">Jabatan</th>
                    <th data-field="jabatan">Pegawai</th>
                    <th data-field="gajiharian">Gaji Harian</th>
                    <th data-field="gajilembur">Gaji Lembur</th>
                    <th data-field="uangmakan">Uang Makan</th>
                    <th data-field="bonusproyek">Bonus Proyek</th>
                    <th data-field="hariraya">Hari Raya</th>
                    <th data-field="action">Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($jabatan as $jabatan)
                <tr>

                    <td>{{ $jabatan->jabatan }}</td>
                    <td>{{ count($jabatan->pegawai)  }} Pegawai </td>
                    <td>{{ $jabatan->gajiharian }}</td>
                    <td>{{ $jabatan->gajilembur }}</td>
                    <td>{{ $jabatan->uangmakan }}</td>
                    <td>{{ $jabatan->bonusproyek }}</td>
                    <td>{{ $jabatan->hariraya }}</td>
                    <td>
                        <a
                            class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-l-5"  data-target="#exampleModalCenteredit-{{ $jabatan->idJabatan }}" >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="pull-left m-l-5   ">
                          <button class="swall-confirm btn btn-danger btn-custom waves-effect waves-light center m-r-5">
                              <form action="{{ url('/jabatan/'.$jabatan->idJabatan) }}" id="{{ $jabatan->idJabatan }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <i class="fa fa-trash"></i>
                                </form>
                            </button>
                        </a>

                    </td>

                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambahkan Data Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="/jabatan" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="jabatan" class="col-md-3 control-label">Nama Jabatan</label>
                                <div class="col-md-9">
                                    <input required type="text" class="form-control" id="jabatan" name="jabatan"
                                        placeholder="Masukan Nama Jabatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gajiharian" class="col-md-3 control-label">Gaji Harian</label>
                                <div class="col-md-9">
                                    <input required type="number" class="form-control" id="gajiharian" name="gajiharian"
                                        placeholder="Masukan Gaji Harian">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gajilembur" class="col-md-3 control-label">Gaji Lembur</label>
                                <div class="col-md-9">
                                    <input required type="number" class="form-control" id="gajilembur" name="gajilembur"
                                        placeholder="Masukan Gaji Lembur">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uangmakan" class="col-md-3 control-label">Uang Makan</label>
                                <div class="col-md-9">
                                    <input required type="number" class="form-control" id="uangmakan" name="uangmakan"
                                        placeholder="Masukan Uang Makan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bonusproyek" class="col-md-3 control-label">Bonus Proyek</label>
                                <div class="col-md-9">
                                    <input required type="number" class="form-control" id="bonusproyek" name="bonusproyek"
                                        placeholder="Masukan Bonus Proyek">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hariraya" class="col-md-3 control-label">Hari Raya</label>
                                <div class="col-md-9">
                                    <input required type="number" class="form-control" id="hariraya" name="hariraya"
                                        placeholder="Masukan Tunjangan Hari Raya">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="potongantelat" class="col-md-3 control-label">Potongan Telat</label>
                                <div class="col-md-9">
                                    <input required type="number" class="form-control" id="potongantelat" name="potongantelat"
                                        placeholder="Masukan Tunjangan Hari Raya">
                                </div>
                            </div>
                            <div class="pull-right inline-remember-me">
                                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/jabatan">Cancel</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($jabatan as $jabatan)
<div class="modal fade" id="exampleModalCenteredit-{{ $jabatan->idJabatan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <form class="form-horizontal" method="POST" action="{{ url('jabatan/update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="pull-right inline-remember-me">
                                <button class="btn btn-primary btn-custom waves-effect waves-light"
                                    type="submit">Simpan</button>
                                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/jabatan">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach


@endsection
