$(document).ready(function(){  
    // #desactivar-usuarios IDENTIDICADOR DE ID -> ACCION A EJECUTAR
    $(document).on('click', '#eliminar-solicitud-cliente', function(e){
     var IDCreditos = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO
     EliminarSolicitudCrediticia(IDCreditos); // ID UNICO DE USUARIOS
     e.preventDefault();
    });
   });
   function EliminarSolicitudCrediticia(IDCreditos){ 
    swal.fire({
        title: '¿Realmente desea eliminar esta solicitud?',
        text: "Al hacer clic en el botón confirmar, este producto no podrá ser ofrecido a los clientes",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EA2027',
        cancelButtonColor: '#5758BB',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
     preConfirm: function() {
       return new Promise(function() {
          $.ajax({
          url: '../controlador/cGestionesCashman.php?cashmanhagestion=eliminar-solicitudes-crediticias-clientes&idcredito='+IDCreditos,
          type: 'POST',
             data: 'idcredito='+IDCreditos, // COMPARACION PREVIA ANTES DE EJECUTAR ACCION EN SERVIDOR
             dataType: 'json'
          })
          .done(function(respuesta){ // SI MODELO EJECUTA PETICION, REALIZA PETICION
            if(respuesta=="OK"){
                AlertaUsuarioMostrar("Solicitud Eliminada","Su petición se ha completado con éxito","success");
                 // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REFRESCAR
                 setTimeout(function(){
                    location.reload();
                }, 1500);
            }
          })
          .fail(function(){
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