@extends('frontend.layouts.app')

@section('content')



<div class="main-content">


	<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/corporate.jpg">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Reviews</h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Workplace Learning that Works</h2>

					<p class="subhead-b2bhome">Skill your workforce in new age technologies with our cutting edge curriculum</p>

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

						<h3>Satisfied Learners Testimonials &amp; Reviews</h3>

						<p>Know the story of our successful learners who are utmost satisfied with our training

							approach and methodologies. Their reviews will let you know that how we are

							different from others in terms of quality training, interview grooming &amp;

							placement. </p>

					</div>



					<div class="rev">





						<div class="review_tabs">

							<ul class="nav nav-tabs" role="tablist">

								@php

								$i=0;

								$results = DB::table('tbl_review_category')

								->WHERE('is_deleted', 0)

								->get();

								foreach($results as $row){

								@endphp

								<li class="nav-item">

									<a class="nav-link 

										@php 

											if(!empty($cat)){

												if($row->id == $cat){ echo 'active'; }

											} else {

												if($i == 0){ echo 'active'; } 

											}

										@endphp 

										" href="{{url('reviews.html?cat='.$row->id)}}">{{$row->name}}</a>

								</li>

								@php ++$i; } @endphp



							</ul>



							<!-- Tab panes -->

							<div class="tab-content">

								@php

								$i=0;

								$results = DB::table('tbl_review_category')

								->WHERE('is_deleted', 0)

								->get();

								foreach($results as $rowC){

								@endphp

								<div id="review{{$rowC->id}}" class="tab-pane @php if($i == 0){ echo 'active'; } @endphp">



									<div id="post_data">

										@php

										$resultsReview = DB::table('tbl_reviews')

										->WHERE('is_deleted', 0);

										if(!empty($cat)){

										$resultsReview = $resultsReview->WHERE('type', $cat);

										} else {

										$resultsReview = $resultsReview->WHERE('type', $rowC->id);

										}

										$resultsReview = $resultsReview->paginate(30);

										$resultsReview->appends(['cat' => $cat]);

										foreach($resultsReview as $row){

										@endphp

										<div class="rev-list">


											<div class="two_part">
												<div class="wid150">
													<div class="img_share">
														<div class="review-top-section">
															<div class="heading-ratings">
																<div class="image-name">
																	<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">
																</div>

																<!--<span class="user_link_profile">-->
																<!--	<a target="_blank" href="https://www.linkedin.com/shareArticle?url={{url('reviews.html')}}" rel="noopener noreferrer" class="linkedinshare"><i class="fa fa-linkedin"></i></a></span>-->

															</div>
														</div>
													</div>
												</div>

												<div class="se_full">
													<div class="two_com md_vf">

														<div class="img_share">
															<div class="review-top-section">
																<div class="heading-ratings">
																	<div class="image-name">
																		<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">
																	</div>

																	<!--<span class="user_link_profile">-->
																	<!--	<a target="_blank" href="https://www.linkedin.com/shareArticle?url={{url('reviews.html')}}" rel="noopener noreferrer" class="linkedinshare"><i class="fa fa-linkedin"></i></a></span>-->

																</div>
															</div>
														</div>


														<div class="review-top-section">
															<div class="heading-rating">

																<div class="name-linked">
																	<strong>{{$row->name}}
																	
																	
																<div class="rtg_ratn">
																<div class="rating-smile">

																	<div class="rating-smile1">
																		@php for($i = 0; $i < $row->no_reviews; $i++){ @endphp
																		<i class="fa fa-star" aria-hidden="true"></i>
																		@php } @endphp
																		<!--<span><img src="https://www.cromacampus.com/public/img/Icon_1.png" width="18" height="18"></span>-->

																	</div>

																</div>

																<!--<div class="rating-smile2">
																	
																	<span>{{$row->added_on}}</span>
																</div>-->
															</div>	
																	
																	
																	
																	
																	
																	
																	
																	</strong>
																	<span>({{$row->heading}})</span>
																	@php

																	$results = DB::table('tbl_course_category')->where('id', $row->course_category)->first();

																	if($results){ @endphp

																	<a href="{{url('reviews/'.$results->slug)}}">{{$results->name}}</a>

																	@php }

																	@endphp

																</div>

															</div>

															
															<div class="rtg_ratn">
																<div class="rating-smile2">
																	
																	<span>{{$row->added_on}}</span>
																</div>
															</div>	




															<!--<div class="rev-date">

<span>{{date('d M,Y', strtotime($row->added_on))}}</span>

</div>-->

														</div>


													</div>

													<div class="rev-desc">

														@php echo $row->content; @endphp

													</div>

												</div>

											</div>
















										</div>

										@php } @endphp



									</div>







								</div>

								@php ++$i; } @endphp



							</div>

							{{ $resultsReview->links() }}

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





					<div class="categories_list">

						<ul>

							@php foreach($data['category'] as $rowC){ @endphp

							<li>

								<a href="{{url($rowC->slug)}}">

									<div class="crse_logo">

										<img src="{{url('public/uploads/'.$rowC->image)}}" alt="{{$rowC->image_alt}}" title="{{$rowC->image_title}}" description="{{$rowC->image_description}}">

									</div>

									<div class="crse_name">{{$rowC->name}}</div>

								</a>

							</li>

							@php } @endphp



						</ul>

					</div>

				



				</div>







			</div>



		</div>

	</section>



</div>

@endsection