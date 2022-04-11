$(document).ready(function() {
    load(1);
});

/*
    -> REGISTRO DE NUEVAS CUENTAS DE AHORRO CLIENTES
*/

$("#ingreso-nuevas-cuentas-ahorro-clientes").submit(function(event) {
    // VARIABLES GLOBALES -> CAMPOS DE FORMULARIO
    var $NumeroCuentaAhorroClientes = $('#val-numerocuentaahorro').val(); // NUMERO DE CUENTA AHORRO CLIENTES
    var $MontoAperturaCuentaAhorroClientes = $('#val-montodepositoapertura').val(); // MONTO DE APERTURA CUENTA AHORRO CLIENTES
    var $IdUsuarios = $('#val-clientecuentaahorro').val(); // CLIENTE FINAL APERTURA CUENTA AHORRO CLIENTES 
    // VALIDACION DE CAMPOS VACIOS
    if($NumeroCuentaAhorroClientes === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "El número de cuenta automáticamente generado es requerido, complete ese campo", "warning");
        return false;
    }
    if($MontoAperturaCuentaAhorroClientes === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "Por favor ingrese el monto de apertura cuenta de ahorro clientes, complete ese campo", "warning");
        return false;
    }
    if($IdUsuarios === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "Por favor seleccione el cliente que desea aperturar nueva cuenta de ahorro", "warning");
        return false;
    // SI TODOS LOS CAMPOS HAN SIDO COMPLETADOS CON EXITO, ENTONCES PROCEDE LA PETICION A BASE DE DATOS
    }else{
        //$('#registronuevascuentas').attr("disabled", true);
        var parametros = $(this).serialize(); // TODOS LOS CAMPOS DEL FORMULARIO
        $.ajax({
            type: "POST",
            url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-nuevas-cuentas-ahorro-clientes",
            data: parametros,
            // MENSAJE DE ESPERA -> PREVIO A CONFIRMACION / RECHAZO DE PETICION
            beforeSend: function(objeto) {
                $("#resultados_ajax").html('<div class="alert alert-light solid alert-dismissible fade show"><img style="width: 30px;" class="img-fluid" src="../vista/images/Hourglass.gif"><strong>¡Procesando Informaci&oacute;n!</strong> Espere un momento...</div>');
            },
            success: function(datos) {
                // SI LA PETICION ES RECHAZADA, MOSTRAR MENSAJE DE ERROR
                if(datos=="false"){
                    setTimeout(function () {
                        $("#resultados_ajax").html("<div class='alert alert-danger solid alert-dismissible fade show'><svg viewBox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg><strong>¡Lo Sentimos!</strong> Ha ocurrido un error al momento de procesar la información. Por favor verifica que cumplas con todas las condiciones. <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span></button></div>");
                    }, 3000);  
                // SI LA PETICION ES ACEPTADA, MOSTRAR MENSAJE DE CONFIRMACION DE PETICION EXITOSA
                }else if(datos=="true"){
                    setTimeout(function () {
                        $("#resultados_ajax").html("<div class='alert alert-success solid alert-dismissible fade show'><svg viewBox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><polyline points='9 11 12 14 22 4'></polyline><path d='M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11'></path></svg><strong>Registro Exitoso!</strong> La nueva apertura de cuenta de ahorros se ha realizado con &eacute;xito. <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span></button></div>");
                    }, 3000);  
                }
                // SI LA PETICION ES RECHAZADA, MOSTRAR MENSAJE DE ERROR -> MENSAJE FLOTANTE
                if(datos=="false"){
                    setTimeout(function () {
                        AlertaUsuarioToastr_ErrorRegistro("Lo sentimos, no podemos completar su solicitud de registro", "Error de Registro");
                    }, 3000);
                // SI LA PETICION ES ACEPTADA, MOSTRAR MENSAJE DE CONFIRMACION DE PETICION EXITOSA -> MENSAJE FLOTANTE
                }else if(datos=="true"){
                    setTimeout(function () {
                        AlertaUsuarioToastr_RegistroExitoso("Perfecto, la nueva cuenta de ahorro ha sido creada con éxito", "Registro Exitoso");
                    }, 3000);
                    // REINICIAR CAMPOS DE FORMULARIO
                    document.getElementById("ingreso-nuevas-cuentas-ahorro-clientes").reset();
                }
                setTimeout(function () {
                    //location.reload();
                }, 3000);
                $('#registronuevascuentas').attr("disabled", false);
                 // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                load(1);
            }
        });
        event.preventDefault();
    }
});

/*
    -> REGISTRO DE DEPOSITOS CUENTAS DE AHORRO CLIENTES
*/

$("#ingreso-deposito-cuentas-ahorro-clientes").submit(function(event) {
    // VARIABLES GLOBALES -> CAMPOS DE FORMULARIO
    var $NumeroCuentaAhorroClientes = $('#val-numerocuentaahorro').val(); // NUMERO DE CUENTA AHORRO CLIENTES
    var $MontoDepositoCuentaAhorroClientes = $('#val-montodepositocuentaahorro').val(); // MONTO DE APERTURA CUENTA AHORRO CLIENTES
    var IdTransaccion = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO  
    var IdUsuariosC = $(this).data('user-id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO  
    if($NumeroCuentaAhorroClientes === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "El número de cuenta generado es requerido, complete ese campo", "warning");
        return false;
    }
    if($MontoDepositoCuentaAhorroClientes === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "Por favor ingrese el monto a depositar cuenta de ahorro clientes, complete ese campo", "warning");
        return false;
    }else{
        var parametros = $(this).serialize(); // TODOS LOS CAMPOS DEL FORMULARIO
        $.ajax({
            type: "POST",
            url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-depositos-cuentas-ahorros-clientes",
            data: parametros,
            // MENSAJE DE ESPERA -> PREVIO A CONFIRMACION / RECHAZO DE PETICION
            beforeSend: function(objeto) {
                $("#resultados_ajax").html('<div class="alert alert-light solid alert-dismissible fade show"><img style="width: 30px;" class="img-fluid" src="../vista/images/Hourglass.gif"><strong>¡Procesando Informaci&oacute;n!</strong> Espere un momento...</div>');
            },
            success: function(datos) {
                // SI LA PETICION ES RECHAZADA, MOSTRAR MENSAJE DE ERROR
                if(datos=="false"){
                    setTimeout(function () {
                        $("#resultados_ajax").html("<div class='alert alert-danger solid alert-dismissible fade show'><svg viewBox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg><strong>¡Lo Sentimos!</strong> Ha ocurrido un error al momento de procesar la transacción del cliente. <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span></button></div>");
                    }, 3000);  
                // SI LA PETICION ES ACEPTADA, MOSTRAR MENSAJE DE CONFIRMACION DE PETICION EXITOSA
                }else if(datos=="true"){
                    setTimeout(function () {
                        $("#resultados_ajax").html("<div class='alert alert-success solid alert-dismissible fade show'><svg viewBox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><polyline points='9 11 12 14 22 4'></polyline><path d='M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11'></path></svg><strong>¡Registro Exitoso!</strong> La petición de abono se ha ingresado y procesado con éxito a la cuenta de ahorros de este cliente <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span></button></div>");
                    }, 3000);  
                }
                // SI LA PETICION ES RECHAZADA, MOSTRAR MENSAJE DE ERROR -> MENSAJE FLOTANTE
                if(datos=="false"){
                    setTimeout(function () {
                        AlertaUsuarioToastr_ErrorRegistro("Lo sentimos, no podemos completar su solicitud de registro", "Error de Registro");
                    }, 3000);
                // SI LA PETICION ES ACEPTADA, MOSTRAR MENSAJE DE CONFIRMACION DE PETICION EXITOSA -> MENSAJE FLOTANTE
                }else if(datos=="true"){
                    setTimeout(function () {
                        AlertaUsuarioToastr_RegistroExitoso("Perfecto, el depósito a la cuenta de ahorro se ha procesado con éxito", "Registro Exitoso");
                        // REINICIAR CAMPOS DE FORMULARIO
                        document.getElementById("ingreso-deposito-cuentas-ahorro-clientes").reset();
                        // PAGINA IMPRESION COMPROBANTE DE TRANSACCION REALIZADO
                        location.href="../controlador/cGestionesCashman.php?cashmanhagestion=impresion-comprobantes-transacciones-cuentas-clientes&idtransaccionesclientes="+IdTransaccion+"&idusuarioscuentas="+IdUsuariosC+""; 
                    }, 3000);
                }
                setTimeout(function () {
                    //location.reload();
                }, 3000);
                $('#registronuevascuentas').attr("disabled", false);
                 // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                load(1);
            }
        });
        event.preventDefault();
    }
});


/*
    -> REGISTRO DE RETIROS CUENTAS DE AHORRO CLIENTES
*/

$("#ingreso-retiros-cuentas-ahorro-clientes").submit(function(event) {
    // VARIABLES GLOBALES -> CAMPOS DE FORMULARIO
    var $NumeroCuentaAhorroClientes = $('#val-numerocuentaahorro').val(); // NUMERO DE CUENTA AHORRO CLIENTES
    var $MotoRetiroCuentaAhorroClientes = $('#val-montoretirocuentaahorro').val(); // MONTO DE APERTURA CUENTA AHORRO CLIENTES
    var IdTransaccion = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO  
    var IdUsuariosC = $(this).data('user-id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO  
    if($NumeroCuentaAhorroClientes === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "El número de cuenta generado es requerido, complete ese campo", "warning");
        return false;
    }
    if($MotoRetiroCuentaAhorroClientes === "") {
        AlertaUsuarioMostrar("Campo Incompleto", "Por favor ingrese el monto a retirar cuenta de ahorro clientes, complete ese campo", "warning");
        return false;
    }else{
        var parametros = $(this).serialize(); // TODOS LOS CAMPOS DEL FORMULARIO
        $.ajax({
            type: "POST",
            url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-retiros-cuentas-ahorros-clientes",
            data: parametros,
            // MENSAJE DE ESPERA -> PREVIO A CONFIRMACION / RECHAZO DE PETICION
            beforeSend: function(objeto) {
                $("#resultados_ajax").html('<div class="alert alert-light solid alert-dismissible fade show"><img style="width: 30px;" class="img-fluid" src="../vista/images/Hourglass.gif"><strong>¡Procesando Informaci&oacute;n!</strong> Espere un momento...</div>');
            },
            success: function(datos) {
                // SI LA PETICION ES RECHAZADA, MOSTRAR MENSAJE DE ERROR
                if(datos=="false"){
                    setTimeout(function () {
                        $("#resultados_ajax").html("<div class='alert alert-danger solid alert-dismissible fade show'><svg viewBox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg><strong>¡Lo Sentimos!</strong> Ha ocurrido un error al momento de procesar la transacción del cliente. <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span></button></div>");
                    }, 3000);  
                // SI LA PETICION ES ACEPTADA, MOSTRAR MENSAJE DE CONFIRMACION DE PETICION EXITOSA
                }else if(datos=="true"){
                    setTimeout(function () {
                        $("#resultados_ajax").html("<div class='alert alert-success solid alert-dismissible fade show'><svg viewBox='0 0 24 24' width='24' height='24' stroke='currentColor' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><polyline points='9 11 12 14 22 4'></polyline><path d='M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11'></path></svg><strong>¡Registro Exitoso!</strong> La petición de retiro se ha ingresado y procesado con éxito a la cuenta de ahorros de este cliente <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span></button></div>");
                    }, 3000);  
                }
                // SI LA PETICION ES RECHAZADA, MOSTRAR MENSAJE DE ERROR -> MENSAJE FLOTANTE
                if(datos=="false"){
                    setTimeout(function () {
                        AlertaUsuarioToastr_ErrorRegistro("Lo sentimos, no podemos completar su solicitud de registro", "Error de Registro");
                    }, 3000);
                // SI LA PETICION ES ACEPTADA, MOSTRAR MENSAJE DE CONFIRMACION DE PETICION EXITOSA -> MENSAJE FLOTANTE
                }else if(datos=="true"){
                    setTimeout(function () {
                        AlertaUsuarioToastr_RegistroExitoso("Perfecto, el retiro a la cuenta de ahorro se ha procesado con éxito", "Registro Exitoso");
                        // REINICIAR CAMPOS DE FORMULARIO
                        document.getElementById("ingreso-retiros-cuentas-ahorro-clientes").reset();
                        // PAGINA IMPRESION COMPROBANTE DE TRANSACCION REALIZADO
                        location.href="../controlador/cGestionesCashman.php?cashmanhagestion=impresion-comprobantes-transacciones-cuentas-clientes&idtransaccionesclientes="+IdTransaccion+"&idusuarioscuentas="+IdUsuariosC+""; 
                    }, 3000);
                }
                setTimeout(function () {
                    //location.reload();
                }, 3000);
                $('#registronuevascuentas').attr("disabled", false);
                 // 1.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                load(1);
            }
        });
        event.preventDefault();
    }
});

// FUNCION PARA MOSTRAR ALERTAS A USUARIOS -> SWEETALERT
function AlertaUsuarioMostrar(titulo, descripcion, icono) {
    Swal.fire(
        titulo, // ENCABEZADO 
        descripcion, // CUERPO
        icono // ICONO DE ALERTA
        );
}

// FUNCIONES PARA MOSTRAR ALERTAS A USUARIOS -> TOASTR
// ERROR DE ENVIO
function AlertaUsuarioToastr_ErrorRegistro(titulo, descripcion) {
        toastr.error(titulo, descripcion, {
            positionClass: "toast-top-right",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "600",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
}
// REGISTRO EXITOSO
function AlertaUsuarioToastr_RegistroExitoso(titulo, descripcion) {
    toastr.success(titulo, descripcion, {
        positionClass: "toast-top-right",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "600",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
}
