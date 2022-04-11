<?php
// IMPORTANDO MODELO DE CLIMA EN TIEMPO REAL -> API CLIMA OPENWEATHERMAP
require('../modelo/mAPIClima_Openweathermap.php');
// IMPORTANDO MODELO DE CONTEO NUMERO DE NOTIFICACIONES RECIBIDAS
require('../modelo/mConteoNotificacionesRecibidasUsuarios.php');
// IMPORTANDO MODELO DE CONTEO NUMERO DE MENSAJES RECIBIDOS
require('../modelo/mConteoMensajesBandejaEntrada_MensajeriaInterna.php');
// DATOS DE LOCALIZACION -> IDIOMA ESPAÑOL -> ZONA HORARIA EL SALVADOR (UTC-6)
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/El_Salvador');
// OBTENER HORA LOCAL
$hora = new DateTime("now");
// SI LOS USUARIOS INICIAN POR PRIMERA VEZ, MOSTRAR PAGINA DONDE DEBERAN REALIZAR EL CAMBIO OBLIGATORIO DE SU CONTRASEÑA GENERADA AUTOMATICAMENTE
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
	header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestiones-nuevos-usuarios-registrados');
	// CASO CONTRARIO, MOSTRAR PORTAL DE USUARIOS -> SEGUN ROL DE USUARIO ASIGNADO
} else {
	// AL FINALIZAR PROCESO DE SOLICITUD CREDITICIA, LOS PROCESOS CREDITICIOS DE NUEVOS CLIENTES NO TENDRAN ACCESO A ESTA SECCION
	if ($Gestiones->getComprobacion_ProcesoFinalizadoClientes() == "no") {
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
		<html lang="ES-SV">

		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<title>CashMan H.A. | Gestionador de Cuotas y Contratos Nuevos Clientes</title>
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
			<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
			<link href="<?php echo $UrlGlobal; ?>vista/css/style.css" rel="stylesheet">
			<!-- Daterange picker -->
			<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
			<!-- Clockpicker -->
			<link href="<?php echo $UrlGlobal; ?>vista/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
			<!-- asColorpicker -->
			<link href="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
			<!-- Material color picker -->
			<link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
			<!-- Pick date -->
			<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/themes/default.css">
			<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/themes/default.date.css">
			<!-- Bootstrap Dropzone CSS -->
			<link href="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
			<!-- Bootstrap Dropzone CSS -->
			<link href="<?php echo $UrlGlobal; ?>vista/dropify/dist/css/dropify.css" rel="stylesheet" type="text/css" />
			<link href="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
			<!-- Toastr -->
			<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/vendor/toastr/css/toastr.min.css">
			<style>
				table.dataTable thead {
					background-color: #a29bfe
				}
			</style>
		</head>

		<body>

			<!--*******************
        Preloader start
    ********************-->
			<div id="preloader">
				<div class="sk-three-bounce">
					<div class="sk-child sk-bounce1"></div>
					<div class="sk-child sk-bounce2"></div>
					<div class="sk-child sk-bounce3"></div>
				</div>
			</div>
			<!--*******************
        Preloader end
    ********************-->


			<!--**********************************
        Main wrapper start
    ***********************************-->
			<div id="main-wrapper">

				<!--**********************************
            Nav header start
        ***********************************-->
				<div class="nav-header">
					<a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=inicioadministradores" class="brand-logo">
						<img class="logo-abbr" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="">
						<img class="logo-compact" src="<?php echo $UrlGlobal; ?>vista/images/logo-text.png" alt="">
						<img class="brand-title" src="<?php echo $UrlGlobal; ?>vista/images/logo-text.png" alt="">
					</a>

					<div class="nav-control">
						<div class="hamburger">
							<span class="line"></span><span class="line"></span><span class="line"></span>
						</div>
					</div>
				</div>
				<!--**********************************
            Nav header end
        ***********************************-->

				<!--**********************************
            Header start
        ***********************************-->
				<div class="header">
					<div class="header-content">
						<nav class="navbar navbar-expand">
							<div class="collapse navbar-collapse justify-content-between">
								<div class="header-left">
									<div class="dashboard_bar">
										<h4 style="font-weight: 600;">Contratos y Cuotas Mensuales</h4>
									</div>
								</div>

								<ul class="navbar-nav header-right">
									<li class="nav-item dropdown notification_dropdown">
										<a class="nav-link  ai-icon" href="#" role="button" data-toggle="dropdown">
											<svg fill="#6418C3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
												<path fill="none" d="M0 0h24v24H0z" />
												<path d="M22 20H2v-2h1v-6.969C3 6.043 7.03 2 12 2s9 4.043 9 9.031V18h1v2zM5 18h14v-6.969C19 7.148 15.866 4 12 4s-7 3.148-7 7.031V18zm4.5 3h5a2.5 2.5 0 1 1-5 0z" />
											</svg>
											<span class="badge light text-white bg-primary"><?php echo NumeroNotificacionesRecibidasUsuarios($conectarsistema4, $_SESSION['id_usuario']); ?></span>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
												<ul class="timeline">
													<?php
													$ComprobarConsultaNotificaciones = 0;
													while ($filas = mysqli_fetch_array($consulta3)) {
														// SI EXISTEN REGISTROS, SI HAY CONSULTA QUE MOSTRAR
														if ($ComprobarConsultaNotificaciones == 0)
															$ComprobarConsultaNotificaciones = 1;
														echo '
													<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-';
														if ($filas['clasificacionnotificacion'] == "nuevomensaje") {
															echo 'info';
														}
														if ($filas['clasificacionnotificacion'] == "pagorecibido") {
															echo 'danger';
														}
														echo '">
														';
														if ($filas['clasificacionnotificacion'] == "nuevomensaje") {
															echo '<svg fill="blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4.929 19.071A9.969 9.969 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10H2l2.929-2.929zM8 13a4 4 0 1 0 8 0H8z"/></svg>';
														}
														if ($filas['clasificacionnotificacion'] == "pagorecibido") {
															echo '<svg fill="red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-3.5-8v2H11v2h2v-2h1a2.5 2.5 0 1 0 0-5h-4a.5.5 0 1 1 0-1h5.5V8H13V6h-2v2h-1a2.5 2.5 0 0 0 0 5h4a.5.5 0 1 1 0 1H8.5z"/></svg>';
														}
														echo '</div>
														<div class="media-body">
															<h5 style="font-size: .8rem" class="mb-1">';
														echo $filas['titulonotificacion'];
														echo ': ';
														echo $filas['descripcionnotificacion'];
														echo '</h5>
															<small class="d-block"><time class="timeago" datetime="';
														echo $filas['fechanotificacion'];
														echo '"></time></small>
														</div>
													</div>
												</li>
											';
													}
													// SI NO EXISTEN REGISTROS, NO HAY CONSULTA QUE MOSTRAR
													if ($ComprobarConsultaNotificaciones == 0) {
														echo '
												<div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
												<div class="card">
													<div class="card-body text-center ai-icon  text-primary">
														<img style="width: 80px" class="img-fluid" src="';
														echo $UrlGlobal;
														echo 'vista/images/coffee-cup.gif">
														<h4 class="my-2">No tienes ninguna notificaci&oacute;n</h4>
													</div>
												</div>
											</div>
												';
													}
													?>

												</ul>
											</div>
											<a class="all-notification" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=visualizar-mis-notificaciones-usuarios">Ver Mis Notificaciones <i class="ti-arrow-right"></i></a>
										</div>
									</li>
									<li class="nav-item dropdown notification_dropdown">
										<a class="nav-link bell bell-link" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=mensajeria-cashmanha-usuarios">
											<svg fill="#6418C3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
												<path fill="none" d="M0 0h24v24H0z" />
												<path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zm-.692-2H20V5H4v13.385L5.763 17zM11 10h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2z" />
											</svg>
											<span class="badge light text-white bg-primary"><?php echo NumeroMensajesRecibidosUsuarios($conectarsistema5, $_SESSION['id_usuario']); ?></span>
										</a>
									</li>
									<li class="nav-item dropdown notification_dropdown">
										<script type="text/javascript">
											function startTime() {
												Ahora = new Date();
												Hora = Ahora.getHours();
												Minutos = Ahora.getMinutes();
												Segundos = Ahora.getSeconds();
												Minutos = checkTime(Minutos);
												Segundos = checkTime(Segundos);
												document.getElementById("reloj").innerHTML = Hora + ":" + Minutos;
												t = setTimeout("startTime()", 500);
											}

											function checkTime(i) {
												if (i < 10) {
													i = "0" + i;
												}
												return i;
											}
											window.onload = function() {
												startTime();
											}
										</script>
										<div id="reloj"></div>
										<?php
										/*
										-> VALIDACION GENERICA SIN CONSULTA DE API CLIMATOLOGICA
											--> TOTALMENTE OPERATIVO <--
									*/
										// VALIDACION SEGUN HORA DETECTADA
										/*
										-> 04:00 HRS A 05:00 HRS -> A.M
									*/
										/*
									if($hora->format('G')>=4 && $hora->format('G')<5){
										echo '
										<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="'; echo $UrlGlobal; echo'vista/images/icon-weather/moonrise.svg" alt="icono-clima-noche"/></div>
										';
									/*
										-> 05:00 HRS A 07:00 HRS -> A.M
									*/
										/*
									}else if($hora->format('G')>=5 && $hora->format('G')<7){
										echo '
										<svg style="margin-left: .5rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.083 13a6 6 0 1 1 11.834 0h-2.043a4 4 0 1 0-7.748 0H6.083zM2 15h10v2H2v-2zm12 0h8v2h-8v-2zm2 4h4v2h-4v-2zM4 19h10v2H4v-2zm7-18h2v3h-2V1zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM19.07 3.515l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z" fill="rgba(230,126,34,1)"/></svg>
										';
									/*
										-> 07:00 HRS A 12:00 HRS -> A.M
									*/
										/*
									}else if($hora->format('G')>=7 && $hora->format('G')<12){
										echo '
										<svg style="margin-left: .5rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z" fill="rgba(241,196,14,1)"/></svg>
										';
									/*
										-> 12:00 HRS A 03:00 HRS -> P.M
									*/
										/*
									}else if($hora->format('G')>=12 && $hora->format('G')<16){
										echo '
										<svg style="margin-left: .5rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.984 5.06a6.5 6.5 0 1 1 11.286 6.436A5.5 5.5 0 0 1 17.5 21L9 20.999a8 8 0 1 1 .984-15.94zm2.071.544a8.026 8.026 0 0 1 4.403 4.495 5.529 5.529 0 0 1 3.12.307 4.5 4.5 0 0 0-7.522-4.802zM17.5 19a3.5 3.5 0 1 0-2.5-5.95V13a6 6 0 1 0-6 6h8.5z" fill="rgba(239,191,81,1)"/></svg>
										';
									/*
										-> 16:00 HRS A 06:00 HRS -> P.M
									*/
										/*
									}else if($hora->format('G')>=16 && $hora->format('G')<18){
										echo '
										<svg style="margin-left: .5rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M8 12h2v2H4v-2h2a6 6 0 1 1 6 6v-2a4 4 0 1 0-4-4zm-2 8h9v2H6v-2zm-4-4h8v2H2v-2zm9-15h2v3h-2V1zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3z" fill="rgba(230,126,34,1)"/></svg>
										';
									/*
										-> 06:00 HRS A 11:00 HRS -> P.M
									*/
										/*
									}else if($hora->format('G')>=18 && $hora->format('G')<=23){
										echo '
										<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="'; echo $UrlGlobal; echo'vista/images/icon-weather/clear-night.svg" alt="icono-clima-noche"/></div>
										';
									/*
										-> 00:00 HRS A 03:00 HRS -> A.M
									*/
										/*
									}else if($hora->format('G')>=0 && $hora->format('G')<=3){
										echo '
										<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="'; echo $UrlGlobal; echo'vista/images/icon-weather/haze-night.svg" alt="icono-clima-noche"/></div>
										';
									}
									*/
										// RANGO DE HORAS DESDE 06:00 HASTA 18:00 [A.M -> P.M -> [[DIA]]]
										if ($hora->format('G') >= 6 && $hora->format('G') < 18) {
											if (strtolower(ucwords($data->weather[0]->description)) == "broken clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/cloudy.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "clear sky") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/clear-day.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "few clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-day.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "scattered clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/haze-day.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-day-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with light rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-day-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-day-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with heavy rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-day-extreme.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-day.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-day-extreme.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "ragged thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-day.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with light drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with heavy drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light intensity drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light intensity drizzle rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/partly-cloudy-day-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "drizzle rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity drizzle rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower rain and drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy shower rain and drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "moderate rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "very heavy rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "extreme rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light intensity shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "ragged shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "overcast clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/partly-cloudy-day.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "mist") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/mist.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "smoke") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-day-smoke.svg" alt="icono-clima-dia"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "haze") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-day-haze.svg" alt="icono-clima-dia"/></div>';
											}
											// RANGO DE HORAS DESDE 18:00 HASTA 5:00 [P.M -> A.M -> [[NOCHE]]]
										} else if ($hora->format('G') >= 0 && $hora->format('G') <= 5 || $hora->format('G') >= 18 && $hora->format('G') <= 23) {
											if (strtolower(ucwords($data->weather[0]->description)) == "broken clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/cloudy.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "clear sky") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/clear-night.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "few clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-night.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "scattered clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/haze-night.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-night-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with light rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-night-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-night-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with heavy rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-night-extreme.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-night.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-night-extreme.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "ragged thunderstorm") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-night.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with light drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "thunderstorm with heavy drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/thunderstorms-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light intensity drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light intensity drizzle rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/partly-cloudy-night-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "drizzle rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity drizzle rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower rain and drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy shower rain and drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower drizzle") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "moderate rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "very heavy rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "extreme rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "light intensity shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/overcast-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "heavy intensity shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "ragged shower rain") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-rain.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "overcast clouds") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/partly-cloudy-night.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "mist") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/mist.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "smoke") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-night-smoke.svg" alt="icono-clima-noche"/></div>';
											} else if (strtolower(ucwords($data->weather[0]->description)) == "haze") {
												echo '<div style="margin-left: .5rem;width: 48px; height: 48px;" class="wi-icon"><img src="';
												echo $UrlGlobal;
												echo 'vista/images/icon-weather/extreme-night-haze.svg" alt="icono-clima-noche"/></div>';
											}
										}


										?>
										<span style="font-size: .6rem" class="badge light text-light bg-primary"><?php echo number_format($data->main->temp, 1) ?>&deg;C</span>
									</li>
									<li class="nav-item dropdown header-profile">
										<a class="nav-link" href="#" role="button" data-toggle="dropdown">
											<div class="header-info">
												<span class="text-black">Hola, <strong><?php $Nombre = $_SESSION['nombre_usuario'];
																						$PrimerNombre = explode(' ', $Nombre, 2);
																						print_r($PrimerNombre[0]); ?></strong></span>
												<p class="fs-12 mb-0">
													<!-- VALIDACION SEGUN ROLES DE USUARIOS -->
													<?php if ($_SESSION['id_rol'] == 1) {
														echo "Administradores";
													} else if ($_SESSION['id_rol'] == 2) {
														echo "Presidencia";
													} else if ($_SESSION['id_rol'] == 3) {
														echo "Gerencia";
													} else if ($_SESSION['id_rol'] == 4) {
														echo "Atenci&oacute;n al Cliente";
													} else if ($_SESSION['id_rol'] == 5) {
														echo "Clientes";
													} ?>
												</p>
											</div>
											<img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $_SESSION['foto_perfil']; ?>" width="20" alt="" />
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="<?php echo $UrlGlobal ?>controlador/cGestionesCashman.php?cashmanhagestion=perfiladministradores" class="dropdown-item ai-icon">
												<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
													<circle cx="12" cy="7" r="4"></circle>
												</svg>
												<span class="ml-2">Mi Perfil </span>
											</a>
											<a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=mensajeria-cashmanha-usuarios" class="dropdown-item ai-icon">
												<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
													<polyline points="22,6 12,13 2,6"></polyline>
												</svg>
												<span class="ml-2">Inbox </span>
											</a>
											<a href="<?php echo $UrlGlobal ?>controlador/cIniciosSesionesUsuarios.php?cashmanha=cerrarsesion" class="dropdown-item ai-icon">
												<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
													<polyline points="16 17 21 12 16 7"></polyline>
													<line x1="21" y1="12" x2="9" y2="12"></line>
												</svg>
												<span class="ml-2">Cerrar Sesi&oacute;n </span>
											</a>
										</div>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
				<!--**********************************
            Header end ti-comment-alt
        ***********************************-->
				<?php
				// IMPORTAR MENU DE NAVEGACION PARA USUARIOS ROL ADMINISTRADORES
				require('../vista/MenuNavegacion/menu-administradores.php');
				?>
				<!--**********************************
            Sidebar start
        ***********************************-->

				<!--**********************************
            Sidebar end
        ***********************************-->

				<!--**********************************
            Content body start
        ***********************************-->
				<div class="content-body">
					<div class="container-fluid">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Inicio</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Cr&eacute;ditos</a></li>
								<li class="breadcrumb-item"><a href="javascript:void(0)">Gestionar Cuotas y Contratos</a></li>

							</ol>
						</div>
						<!-- row -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="email-left-box generic-width px-0 mb-5">
											<div class="p-0">
												<a href="" class="btn btn-primary btn-block"><?php echo $Gestiones->getNombreProductos(); ?></a>
												<br>
											</div>
											<div class="text-center">
												<div class="profile-photo">
													<img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
												</div>
												<h6 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h6>
												<p style="font-size: .8rem;">Generar Contrato y Cuotas Mensuales</p>
											</div>
										</div>
										<div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
											<div class="row">
												<div class="col-12">
													<div class="right-box-padding">
														<div class="toolbar mb-4" role="toolbar">
															<div class="btn-group mb-1">
																<button type="button" class="btn btn-success light px-3"><i class="fa fa-money"></i> Est&aacute; solicitud de cr&eacute;dito ha sido aprobada en las &aacute;reas correspondientes </button>
															</div>
														</div>
														<div class="read-content">
															<div class="media pt-3">
																<img class="mr-2 rounded" width="50" alt="image" src="<?php echo $UrlGlobal; ?>vista/images/logo-negro.png">
																<div class="media-body mr-2">
																	<h5 class="text-primary mb-0 mt-1">Departamento Jur&iacute;dico - CashMan H.A S.A de C.V</h5>
																	<p class="mb-0">Entrega de Contrato Colectivo - <?php echo $Gestiones->getNombreProductos(); ?></p>
																</div>
															</div>
															<hr>
															<div class="media mb-2 mt-3">
																<div class="media-body"><span class="pull-right" id="HoraActual"></span>
																	<h5 class="my-1 text-primary">Resumen de Contrato Colectivo</h5>
																	<p class="read-content-email">
																		¿Problemas?: departamentojuridico@cashmanha.com</p>
																</div>
															</div>
															<div class="read-content-body">
																<h5 class="mb-4">Por favor dar lectura al resumen de contrato antes de iniciar nuevas acciones.</h5>
																<p class="mb-2">Estimado(a) cliente <strong><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?>,</strong> usted inici&oacute; una nueva solicitud de cr&eacute;dito con nuestra empresa el d&iacute;a <?php $Fecha = $Gestiones->getFechaIngresoSolicitudCreditos();
																																																																													$FechaCompleta = strtotime($Fecha);
																																																																													$ObtenerAnio = date("Y", $FechaCompleta);
																																																																													$ObtenerMes = date("m", $FechaCompleta);
																																																																													$ObtenerDia = date("d", $FechaCompleta);
																																																																													echo $ObtenerDia;
																																																																													echo " de ";
																																																																													// VALIDACIONES SEGUN MES OBTENIDO
																																																																													if ($ObtenerMes == 1) {
																																																																														echo "Enero";
																																																																													} else if ($ObtenerMes == 2) {
																																																																														echo "Febrero";
																																																																													} else if ($ObtenerMes == 3) {
																																																																														echo "Marzo";
																																																																													} else if ($ObtenerMes == 4) {
																																																																														echo "Abril";
																																																																													} else if ($ObtenerMes == 5) {
																																																																														echo "Mayo";
																																																																													} else if ($ObtenerMes == 6) {
																																																																														echo "Junio";
																																																																													} else if ($ObtenerMes == 7) {
																																																																														echo "Julio";
																																																																													} else if ($ObtenerMes == 8) {
																																																																														echo "Agosto";
																																																																													} else if ($ObtenerMes == 9) {
																																																																														echo "Septiembre";
																																																																													} else if ($ObtenerMes == 10) {
																																																																														echo "Octubre";
																																																																													} else if ($ObtenerMes == 11) {
																																																																														echo "Noviembre";
																																																																													} else if ($ObtenerMes == 12) {
																																																																														echo "Diciembre";
																																																																													}
																																																																													echo ' del ' . $ObtenerAnio; ?>. En el cual se le di&oacute; estudio y las respectivas &aacute;reas asignadas han emitido un dictamen favorable de <strong>aprobaci&oacute;n</strong> en su solicitud.</p>

																<p class="mb-2">Raz&oacute;n por la cual su cr&eacute;dito queda estructurado de la siguiente manera:</p>

																<p class="mb-2"><strong><?php echo $Gestiones->getNombreProductos(); ?></strong> financiamiento por un monto de <strong>$<?php echo number_format($Gestiones->getMontoFinanciamientoCreditos(), 2); ?> USD</strong> para un plazo de <strong><?php echo $Gestiones->getTiempoPlazoCreditos(); ?> <?php if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
																																																																																										echo 'a&ntilde;os';
																																																																																									} else {
																																																																																										echo 'meses';
																																																																																									} ?></strong> a una tasa de inter&eacute;s mensual del <strong><?php echo $Gestiones->getTasaInteresCreditos(); ?> %</strong>.</p>

																<p class="mb-2">Tomando en cuenta todo lo anterior, por pol&iacute;ticas de nuestra empresa el d&iacute;a asignado de su cuota mensual ser&aacute; el mismo en el cual usted inicio su tr&aacute;mite de cr&eacute;dito, el cual corresponde al <strong><?php echo $ObtenerDia; ?> de cada mes por los pr&oacute;ximos <?php echo $Gestiones->getTiempoPlazoCreditos(); ?> <?php if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
																																																																																																												echo 'a&ntilde;os';
																																																																																																											} else {
																																																																																																												echo 'meses';
																																																																																																											} ?> o cuando usted decida concluir con su responsabilidad hacia nuestra empresa. <span style="color: #f00;"> Iniciando su responsabilidad de pago el pr&oacute;ximo mes.</span></strong></p>

																<p class="mb-2">Respecto a los fines de semana, el tratamiento de esos d&iacute;as es con los s&aacute;bados se le sumar&aacute;n dos d&iacute;as posterior a su fecha de pago, de igual forma con los domingos pero con la diferencia que le ser&aacute; sumado un d&iacute;a &uacute;nicamente.</p>

																<h5 class="pt-3">Lorem Ipsum Dolor</h5>
																<p>Presidente CashMan H.A S.A de C.V</p>
																<hr>
															</div>
															<div class="read-content-attachment">
																<h6><i class="fa fa-folder-open mb-2"></i> Primer Paso
																	<span></span>
																</h6>
																<div class="row attachment">
																	<div class="col-auto">
																		<p>* Imprimir estado de cuenta pagar&eacute; cuotas mensualues y registrar cuotas mensuales asignadas en el sistema de pagos <strong>(<?php
																																																				if ($Gestiones->getNombreProductos() == "Préstamos Hipotecarios") {
																																																					echo $Gestiones->getTiempoPlazoCreditos() * 12;
																																																				} else {
																																																					echo $Gestiones->getTiempoPlazoCreditos();
																																																				} ?> meses)</strong></p>
																		<a target="_blank" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=impresion-estado-cuenta-cuotas-nuevos-creditos&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn btn-outline-info"><i class="fa fa-hourglass-start"></i> Generar Estado de Cuenta</a><br>

																	</div>
																</div>
															</div>
															<?php
															if ($Gestiones->getNombreProductos() == "Préstamos de Vehículos") {
															?>
																<hr>
																<div class="read-content-attachment">
																	<h6><i class="fa fa-folder-open mb-2"></i> Segundo Paso
																		<span></span>
																	</h6>
																	<div class="row attachment">
																		<div class="col-auto">
																			<?php
																			if (empty($Gestiones->getNumeroPlaca())) {
																			?>
																				<p>* Por favor solicite los formularios al cliente, e ingrese la informaci&oacute;n solicitada en los siguientes campos:</p>
																				<form id="registro-datos-vehiculos-contratos" class="validacion-registro-datos-vehiculos-contrato" method="post" autocomplete="off" enctype="multipart/form-data">
																					<div class="row form-validation">
																						<div class="col-lg-6 mb-2">
																							<input type="hidden" name="idusuariocredito" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
																							<input type="hidden" name="idcredito" value="<?php echo $Gestiones->getIdCreditos(); ?>">
																							<input type="hidden" name="idproductocredito" value="<?php echo $Gestiones->getIdProductos(); ?>">
																							<div class="form-group">
																								<label class="text-label">Placa <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-numeroplacavehiculo" name="val-numeroplacavehiculo" placeholder="Ingrese el n&uacute;mero de placa...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">Clase <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-tipoclasevehiculo" name="val-tipoclasevehiculo" placeholder="Ingrese la clase del veh&iacute;culo...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">A&ntilde;o <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-aniovehiculo" name="val-aniovehiculo" placeholder="Ingrese el a&ntilde;o del veh&iacute;culo...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">Capacidad <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-capacidadvehiculo" name="val-capacidadvehiculo" placeholder="Ingrese la capacidad del veh&iacute;culo...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">Asientos <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-asientosvehiculo" name="val-asientosvehiculo" placeholder="Ingrese el n&uacute;mero de asientos...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">Marca <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-marcavehiculo" name="val-marcavehiculo" placeholder="Ingrese la marca del veh&iacute;culo...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">Modelo <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-modelovehiculo" name="val-modelovehiculo" placeholder="Ingrese el modelo del veh&iacute;culo...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">N&uacute;mero de Motor <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-numeromotorvehiculo" name="val-numeromotorvehiculo" placeholder="Ingrese el n&uacute;mero del motor...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">N&uacute;mero de Chasis Grabado <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-numerochasisvehiculo" name="val-numerochasisvehiculo" placeholder="Ingrese el n&uacute;mero de chasis grabado...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-6 mb-2">
																							<div class="form-group">
																								<label class="text-label">N&uacute;mero de Chasis VIN <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-numerochasisvinvehiculo" name="val-numerochasisvinvehiculo" placeholder="Ingrese el Chasis VIN...">
																								</div>
																							</div>
																						</div>
																						<div class="col-lg-12 mb-2">
																							<div class="form-group">
																								<label class="text-label">Color <span class="text-danger">*</span></label>
																								<div class="col-lg-12">
																									<input type="text" class="form-control" id="val-colorvehiculo" name="val-colorvehiculo" placeholder="Ingrese el color del veh&iacute;culo...">
																								</div>
																							</div>
																						</div>
																					</div>
																					<!-- ENVIO DATOS -->
																					<button type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="ti-car"></i></span>Registrar Especificaciones de Veh&iacute;culos</button>
																				</form>
																			<?php } else { ?>
																				<div class="alert alert-success solid alert-dismissible fade show">
																					<strong>Perfecto!</strong> Los respectivos datos solicitados del veh&iacute;culo han sido registrados con &eacute;xito. Ahora puedes generar el contrato al cliente final.
																				</div>
																			<?php } ?>

																		</div>
																	</div>
																</div>
																<hr>
																<hr>
																<div class="read-content-attachment">
																	<h6><i class="fa fa-folder-open mb-2"></i> Tercer Paso
																		<span></span>
																	</h6>
																	<div class="row attachment">
																		<div class="col-auto">
																			<p>* Imprimir contrato final de solicitud crediticia aprobada del cliente. <strong>El cual deber&aacute; firmar el cliente y entregar una copia del mismo.<span style="color: #f00;"> Todos los clientes tendr&aacute;n disponible la copia del mismo en su portal.</span></strong></p>
																			<a target="_blank" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=impresion-contrato-final-clientes&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn btn-outline-info"><i class="fa fa-gavel"></i> Generar Contrato de Solicitud Crediticia</a><br>

																		</div>
																	</div>
																</div>
																<hr>
																<div class="read-content-attachment">
																	<h6><i class="fa fa-folder-open mb-2"></i> Cuarto Paso
																		<span></span>
																	</h6>
																	<div class="row attachment">
																		<div class="col-auto">
																			<p>* Subir copia de contrato final clientes, aseg&uacute;rese de elegir el archivo correcto</p>
																			<div class="alert alert-warning solid alert-dismissible fade show">
																				<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
																					<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
																					<line x1="12" y1="9" x2="12" y2="13"></line>
																					<line x1="12" y1="17" x2="12.01" y2="17"></line>
																				</svg>
																				<strong>¡Advertencia!</strong> ¿Est&aacute; seguro de registrar este documento? <strong>Es una acci&oacute;n sin retorno ya que todo el proceso de asignaci&oacute;n de nuevos cr&eacute;ditos finalizar&iacute;a autom&aacute;ticamente.</strong> Por favor verifique que todo ha sido completado con &eacute;xito antes de realizar esta acci&oacute;n.
																			</div>
																			<form id="registro-contrato-copia-clientes" class="validacion-registro-datos-vehiculos-contrato" method="post" autocomplete="off" enctype="multipart/form-data">
																				<div class="row form-validation">
																					<div class="col-lg-12 mb-2">
																						<div class="form-group">
																							<label class="text-label">Adjuntar Documento <span class="text-danger">*</span></label>
																							<div class="col-lg-12">
																								<input name="idcreditocontrato" type="hidden" value="<?php echo $Gestiones->getIdCreditos(); ?>">
																								<input type="file" <?php if (empty($Gestiones->getNumeroPlaca())) {
																														echo "disabled style='cursor: no-drop;''";
																													} ?> name="val-copiacontratousuarios" id="val-copiacontratousuarios" class="dropify" accept=".pdf" data-allowed-file-extensions="pdf" />
																							</div>
																						</div>
																					</div>
																					<p>* Le recordamos si ha omitido un paso anterior y usted hace clic en el bot&oacute;n. NO podr&aacute; revertir esta acci&oacute;n, ya que el proceso finaliza autom&aacute;ticamente.</p>
																					<!-- ENVIO DATOS -->
																					<button <?php if (empty($Gestiones->getNumeroPlaca())) {
																								echo "disabled style='cursor: no-drop;''";
																							} ?> type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-file-pdf-o"></i></span>Registrar Contrato Final Clientes</button>
																			</form>

																		</div>
																	</div>
																</div>
																<hr>
															<?php } else { ?>
																<hr>
																<div class="read-content-attachment">
																	<h6><i class="fa fa-folder-open mb-2"></i> Segundo Paso
																		<span></span>
																	</h6>
																	<div class="row attachment">
																		<div class="col-auto">
																			<p>* Imprimir contrato final de solicitud crediticia aprobada del cliente. <strong>El cual deber&aacute; firmar el cliente y entregar una copia del mismo.<span style="color: #f00;"> Todos los clientes tendr&aacute;n disponible la copia del mismo en su portal.</span></strong></p>
																			<a target="_blank" href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=impresion-contrato-final-clientes&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn btn-outline-info"><i class="fa fa-gavel"></i> Generar Contrato de Solicitud Crediticia</a><br>

																		</div>
																	</div>
																</div>
																<hr>
																<div class="read-content-attachment">
																	<h6><i class="fa fa-folder-open mb-2"></i> Tercer Paso
																		<span></span>
																	</h6>
																	<div class="row attachment">
																		<div class="col-auto">
																			<p>* Subir copia de contrato final clientes, aseg&uacute;rese de elegir el archivo correcto</p>
																			<div class="alert alert-warning solid alert-dismissible fade show">
																				<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
																					<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
																					<line x1="12" y1="9" x2="12" y2="13"></line>
																					<line x1="12" y1="17" x2="12.01" y2="17"></line>
																				</svg>
																				<strong>¡Advertencia!</strong> ¿Est&aacute; seguro de registrar este documento? <strong>Es una acci&oacute;n sin retorno ya que todo el proceso de asignaci&oacute;n de nuevos cr&eacute;ditos finalizar&iacute;a autom&aacute;ticamente.</strong> Por favor verifique que todo ha sido completado con &eacute;xito antes de realizar esta acci&oacute;n.
																			</div>
																			<form id="registro-contrato-copia-clientes" class="validacion-registro-datos-vehiculos-contrato" method="post" autocomplete="off" enctype="multipart/form-data">
																				<div class="row form-validation">
																					<div class="col-lg-12 mb-2">
																						<div class="form-group">
																							<label class="text-label">Adjuntar Documento <span class="text-danger">*</span></label>
																							<div class="col-lg-12">
																								<input name="idcreditocontrato" type="hidden" value="<?php echo $Gestiones->getIdCreditos(); ?>">
																								<input type="file" name="val-copiacontratousuarios" id="val-copiacontratousuarios" class="dropify" accept=".pdf" data-allowed-file-extensions="pdf" />
																							</div>
																						</div>
																					</div>
																					<p>* Le recordamos si ha omitido un paso anterior y usted hace clic en el bot&oacute;n. NO podr&aacute; revertir esta acci&oacute;n, ya que el proceso finaliza autom&aacute;ticamente.</p>
																					<!-- ENVIO DATOS -->
																					<button type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-file-pdf-o"></i></span>Registrar Contrato Final Clientes</button>
																			</form>

																		</div>
																	</div>
																</div>
																<hr>
															<?php } ?>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--**********************************
            Content body end
        ***********************************-->


					<!--**********************************
            Footer start
        ***********************************-->
					<div class="footer">
						<div class="copyright">
							<p>Copyright &copy; <?php echo date('Y'); ?> CashMan H.A &amp; Desarrollo de Sistemas CashMan H.A</p>
						</div>
					</div>
					<!--**********************************
            Footer end
        ***********************************-->

					<!--**********************************
           Support ticket button start
        ***********************************-->

					<!--**********************************
           Support ticket button end
        ***********************************-->


				</div>
				<!--**********************************
        Main wrapper end
    ***********************************-->

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
				<!-- Daterangepicker -->
				<!-- momment js is must -->
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/moment/moment.min.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
				<!-- clockpicker -->
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
				<!-- asColorPicker -->
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asColor/jquery-asColor.min.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
				<!-- Material color picker -->
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
				<!-- Datatable -->
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/datatables/js/jquery.dataTables.min.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/datatables.init.js"></script>
				<!-- Toastr -->
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/toastr/js/toastr.min.js"></script>
				<!-- All init script -->
				<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/toastr-init.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/js/alerta-registro-datos-vehiculos-contratos.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/js/alerta-ingreso-copias-contratos-clientes.js"></script>
				<!-- Mask -->
				<script src="<?php echo $UrlGlobal; ?>vista/js/mask.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/js/mascara-datos-vehiculos-contratos-clientes.js"></script>
				<!-- Dropzone JavaScript -->
				<script src="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.js"></script>
				<!-- Dropify JavaScript -->
				<script src="<?php echo $UrlGlobal; ?>vista/dropify/dist/js/dropify.min.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/js/dropzone-configuration.js"></script>
				<!-- Time ago -->
				<script src="<?php echo $UrlGlobal; ?>vista/js/jquery.timeago.js"></script>
				<script src="<?php echo $UrlGlobal; ?>vista/js/control_tiempo.js"></script>
				<script>
					showTime();

					function showTime() {
						FechaActual = new Date();
						Hora = FechaActual.getHours() % 12 || 12;
						Minuto = FechaActual.getMinutes();
						Segundo = FechaActual.getSeconds();
						if (Hora < 10) Hora = 0 + Hora;
						if (Hora < 10) Hora = "0" + Hora;
						if (Minuto < 10) Minuto = "0" + Minuto;
						if (Segundo < 10) Segundo = "0" + Segundo;
						$("#HoraActual").text(Hora + ":" + Minuto + ":" + Segundo);
						setTimeout("showTime()", 1000);
					}
				</script>







		</body>

		</html>
<?php } else {
		header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
	}
}  ?>