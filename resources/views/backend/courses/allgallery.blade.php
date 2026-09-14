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
                <h3 class="card-title">Gallery Management</h3>

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
                  <form method="post" action="{{route('savegallery')}}" enctype="multipart/form-data">
                      @csrf
                  <div class="row">
                     <div class="col-md-12">
                         <label>Category</label>
                        <select class="form-control" name="cate_id">
                            <option value="">--Select Category--</option>
                            @foreach( $data['category'] as $catename)
                               <option value="{{$catename->id}}">{{$catename->name}}</option>
                               @endforeach
                        </select>
                     </div>
                     
                       <div class="col-md-12">
                         <label>Thumbnail</label>
                        <input type="file" class="form-control" name="image[]" multiple>

                     </div>
                     
                   
                      
                       <div class="col-md-12">
                      
                         <button class="btn btn-primary" style="margin-top: 30px;">Submit</button>
                      </div>
                      
                  </div>
                  </form>
                  <br><br>
                  
              
             
                <div class="table-responsive p-0">
                  <a href="{{url('admin/gallery-cat')}}"><button class="btn btn-primary" style="float: right;">
                        Manage Category
                    </button></a> 
                  <table class="table table-hover text-nowrap1" id="example">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>category</th>
                        <th> Image</th>
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
                      <td>
                        
                          {{($datacatename[$locationValue->cate_id])??'' }}
                      </td>
                         <td>
                             
                             
                            
  <img src="{{url('public/uploads/'.$locationValue->image)}}" height="200" width="200">


                             
                             </td>
                            <td>
                        
                          <input type="number" value="{{$locationValue->order_by }}" onchange="SetOrderNew(this.value,'{{$locationValue->id }}')">
                      </td>
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/remove-gallery/'.$locationValue->id)}}">Delete</a>
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

function SetOrderNew(srno,id){
   // console.log(id)
   
   
     $.ajax({
         url: '{{ url("admin/saveOrdergallery") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            srno: srno
        },
        success: function(response) {
            console.log('Success:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
    
}
</script>
  


  


@endsection