@extends('frontend.layouts.app')

@section('content')





<div class="main-content">

<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/placement.webp">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Careers</h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Workplace Learning that Works</h2>

					<p class="subhead-b2bhome">Skill your workforce in new age technologies with our cutting edge curriculum</p>

					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('careers.html')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>





  <section class="career-mainpage">



    <div class="container">



      <div class="row">



        <div class="col-md-9 col-sm-12 left-items">



          <div class="career-why-work">



            <p class="career-heading">



              WHY WORK WITH US



            </p>



          </div>



          <div class="work-section">



            <div class="row">



              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item-1">



                <img src="{{ url('assets/front/') }}/img/icon/career-learning.png" alt="learning" width="77" height="77">



                <h4 class="item-name">Keep Learning</h4>



                <p class="item-description">



                  Access to expert mentorship and a supportive work environment where you can gain



                  the skills you need to succeed.



                </p>



              </div>



              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">



                <img src="{{ url('assets/front/') }}/img/icon/career-infrastructure.png" alt="infrastructure" width="77" height="77">



                <h4 class="item-name">Best Infrastructure</h4>



                <p class="item-description">



                  The workplace should be a place where your employees are happy with their



                  surroundings and development happening there.



                </p>



              </div>



              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">



                <img src="{{ url('assets/front/') }}/img/icon/career-grow.png" alt="Opportunities To Grow" width="77" height="77">



                <h4 class="item-name">Opportunities To Grow</h4>



                <p class="item-description">



                  Never-ending opportunities to grow at workplace - Less stress, anxiety, burnout,



                  and higher job satisfaction level among employees.</p>



              </div>



            </div>



          </div>



          <div class="job-opening">



            <h3 class="job-heading">Current Student <span>Openings</span></h3>



          </div>



          <section class="job-open-items">



            <div class="row">



              @php foreach($data['opening'] as $row){ @endphp

              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">



                <div class="new-items">



                  <h4 class="jobheading">{{$row->name}}</h4>



                  <p class="jobdesc"><i class="fa fa-users"></i> Current Positions :



                    <span>{{$row->position}}</span>



                  </p>



                  <p class="jobdesc"><i class="fa fa-map-marker"></i> Job Location :



                    <span>{{$row->location}}</span>



                  </p>



                  <div class="aplynow">



                    <!--<a href="#" data-toggle="modal" data-target="#careerformmodal">Apply Now</a>-->



                    <button type="button" class="req-careers" data-toggle="modal" data-target="#product_view{{$row->id}}">Apply Now</button>&nbsp;&nbsp;




  <button type="button" class="req-careers" data-toggle="modal" data-target="#product_view_deails_data{{$row->id}}" >View Details</button>

  <div class="modal fade product_view" id="product_view_deails_data{{$row->id}}">



          <div class="modal-dialog carrermodal" role="document">



            <div class="modal-content">



              <div class="modal-header">


   <h5 class="modal-heading">{{$row->name}}</h5>
                


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                  <span aria-hidden="true">×</span>



                </button>



              </div>



              <div class="modal-body" id="content">



<b>Job Opening Date:</b> {{ date('Y-m-d', strtotime($row->created_at)) }}



              

{!!$row->description!!}

              </div>



            </div>



          </div>



        </div>




                  </div>



                </div>



              </div>

              @php } @endphp



            </div>



            <div class="pagination">

							{{$data['opening']->links()}}

						</div>



          </section>

        </div>



        <div class="col-md-3 col-sm-12">


<div class="form-contact pi-place">

								<div class="india-row">

									<div class="india-row-image">

										<div class="india-contact">

											<p>For Voice Call</p>

											<strong> <a href="tel:+91-9582786407" target="_blank">+91-9582786407</a></strong>

										</div>

										<div class="india-image">
<img src="{{ url('assets/front/') }}/img/icon/c.png" width="43" height="34" alt="Company-phone">
											

										</div>

									</div>

									<div class="india-row-image">

										<div class="row-contact">

											<p>WhatsApp Chat:</p>

											<strong> <a href="https://wa.me/919582786407" target="_blank">+919582786407</a></strong>

										</div>

										<div class="row-image">

											<img src="{{ url('assets/front/') }}/img/icon/Whatsapp-n.png" width="43" height="34" alt="Whatsapp">

										</div>

									</div>

								</div>



							</div>



          <div class="sticky-form placement-form-st">

            <div class="form-column">

              <strong>Request more information</strong>
              @if(session('success18'))
												<div class="alert alert-success">
													{{ session('success18') }}
												</div>
											@endif

											@if(session('error'))
												<div class="alert alert-danger">
													{{ session('error') }}
												</div>
											@endif
              <form method="post" action="{{ url('/careers') }}" onsubmit="return homeController.saveEnquirySide(this)">
                  
									@csrf
									<input type="hidden" name="recaptcha_token" class="recaptcha_token">

									@honeypot

<!-- Honeypot field -->
       <input type="hidden" name="page_url" value="{{ $url = request()->url() }}">
<div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

                <input type="hidden" name="from" value="Placement">
                <input type="hidden" name="from_title" value="Side Bar Placement">
                <input type="hidden" name="form_type" value="career_form">

                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" maxlength="35">
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


                <textarea name="message" placeholder="Enter remark">{{ old('message') }}</textarea>

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

        @php foreach($data['opening'] as $row){ @endphp

        <div class="modal fade product_view" id="product_view{{$row->id}}">



          <div class="modal-dialog carrermodal" role="document">



            <div class="modal-content">



              <div class="modal-header">



                <h5 class="modal-heading">{{$row->name}}</h5>



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



                            <img src="{{ url('assets/front/') }}/img/icon/career-cv-img.png" alt="career-cv-img" style="margin-top: 10px;">



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

                    <p>By registering here, I agree to Croma Campus <a href="{{url('terms-conditions.html')}}" target="_blank">Terms &amp; Conditions</a> and <a href="{{url('privacy-policy.html')}}" target="_blank">Privacy Policy</a> </p>



                  </div>



                </div>



              </div>



            </div>



          </div>



        </div>

        @php } @endphp
        
        
        
        























      </div>







    </div>

  </section>







</div>

<script>
    function getContent(content){
        console.log(content);
      $("#content").html(content);
  
        
    }
</script>



@endsection