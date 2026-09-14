@extends('frontend.layouts.app')

@section('content')
<h1 class="homepage-seo-heading">Creative Design, Animation, VFX and Web Development Courses in Delhi</h1>
<style>
.homepage-seo-heading { margin: 16px 12px 12px; text-align: center; font-size: 26px; line-height: 1.3; font-weight: 700; color: #222; }
@media screen and (max-width: 576px) { .homepage-seo-heading { margin: 10px 12px 8px; font-size: 20px; line-height: 1.3; } }
</style>






<style>
@media screen and (min-width: 900px) {

    .lathide{
        display:none;
    }
}

.step_four .box .content {
   
    margin-top: 45px !important;
    
}
@media screen and (max-width: 576px) {
    .step_four .box .content {
       
        padding: 6px !important; 
        padding-top: 14px !important;
    }
}



@media only screen and (max-width: 768px) {
 .career_course .course_cards_home .first_display {
      height: 75% !important;
  }
   .career_slider .item {
        margin: 0 0px -81px;
    }
}



@media (max-width: 992px) {
    .left-side .placement-video a.button3 {
        padding: 7px 6px;
    }
}


.news-block-two .image {
    aspect-ratio: 3 / 2;
    overflow: hidden;
}
.news-block-two .image img {
    display: block;
    width: 100%;
    height: 100% !important;
    object-fit: cover;
    background: #f5f5f5;
}
.rt{
    color:#fff;
}.campus-event-bx {
    background: #FBFBFB;
    box-shadow: 4px 4px 9px rgba(0, 0, 0, .25);
    border-radius: 20px;
    padding: 10px;
    transition: .3s ease-in-out;
}
.campus-event-bx {
    min-height: 335px;
    background: #fbfbfb;
    box-shadow: 4px 4px 9px rgba(0, 0, 0, .25);
    padding: 10px;
    margin-bottom: 5px;
    border-radius: 20px;
    transition: .3s ease-in-out;
}

@media (max-width: 1700px) {
    .campus-event-bx h5 {
        padding: 10px 0 5px 15px;
        font-size: 18px;
    }
}
.campus-event-bx small {
    font-family: 'Atami', sans-serif;
    font-weight: 700;
    letter-spacing: .5px;
    padding: 16px 0 12px 15px;
}
.explore_all_btn a {
    display: unset;
    background: var(--tgc-red);
    color: #fff;
    padding: 10px 16px;
    font-size: 16px;
    font-weight: 600;
}
</style>
 @php 

$gradients = [
    "linear-gradient(240deg, #0f9b0f, #000000)",   // Dark green to black
    "linear-gradient(240deg, #134e4a, #0f766e)",   // Teal to deeper green-teal
    "linear-gradient(240deg, #14532d, #166534)",   // Forest green tones
    "linear-gradient(240deg, #1e3c72, #2a5298)",   // Navy to muted green-blue
    "linear-gradient(240deg, #064e3b, #065f46)",   // Deep emerald shades
    "linear-gradient(240deg, #003300, #004d00)",   // Very dark green gradient
    "linear-gradient(240deg, #0b3d91, #1c8d73)",   // Navy-teal mix
    "linear-gradient(240deg, #004d40, #1de9b6)",   // Dark teal to bright mint
    "linear-gradient(240deg, #00332e, #00574b)",   // Jungle dark green tones
    "linear-gradient(240deg, #112d4e, #3f9771)",   // Deep teal/blue-green
    "linear-gradient(240deg, #1a2a6c, #b21f1f, #fdbb2d)", // Multitone w/ green-blue base
    "linear-gradient(240deg, #102a43, #243b53)",   // Navy-green mix
    "linear-gradient(240deg, #233329, #63d471)",   // Green coffee tones
    "linear-gradient(240deg, #1e3c72, #2a5298)",   // Reused navy to teal for balance
    "linear-gradient(240deg, #0d3b66, #14532d)",   // Dark blue to deep forest
    "linear-gradient(240deg, #0b8457, #014421)",   // Dark emerald to near-black green
    "linear-gradient(240deg, #274060, #1b998b)",   // Steely green to teal
    "linear-gradient(240deg, #0d1b2a, #1b263b)",   // Dark green-navy blend
    "linear-gradient(240deg, #122c34, #2a9d8f)",   // Dark to sea green
    "linear-gradient(240deg, #1b262c, #0f4c75)"    // Steel green/blue
];
@endphp
<div class="main-content">

<div id="myCarousel" class="carousel slide" >


  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  @php

        $iS1 = 0;

        foreach($data['slider'] as $rowSl){

        @endphp
    <div class="item @php if($iS1 == 0){ echo 'active'; } @endphp">
        
    @if($iS1 == 0)
    <img 
        src="{{ url('public/uploads/'.$rowSl->image) }}" 
            srcset="{{ asset('public/uploads/202602061845new-site-banner-640.webp') }} 640w, {{ url('public/uploads/'.$rowSl->image) }} 1335w"
            sizes="(max-width: 767px) 100vw, 1100px"
        alt="tgcindia" 
        width="1100"
  height="235"
  loading="eager"
  fetchpriority="high"
  decoding="async"
    >
@else
    <img 
        src="{{ url('public/uploads/'.$rowSl->image) }}" 
        alt="tgcindia" 
        loading="lazy" 
        decoding="async"
    >
@endif

  
  
  
    </div>
	   @php ++$iS1; } @endphp


  </div>
  <!-- Left and right controls -->
  <a class="arow_mid left" href="#myCarousel" data-slide="prev">
     <img src="{{ url('assets/front/') }}/img/left-arrow.png" loading="lazy" alt="tgcindia">
  </a>
  <a class="arow_mid right" href="#myCarousel" data-slide="next">
     <img src="{{ url('assets/front/') }}/img/right-arrow.png" loading="lazy" alt="tgcindia">
  </a>
   
  
</div>



  


  <section class="step_four">

    <div class="container">

      <div class="row"  style="display:flex;">



        <div class="col-md-3" >

          <div class="box" >

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/1.webp" loading="lazy" alt="tgcindia">

              </div>

            </div>

            <div class="content">

              <h3>ClassRoom Training</h3>

              <p>100+ Courses</p>

              <a class="desc" href="{{ url('courses') }}">Know More </a>
              <a href="#offer_webinar" class="mobile modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Know More</span></a>

            </div>

          </div>

        </div>



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/2-1.webp" loading="lazy" alt="tgcindia">

              </div>

            </div>

            <div class="content">

              <h3>Online Training</h3>

              <p>Join Live Training</p>

              <a href="#" class="desc" id="mySizeChart">Join here </a>
              <a href="#offer_webinar" class="mobile modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Know More</span></a>

            </div>

          </div>

        </div>



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/3.webp" loading="lazy" alt="tgcindia">

              </div>

            </div>

            <div class="content">

              <h3>Book a Demo / Webinar</h3>

              <p>Interact With Our Trainers</p>


              <a href="#offer_webinar" class="modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Book Now</span></a>


            </div>

          </div>

        </div>



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/4.webp" loading="lazy" alt="tgcindia">

              </div>

            </div>

            <div class="content">

              <h3>Enroll Now</h3>

              <p>New Batches Are Commencing</p>

              <a class="desc" href="enroll-now.html"><span>Enroll Now</span></a>
              <a href="#offer_webinar" class="mobile modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Enroll Now</span></a>

            </div>

          </div>

        </div>







      </div>

    </div>

  </section>






  <section class="course-wrapper Trending">

    <div class="container">

      <div class="row justify-content-center">

        <div class="col-xl-12">

          <div class="section-heading mb-700 text-center">

            <h2 class="font-lg">Trending Courses</h2>

          </div>

        </div>

      </div>




      <div class="trending_abv">
        <div class="">
          <div class="header_last">

            <nav class="navbar navbar-default nav_category" style="overflow: visible;">

              <div class="collapse navbar-collapse justify-content-end mb_width_auto" id="navbarNavDropdown">
                <ul class="navbar-nav new_nvs" id="nav1">
                  @php
                  $results = DB::table('tbl_course_category')->where('is_deleted', 0)->WHERE('staus', 'Active')->orderBy('orders_by', 'ASC')->take(90)->get();
                  foreach($results as $row){
                  @endphp
                  <li><a href="{{url($row->slug)}}">{{$row->name}} </a></li>
                  @php } @endphp
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggl1" href="javascript:void(0);" aria-label="hamburger icon" id="navbarDropdownMenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-bars"></i>
                    </a>
                    <ul class="dropdown-menu" id="extra_me1" aria-labelledby="navbarDropdownMenu1">
                    </ul>
                  </li>
                </ul>
              </div>

            </nav>

          </div>
        </div>

      </div>




      <div class="row justify-content-lg-center">



        <div class="col-md-12">

          <div class="tabs_home">

            <div class="tend">

              <ul class="nav nav-tabs" id="deskTop_tabs" role="tablist">
                   <li class="nav-item active">

                  <a class="nav-link " data-toggle="tab" href="#all">All </a>

                </li>
   <!----<li class="nav-item">

                  <a class="nav-link"  onclick="getCourses('Premium_Courses')">Premium Courses</a>

                </li> --->
             <li class="nav-item">

                  <a class="nav-link" data-toggle="tab" href="#home">Premium Courses</a>

                </li> 

                <li class="nav-item">

                  <a class="nav-link" data-toggle="tab" href="#menu1">Featured Courses</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" data-toggle="tab" href="#menu2">Trending Courses</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" data-toggle="tab" href="#menu3">Comprehensive Courses</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" data-toggle="tab" href="#menu4">Short Term Courses </a>

                </li>



              </ul>

            </div>
			
			
            <div class="Only_mob_show">

              <p> All </p>





              <div class="menu-bar" id="men_u_bar">

                <span class="fa fa-bars"></span>

              </div>

              <div class="menu nes_css" id="menu">

                <ul class="nav nav-tabs" id="mobIle_tab">

                  <li class="nav-item">

                    <a class="nav-link active" data-toggle="tab" href="#home">Premiums Courses</a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" data-toggle="tab" href="#menu1">Featured Courses</a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" data-toggle="tab" href="#menu2">Trending Courses</a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" data-toggle="tab" href="#menu3">Comprehensive Courses</a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" data-toggle="tab" href="#menu4">Short Term Courses</a>

                  </li>
                <!---
                  <li><a href="#1">Project Management and Methodologies </a></li>

                  <li><a href="#1">Software Testing</a></li>

                  <li><a href="#1">Big Data</a></li>

                  <li><a href="#1">Cloud Computing</a></li>

                  <li><a href="#1">Frontend Development</a></li>

                  <li><a href="#1">Artificial Intelligence</a></li>

                  <li><a href="#1">Robotic Process Automation</a></li>

                  <li><a href="#1">Data Warehousing and ETL</a></li>

                  <li><a href="#1">Digital Marketing</a></li>

                  <li><a href="#1">Operating Systems</a></li>

                  <li><a href="#1">Mobile Development</a></li>

                  <li><a href="#1">Architecture &amp; Design Patterns</a></li>

                  <li><a href="#1">Blockchain</a></li>
              -->

                </ul>

              </div>





            </div>





           
           
         






            <div class="tab-content">
                
                 <div id="all" class="tab-pane active">



                <div class="owl-carousel tab_1_slider">


                  @php
                
                  $premCount = count($data['all']);
                

                  $forLoopP = ceil($premCount/4);
               
                  for($i=1; $i <= $forLoopP; ++$i){ @endphp <div class="item">

                    <div class="Four_til"> 
						
					

                      @php

                      $ni = $i*4;

                      $j=1;

                      foreach($data['all'] as $rowCourse){

                      if($j > ($ni-4) && $j <= $ni){ @endphp
                      
			
 @if($rowCourse->type_course == 2)
 	<div class="course_cards_home course_cards_home_pgp_new">

                        <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                          <div class="first_display">

<div class="courseimgmain">
<div class="tag_new_pcp">
High Demand
</div>
<div class="logo_bx_new">
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo" loading="lazy" decoding="async"
  width="1920"
  height="700"
  decoding="async">
</div>
<div class="cr_titless">
                            <h3 class="cr_title hidden-xs">{{ empty($rowCourse->display_name) ? $rowCourse->name : $rowCourse->display_name }} </h3>
							</div>
</div>
 
<div class="coursedetails">
<h3 class="titledesk" title="{{$rowCourse->name}}">{{$rowCourse->name}} </h3>
<ul class="highlights">
    
    @php
    $totalword = 0;
@endphp
<input type="hidden" value="{{$rowCourse->orders_by}}">
  @php
  
  //echo $rowCourse->orders_by;

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                           
                            <input type="hidden" value="{{$rowCourse->orders_by}}" >
                          <li>{{ \Illuminate\Support\Str::limit($rowSys->name, 30, '...') }}</li>

                            
                            @php
        $totalword += str_word_count($rowSys->name);
    @endphp

                            @php } @endphp
</ul>
<span class="viewdetailsbtn"  style="margin-top:20px;" >View More </span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif($rowCourse->type_course == 1)
                    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller" loading="lazy" alt="tgcindia">
                          

                            <div class="cirlce_ic">

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                            </div>
							
							<div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

                          </div>

                          <div class="coursedetails">

                            <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                            <span class="reviewstxt ">Reviews</span>

                            <div class="reviewicons">

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <span class="rating">{{$rowCourse->reviews}}</span>

                              <span class="totalreviews">({{$rowCourse->no_review}})</span>

                            </div>

                          </div>

                        </div>



                        @php
                        //echo $rowCourse->id;
                        // Next Batch....
                        $batchDate="";
                        $day_coming=0;
                      /*  $resultBatch = DB::table('tbl_course_batches')
                        ->WHERE('course_id', $rowCourse->id)
                        ->where('start_date', '>' , date('Y-m-d'))
                        ->orderBy('start_date', 'ASC')
                        ->first();
                        */
                        
                        $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();
    
                        if($resultBatch){
                        $batchDate = $resultBatch->start_date;
                        $currentDate = new DateTime();
                        $specificDate = new DateTime($batchDate);
                        $dateDifference = $currentDate->diff($specificDate);
                        // Output the difference
                        $day_coming = $dateDifference->format('%a');
                        $day_coming = ($day_coming);
                        }
                        @endphp
                        <div class="hover_display">
                          <span class="batchtxt">Next batch</span>
                        @php if($batchDate!=''){ @endphp
                          <span class="nextbatch">
                            <span class="value">In {{$day_coming}} Days </span>
                            <span class="text"> - {{date("d M,Y", strtotime($batchDate))}} </span>
                          </span>
                          @php } @endphp
                          <span class="learnlist">Courses under the program</span>

                          <ul>

                            @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp

                          </ul>

                          <span class="seemorebtn">See More</span>

                        </div>

                      </a>

                    </div>
    
    @else
    
    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               

                            <div class="cirlce_ic">

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                            </div>
							
							<div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

                          </div>

                          <div class="coursedetails">

                            <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                            <span class="reviewstxt ">Reviews</span>

                            <div class="reviewicons">

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <span class="rating">{{$rowCourse->reviews}}</span>

                              <span class="totalreviews">({{$rowCourse->no_review}})</span>

                            </div>

                          </div>

                        </div>



                        @php
                        // Next Batch....
                        $batchDate="";
                        $day_coming=0;
                     /*   $resultBatch = DB::table('tbl_course_batches')
                        ->WHERE('course_id', $rowCourse->id)
                        ->where('start_date', '>' , date('Y-m-d'))
                        ->orderBy('start_date', 'ASC')
                        ->first();
                        */
                        $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();
                        
                        if($resultBatch){
                        $batchDate = $resultBatch->start_date;
                        $currentDate = new DateTime();
                        $specificDate = new DateTime($batchDate);
                        $dateDifference = $currentDate->diff($specificDate);
                        // Output the difference
                        $day_coming = $dateDifference->format('%a');
                        $day_coming = ($day_coming);
                        }
                        @endphp
                        <div class="hover_display">
                          <span class="batchtxt">Next batch</span>
                          <span class="nextbatch">
                            <span class="value">In {{$day_coming}} Days </span>
                            <span class="text"> - {{date("d M,Y", strtotime($batchDate))}}</span>
                          </span>
                          <span class="learnlist">Courses under the program</span>

                          <ul>

                            @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp

                          </ul>

                          <span class="seemorebtn">See More</span>

                        </div>

                      </a>

                    </div>
                    


@endif




                    @php } ++$j; } @endphp




                </div>



              </div>

              @php } @endphp







            </div>



          </div>
                
                

              <div id="home" class="tab-pane ">


<!-- <div class="owl-carousel tab_1_slider" id="getdata">
     
     </div>  --->
         <div class="owl-carousel tab_1_slider">

                  @php

                  $premCount = count($data['trending-premium']);

                  $forLoopP = ceil($premCount/4);

                  for($i=1; $i <= $forLoopP; ++$i){ @endphp <div class="item">



                    <div class="Four_til">

                     

                      @php

                      $ni = $i*4;

                      $j=1;

                      foreach($data['trending-premium'] as $rowCourse){

                      if($j > ($ni-4) && $j <= $ni){ @endphp 
                      


                  @if($rowCourse->type_course == 2)
 	<div class="course_cards_home course_cards_home_pgp_new">

                        <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                          <div class="first_display">

<div class="courseimgmain">
<div class="tag_new_pcp">
High Demand
</div>
<div class="logo_bx_new">
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo" loading="lazy">
</div>
<div class="cr_titless">
<h3 class="cr_title hidden-xs">{{$rowCourse->name}}</h3>
</div>
</div>
 
<div class="coursedetails">
<h3 class="titledesk" title="{{$rowCourse->name}}">{{$rowCourse->name}}</h3>
<ul class="highlights">
  @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp
</ul>
<span class="viewdetailsbtn">View More</span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif($rowCourse->type_course == 1)
        
 <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller" loading="lazy" alt="tgcindia">
                          

                            <div class="cirlce_ic">

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                            </div>


<div class="cr_titless">
<h3 class="cr_title hidden-xs">{{$rowCourse->name}}</h3>
</div>



                          </div>

                          <div class="coursedetails">

                            <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                            <span class="reviewstxt ">Reviews</span>

                            <div class="reviewicons">

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <span class="rating">{{$rowCourse->reviews}}</span>

                              <span class="totalreviews">({{$rowCourse->no_review}})</span>

                            </div>

                          </div>

                        </div>



                        @php
                        // Next Batch....
                        $batchDate="";
                        $day_coming=0;
                        /*
                        $resultBatch = DB::table('tbl_course_batches')
                        ->WHERE('course_id', $rowCourse->id)
                        ->where('start_date', '>' , date('Y-m-d'))
                        ->orderBy('start_date', 'ASC')
                        ->first();
                        */
                        
                         $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();
                        if($resultBatch){
                        $batchDate = $resultBatch->start_date;
                        $currentDate = new DateTime();
                        $specificDate = new DateTime($batchDate);
                        $dateDifference = $currentDate->diff($specificDate);
                        // Output the difference
                        $day_coming = $dateDifference->format('%a');
                        $day_coming = ($day_coming);
                        }
                        @endphp
                        <div class="hover_display">
                          <span class="batchtxt">Next batch</span>
                          <span class="nextbatch">
                            <span class="value">In {{$day_coming}} Days </span>
                            <span class="text"> - {{date("d M,Y", strtotime($batchDate))}}</span>
                          </span>
                          <span class="learnlist">Courses under the program</span>

                          <ul>

                            @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp

                          </ul>

                          <span class="seemorebtn">See More</span>

                        </div>

                      </a>

                    </div>
                    
                    
    @else
    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                            
                          

                            <div class="cirlce_ic">

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                            </div>


<div class="cr_titless">
<h3 class="cr_title hidden-xs">{{$rowCourse->name}}</h3>
</div>



                          </div>

                          <div class="coursedetails">

                            <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                            <span class="reviewstxt ">Reviews</span>

                            <div class="reviewicons">

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <i class="fa fa-star yellow"></i>

                              <span class="rating">{{$rowCourse->reviews}}</span>

                              <span class="totalreviews">({{$rowCourse->no_review}})</span>

                            </div>

                          </div>

                        </div>



                        @php
                        // Next Batch....
                        $batchDate="";
                        $day_coming=0;
                        
                        /*
                        $resultBatch = DB::table('tbl_course_batches')
                        ->WHERE('course_id', $rowCourse->id)
                        ->where('start_date', '>' , date('Y-m-d'))
                        ->orderBy('start_date', 'ASC')
                        ->first();
                        
                        */
                        
                            $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();
                        if($resultBatch){
                        $batchDate = $resultBatch->start_date;
                        $currentDate = new DateTime();
                        $specificDate = new DateTime($batchDate);
                        $dateDifference = $currentDate->diff($specificDate);
                        // Output the difference
                        $day_coming = $dateDifference->format('%a');
                        $day_coming = ($day_coming);
                        }
                        @endphp
                        <div class="hover_display">
                          <span class="batchtxt">Next batch</span>
                          <span class="nextbatch">
                            <span class="value">In {{$day_coming}} Days </span>
                            <span class="text"> - {{date("d M,Y", strtotime($batchDate))}}</span>
                          </span>
                          <span class="learnlist">Courses under the program</span>

                          <ul>

                            @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp

                          </ul>

                          <span class="seemorebtn">See More</span>

                        </div>

                      </a>

                    </div>


@endif




                    @php } ++$j; } @endphp




                </div>



              </div>

              @php } @endphp







            </div> 



          </div>



          <div id="menu1" class="tab-pane fade">



            <div class="owl-carousel tab_2_slider">



              @php

              $premCount = count($data['trending-featured']);

              $forLoopP = ceil($premCount/4);

              for($i=1; $i <= $forLoopP; ++$i){ @endphp <div class="item">



                <div class="Four_til">



                  @php

                  $ni = $i*4;

                  $j=1;

                  foreach($data['trending-featured'] as $rowCourse){

                  if($j > ($ni-4) && $j <= $ni){ @endphp 
                  
                			
 @if($rowCourse->type_course == 2)
 	<div class="course_cards_home course_cards_home_pgp_new">

                        <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                          <div class="first_display">

<div class="courseimgmain">
<div class="tag_new_pcp">
High Demand
</div>
<div class="logo_bx_new">
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo" loading="lazy">
</div>
<div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>
</div>
 
<div class="coursedetails">
<h3 class="titledesk" title="{{$rowCourse->name}}">{{$rowCourse->name}}</h3>
<ul class="highlights">
  @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp
</ul>
<span class="viewdetailsbtn">View More</span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif ($rowCourse->type_course == 1)
                    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller" loading="lazy" alt="tgcindia">
                          

                          <div class="cirlce_ic">

                            <img src="{{ url('public/uploads/'.$rowCourse->image) }}" loading="lazy" alt="tgcindia">

                          </div>

                          <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>

                        </div>

                        <div class="coursedetails">

                          <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                          <span class="reviewstxt ">Reviews</span>

                          <div class="reviewicons">

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <span class="rating">{{$rowCourse->reviews}}</span>

                            <span class="totalreviews">({{$rowCourse->no_review}})</span>

                          </div>

                        </div>

                      </div>



                      @php

                      // Next Batch....

                      $batchDate="";

                      $day_coming=0;

                    //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
                    
                        $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

                      if($resultBatch){

                      $batchDate = $resultBatch->start_date;

                      $currentDate = new DateTime();

                      $specificDate = new DateTime($batchDate);

                      $dateDifference = $currentDate->diff($specificDate);



                      // Output the difference

                      $day_coming = $dateDifference->format('%a');

                      $day_coming = ($day_coming + 1);

                      }

                      @endphp



                      <div class="hover_display">

                        <span class="batchtxt">Next batch</span>

                        <span class="nextbatch">

                          <span class="value">In {{$day_coming}} Days </span>

                          <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                        </span>

                        <span class="learnlist">Courses under the program</span>

                        <ul>

                          @php

                          $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                          foreach($resultSyll as $rowSys){

                          @endphp

                          <li> {{$rowSys->name}} </li>

                          @php } @endphp

                        </ul>

                        <span class="seemorebtn">See More</span>

                      </div>

                    </a>

                </div>

@else
 <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               

                          <div class="cirlce_ic">

                            <img src="{{ url('public/uploads/'.$rowCourse->image) }}" loading="lazy"  alt="tgcindia">

                          </div>

                          <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>

                        </div>

                        <div class="coursedetails">

                          <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                          <span class="reviewstxt ">Reviews</span>

                          <div class="reviewicons">

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <i class="fa fa-star yellow"></i>

                            <span class="rating">{{$rowCourse->reviews}}</span>

                            <span class="totalreviews">({{$rowCourse->no_review}})</span>

                          </div>

                        </div>

                      </div>



                             @php

                             // Next Batch....

                         $batchDate="";

                      $day_coming=0;

                         //   $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
                   $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

                          if($resultBatch){

                         $batchDate = $resultBatch->start_date;

                         $currentDate = new DateTime();

                      $specificDate = new DateTime($batchDate);

                      $dateDifference = $currentDate->diff($specificDate);



                      // Output the difference

                      $day_coming = $dateDifference->format('%a');

                      $day_coming = ($day_coming + 1);

                      }

                      @endphp



                      <div class="hover_display">

                        <span class="batchtxt">Next batch</span>

                        <span class="nextbatch">

                          <span class="value">In {{$day_coming}} Days </span>

                          <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                        </span>

                        <span class="learnlist">Courses under the program</span>

                        <ul>

                          @php

                          $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                          foreach($resultSyll as $rowSys){

                          @endphp

                          <li> {{$rowSys->name}} </li>

                          @php } @endphp

                        </ul>

                        <span class="seemorebtn">See More</span>

                      </div>

                    </a>

                </div>



@endif

                @php } ++$j; } @endphp





            </div>



          </div>

          @php } @endphp









        </div>



      </div>



      <div id="menu2" class="tab-pane fade">

        <div class="owl-carousel tab_3_slider">



          @php

          $premCount = count($data['trending-trending']);

          $forLoopP = ceil($premCount/4);

          for($i=1; $i <= $forLoopP; ++$i){ @endphp <div class="item">



            <div class="Four_til">



              @php

              $ni = $i*4;

              $j=1;

              foreach($data['trending-trending'] as $rowCourse){

              if($j > ($ni-4) && $j <= $ni){ @endphp 
              
              			
 @if($rowCourse->type_course == 2)
 	<div class="course_cards_home course_cards_home_pgp_new">

                        <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                          <div class="first_display">

<div class="courseimgmain">
<div class="tag_new_pcp">
High Demand
</div>
<div class="logo_bx_new">
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo" loading="lazy">
</div>
<div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>
</div>
 
<div class="coursedetails">
<h3 class="titledesk" title="{{$rowCourse->name}}">{{$rowCourse->name}}</h3>
<ul class="highlights">
  @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp
</ul>
<span class="viewdetailsbtn">View More</span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif ($rowCourse->type_course == 1)
                    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller" loading="lazy"  alt="tgcindia">
                          

                      <div class="cirlce_ic">

                        <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                      </div>

                      <div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

                    </div>

                    <div class="coursedetails">

                      <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                      <span class="reviewstxt ">Reviews</span>

                      <div class="reviewicons">

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <span class="rating">{{$rowCourse->reviews}}</span>

                        <span class="totalreviews">({{$rowCourse->no_review}})</span>

                      </div>

                    </div>

                  </div>



                  @php

                  // Next Batch....

                  $batchDate="";

                  $day_coming=0;

                //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
                $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

                  if($resultBatch){

                  $batchDate = $resultBatch->start_date;

                  $currentDate = new DateTime();

                  $specificDate = new DateTime($batchDate);

                  $dateDifference = $currentDate->diff($specificDate);



                  // Output the difference

                  $day_coming = $dateDifference->format('%a');

                  $day_coming = ($day_coming + 1);

                  }

                  @endphp



                  <div class="hover_display">

                    <span class="batchtxt">Next batch</span>

                    <span class="nextbatch">

                      <span class="value">In {{$day_coming}} Days </span>

                      <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                    </span>

                    <span class="learnlist">Courses under the program</span>

                    <ul>

                      @php

                      $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                      foreach($resultSyll as $rowSys){

                      @endphp

                      <li> {{$rowSys->name}} </li>

                      @php } @endphp

                    </ul>

                    <span class="seemorebtn">See More</span>

                  </div>

                </a>

            </div>

@else
<div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               
                          

                      <div class="cirlce_ic">

                        <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                      </div>

                      <div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

                    </div>

                    <div class="coursedetails">

                      <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                      <span class="reviewstxt ">Reviews</span>

                      <div class="reviewicons">

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <i class="fa fa-star yellow"></i>

                        <span class="rating">{{$rowCourse->reviews}}</span>

                        <span class="totalreviews">({{$rowCourse->no_review}})</span>

                      </div>

                    </div>

                  </div>



                  @php

                  // Next Batch....

                  $batchDate="";

                  $day_coming=0;

                 // $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
                 
                 $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

                  if($resultBatch){

                  $batchDate = $resultBatch->start_date;

                  $currentDate = new DateTime();

                  $specificDate = new DateTime($batchDate);

                  $dateDifference = $currentDate->diff($specificDate);



                  // Output the difference

                  $day_coming = $dateDifference->format('%a');

                  $day_coming = ($day_coming + 1);

                  }

                  @endphp



                  <div class="hover_display">

                    <span class="batchtxt">Next batch</span>

                    <span class="nextbatch">

                      <span class="value">In {{$day_coming}} Days </span>

                      <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                    </span>

                    <span class="learnlist">Courses under the program</span>

                    <ul>

                      @php

                      $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                      foreach($resultSyll as $rowSys){

                      @endphp

                      <li> {{$rowSys->name}} </li>

                      @php } @endphp

                    </ul>

                    <span class="seemorebtn">See More</span>

                  </div>

                </a>

            </div>

@endif



            @php } ++$j; } @endphp





        </div>



      </div>

      @php } @endphp









    </div>



</div>



<div id="menu3" class="tab-pane fade">

  <div class="owl-carousel tab_4_slider">



    @php

    $premCount = count($data['trending-comprehensive']);

    $forLoopP = ceil($premCount/4);

    for($i=1; $i <= $forLoopP; ++$i){ @endphp <div class="item">



      <div class="Four_til">



        @php

        $ni = $i*4;

        $j=1;

        foreach($data['trending-comprehensive'] as $rowCourse){

        if($j > ($ni-4) && $j <= $ni){ @endphp 
        
        			
 @if($rowCourse->type_course == 2)
 	<div class="course_cards_home course_cards_home_pgp_new">

                        <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                          <div class="first_display">

<div class="courseimgmain">
<div class="tag_new_pcp">
High Demand
</div>
<div class="logo_bx_new">
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo" loading="lazy">
</div>
<div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>
</div>
 
<div class="coursedetails">
<h3 class="titledesk" title="{{$rowCourse->name}}">{{$rowCourse->name}}</h3>
<ul class="highlights">
  @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp
</ul>
<span class="viewdetailsbtn">View More</span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif ($rowCourse->type_course == 1)
                    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller" loading="lazy"  alt="tgcindia">
                          
                <div class="cirlce_ic">

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                </div>

                <div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

              </div>

              <div class="coursedetails">

                <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                <span class="reviewstxt ">Reviews</span>

                <div class="reviewicons">

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <span class="rating">{{$rowCourse->reviews}}</span>

                  <span class="totalreviews">({{$rowCourse->no_review}})</span>

                </div>

              </div>

            </div>



            @php

            // Next Batch....

            $batchDate="";

            $day_coming=0;

          //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
          
          $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

            if($resultBatch){

            $batchDate = $resultBatch->start_date;

            $currentDate = new DateTime();

            $specificDate = new DateTime($batchDate);

            $dateDifference = $currentDate->diff($specificDate);



            // Output the difference

            $day_coming = $dateDifference->format('%a');

            $day_coming = ($day_coming + 1);

            }

            @endphp



            <div class="hover_display">

              <span class="batchtxt">Next batch</span>

              <span class="nextbatch">

                <span class="value">In {{$day_coming}} Days </span>

                <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

              </span>

              <span class="learnlist">Courses under the program</span>

              <ul>

                @php

                $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                foreach($resultSyll as $rowSys){

                @endphp

                <li> {{$rowSys->name}} </li>

                @php } @endphp

              </ul>

              <span class="seemorebtn">See More</span>

            </div>

          </a>

      </div>

@else
 <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               
                          
                <div class="cirlce_ic">

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                </div>

                <div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

              </div>

              <div class="coursedetails">

                <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                <span class="reviewstxt ">Reviews</span>

                <div class="reviewicons">

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <span class="rating">{{$rowCourse->reviews}}</span>

                  <span class="totalreviews">({{$rowCourse->no_review}})</span>

                </div>

              </div>

            </div>



            @php

            // Next Batch....

            $batchDate="";

            $day_coming=0;

          //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
          $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

            if($resultBatch){

            $batchDate = $resultBatch->start_date;

            $currentDate = new DateTime();

            $specificDate = new DateTime($batchDate);

            $dateDifference = $currentDate->diff($specificDate);



            // Output the difference

            $day_coming = $dateDifference->format('%a');

            $day_coming = ($day_coming + 1);

            }

            @endphp



            <div class="hover_display">

              <span class="batchtxt">Next batch</span>

              <span class="nextbatch">

                <span class="value">In {{$day_coming}} Days </span>

                <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

              </span>

              <span class="learnlist">Courses under the program</span>

              <ul>

                @php

                $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                foreach($resultSyll as $rowSys){

                @endphp

                <li> {{$rowSys->name}} </li>

                @php } @endphp

              </ul>

              <span class="seemorebtn">See More</span>

            </div>

          </a>

      </div>




@endif

      @php } ++$j; } @endphp





  </div>



</div>

@php } @endphp









</div>



</div>



<div id="menu4" class="tab-pane fade">

  <div class="owl-carousel tab_5_slider">



    @php

    $premCount = count($data['trending-short']);

    $forLoopP = ceil($premCount/4);

    for($i=1; $i <= $forLoopP; ++$i){ @endphp <div class="item">



      <div class="Four_til">



        @php

        $ni = $i*4;

        $j=1;

        foreach($data['trending-short'] as $rowCourse){

        if($j > ($ni-4) && $j <= $ni){ @endphp
        
        
        			
 @if($rowCourse->type_course == 2)
 	<div class="course_cards_home course_cards_home_pgp_new">

                        <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                          <div class="first_display">

<div class="courseimgmain">
<div class="tag_new_pcp">
High Demand
</div>
<div class="logo_bx_new">
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo" loading="lazy">
</div>
<div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>
</div>
 
<div class="coursedetails">
<h3 class="titledesk" title="{{$rowCourse->name}}">{{$rowCourse->name}}</h3>
<ul class="highlights">
  @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                            <li> {{$rowSys->name}} </li>

                            @php } @endphp
</ul>
<span class="viewdetailsbtn">View More</span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif($rowCourse->type_course == 1)
                    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller" loading="lazy"  alt="tgcindia">
                          

                <div class="cirlce_ic">

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                </div>

                <div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

              </div>

              <div class="coursedetails">

                <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                <span class="reviewstxt ">Reviews</span>

                <div class="reviewicons">

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <span class="rating">{{$rowCourse->reviews}}</span>

                  <span class="totalreviews">({{$rowCourse->no_review}})</span>

                </div>

              </div>

            </div>



            @php

            // Next Batch....

            $batchDate="";

            $day_coming=0;

       //     $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
       
       $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

            if($resultBatch){

            $batchDate = $resultBatch->start_date;

            $currentDate = new DateTime();

            $specificDate = new DateTime($batchDate);

            $dateDifference = $currentDate->diff($specificDate);



            // Output the difference

            $day_coming = $dateDifference->format('%a');

            $day_coming = ($day_coming + 1);

            }

            @endphp



            <div class="hover_display">

              <span class="batchtxt">Next batch</span>

              <span class="nextbatch">

                <span class="value">In {{$day_coming}} Days </span>

                <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

              </span>

              <span class="learnlist">Courses under the program</span>

              <ul>

                @php

                $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                foreach($resultSyll as $rowSys){

                @endphp

                <li> {{$rowSys->name}} </li>

                @php } @endphp

              </ul>

              <span class="seemorebtn">See More</span>

            </div>

          </a>

      </div>

@else
 <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                          

                <div class="cirlce_ic">

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy">

                </div>

                <div class="cr_titless">
                            <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>
							</div>

              </div>

              <div class="coursedetails">

                <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                <span class="reviewstxt ">Reviews</span>

                <div class="reviewicons">

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <i class="fa fa-star yellow"></i>

                  <span class="rating">{{$rowCourse->reviews}}</span>

                  <span class="totalreviews">({{$rowCourse->no_review}})</span>

                </div>

              </div>

            </div>



            @php

            // Next Batch....

            $batchDate="";

            $day_coming=0;

          //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
          $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

            if($resultBatch){

            $batchDate = $resultBatch->start_date;

            $currentDate = new DateTime();

            $specificDate = new DateTime($batchDate);

            $dateDifference = $currentDate->diff($specificDate);



            // Output the difference

            $day_coming = $dateDifference->format('%a');

            $day_coming = ($day_coming + 1);

            }

            @endphp



            <div class="hover_display">

              <span class="batchtxt">Next batch</span>

              <span class="nextbatch">

                <span class="value">In {{$day_coming}} Days </span>

                <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

              </span>

              <span class="learnlist">Courses under the program</span>

              <ul>

                @php

                $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                foreach($resultSyll as $rowSys){

                @endphp

                <li> {{$rowSys->name}} </li>

                @php } @endphp

              </ul>

              <span class="seemorebtn">See More</span>

            </div>

          </a>

      </div>

@endif



      @php } ++$j; } @endphp





  </div>



</div>

@php } @endphp









</div>



</div>



</div>

</div>

</div>



</div>



<div class="row justify-content-lg-center">

  <div class="explore_all_btn" style="    justify-content: center;
    align-items: center;
    display: flex;">

    <a href="{{url('courses')}}">Explore All Courses</a>

  </div>

</div>





</div>

</section>


 
<section class="support">

  <div class="container">

    <div class="row">

      <div class="col-md-8 col-sm-6 col-12">

        <div class="support-learner">
        <div class="support-learners">

       
          <h4 class="">Contact Our Counselor</h4>

       

        </div>
        </div>

      </div>

      <div class="col-md-4 col-sm-6 col-12">

        <div class="support-number-india"><span>For Voice Call</span>

          <p><i class="fa fa-phone" style="color:#052B36;" aria-hidden="true"></i>
   @php
                  $results = DB::table('tbl_contact')->where('is_deleted', 0)->get();
                  foreach($results as $row){
                  @endphp
                  
                  @php
    }
@endphp

    <a href="tel:{{$row->phone_number}}" target="_blank">{{$row->phone_number}}</a>




          </p>

        </div>

        <div class="support-number-international">

          <span>For Whatsapp Call &amp; Chat</span>

          <p><i class="fa fa-whatsapp" style="color:#25D366;" aria-hidden="true"></i>

            <a href="https://wa.me/+91 {{$row->whatsapp_num}}" target="_blank"> +91 {{$row->whatsapp_num}}</a>

          </p>

        </div>

      </div>

    </div>

  </div>

</section>


<section class="career_course">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Career Related Programs</h2>

        </div>

      </div>

    </div>



    <div class="owl-carousel career_slider">



      @php foreach($data['career_course'] as $key=> $rowCourse){ @endphp

      <div class="item">

        <div class="Four_til">

          <div class="course_cards_home">

            <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

              <div class="first_display">

                <div class="courseimgmain" style="background: {{$gradients[$key]}} !important;">

                  <div class="cirlce_ic">

                    <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy" decoding="async">

                  </div>

                  <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>

                </div>

                <div class="coursedetails">

                  <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                  <span class="reviewstxt ">Reviews</span>

                  <div class="reviewicons">

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <span class="rating">{{$rowCourse->reviews}}</span>

                    <span class="totalreviews">({{$rowCourse->no_review}})</span>

                  </div>

                </div>

              </div>



              @php

              // Next Batch....

                 $batchDate="";

                 $day_coming=0;

             // $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();


$resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();
                  if($resultBatch){

                   $batchDate = $resultBatch->start_date;

                     $currentDate = new DateTime();

                  $specificDate = new DateTime($batchDate);

                 $dateDifference = $currentDate->diff($specificDate);



              // Output the difference

                 $day_coming = $dateDifference->format('%a');

              $day_coming = ($day_coming + 1);

              }

              @endphp



              <div class="hover_display">

                <span class="batchtxt">Next batch</span>

                <span class="nextbatch">

                  <span class="value">In {{$day_coming}} Days </span>

                  <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                </span>

                <span class="learnlist">Courses under the program</span>

                <ul>

                  @php

                  $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                  foreach($resultSyll as $rowSys){

                  @endphp

                  <li> {{$rowSys->name}} </li>

                  @php } @endphp

                </ul>

                <span class="seemorebtn">See More</span>

              </div>

            </a>

          </div>





        </div>

      </div>

      @php } @endphp











    </div>





  </div>

</section> 



<section class="career_course light_blue">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Popular courses</h2>

        </div>

      </div>

    </div>



    <div class="owl-carousel career_slider">

      @php foreach($data['popular_course'] as $key=> $rowCourse){ @endphp

      <div class="item">

        <div class="Four_til">

          <div class="course_cards_home">

            <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

              <div class="first_display">

                <div class="courseimgmain" style="background: {{$gradients[$key]}} !important;">

                  <div class="cirlce_ic">

                    <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy" decoding="async">

                  </div>

                  <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>

                </div>

                <div class="coursedetails">

                  <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                  <span class="reviewstxt ">Reviews</span>

                  <div class="reviewicons">

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <span class="rating">{{$rowCourse->reviews}}</span>

                    <span class="totalreviews">({{$rowCourse->no_review}})</span>

                  </div>

                </div>

              </div>



              @php

              // Next Batch....

              $batchDate="";

              $day_coming=0;

            //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->orderBy('id', 'DESC')->first();
            $resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();

              if($resultBatch){

              $batchDate = $resultBatch->start_date;

              $currentDate = new DateTime();

              $specificDate = new DateTime($batchDate);

              $dateDifference = $currentDate->diff($specificDate);



              // Output the difference

              $day_coming = $dateDifference->format('%a');

              $day_coming = ($day_coming + 1);

              }

              @endphp



              <div class="hover_display">

                <span class="batchtxt">Next batch</span>

                <span class="nextbatch">

                  <span class="value">In {{$day_coming}} Days </span>

                  <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                </span>

                <span class="learnlist">Courses under the program</span>

                <ul>

                  @php

                  $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                  foreach($resultSyll as $rowSys){

                  @endphp

                  <li> {{$rowSys->name}} </li>

                  @php } @endphp

                </ul>

                <span class="seemorebtn">See More</span>

              </div>

            </a>

          </div>





        </div>

      </div>

      @php } @endphp









    </div>





  </div>

</section>




<section class="career_course recent">

  <div class="container">



    <div class="row justify-content-center ">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Recent Additions</h2>

        </div>

      </div>

    </div>



    <div class="owl-carousel career_slider">



      @php foreach($data['recent_course'] as $key=> $rowCourse){ @endphp

      <div class="item">

        <div class="Four_til">

          <div class="course_cards_home">

            <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

              <div class="first_display">

                <div class="courseimgmain edits" style="background: {{$gradients[$key]}} !important">

                  <div class="cirlce_ic">

                    <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy"
    width="512" height="512" >

                  </div>

                  <h3 class="cr_title hidden-xs"> {{$rowCourse->name}}</h3>

                </div>

                <div class="coursedetails">

                  <h3 class="coursetitle" title="{{$rowCourse->short_content}}">{{$rowCourse->short_content}}</h3>

                  <span class="reviewstxt ">Reviews</span>

                  <div class="reviewicons">

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <i class="fa fa-star yellow"></i>

                    <span class="rating">{{$rowCourse->reviews}}</span>

                    <span class="totalreviews">({{$rowCourse->no_review}})</span>

                  </div>

                </div>

              </div>



              @php

              // Next Batch....

              $batchDate="";

              $day_coming=0;

            //  $resultBatch = DB::table('tbl_course_batches')->where('start_date', '>' , date('Y-m-d'))->where()orderBy('id', 'DESC')->first();
$resultBatch = DB::table('tbl_course_batches')
    ->where('start_date', '>', date('Y-m-d'))
    ->whereYear('start_date', date('Y'))  // current year (e.g., 2025)
    ->orderBy('id', 'ASC')
    ->first();


              if($resultBatch){

              $batchDate = $resultBatch->start_date;

              $currentDate = new DateTime();

              $specificDate = new DateTime($batchDate);

              $dateDifference = $currentDate->diff($specificDate);



              // Output the difference

              $day_coming = $dateDifference->format('%a');

              $day_coming = ($day_coming + 1);

              }

              @endphp



              <div class="hover_display">

                <span class="batchtxt">Next batch</span>

                <span class="nextbatch">

                  <span class="value">In {{$day_coming}} Days </span>

                  <span class="text">- {{date("d M,Y", strtotime($batchDate))}}</span>

                </span>

                <span class="learnlist">Courses under the program</span>

                <ul>

                  @php

                  $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                  foreach($resultSyll as $rowSys){

                  @endphp

                  <li> {{$rowSys->name}} </li>

                  @php } @endphp

                </ul>

                <span class="seemorebtn">See More</span>

              </div>

            </a>

          </div>





        </div>

      </div>

      @php } @endphp









    </div>





  </div>

</section> 



 <section class="discover_cate">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Discover Top Categories</h2>

        </div>

      </div>

    </div>



    <div class="discover-top-categories viewmore">

      <ul class="less_element">

        @php foreach($data['cat_list'] as $rowCt){ @endphp
     @if($rowCt->name!='Others')
        <li class="category-item">

          <a href="{{url($rowCt->slug)}}" class="top_category_link">

       

            <img src="{{url('public/uploads/'.$rowCt->image)}}" alt="{{$rowCt->image_alt}}" title="{{$rowCt->image_title}}" description="{{$rowCt->image_description}}" loading="lazy">

            <label>{{$rowCt->name}} </label>

          </a>

        </li>
@endif
        @php } @endphp



      </ul>

    </div>



    <span class="more_button_cat">

      <span class="more_view">View more</span>

      <span class="less_view">View less</span>

      <i class="icon-Arrow-rightward2"></i></span>



  </div>

</section>



<section class="testimonial_c light_blue">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Testimonials</h2>

        </div>

      </div>

    </div>





    <div class="reviews_slider">



      <div class="owl-carousel test_slide">

        @php
        $mimagearray=array('m1.png','m2.png','m3.png','m4.png','m5.png');
        $fimagearray=array('f1.png','f2.png','f3.png','f4.png','f5.png');
        $k=-1;
        foreach($data['testimonial'] as $key => $rowT){ 
        $k++;
        
          if($k==4){

             $k=0;

         }
        @endphp

        <div class="item">

          <div class="customer-review-tile">

            <div class="customer-pers-details">

              <div class="rev_alpha_img ">
 
@if($rowT->image != '')
    <img class="lazyImages" 
         src="{{ url('public/uploads/' . $rowT->image) }}" 
         alt="{{ $rowT->image_alt }}" 
         title="{{ $rowT->image_title }}" 
         description="{{ $rowT->image_description }}" loading="lazy">
@else
    @if($rowT->gender == 'M')
        <img class="lazyImages" 
             src="{{ url('public/uploads/'.$mimagearray[$k]) }}" 
             alt="{{ $rowT->image_alt }}" 
             title="{{ $rowT->image_title }}" 
             description="{{ $rowT->image_description }}" loading="lazy">
    @else
        <img class="lazyImages" 
             src="{{ url('public/uploads/'.$fimagearray[$k]) }}" 
             alt="{{ $rowT->image_alt }}" 
             title="{{ $rowT->image_title }}" 
             description="{{ $rowT->image_description }}" loading="lazy">
    @endif
@endif
              </div>

              <div class="details">

                <h3 class="customer-name">{{$rowT->name}} 

               

                </h3>

                <label class="customer-proffession">{{$rowT->heading}}</label>

              </div>

            </div>

            <div class="customer-rating">

              <div class="customer-course">

                {{$rowT->sub_heading}}

              </div>

              <div class="rating-stars">

                @php for ($i = 1; $i <= $rowT->rating; $i++) { @endphp

                  <i class="fa fa-star yellow" aria-hidden="true"></i>

                  @php } @endphp

              </div>

            </div>

            <div class="customer-review">

              <span class="review-text more">@php echo $rowT->content; @endphp</span>

            </div>

          </div>

        </div>

        @php } @endphp



      </div>









    </div>





  </div>
  </div>
</section>





<!---
<section class="testimonial_c light_blue">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="section-heading mb-700 text-center">
          <h2 class="font-lg">Recent Placement</h2>
        </div>
      </div>
    </div>

    <div class="reviews_slider">
      <div class="owl-carousel career_slider">
        @foreach($data['placement'] as $rowT)
          <div class="item">
            <div class="campus-event-bx">
              <img class="lazyImages" 
                   src="{{ url('public/uploads/' . $rowT->image) }}" 
                   alt="{{ $rowT->name }}" 
                   loading="lazy" style="height: 191px;
    width: 236px;">
              <h5>{{ $rowT->name }}</h5>
              <small>{{ $rowT->course_name }}</small>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
---->

<section class="testimonial_c light_blue">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Course Testimonials Video</h2>

        </div>

      </div>

    </div>





    <div class="reviews_slider">



      <div class="owl-carousel career_slider">

        @php
        
        foreach($data['video'] as $key => $rowT){ 
       
        
         
        @endphp

        <div class="item">

          <a href="{{$rowT->video}}" >
 
  <picture>
        <img width="345" height="194" src="https://www.tgcindia.com/public/uploads/{{$rowT->image}}" class="videoinfo_back_video_img__A5oTt" alt="thumbnail" loading="lazy" decoding="async">
      </picture>          
       
            

          

          </a>

        </div>

        @php } @endphp



      </div>









    </div>





  </div>
  </div>
</section>


<!-- Button to Open the Modal -->


<!-- The Modal -->

<section class="contact-section style-five">
  <div class="container">
    <div class="row ">
      <div class="col-lg-6 left-column">
        <div class="inner-container">
          <div class="wrapper-box">
            <div class="sec-title light">
              <h2>About TGC India</h2>
              <div class="text">
                <p style="color:#fff">TGC is New Delhi (India) based training organisation imparting Classroom/ online training solutions in Multimedia, CAD and IT streams. TGC has trained thousands of students in the last 16 Years, An ISO certified company TGC is also a mainstream partner of Media and Entertainment Skill Council (MESC) under NSDC, Govt. of India for Skill India programme.</p>
              </div>
            </div>

            <ul class="list">
              <li> <i class="fa fa-phone"></i> {{$row->phone_number}}</li>
              <li> <i class="fa fa-map-marker"></i> H-85A, 2nd Floor, South Extension, Part-I, New Delhi-110049 (India)</li>
              <li> <i class="fa fa-envelope"></i> {{$row->email}}</li>
            </ul>

            <ul class="social_media_f">
              <li><a href="https://www.facebook.com/tgcin" target="_blank"><i class="fa fa-facebook"></i></a></li>

              <li><a href="http://www.youtube.com/user/tgcanimation?feature=watch" target="_blank"><i class="fa fa-youtube-play"></i></a></li>

              <li><a href="https://in.linkedin.com/in/tgcdelhi" target="_blank"><i class="fa fa-linkedin"></i></a></li>

              <li><a href="https://twitter.com/tgcindia" target="_blank"><i class="fa fa-twitter"></i></a></li>

            

            </ul>

            <div class="two_btn">
              <a href="{{ url('about-us.html') }}" class="btn"> About Us </a>
              <a href="{{ url('south-delhi-center') }}" class="btn"> South Delhi Centre </a>
              <a href="{{ url('east-delhi-center') }}" class="btn" style="margin-left:10px;"> East Delhi Centre </a>

            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-6 right-column">
        <div class="inner-container">
            <h4 class="cnt">Contact our Counselor</h4>
          <div class="contact-form-box">
              
            <div class="row">




              <form action="{{ url("/indexAbout") }}" method="post" id="enquire-form-ajax" class="contact-form" autocomplete="off">
                 
                @csrf
 <input type="hidden" name="recaptcha_token" class="recaptcha_token">

               <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">
                <input type="hidden" name="form_type" value="home_Aboutenquiry">
                
                <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

                
                <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

                <div class="col-md-6 col-md-6 col-sm-12 col-xs-12 col-12 form-group">
                  <input type="text" name="name_aboutenquiry" placeholder="Enter Name" value="{{ old('name_aboutenquiry') }}" maxlength="35" id="name_aboutenquiry">
                  @error('name_aboutenquiry')
                  <p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xs-12 col-12 form-group">
                  <input type="email" name="email_aboutenquiry" placeholder="Email Address" value="{{ old('email_aboutenquiry') }}" id="email_aboutenquiry">
                  @error('email_aboutenquiry')<p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xs-12 col-12 form-group">
                  <input type="text" name="phone_aboutenquiry" placeholder="Enter Phone" value="{{ old('phone_aboutenquiry') }}" id="phone_aboutenquiry">

                  @error('phone_aboutenquiry')
                  <p style="color: red;">{{ $message }}</p>@enderror
                </div>



                <div class="col-md-6 col-sm-12 col-xs-12 col-12 form-group">
				
                  <div class="dropdown bootstrap-select">
                    <select class="selectpicker form-control" id="mobileSelect" data-mobile="true" name="subject_aboutenquiry" tabindex="-98" id="subject_aboutenquiry" title="Select Subject">
                        
                        
                      <option value="">Select Subject</option>
                      
                     @php
                     $ccdata = DB::table('tbl_course_category')
    ->where('staus', 'Active')
    ->where('is_deleted', '0')
    ->orderBy('orders_by', 'asc')
    ->get();

                     @endphp
                     
                     @foreach($ccdata as $cname)
                      <option value="{{ $cname->name }}">{{ $cname->name }}</option>
                     @endforeach
                    
                      
                      
                    </select>
                  </div>
                  @error('subject_aboutenquiry')<p style="color: red;">{{ $message }}</p>@enderror

                </div>

                <div class="col-md-12 form-group">
                  <textarea name="message_aboutenquiry" placeholder="Message goes here" id="message_aboutenquiry"></textarea>
                  @error('message_aboutenquiry')<p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <div class="col-md-12 form-group m-0">
                  <button class="theme-btn btn-style-one submit-ajax-btn" type="submit" name="submit-form"><span class="btn-title">Send Message</span></button>

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
</section>






<section class="the_tgcindia">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Advantage TGC</h2>

        </div>

      </div>

    </div>



    <div class="row">

      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/courses.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>Comprehensive Course Offerings</strong></label>

            <p>TGC offers a wide range of Classroom and Online courses in Digtial media and IT. This ensures that students have access to a comprehensive set of skills and knowledge in these fields.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/expert-instruction.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>Expert Instruction</strong></label>

            <p>TGC, being recognized as the best institute, likely provides courses taught by experienced and knowledgeable instructors. This can contribute to a high-quality learning experience for students.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/Flexible.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>Flexible Learning Options</strong></label>

            <p>We offer both Offline and Online courses on Weekdays and Weekend modes in Regular and Fast track delivery options which give complete flexibility and ease to learn to its students.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/curriculum.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>Industry-Relevant Curriculum</strong></label>

            <p>TGC's courses are likely designed to align with industry standards and demands, ensuring that students acquire skills that are relevant and valuable in the job market from time to time.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/state_of_the_art_tgc.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>State-of-the-Art Facilities</strong></label>

            <p>Students may benefit from access to state-of-the-art facilities, such as specialized labs and equipment, enhancing the hands-on learning experience. Online students can also access Classroom facilities.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/networking-opportity.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label class="rt"><strong>Practical Training Opportunities</strong></label>

            <p>TGC emphasises practical hands-on training in all its courses . This approach can better prepare students for real-world challenges and applications in their respective industries.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/opportunitie_tgc.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>Placement Assistance</strong></label>

            <p>A reputable institute for the last 2 decades TGC offers placement assistance to its students and helping them connect with the job opportunities industry through its dedicated placement cell</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/netwroking.webp" loading="lazy"  alt="tgcindia">

          </div>

          <div class="edge-description">

            <label><strong>Networking Opportunities</strong></label>

            <p>TGC may provide networking opportunities for students, such as industry events, guest lectures, or collaborations. This can help students build valuable connections within the animation and multimedia community.</p>

          </div>

        </div>

      </div>







    </div>









  </div>







</section>



<section class="Corporatez" id="Corporatez">

  <div class="container">

    <div class="row">



      <div class="col-lg-6 col-md-6  col-md-12">

        <div class="corpz">

          <div class="left-side">



            <div class="placement-video">











              <a href="{{ url('/corporate-training.html') }}" class="button3">View Details</a>





              <div class="videowatch CromaVideoPlay">

                <div class="video-patti">

                  <div class="sadas">

                    <div class="video-btn">

                      <a class="popup-youtube" target="_blank" href="https://www.youtube.com/@tgcanimation">

                        <i class="fa fa-play" aria-hidden="true"></i></a>



                      <div class="ripple orangebg"></div>

                      <div class="ripple orangebg"></div>

                      <div class="ripple orangebg"></div>

                    </div>

                  </div><span>Watch <br><strong>INTRO VIDEO</strong></span>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>





      <div class="col-lg-6 col-md-6 col-md-12">

        <div class="corpz">

          <div class="right-side1">

            <img src="{{ url('assets/front/') }}/img/corporate-logos-tgc.webp" alt="corporate" loading="lazy">

          </div>

        </div>

      </div>







    </div>

  </div>

</section>
<!--<section class="bg-dark" style="display:none;">
			<div class="container">
				<div class="">
				    
				    <h2 style="text-align:center; color:#fff;" class="padding-bottom-5">Recent Events</h2>
				    
					<div class="col-sm-6">
						
					<noscript><img class="blg-1"src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp"></noscript><img class="lazy blg-1 entered loading" src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp" data-ll-status="loading">
					<div class="bg-blog">
					<h3 class="rt">Training LIVE</h3>
					<p class="rt">Orbit Live is a 4-day festival with a power-packed schedule to maximise your learnings and skills through seminars, workshops, master classes, short film appreciation, and Star Lounge.</p><br>
					
</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><noscript><img decoding="async" class="img-rgt" src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp"></noscript><img decoding="async" class="lazy img-rgt entered loaded" src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp" data-src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp" data-ll-status="loaded"></div>
							<div class="col-sm-6">
								<div class="bg-blog-side">
									
					<h3 class=" rt">PERSPECTIVES</h3>
					<p class=" rt">A live platform where media and entertainment industry stalwarts around the world share insights and personal experiences about working.</p><br>
				

					
</div>

							</div>
						</div>



						<div class="row" style="margin-top:15px;">
							<div class="col-sm-6"><noscript><img decoding="async" class="img-rgt" src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp"></noscript><img decoding="async" class="lazy img-rgt entered loaded" src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp" data-src="https://www.tgcindia.com/public/uploads/20250526101620250417_1035_Web%20Design%20Essentials_simple_compose_01js123gaqef2bs1rj229xq6vq.webp" data-ll-status="loaded"></div>
							<div class="col-sm-6">
								<div class="bg-blog-side">
								
					<h3 class="rt">CREATIVE MINDS</h3>
					<p class="rt">It is an event that presents exclusive forum for students of TGC INDIA. Creative Minds provides you the opportunity.</p><br>
				

					
</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
---->
<section class="process_sect">

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Placement Process</h2>

        </div>

      </div>

    </div>



    <div class="placement-process mobile2">

      <img src="{{ url('assets/front/') }}/img/Placement-Process8.webp" alt="placement process" loading="lazy">

    </div>




  <div class="placement-process pp">

      <img src="{{ url('assets/front/') }}/img/Placement-Process-mobile.webp" alt="placement process" loading="lazy">

    </div>

  </div>

</section>



<section class="news-section-two">

  <div class="container">



    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Latest Blogs</h2>

        </div>

      </div>

    </div>



    <div class="owl-carousel blog_slide">



      @php foreach($data['recent_blogs'] as $row){ @endphp

      <div class="item">

        <div class="news-block-two">

          <div class="inner-box">

            <div class="image">

              <a href="{{url('blog-details/'.$row->slug)}}">

                <img class="lazy-image" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}" loading="lazy" decoding="async" width="1536" height="1024"></a>

            </div>

            <div class="lower-content">

            

              <ul class="post-meta">

               
              </ul>

            <a href="{{  url('blog-details/'.$row->slug)}}"><h4>{{$row->name}}</h4></a>

         

            </div>

          </div>

        </div>

      </div>



      @php } @endphp



    </div>



  </div>

</section>


<section class="edge_tgc">

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="section-heading mb-700 text-center">

          <h2 class="font-lg">Edge With TGC India</h2>

        </div>

      </div>

    </div>



    <div class="rows">



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/Industry-Driven-Curriculum.webp" loading="lazy" alt="TGC India">

        </div>

        <div class="edge-description">

          <label><strong>Industry-Driven Curriculum</strong></label>



        </div>

      </div>



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/Experienced-Faculty.webp" loading="lazy" alt="TGC India">

        </div>

        <div class="edge-description">

          <label><strong>Experienced Faculty</strong></label>


        </div>

      </div>



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/Cutting-Edge-Technology-and-Facilities.webp" loading="lazy" alt="TGC India">

        </div>

        <div class="edge-description">

          <label><strong>Cutting-Edge Technology and Facilities</strong></label>

          <p></p>

        </div>

      </div>



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/alumni_15325494-new.webp" loading="lazy" alt="TGC India">

        </div>

        <div class="edge-description">

          <label><strong>Strong Alumni NetworK</strong></label>



        </div>

      </div>



   







    </div>

  </div>

</section>




<section class="client-section-two">

  <div class="container">



    <div class="client_title">

      <h3>Industry Collaboration </h3>

    
    </div>





    <div class="owl-carousel uni_logo">

      @php foreach($data['our_partner'] as $rowPrt){ @endphp

      <div class="item">

        <div class="bg_c">

          <img src="{{url('public/uploads/'.$rowPrt->image)}}" alt="{{$rowPrt->image_alt}}" title="{{$rowPrt->image_title}}" description="{{$rowPrt->image_description}}" loading="lazy">

        </div>

      </div>

      @php } @endphp





    </div>

  </div>

</section>



<section class="self_analyis">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="section-heading mb-700 text-center">
          <h2 class="font-lg">Become Our Franchise </h2>
        </div>
      </div>
    </div>
    <div class="row rtt">
          <div class="col-lg-5 col-md-12">
        <div class="frn_img">
          <img src="{{ url('assets/front/') }}/img/franc-new-tgcnew.webp" loading="lazy" alt="TGC India">
        </div>
      </div>
      <div class="col-lg-7 col-md-12">
        <div class="heading-desc">
          <p><b>TGC Animation & Multimedia</b> is India’s one of the fastest growing training companies in creative design. TGC has passed out more than 10,000 students in the last 10 years. At TGC our commitment is to give you not just another franchisee, but a well running & established business. TGC will provide all the desired support which will include recruitment of trainers, training of staffs, marketing of courses, study materials, infrastructure assistance, software and hardware assistance etc. The extent of support will depend on the requirement of the franchisee. We are leading as graphic design institute in Delhi.
            Read more at Franchise Opportunities in India <a href="https://www.tgcindia.com/franchise-opportunities-in-india"><b>More Details</b></a></p>
        </div>
      </div>
    
    </div>
  </div>
</section>


<section class="client-section-two">

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="section-heading mb-700 text-center">
          <h2 class="font-lg text-white"> News Partners </h2>
        </div>
      </div>
    </div>







    <div class="owl-carousel uni_logo">
      @php
      $sqlPress = DB::table("tbl_press")->WHERE('is_deleted', '0')->get();
      foreach($sqlPress as $rowPss){
      @endphp
      <a href="{{url('press/'.$rowPss->slug)}}">
      <div class="item">
        <div class="bg_c"><img src="{{url('public/uploads/'.$rowPss->image)}}" alt="{{$rowPss->image_alt}}" title="{{$rowPss->image_title}}" description="{{$rowPss->image_description}}" loading="lazy"></div>
      </div>
      </a>
      @php } @endphp

    </div>

  </div>

</section>















</div>



</div>



<!---------------------welcome popup--------------------------->

<div class="popup-box" id="hid">

  <div class="transparent-layer"></div>

  <div class="modal fade in pop_view" id="g" style="display:block">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-body">

          <div class="row">

            <div class="col-md-6">

              <div class="product_img">

                <img src="{{ url('assets/front/') }}/img/student-suppor.webp" class="image-responsive" loading="lazy" alt="TGC India">

              </div>

            </div>





            <div class="col-md-6">

              <div class="modal-form-fill">



                <button type="button" class="close" id="close_delay" data-dismiss="modal" aria-label="Close">



                  <span aria-hidden="true">×

                  </span></button>



                <div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download" loading="lazy">

                  <h4 class="modal-heading">Book a free demo</h4>

                </div>



                @if(session('success1'))
                <div class="alert alert-success">
                  {{ session('success1') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
                @endif

                <form action="{{url('/sendDemo1')}}" method="post" autocomplete="off">
                  @csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">


                  <input type="hidden" name="form_type" value="home_demopopup_enquiry1">
                  
               
                   <input type="hidden" name="home_demo_url" value="{{ $url = request()->url() }}">
<div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

                  <input type="text" name="name_demopopup_home" value="{{ old('name_demopopup_home') }}" placeholder="Enter Name" maxlength="35">
                  @error('name_demopopup_home')<p style="color: red;">{{ $message }}</p>@enderror

                  <input type="text" name="email_demopopup_home" value="{{ old('email_demopopup_home') }}" placeholder="Enter E-mail">
                  @error('email_demopopup_home')<p style="color: red;"> {{ $message }} </p>@enderror

                  <div class="valide-text">
                    <div class="drop-number">
                      <select class="choosecode" name="choosecode">
                        <option value="91">+91(IN)</option>
                        <option value="93">+93(AF)</option>
                        <option value="1">+1(US)</option>
                      </select>

                      <input type="tel" name="phone_demopopup_home" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">
                    </div>
                  </div>
                  @error('phone_demopopup_home')<p style="color: red;">{{ $message }}</p>@enderror


                  <button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
                </form>

                <br>



                <p>By registering here, I agree to TGC India <a href="{{ url('terms-conditions.html') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ url('privacy-policy.html') }}" target="_blank">Privacy Policy</a> </p>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<script>
  window.addEventListener('load', function() {
    // Select the carousel inner container
    const carouselInner = document.querySelector('#myCarousel .carousel-inner');

    if (!carouselInner) return;

    // Collect all slides except the first one
    const slides = carouselInner.querySelectorAll('.item');
    
    // Skip first slide (already active)
    for (let i = 1; i < slides.length; i++) {
      const img = slides[i].querySelector('img');

      // Ensure lazy loading
      img.loading = 'lazy';

      // Optionally, you could also defer adding them:
      // carouselInner.appendChild(slides[i]);
      // For Blade-generated HTML they are already in DOM, so lazy-loading is enough
    }

    // If you want, you can trigger the carousel JS here:
    $('#myCarousel').carousel({
      interval: 5000,  // example: autoplay every 5s
      pause: 'hover'
    });

  });
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    $('#myCarousel').carousel({
        interval: 5000
    });
});


function getvideilink(url,id){
    console.log(id);
    //$("#ShowVideo"+id).html('video class="testimonial-video" width="1080" height="520" controls><source src="https://www.tgcindia.com/public/uploads/'+url+' " type="video/mp4"></video>');
    
    // console.log(srno);
          $.ajax({
        url: '{{ url("showvideo") }}', // Use route name for better practice
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token
            id: id,
            url: url
        },
        success: function(response) {
            $("#ShowVideo"+id).html(response);
           // console.log('Success:', response);
        //    window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
    
    
}

$(document).ready(function() {
  const owl = $('.test_slide').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 10
  });

  // Stop autoplay when video starts playing
  $(document).on('play', 'video.testimonial-video', function () {
    console.log('Video is playing');
    owl.trigger('stop.owl.autoplay');
    
    // Disable autoplay permanently
    owl.data('owl.carousel').settings.autoplay = false;
    owl.trigger('refresh.owl.carousel');
  });

  // Optional: Resume autoplay when all videos are paused
  $(document).on('pause', 'video.testimonial-video', function () {
    console.log('Video paused');

    let allPaused = true;
    $('video.testimonial-video').each(function() {
      if (!this.paused) {
        allPaused = false;
      }
    });

    if (allPaused) {
      console.log('All videos paused, resume autoplay');
      owl.data('owl.carousel').settings.autoplay = true;
      owl.trigger('refresh.owl.carousel');
      owl.trigger('play.owl.autoplay', [5000]);
    }
  });
});
</script>





@endsection
<style>
.homepage-seo-heading { position: absolute !important; width: 1px !important; height: 1px !important; padding: 0 !important; margin: -1px !important; overflow: hidden !important; clip: rect(0, 0, 0, 0) !important; white-space: nowrap !important; border: 0 !important; }
</style>
<style>
/* Fix for Course Testimonials Video Cards */
.testimonial_c .career_slider .item {
    padding: 10px 8px !important;
}
.testimonial_c .career_slider .item a {
    display: block !important;
    width: 100% !important;
    border-radius: 12px !important;
    overflow: hidden !important;
    box-shadow: 0 5px 15px rgba(0,0,0,0.12) !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease !important;
}
.testimonial_c .career_slider .item a:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2) !important;
}
.testimonial_c .career_slider .item picture,
.testimonial_c .career_slider .item img,
img.videoinfo_back_video_img__A5oTt {
    width: 100% !important;
    height: auto !important;
    aspect-ratio: 9 / 16 !important;
    object-fit: cover !important;
    display: block !important;
    border-radius: 12px !important;
}
/* Fix unwanted red band in mobile footer */
@media screen and (max-width: 768px) {
    .foo-bot-heading h3::before,
    .foo-bot-heading h3::after,
    .follow-social::before,
    .follow-social::after,
    .footer-social::before,
    .footer-social::after,
    .footer_social_newsletter::before,
    .footer_social_newsletter::after,
    .cdft {
        display: none !important;
        background: none !important;
        border: none !important;
    }
    .follow-social,
    .footer-social,
    .footer_social_newsletter {
        background: #4c4c4c !important;
    }
}
</style>