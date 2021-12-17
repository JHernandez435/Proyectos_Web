<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Proyecto | Ejercicio2</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vistas/css/bootstrap.css">
  <!-- Estilos en Css -->

  <!-- link ejercicio1 -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Data Tables -->
  <link rel="stylesheet" href="vistas/dataTables/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/dataTables/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- Cierre link ejercicio2 -->

  <!-- links personalizados -->
  <link rel="stylesheet" href="vistas/css/main.css">
  <link rel="stylesheet" href="vistas/css/scroll.css">

  <style>
    .slider {
      background: url("vistas/images/circulos.gif");
      height: 100vh;
      background-size: cover;
      background-position: center;
    }
  </style>


</head>

<body>
  <!-- imagen principal -->

  <section class="container-fluid slider d-flex justify-content-center align-items-center">
    <h1 class="display-4" style="color:white">CARNETTZACIÓN</h1>
  </section>

  <!-- fin imagen principal -->

  <!-- menú de navegación -->
  <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-sm sticky-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
      <img src="vistas/images/bootstrap-solid.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Bootstrap">
      Bootstrap
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <div class="navbar-nav mr-auto ml-auto text-center">
        <a class="nav-item nav-link active" href="index.php">Inicio</a>
        <a class="nav-item nav-link" href="#">Nosotros</a>
        <a class="nav-item nav-link" href="servicios.php">Servicios</a>
        <a class="nav-item nav-link" href="#">Contacto</a>
      </div>
      <div class="d-flex flex-row justify-content-center">
        <a href="#" class="btn btn-outline-primary mr-2">F</a>
        <a href="#" class="btn btn-outline-danger">Y</a>
      </div>
    </div>
  </nav>
  <!-- fin menú de navegación -->
  <!--  card -->

  <section class="container my-5 py-5">
    <h3 class="text-uppercase text-center mb-4">Bienvenido</h3>
    <div class="card-deck">

      <div class="card">
        <div class="card-block">
          <!-- grupo de botones -->

          <!--Fin grupo de botones -->
          <!-- Modal -->
          <div class="">

            <!-- Formulario de Empresas -->
            <br>
            <br>
            <button type="button" class="btn btn-success">REGISTRAR EMPRESA</button>

            <form enctype="multipart/form-data">
              <div class="form-group">
                <label for="txtNombres">Nombre:</label>
                <input type="text" class="form-control" id="txtNombresEmpresa">
                <div class="errores" id="valida-txtNombresEmpresa"></div>
              </div>

              <div class="form-group">
                <label for="txtDireccion">Direccion:</label>
                <input type="text" class="form-control" id="txtDireccionEmpresa">
                <div class="errores" id="valida-txtDireccionEmpresa"></div>
              </div>

              <div class="form-group">
                <label for="txtTelefono">Telefono:</label>
                <input type="text" class="form-control" id="txtTelefonoEmpresa">
                <div class="errores" id="valida-txtTelefonoEmpresa"></div>
              </div>

              <div class="form-group">
                <label for="txtTelefono">Correo:</label>
                <input type="text" class="form-control" id="txtCorreoEmpresa">
                <div class="errores" id="valida-txtCorreoEmpresa"></div>
              </div>

              <div class="form-group">
                <label for="txtImagenE">Imagen:</label>
                <input type="file" class="form-control" id="txtImagenEmpresa">
                <div class="errores" id="valida-txtImagenEmpresa"></div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger btnGuardar" id="empresa">Guardar Empresa</button>
              </div>

            </form>
            </br>
            </br>
            <!-- Cierra Formulario de Empresas -->

            <!-- Formulario de Usuarios -->
            <br><button type="button" class="btn btn-primary">REGISTRAR USUARIO</button>

            <form enctype="multipart/form-data">
              <div class="form-group">
                <label for="txtNombres">Nombres:</label>
                <input type="text" class="form-control" id="txtNombres">
                <div class="errores" id="valida-txtNombres"></div>
              </div>

              <div class="form-group">
                <label for="txtApellidos">Apellidos:</label>
                <input type="text" class="form-control" id="txtApellidos">
                <div class="errores" id="valida-txtApellidos"></div>
              </div>

              <div class="form-group">
                <label for="txtTelefono">Telefono:</label>
                <input type="text" class="form-control" id="txtTelefono">
                <div class="errores" id="valida-txtTelefono"></div>
              </div>

              <div class="form-group">
                <label for="txtImagen">Imagen:</label>
                <input type="file" class="form-control" id="txtImagen">
                <div class="errores" id="valida-txtImagen"></div>
              </div>

              <div class="form-group">
                <label for="sel1">Seleccionar Especialidad:</label>
                <select class="form-control" id="txtEspecialidad">
                  <option>Sistemas</option>
                  <option>Contabilidad</option>
                  <option>Salud</option>
                </select>

              </div>

              <div class="form-group">
                <label for="sel1">Seleccionar Empresa:</label>
                <select class="form-control" id="txtEmpresa">
                  <option>Florest</option>
                  <option>Parlmack</option>
                  <option>Chibus</option>
                </select>
              </div>




              <div class="modal-footer">
                <button type="button" class="btn btn-danger btnGuardar" id="btnGuardarUsuarios">Guardar Usuario</button>
              </div>

            </form>
            </br>
            <!-- Cierra Formulario de Usuarios -->

          </div>
        </div>

        <!-- <img class="card-img-top img-fluid" src="vistas/images/cards1.png" alt="Card image cap"> -->
      </div>
      <div class="card">
        <div class="card-block">
          <div id="padreBotones">

            <!--Fin grupo de botones -->
          </div>

          <br><button type="button" class="btn btn-success">EMPRESAS</button>
          <div class="row col-md-12">
            <div class="col-md-8">
              <div class="box">
                <div class="box-header with-border">
                  <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalUsuarios">Agregar Usuarios</button>--->
                </div>
                <br><br>
              </div>

              <div class=" box-body">
                <table id="tablaEmpresa" class="table table-bordered table-striped dt-responsive" width="100%">
                  <thead>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo Electronico</th>
                    <th>Acciones</th>
                  </thead>

                  <tbody>

                  </tbody>

                </table>
                <br><button type="button" class="btn btn-primary">USUARIOS</button>
                <table id="tablaUsuario" class="table table-bordered table-striped dt-responsive" width="100%">
                  <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Especialidad</th>
                    <th>Empresa</th>
                    <th>Imagen</th>
                    <th>Carnet</th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>

              </div>
  </section>

  </div>


  <!-- START THE FEATURETTES -->

  <div class="container my-5">
    <hr class="">
    <div class="row d-flex align-items-center my-5 py-5">
      <div class="col-md-7 push-md-5">
        <div id="footer">
          <div id="modalEditarUsuario" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Carnet</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" id="imprimible">
                  <form enctype="multipart/form-data " class="carnet">

                    <div class="form-group">
                      <center>
                        <img class="prueba" id="imgImagen" urlAnterior="" src="" width="200" height="150">
                        <img id="imgImagenQr" urlimagen="" src="" width="150" height="150">
                        <div class="form-group">
                          <label id="txtEditarId"></label>
                        </div>
                        <div class="form-group">
                          <label id="txtEditarNombres"></label>
                        </div>
                        <div class="form-group">
                          <label id="txtEditarApellidos"></label>
                        </div>
                        <div class="form-group">
                          <label id="txtEditarTelefono"></label>
                        </div>
                        <div class="form-group">
                          <label id="txtEditarEspecialidad"></label>
                        </div>
                        <div class="form-group">
                          <label id="txtEditarEmpresa"></label>
                        </div>
                      </center>
                    </div>

                  </form>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-primary btnGuardar" id="btnImprimir">Exportar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- /END THE FEATURETTES -->

  <!-- START THE FEATURETTES -->

  <div class="container my-5">
    <hr class="">
    <div class="row d-flex align-items-center my-5 py-5">
      <div class="col-md-7 push-md-5">
        <div id="footer">
          <div id="modalEmpleado" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Carnet</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <form enctype="multipart/form-data">

                    <table id="tablaEmpleado" class="table table-bordered table-striped dt-responsive" width="100%">

                      <thead>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Idempresa</th>
                        <th>Usuario</th>
                      </thead>

                      <tbody>

                      </tbody>
                    </table>

                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- /END THE FEATURETTES -->

    <!-- Footer -->
    <footer class="container-fluid bg-inverse">
    <div class="row text-white py-4 text-white">
      <div class="col-md-3">
        <img src="vistas/images/bootstrap-solid.png" alt="" width="100px" height="auto" class="float-left mr-3">
        <h4 class="lead">Carnetizacion</h4>
        <footer class="blockquote-footer">Ejercicio gratis <cite title="Source Title">Jonathan y Efrain</cite></footer>
      </div>
      <div class="col-md-3">
        <h4 class="lead">Jonathan</h4>
        <p>Director del ejercicio y promotor de buenas practicas y solucionador de errores</p>
      </div>
      <div class="col-md-3">
        <h4 class="lead">Efrain</h4>
        <p>Realizador de diseño integrado y contudente en sus planes de mejorar el mundo</p>
      </div>
      <div class="col-md-3">
        <h4 class="lead">Síguenos</h4>
        <a href="#"><span class="badge badge-primary">Facebook</span></a>
        <a href="#"><span class="badge badge-danger">Youtube</span></a>
      </div>
    </div>
  </footer>
  <!-- Fin Footer -->

  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/empresas.js"></script>
  <script src="vistas/js/botones.js"></script>
  <script src="vistas/js/tablaUsuarios.js"></script>
  <script src="vistas/js/tablaEmpresas.js"></script>
  <script src="vistas/js/tablaEmpleado.js"></script>

  <!-- links ejercicio1 -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

  <!-- Data Tables -->
  <script src="vistas/dataTables/datatables.net/js/jquery.dataTables.js"></script>
  <script src="vistas/dataTables/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/dataTables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/dataTables/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Cierre link ejercicio1 -->


  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->
  <script src="vistas/js/bootstrap.min.js"></script>
  <script src="vistas/js/JsBarcode.code128.min.js"></script>
</body>

</html>