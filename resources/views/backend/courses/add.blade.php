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

      <a class="btn btn-primary btn-sm float-right" href="{{url('admin/courses')}}">Manage Course</a>

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

              <h3 class="card-title">Add Course</h3>



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

                      <a class="nav-link" href="#">Basic</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Batches</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Enroll</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Training</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Solutions</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Certificates</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Syllabus</a>

                    </li>

                    <li class="nav-item">

                      <a class="nav-link" href="#">Faq Description</a>

                    </li>

                    <!--<li class="nav-item ">-->

                    <!--  <a class="nav-link" href="#">Training & Certificates</a>-->

                    <!--</li>-->

                    <li class="nav-item">

                      <a class="nav-link" href="#">Testimonial</a>

                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="#">Projects</a>
                    </li>
                    
                      <li class="nav-item ">
                      <a class="nav-link" href="#">Heading</a>
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



              <form method="post" action="{{url('admin/saveCourse')}}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="row">
                    
                      <div class="col-md-3">

                    <div class="form-group">

                      <label>Display Name</label>
 
                      <input type="text" class="form-control" name="display_name" required>

                    </div>

                  </div>


                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Name</label>
 
                      <input type="text" class="form-control" name="name" required>

                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Slug</label>

                      <input type="text" class="form-control" name="slug">

                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Category</label>

                      <select class="form-control select2" name="parent" style="width: 100%;" required>

                        <option value="">Select</option>

                        @foreach ($categories as $cat)

                        <option value="{{$cat->id}}">{{$cat->name}}</option>

                        @endforeach

                      </select>

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Image</label>

                      <input type="file" class="form-control" name="image">

                    </div>
                    <p class="custom-text" style="color: red;">Image Size Should be 30 × 30 px</p>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Reviews</label>

                      <input type="number" class="form-control" name="reviews">

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>No of Reviews</label>

                      <input type="number" class="form-control" name="no_review">

                    </div>

                  </div>



                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Course Video Link</label>

                      <input type="text" class="form-control" name="video_link">

                    </div>

                  </div>







                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Status</label>

                      <select class="form-control select2" name="status" style="width: 100%;">

                        <option value="Active">Active</option>

                        <option value="InActive">InActive</option>

                      </select>

                    </div>

                  </div>
                  
                    <div class="col-md-4">

                    <div class="form-group">

                      <label>Type (Trending Course)</label>

                      <select class="form-control select2" name="type_course" style="width: 100%;" >

                        <option value="0">--Select--</option>

                        <option value="1">Best Seller</option>

                        <option value="2">High Dimand</option>

                        

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
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="home_page[]" value="Trending Courses" />
                            Trending Courses
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="home_page[]" value="Popular courses" />
                            Popular courses
                          </label>
                          
                          <label class="dropdown-option">
                            <input type="checkbox" name="home_page[]" value="Career Related Programs" />
                            Career Related Programs
                          </label>
                          
                          
                        </div>
                      </div>

                    </div>

                  </div>
                  {{-- <div class="col-md-4">

                    <div class="form-group">

                      <label>At Home Page Category</label>

                      <select class="form-control select2" name="course_category" style="width: 100%;">

                        <option value="">--Select--</option>

                        <option value="trending">Trending Courses</option>

                        <option value="popular">Popular courses</option>

                        <option value="career">Career Related Programs</option>

                      </select>

                    </div>

                  </div> --}}



                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Course Type</label>

                      <select class="form-control select2" name="course_type" style="width: 100%;">

                        <option value="">--Select--</option>

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

                        <option value="Certification Course">Certification Course</option>

                        <option value="Role Based Course">Role Based Course</option>

                        <option value="Top Universties Course">Top Universties Course</option>

                      </select>

                    </div>

                  </div>
                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Add date</label>

                       <input type="date" class="form-control" name="add_date">


                    </div>

                  </div>
                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Heading1</label>

                       <input type="text" class="form-control" name="heading1">


                    </div>

                  </div>
                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Heading2</label>

                       <input type="text" class="form-control" name="heading2">


                    </div>

                  </div>

 <div class="col-md-12">

                    <div class="form-group">

                      <label>H2 Tag Content</label>

                      <input type="text" class="form-control" name="h2_tags">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Short Content</label>

                      <input type="text" class="form-control" name="short_content">

                    </div>

                  </div>



                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Content</label>

                      <textarea name="content" class="summernote"></textarea>

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