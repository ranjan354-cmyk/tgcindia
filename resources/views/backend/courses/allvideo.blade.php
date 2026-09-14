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
                <h3 class="card-title">Video Management</h3>

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
                  <form method="post" action="{{route('savevideo')}}" enctype="multipart/form-data">
                      @csrf
                  <div class="row">
                     <div class="col-md-6">
                         <label>Name</label>
                         
                         <input type="hidden" value="{{ $sqldata->id ?? '' }}" name="id">
                         <input type="text" class="form-control" placeholder="Name" name="name" value="{{$sqldata->course_name??''}}">
                     </div>
                      <div class="col-md-6">
                         <label>Order No</label>
                         <input type="number" class="form-control" placeholder="Order No" name="sr_no" value="{{$sqldata->order_by??''}}">
                     </div>
                       <div class="col-md-12">
                         <label>Thumbnail</label>
                         <img width="345" height="200" src="https://www.tgcindia.com/public/uploads/{{$sqldata->image??''}}
" class="videoinfo_back_video_img__A5oTt" alt="thumbnail">
                        <input type="file" class="form-control" name="imagenew" >

                     </div>
                     
                      <div class="col-md-12">
                         <label>Youtube URL</label>
                        <input type="text" class="form-control" name="image"  value="{{$sqldata->video??''}}">

                     </div>
                      
                       <div class="col-md-12">
                      
                         <button class="btn btn-primary" style="margin-top: 30px;">Submit</button>
                      </div>
                      
                  </div>
                  </form>
                  <br><br>
                  
              
             
                <div class="table-responsive p-0">
                  <table class="table table-hover text-nowrap1" id="example">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th> Name</th>
                        <th> Video</th>
                         <th> Order By</th>
                        <th width="1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                     
                        @endphp
                     @foreach($Videosql as $locationValue)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$locationValue->course_name}}</td>
                         <td>
                             
                             
                             
                           {{$locationValue->video}}
                             
                             </td>
                             
                             <td><input type="number" value="{{$locationValue->order_by}}" id="getdata{{$locationValue->id}}" onchange="getdataValue(this.value,{{$locationValue->id}})"></td>
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/remove-video/'.$locationValue->id)}}">Delete</a>
                                
                                      <a class="dropdown-item" href="{{url('admin/update-video/'.$locationValue->id)}}">Edit</a>
                           
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
function getdataValue(value,id){
    console.log("id---->"+id);
    
    $.ajax({
       url:'updatevideoorder',
       type:'post',
       data:{
           _token:'{{ csrf_token() }}',
           id:id,value:value
       },
       success:function(data){
        console.log(data);   
       }
       
    });
}

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