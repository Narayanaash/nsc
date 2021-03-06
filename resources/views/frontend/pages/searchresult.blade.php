@extends('frontend.layouts.app')
@section('meta-tags')
    <title>NSC STATIONERY | Search Result | Top Stationery Supplier in Africa</title>
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
                                    <a href="{{route('frontend.category')}}">Product</a>
                                </li>
                                <li>
                                    {{count($products)}} Search results for: “{{$keyword}}”
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area Start Here -->
        <section class="inner-page-padding">
            <div class="container">
                <div class="row _5-column-fix">
                   <div class="col-lg-9">
                        <div class="row">
                            <div class="col-12">{!!$msg ?? ''!!}</div>
                            @if(count($products) == 0)
                            <div class="col-md-12">
                                <img src="{{asset('frontend/img/404.jpg')}}" alt="404" style="background-color: #d8d8d8;width: 900px;height: 506px;">
                            </div>
                            @else
                            @foreach($products as $single_product)
                            <div class="col-md-3 col-sm-6 p-search-width-50">
                                <div class="service-box-layout1 category-box">
                                    <div class="item-img item-img2 relative">
                                        <img class="lazy" src="{{asset('frontend/img/loading.gif')}}" data-src="{{asset('assets/product/'.$single_product->file.'')}}" data-srcset="{{asset('assets/product/'.$single_product->file.'')}}" alt="service">
                                        {{-- <!--<div class="product-price-fixed">-->
                                        <!--    <b>R {{$single_product->price}}</b>-->
                                        <!--</div>--> --}}
                                    </div>
                                    <div class="item-content item-content-product">
                                        <p><a href="{{route('frontend.checkout', ['p_id' => encrypt($single_product->id)])}}" title="{{$single_product->name}}">
                                            {{$single_product->name}}
                                        </a></p>
                                        <a class="btn btn-info" href="{{route('frontend.checkout', ['p_id' => encrypt($single_product->id)])}}">VIEW</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="row" id="pagination-nav">
                            @if(count($products) != 0)
                            {{$products->links()}}
                            @endif
                        </div>
                   </div>
                   {{-- sidebar --}}
                   <div class="col-lg-3 sidebar-break-md sidebar-widget-area">
                        <div class="widget widget-category">
                            <div class="heading-layout3 mg-b-10">
                                <h3 class="item-title">Categories</h3>
                            </div>
                            @if(count($category_to_index_category) == 0)
                                <div class="col-md-12">
                                    <h5 class="text-danger text-center">Sorry! No category found</h5>
                                </div>
                            @endif
                            <div class="service-list">
                                <ul>
                                    @foreach($category_to_index_category as $single_category)
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
                   <div style="width: 100%; height: 50px;"></div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
@endsection
@section('script')
<!-- js goes here -->
@endsection