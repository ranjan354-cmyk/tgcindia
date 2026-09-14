@extends('frontend.layouts.app')

@section('content')



<div class="main-content">





	<section class="corp-banner">

		<img src="{{url('assets/front/')}}/img/special-workshop.webp" alt="TGC India reviews">

	</section>





	<section class="al_j">



		<div class="container">



			<div class="row">



				<div class="col-md-9">

					<div class="content">

						<h3>Special Workshop @ TGC</h3>



						<p>At TGC, our commitment is to bring the best out of you and equipped you with a visionary of a designer. By conducting regular design workshops at our institute we make student realize their design ambitions on practical turf, Most of these special sessions on design inculcates technological design advancements taking place international arena. Students takes opportunities those are hands on practical assignments based on the various topics of special sessions. We also invite eminent guest faculty from the design fraternity based in Delhi and outside. Just to have a better glimpse we invite you to visit one of our TGC facilities and attend a special session and no worries even if you are not a TGC enrolled student you can be assured to attend one of the classes by our specialized design and technology faculty with he subject of your interest.</p>



						<p>Itinerary for special sessions to be conducted for the <b>session 2017</b></p>











						<div class="upcomg_pg">

							@php foreach($data['events'] as $row){ @endphp

							<div class="upcomg_pg_lit">
							    @if($row->thumbnail!='')
							    <img src="{{url('public/uploads/'.$row->thumbnail)}}" >
							    @endif

								<h3>{{ substr($row->name,0,35) }}...</h3>

								<p>Date: {{$row->event_date}}</p>

								<p>Time: {{$row->event_time}}</p>

								<p>Conducted By: {{$row->conduct_by}}</p>



								<div class="aplynow">

								<button type="button" class="rgt_now req-careers" data-toggle="modal" data-target="#product_view{{$row->id}}">Apply Now</button>

										<button type="button" class="rgt_now req-careers" data-toggle="modal" data-target="#product_view_details{{$row->id}}">Details</button>

								</div>

								<!---<a href="#" class="rgt_now">Register Now</a>-->

							</div>
							
							
							
							
							 <div class="modal fade product_view" id="product_view_details{{$row->id}}">



          <div class="modal-dialog carrermodal modal-lg" role="document">



            <div class="modal-content">



              <div class="modal-header">



                <h5 class="modal-heading">{{$row->name}}</h5>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                  <span aria-hidden="true">×</span>



                </button>



              </div>



              <div class="modal-body">
                     @if($row->thumbnail!='')
   <img src="{{url('public/uploads/'.$row->thumbnail)}}" >

@endif

{!!$row->description!!}



              



              </div>



            </div>



          </div>



        </div>

							@php } @endphp



							

						</div>



						<div class="pagination">

							{{$data['events']->links()}}

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

										<input type="hidden" name="from_title" value="Side Bar Placement">
										<input type="hidden" name="form_type" value="upcoming_events">
												   <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">
	<input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">
										
										<input type="text" name="name" value="{{ old('name') }}"  placeholder="Enter Name" maxlength="35">
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

        @php foreach($data['events'] as $row){ @endphp

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


				  @if(session('success_upcoming'))
							<div class="alert alert-success">
								{{ session('success_upcoming') }}
							</div>
						@endif

						@if(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
						@endif
				<form method="post" action="{{ url('/upcoming-applynow') }}" onsubmit="return homeController.saveEnquirySide(this)">
				@csrf
                   <input type="hidden" name="recaptcha_token" class="recaptcha_token">
   
					<input type="hidden" name="from" value="Careers">

			<input type="hidden" name="jobtitle" class="from_title" value="Apply as a Trainer">

			<input type="hidden" name="form_type" class="type" value="Trainer_Upcoming">




                      <div class="row">


					  <div class="name">
					<div class="col-2">
						<p>Name*</p>
					</div>

					<div class="col-2">
						
						<select name="title_upcoming" id="title">
							<option value="Mr.">Mr.</option>
							<option value="Mrs.">Mrs.</option>
						</select>
						@error('title_upcoming')
							<p style="color: red;">{{ $message }}</p>
						@enderror
					</div>

					<div class="col-8" style="padding-left: 10px;">
						<input type="text" name="name_upcoming" value="{{ old('name_upcoming') }}" placeholder="Enter Name" maxlength="35">
						@error('name_upcoming')
							<p style="color: red;">{{ $message }}</p>
						@enderror
					</div>
				</div>




                        <div class="name">



                          <div class="col-2">



                            <p>Email*</p>



                          </div>



                          <div class="col-10">



                          <input type="text" name="email_upcoming" value="{{ old('email_upcoming') }}" placeholder="Enter Email">  
										@error('email_upcoming')
											<p style="color: red;">{{ $message }}</p>
										@enderror



                          </div>



                        </div>







                        <div class="name">



                          <div class="col-2">



                            <p>Mobile*</p>



                          </div>



                          <div class="col-10">

						  <input name="phone_upcoming" id="emrol_ph" value="{{ old('phone_upcoming') }}" placeholder="Enter phone*" type="text" />
										@error('phone_upcoming')
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



@endsection