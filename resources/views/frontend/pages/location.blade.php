@extends('frontend.layouts.app')

@section('content')



<div class="main-content">










  <section class="git">

    <div class="container">

     
<div class="footer-middle ppd_cont">

<div class="container-fluid">

<div class="row">

<div class="col-md-12">

<div class="show_all_city_wise">
 
@foreach($locationCity as $city => $locationSlugs)
    <div class="footer-new-all-course">
        <strong>Training in {{ $city }}</strong>

        <div class="footer-new-all-course-list">
            @foreach($locationSlugs as $slug)
                <a href="{{ url('location' . '/' . $slug) }}">
                    {{ ucwords(str_replace('-', ' ', $slug)) }} |
                </a>
            @endforeach
        </div>
    </div>
@endforeach
 <div class="footer-new-all-course">
        <strong>Training Courses</strong>

        <div class="footer-new-all-course-list">
            @foreach($CityLocation as $slugdata)
                <a href="{{ url('location' . '/' . $slugdata->slug) }}">
                    {{ ucwords(str_replace('-', ' ', $slugdata->slug)) }} |
                </a>
            @endforeach
        </div>
    </div>


    <div class="footer-new-all-course">
        <strong>Top Training Courses</strong>

        <div class="footer-new-all-course-list">
            @foreach($excludedCourses as $slugValues)
                <a href="{{ url('course' . '/' . $slugValues->slug) }}">
                  {{$slugValues->name}} |
                </a>
            @endforeach
        </div>
    </div>



















</div>

</div>

</div>

</div>

</div>
    </div>

  </section>







</div>



@endsection