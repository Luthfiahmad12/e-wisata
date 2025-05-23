@extends('layouts.admin', ['title' => 'Tambah data rumah makan'])

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer ml-2"></i>Tambah Rumah Makan</h1>
        </div>
        <a href="{{ route('rumah_makan.index') }}" class="btn btn-danger">
            Kembali
        </a>
    </div>

    <div class="mb-6">
        <div class="card">
            <form action="{{ route('rumah_makan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Rumah Makan</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" autofocus>
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
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('fasilitas')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" cols="30" rows="5" class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
<<<<<<< HEAD
                    <div class="mb-3">
                        <label class="form-label">Menu</label>
                        <input name="menu" type="text" id="input_tags" class="form-control @error('menu') is-invalid @enderror"/>
=======

                    <div class="mb-3">
                        <label class="form-label">Menu</label>
                        <input type="text" name="menu" id="tags_menu"
                            class="form-control @error('menu') is-invalid @enderror">
>>>>>>> 1c1117dc1932bd01c86c1bd638a7746d97e1d1b9
                        @error('menu')
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
<<<<<<< HEAD
            $(document).ready(function() {
                $('#select2').select2();
                $('#input_tags').tagsInput();
=======
            document.addEventListener('DOMContentLoaded', function() {
                $(document).ready(function() {
                    $('#select2').select2();
                });

                var input = document.getElementById('tags_menu');
                new Tagify(input);
>>>>>>> 1c1117dc1932bd01c86c1bd638a7746d97e1d1b9
            });


        </script>

    @endpush
@endsection
