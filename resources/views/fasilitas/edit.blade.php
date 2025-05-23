@extends('layouts.admin', ['title' => 'Edit Fasilitas'])

@section('content')
<div class="app-title">
    <div>
        <h1><i class="bi bi-speedometer ml-2"></i>Edit Fasilitas</h1>
    </div>
    <a href="{{ route('fasilitas.index') }}" class="btn btn-danger">Kembali</a>
</div>

<div class="card">
    <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Fasilitas</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $fasilitas->name) }}">
                @error('name')
                    <div class="form-control-feedback text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</div>
@endsection
