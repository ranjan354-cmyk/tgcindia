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

              <h3 class="card-title">Course Faq</h3>



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
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-syllabus/'.$data['id_hash'])}}">Syllabus</a>
                    </li>
                    <li class="nav-item active">
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



              <form method="post" action="{{url('admin/insertFaq')}}" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{$category->id}}">

                {{ csrf_field() }}

                <div class="row">

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Name</label>

                      <input type="text" class="form-control" name="name" required>

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Description</label>

                      <input type="text" class="form-control" name="description">

                    </div>

                  </div>



                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Faq For</label>
                        <div class="checkbox-group" style="display: flex; flex-wrap: wrap;">
                            <label>
                                <input type="checkbox" name="new_faq[]" value="description"> Description
                            </label>
                            <label>
                                <input type="checkbox" name="new_faq[]" value="Certification"> Certification
                            </label>
                            <label>
                                <input type="checkbox" name="new_faq[]" value="CertificationFAQs"> Certification FAQs
                            </label>
                        </div>
                    </div>
                </div>





                  <div class="col-md-12">

                    <div class="form-group">

                      <input type="submit" class="btn btn-primary" value="Submit">

                      <a href="{{url('admin/course-testimonial/'.$data['id_hash'])}}" class="btn btn-primary">Next</a>

                    </div>

                  </div>



                </div>

              </form>

              <!-------------------------->





              <!------------- Table ---------->

              @if($faq->total() > 0)

              <div class="table-responsive p-0">

                <table class="table table-hover text-nowrap1">

                  <thead>

                    <tr>

                      <th>Sno</th>

                      <th>Name</th>

                      <th>Description</th>

                      <th width="1">FaqFor</th>

                      <th width="1">Action</th>

                    </tr>

                  </thead>

                  <tbody>

                    @php $i = 0; @endphp

                    @foreach ($faq as $cat)

                    <tr>

                      <td>{{$i+1}}</td>

                      <td>{{$cat->name}}</td>

                      <td>{{$cat->description}}</td>

                      <td> @php 
                        $feq_name=$cat->new_faq;
                        echo $feq_name;
                        @endphp</td>

                      <td>
                        <div class="dropdown">

                          <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item" href="{{url('admin/course-faq-edit')}}/{{$cat->id}}/{{$category->id}}">Edit</a>

                            <a onclick="return confirm('Are you sure you want to delete this item? All Child Value also be deleted!!!');" class="dropdown-item" href="{{url('admin/delete-faq')}}/{{$cat->id}}">Delete</a>


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

                {!! $faq->links('pagination::bootstrap-4') !!}

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