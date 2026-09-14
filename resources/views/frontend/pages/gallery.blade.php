@extends('frontend.layouts.app')

@section('content')


@php
$cateid=($_GET['cate'])??'';
@endphp

<!-- jQuery (Required) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Lightbox CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>>
<div class="main-content">

<section class="cor_po">

		<img src="{{url('assets/front/')}}/img/corporate.jpg">

		<div class="tophead-form">

			<div class="container">

				<div class="title-head-b2b">

				


					<h2 class="head-b2b-home">Gallery</h2>

			

				</div>

			</div>

		</div>

	</section>






	<section class="al_j">



		<div class="container">

<ul class="bro_menu" role="tablist">
<li class="items @php if($cateid==''){ echo 'active'; } @endphp"><a class="box " href="https://www.tgcindia.com/gallery">All </a></li>

@foreach( $data['cat'] as $cate)
<li class="items @php if($cateid==$cate->id){ echo 'active'; } @endphp"><a class="box"  href="{{url('gallery?cate='.$cate->id)}}">{{$cate->name}} </a></li>
@endforeach
 </ul>

			<div class="row">
@php 
///print_r($catTitle);
@endphp


@if($cateid != '')
 <div class="col-md-12 mb-4">
    <h4>{{ $catTitle[$cateid] }}</h4>
    </div>
@endif


@foreach($data['gallery'] as $image)
    <div class="col-md-4 mb-4">
        <a href="{{ asset('public/uploads/' . $image->image) }}" data-lightbox="gallery">
            <img src="{{ asset('public/uploads/' . $image->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $image->alt_tag }}">
        </a>
    </div>
@endforeach






				<!-- ================== Modal Start ========================= -->







				<!-- Modal -->



		

			</div>



		</div>

	</section>



</div>










<div class="modal fade com_enroll" id="downloadenroll">

  <div class="modal-dialog">

    <div class="modal-content">



      <div class="modal-body">



        <div class="modal-header">

          <a href="#" data-dismiss="modal" class="class pull-right">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

              <path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z" />

            </svg>

          </a>

          <h3 class="modal-title">Download Curriculum</h3>

        </div>





        <div class="row">

          <div class="col-md-12">

            @if(session('success5'))
            <div class="alert alert-success">
              {{ session('success5') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{ url('/coursePage1') }}">
              @csrf
              <div class="form-group">
                <label>Phone Number <span>for support</span></label>
                <input type="hidden" name="form_type" value="course_popup_down">
                <input name="phone_course_down" id="downL_enrol" placeholder="Enter your phone*" type="text" />
                @error('phone_course_down')
                <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group">
                <label>Email Id <span>for enrolment</span></label>
                <input type="hidden" id="course_id" name="pdf_curriculum">
                <input name="email_course_down" placeholder="Enter your email*" type="email" />
                @error('email_course_down')
                <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>

              <button class="enrOl_btn" type="submit"> Download Curriculum </button>

              <div class="also_get">
                <input type="checkbox">
                <!--<img src="{{url('assets/front/')}}/img/svg/circle-check.svg">-->
                <span>Also get detailed information on Career Prospects & Industry
                  Trends</span>
              </div>


            </form>


          </div>





        </div>

      </div>

    </div>

  </div>

</div>

<script>
    function getiddata(id){
        
      //  console.log(id);
      
      document.getElementById("course_id").value = id;

    }
</script>



@endsection