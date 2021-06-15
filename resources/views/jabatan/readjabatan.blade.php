@extends('master.master')
@section('title','Lihat Jabatan | CV Hasil Utama Konsultan')
@section('ket','Data Jabatan dapat dilihat pada tabel dibawah ini')
@section('content')

@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row">
    <div class="col-md-12">
        <a href="jabatan/create"
            class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Data Jabatan </span>
        </a>
    </div>
</div>
<div class="row">

    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>

                    <th data-field="jabatan">Jabatan</th>
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
                    <td>{{ $jabatan->gajiharian }}</td>
                    <td>{{ $jabatan->gajilembur }}</td>
                    <td>{{ $jabatan->uangmakan }}</td>
                    <td>{{ $jabatan->bonusproyek }}</td>
                    <td>{{ $jabatan->hariraya }}</td>
                    <td><a>
                            <form action="{{ url('/jabatan/'.$jabatan->idJabatan) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-custom waves-effect waves-light pull-right m-r-5"
                                    onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                    <i class="fa fa-trash"></i>
                                    {{-- <span> Hapus</span> --}}
                                </button>
                            </form>
                        </a>

                        <a href="{{ url('/jabatan/'.$jabatan->idJabatan.'/edit') }}"
                            class="btn btn-primary btn-custom waves-effect waves-light pull-right m-r-5">
                            <i class="fa fa-pencil"></i>
                            {{-- <span> Ubah</span> --}}
                        </a></td>

                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
</div>

@endsection
