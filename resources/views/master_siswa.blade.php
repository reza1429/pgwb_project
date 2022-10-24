@extends('admin')
 
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')
    <h1>Halaman Siswa</h1>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @if (auth()->user()->role==0)
                    <a href="{{ route('master_s.create')  }}" class="btn btn-outline-success">tambah data</a>
                    @endif
                </div>
                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $d)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $d->nisn }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>
                                        <a href="{{ route('master_s.show', $d->id)  }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        @if (auth()->user()->role==0)
                                        <a href="{{ route('master_s.edit', $d->id)  }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('master_s.hapus', $d->id)  }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
