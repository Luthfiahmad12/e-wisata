@extends('layouts.admin', ['title' => 'Daftar Fasilitas'])

@section('content-title')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer ml-2"></i> Daftar Fasilitas</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Fasilitas</a></li>
        </ul>
    </div>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('fasilitas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Fasilitas</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama fasilitas" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Tambah Fasilitas</button>
            </form>
        </div>
    </div>

    {{-- Tabel Fasilitas --}}
    <div class="row mt-4">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fasilitas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{-- Form Edit Inline --}}
                               <form action="{{ route('fasilitas.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $item->name }}" required>
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            </form>

                        <td>
                                <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada fasilitas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
