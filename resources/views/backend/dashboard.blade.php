@extends('backend.layouts.app')
@section('content')

@php
    $userId = Auth::id();
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <br>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
		
			@php 
				if($userId!=1){
				echo "<h1>Welcome Admin</h1>";
				}
		if($userId==1){
		@endphp  
		
		<div class="row">
	  
<div class="col-lg-3 col-xs-6">

<div class="small-box bg-black">
<div class="inner">
<h3>{{$data['categories']}}</h3>
<p>Category Management</p>
</div>
<div class="icon">
<img src="{{url('assets/img/1.png')}}" alt="icon">
</div>
<a href="{{url('admin/course-category')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-green">
<div class="inner">
<h3> {{$data['course']}}</h3>
<p>Course Management </p>
</div>
<div class="icon">
<img src="{{url('assets/img/2.png')}}" alt="icon">
</div>
<a href="{{url('admin/courses')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-yellow">
<div class="inner">
<h3>{{$data['enquiry']}}</h3>
<p>Enquiry </p>
</div>
<div class="icon">
<img src="{{url('assets/img/3.png')}}" alt="icon">
</div>
<a href="{{url('admin/enquiry')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-red">
<div class="inner">
<h3>{{$data['partner']}}</h3>
<p>Partners</p>
</div>
<div class="icon">
<img src="{{url('assets/img/4.png')}}" alt="icon">
</div>
<a href="{{url('admin/partner')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>

		
		<div class="row">
<div class="col-lg-3 col-xs-6">

<div class="small-box bg-aqua">
<div class="inner">
<h3>{{$data['testimonial']}}</h3>
<p>Testimonial</p>
</div>
<div class="icon">
<img src="{{url('assets/img/5.png')}}" alt="icon">
</div>
<a href="{{url('admin/testimonial')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-purple">
<div class="inner">
<h3> {{$data['placement']}}</h3>
<p>Placement Management </p>
</div>
<div class="icon">
<img src="{{url('assets/img/6.png')}}" alt="icon">
</div>
<a href="{{url('admin/placement')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-pink">
<div class="inner">
<h3>{{$data['opening']}}</h3>
<p>Opening Management </p>
</div>
<div class="icon">
<img src="{{url('assets/img/7.png')}}" alt="icon">
</div>
<a href="{{url('admin/opening')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">

<div class="small-box bg-pup">
<div class="inner">
<h3>{{$data['events']}}</h3>
<p>Events Management</p>
</div>
<div class="icon">
<img src="{{url('assets/img/8.png')}}" alt="icon">
</div>
<a href="{{url('admin/events')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
@php }  @endphp
		
		
		
		
		
            
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection