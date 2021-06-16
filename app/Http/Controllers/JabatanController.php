<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Pegawai;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        $pegawai = Pegawai::all();
        return view('jabatan.readjabatan', compact('jabatan','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('jabatan.createjabatan', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jabatan::create([
            'jabatan' => $request->jabatan,
            'gajiharian' => $request->gajiharian,
            'gajilembur' => $request->gajilembur,
            'uangmakan' => $request->uangmakan,
            'bonusproyek' => $request->bonusproyek,
            'hariraya' => $request->hariraya,
            'potongantelat' => $request->potongantelat,
        ]);

        return redirect('/jabatan')->with(['success' => 'Data Jabatan Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $jabatan = Jabatan::find($id);
        return view('jabatan.editjabatan', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jabatan::where('idJabatan', $id)->update([
            'jabatan' => $request->jabatan,
            'gajiharian' => $request->gajiharian,
            'gajilembur' => $request->gajilembur,
            'uangmakan' => $request->uangmakan,
            'bonusproyek' => $request->bonusproyek,
            'hariraya' => $request->hariraya,
            'potongantelat' => $request->potongantelat,

        ]);
        return redirect('/jabatan')->with(['success' => 'Data Jabatan Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        Jabatan::destroy($jabatan->idJabatan);
        return redirect('/jabatan')->with('status', 'Data Jabatan berhasil dihapus');
    }
}
