@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <section class="login-content">
        <div class="logo">
            <h1>E-WISATA</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ route('login.post') }}" method="POST">
                @csrf
                <h3 class="login-head"><i class="bi bi-person me-2"></i>LOGIN DASHBOARD</h3>
                <div class="mb-3">
                    <label class="form-label">EMAIL</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email"
                        name="email" value="{{ old('email') }}" autofocus>
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
                {{-- <div class="mb-3">
                    <div class="utility">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="label-text">
                                    Stay Signed in
                                </span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2">
                            <a href="#" data-toggle="flip">Forgot Password ?</a>
                        </p>
                    </div>
                </div> --}}
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
