@extends('layout.main')
@section('content')
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
</div>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mb-3">
                <!--begin::Brea dcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1 mb-3">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Home</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Permissions</li>
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Add Permission</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3 mb-3">
                <a href="{{ route('permissions.index') }}" class="btn btn-sm fw-bold btn_create">
                    <span class="fa fa-arrow-left"></span>
                    Go back</a>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{ route('permissions.store') }}" id="cat-form" class="form d-flex flex-column flex-lg-row"
            method="POST">
            @csrf
            <!--end::Aside column-->
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
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Add Permission</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div id="perm" class="mb-6 fv-row">
                                        <!--begin::Label-->
                                        <label id="lable" class="required form-label">Permission</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" id="keypress" name="permission" class="form-control mb-2"
                                            placeholder="Permission" value="" />
                                        <!--end::Input-->
                                        
                                        <!--begin::Description-->
                                    </div>
                                    <div id="test" class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Permission</label>
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2" id="select" name="oldpermissionanme"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-allow-clear="true">
                                            <option value="">Select an Option</option>
                                            {{-- @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach --}}
                                        </select>
                                      
                                        <!--end::Datepicker-->
                                    </div>
                                    @error('permissionanme')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                   
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control mb-2"
                                            placeholder="Type" value="" />
                                        <!--end::Input-->
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <!--begin::Description-->
                                    </div>
                                    <!--end::Input group-->
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

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#add_role").validate({
                rules: {
                    role_name: {
                        required: true,
                        maxlength: 50

                    },
                },
                messages: {
                    role_name: {
                        required: "Please Enter Role Name",
                    },
                },
            })

            // Close modal on button click
            $(".modelclose").click(function() {
                $("#kt_modal_add_role").modal('hide');
            });
        });
    </script>
    @if ($errors->any())
        <script type="text/javascript">
            $(document).ready(function() {
                $('#kt_modal_add_role').modal('show');

            });
        </script>
    @endif
@endsection
