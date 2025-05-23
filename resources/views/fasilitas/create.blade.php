@extends('layouts.admin', ['title' => 'Tambah Fasilitas'])

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer ml-2"></i>Tambah Fasilitas</h1>
        </div>
        <a href="{{ route('fasilitas.index') }}" class="btn btn-danger">Kembali</a>
    </div>

    <div class="mb-6">
        <div class="card">
            <form action="{{ route('fasilitas.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Fasilitas</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
