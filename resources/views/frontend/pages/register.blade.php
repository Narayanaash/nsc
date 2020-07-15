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
                        @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="schedule-form">
                            {{ Form::open(['method' => 'post','route'=>'add.customer', 'class' => 'contact-form-box']) }}
                                <div class="row gutters-10">
                                    <div class="col-12 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Name *" class="form-control" name="name" id="name" >
                                        @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="E-mail *" class="form-control" name="email" id="email" >
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" placeholder="Phone *" class="form-control" name="phone" id="phone" >
                                        @if($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="password">Password</label>
                                        <input type="password" placeholder="Enter your password *" class="form-control" name="password" id="password" >
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" placeholder="Enter your password *" class="form-control" name="password_confirmation" id="c_password" >
                                        @if($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @enderror
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

@section('css')
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
@endsection