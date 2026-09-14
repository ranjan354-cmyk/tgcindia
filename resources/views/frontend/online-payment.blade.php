@extends('frontend.layouts.app')

@section('content')



<div class="main-content">







  <section class="contact-banner">

    <div class="container">

      <div class="row">

        <div class="col-md-7">

          <div class="contact-banner-heading">

            <h2>We Accelerate Customer <span class="orange">Experiences</span></h2>

            <div class="whiteline"></div>

          </div>

          <div class="contact-banner-desc">

            <p>In this competitive world where each industry demands more, we help you in transforming your skill base that drives measurable impact on your Professional Life.</p>

          </div>

        </div>

        <div class="col-md-5"></div>

     

      </div>

    </div>

  </section>



 



  <section class="solution-form">

    <div class="container">

      <div class="row">

        <div class="col-md-3 col-12">

          

        </div>

        <div class="col-md-6 col-12">

          <div class="resolve-query">

            <div class="resolve-query-img">

              <img src="{{ url('assets/front/') }}/img/Form.png" width="100" height="100" alt="Form">

            </div>

            <div class="resolve-query-heading">

              <h4>Pay Online</h4>

            </div>

            <div class="resolve-query-form">


            <!-- @if(session('success21'))
												<div class="alert alert-success">
													{{ session('success21') }}
												</div>
											@endif

											@if(session('error'))
												<div class="alert alert-danger">
													{{ session('error') }}
												</div>
											@endif -->
              <form action="{{ url('/pay-online') }}" method="post" onsubmit="return homeController.saveEnquiryContact(this)" autocomplete="off">
               @csrf
                <input type="hidden" name="from" value="Contact us">
                <input type="hidden" name="from_title" value="Side Bar Contact us">
                <input type="hidden" name="form_type" value="contact_us">
                
             <input type="hidden" name="enq_id" value="{{$sqlenquiryform->id}}">
                <input type="text" name="name"  placeholder="Enter name" value="{{$sqlenquiryform->name}}">
                @error('name')
								<p style="color: red;">{{ $message }}</p>
							@enderror
                <input type="text" name="email"  placeholder="Enter E-mail" value="{{$sqlenquiryform->email}}">
                @error('email')
								<p style="color: red;">{{ $message }}</p>
							@enderror
                <input name="phone" id="emrol_ph"  placeholder="Enter your Phone*" type="text" value="{{$sqlenquiryform->phone}}" />
                @error('phone')
								<p style="color: red;">{{ $message }}</p>
							@enderror



<label>You can deposit the registration amount (Rs. 5000/- which is adjustable in your fee) </label>

                <input type="number" name="amount"  placeholder="Amount" value="{{ old('amount') }}">
                @error('amount')
								<p style="color: red;">{{ amount }}</p>
							@enderror
							
					

<!-- Honeypot field -->
       <input type="hidden" name="page_url" value="{{ $url = request()->url() }}">
<div style="display: none;">
    <input type="text" name="website" autocomplete="off">
</div>

<input type="hidden" name="form_start" value="{{ now()->timestamp }}">

                <input type="submit" name="SEND MESSAGE">
              </form>

         
            </div>

          </div>

        </div>
 <div class="col-md-3 col-12">

          

        </div>
      </div>

    </div>

  </section>



  <section class="register-map">

    <div class="container">

      <!--div class="row">

        <div class="col-md-6 col-12">

          <div class="register">

            <div class="solu-img">

              <img src="{{ url('assets/front/') }}/img/Location.png" width="100" height="100" alt="Location">

            </div>

            <div class="reg-off-add">

              <h4>Registered Office Address</h4>

            </div>

            <div class="reg-add">

              <p>Educentric Academy is under (Group Of TGC India)</p>

              <br>

              <p>G-21, Block G, Sector 3, Noida, Uttar Pradesh 201301</p>


            </div>

          </div>

        </div>

        <div class="col-md-6">

          <div class="google-map">

            <strong>Reach to Us: </strong>





            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14016.018704247468!2d77.2213206!3d28.5696223!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3f4be7ebd19%3A0x5749107e44b8a901!2sTGC%20India%20%7C%20Web%20Design%20Course%20%7C%20Animation%20Course%20%7C%20Delhi!5e0!3m2!1sen!2sin!4v1702468742598!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>

        </div>

      </div>--->




    </div>

  </section>

</div>



@endsection