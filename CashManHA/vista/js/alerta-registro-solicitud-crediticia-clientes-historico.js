$(document).ready(function () {
    $("#ingreso-datos-cuotas-mensuales-clientes-historico").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $CodigoUnicoCreditoEstadoCuenta = $('#CodigoUnicoCreditoEstadoCuenta').val(); // CODIGO UNICO DE SOLICITUD CREDITICIA CLIENTES
        var $CodigoUnicoUsuarioEstadoCuenta = $('#CodigoUnicoUsuarioEstadoCuenta').val(); // CODIGO UNICO DE CLIENTE SOLICITUD CREDITICIA CLIENTES
        var $CodigoUnicoProductoEstadoCuenta = $('#CodigoUnicoProductoEstadoCuenta').val(); // CODIGO UNICO DE PRODUCTOS SOLICITUD CREDITICIA CLIENTES
        var $NombreProductoEstadoCuenta = $('#NombreProductoEstadoCuenta').val(); // NOMBRE DE PRODUCTOS SOLICITUD CREDITICIA CLIENTES
        var $FechaPagoEstadoCuenta = $('#FechaPagoEstadoCuenta').val(); // FECHA DE PAGO E INGRESO SOLICITUD CREDITICIA CLIENTES
        var $CuotaMensualEstadoCuenta = $('#CuotaMensualEstadoCuenta').val(); // CUOTA MENSUAL ASIGNADA SOLICITUD CREDITICIA CLIENTES
        var $PlazoPagoEstadoCuenta = $('#PlazoPagoEstadoCuenta').val(); // PLAZO ASIGNADO SOLICITUD CREDITICIA CLIENTES
        var $MontoCapitalEstadoCuenta = $('#MontoCapitalEstadoCuenta').val(); // MONTO CAPITAL CALCULADO SOLICITUD CREDITICIA CLIENTES
        if ($CodigoUnicoCreditoEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite un código único de crédito asignado", "warning");
            return false;
        }
        if ($CodigoUnicoUsuarioEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite un código único de cliente asignado", "warning");
            return false;
        }
        if ($CodigoUnicoProductoEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite un código único de producto asignado", "warning");
            return false;
        }
        if ($NombreProductoEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite un nombre de identificación único de producto asignado", "warning");
            return false;
        }
        if ($FechaPagoEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite una fecha registrada de inicio de trámites en la solicitud crediticia", "warning");
            return false;
        }
        if ($CuotaMensualEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite una cuota mensual calculada previamente en la solicitud crediticia", "warning");
            return false;
        }
        if ($PlazoPagoEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no exite el plazo determinado en esta solicitud crediticia", "warning");
            return false;
        }
        if ($MontoCapitalEstadoCuenta === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Lo sentimos, no podemos continuar si no el cálculo exacto del abono a capital según solicitud crediticia", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-solicitudes-crediticias-clientes-historico",
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
                    AlertaUsuarioMostrar("Registro Exitoso", "Perfecto, las cuotas mensuales se han registrado con éxito en nuestro sistema", "success");
                    // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                    setTimeout(function () {
                        location.reload();
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
// FUNCION PARA DAR AVISO A USUARIOS QUE LA INFORMACION ESTA SIENDO PROCESADA
function AlertaProcesamientoDatos(){
    //$('#registro_solicitud').prop('disabled', true);
    AlertaUsuarioMostrar("Procesando Información", "Por favor espere un momento, estamos procesando la información", "info");
}

// FUNCION PARA MOSTRAR ALERTAS A USUARIOS
function AlertaUsuarioMostrar(titulo, descripcion, icono) {
    Swal.fire(
        titulo, // ENCABEZADO 
        descripcion, // CUERPO
        icono // ICONO DE ALERTA
    );
}

