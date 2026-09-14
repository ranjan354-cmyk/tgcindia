<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Course Syllabus</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
            color: #333;
        }

        h1, h2, h3, h4 {
            color: #005b96;
        }

        ul {
            padding-left: 20px;
        }

        .section {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .header {
            background-color: #f5f5f5;
            padding: 10px;
            margin-bottom: 10px;
        }

        .topic-count {
            font-size: 0.9em;
            color: #666;
        }

        /* Header with logo */
        .logo-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo-header img {
            height: 60px;
            margin-right: 20px;
        }

        /* Advantage TGC */
        
        .advantage-tgc h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .benefit-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .benefit-card {
            flex: 1 1 45%;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 15px;
          
        }

        .benefit-card h3 {
            margin-top: 0;
            color: #003366;
        }

        .benefit-card ul {
            padding-left: 20px;
        }

        .benefit-card ul li {
            margin-bottom: 6px;
        }
        .programskill_row_bx__3uCpZ ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.programskill_row_bx__3uCpZ li {
    display: flex;
    align-items: center;
    font-size: 16px;
    margin-bottom: 8px;
}

.programskill_row_bx__3uCpZ img {
    height: 16px;
    margin-right: 8px;
}.programskill_row_bx_bottom__1Lu8H ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 10px;
    padding: 0;
    list-style: none;
}

.programskill_row_bx_bottom__1Lu8H li img {
    border-radius: 4px;
    border: 1px solid #ddd;
}
.course-projects-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
}

.project-card {
    flex: 1 1 45%;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 15px;
    margin-bottom: 20px;
    page-break-inside: avoid;
}

.project-card h3 {
    color: #003366;
    margin-top: 0;
}

.project-card p {
    font-size: 0.95em;
    color: #333;
}


    </style>
</head>
<body>
<div id="syllabus-content">

   

    <!-- Advantage TGC Section -->
    <div class="advantage-tgc">
<!-- PDF Header with Logo and Contact Info -->
<div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 25px;">
    <div style="display: flex; align-items: center;">
        <img src="https://www.tgcindia.com/assets/front/img/logo-tgc.png" alt="TGC Logo" style="height: 60px; margin-right: 20px;">
        <div style="line-height: 1.5;">
            <h1 style="margin: 0; font-size: 20px; color: #003366;">Course Syllabus:{{($courses->display_name)??$courses->name}}</h1>
            <p style="margin: 5px 0 0; font-size: 14px; color: #444;">
                H-85A, 2nd Floor, South Extension, Part-I, New Delhi-110049 (India)<br>
                <strong>Toll Free No.:</strong> 1800 208 9057
            </p>
        </div>
    </div>
</div>
        <h2>Advantage TGC</h2>
        <div class="benefit-grid">
            <div class="benefit-card">
                <h3>Live Interactive Learning</h3>
                <ul>
                    <li>World-Class Instructors</li>
                    <li>Expert-Led Mentoring Sessions</li>
                    <li>Instant doubt clearing</li>
                </ul>
            </div>

            <div class="benefit-card">
                <h3>Lifetime Access</h3>
                <ul>
                    <li>Course Access Never Expires</li>
                    <li>Free Access to Future Updates</li>
                    <li>Unlimited Access to Course Content</li>
                </ul>
            </div>

            <div class="benefit-card">
                <h3>Online Support</h3>
                <ul>
                    <li>One-On-One Learning Assistance</li>
                    <li>Help Desk Support</li>
                    <li>Resolve Doubts in Real-time</li>
                </ul>
            </div>

            <div class="benefit-card">
                <h3>Hands-On Project Based Learning</h3>
                <ul>
                    <li>Industry-Relevant Projects</li>
                    <li>Course Demo Dataset & Files</li>
                    <li>Quizzes & Assignments</li>
                </ul>
            </div>

           
        </div>
    </div>
<!-- Skills Covered Section -->
<div class="training_benefits custv" >
    <h3 class="boldi">Skills Covered</h3>
</div>

<div class="programskill_row_bx__3uCpZ">
    <ul>
          @foreach($data['solutions'] as $projectValue)
        <li><img src="https://www.tgcindia.com/assets/front/img/svg/check_1.svg" alt="Check"> {{$projectValue->name}}</li>
        @endforeach
 </ul>
</div>


<!-- Tools Covered Title -->
<div class="training_benefits custv" style="">
    <h3 class="boldi">Tools Covered</h3>
</div>

<!-- Tools Logo Grid -->
<div class="programskill_row_bx_bottom__1Lu8H">
    <ul style="display: flex; flex-wrap: wrap; gap: 10px; list-style: none; padding: 0; justify-content: flex-start;">
       @foreach($data['certificate'] as $projectValue)
        <li><img src="https://www.tgcindia.com/public/uploads/{{$projectValue->image}}" height="60" width="60" alt="Illustrator"></li>
        @endforeach
    </ul>
</div>
<div class="training_benefits custv" style="">
    <h3 class="boldi">Course Syllabus</h3>
</div>
    <!-- Course Modules -->
    @foreach($getSyllabusValuedata as $key => $getSyllabusValuedataData)
        <div class="section">
            <div class="header">
                <h2>{{ $key }}</h2>
                <div class="topic-count">
                    {{ isset($getSyllabusValuedataData['Topics']) ? count($getSyllabusValuedataData['Topics']) : 0 }} Topics
                </div>
            </div>

            <h3>Topics</h3>
            <ul>
                @foreach($getSyllabusValuedataData['Topics'] ?? [] as $topic)
                    <li>{{ $topic }}</li>
                @endforeach
            </ul>

            <h3>Hands-On Practice</h3>
            <ul>
                @foreach($getSyllabusValuedataData['Hand On'] ?? [] as $handon)
                    <li>{{ $handon }}</li>
                @endforeach
            </ul>

            <h3>Skills You Will Learn</h3>
            <ul>
                @foreach($getSyllabusValuedataData['Skills'] ?? [] as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
     @php 
    if(count($data['projects'])>0){
    @endphp
<!-- Course Projects Section -->
<div class="training_benefits custv" >
    <h3 class="boldi">Course Projects</h3>
</div>

<div class="course-projects-grid" style="display: flex; flex-wrap: wrap; justify-content: space-between;">

    <!-- Project 1 -->
    
   
    @foreach($data['projects'] as $projectValue)
    <div class="project-card" style="flex: 1 1 45%; border: 1px solid #ccc; border-radius: 6px; padding: 15px;">
        <div style="text-align: center; margin-bottom: 10px;">
            <img src="https://www.tgcindia.com/public/uploads/{{$projectValue->image}}" alt="Animated Short Film" height="120">
        </div>
        <h3>{{$projectValue->name}}</h3>
        <p>{{$projectValue->description}}</p>
    </div>

  @endforeach
</div>
@php 
}

@endphp
</div>

<!-- PDF Auto Download Script -->
<script>
    window.onload = function () {
        var element = document.getElementById('syllabus-content');

        var opt = {
            margin: 0.5,
            filename: 'syllabus.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' },
            pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
        };

        html2pdf().set(opt).from(element).save();
    };
</script>

</body>
</html>
