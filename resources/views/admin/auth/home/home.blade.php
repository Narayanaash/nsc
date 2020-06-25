@extends('admin.layouts.app')

@section('content')

  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($category_count))
                      print $category_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Category</p>
              </div>
              <div class="icon">
                <i class="fa fa-server"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                   @php
                    if(!empty($product_count))
                      print $product_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                   @php
                    if(!empty($orders_count))
                      print $orders_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-cart-plus"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                   @php
                    if(!empty($queries_count))
                      print $queries_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Queries</p>
              </div>
              <div class="icon">
                <i class="fa fa-question-circle"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

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