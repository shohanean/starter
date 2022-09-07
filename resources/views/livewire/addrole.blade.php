<div>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    @can ('can add role')
        <!--begin::Add new card-->
        <div class="ol-md-4">
            <!--begin::Card-->
            <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                        <!--begin::Illustration-->
                        <img src="{{ asset('dashboard_assets/media/illustrations/sketchy-1/4.png') }}" alt="not found" class="mw-100 mh-150px mb-7">
                        <!--end::Illustration-->
                        <!--begin::Label-->
                        <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                        <!--end::Label-->
                    </button>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--begin::Card-->
        </div>
        <!--begin::Add new card-->
    @endcan
    @can('can see role list')
        @forelse ($roles as $role)
            <!--begin::Col-->
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-flush h-md-100">
                    <!--begin::Card header-->
                    <div class="card-header justify-content-end ribbon ribbon-start ribbon-clip">
                        <div class="ribbon-label">Total Users: {{ $role->users->count() }}
                        <span class="ribbon-inner bg-info"></span></div>
                        <div class="card-title">{{ $role->name }}</div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <div class="symbol-group symbol-hover">
                            @foreach ($role->users as $user)
                                <div class="symbol symbol-circle symbol-30px" data-bs-toggle="popover" data-bs-placement="top" title="Name: {{ $user->name }}" data-bs-content="Email Address: {{ $user->email }}">
                                    <img src="{{ Avatar::create($user->name) }}" alt="not found">
                                </div>
                            @endforeach
                        </div>
                        <!--begin::Permissions-->
                        <div class="d-flex flex-column text-gray-600">
                            @forelse ($role->permissions->take(3) as $permission)
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span> {{ Str::title($permission->name) }}
                                </div>
                            @empty
                                <div class="alert alert-warning mt-3" role="alert">
                                    There is no permission added to this role yet
                                </div>
                            @endforelse
                            @if ($role->permissions->count() > 3)
                                <div x-data="{ open: false }">
                                    <span x-show="!open">
                                        <a style="cursor: pointer" @click="open = ! open" class="d-flex align-items-center py-2">
                                            <i class="text-primary fa fa-plus"></i> &nbsp; <em>and {{ $role->permissions->count() - 3 }} more...</em>
                                        </a>
                                    </span>
                                    <div x-show="open" @click.outside="open = false" x-transition>
                                        @foreach ($role->permissions->skip(3) as $permission)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span> {{ Str::title($permission->name) }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer flex-wrap pt-0">
                        @if ($role->name != 'Super Admin')
                            @if ($role->users->count() == 0)
                                @can('can delete role')
                                    <button wire:click="deleterole({{ $role->id }})" class="btn btn-sm btn-danger my-1 me-2">Delete Role</button>
                                @endcan
                            @endif
                            @can ('can edit role')
                                {{-- <button wire:click="editrole({{ $role->id }})" type="button" class="btn btn-sm btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button> --}}
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-light btn-active-light-primary my-1">Edit Role</a>
                            @endcan
                        @else
                            <div class="badge bg-secondary text-dark">Changes not allowed</div>
                        @endif
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        @empty
            Nothing to show
        @endforelse
    @else
        <div class="col-md-4">
            @include('backend.inc.alert.no_permission')
        </div>
    @endcan
</div>
<!--begin::Modal - Add role-->
<div wire:ignore.self class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add a Role</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fa fa-times"></span>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-lg-5 my-7">
                @if (session()->has('role_add_message'))
                    <div class="alert alert-success d-flex align-items-center p-4 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-success">Success!</h4>
                            <span>
                                {{ session('role_add_message') }}
                            </span>
                        </div>
                    </div>
                @endif
                <!--begin::Form-->
                <form wire:submit.prevent="submit">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required">Role name</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="@error('role_title') is-invalid @enderror form-control" placeholder="Enter a role name" wire:model="role_title">
                            @error('role_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                            <!--end::Label-->
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @if($permissions->count() == 0)
                                            <div class="alert alert-danger" role="alert">
                                                There is no permission to show
                                            </div>
                                        @endif
                                        @foreach ($permissions as $permission)
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Label-->
                                                <td class="text-gray-800">{{ Str::title($permission->name) }}</td>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" wire:model="permission">
                                                            <span class="form-check-label">Select</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </td>
                                                <!--end::Options-->
                                            </tr>
                                            <!--end::Table row-->
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Reset</button>
                        @if($permissions->count() != 0)
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                        @endif
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add role-->
<!--begin::Modal - Update role-->
<div wire:ignore.self class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Update Role</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fa fa-times"></span>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 my-7">
                @if (session()->has('role_update_message'))
                    <div class="alert alert-primary d-flex align-items-center p-4 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-dark me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">Updated!</h4>
                            <span>
                                {{ session('role_update_message') }}
                            </span>
                        </div>
                    </div>
                @endif
                <!--begin::Form-->
                <form wire:submit.prevent="update({{ $role_id }})" class="form">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required">Role name</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="@error('role_name') is-invalid @enderror form-control form-control-solid" placeholder="Enter a role name" value="{{ $role_name }}" wire:model="role_name">
                            @error('role_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">Role's Permissions</label>
                            <!--end::Label-->
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @if($permissions->count() == 0)
                                            <div class="alert alert-danger" role="alert">
                                                There is no permission to show
                                            </div>
                                        @endif
                                        <p>ean: {{ print_r($ean) }}</p>
                                        @foreach ($ean as $hu => $ea)
                                            <input wire:model="ea" type="checkbox" {{ $ea }}>{{ $hu }} <br>
                                        @endforeach
                                        {{-- <p>update_permissions: {{ print_r($update_permissions) }}</p> --}}
                                        {{-- <p>update_permissions: {{ print_r($permissions_under_role) }}</p> --}}
                                        @if ($permissions_under_role)
                                            @foreach ($permissions as $permission)
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Label-->
                                                <td class="text-gray-800">{{ Str::title($permission->name) }}</td>
                                                <!--end::Label-->
                                                <!--begin::Input group-->
                                                <td>
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex">

                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                            <input name="update_permissions[]" class="form-check-input" type="checkbox" wire:model="update_permissions" value="{{ $permission->name }}" {{ ($permissions_under_role->contains('name', $permission->name)) ? 'checked' : '' }}>
                                                            <span class="form-check-label {{ ($permissions_under_role->contains('name', $permission->name)) ? 'badge bg-success' : '' }}">
                                                                Select{{ ($permissions_under_role->contains('name', $permission->name)) ? 'ed✓' : '' }}
                                                            </span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </td>
                                                <!--end::Input group-->
                                            </tr>
                                            <!--end::Table row-->
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Update Role</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Update role-->
</div>
