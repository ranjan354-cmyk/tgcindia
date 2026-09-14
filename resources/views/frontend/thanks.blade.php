@extends('frontend.layouts.app')

@section('content')
 <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    .thank-you-section {
      background-color: #f1f1f1;
      padding: 40px 15px;
    }

    .custom-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .thank-you-box {
      background: linear-gradient(135deg, #f1f1f1, #fff);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      text-align: left;
    }

    .thank-you-box img {
      max-width: 100%;
      height: auto;
      margin-bottom: 30px;
    }

    .thank-you-box h2 a {
      color: #000;
      font-weight: bold;
      text-decoration: underline;
    }

    .thank-you-box p {
      margin: 8px 0;
      line-height: 1.6;
    }

    table {
      margin: 15px 0;
    }

    table img {
      width: 30px;
      height: 31px;
    }

    @media (max-width: 768px) {
      .thank-you-box {
        padding: 25px;
      }

      table {
        width: 100%;
        text-align: center;
      }
    }
  </style>
<!-- Breadcrumb Section -->
<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">
    <div class="custom-container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a style="font-size: 20px; color: #007bff; text-decoration: underline;" href="{{ url('/') }}">Go To Home</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Thank You Section -->
<div class="thank-you-section bg-light">
    <div class="custom-container">
        <div class="thank-you-content text-center">
            <!-- Background Box -->
            <div class="thank-you-box" style="margin-top: 65px;background: linear-gradient(135deg, #f1f1f1, #fff); border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);  auto;">
                <!-- Thank You Title -->
                <img src="{{url('public/uploads/thanks_tgc.png')}}">
               <div id="asd" class="v_module v_text_block  nothing_selected">
<h2 id="content"><strong><a style="color: #000; font-weight: bold; text-decoration: underline;" href="https://www.tgcindia.com/product-services-details-along-with-their-pricing-plans/">Get Our Courses Fee Details</a></strong></h2>
<p>Thanks for contacting Us.&nbsp;Your details have been received and we will get back to you soon. You can also connect with us on <strong>Social Media</strong>:</p>
<div class="social-link">
<a href="https://www.facebook.com/tgcin" target="_blank" aria-label="TGC India"><i class="fa fa-facebook" style="background: #3A5999" aria-hidden="true"></i></a>

<a href="#" target="_blank" aria-label="TGC India"> <i class="fa fa-instagram" style="background: #8034B0" aria-hidden="true"></i></a>

<a href="https://x.com/tgcindia" target="_blank" aria-label="TGC India"><i class="fa fa-twitter" style="background: #FE0000" aria-hidden="true"></i></a>

<a href="https://www.linkedin.com/in/tgcdelhi?originalSubdomain=in" target="_blank" aria-label="TGC India"><i class="fa fa-linkedin" style="background: #0D75A8" aria-hidden="true"></i></a>


<a href="https://www.youtube.com/tgcanimation" target="_blank" aria-label="TGC India"><i class="fa fa-youtube" style="background: #FF0000;" aria-hidden="true"></i></a>

</div>
<h2><strong>TGC India</strong></h2>
<br>
<p><strong>New Delhi Center:&nbsp;</strong></p>
<p>H-85A, South Extension, Part-I,</p>
<p>Near Bengali Sweets</p>
<p>New Delhi-110049 (India)</p>
<p><strong>Email:</strong> info@tgcindia.com</p>
<p><strong>Phone Numbers:&nbsp;</strong></p>
<p><strong>Toll Free No.:</strong> 18001020418(No Call Charges to Caller)</p>
<p><strong>Course Counselors:</strong> +91-11-46026939, 41680790, +91-9582786406/07</p>
<p><strong>Placement: &nbsp;</strong>9582786408, 9999139696</p>
<p><strong>Marketing and Sales:</strong> &nbsp;9582786408, 9810031162</p>
<p><strong>Recruitment:</strong> 9582786408, 9999139696</p>
<p><strong>Accounts:</strong> +91-11-65648689</p>
<p><strong>Whatsapp:</strong> +91-9582786407/08</p>
<p>&nbsp;</p>
<p><strong>Social Media:</strong></p>
<p><strong>FB:</strong> tgcindia.com/tgcin</p>

<p><strong>X:</strong> @tgcindia</p>
<p>&nbsp;</p>
<p><strong>East Delhi:&nbsp;</strong></p>
<p>4, Park End, 2nd Floor, Vikas Marg (Above Prince jeweller’s) Preet Vihar Opposite to Metro Pillar No. 100, Delhi-110092</p>
<p><strong>Toll Free No.:</strong> 18001020418</p>
<p><strong>Course Counselors:</strong>&nbsp;+91 9582786406, 9528786407, 9999139696, 9990432666, 9810031162</p>
<p>&nbsp;</p>


<p><strong>Faridabad Centre:</strong></p>

<p>D-32, 2nd floor,

Near Gaurav Tower, Malviya Nagar,

Jaipur- 302017, Rajasthan</p>

<p>Call.: 7568872928</p>
<p><strong>Jaipur Center:&nbsp;</strong></p>
<p>D-32, 2nd floor, Near Gaurav Tower, Malviya Nagar, Jaipur- 302017, Rajasthan</p>
<strong>Dehradun Centre:</strong>

<p>TGC Animation and Multimedia, 
<br> 2nd Floor, Sajwan High Rise, GMS Road, <br>Near: Kamla Palace, Dehradun- 248001</p>

<p>Call.:  9410101902</p>

</div>
            </div>
        </div>
    </div>
</div>
@endsection
