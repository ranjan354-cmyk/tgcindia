@extends('frontend.layouts.app')

@section('content')



<div class="main-content">





  <section class="corp-banner">

    <img src="{{ url('assets/front/') }}/img/terms,-discalimer,-intellectual-property,-refund-policy,-privacy.webp" alt="TGC India reviews">

  </section>





  <section class="al_j">



    <div class="container">



      <div class="row">



        <div class="col-md-9">



          <div class="policy_content">



            <h3>Privacy Policy</h3>



            <p>This Privacy Policy (“Privacy Policy”) explains how Total Graphics Classes Pvt. Ltd, Inc. (“Total Graphics Classes Pvt. Ltd,” “we” or “us”) collect, use and share personally identifiable information of visitors to our web site (the “Site”) and users of our products and services (the “Services”).</p>

            <p><strong>ABOUT US</strong></p>

            <p>The main purpose of this website is to allow visitors enroll in and take online courses on a variety of topics (“Courses”) to be taught by trainers with reputable practical experience.</p>

            <p><strong>INFORMATION COLLECTED BY Total Graphics Classes Pvt. Ltd</strong></p>

            <p>The information provided on this site by the visitors would be in two categories</p>

            <ul>

              <li>Information relating to the use of the site or the services provided by the site which includes enrollment information for courses (“site information”).</li>

              <li>Information relating to the taking of the courses required to satisfy the course requirements such as answers to questions, projects and assignments and other submissions.(“Course Information”)</li>

            </ul>

            <p>The site information is needed for record and identification purposes of visitors with respect to the website. The course information is necessary to fulfil all the requirements of a certification award at the end of each course.</p>

            <p>All these information (site information and course information) provided by the visitors would not be sold, exchanged or disclosed to any third party for marketing purposes without due diligence being followed in which an opt-out information would be provided. All visitors would reserve their rights to opt out of information about new offers, discounts and general information.We do not collect information about our visitors from email databases, private/ public organization or bodies.</p>

            <p>Site information may be used at a later date to contact visitors via email or telephone, typically to get feedback, to inform the visitors about new products or provide support on other issues, Ifyou do not want to be contacted by email, you can unsubscribe at any time.</p>

            <p>The site information obtained during course registration and payment are</p>

            <ul>

              <li>Name</li>

              <li>E-mail address</li>

              <li>Telephone number</li>

              <li>Address(s)</li>

              <li>Credit card number</li>

              <li>Expiration, and CVV number,</li>

            </ul>

            <p>All these information are stored in our registration and order-entry systems. Credit Card. information is never stored in our system as it is processed by our payment gateway which uses Secure Encryption Technology (SSL). Our payment processing partners are XXX. Site information can be updated, changed, modified or deleted by the visitor.The site reserves the exclusive right to Images and videos submitted or uploaded on the site. This includes images and videos taken during any event organized by the site. These images and videos may be reused in testimonials, brochures, banners and on Social Media such as Facebook, Twitter, YouTube etc. If you do not want your information to be used in such manner, you can write us at Support@tgcindia.com.</p>

            <p>Other site information of visitors such as frequency of visits, type and time of transaction, type of browser, browser language, features used on the site, IP address and Operating system might be automatically tracked in an aggregate manner without personally identifying the specific visitor. These set of information are used for site analysis intended to be used to improve the quality of service and efficiency of the site and can be provided to third parties for them to have a better understanding, of the operations and services of the site, all in the bid to constantly improve the inner workings of the site and align it’s daily activities to the Vision of Site.</p>

            <p><strong>COOKIE POLICY</strong></p>

            <p>This site uses cookies. A cookie is a string of information that this site is going to store on the visitor’s computer, which the visitor’s browser provides to the site, each time the visitor returns. The cookie does not personally identify the visitor. The purpose of the cookie is to enhance User experience on the site, analyze website performance and may also be used for future discounts and price offers.</p>

            <p><strong>INFORMATION PROVIDED BY Total Graphics Classes Pvt. Ltd</strong></p>

            <p>When this Privacy Policy uses the generic term “information” it is intended to address the general use of information, and not your specific Site Information or Course Information. This site would regularly provide information for courses, such as reference materials and course materials . These materials are posted for the sake of education and guidance only and would be updated from time to time. All materials provided by the site is copyrighted and cannot be posted on the internet except exclusive permission is granted by the support team. All Materials that would be downloaded on this site are virus free , however this site would not be held liable for any damage done by Virus Infection.</p>

            <p><strong>THIRD PARTY WEBSITES</strong></p>

            <p>This site would not be responsible for the privacy polices of any third party websites. Any links to a third party websites on the site for whatever reason doesn’t not constitute any form of endorsement or association.</p>

            <p>By using the Site, Services, or Courses you consent to the collection, use and disclosure of your personally identifiable Site Information and Course Information, as applicable, in accordance with this Privacy Policy. This site reserves the right to change, modify or update it’s privacy policy from time to time. All registered users would receive notification for any change, modification or update to the privacy policy</p>

            <p><strong>CONTACT US</strong></p>

            <p>Any questions, comments or enquiries pertaining to our privacy policies can be forwarded to<br>

              info@tgcindia.com<br>

              Attn: Privacy Policy</p>



          </div>



        </div>



        <div class="col-md-3">



          <div class="form-contact pi-place">

            <div class="india-row">

									<div class="india-row-image">

										<div class="india-contact">

											<p>For Voice Call</p>

											<strong> <a href="tel:+91-95827 86407" target="_blank">+91-95827 86407</a></strong>

										</div>

										<div class="india-image">

											

											<img src="{{ url('assets/front/') }}/img/icon/c.png" width="43" height="34" alt="Company-phone">

										</div>

									</div>

									<div class="india-row-image">

										<div class="row-contact">

											<p>WhatsApp Chat:</p>

											<strong> <a href="https://wa.me/9195827 86407" target="_blank">+9195827 86407</a></strong>

										</div>

										<div class="row-image">
										<img src="{{ url('assets/front/') }}/img/icon/Whatsapp-n.png" width="43" height="34" alt="Whatsapp">

											

										</div>

									</div>

								</div>



          </div>



          <div class="sticky-form placement-form-st">

            <div class="form-column">

              <strong>Request more information</strong>

              @if(session('success13'))
												<div class="alert alert-success">
													{{ session('success13') }}
												</div>
											@endif

											@if(session('error'))
												<div class="alert alert-danger">
													{{ session('error') }}
												</div>
											@endif
									<form method="post" action="{{ url('/coursePage10') }}" onsubmit="return homeController.saveEnquirySide(this)">
									@csrf
										<input type="hidden" name="from" value="Placement">

										<input type="hidden" name="from_title" value="Side Bar Placement">
										<input type="hidden" name="form_type" value="privacy_policy">
										
										<input type="text" name="name"  value="{{ old('name') }}"  placeholder="Enter Name" maxlength="35">
										@error('name')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Email">  
										@error('email')
											<p style="color: red;">{{ $message }}</p>
										@enderror

										<input name="phone" id="emrol_ph" value="{{ old('phone') }}" placeholder="Enter phone*" type="text" />
										@error('phone')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="location" value="{{ old('location') }}" placeholder="Enter Location">
										@error('location')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										<input type="text" name="course_interest" value="{{ old('course_interest') }}" placeholder="Enter Course of interest">
										@error('course_interest')
											<p style="color: red;">{{ $message }}</p>
										@enderror



										<textarea name="message"  placeholder="Enter remark">{{ old('message') }}</textarea>
										@error('message')
											<p style="color: red;">{{ $message }}</p>
										@enderror

										<button type="submit" class="button5 mt-2">Submit</button>
									</form>


              <br>

              <p style="font-size:12px; margin-top:-13px">By registering here, I agree to TGC India <a href="{{url('terms-conditions.html')}}" target="_blank">Terms &amp; Conditions</a> and

                <a href="{{url('privacy-policy.html')}}" target="_blank">Privacy Policy</a>

              </p>

            </div>

          </div>

        </div>











        <!-- ================== Modal Start ========================= -->







        <!-- Modal -->



        <div class="modal fade product_view" id="product_view">



          <div class="modal-dialog carrermodal" role="document">



            <div class="modal-content">



              <div class="modal-header">



                <h5 class="modal-heading">Apply as a Trainer</h5>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                  <span aria-hidden="true">×</span>



                </button>



              </div>



              <div class="modal-body">







                <div class="career-form-modal">



                  <div class="form-item">



                    <form action="" method="post" onsubmit="return homeController.saveApplyJob(this)" autocomplete="off" enctype="multipart/form-data">



                      <input type="hidden" name="from" value="Careers">

                      <input type="hidden" name="jobtitle" class="from_title" value="Apply as a Trainer">

                      <input type="hidden" name="type" class="type" value="Trainer">





                      <div class="row">



                        <div class="name">



                          <div class="col-2">



                            <p>Name*</p>



                          </div>



                          <div class="col-2">



                            <select name="title" id="">



                              <option value="Mr.">Mr.</option>



                              <option value="Mrs.">Mrs.</option>



                            </select>



                          </div>



                          <div class="col-8" style="padding-left:10px;">



                            <input type="text" placeholder="Name Here" name="name" maxlength="35">



                          </div>



                        </div>



                        <div class="name">



                          <div class="col-2">



                            <p>Email*</p>



                          </div>



                          <div class="col-10">



                            <input type="email" name="email" placeholder="Email Here...">



                          </div>



                        </div>







                        <div class="name">



                          <div class="col-2">



                            <p>Mobile*</p>



                          </div>



                          <div class="col-10">



                            <input type="tel" name="phone" onkeypress="return isNumberKey(event);" placeholder="Enter Your Mobile No.">



                          </div>



                        </div>







                        <div class="name">



                          <div class="col-2">



                            <p>Mode*</p>



                          </div>



                          <div class="col-4">



                            <select name="mode" id="">



                              <option selected="" disabled="" value="">Select Mode</option>



                              <option value="online">Online</option>



                              <option value="Offline">Offline</option>

                              <option value="Both">Both</option>



                            </select>



                          </div>



                          <div class="col-2">



                            <p style="text-align: center;">Slot*</p>



                          </div>



                          <div class="col-4">



                            <select name="slot" id="">



                              <option selected="" disabled="" value="">Select Slot</option>



                              <option value="weekday">Weekday</option>



                              <option value="weekend">Weekend</option>

                              <option value="both">Both</option>



                            </select>



                          </div>



                        </div>



                        <div class="name">



                          <div class="col-4">



                            <p>Availability*</p>



                          </div>



                          <div class="col-8">



                            <select id="" name="availability" style="width:100%">



                              <option selected="" disabled="" value="">Select Availability</option>



                              <option value="Full Time">Full Time</option>



                              <option value="Part Time">Part Time</option>



                            </select>



                          </div>



                        </div>







                        <div class="name">



                          <div class="col-4">



                            <p>Total Experience*</p>



                          </div>



                          <div class="col-8">



                            <select name="experience" id="" style="width:100%">



                              <option value="" selected="" disabled="">Select</option>



                              <option value="0-1 year">0-1 year</option>



                              <option value="1-2 year">1-2 year</option>



                              <option value="2-3 year">2-3 year</option>



                              <option value="3-4 year">3-4 year</option>



                              <option value="4-5 year">4-5 year</option>



                              <option value="more than 5 year">more than 5 year</option>



                            </select>



                          </div>



                        </div>







                        <div class="name">



                          <div class="col-4">



                            <p>Primary Skills*</p>



                          </div>



                          <div class="col-8">



                            <input type="text" name="keyskills" placeholder="Enter Primary Skills">



                          </div>



                        </div>







                        <div class="name">



                          <div class="col-4">



                            <p>Secondary Skills</p>



                          </div>



                          <div class="col-8">



                            <input type="text" name="secondaryskills" placeholder="Enter Secondary Skills">



                          </div>



                        </div>







                        <div class="upload-resume">



                          <h6>Upload Your Resume</h6>



                          <p>Maximum upload file size- 2MB (.doc, .docx, .pdf)</p>



                          <div class="upload-sec">



                            <img src="{{ url('assets/front/') }}/img/icon/career-cv-img.png" alt="career-cv-img" style="margin-top: 10px;">



                            <p>Drag and Drop Files to upload</p>



                            <label for="upload" class="btn btn-sm">+ Select Files to upload</label>



                            <input type="file" class="text-center form-control-file custom_file" id="upload" name="resume" accept=".doc, .docx,.pdf"><br>



                            <label for="file_name" style="font-size: 12px;"></label>



                          </div>



                        </div>



                      </div>



                      <div class="submit-btn">



                        <button type="submit" name="submit" class="btn red">Submit</button>



                        <button type="button" class="btn grey" data-dismiss="modal">Cancel</button>



                      </div>



                    </form>

                    <p>By registering here, I agree to Croma Campus <a href="{{url('terms-conditions.html')}}" target="_blank">Terms &amp; Conditions</a> and <a href="{{url('privacy-policy.html')}}" target="_blank">Privacy Policy</a> </p>



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