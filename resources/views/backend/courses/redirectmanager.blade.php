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
                <h3 class="card-title">Redirect Manager</h3>

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
                
                  <form method="post" action="{{route('addredirectmanager')}}" enctype="multipart/form-data" >
              @csrf
             <div class="row">
                 <div class="col-md-12">
                     <div class="form-group">
                        <label>Redirect Type</label> 
                 <select class="form-control" name="redirect_type" >
    <option value="">--Select Type--</option>
    @foreach(['301', '302'] as $type)
        <option value="{{ $type }}" {{ (old('redirect_type', $data['redirectdata']->redirect_type ?? '') == $type) ? 'selected' : '' }}>
            {{ $type }}
        </option>
    @endforeach
</select>
                     </div>
                 </div>
                 <input type="hidden" value="{{ ($data['redirectdata']->id)??'' }}" name="id">
                 <div class="col-md-12">
                     <div class="form-group">
                        <label>Redirect From</label> 
                        <input type="text" class="form-control" name="redirect_from" value="{{ ($data['redirectdata']->redirect_from)??'' }}" required>
                     </div>
                 </div>
                     <div class="col-md-12">
                     <div class="form-group">
                        <label>Redirect To</label> 
                         <input type="text" class="form-control" name="redirect_to" value="{{ ($data['redirectdata']->redirect_to)??'' }}" required>
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
                         <th>  Type</th>
                        <th> Redirect From</th>
                        <th> Redirect To</th>
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
                          <td>{{$redirectValue->redirect_type}}</td>
                        <td>{{$redirectValue->redirect_from}}</td>
                         <td>
                             
                             
                             
                            {{$redirectValue->redirect_to}}
                             </td>
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               <a class="dropdown-item" href="{{url('admin/redirect-manager-edit')}}/{{$redirectValue->id}}">Edit</a>    
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/remove-redirect-manger/'.$redirectValue->id)}}">Delete</a>
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
function changeOrder(srno,id){
    $.ajax({
        url:'savegallerycateorder',
        type:'post',
        data:{
            _token:'{{ csrf_token() }}',
            id:id,
            srno:srno
            
        },
        success:function(response){
            console.log(response);
        }
        
    })
    
}
</script>
  


  


@endsection