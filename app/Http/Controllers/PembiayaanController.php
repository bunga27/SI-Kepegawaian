<?php

namespace App\Http\Controllers;

use App\Pembiayaan;
use App\Proyek;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = Proyek::all();
        $pembiayaan = Pembiayaan::all();
        return view('sistem.pembiayaan.readpembiayaan', compact('proyek', 'pembiayaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $proyek = Proyek::all();
        $pembiayaan = Pembiayaan::all();
        return view('sistem.pembiayaan.createpembiayaan', compact('proyek', 'pembiayaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required|image:jpg,png',
        ]);

        $data = $request->except(['nota']);

        $extension = $request->nota->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        $request->nota->storeAs('public/nota', $filename);
        $data['nota'] = asset("/storage/nota/{$filename}");

        Pembiayaan::create($data);
        return redirect('/pembiayaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    // public function show(Pembiayaan $pembiayaan, $id)
    // {
    //     $proyek = Proyek::all();
    //     $pembiayaan = Pembiayaan::all();
    //     return view('sistem.pembiayaan.readpembiayaan', compact('proyek', 'pembiayaan'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembiayaan $pembiayaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembiayaan $pembiayaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembiayaan::destroy($id);
        return redirect('/pembiayaan')->with('status', 'Data berhasil dihapus');
    }
}
