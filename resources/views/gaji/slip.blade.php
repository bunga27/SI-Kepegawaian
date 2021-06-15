@extends('master.master')
@section('title','Slip Gaji Pegawai')
@section('content')

<?php

	// FUNGSI TERBILANG OLEH : MALASNGODING.COM
	// WEBSITE : WWW.MALASNGODING.COM
	// AUTHOR : https://www.malasngoding.com/author/admin


	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Eampat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <img src="{{ asset('menu_2') }}/assets/images/build.png" width="100px">
                    </div>

                    <div class="center">
                        <h4 class="text-center">
                            <strong>SLIP GAJI PEGAWAI </strong>
                            <br>CV. HASIL UTAMA KONSULTAN
                            <br>Jl. Sendang 16b Kota Madiun | Kode Pos : 63116
                            <br>hasilutamamadiun@gmail.com
                        </h4>
                    </div>
                </div>

                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="left">
                            <h5 class="text-left">
                                <div class="card-box table-responsive">
                                    <table id="table" class="table table-striped">
                                        <thead>

                                            <tr>
                                                <td>
                                                    Nama<br>
                                                    Jabatan<br>
                                                    Periode<br>
                                                    Dicetak Pada
                                                </th>
                                                <td>
                                                     : {{ $gaji->pegawai->nama }}<br>
                                                     : {{ $gaji->pegawai->jabatan->jabatan }}<br>
                                                     : {{ $gaji->bulan }}<br>
                                                     : {{ $tanggal }}
                                                </td>
                                            </tr>

                                        </thead>
                                    </table>
                                </div>
                            </h5>
                        </div>
                        <div class="card-box table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th>Data Kehadiran</th>
                                        <th>Data Penghasilan

                                        </th>
                                        <th>Data Potongan</th>
                                    </tr>
                                </thead>

                                    <tr>
                                        <td>
                                            <table id="table">
                                                <tr>
                                                    <td>
                                                        Hari Kerja &emsp;<br>
                                                        Lembur&emsp;<br>
                                                        Bonus Proyek&emsp;<br>
                                                        Terlambat&emsp;
                                                        </th>
                                                    <td>
                                                         {{ $harikerja }} hari <br>
                                                         {{ $totallembur}} hari <br>
                                                         {{ $totalproyek}} proyek <br>
                                                         {{ $telat }} kali
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table id="table">
                                                <tr>
                                                    <td>
                                                        Gaji Bulan&emsp;<br>
                                                        Uang Makan&emsp;<br>
                                                        Gaji Lembur &emsp;<br>
                                                        Gaji THR &emsp;<br>
                                                        Bonus Proyek &emsp;<br>
                                                    </td>
                                                    <td>
                                                          Rp. {{ $gaji->gajibulan }} <br>
                                                          Rp. {{ $gaji->totaluangmakan }}<br>
                                                          Rp. {{ $gaji->totalgajilembur}}<br>
                                                          Rp. {{ $gaji->totalthr }}<br>
                                                          Rp. {{ $gaji->totalbonusproyek }}<br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table id="table">
                                                <tr>
                                                    <td>Terlambat &emsp; &emsp;</td>
                                                    <td> Rp.{{ $gaji->potongantelat }} </td>
                                                </tr>
                                            </table>
                                        </td>




                                    </tr>
                                    <tr>
                                        <td>  TOTAL </td>
                                        <td>  TOTAL PENGHASILAN  &emsp; Rp. {{ $gaji->potongantelat+$gaji->totalgaji }} </td>
                                        <td> TOTAL POTONGAN &emsp;  Rp. {{ $gaji->potongantelat }} </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <h5 class="text-left">
                        <strong>TOTAL GAJI &emsp;  Rp. {{ $gaji->totalgaji }} </strong> <br>
                        <strong>Terbilang &emsp;&emsp;&emsp;  <?php echo terbilang($totalgaji)?> Rupiah </strong>
                    </h4>
                </div>
                <hr>
                <div class="hidden-print">
                    <div class="pull-right">
                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i
                                class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
