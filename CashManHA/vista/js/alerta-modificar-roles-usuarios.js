$(document).ready(function () {
    $("#modificar-nuevos-roles-usuarios").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $NombreRolUsuarios = $('#val-nombrerolusuarios').val(); // NOMBRE ROL USUARIOS
        var $DescripcionRolUsuarios = $('#val-descripcion-rolusuarios').val(); // DESCRIPCION ROL USUARIOS
        if ($NombreRolUsuarios === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Nombre de rol de usuario es requerido, complete ese campo", "warning");
            return false;
        }
        if ($DescripcionRolUsuarios === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Descripción completa de rol de usuario es requerido, complete ese campo", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-modificar-roles-usuarios",
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
                    AlertaUsuarioMostrar("Registro Actualizado", "Perfecto, has modificaro con éxito el  rol de usuario solicitado", "success");
                    // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                    setTimeout(function () {
                        location.href = "../controlador/cGestionesCashman.php?cashmanhagestion=consulta-roles-usuarios";
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