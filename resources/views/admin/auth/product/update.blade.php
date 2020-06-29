@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Update Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Product Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.update', encrypt($product[0]->id))}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
               <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category" id="category" class="form-control" required="">
                        <option value="" selected="" disabled="">--SELECT CATEGORY--</option>
                        @foreach($category as $category_single)
                          <option value="{{$category_single->id}}" {{old('category') == $category_single->id ? 'selected' : ($category_single->id == $product[0]->category_id ? 'selected' : '')}}>{{strtoupper($category_single->heading)}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('category'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('category') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  {{-- <!--<div class="col-md-4">-->
                  <!--  <div class="form-group">-->
                  <!--    <label for="price">Product Price</label>-->
                  <!--    <input  type="number" class="form-control" placeholder="Enter product price" name="price" value="{{old('price') ?? $product[0]->price}}" id="code" required="">-->
                  <!--    @if($errors->has('price'))-->
                  <!--      <span class="invalid-feedback" role="alert" style="color:red">-->
                  <!--        <strong>{{ $errors->first('price') }}</strong>-->
                  <!--      </span>-->
                  <!--    @enderror-->
                  <!--  </div>-->
                  <!--</div>--> --}}
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="name">Product Name</label>
                      <input  type="text" class="form-control" placeholder="Enter product name" name="name" value="{{old('name') ?? $product[0]->name}}" id="name" required="">
                      @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="code">Product Code</label>
                      <input  type="text" class="form-control" placeholder="Enter product code" name="product_code" value="{{old('product_code') ?? $product[0]->product_code}}" id="code">
                      @if($errors->has('product_code'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('product_code') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="imgInp">File input</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="file" style="height: auto;" id="imgInp">
                        @if($errors->has('file'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('file') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <img id="old_file" src="{{asset('assets/product/'.$product[0]->file.'')}}" alt="" width="100%">
                      <h4 class="old-new" style="background: #ff8100;">Old</h4>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <img id="new_file" src="{{asset('backend/admin/dist/img/image_plaholder.jpg')}}" alt="" width="100%">
                        <h4 class="old-new" style="background: #33d057;">New</h4>
                      </div>
                    </div>
                </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
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

@section('script')
<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();
        
      reader.onload = function (e) {
        $('#new_file').attr('src', e.target.result);
        $('#old_file').css('opacity', '0.5');
      } 
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imgInp").change(function(){
      readURL(this);
  });
</script>
@endsection