@extends('user-layout.main')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('/assets/user/images/pink.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>



    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    <div class="cart-list">
                        <table class="table">

                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Action</th>
                                    <th>Product Image</th>
                                    <th>Price</th>
                                </tr>
                            </thead>


                            <tbody>
                                <script>
                                    @if(session('success'))
                                        toastr.success("{{ session('success') }}", '', { className: 'toast-success' });
                                    @endif
                                </script>


                                @foreach ($getCarts as $cart_item)
                                    <tr class="text-center">



                                        <td class="product-remove">
                                            <a href="{{ route('remove-from-cart', ['cart_item' => $cart_item->id]) }}" class="remove-from-cart" style="font-size: 40px;">
                                                <span class="ion-ios-close"></span>
                                            </a>
                                        </td>
                                        <td class="image-prod">
                                            <div class="img"
                                                style="background-image  :  url('{{ asset($cart_item->product->image) }}');">
                                            </div>
                                        </td>



                                        {{-- <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" name="quantity" class="quantity form-control input-number"
                                                    value="1" min="1" max="100">
                                            </div>

                                        </td> --}}

                                        <td class="total">${{ $cart_item->product->price }}</td>
                                    </tr><!-- END TR-->
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" col-md-4  cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Details</h3>


                        <!-- method="get" id="user_details" action="{{ route('make.payment') }}" -->
                        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" >
                            @csrf
                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p><br>
                            </div>
                            @endif

                            <div class="alert alert-info text-center payment-info invisible d-flex">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p class="msg"></p><br>
                            </div>
                            
                            <input type="hidden" class="price" name="price" value="{{ $totalPrice }}" class="form-control" placeholder="">


                            <div class="">
                                <label for="phone">Name on Card</label>
                                <input type="text" name="name" class="form-control" placeholder="">
                            </div>

                            <div class="">
                                <label for="phone">Card Number</label>
                                <input autocomplete='off' name="cardNumber" class='form-control card-number' size='20' type='text'>                      
                            </div>

                            <div class="">
                                <label for="phone">CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' size='4' type='text'>
                                
                            </div>

                            <div class="">
                                <label for="phone">Expiration Month</label>
                                <input class='form-control card-expiry-month' size='2' type='text'>
                            </div>

                            <div class="">
                                <label for="phone">Expirtaion Year</label>
                                <input class='form-control card-expiry-year' size='4' type='text'>
                            </div>
                            <div class="">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="address">Adress</label>
                                <input type="text" name="address" class="form-control" placeholder="">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            
                            <div>
                                <p class="d-flex total-price mt-5 " >
                                    <span>Total Price</span>
                                    <span style="color:red">${{ $totalPrice }}</span>
                                </p>
                            <button class="btn btn-primary py-3 px-4" type="submit">Proceed to checkout</button>



                        </form>
                </div>

            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $.validator.setDefaults({
            ignore: []
        });
        $("#user_details").validate({
            errorClass: 'errors',
            rules: {
                phone: {
                    required: true,
                },
                address: {
                    required: true,
                },
            },
            messages: {
                phone: {
                    required: "Please Enter Phone Number ",
                },
                address: {
                    required: "Please Enter Your Address",
                },
            },
        });
    });
</script>



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
    
      if (response.error) {
        $('.payment-info').removeClass('invisible').find('p').html(response.error.message);
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          var price = $form.find('.price').val();
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.find('.price').empty();
          $form.append("<input type='hidden' name='price' value='" + price + "'/>");
          
          $form.get(0).submit();
      }
  }
});
</script>