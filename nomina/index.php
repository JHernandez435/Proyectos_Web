<?php
require_once "controlador/usuariosControlador.php";
require_once "modelo/usuariosModelo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="vistas/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <title>Proyecto Adsi</title>
</head>

<body id="cuerpo">
    <!-- titulo -->
    <h4 id="titulo"> Proyecto A.D.S.I.</h4>
    <!--fin  titulo -->
    <!-- Cuerpo1 -->
    <div id="primeraColumna" class="row">
        <!-- espacio -->
        <div class="col-sm-1"></div>
        <!-- fin espacio -->
        <div class="col-sm-3">
            <!-- formulario -->
            <form id="formulario">
                <div id="nombreApellido" class="form-row">
                    <div id="grupoNombre" class="form-group col-md-6">
                        <label for="inputNombre">Nombre</label>
                        <input class="form-control" id="inputNombre" placeholder="Nombre">
                    </div>
                    <div id="grupoApellido" class="form-group col-md-6">
                        <label for="inputApellido">Apellido</label>
                        <input class="form-control" id="inputApellido" placeholder="Apellido">
                    </div>
                </div>
                <div id="dependencias" class="form-row">
                    <div id="grupoDependecias" class="form-group col-md-4">
                        <label for="inputDependecias">Dependencia</label>
                        <select id="inputDependecias" class="form-control">
                            <option selected>Sistemas</option>
                            <option selected>Contabilidad</option>
                            <option selected>Salud</option>
                            <option selected>Seleccione...</option>
                        </select>
                    </div>
                </div>
                <div id="salario" class="form-group">
                    <label for="inputSalario">Salario</label>
                    <input type="text" class="form-control" id="inputSalario" placeholder="Salario">
                </div>
                <button id="registrar" type="button" class="btn btn-info">Registrar</button>
            </form>
            <!--Fin formulario -->
        </div>
        <!--Segunda Columna -->
        <div id="segundaCol" class="col-sm-6">
            <!--TODOS USUARIOS -->
            <table id="tablaUsuarioTotal" class="table table-light" >
                <thead id="listado">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Dependencia</td>
                        <td>Salario</td>
                    </tr>
                </thead >
                <!-- carga usuarios -->
                    <?php
                    $objusuarios = usuariosControlador::fnCtrCargarUsuarios();
                    $totalUsuarios = 0;
                    $mayor = 0;
                    foreach ($objusuarios as $key => $value) {
                        $idusuario = $value['idusuario'];
                        $nombres = $value['nombres'];
                        $apellidos = $value['apellidos'];
                        $dependencia = $value['dependencia'];
                        $salario = $value['salario'];
                        $totalUsuarios = $salario+$totalUsuarios;
                        if($salario>$mayor){
                            $mayor=$salario;
                        }

                    ?>
                        <tbody id="cuerpoLista">
                            <tr id="listar">
                                <td><?php echo $nombres; ?></td>
                                <td><?php echo $apellidos; ?></td>
                                <td><?php echo $dependencia; ?></td>
                                <td>$ <?php echo $salario; ?></td>
                            </tr>
                        <?php
                    }
                        ?>
                        
                    </tbody>
                    
                    <!-- fin carga usuarios -->

            </table>
            <h4 id="totalUsuarios"><?php echo $totalUsuarios; ?></h4>
            <!--SISTEMAS -->
            <table id="tablaSistemas" class="table table-light">
                <thead id="listado">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Dependencia</td>
                        <td>Salario</td>
                    </tr>
                </thead >
                <!-- carga usuarios -->
                <div id="cargaTotal">
                    <?php
                    $objusuarios = usuariosControlador::fnCtrCargarSistemas();
                    $totalSistemas = 0;
                    $mayorSistemas = 0;
                    foreach ($objusuarios as $key => $value) {
                        $idusuario = $value['idusuario'];
                        $nombres = $value['nombres'];
                        $apellidos = $value['apellidos'];
                        $dependencia = $value['dependencia'];
                        $salario = $value['salario'];
                        $totalSistemas = $salario+$totalSistemas;
                        if($salario>$mayorSistemas){
                            $mayorSistemas=$salario;
                        }
                    ?>
                        <tbody id="cuerpoLista">
                            <tr id="listar">
                                <td><?php echo $nombres; ?></td>
                                <td><?php echo $apellidos; ?></td>
                                <td><?php echo $dependencia; ?></td>
                                <td>$ <?php echo $salario; ?></td>
                            </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                    <!-- fin carga usuarios -->
                    </div>
            </table>
            <h4 id="totalSistemas"><?php echo $totalSistemas; ?></h4>
            <!--CONTABILIDAD -->
            <table id="tablaContabilidad" class="table table-light">
                <thead id="listado">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Dependencia</td>
                        <td>Salario</td>
                    </tr>
                </thead >
                <!-- carga usuarios -->
                <div id="cargaTotal">
                    <?php
                    $objusuarios = usuariosControlador::fnCtrCargarContabilidad();
                    $totalContabilidad = 0;
                    $mayorContabilidad = 0;
                    foreach ($objusuarios as $key => $value) {
                        $idusuario = $value['idusuario'];
                        $nombres = $value['nombres'];
                        $apellidos = $value['apellidos'];
                        $dependencia = $value['dependencia'];
                        $salario = $value['salario'];
                        $totalContabilidad = $salario+$totalContabilidad;
                        if($salario>$mayorContabilidad){
                            $mayorContabilidad=$salario;
                        }
                    ?>
                        <tbody id="cuerpoLista">
                            <tr id="listar">
                                <td><?php echo $nombres; ?></td>
                                <td><?php echo $apellidos; ?></td>
                                <td><?php echo $dependencia; ?></td>
                                <td>$ <?php echo $salario; ?></td>
                            </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                    <!-- fin carga usuarios -->
                    </div>
            </table>
            <h4 id="totalContabilidad"><?php echo $totalContabilidad; ?></h4>
            <!--SALUD -->
            <table id="tablaSalud" class="table table-light">
                <thead id="listado">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Dependencia</td>
                        <td>Salario</td>
                    </tr>
                </thead >
                <!-- carga usuarios -->
                <div id="cargaTotal">
                    <?php
                    $objusuarios = usuariosControlador::fnCtrCargarSalud();
                    $totalSalud = 0;
                    $mayorSalud = 0;
                    foreach ($objusuarios as $key => $value) {
                        $idusuario = $value['idusuario'];
                        $nombres = $value['nombres'];
                        $apellidos = $value['apellidos'];
                        $dependencia = $value['dependencia'];
                        $salario = $value['salario'];
                        $totalSalud = $salario+$totalSalud;
                        if($salario>$mayorSalud){
                            $mayorSalud=$salario;
                        }
                    ?>
                        <tbody id="cuerpoLista">
                            <tr id="listar">
                                <td><?php echo $nombres; ?></td>
                                <td><?php echo $apellidos; ?></td>
                                <td><?php echo $dependencia; ?></td>
                                <td>$ <?php echo $salario; ?></td>
                            </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                    <!-- fin carga usuarios -->
                    </div>
            </table>
            <h4 id="totalSalud"><?php echo $totalSalud; ?></h4>

        </div>
        <!-- Fin Segunda Columna -->
        <!-- espacio -->
        <div id="padreBotones" class="col-sm-1">
            <!-- grupo de botones -->
            <div id="botones" class="btn-group-vertical">
                <button id="totalUsuariosBtn" type="button" class="btn btn-warning">Total Usuarios</button>
                <button id="sistemas" type="button" class="btn btn-info">Sistemas</button>
                <button id="contabilidad" type="button" class="btn btn-info">Contabilidad</button>
                <button id="salud" type="button" class="btn btn-info">Salud</button>
            </div>
            <!--Fin grupo de botones -->
        </div>
        <!-- fin espacio -->
    </div>

    <div class="row" id="filaBaja">
        <div class="col-sm-1"></div>
        <div class="col-sm-1.5">
            <form id="formularioNomina">
                <div class="form-group col-md">
                    <label for="valoresNominas">Total Nomina Usuarios</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" placeholder="Total Nomina" value="$ <?php echo $totalUsuarios; ?>">
                    <small id="emailHelp" class="form-text text-muted">Suma total de nominas</small>
                </div>
                <div class="form-group col-md">
                    <label for="valoresNominas">Total Nomina Sistemas</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" placeholder="Total Nomina" value="$ <?php echo $totalSistemas; ?>">
                    <small id="emailHelp" class="form-text text-muted">Suma total de nominas</small>
                </div>
                <div class="form-group col-md">
                    <label for="valoresNominas">Total Nomina Contabilidad</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" placeholder="Total Nomina" value="$ <?php echo $totalContabilidad; ?>">
                    <small id="emailHelp" class="form-text text-muted">Suma total de nominas</small>
                </div>
                <div class="form-group col-md">
                    <label for="valoresNominas">Total Nomina Salud</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" placeholder="Total Nomina" value="$ <?php echo $totalSalud; ?>">
                    <small id="emailHelp" class="form-text text-muted">Suma total de nominas</small>
                </div>
            </form>
        </div>
        <div class="col-sm-1.5">
            <form id="formularioNomina">
                <div class="form-group col-md">
                    <label for="valoresNominas">Max Salario Usuarios</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" value="$ <?php echo $mayor; ?> ">
                    <small id="emailHelp" class="form-text text-muted">Salario mas alto</small>
                </div>
                <div class="form-group col-md">
                    <label for="valoresNominas">Max Salario Sistemas</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" value="$ <?php echo $mayorSistemas; ?> ">
                    <small id="emailHelp" class="form-text text-muted">Salario mas alto</small>
                </div>
                <div class="form-group col-md">
                    <label for="valoresNominas">Max Salario Contabilidad</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" value="$ <?php echo $mayorContabilidad; ?>">
                    <small id="emailHelp" class="form-text text-muted">Salario mas alto</small>
                </div>
                <div class="form-group col-md">
                    <label for="valoresNominas">Max Salario Salud</label>
                    <input class="form-control" id="valoresNominas" readonly aria-describedby="emailHelp" value="$ <?php echo $mayorSalud; ?>">
                    <small id="emailHelp" class="form-text text-muted">Salario mas alto</small>
                </div>
            </form>
        </div>
    </div>

    <!--fin Cuerpo1 -->
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>

</html>