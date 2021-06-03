<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\User;
use App\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mobile()
    {
        $user = User::all();
        $pegawai = Pegawai::all();
        return view('mobile.profil', compact('user', 'pegawai'));
    }

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

    public function show(Pegawai $pegawai, $id)
    {
        $user = User::all();
        $pegawai = Pegawai::find($id);
        return view('pegawai.detailpegawai', compact('pegawai','user'));
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
        if (Auth::user()->level=="karyawan") {
            return view('mobile.editpegawai', compact('pegawai'));
        } else {
            return view('pegawai.editpegawai', compact('pegawai'));
        }
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

        if (Auth::user()->level=="karyawan"){

            return redirect('/mobileprofil');
        } else {

            return redirect('/pegawai');
        }
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
