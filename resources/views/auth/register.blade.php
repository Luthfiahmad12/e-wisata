@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <section class="login-content">
        <div class="logo">
            <h1>E-WISATA</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ route('login.post') }}" method="POST">
                @csrf
                <h3 class="login-head"><i class="bi bi-person me-2"></i>REGISTER</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">NAMA</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="name" name="name" value="{{ old('name') }}" autofocus>
                            @error('name')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">EMAIL</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                            @error('email')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">PASSWORD</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="password" name="password">
                            @error('password')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">NO TELEPON</label>
                            <input class="form-control @error('telepon') is-invalid @enderror" type="text"
                                placeholder="telepon" name="telepon" value="{{ old('telepon') }}" autofocus>
                            @error('telepon')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ALAMAT</label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text"
                                placeholder="address" name="address" value="{{ old('address') }}" autofocus>
                            @error('address')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3 btn-container d-grid">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="bi bi-box-arrow-in-right me-2 fs-5"></i>
                        SIGN IN
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
