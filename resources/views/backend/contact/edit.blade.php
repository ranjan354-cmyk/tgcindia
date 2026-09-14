@extends('backend.layouts.app')

@section('content')







  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

   

   <div class="row mart10 padd">

        <div class="col-md-8">

        </div>

        <div class="col-md-4">

          <a class="btn btn-primary btn-sm float-right" href="{{url('admin/contact')}}">Manage Contact</a>

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

                <h3 class="card-title">Edit Contact</h3>



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

                

                <form method="post" action="{{url('admin/updateContact')}}" enctype="multipart/form-data">

               <input type="hidden" name="id" value="{{ $page->id }}">


               

                {{ csrf_field() }}

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Phone Number</label>

                      <input type="text" class="form-control" name="phone_number" required value="{{$page->phone_number}}">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Email Address</label>

                      <input type="text" class="form-control" name="email" required value="{{$page->email}}">

                    </div>

                  </div>



                



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Whatsapp Number</label>

                      <input type="text" class="form-control" name="whatsapp_num" value="{{$page->whatsapp_num}}">

                    </div>

                  </div>



                                <div class="col-md-6">

                                        <div class="form-group">

                                            <label> Phone Number (Course Page)</label>

                                            <input type="text" class="form-control" name="course_page_number" value="{{$page->course_page_number}}" >

                                        </div>

                                    </div>



                                  <div class="col-md-6">
                
                                    <div class="form-group">
                
                                      <label> Image (Blog Detail)</label>
                
                                      <input type="file" class="form-control" name="image"   >
                
                                    </div>
                                    <p class="custom-text" style="color: red;">Image Size Should be 190 × 80 px</p>
                
                                  </div>
                                  
                                  
                                   <div class="col-md-6">

                                        <div class="form-group">
                    
                                          <label>Offer</label>
                    
                                           <input type="text" class="form-control" name="offer" value="{{$page->offer}}" >
                    
                                        </div>
                    
                                      </div>
                                      
                                       <div class="col-md-6">

                                        <div class="form-group">
                    
                                          <label>Day</label>
                    
                                           <input type="date" class="form-control" name="day" value="{{$page->day}}" >
                    
                                        </div>
                    
                                      </div>
                                      
                                       <div class="col-md-6">

                                        <div class="form-group">
                    
                                          <label>Hour</label>
                    
                                           <input type="text" class="form-control" name="hour" value="{{$page->hour}}" >
                    
                                        </div>
                    
                                      </div>
                                      
                                       <div class="col-md-6">

                                        <div class="form-group">
                    
                                          <label>Minute</label>
                    
                                           <input type="text" class="form-control" name="min" value="{{$page->min}}" >
                    
                                        </div>
                    
                                      </div>
                                      
                                       <div class="col-md-6">

                                        <div class="form-group">
                    
                                          <label>Second</label>
                    
                                           <input type="text" class="form-control" name="sec" value="{{$page->sec}}" >
                    
                                        </div>
                    
                                      </div>
                                  


                  <!--<div class="col-md-4">-->
                  <!--  <div class="form-group">-->
                  <!--    <label>Image Alt Tag</label>-->
                  <!--    <input type="text" class="form-control" name="image_alt" value="{{$page->image_alt}}" >-->
                  <!--  </div>-->
                  <!--</div>-->

                  <!--<div class="col-md-4">-->
                  <!--  <div class="form-group">-->
                  <!--    <label>Image Title</label>-->
                  <!--    <input type="text" class="form-control" name="image_title" value="{{$page->image_title}}" >-->
                  <!--  </div>-->
                  <!--</div>-->

                  <!--<div class="col-md-4">-->
                  <!--  <div class="form-group">-->
                  <!--    <label>Image Description</label>-->
                  <!--    <input type="text" class="form-control" name="image_description" value="{{$page->image_description}}" >-->
                  <!--  </div>-->
                  <!--</div>-->



 <div class="col-md-6">

                    <div class="form-group">

                      <img src="{{url('public/uploads/'.$page->image)}}" class="img-fluid">

                    </div>

                  </div>

                  

                  <div class="col-md-12">

                    <div class="form-group">

                      <input type="submit" class="btn btn-primary" value="Submit">

                    </div>

                  </div>



                  <!--<div class="col-md-2">-->

                  <!--  <div class="form-group">-->

                  <!--   <img src="{{url('public/uploads/'.$page->image)}}" style="max-width: 100%;" />-->

                  <!--  </div>-->

                  <!--</div>-->

                  

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