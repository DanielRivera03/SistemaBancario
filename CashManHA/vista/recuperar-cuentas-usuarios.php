<?php
$time = 140; // 140 SEGUNDOS PARA EXPIRAR SESION -> EQUIPARANDO CUENTA REGRESIVA DE USUARIOS
if (isset($_SESSION["tiempo_sesion"])) {
    if (isset($_SESSION["expirar_sesion"]) && time() > $_SESSION["expirar_sesion"] + $time) {
        // RETIRAR SESIONES CREADAS PARA MANEJO DE TIEMPO
        unset($_SESSION["expirar_sesion"]);
        unset($_SESSION["tiempo_sesion"]);
        // RETIRAR TODAS LAS SESIONES
        session_unset();
        session_destroy();
        // ELIMINAR TODA LA INFORMACION DEL LADO DEL CLIENTE
        $session_cookie_params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 24 * 3600, $session_cookie_params['path'], $session_cookie_params['domain'], $session_cookie_params['secure'], $session_cookie_params['httponly']);
        // LIMPIEZA DE VARIABLES DE SESION
        $_SESSION = array();
    }
    // REDEFINIR SESION CONTROL DE TIEMPO
    else {
        $_SESSION["expirar_sesion"] = time();
    }
}
if (isset($_GET['token'])) {
    $Token = $_GET['token'];
}
// NO PERMITIR INGRESO SIN SESION DE TOKEN INICIALIZADA
if (!isset($_SESSION['TokenUsuarios'])) {
    header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
}
// NO PERMITIR INGRESO SI TOKEN ES DIFERENTE A LA SESION INICIALIZADA
if ($_GET['token'] != $_SESSION['TokenUsuarios']) {
    $urltoken = $_GET['token'];
    $URL = "../controlador/cIniciosSesionesUsuarios.php?cashmanha=token-codigo-invalido&token=$urltoken";
    header("location: $URL");
} else {
    /*
        SOLAMENTE PERMITIR EL INGRESO DE USUARIOS QUE VALIDEN SU CODIGO DE SEGURIDAD.
        SI DIGITAN URL PARA PROCEDER CAMBIAR SU CONTRASEÑA SIN VALIDAR CODIGO, MOSTRARA
        MENSAJE DE ERROR
        */
    if ($_SESSION['EstadoCodigos'] == "ValidarCodigoAcceso") { // CODIGO DE SEGURIDAD VALIDADO
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
            <title>CashMan H.A. | Recuperar Cuenta</title>
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
                            <h5 class="mt-1 mb-2">Estimado usuario(a):</h5>
                            <p class="mb-0">Por seguridad, nuestro sistema cuenta con un tiempo establecido para que pueda realizar el cambio de su nueva contrase&ntilde;a.</p>
                            <p class="mb-0">Usted dispone de <span id="cronometro"></span> segundos para realizar el cambio de su contrase&ntilde;a.</p>
                        </div>
                    </div>
                </div>
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <img style="width: 100%; max-width: 500px;" src="../vista/images/warning.svg">
                        <div class="col-md-6">
                            <div class="authincation-content">
                                <div class="alert alert-dark alert-dismissible alert-alt solid fade show">
                                    <strong>Sugerencias</strong> <br><i style="font-size: .7rem" class="fa fa-quote-right"></i> Su contrase&ntilde;a debe contener al menos 8 car&aacute;cteres.<br><i style="font-size: .7rem" class="fa fa-quote-right"></i> Le sugerimos hacer uso de combinaci&oacute;n de may&uacute;sculas, min&uacute;sculas, n&uacute;meros, espacios y car&aacute;cteres especiales.<br>
                                    <i style="font-size: .7rem" class="fa fa-quote-right"></i> Nunca comparta su contrase&ntilde;a con otra persona.<br>
                                    <i style="font-size: .7rem" class="fa fa-quote-right"></i> Por favor tome nota del nivel de seguridad que nuestro sistema detecta en su nueva contrase&ntilde;a.
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-xl-12">
                                        <div class="auth-form">
                                            <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
                                            <h4 class="text-center mb-4">Ingresar Nueva Contrase&ntilde;a</h4>
                                            <form class="form-valide" method="POST" action="<?php echo $UrlGlobal; ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=cambiar-contrasenia-recuperacion">
                                                <div class="form-group">
                                                    <label><strong>Contrase&ntilde;a:</strong></label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="val-password1" name="val-password" placeholder="Ingresa tu nueva contrase&ntilde;a...">
                                                        <div class="input-group-append show-pass">
                                                            <button class="background-password btn btn-dark" style="height: auto;" id="show_password" class="input-group-text" type="button" onclick="mostrarPassword()"> <span style="font-size: 1rem;" class="fa fa-eye-slash show-password"></span> </button>
                                                        </div>
                                                    </div><br>
                                                    <span id="passstrength"></span>
                                                    <div class='text-center'><button id='enviodatos' type='submit' class='btn btn-primary btn-block'> Cambiar Contrase&ntilde;a</button></div>
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
            <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
            <script src="<?php echo $UrlGlobal; ?>vista/js/cronometrocambiocontrasenias.js"></script>
        </body>

        </html>
        <?php } else {/* MENSAJE ERROR CODIGO DE SEGURIDAD NO VALIDADO*/
        echo '<link href="' ?><?php echo $UrlGlobal;
                                                                                            echo 'vista/css/style.css" rel="stylesheet"><div class="col-xl-12"><div class="alert alert-danger solid alert-right-icon alert-dismissible fade show"><span><i class="mdi mdi-alert"></i></span><strong>Error!</strong> Estimado usuario(a), hemos detectado que usted ha intentado ingresar a esta p&aacute;gina sin validar su respectivo c&oacute;digo de seguridad. Lamentamos informarle que mientras usted no ingrese su c&oacute;digo de seguridad y proceda a validarlo, <strong>no podr&aacute; ingresar a realizar el respectivo cambio de su contrase&ntilde;a.</strong></div><img style="width: 100%; max-width: 400px; margin: auto; display: block;" src="' ?> <?php echo $UrlGlobal;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo 'vista/images/logo-negro.png">';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>