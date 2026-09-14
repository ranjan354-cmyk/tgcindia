@extends('frontend.layouts.app')

@section('content')






<style>
@media screen and (min-width: 900px) {

    .lathide{
        display:none;
    }
}

.step_four .box .content {
   
    margin-top: 45px !important;
}

@media (max-width: 992px) {
    .left-side .placement-video a.button3 {
        padding: 7px 6px;
    }
}

</style>
<div class="main-content">

<div id="myCarousel" class="carousel slide" data-ride="carousel">


  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  @php

        $iS1 = 0;

        foreach($data['slider'] as $rowSl){

        @endphp
    <div class="item @php if($iS1 == 0){ echo 'active'; } @endphp">
      <img src="{{ url('public/uploads/'.$rowSl->image) }}" alt="">
    </div>
	   @php ++$iS1; } @endphp


  </div>
  <!-- Left and right controls -->
  <a class="arow_mid left" href="#myCarousel" data-slide="prev">
     <img src="{{ url('assets/front/') }}/img/left-arrow.png">
  </a>
  <a class="arow_mid right" href="#myCarousel" data-slide="next">
     <img src="{{ url('assets/front/') }}/img/right-arrow.png">
  </a>
   
  
</div>



  


  <section class="step_four">

    <div class="container">

      <div class="row">



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/1.png">

              </div>

            </div>

            <div class="content">

              <h3>ClassRoom Training</h3>

              <p>100+ Courses</p>

              <a class="desc" href="{{ url('courses.html') }}">Know More </a>
              <a href="#" class="mobile modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Know More</span></a>

            </div>

          </div>

        </div>



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/2.png">

              </div>

            </div>

            <div class="content">

              <h3>Online Training</h3>

              <p>Join Live Training</p>

              <a href="#" class="desc" id="mySizeChart">Join here </a>
              <a href="#" class="mobile modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Know More</span></a>

            </div>

          </div>

        </div>



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/3.png">

              </div>

            </div>

            <div class="content">

              <h3>Book a Demo / Webinar</h3>

              <p>Iineract With Our Trainers</p>


              <a href="#" class="modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Book Now</span></a>


            </div>

          </div>

        </div>



        <div class="col-md-3">

          <div class="box">

            <div class="circle_s">

              <div class="circle">

                <img src="{{ url('assets/front/') }}/img/icon/4.png">

              </div>

            </div>

            <div class="content">

              <h3>Enroll Now</h3>

              <p>New Batches Are Commencing</p>

              <a class="desc" href="enroll-now.html"><span>Enroll Now</span></a>
              <a href="#" class="mobile modalopen" data-toggle="modal" data-target="#offer_webinar"><span>Enroll Now</span></a>

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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo">
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

  @php

                            $resultSyll = DB::table('tbl_course_syllabus')->where('parent', 0)->WHERE('course_id', $rowCourse->id)->orderBy('orders_by_hm', 'ASC')->limit(3)->get();

                            foreach($resultSyll as $rowSys){

                            @endphp

                           
                            <input type="hidden" value="{{$rowCourse->orders_by}}" >
                            <li> {{ $rowSys->name }}  </li>
                            
                            @php
        $totalword += str_word_count($rowSys->name);
    @endphp

                            @php } @endphp
</ul>
<span class="viewdetailsbtn"  style="    @if($totalword<14) margin-top: 45px; @endif" >View More </span>
</div>

                          </div>                                                  

                        </a>

                    </div>
 
 @elseif($rowCourse->type_course == 1)
                    <div class="course_cards_home">

                      <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

                        <div class="first_display">

                          <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller">
                          

                            <div class="cirlce_ic">

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo">
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
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller">
                          

                            <div class="cirlce_ic">

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo">
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
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller">
                          

                          <div class="cirlce_ic">

                            <img src="{{ url('public/uploads/'.$rowCourse->image) }}">

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

                            <img src="{{ url('public/uploads/'.$rowCourse->image) }}">

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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo">
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
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller">
                          

                      <div class="cirlce_ic">

                        <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

                        <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo">
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
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller">
                          
                <div class="cirlce_ic">

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="logo">
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
                              
                          
                               <img src="assets/front/img/best-seller-min.svg" class="best_seller">
                          

                <div class="cirlce_ic">

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

                  <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

  <div class="explore_all_btn">

    <a href="{{url('courses.html')}}">Explore All Courses</a>

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



      @php foreach($data['career_course'] as $rowCourse){ @endphp

      <div class="item">

        <div class="Four_til">

          <div class="course_cards_home">

            <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

              <div class="first_display">

                <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">

                  <div class="cirlce_ic">

                    <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

      @php foreach($data['popular_course'] as $rowCourse){ @endphp

      <div class="item">

        <div class="Four_til">

          <div class="course_cards_home">

            <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

              <div class="first_display">

                <div class="courseimgmain" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">

                  <div class="cirlce_ic">

                    <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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



      @php foreach($data['recent_course'] as $rowCourse){ @endphp

      <div class="item">

        <div class="Four_til">

          <div class="course_cards_home">

            <a class="homecardmain" href="{{url('course/'.$rowCourse->slug)}}">

              <div class="first_display">

                <div class="courseimgmain edits" style="background: linear-gradient(242deg, #f49cae, #b05ce2);">

                  <div class="cirlce_ic">

                    <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}">

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

       

            <img src="{{url('public/uploads/'.$rowCt->image)}}" alt="{{$rowCt->image_alt}}" title="{{$rowCt->image_title}}" description="{{$rowCt->image_description}}">

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
         description="{{ $rowT->image_description }}">
@else
    @if($rowT->gender == 'M')
        <img class="lazyImages" 
             src="{{ url('public/uploads/'.$mimagearray[$k]) }}" 
             alt="{{ $rowT->image_alt }}" 
             title="{{ $rowT->image_title }}" 
             description="{{ $rowT->image_description }}">
    @else
        <img class="lazyImages" 
             src="{{ url('public/uploads/'.$fimagearray[$k]) }}" 
             alt="{{ $rowT->image_alt }}" 
             title="{{ $rowT->image_title }}" 
             description="{{ $rowT->image_description }}">
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
              <a href="{{ url('contact-us.html') }}" class="btn"> Contact Us </a>

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
                    <select class="selectpicker form-control" id="mobileSelect" data-mobile="true" name="subject_aboutenquiry" tabindex="-98" id="subject_aboutenquiry" >
                        
                        
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

      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/Course.png">

          </div>

          <div class="edge-description">

            <label><strong>Comprehensive Course Offerings</strong></label>

            <p>TGC offers a wide range of Classroom and Online courses in Digtial media and IT. This ensures that students have access to a comprehensive set of skills and knowledge in these fields.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/expert.png">

          </div>

          <div class="edge-description">

            <label><strong>Expert Instruction</strong></label>

            <p>TGC, being recognized as the best institute, likely provides courses taught by experienced and knowledgeable instructors. This can contribute to a high-quality learning experience for students.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/flexible.png">

          </div>

          <div class="edge-description">

            <label><strong>Flexible Learning Options</strong></label>

            <p>We offer both Offline and Online courses on Weekdays and Weekend modes in Regular and Fast track delivery options which give complete flexibility and ease to learn to its students.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/industry.png">

          </div>

          <div class="edge-description">

            <label><strong>Industry-Relevant Curriculum</strong></label>

            <p>TGC's courses are likely designed to align with industry standards and demands, ensuring that students acquire skills that are relevant and valuable in the job market from time to time.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/state.png">

          </div>

          <div class="edge-description">

            <label><strong>State-of-the-Art Facilities</strong></label>

            <p>Students may benefit from access to state-of-the-art facilities, such as specialized labs and equipment, enhancing the hands-on learning experience. Online students can also access Classroom facilities.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/practical.png">

          </div>

          <div class="edge-description">

            <label><strong>Practical Training Opportunities</strong></label>

            <p>TGC emphasises practical hands-on training in all its courses . This approach can better prepare students for real-world challenges and applications in their respective industries.</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/placement.png">

          </div>

          <div class="edge-description">

            <label><strong>Placement Assistance</strong></label>

            <p>A reputable institute for the last 2 decades TGC offers placement assistance to its students and helping them connect with the job opportunities industry through its dedicated placement cell</p>

          </div>

        </div>

      </div>



      <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mar_ng">

        <div class="edge-item">

          <div class="edge-img">

            <img src="{{ url('assets/front/') }}/img/icon/nertworking.png">

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

            <img src="{{ url('assets/front/') }}/img/corporate-logos-tgc.webp" alt="corporate">

          </div>

        </div>

      </div>







    </div>

  </div>

</section>


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

      <img src="{{ url('assets/front/') }}/img/Placement-Process8-new-tg.webp" alt="placement process">

    </div>




  <div class="placement-process pp">

      <img src="{{ url('assets/front/') }}/img/Placement-Process-mobile.jpg" alt="placement process">

    </div>

  </div>

</section>


<!---
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

                <img class="lazy-image" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}"></a>

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

----->

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

          <img src="{{ url('assets/front/') }}/img/icon/industry.png">

        </div>

        <div class="edge-description">

          <label><strong>Industry-Driven Curriculum</strong></label>



        </div>

      </div>



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/expert.png">

        </div>

        <div class="edge-description">

          <label><strong>Experienced Faculty</strong></label>


        </div>

      </div>



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/technology.png">

        </div>

        <div class="edge-description">

          <label><strong>Cutting-Edge Technology and Facilities</strong></label>

          <p></p>

        </div>

      </div>



      <div class="edge-item">

        <div class="edge-img">

          <img src="{{ url('assets/front/') }}/img/icon/nertworking.png">

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

      <p>Which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish</p>

    </div>





    <div class="owl-carousel uni_logo">

      @php foreach($data['our_partner'] as $rowPrt){ @endphp

      <div class="item">

        <div class="bg_c">

          <img src="{{url('public/uploads/'.$rowPrt->image)}}" alt="{{$rowPrt->image_alt}}" title="{{$rowPrt->image_title}}" description="{{$rowPrt->image_description}}">

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
          <img src="{{ url('assets/front/') }}/img/franc-new.jpg">
        </div>
      </div>
      <div class="col-lg-7 col-md-12">
        <div class="heading-desc">
          <p><b>TGC Animation & Multimedia</b> is India’s one of the fastest growing training companies in creative design. TGC has passed out more than 10,000 students in the last 10 years. At TGC our commitment is to give you not just another franchisee, but a well running & established business. TGC will provide all the desired support which will include recruitment of trainers, training of staffs, marketing of courses, study materials, infrastructure assistance, software and hardware assistance etc. The extent of support will depend on the requirement of the franchisee. We are leading as graphic design institute in Delhi.
            Read more at Franchise Opportunities in India</p>
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
      <div class="item">
        <div class="bg_c"><img src="{{url('public/uploads/'.$rowPss->image)}}" alt="{{$rowPss->image_alt}}" title="{{$rowPss->image_title}}" description="{{$rowPss->image_description}}"></div>
      </div>
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

                <img src="{{ url('assets/front/') }}/img/student-support.png" class="image-responsive">

              </div>

            </div>





            <div class="col-md-6">

              <div class="modal-form-fill">



                <button type="button" class="close" id="close_delay" data-dismiss="modal" aria-label="Close">



                  <span aria-hidden="true">×

                  </span></button>



                <div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

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



                <p>By registering here, I agree to TGC India <a href="#" target="_blank">Terms &amp; Conditions</a> and <a href="#" target="_blank">Privacy Policy</a> </p>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>


@endsection