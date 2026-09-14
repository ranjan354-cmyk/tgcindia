@extends('frontend.layouts.app')

@section('content')





<div class="main-content">





	<section class="scholarshop-top">

		<!--<div class="container">-->

		

		<!--</div>-->

	</section>





	



	



	<section class="alumni">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="heading">

						<h3>Our Clients</h3>

					</div>

				</div>

			</div>

		</div>

		<div class="firstsection">

			<div class="container">

				<div class="row">

					<div class="col-md-6">

						<div class="client">

							<div class="clients-heading">

								<strong>Our Corporate Clients</strong>

							</div>

							<div class="client-list-few">

								@php foreach($data['partner'] as $row){ @endphp

								<div class="client-logo">

									<img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}" width="96" height="60">

								</div>

								@php } @endphp

								

							</div>

							<div class="practice-test">

								

							</div>

						</div>

					</div>

					<div class="col-md-6">

						<div class="testimonials">

							<div class="testimonials-list">

								<div class="owl-carousel owl-theme test-slide-jobs">

									@php foreach($data['placement'] as $rowP){ @endphp

									<div class="item test-slide">

										<div class="test-img">

											<img src="{{url('public/uploads/'.$rowP->image)}}" alt="{{$rowP->image_alt}}" title="{{$rowP->image_title}}" description="{{$rowP->image_description}}" width="140" height="140">

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