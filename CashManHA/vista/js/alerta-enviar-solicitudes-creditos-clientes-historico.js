$(document).ready(function(){  
    // #desactivar-usuarios IDENTIDICADOR DE ID -> ACCION A EJECUTAR
    $(document).on('click', '#enviar-solicitudes-historico', function(e){
     var IDCreditos = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO
     EnviarSolicitudesHistoricoCreditos(IDCreditos); // ID UNICO DE USUARIOS
     e.preventDefault();
    });
   });
   function EnviarSolicitudesHistoricoCreditos(IDCreditos){ 
    swal.fire({
        title: '¿Realmente desea enviar esta solicitud al histórico?',
        text: "Al hacer clic en el botón confirmar, no hay forma de revertir la acción y se enviará al histórico de créditos",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EA2027',
        cancelButtonColor: '#5758BB',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
     preConfirm: function() {
       return new Promise(function() {
          $.ajax({
          url: '../controlador/cGestionesCashman.php?cashmanhagestion=enviar-datos-historico-creditos-clientes&idcreditos='+IDCreditos,
          type: 'POST',
             data: 'idcreditos='+IDCreditos, // COMPARACION PREVIA ANTES DE EJECUTAR ACCION EN SERVIDOR
             dataType: 'json'
          })
          .done(function(respuesta){ // SI MODELO EJECUTA PETICION, REALIZA PETICION
            if(respuesta=="OK"){
                AlertaUsuarioMostrar("Solicitud de crédito registrada en el histórico","Su petición se ha completado con éxito","success");
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