<?php
// NO PERMITIR LA ESTANCIA EN ESTA PAGINA POR MAS DE 360 SEGUNDOS
if (isset($_SESSION['tiempo_sesion'])) {
    $Inactividad = 360; // 6 MINUTOS
    $TiempoVida = time() - $_SESSION['tiempo_sesion'];
    if ($TiempoVida > $Inactividad) {
        // RETIRAR Y DESTRUIR LA SESION
        session_unset();
        session_destroy();
        // REDIRIGIR AL FORMULARIO DE INICIO DE SESION      
        header("location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion");
        exit(); // SALIR DE TODA EJECUCION
    }
}
$_SESSION['tiempo_sesion'] = time(); // CONTADOR DE TIEMPO
// NO PERMITIR INGRESO SIN SESION DE TOKEN INICIALIZADA
if (!isset($_SESSION['TokenUsuarios'])) {
    header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
}
if ($_GET['token'] != $_SESSION['TokenUsuarios']) {
    $urltoken = $_GET['token'];
    $URL = "../controlador/cIniciosSesionesUsuarios.php?cashmanha=token-codigo-invalido&token=$urltoken";
    header("location: $URL");
}
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
    <title>CashMan H.A. | Ingreso C&oacute;digo Recuperaci&oacute;n</title>
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

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
            <div class="media">
                <div class="alert-left-icon-big">
                    <span><i class="mdi mdi-alert"></i></span>
                </div>
                <div class="media-body">
                    <h5 class="mt-1 mb-2">Estimado usuario(a) tomar nota:</h5>
                    <p class="mb-0">Su token de recuperaci&oacute;n es: <strong><?php echo $_SESSION['TokenUsuarios']; ?></strong>. Solamente cuenta con una oportunidad para reestablecer su contrase&ntilde;a. Si usted cierra el navegador, o simplemente pierde el acceso a est&aacute; p&aacute;gina. <strong>Deber&aacute; iniciar nuevamente el proceso de reestablecimiento de su contrase&ntilde;a.</strong> Lo anterior, por la seguridad de sus datos en nuestro sistema. Dispone de 6 minutos para verificar su c&oacute;digo, de lo contrario su token de acceso vencer&aacute;.</p>
                </div>
            </div>
        </div>
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <img style="width: 100%; max-width: 500px;" src="../vista/images/secure-data.svg">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
                                    <h4 class="text-center mb-4">C&oacute;digo de Seguridad</h4>
                                    <form id="cambioestadotoken" data-id="<?php echo $_SESSION['TokenUsuarios']; ?>" class="form-valide" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <label><strong>Ingresar C&oacute;digo Aqu&iacute;:</strong></label>
                                            <div class="input-group">
                                                <input style="letter-spacing: 1.1rem;" type="text" class="form-control" id="val-codesecurity" name="val-codesecurity" placeholder="Ej: 16793" onBlur="comprobarCodigoSeguridad()" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="5">
                                            </div>
                                            <div class="col-md-12">
                                                <span id="estadousuario"></span>
                                            </div>
                                            <p><img style="width: 25px; margin: 1rem 0 0 0; display:none;" src="../vista/images/Spinner.svg" id="loaderIcon" /></p>

                                    </form>
                                </div>
                            </div>
                        </div>
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
    <script src="<?php echo $UrlGlobal; ?>vista/js/ComprobarCodigoSeguridad.js"></script>
    <script src="<?php echo $UrlGlobal; ?>vista/js/cambioestadostoken.js"></script>
</body>

</html>