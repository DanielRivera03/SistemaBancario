$(document).ready(function () {
    $("#ingreso-nuevos-reportesfallos").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $NombreReportePlataforma = $('#val-nombrereporte').val(); // CODIGO DE PRODUCTOS
        var $DescripcionReportePlataforma = $('#val-descripcion-reporte').val(); // NOMBRE DE PRODUCTOS
        var $FotoReportePlataforma = $('#fotoreporteproblema').val(); // DESCRIPCION DE PRODUCTOS 
        if ($NombreReportePlataforma === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Nombre de reporte es requerido, complete ese campo", "warning");
            return false;
        }
        if ($DescripcionReportePlataforma === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Descripción completa de reporte es requerido, complete ese campo", "warning");
            return false;
        }
        if ($FotoReportePlataforma === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Adjuntar fotografía de reporte es requerido, complete ese campo", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-tickets-problemas-plataforma",
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
                    AlertaUsuarioMostrar("Registro Exitoso", "Perfecto, has registrado con éxito ticket de soporte", "success");
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
// FUNCION PARA MOSTRAR ALERTAS A USUARIOS
function AlertaUsuarioMostrar(titulo, descripcion, icono) {
    Swal.fire(
        titulo, // ENCABEZADO 
        descripcion, // CUERPO
        icono // ICONO DE ALERTA
    );
}