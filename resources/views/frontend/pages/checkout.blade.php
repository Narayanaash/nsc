@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{route('frontend.checkout', ['p_id' => encrypt($product_checkout[0]->id)])}}"/>
    <title>NSC STATIONERY | Checkout | Top Stationery Supplier in Africa</title>
@endsection
@section('facebook-meta-tag')
  <meta property="og:url"           content="{{route('frontend.checkout', ['p_id' => encrypt($product_checkout[0]->id)])}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$product_checkout[0]->name}}" />
  <meta property="og:description"   content="NSC Stationery Supplies is a Stationery Supplier in Pretoria Laudium , Gauteng South Africa." />
  <meta property="og:image"         content="{{asset('assets/product/'.$product_checkout[0]->file.'')}}" />
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
                              <a class="text-capitalize" href="{{route('frontend.products', ['category_id' => encrypt($product_checkout[0]->category_id)] )}}">{{$product_checkout[0]->heading}}</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Blog Area Start Here -->
  <section class="inner-page-padding" style="margin-bottom: 40px;">
      <div class="container">
          <div class="row _5-column-fix">
             <div class="col-lg-9">
                  <div class="row">
                      <div class="service-box-layout4 w-100 padding-left-15">
                          <div class="media media-none--md">
                              <div class="item-img checkout-image">
                                  <img class="zoom" src="{{asset('assets/product/checkout/'.$product_checkout[0]->file.'')}}" title="{{$product_checkout[0]->name}}" alt="service" style="height: auto;">
                              </div>
                              <div class="media-body space-lg">
                                  <h2 class="item-title buy-now-title">{{$product_checkout[0]->name}}</h2>
                                  <div class="num-block skin-2">
                                    <div class="num-in">
                                      <span class="minus dis"></span>
                                      <input type="text" class="in-num" value="1" readonly="">
                                      <span class="plus"></span>
                                    </div>
                                  </div>
                                  <a class="buy-btn" href="#header-search"><img src="{{asset('frontend/img/btn.jpg')}}" alt="service"></a>
                                  <ul class="code-category" style="margin-top: 25px;">
                                      <li>CODE: {{$product_checkout[0]->product_code == '' ? 'n/a' : $product_checkout[0]->product_code}}</li>
                                      <li>Categories: <a style="color: #6f6f6f;" href="{{route('frontend.products', ['category_id' => encrypt($product_checkout[0]->category_id)] )}}">{{$product_checkout[0]->heading}}</a></li>
                                      {{-- share --}}
                                      <li class="share">
                                        <i class="fa fa-share-alt" style="padding-right: 5px;font-size: 18px;margin-left: 3px;"></i> Share: 
                                        <div id="facebook-share" class="fb-share-button" data-href="{{route('frontend.checkout', ['p_id' => encrypt($product_checkout[0]->id)])}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('frontend.checkout', ['p_id' => encrypt($product_checkout[0]->id)])}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">fb
                                        </a>
                                        </div>
                                      </li>
                                  </ul>
                                  <!-- Your share button code -->
                              </div>
                          </div>
                      </div>
                  </div>
                  @if(count($products) != 0)
                  <div class="row" style="padding-right: 15px;">
                    <div class="col-md-12">
                      <h3 class="related-products-h3">RELATED PRODUCTS</h3>
                      <div class="rc-carousel checkout-slider" data-loop="false" data-items="12" data-margin="15"
                      data-autoplay="false" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="false"
                      data-nav="true" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="true"
                      data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="true"
                      data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true"
                      data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true"
                      data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true"
                      data-r-large-dots="false" data-r-extra-large="4" data-r-extra-large-nav="true"
                      data-r-extra-large-dots="false">
                        @foreach($products as $single_product)
                        <div class="service-box-layout1 category-box p_carousel" style="margin:0;border: 2px solid #ececec;padding: 5px 0;box-shadow: unset;">
                                  <div class="item-img item-img2">
                                      <img src="{{asset('assets/product/'.$single_product->file.'')}}" alt="" style="height: 145px; width: 145px; margin: auto; background-color: #e8e8e8;">
                                  </div>
                                  <div class="item-content">
                                      <p style="font-size: 82%;"><a href="{{route('frontend.checkout', ['p_id' => encrypt($single_product->id)])}}" title="{{$single_product->name}}">
                                          {{$single_product->name}}
                                      </a></p>
                                      <a class="btn btn-info" href="{{route('frontend.checkout', ['p_id' => encrypt($single_product->id)])}}">VIEW</a>
                                  </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                      {{-- @foreach($products as $single_product)
                      <div class="col-md-3">
                          <div class="service-box-layout1 category-box">
                              <div class="item-img item-img2">
                                  <img class="lazy" src="{{asset('frontend/img/loading.gif')}}" data-src="{{asset('assets/product/'.$single_product->file.'')}}" data-srcset="{{asset('assets/product/'.$single_product->file.'')}}" alt="service">
                              </div>
                              <div class="item-content">
                                  <p><a href="{{route('frontend.checkout', ['p_id' => encrypt($single_product->id)])}}">
                                      {{$single_product->name}}
                                  </a></p>
                                  <a class="btn btn-info" href="{{route('frontend.checkout', ['p_id' => encrypt($single_product->id)])}}">VIEW</a>
                              </div>
                          </div>
                      </div>
                      @endforeach --}}
                  </div>
                  @endif
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
  <!-- Search Box Start Here -->
  <div id="header-search" class="header-search">
      <button type="button" class="close">×</button>
      <form class="header-search-form checkout-form relative" id="checkout-submit-form">
        <div class="form-group row">
          <label for="productName" class="col-sm-3 col-form-label product-label">Product :</label>
          <div class="col-sm-9 product-name">
            <textarea class="form-control-plaintext disabled"  id="productName" readonly style="resize: none;">{{$product_checkout[0]->name}}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="code" class="col-sm-3 col-form-label product-label">Code :</label>
          <div class="col-sm-5 product-name">
            <input type="text" readonly class="form-control-plaintext disabled" id="code" value="{{$product_checkout[0]->product_code == '' ? 'n/a' : $product_checkout[0]->product_code}}">
          </div>
        </div>
        <!--<div class="form-group row">-->
        <!--  <label for="price" class="col-sm-3 col-form-label">Price :</label>-->
        <!--  <div class="col-sm-5">-->
        <!--    <input type="text" readonly class="form-control-plaintext disabled" id="price" value="R {{$product_checkout[0]->price}} Incl">-->
        <!--  </div>-->
        <!--</div>-->
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Name :</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required="">
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-3 col-form-label">Phone :</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" maxlength="15" id="phone" placeholder="Enter your phone" required="">
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 p-2" style="font-size: 100%;">SUBMIT</button>
        <div id="response" class="text-center"><p>Response here</p></div>
        <div class="contact-form-loading"><i class="fas fa-spinner fa-spin"></i></div>
      </form>
  </div>
  <!-- Search Box End Here -->
@endsection
@section('script')
<!-- js goes here -->
<script>
$("#checkout-submit-form").submit(function(e) {

  e.preventDefault();

  var customer_name   = $('#name').val();
  var customer_phone = $('#phone').val();

  $(".contact-form-loading").css("display", "block");
  $("#checkout-submit-form :input").prop("disabled", true);
     $.ajax({
      type: "POST",
      url: '{{route('frontend.checkout.submit', ['p_id' => encrypt($product_checkout[0]->id)])}}',
      data: {
         _token: "{{csrf_token()}}",
        "customer_name"  : customer_name,
        "customer_phone" : customer_phone,
      },
      success: function(response){
        $('#response').html(response);
        $('#response p').css('visibility', 'visible');
        $("#checkout-submit-form :input").prop("disabled", false);
        $(".contact-form-loading").css("display", "none");
       }
    });
});
</script>
@endsection