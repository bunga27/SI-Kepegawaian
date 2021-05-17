<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\User;
use App\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $pegawai = Pegawai::all();
        return view('pegawai.readpegawai', compact('user','pegawai'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.createpegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'nama' => 'required',
        //     'pasfoto' => 'required|image:jpg,png',
        //     'nik' => 'required',
        //     'jeniskelamin' => 'required',
        //     'tempatlahir' => 'required',
        //     'tanggallahir' => 'required',
        //     'alamat' => 'required',
        //     'agama' => 'required',
        //     'telp' => 'required',
        //     'email' => 'required',
        //     'jabatan' => 'required',
        //     'tanggalgabung' => 'required',
        //     'statuskerja' => 'required',
        //     'sd' => 'required',
        //     'smp' => 'required',
        //     'sma' => 'required',
        //     'lanjutan' => 'required',

        // ]);
        $request->validate([
            'pasfoto' => 'required|image:jpg,png',
        ]);

        $data = $request->except(['pasfoto']);

        $extension = $request->pasfoto->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        $request->pasfoto->storeAs('public/pegawai', $filename);
        $data['pasfoto'] = asset("/storage/pegawai/{$filename}");

        Pegawai::create($data);
        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Pegawai $pegawai)
    {
        $proyek = Proyek::all();
        return view('pegawai.detailpegawai', compact('pegawai', 'proyek'));
    }

    public function lap(Pegawai $pegawai)
    {
        $pegawai = Pegawai::all();
        return view('laporan.lappegawai', compact('pegawai'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.editpegawai', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'pasfoto' => 'required|image:jpg,png',
        ]);

        $data = $request->except(['pasfoto']);

        if ($request->hasFile('pasfoto')) {
            $extension = $request->pasfoto->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($pegawai->pasfoto);
            Storage::delete("pegawai/{$oldfile}");
            $request->pasfoto->storeAs('/public/pegawai', $filename);
            $data['pasfoto'] = asset("/storage/pegawai/{$filename}");
        }

        $pegawai->fill($data);
        $pegawai->save();


        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->idPegawai);
        return redirect('/pegawai')->with('status', 'Data berhasil dihapus');
    }
}
