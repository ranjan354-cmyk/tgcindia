@extends('backend.layouts.app')
@section('content')


<script>
    function ConvertWebp(id){
       /// console.log(id);
        $.ajax({
         url: '{{ url("admin/convertimage") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
          
        },
        success: function(response) {
            console.log('Success:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
       
        event.preventDefault();
    }
    
        function getOrderNo(srno,id){
       /// console.log(id);
        $.ajax({
         url: '{{ url("admin/blogOrder") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            srno:srno,
          
        },
        success: function(response) {
            console.log('Success:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
       
        event.preventDefault();
    }
    
      function UpdateOpenAPI(id){
      var Tone=$("#Tone").val();
      var Length=$("#Length").val();
      var Prompt=$("#Prompt").val();
        $.ajax({
         url: '{{ url("admin/UpdateOpenAPI") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            Tone:Tone,
            Length:Length,
            Prompt:Prompt
            
          
        },
        success: function(response) {
            //console.log('Success:', response);
            $("#showmsg").html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
       
        event.preventDefault();
    }
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
   <div class="row mart10 padd">
        <div class="col-md-12">
            
           <!-- <form method="post">
             <button class="btn btn-primary" type="submit" onclick="ConvertWebp('hello')">Convert In WEBP</button>   
                
            </form>
            <br>
            
            --->
             <form method="POST" action="{{route('generate-blog')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-md-2">
    <select class="form-control select2" name="parent" style="width: 100%;">

                        <option value="0">Select</option>

                        @foreach ($categories1 as $cat)

                        <option value="{{$cat->id}}">{{$cat->name}}</option>

                        @endforeach

                      </select>
                      </div>
                      
                       <div class="col-md-2"> 
    <input type="file" name="image"  >
    </div>
                     <div class="col-md-4"> 
    <input type="text" name="topic" placeholder="Enter blog topic" class="form-control" required>
    </div>
     <div class="col-md-2"> 
    <button type="submit" class="btn btn-primary">Generate AI Blog</button>
    </div>
  </form>
            
            
             <div class="col-md-2"> 
   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add AI Prompt</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <form>
              <span id="showmsg"></span>
              <div class="row">
                  <div class="col-md-6">
                      <label>Tone</label>
                      <input type="text" class="form-control" placeholder="Tone" id="Tone" value="{{$promptaidata->tone}}">
                  </div>
                  <div class="col-md-6">
                      <label>Length</label>
                      <input type="number" class="form-control" placeholder="Length" id="Length" value="{{$promptaidata->length}}">
                  </div>
                   <div class="col-md-12">
                      <label>Prompt</label>
                      <textarea type="text" class="form-control" placeholder="Prompt" id="Prompt">{{$promptaidata->prompt}}</textarea>
                  </div>
                   <div class="col-md-12">
                      
                      <button type="submit" class="btn btn-primary" style="margin-top:30px;" onclick="UpdateOpenAPI('1')">Update AI Prompt</button>
                  </div>
              </div>
              
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    </div>
     </div>       
            
            <br> <br> 
          <form class="row" method="get" action="">
            <div class="col-md-4 no-margin-left">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Keywords" value="<?=$data['keyword'];?>"> 
                </div>
              </div>
              
              
             <div class="col-md-3 no-padding-left">
                <div class="form-group">
                  <select class="form-control select2" name="parent" style="width: 100%;">

                        <option value="0">Select</option>

                        @foreach ($categories1 as $cat)

                        <option  <?php if($data['category'] == $cat->id){ echo "selected"; } ?> value="{{$cat->id}}"  >{{$cat->name}}</option>

                        @endforeach

                      </select>
                </div>
              </div>
              
          
              
              
              <div class="col-md-2 no-padding-left">
                <div class="form-group">
                  <select class="form-control select2" name="r_page">
                    <option value="25"> 25 Records Per Page</option>
                    <option <?php if($data['r_page'] == '50'){ echo "selected"; } ?> value="50"> 50 Records Per Page</option>
                    <option <?php if($data['r_page'] == '100'){ echo "selected"; } ?> value="100"> 100 Records Per Page</option>
                  </select>
                </div>
              </div>

              <div class="col-md-1 no-padding-left">
                <div class="form-group " >
                    <button type="submit" class="btn btn-primary" > Filter</button> 
                </div>
              </div>
            </form>
        </div>
        


        <div class="col-md-4">
          <a class="btn btn-primary btn-sm float-right" href="{{url('admin/add-blog')}}">Add New Blog</a>
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
                <h3 class="card-title">Blog Management</h3>

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
                @if($categories->total() > 0)
                <div class="table-responsive p-0">
                  <table class="table table-hover text-nowrap1">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th> Name</th>
                        <th> ParentName</th>
                        <th>Status</th>

                        <th>Date Added</th>
                        <th>Popular</th>
                          <th>Home Order No</th>
                        <th width="1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $cat)
                      <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->parent}}</td>
                        <td>{{$cat->staus}}</td>
                        <td>{{$cat->add_date}}</td>
                        <td>
                          @php if($cat->popular == 1){ @endphp
                            <a class="text-warning" href="{{url('admin/blog-poular?popular=0&id='.$cat->id)}}">Remove</a>
                          @php } else { @endphp
                            <a href="{{url('admin/blog-poular?popular=1&id='.$cat->id)}}">Add</a>
                          @php } @endphp
                        </td>
                        <td>
                            <input type="number" onchange="getOrderNo(this.value,'{{$cat->id}}')" value="{{$cat->order_by}}">
                        </td>
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('admin/edit-blog/')}}/{{$cat->id_hash}}">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/delete-blog')}}/{{$cat->id}}"">Delete</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                      <?php ++$i; ?>
                      @endforeach

                      

                    </tbody>
                  </table>
                </div>
                <div class="gmz-pagination">
                    {!! $categories->links('pagination::bootstrap-4') !!}
                </div>

                @else
                    <div class="alert alert-warning">{{__('No data')}}</div>
                @endif
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