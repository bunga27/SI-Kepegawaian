@extends('master.master')
@section('title','Gaji Pegawai | CV Hasil Utama Konsultan')
@section('ket','Tambahkan Data Gaji')
@section('content')
@if (auth()->user()->level=="admin" || auth()->user()->level=="super" || auth()->user()->level=="owner")
<div class="row">
    <div class="col-md-6 m-l-15 pull-right">
        <form class="form-horizontal" method="POST" action="/storegaji" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label hidden for="nama" class="col-md-3 control-label">Nama Pegawai</label>
                <div hidden class="col-md-9">
                    <select hidden class="form-control" placeholder="-- Pilih Nama Pegawai --" id="nik" name="nik" required>
                        <option value="{{$pegawai->nik}}">{{$pegawai->nama}}</option>
                    </select>
                </div>
            </div>

            <div hidden class="col-md-9">
                <input required type="text" class="form-control" id="gajiharian" name="gajiharian" value={{ $pegawai->jabatan->gajiharian }}>
            </div>
            <div hidden class="col-md-9">
                <input required type="text" class="form-control" id="uangmakan" name="uangmakan"
                    value={{ $pegawai->jabatan->uangmakan }}>
            </div>
            <div hidden class="col-md-9">
                <input required type="text" class="form-control" id="gajilembur" name="gajilembur"
                    value={{ $pegawai->jabatan->gajilembur }}>
            </div>
            <div hidden class="col-md-9">
                <input required type="text" class="form-control" id="bonusproyek" name="bonusproyek"
                    value={{ $pegawai->jabatan->bonusproyek }}>
            </div>
            <div hidden class="col-md-9">
                <input required type="text" class="form-control" id="hariraya" name="hariraya"
                    value={{ $pegawai->jabatan->hariraya }}>
            </div>
            <div hidden class="col-md-9">
                <input required type="text" class="form-control" id="potongantelat" name="potongantelat"
                    value={{ $pegawai->jabatan->potongantelat }}>
            </div>




           <div class="form-group">
            <label for="tanggal" class="col-md-5 control-label">Tanggal Penggajian</label>
            <div class="col-md-7">
                <div class="input-group">
                    <input required type="date" class="form-control" id="tanggal" name="tanggal"
                        placeholder="mm/dd/yyyy">
                    <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                </div>
            </div>
        </div>

            <div class="pull-right inline-remember-me m-b-5">
                <button class="btn btn-default btn-custom waves-effect waves-light" type="submit">Tambahkan</button>
            </div>

        </form>
    </div>
</div>

<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>

                <th data-field="bulan">Bulan</th>
                <th data-field="gajibulan">Gaji Bulanan</th>
                <th data-field="uangmakan">Uang Makan</th>
                <th data-field="gajilembur">Gaji Lembur</th>
                <th data-field="bonusproyek">Bonus Proyek</th>
                <th data-field="thr">THR</th>
                <th data-field="potongan">Potongan Telat</th>
                <th data-field="total">TOTAL GAJI</th>
                <th data-field="action">Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($pegawai->gaji as $g)
            <tr>

                <td>{{ $g->bulan }}</td>
                <td>{{ $g->gajibulan }}</td>
                <td>{{ $g->totaluangmakan }}</td>
                <td>{{ $g->totalgajilembur }}</td>
                <td>{{ $g->totalbonusproyek }}</td>
                <td>{{ $g->totalthr }}</td>
                <td>{{ $g->potongantelat}}</td>
                <td>{{ $g->totalgaji }}</td>
                <td>
                    <a class="pull-left m-l-5   ">
                        <form action="{{  url('/gaji/'.$g->idGaji)  }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-custom   waves-effect waves-light "
                                onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </a>
                    <a href="/gaji/{{ $g->idGaji }}/slip"
                        class="btn btn-default btn-custom  waves-effect waves-light pull-left m-l-5">
                        <i class="fa fa-file"></i> Slip




                </td>

            </tr>

            @endforeach


        </tbody>
    </table>
</div>

@else
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>

                <th data-field="bulan">Bulan</th>
                <th data-field="gajibulan">Gaji Bulanan</th>
                <th data-field="uangmakan">Uang Makan</th>
                <th data-field="gajilembur">Gaji Lembur</th>
                <th data-field="bonusproyek">Bonus Proyek</th>
                <th data-field="thr">THR</th>
                <th data-field="potongan">Potongan Telat</th>
                <th data-field="total">TOTAL GAJI</th>
                <th data-field="action">Slip</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($pegawai->gaji as $g)
            <tr>

                <td>{{ $g->bulan }}</td>
                <td>{{ $g->gajibulan }}</td>
                <td>{{ $g->totaluangmakan }}</td>
                <td>{{ $g->totalgajilembur }}</td>
                <td>{{ $g->totalbonusproyek }}</td>
                <td>{{ $g->totalthr }}</td>
                <td>{{ $g->potongantelat}}</td>
                <td>{{ $g->totalgaji }}</td>
                <td>
                    <a href="/gaji/{{ $g->idGaji }}/slip"
                        class="btn btn-default btn-custom waves-effect waves-light m-r-5">
                        <i class="fa fa-file m-r-5"></i>
                        <span>Slip</span>
                    </a>

                </td>

            </tr>

            @endforeach


        </tbody>
    </table>
</div>
@endif

@endsection
