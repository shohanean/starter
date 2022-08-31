@extends('layouts.auth')

@section('content')
<!--begin::Form-->
<form class="form w-100" method="POST" action="{{ route('register') }}">
    @csrf
    <!--begin::Heading-->
    <div class="mb-10 text-center">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">Create an Account</h1>
        <!--end::Title-->
        <!--begin::Link-->
        <div class="text-gray-400 fw-bold fs-4">Already have an account?
        <a href="{{ route('login') }}" class="link-primary fw-bolder">Login here</a></div>
        <!--end::Link-->
    </div>
    <!--end::Heading-->
    <!--begin::Action-->
    <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
    <img alt="Logo" src="{{ asset('dashboard_assets') }}/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in with Google</button>
    <!--end::Action-->
    <!--begin::Separator-->
    <div class="d-flex align-items-center mb-10">
        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
        <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
    </div>
    <!--end::Separator-->
    <input type="hidden" value="{{ "User".Str::upper(Str::random(6)) }}" name="name">
    {{-- <!--begin::Input group-->
    <div class="fv-row mb-7">
        <label class="form-label fw-bolder text-dark fs-6">Name</label>
        <input class="@error('name') is-invalid @enderror form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" value="{{ old('name') }}"/>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!--end::Input group--> --}}

    <!--begin::Input group-->
    <div class="fv-row mb-7">
        <label class="form-label fw-bolder text-dark fs-6">Email</label>
        <input class="@error('email') is-invalid @enderror form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" value="{{ old('email') }}"/>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="mb-10 fv-row" data-kt-password-meter="true">
        <!--begin::Wrapper-->
        <div class="mb-1">
            <!--begin::Label-->
            <label class="form-label fw-bolder text-dark fs-6">Password</label>
            <!--end::Label-->
            <!--begin::Input wrapper-->
            <div class="position-relative mb-3">
                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Input wrapper-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Input group=-->
    <!--begin::Input group-->
    <div class="fv-row mb-5">
        <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack justify-content-center">
            {!! NoCaptcha::display() !!}
        </div>
        <!--end::Wrapper-->
        @error('g-recaptcha-response')
            <div class="d-flex flex-stack justify-content-center">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center">
        <button type="submit" class="btn btn-lg btn-primary">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
@endsection
