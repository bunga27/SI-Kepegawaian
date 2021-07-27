<?php

namespace App\Http\Controllers;

use App\Gambarprogres;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class GambarProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request->hasFile('gambar2')) {
            $files = $request->file('gambar2');
            foreach ($files as $file) {
                $extension = $file->extension();
                $filename = Uuid::uuid4() . ".{$extension}";
                $file->move(base_path('public/storage/progresproyek'), $filename);
                $datas['gambar2'] = asset("/storage/progresproyek/{$filename}");

                $gambarprogres = new Gambarprogres([
                    'idDetailProyek' => $request->detailproyek_id,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gambarprogres::destroy($id);
        return redirect()->back()->with('status', 'Gambar berhasil dihapus');
    }
}
