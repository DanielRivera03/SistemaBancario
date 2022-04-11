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
    // IMPORTAR ARCHIVO DE CONEXION
    require('conexion.php');
    // EVITAR CONSULTAS USUARIOS VACIOS
    if(!empty($_POST["val-correo"])) {
        $resultado=mysqli_query($conectarsistema,"CALL ConsultarCorreoRecuperacion('".$_POST["val-correo"] ."');");
        // LEER COINCIDENCIAS DE USUARIOS SEGUN INGRESADO EN CAJA DE TEXTO
        $usuario_encontrado = mysqli_num_rows($resultado); // CONTADOR DE BUSQUEDA
        if($usuario_encontrado>0) { // USUARIO EXISTENTE
            // USUARIOS REGISTRADOS EN EL SISTEMA
            // IMPRESIO DE BOTON -> CONFIRMACION PARA REESTABLECER CONTRASEÑA [DESBLOQUEADO]
            $UsuarioNoDisponible = "<span class='nodisponible'><i class='fa fa-times-circle'></i> Lo sentimos, el correo electr&oacute;nico solicitado ya se encuenta en uso.</span>";
            echo $UsuarioNoDisponible;
        }else{ // USUARIO NO EXISTENTE
            // USUARIOS NO REGISTRADOS EN EL SISTEMA
            // IMPRESIO DE BOTON -> RESTRICCION PARA REESTABLECER CONTRASEÑA [BLOQUEADO]
            $UsuarioDisponible="<span class='disponible'><i class='fa fa-check-circle'></i> Perfecto, puedes hacer uso de este nuevo correo electr&oacute;nico</span>";
            echo $UsuarioDisponible;
        }
    }
