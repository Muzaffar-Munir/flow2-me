<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Flowers-2me.com</title>
    <style>
        .errors {
            color: #F00;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row g-0" id="form-row">
                <div class="col-md-5 mx-auto">
                    <div class="myform form mt-4">
                        <form action="{{route('reset.password.post')  }}" id="rest_password" method="post"
                            name="login">
                            @csrf
                            <input type="hidden" name="token" id="" value="{{ $data->token }}">
                            <div class="success-alert">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if (Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group mt-2">
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Your email" value="{{ $data->email }}" readonly />

                            </div>
                            <div class="form-group mt-2">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Enter New Password" />

                            </div>
                            <div class="form-group mt-2">
                                <input type="password" name="password_confirmation" class="form-control my-input"
                                    placeholder="Confirm Your Password" />

                            </div>
                            <div class="form-group mt-4">
                                <Button class=" btn btn_create form-control text-white btn_create" id="" type="submit"
                                    style="background: #e30613;">
                                    Reset Password
                                </Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $.validator.setDefaults({
            ignore: []
        });
        $("#rest_password").validate({
            errorClass: 'errors',
            rules: {
                password_confirmation: {
                    required: true,
                    minlength: 6,

                },
                password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password",
                },
            },
            messages: {
                password: {
                    required: "Please Enter Your New Password",
                },
                password_confirmation: {
                    required: "Please Enter Your Conform Password",
                },

            },
        });
    });
</script>
