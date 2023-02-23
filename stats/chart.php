<?php
    $titulo = "Produtos mais comprados";

    require "dados_relatorio.php";
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Produtos', 'Quantidade']
        
          <?php 
            if($qtde>0)
                while($linha = pg_fetch_array($res)) {
                    echo ",['".$linha['nome']."', ".$linha['qtdevendida']."]";
                }
          ?>
        ]);

        var options = {
          title: " ",
          is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <link rel="stylesheet" href="../CSS/chartStyle.css">
    <link rel="stylesheet" href="../parts/partsStyle.css">  
  </head>
  <body>
    <?php include '../parts/admHeader.php'?>
      <div class="item">
        <div class="item-chart">
          <h2>Produtos mais Comprados</h2>
          <div id="piechart_3d"></div>
        </div>
        <!-- <a href="javascript:print();">Imprimir</a> -->
      </div>
  </body>
</html>