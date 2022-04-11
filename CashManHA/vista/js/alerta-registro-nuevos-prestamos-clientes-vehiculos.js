$(document).ready(function () {
    $("#ingreso-datos-credito-clientes").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var IDUsuarios = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO
        var $ProductoCreditosClientes = $('#valproductocreditos').val(); // NOMBRE PRODUCTO CREDITO CLIENTES
        var $TipoClienteCreditosClientes = $('#valtipoclientecredito').val(); // TIPO DE CLIENTE PRODUCTO CREDITO CLIENTES
        var $SalarioClienteCreditos = $('#valsalariocliente').val(); // SALARIO DE CLIENTE PRODUCTO CREDITO CLIENTES
        var $MontoClienteCreditos = $('#valmontocreditoclientes').val(); // MONTO DE FINANCIAMIENTO PRODUCTO CREDITO CLIENTES
        var $PlazoCreditosClientes = $('#valplazocredito').val(); // PLAZO PRODUCTO CREDITO CLIENTES
        var $FechaInicioClienteCreditos = $('#valfechaingresosolicitud').val(); // FECHA INGRESO SOLICITUD PRODUCTO CREDITO CLIENTES
        var $ObservacionesClienteCreditos = $('#valobservaciones').val(); // OBSERVACIONES DE CREDITO DE CLIENTES
        if ($ProductoCreditosClientes === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe seleccionar un producto para poder continuar", "warning");
            return false;
        }
        if ($TipoClienteCreditosClientes === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe seleccionar un tipo de cliente para poder continuar", "warning");
            return false;
        }
        if ($SalarioClienteCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese el salario mensual del cliente", "warning");
            return false;
        }
        if ($MontoClienteCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese el plazo en meses del crédito solicitado por el cliente", "warning");
            return false;
        }
        if ($MontoClienteCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese el monto del crédito solicitado por el cliente", "warning");
            return false;
        }
        if ($PlazoCreditosClientes === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese el plazo en meses del crédito solicitado por el cliente", "warning");
            return false;
        }
        if ($FechaInicioClienteCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese la fecha de inicio del crédito solicitado por el cliente", "warning");
            return false;
        }
        if ($ObservacionesClienteCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese las observaciones respectivas del crédito solicitado por el cliente", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-asignacion-prestamos-cashmanha-clientes",
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
                    AlertaUsuarioMostrar("Registro Exitoso", "Perfecto, la solicitud de préstamo ha sido ingresada exitosamente", "success");
                    // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                    setTimeout(function () {
                        //location.reload();
                        location.href ="../controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-referencias-personales-clientes&idusuario="+IDUsuarios;
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