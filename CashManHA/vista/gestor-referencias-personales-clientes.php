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
        <title>CashMan H.A. | Gestor Referencias Personales - Laborales</title>
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
            <div class="progress-bar bg-danger progress-animated" style="width: 95%; height:6px;" role="progressbar"></div>
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
                                        <h3 class="text-center mb-4">Gestor de Referencias Clientes</h3>
                                        <p class="text-center">Referencias Personales - Laborales</p>
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="profile-photo">
                                                        <img src="<?php echo $UrlGlobal ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <h3 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h3>
                                                    <?php
                                                    if (empty($Gestiones->getNombreProductos())) {
                                                    ?><br>
                                                        <div class="alert alert-danger solid alert-rounded "><strong><i class="ti-target"></i> ¡Error!</strong> Lo sentimos, pero debe existir un producto asociado a este cliente para poder ingresar las referencias personales y laborales.</div>
                                                        <a href="<?php echo $UrlGlobal;
                                                                    echo 'controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-seleccion-producto-clientes&idusuario=';
                                                                    echo $Gestiones->getIdUsuarios(); ?>" id="enviar-datos-creditos" class="btn light btn-dark"><i class="ti-hand-point-right"></i> Asignar Producto Cliente</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <?php
                                                        // COMPROBACION DE EXISTENCIAS REFERENCIAS PERSONALES -> LABORALES
                                                        if (empty($Gestiones->getNombresReferenciaPersonal())) {
                                                        ?>
                                                            <div class="col-xl-12">
                                                                <form id="ingreso-datos-referencias-clientes" class="validacion-registro-referencias-clientes" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                    <div class="row form-validation">
                                                                        <div class="col-lg-12 mb-2"><br>
                                                                            <h4 class="text-primary mb-4">Referencia Personal</h4>
                                                                            <input type="hidden" name="idclienteunico" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
                                                                            <input type="hidden" name="idunicocreditoclientes" value="<?php echo $Gestiones->getIdCreditoAuxiliar(); ?>">
                                                                            <input type="hidden" name="idunicoproductoclientes" value="<?php echo $Gestiones->getIdProductos(); ?>">
                                                                            <div class="form-group"></div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Ingrese sus Nombres <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-nombrereferenciapersonal" name="val-nombrereferenciapersonal" placeholder="Nombres...">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Ingrese sus Apellidos <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-apellidosreferenciapersonal" name="val-apellidosreferenciapersonal" placeholder="Apellidos...">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">¿Empresa d&oacute;nde labora? <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-envelope"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-empresareferenciapersonal" name="val-empresareferenciapersonal" placeholder="¿D&oacute;nde labora?">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Profesi&oacute;n u Oficio <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-help"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-profesionreferenciapersonal" name="val-profesionreferenciapersonal" placeholder="¿Profesi&oacute;n? ¿Oficio?">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Tel&eacute;fono Personal <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-headphone-alt"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-telefonoreferenciapersonal" name="val-telefonoreferenciapersonal" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2"><br>
                                                                            <h4 class="text-primary mb-4">Referencia Laboral</h4>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Ingrese sus Nombres <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-nombrereferencialaboral" name="val-nombrereferencialaboral" placeholder="Nombres...">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Ingrese sus Apellidos <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-apellidosreferencialaboral" name="val-apellidosreferencialaboral" placeholder="Apellidos...">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">¿Empresa d&oacute;nde labora? <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-envelope"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-empresareferencialaboral" name="val-empresareferencialaboral" placeholder="¿D&oacute;nde labora?">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Profesi&oacute;n u Oficio <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-help"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-profesionreferencialaboral" name="val-profesionreferencialaboral" placeholder="¿Profesi&oacute;n? ¿Oficio?">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label class="text-label">Tel&eacute;fono Personal <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-group mb-3  input-primary">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="ti ti-headphone-alt"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="val-telefonoreferencialaboral" name="val-telefonoreferencialaboral" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h4 class="text-primary mb-4">Confirmaci&oacute;n Datos</h4>
                                                            </div>
                                                </div>
                                                <p>Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
                                                                $PrimerNombre = explode(' ', $Nombre, 2);
                                                                print_r($PrimerNombre[0]); ?>, por favor antes de continuar, visualize la siguiente tabla y cerci&oacute;rese que todos los datos gestionados previamente son correctos; S&iacute; existe alguna irregularidad. Por favor no proceda a registrar la informaci&oacute;n de este formulario y haga los respectivos cambios en la secci&oacute;n correspondiente. <span style="color: #f00;"> Una vez finalizado este proceso, el tr&aacute;mite queda en proceso a la espera del &aacute;nalisis de las &aacute;reas correspondientes.</span></p>
                                                <p><strong>Notif&iacute;quese a los clientes que en este punto, ya pueden acceder a nuestro sistema y consultar el estatus de su gesti&oacute;n.</strong></p>
                                            </div>
                                        </div>
                                        <h4 class="text-primary mb-4 text-center">&Uacute;ltimos Productos Asociado</h4>
                                        <div class="table-responsive">
                                            <table class="table header-border table-hover verticle-middle">
                                                <thead class="thead-primary">
                                                    <tr>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Producto</th>
                                                        <th scope="col">Monto</th>
                                                        <th scope="col">Plazo</th>
                                                        <th scope="col">Tasa Inter&eacute;s</th>
                                                        <th scope="col">Estado</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            while ($filas = mysqli_fetch_array($consulta1)) {
                                                                echo '
                                                    <tr>
                                                    <td>';
                                                                echo $filas['fechasolicitud'];
                                                                echo '</td>
                                                    <td>';
                                                                echo $filas['nombreproducto'];
                                                                echo '</td>
                                                    <td>$';
                                                                echo $filas['montocredito'];
                                                                echo ' USD</td>
                                                    <td>';
                                                                echo $filas['plazocredito'];
                                                                if ($filas['nombreproducto'] == "Préstamos Personales") {
                                                                    echo ' Meses</td>';
                                                                } else {
                                                                    echo ' A&ntilde;os</td>';
                                                                }
                                                                echo '
                                                    <td>';
                                                                echo $filas['interescredito'];
                                                                echo '%</td>
                                                    <td>
                                                        <div class="progress bgl-success">
                                                            <div class="progress-bar bg-success" style="width: ';
                                                                echo $Gestiones->getProgresoInicialSolicitudCreditos();
                                                                echo '%;" role="progressbar"><span class="sr-only">';
                                                                echo $Gestiones->getProgresoInicialSolicitudCreditos();
                                                                echo '% Completo</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-success">';
                                                                echo $Gestiones->getProgresoInicialSolicitudCreditos();
                                                                echo '%</span>
                                                    </td>
                                                </tr>     
                                                    ';
                                                            }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- ENVIO DATOS -->
                                        <button type="submit" id="enviar-datos-creditos" class="btn light btn-success"><i class="ti-hand-point-right"></i> Registrar Referencias Clientes</button>
                                        </form>
                                    <?php
                                                        } else {
                                    ?>
                                        <div class="col-xl-12">
                                            <div class="alert alert-warning left-icon-big alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                </button>
                                                <div class="media">
                                                    <div class="alert-left-icon-big">
                                                        <span><i class="mdi mdi-alert"></i></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mt-1 mb-2">¡Alerta, Tomar Nota!</h5>
                                                        <p class="mb-0">Este cliente ya posee registro de referencias personales y laborales. Puede mantener los datos o actualizarlos si el cliente asi lo desea. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <form id="modificar-datos-referencias-clientes" class="validacion-registro-referencias-clientes" method="post" autocomplete="off" enctype="multipart/form-data">
                                                <div class="row form-validation">
                                                    <div class="col-lg-12 mb-2"><br>
                                                        <h4 class="text-primary mb-4">Referencia Personal</h4>
                                                        <input type="hidden" name="idclienteunico" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
                                                        <input type="hidden" name="idunicocreditoclientes" value="<?php echo $Gestiones->getIdCreditoAuxiliar(); ?>">
                                                        <input type="hidden" name="idunicoproductoclientes" value="<?php echo $Gestiones->getIdProductos(); ?>">
                                                        <input type="hidden" name="idunicoreferenciaclientes" value="<?php echo $Gestiones->getIdReferenciasClientes(); ?>">
                                                        <div class="form-group"></div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Ingrese sus Nombres <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-nombrereferenciapersonal" name="val-nombrereferenciapersonal" placeholder="Nombres..." value="<?php echo $Gestiones->getNombresReferenciaPersonal(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Ingrese sus Apellidos <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-apellidosreferenciapersonal" name="val-apellidosreferenciapersonal" placeholder="Apellidos..." value="<?php echo $Gestiones->getApellidosReferenciaPersonal(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">¿Empresa d&oacute;nde labora? <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-envelope"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-empresareferenciapersonal" name="val-empresareferenciapersonal" placeholder="¿D&oacute;nde labora?" value="<?php echo $Gestiones->getEmpresaReferenciaPersonal(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Profesi&oacute;n u Oficio <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-help"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-profesionreferenciapersonal" name="val-profesionreferenciapersonal" placeholder="¿Profesi&oacute;n? ¿Oficio?" value="<?php echo $Gestiones->getProfesionOficioReferenciaPersonal(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Tel&eacute;fono Personal <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-headphone-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-telefonoreferenciapersonal" name="val-telefonoreferenciapersonal" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getTelefonoReferenciaPersonal(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2"><br>
                                                        <h4 class="text-primary mb-4">Referencia Laboral</h4>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Ingrese sus Nombres <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-nombrereferencialaboral" name="val-nombrereferencialaboral" placeholder="Nombres..." value="<?php echo $Gestiones->getNombresReferenciaLaboral(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Ingrese sus Apellidos <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-user"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-apellidosreferencialaboral" name="val-apellidosreferencialaboral" placeholder="Apellidos..." value="<?php echo $Gestiones->getApellidosReferenciaLaboral(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">¿Empresa d&oacute;nde labora? <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-envelope"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-empresareferencialaboral" name="val-empresareferencialaboral" placeholder="¿D&oacute;nde labora?" value="<?php echo $Gestiones->getEmpresaReferenciaLaboral(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Profesi&oacute;n u Oficio <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-help"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-profesionreferencialaboral" name="val-profesionreferencialaboral" placeholder="¿Profesi&oacute;n? ¿Oficio?" value="<?php echo $Gestiones->getProfesionOficioReferenciaLaboral(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Tel&eacute;fono Personal <span class="text-danger">*</span></label>
                                                            <div class="col-lg-12">
                                                                <div class="input-group mb-3  input-primary">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ti ti-headphone-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="val-telefonoreferencialaboral" name="val-telefonoreferencialaboral" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getTelefonoReferenciaLaboral(); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="text-primary mb-4">Confirmaci&oacute;n Datos</h4>
                                        </div>
                                    </div>
                                    <p>Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
                                                            $PrimerNombre = explode(' ', $Nombre, 2);
                                                            print_r($PrimerNombre[0]); ?>, por favor antes de continuar, visualize la siguiente tabla y cerci&oacute;rese que todos los datos gestionados previamente son correctos; S&iacute; existe alguna irregularidad. Por favor no proceda a registrar la informaci&oacute;n de este formulario y haga los respectivos cambios en la secci&oacute;n correspondiente. <span style="color: #f00;"> Una vez finalizado este proceso, el tr&aacute;mite queda en proceso a la espera del &aacute;nalisis de las &aacute;reas correspondientes.</span></p>
                                    <p><strong>Notif&iacute;quese a los clientes que en este punto, ya pueden acceder a nuestro sistema y consultar el estatus de su gesti&oacute;n.</strong></p>
                                </div>
                            </div>
                            <h4 class="text-primary mb-4 text-center">Producto Asociado</h4>
                            <div class="table-responsive">
                                <table class="table header-border table-hover verticle-middle">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Plazo</th>
                                            <th scope="col">Tasa Inter&eacute;s</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                            while ($filas = mysqli_fetch_array($consulta1)) {
                                                                echo '
                                                    <tr>
                                                    <td>';
                                                                echo $filas['fechasolicitud'];
                                                                echo '</td>
                                                    <td>';
                                                                echo $filas['nombreproducto'];
                                                                echo '</td>
                                                    <td>$';
                                                                echo $filas['montocredito'];
                                                                echo ' USD</td>
                                                    <td>';
                                                                echo $filas['plazocredito'];
                                                                if ($filas['nombreproducto'] == "Préstamos Hipotecarios") {
                                                                    echo ' A&ntilde;os</td>';
                                                                } else {
                                                                    echo ' Meses</td>';
                                                                }
                                                                echo '
                                                    <td>';
                                                                echo $filas['interescredito'];
                                                                echo '%</td>
                                                    <td>
                                                        <div class="progress bgl-success">
                                                            <div class="progress-bar bg-success" style="width: ';
                                                                echo $Gestiones->getProgresoInicialSolicitudCreditos();
                                                                echo '%;" role="progressbar"><span class="sr-only">';
                                                                echo $Gestiones->getProgresoInicialSolicitudCreditos();
                                                                echo '% Completo</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-success">';
                                                                echo $Gestiones->getProgresoInicialSolicitudCreditos();
                                                                echo '%</span>
                                                    </td>
                                                </tr>     
                                                    ';
                                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                                            // SI NO EXISTEN REFERENCIAS REGISTRADAS, MOSTRAR BOTON DE REGISTRO DE INFORMACION
                                                            if (empty($Gestiones->getNombresReferenciaPersonal())) {
                            ?>
                                <!-- ENVIO DATOS -->
                                <button type="submit" id="enviar-datos-creditos" class="btn light btn-success"><i class="ti-hand-point-right"></i> Registrar Referencias Clientes</button>
                            <?php
                                                                // SI EXISTEN REFERENCIAS REGISTRADAS, MOSTRAR BOTON DE ACTUALIZAR DE INFORMACION
                                                            } else {
                            ?>
                                <!-- ENVIO DATOS -->
                                <button type="submit" id="enviar-datos-creditos" class="btn light btn-info"><i class="ti-hand-point-right"></i> Actualizar Referencias Clientes</button>
                            <?php } ?>
                            </form>
                    <?php }
                                                    } ?>
                        </div>
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
        <!-- Mask -->
        <script src="<?php echo $UrlGlobal; ?>vista/js/mask.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/mascara-datos-referencias-personales-creditos.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-registro-referencias-personales-clientes.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-modificar-referencias-laborales-personales-clientes.js"></script>
    </body>

    </html>
<?php } ?>