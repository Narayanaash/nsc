@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Order Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Order Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <!-- Content Wrapper. Contains page content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              After you enter necessary data here and click the button "Submit to update", users will get to see the details on their profile.
            </div>
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <b>ORDER ID:</b> GHY1234567890
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>Aash Narayan</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
                  <address>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th>Item(s)</th>
                        <th>Qty</th>
                        <th>Rate/Item (R)</th>
                        <th>Total (R)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="product-flex">
                            <div class="image-p">
                                <img src="{{asset('assets/product/checkout/1588667441.jpg')}}" width="15%" alt="">
                            </div>
                            <div>
                                <h5>White Emulsion</h5>
                                <small class="text-muted">Code: HKH46464</small>
                            </div>
                        </td>
                        <td>5</td>
                        <td>100 <input type="number" placeholder="Update rate" class="w-50 ml-2"></td>
                        <td>500</td>
                      </tr>
                      <tr>
                        <td class="product-flex">
                            <div class="image-p">
                                <img src="{{asset('assets/product/checkout/1588667441.jpg')}}" width="15%" alt="">
                            </div>
                            <div>
                                <h5>White Emulsion</h5>
                                <small class="text-muted">Code: HKH46464</small>
                            </div>
                        </td>
                        <td>5</td>
                        <td>100 <input type="number" placeholder="Update rate" class="w-50 ml-2"></td>
                        <td>500</td>
                      </tr>
                    </tbody>
                  </table>
              <!-- /.row -->

              <div class="row">

                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>R 1000</td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>R 50</td>
                        <td><input type="number" placeholder="Enter charge" class="w-75"></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>R 1050</td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-success float-right"><i class="fa fa-upload"></i> Submit to update
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<script>
</script>
@endsection