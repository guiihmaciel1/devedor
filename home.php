
    
    <body class="sb-nav-fixed">
    <?php
    require 'layout.php';
    say_header();
    ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                        <?php
                        $con    = pdo_open();
                        $query  = "
                        SELECT COUNT(*)as qtd, b.descricao FROM devedores a, divida b where b.id_divida = a.id_divida group by a.id_divida;";
                        $result       = query($query);
                        while ($row = $result->fetchObject())
                        { 
                            
                            $label .=  "'$row->descricao',";    
                            $val .=  "$row->qtd,";   
                        }
                        $con          = null;

                        $con    = pdo_open();
                        $query  = "
                        SELECT sum(valor) as soma, month(updated) as mes FROM devedores group by month(updated) order by updated asc limit 6;";
                        $result       = query($query);
                        while ($row = $result->fetchObject())
                        { 
                            
                            $mes .=  "'$row->mes',";    
                            $valor .=  "$row->soma,";   
                        }
                        $con          = null;

                        ?>
                        </div>
                        <div class="row">
                        <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Dívidas mais recorrentes.
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Valor total nos últimos 6 meses
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </main>                
            </div>
        </div>
        <?php
        say_footer_dash();
        ?>
        
    </body>
</html>

<script>

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [<?=$label?>],
    datasets: [{
      data: [<?=$val?>],
      backgroundColor: ['#A9A9A9', '#363636', '#6959CD', '#4169E1', '#008080', '#8FBC8F', '#6B8E23', '#D2691E', '#A020F0', '#8B0000'],
    }],
  },
});


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';



// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?=$mes?>],
    datasets: [{
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [<?=$valor?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 100
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>