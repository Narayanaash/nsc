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
                                Orders
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
                            <h3 class="item-title">Your orders so far</h3>
                        </div>
                        <div class="product-list" id="quantity-holder">
                            @if(isset($orders) && !empty($orders))
                            @foreach ($orders as $order)
                                @foreach ($order->qoutation_details as $ordr)
                                <div class="media media-none--xs">
                                    <div class="item-img">
                                        <img width="200" src="{{asset('assets/product/checkout/'.$ordr->photo)}}" alt="Thumbnail" class="media-img-auto">
                                    </div>
                                    <div class="media-body space-md">
                                        <h4 class="item-title">{{$ordr->product_name}}</h4>
                                        <div class="item-price">ZAR {{number_format($ordr->price, 2)}}</div>
                                        <div class="product-meta">
                                            <ul>
                                                <li>Code <span>: {{$ordr->product_code}}</span></li>
                                                <li>Catg <span>: {{$ordr->product_category}}</span></li>
                                                <li>Status <span>: <i>{{$ordr->status == 1 ? "Processing" : "Delivered"}}</i></span></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                            {{-- <div class="media media-none--xs">
                                <div class="item-img">
                                    <img width="200" src="{{asset('assets/product/checkout/1588667441.jpg')}}" alt="Thumbnail" class="media-img-auto">
                                </div>
                                <div class="media-body space-md">
                                    <h4 class="item-title">White Emulsion</h4>
                                    <div class="item-price">R20.00</div>
                                    <div class="product-meta">
                                        <ul>
                                            <li>Code <span>: 546SSSDD</span></li>
                                            <li>Catg <span>: art & craft painting paint brush</span></li>
                                            <li>Status <span class="text-success">: Processed</span></li>
                                        </ul>
                                    </div>
                                    <div class="delete-btn">
                                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                    <div class="float-right"><strong>Total: </strong>R500</div>
                                </div>
                            </div> --}}
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