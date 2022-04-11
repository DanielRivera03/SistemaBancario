<?php
// NO PERMITIR INGRESO SI PARAMETRO NO HA SIDO ESPECIFICADO
if (empty($_GET['idusuarioscuentas'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// NO PERMITIR INGRESO SI CUOTA SELECCIONADA ES DIFERENTE A LA CONSULTADA
if ($_GET['idtransaccionesclientes'] != $Gestiones->getIdTransaccionesDepositosRetirosCuentas()) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
require('../FPDF/fpdf.php');
require '../vendor/autoload.php';
// CONVERSION DE NUMEROS A LETRAS
use Luecano\NumeroALetras\NumeroALetras; // LLAMADO DE CLASE
$Conversion = new NumeroALetras(); // CREANDO OBJETO INSTANCIA DE CLASE
// DATOS DE LOCALIZACION -> IDIOMA ESPAÑOL -> ZONA HORARIA EL SALVADOR (UTC-6)
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/El_Salvador');
if (empty($_GET['idtransaccionesclientes'])) {
    echo '
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CashMan H.A. | Registro Dep&oacute;sitos Cuentas de Ahorro</title>
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href=';
    echo $UrlGlobal;
    echo 'vista/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="';
    echo $UrlGlobal;
    echo 'vista/images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="';
    echo $UrlGlobal;
    echo 'vista/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="';
    echo $UrlGlobal;
    echo 'vista/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="';
    echo $UrlGlobal;
    echo 'vista/images/favicon-16x16.png">
    <link rel="manifest" href="';
    echo $UrlGlobal;
    echo 'vista/images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="';
    echo $UrlGlobal;
    echo 'vista/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="';
    echo $UrlGlobal;
    echo 'vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="';
    echo $UrlGlobal;
    echo 'vista/css/style.css" rel="stylesheet">
    <link href="';
    echo $UrlGlobal;
    echo 'vista/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <div class="col-xl-12 col-xxl-12">
    <div class="card">
        <div class="card-header d-block">
            <img class="img-fluid" style="width: 100%; max-width: 100px; padding: 0 0 1rem 0;" src="';
    echo $UrlGlobal;
    echo 'vista/images/logo.png">
            <h4 class="card-title">Confirmaci&oacute;n de Procesamiento Datos Transacci&oacute;n </h4>
            <p class="mb-0 subtitle">Primera Transacci&oacute;n del Cliente: ';
    echo $Gestiones->getNombresUsuarios();
    echo ' ';
    echo $Gestiones->getApellidosUsuarios();
    echo '</p>
            <p class="mb-0 subtitle">Referencia: ';
    echo $Gestiones->getReferenciaTransaccionDepositosRetirosCuentas();
    echo '</p>
            <p class="mb-0 subtitle"><img style="width: 30px;" class="img-fluid" src="';
    echo $UrlGlobal;
    echo 'vista/images/click.gif"> <a href="">Regresar Inicio Aplicaci&oacute;n</a></p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="alert alert-success left-icon-big alert-dismissible fade show">
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-check-circle-outline"></i></span>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-1 mb-2">Transacci&oacute;n Procesada Con &Eacute;xito</h5>
                                <p class="mb-0">Estimado(a) <strong>';
    $Nombre = $_SESSION['nombre_usuario'];
    $PrimerNombre = explode(' ', $Nombre, 2);
    print_r($PrimerNombre[0]);
    echo '</strong>, hemos detectado que este cliente realiza la primera transacci&oacute;n en su cuenta. Motivo por el cual por esta ocasi&oacute;n usted deber&aacute; ingresar manualmente al respectivo comprobante de la transacci&oacute;n realizada. Le informamos que ser&aacute; la &uacute;nica vez que visualizar&aacute; este mensaje con este cliente al ser la primera transacci&oacute;n procesada en nuestro sistema, en futuras transacciones, usted ser&aacute; redirigido autom&aacute;ticamente al respectivo comprobante. <strong> Por favor haga clic en el bot&oacute;n abajo de este mensaje</strong></p>
                                <a target="_blank" style="width: 50%; margin: 1.5rem auto; display: block;" href="';
    echo $UrlGlobal;
    echo 'controlador/cGestionesCashman.php?cashmanhagestion=impresion-comprobantes-transacciones-cuentas-clientes&idtransaccionesclientes=';
    echo $Gestiones->getIdTransaccionesDepositosRetirosCuentas();
    echo '&idusuarioscuentas=';
    echo $Gestiones->getIdUsuarios();
    echo '"  class="btn btn-success"><i
                                class="fa fa-print"></i> Imprimir Comprobante
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
        ';
} else {
    $FechaTransaccion = date_create($Gestiones->getFechaTransaccionDepositosRetirosCuentas());
    // INICIO REPORTE
    class PDF extends FPDF
    {
        // CABECERA DE DOCUMENTO
        function Header()
        {
            $this->Image('../vista/images/modelo-facturacion-creditos/cabecerafacturacionabonosretiros.png', 0, 0, 216);
        }

        // PIE DE PAGINA
        function Footer()
        {
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Número de página
            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    // CREACION DE INSTANCIA DE CLASE
    $pdf = new PDF('P', 'mm', 'LETTER');
    $pdf->SetTitle(utf8_decode("Facturación Clientes - CashMan H.A"));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    // CONTENIDO DE REPORTE [DOCUMENTO]
    $pdf->SetFont('Arial', '', 10);
    $pdf->setTextColor(255, 255, 255);
    $pdf->MultiCell(191, 8, utf8_decode("Facturación CashMan H.A."), 0, 'R');
    $pdf->setTextColor(0, 0, 0);
    $pdf->Ln(3);
    $pdf->SetFont('Arial', '', 8);
    $pdf->MultiCell(199, 4, utf8_decode("Transacción: No.->#" . $Gestiones->getIdTransaccionesDepositosRetirosCuentas()), 0, 'R');
    $pdf->MultiCell(199, 4, utf8_decode("Fecha: " . date_format($FechaTransaccion, "d/m/Y")), 0, 'R');
    $pdf->MultiCell(199, 4, utf8_decode("Hora: " . date_format($FechaTransaccion, "H:i:s")), 0, 'R');
    $pdf->MultiCell(199, 4, utf8_decode("Producto: " . $Gestiones->getNombreProductos()), 0, 'R');
    $pdf->MultiCell(199, 4, utf8_decode("Transacción: " . $Gestiones->getReferenciaTransaccionDepositosRetirosCuentas()), 0, 'R');
    $pdf->Ln(31);
    $pdf->SetFont('Arial', '', 9);
    $pdf->MultiCell(190, 4, utf8_decode("Nombre del Cliente: " . $Gestiones->getNombresUsuarios() . " " . $Gestiones->getApellidosUsuarios()));
    $pdf->MultiCell(190, 4, utf8_decode("Dui: " . $Gestiones->getDuiUsuarios()));
    $pdf->MultiCell(190, 4, utf8_decode("Nit: " . $Gestiones->getNitUsuarios()));
    $pdf->MultiCell(190, 0, utf8_decode("No. de Cuenta Cliente: " . $Gestiones->getNumeroCuentaAhorroClientes()), 0, 'R');
    $pdf->Ln(40);
    if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "Entrada") {
        $pdf->MultiCell(190, 4, utf8_decode("Abono a Cuenta No.: " . $Gestiones->getNumeroCuentaAhorroClientes() . " | {Cod->" . $Gestiones->getCodigoProductos() . " " . $Gestiones->getReferenciaTransaccionCreditosClientes() . "} ( ~ $" . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2) . " USD)"));
    } else if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "Salida") {
        $pdf->MultiCell(190, 4, utf8_decode("Retiro a Cuenta No.: " . $Gestiones->getNumeroCuentaAhorroClientes() . " | {Cod->" . $Gestiones->getCodigoProductos() . " " . $Gestiones->getReferenciaTransaccionCreditosClientes() . "} ( ~ $" . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2) . " USD)"));
    } else if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "EnvioTransferencia") {
        $pdf->MultiCell(190, 4, utf8_decode("Envío Transferencia Otras Cuentas | {Cod->" . $Gestiones->getCodigoProductos() . " " . $Gestiones->getReferenciaTransaccionCreditosClientes() . "} ( ~ $" . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2) . " USD)"));
    } else if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "DepositoTransferencia") {
        $pdf->MultiCell(190, 4, utf8_decode("Abono Transferencia Otras Cuentas | {Cod->" . $Gestiones->getCodigoProductos() . " " . $Gestiones->getReferenciaTransaccionCreditosClientes() . "} ( ~ $" . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2) . " USD)"));
    }
    $pdf->Ln(6);
    $pdf->MultiCell(199, 5, utf8_decode("Total: $ " . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2)), 0, 'R');
    $pdf->Ln(6);
    $pdf->SetFont('Arial', '', 7);
    $pdf->MultiCell(190, 4, utf8_decode("TRANSACCIÓN EFETUADA POR: " . $Conversion->toWords($Gestiones->getMontoDepositosRetirosCuentas()) . " DOLARES DE LOS ESTADOS UNIDOS DE AMERICA"), 0, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Ln(5);
    $pdf->MultiCell(130, 4, utf8_decode("Estimado(a) cliente. Agradecemos su preferencia, la transacción fue efectuada con éxito. Cualquier consulta, duda y/o reclamo puede efectuarlo en nuestros teléfonos 2255-0090, 2255-0091 y 2255-0192 o a nuestro correo electrónico servicioalcliente@cashmanha.com específicando el número de transacción que se encuentra en la parte superior de este documento. Trabajamos duro cada día para darle un excelente servicio a cada uno de nuestros clientes."));
    $pdf->Ln(-15);
    if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "EnvioTransferencia") {
        $pdf->MultiCell(193, 0, utf8_decode("Monto Saldo Debitado"), 0, 'R');
    } else if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "DepositoTransferencia") {
        $pdf->MultiCell(193, 0, utf8_decode("Monto Saldo Añadido"), 0, 'R');
    } else {
        $pdf->MultiCell(193, 0, utf8_decode("Nuevo Saldo Cuenta"), 0, 'R');
    }
    $pdf->Ln(11);
    if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "EnvioTransferencia") {
        $pdf->MultiCell(190, 0, utf8_decode("-$" . number_format($Gestiones->getSaldoNuevoTransaccionDepositosRetirosCuentas(), 2) . " USD"), 0, 'R');
    } else if ($Gestiones->getTipoTransaccionDepositosRetirosCuentas() == "DepositoTransferencia") {
        $pdf->MultiCell(190, 0, utf8_decode("+$" . number_format($Gestiones->getSaldoNuevoTransaccionDepositosRetirosCuentas(), 2) . " USD"), 0, 'R');
    } else {
        $pdf->MultiCell(190, 0, utf8_decode("$" . number_format($Gestiones->getSaldoNuevoTransaccionDepositosRetirosCuentas(), 2) . " USD"), 0, 'R');
    }
    if ($Gestiones->getEstadoTransaccionDepositosRetirosCuentas() == "AnularDeposito") {
        $pdf->Ln(25);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(213, 0, 0);
        $pdf->MultiCell(190, 4, utf8_decode("Estimado(a) cliente, el depósito efectuado a su cuenta por el monto de $" . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2) . " USD con número de referencia " . $Gestiones->getReferenciaTransaccionDepositosRetirosCuentas() . " ha sido anulado. Motivo por el cual el monto reflejado en este comprobante ha sido revertido de su cuenta de ahorros."));
        $pdf->Ln(30);
    } else if ($Gestiones->getEstadoTransaccionDepositosRetirosCuentas() == "AnularRetiro") {
        $pdf->Ln(25);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(213, 0, 0);
        $pdf->MultiCell(190, 4, utf8_decode("Estimado(a) cliente, el retiro efectuado a su cuenta por el monto de $" . number_format($Gestiones->getMontoDepositosRetirosCuentas(), 2) . " USD con número de referencia " . $Gestiones->getReferenciaTransaccionDepositosRetirosCuentas() . " ha sido anulado. Motivo por el cual el monto reflejado en este comprobante ha sido devuelto de su cuenta de ahorros."));
        $pdf->Ln(30);
    } else {
        $pdf->Ln(75);
    }
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 7);
    $pdf->MultiCell(190, 4, utf8_decode("COMPROBANTE OFICIAL DE CANCELACIÓN CASHMAN H.A S.A DE C.V ~ " . $Gestiones->getReferenciaTransaccionDepositosRetirosCuentas()), 0, 'C');
    $pdf->MultiCell(190, 4, utf8_decode("Transacción gestionada por:  Emp->C.H" . $Gestiones->getEmpleadoGestionTransaccionDepositosRetirosCuentas()), 0, 'C');
    $pdf->Output();
}
