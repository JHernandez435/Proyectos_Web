$(document).ready(function() {


    var ListaProductos = [];
    if (localStorage.getItem("productos") != null) {
        var listaCarrito = JSON.parse(localStorage.getItem("productos"));
        listaCarrito.forEach(cargarVectorListaProductos);
    }

    function cargarVectorListaProductos(item, index) {
        ListaProductos.push({ "idproductos": item.idproductos, "codigo": item.codigo, "nombre": item.nombre, "descripcion": item.descripcion, "cantidades": item.cantidades, "cantidadStock": item.cantidadStock, "precio": item.precio, "imagen": item.imagen })
    }



    // cargarSelect();
    // -----------------------------------------------------------
    //       SECCION DE REGISTRO DE USUARIOS
    //------------------------------------------------------------ 
    $("#btnGuardarUsuarios").click(function() {
        var nombres = $("#txtNombres").val();
        var apellidos = $("#txtApellidos").val();
        var telefono = $("#txtTelefono").val();
        var clave = $("#txtClave").val();
        var idrol = $("#selectRol").val();
        var imagen = document.getElementById("txtImagen").files[0];
        var lhayError = false;



        if (nombres == "") {
            $("#valida-txtNombres").html("El campo nombres no puede ir vacio");
            $("#valida-txtNombres").slideDown("slow");
            lhayError = true;
        }

        if (apellidos == "") {
            $("#valida-txtApellidos").html("El campo Apellidos no puede ir vacio");
            $("#valida-txtApellidos").slideDown("slow");
            lhayError = true;
        }

        if (telefono == "") {
            $("#valida-txtTelefono").html("El campo Telefono no puede ir vacio");
            $("#valida-txtTelefono").slideDown("slow");
            lhayError = true;
        }
        if (clave == "") {
            $("#valida-txtClave").html("El campo Clave no puede ir vacio");
            $("#valida-txtClave").slideDown("slow");
            lhayError = true;
        }
        if (idrol == "") {
            $("#valida-selectRol").html("El campo rol no puede ir vacio");
            $("#valida-selectRol").slideDown("slow");
            lhayError = true;
        }
        if (imagen == null) {
            $("#valida-txtImagen").html("El campo imagen no puede ir vacio");
            $("#valida-txtImagen").slideDown("slow");
            lhayError = true;
        }

        if (!lhayError) {
            var objData = new FormData();
            objData.append("envioNombre", nombres);
            objData.append("envioApellidos", apellidos);
            objData.append("envioTelefono", telefono);
            objData.append("envioClave", clave);
            objData.append("envioIdrol", idrol);
            objData.append("envioImagen", imagen);
            $.ajax({
                async: true,
                url: "ajax/usuariosAjax.php",
                method: "POST",
                data: objData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    if (respuesta.resultado[0] == 1) {
                        window.location = "index.html";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...Falta rellenar campos',
                            text: respuesta.resultado[0]
                        })
                    }
                }
            })
        }
    })

    // -----------------------------------------------------------
    //       RESTABLECIMIENTO DE MENSAJES DE ERROR
    //------------------------------------------------------------ 
    $("#txtNombres").click(function() {
        $("#valida-txtNombres").slideUp("slow");
    })

    $("#txtApellidos").click(function() {
        $("#valida-txtApellidos").slideUp("slow");
    })

    $("#txtTelefono").click(function() {
        $("#valida-txtTelefono").slideUp("slow");
    })
    $("#txtClave").click(function() {
        $("#valida-txtClave").slideUp("slow");
    })

    $("#txtImagen").click(function() {
        $("#valida-txtImagen").slideUp("slow");
    })


    // -----------------------------------------------------------
    //       AGREGAR PRODUCTOS AL CARRO DE COMPRAS 
    //------------------------------------------------------------ 
    $("#tablaEjemplo").on("click", "#btnComprar", function() {
        var idproductos = $(this).attr("idproductos");
        var codigo = $(this).attr("codigo");
        var nombre = $(this).attr("nombre");
        var descripcion = $(this).attr("descripcion");
        var cantidadStock = $(this).attr("cantidad");
        var precio = $(this).attr("precio");
        var imagen = $(this).attr("imagen");
        var cantidad = 1;
        var hayProducto = false;
        var cantidadActual = 0;

        ListaProductos.forEach(buscarProductos);
        function buscarProductos(item, index){
            if(item.codigo == codigo){
                hayProducto = true;
                cantidadActual = Number(item.cantidades);
            }

        }
        if(!hayProducto ){
            ListaProductos.push({ "idproductos": idproductos, "codigo": codigo, "nombre": nombre, "descripcion": descripcion, "cantidades": cantidad, "cantidadStock": cantidadStock, "precio": precio, "imagen": imagen });
        localStorage.setItem("productos", JSON.stringify(ListaProductos));
        Swal.fire({
            icon: 'success',
            title: 'Usted ha agregado ' + nombre + ' al carrito de compras',
            text: ''
        })

        }else{
            cantidadActual = cantidadActual + 1;
            //cantidadActual = +1;
        
            actualizarCantidad(codigo,cantidadActual);

            function actualizarCantidad(codigo, cantidadActual) {
                var listaCarrito = JSON.parse(localStorage.getItem("productos"));
                var ListaProductos = [];
                listaCarrito.forEach(cargarVectorListaProductos);
                localStorage.setItem("productos", JSON.stringify(ListaProductos));
        
                function cargarVectorListaProductos(item, index) {
                    if (item.codigo == codigo) {
                        ListaProductos.push({ "idproductos": item.idproductos, "codigo": item.codigo, "nombre": item.nombre, "descripcion": item.descripcion, "cantidades": cantidadActual, "cantidadStock": item.cantidadStock, "precio": item.precio, "imagen": item.imagen })
                    } else {
                        ListaProductos.push({ "idproductos": item.idproductos, "codigo": item.codigo, "nombre": item.nombre, "descripcion": item.descripcion, "cantidades": item.cantidades, "cantidadStock": item.cantidadStock, "precio": item.precio, "imagen": item.imagen })
                    }
                }
            }


            Swal.fire({
                icon: 'success',
                title: 'Usted ha agregado otro  ' + nombre + ' al carrito de compras',
                text: ''
            })
        }

        
    })

    // -----------------------------------------------------------
    //       VISUALIZAR CARRO DE COMPRAS
    //------------------------------------------------------------ 
    $("#btn-carrito").click(function() {
        window.location = "carrito.html";
    })







    // -----------------------------------------------------------
    //       EDITAR USUARIOS 
    //------------------------------------------------------------ 
    $("#btnEditarUsuarios").click(function() {
            var idUsuario = $(this).attr("idUsuario");
            var nombres = $("#txtEditarNombres").val();
            var apellidos = $("#txtEditarApellidos").val();
            var telefono = $("#txtEditarTelefono").val();
            var clave = $("#txtEditarClave").val();
            var idrol = $("#selectEditarRol").val();
            var urlAnterior = $("#imgImagen").attr("urlAnterior");
            var hayArchivo = true;
            var imagen = document.getElementById("txtEditarImagen").files[0];



            if (imagen == undefined) {
                hayArchivo = false;
            }

            var lhayError = false; // variable logica

            if (nombres == "") {
                $("#valida-txtEditarNombres").html("El campo editado nombres no puede ir vacio")
                $("#valida-txtEditarNombres").slideDown("slow");
                lhayError = true;
            }

            if (apellidos == "") {
                $("#valida-txtEditarApellidos").html("El campo editado apellidos no puede ir vacio")
                $("#valida-txtEditarApellidos").slideDown("slow");
                lhayError = true;
            }

            if (telefono == "") {
                $("#valida-txtEditarTelefono").html("El campo editado telefono no puede ir vacio")
                $("#valida-txtEditarTelefono").slideDown("slow");
                lhayError = true;
            }

            if (clave == "") {
                $("#valida-txtEditarClave").html("El campo Clave no puede ir vacio");
                $("#valida-txtEditarClave").slideDown("slow");
                lhayError = true;
            }
            if (idrol == "") {
                $("#valida-selectEditarRol").html("El campo rol no puede ir vacio");
                $("#valida-selectEditarRol").slideDown("slow");
                lhayError = true;
            }

            var objData = new FormData();
            objData.append("idEditarUsuario", idUsuario);
            objData.append("editarNombre", nombres);
            objData.append("editarApellidos", apellidos);
            objData.append("editarTelefono", telefono);
            objData.append("editarClave", clave);
            objData.append("editarIdrol", idrol);
            objData.append("editarImagen", imagen);
            objData.append("eliminarImagenAnterior", urlAnterior);
            objData.append("hayArchivo", hayArchivo);


            $.ajax({
                async: true,
                url: "ajax/usuariosAjax.php",
                method: "POST",
                data: objData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    if (respuesta.resultado[0] == 1) {
                        window.location = "index.html";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops... Falta rellenar campos editados',
                            text: respuesta.resultado[0]
                        })
                    }
                }
            })

        })
        // RESTABLECER MENSAJES DE ERROR AL EDITAR

    $("#txtEditarNombres").click(function() {
        $("#valida-txtEditarNombres").slideUp("slow");
    })
    $("#txtEditarApellidos").click(function() {
        $("#valida-txtEditarApellidos").slideUp("slow");
    })
    $("#txtEditarTelefono").click(function() {
        $("#valida-txtEditarTelefono").slideUp("slow");
    })
    $("#txtEditarClave").click(function() {
        $("#valida-txtEditarClave").slideUp("slow");
    })
    $("#selectEditarRol").click(function() {
        $("#valida-selectEditarRol").slideUp("slow");
    })


    // -----------------------------------------------------------
    //      ELIMINAR USUARIOS 
    //------------------------------------------------------------ 
    $("#tablaEjemplo").on("click", "#btnEliminar", function() {
        Swal.fire({
            title: 'Esta Usted Seguro?',
            text: "Al realizar esta acción no podra revertirse!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrar registro!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                var idUsuario = $(this).attr("idUsuario");
                var rutaImagen = $(this).attr("imagen");
                var objData = new FormData();
                objData.append("idEliminarUsuario", idUsuario);
                objData.append("eliminarImagen", rutaImagen);
                $.ajax({
                    async: true,
                    url: "ajax/usuariosAjax.php",
                    method: "POST",
                    data: objData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if (respuesta.resultado[0] == 1) {
                            window.location = "index.html";
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: respuesta.resultado[0]
                            })
                        }
                    }
                })
            }
        })
    })



    function cargarSelect() {
        var objData = new FormData();
        objData.append("cargarSelect", "ok");
        $.ajax({
            async: true,
            url: "ajax/usuariosAjax.php",
            method: "POST",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#selectRol").html('<option value=>Seleccione rol</option>')
                $("#selectEditarRol").html('<option value=>Seleccione rol</option>')
                respuesta.forEach(funcionForeach);

                function funcionForeach(item, index) {
                    $("#selectRol").append('<option value="' + item.idrol + '">' + item.nombrerol + '</option>')
                    $("#selectEditarRol").append('<option value="' + item.idrol + '">' + item.nombrerol + '</option>')
                }
            }
        })
    }

});