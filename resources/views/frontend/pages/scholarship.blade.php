@extends('frontend.layouts.app')
@section('content')
<style>
@media only screen and (min-width: 1025px) {
  .cor_po img {
    height: auto;
    position: relative;
    top: -380px;
    width: 100%;
  }
}

@media only screen and (max-width: 768px) {
  .cor_po img {
    height: auto;
    position: relative;
    top: 50px;
    width: 100%;
  }
  
      .title-head-b2b > p.subhead-b2bhome {
        font-size: 14px;
        margin: 0 0 20px 0;
    }
    .title-head-b2b > h2.head-b2b-home {
        font-size: 18px;
    }
    
        .cor_po {
        height: 284px;
    }
    
    .demo-req-btn {
    background: var(--tgc-red) none repeat scroll 0 0;
    border: medium none;
    border-radius: 4px;
    font-size: 14px;
    padding: 7px 8px;
    color: #fff;
}
.desk{
    display:none;
}
    .main-content {
        margin-top: 82px;
    }
}


</style>

<div class="main-content">
<section class="cor_po">
		<img src="{{url('assets/front/')}}/img/scholarship1.webp">
		<div class="tophead-form">
			<div class="container">
				<div class="title-head-b2b">
					<h1>Scholarship </h1>
					<div class="yellowunderline"></div>
					<h2 class="head-b2b-home">Because great ideas shouldn’t wait for finances...</h2>
					<p class="subhead-b2bhome"><span class="desk">Create. Compete. Conquer. </span>TGC Scholarships are made for go-getters.</p>
					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('contact-us')}}">CONNECT WITH US</a>
				</div>

			</div>

		</div>

	</section>


	<section class="scholarshop-top">
		<!--<div class="container">-->
		<div class="row">
			<!-- <div class="scholarship-top-item"> -->
			<div class="col-md-6 scholarship-top-left">
				<div class="">
					<h4>Get <span>scholarship</span> for <br>every bright student</h4>
					<p>Acquiring a scholarship will eventually uplift your academic and career objectives by diminishing any financial fence. Obtaining a scholarship will help your financial concerns. Thus, it will offer you more time to study, acquire knowledge and secure better marks.</p>
					<div class="explore-courses">
						<a href="{{url('courses')}}" class="showCategoryProgram">Explore Courses</a>
					</div>

					<!--<form action="">-->
					<!--	<div class="scholarship-email-submit">-->
					<!--		<input type="email" placeholder="Enter email address">-->
					<!--		<button type="submit" name="submit">Submit</button>-->
					<!--	</div>-->
					<!--</form>-->
				</div>
				<img src="{{url('assets/front/')}}/img/scholarship-leftimg.webp" alt="scholarship-leftimg" class="scholarship-top-leftimg">
			</div>
			<div class="col-md-6">
				<div class="scholarship-top-right">


					<h5> <i class="fa fa-graduation-cap"></i> Scholarship</h5>



					<div class="career-form-modal">

						<div class="form-item">

						@if(session('success19'))
												<div class="alert alert-success">
													{{ session('success19') }}
												</div>
											@endif

											@if(session('error'))
												<div class="alert alert-danger">
													{{ session('error') }}
												</div>
											@endif
							<form method="post" action="{{ url('/scholarship') }}" onsubmit="return homeController.saveApplyJob(this)" autocomplete="off" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="recaptcha_token" class="recaptcha_token">


								<input type="hidden" name="from" value="Careers">
								<input type="hidden" name="from_title" class="from_title" value="Apply as a Trainer">
								<input type="hidden" name="form_type" class="type" value="scholarship">
	  <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">


								<div class="row">

									<div class="name">

										<div class="col-3">

											<p>Name*</p>

										</div>

										<div class="col-2">

											<select name="title" value="{{ old('title') }}" id="">

												<option value="Mr.">Mr.</option>

												<option value="Mrs.">Mrs.</option>
												@error('title')
											<p style="color: red;">{{ $message }}</p>
										@enderror
											</select>

										</div>

										<div class="col-7" style="padding-left:10px;">

											<input type="text" placeholder="Name Here" value="{{ old('name') }}" name="name" maxlength="35">
											@error('name')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>

									<div class="name">

										<div class="col-3">

											<p>Email*</p>

										</div>

										<div class="col-9">

											<input type="email" name="email" value="{{ old('email') }}" placeholder="Email Here...">
											@error('email')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>



									<div class="name">

										<div class="col-3">

											<p>phone number*</p>

										</div>

										<div class="col-9">

											<input type="text" name="phone" value="{{ old('phone') }}" onkeypress="return isNumberKey(event);" placeholder="Enter Your Mobile No.">
											@error('phone')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>





									<div class="name">

										<div class="col-3">

											<p>Education*</p>

										</div>

										<div class="col-9">

											<select id="" name="education" value="{{ old('education') }}" style="width:100%">

												<option selected="" disabled="" value="">Select Availability</option>

												<option value="10th ">10th </option>

												<option value="10 +2">10 +2</option>
												<option value="Under Graduate">Under Graduate</option>
												<option value="Post Graduate">Post Graduate</option>
												<option value="Post Graduate">Others</option>

											</select>
											@error('education')
											<p style="color: red;">{{ $message }}</p>
										@enderror

										</div>

									</div>



									<div class="name">

										<div class="col-3">

											<p>City*</p>

										</div>

										<div class="col-9">

											<input type="text" name="City" value="" placeholder="Enter City Name">
											@error('City')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>

									<div class="name">

										<div class="col-3">

											<p>State *</p>

										</div>

										<div class="col-9">

											<input type="text" name="state " value="" placeholder="Enter state ">
											@error('state ')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>

<div class="name">

										<div class="col-3">

											<p>Center *</p>

										</div>

										<div class="col-9">

											<input type="text" name="Center " value="" placeholder="Enter Center ">
											@error('Center ')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>
									
									
<div class="name">

										<div class="col-3">

											<p>Family Income</p>

										</div>

										<div class="col-9">
										
										<select id="" name="technology" value="{{ old('technology') }}" style="width:100%">
										<option value="INR">Upto ₹. 10000 per month</option>
										<option value="INR">₹ 10000 - ₹ 20000 per month</option>
										<option value="INR">₹ 20000 - ₹ per month</option>
										<option value="INR">₹ 50000 - ₹ 1 Lac per month</option>
										<option value="INR">₹ 1 Lac - ₹ 5 Lac per month</option>
										<option value="INR">Above 5 Lacs per month</option>
											</select>
											</div>
										
										<!--<div class="col-7" style="padding-left:10px;">
											<input type="text" name="Income " value="" placeholder="Enter Income ">
											@error('Income ')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>-->

									</div>






									<div class="name">

										<div class="col-3">

											<p>College Name*</p>

										</div>

										<div class="col-9">

											<input type="text" name="college_name" value="{{ old('college_name') }}" placeholder="Enter College Name">
											@error('college_name')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>



									<div class="name">

										<div class="col-3">

											<p>Technology*</p>

										</div>

										<div class="col-9">

											<select id="" name="technology" value="{{ old('technology') }}" style="width:100%">

												<option selected="" disabled="" value="">Select Availability</option>

												<option value="Full Time">Full Time</option>

												<option value="Part Time">Part Time</option>

											</select>
											@error('technology')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>

									</div>









								</div>

								<div class="submit-btn">

									<button type="submit" name="submit" class="btn red">Submit</button>

									<button type="button" class="btn grey" data-dismiss="modal">Cancel</button>

								</div>

							</form>


						</div>

					</div>

				</div>
			</div>
			<!-- </div> -->
		</div>
		<!--</div>-->
	</section>


	<section class="scholarship-benifit">
	
		<div class="container">
			<h2>The <span>Benefits</span> of Getting a Scholarship</h2>
			<p>Presently, education has become one of the most important and costly assets. Most candidates look for financial help to pursue the career of their dreams that needs numerous years of education and counseling assistance. In such a TGC India helps them cover their financial aid.</p>
			<div class="row clas_mr_40">
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="scholarship-benifit-item default">
						<img src="{{url('assets/front/')}}/img/benifit-1.png" alt="benifit-1" width="59" height="59">
						<h6>Premier Training Institution</h6>
						<p>Located in the heart of New Delhi, India, TGC specializes in delivering comprehensive classroom and online training in a variety of domains.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="scholarship-benifit-item default2">
						<img src="{{url('assets/front/')}}/img/benifit-2.png" alt="benifit-2" width="59" height="59">
						<h6>Decades of Expertise</h6>
						<p>With over 16 years of experience in the education sector, TGC has become a cornerstone for students seeking to excel.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="scholarship-benifit-item default3">
						<img src="{{url('assets/front/')}}/img/benifit-3.png" alt="benifit-3" width="59" height="59">
						<h6>Quality Assurance</h6>
						<p>As an ISO certified organization, TGC not only meets international standards in training but also ensures the highest quality of education.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="scholarship-benifit-item default">
						<img src="{{url('assets/front/')}}/img/benifit-1.png" alt="benifit-1" width="59" height="59">
						<h6>Innovative Learning Solutions</h6>
						<p>At TGC, innovation in learning methodologies is key. The institution constantly evolves its course offerings</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="scholarship-benifit-item default2">
						<img src="{{url('assets/front/')}}/img/benifit-2.png" alt="benifit-2" width="59" height="59">
						<h6>Authorized Training Center</h6>
						<p>Being an Authorized Training Center (ATC) for industry giants like Adobe and Autodesk, TGC offers certified courses.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="scholarship-benifit-item default3">
						<img src="{{url('assets/front/')}}/img/benifit-3.png" alt="benifit-3" width="59" height="59">
						<h6>Focus on Affordability and Quality</h6>
						<p>TGC is dedicated to providing unmatched learning experiences through highly specialized trainers.</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="growwith-scholarship">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
					<div class="growwith-scholarship-left">
						<img src="{{url('assets/front/')}}/img/scholarship-grow.webp" alt="scholarship-grow" width="450" height="254">
					</div>
				</div>
				<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
					<div class="growwith-scholarship-right">
						<h4>Get the best scholarship assistance at TGC India</h4>
						<p class="devider"></p>
						<p>TGC India is one of the best educational institutions providing training, and scholarship assistance to candidates belonging from different backgrounds. Here, our team of experienced faculty members will guide you to choose the best university as per your abilities. They will give you effective suggestions to pass the scholarship criteria as well. By getting in touch with us, you will be able to save yourself from unnecessary debt, you will also get a chance to enhance your performance and build an effective resume.</p>
					</div>
				</div>
			</div>
		</div>

	</section>

	<section class="alumni">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h3>Where Our Alumni Work</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="firstsection">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="client ppd_mmf">
							<div class="clients-heading">
								<strong>Our Corporate Clients</strong>
							</div>
							<div class="client-list-few">
								@php foreach($data['partner'] as $rowC){ @endphp
								<div class="client-logo">
									<img src="{{url('public/uploads/'.$rowC->image)}}" alt="{{$rowC->name}}" width="96" height="60">
								</div>
								@php } @endphp
							</div>
							<div class="practice-test">
								<button class="button2">
									<a href="{{url('our-clients.html')}}">View All Clients</a>
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="testimonials ppd_mmf">
							<div class="testimonials-list">
								<div class="owl-carousel owl-theme test-slide-jobs">
									@php foreach($data['placement'] as $rowP){ @endphp
									<div class="item test-slide">
										<div class="test-img">
											<img src="{{url('public/uploads/'.$rowP->image)}}" alt="{{$rowP->name}}" width="140" height="140">
										</div>
										<div class="test-name">
											<strong>{{$rowP->name}}</strong>
											<p>{{$rowP->course_name}}</p>
										</div>
										<div class="company-name">
											<strong>{{$rowP->student_from}}</strong>
											<p>{{$rowP->student_to}}</p>
										</div>
									</div>
									@php } @endphp


								</div>
							</div>
							<div class="practice-test">
								<button class="button2">
									<a href="{{url('placement.html')}}">View All Placements <i class="fa fa-arrow-right" aria-hidden="true"></i>
									</a>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

@endsection

