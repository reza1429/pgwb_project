@extends('admin')
 
@section('title', 'Tambah Kontak')
@section('content-title', 'Tambah Kontak - '.$siswa->nama)
@section('content')
    <h1>Halaman Tambah Kontak</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('master_k.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                        <div class="form-group">
                            {{-- {{ dd($kontak->id) }}  --}}
                            <label for="jenis_kontak">Jenis Kontak</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="jenis_kontak" name="jenis_kontak">
                                    <option selected disabled>pilih jenis kontak</option>
                                    @foreach ($j_kontak as $kontak) 
                                  <option value="{{ $kontak->id }}">{{ $kontak->jenis_kontak }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ old('deskripsi') }}">
                        </div>
                        <div class="form-group">
                            {{-- <a href="submit" class="btn btn-success">Simpan</a> --}}
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="{{ route('master_k.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
