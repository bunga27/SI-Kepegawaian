@extends('mobile.master')
@section('title','Setting Akun| CV Hasil Utama Konsultan')
@section('ket','Ubah data user yang telah dipilih sebelumnya')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="{{url('/user/'.$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="email" class="col-md-3 control-label">E-Mail</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan E-Mail"
                        value="{{ $user->email }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3 control-label">Password</label>
                <span>( Ketik Ulang Password )</span>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukan Password" value="{{ $user->password }}" required>
                </div>
            </div>
            <div class="pull-right inline-remember-me">
                <button class="btn btn-primary btn-custom waves-effect waves-light" type="submit">Simpan</button>
                <a class="btn btn-danger btn-custom waves-effect waves-light" href="/home">Cancel</a>
            </div>

        </form>

    </div>
</div>

@endsection
