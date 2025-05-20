@extends('layouts.admin', ['title' => 'Tambah data wisata'])

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer ml-2"></i>Tambah Wisata</h1>
        </div>
        <a href="{{ route('wisata.index') }}" class="btn btn-danger">
            Kembali
        </a>
    </div>

    <div class="mb-6">
        <div class="card">
            <form action="{{ route('wisata.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Wisata</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fasilitas Wisata</label>
                        <select id="select2" name="fasilitas[]" multiple
                            class="form-control @error('fasilitas') is-invalid @enderror"
                            data-placeholder="pilih fasilitas">
                            @foreach ($fasilitas as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('fasilitas')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" cols="30" rows="5" class="form-control @error('name') is-invalid @enderror">
                            {{ old('desc') }}
                        </textarea>
                        @error('desc')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-content-start">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#select2').select2();
            });
        </script>
    @endpush
@endsection
