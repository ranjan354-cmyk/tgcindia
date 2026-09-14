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
{{print_r($data)}}

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
											
											@php 
										//	$payment=1;
										 $payment=$data['user_details']['amount'];
											$payment=$payment*100;
											@endphp 
              <form  action="{{route('payment-success')}}" method="POST">

        @csrf

    

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   <script

    src="https://checkout.razorpay.com/v1/checkout.js"   

    data-key="rzp_live_RGFbvlwTiQfssZ"

    data-amount="<?php echo $payment; ?>"

    data-name="TGC INDIA"

    data-image="https://www.tgcindia.com/assets/front/img/logo-tgc.png"

    data-description=""

    data-prefill.name="@php echo $data['user_details']['name']; @endphp"

    data-prefill.email="@php echo $data['user_details']['email']; @endphp"



    data-prefill.contact="@php echo $data['user_details']['phone']; @endphp"

    data-buttontext="PayNow"

    data-notes.shopping_order_id=""

    data-theme.color="red"

    data-order_id="">

   

  </script>

  <input type="hidden" name="name" value="@php echo $data['user_details']['name']; @endphp">
  <input type="hidden" name="email" value="@php echo $data['user_details']['email']; @endphp">
 <input type="hidden" name="phone" value="@php echo $data['user_details']['phone']; @endphp">
  <input type="hidden" name="amount" value="@php echo $data['user_details']['amount']; @endphp">
   <input type="hidden" name="enq_id" value="@php echo $data['user_details']['enq_id']; @endphp">
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

<script>
    // Wait for the DOM to fully load
    document.addEventListener("DOMContentLoaded", function () {
        // Wait a bit in case Razorpay renders button after page load
        setTimeout(() => {
            const razorpayButton = document.querySelector('.razorpay-payment-button');
            if (razorpayButton) {
                razorpayButton.click();
            }
        }, 1000); // wait 1 second
    });
</script>


@endsection