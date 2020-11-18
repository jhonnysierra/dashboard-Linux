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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Dashboard - Linux </title>
  </head>
  <body>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Emulador terminal y varias máquinas</h1>
        <p class="lead">Trabajo presentado por: Jhonny Sierra Parra - Juan Pablo Grisales - Miguel Medina</p>
        <p class="lead">Parcial # 2 - Linux I</p>
        <p class="small" id="maquinas"></p>
      </div>

    </div>

    <div class="container-fluid">
      <div id="prueba">
        
      </div>
      <div class="row justify-content-md-center">
        <div class="col col-lg-10 bg-dark text-white" style="margin: 0px;border-color: #343a40;height:200px;overflow: auto;" id="consola">
            <div class="form-inline" id="loginDiv">
              <span id="spanLogin">Login:</span>
              <input class="form-control bg-dark text-white" style="box-shadow: none; border-color: #343a40;" type="text" value="" id="login" onkeypress="login(event);">
            </div>
            
            <div id="divLoginMensaje">
              <span id="spanLoginMensaje"></span>
            </div>


            <div class="bg-dark text-white" style="border-color: #343a40;" id="textoImprimir">
            </div>

            <div class="form-inline" id="divComandos">
              <span id="prompt"></span><input class="form-control bg-dark text-white" size="100" style="box-shadow: none; border-color: #343a40;" type="text" value="" id="entrada" onkeypress="procesarEntrada(event);">
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