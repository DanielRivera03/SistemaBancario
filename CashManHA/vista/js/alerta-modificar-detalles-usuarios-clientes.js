$(document).ready(function(){
    $("#modificar-detalles-clientes-usuarios").on('submit',(function(e){ // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $DuiUsuarios = $('#val-dui').val(); // NUMERO DE DUI
        var $NitUsuarios = $('#val-nit').val(); // NUMERO DE NIT
        var $DireccionResidenciaUsuarios = $('#val-direccion1').val(); // DIRECCION RESIDENCIA 
        var $NombreEmpresaUsuarios = $('#val-nombreempresa').val(); // NOMBRE EMPRESA
        var $CargoEmpresaUsuarios = $('#val-cargoempresa').val(); // CARGO DESEMPEÑADO
        var $DireccionTrabajoUsuarios = $('#val-direccion2').val(); // DIRECCION TRABAJO
        var $FechaNacimientoUsuarios = $('#val-fechanacimiento').val(); // FECHA NACIMIENTO
        var $GeneroUsuarios = $('#val-genero').val(); // GENERO USUARIOS
        var $EstadoCivilUsuarios = $('#val-estadocivil').val(); // ESTADO CIVIL USUARIOS
        var $FotoDuiUsuariosFrontal = $('#fotoduiusuariosfrontal').val(); // FOTO DUI FRONTAL ADJUNTO USUARIOS
        var $FotoDuiUsuariosReverso = $('#fotoduiusuariosreverso').val(); // FOTO DUI REVERSO ADJUNTO USUARIOS
        var $FotoNitUsuarios = $('#fotonitusuarios').val(); // FOTO DUI ADJUNTO USUARIOS
        var $FotoFirmaUsuarios = $('#fotofirmausuarios').val(); // FOTO DUI ADJUNTO USUARIOS
        if($DuiUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Número de dui es requerido, complete ese campo","warning");
            return false;
        }
        if($NitUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Número de nit es requerido, complete ese campo","warning");
            return false;
        }
        if($DireccionResidenciaUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Dirección completa de su residencia es requerido, complete ese campo","warning");
            return false;
        }
        if($NombreEmpresaUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Nombre de empresa donde labora es requerido, complete ese campo","warning");
            return false;
        }
        if($CargoEmpresaUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Cargo desempeñado en empresa donde labora es requerido, complete ese campo","warning");
            return false;
        }
        if($DireccionTrabajoUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Dirección completa de empresa donde labora es requerido, complete ese campo","warning");
            return false;
        }
        if($FechaNacimientoUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Fecha de nacimiento es requerido, complete ese campo","warning");
            return false;
        }
        if($GeneroUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Especificar su género es requerido, seleccione una opción","warning");
            return false;
        }
        if($EstadoCivilUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Especificar su estado civil actual es requerido, seleccione una opción","warning");
            return false;
        }
        if($FotoDuiUsuariosFrontal === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Por favor adjunte fotografía del documento único de identidad (Dui - Frontal) de nuevo cliente","warning");
            return false;
        }
        if($FotoDuiUsuariosReverso === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Por favor adjunte fotografía del documento único de identidad (Dui - Reverso) de nuevo cliente","warning");
            return false;
        }
        if($FotoNitUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Por favor adjunte fotografía del número de identificación tributaria (Nit) de este cliente","warning");
            return false;
        }
        if($FotoFirmaUsuarios === ""){
            AlertaUsuarioMostrar("Campo Incompleto","Por favor adjunte fotografía de la firma (procesada en máquina lectora de firmas) de este cliente","warning");
            return false;
        }
        else{
        e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        $.ajax({
            url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-modificar-detalles-usuarios-administrador",
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
                AlertaUsuarioMostrar("Usuario Modificado","Perfecto, has modificado con éxito los detalles de este usuario","success");
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