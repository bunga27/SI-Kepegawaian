@extends('master.master')
@section('title','Laporan Progres Proyek')
@section('ket','CV. Hasil Utama Konsultan')
@section('content')

<div class="row">
    <div class="card-box table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-field="proyek">Proyek</th>
                    <th data-field="pj">Penanggung Jawab</th>
                    <th data-field="client">Client</th>
                    <th data-field="alamat">Alamat</th>
                    <th data-field="tglpengerjaan">Tanggal Pengerjaan</th>
                    <th data-field="action">Detail Laporan</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($proyek as $pry)
                <tr>

                    <td>{{ $pry->nama }}</td>
                    <td>{{ $pry->pegawai->nama }}</td>
                    <td>{{ $pry->client }}</td>
                    <td>{{ $pry->alamat }}</td>
                    <td>{{ $pry->tanggalpengerjaan }}</td>
                    <td>

                        <a href="{{ url('/lapprogres/'.$pry->idProyek.'/progres') }}"
                            class="btn btn-default btn-custom waves-effect waves-light pull-left m-r-5">
                            <i class="fa fa-book">
                            </i>
                            <span>Lihat</span>
                        </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>

@endsection
