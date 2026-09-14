@extends('frontend.layouts.app')

@section('content')



<div class="main-content">





	<section class="corp-banner">

		<img src="{{url('assets/front/')}}/img/career/career-bg.webp" alt="TGC India reviews">

	</section>





	<section class="al_j">



		<div class="container">



			<div class="row">



				<div class="col-lg-9 col-sm-12 col-12">

					<div class="content">

						<h3> Industrial Training</h3>



						<p>The TGC India corporate Training is an initiative of industry professionals who are passionate for teaching to provide on the job training for people already working in the Multimedia Industry in India and across the world.</p>



						<p>In the ever changing technology scenario, upgrading skills and knowledge of the existing employees is essential to build a performance driven environment. TGC provides a complete solution for the training needs of corporate in the field of technology. For more than a decade now we have been delivering trainings on technology ensuring the quality and requirement of the client.</p>



						<p>We take into consideration your training needs, your employee’s skill level and their schedule, your assessment criteria and then create a training programme which suits best for your organisation. Learn more</p>



						<div class="uiKit_dd">



							<ul uk-accordion>

								@php $i=0; foreach($data['faq'] as $row){ @endphp

								<li class="@php if($i==0){ echo 'uk-open'; } @endphp">

									<a class="uk-accordion-title" href="#">{{$row->name}}</a>

									<div class="uk-accordion-content">

										@php echo $row->content; @endphp

									</div>

								</li>

								@php ++$i; } @endphp









							</ul>

						</div>



						<div class="pagination">

							{{$data['faq']->links()}}

						</div>











					</div>















				</div>



				<div class="col-lg-3 col-sm-12 col-12">



					<div class="form-contact pi-place">

						<div class="india-row">

							<div class="india-row-image">

								<div class="india-contact">

									<p>For Voice Call</p>

									<strong> <a href="tel:+91-971 152 6942" target="_blank">+91-971 152 6942</a></strong>

								</div>

								<div class="india-image">

									
<img src="{{url('assets/front/')}}/img/icon/c.png" width="43" height="34" alt="Company-phone">
								</div>

							</div>

							<div class="india-row-image">

								<div class="row-contact">

									<p>WhatsApp Chat:</p>

									<strong> <a href="https://wa.me/918287060032" target="_blank">+918287060032</a></strong>

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
									<input type="hidden" name="from" value="Placement">
             <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

									<input type="hidden" name="from_title" value="Side Bar Placement">
										<input type="hidden" name="form_type" value="corporate_training">
										
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
										<input type="text" name="course_interest"  value="{{ old('course_interest') }}" placeholder="Enter Course of interest">

										@error('course_interest')
												<p style="color: red;">{{ $message }}</p>
											@enderror


										<textarea name="message" value="{{ old('message') }}" placeholder="Enter remark"></textarea>
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

										<p>By registering here, I agree to Croma Campus <a href="{{url('terms-conditions.html')}}" target="_blank">Terms &amp; Conditions</a> and <a href="{{url('privacy-policy.html')}}" target="_blank">Privacy Policy</a> </p>



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





@endsection