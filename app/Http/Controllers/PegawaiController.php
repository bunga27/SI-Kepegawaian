<?php

namespace App\Http\Controllers;

use App\DetailKehadiran;
use App\Riwayatpendidikan;
use App\Pegawai;
use App\User;
use App\Jabatan;
use App\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use lluminate\Validation\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mobile()
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        $pegawai = Pegawai::all();
        return view('mobile.profil', compact('user', 'pegawai', 'jabatan'));
    }

    public function index()
    {

        $jabatan = Jabatan::all();
        $user = User::all();
        $pegawai = Pegawai::all();
        return view('pegawai.readpegawai', compact('user','pegawai', 'jabatan'));
    }

    public function readgaji()
    {

        $jabatan = Jabatan::all();
        $user = User::all();
        $pegawai = Pegawai::all();

        return view('gaji.readgaji', compact('user', 'pegawai', 'jabatan'));
    }


    public function addgaji($id)
    {
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();
        $user = User::all();
        $gaji = Gaji::all();
        return view('gaji.creategaji', compact( 'user', 'pegawai', 'jabatan'));
    }

    public function detailgaji($id)
    {
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();
        $user = User::all();
        $gaji = Gaji::all();
        return view('gaji.readdetailgaji', compact('user', 'pegawai', 'jabatan'));
    }


    public function storegaji(Request $request)
    {
        $tanggal = $request -> tanggal;
        $bulan = date('mY', strtotime($tanggal));

        //kehadiran trus nik e sg id ne ket
        $harikerja = DB::table('detailkehadiran')
        ->where('nik', '=', $request->nik)
        ->Where('keterangan', '=', 'Hadir')
        ->Where('bulan', '=', $bulan)
        ->count();

        $totalproyek = DB::table('proyek')
        ->where('nik', '=', $request->nik)
        ->Where('bulan', '=', $bulan)
        ->count();

        $totallembur = DB::table('detailkehadiran')
        ->where('nik', '=', $request->nik)
        ->Where('bulan', '=', $bulan)
        ->where('keterangan','=', 'Hadir Lembur')
        ->count();

        $telat = DB::table('detailkehadiran')
        ->where('nik', '=', $request->nik)
        ->Where('bulan', '=', $bulan)
        ->where('ketepatanhadir', '=', 'Terlambat')
        ->count();



        $gaji = new Gaji;
        $gaji->nik = $request->nik;
        $gaji->bulan = $bulan;
        $gaji->gajibulan = $harikerja*$request->gajiharian;
        $gaji->totaluangmakan = ($harikerja*$request->uangmakan)+($totallembur * $request->uangmakan);
        $gaji->totalbonusproyek =$totalproyek*$request->bonusproyek;
        $gaji->totalthr = $request->thr*$request->hariraya;
        $gaji->totalgajilembur=$totallembur*$request->gajilembur;

        $penghasilan=$gaji->gajibulan+$gaji->totaluangmakan+$gaji->totalbonusproyek+$gaji->totalthr+ $gaji->totalgajilembur;


        $potongantelat = $telat*$request->potongantelat; // ketepatan=lambat*dendatelat
        $gaji->potongantelat=$potongantelat;


        $gaji->totalgaji=$penghasilan-$gaji->potongantelat;

        $gaji->save();
        return redirect('pegawai/'.$request->nik.'/addgaji')->with(['success' => 'Data Penggajian Berhasil Ditambahkan!']);

        // dd($request->all());
        // echo $request->nik;
        // echo $request->nik;
        // echo $harikerja;
        // echo $bulan;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('pegawai.createpegawai',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'pasfoto' => 'required|image:jpg,png',
        //     'nik' => 'numeric|min:16'
        // ]);

        $this->validate($request,[
            'pasfoto' => 'required|image:jpg,png',
            'nik' => 'numeric|min:999999999999999|max:9999999999999999'
        ]);

        $data = $request->except(['pasfoto','idJabatan']);

        $extension = $request->pasfoto->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        $request->pasfoto->move(base_path('public/storage/pegawai'), $filename);
        $data['pasfoto'] = asset("/storage/pegawai/{$filename}");
        $data['idJabatan'] = $request->jabatan_id;
        Pegawai::create($data);


        $jenjang = $request->jenjang;
        $tempat = $request->tempat;
        $tahun = $request->tahun;

        for ($i=0; $i<count($jenjang); $i++){
            $datasave = [
                'nik'       => $request->nik,
                'jenjang'   => $jenjang[$i],
                'tempat'    => $tempat[$i],
                'tahun'     => $tahun[$i],
            ];
            DB::table('riwayatpendidikan')->insert($datasave);
        }

        return redirect('/pegawai')->with(['success' => 'Data Pegawai Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Pegawai $pegawai, $id)
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        $pegawai = Pegawai::find($id);
        return view('pegawai.detailpegawai', compact('pegawai','user', 'jabatan'));
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
        $jabatan = Jabatan::all();
        $riwayatpendidikan = Riwayatpendidikan::where('nik', $pegawai->nik)->get();
        if (Auth::user()->level=="karyawan") {
            return view('mobile.editpegawai', compact('pegawai','jabatan','riwayatpendidikan'));
        } else {
            return view('pegawai.editpegawai', compact('pegawai','jabatan', 'riwayatpendidikan'));
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

        $this->validate($request,[
            'nik' => 'numeric|min:999999999999999|max:9999999999999999'
        ]);
        $data = $request->except(['pasfoto']);

        if ($request->hasFile('pasfoto')) {
            $extension = $request->pasfoto->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($pegawai->pasfoto);
            Storage::delete("pegawai/{$oldfile}");
            $request->pasfoto->move(base_path('/public/storage/pegawai'), $filename);
            $data['pasfoto'] = asset("/storage/pegawai/{$filename}");
        }

        $pegawai->fill($data);
        $pegawai->save();

        $jenjang = $request->jenjang;
        $tempat = $request->tempat;
        $tahun = $request->tahun;

        for ($i=0; $i<count($jenjang); $i++){
            $datasave = [
                'nik'       => $data['nik'],
                'jenjang'   => $jenjang[$i],
                'tempat'    => $tempat[$i],
                'tahun'     => $tahun[$i],
            ];
            DB::table('riwayatpendidikan')->insert($datasave);
        }



        if (Auth::user()->level=="karyawan"){

            return redirect('/mobileprofil')->with(['success' => 'Data Anda Berhasil Diubah!']);
        } else {

            return redirect('/pegawai')->with(['success' => 'Data Pegawai Berhasil Diubah!']);
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
        Pegawai::destroy($pegawai->nik);
        return redirect('/pegawai')->with('success', 'Data Pegawai berhasil dihapus');
    }
}
