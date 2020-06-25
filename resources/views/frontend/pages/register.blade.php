@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{url('/about')}}"/>
    <title>NSC STATIONERY | User Register | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
    <!-- Schedule Area Start Here -->
    <section class="schedule-wrap-layout2" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="schedule-box-layout2">
                        <h3 class="schedule-form-title">Register</h3>
                        <div class="schedule-form">
                            <form class="contact-form-box" id="contact-form" autocomplete="off">
                                <div class="row gutters-10">
                                    <div class="col-12 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Name *" class="form-control" name="name" id="name" required>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="E-mail *" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" placeholder="Phone *" class="form-control" name="phone" id="phone" required>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="password">Password</label>
                                        <input type="password" placeholder="Enter your password *" class="form-control" name="address" id="password" required>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" placeholder="Enter your password *" class="form-control" name="address" id="c_password" required>
                                    </div>
                                    <div class="col-12 form-group text-center">
                                        <button type="submit" class="item-btn mt-5">Register Now<i class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </div>
                            <div class="text-center">Already have an account? <a href="{{route('frontend.login')}}">Login</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Schedule Area End Here -->
@endsection