@extends('layouts.admin', ['title' => 'Daftar Penginapan'])

@section('content-title')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer ml-2"></i>Daftar Penginapan</h1>
        </div>
        <a href="{{ route('penginapans.create') }}" class="btn btn-primary">
            Tambah Data
        </a>
    </div>

    <div class="mb-6">
        <table id="myTable" class="table table-responsive table-striped display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penginapan</th>
                    <th>Fasilitas Penginapan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penginapans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @foreach ($item?->details as $detail)
                                <span class="badge text-bg-success fs-6 text-capitalize">
                                    {{ $detail->fasilitas->name }}
                                </span>
                            @endforeach
                        </td>
                        <td>{{ $item->desc }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('penginapans.edit', $item) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('penginapans.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script>
            let table = new DataTable('#myTable');
        </script>
    @endpush
@endsection
