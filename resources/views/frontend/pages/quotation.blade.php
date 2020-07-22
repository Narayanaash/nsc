@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.cart')}}"/>
    <title>NSC STATIONERY | Quotation | Top Stationery Supplier in Africa</title>
    <style>
        body {
            background-color: whitesmoke !important;
        }
        .item-header, .widget-product-calculate {
            background-color: white;
            box-shadow: 0 1px 1px #0000002e;
        }
        .widget-product-calculate .list-item ul li {
            margin-bottom: 0 !important;
            padding-bottom: 9px !important;
            border-bottom: 0 !important;
        }
    </style>
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
                                Quotation
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Quotation Start Here -->
    <section class="inner-page-padding pt-0 pb-5 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 sidebar-break-md sidebar-widget-area">
                    <div class="widget widget-product-calculate pb-0 pt-5">
                        <div class="heading-layout3">
                            <h3 class="item-title">Address</h3>
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
                    </div>
               </div>
               <div class="col-lg-7">
                    <div class="cart-page-box-layout1">
                        <div class="item-header quotation-strong">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="q-group">
                                        <strong>Quotation number: <span class="text-muted">KJDSHGF65465</span></strong>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="q-group">
                                        <strong>Date of request: <span class="text-muted">20/02/20</span></strong>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="q-group">
                                        <strong>Status: <span class="text-muted">Delivered</span></strong>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="q-group">
                                        <strong>Date of approval: <span class="text-muted">20/02/20</span></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-page-box-layout1">
                        <div class="item-header quotation-strong">
                            <div class="row">
                                <table class="table table-borderless">
                                    <thead>
                                      <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>USB Pend Drive</td>
                                        <td>4</td>
                                        <td>R125</td>
                                        <td>R500</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>USB Pend Drive</td>
                                        <td>4</td>
                                        <td>R125</td>
                                        <td>R500</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td>USB Pend Drive</td>
                                        <td>4</td>
                                        <td>R125</td>
                                        <td>R500</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-right pr-2">
                        <h3>Total: R500</h3>
                      </div>
               </div>
            </div>
        </div>
    </section>
    <!-- Quotation End Here -->
@endsection
@section('script')
<!-- js goes here -->
@endsection