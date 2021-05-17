<?php

namespace App\Http\Controllers;

use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        return view('user.readuser', compact('user', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('user.createuser', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'pegawai_id' => $request->idPegawai,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/user')->with(['success' => 'Data User Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $pegawai = Pegawai::all();
        return view('user.edituser', compact('user', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        User::where('id', $id)
            ->update([
                'pegawai_id' => $request->idPegawai,
                'email' => $request->email,
                'level' => $request->level,
                'password' => Hash::make($request->password)
            ]);
        return redirect('/user')->with(['success' => 'Data User Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user')->with(['success' => 'Data User Berhasil Dihapus!']);
    }
}
