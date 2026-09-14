@extends('backend.layouts.app')

@section('content')







<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->



  <div class="row mart10 padd">

    <div class="col-md-8">

    </div>

    <div class="col-md-4">

      <a class="btn btn-primary btn-sm float-right" href="{{url('admin/blogs')}}">Manage Blog</a>

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

              <h3 class="card-title">Add Blog</h3>



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



              <form method="post" action="{{url('admin/saveBlog')}}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Name</label>

                      <input type="text" class="form-control" name="name">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Slug</label>

                      <input type="text" class="form-control" name="slug">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Category</label>

                      <select class="form-control select2" name="parent" style="width: 100%;">

                        <option value="0">Select</option>

                        @foreach ($categories as $cat)

                        <option value="{{$cat->id}}">{{$cat->name}}</option>

                        @endforeach

                      </select>

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Image</label>

                      <input type="file" class="form-control" name="image">

                    </div>
                    <p class="custom-text" style="color: red;">Image Size Should be 350 × 240 px</p>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Add Date</label>

                      <input type="date" class="form-control" name="add_date">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Added By</label>

                      <input type="text" class="form-control" name="added_by">

                    </div>

                  </div>



                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Tags</label>

                      <input type="text" class="form-control" name="tags">

                    </div>

                  </div>


                 <div class="col-md-6">

                    <div class="form-group">

                      <label>View</label>

                      <input type="text" class="form-control" name="view">

                    </div>

                  </div>





                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Status</label>

                      <select class="form-control select2" name="status" style="width: 100%;">

                        <option value="Active">Active</option>

                        <option value="InActive">InActive</option>

                      </select>

                    </div>

                  </div>



                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Short Content</label>

                      <input type="text" class="form-control" name="short_content">

                    </div>

                  </div>



                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Content</label>

                      <textarea name="content" class="summernote"></textarea>

                    </div>

                  </div>

                  <hr class="col-md-12">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Title</label>
                      <input type="text" class="form-control" name="meta_title">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Keywords</label>
                      <input type="text" class="form-control" name="meta_keywords">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Description</label>
                      <input type="text" class="form-control" name="meta_description">
                    </div>
                  </div>

                  <div class="col-md-12"></div>


                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Alt Tag</label>
                      <input type="text" class="form-control" name="image_alt" >
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Title</label>
                      <input type="text" class="form-control" name="image_title" >
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Image Description</label>
                      <input type="text" class="form-control" name="image_description" >
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Canonical</label>
                      <input type="text" class="form-control" name="canonical" >
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



<link href="https://www.tgcindia.com/assets/plugins/summernote/summernote-bs4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://www.tgcindia.com/assets/plugins/summernote/summernote-bs4.min.js"></script>


<script>
$(document).ready(function() {
  $('.summernote').summernote({
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
      ['fontname', ['fontname']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph', 'height']],
      ['insert', ['link', 'picture', 'video', 'table', 'hr']],
      ['view', ['fullscreen', 'codeview', 'help']],

      // Custom Buttons
      ['mybutton', ['enroll','counselor','fees','trial','whatsapp']]
    ],

    buttons: {

      enroll: function(context) {
        var ui = $.summernote.ui;
        return ui.button({
          contents: '<i class="fa fa-graduation-cap"></i> Enroll',
          tooltip: 'Insert Enroll Button',
          click: function () {
            var html = '<button class="btn btn-primary btn-sm btn-sm-rd" data-toggle="modal" data-target="#demo_pop2">Enroll Now</button>';
            context.invoke('editor.pasteHTML', html);
          }
        }).render();
      },

      counselor: function(context) {
        var ui = $.summernote.ui;
        return ui.button({
          contents: '<i class="fa fa-user"></i> Counselor',
          tooltip: 'Connect With Counselor',
          click: function () {
            var html = '<button class="btn btn-info btn-sm btn-sm-rd" data-toggle="modal" data-target="#ConnectWithCounselor">Connect With Counselor</button>';
            context.invoke('editor.pasteHTML', html);
          }
        }).render();
      },

      fees: function(context) {
        var ui = $.summernote.ui;
        return ui.button({
          contents: '<i class="fa fa-money"></i> Fees',
          tooltip: 'Get Fees Details',
          click: function () {
            var html = '<button class="btn btn-warning btn-sm btn-sm-rd" data-toggle="modal" data-target="#GetFeesDetails">Get Fees Details</button>';
            context.invoke('editor.pasteHTML', html);
          }
        }).render();
      },

      trial: function(context) {
        var ui = $.summernote.ui;
        return ui.button({
          contents: '<i class="fa fa-play"></i> Trial',
          tooltip: 'Get Trial Classes',
          click: function () {
            var html = '<button class="btn btn-success btn-sm btn-sm-rd" data-toggle="modal" data-target="#get_trail_enroll">Get Trial Classes</button>';
            context.invoke('editor.pasteHTML', html);
          }
        }).render();
      },

      whatsapp: function(context) {
        var ui = $.summernote.ui;
        return ui.button({
          contents: '<i class="fa fa-whatsapp"></i> WhatsApp',
          tooltip: 'Get Syllabus on WhatsApp',
          click: function () {
            var html = '<a href="https://wa.me/919582786407" target="_blank" class="btn btn-success btn-sm btn-sm-rd">Get Syllabus On WhatsApp</a>';
            context.invoke('editor.pasteHTML', html);
          }
        }).render();
      }

    }

  });
});
</script>










@endsection