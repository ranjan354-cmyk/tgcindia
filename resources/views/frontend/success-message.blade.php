@extends('frontend.layouts.app')

@section('content')



<div class="main-content">











 



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
<div class="alert alert-success">
  <strong>Success!</strong> Your payment has been successfully submitted Your Reference Id-{{$razorpayId}}.
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