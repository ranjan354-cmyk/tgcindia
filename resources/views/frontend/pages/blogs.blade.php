@extends('frontend.layouts.app')

@section('content')



<style>
    .blog-tile article.blog-info {
  
    height: 85px !important;
}


/*
.news-block-two .image img {
    width: 100%;
    height: 100% !important;
    object-fit: revert-layer;
    background: black !important;
}

.blog-tile .blog-featured-image {
    height: 100% !important;
    background: black;
}
*/
</style>

<div class="main-content"> 



  <section class="new_bread_crum">

    <div class="container">

      <ul>

        <li><a href="{{url('/')}}">Home</a></li>

        <li>Blog</li>

      </ul>

    </div>

  </section>



  <section class="single_blog">

    <div class="container">

      <h1 class="title">What are you interested in learning?</h1>



      <div class="row">

        @php foreach($data['blog_category'] as $row){ @endphp

        <div class="col-lg col-md-4 col-6 single_blog_col">

          <a href="{{url('blog/'.$row->slug)}}">
            <div class="category-box">
              <i class="{{$row->icon}}"></i>
              <img src="{{url('public/uploads/'.$row->image)}}">
              <h3 class="category-name">{{$row->name}}</h3>
            </div>
          </a>

        </div>

        @php } @endphp



      </div>

    </div>

  </section>



  <section class="recently-added-blogs">

    <div class="container no-padding">

      <h3 class="primary-section-title">Recently Added Articles</h3>

      <div class="row blog-custom-carousel">

        @php foreach($data['blogs'] as $row){ @endphp

        <div class="col-xl-3 col-lg-3 col-md-4 col-12">

          <div class="blog-tile">

            <div class="blog-featured-image">

              <a href="{{url('blog-details/'.$row->slug)}}">

                <img class="img-fluid lazyloaded" src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->name}}"> </a>

            </div>

            <article class="blog-info">

              <h2><a href="{{url('blog-details/'.$row->slug)}}">{{$row->name}}</a></h2>

              

              



        

            </article>

          </div>

        </div>

        @php } @endphp











      </div>

      {{ $data['blogs']->links() }}

    </div>

  </section>



  <section class="total-blog-count">

    <div class="container">

      <h3 class="primary-section-title">More Resources</h3>



      <div class="row">



        <div class="col-md-3">

          <a href="#">

            <div class="count-tile">

              <div class="feature-image">

                <img src="{{ url('assets/front/') }}/img/svg/video-info-blog.svg">

              </div>

              <div class="details">

                <h3>Video</h3>

                <p>211+ Videos</p>

              </div>

            </div>

          </a>

        </div>



        <div class="col-md-3">

          <a href="#">

            <div class="count-tile">

              <div class="feature-image">

                <img src="{{ url('assets/front/') }}/img/svg/interview-question-blog.svg">

              </div>

              <div class="details">

                <h3>Interview Question</h3>

                <p>117+ Question Banks</p>

              </div>

            </div>

          </a>

        </div>



        <div class="col-md-3">

          <a href="#">

            <div class="count-tile">

              <div class="feature-image">

                <img src="{{ url('assets/front/') }}/img/svg/cheat-sheet-blog.svg">

              </div>

              <div class="details">

                <h3>Cheat Sheet</h3>

                <p>9+ Cheatsheets</p>

              </div>

            </div>

          </a>

        </div>



        <div class="col-md-3">

          <a href="#">

            <div class="count-tile">

              <div class="feature-image">

                <img src="{{ url('assets/front/') }}/img/svg/ebook-blog.png">

              </div>

              <div class="details">

                <h3>Ebook</h3>

                <p>8+ Ebooks</p>

              </div>

            </div>

          </a>

        </div>

      </div>

    </div>

  </section>




<section class="recently-added-blogsss">
   
                <div class="items">
                    <div class="container no-padding">
                        <!-- Section Title -->
                        <h3 class="primary-section-title">Popular Articles</h3>
                        
                        <!-- Blog Carousel -->
                        <div class="row blog-custom-carousel popular-article ">
                            @foreach($data['popular_blogs'] as $blog)
                                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                                    <div class="blog-tile">
                                        <!-- Blog Featured Image -->
                                        <div class="blog-featured-image">
                                            <a href="{{ url('blog-details/' . $blog->slug) }}">
                                                <img 
                                                    class="img-fluid lazyloaded" 
                                                    src="{{ url('public/uploads/' . $blog->image) }}" 
                                                    alt="{{ $blog->image_alt }}" 
                                                    title="{{ $blog->image_title }}" 
                                                    description="{{ $blog->image_description }}"
                                                >
                                            </a>
                                        </div>

                                        <!-- Blog Info -->
                                        <article class="blog-info">
                                            <h2>
                                                <a href="{{ url('blog-details/' . $blog->slug) }}">{{ $blog->name }}</a>
                                            </h2>
                                           
                                        </article>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            
</section>














  <section class="trending-courses">

    <div class="container">

      <h3 class="primary-section-title">Trending Courses</h3>



      <div class="row trending_cour owl-carousel">



        @php foreach($data['trending_courses'] as $row){ @endphp

        <div class="item">

          <div class="col-md-12">

            <div class="course-tile">

              <a href="{{url('course/'.$row->slug)}}">

                <div class="course-featured-image">
                  

                  <img src="{{ url('public/uploads/'.$row->image) }}" alt="{{$row->image_alt}}" title="{{$row->image_title}}" description="{{$row->image_description}}">

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