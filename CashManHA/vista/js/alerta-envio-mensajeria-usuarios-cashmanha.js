$(document).ready(function () {
    $("#envio-datos-mensajeriausuarios").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $DestinatarioMensajeria = $('#val-destinatario').val(); // USUARIO DESTINATARIO FINAL
        var $NombreMensajeria = $('#val-nombremensaje').val(); // NOMBRE MENSAJE 
        var $AsuntoMensajeria = $('#val-asuntomensaje').val(); // ASUNTO MENSAJE
        var $DetalleMensajeria = $('#val-mensajecompleto').val(); // MENSAJE DE ENVIO DESTINATARIO FINAL
        if ($DestinatarioMensajeria === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe seleccionar el usuario a quién realizará el envío de este mensaje", "warning");
            return false;
        }
        if ($NombreMensajeria === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Asignar un nombre al mensaje es requerido, complete ese campo", "warning");
            return false;
        }
        if ($AsuntoMensajeria === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Asignar un asunto al mensaje es requerido, complete ese campo", "warning");
            return false;
        }
        if ($DetalleMensajeria === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Detallar el mensaje a compartir con el destinatario es requerido, complete ese campo", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-mensajeria-usuarios",
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
                    AlertaUsuarioMostrar("Mensaje Enviado", "Perfecto se ha enviado con éxito tu mensaje al destinatario final. Espera su respuesta", "success");
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