<?php

namespace App\Http\Controllers;

use App\Pegawai;
// use App\Proyek;

class HomeController extends Controller
{
    public function index()
    {

        $dataPegawai = Pegawai::count('nik');
        // $dataProyek = Proyek::count('id');



        return view('home', [

            'data_pegawai' => $dataPegawai,
            // 'data_proyek' => $dataProyek,

        ]);
    }
}
