<?php
/*
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡
░░                         CASHMAN H.A S.A DE C.V                                                  
░░                       SISTEMA FINANCIERO / BANCARIO 
░░≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡                       
░░                                                                               
░░   -> AUTOR: DANIEL RIVERA                                                               
░░   -> PHP 8.1, MYSQL, MVC, JAVASCRIPT, AJAX                       
░░   -> GITHUB: (danielrivera03)                                             
░░       https://github.com/DanielRivera03                              
░░   -> TODOS LOS DERECHOS RESERVADOS                           
░░       © 2021 - 2022    
░░                                                      
░░   -> POR FAVOR TOMAR EN CUENTA TODOS LOS COMENTARIOS
░░      Y REALIZAR LOS AJUSTES PERTINENTES ANTES DE INICIAR
░░
░░              ♥♥ HECHO CON MUCHAS TAZAS DE CAFE ♥♥
░░                                                                               
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░

*/
// INICIALIZANDO SESION
session_start();
// CLASES Y ARCHIVOS NECESARIOS PARA EJECUCION DE PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
// IMPORTANDO ARCHIVO DE CONEXION
require('../modelo/conexion.php');
// IMPORTANDO MODELO RECUPERACION DE CUENTAS CASHMAN H.A.
require('../modelo/mRecuperacionCuentas.php');
// INICIALIZANDO VARIABLE GLOBAL DE CLASE
$Usuarios = new RecuperacionCuentas();
/*
        ASIGNAR URL POR DEFECTO -> VARIABLE GLOBAL
        IMPORTANTE ---> :90 ES EL PREFIJO DE ESTE SERVIDOR UTILIZADO
        POR LO CUAL SE TIENE QUE REALIZAR EL CAMBIO PARA QUE TODAS
        LAS PAGINAS SE PUEDAN VISUALIZAR EN CASO SEA DISTINTO.
            Ej: http://localhost[:90 -> cambiar]/CashManHA/xxxx
        CashManHA -> NOMBRE DE LA CARPETA O DIRECTORIO DONDE SE
        ENCUENTRA ALOJADO TODO ESTE SISTEMA [NO TOCAR]
    */
$UrlGlobal = "http://" . $_SERVER['SERVER_NAME'] . ":90" . "/CashManHA" . '/';
// ASIGNANDO PARAMETRO DE URL -> METODO GET (cashmanha --> por defecto [nombre de la compañia])
if (isset($_GET['cashmanha'])) {
    $peticion_url = $_GET['cashmanha'];  // ENVIO GET DE VALOR ACCION {URL}
}
// ASIGNA VALOR POR DEFECTO...
else {
    $peticion_url = "iniciarsesion";  // CASO CONTRARIO, VALOR POR DEFECTO
}
switch ($peticion_url) {
        // INICIO DEL SISTEMA {INDEX} -> LOGIN DE INICIO DE SESION {TODOS LOS USUARIOS}
    case "iniciarsesion":
        require('../vista/iniciarsesion.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        /*
        // VALIDAR SESIONES DE USUARIOS Y REDIRIGIR SEGUN SU ROL ASIGNADO
            -> 1 = ADMINISTRADOR
            -> 2 = PRESIDENCIA
            -> 3 = GERENCIA
            -> 4 = ATENCION AL CLIENTE
            -> 5 = CLIENTES
        */
    case "validar-sesiones":
        $cifrado = sha1($_POST['val-password']); // RECIBIR CLAVE INGRESADA Y CIFRARLA
        $Contrasenia = crypt($conectarsistema->real_escape_string($_POST['val-password']), $cifrado); // COMPARAR CLAVE INGRESADA
        if (empty($cifrado)) {
            // NO PROCESAR ACCION VACIA -> SOLAMENTE CON DATOS INGRESADOS
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        } else {
            // VALIDACION DE INICIO DE SESION SOLICITADO
            $usuario = $conectando->IniciarSesionUsuarios($conectarsistema, $conectarsistema->real_escape_string($_POST['val-username']), $Contrasenia);
            // RECORRIDO EN BUSCA DE COINCIDENCIAS EN BASE A LA PETICION SOLICITADA
            $IniciarSesionUsuarios = mysqli_fetch_array($usuario);
            // SI EXISTEN REGISTROS, ENTONCES CLASIFICA SEGUN ROL ASIGNADO
            if ($IniciarSesionUsuarios) {
                // VALIDACION -> RECORDAR MI USUARIO
                if (isset($_POST['recordar'])) {
                    // SI CHECKBOX SE MANTIENE EN ESTADO 1 "UNO", ENTONCES GUARDA COOKIE POR 30 DIAS
                    // time()+60*60*24*30 -> ES EQUIVALENTE A 30 DIAS
                    // " / " -> EXPLICITAMENTE NUESTRA COOKIE ESTARA DISPONIBLE EN TODO EL SISTEMA
                    setcookie("val-username", $_POST['val-username'], time() + 60 * 60 * 24 * 30, "/");
                }
                // GUARDADO DE DATOS DE USUARIOS -> SESIONES 
                $_SESSION['id_usuario'] = $IniciarSesionUsuarios['idusuarios']; // ID UNICO DE USUARIO
                $_SESSION['nombre_usuario'] = $IniciarSesionUsuarios['nombres']; // NOMBRES DE USUARIO
                $_SESSION['apellido_usuario'] = $IniciarSesionUsuarios['apellidos']; // APELLIDOS DE USUARIO
                $_SESSION['usuario_unico'] = $IniciarSesionUsuarios['codigousuario']; // USUARIO UNICO
                $_SESSION['id_rol'] = $IniciarSesionUsuarios['idrol']; // ROL DE USUARIO
                $_SESSION['correo_usuario'] = $IniciarSesionUsuarios['correo']; // CORREO DE USUARIO
                $_SESSION['foto_perfil'] = $IniciarSesionUsuarios['fotoperfil']; // FOTO DE PERFIL DE USUARIO
                $_SESSION['estado_usuario'] = $IniciarSesionUsuarios['estado_usuario']; // ESTADO CUENTA USUARIO
                /*
                    -> SI EL CREDITO NO HA SIDO APROBADO, LOS NUEVOS USUARIOS / CLIENTES NO PODRAN ACCEDER A TODAS LAS FUNCIONES DEL SISTEMA. MISMO CASO APLICA PARA LOS CREDITOS RECHAZADOS.
                */
                $_SESSION['comprobar_iniciosesion_primeravez'] = $IniciarSesionUsuarios['nuevousuario']; // COMPROBACION SI LOS USUARIOS INICIAN SESION POR PRIMERA VEZ
                $_SESSION['habilitar_sistema'] = $IniciarSesionUsuarios['habilitarsistema']; // COMPROBACION SI CREDITO SOLICITADO HA SIDO APROBADO O NO
                $_SESSION['comprobacioncuenta_ahorros'] = $IniciarSesionUsuarios['poseecuenta']; // COMPROBACION SI POSEE CUENTA DE AHORROS
                $_SESSION['comprobacioncreditos_clientes'] = $IniciarSesionUsuarios['poseecredito']; // COMPROBACION SI POSEE UN CREDITO ASOCIADO
                /*
                        IMPORTANTE: PARA EFECTUAR DOS CONSULTAS A LA VEZ, SE HACE USO DE LA
                        SIGUIENTE CONEXION AUXILIAR << CONECTARSISTEMA1 >>

                        << CASO CONTRARIO NO REALIZA INSERCCION DE DATOS SOLICITADOS >>
                    */
                $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
                $Dispositivo = php_uname('n'); // NOMBRE DEL DISPOSITIVO
                $SistemaOperativo =  php_uname('s'); // NOMBRE SISTEMA OPERATIVO
                // REGISTRO DE TODOS LOS ACCESOS DE USUARIOS -> DATOS DE INICIO DE SESIONES
                $consulta = $Usuarios->RegistrarAccesosUsuarios($conectarsistema1, $Dispositivo, $SistemaOperativo, $IdUsuarios);
                /*
                    -> ROLES DE USUARIOS VALIDADOS [CASHMAN H.A] -> ID -> VALOR ENTERO
                    -- SE PUEDEN INCLUIR MAS ROLES DE USUARIOS SEGUN NECESIDADES SIN NINGUN INCONVENIENTE --
                */
                // USUARIOS ADMINISTRADORES
                if ($IniciarSesionUsuarios['idrol'] == 1) {
                    header('location:cGestionesCashman.php?cashmanhagestion=inicioadministradores');
                    // USUARIOS PRESIDENCIA
                } else if ($IniciarSesionUsuarios['idrol'] == 2) {
                    header('location:cGestionesCashman.php?cashmanhagestion=iniciopresidencia');
                    // USUARIOS GERENCIA
                } else if ($IniciarSesionUsuarios['idrol'] == 3) {
                    header('location:cGestionesCashman.php?cashmanhagestion=iniciogerencia');
                    // USUARIOS ATENCION AL CLIENTE CASHMAN H.A
                } else if ($IniciarSesionUsuarios['idrol'] == 4) {
                    header('location:cGestionesCashman.php?cashmanhagestion=inicioatencionclientes');
                    // USUARIOS CLIENTES CASHMAN H.A
                } else if ($IniciarSesionUsuarios['idrol'] == 5) {
                    header('location:cGestionesCashman.php?cashmanhagestion=inicioclientes');
                }
                // SI COMPROBACION DE USUARIO / CONTRASEÑA NO EXISTE, ENTONCES REDIRIGE A PAGINA DE ERROR
            } else {
                header('location:cIniciosSesionesUsuarios.php?cashmanha=credenciales-incorrectas');
            }
        }
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA DE ERROR -> CUANDO USUARIO Y/O CONTRASEÑA SON INVALIDOS
    case "credenciales-incorrectas":
        require('../vista/erroriniciosesion.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // RECUPERAR CONTRASEÑA -> SECCION ¿OLVIDE MI CONTRASEÑA? [INICIO DE SESION]
    case "reestablecer-contrasena":
        require('../vista/recuperar-contrasenia.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        /*
        ----------------------------------------------------------------------------------------------------
            -> IMPORTANTE: SMTP UTILIZADO PARA EFECTO DE PRUEBAS LOCALES:

                PAPERCUT
                    GITHUB: https://github.com/ChangemakerStudios/Papercut-SMTP

                TOMAR EN CUENTA QUE PARA CONFIGURACIONES DE CORREOS REALES EN SERVIDORES REALES
                SE DEBEN ESTABLECER MAS PARAMETROS PARA SU ENVIO. DE ESTE MODO MUY DIFICILMENTE 
                FUNCIONE POR FALTA DE LO ANTERIORMENTE CITADO. SOLAMENTE SE HA ESTABLECIDO ASI 
                PARA EFECTOS DE PRUEBAS LOCALES QUE NO INVOLUCREN SERVICIOS REALES.

                PARA MAYOR INFORMACION, CONSULTE LA DOCUMENTACION OFICIAL DE PHPMAILER
                    PHPMAILER
                        GITHUB: https://github.com/PHPMailer/PHPMailer
        ----------------------------------------------------------------------------------------------------
        */
        // RECUPERACION DE CUENTAS DE USUARIOS QUE SOLICITAN DICHA PETICION
    case "recuperar-cuentas":
        $Destinatario = $_POST['val-email']; // CORREO ELECTRONICO REGISTRADO DE USUARIOS
        $CodigoRecuperacion = rand(10000, 99999); // CODIGO AUTOMATICO DE RECUPERACION [5 DIGITOS]
        $Nombre = "CashMan H.A. - Soporte Sistemas"; // NOMBRE POR DEFECTO EMPRESA
        $Remitente = "sistemas@cashmanha.com"; // CORREO DE RECUPERACION DE CUENTAS -> EMPRESA
        $Asunto = "Reestablecer contraseña - Dpto Sistemas CashMan H.A."; // ASUNTO POR DEFECTO DE CORREO
        $Bytes = random_bytes(5); // GENERAR CODIGO DE 5 DIGITOS - LETRAS
        $Token = bin2hex($Bytes); // ENVIAR TOKEN A INSERCCION
        // INICIALIZANDO CLASE DE ENVIO DE CORRREOS -> USUARIOS QUE RECUPERAN SU CUENTA
        $mail = new PHPMailer(true);
        try {
            // AJUSTE DE SERVIDOR
            $mail->CharSet = 'UTF-8'; // CODIFICACION DE CONTENIDO
            $mail->SMTPDebug = 0;  // VISUALIZACION DE ERRORES -> [DEBUG = 0 -> NO VISUALIZAR] 
            $mail->isSMTP(); // PROTOCOLO SMTP
            $mail->Host = ''; // HOST DE SERVICIO ENVIO CORREOS
            $mail->SMTPAuth = true;
            $mail->Port = 2525; // PUERTO
            $mail->Username = ''; // NOMBRE DE USUARIO
            $mail->Password = ''; // CLAVE DE ACCESO
            // DESTINATARIOS Y REMITENTES
            $mail->setFrom($Remitente, $Nombre);
            $mail->addAddress($Destinatario);
            // CONTENIDO -> CUERPO DEL MENSAJE
            $mail->isHTML(true); // CONTENIDO HTML HABILITADO
            $mail->Subject = $Asunto; // ASUNTO DE CORREO
            // TODO MENSAJE -> CUERPO CORREOS
            /*
                    -> IMPORTANTE, POR FAVOR CAMBIE LAS URL´s SI ES DIFERENTE A LA DE SU SERVIDOR
                    RECUERDE QUE POR DEFECTO ESTE PROYECTO HA SIDO DESARROLLADO CON EL PREFIJO
                    LOCAL << :90 >>
                */
            $mail->Body = "
            <!DOCTYPE html>
            <html lang='ES-SV' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
            <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='x-apple-disable-message-reformatting'>
            <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>
            </head>
            <style>
            @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {u ~ div .email-container{min-width: 320px !important;}}
            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {u ~ div .email-container{min-width: 375px !important;}}
            @media only screen and (min-device-width: 414px){u ~ div .email-container {min-width: 414px !important;}}
            </style>
            <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
            <center style='width: 100%; background-color: #f1f1f1;'>
            <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
            <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important; border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
            <tr>
            <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em; background: #ffffff;'>
          	<table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr>
            <td class='logo' style='text-align: center;'>
            <h1><a href='#'><img style='width: 70px;' src='http://localhost:90/CashManHA/vista/images/logo.png'></a></h1>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td valign='middle' class='hero bg_white' style='padding: 3em 0 2em 0; background: #ffffff;'>
            <img src='http://localhost:90/CashManHA/vista/images/submit-progress.gif' style='width: 300px; max-width: 200px; height: auto; margin: auto; display: block;'>
            </td>
            </tr>
            <tr>
            <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0; background: #ffffff;'>
            <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;'>
            <tr>
            <td>
            <div class='text' style='padding: 0 2.5em; text-align: center;'>
            <h2 style='font-family: Tahoma, sans-serif;color: #000000;'>Recuperaci&oacute;n Cuentas</h2><br>
            <h4 style='font-family: Tahoma, sans-serif;color: #000000;'>Favor ingrese el siguiente código para continuar con el proceso de cambio de contraseña.</h4><br>
            <span style='padding: .8rem; font-size: 18px; font-family: Tahoma, sans-serif; color: #666666; line-height: 150%; border: 3px dashed #b2bec3; letter-spacing: 1rem;'>$CodigoRecuperacion</span>
            <h4 style='margin: 2.5rem 0 0 0; font-family: Tahoma, sans-serif;color: #000000;'>Nota: Si usted no ha iniciado el proceso de reestablecer contraseña, favor no hacer caso al correo.</h4>
            <p><a style='background: #6c5ce7; padding: 10px 15px;display: inline-block; text-decoration: none; color: #fff; font-family: Tahoma, sans-serif;' href='http://localhost:90/CashManHA/controlador/cIniciosSesionesUsuarios.php?cashmanha=codigo-seguridad-recuperacion&token=$Token' class='btn btn-primary'>Cambiar Contrase&ntilde;a</a></p>
            </div>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
            <tr>
            <td valign='middle' class='bg_light footer email-section' style='background: #fafafa; border-top: 1px solid rgba(0,0,0,.05);color: rgba(0,0,0,.5); padding:2.5em;'>
            <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;'>
            <tr>
            <td valign='top' width='33.333%' style='padding-top: 20px;'>
            <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
            <tr>
            <td style='text-align: left; padding-right: 10px;'>
            <h3 style='font-family: Helvetica, sans-serif; color: #000000;' class='heading'>Tomar Nota</h3>
            <p style='font-family: Helvetica, sans-serif; color: #000000;'>* El proceso de recuperaci&oacute;n debe ser el mismo dispositivo en el cual usted ha iniciado dicha gesti&oacute;n. Caso contrario no pidr&aacute; seguir con el respectivo proceso.</p>
            <p style='font-family: Helvetica, sans-serif; color: #000000;'>* Este c&oacute;digo cuenta con una vigencia de 6 minutos, posteriormente lamentamos informarle que no podr&aacute; utilizar el mismo y deber&aacute; reiniciar el proceso de recuperaci&oacute;n de cuentas.</p>
            <p style='font-family: Helvetica, sans-serif; color: #000000;'><strong>AVISO DE CONFIDENCIALIDAD:</strong> Este mensaje as&iacute; como todo el contenido que incluye este correo, es propiedad exclusivamente del destinatario final. Por lo cual queda terminantemente prohibido la reproducci&oacute;n total y parcial de el contenido de este correo. De igual manera por favor evite compartir este correo con otros usuarios. <strong>Si usted no ha solicitado reestablecer su contrase&ntilde;a por favor haga caso omiso de este correo. Le garantizamos que sus datos est&aacute;n debidamente resguardados mientras usted no incumpla con lo anterior.</strong> Dudas, Problemas Por favor comun&iacute;quese a: <span style='color: #44bd32;'>soporte@cashmanha.com</span></p>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td class='bg_light' style='text-align: center; background: #fafafa;'>
            <p style='background: #000; color: #F20; font-family: Helvetica, sans-serif;'>Este correo ha sido generado autom&aacute;ticamente, por favor no responder</p>
            </td>
            </tr>
            </table>
            </div>
            </center>
            </body>
            </html>";
            $mail->send(); // SI PETICION ES EXITOSA, ENVIA CORREO A SU DESTINATARIO FINAL
        } catch (Exception $e) {
            // CASO CONTRARIO... REDIRIGE POR CUALQUIER ERROR A PAGINA PRINCIPAL
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        }
        // EVITAR INSERCCION DE DATOS VACIOS
        if (empty($Destinatario)) {
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        } else {
            // VARIABLES GENERALES DE SESION -> GUARDADO DE DATOS CONFIDENCIALES DE CUENTA A RECUPERAR
            $_SESSION['TokenUsuarios'] = $Token; // TOKEN DE ACCESO PARA CAMBIAR CONTRASEÑA
            $_SESSION['CorreoUsuarios'] = $Destinatario; // CORREO REGISTRADO CUENTA A RECUPERAR
            $_SESSION['CodigoUsuarios'] = $CodigoRecuperacion; // CODIGO DE RECUPERACION AUTOMATICO
            /*  COMPROBACION SI EL CODIGO DE SEGURIDAD ENVIADO AL CORREO HA SIDO INGRESADO,
                    SI EL USUARIO INTENTA DIGITAR LA URL CON SU TOKEN DE ACCESO VALIDO, SU ACCESO
                    SERA DENEGADO HASTA QUE CUMPLA CON EL REQUISITO DE COMPROBAR SU CODIGO
                */
            $_SESSION['EstadoCodigos'] = "BloquearCodigoAcceso";
            // INSERCCION DATOS TABLA RECUPERACION
            $consulta = $Usuarios->RecuperarCuentasUsuarios($conectarsistema, $Destinatario, $Token, $CodigoRecuperacion);
        }
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA CONFIRMACION DE RECUPERAR CUENTA [CONTRASEÑAS USUARIOS]
    case "confirmacion-recuperacion-cuentas":
        require('../vista/confirmacion-recuperar-contrasenia.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA CAMBIO DE CONTRASEÑA USUARIOS -> POSTERIOR ENVIO DE CORREO DE NOTIFICACION
    case "cambio-contrasenia-usuarios":
        require('../vista/recuperar-cuentas-usuarios.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA INGRESO CODIGO DE RECUPERACION [DESDE CORREO ELECTRONICO USUARIOS]
    case "codigo-seguridad-recuperacion":
        require('../vista/ingreso-codigo-recuperacion.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // ACTUALIZACION ESTADO TOKEN ->  VALIDO A VENCIDO POR CUMPLIMIENTO DE TIEMPO LIMITE
    case "expiracion-cambio-contrasenia":
        // RETIRAR SESIONES CREADAS PARA MANEJO DE TIEMPO
        unset($_SESSION["expirar_sesion"]);
        unset($_SESSION["tiempo_sesion"]);
        // RETIRAR TODAS LAS SESIONES
        session_unset();
        session_destroy();
        header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // CAMBIO DE NUEVA CONTRASEÑA -> USUARIOS QUE ACCEDEN DESDE SU CORREO DE CONFIRMACION DE USUARIO
    case "cambiar-contrasenia-recuperacion":
        $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-password'])); // CONTRASEÑA INGRESADA POR USUARIOS
        $Contrasenia = crypt($conectarsistema->real_escape_string($_POST['val-password']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
        $Correo = $_SESSION['CorreoUsuarios'];
        // EVITAR ACCION NULA O VACIA
        if (empty($_POST['val-password'])) {
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        } else {
            $consulta = $Usuarios->CambioContraseniaRecuperacion($conectarsistema, $Correo, $Contrasenia);
            /** CORREO DE CONFIRMACION CAMBIO EXITOSO DE CONTRASEÑA **/
            $Destinatario = $_SESSION['CorreoUsuarios']; // CORREO ELECTRONICO REGISTRADO DE USUARIOS
            $CodigoRecuperacion = rand(10000, 99999); // CODIGO AUTOMATICO DE RECUPERACION [5 DIGITOS]
            $Nombre = "CashMan H.A. - Soporte Sistemas"; // NOMBRE POR DEFECTO EMPRESA
            $Remitente = "sistemas@cashmanha.com"; // CORREO DE RECUPERACION DE CUENTAS -> EMPRESA
            $Asunto = "Cambio Contraseña - Dpto Sistemas CashMan H.A."; // ASUNTO POR DEFECTO DE CORREO
            $Bytes = random_bytes(5); // GENERAR CODIGO DE 5 DIGITOS - LETRAS
            $Token = bin2hex($Bytes); // ENVIAR TOKEN A INSERCCION
            // INICIALIZANDO CLASE DE ENVIO DE CORRREOS -> USUARIOS QUE RECUPERAN SU CUENTA
            $mail = new PHPMailer(true);
            try {
                // AJUSTE DE SERVIDOR
                $mail->CharSet = 'UTF-8'; // CODIFICACION DE CONTENIDO
                $mail->SMTPDebug = 0;  // VISUALIZACION DE ERRORES -> [DEBUG = 0 -> NO VISUALIZAR] 
                $mail->isSMTP(); // PROTOCOLO SMTP
                $mail->Host = ''; // HOST DE SERVICIO ENVIO CORREOS
                $mail->SMTPAuth = true;
                $mail->Port = 2525; // PUERTO
                $mail->Username = ''; // NOMBRE DE USUARIO
                $mail->Password = ''; // CLAVE DE ACCESO
                // DESTINATARIOS Y REMITENTES
                $mail->setFrom($Remitente, $Nombre);
                $mail->addAddress($Destinatario);
                // CONTENIDO -> CUERPO DEL MENSAJE
                $mail->isHTML(true); // CONTENIDO HTML HABILITADO
                $mail->Subject = $Asunto; // ASUNTO DE CORREO
                // TODO MENSAJE -> CUERPO CORREOS
                /*
                        -> IMPORTANTE, POR FAVOR CAMBIE LAS URL´s SI ES DIFERENTE A LA DE SU SERVIDOR
                        RECUERDE QUE POR DEFECTO ESTE PROYECTO HA SIDO DESARROLLADO CON EL PREFIJO
                        LOCAL << :90 >>
                    */
                $mail->Body = "
                    <!DOCTYPE html>
                    <html lang='ES-SV' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
                    <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='x-apple-disable-message-reformatting'>
                    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>
                    </head>
                    <style>
                    @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {u ~ div .email-container{min-width: 320px !important;}}
                    @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {u ~ div .email-container{min-width: 375px !important;}}
                    @media only screen and (min-device-width: 414px){u ~ div .email-container {min-width: 414px !important;}}
                    </style>
                    <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
                    <center style='width: 100%; background-color: #f1f1f1;'>
                    <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                    &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                    </div>
                    <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
                    <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important; border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                    <tr>
                    <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em; background: #ffffff;'>
                      <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                    <td class='logo' style='text-align: center;'>
                    <h1><a href='#'><img style='width: 70px;' src='http://localhost:90/CashManHA/vista/images/logo.png'></a></h1>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td valign='middle' class='hero bg_white' style='padding: 3em 0 2em 0; background: #ffffff;'>
                    <img src='http://localhost:90/CashManHA/vista/images/deal.png' style='width: 300px; max-width: 200px; height: auto; margin: auto; display: block;'>
                    </td>
                    </tr>
                    <tr>
                    <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0; background: #ffffff;'>
                    <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;'>
                    <tr>
                    <td>
                    <div class='text' style='padding: 0 2.5em; text-align: center;'>
                    <h2 style='font-family: Tahoma, sans-serif;color: #000000;'>Recuperaci&oacute;n Cuentas</h2><br>
                    <h4 style='font-family: Tahoma, sans-serif;color: #000000;'>Perfecto, la contrase&ntilde;a ha sido cambiada con &eacute;xito. Ahora puede ingresar con su nueva credencial de acceso</h4><br>
                    </div>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                    <tr>
                    <td valign='middle' class='bg_light footer email-section' style='background: #fafafa; border-top: 1px solid rgba(0,0,0,.05);color: rgba(0,0,0,.5); padding:2.5em;'>
                    <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;'>
                    <tr>
                    <td valign='top' width='33.333%' style='padding-top: 20px;'>
                    <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                    <tr>
                    <td style='text-align: left; padding-right: 10px;'>
                    <p style='font-family: Helvetica, sans-serif; color: #000000;'>Si tiene alg&uacute;n inconveniente posteriormente y sigue sin poder acceder a su cuenta, por favor contacte con nuestra l&iacute;nea de atenci&oacute;n al cliente.</p>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td class='bg_light' style='text-align: center; background: #fafafa;'>
                    <p style='background: #000; color: #F20; font-family: Helvetica, sans-serif;'>Este correo ha sido generado autom&aacute;ticamente, por favor no responder</p>
                    </td>
                    </tr>
                    </table>
                    </div>
                    </center>
                    </body>
                    </html>";
                $mail->send(); // SI PETICION ES EXITOSA, ENVIA CORREO A SU DESTINATARIO FINAL
            } catch (Exception $e) {
                // CASO CONTRARIO... REDIRIGE POR CUALQUIER ERROR A PAGINA PRINCIPAL
                header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
            }
        }
        // RETIRAR TODAS LAS SESIONES AL MOMENTO DE PROCESAR INFORMACION
        session_unset();
        session_destroy();
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA ERROR -> TOKEN DE ACCESO INVALIDO / VENCIDO
    case "token-codigo-invalido":
        require('../vista/error-codigo-token.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // CAMBIO DE TOKEN DE ACCESO AUTOMATICAMENTE -> POSTERIOR COMPROBACION CODIGO DE SEGURIDAD
    case "cambio-estado-token":
        /*
                HABILITANDO ACCESO A PAGINA DE CAMBIO DE CONTRASEÑA NUEVA, USUARIO HA COMPROBADO
                EXITOSAMENTE QUE SU CODIGO ES VALIDO PARA PROCEDER A SU PETICION
            */
        $_SESSION['EstadoCodigos'] = "ValidarCodigoAcceso";
        $Correo = $_SESSION['CorreoUsuarios'];
        $TokenSeguridad = $_SESSION['TokenUsuarios'];
        $CodigoSeguridad = $_SESSION['CodigoUsuarios'];
        $Estado = "Usado";
        // EVITAR ACCION NULA O VACIA
        if (empty($Correo)) {
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        } else {
            $consulta = $Usuarios->CambioEstadoCodigoSeguridad($conectarsistema, $Correo, $TokenSeguridad, $CodigoSeguridad, $Estado);
        }
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA CONFIRMACION CAMBIO DE CONTRASEÑAS USUARIOS
    case "confirmacion-cambio-contrasenia":
        // RETIRAR SESIONES CREADAS PARA MANEJO DE TIEMPO
        unset($_SESSION["expirar_sesion"]);
        unset($_SESSION["tiempo_sesion"]);
        // RETIRAR TODAS LAS SESIONES
        session_unset();
        session_destroy();
        require('../vista/confirmacion-cambio-contrasenia.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // PAGINA ERROR CAMBIO DE CONTRASEÑAS USUARIOS
    case "error-cambio-contrasenia":
        // RETIRAR SESIONES CREADAS PARA MANEJO DE TIEMPO
        unset($_SESSION["expirar_sesion"]);
        unset($_SESSION["tiempo_sesion"]);
        // RETIRAR TODAS LAS SESIONES
        session_unset();
        session_destroy();
        require('../vista/error-cambio-contrasenia.php');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // CERRAR SESION SISTEMA [TODOS LOS USUARIOS]
    case "cerrarsesion":
        // RETIRAR TODAS LAS SESIONES
        session_unset();
        session_destroy();
        header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        $conectarsistema->close(); // CERRANDO CONEXION
        break;
        // NO PERMITIR INGRESO DE PARAMETROS DISTINTOS A LOS YA ESTIPULADOS EN EL SISTEMA
    default:
        header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        break;
}// CIERRE switch($peticion_url)
