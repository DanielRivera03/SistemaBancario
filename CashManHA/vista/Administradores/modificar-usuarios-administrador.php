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
// NO PERMITIR INGRESO SI PARAMETRO DE USUARIO SE ENCUENTRA VACIO
if (empty($_GET['idusuario'])) {
	header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
// NO PERMITIR INGRESO SI NO EXISTE INFORMACION QUE MOSTRAR
if (empty($Gestiones->getIdUsuarios())) {
	header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
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
	<html lang="ES-SV">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>CashMan H.A. | Modificar Usuarios</title>
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
		<link rel="stylesheet" href="<?php echo $UrlGlobal; ?>vista/dist/mc-calendar.min.css" />
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
									<h4 style="font-weight: 600;">Modificar Usuarios</h4>
								</div>
							</div>

							<ul class="navbar-nav header-right">
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link  ai-icon" href="#" role="button" data-toggle="dropdown">
										<svg fill="#6418C3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
											<path fill="none" d="M0 0h24v24H0z" />
											<path d="M22 20H2v-2h1v-6.969C3 6.043 7.03 2 12 2s9 4.043 9 9.031V18h1v2zM5 18h14v-6.969C19 7.148 15.866 4 12 4s-7 3.148-7 7.031V18zm4.5 3h5a2.5 2.5 0 1 1-5 0z" />
										</svg>
										<span class="badge light text-white bg-primary"><?php echo NumeroNotificacionesRecibidasUsuarios($conectarsistema2, $_SESSION['id_usuario']); ?></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
											<ul class="timeline">
												<?php
												$ComprobarConsultaNotificaciones = 0;
												while ($filas = mysqli_fetch_array($consulta1)) {
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
										<span class="badge light text-white bg-primary"><?php echo NumeroMensajesRecibidosUsuarios($conectarsistema3, $_SESSION['id_usuario']); ?></span>
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

			<!--**********************************
            Sidebar start
        ***********************************-->
			<?php
			// IMPORTAR MENU DE NAVEGACION PARA USUARIOS ROL ADMINISTRADORES
			require('../vista/MenuNavegacion/menu-administradores.php');
			?>
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
							<li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Modificar Usuarios</a></li>
						</ol>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div id="accordion-six" class="accordion accordion-with-icon accordion-danger-solid">
								<div class="accordion__item">
									<div class="accordion__header collapsed" data-toggle="collapse" data-target="#with-icon_collapseOne">
										<span class="accordion__header--icon"></span>
										<span class="accordion__header--text">Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
																							$PrimerNombre = explode(' ', $Nombre, 2);
																							print_r($PrimerNombre[0]); ?> tome nota:</span>
										<span class="accordion__header--indicator indicator_bordered"></span>
									</div>
									<div id="with-icon_collapseOne" class="accordion__body collapse" data-parent="#accordion-six">
										<div class="accordion__body--text">
											<i class="ti-direction"></i> Usted en estos momentos se encuentra en el registro del usuario <strong> <?php echo $Gestiones->getCodigoUsuarios(); ?> </strong>. En este apartado podr&aacute; modificar la configuraci&oacute;n de la cuenta de este usuario, as&iacute; como los detalles del mismo. <strong>Le recordamos que por motivos de seguridad no es posible cambiar la contrase&ntilde;a de los usuarios.</strong>
										</div>
									</div>
								</div>
								<div class="card-body">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#home8">
												<span>
													<i class="ti-user"></i>
												</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#profile8">
												<span>
													<i class="ti-id-badge"></i>
												</span>
											</a>
										</li>
									</ul>
									<!-- Tab panes -->
									<div class="tab-content tabcontent-border">
										<div class="tab-pane fade show active" id="home8" role="tabpanel">
											<div class="pt-4">
												<h4>Modificar Configuraci&oacute;n Cuenta Usuarios</h4><br>
												<form id="modificar-usuarios-administradores" class="validacion-modificar-usuarios" method="post" autocomplete="off" enctype="multipart/form-data">
													<div class="row form-validation">
														<div class="col-lg-6 mb-2">
															<div class="form-group">
																<input type="hidden" name="val-idunico-modificar" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
																<label class="text-label">Nombres <span class="text-danger">*</span></label>
																<input type="hidden" id="claves-generadas" value="">
																<div class="col-lg-12">
																	<input type="text" class="form-control" id="val-nombreusuario" name="val-nombreusuario" placeholder="Ingrese sus nombres completos" value="<?php echo $Gestiones->getNombresUsuarios(); ?>">
																</div>
															</div>
														</div>
														<div class="col-lg-6 mb-2">
															<div class="form-group">
																<label class="text-label">Apellidos <span class="text-danger">*</span></label>
																<div class="col-lg-12">
																	<input type="text" class="form-control" id="val-apellidousuario" name="val-apellidousuario" placeholder="Ingrese sus apellidos completos" value="<?php echo $Gestiones->getApellidosUsuarios(); ?>">
																</div>
															</div>
														</div>
														<div class="col-lg-6 mb-2">
															<div class="form-group">
																<label class="text-label">Usuario &Uacute;nico <span class="text-danger">*</span></label>
																<div class="col-lg-12">
																	<input type="text" class="form-control" id="val-usuariounico" name="val-usuariounico" placeholder="Ingrese su usuario &uacute;nico" onBlur="comprobarUsuario()" value="<?php echo $Gestiones->getCodigoUsuarios(); ?>">
																	<div class="col-md-12">
																		<span id="estadousuario"></span>
																	</div>
																	<p><img style="width: 25px; margin: 1rem 0 0 0; display:none;" src="../vista/images/Spinner.svg" id="loaderIcon" /></p>
																</div>
															</div>
														</div>
														<div class="col-lg-6 mb-2">
															<div class="form-group">
																<label class="text-label">Correo Electr&oacute;nico <span class="text-danger">*</span></label>
																<div class="col-lg-12">
																	<input type="email" class="form-control" id="val-correo" name="val-correo" placeholder="Ingrese su correo electr&oacute;nico v&aacute;lido" onBlur="comprobarCorreoPerfilUsuario()" value="<?php echo $Gestiones->getCorreoUsuarios(); ?>">
																	<div class="col-md-12">
																		<span id="estadocorreo"></span>
																	</div>
																	<p><img style="width: 25px; margin: 1rem 0 0 0; display:none;" src="../vista/images/Spinner.svg" id="loaderIcon1" /></p>
																</div>
															</div>
														</div>
														<div class="col-lg-6 mb-2">
															<div class="form-group">
																<label class="text-label">Rol de Usuario <span class="text-danger">*</span></label>
																<div class="col-lg-12">
																	<select class="form-control" id="val-rol-usuarios" name="val-rol-usuarios">
																		value="<?php if ($Gestiones->getIdRolUsuarios() == 1) {
																					echo '
                                                                        <option value="1">Administrador de Sistemas</option>
                                                                        <option value="2">Presidencia CashMan H.A</option>
																		<option value="3">Gerencia CashMan H.A</option>
																		<option value="4">Atenci&oacute;n al Cliente CashMan H.A</option>
																		<option value="5">Clientes CashMan H.A</option>
                                                                        ';
																				} else if ($Gestiones->getIdRolUsuarios() == 2) {
																					echo '
                                                                        <option value="2">Presidencia CashMan H.A</option>
                                                                        <option value="1">Administrador de Sistemas</option>
																		<option value="3">Atenci&oacute;n Al Cliente CashMan H.A</option>
																		<option value="4">Clientes CashMan H.A</option>
                                                                        ';
																				} else if ($Gestiones->getIdRolUsuarios() == 3) {
																					echo '
                                                                        <option value="3">Atenci&oacute;n Al Cliente CashMan H.A</option>
                                                                        <option value="1">Administrador de Sistemas</option>
																		<option value="2">Presidencia CashMan H.A</option>
																		<option value="4">Clientes CashMan H.A</option>
                                                                        ';
																				} else if ($Gestiones->getIdRolUsuarios() == 4) {
																					echo '
                                                                        <option value="4">Clientes CashMan H.A</option>
                                                                        <option value="1">Administrador de Sistemas</option>
																		<option value="2">Presidencia CashMan H.A</option>
																		<option value="3">Atenci&oacute;n Al Cliente CashMan H.A</option>
                                                                        ';
																				}
																				?>"
																	</select>
																</div>
															</div>
														</div>
														<div class="col-lg-6 mb-2">
															<div class="form-group">
																<label class="text-label">Estado de Usuario <span class="text-danger">*</span></label>
																<div class="col-lg-12">
																	<select class="form-control" id="val-estado-usuarios" name="val-estado-usuarios">
																		value="<?php if ($Gestiones->getEstadoUsuarios() == "activo") {
																					echo '
                                                                        <option value="activo">Usuario Activo</option>
                                                                        <option value="inactivo">Usuario Inactivo</option>
																		<option value="bloqueado">Usuario Bloqueado</option>
                                                                        ';
																				} else if ($Gestiones->getEstadoUsuarios() == "inactivo") {
																					echo '
                                                                        <option value="inactivo">Usuario Inactivo</option>
																		<option value="bloqueado">Usuario Bloqueado</option>
																		<option value="activo">Usuario Activo</option>
                                                                        ';
																				} else if ($Gestiones->getEstadoUsuarios() == "bloqueado") {
																					echo '
																		<option value="bloqueado">Usuario Bloqueado</option>
																		<option value="activo">Usuario Activo</option>
																		<option value="inactivo">Usuario Inactivo</option>
                                                                        ';
																				}
																				?>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<!-- ENVIO DATOS -->
													<button type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="ti-user"></i></span>Modificar Configuraci&oacute;n Cuenta Usuario</button>
												</form>
											</div>
										</div>
										<div class="tab-pane fade" id="profile8" role="tabpanel">
											<div class="pt-4">
												<div class="alert alert-info alert-dismissible fade show">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
														<circle cx="12" cy="12" r="10"></circle>
														<line x1="12" y1="16" x2="12" y2="12"></line>
														<line x1="12" y1="8" x2="12.01" y2="8"></line>
													</svg>
													<strong>¡Importante!</strong> Es obligatorio adjuntar nuevamente los archivos multimedia solicitados. S&iacute; este procedimiento se realiza sin la presencia del usuario en cuesti&oacute;n. <strong>Por favor consulte los detalles de este usuario y descargue los respectivos archivos para adjuntarlos nuevamente.</strong>
													<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
													</button>
												</div>
												<h4>Modificar Detalles de Usuarios Cuenta</h4><br>
												<div class="col-lg-12 mb-2">
													<form id="modificar-detalles-clientes-usuarios" class="validacion-registro-detalles-usuarios" method="post" autocomplete="off" enctype="multipart/form-data">
														<div class="row form-validation">
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<input type="hidden" name="val-idunico-modificar" value="<?php echo $Gestiones->getIdUsuarios(); ?>">
																	<label class="text-label">Dui <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-dui" name="val-dui" placeholder="XXXXXXXX-X" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getDuiUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Nit <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-nit" name="val-nit" placeholder="XXXX-XXXXXX-XXX-X" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getNitUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Tel&eacute;fono </label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-telefono1" name="val-telefono1" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getTelefonoUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Celular</label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-telefono2" name="val-telefono2" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getCelularUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-12 mb-2">
																<div class="form-group">
																	<label class="text-label">Direcci&oacute;n Residencia Completa <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<textarea class="form-control" placeholder="Ingrese su direcci&oacute;n de residencia completa" id="val-direccion1" name="val-direccion1" rows="3"><?php echo $Gestiones->getDireccionUsuarios(); ?></textarea>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Nombre empresa donde labora <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-nombreempresa" name="val-nombreempresa" placeholder="Ingrese nombre de empresa d&oacute;nde labora" value="<?php echo $Gestiones->getEmpresaUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Cargo que desempe&ntilde;a <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-cargoempresa" name="val-cargoempresa" placeholder="Ingrese el cargo que desempe&ntilde;a" value="<?php echo $Gestiones->getCargoEmpresaUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-12 mb-2">
																<div class="form-group">
																	<label class="text-label">Direcci&oacute;n donde trabaja completa <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<textarea class="form-control" placeholder="Ingrese direcci&oacute;n completa d&oacute;nde labora" id="val-direccion2" name="val-direccion2" rows="3"><?php echo $Gestiones->getDireccionTrabajoUsuarios(); ?></textarea>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Tel&eacute;fono empresa donde labora </label>
																	<div class="col-lg-12">
																		<input type="text" class="form-control" id="val-telefono3" name="val-telefono3" placeholder="XXXX-XXXX" onkeypress="return (event.charCode <= 57)" value="<?php echo $Gestiones->getTelefonoTrabajoUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<input type="text" class=" form-control" id="val-fechanacimiento" name="val-fechanacimiento" placeholder="Ingrese su fecha de nacimiento" value="<?php echo $Gestiones->getFechaNacimientoUsuarios(); ?>">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">G&eacute;nero <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<select class="form-control" id="val-genero" name="val-genero">
																			<?php if ($Gestiones->getGeneroUsuarios() == "m") {
																				echo '<option value="m">Masculino</option>';
																				echo '<option value="f">Femenino</option>';
																			} else if ($Gestiones->getGeneroUsuarios() == "f") {
																				echo '<option value="f">Femenino</option>';
																				echo '<option value="m">Masculino</option>';
																			}
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 mb-2">
																<div class="form-group">
																	<label class="text-label">Estado Civil <span class="text-danger">*</span></label>
																	<div class="col-lg-12">
																		<select class="form-control" id="val-estadocivil" name="val-estadocivil">
																			<?php
																			if ($Gestiones->getGeneroUsuarios() == "m") {
																				if ($Gestiones->getEstadoCivilUsuarios() == "Soltero") {
																					echo '
																					<option value="Soltero">Soltero</option>
																					<option value="Casado">Casado</option>
																					<option value="Divorciado">Divorciado</option>
																					<option value="Comprometido">Comprometido</option>
																					<option value="Viudo">Viudo</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Casado") {
																					echo '
																					<option value="Casado">Casado</option>
																					<option value="Divorciado">Divorciado</option>
																					<option value="Comprometido">Comprometido</option>
																					<option value="Viudo">Viudo</option>
																					<option value="Soltero">Soltero</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Divorciado") {
																					echo '
																					<option value="Divorciado">Divorciado</option>
																					<option value="Comprometido">Comprometido</option>
																					<option value="Viudo">Viudo</option>
																					<option value="Soltero">Soltero</option>
																					<option value="Casado">Casado</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Comprometido") {
																					echo '
																					<option value="Comprometido">Comprometido</option>
																					<option value="Viudo">Viudo</option>
																					<option value="Soltero">Soltero</option>
																					<option value="Casado">Casado</option>
																					<option value="Divorciado">Divorciado</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Viudo") {
																					echo '
																					<option value="Viudo">Viudo</option>
																					<option value="Soltero">Soltero</option>
																					<option value="Casado">Casado</option>
																					<option value="Divorciado">Divorciado</option>
																					<option value="Comprometido">Comprometido</option>
																					';
																				}
																			} else if ($Gestiones->getGeneroUsuarios() == "f") {
																				if ($Gestiones->getEstadoCivilUsuarios() == "Soltera") {
																					echo '
																					<option value="Soltera">Soltera</option>
																					<option value="Casada">Casada</option>
																					<option value="Divorciada">Divorciada</option>
																					<option value="Comprometida">Comprometida</option>
																					<option value="Viuda">Viuda</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Casada") {
																					echo '
																					<option value="Casada">Casada</option>
																					<option value="Divorciada">Divorciada</option>
																					<option value="Comprometida">Comprometida</option>
																					<option value="Viuda">Viuda</option>
																					<option value="Soltera">Soltera</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Divorciada") {
																					echo '
																					<option value="Divorciada">Divorciada</option>
																					<option value="Comprometida">Comprometida</option>
																					<option value="Viuda">Viuda</option>
																					<option value="Soltera">Soltera</option>
																					<option value="Casada">Casada</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Comprometida") {
																					echo '
																					<option value="Comprometida">Comprometida</option>
																					<option value="Viuda">Viuda</option>
																					<option value="Soltera">Soltera</option>
																					<option value="Casada">Casada</option>
																					<option value="Divorciada">Divorciada</option>
																					';
																				} else if ($Gestiones->getEstadoCivilUsuarios() == "Viuda") {
																					echo '
																					<option value="Viuda">Viuda</option>
																					<option value="Soltera">Soltera</option>
																					<option value="Casada">Casada</option>
																					<option value="Divorciada">Divorciada</option>
																					<option value="Comprometida">Comprometida</option>
																					';
																				}
																			}
																			?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-12 mb-2">
															<div class="form-group">
																<label class="text-label">Documento &uacute;nico de identidad <strong>(DUI <i class="ti-hand-point-right"></i> Frontal)<span class="text-danger"> *</span></strong></label>
																<div class="col-lg-12">
																	<input type="file" name="fotoduiusuariosfrontal" id="fotoduiusuariosfrontal" class="dropify" data-max-file-size="3M" accept="image/x-png,image/jpeg,image/jpg,image/gif" data-allowed-file-extensions='["png", "jpeg","jpg","gif"]' data-default-file='<?php echo $UrlGlobal;
																																																																															echo 'vista/images/fotoduifrontal/';
																																																																															echo $Gestiones->getFotoDuiFrontalUsuarios(); ?>' required />
																</div>
															</div>
														</div>
														<div class="col-lg-12 mb-2">
															<div class="form-group">
																<label class="text-label">Documento &uacute;nico de identidad <strong>(DUI <i class="ti-hand-point-right"></i> Reverso)<span class="text-danger"> *</span></strong></label>
																<div class="col-lg-12">
																	<input type="file" name="fotoduiusuariosreverso" id="fotoduiusuariosreverso" class="dropify" data-max-file-size="3M" accept="image/x-png,image/jpeg,image/jpg,image/gif" data-allowed-file-extensions='["png", "jpeg","jpg","gif"]' data-default-file='<?php echo $UrlGlobal;
																																																																															echo 'vista/images/fotoduireverso/';
																																																																															echo $Gestiones->getFotoDuiReversoUsuarios(); ?>' required />
																</div>
															</div>
														</div>
														<div class="col-lg-12 mb-2">
															<div class="form-group">
																<label class="text-label">Documento n&uacute;mero de identificaci&oacute;n tributaria (NIT)<span class="text-danger"> *</span></label>
																<div class="col-lg-12">
																	<input type="file" name="fotonitusuarios" id="fotonitusuarios" class="dropify" data-max-file-size="3M" accept="image/x-png,image/jpeg,image/jpg,image/gif" data-allowed-file-extensions='["png", "jpeg","jpg","gif"]' data-default-file='<?php echo $UrlGlobal;
																																																																												echo 'vista/images/fotonit/';
																																																																												echo $Gestiones->getFotoNitUsuarios(); ?>' required />
																</div>
															</div>
														</div>
														<div class="col-lg-12 mb-2">
															<div class="form-group">
																<label class="text-label">Firma de Cliente<span class="text-danger"> *</span></label>
																<div class="col-lg-12">
																	<input type="file" name="fotofirmausuarios" id="fotofirmausuarios" class="dropify" data-max-file-size="3M" accept="image/x-png,image/jpeg,image/jpg,image/gif" data-allowed-file-extensions='["png", "jpeg","jpg","gif"]' data-default-file='<?php echo $UrlGlobal;
																																																																													echo 'vista/images/fotofirmas/';
																																																																													echo $Gestiones->getFotoFirmaUsuarios(); ?>' required />
																</div>
															</div>
														</div>
														<!-- ENVIO DATOS -->
														<button type="submit" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="ti-user"></i></span>Modificar Detalle de Usuario</button>
													</form>
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
		<!-- pickdate -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/picker.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/picker.time.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/pickadate/picker.date.js"></script>



		<!-- Daterangepicker -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/bs-daterange-picker-init.js"></script>
		<!-- Clockpicker init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/clock-picker-init.js"></script>
		<!-- asColorPicker init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery-asColorPicker.init.js"></script>
		<!-- Material color picker init -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/material-date-picker-init.js"></script>
		<!-- Pickdate -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/pickadate-init.js"></script>
		<!-- Mask -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/mask.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/mascaras-datos.js"></script>
		<!-- Dropzone JavaScript -->
		<script src="<?php echo $UrlGlobal; ?>vista/dropzone/dist/dropzone.js"></script>
		<!-- Dropify JavaScript -->
		<script src="<?php echo $UrlGlobal; ?>vista/dropify/dist/js/dropify.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/dropzone-configuration.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/alerta-modificar-usuarios-administrador.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/alerta-modificar-detalles-usuarios-clientes.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/comprobarUsuarioUnico.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/comprobarCorreoPerfilUsuarios.js"></script>
		<!-- Datatable -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/datatables.init.js"></script>
		<!-- Time ago -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/jquery.timeago.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/js/control_tiempo.js"></script>
		<!-- Toastr -->
		<script src="<?php echo $UrlGlobal; ?>vista/vendor/toastr/js/toastr.min.js"></script>
		<!-- All init script -->
		<script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/toastr-init.js"></script>
		<script src="<?php echo $UrlGlobal; ?>vista/dist/mc-calendar.min.js"></script>
		<script>
			const firstCalendar = MCDatepicker.create({
				el: '#val-fechanacimiento',
				customMonths: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				customWeekDays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
				dateFormat: 'YYYY-MM-DD',
				customOkBTN: 'OK',
				customClearBTN: 'Limpiar',
				customCancelBTN: 'Cancelar',
				minDate: new Date(1940, 01, 01),
				maxDate: new Date(2003, 11, 31),
			})
		</script>

	</body>

	</html>

<?php } ?>