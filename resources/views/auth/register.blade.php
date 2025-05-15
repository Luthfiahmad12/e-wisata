@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <section class="login-content">
        <div class="logo">
        </div>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">

                    <h1 class="text-white text-center mb-4">Register</h1>

                    <div class="card" style="border-radius: 15px;">
                        <form action="{{ route('register.post') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" />
                                        @error('password')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">No Telepon</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                            name="telepon" value="{{ old('telepon') }}" />
                                        @error('telepon')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <select name="jk"
                                            class="form-control @error('jk')
                                            is-invalid
                                        @enderror">
                                            <option value="">--pilih gender--</option>
                                            <option value="m">Pria</option>
                                            <option value="f">Wanita</option>
                                        </select>
                                        @error('jk')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Foto</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" name="photo"
                                            class="form-control @error('photo')
                                            is-invalid
                                        @enderror" />
                                        @error('photo')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-2">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea name="address" cols="30" rows="3"
                                            class="form-control @error('address')
                                            is-invalid
                                        @enderror">
                                            {{ old('address') }}
                                        </textarea>
                                        @error('address')
                                            <div class="form-control-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <button type="submit" class="btn btn-primary btn-block btn-md mb-6">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
