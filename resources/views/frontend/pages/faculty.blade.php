@extends('frontend.layouts.app')
@section('content')

<div class="main-content">


<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/corporate.jpg">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

					<h1>Faculty</h1>

					<div class="yellowunderline"></div>

					<h2 class="head-b2b-home">Workplace Learning that Works</h2>

					<p class="subhead-b2bhome">Skill your workforce in new age technologies with our cutting edge curriculum</p>

					<a class="trackButton demo-req-btn ga_corp_info" href="{{url('careers.html')}}">CONNECT WITH US</a>

				</div>

			</div>

		</div>

	</section>


  <section class="nav-about-team-join">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="navnab-atj">
            <div class="navnab-atj-link ">
              <a href="{{url('about-us.html')}}">About Us</a>
            </div>
            <div class="navnab-atj-link ">
              <a href="{{url('culture.html')}}">Culture </a>
            </div>
            <div class="navnab-atj-link">
              <a href="{{url('why-tgc.html')}}">Why TGC</a>
            </div>

            <div class="navnab-atj-link nav-active">
              <a href="{{url('faculty.html')}}">Faculty </a>
            </div>
            <div class="navnab-atj-link">
              <a href="{{url('facilites.html')}}">Facility </a>
            </div>
            <div class="navnab-atj-link">
              <a href="{{url('join-us.html')}}">Join Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="why_tgc">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="welcome">
            <h3>Faculty</h3>

            <p>We at TGC are design disciples for life. We can live and breathe design. A small and cohesive team, we make it our business to keep in the knowhow of the fastest happening in the field of design & technology. Our passion is to learn, apply and design-- technology. Unlike conventional training institutes we begin structuring our programme by understanding your needs and assessing your current strengths.</p>

            <p>Our Faculty is made up of small cohesive team of design dreamers, with experience of more than ten years and proven domain expertise. We also boast of panel of guest faculty, some of whom figure in the who's who of the industry.</p>

            <p>A solid background in art & aesthetics, a minimum experience of 7 years in the production-based industry are the requisite to be a TGC faculty. Some of our faculty are from National Institute of Design and Creative Directors from agencies like Grey and BBDO. Conducting specialized workshops, arranging design shows and studio visits are some extended responsibilities for the faculty, which they really enjoy. Our Faculty often arranges some live discussion forums to give our students an opportunity to be more open towards their design concerns.</p>

            <p>
              In case if you are planning to interact directly with our faculty, Contact us

            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>



@endsection