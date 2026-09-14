
   <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'"><noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"></noscript>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


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
<img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" loading="lazy" decoding="async">
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

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy" decoding="async">

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

                              <img src="{{ url('public/uploads/'.$rowCourse->image) }}" alt="{{$rowCourse->image_alt}}" title="{{$rowCourse->image_title}}" description="{{$rowCourse->image_description}}" loading="lazy" decoding="async">

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







         