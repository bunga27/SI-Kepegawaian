<?php

namespace App\Http\Controllers;

use App\Kehadiran;
use Illuminate\Http\Request;
use App\Pegawai;
use App\Proyek;
use App\DetailKehadiran;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataPegawai = Pegawai::count('idPegawai');
        $dataProyek = Proyek::count('idProyek');
        $dataKehadiran = DetailKehadiran::count('idDetailKehadiran');



        return view('hoomee', [

            'data_pegawai' => $dataPegawai,
            'data_proyek' => $dataProyek,
            'data_kehadiran' => $dataKehadiran

        ]);

    }
}
