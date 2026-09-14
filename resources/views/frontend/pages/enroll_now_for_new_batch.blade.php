@extends('frontend.layouts.app')

@section('content')





<div class="main-content">





	<section class="corp-banner">

		<img src="{{url('assets/front/')}}/img/enroll-now.png" alt="TGC India reviews">

	</section>





	<section class="al_j">



		<div class="container">



			<div class="row">



				<div class="col-md-9">

					<div class="content">

						<h3>Payment by Bank Transfer </h3>



						<p>You can deposit the registration amount (Rs. 5000/- which is adjustable in your fee) from any Punjab National Bank branch in the country. We will give you authorization to start your course on receiving the same. Rest of the fee amount can also be paid on easy installments after starting the course. Following is our bank account information</p>





						<table id="customers">

							<tr>

								<td>Account Name</td>

								<td>Total Graphics Classes Private Limited</td>

							</tr>

							<tr>

								<td>CURRENT A/C NO</td>

								<td>1603002100029176</td>

							</tr>

							<tr>

								<td>GSTIN No</td>

								<td>07AACCT0885F1ZC </td>

							</tr>

							<tr>

								<td>Bank Branch</td>

								<td>Punjab National Bank, N-13, NDSE-1, NEW DELHI-110049</td>

							</tr>

							<tr>

								<td colspan="2">You may also send us the Demand Draft with above mentioned information</td>

							</tr>

							<tr>

								<td colspan="2">Please note the following codes, if payment is transfered by Net Banking/Country outside India</td>

							</tr>





							<tr>

								<td>BRANCH CODE</td>

								<td>017600</td>

							</tr>

							<tr>

								<td>SWIFT CODE</td>

								<td>PUNBINBBISB</td>

							</tr>

							<tr>

								<td>IFSC CODE</td>

								<td>PUNB0017600</td>

							</tr>

							<tr>

								<td>BSR CODE</td>

								<td>0300290</td>

							</tr>

							<tr>

								<td>MICRO CODE</td>

								<td>110024086</td>

							</tr>

						</table>



						<p>For any inquiry about depositing the amount</p>

						<p><b>Call us</b> at 91-11-65648689, 91-11-46026939</p>

						<p><strong>TGC Private Limited</strong><br>

							H-85A, IInd Floor, South Ext. Part-I,<br>

							New Delhi-110049, INDIA</p>

						<p>Ph.: 91-11-65648689, 91-11-46026939</p>



						<h4>You are enroll for {{$data['slug_name']}} on {{date('d M,Y', strtotime($data['slug_date']))}} </h4>



						<div class="col_fomr">
						@if(session('success17'))
												<div class="alert alert-success">
													{{ session('success17') }}
												</div>
											@endif

											@if(session('error'))
												<div class="alert alert-danger">
													{{ session('error') }}
												</div>
											@endif
									<form method="post" action="{{ url('/enroll-now') }}" onsubmit="return homeController.saveEnquirySide(this)">
									@csrf
									<input type="hidden" name="recaptcha_token" class="recaptcha_token">

								<input type="hidden" name="course_name" value="{{$data['slug_name']}}">

								<input type="hidden" name="start_date" value="{{$data['slug_date']}}">

								

<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name</label>
										<input type="hidden" name="form_type" value="enroll-now-new-batch">

											<input type="text" name="name_enroll" value="{{ old('name_enroll') }}" placeholder="Enter Your Name">
											@error('name_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email_enroll" value="{{ old('email_enroll') }}" placeholder="Enter Your Email">
											@error('email_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Phone</label>
											<input name="phone_enroll" id="emrol_ph" value="{{ old('phone_enroll') }}" placeholder="Enter your phone*" type="text" />
											@error('phone_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>
									<!--<div class="col-md-4">
										<div class="form-group">
											<label>Mobile</label>
											<input name="number_enroll" id="emrol_ph" value="{{ old('number_enroll') }}" placeholder="Enter your mobile*" type="text" />
											@error('number_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>-->

									<div class="col-md-4">
										<div class="form-group">
											<label>Date Of Birth</label>
											<input type="date" name="dob_enroll" id="emrol_ph" value="{{ old('dob_enroll') }}" placeholder="Enter your email*" type="email" />
											@error('dob_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Address</label>
											<input type="text" name="location_enroll" id="emrol_ph" value="{{ old('location_enroll') }}" placeholder="Enter your address" />
											@error('location_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>City</label>
											<input type="text" name="city_enroll" id="emrol_ph" value="{{ old('city_enroll') }}" placeholder="Enter your city" />
											@error('city_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Province / State</label>
											<input type="text" name="state_enroll" id="emrol_ph" value="{{ old('state_enroll') }}" placeholder="Enter your Province / State" />
											@error('state_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Zip Code</label>
											<input type="text" name="zipcode_enroll" id="emrol_ph" value="{{ old('zipcode_enroll') }}" placeholder="Enter your Zip Code" />
											@error('zipcode_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Country</label>
											<input type="text" name="country_enroll" id="emrol_ph" value="{{ old('country_enroll') }}" placeholder="Enter your Country" />
											@error('country_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Date of Joining</label>
											<input type="date" name="doj_enroll" id="emrol_ph" value="{{ old('doj_enroll') }}" placeholder="Date of Joining" />
											@error('doj_enroll')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>






									<div class="col-md-12">

										<div class="form-group d-flex align-items-center fsf">

											<button type="submit" class="fsfhj">Submit & Pay Later</button>

											or

											<button type="submit" class="fsfhj">Pay </button>

										</div>

									</div>











								</div>

							</form>

						</div>





						<div class="text-center">

							<img src="{{url('assets/front/')}}/img/credit-card-icons-460x71.png">

						</div>











					</div>



				</div>



				<div class="col-md-3">



					<div class="form-contact pi-place">

						<div class="india-row">

							<div class="india-row-image">

								<div class="india-contact">

									<p>For Voice Call</p>

									<strong> <a href="tel:+91-9582786406" target="_blank">+91-9582786406</a></strong>

								</div>

								<div class="india-image">

									<img src="{{url('assets/front/')}}/img/icon/Call.png" width="43" height="34" alt="Call">

									<img src="{{url('assets/front/')}}/img/icon/Whatsapp-n.png" width="43" height="34" alt="Whatsapp">

								</div>

							</div>

							<div class="india-row-image">

								<div class="row-contact">

									<p>WhatsApp Chat:</p>

									<strong> <a href="https://wa.me/919582786406" target="_blank">+919582786406</a></strong>

								</div>

								<div class="row-image">

									<img src="{{url('assets/front/')}}/img/icon/c.png" width="43" height="34" alt="Company-phone">

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
										<input type="hidden" name="from_title" value="Side Bar Placement">
										<input type="hidden" name="form_type" value="enroll-now-new-batch1">
										
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