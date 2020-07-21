@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.cart')}}"/>
    <title>NSC STATIONERY | Checkout-address | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
    @if (Session::has('message'))
    <div class="alert alert-success" >{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
        <!-- Checkout Area Start Here -->
        <section class="inner-page-padding pt-5 mt-5">
            <div class="container">
                {{ Form::open(array('route' => 'customer.order', 'method' => 'post', 'class' => 'student')) }}
                <div class="row">
                <div class="col-md-4">
                <div class="rc-carousel address-c" data-loop="false" data-items="3" data-margin="30"
                data-autoplay="false" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="true"
                data-nav="true" data-nav-speed="true" data-r-x-small="1" data-r-x-small-nav="true"
                data-r-x-small-dots="true" data-r-x-medium="1" data-r-x-medium-nav="true"
                data-r-x-medium-dots="true" data-r-small="1" data-r-small-nav="true"
                data-r-small-dots="true" data-r-medium="1" data-r-medium-nav="true"
                data-r-medium-dots="true" data-r-large="1" data-r-large-nav="true"
                data-r-large-dots="true" data-r-extra-large="1" data-r-extra-large-nav="true"
                data-r-extra-large-dots="true">
                @if(isset($address) && !empty($address))
                    @foreach($address as $addr)
                    <div class="brand-box-layout2">
                        <div class="item-img text-left">
                            <div class="widget widget-product-calculate">
                                <div class="heading-layout3">
                                    <h3 class="item-title">
                                        Address<input type="radio" name="address_select" value="{{$addr->id}}" class="ml-3">
                                        @if($errors->has('address_select'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('address_select') }}</strong>
                                        </span>
                                      @enderror
                                    </h3>
                                </div>
                                <div class="list-item">
                                    <ul>
                                        <li>Name :<span>{{$addr->name}}</span></li>
                                        <li>Email :<span>{{$addr->email}}</span></li>
                                        <li>phone :<span>{{$addr->phone}}</span></li>
                                        <li>Street Address :<span>{{$addr->address}}</span></li>
                                        <li>City :<span>{{$addr->city}}</span></li>
                                        <li>Zip: <span>{{$addr->zip}}</span></li>
                                        <li>Landmark: <span>{{$addr->landmark}}</span></li>
                                    </ul>
                                    <input type="hidden" name="name" value="{{ $addr->name }}">
                                    <input type="hidden" name="email" value="{{ $addr->email }}">
                                    <input type="hidden" name="phone" value="{{ $addr->phone }}">
                                    <input type="hidden" name="address" value="{{ $addr->address }}">
                                    <input type="hidden" name="city" value="{{ $addr->city }}">
                                    <input type="hidden" name="zip" value="{{ $addr->zip }}">
                                    <input type="hidden" name="landmark" value="{{ $addr->landmark }}">
                                    <a href="#header-search" class="fw-btn-fill btn-success text-textprimary letter-specing-0">Add new address?<i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <a href="#header-search" class="fw-btn-fill btn-success text-textprimary letter-specing-0">Add new address?<i class="fas fa-long-arrow-alt-right"></i></a>
                    {{-- <div class="brand-box-layout2">
                        <div class="item-img text-left">
                            <div class="widget widget-product-calculate">
                                <div class="heading-layout3">
                                    <h3 class="item-title">Address<input type="radio" name="address" class="ml-3"></h3>
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
                    </div> --}}
                </div>
                </div>
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                    <div class="widget widget-product-calculate">
                        <div class="heading-layout3">
                            <h3 class="item-title">Calculating</h3>
                        </div>
                        @if(Session::has('cart'))
                        <div class="list-item">
                            <ul>
                                <div class="item-img">
                                    <table class="table">
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Item</th>
                                            <th>Qty</th>
                                        </tr>
                                        @foreach(session('cart') as $id => $details)
                                        <tr>
                                            
                                            <td>
                                                {{$details['product_code']}}
                                                <input type="hidden" name="item_code" value="{{ $details['product_code']}}">
                                                <input type="hidden" name="item_name" value="{{ $details['name'] }}">
                                                <input type="hidden" name="item_qty" value="{{ $details['quantity'] }}">
                                                <input type="hidden" name="item_category" value="{{ $details['category_name'] }}">
                                            </td>
                                            <td>
                                                <img width="80" src="{{asset('assets/product/checkout/'.$details['photo'])}}" alt="Thumbnail" class="media-img-auto">
                                            </td>
                                            <td>
                                                {{$details['quantity']}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                   
                                </div>
                            </ul>
                        </div>
                        @endif
                        <button type="submit" class="fw-btn-fill bg-accent text-textprimary letter-specing-0">Send Quotation<i class="fas fa-long-arrow-alt-right"></i></button>
                    </div>
               </div>
            </div>
        </form>
            </div>
        </section>
        <!-- Search Box Start Here -->
        <div id="header-search" class="header-search">
            <button type="button" class="close" id="close">×</button>
            <div class="col-lg-4 offset-4">
                <div class="schedule-box-layout2">
                    <h3 class="schedule-form-title">Add New Address</h3>
                    <div class="schedule-form">
                        <form action="" class="contact-form-box" id="contact_form">
                            <div class="row gutters-10">
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Full Name *" class="form-control" name="name" id="name" data-error="zip code field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="email" placeholder="E-mail *" class="form-control" name="email" id="email" data-error="email field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Phone *" class="form-control" name="phone" id="phone" data-error="Phone field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" placeholder="Street Address *" class="form-control" name="address" id="address" data-error="Street field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input type="text" placeholder="City *" class="form-control" name="city" id="city" data-error="City field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input type="text" placeholder="Zip *" class="form-control" name="zip" id="zip" data-error="Zip field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group mg-b-20">
                                    <textarea placeholder="Any landmark" class="textarea form-control" name="landmark" id="landmark" id="form-message" rows="4" cols="20" 
                                    data-error="Message field is required" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-12 form-group text-center">
                                    <button type="submit" class="item-btn" id="submit">Submit Now<i class="fas fa-long-arrow-alt-right"></i></button>
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

@section('script')
    <script>
        $(document).ready(function(){
            $('#submit').on('click', function(e){
                e.preventDefault();
                $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                }
                });
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var zip = $('#zip').val();
                var landmark = $('#landmark').val();
                $.ajax({
                    url: "{{route('customer.address')}}",
                    method: "POST",
                    data: {name: name, email: email, phone: phone, address: address, city: city, zip: zip, landmark: landmark},
                    success: function(data){
                        if(data == 1){
                            window.location.reload();
                        }else if(data == 2){
                            alert("Something went wrong!");
                        }
                    }
                });
            });
        });
    </script>
@endsection