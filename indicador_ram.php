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

    <!-- fontawesone icons -->
    <script src="https://kit.fontawesome.com/a69236a15c.js" crossorigin="anonymous"></script>

    <title>Indicador RAM-Dashboard-Linux </title>
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
        <h1 class="display-4">Indicador RAM - Dashboard Linux</h1>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-md-center shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row">
          <div class="card text-center">
            <div class="card-header">
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php"><i class="fas fa-home"></i>&nbspInicio</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">En la gráfica se puede ver el uso de la memoria RAM</h5>
            <?php 
                exec("free -m | head -2 | tail -1 | awk {'print $4'}", $memramlibre);
                exec("free -m | head -2 | tail -1 | awk {'print $3+$6'}", $memramocupada);
            ?>

              <p class="card-text">
                <script type="text/javascript">
                      google.charts.load("current", {packages:["corechart"]});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Memoria RAM', 'Uso'],
                          ['Libre: <?php echo $memramlibre[0]." MB";?>',        <?php echo $memramlibre[0];?>],
                          ['Ocupada <?php echo $memramocupada[0]." MB";?>',     <?php echo $memramocupada[0];?>],
                        ]);

                        var options = {
                          title: 'Uso de memoria RAM',
                          pieHole: 0.4,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);
                      }
                </script>                
                <div id="donutchart" style="width: 900px; height: 500px; display: inline-block;"></div>
              </p>
              
            </div>
            <div class="card-footer text-muted">
                SO Linux Mint
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