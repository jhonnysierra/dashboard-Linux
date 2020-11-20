<!-- 
 description Emulador de una terminal y varias máquinas en red usando Javascript
 author Jhonny Sierra Parra, Juan Pablo Grisales, Miguel Medina
 email jsierrap@uqvirtual.edu.co, jpgrisalesb@uqvirtual.edu.co, Mamedinal_1@uqvirtual.edu.co
 licence GNU General Public License  Ver. 3.0 (GNU GPL v3)
 date Octubre 2020
 version 1.1
-->
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Indicador CPU-Dashboard-Linux </title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    <!-- Librerias para graficas Google -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="jumbotron jumbotron-fluid" style="padding: 15px;background-image: linear-gradient( 359.3deg,  rgba(196,214,252,1) 1%, rgba(187,187,187,0) 70.9% );">
      <div class="container">
        <h1 class="display-4">Indicador CPU - Dashboard Linux</h1>
      </div>

    </div>

    <div class="container-fluid">
      <div class="row justify-content-md-center shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row">
          <div class="card text-center">
            <div class="card-header">
              SO Linux Mint
            </div>
            <div class="card-body">
              <h5 class="card-title">En las gráficas se aprecia el consumo de CPU de los último 5, 10 y 15 minutos respectivamente</h5>
            <?php 
                exec ("top -n1 -b| head -1 | awk {'print $10,$11,$12'} | awk -F ', ' {'print $1*100,\"\\n\",$2*100,\"\\n\",$3*100'}", $usocpu);
            ?>

              <p class="card-text">
                <script type="text/javascript">
                      google.charts.load('current', {'packages':['gauge']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['Label', 'Value'],
                          ['5 min', <?php echo $usocpu[0];?>],
                          ['10 min', <?php echo $usocpu[1];?>],
                          ['15 min', <?php echo $usocpu[2];?>]
                        ]);

                        var options = {
                          width: 400, height: 120,
                          redFrom: 90, redTo: 100,
                          yellowFrom:75, yellowTo: 90,
                          minorTicks: 5
                        };

                        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

                        chart.draw(data, options);

                        setInterval(function() {
                          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                          chart.draw(data, options);
                        }, 13000);
                        setInterval(function() {
                          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
                          chart.draw(data, options);
                        }, 5000);
                        setInterval(function() {
                          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
                          chart.draw(data, options);
                        }, 26000);
                      }
                </script>

                <div id="chart_div" style="width: 400px; height: 120px;"></div>
              </p>
              
            </div>

          </div>
        </div>        
      </div>
    </div>

    <!-- Licencia del software -->
    <font size="1"> <br> 
      <a rel="license" href="https://www.gnu.org/licenses/gpl.html"><img alt="GNU General Public License  Ver. 3.0" style="border-width:0" src="gplv3.png" height="22" /></a> 
      <b>&nbsp;<a href="mailto:jsierrap@uqvirtual.edu.co">Juan Pablo Grisales Botero - Miguel Angel Medina Lievano - Jhonny Sierra Parra</a></b>
      <br> Dashboard de Linux - Versión 1.0 (Nov-2020) 
      <br> Esta obra está bajo una licencia <a rel="license" href="https://www.gnu.org/licenses/gpl.html">GNU General Public License  Ver. 3.0</a>.
    </font>


  </body>
</html>

<!--  Script JS - Contiene las funciones con los eventos de consola -->
<script src= "scripts/emulador.js"></script>

<script>
  $(document).ready(function() {
    
  });
</script>