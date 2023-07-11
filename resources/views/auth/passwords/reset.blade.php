@extends('layouts.auth')

@section('content')
<div class="w-lg-500px bg-body rounded shadow-lg p-10 p-lg-15 mx-auto">
    <div class="mb-12 text-center">
        <div class="text-center mb-4">
            <img alt="Logo" src="{{ asset('assets/images/logo_text.svg')}}" class="h-50px" />
        </div>
        <div class="text-center mb-4">
            <h1 class="fw-bolder">Reset Password</h1>
        </div>
        <div class="text-center mb-4">
            <div class="text-muted">Silahkan masukkan password baru Anda</div>
        </div>
    </div>
    <form method="POST" action="{{ route('password.update') }}" class="form w-100">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="fv-row mb-5">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="text" name="email"
                autocomplete="off" placeholder="Masukkan Email" value="{{ $email ?? old('email') }}" />
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!--begin::Main wrapper-->
        <div class="fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">
                    Password
                </label>
                <!--end::Label-->

                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password"
                    name="password" autocomplete="off" placeholder="Masukkan password anda" />

                    <!--begin::Visibility toggle-->
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>

                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                    <!--end::Visibility toggle-->
                </div>
                <!--end::Input wrapper-->
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <!--end::Main wrapper-->

        <!--begin::Main wrapper-->
        <div class="fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">
                    Konfirmasi Password
                </label>
                <!--end::Label-->

                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" type="password"
                    name="password_confirmation" autocomplete="off" placeholder="Masukkan konfirmasi password" />

                    <!--begin::Visibility toggle-->
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>

                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                    <!--end::Visibility toggle-->
                </div>
                <!--end::Input wrapper-->
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <!--end::Main wrapper-->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-3 mt-3">
                Reset
            </button>
        </div>
    </form>
</div>
@endsection
