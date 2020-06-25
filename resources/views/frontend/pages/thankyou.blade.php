@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.cart')}}"/>
    <title>NSC STATIONERY | Checkout-address | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
        <!-- Checkout Area Start Here -->
        <section class="inner-page-padding pt-5 mt-2">
            <div class="container">
                <div class="row justify-content-center">
                   <div class="col-lg-4">
                    <div class="jumbotron text-center thank-you">
                        <i class="fa fa-check-circle" aria-hidden="true" style="color: #17bb17;font-size:35px;margin-bottom:10px;"></i>
                        <h1 class="display-3">Thank You!</h1>
                        <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your order.</p>
                        <hr>
                        <p>
                        Having trouble? <a href="{{route('contact')}}">Contact us</a>
                        </p>
                        <p class="lead">
                          <a class="btn btn-primary btn-lg" href="./">Continue shopping</a>
                        </p>
                      </div>
                   </div>
                </div>
            </div>
        </section>
        <!-- Checkout Area End Here -->
@endsection