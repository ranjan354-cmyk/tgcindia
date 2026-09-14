@extends('frontend.layouts.app')

@section('content')



<div class="main-content">





	<section class="corp-banner">

		<img src="{{url('assets/front/')}}/img/review-top-banner.png" alt="TGC India reviews">

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



					<h4>{{$data['catName']}}</h4>





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

									<a class="nav-link" href="{{url('reviews.html?cat='.$row->id)}}">{{$row->name}}</a>

								</li>

								@php ++$i; } @endphp



							</ul>



							<!-- Tab panes -->

							<div class="tab-content">

								

								<div id="review1" class="tab-pane active">



									<div id="post_data">

										@php 

											foreach($data['reviews'] as $row){ 

										@endphp

										<div class="rev-list">

											<div class="review-top-section">

												<div class="heading-rating">

													<div class="image-name">

														<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">

													</div>

													<div class="name-linked">

														<div class="rating-smile">

															<div class="rating-smile1">

																<i class="fa fa-star" aria-hidden="true"></i>

																<i class="fa fa-star" aria-hidden="true"></i>

																<i class="fa fa-star" aria-hidden="true"></i>

																<i class="fa fa-star" aria-hidden="true"></i>

																<i class="fa fa-star-half" aria-hidden="true"></i>

															</div>

														</div>

														<strong>{{$row->name}}</strong>

														<span>({{$row->heading}})</span>

															@php

																$results = DB::table('tbl_course_category')->where('id', $row->course_category)->first();

																if($results){ @endphp

																<a href="{{url('reviews/'.$row->slug)}}">{{$results->name}}</a>

															@php	}

															@endphp

													</div>

												</div>

												<div class="rev-date">

													<span>{{date('d M,Y', strtotime($row->added_on))}}</span>

												</div>

											</div>

											<div class="rev-desc">

												@php echo $row->content; @endphp

											</div>

										</div>

										@php } @endphp



									</div>



									



								</div>

								

								

							</div>

							{{ $data['reviews']->links() }}

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