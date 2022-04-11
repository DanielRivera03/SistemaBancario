<?php
// NO PERMITIR INGRESO SI PARAMETRO DE USUARIOS SE ENCUENTRA VACIO
if (empty($_GET['idusuario'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
// NO PERMITIR INGRESO SI NO EXISTE INFORMACION QUE MOSTRAR
if (empty($Gestiones->getNombresUsuarios())) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
date_default_timezone_set('America/El_Salvador');
// SI LOS USUARIOS INICIAN POR PRIMERA VEZ, MOSTRAR PAGINA DONDE DEBERAN REALIZAR EL CAMBIO OBLIGATORIO DE SU CONTRASEÑA GENERADA AUTOMATICAMENTE
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestiones-nuevos-usuarios-registrados');
    // CASO CONTRARIO, MOSTRAR PORTAL DE USUARIOS -> SEGUN ROL DE USUARIO ASIGNADO
} else {
    /*
        -> VALIDACION DE EDAD MINIMA Y MAXIMA OTORGAMIENTO PRESTAMOS CLIENTES
    */
    // OBTENER FECHA COMPLETA REGISTRADA
    $Fecha = $Gestiones->getFechaNacimientoUsuarios();
    // CALCULAR EDAD ANTES DE CUMPLEAÑOS
    $FechaCumpleanos = new DateTime($Fecha);
    $Ahora = new DateTime();
    // COMPRUEBA SEGUN AÑO -> MES -> DIA
    $CalcularEdad = $Ahora->diff($FechaCumpleanos);
    $EdadActualClientes = $CalcularEdad->y;
    // SOLAMENTE CLIENTES DE RANGOS 18 A 70 AÑOS
    if ($EdadActualClientes >= 18 && $EdadActualClientes <= 70) {
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
        <!DOCTYPE html>
        <html lang="ES-SV" class="h-100">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>CashMan H.A. | Gestor Nuevos Pr&eacute;stamos Personales</title>
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
            <link href="<?php echo $UrlGlobal; ?>vista/css/style.css" rel="stylesheet">
            <link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/dist/mc-calendar.min.css" />
            <!-- Alerts -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>

        <body class="h-100">
            <div class="progress ">
                <div class="progress-bar bg-danger progress-animated" style="width: 75%; height:6px;" role="progressbar"></div>
            </div>
            <div class="authincation h-100">
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-10">
                            <div class="authincation-content">
                                <div class="row no-gutters">
                                    <div class="col-xl-12">
                                        <div class="auth-form">
                                            <p style="display: flex; justify-content: flex-end;"><span class="badge badge-rounded badge-outline-light">Empleado: <?php echo $_SESSION['usuario_unico']; ?></span></p>
                                            <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
                                            <h3 class="text-center mb-4">Gestor de Pr&eacute;stamos Personales</h3>
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="profile-photo">
                                                            <img src="<?php echo $UrlGlobal ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <h3 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h3>
                                                        <p>Asignar Nuevo Pr&eacute;stamo Personal</p>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn light btn-secondary" data-toggle="modal" data-target="#prestamospersonales">Requisitos Pr&eacute;stamos Personales</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="prestamospersonales">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Pr&eacute;stamos Personales</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 class="text-primary mb-4">Pr&eacute;stamos Personales</h4>
                                                                        <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1 ">
                                                                            <ul class="timeline">
                                                                                <li>
                                                                                    <div class="timeline-badge primary"></div>
                                                                                    <a class="timeline-panel text-muted" href="#">
                                                                                        <span>Asalariados</span>
                                                                                        <h6 class="mb-0"><i class="ti-tag"></i> Ingreso m&iacute;nimo: $200.00</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Tasa de inter&eacute;s desde el 6.00% mensual</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Monto m&aacute;ximo a financiar $10,000 USD</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Plazo m&aacute;ximo 120 meses</h6>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="timeline">
                                                                                <li>
                                                                                    <div class="timeline-badge primary"></div>
                                                                                    <a class="timeline-panel text-muted" href="#">
                                                                                        <span>Jubilados</span>
                                                                                        <h6 class="mb-0"><i class="ti-tag"></i> Ingreso m&iacute;nimo: $80.00</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Tasa de inter&eacute;s desde el 3.00% mensual</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Monto m&aacute;ximo a financiar $6,000 USD</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Plazo m&aacute;ximo 120 meses</h6>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="timeline">
                                                                                <li>
                                                                                    <div class="timeline-badge primary"></div>
                                                                                    <a class="timeline-panel text-muted" href="#">
                                                                                        <span>Independientes</span>
                                                                                        <h6 class="mb-0"><i class="ti-tag"></i> Ingreso m&iacute;nimo: $600.00</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Tasa de inter&eacute;s desde el 8.00% mensual</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Monto m&aacute;ximo a financiar $15,000 USD</h6>
                                                                                        <h6 class="mb-0"><i class="ti-back-right"></i> Plazo m&aacute;ximo 120 meses</h6>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <p style="color: #f00;">Nota: Es posible registrar otros casos siempre y cuando se respete el tipo de cliente, sin exceder el l&iacute;mite m&aacute;ximo a financiar y plazo. <strong>Pero ser&aacute;n estudiados m&aacute;s a detalle.</strong></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <?php
                                                        /*
                                        -> VALIDACION SI CLIENTE POSEE OTRO CREDITO CON LA EMPRESA, EN CASO DE SER AFIRMATIVO LOS AGENTES NO PODRAN REALIZAR EL REGISTRO DE UN NUEVO CREDITO HASTA QUE EL MISMO SEA ENVIADO AL HISTORICO  Y LOS REGISTROS DE LOS CREDITOS ACTIVOS DE SU REGISTRO SEA ELIMINADO
                                    */
                                                        if (empty($Gestiones->getIdCreditoAuxiliar())) {
                                                            // SI CLIENTE NO POSEE CREDITO ACTIVO, ENTONCES SI PROCEDE REGISTRO
                                                        ?>
                                                            <div class="col-xl-12">
                                                                <form data-id="<?php echo $Gestiones->getIdUsuarios(); ?>" id="ingreso-datos-credito-clientes" class="validacion-registro-credito-personal" name="formulariocreditosclientes" method="post" autocomplete="off" enctype="multipart/form-data" onKeyUp="ConsultarRequisitosPrestamosPersonales()">
                                                                    <div class="row form-validation">
                                                                        <div class="col-lg-12 mb-2">
                                                                            <input type="hidden" name="idclienteunico" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
                                                                            <input type="hidden" id="cuotamensualasignada" name="cuotamensualasignada">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Producto CashMan H.A Seleccionado<span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <select class="form-control" id="val-productocreditos" name="productocreditos">
                                                                                        <?php
                                                                                        while ($filas = mysqli_fetch_array($consulta1)) {
                                                                                            // OMITIR TODOS LOS PRODUCTOS A EXCEPCION DEL PRODUCTO EN CUESTION EN ESTA SECCION DE ASIGNACION DE NUEVOS CREDITOS.
                                                                                            // PRODUCTO: PRESTAMOS PERSONALES -> MODIFICAR CADENA SI EXISTE ALGUN CAMBIO EN EL NOMBRE DE LOS PRODUCTOS, TOMAR NOTA -> IMPORTANTE <-
                                                                                            if ($filas['nombreproducto'] != "Cuentas de Ahorro Personales" && $filas['nombreproducto'] != "Depósito a Plazo Fijo" && $filas['nombreproducto'] != "Préstamos Hipotecarios" && $filas['nombreproducto'] != "Préstamos de Vehículos") {
                                                                                                echo '
                                                                    <option value="';
                                                                                                echo $filas['idproducto'];
                                                                                                echo '">';
                                                                                                echo $filas['nombreproducto'];
                                                                                                echo '</option>
                                                                    ';
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Seleccione un tipo de cliente <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <select class="form-control" class="tipoclientecredito" id="valtipoclientecredito" name="tipoclientecredito">
                                                                                        <option value="">Seleccione una opci&oacute;n...</option>
                                                                                        <option value="asalariado">Empleados (Asalariados)</option>
                                                                                        <option value="jubilado">Jubilados (Pensionados)</option>
                                                                                        <option value="independiente">Independientes (Formal &Uacute;nicamente)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Tasa de Inter&eacute;s Cr&eacute;dito <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="etiqueta"></div>
                                                                                    <input type="range" class="form-control" value="6" min="3" max="20" autocomplete="off" id="rangointereses" name="rangointereses" onKeyUp="CalculoCuotaMensual()" step="0.05">
                                                                                    <p>(% Por Ciento Mensual)</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div id="consultarequisitos"></div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Salario de Cliente <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">$</span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="valsalariocliente" name="valsalariocliente" placeholder="Ingrese el salario l&iacute;quido de cliente" onkeypress="return (event.charCode <= 57)">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Monto de Cr&eacute;dito <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">$</span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="valmontocreditoclientes" name="valmontocreditoclientes" placeholder="Ingrese monto de cr&eacute;dito" onKeyUp="CalculoCuotaMensual()" onkeypress="return (event.charCode <= 57)">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">N&uacute;mero de Meses Plazo Cr&eacute;dito <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-shopping-cart-full"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="valplazocredito" name="valplazocredito" placeholder="Ingrese el n&uacute;mero de meses plazo" onKeyUp="CalculoCuotaMensual()" onkeypress="return (event.charCode <= 57)" maxlength="3">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Fecha Ingreso Solicitud <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class=" form-control" id="valfechaingresosolicitud" name="valfechaingresosolicitud" placeholder="Ingrese fecha de inicio de cr&eacute;dito" readonly value="<?php echo date("Y-m-d"); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Observaciones <span class="text-danger"></span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-ruler-pencil"></i></span>
                                                                                        </div>
                                                                                        <textarea class="form-control" placeholder="Ingrese alguna observaci&oacute;n a destacar en el tr&aacute;mite de este cliente" id="valobservaciones" name="valobservaciones" rows="3"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="text-primary mb-4">C&aacute;lculo Cuota Mensual Final</h4>
                                                                            <div class="tarjeta" id="tarjeta">
                                                                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                                                                    <div class="widget-stat card bg-dark">
                                                                                        <div class="card-body p-4">
                                                                                            <div class="media">
                                                                                                <span class="mr-3">
                                                                                                    <img class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/3d_dollarsing.gif" alt="logo-dolar">
                                                                                                </span>
                                                                                                <div class="media-body text-white">
                                                                                                    <p class="mb-1">Cuota Mensual</p>
                                                                                                    <h3 class="text-white">$ <span class="resultado" id="resultado"></span> USD.</h3>
                                                                                                    <div class="progress mb-2 bg-secondary">

                                                                                                    </div>
                                                                                                    <small style="font-size: 1rem;"><strong>Su cr&eacute;dito solicitado es de $ <span id="monto-credito-solicitado" class="monto-credito-solicitado"><strong>0.00</strong></span> USD.</strong></small><br>
                                                                                                    <small style="font-size: .8rem;"><strong>Monto final a entregar: $<span class="calculodesembolso" id="calculodesembolso"></span> USD.</strong></small><br>
                                                                                                    <ul class="list-group list-group-flush">
                                                                                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Tasa de Inter&eacute;s Mensual : </span><span><strong id="tasa-interes-credito" class="tasa-interes-credito"></strong>%</span> </li>
                                                                                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Plazo :</span><strong id="plazo-credito" class="plazo-credito">0 meses</strong></li>
                                                                                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Seguro Deuda : </span><span><strong>$</strong><strong id="segurodeuda" class="segurodeuda"></strong><strong> USD</strong></span> </li>
                                                                                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Gastos Administrativos : </span><span><strong>$</strong><strong id="gastosadministrativos" class="gastosadministrativos"></strong><strong> USD</strong></span> </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- ENVIO DATOS -->
                                                                        <button type="submit" id="enviar-datos-creditos" class="btn light btn-success"><i class="ti-hand-point-right"></i> Asignar Nuevo Cr&eacute;dito</button>
                                                                        <a href="javascript:void" onclick="LimpiezaDatos()" class="btn light btn-warning"><i class="ti-trash" onclick="LimpiezaDatos()"></i> Limpiar Formulario</a>
                                                                        <a href="" class="btn light btn-danger"><i class="ti-na"></i> Cancelar Proceso</a>
                                                                </form>

                                                            </div>
                                                        <?php
                                                        } else {
                                                            // SI CLIENTE POSEE CREDITO ACTIVO, ENTONCES NO PROCEDE REGISTRO Y MUESTRA ADVERTENCIA A LOS AGENTES RESPONSABLES
                                                        ?>
                                                            <div class="col-xl-12">
                                                                <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                                                                    <div class="media">
                                                                        <div class="alert-left-icon-big">
                                                                            <span><i class="mdi mdi-alert"></i></span>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mt-1 mb-2">Cr&eacute;dito Asignado</h5>
                                                                            <p class="mb-0">Lo sentimos, pero este cliente ya cuenta con un pr&eacute;stamo asignado. Por pol&iacute;ticas de la empresa, no es posible otorgar dos cr&eacute;ditos al mismo tiempo. <br><br>Podr&aacute;s otorgar nuevamente un cr&eacute;dito de esta categor&iacute;a a este cliente cuando cumpla con su responsabilidad en cancelar el cr&eacute;dito otorgado, enviar sus datos del cr&eacute;dito al hist&oacute;rico y estar sujeto nuevamente a nuestras pol&iacute;ticas, requisitos y condiciones.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="" class="btn light btn-info"><i class="ti-home"></i> Regresar Al Inicio de la Aplicaci&oacute;n</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="text-center">&copy; Copyright <?php echo date('Y'); ?> CashMan H.A</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--**********************************
        Scripts
    ***********************************-->
                            <!-- Required vendors -->
                            <script src="<?php echo $UrlGlobal; ?>vista/vendor/global/global.min.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/js/custom.min.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/js/deznav-init.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/js/gestiones-creditos.js"></script>
                            <!-- Jquery Validation -->
                            <script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-validation/jquery.validate.min.js"></script>
                            <!-- Form validate init -->
                            <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery.validate-init.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/dist/mc-calendar.min.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/js/calculocuotamensualclientes.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-registro-nuevos-prestamos-clientes.js"></script>
                            <script src="<?php echo $UrlGlobal; ?>vista/js/ConsultarRequisitosPrestamosPersonales.js"></script>
                            <script>
                                const firstCalendar = MCDatepicker.create({
                                    el: '#valfechaingresosolicitud',
                                    customMonths: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    customWeekDays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
                                    dateFormat: 'YYYY-MM-DD',
                                    customOkBTN: 'OK',
                                    customClearBTN: 'Limpiar',
                                    customCancelBTN: 'Cancelar',
                                    disableWeekends: true,
                                    minDate: new Date(),

                                })
                            </script>

        </body>

        </html>
<?php
        // SI LOS CLIENTES NO CUMPLEN CON LA EDAD MINIMA Y MAXIMA REQUERIDA, NO PODRAN AVANZAR EN LAS PAGINAS GESTORAS DE CREDITOS, Y SE REDIRECCIONARAN NUEVAMENTE A LA PAGINA DE SU INFORMACION PERSONAL
    } else {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-informacion&idusuario=' . $Gestiones->getIdUsuarios());
    }
}
?>