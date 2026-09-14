@extends('backend.layouts.app')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="row mart10 padd">
    <div class="col-md-8">
    </div>
    <div class="col-md-4">
      <a class="btn btn-primary btn-sm float-right" href="{{url('admin/events')}}">Manage Events</a>
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
              <h3 class="card-title">Edit Events</h3>

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

              <form method="post" action="{{url('admin/updateEvents')}}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$page->id}}">
                 <input type="hidden" name="old_thumbnail" value="{{$page->thumbnail}}">

                {{ csrf_field() }}
                <div class="row">
                    
                          <div class="col-md-12">
                              @if($page->thumbnail!='')
                              <img src="{{url('public/uploads/'.$page->thumbnail)}}" height="200" width="200">
                              @endif
                    <div class="form-group">
                      <label>Thumbnail</label>
                      <input type="file" class="form-control" name="thumbnail"  >
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" required value="{{$page->name}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control" name="slug" value="{{$page->slug}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Event Date</label>
                      <input type="date" class="form-control" name="event_date" required value="{{$page->event_date}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Event Time</label>
                      <input type="text" class="form-control" name="event_time" required value="{{$page->event_time}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Conduct By</label>
                      <input type="text" class="form-control" name="conduct_by" required value="{{$page->conduct_by}}">
                    </div>
                  </div>
 <div class="col-md-12">

                    <div class="form-group">

                      <label>Content</label>

                      <textarea name="content" class="summernote"><?= $page->description; ?></textarea>

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