@extends('layout.main')
@section('scripts')
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
                            <li class="breadcrumb-item text-muted">Manage Products</li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                </div>
                <!--begin::Actions-->
                <a href="{{ route('products.create') }}" class="btn btn-danger btn-sm mb-0" style="">Create
                    Product</a>
                <!--end::Actions-->
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" id="message" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card mb-5 mb-xl-8 ">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Manage Products</span>
                        </h3>
                    </div>
                    <form action="{{ route('products.search') }}" method="post" id="search-form">
                        @csrf
                        <div class="col-md-3 mt-2 float-end me-10">
                            <input type="text" name="search" id="search" placeholder="Search by name" value="{{ request('search') }}" class="form-control">
                        </div>
                    </form>
                    <div class="card-body py-3">

                        <div class="table-responsive">
                            <table id="search-table" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-100px">Id</th>
                                        <th class="w-100px"> Name</th>
                                        <th class="w-100px"> Price</th>

                                        <th class="100px"> Status</th>

                                        <th class="w-200px"> Description</th>

                                        <th class="w-100px"> Image</th>
                                        <th class="w-150px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr>
                                        <td class="">{{ $product->id }}</td>
                                        <td class="">
                                            <div class="text-muted fs-7 fw-bold">
                                                {{ $product->name }}
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="text-muted fs-7 fw-bold">
                                                {{'$' . $product->price }}
                                            </div>
                                        </td>

                                        @if ($product->status === 1)
                                        <td>
                                            <span class="badge badge-black ms-5">Acitve</span>
                                        </td>
                                        @else
                                        <td>
                                            <span class="badge badge-danger ms-5">Inactive</span>
                                        </td>
                                        @endif




                                        <div class="text-muted fs-7 fw-bold">
                                            <td class="">
                                                <div class="text-muted fs-7 fw-bold">
                                                    {{ strlen($product->description) > 20 ? substr($product->description, 0, 20) . '...' : $product->description ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td>
                                                @if ($product->image)
                                                <img src="{{ asset('/'.$product->image ?? 'NA') }}" alt="img" width="50px" height="50px">
                                                @else
                                                <span class="badge badge btn_create ps-5" style="width: 50px"> NA</span>
                                                @endif
                                            </td>

                                            <td class="">
                                                {{-- <a href="{{ route('products.show',$product->id) }}" class="btn btn-icon btn-bg-light btn-active-color btn-sm deleteAnchor">
                                                    <span class="svg-icon delete svg-icon-3">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </span>
                                                </a> --}}
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-icon btn-bg-light btn-active-color-dark btn-sm me-1">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-icon btn-bg-light btn-sm deleteAnchor" data-bs-toggle="modal" data-bs-target="#myModelDelete-{{ $key + 1 }}">
                                                    <span class="svg-icon delete svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </td>
                                    </tr>
                                    <!-- delete modal  -->
                                    <div class="modal fade" id="myModelDelete-{{ $key + 1 }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered mw-500px">
                                            <div class="modal-content">
                                                <div class="modal-header pb-0 border-0 justify-content-end" class="">
                                                    <div class="btn btn-sm btn-icon btn-active-color" data-bs-dismiss="modal">
                                                        <span class="svg-icon delete svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="modal-body scroll-y">
                                                    <div class="mw-lg-500px mx-auto">
                                                        <div class="mb-5 text-center">
                                                            <h1 class="mb-3">Delete A Product</h1>
                                                            <div class="modal-body scroll-y ms-8 mx-xl-50 my-7">
                                                                <!--begin::Form-->
                                                                <form id="kt_modal_new_card_form" class="form" action="{{ route('products.destroy', $product->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="d-flex flex-stack">
                                                                        <div class="ms-5">
                                                                            <label class="fs-6 fw-semibold form-label">Are
                                                                                you
                                                                                Sure!! You want to delete this
                                                                                Product?</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center pt-15">
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
                            <!--end::Table-->
                            <div class="d-flex justify-content-center">
                                {!! $products->links() !!}
                            </div>
                        </div>
                        <!--end::Table container-->
                    </div>
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
        // DataTable

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
    setTimeout(function() {
        $("#message").hide();
    }, 3000);
</script>
<script>
    $(document).ready(function() {
        // Function to send the AJAX request
        function searchProducts() {
            var searchTerm = $('#search').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('products.search') }}",
                type: "POST",
                data: {
                    search: searchTerm,
                    _token: csrfToken
                }, // Include CSRF token
                success: function(response) {
                    // Update the table body with search results
                    $('#search-table tbody').html(response.products);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Trigger the search when the input value changes
        $('#search').on('input', function() {

            clearTimeout($.data(this, 'timer'));
            var searchTerm = $(this).val();
            $(document).on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                }
            });
            if (!searchTerm) {
                // Clear the table if the search term is empty
                $('#search-table tbody').empty();
                reloadOriginalProducts();
                return;
            }
            $(this).data('timer', setTimeout(searchProducts, 300));
        });

        function reloadOriginalProducts() {
            $.ajax({
                url: "{{ url('clear-search-products') }}", // Replace with the route to fetch original products
                type: "GET",
                success: function(response) {
                    // Update the table body with original products data
                    $('#search-table tbody').html(response.products);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>

@endsection
