@extends('backend.layouts.app')

@section('content')







<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->



  <div class="row mart10 padd">

    <div class="col-md-8">

    </div>

    <div class="col-md-4">

      <a class="btn btn-primary btn-sm float-right" href="{{url('admin/courses')}}">Manage Courses</a>

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

              <h3 class="card-title">Course Batches</h3>



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



              <!---------------------->

              <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">

                  <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarText">

                  <ul class="navbar-nav mr-auto">

                  <li class="nav-item ">
                      <a class="nav-link" href="{{url('admin/edit-course/'.$data['id_hash'])}}">Basic</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('admin/course-batch/'.$data['id_hash'])}}">Batches</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-enroll/'.$data['id_hash'])}}">Enroll</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-training/'.$data['id_hash'])}}">Training</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-solutions/'.$data['id_hash'])}}">Skills Covered</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-certificate/'.$data['id_hash'])}}">Tools Covered</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-syllabus/'.$data['id_hash'])}}">Syllabus</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-faq/'.$data['id_hash'])}}">Faq Description</a>
                    </li>
                    <!--<li class="nav-item ">-->
                    <!--  <a class="nav-link" href="{{url('admin/course-certificate-training/'.$data['id_hash'])}}">Training & Certificates</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-testimonial/'.$data['id_hash'])}}">Testimonial</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="{{url('admin/course-project/'.$data['id_hash'])}}">Projects</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-heading/'.$data['id_hash'])}}">Heading</a>
                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="{{url('admin/course-seo/'.$data['id_hash'])}}">SEO</a>

                    </li>

                  </ul>

                </div>

              </nav>

              <br>



              <!---------------------->





              <!------------------------>

              @if (\Session::has('success'))

              <div class="alert alert-success">

                {!! \Session::get('success') !!}

              </div>

              @endif
<div class="row">
    <div class="col-md-8">
      
 <form method="post" action="{{route('resetbatch')}}">
     @csrf
       <div class="row">
           <div class="col-md-2">
               <label>Regular/Fast</label>
          <input type="checkbox" name="settrack"  placeholder="Regular/Fast" value="1" >
           
           </div>
     <div class="col-md-4">
      <input type="text" name="course_period"  placeholder="3/6/12 Months" class="form-control">
      </div>
       <div class="col-md-6">
     <input type="hidden" name="course_id" value="{{$category->id}}">
                  <div class="row">
                      <div class="col-md-12">
                         <button class="btn btn-primary">Set Batches</button>
                      </div>
                      </div>
                  </div>
                  </div> 
              </form>
          
          </div>
              <div class="col-md-4">   
              <form method="post" action="{{route('removebatch')}}">
     @csrf
     <input type="hidden" name="course_id" value="{{$category->id}}">
                  <div class="row">
                      <div class="col-md-12">
                         <button class="btn btn-primary">Remove Batches</button>
                      </div>
                      
                  </div>
              </form>
</div></div>
              <form method="post" action="{{url('admin/insertBatch')}}" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{$category->id}}">

                {{ csrf_field() }}

                <div class="row">

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Regular Batch Name</label>

                      <input type="text" class="form-control" name="name" required>

                    </div>

                  </div>

                  <div class="col-md-2">

                    <div class="form-group">

                      <label>Fast Track Batch Name</label>

                      <input type="text" class="form-control" name="type" >

                    </div>

                  </div>



                  <div class="col-md-2">

                    <div class="form-group">

                      <label>Batch Type</label>

                      <select class="form-control" name="batch_type" required>

                        <option value="">---Select---</option>

                        <option value="Regular">Regular</option>

                        <option value="Weekend">Weekend</option>

                      </select>

                    </div>

                  </div>



                  <div class="col-md-2">

                    <div class="form-group">

                      <label>Fast Filling</label>

                      <select class="form-control" name="fast_filling" >

                        <option value="">---Select---</option>

                        <option value="Yes">Yes</option>

                        <option value="No">No</option>

                      </select>

                    </div>

                  </div>



                  <div class="col-md-2">

                    <div class="form-group">

                      <label>Start Date</label>

                      <input type="date" class="form-control" name="start_date" min="{{date('Y-m-d')}}" required>

                    </div>

                  </div>



                  <div class="col-md-2">

                    <div class="form-group">

                      <label>Batch Fee</label>

                      <input type="number" class="form-control" name="batch_fee">

                    </div>

                  </div>





                  <div class="col-md-12">

                    <div class="form-group">

                      <input type="submit" class="btn btn-primary" value="Submit">



                      <a href="{{url('admin/course-enroll/'.$data['id_hash'])}}" class="btn btn-primary">Next</a>

                    </div>

                  </div>



                </div>

              </form>

              <!-------------------------->





              <!------------- Table ---------->

              @if($batch->total() > 0)

              <div class="table-responsive p-0">

                <table class="table table-hover text-nowrap1">

                  <thead>

                    <tr>

                      <th>Sno</th>

                      <th>Name</th>

                      <th>Type</th>

                      <th>Batch Type</th>

                      <th>Start Date</th>

                      <th>Batch Fees</th>

                      <th width="1">Action</th>

                    </tr>

                  </thead>

                  <tbody>

                    @php $i = 0; @endphp

                    @foreach ($batch as $cat)

                    <tr>

                      <td>{{$i+1}}</td>

                      <td>{{$cat->name}}</td>

                      <td>{{$cat->type}}</td>

                      <td>{{$cat->batch_type}}</td>

                      <td>{{$cat->start_date}}</td>

                      <td>{{$cat->batch_fee}}</td>



                      <td>

                        <div class="dropdown">

                          <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item" href="{{url('admin/course-batch-edit')}}/{{$cat->id}}/{{$category->id}}">Edit</a>

                            <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/delete-batch')}}/{{$cat->id}}">Delete</a>


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

                {!! $batch->links('pagination::bootstrap-4') !!}

              </div>



              @else

              <div class="alert alert-warning">{{__('No data')}}</div>

              @endif

              <!------- Table #END ------------->





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