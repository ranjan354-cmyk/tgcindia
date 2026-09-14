@extends('frontend.layouts.app')

@section('content')

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    html {
      scroll-behavior: smooth;
    }
    .rounded-xl {
      border-radius: 1rem !important;
    }
    .ddt{
        margin-top: 175px !important;
    }
    .card {
    float: left;
    min-height: unset !important;
    padding-bottom: 25%;
    position: relative;
    text-align: center;
    width: 100%;
}
.pt{
    margin-top: 4px;
}
.badge-primary {
    color: #fff;
    background-color: red;
}
.btnnt{
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 8px 0;
    font-weight: 500;
    background: var(--tgc-red);
}
p{
font-size: 15px !important;
}
.bg-indigo-600 {
    --tw-bg-opacity: 1;
    background-color: rgb(79 70 229 / var(--tw-bg-opacity, 1));
}

.rounded-lg {
    border-radius: 0.5rem;
}
.bg-indigo-600 {
   
    background-color: rgb(67 59 201) !important ;
}

@media (max-width: 767.98px) {
 
  
  .pt {
    margin-top: -6px !important;
}

.ppt{
        font-size: 0.9rem;
    width: 2.5rem !important;
    height: 2.5rem !important;
    display: flex
;
    align-items: center;
    justify-content: center;
}
}

li{
        text-align: left !important;
}h4{
        text-align: left !important;
}h3{
  text-align: left !important;    
}
p{
        text-align: left !important;
}
.ultxt{
  list-style: auto;
    padding-left: 20px;  
}
.txtgap{
        margin-left: 15px;
}
  </style>
  
  <!-- Hero Section -->
  <section class="position-relative overflow-hidden">
    <div class="position-absolute w-100 h-100" style="top:0; left:0; background: linear-gradient(135deg, #E8EAF6, #ffffff);"></div>
    <div class="container py-5 py-lg-6 position-relative ddt">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="display-4 font-weight-bold">Become a TGC Franchise Partner</h1>
          <p class="lead text-muted mt-4">
            Join a creative education brand with 20+ years of presence and strong placement outcomes across design, animation, VFX, web, and data programs. Build a centre that students trust and companies recognize.
          </p>
          <div class="mt-4">
            <a href="#features" class="btn btn-outline-secondary mr-2">See Features</a>
            <a href="#next" class="btn btn-primary">Start Application</a>
          </div>
          <div class="mt-4 d-flex flex-wrap text-muted">
            <div class="mr-4"><strong>Pan‑India</strong> presence</div>
            <div class="mr-4"><strong>Industry</strong> trainers</div>
            <div><strong>Placement</strong> network</div>
          </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="card bg-white shadow-sm rounded-xl p-4">
            <div class="row text-center">
              <div class="col-4">
                <h3 class="font-weight-bold">25+</h3>
                <p class="text-muted  mb-0">Years</p>
              </div>
              <div class="col-4">
                <h3 class="font-weight-bold">20k+</h3>
                <p class="text-muted  mb-0">Alumni</p>
              </div>
              <div class="col-4">
                <h3 class="font-weight-bold">1000+</h3>
                <p class="text-muted  mb-0">Hiring Partners</p>
              </div>
            </div>
            <hr>
            <p class="text-muted  mt-3 mb-0">
              Programs: Graphic Design, UI/UX, Web Dev, 3D & VFX, Video Editing, Python, Data Analytics, AI
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="py-5 py-lg-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h2 class="h3 font-weight-bold">TGC Franchise Introduction</h2>
          <p class="text-muted mt-3">
            The franchise model is designed for owners who want a proven academic system, strong branding, and a steady student pipeline. You focus on operations and student experience while we provide curriculum, training, marketing playbooks, and placement support.
          </p>
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-sm-6 mb-4">
              <div class="card rounded-xl border h-100 p-4">
                <h3 class="font-weight-semibold">Brand</h3>
                <p class="mt-2  text-muted">Recognized name in creative and tech training with consistent results.</p>
              </div>
            </div>
            <div class="col-sm-6 mb-4">
              <div class="card rounded-xl border h-100 p-4">
                <h3 class="font-weight-semibold">Curriculum</h3>
                <p class="mt-2  text-muted">Industry‑aligned modules with regular updates and capstone projects.</p>
              </div>
            </div>
            <div class="col-sm-6 mb-4">
              <div class="card rounded-xl border h-100 p-4">
                <h3 class="font-weight-semibold">Marketing</h3>
                <p class="mt-2  text-muted">Launch kit, ad templates, and lead funnels tailored for your city.</p>
              </div>
            </div>
            <div class="col-sm-6 mb-4">
              <div class="card rounded-xl border h-100 p-4">
                <h3 class="font-weight-semibold">Admissions</h3>
                <p class="mt-2  text-muted">Counsellor scripts, pricing matrix, and CRM processes for faster closures.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Key Features -->
  <section id="features" class="py-5 py-lg-6 bg-light">
    <div class="container">
      <h2 class="h3 font-weight-bold">Key Features</h2>
      <div class="row mt-4">
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Ready‑to‑Use Academic Kit</h4>
            <ul class="mt-2  text-muted ultxt">
              <li>Course syllabi, lesson plans, assignments</li>
              <li>Assessments, rubrics, and showreel guidelines</li>
              <li>LMS structure and attendance formats</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Marketing & Admissions</h4>
            <ul class="mt-2  text-muted ultxt">
              <li>City‑specific campaigns and landing pages</li>
              <li>Lead forms, WhatsApp flows, call scripts</li>
              <li>Monthly review of targets and conversions</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Operations Playbook</h4>
            <ul class="mt-2  text-muted ultxt">
              <li>Centre setup guide and vendor list</li>
              <li>Timetables, batch planning, lab policy</li>
              <li>Quality audits and checklist templates</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Faculty Development</h4>
            <ul class="mt-2  text-muted ultxt">
              <li>Hiring templates and demo‑class rubrics</li>
              <li>Trainer onboarding and upskilling calendar</li>
              <li>Peer review and mock interviews</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Placement Assistance</h4>
            <ul class="mt-2 text-muted ultxt">
              <li>Portfolio curation and interview practice</li>
              <li>Job fairs, company tie‑ups, referrals</li>
              <li>Internships and freelancing channels</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Technology Stack</h4>
            <ul class="mt-2 text-muted ultxt">
              <li>Licensed software roadmap options</li>
              <li>Hardware sizing guide for labs</li>
              <li>Backup and data‑safety SOPs</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Support -->
  <section id="support" class="py-5 py-lg-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="h3 font-weight-bold">Support You Receive</h2>
          <ul class="list-unstyled mt-4">
            <li class="mb-3 d-flex align-items-start">
              <div class="badge badge-pill badge-primary mr-3 ptt" style="font-size:0.9rem; width:2rem; height:2rem; display:flex; align-items:center; justify-content:center;">1</div>
              <p class="mb-0 text-muted pt">Pre‑launch market study and location guidance</p>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <div class="badge badge-pill badge-primary mr-3 ptt" style="font-size:0.9rem; width:2rem; height:2rem; display:flex; align-items:center; justify-content:center;">2</div>
              <p class="mb-0 text-muted pt">Centre layout and branding kit</p>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <div class="badge badge-pill badge-primary mr-3 ptt" style="font-size:0.9rem; width:2rem; height:2rem; display:flex; align-items:center; justify-content:center;">3</div>
              <p class="mb-0 text-muted pt">Lead gen plan with creatives and ad budgets</p>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <div class="badge badge-pill badge-primary mr-3 ptt" style="font-size:0.9rem; width:2rem; height:2rem; display:flex; align-items:center; justify-content:center;">4</div>
              <p class="mb-0 text-muted pt">Admission SOPs, fee plans, receipts and policies</p>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <div class="badge badge-pill badge-primary mr-3 ptt" style="font-size:0.9rem; width:2rem; height:2rem; display:flex; align-items:center; justify-content:center;">5</div>
              <p class="mb-0 text-muted pt">Academic audits and quarterly refreshers</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="card rounded-xl border bg-light h-100 p-4">
            <h3 class="font-weight-semibold">What we expect from you</h3>
            <ul class="text-muted mt-3">
              <li>Owner involvement in admissions and academics</li>
              <li>Local tie‑ups for seminars, college visits, workshops</li>
              <li>Adherence to brand guide, fee norms, and student policy</li>
              <li>Timely reporting and MIS sharing</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Placements -->
  <section id="placements" class="py-5 py-lg-6 bg-light">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-6">
          <h2 class="h3 font-weight-bold">Placement Assistance</h2>
          <p class="text-muted mt-3">Campus‑to‑corporate pathway with measurable outcomes.</p>
          <ul class="mt-4 text-muted">
            <li class="mb-2 d-flex align-items-start"><span class="mr-2">&#8226;</span> Portfolio reviews and showcase events</li>
            <li class="mb-2 d-flex align-items-start"><span class="mr-2">&#8226;</span> Aptitude, software, and mock interview rounds</li>
            <li class="mb-2 d-flex align-items-start"><span class="mr-2">&#8226;</span> Job alerts from our recruiter network</li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="card rounded-xl border bg-white h-100 p-4">
            <h3 class="font-weight-semibold">Company Connect</h3>
            <p class="text-muted  mt-2">Studios, agencies, startups, and IT firms in Delhi NCR and other metros.</p>
            <div class="row mt-3">
              <div class="col-sm-6 mb-2"><div class="p-3 bg-light rounded-xl  text-muted">Graphic & UI/UX studios</div></div>
              <div class="col-sm-6 mb-2"><div class="p-3 bg-light rounded-xl  text-muted">VFX & post‑production houses</div></div>
              <div class="col-sm-6 mb-2"><div class="p-3 bg-light rounded-xl  text-muted">Web & product companies</div></div>
              <div class="col-sm-6 mb-2"><div class="p-3 bg-light rounded-xl  text-muted">Media & advertising agencies</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Training -->
  <section id="training" class="py-5 py-lg-6">
    <div class="container">
      <h2 class="h3 font-weight-bold">Training & Academics</h2>
      <div class="row mt-4">
        <div class="col-md-6 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Trainer Onboarding</h4>
            <ul class=" text-muted mt-2 ultxt">
              <li>Demo class rubric and subject mapping</li>
              <li>Shadowing, co‑teaching, and review cycles</li>
              <li>Periodic masterclasses from senior trainers</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">Student Outcomes</h4>
            <ul class=" text-muted mt-2 ultxt">
              <li>Project‑first delivery and showreel building</li>
              <li>Attendance policy and lab practice hours</li>
              <li>Certification pathway with portfolio review</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ROI Snapshot -->
  <section id="roi" class="py-5 py-lg-6 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="h3 font-weight-bold txtcenter">ROI Snapshot</h2>
          <p class="text-muted mt-3">Numbers vary by city, footfall, and course mix. We share the detailed sheet one‑on‑one.</p>
          <div class="row mt-4">
            <div class="col-sm-4 mb-3">
              <div class="card rounded-xl border bg-white p-4 h-100">
                <p class=" text-muted">Admission Capacity</p>
                <p class="h2 font-weight-bold">60–120</p>
                <p class=" text-muted">seats per quarter</p>
              </div>
            </div>
            <div class="col-sm-4 mb-3">
              <div class="card rounded-xl border bg-white p-4 h-100">
                <p class=" text-muted">Payback Window</p>
                <p class="h2 font-weight-bold">9–18 mo</p>
                <p class=" text-muted">subject to mix & spend</p>
              </div>
            </div>
            <div class="col-sm-4 mb-3">
              <div class="card rounded-xl border bg-white p-4 h-100">
                <p class=" text-muted">Marketing Plan</p>
                <p class="h2 font-weight-bold">City‑wise</p>
                <p class=" text-muted">quarterly planning</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card rounded-xl border bg-white h-100 p-4">
            <h3 class="font-weight-semibold">What we share privately</h3>
            <ul class=" text-muted mt-3 ultxt">
              <li>Setup estimates and vendor references</li>
              <li>Sample P&L with fee mix</li>
              <li>Staffing plan and salaries</li>
              <li>Marketing split and quarterly targets</li>
            </ul>
            <p class="mt-3  text-muted">Available on discussion and NDA if required.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Investment & Eligibility -->
  <section id="invest" class="py-5 py-lg-6">
    <div class="container">
      <h2 class="h3 font-weight-bold">Investment & Eligibility</h2>
      <div class="row mt-4">
        <div class="col-md-6 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">What you need</h4>
            <ul class=" text-muted mt-2 ultxt">
              <li>Commercial space 1500–3000 sq.ft. in a student hub</li>
              <li>Lab, classroom, counselling, and studio areas</li>
              <li>Local marketing budget and founder time</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card rounded-xl border h-100 p-4">
            <h4 class="font-weight-semibold">What we provide</h4>
            <ul class=" text-muted mt-2 ultxt">
              <li>Brand usage and centre design guide</li>
              <li>Academic kit, LMS structure, review templates</li>
              <li>Marketing playbooks and launch calendar</li>
            </ul>
          </div>
        </div>
      </div>
      <p class="mt-3 text-muted">Exact costs are shared during evaluation. Public page avoids sensitive numbers.</p>
    </div>
  </section>

  <!-- How to Proceed & Form -->
  <section id="next" class="py-5 py-lg-6 bg-light">
    <div class="container">
      <h2 class="h3 font-weight-bold">How to Proceed</h2>
      <ol class="mt-4 text-muted txtgap" style="list-style: auto;">
        <li class="mb-2 ">Share city, location pin, and approx. area</li>
        <li class="mb-2">Intro call and basic feasibility check</li>
        <li class="mb-2">Centre visit and brand presentation</li>
        <li class="mb-2">Detailed discussion on commercials and timelines</li>
        <li class="mb-2">Agreement, onboarding, launch plan</li>
      </ol>

      <div class="mt-5 card rounded-xl border bg-white p-4">
        <h3 class="font-weight-semibold">Send your interest</h3>
        <form id="interestForm" class="mt-4" method="post" action="{{route('saveFranchiser')}}">
            @csrf
            <input type="hidden" name="recaptcha_token" class="recaptcha_token">

          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control rounded-xl" placeholder="Full Name" name="full_name" required>
            </div>
            <div class="form-group col-md-6">
              <input type="tel" class="form-control rounded-xl" placeholder="Phone" name="phone" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="email" class="form-control rounded-xl" placeholder="Email" name="email" required>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control rounded-xl" placeholder="City & Location" name="location" required>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control rounded-xl" rows="4" placeholder="Tell us about your plan" name="plan"></textarea>
          </div>
          <button type="submit" class="btn btn-primary rounded-xl btnnt">Submit</button>
          <p id="form-msg" class="mt-3 text-success d-none">Thanks. We will reach out shortly.</p>
        </form>
      </div>
    </div>
  </section>
 <section class="architect_certification" id="faq_al">

  <div class="container">

    <div class="training_benefits custv">
<iframe loading="lazy" id="mytgcvideo" width="100%" height="541" src="https://www.youtube.com/embed/9rR3o-NKVjc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

</div>
</div>

</section>
 <section class="architect_certification" id="faq_al">

  <div class="container">

    <div class="training_benefits custv">

    <h3 class="boldi">
    
    Frequently Asked Questions (FAQs)
   </h3>

    </div>



    <div class="row">

      <div class="col-md-12">

        <div class="certi_ques">

          <ul uk-accordion="" class="ques_t uk-accordion">

            
            <li class="">

              <a class="uk-accordion-title" href="#" aria-expanded="false">Who is an ideal partner?</a>

              <div class="uk-accordion-content" hidden="">

                <p>
 Edupreneurs, studio owners, and working professionals from VFX, post, design, web or IT who can be hands-on with daily operations and local networking.
</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#" aria-expanded="false">Do I need prior education business experience?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Helpful but not mandatory. A strong local network, sales follow-ups, and consistent presence at the center matter more.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">What size space is recommended?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Approx. 1500–2000 sq ft with 2–3 labs, a counseling room, reception, and a studio-style classroom. Final layout is planned together.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">How long does it take to launch?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Typical range is 45–75 days post–MoU, depending on site readiness, hiring speed, and hardware delivery.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">What training will my team receive?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Counselor induction, sales scripts, demo flow, faculty onboarding, academic calendars, and ongoing upskilling with tool updates and masterclasses.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">Who hires the faculty?</a>

              <div class="uk-accordion-content" hidden="">

                <p>We assist with sourcing, screening, demo classes, and induction. Final appointments are made by the center.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">Do you help with marketing?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Yes—center page on tgcindia.com, creatives, campaign guidance for Google/Meta, and monthly reviews for ROAS and call-quality. Local execution is your team’s responsibility with our support.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">Will I get leads from TGC?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Yes, you will receive leads from central campaigns and your center page. You should also run local campaigns; we plan these with you.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">What about placements?</a>

              <div class="uk-accordion-content" hidden="">

                <p>A central placement cell, portfolio checks, mock interviews, and recruiter connects. City-wise outreach and drives are scheduled with your team.</p>

              </div>

            </li>

            
            <li class="">

              <a class="uk-accordion-title" href="#">Do you offer degrees or only diplomas?</a>

              <div class="uk-accordion-content" hidden="">

                <p>We focus on job-led diplomas. University collaborations and third-party certifications are shared based on current
                policy at onboarding time.</p>

              </div>

            </li>
            
            
            
              <li class="">

              <a class="uk-accordion-title" href="#">What software and hardware do I need?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Mid-to-high spec systems, licensed software, tablets where needed, and a content wall. A center-wise checklist is provided post–MoU.</p>

              </div>

            </li>
            
             <li class="">

              <a class="uk-accordion-title" href="#">What about MoU and agreement?</a>

              <div class="uk-accordion-content" hidden="">

                <p>We move from application → fitment call → site review → MoU → onboarding. Agreement terms and timelines are covered in the MoU stage.</p>

              </div>

            </li>
            
              <li class="">

              <a class="uk-accordion-title" href="#">Do you provide ERP?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Yes. Admissions, batches, fees, leads, and placement tracking are managed through our ERP with basic training.</p>

              </div>

            </li>
            
                <li class="">

              <a class="uk-accordion-title" href="#">Can I run other TGC brands at my center?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Subject to space and approval, we discuss School of Photography, Python Training Institute, and related verticals during onboarding.</p>

              </div>

            </li>

            <li class="">

              <a class="uk-accordion-title" href="#">What is the exit policy?</a>

              <div class="uk-accordion-content" hidden="">

                <p>Exit, transfer, and renewal terms are part of the agreement and explained during the MoU stage.</p>

              </div>

            </li>


          </ul>

        </div>

      </div>



      

</section>


  
		</div>



@endsection
