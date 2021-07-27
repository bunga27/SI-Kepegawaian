<?php

namespace App\Http\Controllers;

use App\DetailProyek;
use App\Proyek;
use App\Pegawai;
use App\Pembiayaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
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
        return view('proyek.readproyek', compact('proyek','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::table('pegawai')->where('statuskerja', '=', 'tidakaktif')->get();
        return view('proyek.createproyek', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bulan = date('mY', strtotime($request->tanggalpengerjaan));
        $proyek = new Proyek([
            'client' => $request->client,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'bulan' => $bulan,
            'tanggalpengerjaan' => $request->tanggalpengerjaan,
            'tanggalberakhir' => $request->tanggalberakhir,

        ]);
        $proyek->save();


        $tahapan = $request->tahapan;
        $progres = $request->progres;

        for ($i=0; $i<count($tahapan); $i++){
            $datasave = [
                'idProyek'       => $proyek->idProyek,
                'tahapan'   => $tahapan[$i],
                'progres'    => $progres[$i],
            ];
            DB::table('alurproyek')->insert($datasave);
        }

        return redirect('/proyek')->with(['success' => 'Data Proyek Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = Proyek::find($id);
        $pembiayaan = Pembiayaan::all();
        return view('sistem.proyek.detailpembiayaan', compact('proyek', 'pembiayaan'));
    }

    public function progres($id)
    {
        $proyek = Proyek::find($id);
        $detailproyek = DetailProyek::all();
        return view('sistem.proyek.detailproyek', compact('proyek', 'detailproyek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = Proyek::find($id);
        $pegawai = DB::table('pegawai')->where('statuskerja', '=', 'tidakaktif')->get();
        return view('proyek.editproyek', compact('proyek','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bulan = date('mY', strtotime($request->tanggalpengerjaan));
        Proyek::where('idProyek', $id)->update([
            'client' => $request->client,
            'pegawai_id' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggalpengerjaan' => $request->tanggalpengerjaan,
            'tanggalberakhir' => $request->tanggalberakhir,
            'bulan' => $bulan
        ]);

        return redirect('/proyek')->with(['success' => 'Data Proyek Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyek $proyek)
    {
        Proyek::destroy($proyek->idProyek);
        return redirect('/proyek')->with('success', 'Data Proyek berhasil dihapus');
    }
}
