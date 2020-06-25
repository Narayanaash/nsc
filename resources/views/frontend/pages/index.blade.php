@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{url('/')}}"/>
    <title>NSC STATIONERY | Home | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
        <!--<div class="container">-->
        <!--    <div class="browse-category-home">-->
        <!--        <div class="heading-layout1" style="margin-bottom: 20px;">-->
        <!--            <h2 class="item-title" id="service">BROWSE CATEGORIES</h2>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Service Area Start Here -->
        <section class="service-wrap-layout1" style="padding: 0 15px; margin-top: 30px;">
                <div class="row">
                    <div class="col-lg-3 home-left-sidebar d-none d-sm-block">
                        <div class="item-img">
                            <img src="{{asset('frontend/img/brand/3.jpg')}}" alt="Client">
                        </div>
                        <div class="item-img">
                            <img src="{{asset('frontend/img/brand/1.jpg')}}" alt="Client">
                        </div>
                        <div class="item-img">
                            <img src="{{asset('frontend/img/brand/2.jpg')}}" alt="Client">
                        </div>
                        <div class="item-img">
                            <img src="{{asset('frontend/img/brand/4.jpg')}}" alt="Client">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- Slider Area Start Here -->
                        <div class="slider-area slider-layout2 p-5">
                            <div class="bend niceties preview-1">
                                <div id="ensign-nivoslider-4" class="slides">
                                    <img src="{{asset('frontend/img/slider/1.jpg')}}" alt="slider" title="#slider-direction-1" />
                                    <img src="{{asset('frontend/img/slider/2.jpg')}}" alt="slider" title="#slider-direction-2" />
                                    <img src="{{asset('frontend/img/slider/3.jpg')}}" alt="slider" title="#slider-direction-3" />
                                    <img src="{{asset('frontend/img/slider/4.jpg')}}" alt="slider" title="#slider-direction-4" />
                                    <img src="{{asset('frontend/img/slider/5.jpg')}}" alt="slider" title="#slider-direction-5" />
                                    <img src="{{asset('frontend/img/slider/6.jpg')}}" alt="slider" title="#slider-direction-6" />
                                    <img src="{{asset('frontend/img/slider/7.jpg')}}" alt="slider" title="#slider-direction-7" />
                                    <img src="{{asset('frontend/img/slider/8.jpg')}}" alt="slider" title="#slider-direction-8" />
                                    <img src="{{asset('frontend/img/slider/9.jpg')}}" alt="slider" title="#slider-direction-9" />
                                    <img src="{{asset('frontend/img/slider/10.jpg')}}" alt="slider" title="#slider-direction-10" />
                                    <img src="{{asset('frontend/img/slider/11.jpg')}}" alt="slider" title="#slider-direction-11" />
                                    <img src="{{asset('frontend/img/slider/12.jpg')}}" alt="slider" title="#slider-direction-12" />
                                    <img src="{{asset('frontend/img/slider/13.jpg')}}" alt="slider" title="#slider-direction-13" />
                                    <img src="{{asset('frontend/img/slider/14.jpg')}}" alt="slider" title="#slider-direction-14" />
                                    <img src="{{asset('frontend/img/slider/15.jpg')}}" alt="slider" title="#slider-direction-15" />
                                    <img src="{{asset('frontend/img/slider/16.jpg')}}" alt="slider" title="#slider-direction-16" />
                                </div>
                            </div>  
                        </div>
                        <!-- Slider Area End Here -->
                    <div class="row _5-column-fix">
                        <div class="col-md-12 p-5">
                            <div class="browse-category-home">
                <div class="heading-layout1" style="margin-bottom: 5px;">
                    <h2 class="item-title" id="service">BROWSE CATEGORIES</h2>
                </div>
            </div>
                        </div>
                        @if(count($category_to_index_category) == 0)
                            <div class="col-md-12">
                                <h5 class="text-danger text-center">Sorry! No data found at the moment</h5>
                            </div>
                        @endif
                        @foreach($category_to_index_category as $single_category)
                        <div class="col-md-3 col-sm-2 width-50 p-5">
                            <div class="service-box-layout1 category-box home">
                                <div class="item-img item-img2">
                                    <a href="{{route('frontend.products', ['category_id' => encrypt($single_category->id)] )}}"><img class="lazy" src="{{asset('frontend/img/loading.gif')}}" data-src="{{asset('assets/category/'.$single_category->file.'')}}" data-srcset="{{asset('assets/category/'.$single_category->file.'')}}" alt=""></a>
                                </div>
                                <div class="item-content">
                                    <p><a href="{{route('frontend.products', ['category_id' => encrypt($single_category->id)] )}}" title="{{$single_category->heading}}">
                                    {{$single_category->heading}} 
                                    </a></p>
                                    <a class="btn btn-info" href="{{route('frontend.products', ['category_id' => encrypt($single_category->id)] )}}">view</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row" id="pagination-nav">
                        {{$category_to_index_category->links()}}
                    </div>
               </div>
                {{-- sidebar --}}
                <div class="col-lg-3 sidebar-break-md sidebar-widget-area">
                    <div class="widget widget-category">
                        <div class="heading-layout3 mg-b-10">
                            <h3 class="item-title">Categories</h3>
                        </div>
                        @if(count($category_headings) == 0)
                            <div class="col-md-12">
                                <h5 class="text-danger text-center">Sorry! No category found</h5>
                            </div>
                        @endif
                        <div class="service-list">
                            <ul>
                                @foreach($category_headings as $single_category)
                                <li>
                                    <a href="{{route('frontend.products', ['category_id' => encrypt($single_category->id)] )}}" title="{{$single_category->heading}}">{{$single_category->heading}}<span>
                                        @php
                                        $count = DB::table('product')->where('category_id', $single_category->id)->count();
                                        echo "(".$count.")";
                                        @endphp
                                    </span></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
               </div>
                </div>
        </section>
        <!-- Service Area End Here -->
        <!-- Testimonial Area Start Here -->
        <section class="container testimonial-wrap-layout1 mt-30">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="rc-carousel nav-control-layout1" data-loop="true" data-items="10" data-margin="30"
                        data-autoplay="false" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="false"
                        data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                        data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                        data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
                        data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="true"
                        data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="true"
                        data-r-extra-large-dots="false">
                            <div class="testimonial-box-layout1">
                                <div class="item-quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <ul class="item-rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>“ Ok so this is pretty simple... Apart from prompt delivery and overall friendliness... The price is very competitive, I saved R300 by purchasing all the school supplies from them instead of getting it through the school itself. Additionally, the fact that they have more products than just stationary, definitely sets them apart from the rest! ”</p>
                                <h3 class="item-title">Liza Schoeman</h3>
                                <div class="item-subtitle">Happy Customer</div>
                            </div>
                            <div class="testimonial-box-layout1">
                                <div class="item-quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <ul class="item-rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>“ Very professional, efficient , friendly and proactive. Super fast delivery. They offer the best service ever regardless if you require office supplies or scholar supplies, best customer service ever. Would recommend them anytime. Website is very user friendly with so many options. ”</p>
                                <h3 class="item-title">Adiva Maphalala</h3>
                                <div class="item-subtitle">Happy Customer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="hide-on-phone" style="height: 50px;"></div>
        <!-- Testimonial Area End Here -->
        <!-- Brand Area Start Here -->
        <section class="brand-wrap-layout1 d-block d-sm-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="brand-box-layout1">
                            <div class="item-img">
                                <img src="{{asset('frontend/img/brand/1.jpg')}}" alt="Client">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="brand-box-layout1">
                            <div class="item-img">
                                <img src="{{asset('frontend/img/brand/2.jpg')}}" alt="Client">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="brand-box-layout1">
                            <div class="item-img">
                                <img src="{{asset('frontend/img/brand/3.jpg')}}" alt="Client">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="brand-box-layout1">
                            <div class="item-img">
                                <img src="{{asset('frontend/img/brand/4.jpg')}}" alt="Client">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Brand Area End Here -->
@endsection
@section('script')
<!-- js goes here -->
@endsection