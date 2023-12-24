@extends('layout.main')
@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <li class="breadcrumb-item text-muted">Home</li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">Manage User Account</li>
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
                    <strong style="display: block">{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" id="message" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <!--begin::Tables Widget 13-->
            <div class="card mb-5 mb-xl-8 ">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Recent User Accounts</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-capitalize gs-0">
                                    <th class="min-w-100px">Id</th>
                                    <th class="min-w-200px"> User Name</th>
                                    <th class="min-w-200px"> Email</th>
                                    <th class="min-w-200px"> Balance</th>
                                    <th class="min-w-70px ">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($user_accounts as $key => $user_account)
                                    <tr>
                                        <td>
                                            <div class="text-muted fs-7 fw-bold">
                                                {{ $user_account->id}}
                                            </div>
                                        </td>
                                        <td>{{ $user_account->username ?? 'N/A' }}</td>
                                        <td>{{ $user_account->email ?? 'N/A' }}</td>
                                        <td>{{ $user_account->account->balance ?? 'NA' }}</td>
                                        <td>
                                            <a href=""
                                                class="btn btn-icon btn-bg-light btn-active-color-dark btn-sm me-1"
                                                data-bs-target="#user_account_update_model-edit-{{ $key + 1 }}"
                                                data-bs-toggle="modal">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="btn btn-icon btn-bg-light btn-active-color btn-sm deleteAnchor"
                                                data-bs-toggle="modal" data-bs-target="#myModelDelete-{{ $key + 1 }}">
                                                <span class="svg-icon delete svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.5"
                                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.5"
                                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>

                                        </td>
                                    </tr>
                                    <div class="modal fade edit-modal"
                                        id="user_account_update_model-edit-{{ $key + 1 }}" tabindex="-1"
                                        aria-hidden="true">
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
                                                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                <rect x="7.41422" y="6" width="16"
                                                                    height="2" rx="1"
                                                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="modal-body scroll-y pt-0 pb-15">
                                                    <div class="mw-lg-600px mx-auto">
                                                        <div class="mb-13 text-center">
                                                            <h1 class="mb-3">Update User Account</h1>
                                                            <div class="modal-body ">
                                                                <form class="update-form"
                                                                    action="{{ route('user-accounts.update', $user_account->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')

                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            value="{{ $user_account->account->balance ?? '' }}"
                                                                            placeholder="Enter Balance" name="balance"
                                                                            class="form-control" />
                                                                        <span style="color: rgb(199, 33, 33)"
                                                                            class="mt-2">
                                                                        </span>
                                                                    </div>
                                                                    <div class="form-group mt-5 float-end" id="button">
                                                                        <input type="submit" value="Update"
                                                                            class="btn btn_create save-btn" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete modal  -->
                                    <div class="modal fade" id="myModelDelete-{{ $key + 1 }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
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
                                                            <h1 class="mb-3">Delete User Account</h1>
                                                            <div class="modal-body scroll-y ms-8 mx-xl-50 my-7">
                                                                <!--begin::Form-->
                                                                <form id="user_account_form" class="form"
                                                                    action="{{ route('user-accounts.destroy', $user_account->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="d-flex flex-stack">
                                                                        <div class="ms-2">
                                                                            <label class="fs-6 fw-semibold form-label">Are
                                                                                you
                                                                                Sure!! You want to delete this
                                                                                User Account ?</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center pt-15">
                                                                        <button type="submit" id="modelclosed"
                                                                            class="btn btn-light me-3 close "
                                                                            data-bs-dismiss="modal">
                                                                            No, Cancel
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn_create deleteAnchor">
                                                                            <span class="indicator-label">Delete</span>
                                                                            <span class="indicator-progress">Please
                                                                                wait...
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
                                    <!--ends::delete modal-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Tables Widget 13-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            });
            $("#user_accounts").validate({
                rules: {
                    balance: {
                        required: true,
                    },
                },
                messages: {
                    balance: {
                        required: "Please Enter Balance",
                    },
                },
            });
        });
        setTimeout(function() {
            $("#message").hide();
        }, 3000);
    </script>
    <script>
        $(document).on('click', '.deleteAnchor', function() {
            $('#user_account_form').attr('action', $(this).data('id'));
        });
        $('.close').click(function(e) {
            e.preventDefault();
            $('#user_account_form').modal(
                'hide',
                function() {
                    $('#user_account_form').attr('class', 'fade');
                }
            );
        });
        // read More toggle
        $('.content-main-one1').show();
        $('.content-main-two1').hide();
        $('.show_hide1').on('click', function() {
            var txt = $.trim($(this).text());
            if (txt == 'Read more') {
                $(this).closest('p').find('.content-main-one1').hide();
                $(this).closest('p').find('.content-main-two1').show();
                $(this).text('Read less');
            } else {
                $(this).closest('p').find('.content-main-one1').show();
                $(this).closest('p').find('.content-main-two1').hide();
                $(this).text('Read more');
            }
        });
    </script>
@endsection
