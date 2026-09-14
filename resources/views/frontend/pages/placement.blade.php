@extends('frontend.layouts.app')

@section('content')





<div class="main-content">

<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/placement.webp">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Placement</h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Learn, create, and get hired — that’s the TGC way.</h2>

					<p class="subhead-b2bhome">TGC connects your skills with the right recruiters, internships, and full-time roles.</p>

					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('careers.html')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>


	<section class="reviews">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="ans-place-header">
						<h3>Our Placement Window</h3>
						<p>Look through our placement window to Know the success story of our placed learners. They are working with top MNCs today and taking huge salary lumps that were ever dreamt by them. Serious learners are already getting GOOD and it is your TURN now. </p>
					</div>
					<div class="rev">
						<div id="post_data">



							<div class="row">

								@php foreach($data['placement'] as $row){ @endphp

								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 cor_set ff_dd">

									<div class="ans-place-desc plc-main-part">

										<div class="placebox ans-place-desc-box placeone">

											<div class="ans-place-degi">

												<strong title="{{$row->course_name}}">{{substr($row->course_name, 0, 20)}}..</strong>

											</div>

											<div class="student-img">

												<figure>

													<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">

												</figure>

												<figcaption>{{$row->name}}</figcaption>

											</div>

											<div class="placement-img-cont">

												<div class="place-details d-flex justify-content-between">

													<div>

														<p>{{$row->type}}</p>

													</div>

													<div>

														<p title="{{$row->course_name}}">{{substr($row->course_name, 0, 20)}}..</p>

													</div>

												</div>

												<div class="placement-bottom">

													<img src="{{url('assets/front/')}}/img/placement/place-bottom.webp" alt="place-bottom" widht="940" height="143">

												</div>

												<!--

												<div class="place-star">

													<i class="fa fa-star" aria-hidden="true"></i>

													<i class="fa fa-star" aria-hidden="true"></i>

													<i class="fa fa-star" aria-hidden="true"></i>

													<i class="fa fa-star" aria-hidden="true"></i>

													<i class="fa fa-star" aria-hidden="true"></i>

												</div>

												-->

											</div>

											<div class="placement-end d-flex justify-content-between">

												<div>

													<p>At <span>{{$row->student_from}} </span>

													</p>

												</div>

												<div>

													<p>At <span title="{{$row->student_to}}"> {{substr($row->student_to, 0, 20)}}..</span>

													</p>

												</div>

											</div>

										</div>

									</div>

								</div>
								

								@php } @endphp	

<div class="col-lg-12 col-md-12 col-sm-12">
<div class="more_load_center">
<button class="btn" id="loadMoreBtn">Load more</button>
</div>								
</div>								

							</div>
							
							



















						</div>

					</div>









				</div>





				<div class="col-md-3">
					<div class="right-review-section">
						<div class="diff-plat-review">
							<div class="diff-plat-review-items">
								<div class="diff-plat-review-items-img">
									<img src="https://www.cromacampus.com/public/uploads/Social/2021/01/week_1/Google_Icon.svg" alt="google">
								</div>
								<div class="diff-plat-review-rating">
									<p>4.2/<span>5</span></p>
									<i>1030+ Google Reviews</i>
								</div>
							</div>
							<div class="diff-plat-review-items">
								<div class="diff-plat-review-items-img">
									<img src="https://www.cromacampus.com/public/uploads/Social/2020/12/week_3/sul.png" alt="Sulekha">
								</div>
								<div class="diff-plat-review-rating">
									<p>4.8/<span>5</span></p>
									<i>1324+ Sulekha Reviews</i>
								</div>
							</div>
							<div class="diff-plat-review-items">
								<div class="diff-plat-review-items-img">
								<img src="https://www.cromacampus.com/public/uploads/Social/2020/12/week_3/urbonpro.png" alt="Urbonpro">
								</div>
								<div class="diff-plat-review-rating">
									<p>4.6/<span>5</span></p>
									<i>1034+ UrbanPro Reviews</i>
								</div>
							</div>
							<div class="diff-plat-review-items">
								<div class="diff-plat-review-items-img">
									<img src="https://www.cromacampus.com/public/uploads/Social/2021/01/week_2/just-dial.png" alt="Just Dial">
								</div>
								<div class="diff-plat-review-rating">
									<p>4.3/<span>5</span></p>
									<i>1294+ Just Dial Reviews</i>
								</div>
							</div>
							<div class="diff-plat-review-items">
								<div class="diff-plat-review-items-img">
								<img src="https://www.cromacampus.com/public/uploads/Social/2021/01/week_3/Facebook.svg" alt="Fb">
								</div>
								<div class="diff-plat-review-rating">
									<p>4.5/<span>5</span></p>
									<i>12980+ Facebook Reviews</i>
								</div>
							</div>
						</div>
					</div>


					<!--<div class="categories_list">
						<ul>
							@php foreach($data['category'] as $rowCat){ @endphp
							<li>
								<a href="{{url($rowCat->slug)}}">
									<div class="crse_logo">
										<img src="{{url('public/uploads/'.$rowCat->image)}}" alt="{{$rowCat->name}}">
									</div>
									<div class="crse_name">{{$rowCat->name}}</div>
								</a>
							</li>
							@php } @endphp	
						</ul>
					</div>-->
					
					
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
		


		</div>
		</div>
	</section>



</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const divs = document.querySelectorAll('.ff_dd');
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        let itemsToShow = 6;
        let isExpanded = false; // To track whether data is expanded or not

        function showLimitedItems() {
            divs.forEach((div, index) => {
                div.style.display = index < itemsToShow ? 'block' : 'none';
            });
            loadMoreBtn.textContent = "Load More";
            isExpanded = false;
        }

        function showAllItems() {
            divs.forEach(div => {
                div.style.display = 'block';
            });
            loadMoreBtn.textContent = "Load Less";
            isExpanded = true;
        }

        // Initial display
        showLimitedItems();

        loadMoreBtn.addEventListener('click', function () {
            if (isExpanded) {
                showLimitedItems();
            } else {
                showAllItems();
            }
        });
    });
</script>


@endsection