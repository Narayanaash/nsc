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
                        @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="schedule-form">
                            {{ Form::open(['method' => 'post','route'=>'login.customer', 'class' => 'contact-form-box']) }}
                                <div class="row gutters-10">
                                    <div class="col-12 form-group">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="E-mail *" class="form-control" name="email" id="email" required>
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="password">Password</label>
                                        <input type="password" placeholder="Enter your password *" class="form-control" name="password" id="password" required>
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
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