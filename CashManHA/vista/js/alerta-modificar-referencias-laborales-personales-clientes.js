$(document).ready(function () {
    $("#modificar-datos-referencias-clientes").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $NombresReferenciaPersonal = $('#val-nombrereferenciapersonal').val();// NOMBRES REFERENCIA PERSONAL
        var $ApellidosReferenciaPersonal = $('#val-apellidosreferenciapersonal').val();// APELLIDOS REFERENCIA PERSONAL
        var $EmpresaReferenciaPersonal = $('#val-empresareferenciapersonal').val();// EMPRESA REFERENCIA PERSONAL
        var $ProfesionOficioReferenciaPersonal = $('#val-profesionreferenciapersonal').val();// PROFESION U OFICIO REFERENCIA PERSONAL
        var $TelefonoReferenciaPersonal = $('#val-telefonoreferenciapersonal').val();// TELEFONO REFERENCIA PERSONAL
        var $NombresReferenciaLaboral = $('#val-nombrereferencialaboral').val();// NOMBRES REFERENCIA LABORAL
        var $ApellidosReferenciaLaboral = $('#val-apellidosreferencialaboral').val();// APELLIDOS REFERENCIA LABORAL
        var $EmpresaReferenciaLaboral = $('#val-empresareferencialaboral').val();// EMPRESA REFERENCIA LABORAL
        var $ProfesionOficioReferenciaLaboral = $('#val-profesionreferencialaboral').val();// PROFESION U OFICIO REFERENCIA LABORAL
        var $TelefonoReferenciaLaboral = $('#val-telefonoreferencialaboral').val();// TELEFONO REFERENCIA LABORAL
        if ($NombresReferenciaPersonal === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar los nombres de su referencia personal", "warning");
            return false;
        }
        if ($ApellidosReferenciaPersonal === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar los apellidos de su referencia personal", "warning");
            return false;
        }
        if ($EmpresaReferenciaPersonal === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el lugar dónde labora su referencia personal", "warning");
            return false;
        }
        if ($ProfesionOficioReferenciaPersonal === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar la profesión u oficio de su referencia personal", "warning");
            return false;
        }
        if ($TelefonoReferenciaPersonal === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el teléfono de contácto de su referencia personal", "warning");
            return false;
        }
        if ($NombresReferenciaLaboral === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar los nombres de su referencia laboral", "warning");
            return false;
        }
        if ($ApellidosReferenciaLaboral === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar los apellidos de su referencia laboral", "warning");
            return false;
        }
        if ($EmpresaReferenciaLaboral === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el lugar dónde labora su referencia laboral", "warning");
            return false;
        }
        if ($ProfesionOficioReferenciaLaboral === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar la profesión u oficio de su referencia laboral", "warning");
            return false;
        }
        if ($TelefonoReferenciaLaboral === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el teléfono de contácto de su referencia laboral", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-modificar-referencias-personales-laborales-clientes",
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
                    AlertaUsuarioMostrar("Registro Actualizado", "Perfecto, las referencias solicitadas han sido actualizadas con éxito", "success");
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