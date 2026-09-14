@extends('backend.layouts.app')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="row mart10 padd">
    <div class="col-md-8">
    </div>
    <div class="col-md-4">
      <a class="btn btn-primary btn-sm float-right" href="{{url('admin/courses')}}">Manage Courses</a>
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
              <h3 class="card-title">Course Solutions</h3>

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

              <!---------------------->
              <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link" href="{{url('admin/edit-course/'.$data['id_hash'])}}">Basic</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-batch/'.$data['id_hash'])}}">Batches</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-enroll/'.$data['id_hash'])}}">Enroll</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-training/'.$data['id_hash'])}}">Training</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('admin/course-solutions/'.$data['id_hash'])}}">Skills Covered</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-certificate/'.$data['id_hash'])}}">Tools Covered</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-syllabus/'.$data['id_hash'])}}">Syllabus</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-faq/'.$data['id_hash'])}}">Faq Description</a>
                    </li>
                    <!--<li class="nav-item ">-->
                    <!--  <a class="nav-link" href="{{url('admin/course-certificate-training/'.$data['id_hash'])}}">Training & Certificates</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-testimonial/'.$data['id_hash'])}}">Testimonial</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="{{url('admin/course-project/'.$data['id_hash'])}}">Projects</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-heading/'.$data['id_hash'])}}">Heading</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">SEO</a>
                    </li>
                  </ul>
                </div>
              </nav>
              <br>

              <!---------------------->


              <!------------------------>
              @if (\Session::has('success'))
              <div class="alert alert-success">
                {!! \Session::get('success') !!}
              </div>
              @endif

              <form method="post" action="{{url('admin/insertSolutions')}}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$category->id}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Name with (_)underscore </label>
                      <textarea type="text" class="form-control" name="name"></textarea>
                    </div>
                  </div>



                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Submit">

                      <a href="{{url('admin/course-certificate/'.$data['id_hash'])}}" class="btn btn-primary">Next</a>
                    </div>
                  </div>

                </div>
              </form>
              <!-------------------------->


              <!------------- Table ---------->
              @if($solutions->total() > 0)
              <div class="table-responsive p-0">
                <table class="table table-hover text-nowrap1">
                  <thead>
                    <tr>
                      <th>Sno</th>
                      <th>Name</th>
                        <th>Order No</th>
                      <th width="1">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 0; @endphp
                    @foreach ($solutions as $cat)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td><input type="text" value="{{$cat->name}}" onchange="orderChangeContent(this.value,'{{$cat->id}}')" class="form-control"></td>
                       <td><input type="number" value="{{$cat->order_by}}" onchange="orderChange(this.value,'{{$cat->id}}')"></td>
                      <td>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/delete-solutions')}}/{{$cat->id}}">Delete</a>
                      </td>

                    </tr>
                    <?php ++$i; ?>
                    @endforeach



                  </tbody>
                </table>
              </div>
              <div class="gmz-pagination">
                {!! $solutions->links('pagination::bootstrap-4') !!}
              </div>

              @else
              <div class="alert alert-warning">{{__('No data')}}</div>
              @endif
              <!------- Table #END ------------->


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
function orderChangeContent(srno,id){
   $.ajax({
        url: '{{ url("admin/savesolutionContent") }}', // Use route name for better practice
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
    function orderChange(srno,id){
        console.log(srno);
          $.ajax({
        url: '{{ url("admin/savesolutionOrder") }}', // Use route name for better practice
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