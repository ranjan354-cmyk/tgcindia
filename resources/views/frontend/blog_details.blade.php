@extends('frontend.layouts.app')
@section('content')
<style>
    .blog-tile article.blog-info {
  
    height: 85px !important;
}



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
h1, .h1 {
    font-size: 1.9rem !important;
}
.blog_single_content a {
    color: blue;           /* Highlight color (orange example) */
    font-weight: bold;        /* Make it stand out */
    text-decoration: underline; /* Optional: underline for clarity */
   
   
}


.blog_single_content a  .btn .btn-primary .btn-sm{
    color: #fff;           /* Highlight color (orange example) */
    font-weight: bold;        /* Make it stand out */
    text-decoration: underline; /* Optional: underline for clarity */
   
   
}
.blog_single_content .btn-sm {
    font-size: 12px;
    padding: 5px 17px;
    background: red !important;
    border: 1px solid red !important;
}


</style>
<div class="main-content">

    <section class="new_bread_crum">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('blogs.html')}}">Blogs</a></li>
                <li>{{$blog->name}}</li>
            </ul>
        </div>
    </section>

    <section class="blog_body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
				
<div class="blog_slide_bar">
@php $i=0; foreach($data['blog_category'] as $cat){ @endphp
<div class="main_xx_drop">
<h3>{{$cat->name}} </h3>
<ul class="">
@php
$blogCat = DB::table('tbl_blog')->where('parent', $cat->id)->WHERE('staus', 'Active')->WHERE('is_deleted', 0)->orderBy('id', 'DESC')->get();
foreach($blogCat as $rowB){
@endphp
<li><a href="{{url('blog-details/'.$rowB->slug)}}">{{$rowB->name}}</a></li>
@php } @endphp
</ul>
</div>
@php ++$i; } @endphp
</div>					
				
				
				
				
				
				
				
				
				
				
				
				
				
                    

                    <div class="powered_by">
                        <a href="#">
                               @php
                  $results = DB::table('tbl_contact')->where('is_deleted', 0)->get();
                  foreach($results as $row){
                  @endphp
                  
                  @php
    }
@endphp
                           <img src="{{url('public/uploads/'.$row->image)}}">
                        </a>
                    </div>


                </div>

                <div class="col-md-9">				<div class="blog-title-details-container"><section id="blog-detail-information-3" class="widget widget_blog-detail-information">
    <div class="blog-title-details">
        <h1>{{$blog->name}}</h1>
        <div class="blog-title-sub-details">
            <div class="blog-title-sub-details-heading"><span class="recommendation color-4a font-italic"></span><span class="publish-date"> Last updated on  {{ $blog->created_at->format('M d, Y') }}</span><span class="total-views color-4a font-italic d-inline-block no-recommendation"> </span></div>
            <div class="icon-bar-first-fold">
                <div class="icon-bar-heading">Share</div>
              <div class="icon-bar" style="    background: black;">
    <input type="hidden" value="{{ url()->current() }}" id="share_url">

    <!-- WhatsApp -->
    <a href="https://wa.me/?text=Check%20this%20out%20{{ urlencode(url()->current()) }}" target="_blank">
        <img src="{{ url('assets/front/') }}/img/share/whatsapp.png">
    </a>

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(url()->current()) }}" target="_blank">
        <img src="{{ url('assets/front/') }}/img/share/linkedin.png">
    </a>

    <!-- Twitter -->
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank">
        <img src="{{ url('assets/front/') }}/img/share/twitter.png">
    </a>

    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
        <img src="{{ url('assets/front/') }}/img/share/facebook.png">
    </a>

    <!-- Reddit -->
    <a href="https://www.reddit.com/submit?url={{ urlencode(url()->current()) }}" target="_blank">
        <img src="{{ url('assets/front/') }}/img/share/reddit.png">
    </a>

</div>
            </div>
        </div>
        <br>
        <div class="author-details d-inline-block"><img alt="TGC India" src="{{ url('assets/front/') }}/img/logo-tgc.png" class="avatar avatar-96 photo author-avatar border rounded-circle blur-up lazyloaded">
            <div class="d-inline-block align-middle name-and-date"><span class="author-name d-inline-block"><a href="#" title="Post By TGC India" rel="author">TGC India</a></span><span class="author-bio d-block d-xl-none d-lg-none">An intellectual brain with a strong urge to explore different upcoming technologies,...</span>
             <!---   <span
                class="author-bio d-none d-xl-block d-lg-block">An intellectual brain with a strong urge to explore different upcoming technologies, learn about them, and share knowledge.</span> --->
            </div>
            <ul class="no-padding bookmark-comments float-right">
                <li><a class="btn bookmark-it" href="#" data-title=""><i class="fa fa-bookmark-o" aria-hidden="true"></i> Bookmark </a></li>
            </ul>
        </div>
    </div>
</section></div>																																																																								
                    <div class="blog_big_img">
                        <a href="#">
                            <img src="{{url('public/uploads/'.$blog->image)}}">
                        </a>
                    </div>

                    <div class="blog_single_content">
 @php
$cleanContent = $blog->content;

// Remove inline style attributes
$cleanContent = preg_replace('/\s*style=("|\')(.*?)("|\')/i', '', $cleanContent);

// Remove span and font tags but preserve their content
$cleanContent = preg_replace('/<\/?(span|font)[^>]*>/i', '', $cleanContent);

// Remove empty <p> tags that contain only spaces, &nbsp;, or nothing
$cleanContent = preg_replace('/<p>(\s|&nbsp;|&#160;|&#xA0;)*<\/p>/i', '', $cleanContent);

// Optionally trim the result
$cleanContent = trim($cleanContent);

// Convert H1 inside content to H2 (prevents double H1 SEO issue)
$cleanContent = preg_replace("/<h1([^>]*)>/i", "<h2$1>", $cleanContent);
$cleanContent = preg_replace("/<\/h1>/i", "<\/h2>", $cleanContent);

// Output
echo $cleanContent;
@endphp

                    </div>

                 <!----   <div class="course_info_blog_re">
                        <div class="title">Upcoming Batches For Artificial Intelligence Certification Course</div>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td class="course_title">
                                        <a href="#">Artificial Intelligence Certification Course</a>
                                    </td>
                                    <td class="course_info">
                                        <p class="desktop_class"><span>Class Starts on </span>25th November,2023</p>
                                        <p class="mobile_class"><span></span>25th November</p>SAT&amp;SUN (Weekend Batch)
                                    </td>
                                    <td class="course_redirect">
                                        <a href="#">View Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    --->

                     <section class="recently-added-blogs" style="background:#0000">
                        <div class="no-padding">
                            <h3 class="primary-section-title">Recently Added Articles</h3>
                            <div class="blog-custom-carousel recent_blog_s owl-carousel">
                                @php foreach($data['recent_blogs'] as $row){ @endphp
                                <div class="item">
                                    <div class="blog-tile">
                                        <div class="blog-featured-image">
                                            <a href="{{url('blog-details/'.$row->slug)}}">
                                                <img src="{{url('public/uploads/'.$row->image)}}" alt="{{$row->name}}"> </a>
                                        </div>
                                        <article class="blog-info">
                                            <h2><a href="{{url('blog-details/'.$row->slug)}}">{{$row->name}}</a></h2>
                                          

                                          



                                        </article>
                                    </div>
                                </div>
                                @php } @endphp
                            </div>
                        </div>
                    </section>
                </div>




            </div>

        </div>
    </section>


    <section class="trending-courses" style="background: #fafbfc;">
        <div class="container">
            <h3 class="primary-section-title">Trending Courses</h3>

            <div class="row trending_cour owl-carousel">

                @php foreach($data['trending_course'] as $row){ @endphp
                <div class="item">
                    <div class="col-md-12">
                        <div class="course-tile">
                            <a href="{{url('course/'.$row->slug)}}">
                                <div class="course-featured-image">
                                    <img src="{{url('public/uploads/'.$row->image)}}">
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

    <section class="course-tags-section">
        <div class="container">
            <h3 class="primary-section-title">Browse Categories</h3>

            <div class="browsecategorywidget">
                @php foreach($data['blog_category'] as $row){ @endphp
                <a href="{{url('blog/'.$row->slug)}}">{{$row->name}}</a>
                @php } @endphp
            </div>
        </div>
    </section>

</div>

<!--------------------->





@endsection