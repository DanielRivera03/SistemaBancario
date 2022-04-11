<?php
// DATOS DE LOCALIZACION -> IDIOMA ESPAÑOL -> ZONA HORARIA EL SALVADOR (UTC-6)
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/El_Salvador');
// -> VALIDACION COPIA CONTRATO CLIENTES = NO MOSTRAR CONTRATOS DE OTROS CLIENTES SI ID UNICO DE USUARIO NO COINCIDE CON EL CONTRATO SUSCRITO A CONSULTAR
$NombreContratoClientes = $Gestiones->getNombreCopiaContratosSuscritosCreditosClientes();
$IdUsuarioContratoClientes = $Gestiones->getIdUsuarios();
if ($_GET['nombrecopiacontrato'] == $NombreContratoClientes) {
    // VISTA COPIA CONTRATOS CLIENTES
    header("Content-type: application/pdf");
    readfile("../vista/copiacontratosclientes/" . $NombreContratoClientes);
} else { // SI NO EXISTE COINCIDENCIA, SIMPLEMENTE MOSTRAR ERROR 404
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=error-404');
}
