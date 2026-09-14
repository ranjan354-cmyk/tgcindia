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

                <h3 class="card-title">Course Certificate </h3>



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
                      <a class="nav-link" href="{{url('admin/course-training/'.$data['id_hash'])}}">Courses Benefits
 </a>
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
                    <!--<li class="nav-item active">-->
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





                <!------------------------>

                @if (\Session::has('success'))

                    <div class="alert alert-success">

                        {!! \Session::get('success') !!}

                    </div>

                @endif

                

                <form method="post" action="{{url('admin/updateCertificateTraining')}}" enctype="multipart/form-data">

                <input type="hidden" name="coursee_id" value="{{$category->id}}">
                <input type="hidden" name="id" value="{{$certificate->id}}">
                <input type="hidden" name="id_hash" value="{{$category->id_hash}}">

                {{ csrf_field() }}

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Name</label>

                      <input type="text" class="form-control" name="name" value="{{$certificate->name}}" >

                    </div>

                  </div>



                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Url Name</label>

                      <input type="text" class="form-control" name="url_name" value="{{$certificate->url_name}}" >

                    </div>

                  </div>



                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Url Link</label>

                      <input type="text" class="form-control" name="url_link" value="{{$certificate->url_link}}" >

                    </div>

                  </div>



                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Description</label>

                      <input type="text" class="form-control" name="description" value="{{$certificate->description}}" >

                    </div>

                  </div>

                  

                  <div class="col-md-2">

                    <div class="form-group">

                      <label>Image</label>

                      <input type="file" class="form-control"" name="image" >

                    </div>
                    <p class="custom-text" style="color: red;">Image Size Should be	120 × 75 px</p>

                  </div>
                  
                  
         <img src="{{ url('public/uploads/'. $certificate->image)  }}" alt="Certificate Image">


                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Alt Tag</label>
                      <input type="text" class="form-control" name="image_alt" value="{{$certificate->image_alt}}" >
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Title</label>
                      <input type="text" class="form-control" name="image_title" value="{{$certificate->image_title}}" >
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Description</label>
                      <input type="text" class="form-control" name="image_description" value="{{$certificate->image_description}}" >
                    </div>
                  </div>

                  

                  

                  <div class="col-md-12">

                    <div class="form-group">

                      <input type="submit" class="btn btn-primary" value="Update">



                      <a href="{{url('admin/course-testimonial/'.$category->id_hash)}}" class="btn btn-primary">Next</a>

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