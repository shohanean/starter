<div>
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
                <form wire:submit.prevent="submit">
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
                </form>
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">All Users</span>
                <span class="text-muted mt-1 fw-bold fs-7">Over {{ $users->count() }} new members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            @if (session()->has('user_delete_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Done!</strong> {{ session('user_delete_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 min-w-300px rounded-start">Agent</th>
                            <th class="min-w-125px">Earnings</th>
                            <th class="min-w-150px">Role</th>
                            <th class="min-w-200px text-end rounded-end"></th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ Avatar::create($user->name)->setShape('square') }}"  class="h-75 align-self-end" alt="not found">
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                                {{ $user->name }}
                                            </a>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">
                                                {{ $user->email }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$1,320,000</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>
                                </td>
                                <td>
                                    <span class="badge badge-lg badge-light-primary fw-bold my-2">{{ $user->getRoleNames()->first() }}</span>
                                </td>
                                <td class="text-end">
                                    @if ($user->id != 1)
                                        <button class="btn btn-bg-info text-white btn-active-color-primary btn-sm px-4">Edit</button>
                                        <button wire:click="userDelete({{ $user->id }})" class="btn btn-bg-danger text-white btn-active-color-primary btn-sm px-4 me-2">Delete</button>
                                    @else
                                        <span class="badge bg-secondary text-dark">Changes not allowed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
</div>
