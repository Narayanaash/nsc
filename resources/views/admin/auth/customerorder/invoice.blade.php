@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
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
                <div class="table-responsive">
                    
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td>{{$checkout->productName}}</td>
                                <td class="text-center"><input type="number" name="price" id="price" placeholder="Enter the Rate" class="form-control"></td>
                                <td class="text-center"><input type="number" name="qty" id="qty" value="{{$checkout->qty}}" class="form-control"> </td>
                                <td class="text-right"><input type="text" value="0.0" readonly class="form-control" id="row_total"></td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Sub Total</strong></td>
                                <td class="no-line text-right"><input type="text" value="0.0" name="sub" id="sub" class="form-control" readonly> </td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right"><input type="text" readonly value="0.0" class="form-control" id="total"></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-6">
                        <button class="btn btn-primary text-center" id="send">Send Order</button>
                    </div>
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
    $(document).on('blur', 'input', function(){
        var qty = $("#qty").val();
        var price = $("#price").val();
        
        var total = qty * price;
        $("#row_total").val(total);
        $("#sub").val(0.0);
        $("#total").val(total);
    });
});
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