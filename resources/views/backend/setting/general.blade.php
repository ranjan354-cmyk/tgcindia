@extends('backend.layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="row mart10 padd"></div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">General Settings Management</h3>

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
                
                <form method="post" action="{{url('admin/saveGeneral')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="1">
                <div class="form-horizontal p-0">
                  <h4>Contact Us</h4>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting1" value="{{$setting->setting1}}">
                        <br>
                        <input type="text" class="form-control" name="setting2" value="{{$setting->setting2}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting3" value="{{$setting->setting3}}">
                        <br>
                        <input type="text" class="form-control" name="setting4" value="{{$setting->setting4}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting5" value="{{$setting->setting5}}">
                        <br>
                        <input type="text" class="form-control" name="setting6" value="{{$setting->setting6}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting7" value="{{$setting->setting7}}">
                        <br>
                        <input type="text" class="form-control" name="setting8" value="{{$setting->setting8}}">
                      </div>
                    </div>
                    
                  </div>
                  <hr style="border: 2px solid #069;">
                  <h4>Head Office</h4>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting9" value="{{$setting->setting9}}">
                      </div>
                    </div>
                    
                    
                  </div>
                  <hr style="border: 2px solid #069;">
                  <h4>Return Office</h4>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" name="setting10" class="form-control" value="{{$setting->setting10}}">
                    </div>
                  </div>
                  <hr style="border: 2px solid #069;">
                  <div class="row">
                    <h4>Enquiry Image</h4>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="file" name="setting11">
                        <input type="hidden" name="setting11_old" value="{{$setting->setting11}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting11)}}" style="max-width: 200px;">
                      </div>
                    </div>
                  </div>
                  
                  <hr style="border: 2px solid #069;">
                  <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                </form>
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