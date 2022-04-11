<?php
// SI USUARIO NO TIENE SESION ACTIVA, MOSTRAR FORMULARIO DE INICIO DE SESION
if (empty($_SESSION['id_usuario'])) {
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
        <title>CashMan H.A. | Portal Financiero</title>
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
        <!-- Alerts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>

    <body class="h-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
                                        <h4 class="text-center mb-4">CashMan H.A. | Iniciar Sesi&oacute;n</h4>
                                        <form id="accesos-usuarios" class="form-valide-with-icon" method="POST" action="<?php echo $UrlGlobal; ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=validar-sesiones" autocomplete="off">
                                            <div class="form-group">
                                                <label class="text-label">Usuario</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="val-username1" name="val-username" placeholder="Usuario" value="<?php if (!empty($_COOKIE['val-username'])) {
                                                                                                                                                                    echo $_COOKIE['val-username'];
                                                                                                                                                                } ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-label">Contrase&ntilde;a </label>
                                                <div class="input-group transparent-append">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                    </div>
                                                    <input type="password" class="form-control" id="val-password1" name="val-password" placeholder="Contrase&ntilde;a">
                                                    <div class="input-group-append show-pass">
                                                        <button class="background-password btn btn-dark" style="height: auto;" id="show_password" class="input-group-text" type="button" onclick="mostrarPassword()"> <span style="font-size: 1rem;" class="fa fa-eye-slash show-password"></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <?php if (empty($_COOKIE['val-username'])) {
                                                        // MOSTRAR UNICAMENTE SI COOKIE NO HA SIDO GUARDADA 
                                                    ?>
                                                        <div class="custom-control custom-checkbox ml-1">
                                                            <input type="checkbox" name="recordar" class="custom-control-input" id="basic_checkbox_1" checked>
                                                            <label class="custom-control-label" for="basic_checkbox_1">Recordar Usuario</label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <a style="cursor: help;" href="<?php echo $UrlGlobal; ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=reestablecer-contrasena">¿Olvide mi contrase&ntilde;a?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesi&oacute;n</button>
                                            </div>
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
    </body>

    </html>
<?php
    // SI USUARIO POSEE SESION ACTIVA, REDIRIGIR A INICIOS DE LA APLICACION SEGUN SUS ROLES DE USUARIOS
} else {
    // USUARIOS ADMINISTRADORES
    if ($_SESSION['id_rol'] == 1) {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=inicioadministradores');
        // USUARIOS PRESIDENCIA
    } else if ($_SESSION['id_rol'] == 2) {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=iniciopresidencia');
        // USUARIOS GERENCIA
    } else if ($_SESSION['id_rol'] == 3) {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=iniciogerencia');
        // USUARIOS ATENCION AL CLIENTE
    } else if ($_SESSION['id_rol'] == 4) {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=inicioatencionclientes');
        // USUARIOS CLIENTES
    } else if ($_SESSION['id_rol'] == 5) {
        header('location:../controlador/cGestionesCashman.php?cashmanhagestion=inicioclientes');
    }
}
?>