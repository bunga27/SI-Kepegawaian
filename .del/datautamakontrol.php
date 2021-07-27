<?php

namespace App\Http\Controllers;

use App\Datautama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class datautamakontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datautama = datautama::all();
        return view('datautama', compact('datautama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createdatautama');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except(['tumbnail']);

        $extension = $request->tumbnail->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        $request->tumbnail->move(base_path('public/storage/datautama'), $filename);
        $data['tumbnail'] = asset("/storage/datautama/{$filename}");
        Datautama::create($data);

        return redirect('/datautama')->with('success', 'Data Wisata Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datautama  $datautama
     * @return \Illuminate\Http\Response
     */
    public function show(datautama $datautama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\datautama  $datautama
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datautama = Datautama::find($id);
        return view('editdatautama', compact('datautama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datautama  $datautama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $datautama = Datautama::findOrFail($request->id_datautama)->first();

        // $data = $request->except(['tumbnail']);

        if ($request->hasFile('tumbnail')) {
            $extension = $request->tumbnail->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($datautama->tumbnail);
            Storage::delete("datautama/{$oldfile}");
            $request->tumbnail->move(base_path('public/storage/datautama'), $filename);
            $tumbnail = asset("/storage/datautama/{$filename}");

            Datautama::where('id_datautama', $request->id_datautama)->update([
                'kategori'     => $request->kategori,
                'nama_wisata'      => $request->nama_wisata,
                'deskripsi'   => $request->deskripsi,
                'youtube_profil'       =>  $request->youtube_profil,
                'alamat'       =>  $request->alamat,
                'maps'          =>  $request->maps,
                'koordinat' => $request->koordinat,
                'tumbnail'  =>  $tumbnail,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' =>  $request->jam_tutup
            ]);
        } else {
            Datautama::where('id_datautama', $request->id_datautama)->update([
                'kategori'     => $request->kategori,
                'nama_wisata'      => $request->nama_wisata,
                'deskripsi'   => $request->deskripsi,
                'youtube_profil'       =>  $request->youtube_profil,
                'alamat'       =>  $request->alamat,
                'maps'          =>  $request->maps,
                'koordinat' => $request->koordinat,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' =>  $request->jam_tutup
            ]);
        }

        // $datautama->fill($data);
        // $datautama->save();

        return redirect('/datautama')->with('success', 'Data Wisata Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\datautama  $datautama
     * @return \Illuminate\Http\Response
     */
    public function destroy(datautama $datautama)
    {
        datautama::destroy($datautama->id_datautama);
        return redirect('/datautama')->with('error', 'Data Wisata Berhasil dihapus');
    }
}
