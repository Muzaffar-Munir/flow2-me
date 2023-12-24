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
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1 mb-3">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Home</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Update User</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3 mb-4">
                    <a href="{{ route('users.index') }}" class="btn btn-sm fw-bold btn_create">
                        <span class="fa fa-arrow-left"></span>
                        Go back</a>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('users.update',$user->id)}}" id="cat-form" class="form d-flex flex-column flex-lg-row"
                method="POST">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" name="status"
                                    id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true"
                                data-placeholder="Select an option">
                                <option value="1" @if ($user->status == '1') selected @endif>
                                    Active</option>
                                <option value="0" @if ($user->status == '0') selected @endif>
                                    Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!--begin::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Role</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" name="status"
                                    id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <select class="form-select mb-2" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$role->id == $user->roles[0]->id ? 'selected' : '' }}>{{$role->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Edit User</h2>
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
                                                <label class="required form-label">First Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="first_name" class="form-control mb-2"
                                                    placeholder="First Name" value="{{ $user->first_name}}" />
                                                <!--end::Input-->
                                                @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--begin::Description-->
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Last Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="last_name" class="form-control mb-2"
                                                    placeholder="Last Name" value="{{ $user->last_name }}" />
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
                                                <label class="required form-label">User Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="user_name" class="form-control mb-2"
                                                    placeholder=" user_name" value="{{ $user->userdetails->username ?? 'N/A' }}" />
                                                @error('user_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="email" class="form-control mb-2"
                                                    placeholder="Email" value="{{ $user->email }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A Email is required and recommended to be
                                                    unique.
                                                </div>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class=" form-label">Phone number</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="numer" name="phone_number" class="form-control mb-2"
                                                    placeholder="Phone Number" value="{{ $user->userdetails->phone_number ?? 'N/A' }}" />
                                                <!--end::Input-->
                                                @error('phone_number')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--begin::Description-->

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
                                <span class="indicator-label">Update</span>
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
            $("#cat-form").validate({
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
                    contact_number:{
                        required: true,
                    },
                    roles:{
                        required: true,
                    },
                    status:{
                        required: true,

                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
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
                    contact_number:{
                        required: 'Plese Enter Contact Number',
                    },
                    roles:{
                        required: "Plese Select Role",

                    },
                    status:{
                        required:  "Plese Select Status",
                    },
                    password: {
                        required: 'Plese Enter Password',
                        minlength: 'Password should be at least 6 characters',
                    }
                },
            });
        });
    </script>
@endsection
@endsection
