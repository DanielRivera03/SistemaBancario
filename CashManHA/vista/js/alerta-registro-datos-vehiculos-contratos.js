$(document).ready(function () {
    $("#registro-datos-vehiculos-contratos").on('submit', (function (e) { // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
        // VALIDACION DE ELEMENTOS DE FORMULARIO
        var $Placa = $('#val-numeroplacavehiculo').val();// NOMBRES REFERENCIA PERSONAL
        var $Clase = $('#val-tipoclasevehiculo').val();// APELLIDOS REFERENCIA PERSONAL
        var $Anio = $('#val-aniovehiculo').val();// EMPRESA REFERENCIA PERSONAL
        var $Capacidad = $('#val-capacidadvehiculo').val();// PROFESION U OFICIO REFERENCIA PERSONAL
        var $Asientos = $('#val-asientosvehiculo').val();// TELEFONO REFERENCIA PERSONAL
        var $Marca = $('#val-marcavehiculo').val();// NOMBRES REFERENCIA LABORAL
        var $Modelo = $('#val-modelovehiculo').val();// APELLIDOS REFERENCIA LABORAL
        var $NumeroMotor = $('#val-numeromotorvehiculo').val();// EMPRESA REFERENCIA LABORAL
        var $NumeroChasisGrabado = $('#val-numerochasisvehiculo').val();// PROFESION U OFICIO REFERENCIA LABORAL
        var $NumeroChasisVin = $('#val-numerochasisvinvehiculo').val();// TELEFONO REFERENCIA LABORAL
        var $Color = $('#val-colorvehiculo').val();// TELEFONO REFERENCIA LABORAL
        if ($Placa === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el número de placa del vehículo", "warning");
            return false;
        }
        if ($Clase === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar la clase del vehículo", "warning");
            return false;
        }
        if ($Anio === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el año del vehículo", "warning");
            return false;
        }
        if ($Capacidad === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar la capacidad del vehículo", "warning");
            return false;
        }
        if ($Asientos === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el número de asientos del vehículo", "warning");
            return false;
        }
        if ($Marca === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar la marca del vehículo", "warning");
            return false;
        }
        if ($Modelo === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el modelo del vehículo", "warning");
            return false;
        }
        if ($NumeroMotor === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el número de motor del vehículo", "warning");
            return false;
        }
        if ($NumeroChasisGrabado === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el número de chasis grabado del vehículo", "warning");
            return false;
        }
        if ($NumeroChasisVin === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el número de chasis vin del vehículo", "warning");
            return false;
        }
        if ($Color === "") {
            AlertaUsuarioMostrar("Campo Incompleto", "Debe ingresar el color del vehículo", "warning");
            return false;
        }
        else {
            e.preventDefault(e); // "e" IDENTIFICADOR DE ACCION PARA CAPTURAR EVENTO DE FORMULARIO
            $.ajax({
                url: "../controlador/cGestionesCashman.php?cashmanhagestion=envio-datos-registro-informacion-vehiculos-creditos-contratos",
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
                    AlertaUsuarioMostrar("Registro Exitoso", "Perfecto, los datos del vehículo solicitados han sido ingresadas con éxito.", "success");
                    // 2.5 SEGUNDOS DE RETRASO PARA MOSTRAR ALERTA Y REDIRECCIONAR
                    setTimeout(function () {
                        location.reload();
                    }, 2500);
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