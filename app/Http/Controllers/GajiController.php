<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Pegawai;
use App\Jabatan;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        $pegawai = Pegawai::all();

        return view('gaji.readgaji', compact('user', 'pegawai', 'jabatan'));
    }

    public function slip($id)
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        $gaji = Gaji::find($id);
        $pegawai = Pegawai::all();
        $tanggal = \Carbon\Carbon::now('Asia/Jakarta');

        $harikerja = DB::table('detailkehadiran')
        ->where('pegawai_id', '=', $gaji->pegawai->idPegawai)
        ->Where('keterangan', '=', 'Hadir')
        ->Where('bulan', '=', $gaji->bulan)
        ->count();

        $totalproyek = DB::table('proyek')
        ->where('pegawai_id', '=', $gaji->pegawai->idPegawai)
        ->Where('created_at', '=', $gaji->bulan)
        ->count();

        $totallembur = DB::table('detailkehadiran')
        ->where('pegawai_id', '=', $gaji->pegawai->idPegawai)
        ->Where('bulan', '=', $gaji->bulan)
        ->where('keterangan', '=', 'Lembur')
        ->count();

        $telat = DB::table('detailkehadiran')
        ->where('pegawai_id', '=', $gaji->pegawai->idPegawai)
        ->Where('bulan', '=', $gaji->bulan)
        ->where('ketepatanhadir', '=', 'Terlambat')
        ->count();

        $penghasilan = $gaji->totalgaji-$gaji->potongantelat;
        $totalgaji = $gaji->totalgaji;



        return view('gaji.slip', compact('totalgaji', 'penghasilan','harikerja', 'totalproyek','telat', 'totallembur', 'tanggal','user', 'gaji', 'pegawai', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('gaji.creategaji', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        Gaji::destroy($gaji->idGaji);
        return redirect()->back();
    }












}
