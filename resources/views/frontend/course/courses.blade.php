@extends('frontend.layouts.app')

@section('content')



<div class="main-content">







  <div class="new_bread_crum">

    <div class="container">

      <ul>

        <li><a href="{{url('/')}}">Home</a></li>

        <li>All Courses</li>

      </ul>

    </div>

  </div>



  <div class="top_section_title">

    <div class="container">

      <div class="page_top_title">Choose a category to find your course</div>

      <div class="page_top_sub_title">{{$data['courseCount']}}+ Live online courses chosen by 50000+ working professionals </div>

    </div>

  </div>





  <div class="category_slide">

    <div class="container">

      <ul class="slide_cat_list">
	  
	  <li class="active" data-category="all"><a href="#">All Courses</a></li>

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

            <a href="{{url('courses.html')}}" class="nav-link active">All courses</a>

          </li>

          <li class="nav-item">

            <a href="{{url('certification-courses.html')}}" class="nav-link">Certification Courses</a>

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

              Courses with

                <ul>

                  <li>Live Class</li>

           

                  <li>Life-time Access</li>

                </ul>

              </div>

              <div class="row">



                @php foreach($data['course'] as $row){ @endphp

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 course_card_bx">

                  <div class="course_card_info ">

                    <a class="" href="{{url('course/'.$row->slug)}}">

                      <h2 class="title">{{$row->name}}</h2>

                      <div class="topic_more">{{$row->short_content}}</div>

                      <ul class="you_will_get ">

                        <li><svg xmlns="http://www.w3.org/2000/svg" style="color:color: #e16363;" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
  <path d="M4 3h16v14H4z" fill="none" stroke="currentColor" stroke-width="2"/>
  <circle cx="12" cy="10" r="3"/>
  <path d="M10 14l-2 7 4-2 4 2-2-7"/>
</svg>{{$row->heading1}}</li>

                        <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
  <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" fill="none"/>
</svg>{{$row->online_offline}}</li>

                        <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
  <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none"/>
  <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
  <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2"/>
  <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2"/>
</svg>{{$row->heading2}}</li>

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
                          @endphp
                        <span>Classes starting on  {{date("d M,Y", strtotime($batchDate))}} ({{$day_coming}} Days) </span>

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