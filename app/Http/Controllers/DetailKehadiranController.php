<?php

namespace App\Http\Controllers;

use App\DetailKehadiran;
use App\Kehadiran;
use App\Pegawai;
use Illuminate\Http\Request;

class DetailKehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        $kehadiran = Kehadiran::all();
        $detailkehadiran = DetailKehadiran::all();
        return view('sistem.kehadiran.detailkehadiran', compact ('kehadiran','pegawai','detailkehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $kehadiran = Kehadiran::all();
        $detailkehadiran = DetailKehadiran::all();
        return view('sistem.kehadiran.createdetailkehadiran', compact('pegawai', 'detailkehadiran', 'kehadiran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailKehadiran::create([
            'kehadiran_id'=>$request->idKehadiran,
            'pegawai_id'=>$request->idPegawai,
            'ketkehadiran'=>$request->ketkehadiran,
            'keterangan' => $request->keterangan,

        ]);
        return redirect('/detailkehadiran')->with(['success' => 'Data Kehadiran Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(DetailKehadiran $detailKehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailKehadiran $detailKehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailKehadiran $detailKehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailKehadiran::destroy($id);
        return redirect('/detailkehadiran')->with('status', 'berhasil dihapus');
    }
}
