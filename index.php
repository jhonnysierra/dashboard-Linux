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

    <title>Dashboard - Linux </title>
  </head>
  <body>

   

    <!-- Optional JavaScript -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <div class="jumbotron jumbotron-fluid" style="padding: 15px;">
      <div class="container">
        <h1 class="display-4">Dashboard Linux</h1>
        <p class="lead">Trabajo presentado por: Jhonny Sierra Parra - Juan Pablo Grisales - Miguel Medina</p>
        <p class="lead">Proyecto Final - Linux I</p>
      </div>

    </div>

    <div class="container-fluid">
      <div id="prueba">
        
      </div>
      <div class="row justify-content-md-center shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row">
          <div class="col-sm-6">
            <div class="card" id="menu1">
              <div class="card-body">
                <h5 class="card-title">Indicadores de uso del sistema</h5>
                <p class="card-text">Aquí puede consultar el estado de uso de los recursos de su sistema tales como: <br/><br/>
                </p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Consumo de CPU</li>
                  <li class="list-group-item">Consumo de Memoria RAM</li>
                  <li class="list-group-item">Uso del Disco duro</li>
                  <li class="list-group-item">Procesos</li>
                  <li class="list-group-item"></li>
                </ul>
                <a href="#menu1" class="btn btn-primary">Ir a indicadores</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card" id="menu2">
              <div class="card-body">
                <h5 class="card-title">Administración de usuarios</h5>
                <p class="card-text">Aquí puede realizar tareas de administración de los usuarios del sistema tales como:</p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Consultar usuarios</li>
                  <li class="list-group-item">Crear un usuario</li>
                  <li class="list-group-item">Editar información de un usuario</li>
                  <li class="list-group-item">Borrar usuarios</li>
                  <li class="list-group-item"></li>
                </ul>
                <a href="#menu1" class="btn btn-primary">Ir a administración</a>
              </div>
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

