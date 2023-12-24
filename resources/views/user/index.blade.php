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
                            <li class="breadcrumb-item text-muted">Manage Users</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" id="message" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Products-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Manage Users</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataTable">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-100px">Id</th>
                                            <th class="min-w-150px">Full Name</th>
                                            <th class="min-w-50px">Role</th>
                                            <th class="min-w-100px">Email</th>
                                            <th class="min-w-150px">Contact Number</th>
                                            <th class="min-w-50px">status</th>
                                            <th class="min-w-100px">Action</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                       @foreach ($users as $key => $user)
                                            <tr>
                                                <td>
                                                    <div class="text-muted fs-7 fw-bold">{{ $key + 1 }}</div>
                                                    <!--end::Description-->
                                                </td>
                                                <td>
                                                    <div class="text-muted fs-7 fw-bold">
                                                        {{ $user->first_name . ' ' . $user->last_name ?? 'N/A' }}</div>
                                                </td>
                                                <td>
                                                    <div class="text-muted fs-7 fw-bold">{{ $user->roles[0]->name ?? 'N/A' }}</div>
                                                </td>
                                                <td>
                                                    <div class="text-muted fs-7 fw-bold">{{ $user->email ?? 'N/A' }}</div>
                                                </td>

                                                <td>
                                                    <div class="text-muted fs-7 fw-bold">
                                                        {{ $user->userdetails->phone_number ?? 'N/A' }}</div>
                                                </td>
                                                <!--end::Type=-->
                                                <td>
                                                    @if ($user->status == '0')
                                                        <div class="badge badge-danger fs-7 fw-bold">InActive </div>
                                                    @else
                                                        <div class="badge badge-black fs-7 fw-bold">Active </div>
                                                    @endif
                                                </td>
                                                <!--begin::Action=-->
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}"
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
                                                    <a href="javascript:void(0)"
                                                        data-id="{{ route('users.delete', $user->id) }}"
                                                        class="btn btn-icon btn-bg-light btn-active-color btn-sm deleteAnchor"
                                                        data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                        <span class="svg-icon  delete svg-icon-3">
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
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!--end::Table row-->
                                        <!--end::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered">
                                        <!--begin::Modal content-->
                                        <div class="modal-content" >
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 style="margin-left: 160px">Delete User</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color"
                                                    data-bs-dismiss="modal">
                                                    <span class="svg-icon delete svg-icon-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="17.3137"
                                                                width="16" height="2" rx="1"
                                                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                            <rect x="7.41422" y="6" width="16"
                                                                height="2" rx="1"
                                                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y ms-8 mx-xl-50 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_new_card_form" class="form" action=""
                                                    method="POST">
                                                    @csrf
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Label-->
                                                        <div class="ms-10">
                                                            <label class="fs-6 fw-semibold form-label">Are you
                                                                Sure!! You want to delete this User?</label>
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="submit" id="modelclose"
                                                            class="btn btn-light me-3 close">
                                                            No, Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn_create">
                                                            <span class="indicator-label">Delete</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            // Data Table
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            });

            $(document).on('click', '.deleteAnchor', function() {
                $('#kt_modal_new_card_form').attr('action', $(this).data('id'));
            });
            $('#modelclose').click(function(e) {
                e.preventDefault();
                $('#kt_modal_new_card').modal('hide');
            });
        });
        setTimeout(function(){
        $("#message"). hide();
        }, 3000);
    </script>
@endsection

