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

              <h3 class="card-title">Course Syllabus</h3>



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
                    <li class="nav-item">
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
                    <li class="nav-item active">
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

                      <a class="nav-link" href="#">SEO</a>

                    </li>

                  </ul>

                </div>

              </nav>

              <br>



              <!---------------------->
           
              
              
                 <form method="post" action="{{route('insertBulkParent')}}">
                     @csrf
                     <input type="hidden" name="course_id" value="{{$category->id}}">
                      <div class="row">
                          <div class="col-md-10">
                              <label>Parent Topic In Bulk In (Underscore Formate)</label>
                              <textarea type="text" class="form-control" name="topic" id="parent_id">
                                  
                                  
                              </textarea>
                          </div>
                          <div class="col-md-2">
                             <button class="btn btn-primary" type="submit" style="margin-top:30px;" >Generate Parent</button> 
                          </div>
                          
                          </div>
                     
                     
                 </form>




              <!------------------------>

              @if (\Session::has('success'))

              <div class="alert alert-success">

                {!! \Session::get('success') !!}

              </div>

              @endif



              <form method="post" action="{{url('admin/insertSyllabus')}}" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{$category->id}}">

                {{ csrf_field() }}

                <div class="row">

                



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Parent</label>

                      <select class="form-control" name="parent">

                        <option value="0">--Select--</option>

                        @foreach ($syllabusParent as $syP)

                        <option value="{{$syP->id}}">{{$syP->name}}</option>

                        @endforeach

                      </select>

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Type</label>

                      <select class="form-control" name="type">

                        <option value="">--Select--</option>

                        <option value="Topics">Topics</option>

                        <option value="Hand On">Hand On</option>

                        <option value="Skills">Skills</option>

                      </select>

                    </div>

                  </div>



                  <div class="col-md-1" style="display:none;">

                    <div class="form-group">

                      <label>Order By</label>

                      <input type="number" class="form-control" name="orders_by">

                    </div>

                  </div>



                  <div class="col-md-1"  style="display:none;">

                    <div class="form-group">

                      <label>OrdByHome</label>

                      <input type="number" class="form-control" name="orders_by_hm">

                    </div>

                  </div>
                  
                  
                  


  <div class="col-md-12">

                    <div class="form-group">

                      <label>Topic In Bulk In (Underscore Formate)</label>

                      <textarea type="text" class="form-control" name="name" required></textarea>

                    </div>

                  </div>




                  <div class="col-md-12">

                    <div class="form-group">

                      <input type="submit" class="btn btn-primary" value="Submit">

                      <a href="{{url('admin/course-faq/'.$data['id_hash'])}}" class="btn btn-primary">Next</a>

                    </div>

                  </div>



                </div>

              </form>

              <!-------------------------->


<a href="{{url('admin/parentcat/'.$data['course_id'])}}"><button class="btn btn-primary" type="submit" style="float: right;
    margin-bottom: 20px;">Manage Parent</button></a>

              <!------------- Table ---------->

              @if($syllabus->total() > 0)

              <div class="table-responsive p-0">

                <table class="table table-hover text-nowrap1">

                  <thead>

                    <tr>

                      <th>Sno</th>

                      <th>Name</th>

                      <th>Parent</th>

                      <th>Type</th>

                      <th>Order By</th>

                      <th width="1">Action</th>

                    </tr>

                  </thead>

                  <tbody>

                    @php $i = 0; @endphp

                    @foreach ($syllabus as $cat)

                    <tr>

                      <td>{{$i+1}}</td>

                      <td>{{$cat->name}}</td>

                      <td>

                        @php

                        $parent = DB::table('tbl_course_syllabus')->where('id', $cat->parent)->first();

                        if($parent){

                        echo $parent->name;

                        }



                        @endphp

                      </td>

                      <td>{{$cat->type}}</td>

                      <td><input type="number" value="{{$cat->orders_by}}" onchange="orderChange(this.value,'{{$cat->id}}')"></td>

                      <td>
                        <div class="dropdown">

                          <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item" href="{{url('admin/course-syllabus-edit')}}/{{$cat->id}}/{{$category->id}}">Edit</a>

                            <a onclick="return confirm('Are you sure you want to delete this item? All Child Value also be deleted!!!');" class="dropdown-item" href="{{url('admin/delete-syllabus')}}/{{$cat->id}}">Delete</a>


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

                {!! $syllabus->links('pagination::bootstrap-4') !!}

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



<script>
   function orderChange(id, srno) {
       console.log(srno);
   
   $.ajax({
        url: '{{ url("admin/saveTopicOrderCourse") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            srno: srno
        },
        success: function(response) {
            console.log('Success:', response);
        //    window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
    
}
</script>












@endsection