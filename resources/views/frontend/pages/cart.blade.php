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
                        @if(Session::has('cart'))
                        <div class="item-header">
                            <h3 class="item-title">Your Cart <span>{{count((array) session('cart'))}} Items</span></h3>
                        </div>
                        <div class="product-list" id="quantity-holder">
                            @foreach(session('cart') as $id => $details)
                            <div class="media media-none--xs">
                                <div class="item-img">
                                    <img width="200" src="{{asset('assets/product/checkout/'.$details['photo'])}}" alt="Thumbnail" class="media-img-auto">
                                </div>
                                <div class="media-body space-md">
                                    <h4 class="item-title">{{$details['name']}}</h4>
                                    <div class="product-meta">
                                        <ul>
                                            <li>Code <span>: {{$details['product_code']}}</span></li>
                                            <li>Catg <span>: {{$details['category_name']}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="quantity-area">
                                        <div class="input-group quantity-holder">
                                            <div class="input-group-btn">
                                                <button class="quantity-btn quantity-plus" type="button">
                                                    <i class="fas fa-angle-up" aria-hidden="true"></i>
                                                </button>
                                                <input type="text" name='quantity' id="quantity" class="form-control quantity-input quantity" value="{{$details['quantity']}}">
                                                <button class="quantity-btn quantity-minus" type="button">
                                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                                </button>
                                                <div class="ud">
                                                    <button class="btn btn-info update-cart btn-lg ml-3" data-id="{{ $id }}">Update Quantity</button>
                                                    <button class="btn btn-danger remove-from-cart btn-lg" data-id="{{ $id }}">Delete Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="media media-none--xs">
                                No Data in the Cart.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3  pt-4 pb-5">
                            <a href="./" class="fw-btn-fill bg-accent text-textprimary letter-specing-0"><i class="fas fa-long-arrow-alt-left pr-3"></i>Continue Shopping</a>
                        </div>
                        <div class="col-lg-6"></div>
                        @if(Session::has('cart'))
                        <div class="col-lg-3  pt-4 pb-5">
                            <a href="{{route('product.checkout')}}" class="fw-btn-fill bg-accent text-textprimary letter-specing-0">Enter Address<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Area End Here -->
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parent().parent().find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    })
</script>
@endsection