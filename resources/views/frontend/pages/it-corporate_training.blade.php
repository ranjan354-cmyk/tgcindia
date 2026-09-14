@extends('frontend.layouts.app')

@section('content')





<div class="main-content">





	<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/corporate-training.webp">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Corporate Training </h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Build future-ready teams with customized corporate programs at TGC.</h2>

					<p class="subhead-b2bhome">Train your team with real-world tools, workflows, and project-based modules.</p>

					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('contact-us')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>





	<article class="patner-with">

		<div class="container">

			<ul>

				<li class="trustedtxt hidden-xs">Trusted by</li>

				@php foreach($data['partner'] as $rowP){ @endphp

				<li><img src="{{url('public/uploads/'.$rowP->image)}}" alt="{{$rowP->image_alt}}" title="{{$rowP->image_title}}" description="{{$rowP->image_description}}"></li>

				@php } @endphp

		</div>

	</article>



	<article class="deliverymodemain">

		<div class="container">

			<h2 class="titledelivery">Designed for all your training needs</h2>

			<div class="deliverystatsmain">

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/onprimlearn.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">Customized Training Solutions</h3>
					<p>Recognizing that each organization has unique needs, TGC offers bespoke training programs tailored to meet your specific objectives.</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/inst-led.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">Expert Instructors and Industry-Relevant Curriculum </h3>
					<p>Our trainers are industry veterans with hands-on experience in their respective fields.</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/selfpaced.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">State-of-the-Art Learning Environment</h3>
					<p>
					With access to cutting-edge technology and software, TGC provides a learning environment that mirrors the professional world.</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/hybrid-learn.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">Skill Development with Government Recognition</h3>
					<p>As a partner of the Media and Entertainment Skill Council (MESC) under the NSDC for the Skill India programme.</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/onprimlearn.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">Return on Investment </h3>
					<p>Investing in your team’s education with TGC’s corporate training programs leads to immediate and tangible benefits.</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/inst-led.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">Successful Track Record </h3>
					<p>With over 16 years of experience and a legacy of thousands of trained professionals, TGC’s impact is evident in the success</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/selfpaced.svg" alt="Delivery Img - Corporate Training"> </span>

					<h3 class="title">Our Corporate Training Programs Include</h3>
					<p>Multimedia and Graphic Design: Elevate your team’s creative capabilities with courses in graphic design, video editing, animation, and more.</p>

				</div>

				<div class="deliverystatsbox">

					<span class="imgcont">

						<img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1702307449/img/hybrid-learn.svg" alt="Delivery Img - Corporate Training"></span>

					<h3 class="title">Getting Started</h3>
					<p>Begin the journey to empower your team today. Contact us to discuss your training needs, and let TGC craft a training solution that propels.</p>

				</div>
				

			</div>

		</div>

	</article>
















	<article class="corpfeatures">

		<h2 class="heading">TGC India Corporate Training Features</h2>

		<div class="container">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 corpfeaturesmain">

				<div class="col-sm-6 col-xs-12 corpfeatleft">

					<a class="featcardmain">

						<div class="header">

							<div class="imgcont">

								<img src="{{url('assets/front/')}}/img/svg/cource-custom.svg" alt="Coure Custom - Corporate Training" width="100%" height="auto">

							</div>

							<h3 class="featuretitle">Course Customization</h3>

						</div>

						<p class="featdesc">Flexible Engagement Model Tailor-Made for Your Needs</p>

						<div class="leftfeatcontentsec">

							<span class="visible-xs closemodal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path></svg></span>

							<img src="{{url('assets/front/')}}/img/svg/course_customization.jpg" alt="Course Features" width="100%" height="auto">

							<ul class="coursefeatlist">

								<li><span>Content Customization as per Project</span></li>

								<li><span>Flexibility to Choose Location, Mode, and Dates</span></li>

								<li><span>Technology Awareness Session for Senior Management</span></li>

							</ul>

						</div>

					</a>

					<a class="featcardmain">

						<div class="header">

							<div class="imgcont">

								<img src="{{url('assets/front/')}}/img/svg/learning-analytics.svg" alt="Learning Analytics - Corporate Training" width="100%" height="auto">

							</div>

							<h3 class="featuretitle">Learning Analytics</h3>

						</div>

						<p class="featdesc">Customized Dashboard to Visualize Training Progress</p>

						<div class="leftfeatcontentsec">

							<span class="visible-xs closemodal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path></svg></span>

							<img src="{{url('assets/front/')}}/img/svg/analytic.jpg" alt="Course Features" width="100%" height="auto">

							<ul class="coursefeatlist">

								<li><span>Tracking of Learners’ Comparative Progress</span></li>

								<li><span>Insights into Learning Effectiveness</span></li>

								<li><span>Auto-Generated Reporting to Management</span></li>

							</ul>

						</div>

					</a>

					<a class="featcardmain">

						<div class="header">

							<div class="imgcont">

								<img src="{{url('assets/front/')}}/img/svg/cloud-lab.svg" alt="Cloud Lab - Corporate Training" width="100%" height="auto">

							</div>

							<h3 class="featuretitle">Cloud Labs</h3>

						</div>

						<p class="featdesc">Hands-On Experience on TGC India Cloud Lab, Pre-Configured to Get Started Immediately </p>

						<div class="leftfeatcontentsec">

							<span class="visible-xs closemodal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path></svg></span>

							<img src="{{url('assets/front/')}}/img/svg/cloud_lab.jpg" alt="Course Features" width="100%" height="auto">

							<ul class="coursefeatlist">

								<li><span>Pre-Configured Ready to Use Environment</span></li>

								<li><span>Access CloudLab from anywhere through TGC India LMS</span></li>

								<li><span>Real time environment with real world case studies</span></li>

							</ul>

						</div>

					</a>

				</div>

				<div class="col-sm-6 col-xs-12 corpfeatright">

					<a class="featcardmain">

						<div class="header">

							<div class="imgcont">

								<img src="{{url('assets/front/')}}/img/svg/24x7.svg" alt="24/7 Suport - Corporate Training" width="100%" height="auto">

							</div>

							<h3 class="featuretitle">24x7 Support</h3>

						</div>

						<p class="featdesc">Round-the-Clock Support by In-House Subject-Matter Experts</p>

						<div class="rightfeatcontentsec">

							<span class="visible-xs closemodal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path></svg></span>

							<img src="{{url('assets/front/')}}/img/svg/support.jpg" alt="Course Features" width="100%" height="auto">

							<ul class="coursefeatlist">

								<li><span>Ticket Resolution Within 24 Hours</span></li>

								<li><span>Support Available Even After Course Completion</span></li>

								<li><span>Additional Batch/Course Specific Communities for Q&amp;A</span></li>

							</ul>

						</div>

					</a>

					<a class="featcardmain">

						<div class="header">

							<div class="imgcont">

								<img src="{{url('assets/front/')}}/img/svg/certification.svg" alt="Certification - Corporate Training" width="100%" height="auto">

							</div>

							<h3 class="featuretitle">Certifications</h3>

						</div>

						<p class="featdesc">Industry Recognized Certification to Add Value to Your Workforce</p>

						<div class="rightfeatcontentsec">

							<span class="visible-xs closemodal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path></svg></span>

							<img src="{{url('assets/front/')}}/img/svg/certification-1.jpg" alt="Course Features" width="100%" height="auto">

							<ul class="coursefeatlist">

								<li><span>Strict Evaluation Process</span></li>

								<li><span>Widely recognized certificate</span></li>

								<li><span>Verifiable by Employer</span></li>

							</ul>

						</div>

					</a>

					<a class="featcardmain">

						<div class="header">

							<div class="imgcont">

								<img src="{{url('assets/front/')}}/img/svg/projects.svg" alt="Projects - Corporate Training" width="100%" height="auto">

							</div>

							<h3 class="featuretitle">Projects</h3>

						</div>

						<p class="featdesc">Right Mix of Theoretical and Practical Training for Real World Industry Problems</p>

						<div class="rightfeatcontentsec">

							<span class="visible-xs closemodal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"></path></svg></span>

							<img src="{{url('assets/front/')}}/img/svg/project.jpg" alt="Course Feature" width="100%" height="auto">

							<ul class="coursefeatlist">

								<li><span>Projects in Retail, Healthcare, Pharma, Aviation etc.</span></li>

								<li><span>Learners Choose Project as per Needs</span></li>

								<li><span>Projects Evaluated for Certification</span></li>

							</ul>

						</div>

					</a>

				</div>

			</div>

		</div>

	</article>





	<article class="shareformfeed">

		<div class="container">

			<div class="requestinfosec corp-form-wrapper">

				<h2>Talk to our training advisor</h2>

				<span class="greenunderline"></span>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bot-form-post">

				@if(session('success20'))
				<div class="alert alert-success">
					{{ session('success20') }}
				</div>
			@endif

			@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
			@endif
					<form id="bottom-corp-form" action="{{ url('/corporate-training') }}" method="post" class="jquery-validate" novalidate="novalidate">
						@csrf
						<input type="hidden" name="recaptcha_token" class="recaptcha_token">

						<div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

						<input class="form-control hide" name="from_title" id="inp-requestdemo" type="hidden" value="">
						<input name="from" type="hidden" value="">
						<input name="form_type" type="hidden" value="corporate_training">
						<div class="formwrap">
							<div class="form-group form-group-name col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
								<label for="first_name">Name*</label>
								<input class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name" type="text" autocomplete="off" aria-required="true">
								@error('name')
								<p style="color: red;">{{ $message }}</p>
							@enderror
								
							</div>
							<div class="form-group form-group-companyname col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
								<label for="organization">Company Name*</label>
								<input class="form-control" name="company_name"  value="{{ old('company_name') }}" data-validation="required" placeholder="Enter Company Name" type="text" autocomplete="off">
								@error('company_name')
								<p style="color: red;">{{ $message }}</p>
							@enderror
							</div>
							<div class="form-group learnercount col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
								<label>Training Need*</label>
								<select class="form-control required" required="" id="learnerCount" name="training" value="{{ old('training') }}" data-width="auto" data-title="Number of Learners*" autocomplete="off" aria-required="true">
									<option value="Select an Option" disabled="" selected="">Select an Option</option>
									<option value="corporate">For Corporate</option>
									<option value="individual">For Myself</option>
								</select>
								@error('training')
								<p style="color: red;">{{ $message }}</p>
							@enderror
							</div>
							<div class="form-group form-group-email col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
								<label for="organization">Email ID*</label>
								<input class="form-control" name="email" placeholder="Email ID" value="{{ old('email') }}" type="email" autocomplete="off" aria-required="true">
								@error('email')
								<p style="color: red;">{{ $message }}</p>
							@enderror
							</div>
							<div class="form-group form-group-phone col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
								<label for="organization">Phone Number*</label>
								<input name="phone" id="emrol_ph" value="{{ old('phone') }}" placeholder="Enter your phone*" type="text" />
								@error('phone')
								<p style="color: red;">{{ $message }}</p>
							@enderror
							</div>
							<div class="form-group form-group-query col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
								<label>Query</label>
								<textarea class="form-control required" name="message"  placeholder="Enter your Query" aria-required="true">{{ old('message') }}</textarea>
								@error('message')
								<p style="color: red;">{{ $message }}</p>
							@enderror
							</div>
							<div class="form-groupbtn col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding courselistbtnsec">

								<button type="submit" class="btn request-more-info pop-up-requestdemo ga_corp_info" data-gacat="Corporate Training" data-gaact="Talk to advisor form bottom- Submit">Submit</button>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="thumbs-thank-box">

				<i class="icon-thumbs-up"></i>

				<span class="toop"><span>Thank You!</span> Our Training Advisers will get in touch with you shortly.</span>

			</div>



		</div>

	</article>





</div>





				
			
			
				
				
				
				
            </div>
        </div>
    </div>
</div>





	<section class="al_j">



		<div class="container">



			<div class="row">



				<div class="col-lg-9 col-sm-12 col-12">

					<div class="content">

						<h3> Corporate Training</h3>



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

					



<!--------------------->
@php  foreach($data['category'] as $rowCat){ 

								$results = DB::table('tbl_course')->where('is_deleted', 0)->WHERE('staus', 'Active')->WHERE('parent', $rowCat->id)->orderBy('id', 'DESC')->take(25)->get();

								foreach($results as $rowC){

								@endphp

								
<div class="modal fade corporate_pop " id="product_view_{{$rowCat->id}}_{{$rowC->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right">
				<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg>
				</a>
                <h3 class="modal-title">{{$rowC->name}}</h3>
            </div>
            <div class="modal-body">
                
				<div class="coursecardmain" > @php echo $rowC->content; @endphp </div>
				
				
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bot-form-post corp-form-wrapper">
<h2>Talk to our training advisor </h2>
<span class="greenunderline"></span>
<form method="post" class="jquery-validate" id="popup-query-form" novalidate="novalidate" action="{{ url('/corporate-training') }}">

<div class="formwrap">
<div class="form-group form-group-name col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
<label for="first_name">Name*</label>
<input class="form-control" name="first_name" required="required" placeholder="Name" type="text" autocomplete="off" aria-required="true">
</div>
<div class="form-group form-group-companyname col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label for="organization">Company Name*</label>
<input class="form-control" name="organization" data-validation="required" placeholder="Enter Company Name" type="text" autocomplete="off">
</div>
<div class="form-group learnercount col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label>Training Need*</label>
<select class="form-control required" required="" id="learnerCount" name="learnerCount" data-width="auto" data-title="Number of Learners*" autocomplete="off" aria-required="true">
<option value="Select an Option" disabled="" selected="">Select an Option</option>
<option value="corporate">For Corporate</option>
<option value="individual">For Myself</option>
</select>
</div>
<div class="form-group form-group-email col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label for="organization">Email ID*</label>
<input class="form-control" name="email" placeholder="Email ID" required="required" type="email" autocomplete="off" aria-required="true">
</div>
<div class="form-group form-group-phone col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label for="organization">Phone Number*</label>
<input type="text" id="cor_mobile_code" value="{{ old('phone_career') }}" class="form-control" placeholder="_career Number" name="phone_career">
</div>
<div class="form-group form-group-query col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
<label>Query</label>
<textarea class="form-control required" name="query" placeholder="Enter your Query" aria-required="true"></textarea>
</div>
<div class="form-groupbtn col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding courselistbtnsec">

<button type="button" id="corp-course-modal-submit" class="btn request-more-info pop-up-requestdemo ga_corp_info" data-gacat="Corporate Training" data-gaact="Course form -  Migrating Applications to AWS Training: Submit">Submit</button>
</div>
</div>
</form>
</div>
									
</div>
								
</div>
</div>
</div>
								@php }   } @endphp


<!--------------------->


<div class="modal fade corporate_pop " id="download_course">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right">
				<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="color" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg>
				</a>
            </div>
            <div class="modal-body">
                
				
				
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bot-form-post corp-form-wrapper">
<h2>Download our full course list</h2>
<span class="greenunderline"></span>
<form method="post" class="jquery-validate" id="popup-query-form" novalidate="novalidate" action="#">

<div class="formwrap">
<div class="form-group form-group-name col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
<label for="first_name">Name*</label>
<input class="form-control" name="first_name" required="required" placeholder="Name" type="text" autocomplete="off" aria-required="true">
</div>
<div class="form-group form-group-companyname col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label for="organization">Company Name*</label>
<input class="form-control" name="organization" data-validation="required" placeholder="Enter Company Name" type="text" autocomplete="off">
</div>
<div class="form-group learnercount col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label>Training Need*</label>
<select class="form-control required" required="" id="learnerCount" name="learnerCount" data-width="auto" data-title="Number of Learners*" autocomplete="off" aria-required="true">
<option value="Select an Option" disabled="" selected="">Select an Option</option>
<option value="corporate">For Corporate</option>
<option value="individual">For Myself</option>
</select>
</div>
<div class="form-group form-group-email col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label for="organization">Email ID*</label>
<input class="form-control" name="email" placeholder="Email ID" required="required" type="email" autocomplete="off" aria-required="true">
</div>
<div class="form-group form-group-phone col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
<label for="organization">Phone Number*</label>
<input type="text" id="cor_mobile_code" value="{{ old('phone_career') }}" class="form-control" placeholder="_career Number" name="phone_career">
</div>
<div class="form-group form-group-query col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
<label>Query</label>
<textarea class="form-control required" name="query" placeholder="Enter your Query" aria-required="true"></textarea>
</div>
<div class="form-groupbtn col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding courselistbtnsec">

<button type="button" id="corp-course-modal-submit" class="btn request-more-info pop-up-requestdemo ga_corp_info" data-gacat="Corporate Training" data-gaact="Course form -  Migrating Applications to AWS Training: Submit">Submit</button>
</div>
</div>
</form>
</div>
									
</div>
								
</div>
</div>
</div>
								


@endsection