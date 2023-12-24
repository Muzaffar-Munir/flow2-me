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
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Role Management</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>

                </div>
                <!--end::Toolbar container-->
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
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
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                        @foreach ($roles as $key=> $role)
                            <div class="col-md-4">
                                <!--begin::Card-->
                                {{-- @php
                                $roless = checkroles($role->name);
                            @endphp --}}

                                <div class="card card-flush h-md-100">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>{{ $role->name }}</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-1">
                                        <!--begin::Users-->
                                        <div class="fw-bold text-gray-600 mb-5">Total users with this role:
                                            {{ $role->users->count() }}
                                        </div>
                                        <!--end::Users-->
                                        <!--begin::Permissions-->
                                        @if ($role->permissions->isEmpty())
                                            <p>No permissions assigned.</p>
                                        @else
                                            @foreach ($role->permissions as $permission)
                                                <div class="d-flex flex-column text-gray-600">
                                                    <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if ($role->permissions->count() > 3)
                                                <div class="d-flex align-items-center py-2">
                                                    <span class="bullet bg-primary me-3"></span>
                                                    <em>And Many More...</em>
                                                </div>
                                            @endif
                                        @endif
                                       
                                        <!--end::Permissions-->

                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Card footer-->
                                    <div class="card-footer d-flex pt-0">
                                        <a data-bs-target="#role_delete_{{ $key+1 }}" data-bs-toggle="modal" class="btn btn_create my-1 me-4">
                                            Delete Role
                                        </a>
                                        <a data-bs-target="#role_update-{{ $key+1 }}" data-bs-toggle="modal" class="btn btn_create my-1 me-2">
                                            Edit Role
                                        </a>
                                    </div>
                                    <!--end::Card footer-->
                                </div>
                                <!--end::Card-->
                            </div>
                            {{--  delete role modal::start  --}}
                            <div class="modal fade" id="role_delete_{{ $key+1 }}" tabindex="-1" aria-hidden="true">
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
                                            <div class="mw-lg-450px mx-auto">
                                                <div class="mb-2 text-center">
                                                    <h1 class="mb-3">Delete Role</h1>
                                                    <div class="modal-body scroll-y ms-8 mx-xl-50 my-4">
                                                        <!--begin::Form-->
                                                        <form id="" class="form"
                                                            action="{{ route('roles.delete',$role->id) }}"
                                                            method="get">
                                                            @csrf
                                                            <div class="d-flex flex-stack">
                                                                <div class="ms-5">
                                                                    <label class="fs-6 fw-semibold form-label">Are
                                                                        you
                                                                        Sure!! You want to delete this
                                                                        Role ?</label>
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
                            {{--  delete role modal::ends  --}}
                            {{-- role uodate modal::start  --}}
                            <div class="modal fade" id="role_update-{{ $key+1 }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-800px">
                                    <div class="modal-content">
                                        <div class="modal-header pb-0 border-0 justify-content-end">
                                            <div class="btn btn-sm btn-icon btn-active-color" data-bs-dismiss="modal">
                                                <span class="svg-icon delete svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                            </div>
                                        </div>
                                        <div class="modal-body scroll-y pt-0 pb-0">
                                            <div class="mw-lg-800px mx-auto">
                                                <div class="mb-2">
                                                    <h1 class="mb-4 text-center">Assign Permissions To Role </h1>
                                                    <div class="modal-body ">
                                                        <form id="assign_role_permissions" class="form" action="{{ route('roles.update',$role->id) }}" method="POST">
                                                            @csrf
                                                            <!--begin::Scroll-->
                                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                                                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                                                data-kt-scroll-max-height="auto"
                                                                data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                                                data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-10">
                                                                    <!--begin::Select2-->
                                                                    <select class="form-select mb-2" name="role_id"
                                                                        data-placeholder="Select Role" data-allow-clear="true">
                                                                        <option value="" selected disabled>Select Role</option>
                                                                        @foreach ($roles as $roleName)
                                                                            <option value="{{ $roleName->id }}" @if ($role->id == $roleName->id) selected @endif>{{ $roleName->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="fv-row">
                                                                    <div class="fv-row">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-5 fw-bold form-label mb-2">Assign
                                                                            Permissions</label>
                                                                        <div class="table-responsive">
                                                                            <!--begin::Table-->
                                                                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                                                <!--begin::Table body-->
                                                                                <tbody class="text-gray-600 fw-semibold">
                                                                                    <!--begin::Table row-->
                                                                                    @php $counter = 0; @endphp
                                                                                    @foreach ($permissions as $permission)
                                                                                        @if ($counter == 0)
                                                                                            <tr>
                                                                                        @endif
                                                                                        <td>
                                                                                            <!--begin::Wrapper-->
                                                                                            <div class="d-flex">
                                                                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" 
                                                                                                    @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif
                                                                                                        name="permissions[]">
                                                                                                    <span class="form-check-label">{{ $permission->name }}</span>
                                                                                                </label>
                                                                                            </div>
                                                                                            <!--end::Wrapper-->
                                                                                        </td>
                                                                                        <!--end::Options-->
                                                                                        @php $counter++; @endphp
                                                                                        @if ($counter == 3)
                                                                                            </tr>
                                                                                            @php $counter = 0; @endphp
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <!--end::Table row-->
                                                                                    @if ($counter > 0)
                                                                                        <!-- Fill the last row with empty cells to maintain alignment -->
                                                                                        @while ($counter < 4)
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            @php $counter++; @endphp
                                                                                        @endwhile
                                                                                        </tr>
                                                                                    @endif
                                                                                </tbody>
                                                                            </table>
                                                                            <!--end::Table-->
                                                                        </div>
                                                                        <!--end::Table wrapper-->
                                                                    </div>
                                                                    <!--end::Table wrapper-->
                                                                </div>
                                                                <!--end::Permissions-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                            <!--begin::Actions-->
                                                            <div class="text-center pt-15">
                                                                <button type="button" id="modelclose" class="btn btn-light me-3 modelclose"
                                                                    data-kt-roles-modal-action="cancel"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn_create"
                                                                    data-kt-roles-modal-action="submit">
                                                                    <span class="indicator-label">Submit</span>
                                                                    <span class="indicator-progress">Please wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            {{--  role update modal::ends  --}}
                        @endforeach
                        <!--end::Col-->
                        <!--begin::Add new card-->
                        <div class="ol-md-4">
                            <!--begin::Card-->
                            <div class="card h-md-100">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Button-->
                                    <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                        data-bs-toggle="modal" data-bs-target="#create_roles_modal">
                                        <!--begin::Illustration-->
                                        <img src="{{ asset('assets/media/auth/rolebg.png') }}" alt=""
                                            class="mw-100 mh-150px mb-7" />
                                        <!--end::Illustration-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-3 text-dark-600 delete">Add New Role</div>
                                        <!--end::Label-->
                                    </button>
                                    <!--begin::Button-->
                                </div>
                                <!--begin::Card body-->
                            </div>
                            <!--begin::Card-->
                        </div>
                        <!--begin::Add new card-->
                    </div>
                    <!--end::Row-->
                    <div class="modal fade create_roles_modal" id="create_roles_modal" tabindex="-1" aria-hidden="true">
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
                                            <h1 class="mb-4">Add New Role </h1>
                                            <div class="modal-body">
                                                <form id="add_role" class="form" action="{{route('roles.store')}}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="d-flex flex-column me-n7 pe-7">
                                                        <div class="fv-row mb-1">
                                                            <input class="form-control form-control"
                                                                placeholder="Enter Role Name" name="role_name" />
                                                            @error('role_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
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

              
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
    @endsection
    @section('script')
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        script>
        <script>
            $(document).ready(function() {
                $("#add_role").validate({
                    rules: {
                        role_name: {
                            required: true,
                        },
                    },
                    messages: {
                        role_name: {
                            required: "Please Enter Role Name",
                        },
                    },
                })
            });
            $(document).ready(function () {
                $('#role_update-{{ $key+1 }}').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var roleId = button.data('role-id'); // Extract the role ID from data-* attribute
                    $('#roleSelect').val(roleId).change(); // Set the selected role in the select input
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
