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
                <h3 class="card-title">Setting Management</h3>

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
                
                <form method="post" action="{{url('admin/saveSettings')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="1">
                <div class="form-horizontal p-0">
                  
                  <div class="row">
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting1" value="{{$setting->setting1}}">
                        <br>
                        <input type="file" name="setting2">
                        <input type="hidden" name="setting2_old" value="{{$setting->setting2}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting2)}}" style="max-width: 200px;">

                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting3" value="{{$setting->setting3}}">
                        <br>
                        <input type="file" name="setting4">
                        <input type="hidden" name="setting4_old" value="{{$setting->setting4}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting4)}}" style="max-width: 200px;">

                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting5" value="{{$setting->setting5}}">
                        <br>
                        <input type="file" name="setting6">
                        <input type="hidden" name="setting6_old" value="{{$setting->setting6}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting6)}}" style="max-width: 200px;">

                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting7" value="{{$setting->setting7}}">
                        <br>
                        <input type="file" name="setting8">
                        <input type="hidden" name="setting8_old" value="{{$setting->setting8}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting8)}}" style="max-width: 200px;">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting9" value="{{$setting->setting9}}">
                        <br>
                        <input type="file" name="setting10">
                        <input type="hidden" name="setting10_old" value="{{$setting->setting10}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting10)}}" style="max-width: 200px;">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="setting11" value="{{$setting->setting11}}">
                        <br>
                        <input type="file" name="setting12">
                        <input type="hidden" name="setting12_old" value="{{$setting->setting12}}">
                        <br>
                        <img src="{{url('public/uploads/'.$setting->setting12)}}" style="max-width: 200px;">
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