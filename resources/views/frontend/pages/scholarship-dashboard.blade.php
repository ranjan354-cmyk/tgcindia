<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Scholarship Result</title>
<link rel="shortcut icon" type="image/x-icon" href="https://www.tgcindia.com/assets/front/img/logo/favicon.png">
<style>
* { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
body { background: #f4f5f7; color: #1f2937; }

.header {
  background: #fff;
  padding: 18px 28px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #e5e7eb;
}
.header .brand { font-size: 26px; font-weight: 800; color: #ef1f26; }
.header .user { font-weight: 700; }

.dashboard {
  padding: 20px;
  display: grid;
  grid-template-columns: 1fr 2fr;
  gap: 18px;
}

.card {
  background: #fff;
  border-radius: 16px;
  padding: 20px;
  border: 1px solid #ececec;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.card h3 {
  margin-bottom: 14px;
  font-size: 18px;
  font-weight: 700;
}

/* SCORE */
.score {
  font-size: 36px;
  font-weight: 800;
  color: #ef1f26;
  margin-bottom: 10px;
}

.progress {
  width: 100%;
  height: 12px;
  background: #e5e7eb;
  border-radius: 10px;
  overflow: hidden;
  margin-bottom: 15px;
}

.progress-fill {
  height: 100%;
  background: #10b981;
}

/* STATS */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
}

.stat-box {
  padding: 14px;
  border-radius: 10px;
  text-align: center;
  font-weight: 700;
}

.correct { background: #ecfdf5; color: #10b981; }
.wrong { background: #fef2f2; color: #ef4444; }
.skip { background: #f3f4f6; color: #6b7280; }

#chart_div {
  width: 100%;
  height: 300px;
}

@media(max-width:768px){
  .dashboard { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: 1fr; }
}
</style>
</head>

<body>

@php
  $percent = ($data['score'] / $data['total_marks']) * 100;
@endphp

<header class="header">
  <div class="brand">
      <img src="https://www.tgcindia.com/assets/front/img/logo-tgc.png" alt="TGC India" class="imageind" loading="lazy">
      
  </div>
  <div class="user">Hi, {{ $data['full_name'] }}</div>
</header>

<main class="dashboard">

  <!-- LEFT -->
  <aside class="card">
    <h3>Your Score</h3>

    <div class="score">
      {{ $data['correct_answers'] }} / {{ $data['total_marks'] }}
    </div>

    <div class="progress">
      <div class="progress-fill" style="width: {{ $data['score'] }}%"></div>
    </div>

    <div class="stats-grid">
      <div class="stat-box correct">
        Correct <br>{{ $data['correct_answers'] }}
      </div>

      <div class="stat-box wrong">
        Wrong <br>{{ $data['wrong_answers'] }}
      </div>

      <div class="stat-box skip">
        Skipped <br>{{ $data['unattempted'] }}
      </div>
    </div>
  </aside>

  <!-- RIGHT -->
  <section class="card">
    <h3>Eligibility Test Performance Chart</h3>
    <div id="chart_div"></div>
  </section>

</main>

<!-- Google Charts -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Type', 'Count'],
    ['Correct', {{ $data['correct_answers'] }}],
    ['Wrong', {{ $data['wrong_answers'] }}],
    ['Skipped', {{ $data['unattempted'] }}]
  ]);

  var options = {
    pieHole: 0.5,
    colors: ['#10b981','#ef4444','#9ca3af'],
    legend: { position: 'bottom' },
    chartArea: { width: '90%', height: '80%' }
  };

  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>

</body>
</html>