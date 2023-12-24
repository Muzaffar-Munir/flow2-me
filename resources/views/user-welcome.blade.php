@extends('user-layout.main')
@section('content')

    <body class="goto-here">
        <section id="home-section" class="hero">
            <div class="home-slider owl-carousel">
                <div class="slider-item js-fullheight">
                    <div class="overlay"></div>
                    <div class="container-fluid p-0">
                        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                            data-scrollax-parent="true">
                            <img class="one-third order-md-last img-fluid" style="height: 100%" src="{{ asset('assets/user/images/pink.jpg')  }}  "
                                alt="">
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading">#New Folwers</span>
                                    <div class="horizontal">
                                        <h1 class="mb-4 mt-3">Latest Collection</h1>
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    @if(session('success'))
                        toastr.success("{{ session('success') }}", '', { className: 'toast-success' });
                    @endif
                </script>

                <div class="slider-item js-fullheight">
                    <div class="overlay"></div>
                    <div class="container-fluid p-0">
                        <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                            data-scrollax-parent="true">
                            <img class="one-third order-md-last img-fluid" src="{{ asset('assets/user/images/polo.jpg') }}"
                                alt="">
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading">#New Folwers</span>
                                    <div class="horizontal">
                                        <h1 class="mb-4 mt-3">New Collection</h1>
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item js-fullheight">
                    <div class="overlay"></div>
                    <div class="container-fluid p-0">
                        <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                            data-scrollax-parent="true">
                            <img class="one-third order-md-last img-fluid" src="{{ asset('assets/user/images/lili.jpg') }}"
                                alt="">
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading">#New Folwers</span>
                                    <div class="horizontal">
                                        <h1 class="mb-4 mt-3">New Collection</h1>
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row no-gutters ftco-services">
                    <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services p-4 py-md-5">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <span class="flaticon-bag"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Free Shipping</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                    there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services p-4 py-md-5">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <span class="flaticon-customer-service"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Support Customer</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                    there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services p-4 py-md-5">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <span class="flaticon-payment-security"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Secure Payments</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                    there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">New Flowers Arrival</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    {{-- looping --}}

                    @foreach ($products as $item)
                    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex" style="cursor: pointer">
                        <div class="product">
                            <a  class="img-prod"><img class="img-fluid"
                                    src="{{ $item->image ? asset($item->image) : asset('assets/user/images/water.jpg') }}" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">

                                </div>
                                <h3>{{ $item->name }}</h3>
                                <div class="pricing">
                                    <p class="price"><span>${{ $item->price }}</span></p>
                                </div>

                                {{-- <p class="bottom-area d-flex px-3">
                                    <form action="{{ route('add_to_cart.store') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                         <button class=" add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
                                    </form>
                                    <button class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></button>

                                </p> --}}
                                <p class="bottom-area d-flex px-3">
                                    <a href="{{ route('add_to_cart.store', ['product_id' => $item['id']]) }}" class="add-to-cart text-center py-2 mr-1">
                                        <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                                    </a>
                                    {{-- <a href="" class="buy-now text-center py-2">
                                        Buy now <span><i class="ion-ios-cart ml-1"></i></span>
                                    </a> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>


    </body>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
