@extends('frontend.layouts.app')

@section('content')





<div class="main-content">





	<section class="corp-banner mtg">

		<img src="{{url('assets/front/')}}/img/review-top-banner.png" alt="TGC India reviews">

	</section>





	<section class="reviews">

		<div class="container">

			<div class="row">

				<div class="col-md-9">







					<div class="show-all-comments">

						<ul class="custom-comments">

							@php foreach($data['testimonial'] as $row){ @endphp

							<li>

								<div class="avatar-custom">

									<img alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}" src="{{url('public/uploads/'.$row->image)}}" class="retina_avatar zoom animate avatar-50 photo load" height="50" width="50" loading="lazy">

								</div>

								<div class="custom-comment-wrap">

									<h4 class="custom-comment-meta"> From <span class="custom-comment-author">{{$row->name}}</span> on <span class="custom-comment-on-title">{{$row->course_name}}</span>

									</h4>

									<blockquote>

										<p>{{$row->description}}</p>

									</blockquote>

								</div>

							</li>

							@php } @endphp

							

						</ul>

						<div class="custom-navigation">

						<div class="pagination">

							{{$data['testimonial']->links()}}

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

					<div class="rev_frm">
					<div class="inner-container">
          <div class="contact-form-box">
            <div class="row">

        @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
				<div class="for_ty">
				<h2>Submit Your Review</h2>
				</div>

              <form action="{{ url('give_review') }}" method="post" id="" class="contact-form" autocomplete="off" enctype="multipart/form-data">
                
               @csrf
               	<input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">

                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 col-12 form-group">
				<label>Profile Image (jpg,png,jpeg files)</label>
                  <input type="file" accept=".jpg, .jpeg, .png" / name="image" required placeholder="" value="" id="">
                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                  </div>

                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 col-12 form-group">
				<label>Name</label>
                  <input type="text" name="name" required placeholder="Enter Name" value="" maxlength="35" id="">
                                @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                  </div>
                                  
                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 col-12 form-group">
				<label>Course</label>
                  <select class=" form-control" id="mobileSelect" data-mobile="true" name="course" tabindex="-98" id="subject_aboutenquiry" >
                        
                        
                      <option value="">Select Subject</option>
                      
                     @php
                     $ccdata = DB::table('tbl_course')
    ->where('staus', 'Active')
    ->where('is_deleted', '0')
    ->orderBy('orders_by', 'asc')
    ->get();

                     @endphp
                     
                     @foreach($ccdata as $cname)
                      <option value="{{ $cname->id }}">{{ $cname->name }}</option>
                     @endforeach
                    
                      
                      
                    </select>
                                  @if ($errors->has('course'))
                                        <span class="text-danger">{{ $errors->first('course') }}</span>
                                        @endif
                                  </div>
				<div class="col-md-12 col-md-12 col-sm-12 col-xs-12 col-12 form-group">
				<label>Desigination</label>
                  <input type="text" name="desigination" required placeholder="Enter Desigination" value="" maxlength="35" id="">
                                  @if ($errors->has('desigination'))
                                        <span class="text-danger">{{ $errors->first('desigination') }}</span>
                                        @endif
                                  </div>

                

                



                

                <div class="col-md-12 form-group">
				<label>Review</label>
                  <textarea name="review" required placeholder="Write Review" id="message_aboutenquiry"></textarea>
                                  @if ($errors->has('review'))
                                        <span class="text-danger">{{ $errors->first('review') }}</span>
                                        @endif
                                  </div>

                <div class="col-md-12 form-group m-0">
                  <button class="rev_bt" type="submit" name="submit-form"><span class="btn-title">Submit Review</span></button>

                </div>


              </form>

            </div>

          </div>

          <div class="re-msg">

          </div>
        </div>
					</div>

				</div>



			</div>



		</div>

	</section>



</div>



@endsection