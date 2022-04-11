$(document).ready(function () {
    $("#ingreso-datos-credito-clientes").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        var $EstadoSolicitudesCreditos = $('#valestadofinalcreditos').val(); // ESTADO ACTUALIZADO SOLICITUDES DE CREDITOS
        var $ObservacionesActualizacionSolicitudesCreditos = $('#valobservacionespresidencia').val(); // OBSERVACIONES DE SOLICITUDES DE CREDITOS [GERENCIA Y PRESIDENCIA]
        if ($EstadoSolicitudesCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, por favor seleccione un estado de esta solicitud de crédito", "warning");
            return false;
        }
        if ($ObservacionesActualizacionSolicitudesCreditos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Campo incompleto, ingrese las observaciones respectivas en esta solicitud de crédito", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-revision-final-solicitudes-creditos-clientes",
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
                    AlertaUsuarioMostrar("Solicitud Actualizada", "Perfecto, la solicitud de préstamo ha sido actualizada exitosamente en nuestro sistema", "success");
                    // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                    setTimeout(function () {
                        location.reload();
                        //location.href ="../controlador/cGestionesCashman.php?cashmanhagestion=gestionar-solicitudes-creditos-asignados-clientes-gerencia";
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