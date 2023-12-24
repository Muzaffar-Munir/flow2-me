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
                                <li class="breadcrumb-item text-muted">Manage Privacy Statement</li>
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                    </div>
                    <a class="btn btn_create btn-sm mb-0" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_share_earn">Create Privacy Statement</a>
                </div>
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
            <!--begin::Modal -->
            <div class="modal fade" id="kt_modal_share_earn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-600px">
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
                        <div class="modal-body scroll-y pt-0 pb-10">
                            <div class="mw-lg-600px mx-auto">
                                <div class="mb-5">

                                    <h1 class="mb-4 text-center">Add Privacy Statement </h1>
                                    <div class="modal-body ">
                                        <form action="{{ route('privacy-statement.store') }}" method="post"
                                            id="add_privacy">
                                            @csrf
                                            <div class="fv-row d-flex flex-column">
                                                <textarea class="myeditorinstance" name="description"></textarea>
                                                @error('description')
                                                  <div class="alert alert-danger">
                                                    {{ $message }}</div>
                                                @enderror
                                                <div class="text-muted fs-7"></div>
                                            </div>
                                            <div class="form-group mt-5  float-end" id="button">
                                                <button class="btn btn_create">save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--ends::create -->
        <div class="card mb-5 mb-xl-8 ">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Recent Privacy Statement</span>
                </h3>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-200px">Id</th>
                                <th class="min-w-300px"> Privacy Statement</th>
                                <th class="min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-500">
                            @foreach ($privacy_statments as $key => $privacy_statment)
                                <tr>
                                    <td>
                                        <div class="text-muted fs-7 fw-bold">
                                            {{ $privacy_statment->id ?? '' }}
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-muted fs-7 fw-bold">
                                            <span class="content-main-one1">
                                                {{ strip_tags(substr( $privacy_statment->description ?? '', 0, 1000)) }}
                                            </span>
                                            <span class="content-main-two1">
                                                {{ strip_tags( $privacy_statment->description ?? '') }}
                                            </span>
    
                                            @if (strlen( $privacy_statment->description ?? '') > 500)
                                                <a href='javascript:;' class="show_hide1">Read more
                                                </a>
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <a class="btn btn-icon btn-bg-light btn-active-color-dark btn-sm me-1 edit-btn"
                                            data-bs-toggle="modal" data-bs-target="#myModel-edit-{{ $key + 1 }}">
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="03"
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
                                        <div class="modal fade edit-modal" id="myModel-edit-{{ $key + 1 }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered mw-600px">
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
                                                    <div class="modal-body scroll-y pt-0 pb-15">
                                                        <div class="mw-lg-600px mx-auto">
                                                            <div class="mb-13 text-center">
                                                                <h1 class="mb-3">Update Privacy Statement</h1>
                                                                <div class="modal-body ">
                                                                    <form class="update-form"
                                                                        action="{{ route('privacy-statement.update', $privacy_statment->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                          <div class="fv-row d-flex flex-column">
                                                                            <textarea class="myeditorinstance" name="description">{!! $privacy_statment->description !!}</textarea>
                                                                            <div class="text-muted fs-7"></div>
                                                                            @error('description')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mt-5 float-end"
                                                                            id="button">
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
                                    </td>
                                </tr>
                                <div class="modal fade" id="myModelDelete-{{ $key + 1 }}" tabindex="-1"
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
                                            <div class="modal-body scroll-y pt-0 pb-7">
                                                <div class="mw-lg-500px mx-auto">
                                                    <div class="mb-5 text-center">
                                                        <h1 class="mb-3">Delete Privacy Statement</h1>
                                                        <div class="modal-body scroll-y ms-8 mx-xl-50 my-7">
                                                            <!--begin::Form-->
                                                            <form id="kt_modal_new_card_form" class="form"
                                                                action="{{ route('privacy-statement.destroy', $privacy_statment->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="d-flex flex-stack">
                                                                    <div class="">
                                                                        <label class="fs-6 fw-semibold form-label">Are
                                                                            you
                                                                            Sure!! You want to delete this
                                                                            Privact Satment?</label>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center pt-5">
                                                                    <button type="submit" id="modelclosed"
                                                                        class="btn btn-light me-3 close "
                                                                        data-bs-dismiss="modal">
                                                                        No, Cancel
                                                                    </button>
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
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 13-->
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.tiny.cloud/1/bjxd15crfvgdw9h8je1tdmwiybmvs1kje979xeyjr78poifp/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> 
    <script>
        tinymce.init({
            selector: 'textarea.myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            placeholder: 'Enter Descriptions here',
            mode: "textareas",
            // theme : "advanced",
            force_br_newlines: false,
            force_p_newlines: false,
            forced_root_block: '',

        });
    </script>
    <script>
        $(document).ready(function() {
            // Data Table
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            });
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $.validator.setDefaults({
                ignore: []
            });
            $("#add_privacy").validate({
                rules: {
                    description: {
                        required: true,
                    }
                },
                messages: {
                    description: {
                        required: "Please Enter Description",
                    }
                },
            });
            $(".update-form").validate({
                rules: {
                    description: {
                        required: true,
                    }
                },
                messages: {
                    description: {
                        required: "Please Enter Description",
                    }
                },
            });
            $('.edit-btn').click(function() {
                var deleteBtn = $(this).next('.deleteAnchor');
                var modal = deleteBtn.next('.edit-modal');
                modal.find('.update-form').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please Enter Brand name",
                        },
                    },
                });
            });
        });
        setTimeout(function() {
            $("#message").hide();
        }, 3000);
    </script>
@endsection
