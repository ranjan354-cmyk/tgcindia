@extends('backend.layouts.app')

@section('content')



<script>
function orderChange(id, srno) {
    $.ajax({
         url: '{{ url("admin/saveOrderCourse") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            srno: srno
        },
        success: function(response) {
            console.log('Success:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
}

function orderChangeExcluded(valueId,id){
   console.log(valueId);
  
      $.ajax({
         url: '{{ url("admin/saveOrderCourseExcluded") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            valueId: valueId
        },
        success: function(response) {
            console.log('Success:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
    
}
</script>

  



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

   

   <div class="row mart10 padd">

        <div class="col-md-8">

          <form class="row" method="get" action="">

            <div class="col-md-4 no-margin-left">

                <div class="form-group">

                    <input type="text" name="keyword" class="form-control" placeholder="Keywords" value="<?=$data['keyword'];?>">

                </div>

              </div>

              <div class="col-md-3 no-padding-left">
                <div class="form-group">
                  <select class="form-control select2" name="category">
                    <option value="0"> --Select Category --</option>
                    @php foreach($categoryList as $rowC){ @endphp
                    <option <?php if($data['category'] == $rowC->id){ echo "selected"; } ?> value="{{$rowC->id}}"> {{$rowC->name}}</option>
                    @php } @endphp
                  </select>
                </div>
              </div>


              <div class="col-md-2 no-padding-left">
                <div class="form-group">
                  <select class="form-control select2" name="r_page">
                    <option value="25"> 25 Courses Per Page</option>
                    <option <?php if($data['r_page'] == '50'){ echo "selected"; } ?> value="50"> 50 Courses Per Page</option>
                    <option <?php if($data['r_page'] == '100'){ echo "selected"; } ?> value="100"> 100 Courses Per Page</option>
                  </select>
                </div>
              </div>



              <div class="col-md-2 no-padding-left">

                <div class="form-group yd_fit_cls" >

                    <button type="submit" class="btn btn-primary" > Filter</button>
                    <a href="{{url('admin/courses')}}" class="btn btn-danger" >X</a> 

                </div>

              </div>

            </form>

        </div>

        





        <div class="col-md-4">

          <a class="btn btn-primary btn-sm float-right" href="{{url('admin/add-course')}}">Add New Course</a>

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

                <h3 class="card-title">Course Management</h3>



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

                @if (\Session::has('success'))

                    <div class="alert alert-success">

                        {!! \Session::get('success') !!}

                    </div>

                @endif

                @if($categories->total() > 0)

                <div class="table-responsive p-0">
@php 
//echo "<pre>";
//print_r($excludedDataAll);
//echo "</pre>";
@endphp
                  <table class="table table-hover text-nowrap1">

                    <thead>

                      <tr>
                        <th>Sno </th>
                        <th> Name</th>
                        <th> ParentName</th>
                        <th>Status</th>
                        <th>Date Added</th>
                         <th>Excluded</th>
                          <th>Orders No</th>
                        <th width="1">Orders</th>
                        <th width="1">Action</th>

                      </tr>

                    </thead>

                    <tbody>

                      @foreach ($categories as $cat)

                      <tr>

                        <td>{{$i+1}}</td>
                        <td>
                        <a href="{{url('admin/edit-course/')}}/{{$cat->id_hash}}">
                        {{$cat->name}}
                        </a>
                        <!--<a target="_blank" href="{{url('course/'.$cat->slug)}}">-->
                        <!--{{$cat->name}}-->
                        <!--</a>-->
                        
                        
                        </td>
                        <td>
                          @php
                          if($cat->parent > 0){
                            $parent = DB::table('tbl_course_category')->WHERE('id', $cat->parent)->first();
                            echo $parent->name;
                          }
                          @endphp
                        
                        </td>
                        <td>{{$cat->staus}}</td>
                        <td>{{$cat->add_date}}</td>
                            <td>
    <input type="checkbox"
           id="excluded_id_{{ $cat->id }}"
           onchange="orderChangeExcluded(this.checked ? 1 : 0, '{{ $cat->id }}')"
           value="1"
           {{ in_array($cat->id, $excludedDataAll) ? 'checked' : '' }}>
</td>
                      
                         <td><input type="number" id="order_no" onchange="orderChange(this.value,'{{$cat->id_hash}}')" value="{{$cat->orders_by}}" ></td>
                        <td class="up_down">
                          <a href="{{url('admin/course_up/'.($cat->orders_by+1)).'/'.$cat->id}}"><i class="fas fa-arrow-up"></i></a>
                          @php if($cat->orders_by > 0){ @endphp
                          <a href="{{url('admin/course_up/'.($cat->orders_by-1)).'/'.$cat->id}}"><i class="fas fa-arrow-down"></i></a>
                          @php } @endphp
						  {{$cat->orders_by}}</td>
                        <td>  



                          <div class="dropdown">

                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item" href="{{url('admin/edit-course/')}}/{{$cat->id_hash}}">Edit</a>
                                <a class="dropdown-item" target="_blank" href="{{url('course/'.$cat->slug)}}">
                    View
                        </a>

                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/delete-course')}}/{{$cat->id}}"">Delete</a>

                            </div>

                          </div>

                        </td>



                      </tr>

                      <?php ++$i; ?>

                      @endforeach



                      



                    </tbody>

                  </table>

                </div>

                <div class="gmz-pagination">

                    {!! $categories->links('pagination::bootstrap-4') !!}

                </div>



                @else

                    <div class="alert alert-warning">{{__('No data')}}</div>

                @endif

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