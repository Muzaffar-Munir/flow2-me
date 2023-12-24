@extends('layout.main')
@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-2 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">Home</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Manage Admin Account</li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                </div>
                <a class="btn btn_create btn-sm mb-0" style="" data-bs-toggle="modal" data-bs-target="#box_category_create_modal">Create Admin Account</a>
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
        <!-- create box category  -->
        <!--begin::Modal -->
                        @php
                            $user = auth()->user();
                                $userAvatar =$user->userdetails;
                            @endphp
        <div class="modal fade" id="box_category_create_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-600px">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color" data-bs-dismiss="modal">
                            <span class="svg-icon delete svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <div class="mw-lg-600px mx-auto">
                            <div class="mb-13 text-center">
                                <h1 class="mb-3">Add Admin Account</h1>
                                <div class="modal-body ">
                                    <form method="post" action="{{ route('admin-account.store') }}" id="admin_accounts">
                                        @csrf
                                        <div class="form-group  mb-5 mt-5">
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Balance" name="balance" class="form-control" />
                                            <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                @error('balance')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group  mb-5 mt-5">
                                            <input type="text" placeholder="Enter Wallet Address" name="wallet_address" class="form-control" />
                                            <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                @error('wallet_address')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group mt-5  float-end" id="button">
                                            <input type="submit" value="Save" class="btn btn_create" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ends::create box category  -->
        <!--begin::Tables Widget 13-->
        <div class="card mb-5 mb-xl-8 ">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Recent Admin Accounts</span>
                </h3>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">Id</th>
                                <th class="min-w-100px"> name</th>
                                <th class="min-w-100px"> Balance</th>
                                <th class="min-w-100px">Wallet Address</th>
                                <th class="min-w-100px ">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($admin_accounts as $key => $admin_account)
                            <tr>
                                <td>
                                    <div class="text-muted fs-7 fw-bold">
                                        {{ $key + 1 }}
                                    </div>
                                </td>
                                <td>{{ $admin_account->user->first_name ?? ''}}</td>
                                <td>{{ $admin_account->balance ?? '' }}</td>
                                <td>{{ $admin_account->wallet_address ?? '' }}</td>
                                <td>
                                    <button href="{{url('change-admin-address')}}" class="btn    btn-bg-light btn-active-color-danger btn-sm me-1 edit-btn" disabled  >
                                        Chnage Address
                                    </button>
                                    <a class="btn btn-icon btn-bg-light btn-active-color- btn-sm deleteAnchor" data-bs-toggle="modal" data-bs-target="#myModelDelete-{{ $key + 1 }}">
                                        <span class="svg-icon  delete svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="modal fade edit-modal" id="myModel-edit-{{ $key + 1 }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered mw-600px">
                                            <div class="modal-content">
                                                <div class="modal-header pb-0 border-0 justify-content-end">
                                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="modal-body scroll-y pt-0 pb-15">
                                                    <div class="mw-lg-600px mx-auto">
                                                        <div class="mb-13 text-center">
                                                            <h1 class="mb-3">Update Box Category</h1>
                                                            <div class="modal-body ">
                                                                <form class="update-form" action="{{ route('admin-account.update', $admin_account->id) }}" method="post">
                                                                    @csrf
                                                                    @method('put')

                                                                    <div class="form-group">
                                                                        <input type="text" value="{{ $admin_account->balance }}" placeholder="Enter Balance" name="balance" class="form-control" />
                                                                        <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                                            @error('wallet_address')
                                                                            {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                    <div class="form-group mt-5 mb-5" >
                                                                        <input type="text" value="{{ $admin_account->wallet_address }}" placeholder="Enter wallet Address" name="wallet_address" class="form-control" />
                                                                        <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                                            @error('wallet_address')
                                                                            {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>

                                                                    <div class="form-group mt-5 float-end" id="button">
                                                                        <input type="submit" value="Update" class="btn btn-primary save-btn" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- delete modal  -->
                            <div class="modal fade" id="myModelDelete-{{ $key + 1 }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header pb-0 border-0 justify-content-end">
                                            <div class="btn btn-sm btn-icon btn-active-color" data-bs-dismiss="modal">
                                                <span class="svg-icon delete svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-body scroll-y pt-0 pb-5">
                                            <div class="mw-lg-500px mx-auto">
                                                <div class="mb-13 text-center">
                                                    <h1 class="mb-3">Delete Admin Account</h1>
                                                    <div class="modal-body scroll-y ms-8 mx-xl-50 my-5">
                                                        <!--begin::Form-->
                                                        <form id="kt_modal_new_card_form" class="form" action="{{ route('admin-account.destroy', $admin_account->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="d-flex flex-stack">
                                                                <div class="">
                                                                    <label class="fs-6 fw-semibold form-label">Are
                                                                        you
                                                                        Sure!! You want to delete this
                                                                        Admin Account ?</label>
                                                                </div>
                                                            </div>
                                                            <div class="text-center pt-7">
                                                                <button type="submit" id="modelclosed" class="btn btn-light me-3 close " data-bs-dismiss="modal">
                                                                    No, Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn_create deleteAnchor">
                                                                    <span class="indicator-label">Delete</span>
                                                                    <span class="indicator-progress">Please
                                                                        wait...
                                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
        $("#admin_accounts").validate({
            rules: {
                balance: {
                    required: true,

                },
                wallet_address: {
                    required: true,

                },
            },
            messages: {
                balance: {
                    required: "Please Enter Balance",
                },
                wallet_address: {
                    required: "Please Enter Wallet Address",
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

        $('#kt_modal_new_card_form').attr('action', $(this).data('id'));

    });

    $('.close').click(function(e) {
        e.preventDefault();
        $('#kt_modal_new_card_form').modal(
            'hide',
            function() {
                $('#kt_modal_new_card_form').attr('class', 'fade');
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
