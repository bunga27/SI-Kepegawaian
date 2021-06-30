<?php

namespace App\Http\Controllers;

use App\DetailProyek;
use App\Gambarprogres;
use App\Proyek;
use App\Pegawai;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class DetailProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $proyek = Proyek::all();
        $detailproyek = DetailProyek::all();
        if (Auth::user()->level == "karyawan") {
            $pegawai = auth()->user()->pegawai;
        } else {
            $pegawai = Pegawai::all();
        }
        return view('sistem.proyek.detailproyek', compact('proyek', 'detailproyek','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proyek = Proyek::find($id);
        return view('sistem.proyek.createdetailproyek', compact('proyek'));
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
            'gambar' => 'required|image:jpg,png',
        ]);

        $data = $request->except(['gambar','proyek_id']);

        $extension = $request->gambar->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        $request->gambar->storeAs('public/progresproyek', $filename);
        $data['gambar'] = asset("/storage/progresproyek/{$filename}");
        $data['proyek_id'] = $request->proyek_id;
        $detailproyek = new DetailProyek([
            'proyek_id'=>$data['proyek_id'],
            'tanggal'=>$request->tanggal,
            'progres'=>$request->progres,
            'keterangan'=>$request->keterangan,
            'gambar'=>$data['gambar']
        ]);
        $detailproyek->save();

        if($request->hasFile('gambar2')){
             $files=$request->file('gambar2');
             foreach($files as $file){
                $extension = $file->extension();
                $filename = Uuid::uuid4() . ".{$extension}";
                $request->gambar->storeAs('public/progresproyek', $filename);
                $datas['gambar2'] = asset("/storage/progresproyek/{$filename}");

                $gambarprogres = new Gambarprogres([
                    'detailproyek_id' => $detailproyek->idDetailProyek,
                    'gambar2' => $datas['gambar2']
                ]);
                $gambarprogres->save();
             }
        }
        return redirect('/detailproyek')->with(['success' => 'Data Progres Berhasil Ditambahkan!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailProyek  $detailProyek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = Proyek::find($id);
        $pegawai = Pegawai::all();
        $detailproyek = DetailProyek::all();
        $g = Gambarprogres::all();
        return view('sistem.proyek.readprogres', compact('proyek', 'detailproyek','g'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailProyek  $detailProyek
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProyek $detailProyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailProyek  $detailProyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailProyek $detailProyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailProyek  $detailProyek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailProyek::destroy($id);
        return redirect('/detailproyek')->with('status', 'Data Progres berhasil dihapus');
    }
}
