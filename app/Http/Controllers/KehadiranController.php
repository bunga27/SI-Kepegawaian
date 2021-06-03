<?php

namespace App\Http\Controllers;

use App\Kehadiran;
use App\DetailKehadiran;
use App\Pegawai;
use Illuminate\Http\Request;

class KehadiranController extends Controller
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
        return view('sistem.kehadiran.readkehadiran', compact('pegawai','kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail($id)
    {
        $kehadiran = Kehadiran::find($id);
        $detailkehadiran = DetailKehadiran::all();
        return view('sistem.kehadiran.detailkehadiran', compact('kehadiran', 'detailkehadiran'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kehadiran::create([
            'tanggalkehadiran' => $request->tanggalkehadiran,
        ]);
        return redirect('/kehadiran')->with(['success' => 'Data User Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kehadiran $kehadiran)
    {
        $pegawai = Pegawai::all();
        $detailkehadiran = DetailKehadiran::all();
        $kehadiran = Kehadiran::all();
        return view('sistem.kehadiran.detailkehadiran', compact('detailkehadiran','kehadiran','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kehadiran::destroy($id);
        return redirect('/kehadiran')->with(['success' => 'Data User Berhasil Dihapus!']);
    }
}
