$(document).ready(function(){  
    // #desactivar-usuarios IDENTIDICADOR DE ID -> ACCION A EJECUTAR
    $(document).on('click', '#eliminar-roles-usuarios', function(e){
     var IDRolUsuarios = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO
     EliminarRolUsuarios(IDRolUsuarios); // ID UNICO DE USUARIOS
     e.preventDefault();
    });
   });
   function EliminarRolUsuarios(IDRolUsuarios){ 
    swal.fire({
        title: '¿Realmente desea eliminar este rol de usuario?',
        text: "Al hacer clic en el botón confirmar, no hay forma de revertir la acción",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EA2027',
        cancelButtonColor: '#5758BB',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
     preConfirm: function() {
       return new Promise(function() {
          $.ajax({
          url: '../controlador/cGestionesCashman.php?cashmanhagestion=eliminar-roles-usuarios-registrados&idunicorolusuarios='+IDRolUsuarios,
          type: 'POST',
             data: 'idunicorolusuarios='+IDRolUsuarios, // COMPARACION PREVIA ANTES DE EJECUTAR ACCION EN SERVIDOR
             dataType: 'json'
          })
          .done(function(respuesta){ // SI MODELO EJECUTA PETICION, REALIZA PETICION
            if(respuesta=="OK"){
                AlertaUsuarioMostrar("Rol Eliminado","Su petición se ha completado con éxito","success");
                 // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REFRESCAR
                 setTimeout(function(){
                    location.reload();
                }, 1500);
            }else if ($resultado === "ERROR") {
                    AlertaUsuarioMostrar("Error", "Lo sentimos, en estos momentos no hemos podido completar tu solicitud", "error");
            }
          })
          .fail(function(respuesta){
            AlertaUsuarioMostrar("Error","Lo sentimos, en estos momentos no podemos procesar tu solicitud, por favor vuelve más tarde...","error");
          });
       });
        },    
    }); 
   }

// FUNCION PARA MOSTRAR ALERTAS A USUARIOS
function AlertaUsuarioMostrar(titulo, descripcion, icono) {
    Swal.fire(
        titulo, // ENCABEZADO 
        descripcion, // CUERPO
        icono // ICONO DE ALERTA
    );
}