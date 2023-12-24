@extends('layout.main')
@section('styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->

        <!--end::Toolbar container-->
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">

                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1 mb-2">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Home</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Update Profile</li>
                        <!--end::Item-->
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <!--begin::Form-->
                            @php
                            $user = auth()->user();
                                $userAvatar =$user->userdetails;
                            @endphp
            <form action="{{ route('userprofile.update',['id' => $user->id]) }}" class="profile-update-form" class="form d-flex flex-column flex-lg-row"
                method="POST" enctype="multipart/form-data">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Update Profile</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label">First Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="first_name" class="form-control mb-2"
                                                placeholder="First Name"
                                                value="{{ @old('first_name', $user_profile->first_name ?? '') }}"
                                                 />
                                            <!--end::Input-->
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--begin::Description-->

                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label">Last Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="last_name" class="form-control mb-2"
                                                placeholder="Last Name" value="{{ @old('last_name', $user_profile->last_name ?? "" ) }}"
                                                 />
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Input-->
                                            <!--begin::Description-->

                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class=" form-label">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="Email" class="form-control mb-2"
                                                placeholder="Product name" value="{{ @old('email', $user_profile->email ?? '') }}"
                                                disabled="disabled" />
                                            <!--end::Input-->
                                            @error('Email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label">Phone number</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="phone_number" class="form-control mb-2"
                                                placeholder="Phone Number"
                                                value="{{ @old('phone_number', $user_profile->userdetails->phone_number ?? '') }}"
                                                 />
                                            <!--end::Input-->
                                            @error('contact_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label">Password</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" name="password" class="form-control mb-2"
                                                placeholder="enter your password" />
                                            <!--end::Input-->
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label">Image</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="file" name="avatar" class="form-control mb-2"
                                                placeholder="userprofile avatar" value="{{ $user_profile->userdetails->avatar ?? '' }}"
                                                 />
                                                 @if(isset($user_profile->userdetails->avatar))
                                                 <img src="{{ asset($user_profile->userdetails->avatar) }}" alt="avatar" width="100px" height="100px">
                                             @endif
                                            <!--end::Input-->
                                            @error('avatar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="submit" id="button" class="btn btn_create">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content container-->
    </div>

@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $.validator.setDefaults({
                    ignore: []
                });
            $(".profile-update-form").validate({
                rules: {
                    first_name:{
                        required: true,
                        maxlength: 100,
                    },
                    last_name:{
                        required: true,
                        maxlength: 100,
                    },

                    email:{
                        required: true,
                        email: true,

                    },
                    phone_number:{
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    avatar:{
                        required:true,
                    },
                },
                messages: {
                    first_name:{
                        required: 'Plese Enter the First Name',
                    },
                    last_name:{
                        required: 'Plese Enter the Last Name',
                    },
                    email: {
                        required: 'Plese Enter Emial',
                        email: "Please enter a valid email address.",
                    },
                    phone_number:{
                        required: 'Plese Enter Contact Number',
                    },
                    password: {
                        required: 'Plese Enter Password',
                    },
                    avatar:{
                        required:'choose an avatar for profile'
                    }

                },
            });
        });
    </script>
@endsection
@endsection
