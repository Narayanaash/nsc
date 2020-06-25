@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.cart')}}"/>
    <title>NSC STATIONERY | Checkout-address | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
        <!-- Checkout Area Start Here -->
        <section class="inner-page-padding pt-5 mt-5">
            <div class="container">
                <div class="row justify-content-center">
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                        <div class="widget widget-product-calculate">
                            <div class="heading-layout3">
                                <h3 class="item-title">Address<input type="radio" class="ml-3"></h3>
                            </div>
                            <div class="list-item">
                                <ul>
                                    <li>Name :<span>Narayan</span></li>
                                    <li>Email :<span>email@gmail.com</span></li>
                                    <li>phone :<span>9854098540</span></li>
                                    <li>Street Address :<span>xyz</span></li>
                                    <li>City :<span>Guwahati</span></li>
                                    <li>Zip: <span>781029</span></li>
                                    <li>Landmark: <span>abc</span></li>
                                </ul>
                            </div>
                        <a href="#header-search" class="fw-btn-fill btn-success text-textprimary letter-specing-0">Add new address?<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                   </div>
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                    <div class="widget widget-product-calculate">
                        <div class="heading-layout3">
                            <h3 class="item-title">Calculating</h3>
                        </div>
                        <div class="list-item">
                            <ul>
                                <li>4 items :<span>$60.80</span></li>
                                <li class="mb-0">Shipping :<span>$00.00</span></li>
                                <li class="pb-0">Shipping :
                                    <span><input type="text" placeholder="Enter Your Code" class="form-control" name="name"></span>
                                </li>
                                <li>Tax :<span>$00.00</span></li>
                                <li>Total Cost :<span>$60.00</span></li>
                            </ul>
                        </div>
                        <a href="{{route('frontend.checkout.thankyou')}}" class="fw-btn-fill bg-accent text-textprimary letter-specing-0">Proceed To Checkout<i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
               </div>
                </div>
            </div>
        </section>
        <!-- Search Box Start Here -->
        <div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <div class="col-lg-4 offset-4">
                <div class="schedule-box-layout2">
                    <h3 class="schedule-form-title">Add New Address</h3>
                    <div class="schedule-form">
                        <form class="contact-form-box" id="contact-form">
                            <div class="row gutters-10">
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Full Name *" class="form-control" name="name" data-error="zip code field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="email" placeholder="E-mail *" class="form-control" name="email" data-error="email field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Phone *" class="form-control" name="phone" data-error="Phone field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Street Address *" class="form-control" name="address" data-error="Street field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input type="text" placeholder="City *" class="form-control" name="city" data-error="City field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input type="text" placeholder="Zip *" class="form-control" name="zip" data-error="Zip field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group mg-b-20">
                                    <textarea placeholder="Any landmark" class="textarea form-control" name="landmark" id="form-message" rows="4" cols="20" 
                                    data-error="Message field is required" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group text-center">
                                    <button type="submit" class="item-btn">Submit Now<i class="fas fa-long-arrow-alt-right"></i></button>
                                </div>
                            </div>
                            <div class="form-response"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Box End Here -->
        <!-- Checkout Area End Here -->
@endsection