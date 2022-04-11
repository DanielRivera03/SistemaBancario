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
	    <title>CashMan H.A. | Portal Clientes</title>
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
	                <div class="col-md-12">
	                    <div class="authincation-content">
	                        <div class="row no-gutters">
	                            <div class="col-xl-12">
	                                <div class="auth-form">
	                                    <form action="<?php echo $UrlGlobal; ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=cerrarsesion" method="POST">
	                                        <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
	                                        <div class="text-center">
	                                            <h2><i class="fa fa-check text-success"></i> Bienvenido(a)</h2>
	                                            <p>Estimado cliente, es un honor saludarle nuevamente. Le comentamos que su solicitud crediticia a&uacute;n se encuentra en estudio. S&iacute; desea mayor informaci&oacute;n, le invitamos que se comunique con nuestra l&iacute;nea de atenci&oacute;n al cliente. Estamos para servirle.</p>
	                                            <div class="table-responsive">
	                                                <table class="table header-border table-hover verticle-middle">
	                                                    <thead>
	                                                        <tr>
	                                                            <th scope="col">Producto</th>
	                                                            <th scope="col">Estado</th>
	                                                            <th scope="col">Gr&aacute;fico</th>
	                                                            <th scope="col">Porcentaje</th>
	                                                        </tr>
	                                                    </thead>
	                                                    <tbody>
	                                                        <tr>
	                                                            <td><?php echo $Gestiones->getNombreProductos(); ?> [<?php echo $Gestiones->getCodigoProductos(); ?>] </td>
	                                                            <td><?php echo $Gestiones->getEstadoActualCreditos(); ?></td>
	                                                            <td>
	                                                                <div class="progress bgl-primary">
	                                                                    <div class="progress-bar" style="width: <?php echo $Gestiones->getProgresoInicialSolicitudCreditos(); ?>%;" role="progressbar"><span class="sr-only"><?php echo $Gestiones->getProgresoInicialSolicitudCreditos(); ?>% Completado</span>
	                                                                    </div>
	                                                                </div>
	                                                            </td>
	                                                            <td><span class="badge badge-primary light"><?php echo $Gestiones->getProgresoInicialSolicitudCreditos(); ?>%</span>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                            <button type="submit" class="btn btn-primary btn-block">+ Cerrar Sesi&oacute;n Portal Clientes</button>
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

	</body>

	</html>