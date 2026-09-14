@extends('backend.layouts.app')
@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
   <div class="row mart10 padd">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">
          <a class="btn btn-primary btn-sm float-right" href="{{url('admin/coupons')}}">Manage Coupons</a>
        </div>
   </div>


    


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Add Coupon</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <!------------------------>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                
                <form method="post" action="{{url('admin/updateCoupon')}}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$category->id}}">
                <input type="hidden" name="old_image" value="{{$category->image}}">
                {{ csrf_field() }}
                <div class="row">
                  

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Coupon Type</label>
                        <select class="form-control" name="coupon_type">
                          <option value="">Select</option>
                          <option <?php if($category->coupon_type == 'Flat'){ echo "selected"; } ?> value="Flat">Flat</option>
                          <option <?php if($category->coupon_type == 'Percentage'){ echo "selected"; } ?> value="Percentage">Percentage</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{$category->amount}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{$category->start_date}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{$category->end_date}}">
                      </div>
                    </div>

                
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                  </div>
                  
                </div>
                </form>
                <!-------------------------->

                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  


  


@endsection