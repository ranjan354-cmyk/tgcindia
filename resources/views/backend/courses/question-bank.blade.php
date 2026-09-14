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
                <h3 class="card-title">Question Bank Management</h3>

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
                  <form method="post" action="{{route('saveQuestionbank')}}" enctype="multipart/form-data">
                      @csrf
                  <div class="row">
               
                      <div class="col-md-6">
                         <label>Test</label>
                        <select class="form-control" name="test">
                            <option value="">--Select Test--</option>
                            @foreach( $data['question_test'] as $questionTestValue)
                             <option value="{{$questionTestValue->id}}">{{$questionTestValue->title}}</option>
                             @endforeach
                        </select>

                     </div>  <div class="col-md-6">
                         <label>Section</label>
                        <select class="form-control" name="section">
                            <option value="">--Select Section--</option>
                            @foreach( $data['question_section'] as $questionsectionValue)
                             <option value="{{$questionsectionValue->id}}">{{$questionsectionValue->section_name}}</option>
                             @endforeach
                        </select>

                     </div>
                     
                     
                       <div class="col-md-12">
                         <label>Question</label>
                        <input type="text" class="form-control" name="question" >

                     </div>
                      <div class="col-md-12">
                         <label>Marks</label>
                        <input type="number" class="form-control" name="marks" >

                     </div>
                     
                     
                      <div class="col-md-6 mt-2">
                         <label>Option1</label>
                          <input type="checkbox" value="0" name="correct_option[]">Correct Option 1
                        <input type="text" class="form-control" name="Option1[]" >

                     </div>
                      <div class="col-md-6 mt-2">
                         <label>Option2</label>
                          <input type="checkbox" value="1"  name="correct_option[]">Correct Option 2
                        <input type="text" class="form-control" name="Option1[]" >

                     </div>
                      <div class="col-md-6 mt-2">
                         <label>Option3</label>
                          <input type="checkbox" value="2"  name="correct_option[]">Correct Option 3
                        <input type="text" class="form-control" name="Option1[]" >

                     </div>
                      <div class="col-md-6 mt-2">
                         <label>Option4</label>
                         <input type="checkbox" value="3"  name="correct_option[]">Correct Option 4
                        <input type="text" class="form-control" name="Option1[]" >

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
                        <th>Question</th>
                        <th> Section</th>
                         <th> Order By</th>
                        <th width="1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                     
                        @endphp
                     @foreach($data['question_bank'] as $questionValue)
                      <tr>
                        <td>{{$i++}}</td>
                      <td>
                        
                         {{$questionValue->question}} 
                      </td>
                         <td>
                             
                             
                         {{$sectiname[$questionValue->section_id] ?? 'Unknown Section'}}
 


                             
                             </td>
                            <td>
                        
                          <input type="number" value="{{$questionValue->order_no }}" onchange="SetOrderNewData(this.value,'{{$questionValue->id }}')">
                      </td>
                        <td>  

                          <div class="dropdown">
                            <i class="fa fa-ellipsis-v side-el " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" href="{{url('admin/remove-question/'.$questionValue->id)}}">Delete</a>
                          
                                <a  class="dropdown-item" href="{{url('admin/update-question/'.$questionValue->id)}}">Edit</a>
                           
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