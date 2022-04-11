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
class conexion
{
	private $servidor = "localhost"; // NOMBRE SERVIDOR
	private $usuario = "root"; // USUARIO SERVIDOR
	private $clave = ""; // CONTRASEÑA SERVIDOR (SI LO REQUIERE)
	private $base = "cashmanha"; // NOMBRE DE BASE DE DATOS
	public $establecerconexion; // VARIABLE PUBLICA DE CONEXION*/
	// DATOS DE CONECTIVIDAD BD -> SISTEMA
	public function setServidor($obteniendoservidor)
	{
		$this->servidor = $obteniendoservidor;
	}
	public function getServidor()
	{
		return $this->servidor;
	}

	// CONECTAR SISTEMA Y COMPROBACION DE CONEXION
	public function conectar($bd)
	{
		$miconexion = new mysqli($this->servidor, $this->usuario, $this->clave, $bd);
		if ($miconexion->connect_errno) {
			/*echo*/
			$mensaje = "Lo sentimos, ha ocurrido un error de conexion" . $miconexion->connect_error;
		} else {
			/*echo*/
			$mensaje = "Enhorabuena, conexion exitosa";
			$this->establecerconexion = $miconexion;
		}
		return $mensaje;
	}
	// INICIO DE SESION -> TODOS LOS USUARIOS
	public function IniciarSesionUsuarios($conectarsistema, $usuario, $contrasenia)
	{
		$resultado = mysqli_query($conectarsistema, "CALL IniciarSesion('$usuario','$contrasenia');");
		return $resultado;
	}
} // CIERRE CLASE CONEXION

// CONECTAR SISTEMA CON BASE DE DATOS {CONEXION PRINCIPAL TODO EL SISTEMA}
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema = $conectando->establecerconexion;
/*
	-> CONEXIONES AUXILIARES -> GESTIONES ESPECIFICAS CASHMAN H.A.
	DISPONIBLES EN MULTIPLES CONSULTAS REALIZADAS EN UNA SOLA PAGINA
*/
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema1 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema2 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema3 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema4 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema5 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema6 = $conectando->establecerconexion;
$conectando = new conexion();
$conectando->conectar("cashmanha");
$conectarsistema7 = $conectando->establecerconexion;
