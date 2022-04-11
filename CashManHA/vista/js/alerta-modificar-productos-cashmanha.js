$(document).ready(function () {
    $("#modificar-productos").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $CodigoProductos = $('#val-codigoproducto').val(); // CODIGO DE PRODUCTOS
        var $NombreProductos = $('#val-nombreproducto').val(); // NOMBRE DE PRODUCTOS
        var $DescripcionProductos = $('#val-descripcion-producto').val(); // DESCRIPCION DE PRODUCTOS 
        var $RequisitosProductos = $('#val-requisitos-producto').val(); // DESCRIPCION DE PRODUCTOS 
        var $EstadoProductos = $('#val-estado-producto').val(); // ESTADO DE PRODUCTOS
        if ($CodigoProductos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Código de producto es requerido, complete ese campo", "warning");
            return false;
        }
        if ($NombreProductos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Nombre de producto es requerido, complete ese campo", "warning");
            return false;
        }
        if ($DescripcionProductos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Descripción completa de producto es requerido, complete ese campo", "warning");
            return false;
        }
        if ($RequisitosProductos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Requisitos de producto es requerido, complete ese campo", "warning");
            return false;
        }
        if ($EstadoProductos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Por favor seleccione una opción", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-modificar-productos-cashmanha",
                type: "POST",
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
            }).done(function ($resultado) {
                // SI ACCION ES CONFIRMADA POR EL MODELO, REALIZA ACTUALIZACION DE PERFIL
                if ($resultado === "OK") {
                    // MENSAJE DE CONFIRMACION EXITOSO
                    AlertaUsuarioMostrar("Registro Actualizado", "Perfecto, has actualizado con éxito los detalles de el registro de este producto", "success");
                    // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                    setTimeout(function () {
                        location.href = "../controlador/cGestionesCashman.php?cashmanhagestion=consultar-productos-cashmanha";
                    }, 1500);
                    // ERROR PROCESAMIENTO DE DATOS -> DENTRO DEL SISTEMA 
                } else if ($resultado === "ERROR") {
                    AlertaUsuarioMostrar("Error", "Lo sentimos, no hemos podido completar tu solicitud, verifica todos los campos, si todo está bien, regresa más tarde", "error");
                }
                // ERROR FALLO PROCESAMIENTO DE DATOS -> AJAX    
            }).fail(function ($resultado) {
                AlertaUsuarioMostrar("Error", "Lo sentimos, ha ocurrido un error al momento de procesar tu solicitud. Por favor revisa que cumplas con todos los campos", "error");
            });
        }
    }));
});
// FUNCION PARA MOSTRAR ALERTAS A USUARIOS
function AlertaUsuarioMostrar(titulo, descripcion, icono) {
    Swal.fire(
        titulo, // ENCABEZADO 
        descripcion, // CUERPO
        icono // ICONO DE ALERTA
    );
}