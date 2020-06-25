@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.cart')}}"/>
    <title>NSC STATIONERY | Shopping-Cart | Top Stationery Supplier in Africa</title>
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
                                Shopping Cart
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
                            <h3 class="item-title">Your Cart <span>02 Items</span></h3>
                        </div>
                        <div class="product-list" id="quantity-holder">
                            <div class="media media-none--xs">
                                <div class="item-img">
                                    <img width="200" src="{{asset('assets/product/checkout/1588667441.jpg')}}" alt="Thumbnail" class="media-img-auto">
                                </div>
                                <div class="media-body space-md">
                                    <h4 class="item-title">White Emulsion</h4>
                                    <div class="item-price">R10.00</div>
                                    <div class="product-meta">
                                        <ul>
                                            <li>Code <span>: SS66565</span></li>
                                            <li>Catg <span>: art & craft painting paint brush</span></li>
                                        </ul>
                                    </div>
                                    <div class="quantity-area">
                                        <div class="input-group quantity-holder">
                                            <div class="input-group-btn">
                                                <button class="quantity-btn quantity-plus" type="button">
                                                    <i class="fas fa-angle-up" aria-hidden="true"></i>
                                                </button>
                                                <input type="text" name='quantity' class="form-control quantity-input" value="1" placeholder="1">
                                                <button class="quantity-btn quantity-minus" type="button">
                                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="delete-btn">
                                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                    <div class="float-right"><strong>Total: </strong>R500</div>
                                </div>
                            </div>
                            <div class="media media-none--xs">
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
                                        </ul>
                                    </div>
                                    <div class="quantity-area">
                                        <div class="input-group quantity-holder">
                                            <div class="input-group-btn">
                                                <button class="quantity-btn quantity-plus" type="button">
                                                    <i class="fas fa-angle-up" aria-hidden="true"></i>
                                                </button>
                                                <input type="text" name='quantity' class="form-control quantity-input" value="1" placeholder="1">
                                                <button class="quantity-btn quantity-minus" type="button">
                                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="delete-btn">
                                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                    <div class="float-right"><strong>Total: </strong>R500</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="float-right pt-4"><strong>Grand Total: </strong>R1000</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3  pt-4 pb-5">
                            <a href="./" class="fw-btn-fill bg-accent text-textprimary letter-specing-0"><i class="fas fa-long-arrow-alt-left pr-3"></i>Continue Shopping</a>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-3  pt-4 pb-5">
                        <a href="{{route('frontend.checkout.address')}}" class="fw-btn-fill bg-accent text-textprimary letter-specing-0">Proceed To Checkout<i class="fas fa-long-arrow-alt-right"></i></a>
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