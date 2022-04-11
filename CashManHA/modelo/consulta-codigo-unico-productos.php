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
    if(!empty($_POST["val-codigoproducto"])) {
        $resultado=mysqli_query($conectarsistema,"CALL ConsultaDisponibilidadCodigoUnicoProductos('".$_POST["val-codigoproducto"] ."');");
        // LEER COINCIDENCIAS DE CODIGOS SEGUN INGRESADO EN CAJA DE TEXTO
        $codigo_encontrado = mysqli_num_rows($resultado); // CONTADOR DE BUSQUEDA
        if($codigo_encontrado>0) { // CODIGO EXISTENTE
            // CODIGOS REGISTRADOS EN EL SISTEMA
            $CodigoNoDisponible = "<span class='nodisponible'><i class='fa fa-times-circle'></i> Lo sentimos, el código solicitado ya se encuenta en uso.</span>";
            echo $CodigoNoDisponible;
        }else{ // CODIGO NO EXISTENTE
            // CODIGOS NO REGISTRADOS EN EL SISTEMA
            $CodigoDisponible="<span class='disponible'><i class='fa fa-check-circle'></i> Perfecto, puedes hacer uso de este código</span>";
            echo $CodigoDisponible;
        }
    }
