@extends('frontend.layouts.app')

@section('content')


<style>
    
    .blog-tile article.blog-info {
    padding: 10px;
    height: 85px !important;
}
</style>


<div class="main-content">



  <section class="new_bread_crum">

    <div class="container">

      <ul>

        <li><a href="{{url('/')}}">Home</a></li>

        <li><a href="{{url('blogs.html')}}">Blogs</a></li>

        <li>{{$blogCategory->name}}</li>

      </ul>

    </div>

  </section>
  
  
  
<!--  <section class="selected-categories-section">-->
<!--  <div class="container">-->
    <!--<h1 class="title">-->
    <!--  <a href="https://www.edureka.co/blog/">-->
    <!--    <i class="icon-blog-left-arrow d-md-none d-lg-none"></i>-->
    <!--  </a> What do you want to learn in Artificial Intelligence ?-->
    <!--</h1>-->
<!--    <div class="">-->
<!--      <div class="row mt-4">-->
<!--        <div class="col-xl-3 col-lg-3">-->
<!--          <div class="courses-under-categories">-->
<!--            <div class="course-name">-->
<!--              <a href="#" class="ga-course-category" data-category="Artificial Intelligence">-->
<!--                <h3>Machine Learning with Mahout</h3>-->
<!--              </a>-->
<!--            </div>-->
<!--            <div class="course-content d-none d-xl-block d-lg-block">-->
<!--              <span class="d-block mb-2 title">Module Contains</span>-->
<!--              <ul class="no-padding mb-0">-->
<!--                <li>What are Maps in C++ and how t ...</li>-->
<!--              </ul>-->
<!--              <a href="#" class="ga-course-category" data-category="Artificial Intelligence">READ MORE <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4.5 11h11.586l-4.5-4.5L13 5.086L19.914 12L13 18.914L11.586 17.5l4.5-4.5H4.5z"/></svg>-->
<!--              </a>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-xl-3 col-lg-3">-->
<!--          <div class="courses-under-categories">-->
<!--            <div class="course-name">-->
<!--              <a href="#" class="ga-course-category" data-category="Artificial Intelligence">-->
<!--                <h3>Artificial Intelligence and Machine Learning</h3>-->
<!--              </a>-->
<!--            </div>-->
<!--            <div class="course-content d-none d-xl-block d-lg-block">-->
<!--              <span class="d-block mb-2 title">Module Contains</span>-->
<!--              <ul class="no-padding mb-0">-->
<!--                <li>Predicting the Outbreak of COV ...</li>-->
<!--                <li>What Is EM Algorithm In Machin ...</li>-->
<!--                <li>What is Cross-Validation in Ma ...</li>-->
<!--              </ul>-->
<!--              <span class="articles-count d-block mb-3">and 13 more articles...</span>-->
<!--              <a href="#" class="ga-course-category" data-category="Artificial Intelligence">READ MORE <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4.5 11h11.586l-4.5-4.5L13 5.086L19.914 12L13 18.914L11.586 17.5l4.5-4.5H4.5z"/></svg>-->
<!--              </a>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

  <section class="recently-added-blogs">

    <div class="container no-padding">

      <div class="row blog-custom-carousel">



        @php foreach($blogs as $row){ @endphp

        <div class="col-xl-3 col-lg-3 col-md-4 col-12">

          <div class="blog-tile">

            <div class="blog-featured-image">

              <a href="{{url('blog-details/'.$row->slug)}}">

                <img class="img-fluid lazyloaded" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}"> </a>

            </div>

            <article class="blog-info">

              <h2><a href="{{url('blog-details/'.$row->slug)}}">{{$row->name}}</a></h2>

              






            </article>

          </div>

        </div>

        @php } @endphp   
      </div>



      {{ $blogs->links() }}



    </div>

  </section>




 <section class="recently-added-blogs" style="background:#fff">
    <div class="container no-padding">
      <h3 class="primary-section-title">Popular Articles</h3>
      <div class="row blog-custom-carousel popUlar_article owl-carousel">

        <div class="items">
          @php 
            $ij1 =0; 
            foreach($data['popular_blogs'] as $row){ 
            if($ij1 >= 0 && $ij1 <= 15){
          @endphp
          <div class="col-xl-3 col-lg-3 col-md-4 col-12">
            <div class="blog-tile">
              <div class="blog-featured-image">
                <a href="{{url('blog-details/'.$row->slug)}}">
                  <img class="img-fluid lazyloaded" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}"> </a>
              </div>
              <article class="blog-info">
                <h2><a href="{{url('blog-details/'.$row->slug)}}">{{$row->name}}</a></h2>
                <a href="{{url('blog-details/'.$row->slug)}}" class="author">
                  <span class="mr-1">By </span>{{$row->added_by}}</a>
                <div class="diS_flex">
                  <span class="blog-date">
                    <p class="blog-date-text"> Last updated on</p> {{date('M d,Y', strtotime($row->add_date))}}
                  </span>
                  <div class="view-and-comments-recent">
                    <span class="views"><i class="icon-Blog-View-icon"></i>62.4K</span> <a href="{{url('blog-details/'.$row->slug)}}"><span class="comments"><i class="icon-Blog-Comment-icon"></i>0</span></a>
                  </div>
                </div>
              </article>
            </div>
          </div>
          @php } ++$ij1; } @endphp
        </div>

        <div class="items">
          @php 
            $ij2 =0; 
            foreach($data['popular_blogs'] as $row){ 
            if($ij2 >= 16 && $ij2 <= 31){
          @endphp
          <div class="col-xl-3 col-lg-3 col-md-4 col-12">
            <div class="blog-tile">
              <div class="blog-featured-image">
                <a href="{{url('blog-details/'.$row->slug)}}">
                  <img class="img-fluid lazyloaded" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}"> </a>
              </div>
              <article class="blog-info">
                <h2><a href="{{url('blog-details/'.$row->slug)}}">{{$row->name}}</a></h2>
                <a href="{{url('blog-details/'.$row->slug)}}" class="author">
                  <span class="mr-1">By </span>{{$row->added_by}}</a>
                <div class="diS_flex">
                  <span class="blog-date">
                    <p class="blog-date-text"> Last updated on</p> {{date('M d,Y', strtotime($row->add_date))}}
                  </span>
                  <div class="view-and-comments-recent">
                    <span class="views"><i class="icon-Blog-View-icon"></i>62.4K</span> <a href="{{url('blog-details/'.$row->slug)}}"><span class="comments"><i class="icon-Blog-Comment-icon"></i>0</span></a>
                  </div>
                </div>
              </article>
            </div>
          </div>
          @php } ++$ij2; } @endphp
        </div>

        <div class="items">
        @php 
            $ij3 =0; 
            foreach($data['popular_blogs'] as $row){ 
            if($ij3 >= 32 && $ij3 <= 47){
          @endphp
          <div class="col-xl-3 col-lg-3 col-md-4 col-12">
            <div class="blog-tile">
              <div class="blog-featured-image">
                <a href="{{url('blog-details/'.$row->slug)}}">
                  <img class="img-fluid lazyloaded" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}"> </a>
              </div>
              <article class="blog-info">
                <h2><a href="{{url('blog-details/'.$row->slug)}}">{{$row->name}}</a></h2>
                <a href="{{url('blog-details/'.$row->slug)}}" class="author">
                  <span class="mr-1">By </span>{{$row->added_by}}</a>
                <div class="diS_flex">
                  <span class="blog-date">
                    <p class="blog-date-text"> Last updated on</p> {{date('M d,Y', strtotime($row->add_date))}}
                  </span>
                  <div class="view-and-comments-recent">
                    <span class="views"><i class="icon-Blog-View-icon"></i>62.4K</span> <a href="{{url('blog-details/'.$row->slug)}}"><span class="comments"><i class="icon-Blog-Comment-icon"></i>0</span></a>
                  </div>
                </div>
              </article>
            </div>
          </div>
          @php } ++$ij3; } @endphp
        </div>

       

        

      </div>
      {{ $data['popular_blogs']->links() }}
    </div>
  </section> 





  <section class="trending-courses">

    <div class="container">

      <h3 class="primary-section-title">Trending Courses</h3>



      <div class="row trending_cour owl-carousel">





      @php foreach($data['trending_course'] as $row){ @endphp

        <div class="item">

            <div class="col-md-12">

                <div class="course-tile">

                    <a href="{{url('course/'.$row->slug)}}">

                        <div class="course-featured-image">

                            <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">

                        </div>

                        <article class="course-info">

                            <h2 class="color-4a m-0">{{$row->name}}</h2>

                            <ul class="highlights no-padding mb-0">

                                <li><i class="icon-total-learners"></i><span class="color-4a">{{$row->no_review}} Enrolled Learners</span> </li>

                                <li><i class="icon-calender"></i><span class="color-4a">Weekend/Weekday</span> </li>

                                <li><i class="icon-live-instructor"></i><span class="color-4a">Live Class</span> </li>

                            </ul>

                            <span class="reviewtext font-italic">Reviews</span>

                            <div class="reviewstars">

                                <i class="fa fa-star yellow"></i>

                                <i class="fa fa-star yellow"></i>

                                <i class="fa fa-star yellow"></i>

                                <i class="fa fa-star yellow"></i>

                                <i class="fa fa-star yellow"></i>

                                <span class="color-4a rating">{{$row->reviews}}</span>

                                <span class="totalreviews color-4a">({{$row->no_review}})</span>

                            </div>

                        </article>

                    </a>

                </div>

            </div>

        </div>

      @php } @endphp





        

      </div>

    </div>

  </section>



</div>



@endsection