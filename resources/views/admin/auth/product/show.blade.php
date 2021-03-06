@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product View (Catg: {{$category_name[0]->heading}})</h1>
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
          <div class="col-md-12">
           <table id="table_id" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Pr Code</th>
                            <!--<th>Price</th>-->
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


@section("script")
<script type="text/javascript">

$(document).ready(function(){

    $('#table_id').DataTable({

        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('product.get_data', $catgory) }}",
            "dataType": "json",
            "type": "POST",
            "data":{
                _token: "{{csrf_token()}}",
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "file" },
            { "data": "name" },
            { "data": "code" },
            // { "data": "price" },
            { "data": "date" },
            { "data": "action" },
        ],
        "columnDefs": [
            { "width": "45%", "targets": 2 },
        ],
    });
    $('#table_id').on( 'draw.dt', function () {
      $('.confirmation-callback').confirmation({
      });
      $('.confirmation-callback').confirmation();
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