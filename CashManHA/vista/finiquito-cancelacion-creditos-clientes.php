<?php
    require('../FPDF/fpdf.php');
    require '../vendor/autoload.php';
    // CONVERSION DE NUMEROS A LETRAS
    use Luecano\NumeroALetras\NumeroALetras; // LLAMADO DE CLASE
    $Conversion = new NumeroALetras(); // CREANDO OBJETO INSTANCIA DE CLASE
    // DATOS DE LOCALIZACION -> IDIOMA ESPAÑOL -> ZONA HORARIA EL SALVADOR (UTC-6)
    setlocale(LC_TIME, "spanish");
    date_default_timezone_set('America/El_Salvador');
    // INICIO REPORTE
    class PDF extends FPDF{
        // CABECERA DE DOCUMENTO
        function Header(){
            $this->Image('../vista/images/modelo-informes/cabecera-simple.png',10,9,190);
        }

        // PIE DE PAGINA
        function Footer(){
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    // CREACION DE INSTANCIA DE CLASE
    $pdf = new PDF();
    $pdf->SetTitle("Finiquito Cancelacion Cliente Documento: ".$Gestiones->getDuiUsuarios()."");
    $pdf->AliasNbPages();
    $pdf->AddPage();
    // CONTENIDO DE REPORTE [DOCUMENTO]
    $pdf->SetFont('Arial','',10);
    $pdf->Ln(50);
    $pdf->MultiCell(190,5,utf8_decode("San Salvador, ".utf8_encode(strftime("%A %d de %B de %Y")).""),'','R');
    $pdf->Ln(5);
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Asunto: Carta Finiquito Cancelación Crédito [".$Gestiones->getNombreProductos()." ~ ".$Gestiones->getCodigoProductos()."]"));
    $pdf->MultiCell(190,5,utf8_decode("Cliente: ".$Gestiones->getNombresUsuarios()." ".$Gestiones->getApellidosUsuarios()));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Por medio de la presente nos permitimos informar que el crédito ".strtolower($Gestiones->getNombreProductos())." con código ".$Gestiones->getCodigoProductos().", a nombre de ".$Gestiones->getNombresUsuarios()." ".$Gestiones->getApellidosUsuarios()." ha sido satisfactoriamente liquidado de acuerdo con lo establecido en el contrato celebrado entre la sociedad financiera Cashman H.A El Salvador S.A de C.V y el dueño de dicho crédito."));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Dicho contrato fue celebrado por un total de ".$Conversion->toWords($Gestiones->getMontoFinanciamientoCreditos())." DOLARES DE LOS ESTADOS UNIDOS DE AMERICA y negociado para ser cubierto en un total de ".$Conversion->toWords($Gestiones->getTiempoPlazoCreditos())." MESES plazos fijos y una cuota mensual pactada y tomada a bien por ambas partes de ".$Conversion->toWords($Gestiones->getCuotaMensualCreditos())." DOLARES DE LOS ESTADOS UNIDOS DE AMERICA, así como una tasa de interés mensual de ".$Conversion->toWords($Gestiones->getTasaInteresCreditos())." POR CIENTO durante el periodo del contrato."));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Es por esta razón que a la fecha de la emisión de este documento, se hace constar que entre el cliente ".$Gestiones->getNombresUsuarios()." ".$Gestiones->getApellidosUsuarios()." y la sociedad financiera Cashman H.A El Salvador S.A de C.V no existe adeudo alguno con lo referente al contrato referente al crédito [".$Gestiones->getNombreProductos()." ~ ".$Gestiones->getCodigoProductos()."], no así para cualquier otro tipo de adeudo por la emisión de cualquier documento financiero más."));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Sin más por el momento y a solicitud así como para los fines que al interesado convengan, se emite la presente carta en la ciudad de San Salvador, El Salvador a los ".strftime("%d días del mes de %B")." del año en curso."));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Agradezco de antemano la atención,"));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Reciba un cordial saludo,"));
    $pdf->Ln(5);
    $pdf->MultiCell(190,5,utf8_decode("Atentamente"));
    $pdf->Ln(25);
    $pdf->MultiCell(190,5,utf8_decode("Presidente General CashMan H.A S.A de C.V"));
    $pdf->Ln(3);
    $pdf->MultiCell(190,5,utf8_decode("CashMan H.A El Salvador S.A de C.V"));
    $pdf->Output();
?>