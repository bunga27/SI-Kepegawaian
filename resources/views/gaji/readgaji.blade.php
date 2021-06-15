@extends('master.master')
@section('title','Lihat Penggajian| CV Hasil Utama Konsultan')
@section('ket','Data Penggajian dapat dilihat pada tabel dibawah ini')
@section('content')
@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row">

    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>
                    <th data-field="nama">Nama Pegawai</th>
                    <th data-field="jabatan">Jabatan</th>
                    <th data-field="action">Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($pegawai as $pg)
                <tr>

                    <td>{{ $pg->nama }}</td>
                    <td>{{ $pg->jabatan->jabatan }}</td>
                    <td>
                        <a href="{{ url('/pegawai/'.$pg->idPegawai.'/addgaji') }}"
                            class="btn btn-primary btn-custom waves-effect waves-light m-r-5">
                            <i class="fa fa-plus"></i>
                            <span> Tambah Gaji </span>
                        </a>

                        {{-- <a href="{{ url('/pegawai/'.$pg->idPegawai.'/readdetailgaji') }}"
                            class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
                            <i class="fa fa-eyes"></i>
                            <span> Lihat Gaji</span>
                        </a> --}}


                    </td>

                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
</div>
{{-- <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Responsive Modal</button>


<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal Content is Responsive</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label">Name</label>
                    <input type="text" class="form-control" id="field-1" placeholder="John">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label">Surname</label>
                    <input type="text" class="form-control" id="field-2" placeholder="Doe">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label">Address</label>
                    <input type="text" class="form-control" id="field-3" placeholder="Address">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-4" class="control-label">City</label>
                    <input type="text" class="form-control" id="field-4" placeholder="Boston">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-5" class="control-label">Country</label>
                    <input type="text" class="form-control" id="field-5" placeholder="United States">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-6" class="control-label">Zip</label>
                    <input type="text" class="form-control" id="field-6" placeholder="123456">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group no-margin">
                    <label for="field-7" class="control-label">Personal Info</label>
                    <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself"
                        style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
    </div>
</div> --}}

@endsection
