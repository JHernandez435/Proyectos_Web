$(document).ready(function() {

    var total = 0;
    var merchantId = "508029";
    var accountId = "512321";
    var apiKey ="4Vj8eK4rloUd272L48hsrarnUA";
    var apilogin ="pRRXKOl8ikMmt9u";
    var url = "https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/";
    var description = "";
    var referenceCode = "";
    var amount = 0;
    var acumuladoImpuestos = 0;
    var taxReturnBase = 0;
    var currency= "COP";
    var signature = "";
    var test = 1;
    var responseUrl ="";

    var descripcionFinal = [];
    var acumuladoImpuestos = 0;
    var envio = 9000;
    var totalCompra = 0;

  cargarCarrito();


    function cargarCarrito() {

        if (localStorage.getItem("productos") != null) {
            var listaCarrito = JSON.parse(localStorage.getItem("productos"));
            $("#lista").html("");
    
            listaCarrito.forEach(visualizarProductos);
    
            function visualizarProductos(item, index) {
                var nombre = item.nombre;
                var codigo = item.codigo;
                var imagen = item.imagen;
                var precio = item.precio;
                var cantidad = item.cantidades;
                var subTotal = cantidad * precio;
                total += subTotal;
    
                var objBotones = '<button id="btnEliminarProducto" class="btn btn-sm btn-danger" title="eliminar" codigo="' + codigo + '"><i class="fa fa-window-close"></i></button>';
    
    
                var interface = '<tr id="fila">'; // fila
                interface += '<td>' + objBotones + '</td>';
                interface += '<td id="columnaCodigo">' + codigo + '</td>';
                interface += '<td>' + nombre + '</td>';
                interface += '<td><img src="' + imagen + '" width="80" height="80"></td>';
                interface += '<td id="columnaCantidad"><input id="cantidad" type="number" value="' + cantidad + '" min="1" style="width: 90px;"></td>';
                interface += '<td id="columnaPrecio">' + precio + '</td>';
                interface += '<td id="columnaPrecioTotal">' + subTotal + '</td>';
                interface += '</tr>'; // cierre de la fila
    
                $("#datos").append(interface);
            }
    
    
            var interface = '<tr id="fila">'; // fila
            interface += '<td></td>';
            interface += '<td></td>';
            interface += '<td></td>';
            interface += '<td></td>';
            interface += '<td></td>';
            interface += '<td><h3>Total: </h3></td>';
            interface += '<td id="totalVenta"><h3>' + total + '</h3></td>';
            interface += '</tr>'; // cierre de la fila
            $("#datos").append(interface);
    
        }

    }

    


    $("#tablaCarrito").on("change", "#cantidad", function() {
        var cantidad = $(this).val();
        var codigo = $(this).parent().parent().children("#columnaCodigo").html();
        var precio = $(this).parent().parent().children("#columnaPrecio").html();
        var subTotal = cantidad * precio;
        var objTotales = $(this).parent().parent().children("#columnaPrecioTotal");
        objTotales.html(subTotal);

        actualizarCantidad(codigo, cantidad);
        sumarTotales();
    })


    function sumarTotales() {
        var subTotales = $("#tablaCarrito #columnaPrecioTotal");
        var vectorSubtotales = [];
        for (let i = 0; i < subTotales.length; i++) {
            vectorSubtotales.push(Number($(subTotales[i]).html()));
        }
        var valorTotal = vectorSubtotales.reduce(sumarSubTotales);
        $("#totalVenta").html('<h3>' + valorTotal + '</h3>')
    }


    function sumarSubTotales(valorVector, valorInicial) {
        return valorVector + valorInicial;
    }


    function actualizarCantidad(codigo, cantidad) {
        var listaCarrito = JSON.parse(localStorage.getItem("productos"));
        var ListaProductos = [];
        listaCarrito.forEach(cargarVectorListaProductos);
        localStorage.setItem("productos", JSON.stringify(ListaProductos));

        function cargarVectorListaProductos(item, index) {
            if (item.codigo == codigo) {
                ListaProductos.push({ "idproductos": item.idproductos, "codigo": item.codigo, "nombre": item.nombre, "descripcion": item.descripcion, "cantidades": cantidad, "cantidadStock": item.cantidadStock, "precio": item.precio, "imagen": item.imagen })
            } else {
                ListaProductos.push({ "idproductos": item.idproductos, "codigo": item.codigo, "nombre": item.nombre, "descripcion": item.descripcion, "cantidades": item.cantidades, "cantidadStock": item.cantidadStock, "precio": item.precio, "imagen": item.imagen })
            }
        }
    }


    $("#tablaCarrito").on("click", "#btnEliminarProducto", function(){
        var codigo = $(this).attr("codigo");
        //var objFila = $(this).parent().parent();
        $(this).parent().parent().remove(); 
        //objFila.remove();
        var nuevaLista =[];
        var listaCarrito = JSON.parse(localStorage.getItem("productos"));

        listaCarrito.forEach(eliminarProducto);

        function eliminarProducto(item, index){
            if(item.codigo != codigo ){
                nuevaLista.push({ "idproductos": item.idproductos, "codigo": item.codigo, "nombre": item.nombre, "descripcion": item.descripcion, "cantidades": item.cantidades, "cantidadStock": item.cantidadStock, "precio": item.precio, "imagen": item.imagen })
            }


        }
        localStorage.setItem("productos", JSON.stringify(nuevaLista));

        $("#datos").html("");
        total = 0;
        cargarCarrito();
    })

    // agregar a ventana modal informacion de productos 
    $("#btn-pagos").click(function(){
        $("#listado").html("");

        var listaCarrito = JSON.parse(localStorage.getItem("productos"));
        var acumuladoSubtotal = 0;
        acumuladoImpuestos = 0;
        var porcentaje = 0.19;
        envio = 9000;
        totalCompra = 0;
        descripcionFinal = [];
        var contador = 0;



        listaCarrito.forEach(listaProductos);

        function listaProductos(item, index){

            descripcionFinal[contador] = item.nombre;

            var subTotal = item.cantidades * item.precio;

            acumuladoSubtotal = acumuladoSubtotal + subTotal;

            acumuladoImpuestos += (subTotal * porcentaje);

            
            var  interface = '<tr>';
            interface += '<td>'+item.nombre+'</td>';
            interface += '<td>'+item.cantidades+'</td>';
            interface += '<td>'+"$ "+subTotal+'</td>';
            interface += '</tr>';
            $("#listado").append(interface);
            $("#valorImpuesto").html("$" + acumuladoImpuestos);
            $("#acumuladoSubtotal").html("$ "+acumuladoSubtotal);
            $("#acumuladoEnvios").html("$ " + envio);
            contador += 1;
        }
        totalCompra = (acumuladoSubtotal + acumuladoImpuestos + envio);
        $("#valorTotal").html("$ " + totalCompra);
        
        
        pagarPayu();

    })

    function pagarPayu(){
        var descripcion = descripcionFinal.toString();
        var productos = descripcion.replace(/,/g, "-");
        referenceCode = (Number(Math.ceil(Math.random() * 1000000)) + Number(totalCompra).toFixed());
        var taxReturnBase = (totalCompra - acumuladoImpuestos).toFixed(2);
        var lenguaje ="es";
        var displayShippingInformation = "YES";
        signature = hex_md5( apiKey + "~" + merchantId + "~" + referenceCode + "~" + totalCompra + "~" + currency);
        $(".formPayu").attr("action",url);
        $(".formPayu input[name='merchantId']").attr("value", merchantId);
        $(".formPayu input[name='accountId']").attr("value", accountId);
        $(".formPayu input[name='description']").attr("value", productos);
        $(".formPayu input[name='referenceCode']").attr("value", referenceCode);
        $(".formPayu input[name='amount']").attr("value", totalCompra);
        $(".formPayu input[name='tax']").attr("value", acumuladoImpuestos);
        $(".formPayu input[name='taxReturnBase']").attr("value", taxReturnBase);
        $(".formPayu input[name='shipmentValue']").attr("value", envio);
        $(".formPayu input[name='currency']").attr("value", currency);
        $(".formPayu input[name='lng']").attr("value",lenguaje);
        $(".formPayu input[name='responseUrl']").attr("value","http://localhost/index.html");
        $(".formPayu input[name='declinedResponseUrl']").attr("value","http://localhost/Rdeclinada.html");
        $(".formPayu input[name='displayShippingInformation']").attr("value",displayShippingInformation);
        $(".formPayu input[name='signature']").attr("value",signature);
        $(".formPayu input[name='test']").attr("value",test);


    }

})