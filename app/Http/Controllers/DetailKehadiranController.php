<?php

namespace App\Http\Controllers;

use App\DetailKehadiran;
use App\Pegawai;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class DetailKehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $detailkehadiran = DetailKehadiran::all();

        if (Auth::user()->level == "karyawan") {
            $pegawai = auth()->user()->pegawai;
            return view('mobile.daftarhadir', compact('pegawai', 'detailkehadiran',));
        } else {
            $pegawai = Pegawai::all();
            return view('sistem.kehadiran.detailkehadiran', compact('pegawai', 'detailkehadiran'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $detailkehadiran = DetailKehadiran::all();
        if (Auth::user()->level == "karyawan") {
            $nik = auth()->user()->pegawai->nik;
            $pegawai = auth()->user()->pegawai;
        } else {
             $nik = auth()->user()->pegawai->nik;
            $pegawai = Pegawai::all();
        }

        return view('sistem.kehadiran.createdetailkehadiran', compact('pegawai', 'detailkehadiran','nik'));


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
            'buktidatang' => 'required|image:jpg,png',
        ]);

        $data = $request->except(['nik','buktidatang','keterangan','created_at','bulan', 'ketepatanhadir']);
        $extension = $request->buktidatang->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        $request->buktidatang->move(base_path('public/storage/buktihadir'), $filename);
        $data['buktidatang'] = asset("/storage/buktihadir/{$filename}");
        $data['created_at'] = \Carbon\Carbon::now('Asia/Jakarta');
        $hari = date('D', strtotime($data['created_at']));

        if ($hari == "Sat" || $hari == "Sun" ) {
            $data['keterangan'] = 'Datang';
        } else {
            $data['keterangan'] = 'Datang';
        }

        $data['bulan'] = date('mY', strtotime($data['created_at']));

        $jam = date('H:i:s', strtotime($data['created_at']));

        if ($jam == "08:00:00" || $jam < "08:00:00") {
            $data['ketepatanhadir'] = "Tepat Waktu";
        } else {
            $data['ketepatanhadir'] = "Terlambat";;
        }

        $data['nik'] = $request->pegawai_id;
        DetailKehadiran::create($data);


            return redirect('/detailkehadiran')->with(['success' => 'Data Kehadiran Berhasil Ditambahkan!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(DetailKehadiran $detailKehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailKehadiran $detailKehadiran, $id)
    {
        $pegawai = Pegawai::all();
        $detailkehadiran = DetailKehadiran::find($id);
         return view('sistem.kehadiran.createdetailpulang', compact('pegawai', 'detailkehadiran'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $detailKehadiran = DetailKehadiran::find($id);
        $data = $request->except(['buktipulang', 'keterangan', 'updated_at']);

        if ($request->hasFile('buktipulang')) {
            $extension = $request->buktipulang->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($detailKehadiran->buktipulang);
            Storage::delete("buktihadir/{$oldfile}");
            $request->buktipulang->move(base_path('/public/storage/buktihadir'), $filename);
            $data['buktipulang'] = asset("/storage/buktihadir/{$filename}");
        }

        $data['updated_at'] = \Carbon\Carbon::now('Asia/Jakarta');
        $hari = date('D', strtotime($data['updated_at']));

        if ($hari == "Sat" || $hari == "Sun") {
            $data['keterangan'] = 'Hadir Lembur';
        } else {
            $data['keterangan'] = 'Hadir';
        }

        DetailKehadiran::where('idDetailKehadiran', $id)->update([
            'buktipulang' => $data['buktipulang'],
            'ketpulang' => $request->ketpulang,
            'keterangan' => $data['keterangan'],
            'updated_at' => \Carbon\Carbon::now('Asia/Jakarta'),
        ]);




        if (Auth::user()->level == "karyawan") {
            return redirect('/home')->with(['success' => 'Data Kehadiran Berhasil Ditambahkan!']);
        } else {
            return redirect('/detailkehadiran')->with(['success' => 'Data Kehadiran Berhasil Ditambahkan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailKehadiran  $detailKehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailKehadiran::destroy($id);
        return redirect('/detailkehadiran')->with('success', 'Data Kehadiran berhasil dihapus');
    }
}
