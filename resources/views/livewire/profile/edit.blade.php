<div>
    @include('backend.profile.parts.nav')

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Edit</h3>
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
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('dashboard_assets/media/svg/avatars/blank.svg') }})">
                                <!--begin::Preview existing avatar-->
                                <div wire:ignore class="image-input-wrapper w-125px h-125px" style="background-image: url({{ ($avatar_link) ? asset($avatar_link) : Avatar::create(auth()->user()->name)->setShape('square') }})"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" wire:model="avatar">
                                    <input type="hidden" name="avatar_remove">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="company" class="form-control form-control-lg" placeholder="Name" value="{{ auth()->user()->name }}">
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Contact Phone</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Phone number" value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Country</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select wire:model="country_id" class="form-select">
                                <option value="">-Select One Country-</option>
                                @foreach ($countries as $country)
                                @if ($country->code == "bd")
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                    @break
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">City</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select class="form-select" @if (empty($cities)) disabled @endif>
                                @if (!empty($cities))
                                    <option value="">-Choose One City-</option>
                                    @foreach ($cities as $city)
                                        <option value="">{{ $city->name }}</option>
                                    @endforeach
                                @else
                                    <option value="">-Choose Country First-</option>
                                @endif
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <!--begin::Options-->
                            <div class="d-flex align-items-center mt-3">
                                <!--begin::Option-->
                                <label class="form-check form-check-inline form-check-solid me-5">
                                    <input class="form-check-input" name="communication[]" type="checkbox" value="1">
                                    <span class="fw-semibold ps-2 fs-6">Email</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label class="form-check form-check-inline form-check-solid">
                                    <input class="form-check-input" name="communication[]" type="checkbox" value="2">
                                    <span class="fw-semibold ps-2 fs-6">Phone</span>
                                </label>
                                <!--end::Option-->
                            </div>
                            <!--end::Options-->
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-0">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked">
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
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

    <!--begin::Connected Accounts-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Account Setting</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div class="collapse show">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed mb-9 p-6">
                    <i class="fa fa-trash fa-2x text-danger p-3"></i>
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <div class="fs-6">
                                You can delete your account by typing the below generated code. Once you delete it, you won't be able to undo the action. Only super admin will be able to reactive your account.
                                <span class="fw-bold text-danger">I am sure, I want to delete my account</span>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4 p-1">
                                    <button disabled="disabled" class="p-2 form-control btn btn-info">
                                        <span class="h1 text-white">{{ $random_code }}</span>
                                    </button>
                                </div>
                                <div class="col-md-4 p-1">
                                    <input class="form-control" type="text" wire:model="typed_code" wire:keyup="checker">
                                </div>
                                <div class="col-md-4 p-1">
                                    <button {{ ($disabled) ? '':'disabled' }} class="form-control btn btn-danger" wire:click="deleteaccount">Delete</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Connected Accounts-->
</div>
