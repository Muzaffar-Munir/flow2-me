<!DOCTYPE html>

<head>
    @include('layout.css_cdn');
    <style>
        .errors {
            color: #e30613;
            margin-top: 5px;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-color:#FFF !important;
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column ">
                    <!--begin::Logo-->
                    <a href="/" class="mb-7">
                        <img class="register-logo" alt="Logo" src="{{ asset('assets/media/auth/flowers.png') }}"/>
                    </a>
                    <!--end::Logo-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-center w-lg-50 p-10 ">
                <!--begin::Card-->
                <div class="card rounded-3 w-md-550px form-background" style="margin-top: -20px ">
                    <!--begin::Card body-->
                    <div class="card-body p-10 p-lg-20">
                        <!--begin::Form-->
                        <form class="form w-100" method="post" id="register_form"
                            action="{{ route('register.store') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-white fw-bolder mb-3">Register a Account </h1>
                                <!--end::Title-->

                            </div>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <!--begin::Separator-->
                            <div class="separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7"></span>
                            </div>
                            <!--end::Separator-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                @error('first_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!--begin::First Name-->
                                <input type="text" placeholder="First Name:" name="first_name" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <!--end:: First Name-->

                            </div>

                            <div class="fv-row mb-8">
                                @error('last_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!--begin::Last Name-->
                                <input type="text" placeholder="Last Name:" name="last_name" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <!--end:: Last Name-->
                            </div>
                            <!--begin::Email-->
                            <div class="fv-row mb-8">
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!--begin::Email-->
                                <input type="email" placeholder="Email:" name="email"
                                    class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        @error('password')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input class="form-control bg-transparent" type="password"
                                            placeholder="Password:" name="password" autocomplete="off" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-3 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                            </div>


                            <div class="fv-row mb-8">
                                @error('social_media')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!--begin::Last Name-->
                                <input type="text" placeholder="Social Media:" name="social_media" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <!--end:: Last Name-->
                            </div>
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">

                                <button type="submit" class="btn btn_login">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign up</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign up-->
                            <div class="text-black-500 text-center fw-semibold fs-6">Already have an Account?
                                <a href="{{ route('user_login') }}"

                                    class="link-primary signin_color fw-semibold">Sign in
                                 </a>

                            </div>
                            <!--end::Sign up-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--begin::Javascript-->
    @include('layout.js_cdn');
    <!--end::Javascript-->
</body>
<!--end::Body-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $.validator.setDefaults({
            ignore: []
        });
        $("#register_form").validate({
            errorClass: 'errors',
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                first_name: {
                    required: "Please Enter First Name ",
                },
                last_name: {
                    required: "Please Enter Last Name ",
                },
                email: {
                    required: "Please Enter Email ",
                    email: true,
                },
                password: {
                    required: "Please Enter Your Password",
                    minlength: 8,
                },
            },
        });
    });
</script>

</html>
