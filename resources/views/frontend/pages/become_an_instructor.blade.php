@extends('frontend.layouts.app')

@section('content')

@php

//print_r($coursesdata);


@endphp

<div class="main-content">

<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/beconme-and-instructro.webp">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Become an instructor</h1>

					<div class="yellowunderline"></div>

			

					<p class="subhead-b2bhome">Share your knowledge, inspire students, and grow with India’s leading training institute.
</p>

					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('careers.html')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>






	<section class="become_instrctor">

		<div class="container">

			<div class="bg_white">

				<div class="row">



					<div class="col-md-4">

						<div class="become_form">

							<h3> Fill in the form below</h3>



							@if(session('success14'))
                            <div class="alert alert-success">
                                {{ session('success14') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
		<form action="{{ url('/become-an-instructor') }}" method="post">
        @csrf
         <input type="hidden" name="recaptcha_token" class="recaptcha_token">

								   <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" name="form_type" value="become_an_instructor">
                    <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">
                    <input type="text" name="fname_instructor" value="{{ old('fname_instructor') }}" placeholder="Enter first name" >
                    @error('fname_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="lname_instructor" value="{{ old('lname_instructor') }}" placeholder="Enter last name" >
                    @error('lname_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="phone_instructor" value="{{ old('phone_instructor') }}" placeholder="Enter Mobile" >
                    @error('phone_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" name="email_instructor" value="{{ old('email_instructor') }}" placeholder="Enter Email" >
                    @error('email_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <select class="form-control" name="course_interest_instructor">
                           <option value="">--Select Course---</option>
                        @foreach($coursesdata as $coursesdataValue)
                     
                        <option value="{{$coursesdataValue->name}}">{{$coursesdataValue->name}}</option>
                        @endforeach
                    </select>
                  
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="linkedin_instructor"  value="{{ old('linkedin_instructor') }}"placeholder="Your Linkedin Profile" >
                    @error('linkedin_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>
                  <div class="col-md-12">
                <div class="form-group">
                    <textarea name="message_instructor" value="{{ old('message_instructor') }}" placeholder="Tell Us More About Yourself" ></textarea>
                    @error('message_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="about_course_instructor" value="{{ old('about_course_instructor') }}" placeholder="Remark" ></textarea>
                    @error('about_course_instructor')
                      <p style="color: red;">{{ $message }}</p>
                  @enderror
                </div>
            </div>

      


									<div class="col-md-12">
										<div class="form-group">
											<button type="submit"> Submit </button>
										</div>
									</div>

								</div>
							</form>



						</div>

					</div>





					<div class="col-md-8">

						<div class="content">

							<h3>Who can teach?</h3>



							<p>Anyone who has an in-depth working knowledge of the particular domain and is very passionate about teaching and sharing his/her expert knowledge with students and professionals can teach at TGC India. Good oral communication skills are mandatory.</p>



							<h3>Advantage TGC India!</h3>



							<p>Apart from working with a very young and talented team, you will also get the revenue-sharing opportunity at the fastest growing online training company in India! You will be provided with a great platform to showcase your practical knowledge and skills that you have acquired over a period of time. What more, you can conduct your training from any part of the world!</p>



							<h3>The Process</h3>



							<p>First thing first! You need to fill this form. If you are shortlisted and finally selected, you will undergo a training based on TGC India’s Learning Methodology. You will also get the opportunity to co-create the content with us to make ‘learning’ a very rich and fruitful experience for the learners.</p>

						</div>

					</div>



				</div>

			</div>

		</div>

	</secttion>

</div>

@endsection