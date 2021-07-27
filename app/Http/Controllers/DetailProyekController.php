<?php

namespace App\Http\Controllers;

use App\Detailproyek;
use App\Gambarprogres;
use App\Proyek;
use App\Pegawai;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $alurproyek = DB::table('alurproyek')
        ->where('idProyek', '=', $id)
        ->get();
        return view('sistem.proyek.createdetailproyek', compact('proyek','alurproyek'));
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
        $request->gambar->move(base_path('public/storage/progresproyek'), $filename);
        $data['gambar'] = asset("/storage/progresproyek/{$filename}");
        $data['proyek_id'] = $request->proyek_id;
        $detailproyek = new DetailProyek([
            'idProyek'=>$data['proyek_id'],
            'idAlurProyek' => $request->idAlurProyek,
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
                $file->move(base_path('public/storage/progresproyek'), $filename);
                $datas['gambar2'] = asset("/storage/progresproyek/{$filename}");

                $gambarprogres = new Gambarprogres([
                    'idDetailProyek' => $detailproyek->idDetailProyek,
                    'gambar2' => $datas['gambar2']
                ]);
                $gambarprogres->save();
             }
        }
        return redirect()->back()->with(['success' => 'Data Progres Berhasil Ditambahkan!']);


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
        $detailproyek = DetailProyek::where('idProyek', $id)->get();
        $alurproyek= DB::table('alurproyek')->where('idProyek', '=', $id)->get();
        // $d = DB::table('detailproyek')->where('idProyek', '=', $id)->get('idDetailProyek');
        // $g = DB::table('gambarprogres')->where('idDetailProyek', '=', $d)->get();
        return view('sistem.proyek.readprogres', compact('proyek', 'detailproyek','alurproyek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailProyek  $detailProyek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailproyek = DetailProyek::find($id);
        $proyek = Proyek::where('idProyek', $detailproyek->idProyek)->get();
        $gambarprogres = Gambarprogres::where('idDetailProyek', $id)->get();
        $alurproyek = DB::table('alurproyek')
        ->where('idProyek', '=', $detailproyek->idProyek)
        ->get();

        if (Auth::user()->level == "karyawan") {
            $pegawai = auth()->user()->pegawai;
        } else {
            $pegawai = Pegawai::all();
        }
        return view('sistem.proyek.editprogres', compact( 'alurproyek','proyek', 'gambarprogres', 'detailproyek', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailProyek  $detailProyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detailproyek = DetailProyek::find($id);

        $data = $request->except(['gambar']);
        // $proyek_id = Proyek::where('idProyek', $detailProyek->proyek_id)->get();
        if ($request->hasFile('gambar')) {
            $extension = $request->gambar->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($detailproyek->gambar);
            Storage::delete("detailproyek/{$oldfile}");
            $request->gambar->move(base_path('/public/storage/progresproyek'), $filename);
            $data['gambar'] = asset("/storage/progresproyek/{$filename}");
            // $data['proyek_id'] = $proyek_id->idProyek;
        }

        $detailproyek->fill($data);
        $detailproyek->save();

        return redirect('/detailproyek');
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
