@extends('frontend.layouts.app')

@section('content')



<div id="main">
        <div class="fof">
            <div>
                <img src="{{ url('assets/front/') }}/img/logo.png" alt="TGC India">
            </div>
            <h1>Sorry, this page could not be found.</h1>
            <p>But you came to right place to learn new skills! Continue here.</p>
            <div>
                <a href="{{ url('/') }}/" class="btn"> Go to Homepage</a>
                <a href="{{ url('courses.html') }}" class="btn"> Browse All Courses</a>
            </div>
        </div>
    </div>





@endsection