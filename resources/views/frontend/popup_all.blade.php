<div class="modal fade pop_view" id="cant_find">
  <div class="modal-dialog helpchoosebatch_modal_dialog__2E7uZ">
    <div class="modal-content helpchoosebatch_modal_content__16fWA">
      <div class="helpchoosebatch_modal_body__3Bvaw helpchoosebatch_otp_view_bx__3ILpN modal-body">
        <div class="helpchoosebatch_close_btn__3H0Ay" data-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="1023" height="1024" viewBox="0 0 1023 1024">
            <path fill="#000000" d="M1023.29 923.162l-411.162-411.162 411.162-411.162-100.128-100.838-411.162 411.162-411.162-411.162-100.838 100.128 411.162 411.872-411.162 411.162 100.128 100.838 411.872-411.872 411.162 411.162 100.128-100.128z"></path>
          </svg>
        </div>
        <div class="helpchoosebatch_heading__2aAqe">Tell Us Your Preferred Starting Date</div>
        <form class="helpchoosebatch_form__bOJve">
          <div class="position-relative form-group">
            <label class="helpchoosebatch_label__3xrAt form-label" for="chooseBatchDate">Preferred batch start date</label>
            <input placeholder="Select a Date" name="preferredDate" type="date" id="chooseBatchDate" class="helpchoosebatch_input__3l0Ia form-control">
            
           
          </div>
          <div class="position-relative form-group">
            <label class="helpchoosebatch_label__3xrAt form-label" for="chooseBatchEmail">Email Id</label>
            <input placeholder="Enter your email*" name="email" type="email" id="chooseBatchEmail" class="helpchoosebatch_input__3l0Ia form-control">
          </div>
          <div class="position-relative form-group">
            <label class="helpchoosebatch_label__3xrAt form-label" for="chooseBatchPhoneNumber">Phone Number 
              <!---<span class="helpchoosebatch_edt_n__1FdYF helpchoosebatch_hide__3t8iY">Edit Number</span>-->
            </label>

            <input name="phone_our_learners" value="" id="link_ph_enroldd" class="helpchoosebatch_input__3l0Ia form-control" placeholder="Enter your phone*" type="text" />

          </div>
          <button type="submit" class="helpchoosebatch_submit__3bhIi btn">SUBMIT REQUEST</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!---------------Drop query------------------------>
<div class="duq_DUQ_container__1Uh0K duq_DUQ_container_color__2cEYj duq-transition-appear-done duq-transition-enter-done">
  <div class="color_change duq_header__3Kbtt">
    <span class="title_color duq_title__21nS4">Drop us a Query <picture>
        <img width="23" height="23" src="https://d1jnx9ba8s6j9r.cloudfront.net/img/blinker_d.webp" alt="img" class="duq_blink_image_new__Rd9ok">
      </picture>
    </span>
    <span class="duq_chevron_icon__3KJrO duq_closed__1CYAa">
      <svg xmlns="http://www.w3.org/2000/svg" width="1024" height="1024" viewBox="0 0 1024 1024">
        <path d="M994.485 295.755l-497.544 497.544-496.941-497.544 84.932-84.932 412.009 412.009 412.009-412.009 85.534 84.932z"></path>
      </svg>
    </span>
  </div>
  <div class="duq_body__1VKnq duq_otp_view_bx__131GB appear-done enter-done">
    <div class="duq_top_section__hlB2l">
      <div class="duq_box_img_center__10dtE">
        <picture>
          <img width="152" height="73" fullbase="true" alt="TGC India 24x7 Support" title="24x7 Support" loading="lazy" src="{{ url('assets/front/') }}/img/24x7-available.png">
        </picture>
      </div>
    </div>
    <div class="duq_talktous__3LuUQ">
      <div class="duq_talktous_icon__2dHzP">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16.523" height="16.491" viewBox="0 0 16.523 16.491">
            <path data-name="Path 24546" d="M53.8,12.05l-2.3-2.3a1.569,1.569,0,0,0-2.2,0,2.092,2.092,0,0,0-.4.6,1.566,1.566,0,0,1-1.8,1,7.3,7.3,0,0,1-4.3-4.3,1.431,1.431,0,0,1,1-1.8,1.584,1.584,0,0,0,1-1.9,2.092,2.092,0,0,0-.4-.6L42.1.45a1.569,1.569,0,0,0-2.2,0l-1.6,1.6c-1.6,1.6.2,6,4,9.8,3.9,3.9,8.2,5.7,9.8,4l1.6-1.6a1.485,1.485,0,0,0,.1-2.2" transform="translate(-37.72)"></path>
          </svg>
        </span>
      </div>
      <div class="duq_talktous_info__pzIvn">
        <a href="tel:+919582786407">+91 9582786407</a>
        <span>Available 24x7 for your queries</span>
      </div>
    </div>
    <form class="duq_form__37y_-" method="post" action="{{url('submit-drop-query')}}">
        @csrf
        <input type="hidden" name="recaptcha_token" class="recaptcha_token">

        <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">
      <div class="position-relative form-group">
          <input type="hidden" value="{{ url()->full()}}" name="page_url" >
          <input type="hidden" name="form_type" value="Footer_Drop_us_a_Query ">
        <textarea rows="3" placeholder="Type your query here*" name="query" id="duqFormTextarea" class="duq_input__se4iR form-control"></textarea>
      </div>
      <div class="position-relative form-group">
        <label class="duq_label__3Wlxi form-label" for="duqFormPhoneNumber">Phone Number <span class="duq_edt_n__2EcJc duq_hide__2COEU">Edit Number</span>
        </label>

        <input name="phone_our_learners" value="" id="drop_enq_ph" class="duq_input__se4iR" placeholder="Enter your phone*" type="text" />



      </div>
      <div class="position-relative form-group">
        <label class="duq_label__3Wlxi form-label" for="duqFormEmail-duq">Email Id</label>
        <input placeholder="Enter your email*" name="email" autocomplete="email" type="email" id="duqFormEmail-duq" class="duq_input__se4iR form-control">
      </div>
      <button type="submit" class="duq_submit__2CiBU btn btn-primary">SUBMIT QUERY</button>
    </form>
  </div>
</div>
<!---------------Drop query------------------------>


<!-----------------Take Free--------------------->
<div class="modal fade pop_view" id="take_free">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="product_img">
              <img src="{{ url('assets/front/') }}/img/student-suppor.webp" class="image-responsive">
            </div>
          </div>
          <div class="col-md-6">
            <div class="modal-form-fill">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span></button>
              <div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">
                <h4 class="modal-heading">Take Free Practice Test</h4>
              </div>

              @if(session('success_demopopup'))
              <div class="alert alert-success">
                {{ session('success_demopopup') }}
              </div>
              @endif

              @if(session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
              @endif

              <form action="{{url('/home-demopopup-applynow')}}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="recaptcha_token" class="recaptcha_token">

                  <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

                <input type="hidden" name="form_type" value="home_demopopup_applynow">
                 <input type="hidden" value="{{$url = request()->url()}}" name="course_popup_url">
                <input type="text" name="name_home_demopopup_applynow" value="{{ old('name_home_demopopup_applynow') }}" placeholder="Enter Name" maxlength="35">
                @error('name_home_demopopup_applynow')<p style="color: red;">{{ $message }}</p>@enderror
                <input type="text" name="email_home_demopopup_applynow" value="{{ old('email_home_demopopup_applynow') }}" placeholder="Enter E-mail">
                @error('email_home_demopopup_applynow')<p style="color: red;">{{ $message }}</p>@enderror
                <div class="valide-text">
                  <div class="drop-number">
                    <select class="choosecode" name="choosecode">
                      <option value="91">+91(IN)</option>
                      <option value="93">+93(AF)</option>
                      <option value="1">+1(US)</option>
                    </select>
                    <input type="tel" name="phone_home_demopopup_applynow" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">
                  </div>
                </div>
                @error('phone_home_demopopup_applynow')<p style="color: red;">{{ $message }}</p>@enderror
                <button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
              </form>
              <br>
              <p>By registering here, I agree to TGC India <a href="{{ url('terms-conditions.html') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ url('privacy-policy.html') }}" target="_blank">Privacy Policy</a> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-----------------Take Free--------------------->


<?php
// Get current page URL
$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!-----------------course Share--------------------->
<div class="modal fade pop_view" id="course_pop">
  <div class="modal-dialog sharepopup_modal_dialog__y7Giv modal-dialog-centered">
    <div class="modal-content sharepopup_modal_content__2722u">
      <div class="sharepopup_modal_body__2vJxK modal-body">
        
        <button type="button" class="sharepopup_close_btn__1vbWm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <div class="sharepopup_heading__m0FuC">Share with the world</div>
        
        <!-- Copy URL Section -->
        <div class="sharepopup_page_link_div__1jdbq">
          <div class="sharepopup_label__2aCE0">Copy Page URL</div>
          <div class="sharepopup_link_grp__wxkMN" >
            <div class="sharepopup_link_div__3rjQb">
              <div id="share_url"><?php echo $current_url; ?></div>
            </div>
            <div class="sharepopup_copy_icon__163Yo" onclick="copyToClipboard()" id="copy">
               📋
            </div>
          </div>
        </div>

        <!-- Social Media Share -->
        <div class="sharepopup_page_link_div__1jdbq">
          <div class="sharepopup_label__2aCE0">Share with</div>
          <div class="sharepopup_link_grp_media__1KshH">
            
            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($current_url); ?>" target="_blank">
              <img width="30" height="30" src="https://d1jnx9ba8s6j9r.cloudfront.net/img/Iconshare-whatsapp.png" alt="WhatsApp">
            </a>

            <!-- Email -->
            <a href="mailto:?subject=Check this out!&body=<?php echo urlencode($current_url); ?>" target="_blank">
              <img width="30" height="24" src="https://d1jnx9ba8s6j9r.cloudfront.net/img/Iconshare-email.png" alt="Email">
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>" target="_blank">
              <img width="34" height="34" src="https://d1jnx9ba8s6j9r.cloudfront.net/img/Iconshare-facebook.png" alt="Facebook">
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>" target="_blank">
              <img width="36" height="30" src="https://d1jnx9ba8s6j9r.cloudfront.net/img/Iconshare-twitter.png" alt="Twitter">
            </a>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>





<div class="modal  pop_view" id="demo_pop">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<div class="row">
<div class="col-md-6">
<div class="product_img">
<img src="{{ url('assets/front/') }}/img/student-suppor.webp"  alt="support" class="image-responsive">
</div>
</div>
<div class="col-md-6">
<div class="modal-form-fill">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">x
</span></button>
<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">
<h4 class="modal-heading">Book A Free Demo </h4>
</div>
@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form action="{{url('/sendDemo')}}" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

<div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

<input type="hidden" name="form_type" value="home_demopopup_enquiry">
<input type="text" name="name_demopopup" value="{{ old('name_demopopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_demopopup')<p style="color: red;">{{ $message }}</p>@enderror
<input type="text" name="email_demopopup" value="{{ old('email_demopopup') }}" placeholder="Enter E-mail">
@error('email_demopopup')<p style="color: red;">{{ $message }}</p>@enderror
<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>
<input type="tel" name="phone_demopopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">
</div>
</div>
@error('phone_demopopup')<p style="color: red;">{{ $message }}</p>@enderror
<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>
<br>
<p>By registering here, I agree to TGC India <a href="{{ url('terms-conditions.html') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ url('privacy-policy.html') }}" target="_blank">Privacy Policy</a> </p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="modal  pop_view" id="demo_pop1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp"  alt="support" class="image-responsive">

</div>

</div>





<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png"  alt="demo" alt="download">

<h4 class="modal-heading">Apply Now</h4>

</div>



@if(session('success_demopopup'))
<div class="alert alert-success">
{{ session('success_demopopup') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form action="{{url('/home-demopopup-applynow')}}" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

  <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

<input type="hidden" name="form_type" value="home_demopopup_applynow">

<input type="text" name="name_home_demopopup_applynow" value="{{ old('name_home_demopopup_applynow') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_demopopup_applynow')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_demopopup_applynow" value="{{ old('email_home_demopopup_applynow') }}" placeholder="Enter E-mail">
@error('email_home_demopopup_applynow')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_demopopup_applynow" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">
</div>
</div>
@error('phone_home_demopopup_applynow')<p style="color: red;">{{ $message }}</p>@enderror


<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>

<br>



<p>By registering here, I agree to TGC India <a href="{{ url('terms-conditions.html') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ url('privacy-policy.html') }}" target="_blank">Privacy Policy</a> </p>

</div>

</div>



</div>

</div>

</div>

</div>

</div>


<div class="modal  pop_view" id="demo_pop2">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>





<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Enroll Now</h4>

</div>



@if(session('success_popoenrollnow'))
<div class="alert alert-success">
{{ session('success_popoenrollnow') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

 <form action="{{url('/home-popup-enrollnow')}}" method="post" autocomplete="off">
   @csrf
   <input type="hidden" name="recaptcha_token" class="recaptcha_token">

     <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
  </div>

 <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

<input type="hidden" name="popup_page_url" value="{{ $url = request()->url() }}">
<input type="hidden" name="form_type" value="home_popoenrollnow">

<input type="text" name="name_popoenrollnow" value="{{ old('name_popoenrollnow') }}" placeholder="Enter Name" maxlength="35">
@error('name_popoenrollnow')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_popoenrollnow" value="{{ old('email_popoenrollnow') }}" placeholder="Enter E-mail">
@error('email_popoenrollnow')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_popoenrollnow" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">
</div>
</div>
@error('phone_popoenrollnow')<p style="color: red;">{{ $message }}</p>@enderror


<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>

<br>



<p>By registering here, I agree to TGC India <a href="{{ url('terms-conditions.html') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ url('privacy-policy.html') }}" target="_blank">Privacy Policy</a> </p>

</div>

</div>



</div>

</div>

</div>

</div>

</div>



<div class="modal fade pop_view" id="offer_av">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>



<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Avail Offer</h4>

</div>



@if(session('success_offer'))
<div class="alert alert-success">
{{ session('success_offer') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

  <form action="{{url('/sendOffer')}}" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

 <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
  </div>

 <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

  <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">

<!-- Add the hidden field -->
<input type="hidden" name="form_type" value="home_offerpopup_enquiry">

<input type="text" name="name_home_offerpopup" value="{{ old('name_home_offerpopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_offerpopup" value="{{ old('email_home_offerpopup') }}" placeholder="Enter E-mail">
@error('email_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_offerpopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">

</div>

</div>
@error('phone_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>



</div>

</div>



</div>

</div>

</div>

</div>

</div>




<div class="modal fade pop_view" id="ConnectWithCounselor">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>



<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Connect With Counselor</h4>

</div>



@if(session('success_offer'))
<div class="alert alert-success">
{{ session('success_offer') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

  <form action="{{url('/sendOffer')}}" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

 <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
  </div>

 <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

  <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">

<!-- Add the hidden field -->
<input type="hidden" name="form_type" value="home_offerpopup_enquiry">

<input type="text" name="name_home_offerpopup" value="{{ old('name_home_offerpopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_offerpopup" value="{{ old('email_home_offerpopup') }}" placeholder="Enter E-mail">
@error('email_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_offerpopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">

</div>

</div>
@error('phone_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>



</div>

</div>



</div>

</div>

</div>

</div>

</div>


<div class="modal fade pop_view" id="GetFeesDetails">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>



<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Get Fees Details</h4>

</div>



@if(session('success_offer'))
<div class="alert alert-success">
{{ session('success_offer') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

  <form action="{{url('/sendOffer')}}" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

 <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
  </div>

 <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

  <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">

<!-- Add the hidden field -->
<input type="hidden" name="form_type" value="home_offerpopup_enquiry">

<input type="text" name="name_home_offerpopup" value="{{ old('name_home_offerpopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_offerpopup" value="{{ old('email_home_offerpopup') }}" placeholder="Enter E-mail">
@error('email_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_offerpopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">

</div>

</div>
@error('phone_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>



</div>

</div>



</div>

</div>

</div>

</div>

</div>


<div class="modal fade pop_view" id="get_trail_enroll">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>



<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Get Trial Classes</h4>

</div>



@if(session('success_offer'))
<div class="alert alert-success">
{{ session('success_offer') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

  <form action="{{url('/sendOffer')}}" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

 <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
  </div>

 <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

  <input type="hidden" value="<?php echo $url = request()->url();?>" name="page_url">

<!-- Add the hidden field -->
<input type="hidden" name="form_type" value="home_offerpopup_enquiry">

<input type="text" name="name_home_offerpopup" value="{{ old('name_home_offerpopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_offerpopup" value="{{ old('email_home_offerpopup') }}" placeholder="Enter E-mail">
@error('email_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_offerpopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">

</div>

</div>
@error('phone_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>



</div>

</div>



</div>

</div>

</div>

</div>

</div>







<div class="modal  pop_view" id="offer_enroll">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>



<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Enroll Now</h4>

</div>



<!-- @if(session('success_offer'))
<div class="alert alert-success">
{{ session('success_offer') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif -->

<form action="" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

<div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

   <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

<!-- Add the hidden field -->
<input type="hidden" name="form_type" value="home_offerpopup_enquiry">

<input type="text" name="name_home_offerpopup" value="{{ old('name_home_offerpopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_offerpopup" value="{{ old('email_home_offerpopup') }}" placeholder="Enter E-mail">
@error('email_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_offerpopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">

</div>

</div>
@error('phone_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>



</div>

</div>



</div>

</div>

</div>

</div>

</div>


<div class="modal fade pop_view" id="offer_webinar">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>



<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Book a Demo / Webinar</h4>

</div>



<!-- @if(session('success_offer'))
<div class="alert alert-success">
{{ session('success_offer') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif -->

<form action="" method="post" autocomplete="off">
@csrf
<input type="hidden" name="recaptcha_token" class="recaptcha_token">

<!-- Add the hidden field -->
<input type="hidden" name="form_type" value="home_offerpopup_enquiry">

<input type="text" name="name_home_offerpopup" value="{{ old('name_home_offerpopup') }}" placeholder="Enter Name" maxlength="35">
@error('name_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_home_offerpopup" value="{{ old('email_home_offerpopup') }}" placeholder="Enter E-mail">
@error('email_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_home_offerpopup" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">

</div>

</div>
@error('phone_home_offerpopup')<p style="color: red;">{{ $message }}</p>@enderror

<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>



</div>

</div>



</div>

</div>

</div>

</div>

</div>



<div class="fix-enquiry">

<div id="fix-rig" onclick="openrig()">

<span><img src="{{ url('assets/front/') }}/img/viber.png"  alt="viber" class="img-fluid"></span>

Contact Us

</div>

<div id="mySidepanel" class="ani-pio">

<span class="closebtn" id="side_cont" onclick="closeNav()">x</span>

<div class="fix-contact">

<div class="fix-indian">

<div class="fix-indian-left">

<p>For Voice Call</p><strong><a href="tel:18001020418" target="_blank">18001020418</a></strong>

</div>

<div class="fix-indian-right"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></div>

</div>

<div class="fix-internatioanl">

<div class="fix-international-left">

<p>For Whatsapp Call &amp; Chat</p><strong><a href="https://wa.me/919582786407" target="_blank" aria-label="Whatsup">+919582786407</a></strong>

</div>

<div class="fix-international-right">

<i class="fa fa-whatsapp fa-fw" aria-hidden="true"></i>

</div>

</div>

</div>

</div>

</div>



<!------------------------------------------------------------->
<div class="modal fade " id="myModal3">
<div class="modal-dialog">
<div class="modal-content">


<div class="modal-header">
<button type="button" class="menuclose" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" class="angle-back"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
</button>
<form method="get" action="{{url('courses.html')}}" class="form-inline search-courses" autocomplete="off">
<input class="form-control search-input plocation" type="text" placeholder="Search Your Course Name Here" name="keywords" />
<input type="reset" class="resetform" /><i class="fa fa-search" aria-hidden="true"></i>
</form>

<button type="button" class="menuclose" data-dismiss="modal" aria-label="Close" id="mobile-icon-disable"><span aria-hidden="true">x</span></button>
</div>

<div class="modal-body">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="modal-course-categories" id="modal-course-categories">
<div class="modal-courses-tab">
<!---
<div class="mobile-categories-header">

<ul class="nav" role="tablist">
<li class="nav-item">
<a class="coursetablinks showCategoryProgram active" data-toggle="tab" href="#all_progr">All Programs</a>
</li>

<li class="nav-item active">
<a class="coursetablinks showCategoryProgram" data-toggle="tab" href="#mast_er" aria-expanded="true">Master Programs</a>
</li>
</ul>

</div>
-->

<div class="all-master-program tab-content">

<div id="all_progr" class="tab-pane active">
<div id="allprogram" class="coursetabcontent">
<div class="all-list-course">
<div class="modal-course-vertical-tab">
    <div class="tab">
    <span>Course Categories</span> 
    @php
    $i = 1;
    $results = DB::table('tbl_course_category')
        ->where('is_deleted', 0)
        ->where('staus', 'Active')
        ->orderBy('orders_by', 'ASC')
        ->get();
    @endphp
    
    @foreach($results as $row)
        <button class="cortablinks crOUSE_if @if($i == 1) active @endif" 
                onclick="showCategoryCourseMenu(`{{$row->id}}`)">
            {{$row->name}}
        </button>
        @php $i++; @endphp
    @endforeach
</div>

<div id="modalcourse1" class="cortabcontent">
<div class="show-all-category-courses">
<div class="all-courses">
<div class="popular-courses">
<div class="popular-courses-heading"><strong>All Courses</strong></div>
<div class="popular-courses-description" >
<ul id="ajax_courses_menu">
    
 
 
    
@php
$lastCatId = DB::table('tbl_course_category')->where('is_deleted', 0)->WHERE('staus', 'Active')->orderBy('orders_by', 'ASC')->first();
$resultsC = DB::table('tbl_course')->WHERE('parent', $lastCatId->id)->where('is_deleted', 0)->whereNull('excluded_by')->WHERE('staus', 'Active')->orderBy('id', 'DESC')->get();
foreach($resultsC as $rowC){
@endphp
<li><a href="{{url('course/'.$rowC->slug)}}">{{$rowC->name}}</a></li>
@php } @endphp
</ul>


</div>
</div>

<div class="master-courses">
    <div class="master-courses-heading"><strong>Master Programme</strong></div>

    <div class="all-master-courses">
        <a href="#" class="master-course-description">
            <div class="master-course-description-heading">
                <img id="master-image" src="{{ url('assets/front/img/master-program-modal.jpg') }}" alt="modal" />
                <strong id="master-title">Please select course category</strong>
            </div>
            <div class="master-course-description-list" id="master-content">
               
            </div>
        </a>
    </div>
</div>



 

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>






</div>
</div>



</div>
</div>
</div>
</div>



</div>
</div>
</div>
<!------------------------------------------------------------->


<div class="modal  pop_view" id="mock_int">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-body">

<div class="row">

<div class="col-md-6">

<div class="product_img">

<img src="{{ url('assets/front/') }}/img/student-suppor.webp" alt="support" class="image-responsive">

</div>

</div>





<div class="col-md-6">

<div class="modal-form-fill">



<button type="button" class="close" data-dismiss="modal" aria-label="Close">



<span aria-hidden="true">x

</span></button>



<div class="form-heading"><img src="{{ url('assets/front/') }}/img/demo.png" alt="download">

<h4 class="modal-heading">Mock Interviews</h4>

</div>



@if(session('success_popoenrollnow'))
<div class="alert alert-success">
{{ session('success_popoenrollnow') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

  <form action="{{url('/home-popup-enrollnow')}}" method="post" autocomplete="off">
     
@csrf
 <input type="hidden" name="recaptcha_token" class="recaptcha_token">

  <div style="display: none;">
    <input type="text" name="website" autocomplete="off">
   </div>

     <input type="hidden" name="form_start" value="{{ now()->timestamp }}">

   <input type="hidden" name="form_type" value="home_popoenrollnow">

<input type="text" name="name_popoenrollnow" value="{{ old('name_popoenrollnow') }}" placeholder="Enter Name" maxlength="35">
@error('name_popoenrollnow')<p style="color: red;">{{ $message }}</p>@enderror

<input type="text" name="email_popoenrollnow" value="{{ old('email_popoenrollnow') }}" placeholder="Enter E-mail">
@error('email_popoenrollnow')<p style="color: red;">{{ $message }}</p>@enderror

<div class="valide-text">
<div class="drop-number">
<select class="choosecode" name="choosecode">
<option value="91">+91(IN)</option>
<option value="93">+93(AF)</option>
<option value="1">+1(US)</option>
</select>

<input type="tel" name="phone_popoenrollnow" maxlength="16" onkeypress="return isNumberKey(event);" placeholder="Enter Phone no ">
</div>
</div>
@error('phone_popoenrollnow')<p style="color: red;">{{ $message }}</p>@enderror


<button type="submit" class="modal-placement-button popbtn" name="submit" title="when button disabled then please enter value">Submit</button>
</form>

<br>



<p>By registering here, I agree to TGC India <a href="{{ url('terms-conditions.html') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ url('privacy-policy.html') }}" target="_blank">Privacy Policy</a> </p>

</div>

</div>



</div>

</div>

</div>

</div>

</div>


   <script>

/*
    function copyToClipboard() {
    // URL वाले div से text लें
       var urlText = document.getElementById("share_url").innerText;

    // नया और बेहतर तरीका: Clipboard API
          navigator.clipboard.writeText(urlText).then(function() {
        alert("✅ URL Copied Successfully!");
    }).catch(function(err) {
             console.error("Failed to copy: ", err);
           alert("❌ Copy failed! Please try again.");
    });
}

*/
</script>

<script>
  document.querySelector('.duq_header__3Kbtt').addEventListener('click', function() {
    document.querySelector('.duq_body__1VKnq').classList.toggle('show');
  });
  document.querySelector('.learnedu_drop_us_click__1Kecx').addEventListener('click', function() {
    document.querySelector('.duq_body__1VKnq').classList.toggle('show');
  });
</script>