<?php

namespace App\Http\Controllers;

use App\Alurproyek;
use App\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlurProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyek = Proyek::all();
        $alur = Alurproyek::where('idProyek', $id)->get();
        $proyeknya = Proyek::find($id);
        return view('proyek.readalur', compact('proyek','proyeknya','alur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $tahapan = $request->tahapan;
        $progres = $request->progres;
        $idProyek = $request->idProyek;

        for ($i = 0; $i < count($tahapan); $i++) {
            $datasave = [
                'idProyek'       => $idProyek,
                'tahapan'   => $tahapan[$i],
                'progres'    => $progres[$i],
            ];
            DB::table('alurproyek')->insert($datasave);
        }


        return redirect()->back()->with(['success' => 'Data Proyek Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alurproyek  $alurproyek
     * @return \Illuminate\Http\Response
     */
    public function show(Alurproyek $alurproyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alurproyek  $alurproyek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alurproyek=Alurproyek::find($id);
        return view('proyek.editalur', compact('alurproyek'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alurproyek  $alurproyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alurproyek $alurproyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alurproyek  $alurproyek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alurproyek::destroy($id);
        return redirect()->back()->with('success', 'Data Proyek berhasil dihapus');
    }
}
