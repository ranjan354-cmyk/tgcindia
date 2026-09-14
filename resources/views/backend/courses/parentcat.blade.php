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
                <h3 class="card-title">Parent Topic Management</h3>

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
              
                  
              
             
                <div class="table-responsive p-0">
                  <table class="table table-hover text-nowrap1" id="example">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th> Name</th>
                        <th> Order No</th>
                        
                        <th width="1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                     
                        @endphp
                   @foreach($data['cat'] as $k=> $cat)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td><input type="text" value="{{$cat->name}}" class="form-control" onchange="orderChangeParentText(this.value,'{{$cat->id}}')"></td>
                         <td>
                             
                        <input type="number" value="{{$cat->orders_by}}" onchange="orderChange(this.value,'{{$cat->id}}')" >     
                             
                            
                             
                             </td>
                        <td>  
<div class="dropdown">

                          <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                   <a class="dropdown-item" href="{{url('admin/parent-topic-edit')}}/{{$cat->id}}/{{$cat->course_id}}">View Topic</a>
 <a class="dropdown-item" href="{{url('admin/parent-handson-edit')}}/{{$cat->id}}/{{$cat->course_id}}">View Hands-On</a>
 <a class="dropdown-item" href="{{url('admin/parent-skills-edit')}}/{{$cat->id}}/{{$cat->course_id}}">View Skills</a>


                            <a onclick="return confirm('Are you sure you want to delete this item? All Child Value also be deleted!!!');" class="dropdown-item" href="{{url('admin/delete-syllabus')}}/{{$cat->id}}">Delete</a>


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
  
<script>
function orderChangeParentText(id,srno){
    
    $.ajax({
        url: '{{ url("admin/saveParentTopicName") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            srno: srno
        },
        success: function(response) {
            console.log('Success:', response);
        //    window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
    
}
   function orderChange(id, srno) {
       console.log(srno);
   
   $.ajax({
        url: '{{ url("admin/saveTopicOrderCourse") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            srno: srno
        },
        success: function(response) {
            console.log('Success:', response);
        //    window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
    
}
</script>

  


@endsection