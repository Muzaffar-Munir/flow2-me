@extends('layout.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container1" class="app-container container-fluid  flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title flex-column justify-content-center flex-wrap me-3">
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mt-5 mb-5">
                            <!--begin::Breadcrumb-->
                            <h2>Flowers-2me.com</h2>
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">Home</li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">Dashboard</li>
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        </div>
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #F1416C;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-3">
                                                <!--begin::Icon-->
                                                <div title="Users" class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                                                    <a href="{{ route('users.index') }}"><i class="fa-solid mt-5 fa-users text-white fs-2qx lh-0"></i></a>
                                                </div>
                                                <!--end::Icon-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-3">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
                                                    {{-- <span class="fs-4hx text-white fw-bold me-6">{{ $totalUsers }}</span> --}}
                                                    <div class="fw-bold fs-6 text-white">
                                                        {{-- <span class="d-block">All Users</span> --}}
                                                        <span class=""></span>
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                                                <!--begin::Progress-->
                                                <div class="fw-bold text-white py-2">
                                                    {{-- <span class="fs-1 d-block">{{ $totalUsersLast24Hours }}</span>
                                                    <span class="opacity-50">Total Users Register in 24 Hours</span> --}}
                                                </div>
                                                <!--end::Progress-->
                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    {{-- <div class="col-xl-3">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #7239EA;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-3">
                                                <!--begin::Icon-->
                                                <div title="Battles under progress" class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                                                    <i class="fa-brands fa-battle-net text-white fs-2qx lh-0"></i>
                                                </div>
                                                <!--end::Icon-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-3">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fs-4hx text-white fw-bold me-6">{{ $totalBattles }}</span>
                                                    <div class="fw-bold fs-6 text-white">
                                                        <span class="d-block">All Battle</span>
                                                        <span class=""></span>
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                                                <!--begin::Progress-->
                                                <div class="fw-bold text-white py-2">
                                                    <span class="fs-1 d-block">{{ $totalBattlesLast24Hours }}</span>
                                                    <span class="opacity-50">Total Battles in 24 Hours</span>
                                                </div>
                                                <!--end::Progress-->
                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div> --}}
                                    {{-- <div class="col-xl-3">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #f0545e;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-3">
                                                <!--begin::Icon-->
                                                <div title="Orders" class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #eb515b">
                                                    <a href="{{ route('order.index') }}"><i class="fa-solid mt-5 fa-cart-plus text-white fs-2qx lh-0"></i></a>
                                                </div>
                                                <!--end::Icon-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-3">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fs-4hx text-white fw-bold me-6">{{ $totalOrders }}</span>
                                                    <div class="fw-bold fs-6 text-white">
                                                        <span class="d-block">All Orders</span>
                                                        <span class=""></span>
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                                                <!--begin::Progress-->
                                                <div class="fw-bold text-white py-2">
                                                    <span class="fs-1 d-block">{{ $totalPendingOrders }}</span>
                                                    <span class="opacity-50">Pending Orders in 24 Hours</span>
                                                </div>
                                                <!--end::Progress-->
                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div> --}}
                                    {{-- <div class="col-xl-3">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #19D7E4;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-3">
                                                <!--begin::Icon-->
                                                <div title="New feature coming soon" class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #19D7E4">
                                                    <i class="fa-regular fa-cart-plus text-white fs-2qx lh-0"></i>
                                                </div>
                                                <!--end::Icon-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-3">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fs-4hx text-white fw-bold me-6">0</span>
                                                    <div class="fw-bold fs-6 text-white">
                                                        <span class="d-block">Soon</span>
                                                        <span class=""></span>
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                                                <!--begin::Progress-->
                                                <div class="fw-bold text-white py-2">
                                                    <span class="fs-1 d-block">0</span>
                                                    <span class="opacity-50">coming soon new feature</span>
                                                </div>
                                                <!--end::Progress-->
                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div> --}}
                                    <!--end::Col-->
                                </div>

                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--begin::Title-->
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Toolbar container-->
            </div>
        </div>
    </div>
@endsection
