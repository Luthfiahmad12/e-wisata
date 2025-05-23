@extends('layouts.admin', ['title' => 'Edit data rumah makan'])

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer ml-2"></i>Edit Rumah Makan</h1>
        </div>
        <a href="{{ route('rumah_makan.index') }}" class="btn btn-danger">
            Kembali
        </a>
    </div>

    <div class="mb-6">
        <div class="card">
            <form action="{{ route('rumah_makan.update', $rumahMakan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Rumah Makan</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name', $rumahMakan->name) }}">
                        @error('name')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fasilitas Rumah Makan</label>
                        <select id="select2" name="fasilitas[]" multiple
                            class="form-control @error('fasilitas') is-invalid @enderror"
                            data-placeholder="Pilih fasilitas">
                            @foreach ($fasilitas as $item)
                                <option value="{{ $item->id }}" @selected(in_array($item->id, $selectedFasilitasIds))>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('fasilitas')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" cols="30" rows="5" class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $rumahMakan->desc) }}</textarea>
                        @error('desc')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Menu</label>
                        <input type="text" name="menu" value="{{ $menu }}" id="tags_menu"
                            class="form-control @error('menu') is-invalid @enderror">
                        @error('menu')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-content-start">
                        <button type="submit" class="btn btn-warning">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $(document).ready(function() {
                    $('#select2').select2();
                });

                var input = document.getElementById('tags_menu');
                new Tagify(input);
            });
        </script>
    @endpush
@endsection
