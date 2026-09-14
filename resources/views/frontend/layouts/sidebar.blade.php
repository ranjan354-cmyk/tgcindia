						<div class="col-md-3">



							<div class="form-contact pi-place">

								<div class="india-row">

									<div class="india-row-image">

										<div class="india-contact">

											<p>For Voice Call</p>

											<strong> <a href="tel:+91-971 152 6942" target="_blank">+91-971 152 6942</a></strong>

										</div>

										<div class="india-image">

											<img src="{{ url('assets/front/') }}/img/icon/Call.png" width="43" height="34" alt="Call">

											<img src="{{ url('assets/front/') }}/img/icon/Whatsapp-n.png" width="43" height="34" alt="Whatsapp">

										</div>

									</div>

									<div class="india-row-image">

										<div class="row-contact">

											<p>WhatsApp Chat:</p>

											<strong> <a href="https://wa.me/918287060032" target="_blank">+918287060032</a></strong>

										</div>

										<div class="row-image">

											<img src="{{ url('assets/front/') }}/img/icon/c.png" width="43" height="34" alt="Company-phone">

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
										<input type="hidden" name="form_type" value="Press_Release">
										
										<input type="text" name="name"  value="{{ old('name') }}"  placeholder="Enter Name" maxlength="35">
										@error('name')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="email"  value="{{ old('email') }}" placeholder="Enter Email"> 
										@error('email')
											<p style="color: red;">{{ $message }}</p>
										@enderror 


										<input name="phone" id="emrol_ph"  value="{{ old('phone') }}" placeholder="Enter phone*" type="text" />
										@error('phone')
											<p style="color: red;">{{ $message }}</p>
										@enderror

										<input type="text" name="location"   value="{{ old('location') }}"placeholder="Enter Location">
										@error('location')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="course_interest"  value="{{ old('course_interest') }}" placeholder="Enter Course of interest">
										@error('course_interest')
											<p style="color: red;">{{ $message }}</p>
										@enderror



										<textarea name="message"  value="{{ old('message') }}" placeholder="Enter remark"></textarea>
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

