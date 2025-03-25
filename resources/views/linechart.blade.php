<!DOCTYPE html>
<html>
<head>
    <title>Linechart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
    
<body>
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Linechart</h3>
            <div class="card-body">
                <div id="container"></div>
            </div>
        </div>
    </div>
</body>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var users = {{ Js::from($users) }};
    console.log(users); 
    Highcharts.chart('container', {
        title: { text: 'New User Growth, {{ date("Y") }}' },
        subtitle: { text: 'Source: highchart.com' },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: { text: 'Number of New Users' }
        },
        series: [{
            name: 'New Users',
            data: users
        }]
    });
</script>
</html>
