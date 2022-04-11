<?php
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
		<title>CashMan H.A. | Asignaci&oacute;n Nuevos Cr&eacute;ditos</title>
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
				<a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=iniciogerencia" class="brand-logo">
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
            Chat box start
        ***********************************-->
			<div class="chatbox">
				<div class="chatbox-close"></div>
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="chat" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
								<div class="card-header chat-list-header text-center">
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Chat List</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
									<ul class="contacts">
										<li class="name-first-letter">A</li>
										<li class="active dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Archie Parker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Alfie Mason</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">B</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Bashid Samim</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Breddie Ronan</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Ceorge Carson</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">D</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Darry Parker</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Denry Hunter</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">J</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Jack Ronan</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Jacob Tucker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>James Logan</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Joshua Weston</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">O</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oliver Acker</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oscar Weston</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card chat dz-chat-history-box d-none">
								<div class="card-header chat-list-header text-center">
									<a href="#" class="dz-chat-history-back">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" />
												<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
											</g>
										</svg>
									</a>
									<div>
										<h6 class="mb-1">Chat with Khelesh</h6>
										<p class="mb-0 text-success">Online</p>
									</div>
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<circle fill="#000000" cx="5" cy="12" r="2" />
													<circle fill="#000000" cx="12" cy="12" r="2" />
													<circle fill="#000000" cx="19" cy="12" r="2" />
												</g>
											</svg></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
											<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
											<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
											<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
										</ul>
									</div>
								</div>
								<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
								</div>
								<div class="card-footer type_msg">
									<div class="input-group">
										<textarea class="form-control" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="alerts" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card">
								<div class="card-header chat-list-header text-center">
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Notications</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
									<ul class="contacts">
										<li class="name-first-letter">SEVER STATUS</li>
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">KK</div>
												<div class="user_info">
													<span>David Nester Birthday</span>
													<p class="text-primary">Today</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SOCIAL</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
												<div class="user_info">
													<span>Perfection Simplified</span>
													<p>Jame Smith commented on your status</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SEVER STATUS</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="tab-pane fade" id="notes">
							<div class="card mb-sm-3 mb-md-0 note_card">
								<div class="card-header chat-list-header text-center">
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Notes</h6>
										<p class="mb-0">Add New Nots</p>
									</div>
									<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
									<ul class="contacts">
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>New order placed..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Youtube, a video-sharing website..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>john just buy your product..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--**********************************
            Chat box End
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
									Asignar Nuevos Cr&eacute;ditos
								</div>
							</div>

							<ul class="navbar-nav header-right">
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link  ai-icon" href="#" role="button" data-toggle="dropdown">
										<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z" fill="#6418C3" />
										</svg>
										<span class="badge light text-white bg-primary">12</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
											<ul class="timeline">
												<li>
													<div class="timeline-panel">
														<div class="media mr-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-info">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-success">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-danger">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-primary">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
											</ul>
										</div>
										<a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
									</div>
								</li>
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link bell bell-link" href="#">
										<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M20.4604 0.848877H3.31682C2.64742 0.849612 2.00565 1.11586 1.53231 1.58919C1.05897 2.06253 0.792727 2.7043 0.791992 3.3737V15.1562C0.792727 15.8256 1.05897 16.4674 1.53231 16.9407C2.00565 17.4141 2.64742 17.6803 3.31682 17.6811C3.53999 17.6812 3.75398 17.7699 3.91178 17.9277C4.06958 18.0855 4.15829 18.2995 4.15843 18.5227V20.3168C4.15843 20.6215 4.24112 20.9204 4.39768 21.1818C4.55423 21.4431 4.77879 21.6571 5.04741 21.8009C5.31602 21.9446 5.61861 22.0128 5.92292 21.9981C6.22723 21.9834 6.52183 21.8863 6.77533 21.7173L12.6173 17.8224C12.7554 17.7299 12.9179 17.6807 13.0841 17.6811H17.187C17.7383 17.68 18.2742 17.4994 18.7136 17.1664C19.1531 16.8335 19.472 16.3664 19.6222 15.8359L22.8965 4.05011C22.9998 3.67481 23.0152 3.28074 22.9413 2.89856C22.8674 2.51637 22.7064 2.15639 22.4707 1.84663C22.2349 1.53687 21.9309 1.28568 21.5822 1.11263C21.2336 0.939571 20.8497 0.849312 20.4604 0.848877ZM21.2732 3.60304L18.0005 15.3847C17.9499 15.5614 17.8432 15.7168 17.6964 15.8275C17.5496 15.9381 17.3708 15.9979 17.187 15.9978H13.0841C12.5855 15.9972 12.098 16.1448 11.6836 16.4219L5.84165 20.3168V18.5227C5.84091 17.8533 5.57467 17.2115 5.10133 16.7382C4.62799 16.2648 3.98622 15.9986 3.31682 15.9978C3.09365 15.9977 2.87966 15.909 2.72186 15.7512C2.56406 15.5934 2.47534 15.3794 2.47521 15.1562V3.3737C2.47534 3.15054 2.56406 2.93655 2.72186 2.77874C2.87966 2.62094 3.09365 2.53223 3.31682 2.5321H20.4604C20.5905 2.53243 20.7187 2.56277 20.8352 2.62076C20.9516 2.67875 21.0531 2.76283 21.1318 2.86646C21.2104 2.97008 21.2641 3.09045 21.2886 3.21821C21.3132 3.34597 21.3079 3.47766 21.2732 3.60304Z" fill="#6418C3" />
											<path d="M5.84161 8.42333H10.0497C10.2729 8.42333 10.4869 8.33466 10.6448 8.17683C10.8026 8.019 10.8913 7.80493 10.8913 7.58172C10.8913 7.35851 10.8026 7.14445 10.6448 6.98661C10.4869 6.82878 10.2729 6.74011 10.0497 6.74011H5.84161C5.6184 6.74011 5.40433 6.82878 5.2465 6.98661C5.08867 7.14445 5 7.35851 5 7.58172C5 7.80493 5.08867 8.019 5.2465 8.17683C5.40433 8.33466 5.6184 8.42333 5.84161 8.42333Z" fill="#6418C3" />
											<path d="M13.4161 10.1066H5.84161C5.6184 10.1066 5.40433 10.1952 5.2465 10.3531C5.08867 10.5109 5 10.725 5 10.9482C5 11.1714 5.08867 11.3855 5.2465 11.5433C5.40433 11.7011 5.6184 11.7898 5.84161 11.7898H13.4161C13.6393 11.7898 13.8534 11.7011 14.0112 11.5433C14.169 11.3855 14.2577 11.1714 14.2577 10.9482C14.2577 10.725 14.169 10.5109 14.0112 10.3531C13.8534 10.1952 13.6393 10.1066 13.4161 10.1066Z" fill="#6418C3" />
										</svg>
										<span class="badge light text-white bg-primary">5</span>
									</a>
								</li>
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link" href="#" data-toggle="dropdown">
										<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M22.625 5.12506H21.75V1.62506C21.75 1.47268 21.7102 1.32295 21.6345 1.19068C21.5589 1.05841 21.45 0.948189 21.3186 0.870929C21.1873 0.79367 21.0381 0.75205 20.8857 0.750187C20.7333 0.748325 20.5831 0.786285 20.4499 0.860311L13 4.99915L5.55007 0.860311C5.41688 0.786285 5.26667 0.748325 5.11431 0.750187C4.96194 0.75205 4.8127 0.79367 4.68136 0.870929C4.55002 0.948189 4.44113 1.05841 4.36547 1.19068C4.28981 1.32295 4.25001 1.47268 4.25 1.62506V5.12506H3.375C2.67904 5.12582 2.01181 5.40263 1.51969 5.89475C1.02757 6.38687 0.750764 7.0541 0.75 7.75006V10.3751C0.750764 11.071 1.02757 11.7383 1.51969 12.2304C2.01181 12.7225 2.67904 12.9993 3.375 13.0001H4.25V22.6251C4.25076 23.321 4.52757 23.9882 5.01969 24.4804C5.51181 24.9725 6.17904 25.2493 6.875 25.2501H19.125C19.821 25.2493 20.4882 24.9725 20.9803 24.4804C21.4724 23.9882 21.7492 23.321 21.75 22.6251V13.0001H22.625C23.321 12.9993 23.9882 12.7225 24.4803 12.2304C24.9724 11.7383 25.2492 11.071 25.25 10.3751V7.75006C25.2492 7.0541 24.9724 6.38687 24.4803 5.89475C23.9882 5.40263 23.321 5.12582 22.625 5.12506ZM20 5.12506H16.3769L20 3.11256V5.12506ZM6 3.11256L9.62311 5.12506H6V3.11256ZM6 22.6251V13.0001H12.125V23.5001H6.875C6.64303 23.4998 6.42064 23.4075 6.25661 23.2434C6.09258 23.0794 6.0003 22.857 6 22.6251ZM20 22.6251C19.9997 22.857 19.9074 23.0794 19.7434 23.2434C19.5794 23.4075 19.357 23.4998 19.125 23.5001H13.875V13.0001H20V22.6251ZM23.5 10.3751C23.4997 10.607 23.4074 10.8294 23.2434 10.9934C23.0794 11.1575 22.857 11.2498 22.625 11.2501H3.375C3.14303 11.2498 2.92064 11.1575 2.75661 10.9934C2.59258 10.8294 2.5003 10.607 2.5 10.3751V7.75006C2.5003 7.51809 2.59258 7.2957 2.75661 7.13167C2.92064 6.96764 3.14303 6.87536 3.375 6.87506H22.625C22.857 6.87536 23.0794 6.96764 23.2434 7.13167C23.4074 7.2957 23.4997 7.51809 23.5 7.75006V10.3751Z" fill="#3E4954" />
										</svg>
										<span class="badge light text-white bg-primary">2</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 ps ps--active-y p-3 height370">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="#">
														<span>10 minutes ago</span>
														<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>15 minutes ago</span>
														<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge warning">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge dark">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="nav-item dropdown header-profile">
									<a class="nav-link" href="#" role="button" data-toggle="dropdown">
										<div class="header-info">
											<span class="text-black">Hola, <strong><?php $Nombre = $_SESSION['nombre_usuario'];
																					$PrimerNombre = explode(' ', $Nombre, 2);
																					print_r($PrimerNombre[0]); ?></strong></span>
											<p class="fs-12 mb-0">Super Admin</p>
										</div>
										<img src="<?php echo $UrlGlobal; ?>vista/images/fotoperfil/<?php echo $_SESSION['foto_perfil']; ?>" width="20" alt="" />
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="./app-profile.html" class="dropdown-item ai-icon">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
											<span class="ml-2">Profile </span>
										</a>
										<a href="./email-inbox.html" class="dropdown-item ai-icon">
											<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
												<polyline points="22,6 12,13 2,6"></polyline>
											</svg>
											<span class="ml-2">Inbox </span>
										</a>
										<a href="./page-login.html" class="dropdown-item ai-icon">
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
												<polyline points="16 17 21 12 16 7"></polyline>
												<line x1="21" y1="12" x2="9" y2="12"></line>
											</svg>
											<span class="ml-2">Logout </span>
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
			<div class="deznav">
				<div class="deznav-scroll">
					<ul class="metismenu" id="menu">
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
								</svg>
								<span class="nav-text">Inicio</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="index.html">Mi Perfil</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
								</svg>
								<span class="nav-text">Usuarios</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="#">Registrar Usuarios</a></li>
								<li><a href="#">Consultar Usuarios</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
								</svg>
								<span class="nav-text">Roles</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="#">Registrar Roles</a></li>
								<li><a href="#">Consultar Roles</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
								</svg>
								<span class="nav-text">Productos</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="#">Registrar Productos</a></li>
								<li><a href="#">Consultar Productos</a></li>
							</ul>
						</li>
						<li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
								<svg class="w-6 h-6" fill="none" stroke="LightSlateGrey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
								</svg>
								<span class="nav-text">Cr&eacute;ditos</span>
							</a>
							<ul aria-expanded="false">
								<li><a class="active-element-menu" href="#">Asignar Nuevos Cr&eacute;ditos</a></li>
								<li><a href="#">Consultar Cr&eacute;ditos</a></li>
							</ul>
						</li>
					</ul>

					<div class="add-menu-sidebar">
						<p>Generate Monthly Credit Report</p>
						<a href="javascript:void(0);">
							<svg width="24" height="12" viewBox="0 0 24 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.725 5.14889C23.7248 5.14861 23.7245 5.14828 23.7242 5.148L18.8256 0.272997C18.4586 -0.0922062 17.865 -0.0908471 17.4997 0.276184C17.1345 0.643169 17.1359 1.23675 17.5028 1.602L20.7918 4.875H0.9375C0.419719 4.875 0 5.29472 0 5.8125C0 6.33028 0.419719 6.75 0.9375 6.75H20.7917L17.5029 10.023C17.1359 10.3882 17.1345 10.9818 17.4998 11.3488C17.865 11.7159 18.4587 11.7172 18.8256 11.352L23.7242 6.477C23.7245 6.47672 23.7248 6.47639 23.7251 6.47611C24.0923 6.10964 24.0911 5.51414 23.725 5.14889Z" fill="white" />
							</svg>
						</a>
					</div>
					<div class="copyright">
						<p><strong>&copy; Copyright <?php echo date('Y'); ?> CashMan H.A Todos Los Derechos Reservados</strong></p>
						<p>Made with <i class="fa fa-heart"></i> by DexignZone</p>
					</div>
				</div>
			</div>
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
							<li class="breadcrumb-item"><a href="javascript:void(0)">Cr&eacute;ditos</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Asignar Nuevos Cr&eacute;ditos</a></li>
						</ol>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div id="accordion-six" class="accordion accordion-with-icon accordion-danger-solid">
								<div class="accordion__item">
									<div class="accordion__header collapsed" data-toggle="collapse" data-target="#with-icon_collapseOne">
										<span class="accordion__header--icon"></span>
										<span class="accordion__header--text">Tomar Nota:</span>
										<span class="accordion__header--indicator indicator_bordered"></span>
									</div>
									<div id="with-icon_collapseOne" class="accordion__body collapse" data-parent="#accordion-six">
										<div class="accordion__body--text">
											<i class="ti-direction"></i> Usted podr&aacute; iniciar un nuevo tr&aacute;mite de cr&eacute;ditos a nuestros clientes ya sean nuevos o antiguos. Por favor tome en cuenta que una vez iniciado un tr&aacute;mite; queda sujeto a aprobaci&oacute;n del &aacute;rea asignada. <strong>Para filtrar resultados, en el buscador; por favor ingrese el n&uacute;mero de documento &uacute;nico de identidad (DUI) o n&uacute;mero de identificaci&oacute;n tributaria (NIT) del cliente a procesar.</strong>
										</div>
									</div>
								</div>
								<div class="card-body">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#home8">
												<span>
													<i class="ti ti-shortcode"></i>
												</span>
											</a>
										</li>
									</ul>
									<!-- Tab panes -->
									<div class="tab-content tabcontent-border">
										<div class="tab-pane fade show active" id="home8" role="tabpanel">
											<div class="pt-4">
												<h4>Asignar Nuevos Cr&eacute;ditos Clientes CashMan H.A</h4><br>
												<p>Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
																$PrimerNombre = explode(' ', $Nombre, 2);
																print_r($PrimerNombre[0]); ?>, en este apartado encontrar&aacute;s el listado completo de todos los usuarios registrados que poseen perfil completo y est&aacute;n aptos para iniciar tr&aacute;mites de nuevos cr&eacute;ditos.<strong> Este listado es general, sin aplicar filtros; ni tomando en cuenta record crediticio. Para mayor informaci&oacute;n consultar &aacute;reas espec&iacute;ficas.</strong></p>
												<div class="table-responsive">
													<table style="width: 100%;" id="example5" class="display min-w850">
														<thead>
															<tr>
																<th></th>
																<th>Nombres</th>
																<th>Apellidos</th>
																<th>Correo</th>
																<th>DUI</th>
																<th>NIT</th>
																<th></th>
															</tr>
														</thead>
														<tbody>
															<?php
															while ($filas = mysqli_fetch_array($consulta)) {
																echo ' 
													<tr>
													<td><img class="rounded-circle" width="35" src="';
																echo $UrlGlobal;
																echo 'vista/images/fotoperfil/';
																echo $filas['fotoperfil'];
																echo '" alt=""></td>
													<td>';
																echo $filas['nombres'];
																echo '</td>
													<td>';
																echo $filas['apellidos'];
																echo '</td>
													<td>';
																echo $filas['correo'];
																echo '</td>
													<td><a href="javascript:void()" class="badge badge-circle badge-outline-info">';
																echo $filas['dui'];
																echo '</a></td>
													<td><a href="javascript:void()" class="badge badge-circle badge-outline-info">';
																echo $filas['nit'];
																echo '</a></td>
                                                    <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a target="_blank" class="dropdown-item" href="';
																echo $UrlGlobal;
																echo 'controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-clientes-informacion&idusuario=';
																echo $filas['idusuarios'];
																echo '"><i class="ti ti-wallet"></i> Asignar Nuevo Cr&eacute;dito</a>
														</div>
													</div>
												</td>									
												</tr>
													';
															}
															?>
														</tbody>
													</table>
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
				<p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
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
	</body>

	</html>
<?php } ?>