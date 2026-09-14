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



              <h3 class="card-title">Update Heading</h3>







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

                      <a class="nav-link" href="{{url('admin/course-certificate/'.$data['id_hash'])}}"> Tools Covered</a>

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

                     <li class="nav-item active">

                      <a class="nav-link" href="{{url('admin/course-heading/'.$data['id_hash'])}}">Heading</a>

                    </li>

                    <li class="nav-item ">



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











              @if ($errors->any())



              @foreach ($errors->all() as $error)



              <div class="alert alert-danger">{{$error}}</div>



              @endforeach



              @endif







              <form method="post" action="{{url('admin/updateHeading')}}" enctype="multipart/form-data">



                <input type="hidden" name="course_id" value="{{$category->id}}">
              <input type="hidden" name="id" value="{{ $certificate ? $certificate->id : '0' }}">



                {{ csrf_field() }}



                <div class="row">



                  <div class="col-md-12">



                    <div class="form-group">



                     



                      <input type="text" class="form-control" name="heading1"  value="{{ $certificate ? $certificate->heading1 : '0' }}" >



                    </div>



                  </div>
                  
                  
                      <div class="col-md-12">



                    <div class="form-group">



                     



                      <input type="text" class="form-control" name="heading2" value="{{ $certificate ? $certificate->heading2 : '0' }}" >



                    </div>



                  </div>
                  
                    <div class="col-md-12">



                    <div class="form-group">



                      


                      <input type="text" class="form-control" name="heading3" value="{{ $certificate ? $certificate->heading3 : '0' }}" >



                    </div>



                  </div>
                  
                  
                   <div class="col-md-12">



                    <div class="form-group">



                     



                      <input type="text" class="form-control" name="heading4" value="{{ $certificate ? $certificate->heading4 : '0' }}" >



                    </div>



                  </div>


                            <div class="col-md-12">



                    <div class="form-group">



                   


                      <input type="text" class="form-control" name="heading5"  value="{{ $certificate ? $certificate->heading5 : '0' }}">



                    </div>



                  </div>
                  
                  
                    <div class="col-md-6">



                    <div class="form-group">






                      <input type="text" class="form-control" name="heading6" value="{{ $certificate ? $certificate->heading6 : '0' }}" >



                    </div>



                  </div>



  <div class="col-md-6">



                    <div class="form-group">



                    



                      <input type="text" class="form-control" name="heading7" value="{{ $certificate ? $certificate->heading7 : '0' }}" >



                    </div>



                  </div>


<div class="col-md-12">



                    <div class="form-group">



                      



                      <input type="text" class="form-control" name="heading8" value="{{ $certificate ? $certificate->heading8 : '0' }}" >



                    </div>



                  </div>



<div class="col-md-6">



                    <div class="form-group">



                    

                      <input type="text" class="form-control" name="heading9"  value="{{ $certificate ? $certificate->heading9 : '0' }}">



                    </div>



                  </div>

<div class="col-md-6">



                    <div class="form-group">



                      



                      <input type="text" class="form-control" name="heading10"  value="{{ $certificate ? $certificate->heading10 : '0' }}">



                    </div>



                  </div>

                

                <div class="col-md-12">



                    <div class="form-group">



                     


                      <input type="text" class="form-control" name="heading11" value="{{ $certificate ? $certificate->heading11 : '0' }}" >



                    </div>



                  </div>
                  
            <div class="col-md-12">



                    <div class="form-group">



                     


                      <input type="text" class="form-control" name="heading12" value="{{ $certificate ? $certificate->heading12 : '0' }}" >



                    </div>



                  </div>
               

                    <div class="col-md-12">



                    <div class="form-group">



                    


                      <input type="text" class="form-control" name="heading13" value="{{ $certificate ? $certificate->heading13 : '0' }}" >



                    </div>



                  </div>

 <div class="col-md-12">



                    <div class="form-group">



                     



                      <input type="text" class="form-control" name="heading14" value="{{ $certificate ? $certificate->heading14 : '0' }}" >



                    </div>



                  </div>
                  
                  
                   <div class="col-md-12">



                    <div class="form-group">



                      


                      <input type="text" class="form-control" name="heading15" value="{{ $certificate ? $certificate->heading15 : '0' }}" >



                    </div>



                  </div>
                  
              

                 

               <div class="form-group col-md-12">
    <label for="pdf">Upload PDF</label>
    <input type="file" class="form-control" name="pdf" id="pdf">
    
    @if(isset($certificate) && is_object($certificate) && isset($certificate->pdf))
        <p>Current PDF:</p>
        <iframe 
            src="{{ url('public/uploads/'.$certificate->pdf) }}" 
            width="100" 
            height="150" 
            style="border: none;">
        </iframe>
    @else
        <p>No PDF available.</p>
    @endif
</div>





                  <div class="col-md-12">



                    <div class="form-group">



                      <input type="submit" class="btn btn-primary" value="Submit">







                      <a href="{{url('admin/course-seo/'.$category->id_hash)}}" class="btn btn-primary">Next</a>



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