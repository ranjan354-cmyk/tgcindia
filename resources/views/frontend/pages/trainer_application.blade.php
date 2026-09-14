@extends('frontend.layouts.app')

@section('content')



<div class="main-content">

<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/corporate.jpg">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>trainer Application</h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Workplace Learning that Works</h2>

					<p class="subhead-b2bhome">Skill your workforce in new age technologies with our cutting edge curriculum</p>

					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('careers.html')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>






	<section class="become_instrctor">

		<div class="container">

			<div class="">

				<div class="row">

					<div class="col-md-9">

						<div class="content">

							<h3>Trainer Application</h3>



							<p>If you would like us to consider you as a potential trainer at TGC, you are required to complete the application form below.</p>



							<p>Working Professionals looking forward to sharing their expertise can join us as part-time trainers also.</p>



							<p>We have asked you to provide information about your areas of expertise, experience in training, and work (training or otherwise). Also upload a copy of your resume to support the application at hr@tgcindia.com separately. Your application will be reviewed by our Technical Heads who will subsequently contact you by e-mail or telephone if we wish to interview you. All information will be treated confidentially.</p>

						</div>



						<div class="col_fomr">

						@if(session('success15'))
                            <div class="alert alert-success">
                                {{ session('success15') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
		<form action="{{ url('/trainer-application') }}" method="post">
		    
        @csrf
         <input type="hidden" name="recaptcha_token" class="recaptcha_token">

        								   <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Your Name (required)</label>
											<input type="hidden" name="form_type" value="trainer_application">

											<input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Your Name">
											@error('name')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Position applied for (required)</label>
											<input type="text" name="position"  value="{{ old('position') }}" placeholder="Enter Position applied">
											@error('position')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email"  value="{{ old('email') }}" placeholder="Enter Your Email">
											@error('email')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Phone</label>
											<input name="phone" id="emrol_ph" value="{{ old('phone') }}" placeholder="Enter your Phone*" type="phone" />
											@error('phone')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Key Skills</label>
											<select name="keyskill" value="{{ old('keyskill') }}" class="wpcf7-form-control wpcf7-select" aria-invalid="false">
												<option value="JAVA TECHNOLOGY">JAVA TECHNOLOGY</option>
												<option value="IBM MAINFRAME">IBM MAINFRAME</option>
												<option value="RED HAT LINUX (6.0)">RED HAT LINUX (6.0)</option>
												<option value="DATA WAREHOUSING">DATA WAREHOUSING</option>
												<option value="ORACLE 9i D2K">ORACLE 9i D2K</option>
												<option value="SQT">SQT</option>
												<option value="Oracle APPS XI i Financials">Oracle APPS XI i Financials</option>
												<option value="Oracle APPS XI i Technical">Oracle APPS XI i Technical</option>
												<option value="MICROSOFT TECHNOLOGY">MICROSOFT TECHNOLOGY</option>
												<option value="SEO">SEO</option>
												<option value="Oracle APPS XI i MFG">Oracle APPS XI i MFG</option>
												<option value="ORACLE 9i DBA">ORACLE 9i DBA</option>
												<option value="ORACLE 10g DBA">ORACLE 10g DBA</option>
												<option value="ORACLE 10g RAC">ORACLE 10g RAC</option>
												<option value="VLSI Technology">VLSI Technology</option>
												<option value="NETWORKING">NETWORKING</option>
												<option value="PHP &amp; PHP++">PHP &amp; PHP++</option>
												<option value="EMBEDDED SYSTEM">EMBEDDED SYSTEM</option>
												<option value="Oracle 10G Developer">Oracle 10G Developer</option>
												<option value="Adobe FLEX-3.0">Adobe FLEX-3.0</option>
												<option value="JQUERY">JQUERY</option>
												<option value="ANDROID">ANDROID</option>
												<option value="CAD COURSES">CAD COURSES</option>
												<option value="C &amp; C++ LANGUAGE">C &amp; C++ LANGUAGE</option>
												<option value="ROBOTICS COURSE">ROBOTICS COURSE</option>
												<option value="CE-RP (Personality Dev...)">CE-RP (Personality Dev...)</option>
											</select>
											@error('keyskill')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Time Availability</label>
											<select name="time_availability" value="{{ old('time_availability') }}" class="wpcf7-form-control wpcf7-select" aria-invalid="false">
												<option value="Mornings">Mornings</option>
												<option value="Evenings">Evenings</option>
												<option value="Weekends">Weekends</option>
												<option value="Full time">Full time</option>
											</select>
											@error('time_availability')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Current Company</label>
											<input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Current Company Name">
											@error('company_name')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Associative Skills</label>
											<textarea name="message" placeholder="Associative Skills">{{ old('message') }}</textarea>

											@error('message')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<button type="submit">Submit</button>
										</div>
									</div>



								</div>
						</div>
						</form>
					
					</div>



					<div class="col-md-3">







						<div class="categories_list">

							<ul>

								@php foreach($data['category'] as $row){ @endphp

								<li>

									<a href="{{url($row->slug)}}">

										<div class="crse_logo">

										<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">

										</div>

										<div class="crse_name">{{$row->name}}</div>

									</a>

								</li>

								@php } @endphp

								

							</ul>

						</div>



					</div>



				</div>

			</div>



		</div>



	</section>



</div>





@endsection