@extends('backend.layouts.app')
@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
   <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
   <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
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
                <h3 class="card-title">All Curriculum </h3>

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
            
               
               
               
               <table id="example" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Course name</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>
             @foreach($sqlallCourse as $key=> $sqlallCoursevalue )
            <tr>
                <td>{{$key++}}</td>
                <td>{{$sqlallCoursevalue->name}}</td>
                         <td><a href="https://www.tgcindia.com/public/uploads/{{$sqlallCoursevalue->pdf_curriculum}}" download><button class="btn btn-primary" type="submit">Download </button></a></td>
              
              
            </tr>
                 @endforeach
         
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>
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