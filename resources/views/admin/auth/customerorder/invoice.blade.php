@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
  @if (Session::has('message'))
    <div class="alert alert-success" >{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Orders View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Order summary</strong></h3>
            </div>
            <div class="panel-body">
              <div class="row float-right">
                <div class="col-md-12">
                  Qoutation ID: #{{$qoutation->id}} <br>
                  Name: {{$qoutation->customer->name}} <br>
                  Address: {{$qoutation->address->street_address}}
                </div>
              </div>
                <div class="table-responsive">
                  {{ Form::open(['method' => 'post','route'=>'order.price_update', 'class' => 'main-form full']) }}
                  {{-- {{-- <input type="hidden" name="productId" value="{{$checkout->product_id}}"> --}}
                  <input type="hidden" name="qoutation_id" value="{{$qoutation->id}}">
                  <input type="hidden" name="customer_id" value="{{$qoutation->customer->id}}">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td>Sl. No</td>
                                <td><strong>Photo</strong></td>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @php
                              $count = 1;
                            @endphp
                            @foreach ($qoutation->qoutation_details as $qt)
                            <tr>
                                <td>{{$count}}</td>
                                <td><img width="100" src="{{asset('assets/product/checkout/'.$qt->photo)}}" alt="Thumbnail" class="media-img-auto"></td>
                                <td>{{$qt->product_name}}</td>
                                <td class="text-center">
                                    <input type="hidden" name="product_id[]" value="{{$qt->id}}">
                                    <input type="number" name="price[]" id="price" value="{{$qt->price}}" required placeholder="Enter the Rate" class="form-control price">
                                  @if($errors->has('price'))
                                  <span class="invalid-feedback" role="alert" style="color:red">
                                      <strong>{{ $errors->first('price') }}</strong>
                                  </span>
                                  @enderror
                                </td>
                                <td class="text-center">
                                  <input type="number" name="quantity" id="quantity" value="{{$qt->quantity}}" required class="form-control quantity">
                                  @if($errors->has('quantity'))
                                  <span class="invalid-feedback" role="alert" style="color:red">
                                      <strong>{{ $errors->first('quantity') }}</strong>
                                  </span>
                                  @enderror
                                </td>
                                <td class="text-right"><label class="subtotal"></label></td>
                            </tr>
                            @php
                              $count++
                            @endphp
                            @endforeach
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total Quantity</strong></td>
                                <td class="no-line text-right"><label class="totalquantity"></label></td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right"><label class="grandtotal"></label></td>
                                <input type="hidden" name="grand_total" id="grand_total">
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-6">
                        @php
                          $check = App\Qoutation::where("id", $qoutation->id)->value('status');
                        @endphp
                        @if($check == 4 || $check == 3)
                          <button disabled class="btn btn-danger text-center">Rejected</button>
                        @elseif($check == 2)
                          <button disabled class="btn btn-success text-center">Dispatched</button>
                        @else
                          <button type="submit" class="btn btn-primary text-center" name="send" id="send">Send Order</button>
                        @endif
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


@section("script")
<script type="text/javascript">

$(document).ready(function(){
    CalculateSubTotals();
    CalculateTotal();
    $('.quantity , .price').on('change', function(){
      UpdateTotals(this);
    });
});
function UpdateTotals(elem) {
    // This will give the tr of the Element Which was changed
    var quantity = 0.0;
    var price = 0.0;
    var subtotal = 0.0;
    var $container = $(elem).parent().parent();
    quantity = $container.find('.quantity').val();
    price = $container.find('.price').val();
    subtotal = parseInt(quantity) * parseFloat(price) || 0;
    $container.find('.subtotal').text(subtotal.toFixed(2));
    CalculateTotal();
}
function CalculateSubTotals() {
    // Calculate the Subtotals when page loads for the 
    // first time
    var lineTotals = $('.subtotal');
    var quantity = $('.quantity');
    var price= $('.price');
    $.each(lineTotals, function(i){
        var tot = parseInt($(quantity[i]).val()) * parseFloat($(price[i]).val()) || 0;
        $(lineTotals[i]).text(tot.toFixed(2));
    });
}

function CalculateTotal() {
    // claculate the grandTotal and Quantity here
    var lineTotals = $('.subtotal');
    var quantityTotal = $('.quantity');
    var grandTotal = 0.0;
    var totalQuantity = 0;
    $.each(lineTotals, function(i) {
        grandTotal += parseFloat($(lineTotals[i]).text()) || 0;
        totalQuantity += parseInt($(quantityTotal[i]).val()) || 0;
    });

    $('.totalquantity').text(totalQuantity);
    $('.grandtotal').text(parseFloat(grandTotal).toFixed(2));
    $("#grand_total").val(parseFloat(grandTotal).toFixed(2));

}
</script>
@endsection

@section('msg')
<div class="msg_box">
  <center class="msg">
    @if(session()->has('msg'))
      <b>{!! session()->get('msg') !!}</b>
    @endif
  </center>
</div>
@endsection