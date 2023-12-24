@extends('layout.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Home</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Manage Permissions</li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a data-bs-toggle="modal" data-bs-target="#create_permission_modal"
                            class="btn btn-sm fw-bold btn_create">
                        Add Permission
                        </a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" id="message" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" id="message" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                {{--  create permission::start --}}
                <div class="modal fade create_permission_modal" id="create_permission_modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-500px">
                        <div class="modal-content">
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <div class="btn btn-sm btn-icon btn-active-color" data-bs-dismiss="modal">
                                    <span class="svg-icon delete svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor" />
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                        </svg>
                                </div>
                            </div>
                            <div class="modal-body scroll-y pt-0">
                                <div class="mw-lg-500px mx-auto">
                                    <div class="mb-3 text-center">
                                        <h1 class="mb-4">Add New Permission </h1>
                                        <div class="modal-body">
                                            <form class="form" action="{{route('permission.store')}}"
                                                method="post">
                                                @csrf
                                                <div class="d-flex flex-column me-n7 pe-7">
                                                    <div class="fv-row mb-1">
                                                        <input class="form-control form-control"
                                                            placeholder="Enter Permission Name" name="permission_name" />
                                                            <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                                @error('permission_name')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="text-end pt-5">
                                                    <button type="submit" class="btn btn_create"
                                                        data-kt-roles-modal-action="submit">
                                                        <span class="indicator-label">Save</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--  create permissin::ends  --}}
                    <!--begin::Permission-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Manage Permissions</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card body-->
                        <div class="card-body pt-0" >
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table id="dataTable" class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-100px">ID</th>
                                            <th class="">Name</th>
                                            <th class="">CREATED DATE</th>
                                            <th class="">Action</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($permissions as $key => $permission)
                                        <tr>
                                            <td>
                                                <div class="text-muted fs-7 fw-bold">{{ $key+1 }}</div>
                                            </td>

                                            <td style="width:30%">
                                                <div class="text-muted fs-7 fw-bold">{{ $permission->name }}</div>
                                            </td>
                                            </td>
                                            <td>
                                                <div class="text-muted fs-7 fw-bold">
                                                    {{ Carbon\Carbon::parse($permission->created_at)->format('d-M-Y  g:i:s A') }}
                                                </div>
                                            </td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#update_permission_modal_{{ $key + 1 }}"
                                                    class="btn btn-icon btn-bg-light btn-active-color-dark btn-sm me-1">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#delete_permission_modal-{{ $key+1 }}"
                                                    class="btn btn-icon  btn-sm deleteAnchor">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon delete svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.5"
                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.5"
                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                        {{--  update permission modal::start  --}}
                                        <div class="modal fade update_permission_modal" id="update_permission_modal_{{ $key + 1 }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered mw-500px">
                                                <div class="modal-content">
                                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                                        <div class="btn btn-sm btn-icon btn-active-color" data-bs-dismiss="modal">
                                                            <span class="svg-icon delete svg-icon-1">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                                        fill="currentColor" />
                                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                                        rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                                </svg>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body scroll-y pt-0">
                                                        <div class="mw-lg-500px mx-auto">
                                                            <div class="mb-3 text-center">
                                                                <h1 class="mb-4">Update Permission </h1>
                                                                <div class="modal-body">
                                                                    <form class="form" action="{{route('permission.update',$permission->id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="d-flex flex-column me-n7 pe-7">
                                                                            <div class="fv-row mb-1">
                                                                                <input class="form-control form-control" 
                                                                                value="{{ $permission->name }}"
                                                                                    placeholder="Enter Permission Name" name="permission_name" />
                                                                                    <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                                                        @error('permission_name')
                                                                                        {{ $message }}
                                                                                        @enderror
                                                                                    </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-end pt-5">
                                                                            <button type="submit" class="btn btn_create"
                                                                                data-kt-roles-modal-action="submit">
                                                                                <span class="indicator-label">Update</span>
                                                                                <span class="indicator-progress">Please wait...
                                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  update permission modal ::ends  --}}
                                        {{--  delete modal::starts  --}}
                                        <div class="modal fade" id="delete_permission_modal-{{ $key+1 }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered mw-500px">
                                                <div class="modal-content">
                                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                                        <div class="btn btn-sm btn-icon btn-active-color"
                                                            data-bs-dismiss="modal">
                                                            <span class="svg-icon delete svg-icon-1">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="6" y="17.3137"
                                                                        width="16" height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="currentColor" />
                                                                    <rect x="7.41422" y="6" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(45 7.41422 6)"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body scroll-y pt-0 pb-5">
                                                        <div class="mw-lg-500px mx-auto">
                                                            <div class="mb-13 text-center">
                                                                <h1 class="mb-3">Delete Permission</h1>
                                                                <div class="modal-body scroll-y ms-8 mx-xl-50 my-4">
                                                                    <!--begin::Form-->
                                                                    <form id="" class="form"
                                                                        action="{{ route('permission.delete', $permission->id) }}"
                                                                        method="get">
                                                                        @csrf
                                                                        <div class="d-flex flex-stack">
                                                                            <div class="ms-5">
                                                                                <label class="fs-6 fw-semibold form-label">Are
                                                                                    you
                                                                                    Sure!! You want to delete this
                                                                                    Permission ?</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center pt-5">
                                                                            <button type="button" class="btn btn-light me-3 close" data-bs-dismiss="modal">No, Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn_create deleteAnchor">
                                                                                <span class="indicator-label">Delete</span>
                                                                                <span class="indicator-progress">Please wait...
                                                                                    <span
                                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                    <!--end::Form-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                              
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Products-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <!--end::Footer-->
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            });
            
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
        });
        setTimeout(function() {
            $("#message").hide();
        }, 3000);
        $('.close').click(function(e) {
            e.preventDefault();
            $('#kt_modal_new_card_form').modal(
                'hide',
                function() {
                    $('#kt_modal_new_card_form').attr('class', 'fade');
                }
            );
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
