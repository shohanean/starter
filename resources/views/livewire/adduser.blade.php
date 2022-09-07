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
                @can('can add user')
                    @if (session()->has('user_add_message'))
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: "{{ session('user_add_message') }}"
                            })
                        </script>
                    @endif
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
                                        <input class="form-control @error ('name') is-invalid @enderror" wire:model="name">
                                    <!--end::Input-->
                                    @error ('name')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                    <!--begin::Label-->
                                        <label class="required form-label">Email Address</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                        <input type="email" class="form-control @error ('email') is-invalid @enderror" wire:model="email">
                                    <!--end::Input-->
                                    @error ('email')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                    <!--begin::Label-->
                                        <label class="required form-label">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                        <input type="password" class="form-control @error ('password') is-invalid @enderror" wire:model="password">
                                    <!--end::Input-->
                                    @error ('password')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                    <!--begin::Label-->
                                        <label class="required form-label">Role</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                        <select class="form-select @error ('role_name') is-invalid @enderror" wire:model="role_name">
                                            <option value="">-Select One Role-</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }} (Permissions: {{ $role->getAllPermissions()->count() }})</option>
                                            @endforeach
                                        </select>
                                    <!--end::Input-->
                                    @error ('role_name')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <button type="reset" wire:click="resetForm" class="btn btn-light me-3">Reset</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                    <button wire:offline.attr="disabled" type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Add User</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Billing address-->
                    </form>
                @else
                    @include('backend.inc.alert.no_permission')
                @endcan
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">All Users</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            @can('can see user list')
                @if (session()->has('user_delete_message'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'warning',
                            title: "{{ session('user_delete_message') }}"
                        })
                    </script>
                @endif
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-300px rounded-start">User Info</th>
                                <th class="min-w-150px">Role</th>
                                <th class="min-w-150px">Permissions</th>
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
                                                    <i class="fa fa-envelope"></i> {{ $user->email }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $ean }}
                                        @empty($user->getRoleNames()->first())
                                            <span class="badge bg-secondary text-dark">No Role</span>
                                        @else
                                            <span class="badge badge-lg badge-light-primary fw-bold my-2">{{ $user->getRoleNames()->first() }}</span>
                                        @endempty
                                        <br>
                                        <div class="{{ ($edit_btn_id == $user->id) ? '':'d-none' }} border border-primary p-3 text-center">
                                            <small>Change Role</small>
                                            <select wire:model="role_dropdown" class="">
                                                @foreach ($roles as $role)
                                                    <option {{ ($user->getRoleNames()->first() == $role->name) ? 'selected':'' }} value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </td>
                                    <td>
                                        @forelse ($user->getAllPermissions() as $permission)
                                            <span class="badge badge-light-success text-dark fw-bold my-1">
                                                <i class="fa fa-check-circle"></i>&nbsp;{{ Str::title($permission->name) }}
                                            </span>
                                        @empty
                                            <span class="badge bg-secondary text-dark">No Permission</span>
                                        @endforelse
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        @if ($user->id != 1 && $user->id != auth()->id())
                                            @can ('can edit user')
                                                {{-- Edit Button Start --}}
                                                <button wire:click="userEdit({{ $user->id }})" class="btn btn-bg-info text-white btn-active-color-primary btn-sm px-4">Edit</button>
                                                {{-- Edit Button End --}}
                                            @endcan
                                            @if (!empty($user->deleted_at))
                                                @can ('can restore user')
                                                    <button wire:click="userRestore({{ $user->id }})" class="btn btn-bg-success text-white btn-active-color-primary btn-sm px-4 me-2">
                                                        Restore
                                                    </button>
                                                @endcan
                                            @else
                                                @can ('can delete user')
                                                    <button wire:click="userDelete({{ $user->id }})" class="btn btn-bg-danger text-white btn-active-color-primary btn-sm px-4 me-2">
                                                        Delete
                                                    </button>
                                                @endcan
                                            @endif
                                        @else
                                            @if ($user->id == auth()->id())
                                                <span class="badge bg-secondary text-dark">Your account</span>
                                            @else
                                                <span class="badge bg-secondary text-dark">Changes not allowed</span>
                                            @endif
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            @else
                @include('backend.inc.alert.no_permission')
            @endcan
        </div>
        <!--begin::Body-->
    </div>
</div>
