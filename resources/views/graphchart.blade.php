<!DOCTYPE html>
<html>
<head>
    <title>Graphchart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
    
<body>
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Graphchart</h3>
            <div class="card-body">
                <canvas id="myChart" height="120px"></canvas>
            </div>
        </div>
    </div>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
      var users =  {{ Js::from($data) }};
  
      const data = {
        labels: labels,
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>
</html>
