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
                    <h4>Data Wisata</h4>
                  </div>
                  <div style="text-align:right; margin-right:10px">
                         {{-- <a href="/datautama/create" class="btn btn-success fa fa-plus"></a> --}}
                         <button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#tambahModal"></button>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="id_datautama">ID</th>
                            <th class="kategori">Kategori</th>
                            <th class="nama_wisata">Nama Wisata</th>
                            <th class="deskripsi">Deskripsi</th>
                            <th class="tumbnail">Gambar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $datautama as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>{{ $row->nama_wisata }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td><img src="{{ asset($row->tumbnail) }}" width="200"></>
                                    <td>

                                    {{-- <a href="/datautama/{{ $datautama->id_datautama }}/edit" class="btn btn-success fa fa-edit"></a> --}}
                                    <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" data-target="#editModal-{{$row->id_datautama}}"></button>
                                    <a href="#" class="btn btn-danger swal-6" data-id="{{ $row->id_datautama }}">
                                                <form action="{{ url('/datautama/'.$row->id_datautama) }}" id="delete{{ $row->id_datautama }}" method="post" class="d-inline">
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
        <h5 class="modal-title" id="exampleModalLabel">Input Data Wisata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

              <form action="{{action('datautamakontrol@store')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class ="modal-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-select-list">
                            <select id="kategori" type="text" class="form-control custom-select-value" name="kategori">
                                <option>-- Pilih Kategori --</option>
                                <option value="Alam">Alam</option>
                                <option value="Buatan">Buatan</option>
                                <option value="Desa">Desa</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Religi">Religi</option>
                                <option value="Budaya">Budaya</option>
                                <option value="Ruang Terbuka">Ruang Terbuka</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="form-group row mb-4  @error('nama_wisata') input-with-error @enderror">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Wisata</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="nama_wisata" id="nama_wisata" type="text" class="form-control" placeholder="Masukkan Nama Wisata" value="{{ old('nama_wisata')}}">
                        @error('nama_wisata') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
            </div>
            <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" value="{{ old('deskripsi')}}">
                        @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
            </div>
        <div class="form-group row mb-4  @error('alamat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
            <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="{{ old('alamat')}}">
            @error('alamat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('youtubeprofil') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube Profil</label>
            <div class="col-sm-12 col-md-7">
            <input name="youtube_profil" id="youtube_profil" type="text" class="form-control" placeholder="Masukkan Youtube Profil" value="{{ old('youtube_profil')}}">
           <button  class="btn btn-primary" target="_blank" onclick="window.open('https://www.youtube.com/','_blank');" type="button">Youtube</button>
            @error('youtube_profil') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('koordinat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat</label>
            <div class="col-sm-12 col-md-7">
            <input name="koordinat" id="koordinat" type="text" class="form-control" placeholder="Masukkan Koordinat" value="{{ old('koordinat')}}">
            <button  class="btn btn-primary" target="_blank" onclick="window.open('https://www.google.co.id/maps/@-7.644258,111.5349059,15z','_blank');" type="button">Maps</button>
            @error('koordinat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
         <div class="form-group row mb-4  @error('maps') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Google Maps</label>
            <div class="col-sm-12 col-md-7">
            <input name="maps" id="maps" type="text" class="form-control" placeholder="Masukkan Maps" value="{{old('maps')}}" required>
            @error('maps') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('jam_buka') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Buka</label>
            <div class="col-sm-12 col-md-7">
            <input name="jam_buka" id="jam_buka" type="time" class="form-control" placeholder="Masukkan Jam Buka" value="{{old('jam_buka')}}" required>
            @error('jam_buka') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('jam_tutup') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Tutup</label>
            <div class="col-sm-12 col-md-7">
            <input name="jam_tutup" id="jam_tutup" type="time" class="form-control" placeholder="Masukkan Jam Tutup" value="{{old('jama_tutup')}}" required>
            @error('jam_tutup') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4 @error('tumbnail') input-with-error @enderror">
            <label for="tumbnail" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <div>
                <img src="" id="output" width="200px" />
                <input onchange="loadFile(event)" type="file" name="tumbnail" id="tumbnail" class="form-control" placeholder="Document File..." value="{{ old('tumbnail')}}" required>
                @error('tumbnail') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
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

@foreach ($datautama as $row)
<div class="modal fade" id="editModal-{{$row->id_datautama}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Wisata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

              <form action="{{url('/datautama/update')}}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
        <div class ="modal-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-select-list">
                            <input type="hidden" name="id_datautama" value={{ $row->id_datautama }}>
                            <select id="kategori" type="text" class="form-control custom-select-value" name="kategori">
                                 <option value="{{ $row->kategori}}"> {{ $row->kategori }}</option>
                                <option value="Alam">Alam</option>
                                <option value="Buatan">Buatan</option>
                                <option value="Desa">Desa</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Religi">Religi</option>
                                <option value="Budaya">Budaya</option>
                                <option value="Ruang Terbuka">Ruang Terbuka</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="form-group row mb-4  @error('nama_wisata') input-with-error @enderror">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Wisata</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="nama_wisata" id="nama_wisata" type="text" class="form-control" placeholder="Masukkan Nama Wisata" value="{{$row->nama_wisata}}">
                        @error('nama_wisata') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
            </div>
            <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" value="{{$row->deskripsi}}">
                        @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
            </div>
        <div class="form-group row mb-4  @error('alamat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
            <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="{{$row->alamat}}">
            @error('alamat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('youtubeprofil') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube Profil</label>
            <div class="col-sm-12 col-md-7">
            <input name="youtube_profil" id="youtube_profil" type="text" class="form-control" placeholder="Masukkan Youtube Profil" value="{{ $row->youtube_profil}}">
           <button  class="btn btn-primary" target="_blank" onclick="window.open('https://www.youtube.com/','_blank');" type="button">Youtube</button>
            @error('youtube_profil') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('koordinat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat</label>
            <div class="col-sm-12 col-md-7">
            <input name="koordinat" id="koordinat" type="text" class="form-control" placeholder="Masukkan Koordinat" value="{{$row->koordinat}}">
            <button  class="btn btn-primary" target="_blank" onclick="window.open('https://www.google.co.id/maps/@-7.644258,111.5349059,15z','_blank');" type="button">Maps</button>
            @error('koordinat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
         <div class="form-group row mb-4  @error('maps') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Google Maps</label>
            <div class="col-sm-12 col-md-7">
            <input name="maps" id="maps" type="text" class="form-control" placeholder="Masukkan Maps" value="{{$row->maps}}" required>
            @error('maps') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('jam_buka') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Buka</label>
            <div class="col-sm-12 col-md-7">
            <input name="jam_buka" id="jam_buka" type="time" class="form-control" placeholder="Masukkan Jam Buka" value="{{$row->jam_buka}}" required>
            @error('jam_buka') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('jam_tutup') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Tutup</label>
            <div class="col-sm-12 col-md-7">
            <input name="jam_tutup" id="jam_tutup" type="time" class="form-control" placeholder="Masukkan Jam Tutup" value="{{$row->jam_tutup}}" required>
            @error('jam_tutup') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4 @error('tumbnail') input-with-error @enderror">
            <label for="tumbnail" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <div>
                <img src="{{asset($row->tumbnail)}}" id="output" width="200px" />
                <input onchange="loadFile(event)" type="file" name="tumbnail" id="tumbnail" class="form-control" placeholder="Document File..." value="{{ $row->tumbnail}}">
                @error('tumbnail') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
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
<script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
</script>



{{-- @foreach($datautama as $pgw)
<!-- edit modal -->

@endforeach --}}
@endsection
