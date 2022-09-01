<div>
    @include('backend.profile.parts.nav')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Change Password</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="save">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row mb-8">
                        <div class="fv-row col-lg-4">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">
                                <i class="text-info fa fa-key p-2"></i>
                                Current Password
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input wire:model="current_password" type="password" class="form-control form-control-lg" placeholder="Current Password">
                            <!--end::Input-->
                            @if ($disabled == 'disabled')
                                <span class="badge text-danger">Type your correct current password first</span>
                            @endif
                        </div>
                        <div class="fv-row col-lg-4">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">
                                <i class="text-primary fa fa-key p-2"></i>
                                New Password
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input {{ $disabled }} wire:model="password" type="password" class="form-control form-control-lg" placeholder="New Password">
                            <!--end::Input-->
                            @error('password')
                                <span class="badge text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="fv-row col-lg-4">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">
                                <i class="text-success fa fa-key p-2"></i>
                                Current Password
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input {{ $disabled }} wire:model="password_confirmation" type="password" class="form-control form-control-lg" placeholder="Current Password">
                            <!--end::Input-->
                            @error('password_confirmation')
                                <span class="badge text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button {{ $disabled }} type="submit" class="btn btn-primary">Change Password</button>
                </div>
                <!--end::Actions-->
                <input type="hidden">
                <div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
</div>
