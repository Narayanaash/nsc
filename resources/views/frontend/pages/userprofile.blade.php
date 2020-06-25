@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{url('/about')}}"/>
    <title>NSC STATIONERY | User Profile | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
        <!-- Schedule Area Start Here -->
        <section class="schedule-wrap-layout2 pt-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="schedule-box-layout2 pb-5">
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
                    <div class="col-lg-8">
                        <div class="schedule-box-layout2 p-0">
                            <h3 class="schedule-form-title">Update Profile</h3>
                            <div class="schedule-form">
                                <form class="contact-form-box" id="contact-form">
                                    <div class="row gutters-10">
                                        <div class="col-6 form-group">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Full Name *" class="form-control" name="name" id="name" required>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="E-mail *" class="form-control" name="email" id="email" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" placeholder="Phone *" class="form-control" name="phone" id="phone" required>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="password">Password</label>
                                            <input type="password" placeholder="Password *" class="form-control" name="password" id="password" required>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="c_password">Confirm Password</label>
                                            <input type="password" placeholder="Confirm Password *" class="form-control" name="c_password" id="c_password" required>
                                        </div>
                                        <div class="col-12 form-group text-center">
                                            <button type="submit" class="item-btn">Update Now<i class="fas fa-long-arrow-alt-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <div class="pt-5">View all orders done so far: <a href="{{route('frontend.orders')}}"><i class="fa fa-shopping-cart"></i> click here to view</a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Schedule Area End Here -->
        <section class="inner-page-padding pt-0">
            <div class="container">
                <h3>Added Addresses</h3>
                <div class="row">
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                        <div class="widget widget-product-calculate">
                            <div class="heading-layout3">
                                <h3 class="item-title">Address</h3>
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
                        <a href="#" class="fw-btn-fill btn-danger text-textprimary letter-specing-0">Delete<i class="fas fa-trash"></i></a>
                        </div>
                   </div>
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                    <div class="widget widget-product-calculate">
                        <div class="heading-layout3">
                            <h3 class="item-title">Address</h3>
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
                    <a href="#" class="fw-btn-fill btn-danger text-textprimary letter-specing-0">Delete<i class="fas fa-trash"></i></a>
                    </div>
               </div>
                </div>
            </div>
        </section>
@endsection