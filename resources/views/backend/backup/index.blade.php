@extends('layouts.dashboard')

@section('backup.index')
active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'backup' => 'backup.index'
        ]
    ])
@endsection

@section('content')
    @can('can take backup')
        <!--begin::Card-->
        <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/media/illustrations/sketchy-1/4.png')">
            <!--begin::Card header-->
            <div class="card-header py-10">
                <div class="d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="symbol symbol-circle me-5">
                        <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                            <i class="fa fa-database fa-2x text-danger"></i>
                        </div>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <h2 class="mb-1">Backup</h2>
                        <div class="text-muted fw-bold">
                            @php
                                $total_size = 0;
                            @endphp
                            @foreach ($backups as $backup)
                                @php
                                    $total_size += Storage::size($backup);
                                @endphp
                            @endforeach
                        {{ $total_size }} GB <span class="mx-3">|</span>{{ $backups->count() }} items</div>
                    </div>
                    <!--end::Title-->
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header pt-8">
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                        <!--begin::Export-->
                        <form action="{{ route('backup.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-light-primary me-3">
                                <i class="fa fa-hdd"></i> Take Backup Now (NW)
                            </button>
                        </form>
                        <!--end::Export-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-filemanager-table-toolbar="selected">
                        <div class="fw-bold me-5">
                        <span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Table-->
                <div id="kt_file_manager_list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                    <table id="kt_file_manager_list" data-kt-filemanager-table="files" class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0"><th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" style="width: 29.8906px;">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_file_manager_list .form-check-input" value="1">
                                </div>
                            </th><th class="min-w-250px sorting_disabled" rowspan="1" colspan="1" style="width: 535.766px;">Name</th><th class="min-w-10px sorting_disabled" rowspan="1" colspan="1" style="width: 115.094px;">Size</th><th class="min-w-125px sorting_disabled" rowspan="1" colspan="1" style="width: 321px;">Last Modified</th><th class="w-125px sorting_disabled" rowspan="1" colspan="1" style="width: 125px;"></th></tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        @forelse ($backups as $backup)
                        <tr>
                            <!--begin::Checkbox-->
                            <td><div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1">
                                </div></td>
                            <!--end::Checkbox-->
                            <!--begin::Name=-->
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="text-gray-800 text-hover-primary">{{ $backup }}</span>
                                </div>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Size-->
                            <td>{{ Storage::size($backup) }} bytes</td>
                            <!--end::Size-->
                            <!--begin::Last modified-->
                            <td data-order="2022-06-20T20:43:00+06:00">
                                {{ \Carbon\Carbon::parse(Storage::lastModified($backup))->addHours(6)->format('d M Y, h:i A') }}
                            </td>
                            <!--end::Last modified-->
                            <!--begin::Actions-->
                            <td class="text-end" data-kt-filemanager-table="action_dropdown"><div class="d-flex justify-content-end">
                                    <!--begin::More-->
                                    <div class="ms-2">
                                        <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('backup.show', Crypt::encrypt($backup)) }}" class="menu-link px-3">
                                                    <i class="fa fa-download"></i> <span class="m-1">Download File</span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">

                                                <form action="{{ route('backup.destroy', Crypt::encrypt($backup)) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm menu-link text-danger px-3">
                                                        <i class="fa fa-trash text-danger"></i> <span class="m-1">Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::More-->
                                </div></td>
                            <!--end::Actions-->
                        </tr>
                        @empty
                        <tr>
                            <td colspan="50" class="text-danger text-center">
                                <span class="badge badge-danger">There is no backup yet!</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    @else
        @include('backend.inc.alert.no_permission')
    @endcan
@endsection
