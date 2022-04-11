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
            <title>CashMan H.A. | Seleccionar Producto CashMan H.A</title>
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
            <!-- Alerts -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        </head>

        <body class="h-100">
            <div class="progress ">
                <div class="progress-bar bg-danger progress-animated" style="width: 50%; height:6px;" role="progressbar"></div>
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
                                            <h3 class="text-center mb-4">Gestor de Productos</h3>
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="profile-photo">
                                                            <img src="<?php echo $UrlGlobal ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <h3 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h3>
                                                        <p>Cliente CashMan H.A</p>
                                                        <p>Seleccionar Producto CashMan H.A</p>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="col-lg-12 mb-3">
                                                            <ul class="list-icons">
                                                            </ul>
                                                            <?php
                                                            while ($filas = mysqli_fetch_array($consulta1)) {
                                                                echo '
                                            <li><a href="';
                                                                // VALIDACION DE REDIRECCION SEGUN PRODUCTOS
                                                                if ($filas['nombreproducto'] == "Préstamos Personales") {
                                                                    echo $UrlGlobal;
                                                                    echo 'controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-asignacion-prestamo-personal&idusuario=';
                                                                    echo $Gestiones->getIdUsuarios();
                                                                    echo '';
                                                                }
                                                                if ($filas['nombreproducto'] == "Préstamos Hipotecarios") {
                                                                    echo $UrlGlobal;
                                                                    echo 'controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-asignacion-prestamo-hipotecario&idusuario=';
                                                                    echo $Gestiones->getIdUsuarios();
                                                                    echo '';
                                                                }
                                                                if ($filas['nombreproducto'] == "Préstamos de Vehículos") {
                                                                    echo $UrlGlobal;
                                                                    echo 'controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-asignacion-prestamo-vehiculos&idusuario=';
                                                                    echo $Gestiones->getIdUsuarios();
                                                                    echo '';
                                                                }
                                                                if ($filas['nombreproducto'] == "Cuentas de Ahorro Personales") {
                                                                    echo $UrlGlobal;
                                                                    echo 'controlador/cGestionesCashman.php?cashmanhagestion=';
                                                                    if ($_SESSION['id_rol'] == 1) {
                                                                        echo "registro-nuevas-cuentas-ahorro-clientes";
                                                                    } else if ($_SESSION['id_rol'] == 4) {
                                                                        echo "registro-nuevas-cuentas-ahorro-atencion-clientes";
                                                                    } else {
                                                                        echo "#";
                                                                    }
                                                                    echo '';
                                                                }
                                                                echo '"><span class="align-middle mr-2"><i class="fa fa-chevron-right"></i></span> ';
                                                                echo $filas['nombreproducto'];
                                                                echo '</a></li>
                                            ';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="text-center">&copy; Copyright <?php echo date('Y'); ?> CashMan H.A</h6>
                                        </div>
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
                        <!-- Jquery Validation -->
                        <script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-validation/jquery.validate.min.js"></script>
                        <!-- Form validate init -->
                        <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery.validate-init.js"></script>
                        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
        </body>

        </html>
<?php
        // SI LOS CLIENTES NO CUMPLEN CON LA EDAD MINIMA Y MAXIMA REQUERIDA, NO PODRAN AVANZAR EN LAS PAGINAS GESTORAS DE CREDITOS, Y SE REDIRECCIONARAN NUEVAMENTE A LA PAGINA DE SU INFORMACION PERSONAL
    } else {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-informacion&idusuario=' . $Gestiones->getIdUsuarios());
    }
}
?>