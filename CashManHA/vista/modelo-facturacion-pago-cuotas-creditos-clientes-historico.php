<?php
// NO PERMITIR INGRESO SI PARAMETRO IDUSUARIO NO HA SIDO ESPECIFICADO
if (empty($_GET['idusuarios'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// NO PERMITIR INGRESO SI PARAMETRO IDHISTORICOTRANSACCION NO HA SIDO ESPECIFICADO
if (empty($_GET['idhistoricotransaccion'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// NO PERMITIR INGRESO SI PARAMETRO IDCREDITOS NO HA SIDO ESPECIFICADO
if (empty($_GET['idcreditos'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// NO PERMITIR INGRESO SI PARAMETRO IDCREDITOS NO HA SIDO ESPECIFICADO
if (empty($_GET['idcuotas'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
// SI EXISTE AL MENOS UN CAMPO VACIO -> QUIERE DECIR QUE DATOS DE CLIENTE CONSULTADO NO COINCIDEN, POR LO TANTO BLOQUEAR VISTA
if(empty($Gestiones->getIdCuotasClientesHistorico())){
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
// FECHA DE CANCALACION [PROCESAMIENTO TRANSACCIONES CLIENTES]
$FechaCancelacion = date_create($Gestiones->getFechaTransaccionCreditosClientes());
// FECHA DE VENCIMIENTO [CUOTAS CREDITOS CLIENTES]
$FechaVencimiento = date_create($Gestiones->getFechaVencimientoCuotasClientes());
// CALCULO DE INCUMPLIMIENTO
if ($Gestiones->getDiasIncumplimientoCuotasClientes() > 0) {
    $MoraCuotasClientes = $Gestiones->getDiasIncumplimientoCuotasClientes() * 5.99;
} else {
    $MoraCuotasClientes = 0;
}
// INICIO REPORTE
class PDF extends FPDF
{
    // CABECERA DE DOCUMENTO
    function Header()
    {
        $this->Image('../vista/images/modelo-facturacion-creditos/cabecerafacturacion.png', 0, 0, 216);
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
$pdf->MultiCell(199, 4, utf8_decode("Orden de Pago: Bol.->#" . $Gestiones->getIdCuotasClientesHistorico()), 0, 'R');
$pdf->MultiCell(199, 4, utf8_decode("Fecha: " . date_format($FechaCancelacion, "d/m/Y")), 0, 'R');
$pdf->MultiCell(199, 4, utf8_decode("Hora: " . date_format($FechaCancelacion, "H:i:s")), 0, 'R');
$pdf->MultiCell(199, 4, utf8_decode("Producto: " . $Gestiones->getNombreProductos()), 0, 'R');
$pdf->MultiCell(199, 4, utf8_decode("Transacción: " . $Gestiones->getReferenciaTransaccionCreditosClientes()), 0, 'R');
$pdf->Ln(31);
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(190, 4, utf8_decode("Nombre del Cliente: " . $Gestiones->getNombresUsuarios() . " " . $Gestiones->getApellidosUsuarios()));
$pdf->SetTextColor(161,47,23);
$pdf->MultiCell(190, 0, utf8_decode("~~COPIA TRANSACCION~~"), 0, 'R');
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(190, 4, utf8_decode("Dui: " . $Gestiones->getDuiUsuarios()));
$pdf->MultiCell(190, 4, utf8_decode("Nit: " . $Gestiones->getNitUsuarios()));
$pdf->Ln(40);
$pdf->MultiCell(190, 4, utf8_decode("Orden de Pago ~ Cuota Mensual: " . $Gestiones->getCodigoProductos() . " | Bol->" . $Gestiones->getIdCuotasClientesHistorico() . " " . $Gestiones->getReferenciaTransaccionCreditosClientes() . " ( ~ $" . number_format($Gestiones->getCuotaMensualCreditos(), 2) . " USD)"));
$pdf->Ln(8);
$pdf->MultiCell(199, 5, utf8_decode("Subtotal: $ " . number_format($Gestiones->getCuotaMensualCreditos(), 2)), 0, 'R');
$pdf->Ln(7);
$pdf->MultiCell(199, 5, utf8_decode("Mora: $ " . number_format($MoraCuotasClientes, 2)), 0, 'R');
$pdf->Ln(6);
$pdf->MultiCell(199, 5, utf8_decode("Capital: $ " . number_format($Gestiones->getMontoCapitalClientes(), 2)), 0, 'R');
$pdf->Ln(5);
$pdf->MultiCell(199, 5, utf8_decode("Total: $ " . number_format($Gestiones->getMontoCuotaCancelar(), 2)), 0, 'R');
$pdf->Ln(6);
$pdf->SetFont('Arial', '', 7);
$pdf->MultiCell(190, 4, utf8_decode("EL TOTAL A CANCELAR ES : " . $Conversion->toWords($Gestiones->getMontoCuotaCancelar()) . " DOLARES DE LOS ESTADOS UNIDOS DE AMERICA"), 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Ln(5);
$pdf->MultiCell(190, 4, utf8_decode("Estimado(a) cliente. Agradecemos su pago efectuado, le recordamos ser puntual para así tener una excelente calificación crediticia. Cualquier consulta, duda y/o reclamo puede efectuarlo en nuestros teléfonos 2255-0090, 2255-0091 y 2255-0192 o a nuestro correo electrónico servicioalcliente@cashmanha.com específicando el número de transacción que se encuentra en la parte superior de este documento. Trabajamos duro cada día para darle un excelente servicio a cada uno de nuestros clientes."));
$pdf->Ln(45);
$pdf->SetFont('Arial', '', 7);
$pdf->MultiCell(190, 4, utf8_decode("COMPROBANTE OFICIAL DE CANCELACIÓN CASHMAN H.A S.A DE C.V ~ " . $Gestiones->getReferenciaTransaccionCreditosClientes()), 0, 'C');
$pdf->MultiCell(190, 4, utf8_decode("Transacción gestionada por:  Emp->C.H" . $Gestiones->getEmpleadoGestionTransaccionCreditosClientes()), 0, 'C');
$pdf->Output();
