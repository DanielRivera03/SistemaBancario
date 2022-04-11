<?php
// SI LOS USUARIOS INICIAN POR PRIMERA VEZ, MOSTRAR PAGINA DONDE DEBERAN REALIZAR EL CAMBIO OBLIGATORIO DE SU CONTRASEÑA GENERADA AUTOMATICAMENTE
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestiones-nuevos-usuarios-registrados');
    // CASO CONTRARIO, MOSTRAR PORTAL DE USUARIOS -> SEGUN ROL DE USUARIO ASIGNADO
} else {
    // COMPROBACION DE SOLICITUDES DE CREDITOS CLIENTES -> VER ESTADO DE SOLICITUD CREDITICIA [CUANDO LAS CUOTAS MENSUALES AUN NO HAN SIDO GENERADAS EN EL SISTEMA -> ENTIENDASE QUE CREDITO AUN NO HA SIDO APROBADO]
    if ($_SESSION['habilitar_sistema'] == "si") {
?>
        <!-- 

░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡
░░              CASHMAN H.A S.A DE C.V                                                  
░░          SISTEMA FINANCIERO / BANCARIO 
░░≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡                      
░░                                                                               
░░ -> AUTOR: DANIEL RIVERA                                                               
░░ -> PHP 8.1, MYSQL, MVC, JAVASCRIPT, AJAX, JQUERY                       
░░ -> GITHUB: (danielrivera03)                                             
░░     https://github.com/DanielRivera03                              
░░ -> TODOS LOS DERECHOS RESERVADOS                           
░░     © 2021 - 2022    
░░                                                      
░░ -> POR FAVOR TOMAR EN CUENTA TODOS LOS COMENTARIOS
░░    Y REALIZAR LOS AJUSTES PERTINENTES ANTES DE INICIAR
░░
░░          ♥♥ HECHO CON MUCHAS TAZAS DE CAFE ♥♥
░░                                                                               
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░

-->
        <style>
            .aviso_clientes {
                display: none;
                text-align: justify;
            }

            @media print {
                @page {
                    size: auto;
                    margin: 0mm;
                }

                #aviso_empleados,
                #impresion_solicitud,
                #registro_solicitud {
                    display: none;
                }

                .aviso_clientes {
                    display: block;
                }
            }
        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CashMan H.A. | Estado Cuenta Cr&eacute;ditos Clientes </title>
        <!-- Favicon icon -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $UrlGlobal; ?>vista/images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $UrlGlobal; ?>vista/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $UrlGlobal; ?>vista/images/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $UrlGlobal; ?>vista/images/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $UrlGlobal; ?>vista/images/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo $UrlGlobal; ?>vista/images/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<?php
        // DATOS DE LOCALIZACION -> IDIOMA ESPAÑOL -> ZONA HORARIA EL SALVADOR (UTC-6)
        setlocale(LC_TIME, "spanish");
        date_default_timezone_set('America/El_Salvador');
        if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
            $CalculoCuotaMensualCapital = $Gestiones->getMontoFinanciamientoCreditos() / ($Gestiones->getTiempoPlazoCreditos() * 12);
        } else {
            $CalculoCuotaMensualCapital = $Gestiones->getMontoFinanciamientoCreditos() / ($Gestiones->getTiempoPlazoCreditos());
        }

        echo '
        <link href="';
        echo $UrlGlobal;
        echo 'vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="';
        echo $UrlGlobal;
        echo 'vista/css/style.css" rel="stylesheet">
        <div class="table-responsive">
        <table style="width: 95%; margin: auto; padding: 1rem 0 0 0;"  cellpadding="5">
	<tr>
	<td width="65%"><br><br>
        <img style="width: 50px;" src="';
        echo $UrlGlobal;
        echo 'vista/images/logo.png"><img style="margin: 0 0 0 .5rem; width: 110px;" src="';
        echo $UrlGlobal;
        echo 'vista/images/logo-text.png"><br><br>
	    <b><i style="font-size: .8rem" class="fa fa-university"></i> ESTADO DE CUENTA (';
        echo $Gestiones->getCodigoProductos();
        echo ')</b><br />
        <i style="font-size: .8rem" class="fa fa-info-circle"></i> Cliente : ';
        echo $Gestiones->getNombresUsuarios();
        echo ' ';
        echo $Gestiones->getApellidosUsuarios();
        echo '
    <br><i style="font-size: .8rem" class="fa fa-hourglass-half"></i> Plazo: ';
        if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
            echo $Gestiones->getTiempoPlazoCreditos() * 12;
            echo " meses  (";
            echo $Gestiones->getTiempoPlazoCreditos();
            echo " a&ntilde;os)";
        } else {
            echo $Gestiones->getTiempoPlazoCreditos();
            echo " meses  (";
            echo number_format($Gestiones->getTiempoPlazoCreditos() / 12, 2);
            echo " a&ntilde;os)";
        }
        echo '
	</td>
	<td width="35%">         
	<i style="font-size: .8rem" class="fa fa-balance-scale"></i> C&oacute;digo No. : ';
        echo $Gestiones->getIdCreditos();
        echo '<br />
    <i style="font-size: .8rem" class="fa fa-line-chart"></i> Tasa Inter&eacute;s Mensual : ';
        echo $Gestiones->getTasaInteresCreditos();
        echo '%<br />
	<i style="font-size: .8rem" class="fa fa-calendar-check-o"></i> Emisi&oacute;n : ';
        echo date('Y-m-d H:i:s');
        echo '<br />
	</td>
	</tr>
	</table><br><br>';
        echo '
    <article style="width: 95%; margin: auto; display: block;">';
        echo '<p id="aviso_empleados">Estimado(a) ';
        $Nombre = $_SESSION['nombre_usuario'];
        $PrimerNombre = explode(' ', $Nombre, 2);
        print_r($PrimerNombre[0]);
        echo ', a continuaci&oacute;n podr&aacute; ver a detalle el estado de cuenta seg&uacute;n el producto que usted ha adquirido con nosotros. Por favor le pedimos total seriedad en el cumplimiento del mismo, tomando en cuenta su &uacute;ltima fecha de pago seg&uacute;n el orden correlativo de pagos del mismo.';
        echo '
        <p class="aviso_clientes">Estimado(a) cliente <strong>';
        echo $Gestiones->getNombresUsuarios();
        echo ' ';
        echo $Gestiones->getApellidosUsuarios();
        echo '</strong>, nos complace mucho saber que su solicitud crediticia ha sido aprobada satisfactoriamente. A continuaci&oacute;n le mostramos el estado de cuenta que usted debe cumplir a trav&eacute;s del producto que usted ha adquirido con nosotros, le solicitamos seriedad y total responsabilidad al mismo, para mantener su buen record crediticio y as&iacute; no afectar su calificaci&oacute;n que pueda comprometer futuras adquisiciones crediticias tanto para nuestra empresa, como otras entidades financieras.</p>';
        $Fecha = $Gestiones->getFechaIngresoSolicitudCreditos();
        $FechaCompleta = strtotime($Fecha);
        $ObtenerAnio = date("Y", $FechaCompleta);
        $ObtenerMes = date("m", $FechaCompleta);
        $ObtenerDia = date("d", $FechaCompleta);
        if ($ObtenerDia >= 25 && $ObtenerDia <= 31) {
            echo '
    <p class="aviso_clientes">Con respecto a su fecha de pago, nuestra empresa excluye los s&aacute;bados y domingos pero en su caso particular <span style="color: #f00;">no aplica dicho tratamiento, ya que su solicitud fue ingresada el d&iacute;a ';
            echo $ObtenerDia;
            echo " de ";
            // VALIDACIONES SEGUN MES OBTENIDO
            if ($ObtenerMes == 1) {
                echo "Enero";
            } else if ($ObtenerMes == 2) {
                echo "Febrero";
            } else if ($ObtenerMes == 3) {
                echo "Marzo";
            } else if ($ObtenerMes == 4) {
                echo "Abril";
            } else if ($ObtenerMes == 5) {
                echo "Mayo";
            } else if ($ObtenerMes == 6) {
                echo "Junio";
            } else if ($ObtenerMes == 7) {
                echo "Julio";
            } else if ($ObtenerMes == 8) {
                echo "Agosto";
            } else if ($ObtenerMes == 9) {
                echo "Septiembre";
            } else if ($ObtenerMes == 10) {
                echo "Octubre";
            } else if ($ObtenerMes == 11) {
                echo "Noviembre";
            } else if ($ObtenerMes == 12) {
                echo "Diciembre";
            }
            echo ' del ' . $ObtenerAnio . "</span> y nuestro sistema realiza reajustes para evitar conflictos en las fechas de pago en el mes de febrero, tomando en cuenta que puede ser o no a&ntilde;o bisiesto. <strong>Motivo por el cual su fecha de pago ser&aacute; el d&iacute;a 28 de cada mes, y si una de las fechas estipuladas es d&iacute;a no laboral [s&aacute;bado y domingo], usted tiene toda la obligaci&oacute;n de cancelar la respectiva cuota antes de la fecha pactada en este estado de cuenta</strong><strong><span style='color: #e74c3c;'>. El incumplimiento con su &uacute;ltimo d&iacute;a de su fecha de pago, equivale a un recargo autom&aacute;tico de $5.99 USD por cada d&iacute;a de atraso en su cuota mensual.</span></strong> Agradecemos su preferencia a nuestra empresa, estamos para servirle en todos sus proyectos y planes financieros";
            echo '</p>
    ';
        } else {
            echo '
    <p class="aviso_clientes">Con respecto a su fecha de pago, nuestra empresa excluye los s&aacute;bados y domingos, y se realiza un tratamiento de sumar uno o dos d&iacute;as a su &uacute;ltima fecha de pago seg&uacute;n sea el caso. Usted ingres&oacute; su solicitud crediticia el d&iacute;a ';
            echo $ObtenerDia;
            echo " de ";
            // VALIDACIONES SEGUN MES OBTENIDO
            if ($ObtenerMes == 1) {
                echo "Enero";
            } else if ($ObtenerMes == 2) {
                echo "Febrero";
            } else if ($ObtenerMes == 3) {
                echo "Marzo";
            } else if ($ObtenerMes == 4) {
                echo "Abril";
            } else if ($ObtenerMes == 5) {
                echo "Mayo";
            } else if ($ObtenerMes == 6) {
                echo "Junio";
            } else if ($ObtenerMes == 7) {
                echo "Julio";
            } else if ($ObtenerMes == 8) {
                echo "Agosto";
            } else if ($ObtenerMes == 9) {
                echo "Septiembre";
            } else if ($ObtenerMes == 10) {
                echo "Octubre";
            } else if ($ObtenerMes == 11) {
                echo "Noviembre";
            } else if ($ObtenerMes == 12) {
                echo "Diciembre";
            }
            echo ' del ' . $ObtenerAnio;
            echo '. Por lo cual el vencimiento de su fecha de pago es cada ';
            echo $ObtenerDia;
            echo ' de cada mes, tomando en cuenta lo citado anteriormente. <strong><span style="color: #e74c3c;">El incumplimiento con su &uacute;ltimo d&iacute;a de su fecha de pago, equivale a un recargo autom&aacute;tico de $5.99 USD por cada d&iacute;a de atraso en su cuota mensual.</span></strong> Agradecemos su preferencia a nuestra empresa, estamos para servirle en todos sus proyectos y planes financieros.</p>
    ';
        }
        echo '
        <article style="width: 95%; margin: auto; display: flex; justify-content: center;">
        ';
        if (!empty($Gestiones->getNombreCopiaContratosSuscritosCreditosClientes())) {
            echo '<a href="';
            echo $UrlGlobal;
            echo 'controlador/cGestionesCashman.php?cashmanhagestion=copiacontratosuscrito-creditosclientes&nombrecopiacontrato=';
            echo $Gestiones->getNombreCopiaContratosSuscritosCreditosClientes();
            echo '"><button id="impresion_solicitud" style="margin: .5rem;" type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-dark"><i class="fa fa-file-pdf-o color-dark"></i></span>Copia de Contrato Suscrito [';
            echo $Gestiones->getCodigoProductos();
            echo ']</button></a>';
        }
        echo '
            <a href="javascript:window.print()"><button id="impresion_solicitud" style="margin: .5rem;" type="button" class="btn btn-rounded btn-dark"><span class="btn-icon-left text-dark"><i class="fa fa-print color-dark"></i></span>Imprimir Estado de Cuenta</button></a>
        </article>
    </article><br>
            <table style="width: 95%; margin: auto;" class="table table-striped table-responsive-sm table-hover">
                <thead style="background: #079992; color: #fff;">
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Estado</th>
                        <th>Vencimiento</th>
                        <th>Cuota Mensual</th>
                        <th>Abono Capital</th>
                        <th>Saldo Final</th>
                        <th>Mora</th>
                    </tr>
                </thead>
            <tbody>';
        /*
        -> IMPORTANTE:
            $CalculoDiasPrestamos SE REALIZA LA SUMATORIA DE + 1 AL TOTAL, YA QUE EL PRIMER REGISTRO MOSTRADO A LOS CLIENTES NO SE TOMA EN CUENTA, PUESTO A QUE ES EL INDICADOR DE INICIO DE LA SOLICITUD QUE EL CLIENTE REALIZO A LA EMPRESA, DESDE EL VALOR $ContadorCuotas = 2, O SEGUNDA VUELTA COMIENZA EL CALCULO DEL ESTADO DE CUENTA DE LOS CLIENTES SEGUN EL PRODUCTO ASOCIADO.

            ------> AL NO REALIZAR ESTE AJUSTE, EL CALCULO NO ES EXACTO Y ERRONEO <-------
    */
        // VALIDACION DE TIPO DE PRESTAMO ADQUIRIDO POR CLIENTES
        if ($ObtenerDia >= 29 && $ObtenerDia <= 31) {
            if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                // SI EL CREDITO ES HIPOTECARIO, SE REALIZA EL CALCULO AL NUMERO DE MESES EN TOTAL, YA QUE EL REGISTRO DE PREVIO FUE REALIZADO EN BASE A LOS AÑOS DE FINANCIAMIENTO
                $CalculoDiasPrestamos = ($Gestiones->getTiempoPlazoCreditos() * 12);
            } else {
                $CalculoDiasPrestamos = $Gestiones->getTiempoPlazoCreditos();
            }
        } else {
            if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
                // SI EL CREDITO ES HIPOTECARIO, SE REALIZA EL CALCULO AL NUMERO DE MESES EN TOTAL, YA QUE EL REGISTRO DE PREVIO FUE REALIZADO EN BASE A LOS AÑOS DE FINANCIAMIENTO
                $CalculoDiasPrestamos = ($Gestiones->getTiempoPlazoCreditos() * 12) + 1;
            } else {
                $CalculoDiasPrestamos = $Gestiones->getTiempoPlazoCreditos() + 1;
            }
        }

        // FECHA INICIO DE CREDITO -> SEGUN INGRESO DE SOLICITUD CREDITICIA
        // FORMATO FECHA DE REGISTRO -> AÑO/MES/DIA = YYYY/MM/DD
        // FORMATO FECHA DE MUESTRA CLIENTES -> DIA/MES/AÑO = DD/MM/YYYY
        $FechaSolicitud = $Gestiones->getFechaIngresoSolicitudCreditos();
        $IntervaloFecha = new DateInterval('P1D'); // INTERVALO 1 DIA A LA VEZ -> EN UN SOLO MES
        $InicioCreditos = date_create($Gestiones->getFechaIngresoSolicitudCreditos()); // ASIGNAR INICIO DE CALCULO ESTADO DE CUENTE CLIENTES
        /*
    RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [25,26,27,28,29,30 Y 31 DE CUALQUIER MES]
    -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO Y EVITAR FECHAS INVALIDAS [NO EXISTENTES] AL MOMENTO DE RECALCULAR LAS FECHAS DE PAGO

    --> EL MAXIMO DIA PARA RECALCULAR FECHAS DE PAGOS ES <<24>> DE CADA MES, DE 25 A 31 SEGUN MES EN CURSO, LAS ULTIMAS FECHAS DE PAGO SIEMPRE SERAN CADA 28 DE MES 

    -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
*/
        if ($ObtenerDia == 25) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 25, ENTONCES SE SUMA TRES DIAS A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("+ 3 days"));
        } else if ($ObtenerDia == 26) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 26, ENTONCES SE SUMA DOS DIAS A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("+ 2 days"));
        } else if ($ObtenerDia == 27) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 27, ENTONCES SE SUMA UN DIA A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("+ 1 days"));
        } else if ($ObtenerDia == 28) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 28, ENTONCES SE NO SE REALIZA NINGUN CALCULO A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("+ 0 days"));
        } else if ($ObtenerDia == 29) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 29, ENTONCES SE RESTA UN DIA A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("- 1 days"));
        } else if ($ObtenerDia == 30) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 30, ENTONCES SE RESTA DOS DIAS A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("- 2 days"));
        } else if ($ObtenerDia == 31) {
            // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 31, ENTONCES SE RESTA TRES DIAS A LA FECHA DE PAGO FINAL CLIENTES
            date_add($InicioCreditos, date_interval_create_from_date_string("- 3 days"));
        }
        //$InicioCreditos = new DateTime($Gestiones->getFechaIngresoSolicitudCreditos()); // ASIGNAR INICIO DE CALCULO ESTADO DE CUENTE CLIENTES
        $FinCreditos = new DateTime(date("Y-m-d", strtotime($FechaSolicitud . "+ $CalculoDiasPrestamos month"))); // CALCULO FINAL DE ESTADO DE CUENTA CLIENTES
        $IntervaloFecha = new DateInterval('P1M'); // INTERVALO 1 VEZ AL MES
        $CuotasMensualesGeneradas = new DatePeriod($InicioCreditos, $IntervaloFecha, $FinCreditos); // GENERAR EL CALCULO SEGUN EL PERIODO ASIGNADO AL CLIENTE
        // EXTRAER FECHA COMPLETA COMO ENTERO PARA COMPROBACIONES
        $ExtraerFecha = strtotime($FechaSolicitud);
        $ObtenerMes = date("m", $ExtraerFecha); // OBTENER MES EN CUESTION DE SOLICITUD DE CREDITO
        $ObtenerDia = date("d", $ExtraerFecha); // OBTENER DIA EN CUESTION DE SOLICITUD DE CREDITO
        $ContadorCuotas = 0; // INICIALIZAR CONTADOR DE CUOTAS ASIGNADAS
        $SaldoInicialCredito = $Gestiones->getMontoFinanciamientoCreditos(); // OBTENER EL MONTO DEL SALDO INICIAL DEL CREDITO SEGUN PRODUCTO ASOCIADO AL CLIENTE
        if ($Gestiones->getComprobarEstadoCuotasMensuales() == "no") {
            foreach ($CuotasMensualesGeneradas as $DiaAsignado) {
                $ContadorCuotas++; // AUMENTO EN 1 SEGUN EL RANGO A CUMPLIR -> "N" CUOTAS
                echo '
                <tr>
                    <th>';
                echo $ContadorCuotas;
                echo '</th>
                        <td>';
                echo $Gestiones->getNombreProductos();
                echo '</td>
                        <td>';
                if ($ContadorCuotas == 1) {
                    echo '<span class="badge badge-primary">N/D</span>';
                } else {
                    echo '<span class="badge badge-danger">Pendiente</span>';
                }
                echo '
                        </td>
                    <td>';
                // SE ASIGNA DEL 1 AL 7 LOS DIAS DE TODA LA SEMANA, TOMANDO EN CUENTA QUE 6 Y 7 SON FINES DE SEMANAS NO LABORALES, POR LO CUAL LAS CUOTAS RECIBEN UN TRATAMIENTO EN ESOS CASOS
                if ($ContadorCuotas == 1) {
                    echo '------------------------';
                } else {
                    $DiaLaboral = $DiaAsignado->format('N'); // OBTENER EL NUMERO DE DIAS DE LA SEMANA EN FORMATO NUMERICO ENTERO [LUNES A DOMINGO --> 1 - 7 RESPECTIVAMENTE]
                    // RECALCULAR SI ES DOMINGO
                    if ($DiaLaboral == '7') {
                        /*
                    PARA LOS CLIENTES QUE INGRESEN SOLICITUD DE CREDITOS ENTRE LAS FECHAS 28, 29, 30 Y 31 DE CADA MES, SU ULTIMA FECHA DE PAGO SERA EL 28 DE CADA MES RESPECTIVAMENTE
                    >> ESTO CON EL FIN DE EVITAR CALCULOS ERRONEOS EN EL MES DE FEBRERO POR LA DIFERENCIA DE DIAS BISIESTOS / NO BISIESTOS [28 Y 29 MAXIMO RESPECTIVAMENTE]
                */
                        // RESTAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        if ($ObtenerDia == 25) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 3;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 26) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 2;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 27) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 28) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha);
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 29) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 1;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 30) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 2;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            // RESTAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 31) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 3;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            /*
                        SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
                            APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                    */
                        } else if ($ObtenerDia < 10) {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                            if ($RecalcularFechaDomingos < 10) {
                                echo '0', $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            } else {
                                echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                            }
                            // IMPRESION DE FECHA NORMAL SI TODAS LAS CONDICIONES ANTERIORES NO SE CUMPLEN
                        } else {
                            $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                            echo $DiaAsignado->format($RecalcularFechaDomingos . '-m-Y');
                        }
                        // RECALCULAR SI ES SABADO
                    } else if ($DiaLaboral == '6') {
                        /*
                    PARA LOS CLIENTES QUE INGRESEN SOLICITUD DE CREDITOS ENTRE LAS FECHAS 29, 30 Y 31 DE CADA MES, SU ULTIMA FECHA DE PAGO SERA EL 28 DE CADA MES RESPECTIVAMENTE
                    >> ESTO CON EL FIN DE EVITAR CALCULOS ERRONEOS EN EL MES DE FEBRERO POR LA DIFERENCIA DE DIAS BISIESTOS / NO BISIESTOS [28 Y 29 MAXIMO RESPECTIVAMENTE]
                */
                        // RESTAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        if ($ObtenerDia == 25) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) + 3;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 26) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 27) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) + 1;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 28) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha);
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 29) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) - 1;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 30) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) - 2;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            // RESTAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                        } else if ($ObtenerDia == 31) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) - 3;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            /*
                        SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
                            APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                    */
                        } else if ($ObtenerDia < 10) {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                            if ($RecalcularFechaSabados < 10) {
                                echo '0', $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            } else {
                                echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                            }
                            // IMPRESION DE FECHA NORMAL SI TODAS LAS CONDICIONES ANTERIORES NO SE CUMPLEN
                        } else {
                            $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                            echo $DiaAsignado->format($RecalcularFechaSabados . '-m-Y');
                        }
                    } else { // SI LAS FECHAS NO NECESITAN SER RECALCULADAS, SE IMPRIME TAL CUAL EN EL ESTADO DE CUENTA
                        echo $DiaAsignado->format('d-m-Y');
                    }
                    echo PHP_EOL;
                }
                echo '
                </td>
                    <td class="color-primary">$';
                if ($ContadorCuotas == 1) {
                    echo ' 0.00 ';
                } else {
                    echo number_format($Gestiones->getCuotaMensualCreditos(), 2);
                }
                echo ' USD</td>
                    <td class="color-primary">$';
                if ($ContadorCuotas == 1) {
                    echo "0.00";
                } else {
                    echo number_format($CalculoCuotaMensualCapital, 2);
                }
                echo ' USD</td>
                    <td class="color-primary">$';
                if ($ContadorCuotas == 1) {
                    echo number_format($Gestiones->getMontoFinanciamientoCreditos(), 2);
                } else {
                    $SaldoInicialCredito = $SaldoInicialCredito - $CalculoCuotaMensualCapital;
                    echo number_format($SaldoInicialCredito, 2);
                }
                echo ' USD</td>
                </tr>
            ';
            }
            echo '
                </tbody>
            </table>
        </div>';
        } else if ($Gestiones->getComprobarEstadoCuotasMensuales() == "si") {
            foreach ($CuotasMensualesGeneradas as $DiaAsignado) {
                while ($filas = mysqli_fetch_array($consulta2)) {
                    $ContadorCuotas++; // AUMENTO EN 1 SEGUN EL RANGO A CUMPLIR -> "N" CUOTAS
                    echo '
                    <tr>
                    <td class="color-primary">';
                    echo '<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
            <input type="checkbox" class="custom-control-input" id="customCheckBox';
                    echo $ContadorCuotas;
                    echo '" ';
                    if ($filas['estadocuota'] == "cancelado") {
                        echo "checked";
                    }
                    echo ' disabled>
            <label class="custom-control-label" for="customCheckBox';
                    echo $ContadorCuotas;
                    echo '"></label>
        </div>';
                    echo ' </td>
                        <th>';
                    echo $ContadorCuotas;
                    echo '</th>
                            <td>';
                    echo $Gestiones->getNombreProductos();
                    echo '</td>
                            <td>';
                    if ($filas['estadocuota'] == "pendiente") {
                        echo '<span class="badge badge-danger">';
                        echo ucfirst($filas['estadocuota']);
                        echo '</span>';
                    } else if ($filas['estadocuota'] == "cancelado") {
                        echo '<span class="badge badge-success">';
                        echo ucfirst($filas['estadocuota']);
                        echo '</span>';
                    }
                    echo '
                            </td>
                        <td>';
                    $FechaVencimientoCuotas = date_create($filas['fechavencimiento']);
                    echo date_format($FechaVencimientoCuotas, "d-m-Y");
                    echo '
                    </td>
                        <td class="color-primary">$';
                    echo number_format($filas['montocancelar'], 2);
                    echo ' USD</td>
                        <td class="color-primary">$';
                    echo number_format($CalculoCuotaMensualCapital, 2);
                    echo ' USD</td>
                        <td class="color-primary">$';
                    $SaldoInicialCredito = $SaldoInicialCredito - $CalculoCuotaMensualCapital;
                    echo number_format($SaldoInicialCredito, 2);
                    echo ' USD</td>
            <td class="color-primary">';
                    if ($filas['incumplimiento_pago'] == "SI") {
                        echo '<span class="badge badge-danger">';
                        echo $filas['incumplimiento_pago'];
                        echo '</span>';
                    } else if ($filas['incumplimiento_pago'] == "NO") {
                        echo '<span class="badge badge-success">';
                        echo $filas['incumplimiento_pago'];
                        echo '</span>';
                    } else if ($filas['incumplimiento_pago'] == "PT") {
                        echo '<span class="badge badge-warning">';
                        echo $filas['incumplimiento_pago'];
                        echo '</span>';
                    }
                    echo '</td>
            
                    </tr>
                ';
                }
            }
            echo '
                    </tbody>
                </table>
            </div>';
        }
    } else {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=bienvenida-clientes');
    }
}
