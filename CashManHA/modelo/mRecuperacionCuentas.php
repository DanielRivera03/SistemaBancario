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
class RecuperacionCuentas
{
    // INSERTAR DATOS DE RECUPERACION -> SOLICITUD DE REESTABLECIMIENTO DE CONTRASEÑAS USUARIOS
    public function RecuperarCuentasUsuarios($conectarsistema, $Destinatario, $Token, $CodigoRecuperacion)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ReestablecerContrasenias('" . $Destinatario . "','" . $Token . "','" . $CodigoRecuperacion . "');");
        if ($resultado) {
            // PAGINA DE CONFIRMACION DATOS ENVIADOS CON EXITO
            header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=confirmacion-recuperacion-cuentas');
        } else {
            // SI LA PETICION FALLA, SOLAMENTE REDIRIGE A PAGINA PRINCIPAL SI LLEGASE A ENTRAR
            // ESTA CONDICION POR CUALQUIER MOTIVO, EL SISTEMA ESTA VALIDADO A NO DAR ENTRADA
            // A CORREOS Y USUARIOS QUE NO EXISTAN EN EL SISTEMA
            header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=iniciarsesion');
        }
    }
    // CAMBIO DE CONTRASEÑAS USUARIOS -> RECUPERACION DE CUENTAS
    public function CambioContraseniaRecuperacion($conectarsistema, $Correo, $Contrasenia)
    {
        $resultado = mysqli_query($conectarsistema, "CALL CambioContraseniaRecuperacion('" . $Contrasenia . "','" . $Correo . "');");
        if ($resultado) {
            // PAGINA DE CONFIRMACION DATOS ENVIADOS CON EXITO
            header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=confirmacion-cambio-contrasenia');
        } else {
            // PAGINA DE ERROR DATOS NO ENVIADOS
            header('location:../controlador/cIniciosSesionesUsuarios.php?cashmanha=error-cambio-contrasenia');
        }
    }
    // CAMBIO ESTADO CODIGO DE SEGURIDAD ENVIADO A CORREO DE USUARIOS [NOUSADO -> USADO]
    public function CambioEstadoCodigoSeguridad($conectarsistema, $Correo, $TokenSeguridad, $CodigoSeguridad, $Estado)
    {
        $resultado = mysqli_query($conectarsistema, "CALL CambioEstadoToken('" . $Correo . "','" . $TokenSeguridad . "','" . $CodigoSeguridad . "','" . $Estado . "');");
        return $resultado;
    }
    // REGISTRO DE ACCESOS -> DATOS DE INICIO DE SESION TODOS LOS USUARIOS
    public function RegistrarAccesosUsuarios($conectarsistema, $Dispositivo, $SistemaOperativo, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarAccesosUsuarios('" . $Dispositivo . "','" . $SistemaOperativo . "','" . $IdUsuarios . "');");
        return $resultado;
    }
}// CIERRE class RecuperacionCuentas
