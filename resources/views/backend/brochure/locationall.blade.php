@extends('backend.layouts.app')
@section('content')


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
<link href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
   <div class="row mart10 padd">
      
        


      
     
   </div>


    


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Location Management</h3>

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
                  <form method="post" action="{{route('savelocation')}}">
                      @csrf
                  <div class="row">
                     
                       <div class="col-md-6">
                          <label>Course Name</label>
                       <select class="form-control" name="course[]" multiple>
                           <option value="">--Select Course--</option>
                          @foreach($coursedata as $key=> $value)
                            <option value="{{$key}}" {{ ($key == ($getData->course_id ?? '')) ? 'selected' : '' }} >{{$value}}</option>
                            @endforeach
                       </select>
                      </div>
                      <div class="col-md-6">
                          <label>City</label>
             <select class="form-control" name="city[]" multiple>
                 <option value="">--Select City--</option>
                 @foreach($citydata as $key=> $city)
              <option value="{{ $key }}" {{ ($key == ($getData->city_id ?? '')) ? 'selected' : '' }}>
    {{ $city }}
</option> @endforeach
             </select>
                      </div>
                      
                        <div class="col-md-4">
                          <label>Prefix/Suffix</label>
                          <select class="form-control">
                            <option value="">--Select Prefix/Suffix--</option> 
                            <option value="1">Prefix</option> 
                            <option value="2">Suffix</option> 
                          </select>
                          </div>
                        <div class="col-md-8">
                          <label>Slug</label>
                    <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{ old('slug', $getData->slug ?? '') }}">
  <input type="hidden" class="form-control" placeholder="" name="id" value="{{ old('id', $getData->id ?? '') }}">

                      </div>
                       <div class="col-md-12">
                      
                         <button class="btn btn-primary" style="margin-top: 30px;">Submit</button>
                      </div>
                      
                  </div>
                  </form>
                  <br><br>
                  
              
             
                <div class="table-responsive p-0">
                 <a href="{{route('add_course_location')}}"><button class="btn btn-primary" type="submit" style="float:right;">Add Course Location</button></a>
                  <table class="table table-hover text-nowrap1" id="example">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th> Slug</th>
                        <th>City</th>
                        <th>Course</th>
                        <th width="1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                       //echo $citydata[1];
                        @endphp
                     @foreach($data['location'] as $locationValue)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$locationValue->slug}}</td>
                       <td>{{ $citydata[$locationValue->city_id] ?? 'N/A' }}</td>
                        <td>{{$coursedata[$locationValue->course_id] ?? 'N/A' }}</td>
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('admin/edit-location/'.$locationValue->id)}}">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/remove-location/'.$locationValue->id)}}">Delete</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                    
                    @endforeach

                      

                    </tbody>
                  </table>
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

<script>
    new DataTable('#example', {
    layout: {
        bottomEnd: {
            paging: {
                firstLast: false
            }
        }
    }
});
</script>
  


  


@endsection