@extends('layout.main')
@section('styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1 mb-3">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Add New Products</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3 mb-3">
                    <a href="{{ route('products.index') }}" class="btn_create btn btn-sm fw-bold">
                        <span class="fa fa-arrow-left"></span>
                        Go back</a>
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
            <!--begin::Form-->
            <form action="{{ route('products.store') }}" id="product-form" class="form d-flex flex-column flex-lg-row"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Image</h2>
                            </div>
                        </div>

                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="image"  accept="image/*" id="image">
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Remove Image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="key-error"></span>
                            </div>
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg.recomended size 400 by 400
                                image files are accepted</div>
                        </div>
                    </div>
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
                                <option value="1" selected="selected">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <!--end::Status-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-10 gap-lg-10">
                                <div class="card card-flush">

                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Add New Product</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 d-flex flex-column gap-5">
                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Product Name </label>
                                            <input type="text" name="name" class="form-control mb-2" id="name"
                                                placeholder="Product name" value="{{ @old('name') }}" />
                                                <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                    @error('name')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                        </div>
                                        <span class="error"></span>
                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Product Price </label>
                                            <input type="numer" name="price" id="price" class="form-control mb-2"
                                                placeholder="Product Price" value="{{ @old('price') }}" />
                                                <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                    @error('price')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                        </div>

                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Users </label>
                                            <select name="user_id" id="user_id" class="form-select form-control"
                                                aria-label=".form-select-sm example">
                                                <option selected disabled>Select Users</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                @error('user_id')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>



                                        <span class="error "></span>
                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Description </label>
                                            <textarea class="form-control mb-2" name="description" id="desc"></textarea>
                                            <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                @error('description')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <span class="error"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="button" class="btn_create btn btn-dange">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content container-->
    </div>
@endsection
@section('scripts') <script>

// (function () {
//     // $('select').selectpicker();
//     // $('#user').selectpicker();
// });
    // const colorPicker = document.getElementById('colorPicker');
    // colorPicker.oninput = function() {
    //     const selectedColor = colorPicker.value;
    //     console.log(selectedColor);
    //     // You can use the selected color value for further processing or manipulation
    // };
</script>
    <script>


        $(document).ready(function() {
            // $('#user').selectpicker();
            // $('select').selectpicker()
            $.validator.setDefaults({
            ignore: []
        });
        $('#product-form').validate({
            rules: {
                name: {
                    required:true,
                    maxlength:100
                },
                description:{
                    required:true,
                    maxlength:5000
                },
                price:{
                    required:true
                },
                brand_id:{
                    required:true
                },
                image:{
                    required:true
                }
            },
            messages: {
                name: {
                    required:'Please enter a name'
                },
                description:{
                    required:'Please enter a description'
                },
                price:{
                    required:'Please enter a price'
                },
                brand_id:{
                    required:'Please enter a brand'
                },
                image:{
                    required:"Please choose an image"
                }
            }
        })

        });
        setTimeout(function(){
        $("#message"). hide();
        }, 3000);
    </script>
@endsection
