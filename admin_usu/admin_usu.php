<!-- 
 description Emulador de una terminal y varias máquinas en red usando Javascript
 author Jhonny Sierra Parra, Juan Pablo Grisales, Miguel Medina
 email jsierrap@uqvirtual.edu.co, jpgrisalesb@uqvirtual.edu.co, Mamedinal_1@uqvirtual.edu.co
 licence GNU General Public License  Ver. 3.0 (GNU GPL v3)
 date Octubre 2020
 version 1.1
-->

<?php

  if($_POST['btnEliminar']=='eliminar'){
    $usuarioDel = $_POST['usernameDel'];
    exec("sudo ./eliminarUsuario.sh $usuarioDel", $eliminarUsuario);
    
  }



?>

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

    <title>Administrador Usuarios-Dashboard-Linux </title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    <!-- Librerias para graficas Google -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <?php
      if($_POST['btnCrearUsuario']=='crearUsuario'){

        $nombreUsuario = $_POST['username'];
        $password = $_POST['password'];
        $tipoShell = $_POST['tipoShell'];

        exec("sudo ./agregarUsuario.sh $password $tipoShell $nombreUsuario", $crearUsuario);
        

        echo'
          <script type="text/javascript">
            $(document).ready(function(){
              $("#modalCrearUsuario").modal("show");
        
            });

          </script>';
      }
      
      if($_POST['btnCargarCSV']=='cargarCSV'){
        if (($fichero = fopen("datos.csv", "r")) !== FALSE) {

          while (($datos = fgetcsv($fichero, 1000, ";")) !== FALSE) {
              // Procesar los datos.
              exec("sudo ./agregarUsuario.sh $datos[1] $datos[2] $datos[0]", $crearUsuario);
          }
        }
  
        echo'
          <script type="text/javascript">
            $(document).ready(function(){
              $("#modalCargaCSV").modal("show");
        
            });

          </script>';
      }  

      
    ?>


    <div class="jumbotron jumbotron-fluid" style="padding: 15px;background-image: linear-gradient( 359.3deg,  rgba(196,214,252,1) 1%, rgba(187,187,187,0) 70.9% );">
      <div class="container">
        <h1 class="display-4">Administrador Usuarios - Dashboard Linux</h1>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-md-center shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row">
          <div class="card text-center">
            <div class="card-header">
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" href="../index.php"><i class="fas fa-home"></i>&nbspInicio</a>
                </li>
              </ul>
            </div>
            <div class="card-body">

      <form method="post" action="admin_usu.php" name="agregarUsuario">

              <h5 class="card-title">En la tabla puede ver los usuarios que existen en el sistema</h5>      
              <p class="card-text">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Usuario</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        /**
                         * Tabla que carga los usuarios exitentes en el sistema
                        **/  

                        // Funcion para consultar los usuarios que hay en el sistema
                        exec("awk -F: '$3>999 && $3<30000{print $1}' /etc/passwd", $users);
                        $i=1;
                        // Ciclo para cargar los usuarios en la tabla
                        foreach ($users as $linea) {
                          echo "
                            <tr>
                            <th scope='row'>$i</th>
                            <td>$linea</td>
                            <td><a href=editar_usu.php?user=$linea><span><i class='fas fa-edit'></i></span></a></td>

                            <td><button type='button' value=$linea class='btn btn-link' onclick='capturarUsuario(this.value)' data-toggle='modal' data-target='#modalEliminar'><span><i class='fas fa-trash-alt fa-1x text-danger'></i></span></button></td>
                            </tr>
                          ";
                          $i=$i+1;
                        }
                      ?>
                  </tbody>
                </table>

              </p>
              <br><br>
              <hr style=" border: 0; height: 1px; width: 90%; align:center;
                                    background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                                    background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                                    background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                                    background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);"
              />

              <h5 class="card-title">¿Desea crear un usuario en el sistema?. Ingrese los datos en el siguiente formulario.</h5>
              <br>
              <p>
                  <!-- Formulario para crear un usuario en el sistema-->
                  <div class="form-group row col-sm-6">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" value="" class="form-control"  aria-describedby="usuario" required="">
                  </div>
                  <div class="form-group row col-sm-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required="">
                  </div>
                  <div class="form-group row col-sm-6">
                    <label for="tipoShell">Tipo de ejecución</label>
                    <select class="custom-select" name="tipoShell" required="">
                      <option value="/bin/bash">Bash</option>
                      <option value="/usr/sbin/nologin">No login</option>
                      <option value="/bin/false">False</option>
                    </select>
                  </div>
                  <div class="form-group row col-sm-12">
                    <button type="submit" class="btn btn-primary left" name="btnCrearUsuario" value="crearUsuario" id="ingresar">Crear Usuario</button>
                  </div>    
              </form>        
            <!-- Formulario para crear un usuario en el sistema con archivo CSV--> 
            <form method="post" action="admin_usu.php" name="cargarCSVUsuarios">
              </p>

              <br><br>
              <hr style=" border: 0; height: 1px; width: 90%; align:center;
                                    background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                                    background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                                    background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
                                    background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);"
              />

              <h5 class="card-title">¿Desea crear un usuario desde un archivo CSV. Presione el botón Cargar CSV y el archivo será cargado automáticamente</h5>
              <br>
              <p>
                <!--
                <div class="custom-file">
                  
                  <input type="file" class="custom-file-input" id="customFileLang" name="selectFile" lang="es">
                  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>

                </div> 
                -->      
                  <div class="form-group row col-sm-12">
                    <button type="submit" class="btn btn-success" name="btnCargarCSV" value="cargarCSV" id="cargarCSV">Cargar CSV</button>
                  </div>    
        

              </p>
            </form>
            </div>
            <div class="card-footer text-muted">
                SO Linux Mint
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>

}

    <!-- Modal Crear usuario -->
    <div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel">Exitoso!!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Se creó el usuario <?php echo $nombreUsuario;?> en el sistema.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal carga masiva -->
    <div class="modal fade" id="modalCargaCSV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel">Exitoso!!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Se cargó el archivo CSV de manera correcta. Verifique los usuarios en la tabla.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>    

      <!-- Modal Eliminar usuario -->
      <form method="post" action="admin_usu.php" name="form-eliminar">
      <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar el usuario?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Si elimina el usuario perderá toda la información y no podra recuperarla.
              <input type="hidden" name="usernameDel" id="usernameDel" value="" class="form-control"  aria-describedby="usuario">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-danger" name="btnEliminar" value="eliminar">Eliminar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    


    <!-- Licencia del software -->
    <font size="1"> <br> 
      <a rel="license" href="https://www.gnu.org/licenses/gpl.html"><img alt="GNU General Public License  Ver. 3.0" style="border-width:0" src="../gplv3.png" height="22" /></a> 
      <b>&nbsp;<a href="mailto:jsierrap@uqvirtual.edu.co">Juan Pablo Grisales Botero - Miguel Angel Medina Lievano - Jhonny Sierra Parra</a></b>
      <br> Dashboard de Linux - Versión 1.0 (Nov-2020) 
      <br> Esta obra está bajo una licencia <a rel="license" href="https://www.gnu.org/licenses/gpl.html">GNU General Public License  Ver. 3.0</a>.
    </font>


  </body>
</html>
<!-- javascript code -->
<script type="text/javascript">

  // Funcion para actualizar el nombre del usuario seleccionado de la tabla y escribirlo en el campo oculto para eliminarlo.
  function capturarUsuario(x){
   
    document.getElementById("usernameDel").value = x;

  }

</script>