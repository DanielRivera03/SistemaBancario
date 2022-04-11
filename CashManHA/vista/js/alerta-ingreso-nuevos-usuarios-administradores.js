// VARIABLES GLOBALES -> UNICAMENTE COMPROBACION CONTROL DE CONTRASEÑA AUTOMATICA
var $NombresUsuarios = $('#val-nombreusuario').val(); // NOMBRES DE USUARIO
var $ApellidosUsuarios = $('#val-apellidousuario').val(); // APELLIDOS DE USUARIO
var $CodigoUsuarios = $('#val-usuariounico').val(); // USUARIO UNICO IDENTIFICADOR DE USUARIO
var $CorreoUsuarios = $('#val-correo').val(); // CORREO DE USUARIO
var $ContraseniaUsuarios = $('#val-contrasenia').val(); // CONTRASENIA DE USUARIO 
var $ValidarContraseniaUsuarios = $('#val-confirmar-contrasenia').val(); // VERIFICAR CONTRASENIA
var $IdRolUduarios = $('#val-rol-usuarios').val(); // ROL ASIGNADO DE USUARIOS
var $ContraseniaAutomatica = $('#claves-generadas').val(); // COMPROBACION CONTRASEÑA GENERADA

// CONTROLADOR GENERADOR DE CONTRASEÑA AUTOMATICO
/*
    LOS USUARIOS DEBEN CUMPLIR ESTRICTAMENTE EN GENERAR LA CONTRASEÑA DE MANERA
    AUTOMATICA, CASO CONTRARIO TODOS LOS DEMAS ELEMENTOS PERMANECERAN BLOQUEADOS
    HASTA CUMPLIR CON LA CONDICION ANTERIOR << CONTRASEÑA GENERADA DEBE SER IGUAL A
    LA INGRESADA EN EL INPUT
*/
let activador = document.getElementById("val-contrasenia")
// TODOS LOS ELEMENTOS BLOQUEADOS POR DEFECTO
$('#val-nombreusuario').prop('disabled', true);
$('#val-apellidousuario').prop('disabled', true);
$('#val-usuariounico').prop('disabled', true);
$('#val-correo').prop('disabled', true);
$('#val-confirmar-contrasenia').prop('disabled', true);
// SI CONTRASEÑA INGRESADA ES IGUAL A LA GENERADA AUTOMATICAMENTE, ENTONCES DESBLOQUEAR INPUT
activador.addEventListener("keyup", () => {
    if(activador.value === $ContraseniaAutomatica){
        $('#val-nombreusuario').prop('disabled', false);
        $('#val-apellidousuario').prop('disabled', false);
        $('#val-usuariounico').prop('disabled', false);
        $('#val-correo').prop('disabled', false);
        $('#val-confirmar-contrasenia').prop('disabled', false);
        $('#val-rol-usuarios').prop('disabled', false);
        
        // CASO CONTRARIO, MANTENER EL BLOQUEO DE LOS INPUT
    }else{
        $('#val-nombreusuario').prop('disabled', true);
        $('#val-apellidousuario').prop('disabled', true);
        $('#val-usuariounico').prop('disabled', true);
        $('#val-correo').prop('disabled', true);
        $('#val-confirmar-contrasenia').prop('disabled', true);
        $('#val-rol-usuarios').prop('disabled', true);
    }
})

$(document).ready(function(){
    $("#registro-usuarios-administradores").on('submit',(function(e){ // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        var $NombresUsuarios = $('#val-nombreusuario').val(); // NOMBRES DE USUARIO
        var $ApellidosUsuarios = $('#val-apellidousuario').val(); // APELLIDOS DE USUARIO
        var $CodigoUsuarios = $('#val-usuariounico').val(); // USUARIO UNICO IDENTIFICADOR DE USUARIO
        var $CorreoUsuarios = $('#val-correo').val(); // CORREO DE USUARIO
        var $ContraseniaUsuarios = $('#val-contrasenia').val(); // CONTRASENIA DE USUARIO 
        var $ValidarContraseniaUsuarios = $('#val-confirmar-contrasenia').val(); // VERIFICAR CONTRASENIA
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
        if($ContraseniaUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Nueva contraseña es requerida, complete ese campo","warning");
            return false;
        }
        if($ValidarContraseniaUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Debe repetir nuevamente su contraseña ingresada","warning");
            return false;
        }
        if($ValidarContraseniaUsuarios != $ContraseniaUsuarios){
            AlertaUsuarioMostrar("Error","Lo sentimos, su contraseña debe coincidir a la ingresada anteriormente","error");
            return false;
        }
        if($IdRolUduarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Debe seleccionar un rol de usuario","warning");
            return false;
        }
        else{
        e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        $.ajax({
            url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-usuarios-administrador",
            type: "POST",
            dataType: 'json',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
        }).done(function($resultado){
            // SI ACCION ES CONFIRMADA POR EL MODELO, REALIZA ACTUALIZACION DE PERFIL
            if($resultado === "OK"){
                //window.open('../controlador/cGestionesCashman.php?cashmanhagestion=mostrar-informe-nuevos-clientes-administrador', '_blank');
                // MENSAJE DE CONFIRMACION EXITOSO
                AlertaUsuarioMostrar("Usuario Registrado","Perfecto, se ha registrado con éxito el nuevo usuario","success");
                // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                setTimeout(function(){
                    location.href="../controlador/cGestionesCashman.php?cashmanhagestion=registro-usuarios-administrador";
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