@extends('frontend.layouts.app')

@section('content')



<div class="main-content">







  <section class="new_bread_crum">

    <div class="container">

      <ul>

        <li><a href="{{url('/')}}">Home</a></li>

        <li>All Courses</li>

      </ul>

    </div>

  </section>



  <section class="top_section_title">

    <div class="container">

      <div class="page_top_title">Choose a category to find your course</div>

      <div class="page_top_sub_title">{{$data['courseCount']}}+ Live online courses chosen by 50000+ working professionals </div>

    </div>

  </section>





  <div class="category_slide">

    <div class="container">

      <ul class="slide_cat_list">

        @php foreach($category as $row){ @endphp

        <li class="" data-category="{{$row->name}}"><a href="{{url($row->slug)}}">{{$row->name}}</a></li>

        @php } @endphp

      </ul>

    </div>

  </div>





  <div class="tag_tns">

    <div class="container">







      <div class="course_card_tab">

        <ul class="nav nav-tabs cour_se_fg" role="tablist">

          <li class="nav-item">

            <a href="{{url('courses.html')}}" class="nav-link">All courses</a>

          </li>

          <li class="nav-item">

            <a href="{{url('certification-courses.html')}}" class="nav-link active">Certification Courses</a>

          </li>

          <li class="nav-item">

            <a href="{{url('role-based-course-combos.html')}}" class="nav-link">Role Based Course Combos</a>

          </li>

          <li class="nav-item">

            <a href="{{url('top-university-courses.html')}}" class="nav-link">Top University Courses</a>

          </li>



        </ul>







        <!-- Tab panes -->

        <div class="tab-content">

          <div id="home" class="tab-pane active">



            <div class="live_course_list">

              <div class="course_info_check">

                Cloud Computing Courses with

                <ul>

                  <li>Live Class</li>

                 

                  <li>Life-time Access</li>

                </ul>

              </div>

              <div class="row">



                @php foreach($data['course'] as $row){ @endphp

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 course_card_bx">

                  <div class="course_card_info ">

                    <a class="" href="{{url('course/'.$row->slug)}}">

                      <h2 class="title">{{$row->name}}</h2>

                      <div class="topic_more">{{$row->short_content}}</div>

                      <ul class="you_will_get ">

                        <li><i class="icon-ac-cert-1"></i>{{$row->heading1}}</li>

                         @php
                         if($row->online_offline!=''){
                         @endphp
                        <li><i class="icon-ac-time"></i> {{$row->online_offline}}</li>
                          @php } if($row->heading2!=''){ @endphp
                        <li><i class="icon-ac-calender"></i>{{$row->heading2}}</li>
                        @php } @endphp
                      </ul>

                      <div class="date_starting">

                      @php
                          // Next Batch....
                          $batchDate="";
                          $day_coming=0;
                          $resultBatch = DB::table('tbl_course_batches')
                                        ->WHERE('course_id', $row->id)
                                        ->where('start_date', '>' , date('Y-m-d'))
                                        ->orderBy('start_date', 'ASC')
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
                          if($batchDate!=''){
                          @endphp
                        <span>Classes starting on  {{date("d M,Y", strtotime($batchDate))}} ({{$day_coming}} Days) </span>
@php 
}
@endphp 
                      </div>

                      <button>View Course Details</button>

                    </a>

                  </div>

                </div>

                @php } @endphp





                

              </div>

            </div>



            



            <div class="Pagination">

              {{ $data['course']->links() }}

            </div>



          </div>



        </div>

      </div>

    </div>

  </div>



</div>



@endsection