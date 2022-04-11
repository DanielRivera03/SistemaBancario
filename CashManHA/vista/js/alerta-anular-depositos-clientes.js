$(document).ready(function(){  
    // #desactivar-usuarios IDENTIDICADOR DE ID -> ACCION A EJECUTAR
    $(document).on('click', '#anular-depositos', function(e){
     var IDTransaccionCliente = $(this).data('deposito-id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO
     AnularDepositos(IDTransaccionCliente); // ID UNICO DE USUARIOS
     e.preventDefault();
    });
   });
   function AnularDepositos(IDTransaccionCliente){ 
    swal.fire({
        title: '¿Realmente desea anular esta transacción?',
        text: "Al hacer clic en el botón confirmar, la transacción será anulada y el monto será revertido de la cuenta del cliente",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EA2027',
        cancelButtonColor: '#5758BB',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
     preConfirm: function() {
       return new Promise(function() {
          $.ajax({
          url: '../controlador/cGestionesCashman.php?cashmanhagestion=anular-depositos-procesados-cuentas-clientes&idtransaccionprocesada='+IDTransaccionCliente,
          type: 'POST',
             data: 'idtransaccionprocesada='+IDTransaccionCliente, // COMPARACION PREVIA ANTES DE EJECUTAR ACCION EN SERVIDOR
             dataType: 'json'
          })
          .done(function(respuesta){ // SI MODELO EJECUTA PETICION, REALIZA PETICION
            if(respuesta=="OK"){
                AlertaUsuarioMostrar("Depósito Anulado","Su petición se ha completado con éxito","success");
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