@extends('layout.main')
@section('styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1 mb-3">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Product Detail</li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3 mb-3">
                    <a href="{{ route('products.index') }}" class="btn_create btn btn-sm fw-bold">
                        <span class="fa fa-arrow-left"></span>
                        Go back</a>
                </div>
            </div>
            <!--begin::Form-->
            <form action="" id="product-form"
                class="form d-flex flex-column flex-lg-row" method="" enctype="multipart/form-data">
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Product Image</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px">
                                    <img src="{{ asset('/' . $product->image) }}" width="100"  class="mt-2" height="120"
                                    alt="product image">
                                </div>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Remove Image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="error mt-2"></span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
                                data-placeholder="Select an option" disabled>
                                <option value="0" @if ($product->status == '0') selected @endif>
                                    Active</option>
                                <option value="1" @if ($product->status == '1') selected @endif>
                                    Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-10 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Product Detail</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 d-flex flex-column gap-5">
                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Product Name </label>
                                            <input type="text" name="name" class="form-control mb-2"
                                                placeholder="Product Name" value="{{$product->name }}" disabled />
                                                <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                    @error('name')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                        </div>
                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Product Price </label>
                                            <input type="text" name="price" class="form-control mb-2"
                                                placeholder="Product Price" value="{{'$' . $product->price }}" disabled/>
                                                <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                    @error('price')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                        </div>
                                       
                                        <div class="fv-row d-flex flex-column">
                                            <label class="required form-label">Description </label>
                                            <textarea class="form-control" name="description" disabled>{{ $product->description }}</textarea>
                                            <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                @error('description')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="fv-row d-flex flex-column mt-4">
                                            <label class="form-label">Chose your color </label><br>
                                            <input type="color" id="colorPicker" value="{{ $product->product_color }}"
                                                name="product_color" disabled><br>
                                                <span style="color: rgb(199, 33, 33)" class="mt-2">
                                                    @error('product_color')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content container-->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
        });
    </script>
     <script>
        $(document).ready(function() {
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

            }
        })

        });
        setTimeout(function(){
        $("#message"). hide();
        }, 3000);
    </script>
@endsection
