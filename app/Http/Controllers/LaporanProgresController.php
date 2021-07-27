<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;
use App\DetailProyek;
use App\Pegawai;
use Illuminate\Support\Facades\DB;

class LaporanProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = Proyek::all();
        $pegawai = Pegawai::all();
        $detailproyek = DetailProyek::all();
        return view('laporan.lapprogres', compact('detailproyek', 'proyek', 'pegawai'));
    }

    public function search(Request $request, $id)
    {
        $proyek = Proyek::find($id);
        $pegawai = Pegawai::all();
        $tanggalpengerjaan = $request->tanggalpengerjaan;
        $tanggalberakhir = $request->tanggalberakhir;

        // $detailproyek = DB::table('detailproyek')
        //     ->where('tanggal', '>=', $tanggalpengerjaan)
        //     ->where('tanggal', '<=', $tanggalberakhir)
        //     ->get();

        $detailproyek = DetailProyek::whereBetween('tanggal', [$tanggalpengerjaan, $tanggalberakhir])->get();

        return view('laporan.detailprogres', compact('detailproyek', 'proyek', 'pegawai'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tanggalpengerjaan = $request->tanggalpengerjaan;
        // $tanggalberhenti = $request->tanggalberhenti;

        // $detailproyek = DB::table('detailproyek')
        // ->where('tanggal', '>=', $tanggalpengerjaan)
        //     ->where('tanggal', '>=', $tanggalberhenti)
        //     ->get();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function progres($id)
    {
        $proyek = Proyek::find($id);
        $pegawai = Pegawai::all();
        $detailproyek = DetailProyek::all();

        return view('laporan.detailprogres', compact('detailproyek', 'proyek', 'pegawai'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
