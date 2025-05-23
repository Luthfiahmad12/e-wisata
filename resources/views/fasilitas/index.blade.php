@extends('layouts.admin', ['title' => 'Daftar Fasilitas'])

@section('content-title')
<div class="app-title">
    <div>
        <h1><i class="bi bi-speedometer ml-2"></i> Daftar Fasilitas</h1>
    </div>
    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary">Tambah Fasilitas</a>
</div>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
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
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('fasilitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada fasilitas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
