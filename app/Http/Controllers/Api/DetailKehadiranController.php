<?php

namespace App\Http\Controllers\Api;

use App\DetailKehadiran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailKehadiranController extends Controller
{

    public function index(){
        return DetailKehadiran::all();
    }

    public function store(Request $request)
    {
        $DetailKehadiran = new DetailKehadiran;
        $DetailKehadiran->kehadiran_id=$request->idKehadiran;
        $DetailKehadiran->pegawai_id=$request->idPegawai;
        $DetailKehadiran->ketkehadiran=$request->ketkehadiran;
        $DetailKehadiran->keterangan=$request->keterangan;
        $DetailKehadiran->save();

        return response()->json([
            'data' => $DetailKehadiran,
            'message' => 'Sukses ambil data',
        ]);
    }
}
