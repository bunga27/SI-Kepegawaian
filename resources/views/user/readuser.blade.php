@extends('master.master')
@section('title','Lihat User | CV Hasil Utama Konsultan')
@section('ket','Data User dapat dilihat dibawah ini')
@section('content')

{{-- <div class="content">
    <div class="container-fluid text-center text-black"> --}}
<div class="row">
    <div class="col-md-12">
    <div>
        <a href="user/create" class="btn btn-default btn-custom waves-effect waves-light pull-center col-md-12 col-sm-12 col-xs-12">
            <i class="fa fa-plus"></i>
            <span> Tambahkan Data User </span>
        </a>
    </div>
    </div>
</div>
<div class="row">
  @foreach($user as $user)
    <div class="col-md-3 m-t-15">
        <div class="thumbnail">
            <img src="{{ asset('menu_2') }}/assets/images/users/user.png" alt="user-img" class="img-rounded" width="100">
            <h4>{{ $user->pegawai->nama }}</h4>
            <h5>{{ $user->email }}</h5>
            <a>
                <form action="{{ url('/user/'.$user->id) }}" method="post" class="m-r-5">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-custom   waves-effect waves-light pull-right"
                        onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                        <i class="fa fa-trash"></i>
                        {{-- <span> Hapus</span> --}}
                    </button>
                </form>
            </a>
            <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-primary btn-custom  waves-effect waves-light pull-right m-r-5">
                <i class="fa fa-pencil"></i>
                {{-- <span> Ubah</span> --}}
            </a>

            <br><br>
        </div>
    </div>
    @endforeach
</div>
        {{-- </div> --}}
    {{-- </div>
</div> --}}

{{-- <div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>

            <tr>
                <th data-field="id">ID</th>
                <th data-field="action">Action</th>
                <th data-field="nama">Nama</th>
                <th data-field="pasfoto">Email</th>
                <th data-field="nik">Password</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $user)
            <tr>
                <td></td>
                <td>
                    <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-info waves-effect waves-light">
                        <i class="fa fa-wrench m-r-5"></i>
                        <span>Ubah</span>
                    </a>

                    <form action="{{ url('/user/'.$user->id) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="on-default edit-row btn btn-danger"
                            onclick="return confirm('Apakah anda yakin akan menghapus nya?');">
                            <i class="fa fa-trash"></i>
                            <span>Hapus</span>
                        </button>
                    </form>

                </td>
                <td>{{ $user->pegawai->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>

            </tr>

            @endforeach


        </tbody>
    </table>
</div>
</div>
</div> --}}
@endsection
