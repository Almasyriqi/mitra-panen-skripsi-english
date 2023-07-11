@extends('layouts.auth')

@section('content')
<div class="w-lg-500px bg-body rounded shadow-lg p-10 p-lg-15 mx-auto">
    <div class="mb-12 text-center">
        <div class="text-center mb-4">
            <img alt="Logo" src="{{ asset('assets/images/logo_text.svg')}}" class="h-50px" />
        </div>
        <div class="text-center mb-4">
            <h1 class="fw-bolder">Verifikasi Email</h1>
        </div>
        <div class="text-center mb-4">
            <div class="text-muted">Kami akan mengirimkan kode OTP melalui email Anda. Silahkan masukkan email yang telah terdaftar</div>
        </div>
    </div>
    <form method="POST" action="{{ route('password.email') }}" class="form w-100">
        @csrf
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email"
                autocomplete="off" placeholder="Masukkan Email Anda" value="{{ old('email') ?? '' }}" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                Kirim
            </button>
        </div>
    </form>
</div>
@endsection
