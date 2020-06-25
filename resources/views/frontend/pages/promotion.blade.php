@extends('frontend.layouts.app')
@section('meta-tags')
    <title>NSC STATIONERY | Promotion | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
        <!--<section class="inner-page-banner bg-common">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-12">-->
        <!--                <div class="breadcrumbs-area">-->
        <!--                    <ul>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('frontend.home')}}">Home</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            Promotion-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <div class="container">
            <div class="browse-category-home browse-category-about">
                <div class="heading-layout1 about-div" style="margin-bottom: 20px;">
                    <h2 class="item-title" id="service">WE ALSO STOCK...</h2>
                </div>
            </div>
        </div>
        <!-- Blog Area Start Here -->
        <section class="inner-page-padding">
            <div class="container">
                <div class="row">
                   <div class="col-lg-12">
                        <div class="row">
                            @for($i=1; $i<=24; $i++)
                            <div class="promotion-img" style="width: 12.5%">
                                <img class="" src="{{asset('frontend/img/promotion/'.$i.'.jpg')}}" alt="" style="padding: 15px; 5px">
                            </div>
                            @endfor
                        </div>
                   </div>
                   <div style="width: 100%; height: 80px;"></div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
@endsection
@section('script')
<!-- js goes here -->
@endsection