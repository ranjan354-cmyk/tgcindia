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
                <h3 class="card-title">Schema Manager</h3>

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
                
                  <form method="post" action="{{route('addschema')}}" enctype="multipart/form-data" >
              @csrf
             <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                        <label>Page</label> 
                        <select class="form-control">
                           <option value="">--Select Page--</option> 
                           @foreach($data['page_category'] as $page_category)
                              <option value="{{$page_category->id}}">{{$page_category->page_name}}</option> 
                              @endforeach
                        </select>
                        
                     </div>
                 </div>
                     <div class="col-md-12">
                     <div class="form-group">
                        <label>Page Url</label> 
                       
                        <input type="text" name="url" class="form-control" placeholder="URl">
                     </div>
                 </div>
                 
                 <input type="hidden" value="{{ ($data['redirectdata']->id)??'' }}" name="id">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label> Category</label> 
                        <select class="form-control" onchange="getSchemaType(this.value)">
                           <option value="">--Select Category--</option> 
                           @foreach($data['schema_category'] as $category)
                              <option value="{{$category->id}}">{{$category->category}}</option> 
                              @endforeach
                        </select>
                        
                     </div>
                 </div>
                 
                   <div class="col-md-6">
                     <div class="form-group" id="ShowHtml">
          
                     </div>
                 </div>
            
                     <div class="col-md-12">
                     <div class="form-group">
                        <label>Schema</label> 
                           <textarea type="text" class="form-control" name="schema_keyword" value="" required>{{ ($data['redirectdata']->schema_keyword)??'' }}</textarea>
                     </div>
                 </div>
                 
             </div>
              
             <button class="btn btn-primary " type="submit">Submit</button>
              
                </form>
                <br><br>
                
                     <div class="table-responsive p-0">
                  <table class="table table-hover text-nowrap1" id="example">
                    <thead>
                      <tr>
                        <th>Sno</th>
                                                <th>Page </th>
                        <th> schema_keyword </th>
                       
                        <th width="1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                     
                        @endphp
                     @foreach($data['redirect'] as $keyda=> $redirectValue)
                      <tr>
                        <td>{{ $keyda+1 }}</td>
                         <td>{{$redirectValue->page_name}}</td>
                        <td>{{$redirectValue->schema_keyword}}</td>
                        
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               <a class="dropdown-item" href="{{url('admin/edit-schema')}}/{{$redirectValue->id}}">Edit</a>    
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/remove-schema/'.$redirectValue->id)}}">Delete</a>
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
function getSchemaType(id){
    $.ajax({
        url:'saveschemacategory',
        type:'post',
        data:{
            _token:'{{ csrf_token() }}',
            id:id,
           
            
        },
        success:function(response){
            $("#ShowHtml").html(response);
            //console.log(response);
        }
        
    })
    
}

function getSchema(id){
    console.log(id);
    
}
</script>
  


  


@endsection