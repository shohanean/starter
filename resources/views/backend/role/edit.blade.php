@extends('layouts.dashboard')

@section('user_management')
here show
@endsection

@section('role.index')
active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'roles' => 'role.index',
            "$role->name" => '',
        ]
    ])
@endsection

@section('content')
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="col-xl-6 m-auto mt-10">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Edit Role</h2>
                </div>
            </div>
            <!--end::Card header-->
            <div class="card-body">
                @if (session('role_update_success'))
                    <div class="alert alert-success">
                        {{ session('role_update_success') }}
                    </div>
                @endif
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!--begin::Billing address-->
                    <div class="d-flex flex-column gap-5 gap-md-7">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                <!--begin::Label-->
                                    <label class="required form-label">Role Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                    <input class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ $role->name }}">
                                <!--end::Input-->
                                @error ('name')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                <!--begin::Label-->
                                    <label class="required form-label">Permission List</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                    {{-- @foreach ($role->getAllPermissions() as $permission) --}}
                                    @foreach ($permissions as $permission)
                                        <div class="form-check form-switch m-4">
                                            <input name="permission[]" value="{{ $permission->name }}" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault_{{ $permission->id }}" {{ ($role->getAllPermissions()->contains('name', $permission->name)) ? 'checked':'' }}>
                                            <label class="form-check-label" for="flexSwitchCheckDefault_{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Edit {{ $role->name }} Role</span>
                                </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Billing address-->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
