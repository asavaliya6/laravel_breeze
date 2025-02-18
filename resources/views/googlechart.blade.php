<!DOCTYPE html>
<html>
<head>
    <title>Google Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
     
<body>
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Google Chart</h3>
            <div class="card-body"> 
                <div id="google-line-chart" style="height: 500px"></div>
            </div>
        </div>
    </div>
</body>
  
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
  
    function drawChart() {
  
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Register Users Count'],
      
                @php
                    foreach($users as $key => $value) {
                        echo "['".$key."', ".$value."],";
                    }
                @endphp
        ]);
      
        var options = {
          title: 'Register Users Month Wise',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
  
        var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));
  
        chart.draw(data, options);
    }

</script>
</html>
