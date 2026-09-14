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

/* Desktop only */
@media only screen and (min-width: 768px) {
    .question-card {
        width: 630px;
    }
}

/* Mobile (optional, full width or auto) */
@media only screen and (max-width: 767px) {
    .question-card {
        width: 100%; /* or any smaller width */
    }
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
</style>

 <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      background: #f4f5f7;
      color: #1f2937;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .app-header {
      background: #ffffff;
      border-bottom: 1px solid #e5e7eb;
      padding: 18px 28px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
    }

    .brand-wrap {
      display: flex;
      align-items: center;
      gap: 22px;
    }

    .brand {
      font-size: 28px;
      font-weight: 800;
      letter-spacing: 0.5px;
    }

    .brand .tgc {
      color: #e31e24;
    }

    .brand .india {
      color: #666;
      font-weight: 500;
      margin-left: 6px;
    }

    .divider {
      width: 1px;
      height: 34px;
      background: #d1d5db;
    }

    .page-title {
      font-size: 22px;
      font-weight: 700;
      color: #222;
      
    }

    .user-bar {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .avatar {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: #d1d5db;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: #444;
    }

    .exit-btn {
      background: #fff1f2;
      color: #e31e24;
      border: 1px solid #fecdd3;
      padding: 12px 18px;
      border-radius: 999px;
      font-weight: 700;
      cursor: pointer;
    }

    .exam-shell {
      padding: 20px;
    }

    .top-strip {
      display: grid;
      grid-template-columns: 1.2fr 1fr 1.1fr auto;
      gap: 18px;
      background: #fff;
      border-radius: 20px;
      padding: 22px 26px;
      margin-bottom: 18px;
      border: 1px solid #ececec;
      align-items: center;
    }

    .meta-block {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .meta-label {
      font-size: 18px;
      font-weight: 700;
    }

    .meta-sub {
      font-size: 15px;
      color: #4b5563;
    }

    .timer-box {
      display: flex;
      align-items: center;
      gap: 14px;
      justify-content: center;
    }

    .timer-icon {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      border: 3px solid #e31e24;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #e31e24;
      font-size: 24px;
      font-weight: 700;
    }

    .timer-text {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .timer-text small {
      font-size: 15px;
      color: #6b7280;
      font-weight: 700;
    }

    .timer-value {
      font-size: 36px;
      font-weight: 800;
      color: #e31e24;
      line-height: 1;
    }

    .progress-wrap {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .progress-text {
      font-size: 16px;
      font-weight: 700;
    }

    .progress-bar {
      width: 100%;
      height: 10px;
      background: #e5e7eb;
      border-radius: 999px;
      overflow: hidden;
    }

    .progress-fill {
      width: 46%;
      height: 100%;
      background: #10b981;
      border-radius: 999px;
    }

    .submit-section-btn {
      background: #ef1f26;
      color: #fff;
      border: none;
      border-radius: 12px;
      padding: 16px 22px;
      font-size: 18px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 10px 20px rgba(239, 31, 38, 0.15);
    }

    .exam-layout {
      display: grid;
      grid-template-columns: 280px 1fr 290px;
      gap: 18px;
    }

    .panel {
      background: #fff;
      border-radius: 18px;
      border: 1px solid #ececec;
      padding: 18px;
          margin-top: 70px;
    }

    .section-card {
      border: 1.5px solid #f1f1f1;
      border-radius: 16px;
      padding: 16px;
      margin-bottom: 14px;
      background: #fafafa;
    }

    .section-card.active {
      border-color: #ef4444;
      background: #fff8f8;
    }

    .section-card h4 {
      font-size: 16px;
      margin-bottom: 6px;
    }

    .section-card p {
      color: #4b5563;
      font-size: 15px;
      margin-bottom: 8px;
      line-height: 1.4;
    }

    .section-status {
      font-size: 14px;
      font-weight: 700;
      color: #2563eb;
    }

    .locked {
      opacity: 0.75;
    }

    .test-progress-box {
      margin-top: 10px;
      border-top: 1px solid #ececec;
      padding-top: 20px;
    }

    .ring-wrap {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-top: 16px;
    }

    .ring {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background:
        conic-gradient(#22c55e 0 61deg, #e5e7eb 61deg 360deg);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .ring::after {
      content: "17%\A Completed";
      white-space: pre;
      text-align: center;
      width: 78px;
      height: 78px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #374151;
      font-size: 13px;
      font-weight: 700;
      line-height: 1.25;
    }

    .progress-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 10px;
      font-size: 15px;
      color: #374151;
    }

    .progress-list span {
      display: inline-block;
      width: 9px;
      height: 9px;
      border-radius: 50%;
      margin-right: 8px;
      vertical-align: middle;
    }

    .dot-green { background: #22c55e; }
    .dot-gray { background: #d1d5db; }

    .question-card {
      padding: 26px;
    }

    .question-head {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 20px;
      margin-bottom: 24px;
    }

    .question-title {
      font-size: 22px;
      font-weight: 700;
      line-height: 1.5;
    }

    .mark-pill {
      background: #fff1f2;
      color: #ef4444;
      padding: 10px 14px;
      border-radius: 999px;
      font-weight: 700;
      white-space: nowrap;
    }

    .options-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 18px;
      margin-bottom: 22px;
    }

    .option-card {
      border: 1.5px solid #e5e7eb;
      border-radius: 16px;
      padding: 18px;
      cursor: pointer;
      transition: 0.2s ease;
      background: #fff;
    }

    .option-card:hover {
      border-color: #fca5a5;
    }

    .option-card.selected {
      border-color: #ef4444;
      box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.08);
      background: #fffafa;
    }

    .option-preview {
      background: #fafafa;
      border: 1px solid #ededed;
      border-radius: 12px;
      padding: 18px;
      min-height: 128px;
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 14px;
    }

    .shape-red {
      width: 82px;
      height: 82px;
      background: #ef1f26;
      border-radius: 8px;
      flex-shrink: 0;
    }

    .shape-yellow {
      width: 66px;
      height: 66px;
      background: #f8b400;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .shape-blue {
      width: 60px;
      height: 60px;
      background: #1482d8;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .shape-rect-yellow {
      width: 46px;
      height: 80px;
      background: #f8b400;
      border-radius: 8px;
      flex-shrink: 0;
    }

    .shape-purple {
      width: 0;
      height: 0;
      border-left: 42px solid transparent;
      border-right: 42px solid transparent;
      border-bottom: 76px solid #8a3dc2;
      flex-shrink: 0;
    }

    .lines {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 9px;
    }

    .line {
      height: 8px;
      border-radius: 999px;
      background: #9ca3af;
    }

    .line.light {
      background: #d1d5db;
    }

    .line.w80 { width: 80%; }
    .line.w70 { width: 70%; }
    .line.w60 { width: 60%; }
    .line.w50 { width: 50%; }
    .line.w40 { width: 40%; }

    .option-label {
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 17px;
      font-weight: 600;
    }

    .radio {
      width: 24px;
      height: 24px;
      border: 2px solid #9ca3af;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .selected .radio {
      border-color: #ef4444;
    }

    .selected .radio::after {
      content: "";
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #ef4444;
    }

    .question-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 28px;
      color: #374151;
      font-size: 16px;
      font-weight: 600;
    }

    .clear-link {
      color: #ef1f26;
      font-weight: 700;
      cursor: pointer;
    }

    .bottom-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 18px;
    }

    .btn {
      border: none;
      cursor: pointer;
      border-radius: 12px;
      padding: 16px 28px;
      font-size: 18px;
      font-weight: 700;
    }

    .btn-light {
      background: #fff;
      border: 1px solid #d1d5db;
      color: #374151;
    }

    .btn-primary {
      background: #ef1f26;
      color: #fff;
      min-width: 250px;
      box-shadow: 0 10px 18px rgba(239, 31, 38, 0.18);
    }

    .palette-title {
      font-size: 20px;
      font-weight: 800;
      margin-bottom: 14px;
    }

    .legend {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      font-size: 14px;
      color: #4b5563;
      border-top: 1px solid #ececec;
      border-bottom: 1px solid #ececec;
      padding: 14px 0;
      margin-bottom: 18px;
    }

    .legend span::before {
      content: "";
      display: inline-block;
      width: 11px;
      height: 11px;
      border-radius: 50%;
      margin-right: 7px;
      vertical-align: middle;
    }

    .answered::before { background: #10b981; }
    .review::before { background: #f59e0b; }
    .skipped::before { background: #9ca3af; }

    .palette-sub {
      font-size: 16px;
      font-weight: 800;
      margin-bottom: 16px;
    }

    .palette-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 10px;
    }

    .qnum {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 18px;
      border: 2px solid transparent;
    }

    .qnum.ans {
      background: #ecfdf5;
      color: #10b981;
      border-color: #34d399;
    }

    .qnum.current {
      background: #ef1f26;
      color: #fff;
    }

    .qnum.skip {
      background: #f3f4f6;
      color: #4b5563;
    }

    .help-chip {
      margin-top: 28px;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 999px;
      padding: 16px 18px;
      text-align: center;
      font-weight: 700;
      color: #374151;
      box-shadow: 0 6px 16px rgba(0,0,0,0.04);
    }

    .footer-strip {
      margin-top: 18px;
      background: #fff;
      border-radius: 18px;
      border: 1px solid #ececec;
      padding: 20px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      font-size: 15px;
      color: #374151;
      flex-wrap: wrap;
    }

    .warning {
      color: #374151;
      font-weight: 700;
    }

    .warning strong {
      color: #ef1f26;
    }

    .footer-stats {
      display: flex;
      align-items: center;
      gap: 18px;
      flex-wrap: wrap;
    }

    .footer-stats .b {
      font-weight: 800;
      color: #ef1f26;
    }

    .status-dot {
      display: inline-flex;
      align-items: center;
      gap: 7px;
    }

    .status-dot::before {
      content: "";
      width: 12px;
      height: 12px;
      border-radius: 50%;
      display: inline-block;
    }

    .s-answered::before { background: #10b981; }
    .s-review::before { background: #f59e0b; }
    .s-skipped::before { background: #9ca3af; }

    @media (max-width: 1200px) {
      .exam-layout {
        grid-template-columns: 1fr;
      }

      .top-strip {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 768px) {
      .app-header {
        padding: 16px;
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
      }

      .brand-wrap {
        flex-wrap: wrap;
      }

      .top-strip {
        grid-template-columns: 1fr;
      }

      .options-grid {
        grid-template-columns: 1fr;
      }

      .bottom-actions {
        flex-direction: column;
        gap: 14px;
      }

      .btn-primary {
        width: 100%;
      }

      .palette-grid {
        grid-template-columns: repeat(5, 1fr);
      }
    }
    @media only screen and (max-width: 767px) {
    .mobile-hide {
        display: none !important;
    }
}
  </style>


  <!-- Hero Section -->
  
   <section class="position-relative overflow-hidden">
       <div><br></div>  <div><br></div>  <div><br></div>  <div><br></div>  <div><br></div>  <div><br></div> <div><br></div> <div><br></div> <div><br></div> <div><br></div>
       </section>
 
 
 
  <section class="position-relative overflow-hidden">
  

  

  

<section class="full-screen-test">
 

   <header class="app-header">
    <div class="brand-wrap">
      <div class="brand">
        <span class="tgc"><img src="https://www.tgcindia.com/assets/front/img/logo-tgc.png" alt="TGC India" class="imageind" loading="lazy"></span>
        
      </div>
      <div class="divider"></div>
      <div class="page-title" >Creative Aptitude Test</div>
        <div class="timer-box">
    <i class="fa fa-clock-o"></i>
    <span id="clock"></span>
</div>
    </div>

    <div class="user-bar">
      <div class="avatar">A</div>
      <div style="font-size: 16px; font-weight: 700;">Hi, Ankit Sharma</div>
      <button class="exit-btn" id="btnFullscreen">Go Full Screen</button>
    </div>
  </header>

<div class="row">
 
<div class="col-md-3 mobile-hide">
    <aside class="panel">
          @foreach($data['section'] as $key => $sectionvalue)
        <div class="section-card section_{{ $sectionvalue->id }} {{ $key === 0 ? 'active activetab' : 'locked' }} ">
          <h4>{{ $sectionvalue->section_name }}</h4>
          <p>{{ $sectionvalue->name }}</p>
        
        </div>
          @endforeach
        

      

        
      </aside>
    
</div>
<div class="col-md-6 col-sm-12">
<form id="testForm" method="post" action="{{route('save-eligibility-test') }}">
    @csrf
 <input type="hidden" id="start_time" name="start_time">
    <input type="hidden" id="end_time" name="end_time">

    
@foreach($dataArray as $index=>$dataArrayvalue)
      
     <li class="question-card section_{{ $dataArrayvalue['question']->section_id }}" id="question-card-{{ $dataArrayvalue['question']->id }}">

<div class="question-header">
    <div class="qno">Question {{++$index}}</div>
    <div class="topic"></div>
</div>

<input type="hidden" name="question[{{ $index }}][question_id]" value="{{ $dataArrayvalue['question']->id }}">


<div class="question-text" style="display:flex;">
   {{$dataArrayvalue['question']->question}}
   <div class="mark-pill" style="    width: 90px;
    float: right;
    margin-inline: 35px;">{{ $dataArrayvalue['question']->marks }} Mark</div>
</div>

<ol class="options">

@foreach($dataArrayvalue['options'] as $opt)
                <li>
                    <label class="option">
                        <input type="radio" 
                               name="question[{{ $index }}][answer][]" 
                               value="{{ $opt->id }}">
                        <span class="checkmark"></span>
                        {{ $opt->option_text }}
                    </label>
                </li>
                
                
                
            @endforeach


</ol>

<div class="question-footer">
    <a class="clr-option" href="#"  onclick="clearOption(this)"><strong>Clear Option</strong></a>
<a class="report" href="#" data-toggle="modal" data-target="#ReportModal{{ $dataArrayvalue['question']->id }}">Report Question</a>
</div>

<!-- Modal -->
  <div class="modal fade" id="ReportModal{{ $dataArrayvalue['question']->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report Question</h4>
        </div>
        <div class="modal-body">
          
              <div class="row">
                  <div class="col-md-12">
              <textarea class="form-control" placeholder="Reason"></textarea>
               </div>
               <div class="col-md-12">
                   <button class="btn btn-primary mt-3" type="submit">Submit</button>
               </div>
              </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

</li> 



@endforeach



<div class="submit-footer d-flex justify-content-between align-items-center">
    <button type="button" id="btn-prev" class="btn btn-secondary" style="display:none;">Previous</button>
    <button type="button" id="btn-next" class="btn btn-success" onclick="GetchCheckSection('hello')">Next & Submit</button>
    <button type="submit" id="btn-finish" class="btn btn-primary" disabled style="display:none;">Submit Test</button>
</div>
</form>
</div>
<div class="col-md-3 mobile-hide">
    
    <aside class="panel">
        <div class="palette-title" id="palettetitle"></div>

        <div class="legend">
          <span class="answered">Answered</span>
          <span class="review">Review</span>
          <span class="skipped">Skipped</span>
        </div>

        <div class="palette-sub" id="palette-sub">Q1 to Q15</div>
         @php $qCounter = 1; @endphp

@foreach($sectionArray as $sectionId => $questions)
        <div class="palette-grid section_wise_{{$sectionId}}" >
            
          @foreach($questions as $key=> $qId)

         <div class="qnum skip" 
     data-question-id="{{ $qId }}" 
     data-section-id="{{ $sectionId }}" 
     data-index="{{ $key }}" 
    >{{ $key + 1 }}</div>
        

          @endforeach
        </div>
      
@endforeach
        <div class="help-chip">Need Help?</div>
      </aside>
</div>

</div>
   </div>

      

</section>


  
		</div>
		
<script>
document.getElementById("btnFullscreen").addEventListener("click", function () {
    openFullscreen();
});
document.getElementById("btn-finish").addEventListener("click", function(e){
    e.preventDefault();

    if(confirm("Are you sure you want to submit the test?")){
        document.getElementById("testForm").submit();
    }
});
function getQuestion(currentIndex){
     $(".question-card").hide();
   $("#question-card-"+currentIndex).show(); 
    ///question-card-7
    
    
}


document.addEventListener("DOMContentLoaded", function() {

    // collect all question cards in an array
    const questions = Array.from(document.querySelectorAll(".question-card"));
    let currentIndex = 0;

    // function to show only the current question
    function showQuestion(index) {
        let currentQuestion = questions[index];
         let classes = currentQuestion.className.split(' ');

 let questionId = currentQuestion.id.replace('question-card-', '');

 //   console.log("Current Question ID:", questionId);
 addClassByQuestionId(questionId, 'current');

let sectionClass = classes.find(c => c.startsWith('section_'));


let sectionId = sectionClass.replace('section_', '');

///console.log("Section ID:", sectionId);
$(".section-card").removeClass("active");
$(".section-card").addClass("locked");
$(".section_"+sectionId).addClass("active");
$(".section_"+sectionId).removeClass("locked");

$("#palettetitle").html("Section "+sectionId);

   document.querySelectorAll(".palette-grid").forEach(grid => {
        grid.style.display = "none";
    });

 
    const firstSection = document.querySelector(".section_wise_"+sectionId);
    if(firstSection) {
        firstSection.style.display = "grid"; // use 'grid' if your CSS uses display: grid
    }

        showSection(sectionId);
        
        questions.forEach((q, i) => {
            q.style.display = i === index ? "block" : "none";
        });



        
        const offset = 120; 
        window.scrollTo({
            top: questions[index].offsetTop - offset,
            behavior: 'smooth'
        });

        // enable/disable buttons
        document.getElementById("btn-prev").disabled = index === 0;
        document.getElementById("btn-next").disabled = index === questions.length - 1;
    }

    // initial load: show first question
    showQuestion(currentIndex);

    // Next button
   document.getElementById("btn-next").addEventListener("click", function(){

   
    let currentQuestion = questions[currentIndex];
    
    
     let classes = currentQuestion.className.split(' ');

// let questionId = currentQuestion.id.replace('question-card-', '');

 //   console.log("Current Question ID:", questionId);
 ///addClassByQuestionId(questionId, 'current');

let sectionClass = classes.find(c => c.startsWith('section_'));
    let sectionId = sectionClass.replace('section_', '');
    
    
   

    let questionId = currentQuestion.id.replace('question-card-', '');

    console.log("Current Question ID:", questionId);
    
    console.log("Current Section ID:", sectionId);
    
    
   
    
    addClassByQuestionAnsweredId(questionId, 'ans');

    // âœ… optional: get selected answer
    let selected = currentQuestion.querySelector("input[type=radio]:checked");
    let answer = selected ? selected.value : null;

    console.log("Selected Answer:", answer);

    // ðŸ‘‰ move to next question
    if(currentIndex < questions.length - 1){
        currentIndex++;
        showQuestion(currentIndex);
    }
  if(currentIndex === questions.length - 1){
    document.getElementById("btn-finish").disabled = false;
    $("#btn-finish").css("display","block"); // show button
} else {
    $("#btn-finish").css("display","none"); // hide button
    document.getElementById("btn-finish").disabled = true;
}
    
  $.ajax({
    url: '{{route('reviewAnswer')}}', 
    type: 'POST',
    data: {
        _token: '{{ csrf_token() }}',
        answer: answer,  
        questionId: questionId, 
        sectionId: sectionId, 
         userid: 1, 
        
         
    },
    success: function(response) {
        console.log('Server Response:', response);
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error:', status, error);
    }
});
    
    
    

});

    // Previous button
    document.getElementById("btn-prev").addEventListener("click", function(){
        if(currentIndex > 0){
            currentIndex--;
            showQuestion(currentIndex);
        }
    });

});
function updateSectionQuestionCount() {
    // Find the currently visible section
    const visibleSection = document.querySelector(".palette-grid[style*='display: grid']");
    if (!visibleSection) return;

    // Get all questions inside the visible section
    const visibleQuestions = Array.from(visibleSection.querySelectorAll(".qnum"))
        .filter(q => window.getComputedStyle(q).display !== "none");

    // Get first and last question numbers
    const firstQ = visibleQuestions.length > 0 ? visibleQuestions[0].textContent : 0;
    const lastQ = visibleQuestions.length > 0 ? visibleQuestions[visibleQuestions.length - 1].textContent : 0;

    // Update palette-sub text dynamically
    document.getElementById("palette-sub").textContent = `Q${firstQ} â€“ Q${lastQ}`;
}

// Run on page load
document.addEventListener("DOMContentLoaded", updateSectionQuestionCount);

// Example: Update when switching sections dynamically
function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll(".palette-grid").forEach(sec => sec.style.display = "none");

    // Show the selected section
    const section = document.querySelector(`.section_wise_${sectionId}`);
    if (section) section.style.display = "grid";

    // Update question count for this section
    updateSectionQuestionCount();

    // Optionally, update section title
    document.getElementById("palettetitle").textContent = `Section ${sectionId}`;
}



// Example usage: show section 2
// showSection(2);
</script>
		<script>
		

		
		function clearOption(el){
    // prevent page jump
    event.preventDefault();

    // find the parent question-card
    var questionCard = $(el).closest('.question-card');

    // uncheck radio buttons inside that question
    questionCard.find('input[type=radio]').prop('checked', false);
}
		
function gotoQuestionNo(questionId) {
    console.log("Scrolling to question ID:", questionId);

    var target = $('#question-card-' + questionId);

    if(target.length) {
        // detect fullscreen element
        var fsElement = document.fullscreenElement || document.webkitFullscreenElement;

        if(fsElement) {
            // scroll inside the fullscreen container
            $(fsElement).animate({
                scrollTop: $(fsElement).scrollTop() + target.offset().top - $(fsElement).offset().top - 160
            }, 500);
        } else {
            // normal page scroll
            $('html, body').animate({
                scrollTop: target.offset().top - 160
            }, 500);
        }
    }
}
    
		
	function GetTabQuestion(sectionId,name){

    console.log(sectionId);
    $("#showsection").html(name);

    // active tab
    $(".tab").removeClass("activetab");
    $("#tab"+sectionId).addClass("activetab");

    // hide all questions
    $(".question-card").hide();

    // show selected section
    $(".section_"+sectionId).show();
}
		
const btn = document.getElementById('btnFullscreen');
const elem = document.querySelector('.full-screen-test');

btn.addEventListener('click', () => {
    if (!document.fullscreenElement) {
        elem.requestFullscreen();
        btn.innerText = "Exit Full Screen";
    } else {
        document.exitFullscreen();
        btn.innerText = "Go Full Screen";
    }
});

function addClassByQuestionId(questionId, newClass) {
    const questionDiv = document.querySelector(`.qnum[data-question-id='${questionId}']`);
    if (questionDiv) {
        questionDiv.classList.add(newClass);     // add the new class
        questionDiv.classList.remove('skip');    // remove the 'skip' class
    }
}

function addClassByQuestionAnsweredId(questionId, newClass) {
    const questionDiv = document.querySelector(`.qnum[data-question-id='${questionId}']`);
    if (questionDiv) {
        questionDiv.classList.add(newClass);     // add the new class
        questionDiv.classList.remove('current');    // remove the 'skip' class
    }
}

</script>
<script>
document.addEventListener("DOMContentLoaded", function(){

    let durationMinutes = 10;
    let totalSeconds = durationMinutes * 60;

    let clock = document.getElementById("clock");
    let form = document.getElementById("testForm");

    if(!clock || !form){
        console.error("Missing #clock or #testForm");
        return;
    }

    let storedEndTime = localStorage.getItem('quizEndTime');
    let endTime;

    // ✅ HANDLE EXISTING TIMER
    if(storedEndTime){
        endTime = new Date(storedEndTime);

        // ✅ If expired → reset
        if(endTime <= new Date()){
            localStorage.removeItem('quizEndTime');
            createNewTimer();
        }

    } else {
        createNewTimer();
    }

    // ✅ CREATE TIMER
    function createNewTimer(){
        let startTime = new Date();
        endTime = new Date(startTime.getTime() + totalSeconds * 1000);

        let startInput = document.getElementById("start_time");
        let endInput = document.getElementById("end_time");

        if(startInput && endInput){
            startInput.value = startTime.toISOString();
            endInput.value = endTime.toISOString();
        }

        localStorage.setItem('quizEndTime', endTime.toISOString());
    }

    // ✅ TIMER FUNCTION
    function updateClock(){
        let now = new Date();
        let diff = Math.floor((endTime - now) / 1000);

        if(diff <= 0){
            clearInterval(timer);
            clock.innerHTML = "Time Up!";
            localStorage.removeItem('quizEndTime');

            // ✅ SHOW & ENABLE BUTTON
            let btn = document.getElementById("submitBtn");
            if(btn){
                btn.disabled = false;
                btn.style.display = "inline-block";
                btn.removeAttribute("disabled");
            }

            // ✅ OPTIONAL: AUTO SUBMIT AFTER 3 SECONDS
            setTimeout(() => {
                form.submit();
            }, 3000);

            return;
        }

        let minutes = Math.floor(diff / 60);
        let seconds = diff % 60;

        clock.innerHTML = 
            (minutes < 10 ? '0' : '') + minutes + " : " +
            (seconds < 10 ? '0' : '') + seconds;
    }

    updateClock();
    let timer = setInterval(updateClock, 1000);

    // ✅ CLEAR STORAGE ON SUBMIT
    form.addEventListener("submit", function(){
        localStorage.removeItem('quizEndTime');
    });

});
</script>

@endsection
