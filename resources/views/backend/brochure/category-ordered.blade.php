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
                <h3 class="card-title">Category Management</h3>

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
                        <th> Course Name</th>
                        <th> Order No</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                       //echo $citydata[1];
                        @endphp
                     @foreach($courses as $locationValue)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$locationValue->name}}</td>
                      
                    <td><input type="number" value="{{$locationValue->category_order}}" onchange="orderChange(this.value,'{{$locationValue->id}}')"></td>

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

 function orderChange(srno,id){
        console.log(srno);
          $.ajax({
        url: '{{ url("admin/savecategoryOrder") }}', // Use route name for better practice
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