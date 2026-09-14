@extends('backend.layouts.app')

@section('content')



<style>
 
 

  a {
    text-decoration: none;
    color: #379937;
  }
  
  
  .dropdown {
    position: relative;
    font-size: 14px;
    color: #333;
  
    .dropdown-list {
      padding: 12px;
      z-index: 66;
      background: #fff;
      position: absolute;
      top: 30px;
      left: 2px;
      right: 2px;
      box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
      transform-origin: 50% 0;
      transform: scale(1, 0);
      transition: transform .15s ease-in-out .15s;
      max-height: 66vh;
      overflow-y: scroll;
    }
    
    .dropdown-option {
      display: block;
      padding: 8px 12px;
      opacity: 0;
      transition: opacity .15s ease-in-out;
    }
    
    .dropdown-label {
      display: block;
      height: 30px;
      background: #fff;
      border: 1px solid #ccc;
      padding: 6px 12px;
      line-height: 1;
      cursor: pointer;
      
      &:before {
        content: '▼';
        float: right;
      }
    }
    
    &.on {
     .dropdown-list {
        transform: scale(1, 1);
        transition-delay: 0s;
        
        .dropdown-option {
          opacity: 1;
          transition-delay: .2s;
        }
      }
      
      .dropdown-label:before {
        content: '▲';
      }
    }
    
    [type="checkbox"] {
      position: relative;
      top: -1px;
      margin-right: 4px;
    }
  }
  </style>
  




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
                <div class="">
                    <form method="post"  action="{{route('saveExcludedCourse')}}">
                        @csrf
                    <button type="submit" class="btn btn-primary">Exclude By Course</button>
                    </form>
                    
                    <div class="cl-md-6">
                     <form method="post" action="{{route('saveExcludedParent')}}" method="post">
                         @csrf
                         <div class="row">
                  
                 
                      <input type="hidden" name="course_id" value="{{$category->id}}">
                      
                         <div class="col-md-3">

                    <div class="form-group">

                      <label>Excluded Course</label>
                      <select class="form-control" name="child_course[]" id="childcourse" multiple>
                          
                          @php
                          foreach($excludedCourse as $excludedCourseValue){
                          @endphp
                           <option value="{{$excludedCourseValue->id}}">{{$excludedCourseValue->name}}</option>
                           
                           @php
                           }
                           @endphp
                          
                      </select>
                      
                      </div>
                      </div>
                      
                         <div class="col-md-3">

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Assign</button>
</div>
</div>
                  
                  </div>
                  
               
      </form>
      </div>
       <div class="cl-md-6">
      
      
                           <form method="post" action="{{route('saveCopyParentCourse')}}" method="post">
                         @csrf
                         <div class="row">
                  
                 
                    
                      
                         <div class="col-md-3">

                    <div class="form-group">

                      <label>Copy Parent Course</label>
                      <select class="form-control" name="course_id"  >
                          
                          @php
                          foreach($getcourse as $excludedCourseValue){
                          @endphp
                           <option value="{{$excludedCourseValue->id}}">{{$excludedCourseValue->name}}</option>
                           
                           @php
                           }
                           @endphp
                          
                      </select>
                      
                      </div>
                      </div>
                      
                             <div class="col-md-3">

                    <div class="form-group">

                      <label>City </label>
                      <select class="form-control" name="city_id" onchange="getcityId(this.value)" >
                          <option value="">--Select City--</option>
                            <option value="10982">Parent</option>
                          @php
                          foreach($cityList as $cityValue){
                          @endphp
                           <option value="{{$cityValue->id}}">{{$cityValue->city}}</option>
                           
                           @php
                           }
                           @endphp
                          
                      </select>
                         </div>
                      </div>
                      
                      
                             <div class="col-md-3">

                    <div class="form-group">

                      <label>Subcity </label>
                      <select class="form-control" name="subcity[]" id="subcity" multiple>
                          
                         
                           
                           
                          
                          
                      </select>
                      
                      </div>
                      </div>
                      
                         <div class="col-md-3">

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Copy Course</button>
</div>
</div>
                  
                  </div>
                  
               
      </form>
      </div>
 </div>
              <h3 class="card-title">Update Course</h3>



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

                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('admin/edit-course/'.$data['id_hash'])}}">Basic</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-batch/'.$data['id_hash'])}}">Batches</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-enroll/'.$data['id_hash'])}}">Enroll</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-training/'.$data['id_hash'])}}">Courses Benefits</a>
                    </li>
                    <li class="nav-item">
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
                    
                    <li class="nav-item ">
                      <a class="nav-link" href="{{url('admin/course-heading/'.$data['id_hash'])}}">Heading</a>
                    </li>
                    
                 
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('admin/course-seo/'.$data['id_hash'])}}">SEO</a>
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



              <form method="post" action="{{url('admin/updateCourse')}}" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{$category->id}}">
 <input type="hidden" name="old_pdf_curriculum" value="{{$category->pdf_curriculum}}">
  <input type="hidden" name="old_course_thumbnail" value="{{$category->course_thumbnail}}">
                <input type="hidden" name="old_image" value="{{$category->image}}">

                {{ csrf_field() }}

                <div class="row">
      <div class="col-md-3">

                    <div class="form-group">

                      <label>Display Name</label>

                      <input type="text" class="form-control" name="display_name" value="{{$category->display_name}}" required>

                    </div>

                  </div>
                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Name</label>

                      <input type="text" class="form-control" name="name" value="{{$category->name}}" required>

                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Slug</label>

                      <input type="text" class="form-control" name="slug" value="{{$category->slug}}">

                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Category</label>

                      <select class="form-control select2" name="parent" style="width: 100%;" required>

                        <option value="">Select</option>

                        @foreach ($categories as $cat)

                        <option <?php if ($category->parent == $cat->id) {
                                  echo "selected";
                                } ?> value="{{$cat->id}}">{{$cat->name}}</option>

                        @endforeach

                      </select>

                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Image</label>

                      <input type="file" class="form-control" name="image">

                    </div>
                    <p class="custom-text" style="color: red;">Image Size Should be 30 × 30 px</p>

                  </div>

                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Reviews</label>

                      <input type="number" class="form-control" name="reviews" min="1" max="5" value="{{$category->reviews}}">

                    </div>

                  </div>







                  <div class="col-md-3">

                    <div class="form-group">

                      <label>No of Learners</label>

                      <input type="number" class="form-control" name="no_review" value="{{$category->no_review}}">

                    </div>

                  </div>

  <div class="col-md-3">

                    <div class="form-group">

                      <label>Display Position</label>

                      <input type="number" class="form-control" name="orders_by" value="{{$category->orders_by}}">

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Course Video Link</label>

                      <input type="text" class="form-control" name="video_link" value="{{$category->video_link}}">

                    </div>

                  </div>





                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Status</label>

                      <select class="form-control select2" name="status" style="width: 100%;">

                        <option value="Active">Active</option>

                        <option <?php if ($category->staus == 'InActive') {
                                  echo "selected";
                                } ?> value="InActive">InActive</option>

                      </select>

                    </div>

                  </div>



                  <div class="col-md-4">

                    <div class="form-group">

                      <label>At Home Page Category</label>

                      <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label " style="height: 45px">Select</label>
                        
                        <div class="dropdown-list">
                          {{-- <a href="#" data-toggle="check-all" class="dropdown-option">
                            Check All  
                          </a> --}}

                          <?php $selectedCategories = explode(',', $category->new_category); ?>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="home_page[]" value="Trending Courses"
                            <?php echo in_array("Trending Courses", $selectedCategories) ? 'checked' : ''; ?> />
                            Trending Courses
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="home_page[]" value="Popular courses"
                            <?php echo in_array("Popular courses", $selectedCategories) ? 'checked' : ''; ?> />
                            Popular courses
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="home_page[]" value="Career Related Programs" 
                            <?php echo in_array("Career Related Programs", $selectedCategories) ? 'checked' : ''; ?>/>
                            Career Related Programs
                        </label>
                        
                          
                          
                        </div>
                      </div>

                    </div>

                  </div>
                  
                   <div class="col-md-4">

                    <div class="form-group">

                      <label>Type (Trending Course)</label>

                      <select class="form-control select2" name="type_course" style="width: 100%;" >

                        <option value="0">--Select--</option>

                     

                      <option value="1" @if($category->type_course == '1') selected @endif>Best Seller</option>
                        <option value="2" @if($category->type_course == '2') selected @endif>High Demand</option>


                      </select>

                    </div>

                  </div>



                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Course Type</label>

                      <select class="form-control select2" name="course_type" style="width: 100%;">

                        <option value="">--Select--</option>

                        <option selected value="{{$category->course_type}}">{{$category->course_type}}</option>

                        <option value="Premium">Premium</option>

                        <option value="Feature">Feature</option>

                        <option value="Trending">Trending</option>

                        <option value="Comprehensive">Comprehensive</option>

                        <option value="Short Terms">Short Terms</option>

                      </select>

                    </div>

                  </div>



                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Course Based</label>

                      <select class="form-control select2" name="course_based" style="width: 100%;">

                        <option value="">--Select--</option>

                        <option selected value="{{$category->course_based}}">{{$category->course_based}}</option>

                        <option value="Certification Course">Certification Course</option>

                        <option value="Role Based Course">Role Based Course</option>

                        <option value="Top Universties Course">Top Universties Course</option>

                      </select>

                    </div>

                  </div>
                  
                                    <div class="col-md-4">

                    <div class="form-group">

                      <label>Add date</label>

                       <input type="date" class="form-control" name="add_date"  value="<?= $category->add_date; ?>">


                    </div>

                  </div>
                  
                   <div class="col-md-4">

                    <div class="form-group">

                      <label>Heading1</label>

                       <input type="text" class="form-control" name="heading1"  value="<?= $category->heading1; ?>">


                    </div>

                  </div>
                  
                   <div class="col-md-4">

                    <div class="form-group">

                      <label>Heading2</label>

                       <input type="text" class="form-control" name="heading2"  value="<?= $category->heading2; ?>">


                    </div>

                  </div>

 <div class="col-md-12">

                    <div class="form-group">

                      <label>H2 Tag Content</label>

                      <input type="text" class="form-control" name="h2_tags" value="<?= $category->h2_tags; ?>">

                    </div>

                  </div>


                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Short Content</label>

                      <input type="text" class="form-control" name="short_content" value="<?= $category->short_content; ?>">

                    </div>

                  </div>





                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Content</label>

                      <textarea name="content" class="summernote"><?= $category->content; ?></textarea>

                    </div>

                  </div>
                  
                   <div class="col-md-12">

                    <div class="form-group">
                        @php 
                        if($category->pdf_curriculum!=''){
                        @endphp
   <embed src="{{asset('public/uploads/'.$category->pdf_curriculum)}}" width="800px" height="2100px" />
@php 
}
@endphp
<br>
                      <label>PDF Curriculum</label>

                      <input type="file" class="form-control" name="pdf_curriculum" >

                    </div>

                  </div>
                  
                  
                    <div class="col-md-12">

                    <div class="form-group">
                        @php 
                        if($category->course_thumbnail!=''){
                        @endphp
   <embed src="{{asset('public/uploads/'.$category->course_thumbnail)}}" height="300" width="300" />
@php 
}
@endphp
<br>
                      <label>Course thumbnail</label>

                      <input type="file" class="form-control" name="course_thumbnail" >

                    </div>

                  </div>


                  

                  <div class="col-md-4">

                    <div class="form-group">

                      <img src="{{url('public/uploads/'.$category->image)}}" class="img-fluid">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="form-group">

                      <input type="submit" class="btn btn-primary" value="Next">

                    </div>

                  </div>



                </div>

              </form>

              <!-------------------------->





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






<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
function getcityId(id){
   /// console.log(id);
   $.ajax({
       url:"{{route('getsubcity')}}",
       type:'post',
       data:{
           _token:'{{ csrf_token() }}',
           id:id
       },
       success:function(res){
          $("#subcity").html(res);
       }
   })
   
}


function getCourse(id){
    console.log(id);
    
}

  (function($) {
  var CheckboxDropdown = function(el) {
    var _this = this;
    this.isOpen = false;
    this.areAllChecked = false;
    this.$el = $(el);
    this.$label = this.$el.find('.dropdown-label');
    this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
    this.$inputs = this.$el.find('[type="checkbox"]');
    
    this.onCheckBox();
    
    this.$label.on('click', function(e) {
      e.preventDefault();
      _this.toggleOpen();
    });
    
    this.$checkAll.on('click', function(e) {
      e.preventDefault();
      _this.onCheckAll();
    });
    
    this.$inputs.on('change', function(e) {
      _this.onCheckBox();
    });
  };
  
  CheckboxDropdown.prototype.onCheckBox = function() {
    this.updateStatus();
  };
  
  CheckboxDropdown.prototype.updateStatus = function() {
    var checked = this.$el.find(':checked');
    
    this.areAllChecked = false;
    this.$checkAll.html('Check All');
    
    if(checked.length <= 0) {
      this.$label.html('Select Options');
    }
    else if(checked.length === 1) {
      this.$label.html(checked.parent('label').text());
    }
    else if(checked.length === this.$inputs.length) {
      this.$label.html('All Selected');
      this.areAllChecked = true;
      this.$checkAll.html('Uncheck All');
    }
    else {
      this.$label.html(checked.length + ' Selected');
    }
  };
  
  CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
    if(!this.areAllChecked || checkAll) {
      this.areAllChecked = true;
      this.$checkAll.html('Uncheck All');
      this.$inputs.prop('checked', true);
    }
    else {
      this.areAllChecked = false;
      this.$checkAll.html('Check All');
      this.$inputs.prop('checked', false);
    }
    
    this.updateStatus();
  };
  
  CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
    var _this = this;
    
    if(!this.isOpen || forceOpen) {
       this.isOpen = true;
       this.$el.addClass('on');
      $(document).on('click', function(e) {
        if(!$(e.target).closest('[data-control]').length) {
         _this.toggleOpen();
        }
      });
    }
    else {
      this.isOpen = false;
      this.$el.removeClass('on');
      $(document).off('click');
    }
  };
  
  var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
  for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
    new CheckboxDropdown(checkboxesDropdowns[i]);
  }
})(jQuery);
</script>











@endsection