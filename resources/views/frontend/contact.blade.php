@extends('frontend.layouts.app')

@section('content')







<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">

    <div class="custom-container">

        <div class="breadcrumb-content text-center">

            <ul>

                <li>

                    <a href="{{url('/')}}">Home</a>

                </li>

                <li class="active">Contact Us</li>

            </ul>

        </div>

    </div>

</div>





<div class="contact-us-area pt-65 pb-55">

    <div class="container">

        <div class="section-title-2 mb-45 wow tmFadeInUp"

            style="visibility: visible; animation-name: medizinAnimationFadeInUp;">

            <h2>We're always eager to hear from you!</h2>

            <p>You can call us in working time or visit our office. All mails will get the response within 24 hours.

                Love to hear from you! </p>

        </div>

        <div class="contact-info-wrap-2 mb-40">

            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 col-sm-5 wow tmFadeInUp"

                    style="visibility: visible; animation-name: medizinAnimationFadeInUp;">

                    <div class="single-contact-info3-wrap mb-30">

                        <div class="single-contact-info3-icon">

                            <i class="fal fa-map-marker-alt"></i>

                        </div>

                        <div class="single-contact-info3-content">

                            <h3>Address</h3>

                            <p class="width-1"> Shop No.42, Main market, Nehru Nagar, Lajpat Nagar, New Delhi, Delhi

                                110065</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-12 col-sm-7 wow tmFadeInUp">

                    <div class="single-contact-info3-wrap mb-30">

                        <div class="single-contact-info3-icon">

                            <i class="fal fa-phone"></i>

                        </div>

                        <div class="single-contact-info3-content">

                            <h3>Contact</h3>

                            <p> Mobile: <span>(+91) - 080760 04052</span></p>

                            <p> Hotline: <span>1800 1800 1800</span></p>

                            <p> Mail: <span>contact@oncoeasy.com</span></p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-12 col-sm-12 wow tmFadeInUp">

                    <div class="single-contact-info3-wrap mb-30">

                        <div class="single-contact-info3-icon">

                            <i class="fal fa-clock"></i>

                        </div>

                        <div class="single-contact-info3-content">

                            <h3>Hour of operation</h3>

                            <p> Monday - Friday: 09:00 - 20:00 </p>

                            <p> Sunday &amp; Saturday: 10:30 - 22:00</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="contact-map pb-70">

            <div id="map">

                <iframe

                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14015.963156956204!2d77.253952!3d28.5700393!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3c1f6ccc507%3A0xcc350025af5b5bec!2sOncoeasy.com%20(Oncoeasy%20Healthtech%20Pvt%20Ltd)!5e0!3m2!1sen!2sin!4v1699340829251!5m2!1sen!2sin"

                    style="border:0;" allowfullscreen="" loading="lazy"

                    referrerpolicy="no-referrer-when-downgrade"></iframe>



            </div>

        </div>



        <div class="row">

            <div class="col-xl-8 col-lg-10 ml-auto mr-auto">

                <div class="contact-from-area  padding-20-row-col wow tmFadeInUp"

                    style="visibility: hidden; animation-name: none;">

                    <h3>Ask us anything here</h3>



                    @if (\Session::has('success'))

                    <div class="alert alert-success">

                        {!! \Session::get('success') !!}

                    </div>

                    @endif



                    @if (\Session::has('error'))

                    <div class="alert alert-warning">

                        {!! \Session::get('error') !!}

                    </div>

                    @endif

                    

                    <form class="contact-form-style text-center"  action="{{url('/sendContact')}}" method="post">

                        @csrf

                     

                      

                        <div class="row">

                            <div class="col-lg-6 col-md-6">

                                <div class="input-style mb-20">

                                    <input name="name" placeholder="First Name" type="text"  value="{{old('name')}}">

                                    <span class="text-danger">

                                @error('name')

                                  {{ $message }}

                                @enderror

                                </span>

                                </div>

                               

                            </div>

                            <div class="col-lg-6 col-md-6">

                                <div class="input-style mb-20">
                                    <input type="hidden" value="{{$url = request()->url()}}" name="page_url">

                                    <input name="email" placeholder="Your Email" type="email"  value="{{old('email')}}">

                                    <span class="text-danger">

                                @error('email')

                                  {{ $message }}

                                @enderror

                                </span>

                                </div>

                               

                            </div>

                            <div class="col-lg-6 col-md-6">

                                <div class="input-style mb-20">

                                    <input name="phone" placeholder="Your Phone" type="phone"  value="{{old('phone')}}">

                                    <span class="text-danger">

                                @error('phone')

                                  {{ $message }}

                                @enderror

                                </span>

                                </div>

                               

                            </div>

                            <div class="col-lg-6 col-md-6">

                                <div class="input-style mb-20">

                                    <input name="subject" placeholder="Subject" type="text"  value="{{old('subject')}}">

                                    <span class="text-danger">

                                @error('subject')

                                  {{ $message }}

                                @enderror

                                </span>

                                </div>

                              

                            </div>

                            <div class="col-lg-12 col-md-12">

                                <div class="textarea-style mb-30">

                                    <textarea name="message" placeholder="Message">{{old('message')}}</textarea>

                                    <span class="text-danger">

                                @error('message')

                                  {{ $message }}

                                @enderror

                                </span>

                                </div>

                               

                            </div>
                            
                  


                            <div>

                                <button class="submit submit-auto-width" type="submit">Send message</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection

