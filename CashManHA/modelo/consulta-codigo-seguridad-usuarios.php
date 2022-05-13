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
    session_start();
    // IMPORTAR ARCHIVO DE CONEXION
    require('conexion.php');
    // EVITAR CONSULTAS USUARIOS VACIOS
    if(!empty($_POST["val-codesecurity"])) {
        $resultado=mysqli_query($conectarsistema,"CALL VerificarCodigoSeguridad('".$_POST["val-codesecurity"] ."','".$_SESSION['CorreoUsuarios'] ."','".$_SESSION['TokenUsuarios'] ."');");
        // LEER COINCIDENCIAS DE USUARIOS SEGUN INGRESADO EN CAJA DE TEXTO
        $usuario_encontrado = mysqli_num_rows($resultado); // CONTADOR DE BUSQUEDA
        if($usuario_encontrado>0) { // USUARIO EXISTENTE
            // USUARIOS REGISTRADOS EN EL SISTEMA
            // IMPRESIO DE BOTON -> CONFIRMACION PARA REESTABLECER CONTRASEÑA [DESBLOQUEADO]
            $UsuarioDisponible="<span class='disponible'><i class='fa fa-check-circle'></i> El c&oacute;digo de seguridad ingresado es v&aacute;lido. Favor haga clic en el bot&oacute;n para finalizar la recuperaci&oacute;n de su cuenta.</span><br><br>
            <div class='text-center'><button type='submit' class='btn btn-primary btn-block' > Comprobar C&oacute;digo de Recuperaci&oacute;n</button></div>";
            echo $UsuarioDisponible;
        }else{ // USUARIO NO EXISTENTE
            // USUARIOS NO REGISTRADOS EN EL SISTEMA
            // IMPRESIO DE BOTON -> RESTRICCION PARA REESTABLECER CONTRASEÑA [BLOQUEADO]
            $UsuarioNoDisponible = "<span class='nodisponible'><i class='fa fa-times-circle'></i> Lo sentimos, el c&oacute;digo de seguridad ingresado no es v&aacute;lido. Ingrese el &uacute;ltimo c&oacute;digo de seguridad recibido si ha realizado m&uacute;ltiples peticiones. [Error: Expirado y/o Inv&aacute;lido].</span><br><br><div class='text-center'></div>";
            echo $UsuarioNoDisponible;
        }
    }
