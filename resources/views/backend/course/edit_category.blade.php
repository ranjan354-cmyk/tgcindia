@extends('backend.layouts.app')

@section('content')







<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->



  <div class="row mart10 padd">

    <div class="col-md-8">

    </div>

    <div class="col-md-4">

      <a class="btn btn-primary btn-sm float-right" href="{{url('admin/course-category')}}">Manage Category</a>

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

              <h3 class="card-title">Add Category</h3>



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



              <form method="post" action="{{url('admin/updateCourseCategory')}}" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{$category->id}}">

                <input type="hidden" name="old_image" value="{{$category->image}}">
                <input type="hidden" name="old_blog_image" value="{{$category->blog_image}}">
                <input type="hidden" name="old_masterimage" value="{{$category->masterimage}}">

                {{ csrf_field() }}

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Name</label>

                      <input type="text" class="form-control" name="name" value="{{$category->name}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Slug</label>

                      <input type="text" class="form-control" name="slug" value="{{$category->slug}}">

                    </div>

                  </div>

                  <div class="col-md-6" style="display: none;">

                    <div class="form-group">

                      <label>Parent</label>

                      <select class="form-control select2" name="parent" style="width: 100%;">

                        <option value="0">Select</option>

                        @foreach ($categories as $cat)

                        <option <?php if ($category->parent == $cat->id) {
                                  echo "selected";
                                } ?> value="{{$cat->id}}">{{$cat->name}}</option>

                        @endforeach

                      </select>

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Icon</label>

                      <input type="text" class="form-control" name="icon" value="{{$category->icon}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Image</label>

                      <input type="file" class="form-control" name="image">

                    </div>

                  </div>
                  
                  

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Status</label>

                      <select class="form-control select2" name="status" style="width: 100%;">

                        <option value="Active">Active</option>

                        <option <?php if ($category->staus == 'InActive') {
                                  echo "selected";
                                } ?> value="InActive">InActive</option>

                      </select>

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Order By</label>

                      <input type="number" class="form-control" name="orders_by" value="{{$category->orders_by}}">

                    </div>

                  </div>




  <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Title</label>

                      <input type="text" class="form-control" name="title" value="{{$category->title}}">

                    </div>

                  </div>
                  
                    <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Name</label>

                      <input type="text" class="form-control" name="blog_name" value="{{$category->blog_name}}">

                    </div>

                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Course</label>

                      <input type="text" class="form-control" name="blog_course"value="{{$category->blog_course}}">

                    </div>

                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Hour</label>

                      <input type="text" class="form-control" name="blog_hour" value="{{$category->blog_hour}}">

                    </div>

                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Learners</label>

                      <input type="text" class="form-control" name="blog_learners" value="{{$category->blog_learners}}">

                    </div>

                  </div>
                  
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Detail Link</label>

                      <input type="text" class="form-control" name="blog_link" value="{{$category->blog_link}}">

                    </div>

                  </div>


            <div class="col-md-6">

                    <div class="form-group">

                      <label>Blog Image</label>

                      <input type="file" class="form-control" name="blog_image">

                    </div>


                  </div>
                  <hr class="col-md-12">
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Meta Title</label>

                      <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Meta Keywords</label>

                      <input type="text" class="form-control" name="meta_keywords" value="{{$category->meta_keywords}}">

                    </div>

                  </div>
                  
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Meta Description</label>

                      <textarea type="text" class="form-control" name="meta_description">{{$category->meta_description}}</textarea>

                    </div>

                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Alt Tag</label>
                      <input type="text" class="form-control" name="image_alt" value="{{$category->image_alt}}" >
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Title</label>
                      <input type="text" class="form-control" name="image_title" value="{{$category->image_title}}" >
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Description</label>
                      <input type="text" class="form-control" name="image_description" value="{{$category->image_description}}" >
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Canonical Url</label>
                      <input type="text" class="form-control" name="canonical" value="{{$category->canonical}}" >
                    </div>
                  </div>
                    <hr>
            
                  <div class="col-md-12">
                      <b>Master Program</b>
             </div>
                  
                  
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Master Image</label>

                      <input type="file" class="form-control" name="masterimage">

                    </div>


                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Master Title</label>

                      <input type="text" class="form-control"  value="{{$category->mastertitle}}" name="mastertitle">

                    </div>

                  </div>

                  
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Content</label>

                      <textarea name="mastercontent" class="summernote">{{$category->mastercontent}}</textarea>

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

<div class='row'>
    <div class="col-md-4">

                    <div class="form-group">

                      <img src="{{url('public/uploads/'.$category->image)}}" class="img-fluid">

                    </div>

                  </div>
                    <div class="col-md-4">

                    <div class="form-group">

                      <img src="{{url('public/uploads/'.$category->blog_image)}}" class="img-fluid">

                    </div>

                  </div>
                    <div class="col-md-4">

                    <div class="form-group">

                      <img src="{{url('public/uploads/'.$category->masterimage)}}" class="img-fluid">

                    </div>

                  </div>
</div>



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