$(document).ready(function(){
    $("#modificar-usuarios-administradores").on('submit',(function(e){ // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        var $NombresUsuarios = $('#val-nombreusuario').val(); // NOMBRES DE USUARIO
        var $ApellidosUsuarios = $('#val-apellidousuario').val(); // APELLIDOS DE USUARIO
        var $CodigoUsuarios = $('#val-usuariounico').val(); // USUARIO UNICO IDENTIFICADOR DE USUARIO
        var $CorreoUsuarios = $('#val-correo').val(); // CORREO DE USUARIO
        var $IdRolUduarios = $('#val-rol-usuarios').val(); // ROL ASIGNADO DE USUARIOS
        if($NombresUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Nombres de usuario es requerido, complete ese campo","warning");
            return false;
        }
        if($ApellidosUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Apellidos de usuario es requerido, complete ese campo","warning");
            return false;
        }
        if($CodigoUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Código de usuario es requerido, complete ese campo","warning");
            return false;
        }
        if($CorreoUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Correo de usuario es requerido, complete ese campo","warning");
            return false;
        }
        if($("#val-correo").val().indexOf('@', 0) == -1 || $("#val-correo").val().indexOf('.', 0) == -1) {
            AlertaUsuarioMostrar("Campo Incorrecto","Correo ingresado no es válido","warning");
            return false;
        }
        if($IdRolUduarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Debe seleccionar un rol de usuario","warning");
            return false;
        }
        else{
        e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        $.ajax({
            url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-modificar-usuarios-administrador",
            type: "POST",
            dataType: 'json',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
        }).done(function($resultado){
            // SI ACCION ES CONFIRMADA POR EL MODELO, REALIZA ACTUALIZACION DE PERFIL
            if($resultado === "OK"){
                // MENSAJE DE CONFIRMACION EXITOSO
                AlertaUsuarioMostrar("Usuario Modificado","Perfecto, se han actualizado con éxito los datos de este usuario","success");
                // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                setTimeout(function(){
                    location.href="../controlador/cGestionesCashman.php?cashmanhagestion=consulta-general-usuarios-administrador";
                }, 1500);
            // ERROR PROCESAMIENTO DE DATOS -> DENTRO DEL SISTEMA 
            }else if($resultado === "ERROR"){
                AlertaUsuarioMostrar("Error","Lo sentimos, no hemos podido completar tu solicitud, verifica todos los campos, si todo está bien, regresa más tarde","error");
            }  
        // ERROR FALLO PROCESAMIENTO DE DATOS -> AJAX    
        }).fail(function($resultado) {
            AlertaUsuarioMostrar("Error","Lo sentimos, ha ocurrido un error al momento de procesar tu solicitud. Por favor revisa que cumplas con todos los campos","error");
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