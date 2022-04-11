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
░░   -> PHP 8.1, MYSQL, MVC, JAVASCRIPT, AJAX, JQUERY                       
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

/*

    -> IMPORTANTE: LOS ROLES DE USUARIOS SE CLASIFICAN POR SU ID NUMERICO ENTERO, POR LO CUAL LOS ROLES EXISTENTES EN ESTE SISTEMA SON:
    -----------------------------------------------
    [ 1 ] -> USUARIOS ADMINISTRADORES
    [ 2 ] -> USUARIOS PRESIDENCIA
    [ 3 ] -> USUARIOS GERENCIA
    [ 4 ] -> USUARIOS ATENCION AL CLIENTE
    [ 5 ] -> USUARIOS CLIENTES
    ----------------------------------------------
    --> SE PUEDEN REGISTRAR MAS ROLES, SEGUN NECESIDADES PERO SE TIENEN QUE REALIZAR LAS RESPECTIVAS ADECUACIONES EN TODO ESTE SISTEMA.

*/

// INICIALIZANDO SESION
session_start();
// CLASES Y ARCHIVOS NECESARIOS PARA EJECUCION DE PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// IMPORTANDO MODELO DE DATOS PHPMAILER -> NECESARIOS PARA SU FUNCIONAMIENTO
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
// IMPORTANDO ARCHIVO DE CONEXION
require('../modelo/conexion.php');
// IMPORTANDO MODELO RECUPERACION DE GESTIONES EMPRESARIALES CASHMAN H.A.
require('../modelo/mGestionesCashman.php');
// INICIALIZANDO VARIABLE GLOBAL DE CLASE
$Gestiones = new GestionesClientes();
/*
        -> IMPORTANTE: ESTE PROYECTO CUENTA CON LA CONFIGURACION HORARIA DISPONIBLE EN LA REGION [PAIS -> EL SALVADOR] UTC-6. EN CASO DE FUTURAS ADECUACIONES ESTE DEBE SER MODIFICADO SEGUN LA REGION A IMPLEMENTAR.

        PARA MAYOR INFORMACION SOBRE LAS ZONAS HORARIAS DISPONIBLES EN PHP, CONSULTE LA DOCUMENTACION OFICIAL EN EL SIGUIENTE ENLACE: 
        https://www.php.net/manual/es/function.date-default-timezone-set.php
    */
// TIEMPO POR DEFECTO -> UTC - 6 EL SALVADOR [CONSULTAR DOCUMENTACION OFICIAL]
date_default_timezone_set('America/El_Salvador');
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
if (isset($_GET['cashmanhagestion'])) {
    $peticion_url = $_GET['cashmanhagestion'];  // ENVIO GET DE VALOR ACCION {URL}
}
// ASIGNA VALOR POR DEFECTO...
else {
    $peticion_url = "inicioadministradores";  // CASO CONTRARIO, VALOR POR DEFECTO
} // CIERRE if (isset($_GET['cashmanhagestion']))
switch ($peticion_url) {
        // PAGINA PRINCIPAL [INDEX] INTERFAZ USUARIOS LOGUEADOS NIVEL -> ADMINISTRADORES
    case "inicioadministradores":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // TOTALES DE PETICIONES REQUERIDOS -> INICIO INTERFAZ ADMINISTRADORES
            $consulta1 = $Gestiones->ConsultarDetallesRegistros_Administradores($conectarsistema3);
            // CONSULTA LISTADO GENERAL ULTIMAS 75 TRANSACCIONES PROCESADAS
            $consulta2 = $Gestiones->ConsultaListadoGeneralUltimasTransaccionesClientes($conectarsistema4);
            require("../vista/Administradores/inicio-administradores.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PAGINA PRINCIPAL [INDEX] INTERFAZ USUARIOS LOGUEADOS NIVEL -> PRESIDENCIA
    case "iniciopresidencia":
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA LISTADO GENERAL ULTIMAS 200 TRANSACCIONES PROCESADAS
            $consulta2 = $Gestiones->ConsultaListadoGeneralUltimasTransaccionesClientes($conectarsistema3);
            // TOTALES DE PETICIONES REQUERIDOS -> INICIO INTERFAZ PRESIDENCIA
            $consulta3 = $Gestiones->ConsultarDetallesRegistros_Presidencia($conectarsistema4);
            require("../vista/Presidencia/inicio-presidencia.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // PAGINA PRINCIPAL [INDEX] INTERFAZ USUARIOS LOGUEADOS NIVEL -> GERENCIA
    case "iniciogerencia":
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA LISTADO GENERAL ULTIMAS 200 TRANSACCIONES PROCESADAS
            $consulta2 = $Gestiones->ConsultaListadoGeneralUltimasTransaccionesClientes($conectarsistema3);
            // TOTALES DE PETICIONES REQUERIDOS -> INICIO INTERFAZ PRESIDENCIA
            $consulta3 = $Gestiones->ConsultarDetallesRegistros_Gerencia($conectarsistema4);
            require("../vista/Gerencia/inicio-gerencia.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // PAGINA PRINCIPAL [INDEX] INTERFAZ USUARIOS LOGUEADOS NIVEL -> ATENCION AL CLIENTE
    case "inicioatencionclientes":
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $CodigoUsuarios = $_SESSION['usuario_unico']; // CODIGO UNICO DE USUARIOS
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA LISTADO GENERAL ULTIMAS 200 TRANSACCIONES PROCESADAS [ATENCION AL CLIENTE -> SEGUN CODIGO UNICO DE USUARIOS]
            $consulta2 = $Gestiones->ConsultarListadoUltimasTrasacciones_PortalAtencionClientes($conectarsistema3, $CodigoUsuarios);
            // CONSULTA TOTAL DE TRANSACCIONES PROCESADAS [SEGUN CODIGO UNICO DE EMPLEADOS]
            $consulta3 = $Gestiones->Consulta_ContadorTransaccionesProcesadas_AtencionClientes($conectarsistema4, $CodigoUsuarios);
            // CONSULTA TOTAL DE SOLICITUDES CREDITOS PROCESADAS [SEGUN CODIGO UNICO DE EMPLEADOS]
            $consulta4 = $Gestiones->Consulta_ContadorSolicitudesCreditosProcesadas_AtencionClientes($conectarsistema5, $CodigoUsuarios);
            // CONSULTA TOTAL DE INGRESOS PAGOS CUOTAS [TRANSACCIONES] CREDITOS PROCESADAS [SEGUN CODIGO UNICO DE EMPLEADOS]
            $consulta5 = $Gestiones->Consulta_TotalIngresosTransaccionesCreditosProcesadas_AtencionClientes($conectarsistema6, $CodigoUsuarios);
            require("../vista/AtencionClientes/inicio-atencion-clientes.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
            $conectarsistema6->close(); // CERRANDO CONEXION AUXILIAR 6
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // PAGINA PRINCIPAL [INDEX] INTERFAZ USUARIOS LOGUEADOS NIVEL -> CLIENTES
    case "inicioclientes":
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA LISTADO GENERAL ULTIMAS 50 TRANSACCIONES PROCESADAS
            $consulta2 = $Gestiones->ConsultarListadoUltimasTrasacciones_PortalClientes($conectarsistema3, $IdUsuarios);
            // TOTALES DE PETICIONES REQUERIDOS -> INICIO INTERFAZ CLIENTES
            $consulta3 = $Gestiones->ConsultarAvanceCreditos_ClientesCashmanhaInterfaz($conectarsistema4, $IdUsuarios);
            require("../vista/Clientes/inicio-clientes.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // PERFIL DE USUARIOS NIVEL -> ADMINISTRADORES
    case "perfiladministradores":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DETALLES DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta = $Gestiones->ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA CONFIGURACION CUENTA DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta1 = $Gestiones->ConsultarConfiguracionCuentaUsuarios($conectarsistema1, $IdUsuarios);
            // CONSULTA DETALLE COMPLETO INICIOS DE SESIONES USUARIOS
            $consulta2 = $Gestiones->ConsultarIniciosDeSesionesUsuarios($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require("../vista/Administradores/perfil-administradores.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PERFIL DE USUARIOS NIVEL -> PRESIDENCIA
    case "perfilpresidencia":
        // VISTA VALIDA SOLO PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DETALLES DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta = $Gestiones->ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA CONFIGURACION CUENTA DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta1 = $Gestiones->ConsultarConfiguracionCuentaUsuarios($conectarsistema1, $IdUsuarios);
            // CONSULTA DETALLE COMPLETO INICIOS DE SESIONES USUARIOS
            $consulta2 = $Gestiones->ConsultarIniciosDeSesionesUsuarios($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require("../vista/Presidencia/perfil-presidencia.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // PERFIL DE USUARIOS NIVEL -> GERENCIA
    case "perfilgerencia":
        // VISTA VALIDA SOLO PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DETALLES DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta = $Gestiones->ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA CONFIGURACION CUENTA DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta1 = $Gestiones->ConsultarConfiguracionCuentaUsuarios($conectarsistema1, $IdUsuarios);
            // CONSULTA DETALLE COMPLETO INICIOS DE SESIONES USUARIOS
            $consulta2 = $Gestiones->ConsultarIniciosDeSesionesUsuarios($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require("../vista/Gerencia/perfil-gerencia.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // PERFIL DE USUARIOS NIVEL -> CLIENTES
    case "perfilatencionclientes":
        // VISTA VALIDA SOLO PARA ATENCION AL CLIENTE [EMPLEADOS]
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DETALLES DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta = $Gestiones->ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA CONFIGURACION CUENTA DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta1 = $Gestiones->ConsultarConfiguracionCuentaUsuarios($conectarsistema1, $IdUsuarios);
            // CONSULTA DETALLE COMPLETO INICIOS DE SESIONES USUARIOS
            $consulta2 = $Gestiones->ConsultarIniciosDeSesionesUsuarios($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require("../vista/AtencionClientes/perfil-atencion-clientes.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // PERFIL DE USUARIOS NIVEL -> CLIENTES
    case "perfilclientes":
        // VISTA VALIDA SOLO PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DETALLES DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta = $Gestiones->ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios);
            // CONSULTA CONFIGURACION CUENTA DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta1 = $Gestiones->ConsultarConfiguracionCuentaUsuarios($conectarsistema1, $IdUsuarios);
            // CONSULTA DETALLE COMPLETO INICIOS DE SESIONES USUARIOS
            $consulta2 = $Gestiones->ConsultarIniciosDeSesionesUsuarios($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require("../vista/Clientes/perfil-clientes.php");
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // ACTUALIZACION CONFIGURACION CUENTA USUARIOS ROL -> ADMINISTRADORES
    case "actualizar-configuracion-cuenta-administradores":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CodigoUsuarios = (empty($_POST['val-usuariounico'])) ? NULL :  $_POST['val-usuariounico']; // USUARIO UNICO DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL :  $_POST['val-correo']; // CORREO DE USUARIOS
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-contrasenia'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-contrasenia']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            /*
            --------------------------------------------------------------------------------------------
                IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS POR
                LOS USUARIOS ES EL SIGUIENTE: 

                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                MENCIONADOS.
            --------------------------------------------------------------------------------------------    
            */
            $FotoPerfilUsuarios = $_FILES['fotoperfilusuarios']['name']; // FOTO DE PERFIL DE USUARIO
            //$RutaDestino='../vista/images/fotoperfil/'.$FotoPerfilUsuarios; // RUTA DE DESTINO GUARDADO DE FOTOS
            //$ExtensionFoto=$_FILES['fotoperfilusuarios']['type']; // CAPTURA EL TIPO DE FOTO {EXTENSION}
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFotos  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $Directorio = "../vista/images/fotoperfil/" . $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevo = $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // SI USUARIO NO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO SIN CAMBIO A FOTO DE PERFIL
                if (empty($FotoPerfilUsuarios)) {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaAdministradoresSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios);
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                    // SI USUARIO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO CON CAMBIO A FOTO DE PERFIL
                } else {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaAdministradores($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $NombreNuevo);
                    // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                    copy($_FILES['fotoperfilusuarios']['tmp_name'], $Directorio);
                    // ACTUALIZANDO VARIABLE DE SESION LUEGO DE PETICION DE EDICION
                    $_SESSION['foto_perfil'] = $NombreNuevo;
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                } // CIERRE  if(empty($FotoPerfilUsuarios))
            } // CIERRE if(empty($NombresUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // ACTUALIZACION CONFIGURACION CUENTA USUARIOS ROL -> PRESIDENCIA
    case "actualizar-configuracion-cuenta-presidencia":
        // VISTA VALIDA SOLO PARA USUARIOS ROL PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CodigoUsuarios = (empty($_POST['val-usuariounico'])) ? NULL :  $_POST['val-usuariounico']; // USUARIO UNICO DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL :  $_POST['val-correo']; // CORREO DE USUARIOS
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-contrasenia'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-contrasenia']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            /*
            --------------------------------------------------------------------------------------------
                IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS POR
                LOS USUARIOS ES EL SIGUIENTE: 

                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                MENCIONADOS.
            --------------------------------------------------------------------------------------------    
            */
            $FotoPerfilUsuarios = $_FILES['fotoperfilusuarios']['name']; // FOTO DE PERFIL DE USUARIO
            //$RutaDestino='../vista/images/fotoperfil/'.$FotoPerfilUsuarios; // RUTA DE DESTINO GUARDADO DE FOTOS
            //$ExtensionFoto=$_FILES['fotoperfilusuarios']['type']; // CAPTURA EL TIPO DE FOTO {EXTENSION}
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFotos  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $Directorio = "../vista/images/fotoperfil/" . $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevo = $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // SI USUARIO NO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO SIN CAMBIO A FOTO DE PERFIL
                if (empty($FotoPerfilUsuarios)) {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaPresidenciaSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios);
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                    // SI USUARIO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO CON CAMBIO A FOTO DE PERFIL
                } else {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaPresidencia($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $NombreNuevo);
                    // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                    copy($_FILES['fotoperfilusuarios']['tmp_name'], $Directorio);
                    // ACTUALIZANDO VARIABLE DE SESION LUEGO DE PETICION DE EDICION
                    $_SESSION['foto_perfil'] = $NombreNuevo;
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                } // CIERRE  if(empty($FotoPerfilUsuarios))
            } // CIERRE if(empty($NombresUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // ACTUALIZACION CONFIGURACION CUENTA USUARIOS ROL -> GERENCIA
    case "actualizar-configuracion-cuenta-gerencia":
        // VISTA VALIDA SOLO PARA USUARIOS ROL GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL :  $_POST['val-correo']; // CORREO DE USUARIOS
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-contrasenia'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-contrasenia']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            /*
            --------------------------------------------------------------------------------------------
                IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS POR
                LOS USUARIOS ES EL SIGUIENTE: 

                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                MENCIONADOS.
            --------------------------------------------------------------------------------------------    
            */
            $FotoPerfilUsuarios = $_FILES['fotoperfilusuarios']['name']; // FOTO DE PERFIL DE USUARIO
            //$RutaDestino='../vista/images/fotoperfil/'.$FotoPerfilUsuarios; // RUTA DE DESTINO GUARDADO DE FOTOS
            //$ExtensionFoto=$_FILES['fotoperfilusuarios']['type']; // CAPTURA EL TIPO DE FOTO {EXTENSION}
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFotos  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $Directorio = "../vista/images/fotoperfil/" . $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevo = $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // SI USUARIO NO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO SIN CAMBIO A FOTO DE PERFIL
                if (empty($FotoPerfilUsuarios)) {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaGerenciaSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios);
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                    // SI USUARIO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO CON CAMBIO A FOTO DE PERFIL
                } else {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaGerencia($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $NombreNuevo);
                    // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                    copy($_FILES['fotoperfilusuarios']['tmp_name'], $Directorio);
                    // ACTUALIZANDO VARIABLE DE SESION LUEGO DE PETICION DE EDICION
                    $_SESSION['foto_perfil'] = $NombreNuevo;
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                } // CIERRE  if(empty($FotoPerfilUsuarios))
            } // CIERRE if(empty($NombresUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // ACTUALIZACION CONFIGURACION CUENTA USUARIOS ROL -> ATENCION AL CLIENTE
    case "actualizar-configuracion-cuenta-atencion-al-cliente":
        // VISTA VALIDA SOLO PARA USUARIOS ROL ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL :  $_POST['val-correo']; // CORREO DE USUARIOS
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-contrasenia'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-contrasenia']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            /*
            --------------------------------------------------------------------------------------------
                IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS POR
                LOS USUARIOS ES EL SIGUIENTE: 

                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                MENCIONADOS.
            --------------------------------------------------------------------------------------------    
            */
            $FotoPerfilUsuarios = $_FILES['fotoperfilusuarios']['name']; // FOTO DE PERFIL DE USUARIO
            //$RutaDestino='../vista/images/fotoperfil/'.$FotoPerfilUsuarios; // RUTA DE DESTINO GUARDADO DE FOTOS
            //$ExtensionFoto=$_FILES['fotoperfilusuarios']['type']; // CAPTURA EL TIPO DE FOTO {EXTENSION}
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFotos  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $Directorio = "../vista/images/fotoperfil/" . $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevo = $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // SI USUARIO NO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO SIN CAMBIO A FOTO DE PERFIL
                if (empty($FotoPerfilUsuarios)) {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaClientesSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios);
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                    // SI USUARIO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO CON CAMBIO A FOTO DE PERFIL
                } else {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaClientes($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $NombreNuevo);
                    // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                    copy($_FILES['fotoperfilusuarios']['tmp_name'], $Directorio);
                    // ACTUALIZANDO VARIABLE DE SESION LUEGO DE PETICION DE EDICION
                    $_SESSION['foto_perfil'] = $NombreNuevo;
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                } // CIERRE  if(empty($FotoPerfilUsuarios))
            } // CIERRE if(empty($NombresUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // ACTUALIZACION CONFIGURACION CUENTA USUARIOS ROL -> CLIENTES
    case "actualizar-configuracion-cuenta-clientes":
        // VISTA VALIDA SOLO PARA USUARIOS ROL CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL :  $_POST['val-correo']; // CORREO DE USUARIOS
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-contrasenia'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-contrasenia']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            /*
            --------------------------------------------------------------------------------------------
                IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS POR
                LOS USUARIOS ES EL SIGUIENTE: 

                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                MENCIONADOS.
            --------------------------------------------------------------------------------------------    
            */
            $FotoPerfilUsuarios = $_FILES['fotoperfilusuarios']['name']; // FOTO DE PERFIL DE USUARIO
            //$RutaDestino='../vista/images/fotoperfil/'.$FotoPerfilUsuarios; // RUTA DE DESTINO GUARDADO DE FOTOS
            //$ExtensionFoto=$_FILES['fotoperfilusuarios']['type']; // CAPTURA EL TIPO DE FOTO {EXTENSION}
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFotos  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $Directorio = "../vista/images/fotoperfil/" . $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevo = $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoperfilusuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // SI USUARIO NO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO SIN CAMBIO A FOTO DE PERFIL
                if (empty($FotoPerfilUsuarios)) {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaClientesSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios);
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                    // SI USUARIO CAMBIA FOTO DE PERFIL, LLAMA PROCEDIMIENTO CON CAMBIO A FOTO DE PERFIL
                } else {
                    $consulta = $Gestiones->ActualizacionConfiguracionCuentaClientes($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $NombreNuevo);
                    // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                    copy($_FILES['fotoperfilusuarios']['tmp_name'], $Directorio);
                    // ACTUALIZANDO VARIABLE DE SESION LUEGO DE PETICION DE EDICION
                    $_SESSION['foto_perfil'] = $NombreNuevo;
                    // ENVIANDO RESPUESTA DE ACCION A MODELO
                    echo json_encode($consulta);
                } // CIERRE  if(empty($FotoPerfilUsuarios))
            } // CIERRE if(empty($NombresUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // ACTUALIZACION DE DETALLES DE USUARIOS -> TODOS LOS USUARIOS
    case "actualizacion-detalles-perfil-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES Y PRESIDENCIA [TODOS LOS CAMPOS ACTUALIZABLES]
        // USUARIOS DE GERENCIA, ATENCION AL CLIENTE Y CLIENTES [NO TODOS LOS CAMPOS ACTUALIZABLES PERO SI HAY LECTURA DE LOS CAMPOS OCULTOS NO ACTUALIZABLES PARA DICHOS ROLES DE USUARIO]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $DuiUsuarios = (empty($_POST['val-dui'])) ? NULL : $_POST['val-dui']; // DUI USUARIOS
            $NitUsuarios = (empty($_POST['val-nit'])) ? NULL : $_POST['val-nit']; // NIT USUARIOS
            $TelefonoUsuarios = (empty($_POST['val-telefono1'])) ? NULL : $_POST['val-telefono1']; // TELEFONO PRINCIPAL USUARIOS
            $CelularUsuarios = (empty($_POST['val-telefono2'])) ? NULL : $_POST['val-telefono2']; // CELULAR USUARIOS
            $DireccionUsuarios = (empty($_POST['val-direccion1'])) ? NULL : $_POST['val-direccion1']; // DIRECCION RESIDENCIA USUARIOS
            $EmpresaUsuarios = (empty($_POST['val-nombreempresa'])) ? NULL : $_POST['val-nombreempresa']; // NOMBRE EMPRESA TRABAJO USUARIOS
            $CargoEmpresaUsuarios = (empty($_POST['val-cargoempresa'])) ? NULL :  $_POST['val-cargoempresa']; // CARGO DESEMPEÑADO USUARIOS
            $DireccionTrabajoUsuarios = (empty($_POST['val-direccion2'])) ? NULL :  $_POST['val-direccion2']; // DIRECCION EMPRESA USUARIOS
            $TelefonoTrabajoUsuarios = (empty($_POST['val-telefono3'])) ? NULL :  $_POST['val-telefono3']; // TELEFONO TRABAJO USUARIOS
            $FechaNacimientoUsuarios = (empty($_POST['val-fechanacimiento'])) ? NULL : $_POST['val-fechanacimiento']; // FECHA DE NACIMIENTO USUARIOS
            $GeneroUsuarios = (empty($_POST['val-genero'])) ? NULL : $_POST['val-genero']; // GENERO USUARIOS
            $EstadoCivilUsuarios = (empty($_POST['val-estadocivil'])) ? NULL : $_POST['val-estadocivil']; // ESTADO CIVIL USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($DuiUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActualizacionDetallesPerfilUsuarios($conectarsistema, $IdUsuarios, $DuiUsuarios, $NitUsuarios, $TelefonoUsuarios, $CelularUsuarios, $TelefonoTrabajoUsuarios, $DireccionUsuarios, $EmpresaUsuarios, $CargoEmpresaUsuarios, $DireccionTrabajoUsuarios, $FechaNacimientoUsuarios, $GeneroUsuarios, $EstadoCivilUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if(empty($DuiUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol <=4])
        break;
        // REGISTRO DE NUEVOS USUARIOS / CLIENTES -> ROL ADMINISTRADOR [PAGINA]
    case "registro-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $QuienRegistroUsuario = $_SESSION['usuario_unico']; // USUARIO UNICO DE USUARIO LOGUEADO
            // CONSULTA USUARIOS CON PERFIL INCOMPLETO [NUEVOS USUARIOS]
            $consulta = $Gestiones->ConsultarUsuariosPerfilIncompleto($conectarsistema, $QuienRegistroUsuario);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/registro-usuarios-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DE NUEVOS USUARIOS / CLIENTES -> ROL ADMINISTRADOR [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CodigoUsuarios = (empty($_POST['val-usuariounico'])) ? NULL : $_POST['val-usuariounico']; // USUARIO UNICO DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL : $_POST['val-correo']; // CORREO DE USUARIOS
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-contrasenia'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-contrasenia']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            $IdRolUsuarios = (empty($_POST['val-rol-usuarios'])) ? NULL : $_POST['val-rol-usuarios']; // ROL ASIGNADO DE USUARIOS
            // CONTROL DE QUIENES REGISTRAN NUEVOS USUARIOS -> PARA EFECTOS DE MUESTRA SOLAMENTE
            // COMPLETAR LOS DETALLES DE USUARIOS FILTRADOS
            $QuienRegistroUsuario = $_SESSION['usuario_unico']; // USUARIO UNICO QUE REGISTRA NUEVOS USUARIOS
            /*
                    -> MOSTRAR INFORME DE CREDENCIALES DE USUARIOS, ESTE DEBE SER IMPRESO Y ENTREGADO
                    A LOS USUARIOS / CLIENTES NUEVOS REGISTRADOS
                */
            $_SESSION['NombresCliente'] = $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $_SESSION['ApellidosCliente'] = $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $_SESSION['CodigoUsuarioCliente'] = $_POST['val-usuariounico']; // USUARIO UNICO DE USUARIOS
            $_SESSION['CorreoNuevoCliente'] = $_POST['val-correo']; // CORREO DE USUARIOS
            $_SESSION['ContraseniaCliente'] = $_POST['val-contrasenia']; // CONTRASEÑA GENERADA
            $_SESSION['control-eliminar-datos'] = "IMPRIMIR";
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroClientesAdministradores($conectarsistema, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $IdRolUsuarios, $QuienRegistroUsuario);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($NombresUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DETALLES DE NUEVOS USUARIOS / CLIENTES -> ROL ADMINISTRADOR [PAGINA]
    case "registro-detalles-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUnicoNuevoUsuario = $_GET['codigounicousuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DETALLES DE USUARIOS {EMPLEADOS, CLIENTES CASHMAN H.A.} -> PERFIL DE USUARIOS
            $consulta = $Gestiones->ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/registrar-detalles-usuarios-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DETALLES USUARIOS / CLIENTES -> TODOS LOS USUARIOS [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-detalles-nuevos-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_POST['codigounicousuario'])) ? NULL :  $_POST['codigounicousuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $DuiUsuarios = (empty($_POST['val-dui'])) ? NULL : $_POST['val-dui']; // DUI USUARIOS
            $NitUsuarios = (empty($_POST['val-nit'])) ? NULL : $_POST['val-nit']; // NIT USUARIOS
            $TelefonoUsuarios = (empty($_POST['val-telefono1'])) ? NULL : $_POST['val-telefono1']; // TELEFONO PRINCIPAL USUARIOS
            $CelularUsuarios = (empty($_POST['val-telefono2'])) ? NULL : $_POST['val-telefono2']; // CELULAR USUARIOS
            $DireccionUsuarios = (empty($_POST['val-direccion1'])) ? NULL : $_POST['val-direccion1']; // DIRECCION RESIDENCIA USUARIOS
            $EmpresaUsuarios = (empty($_POST['val-nombreempresa'])) ? NULL : $_POST['val-nombreempresa']; // NOMBRE EMPRESA TRABAJO USUARIOS
            $CargoEmpresaUsuarios = (empty($_POST['val-cargoempresa'])) ? NULL : $_POST['val-cargoempresa']; // CARGO DESEMPEÑADO USUARIOS
            $DireccionTrabajoUsuarios = (empty($_POST['val-direccion2'])) ? NULL : $_POST['val-direccion2']; // DIRECCION EMPRESA USUARIOS
            $TelefonoTrabajoUsuarios = (empty($_POST['val-telefono3'])) ? NULL : $_POST['val-telefono3']; // TELEFONO TRABAJO USUARIOS
            $FechaNacimientoUsuarios = (empty($_POST['val-fechanacimiento'])) ? NULL : $_POST['val-fechanacimiento']; // FECHA DE NACIMIENTO USUARIOS
            $GeneroUsuarios = (empty($_POST['val-genero'])) ? NULL : $_POST['val-genero']; // GENERO USUARIOS
            $EstadoCivilUsuarios = (empty($_POST['val-estadocivil'])) ? NULL : $_POST['val-estadocivil']; // ESTADO CIVIL USUARIOS
            /*
                    -> VALIDACION SEGUN GENERO INGRESADO
                        SI ES FEMENINO, ENTONCES HACE EL CAMBIO CORRESPONDIENTE -->  (a)
                        POR DEFECTO SE MANEJA EL GENERO " MASCULINO "
                */
            if ($GeneroUsuarios == "f") {
                if ($EstadoCivilUsuarios == "Soltero") {
                    $EstadoCivilUsuarios = "Soltera";
                } else if ($EstadoCivilUsuarios == "Casado") {
                    $EstadoCivilUsuarios = "Casada";
                } else if ($EstadoCivilUsuarios == "Divorciado") {
                    $EstadoCivilUsuarios = "Divorciada";
                } else if ($EstadoCivilUsuarios == "Comprometido") {
                    $EstadoCivilUsuarios = "Comprometida";
                } else if ($EstadoCivilUsuarios == "Viudo") {
                    $EstadoCivilUsuarios = "Viuda";
                }
            } // CIERRE if($GeneroUsuarios == "f")
            /*
                --------------------------------------------------------------------------------------------
                    IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS EN LOS
                    CAMPOS SOLICITADOS ES EL SIGUIENTE:
    
                        DOCUMENTO UNICO DE IDENTIDAD [ DUI ] -> FRONTAL
                                <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>
    
                        DOCUMENTO UNICO DE IDENTIDAD [ DUI ] -> REVERSO
                                <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>
                        
                         NUMERO DE IDENTIFICACION TRIBUTARIA [ NIT ]
                                <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>
    
                        FIRMA DE CLIENTES [ GENERADA EN MAQUINA LECTORA DE FIRMAS ]
                                <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>
    
                    EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                    MENCIONADOS.
                --------------------------------------------------------------------------------------------    
                */
            // >> DOCUMENTO UNICO DE IDENTIDAD [DUI] -> FRENTE DE DOCUMENTO <<
            $FotoDuiUsuariosFrontal = $_FILES['fotoduiusuariosfrontal']['name']; // FOTO DUI DE USUARIO
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            /* POR EL MISMO USUARIO SERAN UTILIZADOS ESTOS IDENTIFICADORES UNICOS */
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFoto  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioDuiFrontal = "../vista/images/fotoduifrontal/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosfrontal']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoDuiFrontal = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosfrontal']['name'];
            // >> DOCUMENTO UNICO DE IDENTIDAD [DUI] -> REVERSO DE DOCUMENTO <<
            $FotoDuiUsuariosReverso = $_FILES['fotoduiusuariosreverso']['name']; // FOTO DUI DE USUARIO
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            /* POR EL MISMO USUARIO SERAN UTILIZADOS ESTOS IDENTIFICADORES UNICOS */
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFoto  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioDuiReverso = "../vista/images/fotoduireverso/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosreverso']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoDuiReverso = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosreverso']['name'];
            // >> NUMERO DE IDENTIFICACION TRIBUTARIA [NIT] <<
            $FotoNitUsuarios = $_FILES['fotonitusuarios']['name']; // FOTO NIT DE USUARIO
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioNit = "../vista/images/fotonit/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotonitusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoNit = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotonitusuarios']['name'];
            // >> FIRMA DE CLIENTES GENERADA EN MAQUINA LECTORA DE FIRMAS [FIRMA CLIENTES] <<
            $FotoFirmaUsuarios = $_FILES['fotofirmausuarios']['name']; // FOTO FIRMA DE USUARIO
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioFirmas = "../vista/images/fotofirmas/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotofirmausuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoFirmaClientes = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotofirmausuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($DuiUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroNuevosDetallesPerfilUsuarios($conectarsistema, $DuiUsuarios, $NitUsuarios, $TelefonoUsuarios, $CelularUsuarios, $TelefonoTrabajoUsuarios, $DireccionUsuarios, $EmpresaUsuarios, $CargoEmpresaUsuarios, $DireccionTrabajoUsuarios, $FechaNacimientoUsuarios, $GeneroUsuarios, $EstadoCivilUsuarios, $NombreNuevoDuiFrontal, $NombreNuevoDuiReverso, $NombreNuevoNit, $NombreNuevoFirmaClientes, $IdUsuarios);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [DUI] -> FRENTE
                copy($_FILES['fotoduiusuariosfrontal']['tmp_name'], $DirectorioDuiFrontal);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [DUI] -> REVERSO
                copy($_FILES['fotoduiusuariosreverso']['tmp_name'], $DirectorioDuiReverso);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [NIT]
                copy($_FILES['fotonitusuarios']['tmp_name'], $DirectorioNit);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [FIRMA]
                copy($_FILES['fotofirmausuarios']['tmp_name'], $DirectorioFirmas);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($IdUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PAGINA QUE ALOJA LOS DATOS DE INFORME DE NUEVOS USUARIOS / CLIENTES PARA SU POSTERIOR IMPRESION
    case "mostrar-informe-nuevos-clientes-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            // CONTROLADOR BOTON ELIMINAR DATOS CLIENTE - USUARIO ANTERIOR
            // SI LA VARIABLE DE SESION SE ENCUENTRA VACIA, EL USUARIO NO HA INGRESADO A VISUALIZAR
            // EL INFORME CON LOS DATOS DE LOS USUARIOS, EN ESTE CASO NO PODRA ELIMINAR LOS DATOS
            // DE LOS USUARIOS ANTERIORES, HASTA QUE INGRESE POR LO MENOS UNA VEZ A ESTA ACCION
            $_SESSION['control-eliminar-datos'] = "NO";
            // VISTA INFORME GENERAL
            require('../vista/informe-impresion-nuevo-cliente-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // BORRADO GENERAL DE VARIABLES DE SESION -> POSTERIOR REGISTRO DE NUEVOS CLIENTES / USUARIOS
        // ESTA ACCION ESTA DISPONIBLE UNICAMENTE SU EJECUCION EN EL BOTON [Eliminar Datos Usuario Anterior]
    case "eliminar-datos-clientes-usuarios-anteriores":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            unset($_SESSION['NombresCliente']); // RETIRAR SESION NOMBRES USUARIOS
            unset($_SESSION['ApellidosCliente']); // RETIRAR SESION APELLIDOS USUARIOS
            unset($_SESSION['CodigoUsuarioCliente']); // RETIRAR CODIGO UNICO USUARIOS
            unset($_SESSION['CorreoNuevoCliente']); // RETIRAR SESION CORREO USUARIOS
            unset($_SESSION['ContraseniaCliente']); // RETIRAR SESION CONTRASEÑA USUARIOS
            unset($_SESSION['control-eliminar-datos']); // RETIRAR CONTROL ELIMINAR DATOS USUARIOS
            // REDIRECCIONAR NUEVAMENTE A PAGINA PRINCIPAL DE REGISTRO DE USUARIOS
            header('location:cGestionesCashman.php?cashmanhagestion=registro-usuarios-administrador');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // DETALLE COMPLETO DE USUARIOS REGISTRADOS GENERAL SIN FILTROS -> ROL ADMINISTRADOR [PAGINA]
    case "consulta-general-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA LISTA GENERAL DE USUARIOS REGISTRADOS [SOLAMENTE ACTIVOS SIN FILTRO DE ROL ASIGNADO]
            $consulta = $Gestiones->ConsultarUsuariosRegistradosAdministradores($conectarsistema);
            // CONSULTAR LISTADO DE USUARIOS INACTIVOS
            $consulta1 = $Gestiones->ConsultarUsuariosInactivosAdministradores($conectarsistema1);
            // CONSULTAR LISTADO DE USUARIOS BLOQUEADOS
            $consulta2 = $Gestiones->ConsultarUsuariosBloqueadosAdministradores($conectarsistema2);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Administradores/consulta-general-usuarios-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODIFICAR CONFIGURACION / DETALLES USUARIOS / CLIENTES -> ADMINISTRADORES [PAGINA]
    case "modificar-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA DE TODOS LOS DETALLES DE USUARIO REGISTRADO EN CUESTION
            $consulta = $Gestiones->ConsultarDetallesCompletosModificarUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/Administradores/modificar-usuarios-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODIFICAR CONFIGURACION / DETALLES USUARIOS / CLIENTES -> ADMINISTRADORES [ENVIO BASE DE DATOS]
    case "envio-datos-modificar-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_POST['val-idunico-modificar'])) ? NULL : $_POST['val-idunico-modificar']; // ID UNICO DE USUARIOS
            $NombresUsuarios = (empty($_POST['val-nombreusuario'])) ? NULL : $_POST['val-nombreusuario']; // NOMBRES DE USUARIOS
            $ApellidosUsuarios = (empty($_POST['val-apellidousuario'])) ? NULL : $_POST['val-apellidousuario']; // APELLIDOS DE USUARIOS
            $CodigoUsuarios = (empty($_POST['val-usuariounico'])) ? NULL : $_POST['val-usuariounico']; // CODIGO UNICO DE USUARIOS
            $CorreoUsuarios = (empty($_POST['val-correo'])) ? NULL : $_POST['val-correo']; // CORREO DE USUARIOS
            $IdRolUsuarios = (empty($_POST['val-rol-usuarios'])) ? NULL : $_POST['val-rol-usuarios']; // ROL DE USUARIOS
            $EstadoUsuarios = (empty($_POST['val-estado-usuarios'])) ? NULL : $_POST['val-estado-usuarios']; // ESTADO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ModificarUsuariosClientesAdministradores($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $CorreoUsuarios, $IdRolUsuarios, $EstadoUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODIFICAR DETALLES USUARIOS / CLIENTES -> ADMINISTRADORES [ENVIO BASE DE DATOS]
    case "envio-datos-modificar-detalles-usuarios-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_POST['val-idunico-modificar'])) ? NULL : $_POST['val-idunico-modificar']; // ID UNICO DE USUARIOS REGISTRADOS
            $DuiUsuarios = (empty($_POST['val-dui'])) ? NULL : $_POST['val-dui']; // DUI USUARIOS
            $NitUsuarios = (empty($_POST['val-nit'])) ? NULL : $_POST['val-nit']; // NIT USUARIOS
            $TelefonoUsuarios = (empty($_POST['val-telefono1'])) ? NULL : $_POST['val-telefono1']; // TELEFONO PRINCIPAL USUARIOS
            $CelularUsuarios = (empty($_POST['val-telefono2'])) ? NULL : $_POST['val-telefono2'];  // CELULAR USUARIOS
            $DireccionUsuarios = (empty($_POST['val-direccion1'])) ? NULL : $_POST['val-direccion1']; // DIRECCION RESIDENCIA USUARIOS
            $EmpresaUsuarios = (empty($_POST['val-nombreempresa'])) ? NULL : $_POST['val-nombreempresa']; // NOMBRE EMPRESA TRABAJO USUARIOS
            $CargoEmpresaUsuarios = (empty($_POST['val-cargoempresa'])) ? NULL : $_POST['val-cargoempresa']; // CARGO DESEMPEÑADO USUARIOS
            $DireccionTrabajoUsuarios = (empty($_POST['val-direccion2'])) ? NULL : $_POST['val-direccion2']; // DIRECCION EMPRESA USUARIOS
            $TelefonoTrabajoUsuarios = (empty($_POST['val-telefono3'])) ? NULL : $_POST['val-telefono3']; // TELEFONO TRABAJO USUARIOS
            $FechaNacimientoUsuarios = (empty($_POST['val-fechanacimiento'])) ? NULL : $_POST['val-fechanacimiento']; // FECHA DE NACIMIENTO USUARIOS
            $GeneroUsuarios = (empty($_POST['val-genero'])) ? NULL : $_POST['val-genero']; // GENERO USUARIOS
            $EstadoCivilUsuarios = (empty($_POST['val-estadocivil'])) ? NULL : $_POST['val-estadocivil']; // ESTADO CIVIL USUARIOS
            /*
            --------------------------------------------------------------------------------------------
                IMPORTANTE: EL FORMATO DE CAMBIO DE NOMBRE DE LAS FOTOGRAFIAS SUBIDAS EN LOS
                CAMPOS SOLICITADOS ES EL SIGUIENTE:

                    DOCUMENTO UNICO DE IDENTIDAD [ DUI ] -> FRONTAL
                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                    DOCUMENTO UNICO DE IDENTIDAD [ DUI ] -> REVERSO
                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>
                    
                     NUMERO DE IDENTIFICACION TRIBUTARIA [ NIT ]
                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                    FIRMA DE CLIENTES [ GENERADA EN MAQUINA LECTORA DE FIRMAS ]
                            <<<<   FechaActual_IdUnico_NombreArchivo.Extension >>>>

                EL NOMBRE DEL ARCHIVO SE MANTIENE, UNICAMENTE CON LOS AGREGADOS ANTES
                MENCIONADOS.
            --------------------------------------------------------------------------------------------    
            */
            // >> DOCUMENTO UNICO DE IDENTIDAD [DUI] -> FRENTE DE DOCUMENTO <<
            $FotoDuiUsuariosFrontal = $_FILES['fotoduiusuariosfrontal']['name']; // FOTO DUI DE USUARIO
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            /* POR EL MISMO USUARIO SERAN UTILIZADOS ESTOS IDENTIFICADORES UNICOS */
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFoto  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioDuiFrontal = "../vista/images/fotoduifrontal/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosfrontal']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoDuiFrontal = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosfrontal']['name'];
            // >> DOCUMENTO UNICO DE IDENTIDAD [DUI] -> REVERSO DE DOCUMENTO <<
            $FotoDuiUsuariosReverso = $_FILES['fotoduiusuariosreverso']['name']; // FOTO DUI DE USUARIO
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            /* POR EL MISMO USUARIO SERAN UTILIZADOS ESTOS IDENTIFICADORES UNICOS */
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFoto  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioDuiReverso = "../vista/images/fotoduireverso/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosreverso']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoDuiReverso = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotoduiusuariosreverso']['name'];
            // >> NUMERO DE IDENTIFICACION TRIBUTARIA [NIT] <<
            $FotoNitUsuarios = $_FILES['fotonitusuarios']['name']; // FOTO NIT DE USUARIO
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioNit = "../vista/images/fotonit/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotonitusuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoNit = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotonitusuarios']['name'];
            // >> FIRMA DE CLIENTES GENERADA EN MAQUINA LECTORA DE FIRMAS [FIRMA CLIENTES] <<
            $FotoFirmaUsuarios = $_FILES['fotofirmausuarios']['name']; // FOTO FIRMA DE USUARIO
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioFirmas = "../vista/images/fotofirmas/" . $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotofirmausuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoFirmaClientes = $FechaActual . "_" . $IdUnicoFoto . "_" . $_FILES['fotofirmausuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ModificarDetallesUsuariosClientes($conectarsistema, $IdUsuarios, $DuiUsuarios, $NitUsuarios, $TelefonoUsuarios, $CelularUsuarios, $TelefonoTrabajoUsuarios, $DireccionUsuarios, $EmpresaUsuarios, $CargoEmpresaUsuarios, $DireccionTrabajoUsuarios, $FechaNacimientoUsuarios, $GeneroUsuarios, $EstadoCivilUsuarios, $NombreNuevoDuiFrontal, $NombreNuevoDuiReverso, $NombreNuevoNit, $NombreNuevoFirmaClientes);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [DUI] -> FRENTE
                copy($_FILES['fotoduiusuariosfrontal']['tmp_name'], $DirectorioDuiFrontal);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [DUI] -> REVERSO
                copy($_FILES['fotoduiusuariosreverso']['tmp_name'], $DirectorioDuiReverso);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [NIT]
                copy($_FILES['fotonitusuarios']['tmp_name'], $DirectorioNit);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA [FIRMA]
                copy($_FILES['fotofirmausuarios']['tmp_name'], $DirectorioFirmas);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // VER - CONSULTAR INFORMACION DETALLA DE DE USUARIOS / CLIENTES -> TODOS LOS USUARIOS
        // DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "consulta-completa-usuarios-clientes":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA -> DETALLES DE CUENTA DE USUARIOS Y DETALLES ESPECIFICOS DE USUARIOS / CLIENTES REGISTRADOS
            $consulta = $Gestiones->ConsultarDetallesCompletosModificarUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/Administradores/consulta-completa-usuarios-clientes-administradores.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // VER - CONSULTAR INFORMACION DETALLA DE DE USUARIOS / CLIENTES -> TODOS LOS USUARIOS
        // DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "consulta-completa-usuarios-clientes-presidencia":
        // VISTA VALIDA SOLO PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA -> DETALLES DE CUENTA DE USUARIOS Y DETALLES ESPECIFICOS DE USUARIOS / CLIENTES REGISTRADOS
            $consulta = $Gestiones->ConsultarDetallesCompletosModificarUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/Presidencia/consulta-completa-usuarios-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // VER - CONSULTAR INFORMACION DETALLA DE DE USUARIOS / CLIENTES -> TODOS LOS USUARIOS
        // DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE consulta-completa-usuarios-clientes-atencion-al-cliente.php
    case "consulta-completa-usuarios-clientes-gerencia":
        // VISTA VALIDA SOLO PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA -> DETALLES DE CUENTA DE USUARIOS Y DETALLES ESPECIFICOS DE USUARIOS / CLIENTES REGISTRADOS
            $consulta = $Gestiones->ConsultarDetallesCompletosModificarUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/consulta-completa-usuarios-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // VER - CONSULTAR INFORMACION DETALLA DE DE USUARIOS / CLIENTES -> TODOS LOS USUARIOS
        // DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "consulta-completa-usuarios-clientes-atencion-al-cliente":
        // VISTA VALIDA SOLO PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA -> DETALLES DE CUENTA DE USUARIOS Y DETALLES ESPECIFICOS DE USUARIOS / CLIENTES REGISTRADOS
            $consulta = $Gestiones->ConsultarDetallesCompletosModificarUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/AtencionClientes/consulta-completa-usuarios-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // DESACTIVAR USUARIOS / CLIENTES -> ADMINISTRADORES
    case "desactivar-usuarios-clientes":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->DesactivarUsuariosClientes($conectarsistema, $IdUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // DESACTIVAR USUARIOS / CLIENTES -> ADMINISTRADORES
    case "bloquear-usuarios-clientes":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->BloquearUsuariosClientes($conectarsistema, $IdUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REACTIVAR USUARIOS / CLIENTES -> ADMINISTRADORES
        // FUNCIONAL PARA USUARIOS INACTIVOS Y BLOQUEADOS
    case "reactivar-usuarios-clientes":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ReactivarUsuariosClientes($conectarsistema, $IdUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DE NUEVOS ROLES DE USUARIOS -> ADMINISTRADOR [PAGINA]
    case "registrar-nuevos-roles-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/Administradores/registrar-nuevos-roles-usuarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DE NUEVOS ROLES DE USUARIOS -> ADMINISTRADOR [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-roles-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $NombreRolUsuario = (empty($_POST['val-nombrerolusuarios'])) ? NULL : $_POST['val-nombrerolusuarios']; // NOMBRE ROL DE USUARIOS
            $DescripcionRolUsuario = (empty($_POST['val-descripcion-rolusuarios'])) ? NULL : $_POST['val-descripcion-rolusuarios']; // DESCRIPCION ROL DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombreRolUsuario)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroNuevosRolesUsuarios($conectarsistema, $NombreRolUsuario, $DescripcionRolUsuario);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA COMPLETA ROLES DE USUARIOS REGISTRADOS -> ADMINISTRADOR
    case "consulta-roles-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE ROLES DE USUARIOS REGISTRADOS
            $consulta = $Gestiones->ConsultarRolesUsuariosRegistrados($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-general-roles-usuarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODIFICAR ROLES DE USUARIOS REGISTRADOS -> ADMINISTRADOR [PAGINA] 
    case "modificar-roles-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdRolUsuarios = (empty($_GET['idunicorolusuarios'])) ? NULL : $_GET['idunicorolusuarios']; // ID UNICO DE ROL DE USUARIO REGISTRADO
            $consulta = $Gestiones->ConsultaRolesUsuariosEspecifica($conectarsistema, $IdRolUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/modificar-roles-usuarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODIFICAR ROLES DE USUARIOS REGISTRADOR -> ADMINISTRADOR [ENVIO A BASE DE DATOS]
    case "envio-datos-modificar-roles-usuarios":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdRolUsuarios = (empty($_POST['idunicorolusuarios'])) ? NULL : $_POST['idunicorolusuarios']; // ID UNICO ROL DE USUARIOS
            $NombreRolUsuario = (empty($_POST['val-nombrerolusuarios'])) ? NULL : $_POST['val-nombrerolusuarios']; // NOMBRE ROL DE USUARIOS
            $DescripcionRolUsuario = (empty($_POST['val-descripcion-rolusuarios'])) ? NULL : $_POST['val-descripcion-rolusuarios']; // DESCRIPCION ROL DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdRolUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ModificarRolesUsuarios($conectarsistema, $IdRolUsuarios, $NombreRolUsuario, $DescripcionRolUsuario);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // ELIMINAR ROLES DE USUARIOS REGISTRADOS -> ADMINISTRADOR [ENVIO BASE DE DATOS]
    case "eliminar-roles-usuarios-registrados":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdRolUsuarios = (empty($_POST['idunicorolusuarios'])) ? NULL : $_POST['idunicorolusuarios']; // ID UNICO ROL DE USUARIOS
            if (empty($IdRolUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->EliminarRolesUsuarios($conectarsistema, $IdRolUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DE NUEVOS PRODUCTOS -> OFRECIDOS A LOS CLIENTES -> ADMINISTRADOR [PAGINA]
    case "registrar-nuevos-productos-administrador":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/Administradores/registro-nuevos-productos-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DE NUEVOS PRODUCTOS -> OFRECIDOS A LOS CLIENTES -> ADMINISTRADOR [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-nuevos-productos":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $CodigoProductos = (empty($_POST['val-codigoproducto'])) ? NULL : $_POST['val-codigoproducto']; // CODIGO UNICO DE PRODUCTOS
            $NombreProductos = (empty($_POST['val-nombreproducto'])) ? NULL : $_POST['val-nombreproducto']; // NOMBRE DE PRODUCTOS
            $DescripcionProductos = (empty($_POST['val-descripcion-producto'])) ? NULL : $_POST['val-descripcion-producto']; // DESCRIPCION DE PRODUCTOS
            $RequisitosProductos = (empty($_POST['val-requisitos-producto'])) ? NULL : $_POST['val-requisitos-producto']; // REQUISITOS DE PRODUCTOS
            $EstadoProductos = (empty($_POST['val-estado-producto'])) ? NULL : $_POST['val-estado-producto']; // ESTADO DE PRODUCTOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($CodigoProductos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroNuevosProductos($conectarsistema, $CodigoProductos, $NombreProductos, $DescripcionProductos, $RequisitosProductos, $EstadoProductos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // VER - CONSULTAR PRODUCTOS REGISTRADOS Y OFRECIDOS A CLIENTES -> EMPLEADOS - ADMINISTRADORES
        // VISTA EXCLUSIVA [ADMINISTRADORES]
    case "consultar-productos-cashmanha":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [ACTIVOS]
            $consulta = $Gestiones->ConsultarProductosCashManHA_Activos($conectarsistema);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [INACTIVOS]
            $consulta1 = $Gestiones->ConsultarProductosCashManHA_Inactivos($conectarsistema1);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [EXPIRADOS]
            $consulta2 = $Gestiones->ConsultarProductosCashManHA_Expirados($conectarsistema2);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Administradores/consulta-general-productos-cashmanha.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // VER - CONSULTAR PRODUCTOS REGISTRADOS Y OFRECIDOS A CLIENTES -> EMPLEADOS - ADMINISTRADORES
        // VISTA EXCLUSIVA [PRESIDENCIA]
    case "consultar-productos-cashmanha-presidencia":
        // VISTA VALIDA SOLO PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [ACTIVOS]
            $consulta = $Gestiones->ConsultarProductosCashManHA_Activos($conectarsistema);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [INACTIVOS]
            $consulta1 = $Gestiones->ConsultarProductosCashManHA_Inactivos($conectarsistema1);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [EXPIRADOS]
            $consulta2 = $Gestiones->ConsultarProductosCashManHA_Expirados($conectarsistema2);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Presidencia/consulta-general-productos-cashmanha-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // VER - CONSULTAR PRODUCTOS REGISTRADOS Y OFRECIDOS A CLIENTES -> EMPLEADOS - ADMINISTRADORES
        // VISTA EXCLUSIVA [GERENCIA]
    case "consultar-productos-cashmanha-gerencia":
        // VISTA VALIDA SOLO PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [ACTIVOS]
            $consulta = $Gestiones->ConsultarProductosCashManHA_Activos($conectarsistema);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [INACTIVOS]
            $consulta1 = $Gestiones->ConsultarProductosCashManHA_Inactivos($conectarsistema1);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [EXPIRADOS]
            $consulta2 = $Gestiones->ConsultarProductosCashManHA_Expirados($conectarsistema2);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Gerencia/consulta-general-productos-cashmanha-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // VER - CONSULTAR PRODUCTOS REGISTRADOS Y OFRECIDOS A CLIENTES -> EMPLEADOS - ADMINISTRADORES
        // VISTA EXCLUSIVA [ATENCION AL CLIENTE]
    case "consultar-productos-cashmanha-atencion-clientes":
        // VISTA VALIDA SOLO PARA GERENCIA
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [ACTIVOS]
            $consulta = $Gestiones->ConsultarProductosCashManHA_Activos($conectarsistema);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [INACTIVOS]
            $consulta1 = $Gestiones->ConsultarProductosCashManHA_Inactivos($conectarsistema1);
            // CONSULTA COMPLETA DE PRODUCTOS REGISTRADOS CASHMANHA [EXPIRADOS]
            $consulta2 = $Gestiones->ConsultarProductosCashManHA_Expirados($conectarsistema2);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-general-productos-cashmanha-atencion-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // ACTIVAR PRODUCTOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA
    case "activar-productos-cashmanha":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3) {
            $IdProductos = (empty($_GET['idproducto'])) ? NULL : $_GET['idproducto']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdProductos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActivarProductosCashmanHa($conectarsistema, $IdProductos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // DESACTIVAR PRODUCTOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA
    case "desactivar-productos-cashmanha":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3) {
            $IdProductos = (empty($_GET['idproducto'])) ? NULL : $_GET['idproducto']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdProductos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->DesactivarProductosCashmanHa($conectarsistema, $IdProductos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3)
        break;
        // EXPIRAR PRODUCTOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA
    case "expirar-productos-cashmanha":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3) {
            $IdProductos = (empty($_GET['idproducto'])) ? NULL : $_GET['idproducto']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdProductos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ExpirarProductosCashmanHa($conectarsistema, $IdProductos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3)
        break;
        // CONSULTA ESPECIFICA PRODUCTOS REGISTRADOS CASHMAN HA -> ADMINISTRADORES
    case "consulta-productos-especifica-cashmanha":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdProductos = $_GET['idproducto']; // ID UNICO DE USUARIOS
            // CONSULTA ESPECIFICA DETALLES DE PRODUCTOS REGISTRADOS
            $consulta = $Gestiones->ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-especifica-productos-cashmanha.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA ESPECIFICA PRODUCTOS REGISTRADOS CASHMAN HA -> PRESIDENCIA
    case "consulta-productos-especifica-cashmanha-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdProductos = $_GET['idproducto']; // ID UNICO DE USUARIOS
            // CONSULTA ESPECIFICA DETALLES DE PRODUCTOS REGISTRADOS
            $consulta = $Gestiones->ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-especifica-productos-cashmanha-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA ESPECIFICA PRODUCTOS REGISTRADOS CASHMAN HA -> GERENCIA
    case "consulta-productos-especifica-cashmanha-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdProductos = $_GET['idproducto']; // ID UNICO DE USUARIOS
            // CONSULTA ESPECIFICA DETALLES DE PRODUCTOS REGISTRADOS
            $consulta = $Gestiones->ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-especifica-productos-cashmanha-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // CONSULTA ESPECIFICA PRODUCTOS REGISTRADOS CASHMAN HA -> ATENCION AL CLIENTE
    case "consulta-productos-especifica-cashmanha-atencion-clientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdProductos = $_GET['idproducto']; // ID UNICO DE USUARIOS
            // CONSULTA ESPECIFICA DETALLES DE PRODUCTOS REGISTRADOS
            $consulta = $Gestiones->ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-especifica-productos-cashmanha-atencion-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        //  MODIFICAR PRODUCTOS REGISTRADOS CASHMAN HA -> [PAGINA] {ADMINISTRADORES}
    case "modificar-productos-cashmanha":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdProductos = (empty($_GET['idproducto'])) ? NULL : $_GET['idproducto']; // ID UNICO DE PRODUCTOS
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA DETALLES ESPECIFICOS DE PRODUCTOS REGISTRADOS
            $consulta = $Gestiones->ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/modificar-productos-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        //  MODIFICAR PRODUCTOS REGISTRADOS CASHMAN HA -> [PAGINA] {PRESIDENCIA}
    case "modificar-productos-cashmanha-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdProductos = (empty($_GET['idproducto'])) ? NULL : $_GET['idproducto']; // ID UNICO DE PRODUCTOS
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA DETALLES ESPECIFICOS DE PRODUCTOS REGISTRADOS
            $consulta = $Gestiones->ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/modificar-productos-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODIFICAR PRODUCTOS -> [ENVIO A BASE DE DATOS] {VALIDO SOLO PARA ADMINISTRADORES Y PRESIDENCIA}
    case "envio-datos-modificar-productos-cashmanha":
        // VISTA VALIDA PARA ADMINISTRADORES Y PRESIDENCIA
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 2) {
            $IdProductos = (empty($_POST['val-idunico-producto'])) ? NULL : $_POST['val-idunico-producto']; // ID UNICO PRODUCTO REGISTRADO
            $CodigoProductos = (empty($_POST['val-codigoproducto'])) ? NULL : $_POST['val-codigoproducto']; // CODIGO UNICO DE PRODUCTOS
            $NombreProductos = (empty($_POST['val-nombreproducto'])) ? NULL : $_POST['val-nombreproducto']; // NOMBRE DE PRODUCTOS
            $DescripcionProductos = (empty($_POST['val-descripcion-producto'])) ? NULL : $_POST['val-descripcion-producto']; // DESCRIPCION DE PRODUCTOS
            $RequisitosProductos = (empty($_POST['val-requisitos-producto'])) ? NULL : $_POST['val-requisitos-producto']; // REQUISITOS DE PRODUCTOS
            $EstadoProductos = (empty($_POST['val-estado-producto'])) ? NULL : $_POST['val-estado-producto']; // ESTADO DE PRODUCTOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($CodigoProductos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ModificarProductosRegistrados($conectarsistema, $IdProductos, $CodigoProductos, $NombreProductos, $DescripcionProductos, $RequisitosProductos, $EstadoProductos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3)
        break;
        // ASIGNAR NUEVOS CREDITOS A CLIENTES -> {PAGINA PRINCIPAL - PRIMERA PARTE}
        // VALIDO PARA ADMINISTRADORES
    case "asignacion-nuevos-creditos-clientes":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO GENERAL DE USUARIOS REGISTRADOS CON PERFL COMPLETO Y APTOS PARA INICIAR PROCESO DE GESTIONES DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralClientesNuevosCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-general-usuarios-asignacion-creditos-administrador.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // ASIGNAR NUEVOS CREDITOS A CLIENTES -> {PAGINA PRINCIPAL - PRIMERA PARTE}
        // VALIDO PARA PRESIDENCIA
    case "asignacion-nuevos-creditos-clientes-presidencia":
        // VISTA VALIDA SOLO PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO GENERAL DE USUARIOS REGISTRADOS CON PERFL COMPLETO Y APTOS PARA INICIAR PROCESO DE GESTIONES DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralClientesNuevosCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-general-usuarios-asignacion-creditos-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // ASIGNAR NUEVOS CREDITOS A CLIENTES -> {PAGINA PRINCIPAL - PRIMERA PARTE}
        // VALIDO PARA GERENCIA
    case "asignacion-nuevos-creditos-clientes-gerencia":
        // VISTA VALIDA SOLO PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO GENERAL DE USUARIOS REGISTRADOS CON PERFL COMPLETO Y APTOS PARA INICIAR PROCESO DE GESTIONES DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralClientesNuevosCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-general-usuarios-asignacion-creditos-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // ASIGNAR NUEVOS CREDITOS A CLIENTES -> {PAGINA PRINCIPAL - PRIMERA PARTE}
        // VALIDO PARA ATENCION AL CLIENTE
    case "asignacion-nuevos-creditos-clientes-atencion-al-cliente":
        // VISTA VALIDA SOLO PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO GENERAL DE USUARIOS REGISTRADOS CON PERFL COMPLETO Y APTOS PARA INICIAR PROCESO DE GESTIONES DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralClientesNuevosCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-general-usuarios-asignacion-creditos-atencion-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // CONSULTA NUEVAS SOLICITUDES DE CREDITOS ASIGNADAS -> [PAGINA - SEGUNDA PARTE]
        // SOLICITUD DE NUEVOS CREDITOS ES ENVIADA PRIMERAMENTE AL AREA DE GERENCIA PARA EVALUACION Y ESTUDIO DEL CASO DEL CLIENTE
    case "gestionar-solicitudes-creditos-asignados-clientes-gerencia":
        // VISTA VALIDA SOLO PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultarListadoNuevasSolicitudesCreditosClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/gestionar-solicitudes-creditos-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // CONSULTA NUEVAS SOLICITUDES DE CREDITOS ASIGNADAS -> [PAGINA - TERCERA PARTE]
        // SOLICITUD DE NUEVOS CREDITOS ES ENVIADA PRIMERAMENTE AL AREA DE GERENCIA PARA EVALUACION Y ESTUDIO DEL CASO DEL CLIENTE Y POSTERIORMENTA PASAN AL AREA DE PRESIDENCIA PARA ANALISIS Y ESTUDIO FINAL DEL CASO DEL CLIENTE
    case "gestionar-solicitudes-creditos-asignados-clientes-presidencia":
        // VISTA VALIDA SOLO PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultarListadoNuevasSolicitudesCreditosUltimaRevision($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/gestionar-solicitudes-creditos-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA COMPLETA DE SOLICITUDES DE CREDITOS QUE NESECITAN SER REESTRUCTURADOS SEGUN INDICACION DEL DEPARTAMENTO DE GERENCIA -> LOS RESULTADOS SE FITRAN SEGUN EL USUARIO QUE REGISTRO DICHA SOLICITUD. NO ES VALIDA LA CONSULTA EN ESTE APARTADO DE TODAS LAS SOLICITUDES QUE REQUIERAN LO ANTERIORMENTE CITADO. {VALIDO PARA ADMINISTRADORES}
    case "gestionar-reestructuracion-solicitudes-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $EmpleadoRegistroCredito = $_SESSION['usuario_unico']; // CODIGO DE USUARIO UNICO
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultaEspecificaReestructuracionSolicitudesCreditos($conectarsistema, $EmpleadoRegistroCredito);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/gestionar-solicitudes-reestructuracion-creditos.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA COMPLETA DE SOLICITUDES DE CREDITOS QUE NESECITAN SER REESTRUCTURADOS SEGUN INDICACION DEL DEPARTAMENTO DE GERENCIA -> LOS RESULTADOS SE FITRAN SEGUN EL USUARIO QUE REGISTRO DICHA SOLICITUD. NO ES VALIDA LA CONSULTA EN ESTE APARTADO DE TODAS LAS SOLICITUDES QUE REQUIERAN LO ANTERIORMENTE CITADO. {VALIDO PARA ATENCION AL CLIENTE}
    case "gestionar-reestructuracion-solicitudes-creditos-clientes-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $EmpleadoRegistroCredito = $_SESSION['usuario_unico']; // CODIGO DE USUARIO UNICO
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultaEspecificaReestructuracionSolicitudesCreditos($conectarsistema, $EmpleadoRegistroCredito);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/gestionar-solicitudes-reestructuracion-creditos-atencion-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // GESTIONAR INDIVIDUALMENTE LAS SOLICITUDES DE NUEVOS CREDITOS INGRESADAS -> VALIDO PARA LOS USUARIOS DE GERENCIA [ADMINISTRADORES IGUALMENTE] -> PRIMERA REVISION DE CREDITOS
    case "primera-revision-gestionar-solicitudes-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaPrimeraRevisionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Administradores/gestion-creditos-primer-paso-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // GESTIONAR INDIVIDUALMENTE LAS SOLICITUDES DE NUEVOS CREDITOS INGRESADAS -> VALIDO PARA LOS USUARIOS DE GERENCIA [ADMINISTRADORES IGUALMENTE] -> PRIMERA REVISION DE CREDITOS
    case "primera-revision-gestionar-solicitudes-creditos-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaPrimeraRevisionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Gerencia/gestion-creditos-primer-paso-departamento-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // GESTIONAR INDIVIDUALMENTE LAS SOLICITUDES DE NUEVOS CREDITOS INGRESADAS -> VALIDO PARA LOS USUARIOS DE PRESIDENCIA [ADMINISTRADORES IGUALMENTE] -> SEGUNDA REVISION (FINAL) DE CREDITOS
    case "segunda-revision-gestionar-solicitudes-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaSegundaRevisionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            require('../vista/gestion-creditos-segundo-paso-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // GESTIONAR INDIVIDUALMENTE LAS SOLICITUDES DE NUEVOS CREDITOS INGRESADAS -> VALIDO PARA LOS USUARIOS DE PRESIDENCIA [ADMINISTRADORES IGUALMENTE] -> SEGUNDA REVISION (FINAL) DE CREDITOS
    case "segunda-revision-gestionar-solicitudes-creditos-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaSegundaRevisionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            require('../vista/Presidencia/gestion-creditos-segundo-paso-departamento-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // GESTIONAR INDIVIDUALMENTE LAS SOLICITUDES DE NUEVOS CREDITOS INGRESADAS -> VALIDO PARA LOS USUARIOS DE PRESIDENCIA [ADMINISTRADORES IGUALMENTE] -> SEGUNDA REVISION (FINAL) DE CREDITOS
    case "reestructuracion-solicitudes-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaReestructuracionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Administradores/gestion-creditos-reestructuraciones.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // GESTIONAR INDIVIDUALMENTE LAS SOLICITUDES DE NUEVOS CREDITOS INGRESADAS -> VALIDO PARA LOS USUARIOS DE PRESIDENCIA [ADMINISTRADORES IGUALMENTE] -> SEGUNDA REVISION (FINAL) DE CREDITOS
    case "reestructuracion-solicitudes-creditos-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaReestructuracionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Presidencia/gestion-creditos-reestructuraciones-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // PAGINA DE ASIGNACION DE NUEVOS CREDITOS CLIENTES CASHMAN H.A [INFORMACION CLIENTES]
    case "gestor-creditos-clientes-informacion":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            require('../vista/gestor-asignacion-nuevos-creditos-informacion-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // PAGINA SELECCION DE PRODUCTO A ASIGNAR A CLIENTES [TODOS LOS PRODUCTOS ACTIVOS]
    case "gestor-creditos-seleccion-producto-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA DATOS CLIENTES -> ASIGNACIONES NUEVOS CREDITOS
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            require('../vista/gestor-seleccion-producto-creditos-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // PAGINA DE ASIGNACION DE NUEVOS CREDITOS CLIENTES CASHMAN H.A [PRESTAMOS PERSONALES]
    case "gestor-creditos-clientes-asignacion-prestamo-personal":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA DATOS CLIENTES -> ASIGNACIONES NUEVOS CREDITOS
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA ID UNICO DE CREDITO SOLICITADO POR CLIENTE
            $consulta2 = $Gestiones->ConsultaIdUnicoCreditosClientes($conectarsistema2, $IdUsuarios);
            require('../vista/gestor-nuevos-creditos-personales.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // REGISTRO NUEVA ASIGNACION PRESTAMO PERSONAL CLIENTES -> [ENVIO A BASE DE DATOS]
    case "envio-datos-asignacion-prestamos-cashmanha-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_POST['idclienteunico'])) ? NULL : $_POST['idclienteunico']; // ID UNICO DE CLIENTE REGISTRADO
            $IdProductos = (empty($_POST['productocreditos'])) ? NULL : $_POST['productocreditos']; // ID UNICO DE PRODUCTO REGISTRADO
            $TipoCliente = (empty($_POST['tipoclientecredito'])) ? NULL : $_POST['tipoclientecredito']; // TIIPO DE CLIENTE CREDITO
            $MontoCredito = (empty($_POST['valmontocreditoclientes'])) ? NULL : $_POST['valmontocreditoclientes']; // MONTO FINANCIAMIENTO CREDITO
            $InteresCredito = (empty($_POST['rangointereses'])) ? NULL : $_POST['rangointereses']; // TASA DE INTERES CREDITO
            $PlazoCredito = (empty($_POST['valplazocredito'])) ? NULL : $_POST['valplazocredito']; // PLAZO FINANCIAMIENTO CREDITO
            $CuotaMensualCredito = (empty($_POST['cuotamensualasignada'])) ? NULL : $_POST['cuotamensualasignada']; // CUOTA MENSUAL ASIGNADA CREDITO
            $FechaSolicitud = (empty($_POST['valfechaingresosolicitud'])) ? NULL : $_POST['valfechaingresosolicitud']; // FECHA INGRESO SOLICITUD CREDITO
            $SalarioCliente = (empty($_POST['valsalariocliente'])) ? NULL : $_POST['valsalariocliente']; // SALARIO - INGRESO / CLIENTES
            // IMPORTANTE -> ESTE CAMPO REFLEJA EL SALDO ACTUAL DEL CREDITO SEGUN EL TRANSCURSO DEL MISMO APLICADO EN EL PLAZO ACORDADO CON EL CLIENTE. SEGUN LOS PAGARÉ DE SU RESPONSABILIDAD CREDITICIA EL MISMO DISMINUYE AUTOMATICAMENTE --> INFORMACION REFLEJADA EN EL PORTAL DE CLIENTES Y DEMAS PORTALES DE INTERES DENTRO DE LA EMPRESA
            $SaldoActualCreditos = (empty($_POST['valmontocreditoclientes'])) ? NULL : $_POST['valmontocreditoclientes']; // SALDO ACTUAL DE CREDITO
            $ObservacionesCredito = (empty($_POST['valobservaciones'])) ? NULL : $_POST['valobservaciones'];  // OBSERVACIONES SOLICITUD CREDITO CLIENTES
            $CodigoEmpleadoGestion = $_SESSION['usuario_unico']; // CODIGO UNICO DE EMPLEADO QUE GESTIONA CREDITO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($TipoCliente)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroNuevaAsignacionesCreditosClientes($conectarsistema, $IdUsuarios, $IdProductos, $TipoCliente, $MontoCredito, $InteresCredito, $PlazoCredito, $CuotaMensualCredito, $FechaSolicitud, $SalarioCliente, $SaldoActualCreditos, $ObservacionesCredito, $CodigoEmpleadoGestion);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // PAGINA DE ASIGNACION DE REFERENCIAS PERSONALES CLIENTES NUEVOS / ANTIGUOS -> CASHMAN H.A
    case "gestor-creditos-referencias-personales-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA DATOS CLIENTES -> ASIGNACIONES NUEVOS CREDITOS
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA CONFIRMACION DATOS INGRESO REFERENCIAS PERSONALES LABORALES CLIENTES
            $consulta1 = $Gestiones->ConsultaConfirmacionReferenciasPersonalesLaboralesClientes($conectarsistema1, $IdUsuarios);
            // CONSULTA ID UNICO DE CREDITO SOLICITADO POR CLIENTE
            $consulta2 = $Gestiones->ConsultaIdUnicoCreditosClientes($conectarsistema2, $IdUsuarios);
            // CONSULTAR EXISTENCIAS REFERENCIAS PERSONALES CLIENTES
            $consulta3 = $Gestiones->ConsultaExistenciasReferenciasClientes($conectarsistema3, $IdUsuarios);
            require('../vista/gestor-referencias-personales-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // REGISTRO NUEVAS REFERENCIAS PERSONALES CLIENTES -> [ENVIO A BASE DE DATOS]
    case "envio-datos-asignacion-nuevas-referencias-personales-laborales-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCreditos = (empty($_POST['idunicocreditoclientes'])) ? NULL : $_POST['idunicocreditoclientes']; // ID UNICO CREDITO REGISTRADO DE CLIENTES
            $IdUsuarios = (empty($_POST['idclienteunico'])) ? NULL : $_POST['idclienteunico']; // ID UNICO DE CLIENTE REGISTRADO
            $IdProductos = (empty($_POST['idunicoproductoclientes'])) ? NULL : $_POST['idunicoproductoclientes']; // ID UNICO DE PRODUCTO ASOCIADO A CLIENTES
            $NombresReferenciaPersonal = (empty($_POST['val-nombrereferenciapersonal'])) ? NULL : $_POST['val-nombrereferenciapersonal']; // NOMBRES REFERENCIA PERSONAL CLIENTES
            $ApellidosReferenciaPersonal = (empty($_POST['val-apellidosreferenciapersonal'])) ? NULL : $_POST['val-apellidosreferenciapersonal']; // APELLIDOS REFERENCIA PERSONAL CLIENTES
            $EmpresaReferenciaPersonal = (empty($_POST['val-empresareferenciapersonal'])) ? NULL : $_POST['val-empresareferenciapersonal']; // EMPRESA REFERENCIA PERSONAL CLIENTES
            $ProfesionOficioReferenciaPersonal = (empty($_POST['val-profesionreferenciapersonal'])) ? NULL : $_POST['val-profesionreferenciapersonal']; // PROFESION U OFICIO REFERENCIA PERSONAL CLIENTES
            $TelefonoReferenciaPersonal = (empty($_POST['val-telefonoreferenciapersonal'])) ? NULL : $_POST['val-telefonoreferenciapersonal']; // TELEFONO REFERENCIA PERSONAL CLIENTES
            $NombresReferenciaLaboral = (empty($_POST['val-nombrereferencialaboral'])) ? NULL : $_POST['val-nombrereferencialaboral']; // NOMBRES REFERENCIA LABORAL CLIENTES
            $ApellidosReferenciaLaboral = (empty($_POST['val-apellidosreferencialaboral'])) ? NULL : $_POST['val-apellidosreferencialaboral']; // APELLIDOS REFERENCIA LABORAL CLIENTES
            $EmpresaReferenciaLaboral = (empty($_POST['val-empresareferencialaboral'])) ? NULL : $_POST['val-empresareferencialaboral']; // EMPRESA REFERENCIA LABORAL CLIENTES
            $ProfesionReferenciaLaboral = (empty($_POST['val-profesionreferencialaboral'])) ? NULL : $_POST['val-profesionreferencialaboral']; // PROFESION U OFICIO  REFERENCIA LABORAL CLIENTES
            $TelefonoReferenciaLaboral = (empty($_POST['val-telefonoreferencialaboral'])) ? NULL : $_POST['val-telefonoreferencialaboral']; // TELEFONO REFERENCIA LABORAL CLIENTES
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresReferenciaPersonal)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroNuevasReferenciasPersonalesLaborales($conectarsistema, $IdCreditos, $IdUsuarios, $IdProductos, $NombresReferenciaPersonal, $ApellidosReferenciaPersonal, $EmpresaReferenciaPersonal, $ProfesionOficioReferenciaPersonal, $TelefonoReferenciaPersonal, $NombresReferenciaLaboral, $ApellidosReferenciaLaboral, $EmpresaReferenciaLaboral, $ProfesionReferenciaLaboral, $TelefonoReferenciaLaboral);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // REGISTRO NUEVAS REFERENCIAS PERSONALES CLIENTES -> [ENVIO A BASE DE DATOS]
    case "envio-datos-modificar-referencias-personales-laborales-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdReferenciasClientes = (empty($_POST['idunicoreferenciaclientes'])) ? NULL : $_POST['idunicoreferenciaclientes']; // ID UNICO DE REFERENCIAS REGISTRADO DE CLIENTES
            $IdCreditos = (empty($_POST['idunicocreditoclientes'])) ? NULL : $_POST['idunicocreditoclientes']; // ID UNICO CREDITO REGISTRADO DE CLIENTES
            $IdUsuarios = (empty($_POST['idclienteunico'])) ? NULL : $_POST['idclienteunico']; // ID UNICO DE CLIENTE REGISTRADO
            $IdProductos = (empty($_POST['idunicoproductoclientes'])) ? NULL : $_POST['idunicoproductoclientes']; // ID UNICO DE PRODUCTO ASOCIADO A CLIENTES
            $NombresReferenciaPersonal = (empty($_POST['val-nombrereferenciapersonal'])) ? NULL : $_POST['val-nombrereferenciapersonal']; // NOMBRES REFERENCIA PERSONAL CLIENTES
            $ApellidosReferenciaPersonal = (empty($_POST['val-apellidosreferenciapersonal'])) ? NULL : $_POST['val-apellidosreferenciapersonal']; // APELLIDOS REFERENCIA PERSONAL CLIENTES
            $EmpresaReferenciaPersonal = (empty($_POST['val-empresareferenciapersonal'])) ? NULL : $_POST['val-empresareferenciapersonal']; // EMPRESA REFERENCIA PERSONAL CLIENTES
            $ProfesionOficioReferenciaPersonal = (empty($_POST['val-profesionreferenciapersonal'])) ? NULL : $_POST['val-profesionreferenciapersonal']; // PROFESION U OFICIO REFERENCIA PERSONAL CLIENTES
            $TelefonoReferenciaPersonal = (empty($_POST['val-telefonoreferenciapersonal'])) ? NULL : $_POST['val-telefonoreferenciapersonal']; // TELEFONO REFERENCIA PERSONAL CLIENTES
            $NombresReferenciaLaboral = (empty($_POST['val-nombrereferencialaboral'])) ? NULL : $_POST['val-nombrereferencialaboral']; // NOMBRES REFERENCIA LABORAL CLIENTES
            $ApellidosReferenciaLaboral = (empty($_POST['val-apellidosreferencialaboral'])) ? NULL : $_POST['val-apellidosreferencialaboral']; // APELLIDOS REFERENCIA LABORAL CLIENTES
            $EmpresaReferenciaLaboral = (empty($_POST['val-empresareferencialaboral'])) ? NULL : $_POST['val-empresareferencialaboral']; // EMPRESA REFERENCIA LABORAL CLIENTES
            $ProfesionReferenciaLaboral = (empty($_POST['val-profesionreferencialaboral'])) ? NULL : $_POST['val-profesionreferencialaboral']; // PROFESION U OFICIO  REFERENCIA LABORAL CLIENTES
            $TelefonoReferenciaLaboral = (empty($_POST['val-telefonoreferencialaboral'])) ? NULL : $_POST['val-telefonoreferencialaboral']; // TELEFONO REFERENCIA LABORAL CLIENTES
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombresReferenciaPersonal)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ModificarInformacionReferenciasPersonalesLaborales($conectarsistema, $IdReferenciasClientes, $IdCreditos, $IdProductos, $NombresReferenciaPersonal, $ApellidosReferenciaPersonal, $EmpresaReferenciaPersonal, $ProfesionOficioReferenciaPersonal, $TelefonoReferenciaPersonal, $NombresReferenciaLaboral, $ApellidosReferenciaLaboral, $EmpresaReferenciaLaboral, $ProfesionReferenciaLaboral, $TelefonoReferenciaLaboral);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // PAGINA DE ASIGNACION DE NUEVOS CREDITOS CLIENTES CASHMAN H.A [PRESTAMOS HIPOTECARIOS]
    case "gestor-creditos-clientes-asignacion-prestamo-hipotecario":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL :  $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA DATOS CLIENTES -> ASIGNACIONES NUEVOS CREDITOS
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA ID UNICO DE CREDITO SOLICITADO POR CLIENTE
            $consulta2 = $Gestiones->ConsultaIdUnicoCreditosClientes($conectarsistema2, $IdUsuarios);
            require('../vista/gestor-nuevos-creditos-hipotecarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // PAGINA DE ASIGNACION DE NUEVOS CREDITOS CLIENTES CASHMAN H.A [PRESTAMOS HIPOTECARIOS]
    case "gestor-creditos-clientes-asignacion-prestamo-vehiculos":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE
        // LOS EMPLEADOS DE [ATENCION AL CLIENTE] SON QUIENES PRINCIPALMENTE GESTIONARAN TODAS LAS NUEVAS SOLICITUDES CREDITICIAS -> EN CASOS MUY PUNTUALES PUEDE HACERLO LOS OTROS ROLES DE USUARIOS EXCLUYENDO A [CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL :  $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA DATOS CLIENTES -> ASIGNACIONES NUEVOS CREDITOS
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA ID UNICO DE CREDITO SOLICITADO POR CLIENTE
            $consulta2 = $Gestiones->ConsultaIdUnicoCreditosClientes($conectarsistema2, $IdUsuarios);
            require('../vista/gestor-nuevos-creditos-vehiculos.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // GESTION DE PRIMERA REVISION DEPARTAMENTO DE GERENCIA DE NUEVAS SOLICITUDES DE CREDITOS CLIENTES -> ENVIO DE DATOS [BASE DE DATOS]
        // ESTE PROCEDIMIENTO ES VALIDO PARA LOS USUARIOS CON ROLES ADMINISTRADORES Y GERENCIA 
    case "envio-datos-revisiones-solicitudes-nuevas-creditos-clientes":
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) {
            $IdCreditos = (empty($_POST['idunicocreditoregistrado'])) ? NULL : $_POST['idunicocreditoregistrado']; // ID UNICO DE SOLICITUD DE CREDITO ASIGNADO A CLIENTE
            $TipoCliente = (empty($_POST['tipoclientecredito'])) ? NULL : $_POST['tipoclientecredito']; // TIIPO DE CLIENTE CREDITO
            $MontoCredito = (empty($_POST['valmontocreditoclientes'])) ? NULL : $_POST['valmontocreditoclientes']; // MONTO FINANCIAMIENTO CREDITO
            $InteresCredito = (empty($_POST['rangointereses'])) ? NULL : $_POST['rangointereses']; // TASA DE INTERES CREDITO
            $PlazoCredito = (empty($_POST['valplazocredito'])) ? NULL : $_POST['valplazocredito']; // PLAZO FINANCIAMIENTO CREDITO
            $CuotaMensualCredito = (empty($_POST['cuotamensualasignada'])) ? NULL : $_POST['cuotamensualasignada']; // CUOTA MENSUAL ASIGNADA CREDITO
            $SalarioCliente = (empty($_POST['valsalariocliente'])) ? NULL : $_POST['valsalariocliente']; // SALARIO - INGRESO / CLIENTES
            $EstadoActualCreditos = (empty($_POST['valestadoinicialcreditos'])) ? NULL : $_POST['valestadoinicialcreditos']; // ESTADO DE SOLICITUD DE CREDITOS CLIENTES
            $ObservacionesCredito = (empty($_POST['valobservacionesgerencia'])) ? NULL : $_POST['valobservacionesgerencia'];  // OBSERVACIONES SOLICITUD CREDITO CLIENTES
            $CodigoEmpleadoGestion = $_SESSION['usuario_unico']; // CODIGO UNICO DE EMPLEADO QUE GESTIONA CREDITO
            // VALIDACION DE PROGRESO SEGUN OPCION SELECCIONADA EN ESTADO INICIAL
            if ($EstadoActualCreditos == "reestructuracion") {
                $ProgresoInicialSolicitudCreditos = 40; // % POR CIENTO
            } else if ($EstadoActualCreditos == "denegado") {
                $ProgresoInicialSolicitudCreditos = 0; // % POR CIENTO
            } else if ($EstadoActualCreditos == "aprobacioninicial") {
                $ProgresoInicialSolicitudCreditos = 70; // % POR CIENTO
            }
            $FechaUltimaActualizacionRevision = date('Y-m-d H:i:s'); // OBTENER FECHA Y HORA COMPLETA DE ACTUALIZACION DE REVISION CREDITICIA INICIAL
            $NuevoSaldoCreditosClientes = (empty($_POST['valmontocreditoclientes'])) ? NULL : $_POST['valmontocreditoclientes']; // SI EXISTE CAMBIO EN EL SALDO DE LA SOLICITUD CREDITICIA -> ESTA VARIABLE TOMA EL NUEVO MONTO Y HACE LA RESPECTIVA ACTUALIZACION EN LA TABLA EN CUESTION
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActualizacionPrimeraRevisionNuevaAsignacionesCreditosClientes($conectarsistema, $IdCreditos, $TipoCliente, $MontoCredito, $InteresCredito, $PlazoCredito, $CuotaMensualCredito, $SalarioCliente, $NuevoSaldoCreditosClientes, $EstadoActualCreditos, $ObservacionesCredito, $ProgresoInicialSolicitudCreditos, $FechaUltimaActualizacionRevision, $CodigoEmpleadoGestion);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR [1]
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 3)
        break;
        // GESTION DE SEGUNDA REVISION DEPARTAMENTO DE PRESIDENCIA DE NUEVAS SOLICITUDES DE CREDITOS CLIENTES -> ENVIO DE DATOS [BASE DE DATOS]
        // ESTE PROCEDIMIENTO ES VALIDO PARA LOS USUARIOS CON ROLES ADMINISTRADORES Y PRESIDENCIA
    case "envio-datos-revision-final-solicitudes-creditos-clientes":
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
            $IdCreditos = (empty($_POST['idunicocreditoregistrado'])) ? NULL : $_POST['idunicocreditoregistrado']; // ID UNICO DE SOLICITUD DE CREDITO ASIGNADO A CLIENTE
            $EstadoActualCreditos = (empty($_POST['valestadofinalcreditos'])) ? NULL : $_POST['valestadofinalcreditos']; // ESTADO DE SOLICITUD DE CREDITOS CLIENTES
            $ObservacionesPresidenciaCreditos = (empty($_POST['valobservacionespresidencia'])) ? NULL : $_POST['valobservacionespresidencia'];  // OBSERVACIONES SOLICITUD CREDITO CLIENTES
            $CodigoEmpleadoGestion = $_SESSION['usuario_unico']; // CODIGO UNICO DE EMPLEADO QUE GESTIONA CREDITO
            $FechaUltimaActualizacionRevision = date('Y-m-d H:i:s'); // OBTENER FECHA Y HORA COMPLETA DE ACTUALIZACION DE REVISION CREDITICIA FINAL
            $ProgresoInicialSolicitudCreditos = 100; // % POR CIENTO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActualizacionSegundaRevisionNuevaAsignacionesCreditosClientes($conectarsistema, $IdCreditos, $EstadoActualCreditos, $ObservacionesPresidenciaCreditos, $ProgresoInicialSolicitudCreditos, $FechaUltimaActualizacionRevision, $CodigoEmpleadoGestion);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA GENERAL DE CLIENTES QUE POSEEN SU SOLICITUD DE CREDITO APROBADA -> SECCION EN DONDE SE GENERAN LAS CUOTAS MENSUALES Y CONTRATO EN PRESENCIA DEL CLIENTE EN CUESTION [VALIDO PARA ADMINISTRADORES]
    case "consulta-gestiones-creditos-clientes-aprobadas":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultarListadoSolicitudesCreditosClientesAprobadas($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/gestionar-solicitudes-creditos-aprobadas.php');
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA GENERAL DE CLIENTES QUE POSEEN SU SOLICITUD DE CREDITO APROBADA -> SECCION EN DONDE SE GENERAN LAS CUOTAS MENSUALES Y CONTRATO EN PRESENCIA DEL CLIENTE EN CUESTION [VALIDO PARA PRESIDENCIA]
    case "consulta-gestiones-creditos-clientes-aprobadas-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultarListadoSolicitudesCreditosClientesAprobadas($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/gestionar-solicitudes-creditos-aprobadas-presidencia.php');
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA GENERAL DE CLIENTES QUE POSEEN SU SOLICITUD DE CREDITO APROBADA -> SECCION EN DONDE SE GENERAN LAS CUOTAS MENSUALES Y CONTRATO EN PRESENCIA DEL CLIENTE EN CUESTION [VALIDO PARA PRESIDENCIA]
    case "consulta-gestiones-creditos-clientes-aprobadas-atencion-clientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DE USUARIOS QUE LE HAN SIDO INGRESADAS NUEVAS SOLICITUDES DE CREDITOS
            $consulta = $Gestiones->ConsultarListadoSolicitudesCreditosClientesAprobadas($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/gestionar-solicitudes-creditos-aprobadas-atencion-al-cliente.php');
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // GESTIONADOR DE ASIGNACION DE CUOTAS MENSUALES Y GENERADOR DE CONTRATOS FINALES A CLIENTES QUE TENGAN APROBADO SU SOLICITUD CREDITICIA [VALIDO PARA ADMINISTRADORES]
    case "gestionador-cuotas-contratos-solicitudes-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA DE DATOS DE VEHICULOS -> PRESTAMOS DE VEHICULOS APROBADOS
            $consulta2 = $Gestiones->ConsultaDatosVehiculos_PrestamosdeVehiculos($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Administradores/gestionador-cuotas-contratos-creditos.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // GESTIONADOR DE ASIGNACION DE CUOTAS MENSUALES Y GENERADOR DE CONTRATOS FINALES A CLIENTES QUE TENGAN APROBADO SU SOLICITUD CREDITICIA [VALIDO PARA ATENCION AL CLIENTE]
    case "gestionador-cuotas-contratos-solicitudes-creditos-clientes-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA DE DATOS DE VEHICULOS -> PRESTAMOS DE VEHICULOS APROBADOS
            $consulta2 = $Gestiones->ConsultaDatosVehiculos_PrestamosdeVehiculos($conectarsistema2, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta3 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/AtencionClientes/gestionador-cuotas-contratos-creditos-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE ESTADO DE CUENTA QUE SERA ENTREGADO A LOS CLIENTES QUE INICIEN SUS CREDITOS CON ESTA EMPRESA // VALIDO PARA ADMINISTRADORES
    case "impresion-estado-cuenta-cuotas-nuevos-creditos":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            // CONSULTA VALIDA CUANDO LAS RESPECTIVAS CUOTAS SE HAYAN REGISTRADO EN EL SISTEMA
            $consulta2 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema2, $IdUsuarios);
            // CONSULTA NOMBRE COPIA CONTRATO SUSCRITO -> CREDITOS CLIENTES
            $consulta3 = $Gestiones->ConsultarCopiaContratoCreditosClientes($conectarsistema3, $IdUsuarios);
            require('../vista/Administradores/estado-cuenta-nuevos-creditos-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE ESTADO DE CUENTA QUE SERA ENTREGADO A LOS CLIENTES QUE INICIEN SUS CREDITOS CON ESTA EMPRESA // VALIDO PARA PRESIDENCIA
    case "impresion-estado-cuenta-cuotas-nuevos-creditos-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            // CONSULTA VALIDA CUANDO LAS RESPECTIVAS CUOTAS SE HALLAN REGISTRADO EN EL SISTEMA
            $consulta2 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema2, $IdUsuarios);
            // CONSULTA NOMBRE COPIA CONTRATO SUSCRITO -> CREDITOS CLIENTES
            $consulta3 = $Gestiones->ConsultarCopiaContratoCreditosClientes($conectarsistema3, $IdUsuarios);
            require('../vista/Presidencia/estado-cuenta-nuevos-creditos-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // PAGINA DE ESTADO DE CUENTA QUE SERA ENTREGADO A LOS CLIENTES QUE INICIEN SUS CREDITOS CON ESTA EMPRESA // VALIDO PARA GERENCIA
    case "impresion-estado-cuenta-cuotas-nuevos-creditos-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            // CONSULTA VALIDA CUANDO LAS RESPECTIVAS CUOTAS SE HAYAN REGISTRADO EN EL SISTEMA
            $consulta2 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema2, $IdUsuarios);
            // CONSULTA NOMBRE COPIA CONTRATO SUSCRITO -> CREDITOS CLIENTES
            $consulta3 = $Gestiones->ConsultarCopiaContratoCreditosClientes($conectarsistema3, $IdUsuarios);
            require('../vista/Gerencia/estado-cuenta-nuevos-creditos-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // PAGINA DE ESTADO DE CUENTA QUE SERA ENTREGADO A LOS CLIENTES QUE INICIEN SUS CREDITOS CON ESTA EMPRESA // VALIDO PARA ATENCION AL CLIENTE
    case "impresion-estado-cuenta-cuotas-nuevos-creditos-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            // CONSULTA VALIDA CUANDO LAS RESPECTIVAS CUOTAS SE HAYAN REGISTRADO EN EL SISTEMA
            $consulta2 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema2, $IdUsuarios);
            // CONSULTA NOMBRE COPIA CONTRATO SUSCRITO -> CREDITOS CLIENTES
            $consulta3 = $Gestiones->ConsultarCopiaContratoCreditosClientes($conectarsistema3, $IdUsuarios);
            require('../vista/AtencionClientes/estado-cuenta-nuevos-creditos-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // PAGINA DE ESTADO DE CUENTA QUE SERA ENTREGADO A LOS CLIENTES QUE INICIEN SUS CREDITOS CON ESTA EMPRESA // VALIDO PARA CLIENTES [QUIENES HAN ADQUIRIDO UN PRODUCTO DE LA EMPRESA]
    case "impresion-estado-cuenta-cuotas-nuevos-creditos-portal-clientes":
        // VISTA VALIDA PARA CLIENTES [PORTAL DE CLIENTES CASHMAN H.A]
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            // CONSULTA VALIDA CUANDO LAS RESPECTIVAS CUOTAS SE HAYAN REGISTRADO EN EL SISTEMA
            $consulta2 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema2, $IdUsuarios);
            // CONSULTA NOMBRE COPIA CONTRATO SUSCRITO -> CREDITOS CLIENTES
            $consulta3 = $Gestiones->ConsultarCopiaContratoCreditosClientes($conectarsistema3, $IdUsuarios);
            // CONSULTAR DISPONIBILIDAD NUEVOS CREDITOS CLIENTES
            $consulta4 = $Gestiones->ConsultarDisponibilidadAsignacionNuevasSolicitudesCrediticias($conectarsistema4, $IdUsuarios);
            require('../vista/Clientes/estado-cuenta-nuevos-creditos-clientes-portal-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // REGISTRO DE CUOTAS MENSUALES DE CREDITOS APROBADOS (SEGUN ESTADO DE CUENTA GENERADO AUTOMATICAMENTE) -> ENVIO DE DATOS [BASE DE DATOS]
        // DISPONIBLE UNICAMENTE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "envio-datos-estado-cuenta-creditos-clientes":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCreditos = (empty($_POST['CodigoUnicoCreditoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoCreditoEstadoCuenta']; // ID UNICO DE CREDITO REGISTRADO
            $IdUsuarios = (empty($_POST['CodigoUnicoCreditoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoUsuarioEstadoCuenta']; // ID UNICO DE USUARIO QUE SOLICITO CREDITO
            $IdProductos = (empty($_POST['CodigoUnicoProductoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoProductoEstadoCuenta']; // ID UNICO DE PRODUCTO QUE ASOCIADO CREDITO
            $NombreProductos = (empty($_POST['NombreProductoEstadoCuenta'])) ? NULL : $_POST['NombreProductoEstadoCuenta']; // NOMBRE DE PRODUCTO ASOCIADO A CLIENTE      
            $FechaSolicitud = (empty($_POST['FechaPagoEstadoCuenta'])) ? NULL : $_POST['FechaPagoEstadoCuenta']; // FECHA DE INGRESO DE SOLICITUD -> MISMA PARA GENERAR CUOTAS MENSUALES
            $CuotaMensualCredito = (empty($_POST['CuotaMensualEstadoCuenta'])) ? NULL : $_POST['CuotaMensualEstadoCuenta']; // CUOTA MENSUAL ASIGNADA A CREDITO ADQUIRIDO POR CLIENTE
            $MontoCapitalCredito = (empty($_POST['MontoCapitalEstadoCuenta'])) ? NULL : $_POST['MontoCapitalEstadoCuenta']; // MONTO CAPITAL A CANCELAR POR CLIENTE SEGUN CREDITO ADQUIRIDO POR CLIENTE    
            // VALIDACION SEGUN DIA DE INGRESO SOLICITUD
            $ValidarDiaIngresoSolicitud = $FechaSolicitud; // FECHA COMPLETA PREDETERMINADA
            $ExtraerFechaSolicitud = strtotime($FechaSolicitud); // OBTENER FECHA COMPLETA DE SOLICITUD
            $ObtenerDiaSolicitud = date("d", $ExtraerFechaSolicitud); // OBTENER UNICAMENTE DIA DE SOLICITUD
            if ($ObtenerDiaSolicitud >= 29 && $ObtenerDiaSolicitud <= 31) {
                $PlazoCredito = (empty($_POST['PlazoPagoEstadoCuenta'])) ? NULL : $_POST['PlazoPagoEstadoCuenta']; // PLAZO EN MESES A PAGAR SEGUN CREDITO ADQUIRIDO POR CLIENTE
            } else {
                $PlazoCredito = (empty($_POST['PlazoPagoEstadoCuenta'])) ? NULL : $_POST['PlazoPagoEstadoCuenta'] + 1; // PLAZO EN MESES A PAGAR SEGUN CREDITO ADQUIRIDO POR CLIENTE
            } // CIERRE if ($ObtenerDiaSolicitud >= 29 && $ObtenerDiaSolicitud <= 31)
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // GENERAR CUOTAS MENSUALES CLIENTES -> TODOS LOS PRODUCTOS DISPONIBLES EN SISTEMA
                $CompletarFecha = 0; // FECHAS ENTRE 01 A 09 SE LES AGREGA EL RESPECTIVO '0 - CERO' -> VALIDO EN LOS CALCULOS DE NUEVAS FECHAS (FINES DE SEMANA)
                $FechaSolicitud = $_POST['FechaPagoEstadoCuenta']; // FECHA DE INGRESO SOLICITUD CREDITICIA
                $IntervaloFecha = new DateInterval('P1D'); // INTERVALO DE FECHA -> 1 VEZ AL DIA
                $InicioCreditos = new DateTime($_POST['FechaPagoEstadoCuenta']); // INICIO DE CALCULO CUOTA MENSUAL
                $FechaCompleta = strtotime($FechaSolicitud);
                $ObtenerDia = date("d", $FechaCompleta);
                /*
                RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [25,26,27,28,29,30 Y 31 DE CUALQUIER MES]
        
                -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO Y EVITAR FECHAS INVALIDAS [NO EXISTENTES] AL MOMENTO DE RECALCULAR LAS FECHAS DE PAGO
    
                --> EL MAXIMO DIA PARA RECALCULAR FECHAS DE PAGOS ES <<24>> DE CADA MES, DE 25 A 31 SEGUN MES EN CURSO, LAS ULTIMAS FECHAS DE PAGO SIEMPRE SERAN CADA 28 DE MES 
                
                -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
                */
                if ($ObtenerDia == 25) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 25, ENTONCES SE SUMA TRES DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 3 days"));
                } else if ($ObtenerDia == 26) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 26, ENTONCES SE SUMA DOS DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 2 days"));
                } else if ($ObtenerDia == 27) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 27, ENTONCES SE SUMA UN DIA A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 1 days"));
                } else if ($ObtenerDia == 28) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 28, ENTONCES SE NO SE REALIZA NINGUN CALCULO A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 0 days"));
                } else if ($ObtenerDia == 29) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 29, ENTONCES SE RESTA UN DIA A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("- 1 days"));
                } else if ($ObtenerDia == 30) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 30, ENTONCES SE RESTA DOS DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("- 2 days"));
                } else if ($ObtenerDia == 31) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 31, ENTONCES SE RESTA TRES DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("- 3 days"));
                }
                $FinCreditos = new DateTime(date("Y-m-d", strtotime($FechaSolicitud . "+ $PlazoCredito month"))); // FIN CALCULO CUOTA MENSUAL
                $IntervaloFecha = new DateInterval('P1M');  // INTERVALO DE FECHA -> 1 VEZ AL MES
                $CuotasMensualesGeneradas = new DatePeriod($InicioCreditos, $IntervaloFecha, $FinCreditos); // OBTENIENDO RESULTADO FINAL DE INICIO Y FIN DE CREDITO
                // EXTRAER FECHA COMPLETA COMO ENTERO PARA COMPROBACIONES
                $ExtraerFecha = strtotime($FechaSolicitud); // EXTRAER FECHA COMO ENTERO
                $ObtenerMes = date("m", $ExtraerFecha); // OBTENER UNICAMENTE MES DE FECHA OBTENIDA
                $ObtenerDia = date("d", $ExtraerFecha); // OBTENER UNICAMENTE DIA DE FECHA OBTENIDA
                $ContadorCuotas = 0; // CONTADOR DE CUOTAS
                foreach ($CuotasMensualesGeneradas as $DiaAsignado) {
                    $ContadorCuotas++; // AUMENTO EN UNO [1] SEGUN EL LIMITE ESTABLECIDO
                    if ($ContadorCuotas > 1) { // NO TOMAR EN CUENTA PRIMERA VUELTA, YA QUE INDICA EL INICIO EN DONDE EL CLIENTE INGRESO SU SOLICITUD CREDITICIA
                        /* 
                            ********************************************************************************
                        RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [29, 30 Y 31 DE CUALQUIER MES]
    
                        -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO.
    
                        -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
                        ********************************************************************************
                        */
                        // FORMATO FECHA DE REGISTRO -> AÑO/MES/DIA = YYYY/MM/DD
                        // FORMATO FECHA DE MUESTRA CLIENTES -> DIA/MES/AÑO = DD/MM/YYYY
                        $DiaLaboral = $DiaAsignado->format('N');
                        // RECALCULAR SI ES DOMINGO
                        if ($DiaLaboral == '7') {
                            // SUMAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            if ($ObtenerDia == 25) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // SUMAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 26) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // SUMAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 27) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // NO REALIZAR NINGUN CALCULO A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 28) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha);
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // RESTAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 29) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 30) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // RESTAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 31) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                /* 
                            ********************************************************************************
                        RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [29, 30 Y 31 DE CUALQUIER MES]
    
                        -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO.
    
                        -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
                        ********************************************************************************
                        */
                                /*
                            ***********************************************************************************
                                IMPORTANTE TOMAR EN CUENTA:
                                
                                SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
    
                                APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                            ***********************************************************************************
                            */
                            } else if ($ObtenerDia < 10) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                                if ($RecalcularFechaDomingos < 10) {
                                    $FechaPago = $CompletarFecha . $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                } else {
                                    $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                }
                                // IMPRESION DE FECHA NORMAL SI TODAS LAS CONDICIONES ANTERIORES NO SE CUMPLEN
                            } else {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                            }
                            // RECALCULAR SI ES SABADO
                        } else if ($DiaLaboral == '6') {
                            // SUMAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            if ($ObtenerDia == 25) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // SUMAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 26) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // SUMAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 27) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // NO REALIZAR NINGUN CALCULO A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 28) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha);
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // RESTAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 29) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) - 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 30) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) - 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // RESTAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 31) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) - 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                /*
                                    SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
                                        APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                                */
                                /*
                            ***********************************************************************************
                                IMPORTANTE TOMAR EN CUENTA:
                                
                                SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
    
                                APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                            ***********************************************************************************
                            */
                            } else if ($ObtenerDia < 10) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                                if ($RecalcularFechaSabados < 10) {
                                    $FechaPago = $CompletarFecha . $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                } else {
                                    $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                }
                                // IMPRESION DE FECHA NORMAL SI TODAS LAS CONDICIONES ANTERIORES NO SE CUMPLEN
                            } else {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                            }
                            // IMPRESION DE FECHA DE PAGO SI NO NECESITA SER RECALCULADA
                        } else {
                            $FechaPago = $DiaAsignado->format('Y-m-d');
                        }
                        //  REGISTRO DE TODAS LAS CUOTAS MENSUALES GENERADAS
                        $consulta = $Gestiones->RegistroAsignacionCuotasMensualesClientes($conectarsistema, $IdCreditos, $IdProductos, $IdUsuarios, $CuotaMensualCredito, $NombreProductos, $MontoCapitalCredito, $FechaPago);
                    } // CIERRE if($ContadorCuotas>1)
                } // CIERRE foreach($CuotasMensualesGeneradas as $DiaAsignado)
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if(empty($IdCreditos))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // ENVIO DATOS -> ESTADO DE CUENTA HISTORICO [DISPONIBLE UNICAMENTE PARA ADMINISTRADORES Y CUANDO EL CREDITO EN CUESTION HA SIDO CANCELADO AL 100% POR CLIENTES]
    case "envio-datos-estado-cuenta-creditos-clientes-historico":
        if ($_SESSION['id_rol'] == 1) {
            $IdCreditos = (empty($_POST['CodigoUnicoCreditoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoCreditoEstadoCuenta']; // ID UNICO DE CREDITO REGISTRADO
            $IdUsuarios = (empty($_POST['CodigoUnicoCreditoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoUsuarioEstadoCuenta']; // ID UNICO DE USUARIO QUE SOLICITO CREDITO
            $IdProductos = (empty($_POST['CodigoUnicoProductoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoProductoEstadoCuenta']; // ID UNICO DE PRODUCTO QUE ASOCIADO CREDITO
            $NombreProductos = (empty($_POST['NombreProductoEstadoCuenta'])) ? NULL : $_POST['NombreProductoEstadoCuenta']; // NOMBRE DE PRODUCTO ASOCIADO A CLIENTE      
            $FechaSolicitud = (empty($_POST['FechaPagoEstadoCuenta'])) ? NULL : $_POST['FechaPagoEstadoCuenta']; // FECHA DE INGRESO DE SOLICITUD -> MISMA PARA GENERAR CUOTAS MENSUALES
            $CuotaMensualCredito = (empty($_POST['CuotaMensualEstadoCuenta'])) ? NULL : $_POST['CuotaMensualEstadoCuenta']; // CUOTA MENSUAL ASIGNADA A CREDITO ADQUIRIDO POR CLIENTE
            $MontoCapitalCredito = (empty($_POST['MontoCapitalEstadoCuenta'])) ? NULL : $_POST['MontoCapitalEstadoCuenta']; // MONTO CAPITAL A CANCELAR POR CLIENTE SEGUN CREDITO ADQUIRIDO POR CLIENTE    
            // VALIDACION SEGUN DIA DE INGRESO SOLICITUD
            $ValidarDiaIngresoSolicitud = $FechaSolicitud; // FECHA COMPLETA PREDETERMINADA
            $ExtraerFechaSolicitud = strtotime($FechaSolicitud); // OBTENER FECHA COMPLETA DE SOLICITUD
            $ObtenerDiaSolicitud = date("d", $ExtraerFechaSolicitud); // OBTENER UNICAMENTE DIA DE SOLICITUD
            if ($ObtenerDiaSolicitud >= 29 && $ObtenerDiaSolicitud <= 31) {
                $PlazoCredito = (empty($_POST['PlazoPagoEstadoCuenta'])) ? NULL : $_POST['PlazoPagoEstadoCuenta']; // PLAZO EN MESES A PAGAR SEGUN CREDITO ADQUIRIDO POR CLIENTE
            } else {
                $PlazoCredito = (empty($_POST['PlazoPagoEstadoCuenta'])) ? NULL : $_POST['PlazoPagoEstadoCuenta'] + 1; // PLAZO EN MESES A PAGAR SEGUN CREDITO ADQUIRIDO POR CLIENTE
            } // CIERRE if ($ObtenerDiaSolicitud >= 29 && $ObtenerDiaSolicitud <= 31)
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // GENERAR CUOTAS MENSUALES CLIENTES -> TODOS LOS PRODUCTOS DISPONIBLES EN SISTEMA
                $CompletarFecha = 0; // FECHAS ENTRE 01 A 09 SE LES AGREGA EL RESPECTIVO '0 - CERO' -> VALIDO EN LOS CALCULOS DE NUEVAS FECHAS (FINES DE SEMANA)
                $FechaSolicitud = $_POST['FechaPagoEstadoCuenta']; // FECHA DE INGRESO SOLICITUD CREDITICIA
                $IntervaloFecha = new DateInterval('P1D'); // INTERVALO DE FECHA -> 1 VEZ AL DIA
                $InicioCreditos = new DateTime($_POST['FechaPagoEstadoCuenta']); // INICIO DE CALCULO CUOTA MENSUAL
                $FechaCompleta = strtotime($FechaSolicitud);
                $ObtenerDia = date("d", $FechaCompleta);
                /*
                    RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [25,26,27,28,29,30 Y 31 DE CUALQUIER MES]
            
                    -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO Y EVITAR FECHAS INVALIDAS [NO EXISTENTES] AL MOMENTO DE RECALCULAR LAS FECHAS DE PAGO
        
                    --> EL MAXIMO DIA PARA RECALCULAR FECHAS DE PAGOS ES <<24>> DE CADA MES, DE 25 A 31 SEGUN MES EN CURSO, LAS ULTIMAS FECHAS DE PAGO SIEMPRE SERAN CADA 28 DE MES 
                    
                    -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
                    */
                if ($ObtenerDia == 25) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 25, ENTONCES SE SUMA TRES DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 3 days"));
                } else if ($ObtenerDia == 26) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 26, ENTONCES SE SUMA DOS DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 2 days"));
                } else if ($ObtenerDia == 27) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 27, ENTONCES SE SUMA UN DIA A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 1 days"));
                } else if ($ObtenerDia == 28) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 28, ENTONCES SE NO SE REALIZA NINGUN CALCULO A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("+ 0 days"));
                } else if ($ObtenerDia == 29) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 29, ENTONCES SE RESTA UN DIA A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("- 1 days"));
                } else if ($ObtenerDia == 30) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 30, ENTONCES SE RESTA DOS DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("- 2 days"));
                } else if ($ObtenerDia == 31) {
                    // SI EL DIA DE INGRESO DE LA SOLICITUD ES IGUAL A 31, ENTONCES SE RESTA TRES DIAS A LA FECHA DE PAGO FINAL CLIENTES
                    date_add($InicioCreditos, date_interval_create_from_date_string("- 3 days"));
                }
                $FinCreditos = new DateTime(date("Y-m-d", strtotime($FechaSolicitud . "+ $PlazoCredito month"))); // FIN CALCULO CUOTA MENSUAL
                $IntervaloFecha = new DateInterval('P1M');  // INTERVALO DE FECHA -> 1 VEZ AL MES
                $CuotasMensualesGeneradas = new DatePeriod($InicioCreditos, $IntervaloFecha, $FinCreditos); // OBTENIENDO RESULTADO FINAL DE INICIO Y FIN DE CREDITO
                // EXTRAER FECHA COMPLETA COMO ENTERO PARA COMPROBACIONES
                $ExtraerFecha = strtotime($FechaSolicitud); // EXTRAER FECHA COMO ENTERO
                $ObtenerMes = date("m", $ExtraerFecha); // OBTENER UNICAMENTE MES DE FECHA OBTENIDA
                $ObtenerDia = date("d", $ExtraerFecha); // OBTENER UNICAMENTE DIA DE FECHA OBTENIDA
                $ContadorCuotas = 0; // CONTADOR DE CUOTAS
                foreach ($CuotasMensualesGeneradas as $DiaAsignado) {
                    $ContadorCuotas++; // AUMENTO EN UNO [1] SEGUN EL LIMITE ESTABLECIDO
                    if ($ContadorCuotas > 1) { // NO TOMAR EN CUENTA PRIMERA VUELTA, YA QUE INDICA EL INICIO EN DONDE EL CLIENTE INGRESO SU SOLICITUD CREDITICIA
                        /* 
                                ********************************************************************************
                            RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [29, 30 Y 31 DE CUALQUIER MES]
        
                            -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO.
        
                            -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
                            ********************************************************************************
                            */
                        // FORMATO FECHA DE REGISTRO -> AÑO/MES/DIA = YYYY/MM/DD
                        // FORMATO FECHA DE MUESTRA CLIENTES -> DIA/MES/AÑO = DD/MM/YYYY
                        $DiaLaboral = $DiaAsignado->format('N');
                        // RECALCULAR SI ES DOMINGO
                        if ($DiaLaboral == '7') {
                            // SUMAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            if ($ObtenerDia == 25) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // SUMAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 26) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // SUMAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 27) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // NO REALIZAR NINGUN CALCULO A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 28) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha);
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // RESTAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 29) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 30) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                // RESTAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 31) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) - 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                /* 
                                ********************************************************************************
                            RECALCULAR FECHAS DE PAGOS SI LA SOLICITUD FUE INGRESADA EN LOS DIAS: [29, 30 Y 31 DE CUALQUIER MES]
        
                            -> MOTIVO: PARA EVITAR CALCULOS ERRONEOS DE FECHAS EN EL MES DE FEBRERO PRINCIPALMENTE, CUANDO EL AÑO ES BISIESTO O SIMPLEMENTE EL INGRESO DE LA SOLICITUD EXCEDE LOS 28 DIAS DEL << X >> MES DE INGRESO Y REGISTRO.
        
                            -> PARA ESTE CONDICION NO SE EXCLUYEN LOS SABADOS Y DOMINGOS, MOTIVOS POR EL CUAL EL TRATAMIENTO A ESTOS CLIENTES ES DIFERENTE Y SU FECHA DE PAGO DEBE SER ANTES DE LA FECHA INDICADA SI EL DIA DE PAGO ASIGNADO ES SABADO O DOMINGO
                            ********************************************************************************
                            */
                                /*
                                ***********************************************************************************
                                    IMPORTANTE TOMAR EN CUENTA:
                                    
                                    SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
        
                                    APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                                ***********************************************************************************
                                */
                            } else if ($ObtenerDia < 10) {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                                if ($RecalcularFechaDomingos < 10) {
                                    $FechaPago = $DiaAsignado->format('Y-m-'.$CompletarFecha . $RecalcularFechaDomingos);
                                } else {
                                    $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                                }
                                // IMPRESION DE FECHA NORMAL SI TODAS LAS CONDICIONES ANTERIORES NO SE CUMPLEN
                            } else {
                                $RecalcularFechaDomingos = date("d", $ExtraerFecha) + 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaDomingos);
                            }
                            // RECALCULAR SI ES SABADO
                        } else if ($DiaLaboral == '6') {
                            // SUMAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            if ($ObtenerDia == 25) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // SUMAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 26) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // SUMAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 27) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // NO REALIZAR NINGUN CALCULO A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 28) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha);
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // RESTAR UN DIA A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 29) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) - 1;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // RESTAR DOS DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 30) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) - 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                // RESTAR TRES DIAS A LA FECHA DE INGRESO DE SOLICITUD -> FECHAS DE PAGO MENSUALES
                            } else if ($ObtenerDia == 31) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) - 3;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                /*
                                        SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
                                            APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                                    */
                                /*
                                ***********************************************************************************
                                    IMPORTANTE TOMAR EN CUENTA:
                                    
                                    SI EL RECALCULO DE FECHAS DENTRO DE LOS DIAS EXCLUIDOS SE ENCUENTRA EN EL RANGO DE LAS FECHAS 01 - 09, SE AGREGA LA IMPRESION DEL CORRESPONDIENDE 0 [CERO] INICIAL
        
                                    APLICABLE PARA -> $ObtenerDia , $RecalcularFechaDomingos , $RecalcularFechaSabados
                                ***********************************************************************************
                                */
                            } else if ($ObtenerDia < 10) {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                                if ($RecalcularFechaSabados < 10) {
                                    $FechaPago =  $DiaAsignado->format('Y-m-'.$CompletarFecha . $RecalcularFechaSabados);
                                } else {
                                    $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                                }
                                // IMPRESION DE FECHA NORMAL SI TODAS LAS CONDICIONES ANTERIORES NO SE CUMPLEN
                            } else {
                                $RecalcularFechaSabados = date("d", $ExtraerFecha) + 2;
                                $FechaPago = $DiaAsignado->format('Y-m-' . $RecalcularFechaSabados);
                            }
                            // IMPRESION DE FECHA DE PAGO SI NO NECESITA SER RECALCULADA
                        } else {
                            $FechaPago = $DiaAsignado->format('Y-m-d');
                        }
                        //  REGISTRO DE TODAS LAS CUOTAS MENSUALES GENERADAS
                        $consulta = $Gestiones->RegistroAsignacionCuotasMensualesClientesHistorico($conectarsistema, $IdCreditos, $IdProductos, $IdUsuarios, $CuotaMensualCredito, $NombreProductos, $MontoCapitalCredito, $FechaPago);
                    } // CIERRE if($ContadorCuotas>1)
                } // CIERRE foreach($CuotasMensualesGeneradas as $DiaAsignado)
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if(empty($IdCreditos))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // ENVIO DATOS EXCLUSIVAMENTE DE SOLICITUDES CREDITICIAS CANCELADAS -> HISTORICO DE SOLICITUDES CREDITICIAS
    case "envio-datos-registro-solicitudes-crediticias-clientes-historico":
        if ($_SESSION['id_rol'] == 1) {
            // -> CAMPOS VALIDOS PARA GESTION DE CREDITOS HISTORICOS
            $IdCreditos = (empty($_POST['CodigoUnicoCreditoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoCreditoEstadoCuenta']; // ID UNICO DE CREDITO REGISTRADO
            $IdUsuarios = (empty($_POST['CodigoUnicoCreditoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoUsuarioEstadoCuenta']; // ID UNICO DE USUARIO QUE SOLICITO CREDITO
            $IdProductos = (empty($_POST['CodigoUnicoProductoEstadoCuenta'])) ? NULL : $_POST['CodigoUnicoProductoEstadoCuenta']; // ID UNICO DE PRODUCTO QUE ASOCIADO CREDITO
            $MontoCredito = (empty($_POST['MontoFinanciemientoCreditosClientes'])) ? NULL : $_POST['MontoFinanciemientoCreditosClientes']; // MONTO FINANCIAMIENTO CREDITOS CLIENTES
            $InteresCredito = (empty($_POST['InteresFinanciemientoCreditosClientes'])) ? NULL : $_POST['InteresFinanciemientoCreditosClientes']; // TASA INTERES FINANCIAMIENTO CREDITOS CLIENTES
            $PlazoCredito = (empty($_POST['PlazoPagoEstadoCuenta'])) ? NULL : $_POST['PlazoPagoEstadoCuenta']; // PLAZO PAGO CREDITOS CLIENTES
            $CuotaMensualCredito = (empty($_POST['CuotaMensualEstadoCuenta'])) ? NULL : $_POST['CuotaMensualEstadoCuenta']; // CUOTA MENSUAL ASIGNADA A CREDITO ADQUIRIDO POR CLIENTE
            $EstadoActualCreditos = "cancelado"; // SE ENTIENDE QUE LOS CREDITOS HAN SIDO CANCELADOS EN SU TOTALIDAD
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($MontoCredito)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                // REGISTRO DE SOLICITUD CREDITICIA A HISTORICO DE CREDITOS
                $consulta = $Gestiones->RegistroAsignacionSolicitudCrediticiaClientesHistorico($conectarsistema, $IdUsuarios, $IdProductos, $IdCreditos, $MontoCredito, $InteresCredito, $PlazoCredito, $CuotaMensualCredito, $EstadoActualCreditos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // MODELO PLANTILLA DE LOS DIFERENTES CONTRATOS A SER OTORGADOS A LOS CLIENTES, SEGUN PRODUCTO ASOCIADO [DISPONIBLE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "impresion-contrato-final-clientes":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DE CLIENTE CON TODOS LOS REQUERIMIENTOS SOLICITADOS EN SOLICITUD DE CREDITO
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA PRODUCTOS ACTIVOS -> ASIGNACIONES NUEVOS CREDITOS
            $consulta1 = $Gestiones->ConsultarProductosActivosNuevosCreditos($conectarsistema1);
            // CONSULTA DE DATOS DE VEHICULOS -> PRESTAMOS DE VEHICULOS APROBADOS
            $consulta2 = $Gestiones->ConsultaDatosVehiculos_PrestamosdeVehiculos($conectarsistema2, $IdUsuarios);
            require('../vista/contrato-modelo-clientes-solicitudes-nuevas-crediticias.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // ENVIO DATOS REGISTRO DATOS VEHICULOS -> PRESTAMOS DE VEHICULOS [DISPONIBLE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "envio-datos-registro-informacion-vehiculos-creditos-contratos":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCreditos = (empty($_POST['idcredito'])) ? NULL : $_POST['idcredito']; // ID UNICO DE CREDITO REGISTRADO
            $IdProductos = (empty($_POST['idproductocredito'])) ? NULL : $_POST['idproductocredito']; // ID UNICO DE PRODUCTO REGISTRADO
            $IdUsuarios = (empty($_POST['idusuariocredito'])) ? NULL : $_POST['idusuariocredito']; // ID UNICO DE CLIENTE QUE HA SOLICITADO CREDITO
            $Placa = (empty($_POST['val-numeroplacavehiculo'])) ? NULL : $_POST['val-numeroplacavehiculo']; // NUMERO DE PLACA VEHICULO
            $Clase = (empty($_POST['val-tipoclasevehiculo'])) ? NULL : $_POST['val-tipoclasevehiculo']; // CLASE DE VEHICULO
            $Anio = (empty($_POST['val-aniovehiculo'])) ? NULL : $_POST['val-aniovehiculo']; // AÑO DE FABRICACION DE VEHICULO
            $Capacidad = (empty($_POST['val-capacidadvehiculo'])) ? NULL : $_POST['val-capacidadvehiculo']; // NUMERO DE CAPACIDAD DE VEHICULO
            $Asientos = (empty($_POST['val-asientosvehiculo'])) ? NULL : $_POST['val-asientosvehiculo']; // NUMERO DE ASIENTOS DE VEHICULOI
            $Marca = (empty($_POST['val-marcavehiculo'])) ? NULL : $_POST['val-marcavehiculo']; // MARCA DE VEHICULO
            $Modelo = (empty($_POST['val-modelovehiculo'])) ? NULL : $_POST['val-modelovehiculo']; // MODELO DE VEHICULO
            $NumeroMotor = (empty($_POST['val-numeromotorvehiculo'])) ? NULL : $_POST['val-numeromotorvehiculo']; // NUMERO DE MOTOR DE VEHICULO
            $NumeroChasisGrabado = (empty($_POST['val-numerochasisvehiculo'])) ? NULL : $_POST['val-numerochasisvehiculo']; // NUMERO DE CHASIS GRABADO VEHICULO
            $NumeroChasisVin = (empty($_POST['val-numerochasisvinvehiculo'])) ? NULL : $_POST['val-numerochasisvinvehiculo']; // NUMERO DE CHASIS VIN VEHICULO
            $Color = (empty($_POST['val-colorvehiculo'])) ? NULL : $_POST['val-colorvehiculo']; // COLOR DE VEHICULO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroInformacionVehiculosCreditos($conectarsistema, $IdCreditos, $IdProductos, $IdUsuarios, $Placa, $Clase, $Anio, $Capacidad, $Asientos, $Marca, $Modelo, $NumeroMotor, $NumeroChasisGrabado, $NumeroChasisVin, $Color);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // ENVIO DATOS REGISTRO DE COPIA CONTRATO FINAL CREDITOS NUEVOS CLIENTES [DISPONIBLE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "envio-datos-registro-copia-contrato-clientes":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCreditos = (empty($_POST['idcreditocontrato'])) ? NULL : $_POST['idcreditocontrato']; // ID UNICO DE CREDITO REGISTRADO
            $NombreArchivo = $_FILES['val-copiacontratousuarios']['name']; // FOTO DUI DE USUARIO
            // CAMBIO DE NOMBRE CONTRATOS SUBIDOS A SERVIDOR
            /* POR EL MISMO USUARIO SERAN UTILIZADOS ESTOS IDENTIFICADORES UNICOS */
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoArchivo  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $DirectorioCopiaContratos = "../vista/copiacontratosclientes/" . $FechaActual . "_" . $IdUnicoArchivo . "_" . $_FILES['val-copiacontratousuarios']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoArchivos = $FechaActual . "_" . $IdUnicoArchivo . "_" . $_FILES['val-copiacontratousuarios']['name'];
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroCopiaContratoFinalClientes($conectarsistema, $IdCreditos, $NombreNuevoArchivos);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                copy($_FILES['val-copiacontratousuarios']['tmp_name'], $DirectorioCopiaContratos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // CONSULTA LISTADO GENERAL DE CLIENTES QUE NECESITAN REESTRUCTURAR LOS RESPECTIVOS CREDITOS YA QUE NO CUMPLEN CON LOS ESTANDARES DE LA EMPRESA [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA] -> CONSULTA SIN FILTROS [DISPONIBLE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    case "listado-general-reestructurar-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO DE TODOS LOS CLIENTES A LOS QUE SE LES HA MARCADO SU SOLICITUD DE CREDITO QUE NECESITA SER REESTRUCTURADAS
            $consulta = $Gestiones->ConsultaGeneralClientesReestructuracionCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-clientes-creditos-reestructuracion.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA LISTADO GENERAL DE CLIENTES QUE NECESITAN REESTRUCTURAR LOS RESPECTIVOS CREDITOS YA QUE NO CUMPLEN CON LOS ESTANDARES DE LA EMPRESA [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA] -> CONSULTA SIN FILTROS [DISPONIBLE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    case "listado-general-reestructurar-creditos-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO DE TODOS LOS CLIENTES A LOS QUE SE LES HA MARCADO SU SOLICITUD DE CREDITO QUE NECESITA SER REESTRUCTURADAS
            $consulta = $Gestiones->ConsultaGeneralClientesReestructuracionCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-clientes-creditos-reestructuracion-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA LISTADO GENERAL DE CLIENTES QUE NECESITAN REESTRUCTURAR LOS RESPECTIVOS CREDITOS YA QUE NO CUMPLEN CON LOS ESTANDARES DE LA EMPRESA [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA] -> CONSULTA SIN FILTROS [DISPONIBLE PARA USUARIOS ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    case "listado-general-reestructurar-creditos-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO DE TODOS LOS CLIENTES A LOS QUE SE LES HA MARCADO SU SOLICITUD DE CREDITO QUE NECESITA SER REESTRUCTURADAS
            $consulta = $Gestiones->ConsultaGeneralClientesReestructuracionCreditos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-clientes-creditos-reestructuracion-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS DENEGADAS CLIENTES [VALIDO PARA ADMINISTRADORES, GERENCIA Y PRESIDENCIA]
    case "listado-general-creditos-denegados":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO DE CLIENTES QUE LES HA SIDO DENEGADA SU SOLICITUD DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosDenegadosClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-clientes-creditos-denegados.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS DENEGADAS CLIENTES [VALIDO PARA ADMINISTRADORES, GERENCIA Y PRESIDENCIA]
    case "listado-general-creditos-denegados-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO DE CLIENTES QUE LES HA SIDO DENEGADA SU SOLICITUD DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosDenegadosClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-clientes-creditos-denegados-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS DENEGADAS CLIENTES [VALIDO PARA ADMINISTRADORES, GERENCIA Y PRESIDENCIA]
    case "listado-general-creditos-denegados-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO DE CLIENTES QUE LES HA SIDO DENEGADA SU SOLICITUD DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosDenegadosClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-clientes-creditos-denegados-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // ENVIO DATOS REGISTRO HISTORICO DE SOLICITUDES CREDITICIAS CLIENTES
        /*
            -> IMPORTANTE: TOMAR EN CUENTA QUE SE HACE UNA DEPURACION [ELIMINAR DATO ESPECIFICOS] DE LA TABLA PRINCIPAL DE CREDITOS ACTIVOS, PARA POSTERIORMENTE HACER UNA INSERCION AUTOMATICA A TRAVES DE UN DISPARADOR [TRIGGER] HACIA LA TABLA SECUNDARIA DE CREDITOS (HISTORICOS)
        */
        // VALIDO PARA CREDITOS RECHAZADOS Y FINALIZADOS
    case "enviar-datos-historico-creditos-clientes":
        // VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCreditos = (empty($_GET['idcreditos'])) ? NULL : $_GET['idcreditos']; // ID UNICO DE CREDITO REGISTRADO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->EnvioSolicitudesCreditosAlHistoricoCreditos($conectarsistema, $IdCreditos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // LISTADO GENERAL DE CLIENTES A LOS QUE LES HA SIDO APROBADA SU SOLICITUD CREDITICIA [UNICAMENTE CREDITOS ACTIVOS -> EN CURSO] [DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-aprobados-activos":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS ACTIVAS Y APROBADAS [EN CURSO SIN CANCELACION NI ENTRAGA DE FINIQUITO]
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosActivos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-clientes-creditos-activos-en-curso.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // LISTADO GENERAL DE CLIENTES A LOS QUE LES HA SIDO APROBADA SU SOLICITUD CREDITICIA [UNICAMENTE CREDITOS ACTIVOS -> EN CURSO] [DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-aprobados-activos-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS ACTIVAS Y APROBADAS [EN CURSO SIN CANCELACION NI ENTRAGA DE FINIQUITO]
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosActivos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-clientes-creditos-activos-en-curso-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // LISTADO GENERAL DE CLIENTES A LOS QUE LES HA SIDO APROBADA SU SOLICITUD CREDITICIA [UNICAMENTE CREDITOS ACTIVOS -> EN CURSO] [DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-aprobados-activos-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS ACTIVAS Y APROBADAS [EN CURSO SIN CANCELACION NI ENTRAGA DE FINIQUITO]
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosActivos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-clientes-creditos-activos-en-curso-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // LISTADO GENERAL DE CLIENTES A LOS QUE LES HA SIDO APROBADA SU SOLICITUD CREDITICIA [UNICAMENTE CREDITOS ACTIVOS -> EN CURSO] [DISPONIBLE PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-aprobados-activos-atencion-al-cliente":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS ACTIVAS Y APROBADAS [EN CURSO SIN CANCELACION NI ENTRAGA DE FINIQUITO]
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosActivos($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-clientes-creditos-activos-en-curso-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // LISTADO GENERAL DE CLIENTES QUE HAN FINALIZADO SU RESPONSABILIDAD CREDITICIA [CREDITOS CANCELADOS -> SALDO FINAL $0.00] [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-cancelados":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS CANCELADAS -> VALIDO PARA GENERACION DE FINIQUITO DE CANCELACION Y ENVIO A HISTORICO DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosCancelados($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-clientes-creditos-cancelados.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // LISTADO GENERAL DE CLIENTES QUE HAN FINALIZADO SU RESPONSABILIDAD CREDITICIA [CREDITOS CANCELADOS -> SALDO FINAL $0.00] [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-cancelados-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS CANCELADAS -> VALIDO PARA GENERACION DE FINIQUITO DE CANCELACION Y ENVIO A HISTORICO DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosCancelados($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-clientes-creditos-cancelados-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // LISTADO GENERAL DE CLIENTES QUE HAN FINALIZADO SU RESPONSABILIDAD CREDITICIA [CREDITOS CANCELADOS -> SALDO FINAL $0.00] [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-cancelados-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS CANCELADAS -> VALIDO PARA GENERACION DE FINIQUITO DE CANCELACION Y ENVIO A HISTORICO DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosCancelados($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-clientes-creditos-cancelados-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // LISTADO GENERAL DE CLIENTES QUE HAN FINALIZADO SU RESPONSABILIDAD CREDITICIA [CREDITOS CANCELADOS -> SALDO FINAL $0.00] [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "listado-general-creditos-cancelados-atencion-clientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS CANCELADAS -> VALIDO PARA GENERACION DE FINIQUITO DE CANCELACION Y ENVIO A HISTORICO DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosCancelados($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-clientes-creditos-cancelados-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // GENERADOR DE FINIQUITOS DE CANCELACION CREDITOS CANCELADOS CLIENTES
    case "finiquito-cancelacion-creditos-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE CLIENTE / USUARIO REGISTRADO
            $IdCreditos = (empty($_GET['idhistorico'])) ? NULL : $_GET['idhistorico']; // ID UNICO DE CLIENTE / CREDITO CANCELADO REGISTRADO
            $IdHistoricoCreditos = (empty($_GET['idhistorico'])) ? NULL : $_GET['idhistorico']; // ID UNICO DE CREDITO HISTORICO CLIENTE / USUARIO REGISTRADO
            $consulta = $Gestiones->ConsultaDatosGenerarFiniquitoCancelacionClientes($conectarsistema, $IdUsuarios, $IdCreditos);
            require('../vista/finiquito-cancelacion-creditos-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) 
        break;
        // CONSULTA ESPECIFICA DE ESTADO DE CUENTA COMPLETO DE CLIENTES -> CREDITOS ACTIVOS [EN CURSO] -> [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Administradores/consulta-especifica-solicitud-credito-aprobada-en-curso-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA ESPECIFICA DE ESTADO DE CUENTA COMPLETO DE CLIENTES -> CREDITOS CANCELADOS [HISTORICO CREDITOS / CUOTAS] -> [VALIDO PARA ADMINISTRADORES]
    case "consulta-especifica-solicitudes-creditos-canceladas-historico-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdCreditos = (empty($_GET['idcredito'])) ? NULL : $_GET['idcredito']; // ID UNICO DE CREDITO ASIGNADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesHistorico($conectarsistema, $IdUsuarios, $IdCreditos);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosCanceladosHistoricos($conectarsistema1, $IdUsuarios, $IdCreditos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Administradores/consulta-especifica-solicitud-credito-cancelada-clientes-historico-creditos.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA ESPECIFICA DE ESTADO DE CUENTA COMPLETO DE CLIENTES -> CREDITOS CANCELADOS [HISTORICO CREDITOS / CUOTAS] -> [VALIDO PARA ADMINISTRADORES]
    case "consulta-especifica-solicitudes-creditos-canceladas-historico-portal-clientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdCreditos = (empty($_GET['idcredito'])) ? NULL : $_GET['idcredito']; // ID UNICO DE CREDITO ASIGNADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesHistorico($conectarsistema, $IdUsuarios, $IdCreditos);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosCanceladosHistoricos($conectarsistema1, $IdUsuarios, $IdCreditos);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Clientes/consulta-especifica-solicitud-credito-cancelada-clientes-historico-portalclientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5) 
        break;
        // CONSULTA ESPECIFICA DE ESTADO DE CUENTA COMPLETO DE CLIENTES -> CREDITOS ACTIVOS [EN CURSO] -> [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Presidencia/consulta-especifica-solicitud-credito-aprobada-en-curso-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA ESPECIFICA DE ESTADO DE CUENTA COMPLETO DE CLIENTES -> CREDITOS ACTIVOS [EN CURSO] -> [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Gerencia/consulta-especifica-solicitud-credito-aprobada-en-curso-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // CONSULTA ESPECIFICA DE ESTADO DE CUENTA COMPLETO DE CLIENTES -> CREDITOS ACTIVOS [EN CURSO] -> [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-especifica-solicitudes-creditos-aprobadas-activas-clientes-atencion-clientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/AtencionClientes/consulta-especifica-solicitud-credito-aprobada-en-curso-clientes-atencion-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4) 
        break;
        // CONSULTA COMPLETA DE CUOTAS NO PAGADAS -> CLIENTES MOROSOS QUE HAN INCUMPLIDO CON SU FECHA DE PAGO ESTIPULADA EN EL SISTEMA [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA]
    case "consulta-listado-cuotas-clientes-morosos":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE CLIENTES QUE POSEEN CUOTAS PENDIENTES [MORA POR INCUMPLIMIENTOS EN SU RESPONSABILIDAD MERCANTIL CON LA EMPRESA]
            $consulta = $Gestiones->ConsultaClientesMorososCuotas($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-listado-clientes-morosos.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA COMPLETA DE CUOTAS NO PAGADAS -> CLIENTES MOROSOS QUE HAN INCUMPLIDO CON SU FECHA DE PAGO ESTIPULADA EN EL SISTEMA [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA]
    case "consulta-listado-cuotas-clientes-morosos-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE CLIENTES QUE POSEEN CUOTAS PENDIENTES [MORA POR INCUMPLIMIENTOS EN SU RESPONSABILIDAD MERCANTIL CON LA EMPRESA]
            $consulta = $Gestiones->ConsultaClientesMorososCuotas($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-listado-clientes-morosos-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA COMPLETA DE CUOTAS NO PAGADAS -> CLIENTES MOROSOS QUE HAN INCUMPLIDO CON SU FECHA DE PAGO ESTIPULADA EN EL SISTEMA [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA]
    case "consulta-listado-cuotas-clientes-morosos-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE CLIENTES QUE POSEEN CUOTAS PENDIENTES [MORA POR INCUMPLIMIENTOS EN SU RESPONSABILIDAD MERCANTIL CON LA EMPRESA]
            $consulta = $Gestiones->ConsultaClientesMorososCuotas($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-listado-clientes-morosos-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // CONSULTA DE PERFIL COMPLETO DE CLIENTES [DEPARTAMENTO DE RECUPERACION DE MORAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA
    case "consulta-perfil-clientes-departamento-recuperacion":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID USUARIO UNICO REGISTRADO
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            require('../vista/Administradores/perfil-clientes-recuperaciones.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA DE PERFIL COMPLETO DE CLIENTES [DEPARTAMENTO DE RECUPERACION DE MORAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA
    case "consulta-perfil-clientes-departamento-recuperacion-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_GET['idusuario']; // ID USUARIO UNICO REGISTRADO
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            require('../vista/Presidencia/perfil-clientes-recuperaciones-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA DE PERFIL COMPLETO DE CLIENTES [DEPARTAMENTO DE RECUPERACION DE MORAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA
    case "consulta-perfil-clientes-departamento-recuperacion-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_GET['idusuario']; // ID USUARIO UNICO REGISTRADO
            $consulta = $Gestiones->ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios);
            require('../vista/Gerencia/perfil-clientes-recuperaciones-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // REGISTRAR REPORTES DE FALLOS PLATAFORMA -> DISPONIBLE PARA TODOS LOS USUARIOS
    case "registrar-ticket-problema-plataforma":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/Administradores/registro-reportes-fallos-plataforma-usuarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // REGISTRAR REPORTES DE FALLOS PLATAFORMA -> DISPONIBLE PARA TODOS LOS USUARIOS
    case "registrar-ticket-problema-plataforma-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/Presidencia/registro-reportes-fallos-plataforma-usuarios-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // REGISTRAR REPORTES DE FALLOS PLATAFORMA -> DISPONIBLE PARA TODOS LOS USUARIOS
    case "registrar-ticket-problema-plataforma-gerencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/Gerencia/registro-reportes-fallos-plataforma-usuarios-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // REGISTRAR REPORTES DE FALLOS PLATAFORMA -> DISPONIBLE PARA TODOS LOS USUARIOS
    case "registrar-ticket-problema-plataforma-atencion-clientes":
        // VISTA VALIDA PARA ATENCION A CLIENTES
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/AtencionClientes/registro-reportes-fallos-plataforma-usuarios-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4) 
        break;
        // REGISTRAR REPORTES DE FALLOS PLATAFORMA -> DISPONIBLE PARA TODOS LOS USUARIOS
    case "registrar-ticket-problema-plataforma-clientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios);
            require('../vista/Clientes/registro-reportes-fallos-plataforma-usuarios-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5) 
        break;
        // ENVIO DE DATOS -> REGISTRO DE REPORTES DE FALLOS PLATAFORMA [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-tickets-problemas-plataforma":
        // DISPONIBLE PARA TODOS LOS ROLES DE USUARIOS VALIDADOS EN ESTA SISTEMA
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $NombreReportePlataforma = (empty($_POST['val-nombrereporte'])) ? NULL : $_POST['val-nombrereporte']; // NOMBRE DE TICKET REPORTE FALLOS PLATAFORMA
            $DescripcionReportePlataforma = (empty($_POST['val-descripcion-reporte'])) ? NULL : $_POST['val-descripcion-reporte']; // DESCRIPCION DE TICKET REPORTE FALLOS PLATAFORMA
            $FotoReportePlataforma = $_FILES['fotoreporteproblema']['name']; // FOTO DE PERFIL DE USUARIO
            // CAMBIO DE NOMBRE FOTOS SUBIDAS A SERVIDOR
            $FechaActual  = date("dHi"); // OBTIENE FECHA ACTUAL RECORTADA
            $IdUnicoFotos  = uniqid(); // GENERA ID UNICO ALEATORIO AUTOMATICAMENTE
            // RUTA DONDE SERA GUARDADA LA NUEVA FOTOGRAFIA CON NOMBRE CAMBIADO
            $Directorio = "../vista/images/fotoreportesplataforma/" . $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoreporteproblema']['name'];
            // SOLO OBTENER NOMBRE DE ARCHIVO -> ENVIO A BASE DE DATOS
            $NombreNuevoFotoReporteProblema = $FechaActual . "_" . $IdUnicoFotos . "_" . $_FILES['fotoreporteproblema']['name'];
            $FechaRegistroReportePlataforma = date('Y-m-d H:i:s'); // HORA ACTUAL DE REGISTRO DE REPORTE FALLOS PLATAFORMA
            $EstadoReportePlataforma = "pendiente"; // ESTADO POR DEFECTO DE REGISTRO DE REPORTE FALLOS PLATAFORMA
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombreReportePlataforma)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroFallosPlataforma_TicketsUsuarios($conectarsistema, $IdUsuarios, $NombreReportePlataforma, $DescripcionReportePlataforma, $NombreNuevoFotoReporteProblema, $FechaRegistroReportePlataforma, $EstadoReportePlataforma);
                // COPIA ARCHIVO SUBIDO CON NOMBRE FINAL A LA RUTA ESTABLECIDA
                copy($_FILES['fotoreporteproblema']['tmp_name'], $Directorio);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5)
        break;
        // CONSULTA COMPLETA DE TODOS LOS REPORTES DE FALLOS REGISTRADOS POR LOS USUARIOS -> VALIDO EXCLUSIVAMENTE PARA USUARIOS ADMINISTRADORES Y PRESIDENCIA [SOLAMENTE CONSULTAS SIN LA POSIBILIDAD DE GESTIONAR DICHOS REPORTES]
    case "consulta-listado-tickets-reportes-plataforma":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE REPORTES REGISTRADOS [TICKETS] DE PROBLEMAS PLATAFORMA
            $consulta = $Gestiones->ConsultaTicketsReportesFallosPlataforma($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-listado-reportes-fallos-plataforma.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA COMPLETA DE TODOS LOS REPORTES DE FALLOS REGISTRADOS POR LOS USUARIOS -> VALIDO EXCLUSIVAMENTE PARA USUARIOS ADMINISTRADORES Y PRESIDENCIA [SOLAMENTE CONSULTAS SIN LA POSIBILIDAD DE GESTIONAR DICHOS REPORTES]
    case "consulta-listado-tickets-reportes-plataforma-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA COMPLETA DE REPORTES REGISTRADOS [TICKETS] DE PROBLEMAS PLATAFORMA
            $consulta = $Gestiones->ConsultaTicketsReportesFallosPlataforma($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-listado-reportes-fallos-plataforma-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA ESPECIFICA DE REPORTES DE FALLOS REGISTRADOS POR LOS USUARIOS VALIDO EXCLUSIVAMENTE PARA USUARIOS ADMINISTRADORES
    case "consulta-especifica-tickets-reportes-plataforma":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdReportePlataforma = (empty($_GET['idreporte'])) ? NULL : $_GET['idreporte']; // ID UNICO DE REPORTE REGISTRADO
            // CONSULTA ESPECIFICA DE REPORTES REGISTRADOS POR USUARIOS - FALLOS DE PLATAFORMA
            $consulta = $Gestiones->ConsultaEspecificaTicketsReportesFallosPlataforma($conectarsistema, $IdReportePlataforma);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/vista-gestionar-reportes-fallos-plataforma.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 1)
        break;
        // ENVIO DE DATOS -> ACTUALIZACION DE REPORTES DE FALLOS PLATAFORMA [ENVIO A BASE DE DATOS]
    case "envio-datos-actualizacion-tickets-problemas-plataforma":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdReportePlataforma = (empty($_POST['idunicoreportefalloplataforma'])) ? NULL : $_POST['idunicoreportefalloplataforma']; // ID UNICO DE REPORTE TICKET FALLO PLATAFORMA
            $EstadoReportePlataforma = (empty($_POST['val-estado-reporte-plataforma'])) ? NULL : $_POST['val-estado-reporte-plataforma']; // ESTADO DE REPORTE TICKET FALLO PLATAFORMA
            $ComentarioActualizacionReportePlataforma = (empty($_POST['val-comentario-reporte'])) ? NULL : $_POST['val-comentario-reporte']; // COMENTARIO DE ACTUALIZACION REPORTE TICKET FALLO PLATAFORMA
            $EmpleadoGestionandoReportePlataforma = $_SESSION['usuario_unico']; // CODIGO UNICO DE USUARIOS REGISTRADOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($EstadoReportePlataforma)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActualizacionFallosPlataforma_TicketsUsuarios($conectarsistema, $IdReportePlataforma, $EstadoReportePlataforma, $ComentarioActualizacionReportePlataforma, $EmpleadoGestionandoReportePlataforma);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE SISTEMA DE PAGOS CUOTAS CREDITOS CLIENTES CASHMAN H.A -> DISPONIBLE PARA LOS USUARIOS ADMINISTRATIVOS -> [ADMINISTRADORES Y ATENCION AL CLIENTE]
    case "sistema-pagos-creditos-cashmanha-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/Administradores/consulta-cuotas-creditos-sistema-pagos-cashmanha.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE SISTEMA DE PAGOS CUOTAS CREDITOS CLIENTES CASHMAN H.A -> DISPONIBLE PARA LOS USUARIOS ADMINISTRATIVOS -> [ADMINISTRADORES Y ATENCION AL CLIENTE]
    case "sistema-pagos-creditos-cashmanha-clientes-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA GENERAL DATOS CREDITICIOS CLIENTES [TODO EL CONJUNTO DE DATOS DE CREDITOS]
            $consulta = $Gestiones->ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios);
            // CONSULTA GENERAL DE CUOTAS GENERADAS SEGUN PRODUCTO ASOCIADO CLIENTES CASHMAN H.A
            $consulta1 = $Gestiones->ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarioSistema);
            require('../vista/AtencionClientes/consulta-cuotas-creditos-sistema-pagos-cashmanha-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 4)
        break;
        // PAGINA DE SISTEMA DE PAGOS CUOTAS CREDITOS CLIENTES CASHMAN H.A [ESPECIFICAMENTE ORDENES DE PAGO SEGUN LA CUOTA A CANCELAR {ID DE CUOTA GENERADA EN SISTEMA}] -> DISPONIBLE PARA LOS USUARIOS ADMINISTRATIVOS -> [ADMINISTRADORES Y ATENCION AL CLIENTE]
    case "orden-pago-creditos-cashmanha-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdCuotas = (empty($_GET['idcuota'])) ? NULL : $_GET['idcuota']; // ID CUOTA UNICO ASOCIADO A CLIENTE -> PRODUCTO -> CREDITO
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $NumeroCuotaCliente = (empty($_GET['numcuotacliente'])) ? NULL : $_GET['numcuotacliente']; // NUMERO DE CUOTA CLIENTE -> N A N CUOTA -> PLAZO
            // CONSULTA ESPECIFICA [N CUOTA -> N ORDEN DE PAGO A CANCELAR -> DETALLE INDIVIDUAL]
            $consulta = $Gestiones->ConsultarCuotas_OrdenPagoClientes($conectarsistema, $IdUsuarios, $IdCuotas);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/Administradores/orden-pagos-cuotas-creditos-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE SISTEMA DE PAGOS CUOTAS CREDITOS CLIENTES CASHMAN H.A [ESPECIFICAMENTE ORDENES DE PAGO SEGUN LA CUOTA A CANCELAR {ID DE CUOTA GENERADA EN SISTEMA}] -> DISPONIBLE PARA LOS USUARIOS ADMINISTRATIVOS -> [ADMINISTRADORES Y ATENCION AL CLIENTE]
    case "orden-pago-creditos-cashmanha-clientes-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdCuotas = (empty($_GET['idcuota'])) ? NULL : $_GET['idcuota']; // ID CUOTA UNICO ASOCIADO A CLIENTE -> PRODUCTO -> CREDITO
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $NumeroCuotaCliente = (empty($_GET['numcuotacliente'])) ? NULL : $_GET['numcuotacliente']; // NUMERO DE CUOTA CLIENTE -> N A N CUOTA -> PLAZO
            // CONSULTA ESPECIFICA [N CUOTA -> N ORDEN DE PAGO A CANCELAR -> DETALLE INDIVIDUAL]
            $consulta = $Gestiones->ConsultarCuotas_OrdenPagoClientes($conectarsistema, $IdUsuarios, $IdCuotas);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarioSistema);
            require('../vista/AtencionClientes/orden-pagos-cuotas-creditos-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if($_SESSION['id_rol'] == 4)
        break;
        // ENVIO DATOS -> PAGOS DE CUOTAS CREDITOS CLIENTES [ENVIO A BASE DE DATOS]
    case "envio-datos-pagos-cuotas-clientes-sistema-pago":
        // VALIDO UNICAMENTE PARA ADMINISTRADORES Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) {
            $IdUsuarios = (empty($_POST['idusuarioscuotas'])) ? NULL : $_POST['idusuarioscuotas']; // ID UNICO DE USUARIO ASIGNADO A PRODUCTO Y CUOTA GENERADA
            $IdProductos = (empty($_POST['idproductoscuotas'])) ? NULL : $_POST['idproductoscuotas']; // ID UNICO DE PRODUCTO ASOCIADO A CLIENTE
            $IdCreditos = (empty($_POST['idcreditoscuotas'])) ? NULL : $_POST['idcreditoscuotas']; // ID UNICO DE CREDITO ASOCIADO A CLIENTE
            $IdCuotas = (empty($_POST['idcuotas'])) ? NULL : $_POST['idcuotas']; // ID UNICO DE CUOTA ASOCIADO A CLIENTE, PRODUCTO Y CREDITO
            $NumeroReferenciaTransaccion = 'TCH#' . bin2hex(openssl_random_pseudo_bytes(5)); // ID DE TRANSACCION UNICO
            $MontoCuotaCredito = (empty($_POST['val-pagorequeridocuotacredito'])) ? NULL : $_POST['val-pagorequeridocuotacredito']; // MONTO ASIGNADO DE CUOTA CREDITOS CLIENTES
            $DiasIncumplimientoCredito = (empty($_POST['diasincumplimientocuotas']) == 0) ? NULL : $_POST['diasincumplimientocuotas']; // NUMERO DE DIAS DE INCUMPLIMIENTO A LA FECHA DE EFECTUAR LA TRANSACCION CREDITOS CLIENTES
            $EmpleadoGestionTransaccion = $_SESSION['usuario_unico']; // USUARIO UNICO DE USUARIO QUE GESTIONA RESPECTIVAS TRANSACCIONES CREDITOS CLIENTES
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->PagosCuotasClientes_TransaccionesCreditos($conectarsistema, $IdUsuarios, $IdProductos, $IdCreditos, $IdCuotas, $NumeroReferenciaTransaccion, $MontoCuotaCredito, $DiasIncumplimientoCredito, $EmpleadoGestionTransaccion);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) 
        break;
        // IMPRESION DE FACTURACION PAGO CUOTAS CREDITOS CLIENTES
    case "facturacion-pago-ordenes-pago-cuotas-clientes":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdCuotas = (empty($_GET['idcuota'])) ? NULL : $_GET['idcuota']; // ID CUOTA UNICO ASOCIADO A CLIENTE -> PRODUCTO -> CREDITO
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTAR DETALLES DE FACTURACION CREDITOS CLIENTES
            $consulta = $Gestiones->ConsultarDetallesFacturacion_OrdenPagosCreditosClientes($conectarsistema, $IdUsuarios, $IdCuotas);
            require('../vista/modelo-facturacion-pago-cuotas-creditos-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) 
        break;
        // IMPRESION DE FACTURACION PAGO CUOTAS CREDITOS CLIENTES => APLICABLE UNICAMENTE PARA HISTORICOS [CREDITOS CANCELADOS AL 100%]
    case "facturacion-pago-ordenes-pago-cuotas-clientes-historicos":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 3) {
            $IdCuotas = (empty($_GET['idcuota'])) ? NULL : $_GET['idcuota']; // ID CUOTA UNICO ASOCIADO A CLIENTE -> PRODUCTO -> CREDITO
            $IdHistoricoCreditos = (empty($_GET['idhistoricotransaccion'])) ? NULL : $_GET['idhistoricotransaccion']; // ID CUOTA UNICO ASOCIADO A CLIENTE -> PRODUCTO -> CREDITO
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTAR DETALLES DE FACTURACION CREDITOS CLIENTES
            $consulta = $Gestiones->ConsultarDetallesFacturacion_OrdenPagosCreditosClientes_Historicos($conectarsistema, $IdUsuarios, $IdCuotas, $IdHistoricoCreditos);
            require('../vista/modelo-facturacion-pago-cuotas-creditos-clientes-historico.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA]
    case "consulta-general-transacciones-procesadas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> TODOS LOS CLIENTES]
            $consulta = $Gestiones->ConsultaListadoGeneralTransaccionesClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-general-transacciones-clientes-procesadas.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA]
    case "consulta-general-transacciones-procesadas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> TODOS LOS CLIENTES]
            $consulta = $Gestiones->ConsultaListadoGeneralTransaccionesClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-general-transacciones-clientes-procesadas-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA Y GERENCIA]
    case "consulta-general-transacciones-procesadas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> TODOS LOS CLIENTES]
            $consulta = $Gestiones->ConsultaListadoGeneralTransaccionesClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-general-transacciones-clientes-procesadas-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-general-mis-transacciones-procesadas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-general-mis-transacciones-clientes-procesadas.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-general-mis-transacciones-procesadas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-general-mis-transacciones-clientes-procesadas-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-general-mis-transacciones-procesadas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-general-mis-transacciones-clientes-procesadas-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 3) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-general-mis-transacciones-procesadas-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-general-mis-transacciones-clientes-procesadas-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 4) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-general-mis-transacciones-procesadas-portal-cliente":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Clientes/consulta-general-mis-transacciones-clientes-procesadas-portal-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 5) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    case "consulta-general-transacciones-procesadas-por-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-general-mis-transacciones-clientes-procesadas.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 1) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    case "consulta-general-transacciones-procesadas-por-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-general-mis-transacciones-clientes-procesadas-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 2) 
        break;
        // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    case "consulta-general-transacciones-procesadas-por-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO COMPLETO DE TRANSACCIONES PROCESADAS [PAGO CUOTAS CREDITOS -> MIS TRANSACCIONES [SEGUN ID DE USUARIO DE LOS CLIENTES]
            $consulta = $Gestiones->ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-general-mis-transacciones-clientes-procesadas-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE ($_SESSION['id_rol'] == 3) 
        break;
        // PAGINA DE MENSAJERIA INTERNA CASHMAN H.A -> VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "mensajeria-cashmanha-usuarios":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE MENSAJES RECIBIDOS [BANDEJA DE ENTRADA -> SEGUN ID DE USUARIO]
            $consulta = $Gestiones->ConsultarMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Administradores/mensajeria-usuarios-cashmanha.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // PAGINA DE MENSAJERIA INTERNA CASHMAN H.A -> VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "mensajeria-cashmanha-usuarios-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE MENSAJES RECIBIDOS [BANDEJA DE ENTRADA -> SEGUN ID DE USUARIO]
            $consulta = $Gestiones->ConsultarMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Presidencia/mensajeria-usuarios-cashmanha-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // PAGINA DE MENSAJERIA INTERNA CASHMAN H.A -> VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "mensajeria-cashmanha-usuarios-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE MENSAJES RECIBIDOS [BANDEJA DE ENTRADA -> SEGUN ID DE USUARIO]
            $consulta = $Gestiones->ConsultarMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Gerencia/mensajeria-usuarios-cashmanha-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // PAGINA DE MENSAJERIA INTERNA CASHMAN H.A -> VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "mensajeria-cashmanha-usuarios-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE MENSAJES RECIBIDOS [BANDEJA DE ENTRADA -> SEGUN ID DE USUARIO]
            $consulta = $Gestiones->ConsultarMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/AtencionClientes/mensajeria-usuarios-cashmanha-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4) 
        break;
        // PAGINA DE MENSAJERIA INTERNA CASHMAN H.A -> VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "mensajeria-cashmanha-usuarios-clientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE MENSAJES RECIBIDOS [BANDEJA DE ENTRADA -> SEGUN ID DE USUARIO]
            $consulta = $Gestiones->ConsultarMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Clientes/mensajeria-usuarios-cashmanha-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5) 
        break;
        // PAGINA DE DETALLES MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE PARA TODOS LOS USUARIOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "detalle-mensajeria-cashmanha-usuarios":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $IdMensaje = (empty($_GET['idmensaje'])) ? NULL : $_GET['idmensaje']; // ID UNICO DE MENSAJE REGISTRADO
            // CONSULTA DETALLE COMPLETO DE MENSAJE RECIBIDO USUARIOS [FILTRO SEGUN ID DE USUARIO E ID DE MENSAJE REGISTRADO]
            $consulta = $Gestiones->ConsultarDetallesMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios, $IdMensaje);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Administradores/detalle-mensajes-usuarios-mensajeria.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // PAGINA DE DETALLES MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE PARA TODOS LOS USUARIOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "detalle-mensajeria-cashmanha-usuarios-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $IdMensaje = (empty($_GET['idmensaje'])) ? NULL : $_GET['idmensaje']; // ID UNICO DE MENSAJE REGISTRADO
            // CONSULTA DETALLE COMPLETO DE MENSAJE RECIBIDO USUARIOS [FILTRO SEGUN ID DE USUARIO E ID DE MENSAJE REGISTRADO]
            $consulta = $Gestiones->ConsultarDetallesMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios, $IdMensaje);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Presidencia/detalle-mensajes-usuarios-mensajeria-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // PAGINA DE DETALLES MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE PARA TODOS LOS USUARIOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "detalle-mensajeria-cashmanha-usuarios-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $IdMensaje = (empty($_GET['idmensaje'])) ? NULL : $_GET['idmensaje']; // ID UNICO DE MENSAJE REGISTRADO
            // CONSULTA DETALLE COMPLETO DE MENSAJE RECIBIDO USUARIOS [FILTRO SEGUN ID DE USUARIO E ID DE MENSAJE REGISTRADO]
            $consulta = $Gestiones->ConsultarDetallesMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios, $IdMensaje);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Gerencia/detalle-mensajes-usuarios-mensajeria-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // PAGINA DE DETALLES MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE PARA TODOS LOS USUARIOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "detalle-mensajeria-cashmanha-usuarios-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $IdMensaje = (empty($_GET['idmensaje'])) ? NULL : $_GET['idmensaje']; // ID UNICO DE MENSAJE REGISTRADO
            // CONSULTA DETALLE COMPLETO DE MENSAJE RECIBIDO USUARIOS [FILTRO SEGUN ID DE USUARIO E ID DE MENSAJE REGISTRADO]
            $consulta = $Gestiones->ConsultarDetallesMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios, $IdMensaje);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/AtencionClientes/detalle-mensajes-usuarios-mensajeria-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4) 
        break;
        // PAGINA DE DETALLES MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE PARA TODOS LOS USUARIOS [ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "detalle-mensajeria-cashmanha-usuarios-clientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $IdMensaje = (empty($_GET['idmensaje'])) ? NULL : $_GET['idmensaje']; // ID UNICO DE MENSAJE REGISTRADO
            // CONSULTA DETALLE COMPLETO DE MENSAJE RECIBIDO USUARIOS [FILTRO SEGUN ID DE USUARIO E ID DE MENSAJE REGISTRADO]
            $consulta = $Gestiones->ConsultarDetallesMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios, $IdMensaje);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Clientes/detalle-mensajes-usuarios-mensajeria-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4) 
        break;
        // PAGINA DE ENVIO MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE USUARIOS ADMINISTRATIVOS [NO APLICABLE PARA CLIENTES CASHMAN H.A]
    case "envio-mensajeria-usuarios-cashmanha":
        // VALIDO PARA USUARIOS ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE USUARIOS REGISTRADOS [FILTRO UNICAMENTE NOMBRES, APELLIDOS Y CODIGO UNICO DE USUARIOS -> APLICABLE PARA SELECT DE FORMULARIO DE REGISTRO]
            $consulta = $Gestiones->ConsultarListadoUsuariosCompleto_MensajeriaCashmanHa($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Administradores/enviar-mensajeria-usuarios-cashmanha.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1) 
        break;
        // PAGINA DE ENVIO MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE USUARIOS ADMINISTRATIVOS [NO APLICABLE PARA CLIENTES CASHMAN H.A]
    case "envio-mensajeria-usuarios-cashmanha-presidencia":
        // VALIDO PARA USUARIOS PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE USUARIOS REGISTRADOS [FILTRO UNICAMENTE NOMBRES, APELLIDOS Y CODIGO UNICO DE USUARIOS -> APLICABLE PARA SELECT DE FORMULARIO DE REGISTRO]
            $consulta = $Gestiones->ConsultarListadoUsuariosCompleto_MensajeriaCashmanHa($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Presidencia/enviar-mensajeria-usuarios-cashmanha-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2) 
        break;
        // PAGINA DE ENVIO MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE USUARIOS ADMINISTRATIVOS [NO APLICABLE PARA CLIENTES CASHMAN H.A]
    case "envio-mensajeria-usuarios-cashmanha-gerencia":
        // VALIDO PARA USUARIOS GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE USUARIOS REGISTRADOS [FILTRO UNICAMENTE NOMBRES, APELLIDOS Y CODIGO UNICO DE USUARIOS -> APLICABLE PARA SELECT DE FORMULARIO DE REGISTRO]
            $consulta = $Gestiones->ConsultarListadoUsuariosCompleto_MensajeriaCashmanHa($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/Gerencia/enviar-mensajeria-usuarios-cashmanha-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3) 
        break;
        // PAGINA DE ENVIO MENSAJERIA INTERNA CASHMAN H.A -> VALIDO UNICAMENTE USUARIOS ADMINISTRATIVOS [NO APLICABLE PARA CLIENTES CASHMAN H.A]
    case "envio-mensajeria-usuarios-cashmanha-atencion-al-cliente":
        // VALIDO PARA USUARIOS ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA LISTADO COMPLETO DE USUARIOS REGISTRADOS [FILTRO UNICAMENTE NOMBRES, APELLIDOS Y CODIGO UNICO DE USUARIOS -> APLICABLE PARA SELECT DE FORMULARIO DE REGISTRO]
            $consulta = $Gestiones->ConsultarListadoUsuariosCompleto_MensajeriaCashmanHa($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema3, $IdUsuarios);
            require('../vista/AtencionClientes/enviar-mensajeria-usuarios-cashmanha-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
            $conectarsistema5->close(); // CERRANDO CONEXION AUXILIAR 5
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4) 
        break;
        // ENVIO DATOS REGISTRO NUEVOS MENSAJES USUARIOS [MENSAJERIA INTERNA -> ENVIO A BASE DE DATOS]
    case "envio-datos-registro-mensajeria-usuarios":
        // VALIDO UNICAMENTE USUARIOS ADMINISTRATIVOS [NO PORTAL DE CLIENTES]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            $NombreMensajeria = (empty($_POST['val-nombremensaje'])) ? NULL : $_POST['val-nombremensaje']; // NOMBRE DE MENSAJE
            $AsuntoMensajeria = (empty($_POST['val-asuntomensaje'])) ? NULL : $_POST['val-asuntomensaje']; // ASUNTO DE MENSAJE
            $DetalleMensajeria = (empty($_POST['val-mensajecompleto'])) ? NULL : $_POST['val-mensajecompleto']; // ASUNTO DE MENSAJE
            $IdUsuarioDestinatarioMensajeria = (empty($_POST['val-destinatario'])) ? NULL : $_POST['val-destinatario']; // ID USUARIO DESTINATARIO FINAL DE MENSAJE
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($NombreMensajeria)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->EnvioNuevosMensajes_MensajeriaInternaCashmanHa($conectarsistema, $IdUsuarios, $NombreMensajeria, $AsuntoMensajeria, $DetalleMensajeria, $IdUsuarioDestinatarioMensajeria);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4)
        break;
        // ENVIO DATOS OCULTAR MENSAJES RECIBIDOS USUARIOS [MENSAJERIA INTERNA -> ENVIO A BASE DE DATOS]
    case "envio-datos-ocultar-mensajes-recibidos-mensajeria-usuarios-cashmanha":
        // VALIDO PARA TODOS LOS USUARIOS
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdMensajeria = (empty($_GET['idmensajeria'])) ? NULL : $_GET['idmensajeria']; // ID UNICO DE MENSAJE REGISTRADO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdMensajeria)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->OcultarMensajes_MensajeriaInternaCashmanHa($conectarsistema, $IdMensajeria);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5)
        break;
        // PAGINA DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    case "visualizar-mis-notificaciones-usuarios":
        // VALIDO PARA USUARIOS ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO COMPLETO DE NOTIFICACIONES
            $consulta = $Gestiones->MostrarListadoNotificacionesRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/notificaciones-recibidas-usuarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    case "visualizar-mis-notificaciones-usuarios-presidencia":
        // VALIDO PARA USUARIOS PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO COMPLETO DE NOTIFICACIONES
            $consulta = $Gestiones->MostrarListadoNotificacionesRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/notificaciones-recibidas-usuarios-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // PAGINA DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    case "visualizar-mis-notificaciones-usuarios-gerencia":
        // VALIDO PARA USUARIOS GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO COMPLETO DE NOTIFICACIONES
            $consulta = $Gestiones->MostrarListadoNotificacionesRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/notificaciones-recibidas-usuarios-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // PAGINA DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    case "visualizar-mis-notificaciones-usuarios-atencion-clientes":
        // VALIDO PARA USUARIOS ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO COMPLETO DE NOTIFICACIONES
            $consulta = $Gestiones->MostrarListadoNotificacionesRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/notificaciones-recibidas-usuarios-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // PAGINA DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    case "visualizar-mis-notificaciones-usuarios-clientes":
        // VALIDO PARA USUARIOS CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO COMPLETO DE NOTIFICACIONES
            $consulta = $Gestiones->MostrarListadoNotificacionesRecibidasUsuarios($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Clientes/notificaciones-recibidas-usuarios-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // ENVIO DATOS OCULTAR NOTIFICACIONES RECIBIDAS USUARIOS -> VALIDO PARA TODOS LOS USUARIOS [ENVIO A BASE DE DATOS]
    case "envio-datos-ocultar-notificaciones-usuarios":
        // VALIDO PARA TODOS LOS USUARIOS
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdNotificaciones = (empty($_GET['idnotificacion'])) ? NULL : $_GET['idnotificacion']; // ID UNICO DE MENSAJE REGISTRADO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdNotificaciones)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->OcultarMisNotificacionesUsuarios($conectarsistema, $IdNotificaciones);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5)
        break;
        // REGISTRO DE NUEVAS CUENTAS DE AHORROS CLIENTES CASHMAN H.A -> VALIDO PARA ADMINISTRADORES Y ATENCION AL CLIENTE
    case "registro-nuevas-cuentas-ahorro-clientes":
        // VALIDO PARA USUARIOS ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTAR LISTADO CLIENTES -> REGISTRO NUEVAS CUENTAS DE AHORRO Y DEPOSITO PLAZO FIJO
            $consulta = $Gestiones->ConsultaListadoGeneralClientes_NuevasCuentasCashmanha($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/registro-nuevos-cuentas-ahorros-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO DE NUEVAS CUENTAS DE AHORROS CLIENTES CASHMAN H.A -> VALIDO PARA ADMINISTRADORES Y ATENCION AL CLIENTE
    case "registro-nuevas-cuentas-ahorro-atencion-clientes":
        // VALIDO PARA USUARIOS ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTAR LISTADO CLIENTES -> REGISTRO NUEVAS CUENTAS DE AHORRO Y DEPOSITO PLAZO FIJO
            $consulta = $Gestiones->ConsultaListadoGeneralClientes_NuevasCuentasCashmanha($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/registro-nuevos-cuentas-ahorros-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // ENVIO DATOS REGISTRO DE NUEVAS CUENTAS DE AHOROO CLIENTES CASHMAN H.A [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-nuevas-cuentas-ahorro-clientes":
        // VALIDO PARA USUARIOS ADMINISTRADORES Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) {
            $NumeroCuentaClientes = (empty($_POST['val-numerocuentaahorro'])) ? NULL : $_POST['val-numerocuentaahorro']; // NUMERO UNICO DE CUENTA AHORRO CLIENTE
            $MontoDepositoAperturaCuenta = (empty($_POST['val-montodepositoapertura'])) ? NULL : $_POST['val-montodepositoapertura']; // MONTO DE APERTURA DEPOSITADO POR CLIENTES
            /*
                    -> IMPORTANTE: CUALQUIER CAMBIO EN EL ID UNICO REFERENTE AL PRODUCTO REGISTRADO
                    CUENTAS DE AHORRO PERSONALES CON CODIGO [CAhorrosPe-CHSA] DEBE SER CAMBIADO INMEDIATAMENTE EN ESTE APARTADO, PARA ASI EVITAR CONFLICTOS Y ERRORES.
                */
            $IdProductos = 1; // ID UNICO DE PRODUCTO REGISTRADO
            $IdUsuarios = (empty($_POST['val-clientecuentaahorro'])) ? NULL : $_POST['val-clientecuentaahorro']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            if (empty($NumeroCuentaClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroNuevasCuentasAhorroClientesCashmanha($conectarsistema, $NumeroCuentaClientes, $MontoDepositoAperturaCuenta, $IdProductos, $IdUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4)
        break;
        // CONSULTA DE CUENTAS DE AHORRO REGISTRADAS -> GESTION DE CUENTAS DE AHORROS [DEPOSITAR, RETIRAR, CERRAR CUENTAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "gestionador-cuentas-ahorros-clientes":
        // VALIDO PARA USUARIOS ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO GENERAL DE CUENTAS DE AHORROS REGISTRADAS
            $consulta = $Gestiones->ConsultaListadoCuentasAhorrosRegistradasClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/consulta-general-cuentas-ahorros-registradas.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA DE CUENTAS DE AHORRO REGISTRADAS -> GESTION DE CUENTAS DE AHORROS [DEPOSITAR, RETIRAR, CERRAR CUENTAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "gestionador-cuentas-ahorros-clientes-presidencia":
        // VALIDO PARA USUARIOS PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO GENERAL DE CUENTAS DE AHORROS REGISTRADAS
            $consulta = $Gestiones->ConsultaListadoCuentasAhorrosRegistradasClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/consulta-general-cuentas-ahorros-registradas-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA DE CUENTAS DE AHORRO REGISTRADAS -> GESTION DE CUENTAS DE AHORROS [DEPOSITAR, RETIRAR, CERRAR CUENTAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "gestionador-cuentas-ahorros-clientes-gerencia":
        // VALIDO PARA USUARIOS GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO GENERAL DE CUENTAS DE AHORROS REGISTRADAS
            $consulta = $Gestiones->ConsultaListadoCuentasAhorrosRegistradasClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/consulta-general-cuentas-ahorros-registradas-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // CONSULTA DE CUENTAS DE AHORRO REGISTRADAS -> GESTION DE CUENTAS DE AHORROS [DEPOSITAR, RETIRAR, CERRAR CUENTAS] -> VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "gestionador-cuentas-ahorros-clientes-atencion-clientes":
        // VALIDO PARA USUARIOS ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // LISTADO GENERAL DE CUENTAS DE AHORROS REGISTRADAS
            $consulta = $Gestiones->ConsultaListadoCuentasAhorrosRegistradasClientes($conectarsistema);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-general-cuentas-ahorros-registradas-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // REGISTRO NUEVOS DEPOSITOS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
        // VALIDO PARA ADMINISTRADORES Y ATENCION AL CLIENTE
    case "deposito-cuentas-ahorros-clientes":
        // VALIDO PARA USUARIOS ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA ESPECIFICA COMPLETA DATOS CUENTA AHORRO CLIENTES -> ASOCIADOS A USUARIOS / CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTAR ULTIMO ID DE TRANSACCION PROCESADO -> CLIENTES CUENTAS
            $consulta1 = $Gestiones->ConsultarUltimoIdRegistroTransaccion_CuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Administradores/registro-depositos-cuentas-ahorros-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO NUEVOS DEPOSITOS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
        // VALIDO PARA ADMINISTRADORES Y ATENCION AL CLIENTE
    case "deposito-cuentas-ahorros-atencion-clientes":
        // VALIDO PARA USUARIOS ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_GET['idusuario']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA ESPECIFICA COMPLETA DATOS CUENTA AHORRO CLIENTES -> ASOCIADOS A USUARIOS / CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTAR ULTIMO ID DE TRANSACCION PROCESADO -> CLIENTES CUENTAS
            $consulta1 = $Gestiones->ConsultarUltimoIdRegistroTransaccion_CuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/AtencionClientes/registro-depositos-cuentas-ahorros-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // ENVIO DATOS REGISTRO DEPOSITOS CUENTAS DE AHORROS CLIENTES [ENVIO A BASE DE DATOS]
        // VALIDO PARA USUARIOS ADMINISTRADORES Y ATENCION AL CLIENTE
    case "envio-datos-registro-depositos-cuentas-ahorros-clientes":
        // SOLAMENTE USUARIOS ADMINISTRADORES Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) {
            $IdUsuarios = (empty($_POST['IdUsuarioCuentaAhorro'])) ? NULL : $_POST['IdUsuarioCuentaAhorro']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            /*
                    -> IMPORTANTE: CUALQUIER CAMBIO EN EL ID UNICO REFERENTE AL PRODUCTO REGISTRADO
                    CUENTAS DE AHORRO PERSONALES CON CODIGO [CAhorrosPe-CHSA] DEBE SER CAMBIADO INMEDIATAMENTE EN ESTE APARTADO, PARA ASI EVITAR CONFLICTOS Y ERRORES.
                */
            $IdProductos = 1; // ID UNICO DE PRODUCTO REGISTRADO
            $IdCuentaAhorroClientes = (empty($_POST['IdCuentaAhorro'])) ? NULL : $_POST['IdCuentaAhorro']; // ID UNICO DE CUENTA REGISTRADA -> CUENTAS AHORRO CLIENTES
            $ReferenciaTransaccionDepositoCuentas = 'TDCA-CH#' . bin2hex(openssl_random_pseudo_bytes(8)); // ID DE TRANSACCION UNICO DEPOSITOS CUENTAS AHORRO CLIENTES
            $MontoDepositoCuentas = (empty($_POST['SaldoDepositoCuentaClientes'])) ? NULL : $_POST['SaldoDepositoCuentaClientes']; // MONTO ENTREGADO POR CLIENTE, A DEPOSITAR CUENTAS AHORRO CLIENTES
            $EmpleadoGestionTransaccionDepositoCuentas = $_SESSION['usuario_unico']; // CODIGO UNICO DE EMPLEADO QUE GESTIONA DEPOSITO CUENTAS AHORRO CLIENTES
            $TipoTransaccionDepositosRetirosCuentas = "Entrada"; // TIPO DE TRANSACCION PROCESADA -> CLIENTES CUENTAS
            $EstadoTransaccionDepositosRetirosCuentas = "Procesada"; // ESTADO DE TRANSACCION -> CLIENTES CUENTAS
            $SaldoActualDepositosRetirosCuentas = (empty($_POST['SaldoActualCuentaClientes'])) ? NULL : $_POST['SaldoActualCuentaClientes']; // SALDO ACTUAL REGISTRADO CUENTAS CLIENTES
            $CalculoNuevoSaldoDepositosRetirosCuentas = $SaldoActualDepositosRetirosCuentas + $MontoDepositoCuentas; // CALCULAR NUEVO SALDO DISPONIBLE CUENTAS CLIENTES
            if (empty($IdCuentaAhorroClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroDepositosCuentasAhorroClientesCashmanha($conectarsistema, $IdUsuarios, $IdProductos, $IdCuentaAhorroClientes, $ReferenciaTransaccionDepositoCuentas, $MontoDepositoCuentas, $EmpleadoGestionTransaccionDepositoCuentas, $TipoTransaccionDepositosRetirosCuentas, $EstadoTransaccionDepositosRetirosCuentas, $CalculoNuevoSaldoDepositosRetirosCuentas);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4)
        break;
        // VISTA IMPRESION COMPROBANTES TRANSACCIONES REALIZADAS -> DEPOSITOS, RETIROS CUENTAS DE AHORRO Y PLAZO FIJO
    case "impresion-comprobantes-transacciones-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] >= 1 || $_SESSION['id_rol'] <= 4) {
            $IdTransaccionesDepositoCuentas = (empty($_GET['idtransaccionesclientes'])) ? NULL : $_GET['idtransaccionesclientes']; // ID UNICO DE TRANSACCION REGISTRADA
            $IdUsuarios = (empty($_GET['idusuarioscuentas'])) ? NULL : $_GET['idusuarioscuentas']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            // SI EL CLIENTE REALIZA LA PRIMERA TRANSACCION ASOCIADA A SU CUENTA, DESPLEGARA VENTANA DE ADVERTENCIA SOLICITANDO QUE INGRESE MANUALMENTE A LA VISUALIZACION E IMPRESION DE RESPECTIVO COMPROBANTE
            if (empty($IdTransaccionesDepositoCuentas)) {
                $consulta = $Gestiones->ConsultaDetallesTransaccionCuentasClientes_ComprobantesPrimerTransaccion($conectarsistema, $IdUsuarios);
                // CASO CONTRARIO, COMPROBANTE SE GENERA AUTOMATICAMENTE Y LOS USUARIOS SON REDIRIGIDOS DIRECTAMENTE A LA VISTA DEL COMPROBANTE
            } else {
                $consulta1 = $Gestiones->ConsultaDetallesTransaccionCuentasClientes_Comprobantes($conectarsistema1, $IdTransaccionesDepositoCuentas, $IdUsuarios);
            }
            require('../vista/modelo-facturacion-transacciones-cuentas-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 || $_SESSION['id_rol'] <= 4)
        break;
        // REGISTRO NUEVOS RETIROS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
        // VALIDO PARA ADMINISTRADORES Y ATENCION AL CLIENTE
    case "retiros-cuentas-ahorros-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA ESPECIFICA COMPLETA DATOS CUENTA AHORRO CLIENTES -> ASOCIADOS A USUARIOS / CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTAR ULTIMO ID DE TRANSACCION PROCESADO -> CLIENTES CUENTAS
            $consulta1 = $Gestiones->ConsultarUltimoIdRegistroTransaccion_CuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Administradores/registro-retiros-cuentas-ahorros-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REGISTRO NUEVOS RETIROS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
        // VALIDO PARA ADMINISTRADORES Y ATENCION AL CLIENTE
    case "retiros-cuentas-ahorros-atencion-clientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = (empty($_GET['idusuario'])) ? NULL : $_GET['idusuario']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS REGISTRADOS
            // CONSULTA ESPECIFICA COMPLETA DATOS CUENTA AHORRO CLIENTES -> ASOCIADOS A USUARIOS / CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTAR ULTIMO ID DE TRANSACCION PROCESADO -> CLIENTES CUENTAS
            $consulta1 = $Gestiones->ConsultarUltimoIdRegistroTransaccion_CuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/AtencionClientes/registro-retiros-cuentas-ahorros-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // ENVIO DATOS REGISTRO DEPOSITOS CUENTAS DE AHORROS CLIENTES [ENVIO A BASE DE DATOS]
    case "envio-datos-registro-retiros-cuentas-ahorros-clientes":
        // SOLAMENTE USUARIOS ADMINISTRADORES Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4) {
            $IdUsuarios = (empty($_POST['IdUsuarioCuentaAhorro'])) ? NULL : $_POST['IdUsuarioCuentaAhorro']; // ID UNICO DE USUARIO / CLIENTE REGISTRADO
            /*
                    -> IMPORTANTE: CUALQUIER CAMBIO EN EL ID UNICO REFERENTE AL PRODUCTO REGISTRADO
                    CUENTAS DE AHORRO PERSONALES CON CODIGO [CAhorrosPe-CHSA] DEBE SER CAMBIADO INMEDIATAMENTE EN ESTE APARTADO, PARA ASI EVITAR CONFLICTOS Y ERRORES.
                */
            $IdProductos = 1; // ID UNICO DE PRODUCTO REGISTRADO
            $IdCuentaAhorroClientes = (empty($_POST['IdCuentaAhorro'])) ? NULL : $_POST['IdCuentaAhorro']; // ID UNICO DE CUENTA REGISTRADA -> CUENTAS AHORRO CLIENTES
            $ReferenciaTransaccionDepositoCuentas = 'TRCA-CH#' . bin2hex(openssl_random_pseudo_bytes(8)); // ID DE TRANSACCION UNICO DEPOSITOS CUENTAS AHORRO CLIENTES
            $MontoDepositoCuentas = (empty($_POST['SaldoRetiroCuentaClientes'])) ? NULL : $_POST['SaldoRetiroCuentaClientes']; // MONTO ENTREGADO POR CLIENTE, A DEPOSITAR CUENTAS AHORRO CLIENTES
            $EmpleadoGestionTransaccionDepositoCuentas = $_SESSION['usuario_unico']; // CODIGO UNICO DE EMPLEADO QUE GESTIONA DEPOSITO CUENTAS AHORRO CLIENTES
            $TipoTransaccionDepositosRetirosCuentas = "Salida"; // TIPO DE TRANSACCION PROCESADA -> CLIENTES CUENTAS
            $EstadoTransaccionDepositosRetirosCuentas = "Procesada"; // ESTADO DE TRANSACCION -> CLIENTES CUENTAS
            $SaldoActualDepositosRetirosCuentas = (empty($_POST['SaldoActualCuentaClientes'])) ? NULL : $_POST['SaldoActualCuentaClientes']; // SALDO ACTUAL REGISTRADO CUENTAS CLIENTES
            $CalculoNuevoSaldoDepositosRetirosCuentas = $SaldoActualDepositosRetirosCuentas - $MontoDepositoCuentas; // CALCULAR NUEVO SALDO DISPONIBLE CUENTAS CLIENTES
            if (empty($IdCuentaAhorroClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroRetirosCuentasAhorroClientesCashmanha($conectarsistema, $IdUsuarios, $IdProductos, $IdCuentaAhorroClientes, $ReferenciaTransaccionDepositoCuentas, $MontoDepositoCuentas, $EmpleadoGestionTransaccionDepositoCuentas, $TipoTransaccionDepositosRetirosCuentas, $EstadoTransaccionDepositosRetirosCuentas, $CalculoNuevoSaldoDepositosRetirosCuentas);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 4)
        break;
        // --> CONSULTA EXCLUSIVA DE MIS TRANSACCIONES PROCESADAS Y GESTIONADAS <--
        // CONSULTA COMPLETA MIS TRANSACCIONES CUENTAS -> DETALLE DE TRANSACCIONES SEGUN ID DE USUARIO REGISTRADO [VALIDO PARA TODOS LOS USUARIOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-transacciones-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Administradores/consulta-especifica-listado-transacciones-cuentas-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // --> CONSULTA EXCLUSIVA DE MIS TRANSACCIONES PROCESADAS Y GESTIONADAS <--
        // CONSULTA COMPLETA MIS TRANSACCIONES CUENTAS -> DETALLE DE TRANSACCIONES SEGUN ID DE USUARIO REGISTRADO [VALIDO PARA TODOS LOS USUARIOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-transacciones-cuentas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Presidencia/consulta-especifica-listado-transacciones-cuentas-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // --> CONSULTA EXCLUSIVA DE MIS TRANSACCIONES PROCESADAS Y GESTIONADAS <--
        // CONSULTA COMPLETA MIS TRANSACCIONES CUENTAS -> DETALLE DE TRANSACCIONES SEGUN ID DE USUARIO REGISTRADO [VALIDO PARA TODOS LOS USUARIOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-transacciones-cuentas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Gerencia/consulta-especifica-listado-transacciones-cuentas-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // --> CONSULTA EXCLUSIVA DE MIS TRANSACCIONES PROCESADAS Y GESTIONADAS <--
        // CONSULTA COMPLETA MIS TRANSACCIONES CUENTAS -> DETALLE DE TRANSACCIONES SEGUN ID DE USUARIO REGISTRADO [VALIDO PARA TODOS LOS USUARIOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-transacciones-cuentas-clientes-atencion-al-cliente":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/AtencionClientes/consulta-especifica-listado-transacciones-cuentas-clientes-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // --> CONSULTA EXCLUSIVA DE MIS TRANSACCIONES PROCESADAS Y GESTIONADAS <--
        // CONSULTA COMPLETA MIS TRANSACCIONES CUENTAS -> DETALLE DE TRANSACCIONES SEGUN ID DE USUARIO REGISTRADO [VALIDO PARA TODOS LOS USUARIOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "consulta-transacciones-cuentas-clientes-portalcliente":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Clientes/consulta-especifica-listado-transacciones-cuentas-clientes-portal-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // CONSULTA COMPLETA DE TRANSACCIONES CUENTAS CLIENTES -> TODOS LOS CLIENTES QUE APERTUREN CUENTAS DE AHORRO
        // -> SEGUN ID DE USUARIO REGISTRADO E ID UNICO DE CUENTA ASOCIADO A CLIENTE <-  [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-transacciones-general-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = (empty($_GET['idusuariocuenta'])) ? NULL : $_GET['idusuariocuenta']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Administradores/consulta-general-listado-transacciones-cuentas-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // CONSULTA COMPLETA DE TRANSACCIONES CUENTAS CLIENTES -> TODOS LOS CLIENTES QUE APERTUREN CUENTAS DE AHORRO
        // -> SEGUN ID DE USUARIO REGISTRADO E ID UNICO DE CUENTA ASOCIADO A CLIENTE <-  [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-transacciones-general-cuentas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = (empty($_GET['idusuariocuenta'])) ? NULL : $_GET['idusuariocuenta']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Presidencia/consulta-general-listado-transacciones-cuentas-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // CONSULTA COMPLETA DE TRANSACCIONES CUENTAS CLIENTES -> TODOS LOS CLIENTES QUE APERTUREN CUENTAS DE AHORRO
        // -> SEGUN ID DE USUARIO REGISTRADO E ID UNICO DE CUENTA ASOCIADO A CLIENTE <-  [VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE]
    case "consulta-transacciones-general-cuentas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = (empty($_GET['idusuariocuenta'])) ? NULL : $_GET['idusuariocuenta']; // ID UNICO DE USUARIOS
            $IdUsuarioSistema = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // CONSULTA COMPLETA DATOS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaMisTransaccionesCuentasClientes($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarioSistema);
            require('../vista/Gerencia/consulta-general-listado-transacciones-cuentas-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // CONSULTA COMPLETA DE TRANSACCIONES CUENTAS CLIENTES -> TODAS LAS TRANSACCIONES PROCESADAS DE TODOS LOS CLIENTES [VALIDO SOLO PARA ADMINISTRADORES]
    case "consulta-transacciones-procesadas-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES PROCESADAS CUENTAS CLIENTES
            $consulta = $Gestiones->ConsultaGeneralTransaccionesProcesadasClientesCuentas($conectarsistema);
            // CONSULTA GENERAL DE TODAS LAS TRANSACCIONES ANULADAS CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaGeneralTransaccionesAnuladasClientesCuentas($conectarsistema1);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Administradores/consulta-completa-transacciones-clientes-cuentas.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // ANULAR TRANSACCIONES DE DEPOSITOS CUENTAS CLIENTES [VALIDO SOLO PARA ADMINISTRADORES]
    case "anular-depositos-procesados-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdTransaccionesDepositoCuentas = (empty($_GET['idtransaccionprocesada'])) ? NULL : $_GET['idtransaccionprocesada']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdTransaccionesDepositoCuentas)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->AnularDepositosProcesadosClientes($conectarsistema, $IdTransaccionesDepositoCuentas);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($IdTransaccionesDepositoCuentas))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // ANULAR TRANSACCIONES DE RETIROS CUENTAS CLIENTES [VALIDO SOLO PARA ADMINISTRADORES]
    case "anular-retiros-procesados-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdTransaccionesDepositoCuentas = (empty($_GET['idtransaccionprocesada'])) ? NULL : $_GET['idtransaccionprocesada']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdTransaccionesDepositoCuentas)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->AnularRetirosProcesadosClientes($conectarsistema, $IdTransaccionesDepositoCuentas);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($IdTransaccionesDepositoCuentas))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // TRANSFERENCIA DE DINERO A OTRAS CUENTAS -> DISPONIBLE PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENTA DE AHORRO APERTURADA [VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTA -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "transferencia-otras-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES -> [CUENTAS DE AHORRO]
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Administradores/registro-transferencia-otras-cuentas.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // TRANSFERENCIA DE DINERO A OTRAS CUENTAS -> DISPONIBLE PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENTA DE AHORRO APERTURADA [VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTA -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "transferencia-otras-cuentas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES -> [CUENTAS DE AHORRO]
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Presidencia/registro-transferencia-otras-cuentas-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // TRANSFERENCIA DE DINERO A OTRAS CUENTAS -> DISPONIBLE PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENTA DE AHORRO APERTURADA [VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTA -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "transferencia-otras-cuentas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES -> [CUENTAS DE AHORRO]
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Gerencia/registro-transferencia-otras-cuentas-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // TRANSFERENCIA DE DINERO A OTRAS CUENTAS -> DISPONIBLE PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENTA DE AHORRO APERTURADA [VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTA -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "transferencia-otras-cuentas-clientes-portal-atencionclientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES -> [CUENTAS DE AHORRO]
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/AtencionClientes/registro-transferencia-otras-cuentas-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // TRANSFERENCIA DE DINERO A OTRAS CUENTAS -> DISPONIBLE PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENTA DE AHORRO APERTURADA [VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTA -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES]
    case "transferencia-otras-cuentas-clientes-portal-clientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES -> [CUENTAS DE AHORRO]
            $consulta = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Clientes/registro-transferencia-otras-cuentas-portal-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // PAGINA DE VALIDACION DE DATOS INGRESADOS Y TRANSFERENCIAS DE DINERO A OTRAS CUENTAS
        // VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTAS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES
    case "validacion-datos-transferencia-otras-cuentas-clientes":
        // VISTA VALIDA PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $IdCuentaAhorroClientes = (empty($_POST['val-numerocuentaclientes'])) ? NULL : $_POST['val-numerocuentaclientes'];
            $consulta = $Gestiones->ConsultaDatosClientes_TransferenciasCuentasAhorros($conectarsistema, $IdCuentaAhorroClientes);
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Administradores/validacion-datos-transferencias-cuentas-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // PAGINA DE VALIDACION DE DATOS INGRESADOS Y TRANSFERENCIAS DE DINERO A OTRAS CUENTAS
        // VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTAS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES
    case "validacion-datos-transferencia-otras-cuentas-clientes-presidencia":
        // VISTA VALIDA PARA PRESIDENCIA
        if ($_SESSION['id_rol'] == 2) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $IdCuentaAhorroClientes = (empty($_POST['val-numerocuentaclientes'])) ? NULL : $_POST['val-numerocuentaclientes'];
            $consulta = $Gestiones->ConsultaDatosClientes_TransferenciasCuentasAhorros($conectarsistema, $IdCuentaAhorroClientes);
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Presidencia/validacion-datos-transferencias-cuentas-clientes-presidencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 2)
        break;
        // PAGINA DE VALIDACION DE DATOS INGRESADOS Y TRANSFERENCIAS DE DINERO A OTRAS CUENTAS
        // VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTAS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES
    case "validacion-datos-transferencia-otras-cuentas-clientes-gerencia":
        // VISTA VALIDA PARA GERENCIA
        if ($_SESSION['id_rol'] == 3) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $IdCuentaAhorroClientes = (empty($_POST['val-numerocuentaclientes'])) ? NULL : $_POST['val-numerocuentaclientes'];
            $consulta = $Gestiones->ConsultaDatosClientes_TransferenciasCuentasAhorros($conectarsistema, $IdCuentaAhorroClientes);
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Gerencia/validacion-datos-transferencias-cuentas-clientes-gerencia.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 3)
        break;
        // PAGINA DE VALIDACION DE DATOS INGRESADOS Y TRANSFERENCIAS DE DINERO A OTRAS CUENTAS
        // VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTAS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES
    case "validacion-datos-transferencia-otras-cuentas-clientes-portal-atencionclientes":
        // VISTA VALIDA PARA ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] == 4) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $IdCuentaAhorroClientes = (empty($_POST['val-numerocuentaclientes'])) ? NULL : $_POST['val-numerocuentaclientes'];
            $consulta = $Gestiones->ConsultaDatosClientes_TransferenciasCuentasAhorros($conectarsistema, $IdCuentaAhorroClientes);
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/AtencionClientes/validacion-datos-transferencias-cuentas-clientes-portal-atencion-al-cliente.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 4)
        break;
        // PAGINA DE VALIDACION DE DATOS INGRESADOS Y TRANSFERENCIAS DE DINERO A OTRAS CUENTAS
        // VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTAS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA, ATENCION AL CLIENTE Y CLIENTES
    case "validacion-datos-transferencia-otras-cuentas-clientes-portal-clientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $IdCuentaAhorroClientes = (empty($_POST['val-numerocuentaclientes'])) ? NULL : $_POST['val-numerocuentaclientes'];
            $consulta = $Gestiones->ConsultaDatosClientes_TransferenciasCuentasAhorros($conectarsistema, $IdCuentaAhorroClientes);
            // CONSULTA COMPLETA DATOS DE CUENTAS CLIENTES
            $consulta1 = $Gestiones->ConsultaEspecificaClientes_CuentasAhorros($conectarsistema1, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta2 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema2, $IdUsuarios);
            require('../vista/Clientes/validacion-datos-transferencias-cuentas-clientes-portal-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
            $conectarsistema4->close(); // CERRANDO CONEXION AUXILIAR 4
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // GENERADOR DE CODIGOS DE SEGURIDAD -> VALIDACION TRANSFERENCIAS CLIENTES [VALIDO PARA TODOS LOS USUARIOS QUE POSEAN CUENTA Y ADEMAS TODOS LOS ROLES VALIDADOS DENTRO DE ESTE SISTEMA]
    case "generador-codigos-transferencias-clientes":
        // VALIDO PARA TODOS LOS USUARIOS [TODOS LOS ROLES VALIDADOS]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdUsuarios = (empty($_SESSION['id_usuario'])) ? NULL : $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $CodigoSeguridadTransferencias = rand(100000, 999999); // CODIGO DE SEGURIDAD GENERADO -> VALIDACION TRANSFERENCIAS [6 DIGITOS]
            $Destinatario = $_SESSION['correo_usuario']; // CORREO ELECTRONICO REGISTRADO DE USUARIOS
            $Nombre = "CashMan H.A. - Soporte Sistemas"; // NOMBRE POR DEFECTO EMPRESA
            $Remitente = "codigostransferencias@cashmanha.com"; // CORREO DE RECUPERACION DE CUENTAS -> EMPRESA
            $Asunto = "Código Seguridad - Transferencias CashMan H.A."; // ASUNTO POR DEFECTO DE CORREO
            $Bytes = random_bytes(5); // GENERAR CODIGO DE 5 DIGITOS - LETRAS
            $Token = bin2hex($Bytes); // ENVIAR TOKEN A INSERCCION
            // EVITAR INGRESOS VACIOS, NULOS O MALINTENCIONADOS
            if (empty($IdUsuarios)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
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
                        <img src='http://localhost:90/CashManHA/vista/images/payment-processed.gif' style='width: 300px; max-width: 200px; height: auto; margin: auto; display: block;'>
                        </td>
                        </tr>
                        <tr>
                        <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0; background: #ffffff;'>
                        <table style='mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;'>
                        <tr>
                        <td>
                        <div class='text' style='padding: 0 2.5em; text-align: center;'>
                        <h2 style='font-family: Tahoma, sans-serif;color: #000000;'>C&oacute;digo Seguridad</h2><br>
                        <h4 style='font-family: Tahoma, sans-serif;color: #000000;'>Estimado cliente, por favor ingrese el siguiente c&oacute;digo de seguridad para finalizar su transferencia.</h4><br>
                        <span style='padding: .8rem; font-size: 18px; font-family: Tahoma, sans-serif; color: #666666; line-height: 150%; border: 3px dashed #b2bec3; letter-spacing: 1rem;'>$CodigoSeguridadTransferencias</span>
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
                        <p style='font-family: Helvetica, sans-serif; color: #000000;'>* Solamente cuenta con dos minutos para validar el respectivo c&oacute;digo de seguridad, posteriormente lamentamos informarle que no podr&aacute; validarlo y deber&aacute; solicitar uno nuevo.</p>
                        <p style='font-family: Helvetica, sans-serif; color: #000000;'>* Al hacer uso de este servicio, usted da por aceptadas todas nuestras pol&iacute;ticas y condiciones.</p>
                        <p style='font-family: Helvetica, sans-serif; color: #000000;'>* Asegurese que el cliente que recibir&aacute; dicha transferencia, sea la persona correcta. <strong>Caso contrario lamentamos informarle que no existen reintegros y posibilidad de anular dicha transacci&oacute;n</strong>.</p>
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
                // REGISTRO DE CODIGO DE SEGURIDAD GENERADO AUTOMATICAMENTE -> VALIDACION TRANSFERENCIAS
                $consulta = $Gestiones->RegistroCodigoSeguridad_TransferenciasCuentas($conectarsistema, $CodigoSeguridadTransferencias, $IdUsuarios);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($IdUsuarios))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5){
        break;
        // ENVIO DATOS -> PROCESAR Y REGISTRAR TRANSFERENCIAS CUENTAS CLIENTES [ENVIO A BASE DE DATOS]
    case "envio-datos-procesamiento-transferencias-clientes":
        // VALIDO PARA TODOS LOS USUARIOS [TODOS LOS ROLES VALIDADOS]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $NumeroCuentaAhorroClientes = (empty($_POST['NumeroCuentaDestinoClientes'])) ? NULL : $_POST['NumeroCuentaDestinoClientes']; // NUMERO DE CUENTA CLIENTE TRANSFERENCIA DESTINO FINAL
            $MontoTransferencia = (empty($_POST['SaldoTransferenciasCuentasClientes'])) ? NULL : $_POST['SaldoTransferenciasCuentasClientes']; // MONTO A TRANSFERIR CLIENTE TRANSFERENCIA DESTINO FINAL
            $ReferenciaTransferencia = 'TOCCA-CH#' . bin2hex(openssl_random_pseudo_bytes(9)); // ID DE TRANSACCION UNICO DEPOSITOS CUENTAS AHORRO CLIENTES
            $EstadoTransferencia = "Procesada"; // ESTADO DE TRANSFERENCIA CLIENTE DESTINO FINAL
            $IdUsuarioDestinoTransferencia = (empty($_POST['IdUsuarioDestinoClientes'])) ? NULL : $_POST['IdUsuarioDestinoClientes']; // ID UNICO DE USUARIOS [QUIEN RECIBE TRANSFERENCIA]
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS [QUIEN ENVIA TRANSFERENCIA]
            /*
                    -> IMPORTANTE: CUALQUIER CAMBIO EN EL ID UNICO REFERENTE AL PRODUCTO REGISTRADO
                    CUENTAS DE AHORRO PERSONALES CON CODIGO [CAhorrosPe-CHSA] DEBE SER CAMBIADO INMEDIATAMENTE EN ESTE APARTADO, PARA ASI EVITAR CONFLICTOS Y ERRORES.
                */
            $IdProductos = 1; // ID UNICO DE PRODUCTO REGISTRADO
            $IdCuentaAhorroClientes = (empty($_POST['IdCuentaEnvioClientes'])) ? NULL : $_POST['IdCuentaEnvioClientes']; // ID UNICO DE CUENTA CLIENTE TRANSFERENCIA [QUIEN ENVIA TRANSFERENCIA]
            $IdCuentaAhorroClientesDestino = (empty($_POST['IdCuentaDestinoClientes'])) ? NULL : $_POST['IdCuentaDestinoClientes']; // ID UNICO DE CUENTA CLIENTE TRANSFERENCIA [QUIEN RECIBE TRANSFERENCIA]
            // EVITAR INGRESOS VACIOS, NULOS O MALINTENCIONADOS
            if (empty($NumeroCuentaAhorroClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->RegistroTransferenciasCuentasClientes($conectarsistema, $NumeroCuentaAhorroClientes, $MontoTransferencia, $ReferenciaTransferencia, $EstadoTransferencia, $IdUsuarios, $IdUsuarioDestinoTransferencia, $IdProductos, $IdCuentaAhorroClientes, $IdCuentaAhorroClientesDestino);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($NumeroCuentaAhorroClientes))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5)
        break;
        // ENVIO DATOS BLOQUEAR CUENTAS DE AHORRO CLIENTES -> [ENVIO A BASE DE DATOS]
    case "envio-datos-bloquear-cuentas-ahorros-clientes":
        // VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERANCIA Y ATENCION AL CLIENTE
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCuentaAhorroClientes = (empty($_GET['idcuentas'])) ? NULL : $_GET['idcuentas']; // ID UNICO DE MENSAJE REGISTRADO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCuentaAhorroClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->BloquearCuentasAhorroClientes($conectarsistema, $IdCuentaAhorroClientes);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($IdCuentaAhorroClientes))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=4)
        break;
        // ENVIO DATOS CERRAR CUENTAS DE AHORRO CLIENTES -> [ENVIO A BASE DE DATOS]
    case "envio-datos-cerrar-cuentas-ahorros-clientes":
        // VALIDO PARA ADMINISTRADORES Y PRESIDENCIA
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 2) {
            $IdCuentaAhorroClientes = (empty($_GET['idcuentas'])) ? NULL : $_GET['idcuentas']; // ID UNICO DE MENSAJE REGISTRADO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCuentaAhorroClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->CerrarCuentasAhorroClientes($conectarsistema, $IdCuentaAhorroClientes);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=2)
        break;
        // ENVIO DATOS ACTIVAR CUENTAS DE AHORRO CLIENTES -> [ENVIO A BASE DE DATOS]
        // VALIDO PARA ADMINISTRADORES, PRESIDENCIA, GERENCIA Y ATENCION AL CLIENTE
    case "envio-datos-activar-cuentas-ahorros-clientes":
        // VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 4) {
            $IdCuentaAhorroClientes = (empty($_GET['idcuentas'])) ? NULL : $_GET['idcuentas']; // ID UNICO DE MENSAJE REGISTRADO
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCuentaAhorroClientes)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActivarCuentasAhorroClientes($conectarsistema, $IdCuentaAhorroClientes);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            } // CIERRE if (empty($IdCuentaAhorroClientes))
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=4)
        break;
        // PAGINA DE ERROR -> PAGINA O ELEMENTO NO EXISTENTE DENTRO DEL SISTEMA [ERROR 404]
    case "error-404":
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            require('../vista/error404.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5)
        break;
        // PAGINA DE BIENVENIDA NUEVOS USUARIOS / CLIENTES REGISTRADOS -> VALIDO PARA TODOS LOS USUARIOS / ROLES ACTIVOS
    case "gestiones-nuevos-usuarios-registrados":
        // VALIDO PARA TODOS LOS NUEVOS USUARIOS REGISTRADOS
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            require('../vista/gestion-acciones-sistema-nuevos-usuarios.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5)
        break;
        // ENVIO DATOS -> ACTUALIZACION DATOS SENSIBLES NUEVOS USUARIOS [QUIENES INICIAN POR PRIMERA VEZ EN EL PORTAL] -> ENVIO A BASE DE DATOS
    case "envio-datos-gestiones-nuevos-usuarios-registrados":
        // VALIDO PARA TODOS LOS NUEVOS USUARIOS REGISTRADOS
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $CodigoUnicoUsuario = (empty($_POST['val-usuariounico'])) ? NULL : $_POST['val-usuariounico']; // CODIGO DE USUARIO UNICO
            $cifrado = sha1($conectarsistema->real_escape_string($_POST['val-password'])); // CONTRASEÑA INGRESADA POR USUARIOS
            $ContraseniaUsuarios = crypt($conectarsistema->real_escape_string($_POST['val-password']), $cifrado); // ENCRIPTAR CONTRASEÑA INGRESADA
            $ComprobadorNuevoUsuario = "no"; // AL REALIZAR LA ANTERIOR PETICION, AUTOMATICAMENTE LOS USUARIOS DEJAN DE SER NUEVOS USUARIOS [ENTIENDASE PARA CAMBIO DE CAMPOS PREVIAMENTE EXPLICADOS A LOS MISMOS]
            // -> EVITAR INGRESO VACIO [ACCIDENTAL O CON INTENCION]
            if (empty($CodigoUnicoUsuario)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->ActualizacionDatosCuentas_InicioSesionPrimeraVez($conectarsistema, $IdUsuarios, $CodigoUnicoUsuario, $ContraseniaUsuarios, $ComprobadorNuevoUsuario);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
                $conectarsistema->close(); // CERRANDO CONEXION
            } // CIERRE if (empty($CodigoUnicoUsuario))
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5)
        break;
        // PAGINA MOSTRAR COPIAS DE CONTRATOS SUSCRITOS -> CREDITOS CLIENTES [VALIDO UNICAMENTE PARA PORTAL DE CLIENTES]
    case "copiacontratosuscrito-creditosclientes":
        // VALIDO PARA TODOS LOS NUEVOS USUARIOS REGISTRADOS
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIOS
            $NombreCopiaContrato = $_GET['nombrecopiacontrato'];
            // CONSULTA NOMBRE COPIA CONTRATO SUSCRITO -> CREDITOS CLIENTES
            $consulta = $Gestiones->ConsultarCopiaContratoCreditosClientes($conectarsistema, $IdUsuarios);
            require('../vista/mostrar-copia-contrato-creditos-clientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] >=1 && $_SESSION['id_rol'] <=5)
        break;
        // PAGINA DE BIENVENIDA NUEVOS CLIENTES, A QUIENES SU SOLICITUD CREDITICIA AUN NO HA SIDO APROBADA
    case "bienvenida-clientes":
        // VISTA EXCLUSIVA UNICAMENTE PARA CLIENTES CASHMAN HA
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            $consulta = $Gestiones->ConsultarEstadoSolicitudCrediticia_PortalNuevosClientes($conectarsistema, $IdUsuarios);
            require('../vista/bienvenidanuevosclientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 5)
        break;
        // ELIMINAR SOLICITUDES CREDITICIAS CANCELADAS AL 100% -> CLIENTES
        // IMPORTANTE PARA ASIGNACION DE NUEVOS CREDITOS
    case "eliminar-solicitudes-crediticias-clientes":
        // VISTA VALIDA SOLO PARA ADMINISTRADORES
        if ($_SESSION['id_rol'] == 1) {
            $IdCreditos = (empty($_GET['idcredito'])) ? NULL : $_GET['idcredito']; // ID UNICO DE USUARIOS
            // EVITAR INGRESO VACIO {ACCIDENTAL O CON INTENCION}
            if (empty($IdCreditos)) {
                // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
                header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
            } else {
                $consulta = $Gestiones->EliminarSolicitudesCrediticiasActivasCanceladas($conectarsistema, $IdCreditos);
                // ENVIANDO RESPUESTA DE ACCION A MODELO
                echo json_encode($consulta);
            }
            $conectarsistema->close(); // CERRANDO CONEXION
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REDIRECCIONES PREDETERMINADAS PARA PROCESAMIENTO DATOS -> TRANSFERENCIAS OTRAS CUENTAS
    case "redirecciones-gestiones-cuentas-clientes":
        // REDIRECCIONAR INICIO PORTAL ADMINISTRADORES [USUARIOS LOGUEADOS]
        if ($_SESSION['id_rol'] == 1) {
            header('location:cGestionesCashman.php?cashmanhagestion=consulta-transacciones-cuentas-clientes');
            // REDIRECCIONAR INICIO PORTAL PRESIDENCIA [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 2) {
            header('location:cGestionesCashman.php?cashmanhagestion=consulta-transacciones-cuentas-clientes-presidencia');
            // REDIRECCIONAR INICIO PORTAL GERENCIA [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 3) {
            header('location:cGestionesCashman.php?cashmanhagestion=consulta-transacciones-cuentas-clientes-gerencia');
            // REDIRECCIONAR INICIO PORTAL ATENCION AL CLIENTE [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 4) {
            header('location:cGestionesCashman.php?cashmanhagestion=consulta-transacciones-cuentas-clientes-atencion-al-cliente');
            // REDIRECCIONAR INICIO PORTAL CLIENTES [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 5) {
            header('location:cGestionesCashman.php?cashmanhagestion=consulta-transacciones-cuentas-clientes-portalcliente');
        } else {
            // SI LOS USUARIOS NO ESTAN LOGUEADOS, E INGRESAN PARAMETROS NO [O BIEN] EXISTENTES EN EL SISTEMA, SIMPLEMENTE REDIRIGIR A FORMULARIO DE INICIO DE SESION
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        }
        $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
        break;
        // CONSULTA LISTADO CREDITOS HISTORICOS [PORTAL CLIENTES]
    case "listado-general-creditos-historicos-portalclientes":
        // VISTA VALIDA PARA CLIENTES
        if ($_SESSION['id_rol'] == 5) {
            $IdUsuarios = $_SESSION['id_usuario']; // ID UNICO DE USUARIO REGISTRADO
            // CONSULTA LISTADO GENERAL DE SOLICITUDES DE CREDITOS CANCELADAS -> VALIDO PARA GENERACION DE FINIQUITO DE CANCELACION Y ENVIO A HISTORICO DE CREDITOS
            $consulta = $Gestiones->ConsultaGeneralCreditosAprobadosCanceladosPortalClientes($conectarsistema, $IdUsuarios);
            // LISTADO RECORTADO DE NOTIFICACIONES -> BARRA DE HERRAMIENTAS PLATAFORMA
            $consulta1 = $Gestiones->MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema1, $IdUsuarios);
            require('../vista/Clientes/consulta-creditos-historicos-portalclientes.php');
            $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
            // -> CIERRE DE CONEXIONES AUXILIARES
            $conectarsistema1->close(); // CERRANDO CONEXION AUXILIAR 1
            $conectarsistema2->close(); // CERRANDO CONEXION AUXILIAR 2
            $conectarsistema3->close(); // CERRANDO CONEXION AUXILIAR 3
        } else {
            // SI EL USUARIO SE ENCUENTRA LOGUEADO, REDIRECCIONA A PAGINA PRINCIPAL DE PORTAL SEGUN SU ROL DE USUARIO ASIGNADO
            header('location:cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
        } // CIERRE if ($_SESSION['id_rol'] == 1)
        break;
        // REDIRECCIONES PREDETERMINADAS PARA INICIOS DE PORTALES [SEGUN ROLES DE USUARIOS] -> APLICABLE PARA REDIRECCIONAR A PAGINAS SIN PERMISO Y PARAMETROS NO PERMITIDOS SIN UNA ACCION PREVIA [FORMULARIOS VACIOS]
    case "redirecciones-sistema-cashmanha":
        // REDIRECCIONAR INICIO PORTAL ADMINISTRADORES [USUARIOS LOGUEADOS]
        if ($_SESSION['id_rol'] == 1) {
            header('location:cGestionesCashman.php?cashmanhagestion=inicioadministradores');
            // REDIRECCIONAR INICIO PORTAL PRESIDENCIA [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 2) {
            header('location:cGestionesCashman.php?cashmanhagestion=iniciopresidencia');
            // REDIRECCIONAR INICIO PORTAL GERENCIA [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 3) {
            header('location:cGestionesCashman.php?cashmanhagestion=iniciogerencia');
            // REDIRECCIONAR INICIO PORTAL ATENCION AL CLIENTE [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 4) {
            header('location:cGestionesCashman.php?cashmanhagestion=inicioatencionclientes');
            // REDIRECCIONAR INICIO PORTAL CLIENTES [USUARIOS LOGUEADOS]
        } else if ($_SESSION['id_rol'] == 5) {
            header('location:cGestionesCashman.php?cashmanhagestion=inicioclientes');
        } else {
            // SI LOS USUARIOS NO ESTAN LOGUEADOS, E INGRESAN PARAMETROS NO [O BIEN] EXISTENTES EN EL SISTEMA, SIMPLEMENTE REDIRIGIR A FORMULARIO DE INICIO DE SESION
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        }
        $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
        break;
        // PAGINA ERROR 403 -> ACCESO NO PERMITIDO
    case "error-403":
        require('../vista/error403.php');
        $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
        break;
        // SI PARAMETROS NO EXISTEN, SIMPLEMENTE REDIRIGIR A PAGINA DE ERROR 404 SI ESTAN LOGUEADOS. CASO CONTRARIO REDIRIGIR A INDEX DE PLATAFORMA [FORMULARIO DE INICIO DE SESION]
    default:
        // MOSTRAR PAGINA DE ERROR 404 [ ELEMENTO NO EXISTENTE EN PLATAFORMA ]
        if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5) {
            header('location:cGestionesCashman.php?cashmanhagestion=error-404');
            // REDIRECCIONAR INICIO PORTAL PRESIDENCIA [USUARIOS LOGUEADOS]
        } else {
            // SI LOS USUARIOS NO ESTAN LOGUEADOS, E INGRESAN PARAMETROS NO [O BIEN] EXISTENTES EN EL SISTEMA, SIMPLEMENTE REDIRIGIR A FORMULARIO DE INICIO DE SESION
            header('location:cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        } // CIERRE if ($_SESSION['id_rol'] >= 1 && $_SESSION['id_rol'] <= 5)
        $conectarsistema->close(); // CERRANDO CONEXION PRINCIPAL
        break;
}// CIERRE switch($peticion_url)
