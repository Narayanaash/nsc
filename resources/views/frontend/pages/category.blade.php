@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{url('/buy')}}"/>
    <title>NSC STATIONERY | Buy | Top Stationery Supplier in Africa</title>
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
                                    Product
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
                            @if(count($catgeory) == 0)
                                <div class="col-md-12">
                                    <h5 class="text-danger text-center">Sorry! No data found at the moment</h5>
                                </div>
                            @endif
                            @foreach($catgeory as $single_category)
                            <div class="col-md-3 col-sm-6 width-50">
                                <div class="service-box-layout1 category-box">
                                    <div class="item-img item-img2">
                                        <a href="{{route('frontend.products', ['category_id' => encrypt($single_category->id)] )}}"><img class="lazy" src="{{asset('frontend/img/loading.gif')}}" data-src="{{asset('assets/category/'.$single_category->file.'')}}" data-srcset="{{asset('assets/category/'.$single_category->file.'')}}" alt="service"></a>
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
                            {{$catgeory->links()}}
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
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
@endsection
@section('script')
<!-- js goes here -->
@endsection