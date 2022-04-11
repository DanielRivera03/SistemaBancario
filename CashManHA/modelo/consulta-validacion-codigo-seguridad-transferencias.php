<?php
/*
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡
░░                         CASHMAN H.A S.A DE C.V                                                  
░░                       SISTEMA FINANCIERO / BANCARIO 
░░≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡                       
░░                                                                               
░░   -> AUTOR: DANIEL RIVERA                                                               
░░   -> PHP 8.1, MYSQL, MVC, JAVASCRIPT, AJAX, JQUERY                       
░░   -> GITHUB: (danielrivera03)                                             
░░       https://github.com/DanielRivera03                              
░░   -> TODOS LOS DERECHOS RESERVADOS                           
░░       © 2021 - 2022    
░░                                                      
░░   -> POR FAVOR TOMAR EN CUENTA TODOS LOS COMENTARIOS
░░      Y REALIZAR LOS AJUSTES PERTINENTES ANTES DE INICIAR
░░
░░              ♥♥ HECHO CON MUCHAS TAZAS DE CAFE ♥♥
░░                                                                               
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░

*/
session_start();
// IMPORTAR ARCHIVO DE CONEXION
require('conexion.php');
// EVITAR CONSULTAS USUARIOS VACIOS
if (!empty($_POST["val-codigoseguridadtransferencia"])) {
    $resultado = mysqli_query($conectarsistema, "CALL Verificar_ValidacionCodigoSeguridadTransferencias('" . $_POST["val-codigoseguridadtransferencia"] . "','" . $_SESSION['id_usuario'] . "');");
    // LEER COINCIDENCIAS DE USUARIOS SEGUN INGRESADO EN CAJA DE TEXTO
    $codigo_seguridad_encontrado = mysqli_num_rows($resultado); // CONTADOR DE BUSQUEDA
    if ($codigo_seguridad_encontrado > 0) { // NUMERO DE CUENTA EXISTENTE
        // CODIGO DE SEGURIDAD REGISTRADO Y VALIDO
        $CodigoSeguridadValido = "<span class='disponible'><i class='fa fa fa-check-circle'></i> El c&oacute;digo de seguridad ingresado es v&aacute;lido. Puede finalizar la transferencia</span><br><br><div class='form-group'><label class='text-label'>Por favor ingrese el monto a transferir ($ USD) <span class='text-danger'>*</span></label><small>El m&aacute;ximo a transferir son $2,000.00 USD</small><div class='input-group'><input type='text' class='form-control' id='val-montotransferencia' name='SaldoTransferenciasCuentasClientes' onKeyUp='CalcularNuevoSaldoCliente()' onInput='ValidarMontoTransferencias()'  placeholder='Ingrese el monto a transferir...' onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' maxlength='11' required>
        </div><br><br>
        <button id='envio-transferencias' type='submit' class='btn btn-primary btn-block'>Enviar y Procesar Transferencia</button>
        <script>
        // COMPROBAR SI CANTIDAD RECIBIDA ES IGUAL O MENOR A LA REQUERIDA. CANTIDADES MAYORES NO SON POSIBLES DE PROCESAR
        $('#envio-transferencias').prop('disabled', true); // BLOQUEAR BOTON DE ENVIO POR DEFECTO
        function ValidarMontoTransferencias() {
            var DepositoMaximoTransferencia = 2000; // COMPROBACION MONTO MAXIMO DE DEPOSITO
            let IngresoDepositoClientes = $('#val-montotransferencia').val(); // COMPROBACION DE DEPOSITO INGRESADO POR CLIENTES
            $('#envio-transferencias').prop('disabled', true); // BLOQUEAR BOTON DE ENVIO POR DEFECTO
            let activador = document.getElementById('val-montotransferencia')
            activador.addEventListener('keyup', () => {
                if (activador.value > DepositoMaximoTransferencia || activador.value == 0 || activador.value < 0 || activador.value < 1) {
                    // SI EL MONTO INGRESADO ES MENOR AL QUE SE REQUIERE, NO SE PODRA PROCESAR LA SOLICITUD DE PAGOS DE CLIENTES
                    $('#envio-transferencias').prop('disabled', true);
                    // CASO CONTRARIO, PERMITIR PROCESAR LOS PAGOS DE CLIENTES
                } else {
                    $('#envio-transferencias').prop('disabled', false);
                }
                // VALIDACION DE TRANSACCIONES -> SALDO FINAL CLIENTES -> EN EL CASO DE LOS RETIROS, LOS CLIENTES {NO} PUEDEN DEJAR A CERO {0.00} SU CUENTA, EL MONTO MINIMO DE SALDO REQUERIDO ES IGUAL A $1.00 USD, CASO CONTRARIO NO SE PROCESARA LA PETICION
                if (document.getElementById('val-resultadotransaccion').value == 0) {
                    $('#envio-transferencias').prop('disabled', true);
                }
            }) // CIERRE activador.addEventListener('keyup', () => 
        }
    </script>";
        echo $CodigoSeguridadValido;
    } else { // CODIGO DE SEGURIDAD NO REGISTRADO E INVALIDO
        $CodigoSeguridadInvalido = "<span class='nodisponible'><i class='fa fa-times-circle'></i> Lo sentimos, código de seguridad inv&aacute;lido. Debe reiniciar el proceso de transferencias a otras cuentas...</span>";
        echo $CodigoSeguridadInvalido;
    }
}
