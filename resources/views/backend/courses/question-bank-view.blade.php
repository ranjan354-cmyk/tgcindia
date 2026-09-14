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
                  <form method="post" action="{{route('updateQuestionbank')}}" enctype="multipart/form-data">
                      @csrf
                  <div class="row">
               
                      <div class="col-md-6">
                         <label>Test</label>
                        <select class="form-control" name="test">
                            <option value="">--Select Test--</option>
                            @foreach( $data['question_test'] as $questionTestValue)
                             <option value="{{$questionTestValue->id}}"   @if($data['question_bank']->test_id==$questionTestValue->id) selected  @endif>{{$questionTestValue->title}}</option>
                             @endforeach
                        </select>

                     </div>  <div class="col-md-6">
                         <label>Section</label>
                        <select class="form-control" name="section">
                            <option value="">--Select Section--</option>
                            @foreach( $data['question_section'] as $questionsectionValue)
                             <option value="{{$questionsectionValue->id}}" @if($data['question_bank']->section_id==$questionsectionValue->id) selected @endif >{{$questionsectionValue->section_name}}</option>
                             @endforeach
                        </select>

                     </div>
                     
                      <input type="hidden" class="form-control" name="id" value="{{$data['question_bank']->id }}" >
                       <div class="col-md-12">
                         <label>Question</label>
                        <input type="text" class="form-control" name="question" value="{{$data['question_bank']->question }}" >

                     </div>
                      <div class="col-md-12">
                         <label>Marks</label>
                        <input type="number" class="form-control" name="marks" value="{{$data['question_bank']->marks }}">

                     </div>
                   @php 
                   $srNo=0;
                   @endphp
                   
                     @foreach($data['question_option'] as $index=> $optionValue)
                   @php 
                   $srNo++;
                   @endphp
                   
                      <div class="col-md-6 mt-2">
                         <label>Option{{$srNo}}</label>
                          <input type="checkbox" value="{{$index}}" name="correct_option[]" @if($optionValue->is_correct==1) checked @endif>Correct Option {{$srNo}}
                        <input type="text" class="form-control" name="Option1[]" value="{{$optionValue->option_text}}">

                     </div>
                     @endforeach
                     
                  <!--    <div class="col-md-6 mt-2">
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
                   
                      ---->
                       <div class="col-md-12">
                      
                         <button class="btn btn-primary" style="margin-top: 30px;">Submit</button>
                      </div>
                      
                  </div>
                  </form>
                  <br><br>
                  
              
             
            
                
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