@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.cart')}}"/>
    <title>NSC STATIONERY | Orders | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
    <section class="inner-page-banner bg-common">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <ul>
                            <li>
                                <a href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>
                                Queries
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Area Start Here -->
    <section class="inner-page-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-page-box-layout1">
                        <div class="item-header">
                            <h3 class="item-title">Your Queries so far <span class="text-success">02</span></h3>
                        </div>
                        <div class="product-list" id="quantity-holder">
                            @if(isset($checkout_data) && !empty($checkout_data))
                            @foreach($checkout_data as $data)
                            <div class="media media-none--xs">
                                <div class="item-img">
                                    <img width="200" src="{{asset('assets/product/checkout/'.$data->file)}}" alt="Thumbnail" class="media-img-auto">
                                </div>
                                <div class="media-body space-md">
                                    <h4 class="item-title">{{$data->name}}</h4>
                                    <div class="item-price">ZAR {{number_format($data->price, 2)}}</div>
                                    <div class="product-meta">
                                        <ul>
                                            <li>Code <span>: {{$data->code}}</span></li>
                                            <li>Status <span class="text-success">: Processed</span></li>
                                            <li>Process Date <span class="text-success">: {{$data->date}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="delete-btn">
                                        <a href="{{route('product.add_to_cart', ['id' => $data->product_id])}}" class="btn btn-warning">Add To Cart</i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3  pt-4 pb-5">
                            <a href="./" class="fw-btn-fill bg-accent text-textprimary letter-specing-0"><i class="fas fa-long-arrow-alt-left pr-3"></i>Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Area End Here -->
@endsection
@section('script')
<!-- js goes here -->
@endsection