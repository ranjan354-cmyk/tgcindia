@extends('frontend.layouts.app')

@section('content')





<div class="main-content">

<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/download-brochure.webp">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Download Brochure</h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Download. Read. Decide. Your future with TGC starts here.
</h2>

				
					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('careers.html')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>






	<section class="al_j">



		<div class="container">



			<div class="row">



				<div class="col-md-9">

					<div class="content">

						<h3></h3>
<div class="page_top_title">Choose a category to download your brochure</div>


<ul class="bro_menu" role="tablist">
<li class="items active"><a class="box " data-toggle="tab" href="#menu0">All Brochure</a></li>
@foreach($category as $key=> $categoryValue)
<li class="items"><a class="box" data-toggle="tab" href="#menu{{$key+1}}">{{$categoryValue->name}}  </a></li>
@endforeach
 </ul>

  <!-- Tab panes -->
  <div class="tab-contents">
<div id="menu0" class="tab_pane active">
<div class="row">
@php foreach($data['brochure'] as $row){ @endphp

<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
<div class="down_load_box">
<div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">

<div class="box_ss">
<div class="box_s">
<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
</div>
</div>
<div class="title">
<h3>{{$row->name}} </h3>
</div>
<!--</a>-->
</div>
</div>
</div>



@php } @endphp	
</div>
</div>
	
<div id="menu1" class="tab_pane">
    
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 1)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

<div id="menu2" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 3)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

<div id="menu3" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 5)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

<div id="menu4" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 7)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

<div id="menu5" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 8)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

<div id="menu6" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 9)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

<div id="menu7" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 10)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-md-4">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>
<div id="menu8" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 11)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>



<div id="menu9" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 12)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>




<div id="menu10" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 18)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

	
	
	<div id="menu11" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 24)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>

	<div id="menu12" class="tab_pane">
<div class="row">
    
  @php
$page = DB::table('tbl_brochure')
    ->where('brochure_cat', 24)
    ->where('is_deleted', 0)
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@foreach($page as $row)
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="down_load_box">
        <div class="down_load_pd" data-toggle="modal" data-target="#downloadenroll" onclick="getiddata('{{$row->pdf}}')">
            <!--<a href="{{url('public/uploads/'.$row->pdf)}}" target="blank">-->
            <div class="box_ss">
                <div class="box_s">
                    <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}">
                </div>
            </div>
            <div class="title">
                <h3>{{$row->name}}</h3>
            </div>
            <!--</a>-->
        </div>
    </div>
</div>
@endforeach

</div>

</div>


  </div>



						




					</div>



				</div>



				<div class="col-md-3">



					<div class="form-contact pi-place">

						<div class="india-row">

							<div class="india-row-image">

								<div class="india-contact">

									<p>For Voice Call</p>

									<strong> <a href="tel:+91-9582786407" target="_blank">+91-9582786407</a></strong>

								</div>

								<div class="india-image">

									
									<img src="{{url('assets/front/')}}/img/icon/c.png" width="43" height="34" alt="Company-phone">

								</div>

							</div>

							<div class="india-row-image">

								<div class="row-contact">

									<p>WhatsApp Chat:</p>

									<strong> <a href="https://wa.me/919582786407" target="_blank">+919582786407</a></strong>

								</div>

								<div class="row-image">
									<img src="{{url('assets/front/')}}/img/icon/Whatsapp-n.png" width="43" height="34" alt="Whatsapp">
									

								</div>

							</div>

						</div>



					</div>



					<div class="sticky-form placement-form-st">

						<div class="form-column">

							<strong>Request more information</strong>

							@if(session('success13'))
												<div class="alert alert-success">
													{{ session('success13') }}
												</div>
											@endif

											@if(session('error'))
												<div class="alert alert-danger">
													{{ session('error') }}
												</div>
											@endif
									<form method="post" action="{{ url('/coursePage10') }}" onsubmit="return homeController.saveEnquirySide(this)">
									@csrf
									<input type="hidden" name="recaptcha_token" class="recaptcha_token">

										<input type="hidden" name="form_type" value="download_brochure">
										<input type="hidden" name="from" value="Placement">
										<input type="hidden" name="from_title" value="Side Bar Placement">
										
										<input type="text" name="name"  value="{{ old('name') }}"  placeholder="Enter Name" maxlength="35">
										@error('name')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Email">  
										@error('email')
											<p style="color: red;">{{ $message }}</p>
										@enderror

										<input name="phone" id="emrol_ph" value="{{ old('phone') }}" placeholder="Enter phone*" type="text" />
										@error('phone')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="location" value="{{ old('location') }}" placeholder="Enter Location">
										@error('location')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="course_interest" value="{{ old('course_interest') }}" placeholder="Enter Course of interest">
										@error('course_interest')
											<p style="color: red;">{{ $message }}</p>
										@enderror



										<textarea name="message"  placeholder="Enter remark">{{ old('message') }}</textarea>
										@error('message')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<button type="submit" class="button5 mt-2">Submit</button>
									</form>

							<br>

							<p style="font-size:12px; margin-top:-13px">By registering here, I agree to TGC India <a href="{{url('terms-conditions.html')}}" target="_blank">Terms &amp; Conditions</a> and

								<a href="{{url('privacy-policy.html')}}" target="_blank">Privacy Policy</a>

							</p>

						</div>

					</div>



				</div>











				<!-- ================== Modal Start ========================= -->







				<!-- Modal -->



				<div class="modal fade product_view" id="product_view">



					<div class="modal-dialog carrermodal" role="document">



						<div class="modal-content">



							<div class="modal-header">



								<h5 class="modal-heading">Apply as a Trainer</h5>



								<button type="button" class="close" data-dismiss="modal" aria-label="Close">



									<span aria-hidden="true">×</span>



								</button>



							</div>



							<div class="modal-body">







								<div class="career-form-modal">



									<div class="form-item">



										<form action="" method="post" onsubmit="return homeController.saveApplyJob(this)" autocomplete="off" enctype="multipart/form-data">


<input type="hidden" name="recaptcha_token" class="recaptcha_token">

											<input type="hidden" name="from" value="Careers">

											<input type="hidden" name="jobtitle" class="from_title" value="Apply as a Trainer">

											<input type="hidden" name="type" class="type" value="Trainer">





											<div class="row">



												<div class="name">



													<div class="col-2">



														<p>Name*</p>



													</div>



													<div class="col-2">



														<select name="title" id="">



															<option value="Mr.">Mr.</option>



															<option value="Mrs.">Mrs.</option>



														</select>



													</div>



													<div class="col-8" style="padding-left:10px;">



														<input type="text" placeholder="Name Here" name="name" maxlength="35">



													</div>



												</div>



												<div class="name">



													<div class="col-2">



														<p>Email*</p>



													</div>



													<div class="col-10">



														<input type="email" name="email" placeholder="Email Here...">



													</div>



												</div>







												<div class="name">



													<div class="col-2">



														<p>Mobile*</p>



													</div>



													<div class="col-10">



														<input type="tel" name="phone" onkeypress="return isNumberKey(event);" placeholder="Enter Your Mobile No.">



													</div>



												</div>







												<div class="name">



													<div class="col-2">



														<p>Mode*</p>



													</div>



													<div class="col-4">



														<select name="mode" id="">



															<option selected="" disabled="" value="">Select Mode</option>



															<option value="online">Online</option>



															<option value="Offline">Offline</option>

															<option value="Both">Both</option>



														</select>



													</div>



													<div class="col-2">



														<p style="text-align: center;">Slot*</p>



													</div>



													<div class="col-4">



														<select name="slot" id="">



															<option selected="" disabled="" value="">Select Slot</option>



															<option value="weekday">Weekday</option>



															<option value="weekend">Weekend</option>

															<option value="both">Both</option>



														</select>



													</div>



												</div>



												<div class="name">



													<div class="col-4">



														<p>Availability*</p>



													</div>



													<div class="col-8">



														<select id="" name="availability" style="width:100%">



															<option selected="" disabled="" value="">Select Availability</option>



															<option value="Full Time">Full Time</option>



															<option value="Part Time">Part Time</option>



														</select>



													</div>



												</div>







												<div class="name">



													<div class="col-4">



														<p>Total Experience*</p>



													</div>



													<div class="col-8">



														<select name="experience" id="" style="width:100%">



															<option value="" selected="" disabled="">Select</option>



															<option value="0-1 year">0-1 year</option>



															<option value="1-2 year">1-2 year</option>



															<option value="2-3 year">2-3 year</option>



															<option value="3-4 year">3-4 year</option>



															<option value="4-5 year">4-5 year</option>



															<option value="more than 5 year">more than 5 year</option>



														</select>



													</div>



												</div>







												<div class="name">



													<div class="col-4">



														<p>Primary Skills*</p>



													</div>



													<div class="col-8">



														<input type="text" name="keyskills" placeholder="Enter Primary Skills">



													</div>



												</div>







												<div class="name">



													<div class="col-4">



														<p>Secondary Skills</p>



													</div>



													<div class="col-8">



														<input type="text" name="secondaryskills" placeholder="Enter Secondary Skills">



													</div>



												</div>







												<div class="upload-resume">



													<h6>Upload Your Resume</h6>



													<p>Maximum upload file size- 2MB (.doc, .docx, .pdf)</p>



													<div class="upload-sec">



														<img src="{{url('assets/front/')}}/img/icon/career-cv-img.png" alt="career-cv-img" style="margin-top: 10px;">



														<p>Drag and Drop Files to upload</p>



														<label for="upload" class="btn btn-sm">+ Select Files to upload</label>



														<input type="file" class="text-center form-control-file custom_file" id="upload" name="resume" accept=".doc, .docx,.pdf"><br>



														<label for="file_name" style="font-size: 12px;"></label>



													</div>



												</div>



											</div>



											<div class="submit-btn">



												<button type="submit" name="submit" class="btn red">Submit</button>



												<button type="button" class="btn grey" data-dismiss="modal">Cancel</button>



											</div>



										</form>

										<p>By registering here, I agree to TGC India <a href="{{url('terms-conditions.html')}}" target="_blank">Terms &amp; Conditions</a> and <a href="{{url('privacy-policy.html')}}" target="_blank">Privacy Policy</a> </p>



									</div>



								</div>



							</div>



						</div>



					</div>



				</div>



			</div>



		</div>

	</section>



</div>










<div class="modal fade com_enroll" id="downloadenroll">

  <div class="modal-dialog">

    <div class="modal-content">



      <div class="modal-body">



        <div class="modal-header">

          <a href="#" data-dismiss="modal" class="class pull-right">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

              <path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z" />

            </svg>

          </a>

          <h3 class="modal-title">Download Curriculum</h3>

        </div>





        <div class="row">

          <div class="col-md-12">

            @if(session('success5'))
            <div class="alert alert-success">
              {{ session('success5') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{ url('/coursePage1') }}">
              @csrf
              <div class="form-group">
                <label>Phone Number <span>for support</span></label>
                <input type="hidden" name="form_type" value="course_popup_down">
                <input name="phone_course_down" id="downL_enrol" placeholder="Enter your phone*" type="text" />
                @error('phone_course_down')
                <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group">
                <label>Email Id <span>for enrolment</span></label>
                <input type="hidden" id="course_id" name="pdf_curriculum">
                <input name="email_course_down" placeholder="Enter your email*" type="email" />
                @error('email_course_down')
                <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>

              <button class="enrOl_btn" type="submit"> Download Curriculum </button>

              <div class="also_get">
                <input type="checkbox">
                <!--<img src="{{url('assets/front/')}}/img/svg/circle-check.svg">-->
                <span>Also get detailed information on Career Prospects & Industry
                  Trends</span>
              </div>


            </form>


          </div>





        </div>

      </div>

    </div>

  </div>

</div>

<script>
    function getiddata(id){
        
      //  console.log(id);
      
      document.getElementById("course_id").value = id;

    }
</script>



@endsection