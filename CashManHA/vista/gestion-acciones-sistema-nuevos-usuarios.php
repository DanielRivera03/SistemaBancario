<?php
// SOLAMENTE MOSTRAR ESTA VISTA A USUARIOS QUE INICIAN SESION POR PRIMERA VEZ
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
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
        <title>CashMan H.A. | Bienvenido(a)</title>
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
        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/toastr/css/toastr.min.css">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    </head>

    <body class="h-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="alert alert-primary left-icon-big alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-email-alert"></i></span>
                            </div>
                            <div class="media-body">
                                <h6 class="mt-1 mb-2">Estimado usuario(a)</h6>
                                <p class="mb-0">Bienvenido(a) a nuestro sistema, hemos detectado que es la primera vez que inicia sesi&oacute;n. Debe realizar el cambio de sus credenciales.<strong> Le recordamos que su usuario &uacute;nico puede ser cambiado una vez.</strong></p>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo $UrlGlobal; ?>vista/images/paper-document-file-data-svgrepo-com.svg">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
                                        <h4 class="text-center mb-4">Gesti&oacute;n Nuevos Usuarios</h4>
                                        <form id="gestion-nuevos-usuarios" class="form-valide" method="POST" action="<?php echo $UrlGlobal; ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=recuperar-cuentas">
                                            <div class="form-group">
                                                <label><strong>C&oacute;digo Usuario &Uacute;nico:</strong></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="val-usuariounico" name="val-usuariounico" placeholder="Ingresa tu usuario &uacute;nico..." value="<?php echo $_SESSION['usuario_unico']; ?>" onBlur=" comprobarUsuario_NuevosUsuarios()">
                                                    <div class="col-md-12">
                                                        <span id="estadousuario"></span>
                                                    </div>
                                                    <p><img style="width: 25px; margin: 1rem 0 0 0; display:none;" src="../vista/images/Spinner.svg" id="loaderIcon" /></p>
                                                </div>
                                            </div><br>
                                            <label><strong>Nueva Contrase&ntilde;a:</strong></label>
                                            <div class="form-group">
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
                                            <button style="margin: 1.3rem 0 0 0;" id='enviodatosnuevosusuarios' type='submit' class='btn btn-primary btn-block'> Cambiar Configuraci&oacute;n Cuenta</button>
                                        </form>
                                        <div style="padding:1rem 0 0 0;" id="resultados_ajax"></div>
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
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <!-- Form validate init -->
        <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery.validate-init.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
        <!-- Toastr -->
        <script src="<?php echo $UrlGlobal; ?>vista/vendor/toastr/js/toastr.min.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/alerta-actualizacion-configuracion-cuentas-usuariosnuevos.js"></script>
        <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarUsuarioUnicoNuevosUsuarios.js"></script>
        <script>
            $(document).ready(function() {
                $("form").keypress(function(e) {
                    if (e.which == 13) {
                        toastr.error("No tienes permitido hacer uso de la tecla 'ENTER'.", "¡Error, Lo sentimos!");
                        return false;
                    }
                });
            });
        </script>
    </body>

    </html>
<?php
    // CASO CONTRARIO, REDIRIGIR A INICIO DE PORTAL SEGUN ROL DE USUARIO ASIGNADO
} else {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
} ?>