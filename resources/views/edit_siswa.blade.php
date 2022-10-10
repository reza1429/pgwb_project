@extends('admin')
 
@section('title', 'Edit Siswa')
@section('content-title', 'Edit Siswa')
@section('content')
    <h1>Halaman Edit Siswa</h1>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('master_s.update', $siswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name='nama' value="{{ $siswa->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" class="form-control" id="nisn" name='nisn' value="{{ $siswa->nisn }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name='alamat' value="{{ $siswa->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-select form-control" name="jk" id="jk">
                                <option value="lakilaki"@if($siswa->jk == 'laki-laki')selected @endif>Laki-Laki</option>
                                <option value="perempuan"@if($siswa->jk == 'perempuan')selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Siswa</label><br>
                            <img src="{{ asset('/template/img/'.$siswa->foto) }}" width="300" class="img-thumbnail">
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea class="form-control" id="about" name="about">{{ $siswa->about }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-success">
                            {{-- <a href="submit" class="btn btn-success">Update</a> --}}
                            <a href="{{ route('master_s.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
