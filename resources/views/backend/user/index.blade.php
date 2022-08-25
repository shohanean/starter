@extends('layouts.dashboard')

@section('toolbar')
    @include('parts.toolbar')
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>Add User</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Billing address-->
            <div class="d-flex flex-column gap-5 gap-md-7">
                <!--begin::Input group-->
                <div class="d-flex flex-column flex-md-row gap-5">
                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                        <!--begin::Label-->
                            <label class="required form-label">Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                            <input class="form-control" name="name" value="">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback">hahahahah</div>
                    </div>
                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                        <!--begin::Label-->
                            <label class="required form-label">Email Address</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                            <input class="form-control" name="email" value="">
                        <!--end::Input-->
                    </div>
                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                        <!--begin::Label-->
                            <label class="required form-label">Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                            <input type="password" class="form-control" name="name" value="">
                        <!--end::Input-->
                    </div>
                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                        <!--begin::Label-->
                            <label class="required form-label">Role</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                            <select class="form-select" name="">
                                <option value="">-Select One Role-</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Input group-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Cancel</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Billing address-->
        </div>
        <!--end::Card body-->
    </div>
</div>
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Member Statistics</span>
            <span class="text-muted mt-1 fw-bold fs-7">Over 500 new members</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 min-w-300px rounded-start">Agent</th>
                        <th class="min-w-125px">Earnings</th>
                        <th class="min-w-125px">Comission</th>
                        <th class="min-w-200px">Company</th>
                        <th class="min-w-150px">Rating</th>
                        <th class="min-w-200px text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label bg-light">
                                        <img src="assets/media/svg/avatars/020-girl-11.svg" class="h-75 align-self-end" alt="">
                                    </span>
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Jessie Clarcson</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$1,320,000</a>
                            <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$6,250</a>
                            <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Intertico</a>
                            <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span>
                        </td>
                        <td>
                            ---
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                        </td>
                    </tr>
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
@endsection

