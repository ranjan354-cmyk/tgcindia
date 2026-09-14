@extends('backend.layouts.app')
@section('content')

<style>
    .tabactive{
        background:red;
        color:#fff;
    }
    .tabactive .clr{
          color:#fff !important;
    }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="row mart10 padd"></div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Theme Settings Management</h3>


<button class="btn btn-primary" type="submit" style="margin-left: 30px;" data-toggle="modal" data-target="#myModal">Add Font Family</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
          
          
          
          <form method="post" action="">
              @csrf
              <div id="showData"></div>
             <div class="row">
                 <div class="col-md-12">
                     <label>Font Family</label>
            <input type="text" class="form-control" id="font_family" placeholder="Font Family">                  
                 </div>
                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary mt-3" onclick="saveFontFamily('hello')">
                         Submit
                         
                     </button>
                     
                 </div>
                 
             </div> 
          </form>
          
          <table class="table table-bordered">
              <tr>
                  <th>Sr No</th>
                    <th>Font Name</th>
                      <th>Action</th>
              </tr>
              @foreach($font_family as $key=> $font_family_value)
               <tr>
                  <td>{{++$key}}</td>
                    <td><input type="text" class="form-control" value="{{$font_family_value->font_name}}" onchange="updateFontFamily(this.value,'{{$font_family_value->id}}')"></td>
                    <td>  
                      <button class="btn btn-danger" type="submit" onclick="RemoveData('{{$font_family_value->id}}')">Remove</button></td>
              </tr>
              @endforeach
              
          </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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
                <div id="showdataMsg"></div>
                <form method="post" action="{{url('admin/themeSave')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <table class="table table-bordered">
                    <tr style="text-align: center;">
                       <th class="tab setting1 tabactive" onclick="getchnageBack('1','general_setting')"><a href="#" style="color:#000;text-decoration:none;" class="clr"> General Settings</a></th>
                  <th class="tab setting3" onclick="getchnageBack('3','typography_setting')"><a href="#" style="color:#000;text-decoration:none;" class="clr">Typography Setting</a></th>
                    
                     <th class="tab setting4" onclick="getchnageBack('4','header_setting')"><a href="#" style="color:#000;text-decoration:none;" class="clr">Header & Nav</a></th>
                    <th class="tab setting5" onclick="getchnageBack('5','icons_setting')"><a href="#" style="color:#000;text-decoration:none;" class="clr"> Icons</a></th>
                    <th class="tab setting6" onclick="getchnageBack('6','footer_setting')"><a href="#" style="color:#000;text-decoration:none;" class="clr"> Footer Setting</a></th>
                    </tr>
                    </table>
                    <div > 
                <input type="hidden" name="id" value="1">
                <div class="form-horizontal p-0 row" id="showdata">
                
                  </div>
                  <hr style="border: 2px solid #069;">
                  <input type="submit" value="Submit" class="btn btn-primary" onclick="saveTheme('hello')">
                </div>
                </form>
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
      function saveTheme(id){
        var theme_bg=$("#theme_bg").val();
        var status=$("#status").val();
        var theme_foter_bg = $("#theme_foter_bg").val();
        var theme_font=$("#theme_font").val();
        var theme_topbar=$("#theme_topbar").val();
        var theme_header=$("#theme_header").val();
          var theme_icon=$("#theme_icon").val();
        var theme_font_weight=$("#theme_font_weight").val();
        
        var heading_font_family=$("#heading_font_family").val();
        var heading_font_size=$("#heading_font_size").val();
        var heading_font_space=$("#heading_font_space").val();
        var heading_font_weight=$("#heading_font_weight").val();
        //var theme_font_weight=$("#theme_font_weight").val();
        var sub_heading_font=$("#sub_heading_font").val();
        var sub_heading_font_weight=$("#sub_heading_font_weight").val();
        
         var sub_heading_font_size=$("#sub_heading_font_size").val();
        var sub_heading_font_space=$("#sub_heading_font_space").val();
         var pragaraph_font_size=$("#pragaraph_font_size").val();
        var paragraph_space=$("#paragraph_space").val();
        
        
       // console.log(theme_foter_bg);
           $.ajax({
         url: '{{ url("admin/themeSave") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            theme_bg:theme_bg,
            theme_foter_bg:theme_foter_bg,
            status:status,
            theme_font:theme_font,
            theme_topbar:theme_topbar,
            theme_header:theme_header,
            theme_icon:theme_icon,
            status:status,
            theme_font_weight:theme_font_weight,
            heading_font_family:heading_font_family,
            
             heading_font_size:heading_font_size,
            heading_font_space:heading_font_space,
             sub_heading_font:sub_heading_font,
            sub_heading_font_weight:sub_heading_font_weight,
             sub_heading_font_size:sub_heading_font_size,
            sub_heading_font_space:sub_heading_font_space,
            heading_font_weight:heading_font_weight,
             pragaraph_font_size:pragaraph_font_size,
              paragraph_space:paragraph_space,
            
        },
        success: function(response) {
          //  console.log('Success:', response);
          
          $("#showdataMsg").html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
          
          
          event.preventDefault();
      }
  
      function getchnageBack(id,st){
          console.log(st);
          event.preventDefault();
           $(".tab").removeClass("tabactive");
          $(".setting"+id).addClass("tabactive");
          
          
           $.ajax({
         url: '{{ url("admin/") }}'+"/"+st, // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            
        },
        success: function(response) {
          //  console.log('Success:', response);
          
          $("#showdata").html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
          
      }
      
      function saveFontFamily(id){
          console.log("id-->"+id);
          var font_family=$("#font_family").val();
          $.ajax({
              url:'{{url('admin/saveFontFamily')}}',
              type:'post',
              data:{
              _token: '{{ csrf_token() }}', 
                 font_family: font_family,  
              },
              success:function(response){
                  console.log(response);
                  $("#showData").html(response);
              }
              
          })
          
          event.preventDefault();
          
      }
      function updateFontFamily(value,id){
       //   console.log(value);
       
       $.ajax({
           url:'{{url('admin/updateFontFamily')}}',
           type:'post',
           data:{
              _token:'{{csrf_token()}}' ,
                value: value,
                 id: id,  
               
           },
           success:function(response){
               console.log(response);
               $("#showData").html(response);
               
           }
       })
          
      }
      function RemoveData(id){
        //  console.log("id-->"+id);
        
        $.ajax({
            url:'{{url('admin/removeFontFamily')}}',
            type:'post',
            data:{
              _token:'{{csrf_token()}}' ,
                id:id
            },
            success:function(data){
                console.log(data);
                 $("#showData").html(data);
            }
            
            
        })
          
      }
  </script>


  


@endsection