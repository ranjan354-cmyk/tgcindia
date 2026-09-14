@extends('frontend.layouts.app')

@section('content')

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    
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

body{
font-family: 'Poppins', sans-serif;
background:#f4f6fb;
}

.question-card{
background:white;
border-radius:12px;
padding:25px;
margin:70px 0;
box-shadow:0 8px 25px rgba(0,0,0,0.08);
list-style:none;
}

.question-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:15px;
}

.qno{
font-weight:600;
font-size:18px;
color:#333;
}

.topic{
font-size:13px;
color:#6c757d;
}

.question-text{
font-size:17px;
margin-bottom:20px;
color:#222;
}

.options{
padding:0;
}

.options li{
list-style:none;
margin-bottom:12px;
}

.option{
display:flex;
align-items:center;
padding:12px 15px;
border:1px solid #e3e6f0;
border-radius:8px;
cursor:pointer;
transition:0.3s;
font-size:15px;
}

.option:hover{
background:#f8f9ff;
border-color:#4e73df;
}

.option input{
display:none;
}

.checkmark{
height:18px;
width:18px;
border:2px solid #bbb;
border-radius:50%;
margin-right:10px;
position:relative;
}

.option input:checked + .checkmark{
border-color:#4e73df;
}

.option input:checked + .checkmark::after{
content:'';
position:absolute;
width:10px;
height:10px;
background:#4e73df;
border-radius:50%;
top:50%;
left:50%;
transform:translate(-50%,-50%);
}

.question-footer{
margin-top:15px;
text-align:right;
}

.report{
font-size:13px;
color:#dc3545;
text-decoration:none;
}

.report:hover{
text-decoration:underline;
}

.exam-header{
position:sticky;
    top: 80px;
z-index:999;
display:flex;
justify-content:space-between;
align-items:center;
padding:12px 20px;
background:rgba(255,255,255,0.9);
backdrop-filter:blur(10px);
box-shadow:0 4px 20px rgba(0,0,0,0.08);
border-radius:10px;
margin-bottom:20px;
}

.timer-box{
font-size:18px;
font-weight:600;
color:#333;
display:flex;
align-items:center;
gap:10px;
}

.timer-box i{
color:#ff4d4f;
font-size:20px;
}

.timer-box small{
font-size:12px;
color:#888;
margin-left:3px;
}

.question-select{
display:flex;
align-items:center;
gap:10px;
}

.question-select label{
font-weight:500;
color:#555;
}

.question-select select{
padding:6px 10px;
border-radius:6px;
border:1px solid #ddd;
font-size:14px;
cursor:pointer;
transition:0.2s;
}

.question-select select:hover{
border-color:#4e73df;
}

.submit-test-btn{
width:100%;
padding:14px;
border:none;
border-radius:8px;
font-size:16px;
font-weight:600;
letter-spacing:0.5px;
color:white;
background:linear-gradient(135deg,#4e73df,#224abe);
cursor:pointer;
transition:all 0.3s ease;
box-shadow:0 6px 18px rgba(78,115,223,0.4);
}

.submit-test-btn:hover{
transform:translateY(-2px);
box-shadow:0 10px 25px rgba(78,115,223,0.5);
background:linear-gradient(135deg,#3759d7,#1b3fa8);
}

.submit-test-btn:active{
transform:scale(0.97);
}
  </style>
  <style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
       
    }
    .full-screen-test {
        height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        overflow-y: auto;
        
        box-sizing: border-box;
        background: #fdfdfd;
    }
    .exam-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 1200px;
        margin-bottom: 20px;
        align-items: center;
    }
    .timer-box {
        font-size: 18px;
        background: #fff;
        padding: 8px 15px;
        border-radius: 6px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
    }
    .timer-box i { margin-right: 5px; }
    .question-select select { padding: 6px 12px; border-radius: 5px; }
    .question-card {
        width: 100%;
        max-width: 1200px;
        background: #fff;
        margin-bottom: 15px;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .question-header { display: flex; justify-content: space-between; margin-bottom: 10px; }
    .options li { list-style: none; margin-bottom: 8px; }
    .option { display: flex; align-items: center; cursor: pointer; }
    .option input { margin-right: 10px; }
    .submit-test-btn { margin-top: 20px; padding: 10px 25px; font-size: 16px; background: #28a745; color: #fff; border: none; border-radius: 6px; cursor: pointer; }
    .submit-test-btn:hover { background: #218838; }
    #btnFullscreen {background: red;
   
    border: 1px solid red;
    color: #fff;
    padding: 10px; }
    #btnFullscreen:hover { background: #0056b3; }
    .tab.disabled {
    opacity: 0.5;
    pointer-events: none; /* Prevent clicks normally */
}

#tabsRow {
    position: sticky;
    top: 0; /* distance from top */
    background: #fff;
    z-index: 10;
}

/* Optional shadow when sticky */
#tabsRow.sticky {
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.clr-option{
    float:left;
}
</style>


<style>
    /* Reset & base styles */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Poppins', sans-serif; line-height: 1.6; background: #f4f4f9; color: #333; }

    /* Container for all sections */
    .sections-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        
        
        max-width: 1200px;
        margin: auto;
    }

    /* Individual section cards */
    .section-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .section-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0,0,0,0.2);
    }

    /* Icon / image circle */
    .section-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 36px;
        margin-bottom: 20px;
    }

    /* Section title */
    .section-card h3 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #111;
    }

    /* Section description */
    .section-card p {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
    }

    /* Responsive tweaks */
    @media(max-width: 768px) {
        .sections-container { padding: 30px 10px; gap: 15px; }
        .section-card { padding: 25px 15px; }
    }
    
     table { width: 100%; border-collapse: separate; border-spacing: 20px; table-layout: fixed; }
    th { text-align: center; font-size: 18px; padding-bottom: 10px; color: #333; }
    
    td {
        background: #fff;
        border: 2px solid #007bff; /* blue border */
        border-radius: 12px;
        padding: 30px 15px;
        text-align: center;
        vertical-align: top;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
    }

    td:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        border-color: #6a11cb; /* gradient-like effect on hover */
    }

    .section-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        margin: 0 auto 15px;
    }

    .section-title {
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: 600;
        color: #111;
    }

    .section-desc {
        font-size: 15px;
        color: #555;
        line-height: 1.5;
    }

    /* Responsive: stack sections vertically on small screens */
    @media(max-width: 768px){
        table, tr, td { display: block; width: 100%; }
        td { margin-bottom: 20px; }
    }
    .activetab{
            background: red;
    color: #fff;
    }
    .submit-footer {
    position: sticky;      /* stick relative to parent container */
    bottom: 0;             /* at bottom of container */
    background: #fff;      /* white background to overlay content */
    padding: 10px 0;
    text-align: center;
    border-top: 1px solid #ddd;
    z-index: 999;
}

.submit-test-btn {
    padding: 12px 25px;
    font-size: 16px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.submit-test-btn:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

.form-box{
    max-width:700px;
    margin:40px auto;
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.1);
}

.form-title{
    text-align:center;
    font-size:22px;
    font-weight:600;
    margin-bottom:20px;
}
.stuent-btn{
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 8px 0;
    font-weight: 500;
    background: var(--tgc-red);
}
</style>
  <!-- Hero Section -->
  
   <section class="position-relative overflow-hidden">
       <div><br></div>  <div><br></div>  <div><br></div>  <div><br></div>  <div><br></div>  <div><br></div> <div><br></div> <div><br></div> <div><br></div> <div><br></div>
       </section>
 
 
 
  <section class="position-relative overflow-hidden">
  
<div class="container">
  @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form method="POST" action="{{route('saveEligibilityTestRegistration')}}" class="form-box">
@csrf
<h4 style="text-align: center !important;">Creative Aptitude Test Enrollment</h4>
<p style="text-align: center !important;">Enroll now to Begin Your Scholarship Assessment!</p>
<hr>
<div class="row">

<div class="col-md-6 mt-3">
<label>Full Name</label>
<input type="text" name="full_name" class="form-control" placeholder="Enter Full Name" required>
</div>

<div class="col-md-6 mt-3">
<label>Email ID</label>
<input type="email" name="email_id" class="form-control" placeholder="Enter Email" required>
</div>

<div class="col-md-6 mt-3">
<label>Mobile Number</label>
<input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile Number" required>
</div>

<div class="col-md-6 mt-3">
<label>Qualification</label>
<select name="qualification" class="form-control">
<option value="">Select Qualification</option>
<option value="10th">10th</option>
<option value="12th">12th</option>
<option value="Graduate">Graduate</option>
<option value="Post Graduate">Post Graduate</option>
</select>
</div>

<div class="col-md-6 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control" placeholder="Enter City">
</div>

<div class="col-md-6 mt-3">
<label>Course Interested</label>
<select name="course_interest" class="form-control">
<option value="">Select Course</option>
<option value="Digital Marketing">Digital Marketing</option>
<option value="Web Development">Web Development</option>
<option value="Graphic Design">Graphic Design</option>
<option value="Data Science">Data Science</option>
</select>
</div>

<div class="col-md-12 mt-3">
<label>Full Address</label>
<textarea name="full_address" class="form-control" rows="3" placeholder="Enter Full Address"></textarea>
</div>

<div class="col-md-12 text-center mt-3">
<button type="submit" class="btn btn-primary stuent-btn">Submit Registration</button>
</div>

</div>

</form>
      
</div>
</section>


  
		</div>
		

	

@endsection
