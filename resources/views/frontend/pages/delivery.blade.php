@extends('frontend.layouts.app')
@section('meta-tags')
    <title>NSC STATIONERY | Delivery | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
<div class="container" id="this">
    <div class="browse-category-home browse-category-about">
        <div class="heading-layout1 about-div" style="margin-bottom: 20px;">
            <h2 class="item-title" id="service">DELIVERY INFORMATION</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Delivery to <em><b class="text-primary text-italic">Laudium & Erasmia</b></em>  areas are free with R500 minimum order.</p>
            <ul style="list-style-type:disc;">
                <li>A Courier delivery fee will be charged for other areas.</li>
                <li>Note this is only a guide and exclusions can be made.</li>
                <li>Products such as Rubber Stamps, Ink Cartridges usually qualify for Free Delivery in most areas in South Africa tmc. applied.</li>
                <li>Outlying areas are being couriered and therefore can't deliver heavy items. (Please contact us for confirmation)</li>
                <li>A delivery time frame of 72 days all around South Africa is based on stock items and not items that need to be ordered in.</li>
            </ul>
            <em>We will keep you posted on your order status.</em>
        </div>
    </div>
    <div style="width: 100%; height: 60px;"></div>
</div>
<style>
    #this li {
        line-height: 25px;
        padding: 10px 0;
    }
    #this li:first-child {
        padding-top: 0;
    }
    #this ul {
        margin-left: 20px;
    }
</style>
@endsection
@section('script')
<!-- js goes here -->
@endsection