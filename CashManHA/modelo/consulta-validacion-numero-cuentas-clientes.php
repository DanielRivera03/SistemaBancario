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
    if(!empty($_POST["val-numerocuentaahorro"])) {
        $resultado=mysqli_query($conectarsistema,"CALL ConsultarDisponibilidadNumeroCuentaAhorroClientes('".$_POST["val-numerocuentaahorro"] ."');");
        // LEER COINCIDENCIAS DE USUARIOS SEGUN INGRESADO EN CAJA DE TEXTO
        $numero_cuenta_encontrado = mysqli_num_rows($resultado); // CONTADOR DE BUSQUEDA
        if($numero_cuenta_encontrado>0) { // NUMERO DE CUENTA EXISTENTE
            // NUMERO DE CUENTA YA REGISTRADO Y EN USO POR OTRO CLIENTE
            $NumeroCuentaNoDisponible = "<span class='nodisponible'><i class='fa fa-times-circle'></i> Lo sentimos, por favor refresque esta página, el número de cuenta ya se encuentra en uso.</span>";
            echo $NumeroCuentaNoDisponible;
        }else{ // NUMERO DE CUENTA NO REGISTRADO Y DISPONIBLE PARA SER USADO POR UN NUEVO CLIENTE
            $NumeroCuentaDisponible="<span class='disponible'><i class='fa fa-check-circle'></i> Número de cuenta disponible, puede continuar con la solicitud...</span>";
            echo $NumeroCuentaDisponible;
        }
    }
