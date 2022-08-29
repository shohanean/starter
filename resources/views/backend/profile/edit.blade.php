@extends('layouts.dashboard')

@section('content')

@include('backend.profile.parts.nav')

<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('dashboard_assets/media/svg/avatars/blank.svg') }})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('dashboard_assets/media/avatars/300-1.jpg') }})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
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
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
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
                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="044 3276 454 935">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Site</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="keenthemes.com">
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
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
            </div>
            <!--end::Actions-->
        <input type="hidden"><div></div></form>
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
            <h3 class="fw-bold m-0">Connected Accounts</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Content-->
    <div class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Notice-->
            <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed mb-9 p-6">
                <i class="fa fa-trash fa-2x text-danger p-2"></i>
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1">
                    <!--begin::Content-->
                    <div class="fw-semibold">
                        <div class="fs-6 text-gray-700">
                            You can delete your account by clicking the below link. Once you delete it, you won't be able to undo the action. Only super admin will be able to reactive your account.
                            <a href="#" class="fw-bold">I am sure, I want to delete my account</a>
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
            <!--begin::Items-->
            <div class="py-2">
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <div class="d-flex">
                        <img src="{{ asset('dashboard_assets/media/svg/brand-logos/google-icon.svg') }}" class="w-30px me-6" alt="">
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
                            <div class="fs-6 fw-semibold text-gray-400">Plan properly your workflow</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-solid form-switch">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" checked="checked">
                            <label class="form-check-label" for="googleswitch"></label>
                        </div>
                    </div>
                </div>
                <!--end::Item-->
                <div class="separator separator-dashed my-5"></div>
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <div class="d-flex">
                        <img src="{{ asset('dashboard_assets/media/svg/brand-logos/github.svg') }}" class="w-30px me-6" alt="">
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Github</a>
                            <div class="fs-6 fw-semibold text-gray-400">Keep eye on on your Repositories</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-solid form-switch">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="githubswitch" checked="checked">
                            <label class="form-check-label" for="githubswitch"></label>
                        </div>
                    </div>
                </div>
                <!--end::Item-->
                <div class="separator separator-dashed my-5"></div>
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <div class="d-flex">
                        <img src="{{ asset('dashboard_assets/media/svg/brand-logos/slack-icon.svg') }}" class="w-30px me-6" alt="">
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Slack</a>
                            <div class="fs-6 fw-semibold text-gray-400">Integrate Projects Discussions</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-check-solid form-switch">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="slackswitch">
                            <label class="form-check-label" for="slackswitch"></label>
                        </div>
                    </div>
                </div>
                <!--end::Item-->
            </div>
            <!--end::Items-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button class="btn btn-primary">Save Changes</button>
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Content-->
</div>
<!--end::Connected Accounts-->
@endsection
