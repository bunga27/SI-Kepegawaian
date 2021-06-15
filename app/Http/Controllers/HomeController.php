<?php

namespace App\Http\Controllers;

use App\Kehadiran;
use Illuminate\Http\Request;
use App\Pegawai;
use App\Proyek;
use App\Jabatan;
use App\User;
use App\DetailKehadiran;
use App\DetailProyek;

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
        $dataUser = User::count('id');
        $dataProyek = Proyek::count('idProyek');
        $dataJabatan = Jabatan::count('idJabatan');
        $detailkehadiran = DetailKehadiran::all();
        $detailproyek = DetailProyek::all();
        return view('hoomee', [

            'data_pegawai' => $dataPegawai,
            'data_proyek' => $dataProyek,
            'data_user'=> $dataUser,
            'data_jabatan' => $dataJabatan,
            'detailkehadiran' =>$detailkehadiran,
            'detailproyek' => $detailproyek
        ]);

    }

    public function profil()
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        $pegawai = Pegawai::all();
        return view('pegawai.profil', compact('pegawai', 'user', 'jabatan'));
    }
}
