@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{url('/about')}}"/>
    <title>NSC STATIONERY | User Login | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
    <!-- Schedule Area Start Here -->
    <section class="schedule-wrap-layout2" style="padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="schedule-box-layout2">
                        <h3 class="schedule-form-title">login</h3>
                        <div class="schedule-form">
                            <form class="contact-form-box" id="contact-form">
                                <div class="row gutters-10">
                                    <div class="col-12 form-group">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="E-mail *" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="password">Password</label>
                                        <input type="password" placeholder="Enter your password *" class="form-control" name="address" id="password" required>
                                    </div>
                                    <div class="col-12 form-group text-center">
                                        <button type="submit" class="item-btn mt-5">Login Now<i class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </div>
                            <div class="text-center">Don't have an account? <a href="{{route('frontend.register')}}">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Schedule Area End Here -->
@endsection