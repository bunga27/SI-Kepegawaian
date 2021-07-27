@extends('header')
@section('content')
@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif

<!-- KETIKA ADA SESSION ERROR  -->
@if (session('error'))
<!-- MAKA TAMPILKAN ALERT DANGER -->
    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@endif
<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Event</h4>
                  </div>
                  <div style="text-align:right; margin-right:10px">
                          <button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#tambahModal"></button>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="id_event">NO</th>
                            <th class="kategori">Kategori</th>
                            <th class="judul">Judul</th>
                            <th class="deskripsi">Diskripsi</th>
                            <th class="pic">Gambar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $event as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td><img src="{{ asset ($row->pic) }}" width="100"></td>
                                    <td>

                                         {{-- <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" data-target="#editModal-{{$row->id_event}}"></button> --}}
                                         <a type="button" class="btn btn-success fa fa-edit" href="{{ url('/event/'.$row->id_event) }}"></a>

                                        <a href="#" class="btn btn-danger swal-6" data-id="{{ $row->id_event }}">
                                                <form action="{{ url('/event/'.$row->id_event) }}" id="delete{{ $row->id_event }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                                <i class="fa fa-trash"></i>
                                            </a>

                                    </td>
                                    </tr>
                                    @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>

<!-- tambah modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

              <form action="{{action('eventkontrol@store')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class ="modal-body">

        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
            <div class="col-sm-12 col-md-7">
                <div class="form-select-list">
                <select id="kategori" type="text" class="form-control custom-select-value" name="kategori">
                    <option>-- Pilih Kategori --</option>
                    <option value="Alam">Berita</option>
                    <option value="Buatan">Acara</option>
                </select>
                </div>
            </div>
        </div>
        <div class="form-group row mb-4  @error('judul') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
            <div class="col-sm-12 col-md-7">
            <input name="judul" id="judul" type="text" class="form-control" placeholder="Masukkan Judul" value="{{ old('judul')}}" required>
            @error('judul') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
            <div class="col-sm-12 col-md-7">
            <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" value="{{ old('deskripsi')}}" required>
            @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4 @error('pic') input-with-error @enderror">
            <label for="pic" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <div>
                <img src="" id="output" width="200px" />
                <input onchange="loadFile(event)" type="file" name="pic" id="pic" class="form-control" placeholder="Document File..." value="{{ old('pic')}}" required>
                @error('pic') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        </div>
        </form>
    </div>
    </div>
</div>

@foreach ($event as $row)
<div class="modal fade" id="editModal-{{$row->id_event}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

              <form action="{{url('/event')}}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
        <div class ="modal-body">

        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
            <div class="col-sm-12 col-md-7">
                <select id="kategori" type="text" class="form-control custom-select-value" name="kategori"> <option value="{{ $row->kategori}}"> {{ $row->kategori }}</option>
                    <option value="berita">Berita</option>
                    <option value="event">Event</option>
                </select>
            </div>
        </div>
        <div class="form-group row mb-4  @error('judul') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
            <div class="col-sm-12 col-md-7">
            <input name="judul" id="judul" type="text" class="form-control" placeholder="Masukkan Judul" value="{{ $row->judul}}">
            @error('judul') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">deskripsi</label>
            <div class="col-sm-12 col-md-7">
            <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" value="{{ $row->deskripsi}}">
            @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4 @error('pic') input-with-error @enderror">
            <label for="pic" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <div>
                <img src="{{asset($row->pic)}}" id="output" width="200px" />
                <input onchange="loadFile(event)" type="file" name="pic" id="pic" class="form-control" placeholder="Document File..." value="{{ $row->pic}}">
                @error('pic') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>

        </div>
        </form>
    </div>
    </div>
</div>
@endforeach

@endsection
