@extends('master.master')
@section('title','Lihat Proyek | CV Hasil Utama Konsultan')
@section('ket','Data Proyek dapat dilihat  dibawah ini')
@section('content')

<div class="row">

    <div class="pull-right">

        <a href="{{ url('/detailproyek') }}"
            class="btn btn-primary btn-custom  waves-effect waves-light pull-left m-r-5">
            <i class="fa fa-search"></i>
            <span> Lihat Detail Progres Proyek</span>
        </a>

    </div>




</div>


<div class="row">
    <div class="card-box table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>

                <tr>
                    <th data-field="id">ID</th>
                    <th data-field="action">Action</th>
                    <th data-field="client">Client</th>
                    <th data-field="nama">Nama Proyek</th>
                    <th data-field="pasfoto">Pas Foto</th>
                    <th data-field="alamat">Alamat</th>
                    <th data-field="tanggalpengerjaan">Tanggal Pengerjaan</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($proyek as $proyek)
                <tr>
                    <td></td>
                    <td>


                        <a href="/proyek/{{ $proyek->idProyek }}/edit" class="btn btn-info waves-effect waves-light">
                            <i class="fa fa-wrench m-r-5"></i>
                            <span>Ubah</span>
                        </a>

                        <form action="/proyek/{{ $proyek->idProyek }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Yakin akan menghapus?')"
                                class="btn btn-danger waves-effect waves-light">
                                <i class="fa fa-trash"></i>
                                <span>Hapus </span>

                            </button>
                        </form>
                    </td>
                    <td>{{ $proyek->client }}</td>
                    <td>{{ $proyek->nama }}</td>
                    <td><img src="{{ asset($proyek->pasfoto) }}" width="100"> </td>
                    <td>{{ $proyek->alamat }}</td>
                    <td>{{ $proyek->tanggalpengerjaan }}</td>


                </tr>

                @endforeach


            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>
@endsection
