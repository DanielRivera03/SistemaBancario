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


class GestionesClientes
{
    // INICIALIZACION DE VARIABLES GLOBALES DE CLASE
    // -> CONSULTA CONFIGURACION CUENTA DE USUARIOS
    private $IdUsuarios;
    private $NombresUsuarios;
    private $ApellidosUsuarios;
    private $CodigoUsuarios;
    private $CorreoUsuarios;
    private $IdRolUsuarios;
    private $FotoUsuarios;
    private $EstadoUsuarios;
    // -> CONSULTA DETALLES DE USUARIOS
    private $DuiUsuarios;
    private $NitUsuarios;
    private $TelefonoUsuarios;
    private $CelularUsuarios;
    private $TelefonoTrabajoUsuarios;
    private $DireccionUsuarios;
    private $EmpresaUsuarios;
    private $CargoEmpresaUsuarios;
    private $DireccionTrabajoUsuarios;
    private $FechaNacimientoUsuarios;
    private $GeneroUsuarios;
    private $EstadoCivilUsuarios;
    private $FotoDuiFrontalUsuarios;
    private $FotoDuiReversoUsuarios;
    private $FotoNitUsuarios;
    private $FotoFirmaUsuarios;
    // -> CONSULTA ROLES DE USUARIOS
    private $NombreRolUsuario;
    private $DescripcionRolUsuario;
    // -> CONSULTA PRODUCTOS CASHMAN HA
    private $IdProductos;
    private $CodigoProductos;
    private $NombreProductos;
    private $DescripcionProductos;
    private $RequisitosProductos;
    private $EstadoProductos;
    // -> CREDITOS CASHMAN HA [AUXILIAR]
    private $IdCreditosAuxiliar;
    // -> CREDITOS CASHMAN HA [CONSULTA COMPLETA NO AUXILIAR]
    private $IdCreditos;
    private $TipoClienteCreditos;
    private $MontoFinanciamientoCreditos;
    private $TasaInteresCreditos;
    private $TiempoPlazoCreditos;
    private $CuotaMensualCreditos;
    private $FechaIngresoSolicitudCreditos;
    private $SalarioClienteCreditos;
    private $SaldoActualCreditos;
    private $EstadoActualCreditos;
    private $ObservacionesEmpleadosCreditos;
    private $ObservacionesGerenciaCreditos;
    private $ObservacionesPresidenciaCreditos;
    private $EmpleadoRegistroCredito;
    private $ProgresoInicialSolicitudCreditos;
    private $ProgresoPagoCreditos;
    private $ComprobarEstadoCuotasMensuales;
    private $EstadoCrediticioClientes;
    private $Comprobacion_ProcesoFinalizadoClientes;
    private $Comprobacion_EnviarAlHistoricoClientes;
    private $Comprobacion_HabilitarNuevasSolicitudesCrediticias;
    // -> RERERENCIAS PERSONALES - LABORALES -> CLIENTES CASHMAN HA 
    private $IdReferenciasClientes;
    private $NombresReferenciaPersonal;
    private $ApellidosReferenciaPersonal;
    private $EmpresaReferenciaPersonal;
    private $ProfesionOficioReferenciaPersonal;
    private $TelefonoReferenciaPersonal;
    private $NombresReferenciaLaboral;
    private $ApellidosReferenciaLaboral;
    private $EmpresaReferenciaLaboral;
    private $ProfesionOficioReferenciaLaboral;
    private $TelefonoReferenciaLaboral;
    // -> DATOS DE VEHICULOS -> PRESTAMOS DE VEHICULOS APROBADOS
    private $NumeroPlaca;
    private $ClaseVehiculo;
    private $AnioVehiculo;
    private $CapacidadVehiculo;
    private $NumeroAsientosVehiculo;
    private $MarcaVehiculo;
    private $ModeloVehiculo;
    private $NumeroMotor;
    private $NumeroChasisGrabado;
    private $NumeroChasisVin;
    private $ColorVehiculo;
    // -> DATOS DE CUOTAS GENERADAS CLIENTES CASHMAN H.A -> CONSULTAS ESPECIFICAS Y COMPLETAS
    private $IdCuotasClientes;
    private $IdCuotasClientesHistorico; //-> PARA MOSTRAR COMPROBANTES HISTORICOS DE CLIENTES [CREDITOS CANCELADOS Y FINALIZADOS]
    private $MontoCuotaCancelar;
    private $EstadoCuotaClientes;
    private $MontoCapitalClientes;
    private $FechaVencimientoCuotasClientes;
    private $ComprobarIncumplimientoCuotasClientes;
    private $DiasIncumplimientoCuotasClientes;
    // -> DATOS DE REPORTES FALLOS PLATAFORMA
    private $IdReportePlataforma;
    private $NombreReportePlataforma;
    private $DescripcionReportePlataforma;
    private $FotoReportePlataforma;
    private $FechaRegistroReportePlataforma;
    private $FechaActualizacionReportePlataforma;
    private $EstadoReportePlataforma;
    private $ComentarioActualizacionReportePlataforma;
    private $EmpleadoGestionandoReportePlataforma;
    // -> DATOS DE TRANSACCIONES [CREDITOS CLIENTES ESPECIFICAMENTE]
    private $IdTransaccionCreditosClientes;
    private $ReferenciaTransaccionCreditosClientes;
    private $MontoTransaccionCreditosClientes;
    private $FechaTransaccionCreditosClientes;
    private $EmpleadoGestionTransaccionCreditosClientes;
    // -> DATOS DE MENSAJERIA -> BANDEJA DE ENTRADA Y DETALLES MENSAJES
    private $IdMensajeria;
    private $IdUsuarioDestinatarioMensajeria;
    private $NombreMensajeria;
    private $AsuntoMensajeria;
    private $DetalleMensajeria;
    private $FechaMensajeria;
    // -> RESULTADOS CONSULTAS DATOS REGISTRADOS -> INICIO PLATAFORMA ADMINISTRADORES
    private $NumeroUsuariosRegistrados;
    private $NumeroProductosRegistrados;
    private $NumeroReportesFallosPlataformaRegistrados;
    private $NumeroSolicitudesRecuperacionesRegistrados;
    private $NumeroCuotasClientesRegistradas;
    private $NumeroTransaccionesClientesRegistradas;
    // -> RESULTADOS CONSULTAS DATOS REGISTRADOS -> INICIO PLATAFORMA PRESIDENCIA
    private $NumeroCuentasAhorroClientesRegistradas;
    // -> RESULTADOS CONSULTAS DATOS REGISTRADOS -> INICIO PLATAFORMA GERENCIA
    private $NumeroCuotasPagadasTarde;
    private $NumeroCuotasPagadasCanceladas;
    private $NumeroTransferenciasProcesadas;
    private $NumeroCuotasVencidas;
    // -> DATOS DE FINIQUITO CANCELACION CREDITOS CLIENTES
    private $IdCreditoHistoricoClientes;
    private $EstadoCreditoHistoricoClientes;
    // -> DATOS CUENTAS AHORRO CLIENTES
    private $IdCuentaAhorroClientes;
    private $NumeroCuentaAhorroClientes;
    private $SaldoCuentaAhorroClientes;
    private $EstadoCuentaAhorroClientes;
    private $FechaAperturaCuentaAhorroClientes;
    // -> DATOS CUENTAS AHORRO CLIENTES [TRANSFERENCIAS A OTRAS CUENTAS]
    private $IdTransaccionesDepositosRetirosCuentasTransferencias;
    private $NumeroCuentaAhorroClientesTransferencias;
    private $NombresClienteCuentaAhorroClientesTransferencias;
    private $ApellidosClienteCuentaAhorroClientesTransferencias;
    // TRANSACCIONES // -> DATOS CUENTAS CLIENTES
    private $IdTransaccionesDepositosRetirosCuentas;
    private $UltimoIdTransaccionesDepositosRetirosCuentas;
    private $ReferenciaTransaccionDepositosRetirosCuentas;
    private $MontoDepositosRetirosCuentas;
    private $FechaTransaccionDepositosRetirosCuentas;
    private $EmpleadoGestionTransaccionDepositosRetirosCuentas;
    private $TipoTransaccionDepositosRetirosCuentas;
    private $SaldoNuevoTransaccionDepositosRetirosCuentas;
    private $EstadoTransaccionDepositosRetirosCuentas;
    // -> DATOS TRANSFERENCIAS CUENTAS CLIENTES
    private $IdCuentaAhorroTransferenciaDestinoClientes;
    // -> DATOS TOTAL DE CUOTAS CANCELADAS CREDITOS CLIENTES
    private $TotalCuotasCanceladasCreditosClientes;
    // -> DATOS TOTAL TRANSACCIONES REQUERIDAS [INTERFAZ ATENCION AL CLIENTE -> EMPLEADOS]
    private $TotalTransaccionesProcesadas_AtencionClientes;
    private $TotalSolicitudesCreditosProcesadas_AtencionClientes;
    private $TotalIngresosTransaccionesCreditos_AtencionClientes;
    // -> DATOS COPIAS DE CONTRATOS CLIENTES
    private $NombreCopiaContratosSuscritosCreditosClientes;
    // FUNCIONES PARA OBTENER DATOS DE USUARIOS
    /*
            << MI PERFIL >>
            -> CONFIGURACION DE LA CUENTA USUARIOS
        */
    // ID UNICO USUARIOS
    public function setIdUsuarios($valor_retorno)
    {
        $this->IdUsuarios = $valor_retorno;
    }
    public function getIdUsuarios()
    {
        return $this->IdUsuarios;
    }
    // NOMBRES USUARIOS
    public function setNombresUsuarios($valor_retorno)
    {
        $this->NombresUsuarios = $valor_retorno;
    }
    public function getNombresUsuarios()
    {
        return $this->NombresUsuarios;
    }
    // APELLIDOS USUARIOS
    public function setApellidosUsuarios($valor_retorno)
    {
        $this->ApellidosUsuarios = $valor_retorno;
    }
    public function getApellidosUsuarios()
    {
        return $this->ApellidosUsuarios;
    }
    // CODIGO USUARIOS
    public function setCodigoUsuarios($valor_retorno)
    {
        $this->CodigoUsuarios = $valor_retorno;
    }
    public function getCodigoUsuarios()
    {
        return $this->CodigoUsuarios;
    }
    // CORREO USUARIOS
    public function setCorreoUsuarios($valor_retorno)
    {
        $this->CorreoUsuarios = $valor_retorno;
    }
    public function getCorreoUsuarios()
    {
        return $this->CorreoUsuarios;
    }
    // FOTO USUARIOS
    public function setFotoUsuarios($valor_retorno)
    {
        $this->FotoUsuarios = $valor_retorno;
    }
    public function getFotoUsuarios()
    {
        return $this->FotoUsuarios;
    }
    // ID ROL USUARIOS
    public function setIdRolUsuarios($valor_retorno)
    {
        $this->IdRolUsuarios = $valor_retorno;
    }
    public function getIdRolUsuarios()
    {
        return $this->IdRolUsuarios;
    }
    // ESTADO USUARIOS
    public function setEstadoUsuarios($valor_retorno)
    {
        $this->EstadoUsuarios = $valor_retorno;
    }
    public function getEstadoUsuarios()
    {
        return $this->EstadoUsuarios;
    }
    /*
            << MI PERFIL >>
            -> DETALLES DE USUARIOS
        */
    // DUI USUARIOS
    public function setDuiUsuarios($valor_retorno)
    {
        $this->DuiUsuarios = $valor_retorno;
    }
    public function getDuiUsuarios()
    {
        return $this->DuiUsuarios;
    }
    // NIT USUARIOS
    public function setNitUsuarios($valor_retorno)
    {
        $this->NitUsuarios = $valor_retorno;
    }
    public function getNitUsuarios()
    {
        return $this->NitUsuarios;
    }
    // TELEFONO USUARIOS
    public function setTelefonoUsuarios($valor_retorno)
    {
        $this->TelefonoUsuarios = $valor_retorno;
    }
    public function getTelefonoUsuarios()
    {
        return $this->TelefonoUsuarios;
    }
    // CELULAR USUARIOS
    public function setCelularUsuarios($valor_retorno)
    {
        $this->CelularUsuarios = $valor_retorno;
    }
    public function getCelularUsuarios()
    {
        return $this->CelularUsuarios;
    }
    // TELEFONO TRABAJO USUARIOS
    public function setTelefonoTrabajoUsuarios($valor_retorno)
    {
        $this->TelefonoTrabajoUsuarios = $valor_retorno;
    }
    public function getTelefonoTrabajoUsuarios()
    {
        return $this->TelefonoTrabajoUsuarios;
    }
    // DIRECCION USUARIOS
    public function setDireccionUsuarios($valor_retorno)
    {
        $this->DireccionUsuarios = $valor_retorno;
    }
    public function getDireccionUsuarios()
    {
        return $this->DireccionUsuarios;
    }
    // EMPRESA USUARIOS
    public function setEmpresaUsuarios($valor_retorno)
    {
        $this->EmpresaUsuarios = $valor_retorno;
    }
    public function getEmpresaUsuarios()
    {
        return $this->EmpresaUsuarios;
    }
    // CARGO DESEMPEÑADO EMPRESA USUARIOS
    public function setCargoEmpresaUsuarios($valor_retorno)
    {
        $this->CargoEmpresaUsuarios = $valor_retorno;
    }
    public function getCargoEmpresaUsuarios()
    {
        return $this->CargoEmpresaUsuarios;
    }
    // DIRECCION TRABAJO USUARIOS
    public function setDireccionTrabajoUsuarios($valor_retorno)
    {
        $this->DireccionTrabajoUsuarios = $valor_retorno;
    }
    public function getDireccionTrabajoUsuarios()
    {
        return $this->DireccionTrabajoUsuarios;
    }
    // FECHA DE NACIMIENTO USUARIOS
    public function setFechaNacimientoUsuarios($valor_retorno)
    {
        $this->FechaNacimientoUsuarios = $valor_retorno;
    }
    public function getFechaNacimientoUsuarios()
    {
        return $this->FechaNacimientoUsuarios;
    }
    // GENERO USUARIOS
    public function setGeneroUsuarios($valor_retorno)
    {
        $this->GeneroUsuarios = $valor_retorno;
    }
    public function getGeneroUsuarios()
    {
        return $this->GeneroUsuarios;
    }
    // GENERO USUARIOS
    public function setEstadoCivilUsuarios($valor_retorno)
    {
        $this->EstadoCivilUsuarios = $valor_retorno;
    }
    public function getEstadoCivilUsuarios()
    {
        return $this->EstadoCivilUsuarios;
    }
    // FOTO DUI USUARIOS - FRONTAL
    public function setFotoDuiFrontalUsuarios($valor_retorno)
    {
        $this->FotoDuiFrontalUsuarios = $valor_retorno;
    }
    public function getFotoDuiFrontalUsuarios()
    {
        return $this->FotoDuiFrontalUsuarios;
    }
    // FOTO DUI USUARIOS - REVERSO
    public function setFotoDuiReversoUsuarios($valor_retorno)
    {
        $this->FotoDuiReversoUsuariosUsuarios = $valor_retorno;
    }
    public function getFotoDuiReversoUsuarios()
    {
        return $this->FotoDuiReversoUsuariosUsuarios;
    }
    // FOTO NIT USUARIOS
    public function setFotoNitUsuarios($valor_retorno)
    {
        $this->FotoNitUsuarios = $valor_retorno;
    }
    public function getFotoNitUsuarios()
    {
        return $this->FotoNitUsuarios;
    }
    // FOTO FIRMA USUARIOS
    public function setFotoFirmaUsuarios($valor_retorno)
    {
        $this->FotoFirmaUsuarios = $valor_retorno;
    }
    public function getFotoFirmaUsuarios()
    {
        return $this->FotoFirmaUsuarios;
    }
    /*
            << ROLES DE USUARIOS CASHMAN HA >>
            -> CONSULTA GENERAL DE ROLES DE USUARIOS REGISTRADOS
        */
    // NOMBRE GENERAL ROL DE USUARIO
    public function setNombreRolUsuario($valor_retorno)
    {
        $this->NombreRolUsuario = $valor_retorno;
    }
    public function getNombreRolUsuario()
    {
        return $this->NombreRolUsuario;
    }
    // DESCRIPCION COMPLETA ROL DE USUARIO
    public function setDescripcionRolUsuario($valor_retorno)
    {
        $this->DescripcionRolUsuario = $valor_retorno;
    }
    public function getDescripcionRolUsuario()
    {
        return $this->DescripcionRolUsuario;
    }
    /*
            << PRODUCTOS CASHMAN HA >>
            -> CONSULTA GENERAL DE PRODUCTOS REGISTRADOS [SIN ASOCIACION A CLIENTES]
        */
    // ID UNICO REFERENCIA DE PRODUCTOS
    public function setIdProductos($valor_retorno)
    {
        $this->IdProductos = $valor_retorno;
    }
    public function getIdProductos()
    {
        return $this->IdProductos;
    }
    // CODIGO UNICO DE PRODUCTOS
    public function setCodigoProductos($valor_retorno)
    {
        $this->CodigoProductos = $valor_retorno;
    }
    public function getCodigoProductos()
    {
        return $this->CodigoProductos;
    }
    // NOMBRE DE PRODUCTOS
    public function setNombreProductos($valor_retorno)
    {
        $this->NombreProductos = $valor_retorno;
    }
    public function getNombreProductos()
    {
        return $this->NombreProductos;
    }
    // DESCRIPCION DE PRODUCTOS
    public function setDescripcionProductos($valor_retorno)
    {
        $this->DescripcionProductos = $valor_retorno;
    }
    public function getDescripcionProductos()
    {
        return $this->DescripcionProductos;
    }
    // REQUISITOS DE PRODUCTOS
    public function setRequisitosProductos($valor_retorno)
    {
        $this->RequisitosProductos = $valor_retorno;
    }
    public function getRequisitosProductos()
    {
        return $this->RequisitosProductos;
    }
    // ESTADO DE PRODUCTOS
    public function setEstadoProductos($valor_retorno)
    {
        $this->EstadoProductos = $valor_retorno;
    }
    public function getEstadoProductos()
    {
        return $this->EstadoProductos;
    }
    /*
            << CREDITOS CASHMAN HA >>
            -> CONSULTA UNICAMENTE DE ID UNICO DE CREDITO SOLICITADO POR CLIENTES
            ESTA CONSULTA ES AUXILIAR UNICAMENTE UTILIZADA EN LA SECCION DE INGRESO DE REFERENCIAS PERSONALES - LABORALES DE LOS CLIENTES
        */
    // ID UNICO DE REFERENCIAS REGISTRADAS CLIENTES
    public function setIdReferenciasClientes($valor_retorno)
    {
        $this->IdReferenciasClientes = $valor_retorno;
    }
    public function getIdReferenciasClientes()
    {
        return $this->IdReferenciasClientes;
    }
    /*
            << CREDITOS CASHMAN HA >>
            -> CONSULTA COMPLETA DE SOLICITUDES NUEVAS INGRESADAS SEGUN ID DE CLIENTES [NO AUXILIAR]
        */
    // ID UNICO DE CREDITO SOLICITADO [REGISTRADO]
    public function setIdCreditos($valor_retorno)
    {
        $this->IdCreditos = $valor_retorno;
    }
    public function getIdCreditos()
    {
        return $this->IdCreditos;
    }
    // TIPO DE CLIENTE CREDITOS
    public function setTipoClienteCreditos($valor_retorno)
    {
        $this->TipoClienteCreditos = $valor_retorno;
    }
    public function getTipoClienteCreditos()
    {
        return $this->TipoClienteCreditos;
    }
    // MONTO FINANCIAMIENTO CREDITOS
    public function setMontoFinanciamientoCreditos($valor_retorno)
    {
        $this->MontoFinanciamientoCreditos = $valor_retorno;
    }
    public function getMontoFinanciamientoCreditos()
    {
        return $this->MontoFinanciamientoCreditos;
    }
    // TASA DE INTERES CREDITOS
    public function setTasaInteresCreditos($valor_retorno)
    {
        $this->TasaInteresCreditos = $valor_retorno;
    }
    public function getTasaInteresCreditos()
    {
        return $this->TasaInteresCreditos;
    }
    // PLAZO FINANCIAMIENTO CREDITOS
    public function setTiempoPlazoCreditos($valor_retorno)
    {
        $this->TiempoPlazoCreditos = $valor_retorno;
    }
    public function getTiempoPlazoCreditos()
    {
        return $this->TiempoPlazoCreditos;
    }
    // CUOTA MENSUAL ASIGNADA CREDITOS
    public function setCuotaMensualCreditos($valor_retorno)
    {
        $this->CuotaMensualCreditos = $valor_retorno;
    }
    public function getCuotaMensualCreditos()
    {
        return $this->CuotaMensualCreditos;
    }
    // FECHA INGRESO SOLICITUD CREDITOS
    public function setFechaIngresoSolicitudCreditos($valor_retorno)
    {
        $this->FechaIngresoSolicitudCreditos = $valor_retorno;
    }
    public function getFechaIngresoSolicitudCreditos()
    {
        return $this->FechaIngresoSolicitudCreditos;
    }
    // SALARIO CLIENTE CREDITOS
    public function setSalarioClienteCreditos($valor_retorno)
    {
        $this->SalarioClienteCreditos = $valor_retorno;
    }
    public function getSalarioClienteCreditos()
    {
        return $this->SalarioClienteCreditos;
    }
    // SALDO ACTUAL CLIENTE CREDITOS
    public function setSaldoActualCreditos($valor_retorno)
    {
        $this->SaldoActualCreditos = $valor_retorno;
    }
    public function getSaldoActualCreditos()
    {
        return $this->SaldoActualCreditos;
    }
    // ESTADO ACTUAL CLIENTE CREDITOS
    public function setEstadoActualCreditos($valor_retorno)
    {
        $this->EstadoActualCreditos = $valor_retorno;
    }
    public function getEstadoActualCreditos()
    {
        return $this->EstadoActualCreditos;
    }
    // OBSERVACIONES REGISTRADAS POR EMPLEADOS CREDITOS
    public function setObservacionesEmpleadosCreditos($valor_retorno)
    {
        $this->ObservacionesEmpleadosCreditos = $valor_retorno;
    }
    public function getObservacionesEmpleadosCreditos()
    {
        return $this->ObservacionesEmpleadosCreditos;
    }
    // OBSERVACIONES REGISTRADAS POR GERENCIA CREDITOS
    public function setObservacionesGerenciaCreditos($valor_retorno)
    {
        $this->ObservacionesGerenciaCreditos = $valor_retorno;
    }
    public function getObservacionesGerenciaCreditos()
    {
        return $this->ObservacionesGerenciaCreditos;
    }
    // OBSERVACIONES REGISTRADAS POR PRESIDENCIA CREDITOS
    public function setObservacionesPresidenciaCreditos($valor_retorno)
    {
        $this->ObservacionesPresidenciaCreditos = $valor_retorno;
    }
    public function getObservacionesPresidenciaCreditos()
    {
        return $this->ObservacionesPresidenciaCreditos;
    }
    // EMPLEADO QUE REGISTRO SOLICITUD DE NUEVOS CREDITOS
    public function setEmpleadoRegistroCredito($valor_retorno)
    {
        $this->EmpleadoRegistroCredito = $valor_retorno;
    }
    public function getEmpleadoRegistroCredito()
    {
        return $this->EmpleadoRegistroCredito;
    }
    // PROGRESO INICIAL SOLICITUD CREDITO CLIENTES
    public function setProgresoInicialSolicitudCreditos($valor_retorno)
    {
        $this->ProgresoInicialSolicitudCreditos = $valor_retorno;
    }
    public function getProgresoInicialSolicitudCreditos()
    {
        return $this->ProgresoInicialSolicitudCreditos;
    }
    // PROGRESO ACTUAL PAGO CREDITO CLIENTES
    public function setProgresoPagoCreditos($valor_retorno)
    {
        $this->ProgresoPagoCreditos = $valor_retorno;
    }
    public function getProgresoPagoCreditos()
    {
        return $this->ProgresoPagoCreditos;
    }
    // COMPROBACION ESTADO CUOTAS MENSUALES -> SI LOS EMPLEADOS YA HAN GENERADO O NO LAS RESPECTIVAS CUOTAS MENSUALES DENTRO DEL ESTADO DE CUENTA INICIAL CLIENTES
    public function setComprobarEstadoCuotasMensuales($valor_retorno)
    {
        $this->ComprobarEstadoCuotasMensuales = $valor_retorno;
    }
    public function getComprobarEstadoCuotasMensuales()
    {
        return $this->ComprobarEstadoCuotasMensuales;
    }
    // ESTADO CREDITICIO DE CLIENTES
    public function setEstadoCrediticioClientes($valor_retorno)
    {
        $this->EstadoCrediticioClientes = $valor_retorno;
    }
    public function getEstadoCrediticioClientes()
    {
        return $this->EstadoCrediticioClientes;
    }
    // COMPROBACION PROCESO FINALIZADO DE CLIENTES -> NUEVAS SOLICITUDES CREDITICIAS
    public function setComprobacion_ProcesoFinalizadoClientes($valor_retorno)
    {
        $this->Comprobacion_ProcesoFinalizadoClientes = $valor_retorno;
    }
    public function getComprobacion_ProcesoFinalizadoClientes()
    {
        return $this->Comprobacion_ProcesoFinalizadoClientes;
    }
    // COMPROBACION PROCESO FINALIZADO DE CLIENTES -> DISPONIBILIDAD DE ENVIO CUOTAS Y SOLICITUD CREDITICIA AL HISTORICO [CONDICION-> ESTADO DE CREDITO CANCELADO]
    public function setComprobacion_EnviarAlHistoricoClientes($valor_retorno)
    {
        $this->Comprobacion_EnviarAlHistoricoClientes = $valor_retorno;
    }
    public function getComprobacion_EnviarAlHistoricoClientes()
    {
        return $this->Comprobacion_EnviarAlHistoricoClientes;
    }
    // COMPROBACION PROCESO FINALIZADO DE CLIENTES -> HABILITAR NUEVAMENTE SOLICITUDES CREDITICIAS A CLIENTES QUE TUVIERON SOLICITUD DE CREDITOS ACTIVAS Y HA SIDO CANCELADA [CASO CONTRARIO NO PROCEDE LA HABILITACION DE NUEVOS CREDITOS]
    public function setComprobacion_HabilitarNuevasSolicitudesCrediticias($valor_retorno)
    {
        $this->Comprobacion_HabilitarNuevasSolicitudesCrediticias = $valor_retorno;
    }
    public function getComprobacion_HabilitarNuevasSolicitudesCrediticias()
    {
        return $this->Comprobacion_HabilitarNuevasSolicitudesCrediticias;
    }
    /*
            << REFERENCIAS PERSONALES - LABORALES CREDITOS CASHMAN HA >>
            -> CONSULTA DE EXISTENCIAS REGISTRO DE REFERENCIAS LABORALES Y PERSONALES, PARA POSTERIOR TRATAMIENTO DENTRO DEL SISTEMA
        */
    // NOMBRES DE REFERENCIAS PERSONALES
    public function setNombresReferenciaPersonal($valor_retorno)
    {
        $this->NombresReferenciaPersonal = $valor_retorno;
    }
    public function getNombresReferenciaPersonal()
    {
        return $this->NombresReferenciaPersonal;
    }
    // APELLIDOS DE REFERENCIAS PERSONALES
    public function setApellidosReferenciaPersonal($valor_retorno)
    {
        $this->ApellidosReferenciaPersonal = $valor_retorno;
    }
    public function getApellidosReferenciaPersonal()
    {
        return $this->ApellidosReferenciaPersonal;
    }
    // EMPRESA DE REFERENCIAS PERSONALES
    public function setEmpresaReferenciaPersonal($valor_retorno)
    {
        $this->EmpresaReferenciaPersonal = $valor_retorno;
    }
    public function getEmpresaReferenciaPersonal()
    {
        return $this->EmpresaReferenciaPersonal;
    }
    // PROFESION U OFICIO DE REFERENCIAS PERSONALES
    public function setProfesionOficioReferenciaPersonal($valor_retorno)
    {
        $this->ProfesionOficioReferenciaPersonal = $valor_retorno;
    }
    public function getProfesionOficioReferenciaPersonal()
    {
        return $this->ProfesionOficioReferenciaPersonal;
    }
    // TELEFONO DE REFERENCIAS PERSONALES
    public function setTelefonoReferenciaPersonal($valor_retorno)
    {
        $this->TelefonoReferenciaPersonal = $valor_retorno;
    }
    public function getTelefonoReferenciaPersonal()
    {
        return $this->TelefonoReferenciaPersonal;
    }
    // NOMBRES DE REFERENCIAS LABORALES
    public function setNombresReferenciaLaboral($valor_retorno)
    {
        $this->NombresReferenciaLaboral = $valor_retorno;
    }
    public function getNombresReferenciaLaboral()
    {
        return $this->NombresReferenciaLaboral;
    }
    // APELLIDOS DE REFERENCIAS LABORALES
    public function setApellidosReferenciaLaboral($valor_retorno)
    {
        $this->ApellidosReferenciaLaboral = $valor_retorno;
    }
    public function getApellidosReferenciaLaboral()
    {
        return $this->ApellidosReferenciaLaboral;
    }
    // EMPRESA DE REFERENCIAS LABORALES
    public function setEmpresaReferenciaLaboral($valor_retorno)
    {
        $this->EmpresaReferenciaLaboral = $valor_retorno;
    }
    public function getEmpresaReferenciaLaboral()
    {
        return $this->EmpresaReferenciaLaboral;
    }
    // PROFESION U OFICIO DE REFERENCIAS LABORALES
    public function setProfesionOficioReferenciaLaboral($valor_retorno)
    {
        $this->ProfesionOficioReferenciaLaboral = $valor_retorno;
    }
    public function getProfesionOficioReferenciaLaboral()
    {
        return $this->ProfesionOficioReferenciaLaboral;
    }
    // TELEFONO DE REFERENCIAS LABORALES
    public function setTelefonoReferenciaLaboral($valor_retorno)
    {
        $this->TelefonoReferenciaLaboral = $valor_retorno;
    }
    public function getTelefonoReferenciaLaboral()
    {
        return $this->TelefonoReferenciaLaboral;
    }
    /*
            << REFERENCIAS PERSONALES -> LABORALES CASHMAN HA >>
            -> CONSULTA GENERAL DE REFERENCIAS REGISTRADAS DE CLIENTES
        */
    // ID UNICO DE REFERENCIAS
    public function setIdCreditoAuxiliar($valor_retorno)
    {
        $this->IdCreditosAuxiliar = $valor_retorno;
    }
    public function getIdCreditoAuxiliar()
    {
        return $this->IdCreditosAuxiliar;
    }
    /*
            << CONSULTA DE DATOS DE VEHICULOS -> PRESTAMOS DE VEHICULOS APROBADOS  >>
            -> VALIDO PARA USO DE DATOS CONTRATOS Y PORTAL DE CLIENTES
        */
    // ID UNICO DE REGISTRO DATOS CREDITICIOS ASOCIADOS A PRODUCTO EN CUESTION
    public function setIdDatosVehiculos($valor_retorno)
    {
        $this->IdDatosVehiculos = $valor_retorno;
    }
    public function getIdDatosVehiculos()
    {
        return $this->IdDatosVehiculos;
    }
    // NUMERO DE PLACA VEHICULOS
    public function setNumeroPlaca($valor_retorno)
    {
        $this->NumeroPlaca = $valor_retorno;
    }
    public function getNumeroPlaca()
    {
        return $this->NumeroPlaca;
    }
    // CLASE DE VEHICULOS
    public function setClaseVehiculo($valor_retorno)
    {
        $this->ClaseVehiculo = $valor_retorno;
    }
    public function getClaseVehiculo()
    {
        return $this->ClaseVehiculo;
    }
    // AÑO DE VEHICULOS
    public function setAnioVehiculo($valor_retorno)
    {
        $this->AnioVehiculo = $valor_retorno;
    }
    public function getAnioVehiculo()
    {
        return $this->AnioVehiculo;
    }
    // CAPACIDAD DE VEHICULOS
    public function setCapacidadVehiculo($valor_retorno)
    {
        $this->CapacidadVehiculo = $valor_retorno;
    }
    public function getCapacidadVehiculo()
    {
        return $this->CapacidadVehiculo;
    }
    // NUMERO DE ASIENTOS DE VEHICULOS
    public function setNumeroAsientosVehiculo($valor_retorno)
    {
        $this->NumeroAsientosVehiculo = $valor_retorno;
    }
    public function getNumeroAsientosVehiculo()
    {
        return $this->NumeroAsientosVehiculo;
    }
    // MARCA DE VEHICULOS
    public function setMarcaVehiculo($valor_retorno)
    {
        $this->MarcaVehiculo = $valor_retorno;
    }
    public function getMarcaVehiculo()
    {
        return $this->MarcaVehiculo;
    }
    // MODELO DE VEHICULOS
    public function setModeloVehiculo($valor_retorno)
    {
        $this->ModeloVehiculo = $valor_retorno;
    }
    public function getModeloVehiculo()
    {
        return $this->ModeloVehiculo;
    }
    // NUMERO DE MOTOR DE VEHICULOS
    public function setNumeroMotor($valor_retorno)
    {
        $this->NumeroMotor = $valor_retorno;
    }
    public function getNumeroMotor()
    {
        return $this->NumeroMotor;
    }
    // NUMERO DE CHASIS GRABADO DE VEHICULOS
    public function setNumeroChasisGrabado($valor_retorno)
    {
        $this->NumeroChasisGrabado = $valor_retorno;
    }
    public function getNumeroChasisGrabado()
    {
        return $this->NumeroChasisGrabado;
    }
    // NUMERO DE CHASIS VIN DE VEHICULOS
    public function setNumeroChasisVin($valor_retorno)
    {
        $this->NumeroChasisVin = $valor_retorno;
    }
    public function getNumeroChasisVin()
    {
        return $this->NumeroChasisVin;
    }
    // COLOR DE VEHICULOS
    public function setColorVehiculo($valor_retorno)
    {
        $this->ColorVehiculo = $valor_retorno;
    }
    public function getColorVehiculo()
    {
        return $this->ColorVehiculo;
    }
    /*
            << CONSULTA DE DATOS CUOTAS GENERADAS CLIENTES  >>
                -> VALIDO PARA PORTAL DE CLIENTES, Y DEMAS PORTALES ESPECIFICOS DONDE SE REQUIERA DICHA CONSULTA
        */
    // ID UNICO DE ORDEN DE PAGO CUOTAS CLIENTES -> ASOCIADOS A PRODUCTO -> CREDITO
    public function setIdCuotasClientes($valor_retorno)
    {
        $this->IdCuotasClientes = $valor_retorno;
    }
    public function getIdCuotasClientes()
    {
        return $this->IdCuotasClientes;
    }
    // ID DE TRANSACCIONES CREDITOS HISTORICOS -> VISUALIZAR COMPROBANTE DE PAGO
    public function setIdCuotasClientesHistorico($valor_retorno)
    {
        $this->IdCuotasClientesHistorico = $valor_retorno;
    }
    public function getIdCuotasClientesHistorico()
    {
        return $this->IdCuotasClientesHistorico;
    }
    // MONTO A CANCELAR ASIGNADO A CLIENTES -> CUOTAS MENSUALES GENERADAS
    public function setMontoCuotaCancelar($valor_retorno)
    {
        $this->MontoCuotaCancelar = $valor_retorno;
    }
    public function getMontoCuotaCancelar()
    {
        return $this->MontoCuotaCancelar;
    }
    // ESTADO DE CUOTAS MENSUALES -> CUOTAS MENSUALES GENERADAS
    public function setEstadoCuotaClientes($valor_retorno)
    {
        $this->EstadoCuotaClientes = $valor_retorno;
    }
    public function getEstadoCuotaClientes()
    {
        return $this->EstadoCuotaClientes;
    }
    // MONTO ASIGNADO PAGARÉ CAPITAL DE CREDITOS CLIENTES
    public function setMontoCapitalClientes($valor_retorno)
    {
        $this->MontoCapitalClientes = $valor_retorno;
    }
    public function getMontoCapitalClientes()
    {
        return $this->MontoCapitalClientes;
    }
    // FECHA DE VENCIMIENTO CUOTAS MENSUALES CREDITOS CLIENTES
    public function setFechaVencimientoCuotasClientes($valor_retorno)
    {
        $this->FechaVencimientoCuotasClientes = $valor_retorno;
    }
    public function getFechaVencimientoCuotasClientes()
    {
        return $this->FechaVencimientoCuotasClientes;
    }
    // COMPROBACION DE INCUMPLIMIETO CUOTAS CLIENTES -> PARA GENERAR CARGO POR MORA DIARIO
    public function setComprobarIncumplimientoCuotasClientes($valor_retorno)
    {
        $this->ComprobarIncumplimientoCuotasClientes = $valor_retorno;
    }
    public function getComprobarIncumplimientoCuotasClientes()
    {
        return $this->ComprobarIncumplimientoCuotasClientes;
    }
    // COMPROBACION DE INCUMPLIMIETO CUOTAS CLIENTES -> PARA GENERAR CARGO POR MORA DIARIO
    public function setDiasIncumplimientoCuotasClientes($valor_retorno)
    {
        $this->DiasIncumplimientoCuotasClientes = $valor_retorno;
    }
    public function getDiasIncumplimientoCuotasClientes()
    {
        return $this->DiasIncumplimientoCuotasClientes;
    }
    /*
            << CONSULTA DE DATOS REPORTES FALLOS PLATAFORMA ESPECIFICA  >>
                -> VALIDO EXCLUSIVAMENTE PARA USUARIOS ADMINISTRADORES, YA QUE DENTRO DE SU VISTA ES POSIBLE GESTIONAR DICHOS REPORTES
        */
    // ID UNICO DE REPORTES FALLOS PLATAFORMA
    public function setIdReportePlataforma($valor_retorno)
    {
        $this->IdReportePlataforma = $valor_retorno;
    }
    public function getIdReportePlataforma()
    {
        return $this->IdReportePlataforma;
    }
    // NOMBRES DE REPORTES FALLOS PLATAFORMA
    public function setNombreReportePlataforma($valor_retorno)
    {
        $this->NombreReportePlataforma = $valor_retorno;
    }
    public function getNombreReportePlataforma()
    {
        return $this->NombreReportePlataforma;
    }
    // DESCRIPCION COMPLETA DE REPORTES FALLOS PLATAFORMA
    public function setDescripcionReportePlataforma($valor_retorno)
    {
        $this->DescripcionReportePlataforma = $valor_retorno;
    }
    public function getDescripcionReportePlataforma()
    {
        return $this->DescripcionReportePlataforma;
    }
    // FOTOGRAFIA -> CAPTURA DE PANTALLA DE REPORTES FALLOS PLATAFORMA
    public function setFotoReportePlataforma($valor_retorno)
    {
        $this->FotoReportePlataforma = $valor_retorno;
    }
    public function getFotoReportePlataforma()
    {
        return $this->FotoReportePlataforma;
    }
    // FECHA DE REGISTRO U INGRESO DE REPORTES FALLOS PLATAFORMA
    public function setFechaRegistroReportePlataforma($valor_retorno)
    {
        $this->FechaRegistroReportePlataforma = $valor_retorno;
    }
    public function getFechaRegistroReportePlataforma()
    {
        return $this->FechaRegistroReportePlataforma;
    }
    // FECHA DE ACTUALIZACION U MODIFICACION DE REPORTES FALLOS PLATAFORMA
    public function setFechaActualizacionReportePlataforma($valor_retorno)
    {
        $this->FechaActualizacionReportePlataforma = $valor_retorno;
    }
    public function getFechaActualizacionReportePlataforma()
    {
        return $this->FechaActualizacionReportePlataforma;
    }
    // ESTADO DE REPORTES FALLOS PLATAFORMA
    public function setEstadoReportePlataforma($valor_retorno)
    {
        $this->EstadoReportePlataforma = $valor_retorno;
    }
    public function getEstadoReportePlataforma()
    {
        return $this->EstadoReportePlataforma;
    }
    // COMENTARIO DE ACTUALIZACION DE REPORTES FALLOS PLATAFORMA
    public function setComentarioActualizacionReportePlataforma($valor_retorno)
    {
        $this->ComentarioActualizacionReportePlataforma = $valor_retorno;
    }
    public function getComentarioActualizacionReportePlataforma()
    {
        return $this->ComentarioActualizacionReportePlataforma;
    }
    // USUARIO UNICO DE EMPLEADOS QUE GESGTIONAN REPORTES FALLOS PLATAFORMA
    public function setEmpleadoGestionandoReportePlataforma($valor_retorno)
    {
        $this->EmpleadoGestionandoReportePlataforma = $valor_retorno;
    }
    public function getEmpleadoGestionandoReportePlataforma()
    {
        return $this->EmpleadoGestionandoReportePlataforma;
    }
    /*
            << CONSULTA DE TRANSACCIONES DE CREDITOS APROBADOS CLIENTES  >>
                -> CONSULTA DE ESTADO DE CUOTAS, PROCESAMIENTO DE PAGOS DE CUOTAS SEGUN PRODUCTO, CREDITO Y CLIENTE ASOCIADO. VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS Y CLIENTES
        */
    // ID UNICO DE TRANSACCIONES CREDITOS CLIENTES
    public function setIdTransaccionCreditosClientes($valor_retorno)
    {
        $this->IdTransaccionCreditosClientes = $valor_retorno;
    }
    public function getIdTransaccionCreditosClientes()
    {
        return $this->IdTransaccionCreditosClientes;
    }
    // NUMERO REFERENCIA UNICA TRANSACCIONES CREDITOS CLIENTES
    public function setReferenciaTransaccionCreditosClientes($valor_retorno)
    {
        $this->ReferenciaTransaccionCreditosClientes = $valor_retorno;
    }
    public function getReferenciaTransaccionCreditosClientes()
    {
        return $this->ReferenciaTransaccionCreditosClientes;
    }
    // MONTO CANCELADO TRANSACCIONES CREDITOS CLIENTES
    public function setMontoTransaccionCreditosClientes($valor_retorno)
    {
        $this->MontoTransaccionCreditosClientes = $valor_retorno;
    }
    public function getMontoTransaccionCreditosClientes()
    {
        return $this->MontoTransaccionCreditosClientes;
    }
    // FECHA DE REGISTRO TRANSACCIONES CREDITOS CLIENTES
    public function setFechaTransaccionCreditosClientes($valor_retorno)
    {
        $this->FechaTransaccionCreditosClientes = $valor_retorno;
    }
    public function getFechaTransaccionCreditosClientes()
    {
        return $this->FechaTransaccionCreditosClientes;
    }
    // FECHA DE REGISTRO TRANSACCIONES CREDITOS CLIENTES
    public function setEmpleadoGestionTransaccionCreditosClientes($valor_retorno)
    {
        $this->EmpleadoGestionTransaccionCreditosClientes = $valor_retorno;
    }
    public function getEmpleadoGestionTransaccionCreditosClientes()
    {
        return $this->EmpleadoGestionTransaccionCreditosClientes;
    }
    /*
            << CONSULTA DE MENSAJERIA CASHMAN H.A USUARIOS >>
                -> DETALLE COMPLETO DE MENSAJES RECIBIDOS [BANDEJA DE ENTRADA] Y LECTURA COMPLETA INDIVIDUAL DE MENSAJE RECIBIDO [DETALLE DE MENSAJERIA]
        */
    // ID UNICO DE MENSAJE REGISTRADO
    public function setIdMensajeria($valor_retorno)
    {
        $this->IdMensajeria = $valor_retorno;
    }
    public function getIdMensajeria()
    {
        return $this->IdMensajeria;
    }
    // ID UNICO DE USUARIO DE DESTINO MENSAJE REGISTRADO
    public function setIdUsuarioDestinatarioMensajeria($valor_retorno)
    {
        $this->IdUsuarioDestinatarioMensajeria = $valor_retorno;
    }
    public function getIdUsuarioDestinatarioMensajeria()
    {
        return $this->IdUsuarioDestinatarioMensajeria;
    }
    // NOMBRE DE MENSAJE REGISTRADO
    public function setNombreMensajeria($valor_retorno)
    {
        $this->NombreMensajeria = $valor_retorno;
    }
    public function getNombreMensajeria()
    {
        return $this->NombreMensajeria;
    }
    // ASUNTO DE MENSAJE REGISTRADO
    public function setAsuntoMensajeria($valor_retorno)
    {
        $this->AsuntoMensajeria = $valor_retorno;
    }
    public function getAsuntoMensajeria()
    {
        return $this->AsuntoMensajeria;
    }
    // DETALLE COMPLETO DE MENSAJE REGISTRADO
    public function setDetalleMensajeria($valor_retorno)
    {
        $this->DetalleMensajeria = $valor_retorno;
    }
    public function getDetalleMensajeria()
    {
        return $this->DetalleMensajeria;
    }
    // FECHA DE REGISTRO DE MENSAJE REGISTRADO
    public function setFechaMensajeria($valor_retorno)
    {
        $this->FechaMensajeria = $valor_retorno;
    }
    public function getFechaMensajeria()
    {
        return $this->FechaMensajeria;
    }
    /*
            << CONSULTA DATOS NUMEROS REGISTROS ESPECIFICOS >>
                -> DETALLE DE SOLICITUDES REGISTRADAS -> TOTALES DE REGISTROS VALIDOS PARA EL INICIO DE INTERFAZ ADMINISTRADORES
        */
    // NUMERO DE USUARIOS REGISTRADOS
    public function setNumeroUsuariosRegistrados($valor_retorno)
    {
        $this->NumeroUsuariosRegistrados = $valor_retorno;
    }
    public function getNumeroUsuariosRegistrados()
    {
        return $this->NumeroUsuariosRegistrados;
    }
    // NUMERO DE PRODUCTOS REGISTRADOS
    public function setNumeroProductosRegistrados($valor_retorno)
    {
        $this->NumeroProductosRegistrados = $valor_retorno;
    }
    public function getNumeroProductosRegistrados()
    {
        return $this->NumeroProductosRegistrados;
    }
    // NUMERO DE REPORTES DE FALLOS PLATAFORMA REGISTRADOS {TICKETS DE SOPORTE}
    public function setNumeroReportesFallosPlataformaRegistrados($valor_retorno)
    {
        $this->NumeroReportesFallosPlataformaRegistrados = $valor_retorno;
    }
    public function getNumeroReportesFallosPlataformaRegistrados()
    {
        return $this->NumeroReportesFallosPlataformaRegistrados;
    }
    // NUMERO DE SOLICITUDES DE RECUPERACION DE CONTRASEÑAS REGISTRADAS
    public function setNumeroSolicitudesRecuperacionesRegistrados($valor_retorno)
    {
        $this->NumeroSolicitudesRecuperacionesRegistrados = $valor_retorno;
    }
    public function getNumeroSolicitudesRecuperacionesRegistrados()
    {
        return $this->NumeroSolicitudesRecuperacionesRegistrados;
    }
    // NUMERO DE CUOTAS CLIENTES REGISTRADAS
    public function setNumeroCuotasClientesRegistradas($valor_retorno)
    {
        $this->NumeroCuotasClientesRegistradas = $valor_retorno;
    }
    public function getNumeroCuotasClientesRegistradas()
    {
        return $this->NumeroCuotasClientesRegistradas;
    }
    // NUMERO DE TRANSACCIONES CLIENTES REGISTRADAS
    public function setNumeroTransaccionesClientesRegistradas($valor_retorno)
    {
        $this->NumeroTransaccionesClientesRegistradas = $valor_retorno;
    }
    public function getNumeroTransaccionesClientesRegistradas()
    {
        return $this->NumeroTransaccionesClientesRegistradas;
    }
    /*
            << CONSULTA DATOS NUMEROS REGISTROS ESPECIFICOS >>
                -> DETALLE DE SOLICITUDES REGISTRADAS -> TOTALES DE REGISTROS VALIDOS PARA EL INICIO DE INTERFAZ PRESIDENCIA
        */
    // NUMERO DE CUENTAS DE AHORRO CLIENTES REGISTRADAS
    public function setNumeroCuentasAhorroClientesRegistradas($valor_retorno)
    {
        $this->NumeroCuentasAhorroClientesRegistradas = $valor_retorno;
    }
    public function getNumeroCuentasAhorroClientesRegistradas()
    {
        return $this->NumeroCuentasAhorroClientesRegistradas;
    }
    /*
            << CONSULTA DATOS NUMEROS REGISTROS ESPECIFICOS >>
                -> DETALLE DE SOLICITUDES REGISTRADAS -> TOTALES DE REGISTROS VALIDOS PARA EL INICIO DE INTERFAZ GERENCIA
        */
    // NUMERO DE CUOTAS PAGADAS TARDE [-> ESTADO PT]
    public function setNumeroCuotasPagadasTarde($valor_retorno)
    {
        $this->NumeroCuotasPagadasTarde = $valor_retorno;
    }
    public function getNumeroCuotasPagadasTarde()
    {
        return $this->NumeroCuotasPagadasTarde;
    }
    // NUMERO DE CUOTAS CANCELADAS
    public function setNumeroCuotasPagadasCanceladas($valor_retorno)
    {
        $this->NumeroCuotasPagadasCanceladas = $valor_retorno;
    }
    public function getNumeroCuotasPagadasCanceladas()
    {
        return $this->NumeroCuotasPagadasCanceladas;
    }
    // NUMERO DE CUOTAS VENCIDAS
    public function setNumeroCuotasVencidas($valor_retorno)
    {
        $this->NumeroCuotasVencidas = $valor_retorno;
    }
    public function getNumeroCuotasVencidas()
    {
        return $this->NumeroCuotasVencidas;
    }
    // NUMERO DE TRANSFERENCIAS PROCESADAS
    public function setNumeroTransferenciasProcesadas($valor_retorno)
    {
        $this->NumeroTransferenciasProcesadas = $valor_retorno;
    }
    public function getNumeroTransferenciasProcesadas()
    {
        return $this->NumeroTransferenciasProcesadas;
    }
    /*
            << CONSULTA DATOS CREDITOS CANCELADOS CLIENTES -> GENERAR FINIQUITO DE CANCELACION >>
                -> DETALLE COMPLETO DE CREDITO CANCELADO CLIENTES
        */
    // ID UNICO DE HISTORICO CREDITOS CLIENTES REGISTRADO
    public function setIdCreditoHistoricoClientes($valor_retorno)
    {
        $this->IdCreditoHistoricoClientes = $valor_retorno;
    }
    public function getIdCreditoHistoricoClientes()
    {
        return $this->IdCreditoHistoricoClientes;
    }
    // ESTADO DE HISTORICO CREDITOS CLIENTES REGISTRADO
    public function setEstadoCreditoHistoricoClientes($valor_retorno)
    {
        $this->EstadoCreditoHistoricoClientes = $valor_retorno;
    }
    public function getEstadoCreditoHistoricoClientes()
    {
        return $this->EstadoCreditoHistoricoClientes;
    }
    /*
            << CONSULTA DATOS CUENTAS DE AHORRO CLIENTES CASHMAN H.A >>
                -> DETALLE COMPLETO DE CUENTA DE AHORRO REGISTRADA, ASOCIADA A CLIENTES
        */
    // ID UNICO DE CUENTA DE AHORRO REGISTRADA
    public function setIdCuentaAhorroClientes($valor_retorno)
    {
        $this->IdCuentaAhorroClientes = $valor_retorno;
    }
    public function getIdCuentaAhorroClientes()
    {
        return $this->IdCuentaAhorroClientes;
    }
    // NUMERO UNICO DE CUENTA DE AHORRO REGISTRADA
    public function setNumeroCuentaAhorroClientes($valor_retorno)
    {
        $this->NumeroCuentaAhorroClientes = $valor_retorno;
    }
    public function getNumeroCuentaAhorroClientes()
    {
        return $this->NumeroCuentaAhorroClientes;
    }
    // SALDO DISPONIBLE DE CUENTA DE AHORRO REGISTRADA
    public function setSaldoCuentaAhorroClientes($valor_retorno)
    {
        $this->SaldoCuentaAhorroClientes = $valor_retorno;
    }
    public function getSaldoCuentaAhorroClientes()
    {
        return $this->SaldoCuentaAhorroClientes;
    }
    // ESTADO ACTUAL DE CUENTA DE AHORRO REGISTRADA
    public function setEstadoCuentaAhorroClientes($valor_retorno)
    {
        $this->EstadoCuentaAhorroClientes = $valor_retorno;
    }
    public function getEstadoCuentaAhorroClientes()
    {
        return $this->EstadoCuentaAhorroClientes;
    }
    // FECHA DE APERTURA CUENTA DE AHORRO REGISTRADA
    public function setFechaAperturaCuentaAhorroClientes($valor_retorno)
    {
        $this->FechaAperturaCuentaAhorroClientes = $valor_retorno;
    }
    public function getFechaAperturaCuentaAhorroClientes()
    {
        return $this->FechaAperturaCuentaAhorroClientes;
    }
    /*
            << CONSULTA DATOS CUENTAS DE AHORRO CLIENTES CASHMAN H.A >>
                -> DETALLE DE CLIENTES -> TRANSFERENCIAS A OTRAS CUENTAS
        */
    // ID UNICO DE CUENTA DE AHORRO REGISTRADA
    public function setIdTransaccionesDepositosRetirosCuentasTransferencias($valor_retorno)
    {
        $this->IdTransaccionesDepositosRetirosCuentasTransferencias = $valor_retorno;
    }
    public function getIdTransaccionesDepositosRetirosCuentasTransferencias()
    {
        return $this->IdTransaccionesDepositosRetirosCuentasTransferencias;
    }
    // NUMERO UNICO DE CUENTA DE AHORRO REGISTRADA
    public function setNumeroCuentaAhorroClientesTransferencias($valor_retorno)
    {
        $this->NumeroCuentaAhorroClientesTransferencias = $valor_retorno;
    }
    public function getNumeroCuentaAhorroClientesTransferencias()
    {
        return $this->NumeroCuentaAhorroClientesTransferencias;
    }
    // NOMBRES DE CLIENTE DE CUENTA DE AHORRO REGISTRADA
    public function setNombresClienteCuentaAhorroClientesTransferencias($valor_retorno)
    {
        $this->NombresClienteCuentaAhorroClientesTransferencias = $valor_retorno;
    }
    public function getNombresClienteCuentaAhorroClientesTransferencias()
    {
        return $this->NombresClienteCuentaAhorroClientesTransferencias;
    }
    // APELLIDOS DE CLIENTE DE CUENTA DE AHORRO REGISTRADA
    public function setApellidosClienteCuentaAhorroClientesTransferencias($valor_retorno)
    {
        $this->ApellidosClienteCuentaAhorroClientesTransferencias = $valor_retorno;
    }
    public function getApellidosClienteCuentaAhorroClientesTransferencias()
    {
        return $this->ApellidosClienteCuentaAhorroClientesTransferencias;
    }
    /*
            << CONSULTA DATOS TRANSACCIONES REALIZADAS CUENTAS DE CLIENTES CASHMAN H.A >>
                -> DETALLE COMPLETO DE TRANSACCIONES CUENTAS DE AHORROS Y PLAZO FIJO
        */
    // ID UNICO DE TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setIdTransaccionesDepositosRetirosCuentas($valor_retorno)
    {
        $this->IdTransaccionesDepositosRetirosCuentas = $valor_retorno;
    }
    public function getIdTransaccionesDepositosRetirosCuentas()
    {
        return $this->IdTransaccionesDepositosRetirosCuentas;
    }
    // ID UNICO DE TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setUltimoIdTransaccionesDepositosRetirosCuentas($valor_retorno)
    {
        $this->UltimoIdTransaccionesDepositosRetirosCuentas = $valor_retorno;
    }
    public function getUltimoIdTransaccionesDepositosRetirosCuentas()
    {
        return $this->UltimoIdTransaccionesDepositosRetirosCuentas;
    }
    // NUMERO DE REFERENCIA TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setReferenciaTransaccionDepositosRetirosCuentas($valor_retorno)
    {
        $this->ReferenciaTransaccionDepositosRetirosCuentas = $valor_retorno;
    }
    public function getReferenciaTransaccionDepositosRetirosCuentas()
    {
        return $this->ReferenciaTransaccionDepositosRetirosCuentas;
    }
    // MONTO DEPOSITADO TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setMontoDepositosRetirosCuentas($valor_retorno)
    {
        $this->MontoDepositosRetirosCuentas = $valor_retorno;
    }
    public function getMontoDepositosRetirosCuentas()
    {
        return $this->MontoDepositosRetirosCuentas;
    }
    // MONTO DEPOSITADO TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setFechaTransaccionDepositosRetirosCuentas($valor_retorno)
    {
        $this->FechaTransaccionDepositosRetirosCuentas = $valor_retorno;
    }
    public function getFechaTransaccionDepositosRetirosCuentas()
    {
        return $this->FechaTransaccionDepositosRetirosCuentas;
    }
    // EMPLEADO QUE REALIZO GESTION TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setEmpleadoGestionTransaccionDepositosRetirosCuentas($valor_retorno)
    {
        $this->EmpleadoGestionTransaccionDepositosRetirosCuentas = $valor_retorno;
    }
    public function getEmpleadoGestionTransaccionDepositosRetirosCuentas()
    {
        return $this->EmpleadoGestionTransaccionDepositosRetirosCuentas;
    }
    // TIPO DE TRANSACCION CUENTA DE AHORRO / PLAZO FIJO
    public function setTipoTransaccionDepositosRetirosCuentas($valor_retorno)
    {
        $this->TipoTransaccionDepositosRetirosCuentas = $valor_retorno;
    }
    public function getTipoTransaccionDepositosRetirosCuentas()
    {
        return $this->TipoTransaccionDepositosRetirosCuentas;
    }
    // SALDO NUEVO DE CUENTAS TRANSACCIONES CUENTA DE AHORRO / PLAZO FIJO
    public function setSaldoNuevoTransaccionDepositosRetirosCuentas($valor_retorno)
    {
        $this->SaldoNuevoTransaccionDepositosRetirosCuentas = $valor_retorno;
    }
    public function getSaldoNuevoTransaccionDepositosRetirosCuentas()
    {
        return $this->SaldoNuevoTransaccionDepositosRetirosCuentas;
    }
    // ESTADO DE TRANSACCION DE CUENTAS DE AHORRO / PLAZO FIJO
    public function setEstadoTransaccionDepositosRetirosCuentas($valor_retorno)
    {
        $this->EstadoTransaccionDepositosRetirosCuentas = $valor_retorno;
    }
    public function getEstadoTransaccionDepositosRetirosCuentas()
    {
        return $this->EstadoTransaccionDepositosRetirosCuentas;
    }
    /*
            << CONSULTA DATOS TRANSFERENCIAS CLIENTES -> CUENTAS DE DESTINO FINAL CASHMAN H.A >>
        */
    // ID UNICO DE CUENTA AHORRO REGISTRADA -> TRANSFERENCIA DE DESTINO FINAL
    public function setIdCuentaAhorroTransferenciaDestinoClientes($valor_retorno)
    {
        $this->IdCuentaAhorroTransferenciaDestinoClientes = $valor_retorno;
    }
    public function getIdCuentaAhorroTransferenciaDestinoClientes()
    {
        return $this->IdCuentaAhorroTransferenciaDestinoClientes;
    }
    // TOTAL DE CUOTAS CANCELADAS -> INFORMACION INTERFAZ DE INICIO CLIENTES
    public function setTotalCuotasCanceladasCreditosClientes($valor_retorno)
    {
        $this->TotalCuotasCanceladasCreditosClientes = $valor_retorno;
    }
    public function getTotalCuotasCanceladasCreditosClientes()
    {
        return $this->TotalCuotasCanceladasCreditosClientes;
    }
    /*
            << CONSULTA DATOS TRANSACCIONES -> INTERFAZ DE EMPLEADOS ATENCION AL CLIENTE >>
        */
    // TOTAL DE TRANSACCIONES PROCESADAS -> SEGUN CODIGO UNICO DE EMPLEADOS
    public function setTotalTransaccionesProcesadas_AtencionClientes($valor_retorno)
    {
        $this->TotalTransaccionesProcesadas_AtencionClientes = $valor_retorno;
    }
    public function getTotalTransaccionesProcesadas_AtencionClientes()
    {
        return $this->TotalTransaccionesProcesadas_AtencionClientes;
    }
    // TOTAL DE SOLICITUDES CREDITOS PROCESADAS -> SEGUN CODIGO UNICO DE EMPLEADOS
    public function setTotalSolicitudesCreditosProcesadas_AtencionClientes($valor_retorno)
    {
        $this->TotalSolicitudesCreditosProcesadas_AtencionClientes = $valor_retorno;
    }
    public function getTotalSolicitudesCreditosProcesadas_AtencionClientes()
    {
        return $this->TotalSolicitudesCreditosProcesadas_AtencionClientes;
    }
    // TOTAL DE INGRESOS TRANSACCIONES CREDITOS PROCESADAS -> SEGUN CODIGO UNICO DE EMPLEADOS
    public function setTotalIngresosTransaccionesCreditos_AtencionClientes($valor_retorno)
    {
        $this->TotalIngresosTransaccionesCreditos_AtencionClientes = $valor_retorno;
    }
    public function getTotalIngresosTransaccionesCreditos_AtencionClientes()
    {
        return $this->TotalIngresosTransaccionesCreditos_AtencionClientes;
    }
    /*
            << CONSULTA DATOS COPIA CONTRATOS CREDITOS CLIENTES -> TODOS LOS USUARIOS QUE POSEAN UN PRODUCTO ASOCIADO >>
        */
    // NOMBRE COPIA CONTRATO CREDITOS CLIENTES
    public function setNombreCopiaContratosSuscritosCreditosClientes($valor_retorno)
    {
        $this->NombreCopiaContratosSuscritosCreditosClientes = $valor_retorno;
    }
    public function getNombreCopiaContratosSuscritosCreditosClientes()
    {
        return $this->NombreCopiaContratosSuscritosCreditosClientes;
    }
    // CONSULTAR CONFIGURACION CUENTA DE USUARIOS -> MI PERFIL
    public function ConsultarConfiguracionCuentaUsuarios($conectarsistema1, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema1, "CALL ConsultarConfiguracionCuentaUsuarios('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setCorreoUsuarios($Gestiones['correo']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setEstadoUsuarios($Gestiones['estado_usuario']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR DETALLES DE USUARIOS -> MI PERFIL
    public function ConsultarDetallesUsuarios($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarPerfilUsuarios('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setTelefonoTrabajoUsuarios($Gestiones['telefonotrabajo']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setGeneroUsuarios($Gestiones['genero']);
            $this->setEstadoCivilUsuarios($Gestiones['estadocivil']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> ADMINISTRADORES [CON FOTO]
    public function ActualizacionConfiguracionCuentaAdministradores($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $CorreoUsuarios, $ContraseniaUsuarios, $FotoPerfilUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasAdministradoresConFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CodigoUsuarios . "','" . $CorreoUsuarios . "','" . $ContraseniaUsuarios . "','" . $FotoPerfilUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> PRESIDENCIA [CON FOTO]
    public function ActualizacionConfiguracionCuentaPresidencia($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $CorreoUsuarios, $ContraseniaUsuarios, $FotoPerfilUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasPresidenciaConFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CodigoUsuarios . "','" . $CorreoUsuarios . "','" . $ContraseniaUsuarios . "','" . $FotoPerfilUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> GERENCIA [CON FOTO]
    public function ActualizacionConfiguracionCuentaGerencia($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CorreoUsuarios, $ContraseniaUsuarios, $FotoPerfilUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasGerenciaConFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CorreoUsuarios . "','" . $ContraseniaUsuarios . "','" . $FotoPerfilUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> CLIENTES [CON FOTO]
    public function ActualizacionConfiguracionCuentaClientes($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CorreoUsuarios, $ContraseniaUsuarios, $FotoPerfilUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasClientesConFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CorreoUsuarios . "','" . $ContraseniaUsuarios . "','" . $FotoPerfilUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> ADMINISTRADORES [SIN FOTO]
    public function ActualizacionConfiguracionCuentaAdministradoresSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasAdministradoresSinFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CodigoUsuarios . "','" . $ContraseniaUsuarios . "','" . $CorreoUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> PRESIDENCIA [SIN FOTO]
    public function ActualizacionConfiguracionCuentaPresidenciaSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasPresidenciaSinFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CodigoUsuarios . "','" . $ContraseniaUsuarios . "','" . $CorreoUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> GERENCIA [SIN FOTO]
    public function ActualizacionConfiguracionCuentaGerenciaSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasGerenciaSinFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $ContraseniaUsuarios . "','" . $CorreoUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DATOS CONFIGURACION CUENTA USUARIOS NIVEL -> CLIENTES [SIN FOTO]
    public function ActualizacionConfiguracionCuentaClientesSinFoto($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $ContraseniaUsuarios, $CorreoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarConfiguracionCuentasClientesSinFoto('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $ContraseniaUsuarios . "','" . $CorreoUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DETALLES PERFIL DE USUARIOS -> TODOS LOS USUARIOS
    public function ActualizacionDetallesPerfilUsuarios($conectarsistema, $IdUsuarios, $DuiUsuarios, $NitUsuarios, $TelefonoUsuarios, $CelularUsuarios, $TelefonoTrabajoUsuarios, $DireccionUsuarios, $EmpresaUsuarios, $CargoEmpresaUsuarios, $DireccionTrabajoUsuarios, $FechaNacimientoUsuarios, $GeneroUsuarios, $EstadoCivilUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizarDetallesUsuarios('" . $IdUsuarios . "','" . $DuiUsuarios . "','" . $NitUsuarios . "','" . $TelefonoUsuarios . "','" . $CelularUsuarios . "','" . $TelefonoTrabajoUsuarios . "','" . $DireccionUsuarios . "','" . $EmpresaUsuarios . "','" . $CargoEmpresaUsuarios . "','" . $DireccionTrabajoUsuarios . "','" . $FechaNacimientoUsuarios . "','" . $GeneroUsuarios . "','" . $EstadoCivilUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR DETALLE COMPLETO INICIOS DE SESIONES -> PERFIL DE USUARIOS [TODOS LOS USUARIOS]
    public function ConsultarIniciosDeSesionesUsuarios($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ReporteCompletoIniciosdeSesionesUsuarios('" . $IdUsuarios . "');");
        return $resultado;
    }
    // REGISTRAR NUEVOS USUARIOS -> USO EXCLUSIVO ROL [ADMINISTRADORES]
    public function RegistroClientesAdministradores($conectarsistema, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $ContraseniaUsuarios, $CorreoUsuarios, $IdRolUsuarios, $QuienRegistroUsuario)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarNuevosClientesAdministradores('" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CodigoUsuarios . "','" . $ContraseniaUsuarios . "','" . $CorreoUsuarios . "','" . $IdRolUsuarios . "','" . $QuienRegistroUsuario . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR DETALLE COMPLETO USUARIOS PERFIL INCOMPLETO
    // VALIDO PARA ROLES -> ADMINISTRADORES, ATENCION AL CLIENTE
    public function ConsultarUsuariosPerfilIncompleto($conectarsistema, $QuienRegistroUsuario)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaUsuariosPerfilIncompleto('" . $QuienRegistroUsuario . "')");
        return $resultado;
    }
    // REGISTRO DETALLES DE USUARIOS [NUEVOS USUARIOS] -> TODOS LOS USUARIOS
    public function RegistroNuevosDetallesPerfilUsuarios($conectarsistema, $DuiUsuarios, $NitUsuarios, $TelefonoUsuarios, $CelularUsuarios, $TelefonoTrabajoUsuarios, $DireccionUsuarios, $EmpresaUsuarios, $CargoEmpresaUsuarios, $DireccionTrabajoUsuarios, $FechaNacimientoUsuarios, $GeneroUsuarios, $EstadoCivilUsuarios, $FotoDuiUsuariosFrontal, $FotoDuiUsuariosReverso, $FotoNitUsuarios, $FotoFirmaUsuarios, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarDetallesUsuarios_Clientes('" . $DuiUsuarios . "','" . $NitUsuarios . "','" . $TelefonoUsuarios . "','" . $CelularUsuarios . "','" . $TelefonoTrabajoUsuarios . "','" . $DireccionUsuarios . "','" . $EmpresaUsuarios . "','" . $CargoEmpresaUsuarios . "','" . $DireccionTrabajoUsuarios . "','" . $FechaNacimientoUsuarios . "','" . $GeneroUsuarios . "','" . $EstadoCivilUsuarios . "','" . $FotoDuiUsuariosFrontal . "','" . $FotoDuiUsuariosReverso . "','" . $FotoNitUsuarios . "','" . $FotoFirmaUsuarios . "','" . $IdUsuarios . "')");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA GENERAL DE USUARIOS REGISTRADOS [SIN FILTRO DE ROL] -> ADMINISTRADORES
    public function ConsultarUsuariosRegistradosAdministradores($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralUsuariosRegistrados()");
        return $resultado;
    }
    // CONSULTA GENERAL DE USUARIOS REGISTRADOS [INACTIVOS] -> ADMINISTRADORES
    public function ConsultarUsuariosInactivosAdministradores($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralUsuariosInactivos()");
        return $resultado;
    }
    // CONSULTA GENERAL DE USUARIOS REGISTRADOS [BLOQUEADOS] -> ADMINISTRADORES
    public function ConsultarUsuariosBloqueadosAdministradores($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralUsuariosBloqueados()");
        return $resultado;
    }
    // CONSULTAR CONFIGURACION DE CUENTA Y DETALLES USUARIOS COMPLETA -> MODIFICAR USUARIOS
    public function ConsultarDetallesCompletosModificarUsuarios($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralCompletaUsuarios('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setCorreoUsuarios($Gestiones['correo']);
            $this->setIdRolUsuarios($Gestiones['idrol']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setEstadoUsuarios($Gestiones['estado_usuario']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setTelefonoTrabajoUsuarios($Gestiones['telefonotrabajo']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setGeneroUsuarios($Gestiones['genero']);
            $this->setEstadoCivilUsuarios($Gestiones['estadocivil']);
            $this->setFotoDuiFrontalUsuarios($Gestiones['fotoduifrontal']);
            $this->setFotoDuiReversoUsuarios($Gestiones['fotoduireverso']);
            $this->setFotoNitUsuarios($Gestiones['fotonit']);
            $this->setFotoFirmaUsuarios($Gestiones['fotofirma']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // MODIFICAR USUARIOS -> USO EXCLUSIVO ROL [ADMINISTRADORES]
    public function ModificarUsuariosClientesAdministradores($conectarsistema, $IdUsuarios, $NombresUsuarios, $ApellidosUsuarios, $CodigoUsuarios, $CorreoUsuarios, $IdRolUsuarios, $EstadoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ModificarConfiguracionCuentaUsuarios_Administradores('" . $IdUsuarios . "','" . $NombresUsuarios . "','" . $ApellidosUsuarios . "','" . $CodigoUsuarios . "','" . $CorreoUsuarios . "','" . $IdRolUsuarios . "','" . $EstadoUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // MODIFICAR DETALLES DE USUARIOS -> TODOS LOS USUARIOS
    public function ModificarDetallesUsuariosClientes($conectarsistema, $IdUsuarios, $DuiUsuarios, $NitUsuarios, $TelefonoUsuarios, $CelularUsuarios, $TelefonoTrabajoUsuarios, $DireccionUsuarios, $EmpresaUsuarios, $CargoEmpresaUsuarios, $DireccionTrabajoUsuarios, $FechaNacimientoUsuarios, $GeneroUsuarios, $EstadoCivilUsuarios, $FotoDuiUsuariosFrontal, $FotoDuiUsuariosReverso, $FotoNitUsuarios, $FotoFirmaUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ModificarDetallesUsuarios_Clientes('" . $IdUsuarios . "','" . $DuiUsuarios . "','" . $NitUsuarios . "','" . $TelefonoUsuarios . "','" . $CelularUsuarios . "','" . $TelefonoTrabajoUsuarios . "','" . $DireccionUsuarios . "','" . $EmpresaUsuarios . "','" . $CargoEmpresaUsuarios . "','" . $DireccionTrabajoUsuarios . "','" . $FechaNacimientoUsuarios . "','" . $GeneroUsuarios . "','" . $EstadoCivilUsuarios . "','" . $FotoDuiUsuariosFrontal . "','" . $FotoDuiUsuariosReverso . "','" . $FotoNitUsuarios . "','" . $FotoFirmaUsuarios . "')");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // DESACTIVAR USUARIOS / CLIENTES REGISTRADOS -> ADMINISTRADORES 
    public function DesactivarUsuariosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL DesactivarUsuarios_Clientes('" . $IdUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // BLOQUEAR USUARIOS / CLIENTES REGISTRADOS -> ADMINISTRADORES 
    public function BloquearUsuariosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL BloquearUsuarios_Clientes('" . $IdUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REACTIVAR USUARIOS / CLIENTES REGISTRADOS -> ADMINISTRADORES 
    // MANTENIMIENTO VALIDO PARA USUARIOS INACTIVOS Y BLOQUEADOS
    public function ReactivarUsuariosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ReactivarUsuarios_Clientes('" . $IdUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRO DE NUEVOS ROLES DE USUARIOS -> EXCLUSIVO PARA ADMINISTRADORES 
    public function RegistroNuevosRolesUsuarios($conectarsistema, $NombreRolUsuario, $DescripcionRolUsuario)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroNuevosRolesDeUsuarios('" . $NombreRolUsuario . "','" . $DescripcionRolUsuario . "');");
        //return $resultado;
        echo json_encode($resultado);
    }
    // CONSULTA COMPLETA DE ROLES DE USUARIOS REGISTRADOS -> ADMINISTRADORES UNICAMENTE
    public function ConsultarRolesUsuariosRegistrados($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaCompletaRolesDeUsuariosRegistrados()");
        return $resultado;
    }
    // CONSULTAR ROLES DE USUARIOS -> ADMINISTRADORES UNICAMENTE
    public function ConsultaRolesUsuariosEspecifica($conectarsistema, $IdRolUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaRolesDeUsuarios('" . $IdRolUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdRolUsuarios($Gestiones['idrol']);
            $this->setNombreRolUsuario($Gestiones['nombrerol']);
            $this->setDescripcionRolUsuario($Gestiones['descripcionrol']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // MODIFICAR ROLES DE USUARIOS -> EXCLUSIVO PARA ADMINISTRADORES 
    public function ModificarRolesUsuarios($conectarsistema, $IdRolUsuarios, $NombreRolUsuario, $DescripcionRolUsuario)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ModificarRolesUsuarios('" . $IdRolUsuarios . "','" . $NombreRolUsuario . "','" . $DescripcionRolUsuario . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ELIMINAR ROLES DE USUARIOS REGISTRADOS -> ADMINISTRADORES 
    public function EliminarRolesUsuarios($conectarsistema, $IdRolUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL EliminarRolesUsuarios('" . $IdRolUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR DETALLES DE USUARIOS -> MI PERFIL
    public function ConsultaGeneralProductosCashManHa($conectarsistema, $IdProductos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralProductosRegistrados('" . $IdProductos . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setDescripcionProductos($Gestiones['descripcionproducto']);
            $this->setRequisitosProductos($Gestiones['requisitosproductos']);
            $this->setEstadoProductos($Gestiones['estado']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // REGISTRAR NUEVOS PRODUCTOS CASHMANHA -> USO EXCLUSIVO ROL [ADMINISTRADORES]
    public function RegistroNuevosProductos($conectarsistema, $CodigoProductos, $NombreProductos, $DescripcionProductos, $RequisitosProductos, $EstadoProductos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarNuevosProductosCashManHa('" . $CodigoProductos . "','" . $NombreProductos . "','" . $DescripcionProductos . "','" . $RequisitosProductos . "','" . $EstadoProductos . "');");
        return $resultado;
    }
    // CONSULTA GENERAL DE PRODUCTOS REGISTRADOS CASHMANHA [ACTIVOS] -> EMPLEADOS - ADMINISTRADOR
    public function ConsultarProductosCashManHA_Activos($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarProductosCashManHARegistrados_Activos()");
        return $resultado;
    }
    // CONSULTA GENERAL DE PRODUCTOS REGISTRADOS CASHMANHA [INACTIVOS] -> EMPLEADOS - ADMINISTRADOR
    public function ConsultarProductosCashManHA_Inactivos($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarProductosCashManHARegistrados_Inactivos()");
        return $resultado;
    }
    // CONSULTA GENERAL DE PRODUCTOS REGISTRADOS CASHMANHA [EXPIRADOS] -> EMPLEADOS - ADMINISTRADOR
    public function ConsultarProductosCashManHA_Expirados($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarProductosCashManHARegistrados_Expirados()");
        return $resultado;
    }
    // ACTIVAR PRODUCTOS REGISTRADOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA
    public function ActivarProductosCashmanHa($conectarsistema, $IdProductos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActivarProductosCashManHa('" . $IdProductos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // DESACTIVAR PRODUCTOS REGISTRADOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA
    public function DesactivarProductosCashmanHa($conectarsistema, $IdProductos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL DesactivarProductosCashmanHa('" . $IdProductos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // EXPIRAR PRODUCTOS REGISTRADOS -> ADMINISTRADORES, PRESIDENCIA, GERENCIA
    public function ExpirarProductosCashmanHa($conectarsistema, $IdProductos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ExpirarProductosCashmanHa('" . $IdProductos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // MODIFICAR PRODUCTOS CASHMANHA -> [ADMINISTRADORES, PRESIDENCIA, GERENCIA]
    public function ModificarProductosRegistrados($conectarsistema, $IdProductos, $CodigoProductos, $NombreProductos, $DescripcionProductos, $RequisitosProductos, $EstadoProductos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ModificarProductosRegistradosCashManHa('" . $IdProductos . "','" . $CodigoProductos . "','" . $NombreProductos . "','" . $DescripcionProductos . "','" . $RequisitosProductos . "','" . $EstadoProductos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA LISTADO GENERAL USUARIOS (CLIENTES) -> NUEVAS ASIGNACIONES CREDITOS
    public function ConsultaGeneralClientesNuevosCreditos($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralListadoClientesNuevosCreditos()");
        return $resultado;
    }
    // CONSULTAR USUARIOS GENERAL -> ASIGNACION DE NUEVOS CREDITOS (GESTOR)
    public function ConsultaNuevasAsignacionesCreditosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaUsuariosGestorNuevosCreditos('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setCorreoUsuarios($Gestiones['correo']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setEstadoUsuarios($Gestiones['estado_usuario']);
            $this->setComprobacion_HabilitarNuevasSolicitudesCrediticias($Gestiones['habilitarnuevoscreditos']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setTelefonoTrabajoUsuarios($Gestiones['telefonotrabajo']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setGeneroUsuarios($Gestiones['genero']);
            $this->setEstadoCivilUsuarios($Gestiones['estadocivil']);
            $this->setFotoDuiFrontalUsuarios($Gestiones['fotoduifrontal']);
            $this->setFotoDuiReversoUsuarios($Gestiones['fotoduireverso']);
            $this->setFotoNitUsuarios($Gestiones['fotonit']);
            $this->setFotoFirmaUsuarios($Gestiones['fotofirma']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA GENERAL DE PRODUCTOS REGISTRADOS CASHMANHA ACTIVOS -> CAMPO SELECT NUEVOS CREDITOS
    public function ConsultarProductosActivosNuevosCreditos($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarProductosDisponibles_NuevosCreditos()");
        return $resultado;
    }
    // REGISTRO NUEVAS ASIGNACIONES PRESTAMOS CLIENTES -> [TODOS LOS USUARIOS ADMINISTRATIVOS]
    // VALIDO PARA PRESTAMOS PERSONALES, HIPOTECARIOS Y VEHICULOS
    public function RegistroNuevaAsignacionesCreditosClientes($conectarsistema, $IdUsuarios, $IdProductos, $TipoCliente, $MontoCredito, $InteresCredito, $PlazoCredito, $CuotaMensualCredito, $FechaSolicitud, $SalarioCliente, $SaldoActualCreditos, $ObservacionesCredito, $CodigoEmpleadoGestion)
    {
        $resultado = mysqli_query($conectarsistema, "CALL IngresoSolicitudNuevosPrestamosClientes_NuevasAsignaciones('" . $IdUsuarios . "','" . $IdProductos . "','" . $TipoCliente . "','" . $MontoCredito . "','" . $InteresCredito . "','" . $PlazoCredito . "','" . $CuotaMensualCredito . "','" . $FechaSolicitud . "','" . $SalarioCliente . "','" . $SaldoActualCreditos . "','" . $ObservacionesCredito . "','" . $CodigoEmpleadoGestion . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRO NUEVAS REFERENCIAS PERSONALES / LABORALES -> [TODOS LOS USUARIOS ADMINISTRATIVOS]
    public function RegistroNuevasReferenciasPersonalesLaborales($conectarsistema, $IdCreditos, $IdUsuarios, $IdProductos, $NombresReferenciaPersonal, $ApellidosReferenciaPersonal, $EmpresaReferenciaPersonal, $ProfesionOficioReferenciaPersonal, $TelefonoReferenciaPersonal, $NombresReferenciaLaboral, $ApellidosReferenciaLaboral, $EmpresaReferenciaLaboral, $ProfesionOficioReferenciaLaboral, $TelefonoReferenciaLaboral)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroNuevasReferenciasPersonalesLaboralesClientes('" . $IdCreditos . "','" . $IdUsuarios . "','" . $IdProductos . "','" . $NombresReferenciaPersonal . "','" . $ApellidosReferenciaPersonal . "','" . $EmpresaReferenciaPersonal . "','" . $ProfesionOficioReferenciaPersonal . "','" . $TelefonoReferenciaPersonal . "','" . $NombresReferenciaLaboral . "','" . $ApellidosReferenciaLaboral . "','" . $EmpresaReferenciaLaboral . "','" . $ProfesionOficioReferenciaLaboral . "','" . $TelefonoReferenciaLaboral . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA CONFIRMACION INGRESO REFERENCIAS PERSONALES -> ASOCIADO AL PRODUCTO QUE SE HA GESTIONADO PERVIAMENTE
    public function ConsultaConfirmacionReferenciasPersonalesLaboralesClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaConfirmacionIngresoReferenciasPersonalesClientes('" . $IdUsuarios . "')");
        return $resultado;
    }
    // CONSULTA DE ID UNICO DE CREDITO ASIGNADO Y PRODUCTO ASOCIADO CLIENTES
    public function ConsultaIdUnicoCreditosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaIdUnicoCreditos_ProductosClientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCreditoAuxiliar($Gestiones['idcreditos']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setProgresoInicialSolicitudCreditos($Gestiones['progreso_solicitud']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }

    // CONSULTA DE ID UNICO DE CREDITO ASIGNADO Y PRODUCTO ASOCIADO CLIENTES
    public function ConsultaExistenciasReferenciasClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarExistenciasReferenciasClientesCreditos('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdReferenciasClientes($Gestiones['idreferencias']);
            $this->setIdCreditoAuxiliar($Gestiones['idcreditos']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNombresReferenciaPersonal($Gestiones['nombres_referencia1']);
            $this->setApellidosReferenciaPersonal($Gestiones['apellidos_referencia1']);
            $this->setEmpresaReferenciaPersonal($Gestiones['empresa_referencia1']);
            $this->setProfesionOficioReferenciaPersonal($Gestiones['profesion_oficioreferencia1']);
            $this->setTelefonoReferenciaPersonal($Gestiones['telefono_referencia1']);
            $this->setNombresReferenciaLaboral($Gestiones['nombres_referencia2']);
            $this->setApellidosReferenciaLaboral($Gestiones['apellidos_referencia2']);
            $this->setEmpresaReferenciaLaboral($Gestiones['empresa_referencia2']);
            $this->setProfesionOficioReferenciaLaboral($Gestiones['profesion_oficioreferencia2']);
            $this->setTelefonoReferenciaLaboral($Gestiones['telefono_referencia2']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // REGISTRO NUEVAS REFERENCIAS PERSONALES / LABORALES -> [TODOS LOS USUARIOS ADMINISTRATIVOS]
    public function ModificarInformacionReferenciasPersonalesLaborales($conectarsistema, $IdReferenciasClientes, $IdCreditos, $IdProductos, $NombresReferenciaPersonal, $ApellidosReferenciaPersonal, $EmpresaReferenciaPersonal, $ProfesionOficioReferenciaPersonal, $TelefonoReferenciaPersonal, $NombresReferenciaLaboral, $ApellidosReferenciaLaboral, $EmpresaReferenciaLaboral, $ProfesionOficioReferenciaLaboral, $TelefonoReferenciaLaboral)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ModificarReferenciasPersonalesLaboralesClientes('" . $IdReferenciasClientes . "','" . $IdCreditos . "','" . $IdProductos . "','" . $NombresReferenciaPersonal . "','" . $ApellidosReferenciaPersonal . "','" . $EmpresaReferenciaPersonal . "','" . $ProfesionOficioReferenciaPersonal . "','" . $TelefonoReferenciaPersonal . "','" . $NombresReferenciaLaboral . "','" . $ApellidosReferenciaLaboral . "','" . $EmpresaReferenciaLaboral . "','" . $ProfesionOficioReferenciaLaboral . "','" . $TelefonoReferenciaLaboral . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA GENERAL DE NUEVAS SOLICITUDES DE CREDITOS -> RECIEN REGISTRADAS CON ESTADO [EN PROCESO]
    public function ConsultarListadoNuevasSolicitudesCreditosClientes($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaUsuariosIngresoNuevasSolicitudesCreditos()");
        return $resultado;
    }
    // CONSULTA GENERAL DE NUEVAS SOLICITUDES DE CREDITOS -> RECIEN REGISTRADAS CON ESTADO [APROBACIOINICIAL] -> LUEGO DE SU PRIMERA REVISION EN GERENCIA
    public function ConsultarListadoNuevasSolicitudesCreditosUltimaRevision($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaUsuariosIngresoNuevasSolicitudesCreditosUltimaRevision()");
        return $resultado;
    }
    // CONSULTA GENERAL DE NUEVAS SOLICITUDES DE CREDITOS -> RECIEN REGISTRADAS CON ESTADO [APROBADAS]
    public function ConsultarListadoSolicitudesCreditosClientesAprobadas($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaSolicitudesCreditosAprobadas()");
        return $resultado;
    }
    /*
            -> VALIDO UNICAMENTE PARA PRIMERA REVISION DE SOLICITUDES NUEVAS DE CREDITOS
        */
    // CONSULTA PRIMERA REVISION GERENCIA DE NUEVAS SOLICITUDES DE CREDITOS CLIENTES -> ASOCIADO AL PRODUCTO QUE SE HA GESTIONADO PERVIAMENTE [GESTIONAR SOLICITUDES]
    public function ConsultaPrimeraRevisionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaNuevasAsignacioneCreditosClientes_PrimeraRevision('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setTipoClienteCreditos($Gestiones['tipocliente']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setFechaIngresoSolicitudCreditos($Gestiones['fechasolicitud']);
            $this->setSalarioClienteCreditos($Gestiones['salariocliente']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setProgresoInicialSolicitudCreditos($Gestiones['progreso_solicitud']);
            $this->setEstadoActualCreditos($Gestiones['estado']);
            $this->setObservacionesEmpleadosCreditos($Gestiones['observaciones']);
            $this->setObservacionesGerenciaCreditos($Gestiones['observacion_gerencia']);
            $this->setEmpleadoRegistroCredito($Gestiones['usuario_empleado']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setIdRolUsuarios($Gestiones['idrol']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setNombresReferenciaPersonal($Gestiones['nombres_referencia1']);
            $this->setApellidosReferenciaPersonal($Gestiones['apellidos_referencia1']);
            $this->setEmpresaReferenciaPersonal($Gestiones['empresa_referencia1']);
            $this->setProfesionOficioReferenciaPersonal($Gestiones['profesion_oficioreferencia1']);
            $this->setTelefonoReferenciaPersonal($Gestiones['telefono_referencia1']);
            $this->setNombresReferenciaLaboral($Gestiones['nombres_referencia2']);
            $this->setApellidosReferenciaLaboral($Gestiones['apellidos_referencia2']);
            $this->setEmpresaReferenciaLaboral($Gestiones['empresa_referencia2']);
            $this->setProfesionOficioReferenciaLaboral($Gestiones['profesion_oficioreferencia2']);
            $this->setTelefonoReferenciaLaboral($Gestiones['telefono_referencia2']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    /*
            -> VALIDO UNICAMENTE PARA SEGUNDA REVISION FINAL DE SOLICITUDES NUEVAS DE CREDITOS
        */
    // CONSULTA PRIMERA REVISION GERENCIA DE NUEVAS SOLICITUDES DE CREDITOS CLIENTES -> ASOCIADO AL PRODUCTO QUE SE HA GESTIONADO PERVIAMENTE [GESTIONAR SOLICITUDES]
    public function ConsultaSegundaRevisionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaNuevasAsignacioneCreditosClientes_SegundaRevision('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setTipoClienteCreditos($Gestiones['tipocliente']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setFechaIngresoSolicitudCreditos($Gestiones['fechasolicitud']);
            $this->setSalarioClienteCreditos($Gestiones['salariocliente']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setProgresoInicialSolicitudCreditos($Gestiones['progreso_solicitud']);
            $this->setEstadoActualCreditos($Gestiones['estado']);
            $this->setObservacionesEmpleadosCreditos($Gestiones['observaciones']);
            $this->setObservacionesGerenciaCreditos($Gestiones['observacion_gerencia']);
            $this->setEmpleadoRegistroCredito($Gestiones['usuario_empleado']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setIdRolUsuarios($Gestiones['idrol']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setNombresReferenciaPersonal($Gestiones['nombres_referencia1']);
            $this->setApellidosReferenciaPersonal($Gestiones['apellidos_referencia1']);
            $this->setEmpresaReferenciaPersonal($Gestiones['empresa_referencia1']);
            $this->setProfesionOficioReferenciaPersonal($Gestiones['profesion_oficioreferencia1']);
            $this->setTelefonoReferenciaPersonal($Gestiones['telefono_referencia1']);
            $this->setNombresReferenciaLaboral($Gestiones['nombres_referencia2']);
            $this->setApellidosReferenciaLaboral($Gestiones['apellidos_referencia2']);
            $this->setEmpresaReferenciaLaboral($Gestiones['empresa_referencia2']);
            $this->setProfesionOficioReferenciaLaboral($Gestiones['profesion_oficioreferencia2']);
            $this->setTelefonoReferenciaLaboral($Gestiones['telefono_referencia2']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    /*
            -> VALIDO UNICAMENTE PARA REESTRUCTURACION DE CREDITOS
        */
    // CONSULTA DE CREDITOS QUE NECESITAN SER REESTRUCTURADOS -> ASOCIADO AL PRODUCTO QUE SE HA GESTIONADO PERVIAMENTE [GESTIONAR SOLICITUDES]
    public function ConsultaReestructuracionNuevasSolicitudesCreditosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaReestructuracionesCreditosNuevasSolicitudesClientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setTipoClienteCreditos($Gestiones['tipocliente']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setFechaIngresoSolicitudCreditos($Gestiones['fechasolicitud']);
            $this->setSalarioClienteCreditos($Gestiones['salariocliente']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setProgresoInicialSolicitudCreditos($Gestiones['progreso_solicitud']);
            $this->setEstadoActualCreditos($Gestiones['estado']);
            $this->setObservacionesEmpleadosCreditos($Gestiones['observaciones']);
            $this->setObservacionesGerenciaCreditos($Gestiones['observacion_gerencia']);
            $this->setEmpleadoRegistroCredito($Gestiones['usuario_empleado']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setIdRolUsuarios($Gestiones['idrol']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setNombresReferenciaPersonal($Gestiones['nombres_referencia1']);
            $this->setApellidosReferenciaPersonal($Gestiones['apellidos_referencia1']);
            $this->setEmpresaReferenciaPersonal($Gestiones['empresa_referencia1']);
            $this->setProfesionOficioReferenciaPersonal($Gestiones['profesion_oficioreferencia1']);
            $this->setTelefonoReferenciaPersonal($Gestiones['telefono_referencia1']);
            $this->setNombresReferenciaLaboral($Gestiones['nombres_referencia2']);
            $this->setApellidosReferenciaLaboral($Gestiones['apellidos_referencia2']);
            $this->setEmpresaReferenciaLaboral($Gestiones['empresa_referencia2']);
            $this->setProfesionOficioReferenciaLaboral($Gestiones['profesion_oficioreferencia2']);
            $this->setTelefonoReferenciaLaboral($Gestiones['telefono_referencia2']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    /*
            -> VALIDO UNICAMENTE PARA GENERADOR DE CUOTAS MENSUALES Y CONTRATOS FINALES CLIENTES
        */
    // CONSULTA DE CREDITOS QUE NECESITAN SER REESTRUCTURADOS -> ASOCIADO AL PRODUCTO QUE SE HA GESTIONADO PERVIAMENTE [GESTIONAR SOLICITUDES]
    public function ConsultaDatosSolicitudesCreditosClientesAprobados($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGestionadorCuotasMensualesContratos_CreditosAprobados('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setTipoClienteCreditos($Gestiones['tipocliente']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setSaldoActualCreditos($Gestiones['saldocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setComprobacion_EnviarAlHistoricoClientes($Gestiones['enviaralhistorico']);
            $this->setFechaIngresoSolicitudCreditos($Gestiones['fechasolicitud']);
            $this->setSalarioClienteCreditos($Gestiones['salariocliente']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setProgresoInicialSolicitudCreditos($Gestiones['progreso_solicitud']);
            $this->setComprobarEstadoCuotasMensuales($Gestiones['cuotas_generadas']);
            $this->setEstadoActualCreditos($Gestiones['estado']);
            $this->setComprobacion_ProcesoFinalizadoClientes($Gestiones['proceso_finalizado']);
            $this->setObservacionesEmpleadosCreditos($Gestiones['observaciones']);
            $this->setObservacionesGerenciaCreditos($Gestiones['observacion_gerencia']);
            $this->setEmpleadoRegistroCredito($Gestiones['usuario_empleado']);
            $this->setEstadoCrediticioClientes($Gestiones['estadocrediticio']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setIdRolUsuarios($Gestiones['idrol']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setTelefonoUsuarios($Gestiones['telefono']);
            $this->setCelularUsuarios($Gestiones['celular']);
            $this->setDireccionUsuarios($Gestiones['direccion']);
            $this->setEmpresaUsuarios($Gestiones['empresa']);
            $this->setCargoEmpresaUsuarios($Gestiones['cargo']);
            $this->setDireccionTrabajoUsuarios($Gestiones['direcciontrabajo']);
            $this->setFechaNacimientoUsuarios($Gestiones['fechanacimiento']);
            $this->setNombresReferenciaPersonal($Gestiones['nombres_referencia1']);
            $this->setApellidosReferenciaPersonal($Gestiones['apellidos_referencia1']);
            $this->setEmpresaReferenciaPersonal($Gestiones['empresa_referencia1']);
            $this->setProfesionOficioReferenciaPersonal($Gestiones['profesion_oficioreferencia1']);
            $this->setTelefonoReferenciaPersonal($Gestiones['telefono_referencia1']);
            $this->setNombresReferenciaLaboral($Gestiones['nombres_referencia2']);
            $this->setApellidosReferenciaLaboral($Gestiones['apellidos_referencia2']);
            $this->setEmpresaReferenciaLaboral($Gestiones['empresa_referencia2']);
            $this->setProfesionOficioReferenciaLaboral($Gestiones['profesion_oficioreferencia2']);
            $this->setTelefonoReferenciaLaboral($Gestiones['telefono_referencia2']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    /*
            -> VALIDO UNICAMENTE PARA SOLICITUDES DE CREDITOS YA CANCELADAS
        */
    // CONSULTA DE CREDITOS CANCELADOS -> ENVIADOS AL HISTORICO
    public function ConsultaDatosSolicitudesCreditosClientesHistorico($conectarsistema, $IdUsuarios, $IdCreditos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosSolicitudCrediticiaClientes_Historicos('" . $IdUsuarios . "','" . $IdCreditos . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setEstadoActualCreditos($Gestiones['estado']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA DISPONIBILIDAD ASIGNACION NUEVAS SOLICITUDES CREDITICIAS CLIENTES [HABILITAR ESTADO DE CUENTA]
    public function ConsultarDisponibilidadAsignacionNuevasSolicitudesCrediticias($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ComprobacionRegistroNuevasSolicitudesCrediticias_Clientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setComprobacion_HabilitarNuevasSolicitudesCrediticias($Gestiones['habilitarnuevoscreditos']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // ACTUALIZACION DE DATOS CLIENTES, PRIMERA REVISION DE SOLICITUDES NUEVAS DE CREDITOS -> [TODOS LOS USUARIOS ADMINISTRATIVOS]
    // VALIDO PARA PRESTAMOS PERSONALES, HIPOTECARIOS Y VEHICULOS
    public function ActualizacionPrimeraRevisionNuevaAsignacionesCreditosClientes($conectarsistema, $IdCreditos, $TipoCliente, $MontoCredito, $InteresCredito, $PlazoCredito, $CuotaMensualCredito, $SalarioCliente, $NuevoSaldoCreditosClientes, $EstadoActualCreditos, $ObservacionesCreditoGerencia, $ProgresoInicialSolicitudCreditos, $FechaUltimaActualizacionRevision, $CodigoEmpleadoGestion)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizacionDatosNuevasSolicitudesCreditos_PrimeraRevision('" . $IdCreditos . "','" . $TipoCliente . "','" . $MontoCredito . "','" . $InteresCredito . "','" . $PlazoCredito . "','" . $CuotaMensualCredito . "','" . $SalarioCliente . "','" . $NuevoSaldoCreditosClientes . "','" . $EstadoActualCreditos . "','" . $ObservacionesCreditoGerencia . "','" . $ProgresoInicialSolicitudCreditos . "','" . $FechaUltimaActualizacionRevision . "','" . $CodigoEmpleadoGestion . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTUALIZACION DE DATOS CLIENTES, SEGUNDA REVISION DE SOLICITUDES NUEVAS DE CREDITOS -> [SOLAMENTE PRESIDENCIA Y ADMINISTRADORES]
    // VALIDO PARA PRESTAMOS PERSONALES, HIPOTECARIOS Y VEHICULOS
    public function ActualizacionSegundaRevisionNuevaAsignacionesCreditosClientes($conectarsistema, $IdCreditos, $EstadoActualCreditos, $ObservacionesPresidenciaCreditos, $ProgresoInicialSolicitudCreditos, $FechaUltimaActualizacionRevision, $CodigoEmpleadoGestion)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizacionRevisionFinalPresidencia_SolicitudCreditoClientes('" . $IdCreditos . "','" . $EstadoActualCreditos . "','" . $ObservacionesPresidenciaCreditos . "','" . $ProgresoInicialSolicitudCreditos . "','" . $FechaUltimaActualizacionRevision . "','" . $CodigoEmpleadoGestion . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR DETALLE COMPLETO INICIOS DE SESIONES -> PERFIL DE USUARIOS [TODOS LOS USUARIOS]
    public function ConsultaEspecificaReestructuracionSolicitudesCreditos($conectarsistema, $EmpleadoRegistroCredito)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaSolicitudesReestructuracionCreditosClientes('" . $EmpleadoRegistroCredito . "');");
        return $resultado;
    }
    // REGISTRO CUOTAS MENSUALES NUEVOS CREDITOS CLIENTES -> ASOCIADOS SEGUN PRODUCTO ADQUIRIDO
    public function RegistroAsignacionCuotasMensualesClientes($conectarsistema, $IdCreditos, $IdProductos, $IdUsuarios, $CuotaMensualCredito, $NombreProductos, $MontoCapitalCredito, $FechaSolicitud)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarCuotasMensualesNuevosCreditosClientes('" . $IdCreditos . "','" . $IdProductos . "','" . $IdUsuarios . "','" . $CuotaMensualCredito . "','" . $NombreProductos . "','" . $MontoCapitalCredito . "','" . $FechaSolicitud . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRO DE SOLICITUD CREDITICIA CREDITOS CLIENTES -> ASOCIADOS SEGUN PRODUCTO ADQUIRIDO [HISTORICO -> SOLICITUDES CREDITICIAS CANCELADAS AL 100% POR CLIENTES]
    public function RegistroAsignacionSolicitudCrediticiaClientesHistorico($conectarsistema, $IdUsuarios, $IdProductos, $IdCreditos, $MontoCredito, $InteresCredito, $PlazoCredito, $CuotaMensualCredito, $EstadoActualCreditos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarSolicitudesCreditosClientesHistorico_Cancelados('" . $IdUsuarios . "','" . $IdProductos . "','" . $IdCreditos . "','" . $MontoCredito . "','" . $InteresCredito . "','" . $PlazoCredito . "','" . $CuotaMensualCredito . "','" . $EstadoActualCreditos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRO CUOTAS MENSUALES NUEVOS CREDITOS CLIENTES -> ASOCIADOS SEGUN PRODUCTO ADQUIRIDO [HISTORICO -> SOLICITUDES CREDITICIAS CANCELADAS AL 100% POR CLIENTES]
    public function RegistroAsignacionCuotasMensualesClientesHistorico($conectarsistema, $IdCreditos, $IdProductos, $IdUsuarios, $CuotaMensualCredito, $NombreProductos, $MontoCapitalCredito, $FechaSolicitud)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarCuotasMensualesHistoricoCreditosClientes('" . $IdCreditos . "','" . $IdProductos . "','" . $IdUsuarios . "','" . $CuotaMensualCredito . "','" . $NombreProductos . "','" . $MontoCapitalCredito . "','" . $FechaSolicitud . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRO DE DATOS DE VEHICULOS -> PREVIO A GENERAR CONTRATO FINAL CLIENTES -> PRESTAMOS DE VEHICULOS
    public function RegistroInformacionVehiculosCreditos($conectarsistema, $IdCreditos, $IdProductos, $IdUsuarios, $Placa, $Clase, $Anio, $Capacidad, $Asientos, $Marca, $Modelo, $NumeroMotor, $NumeroChasisGrabado, $NumeroChasisVin, $Color)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroInformacionVehiculosCreditosClientes('" . $IdCreditos . "','" . $IdProductos . "','" . $IdUsuarios . "','" . $Placa . "','" . $Clase . "','" . $Anio . "','" . $Capacidad . "','" . $Asientos . "','" . $Marca . "','" . $Modelo . "','" . $NumeroMotor . "','" . $NumeroChasisGrabado . "','" . $NumeroChasisVin . "','" . $Color . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA DE CREDITOS QUE NECESITAN SER REESTRUCTURADOS -> ASOCIADO AL PRODUCTO QUE SE HA GESTIONADO PERVIAMENTE [GESTIONAR SOLICITUDES]
    public function ConsultaDatosVehiculos_PrestamosdeVehiculos($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosVehiculos_PrestamosdeVehiculosClientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdDatosVehiculos($Gestiones['iddatosvehiculos']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNumeroPlaca($Gestiones['placa']);
            $this->setClaseVehiculo($Gestiones['clase']);
            $this->setAnioVehiculo($Gestiones['anio']);
            $this->setCapacidadVehiculo($Gestiones['capacidad']);
            $this->setNumeroAsientosVehiculo($Gestiones['asientos']);
            $this->setMarcaVehiculo($Gestiones['marca']);
            $this->setModeloVehiculo($Gestiones['modelo']);
            $this->setNumeroMotor($Gestiones['numeromotor']);
            $this->setNumeroChasisGrabado($Gestiones['chasisgrabado']);
            $this->setNumeroChasisVin($Gestiones['chasisvin']);
            $this->setColorVehiculo($Gestiones['color']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // REGISTRAR COPIA DE CONTRATO FINAL CLIENTES -> VALIDO PARA TODOS LOS USUARIOS ADMINISTRATIVOS
    public function RegistroCopiaContratoFinalClientes($conectarsistema, $IdCreditos, $NombreArchivo)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroCopiaContratoClientesFinal('" . $IdCreditos . "','" . $NombreArchivo . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR LISTADO DE CLIENTES QUE NECESITAN REESTRUCTURAR SU SOLICITUD DE CREDITO
    public function ConsultaGeneralClientesReestructuracionCreditos($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralReestructuracionCreditosClientes();");
        return $resultado;
    }
    // CONSULTAR LISTADO DE CLIENTES QUE SU SOLICITUD DE CREDITO HA SIDO DENEGADA
    public function ConsultaGeneralCreditosDenegadosClientes($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralSolicitudesCreditosDenegadasClientes();");
        return $resultado;
    }
    // ELIMINAR SOLICITUDES DE CREDITOS TABLA PRINCIPAL ACTIVAS Y ENVIAR AL HISTORICO ESOS DATOS A LA TABLA SECUNDARIA DE CREDITOS [TODO AUTOMATICAMENTE EN CONJUNTO CON UN DISPARADOR // TRIGGER \\]
    public function EnvioSolicitudesCreditosAlHistoricoCreditos($conectarsistema, $IdCreditos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL EnvioHistoricoSolicitudesCreditos('" . $IdCreditos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR LISTADO DE SOLICITUDES CREDITICIAS APROBADAS Y QUE SE ENCUENTRAN EN CURSO SEGUN EL X TIEMPO ESTIPULADO Y ACORDADO CON LOS CLIENTES
    public function ConsultaGeneralCreditosAprobadosActivos($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaListadoGeneralCreditosAprobados_EnCurso();");
        return $resultado;
    }
    // CONSULTA ESPECIFICA DE SOLICITUDES DE CREDITOS APROBADAS EN CURSO [ACTIVAS] ACTUALMENTE
    public function ConsultaDatosSolicitudesCreditosAprobadasActivas($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaSolicitudesCreditosAprobadas_EnCurso('" . $IdUsuarios . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR LISTADO DE SOLICITUDES CREDITICIAS APROBADAS Y QUE LOS MISMOS HAN CONCLUIDO CON SU RESPONSABILIDAD CREDITICIA [SALDO FINAL $0.00 USD] -> MOTIVO POR EL CUAL SE DENOMINAN CREDITOS CANCELADOS
    public function ConsultaGeneralCreditosAprobadosCancelados($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarListadoCreditosClientesCancelados();");
        return $resultado;
    }
    // CONSULTAR LISTADO DE SOLICITUDES CREDITICIAS APROBADAS Y QUE LOS MISMOS HAN CONCLUIDO CON SU RESPONSABILIDAD CREDITICIA [SALDO FINAL $0.00 USD] -> MOTIVO POR EL CUAL SE DENOMINAN CREDITOS CANCELADOS [EXCLUSIVAMENTE PARA PORTAL DE CLIENTES]
    public function ConsultaGeneralCreditosAprobadosCanceladosPortalClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarListadoCreditosClientesCanceladosPortalClientes('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTA ESPECIFICA DE DATOS CLIENTES -> GENERAR FINIQUITO DE CANCELACION CREDITOS
    public function ConsultaDatosGenerarFiniquitoCancelacionClientes($conectarsistema, $IdUsuarios, $IdCreditos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarDatosClientes_CreditosCanceladosFiniquitoCancelacion('" . $IdUsuarios . "','" . $IdCreditos . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCreditoHistoricoClientes($Gestiones['idhistorico']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setEstadoCreditoHistoricoClientes($Gestiones['estado']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA ESPECIFICA DE CUOTAS GENERADAS CLIENTES CASHMAN H.A -> CREDITOS ACTIVOS [EN CURSO]
    public function ConsultaCompletaCuotasGeneradas_CreditosCanceladosHistoricos($conectarsistema, $IdUsuarios, $IdCreditos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaCompleta_CuotasGeneradasClientes_CreditosCancelados('" . $IdUsuarios . "','" . $IdCreditos . "');");
        return $resultado;
    }
    // CONSULTA ESPECIFICA DE CUOTAS GENERADAS CLIENTES CASHMAN H.A -> CREDITOS CANCELADOS [HISTORICOS]
    public function ConsultaCompletaCuotasGeneradas_CreditosActivos($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaCompleta_CuotasGeneradasClientes_CreditosActivos('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTA ESPECIFICA -> DETALLE CUOTA A PAGAR [CANCELAR] -> ORDEN DE PAGOS CLIENTES
    public function ConsultarCuotas_OrdenPagoClientes($conectarsistema, $IdUsuarios, $IdCuotas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaCuotasClientes_OrdenPagoSistemaPagos('" . $IdUsuarios . "','" . $IdCuotas . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCuotasClientes($Gestiones['idcuotas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setMontoCuotaCancelar($Gestiones['montocancelar']);
            $this->setEstadoCuotaClientes($Gestiones['estadocuota']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setMontoCapitalClientes($Gestiones['montocapital']);
            $this->setFechaVencimientoCuotasClientes($Gestiones['fechavencimiento']);
            $this->setComprobarIncumplimientoCuotasClientes($Gestiones['incumplimiento_pago']);
            $this->setDiasIncumplimientoCuotasClientes($Gestiones['dias_incumplimiento']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA COMPLETA DE CUOTAS NO PAGADAS -> CLIENTES MOROSOS
    public function ConsultaClientesMorososCuotas($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaListadoGeneralCuotasClientesMorosos();");
        return $resultado;
    }
    // REGISTRO DE REPORTES FALLOS PLATAFORMA (TICKETS) -> DISPONIBLE PARA TODOS LOS USUARIOS
    public function RegistroFallosPlataforma_TicketsUsuarios($conectarsistema, $IdUsuarios, $NombreReportePlataforma, $DescripcionReportePlataforma, $FotoReportePlataforma, $FechaRegistroReportePlataforma, $EstadoReportePlataforma)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroReportesFallosPlataforma('" . $IdUsuarios . "','" . $NombreReportePlataforma . "','" . $DescripcionReportePlataforma . "','" . $FotoReportePlataforma . "','" . $FechaRegistroReportePlataforma . "','" . $EstadoReportePlataforma . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA COMPLETA DE REPORTES DE FALLOS REGISTRADOS POR LOS USUARIOS -> VALIDO EXCLUSIVAMENTE USUARIOS ADMINISTRADORES Y PRESIDENCIA
    public function ConsultaTicketsReportesFallosPlataforma($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaCompleta_ReportesFallosPlataforma();");
        return $resultado;
    }
    // CONSULTA COMPLETA DE REPORTES DE FALLOS REGISTRADOS POR LOS USUARIOS -> VALIDO EXCLUSIVAMENTE USUARIOS ADMINISTRADORES [SOLO LECTURA USUARIOS DE PRESIDENCIA]
    public function ConsultaEspecificaTicketsReportesFallosPlataforma($conectarsistema, $IdReportePlataforma)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecifica_ReportesFallosPlataforma('" . $IdReportePlataforma . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdReportePlataforma($Gestiones['idreporte']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setNombreReportePlataforma($Gestiones['nombrereporte']);
            $this->setDescripcionReportePlataforma($Gestiones['descripcionreporte']);
            $this->setFotoReportePlataforma($Gestiones['fotoreporte']);
            $this->setFechaRegistroReportePlataforma($Gestiones['fecharegistroreporte']);
            $this->setFechaActualizacionReportePlataforma($Gestiones['fechaactualizacionreporte']);
            $this->setEstadoReportePlataforma($Gestiones['estado']);
            $this->setComentarioActualizacionReportePlataforma($Gestiones['comentarioactualizacion']);
            $this->setEmpleadoGestionandoReportePlataforma($Gestiones['empleado_gestion']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // ACTUALIZACION DE REPORTES FALLOS PLATAFORMA (TICKETS) -> DISPONIBLE PARA TODOS LOS USUARIOS
    public function ActualizacionFallosPlataforma_TicketsUsuarios($conectarsistema, $IdReportePlataforma, $EstadoReportePlataforma, $ComentarioActualizacionReportePlataforma, $EmpleadoGestionandoReportePlataforma)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizacionTicketsReportesFallosPlataforma('" . $IdReportePlataforma . "','" . $EstadoReportePlataforma . "','" . $ComentarioActualizacionReportePlataforma . "','" . $EmpleadoGestionandoReportePlataforma . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRO DE CANCELACION CUOTAS CREDITOS CLIENTES -> PAGO DE CUOTAS -> TRANSACCIONES CREDITOS
    public function PagosCuotasClientes_TransaccionesCreditos($conectarsistema, $IdUsuarios, $IdProductos, $IdCreditos, $IdCuotas, $NumeroReferenciaTransaccion, $MontoCuotaCredito, $DiasIncumplimientoCredito, $EmpleadoGestionTransaccion)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroPagoCuotasCreditosClientes_OrdenPagosCashManHa ('" . $IdUsuarios . "','" . $IdProductos . "','" . $IdCreditos . "','" . $IdCuotas . "','" . $NumeroReferenciaTransaccion . "','" . $MontoCuotaCredito . "','" . $DiasIncumplimientoCredito . "','" . $EmpleadoGestionTransaccion . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA ESPECIFICA -> DATOS CLIENTES FACTURACION -> ORDEN DE PAGOS CLIENTES
    public function ConsultarDetallesFacturacion_OrdenPagosCreditosClientes($conectarsistema, $IdUsuarios, $IdCuotas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL MostrarDetallesDatosClientes_FacturacionCreditosCashManHa('" . $IdCuotas . "','" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCuotasClientes($Gestiones['idcuotas']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setMontoCuotaCancelar($Gestiones['montocancelar']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setMontoCapitalClientes($Gestiones['montocapital']);
            $this->setFechaVencimientoCuotasClientes($Gestiones['fechavencimiento']);
            $this->setReferenciaTransaccionCreditosClientes($Gestiones['referencia']);
            $this->setFechaTransaccionCreditosClientes($Gestiones['fecha']);
            $this->setDiasIncumplimientoCuotasClientes($Gestiones['dias_incumplimiento']);
            $this->setEmpleadoGestionTransaccionCreditosClientes($Gestiones['empleado_gestion']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA ESPECIFICA -> DATOS CLIENTES FACTURACION -> ORDEN DE PAGOS CLIENTES
    public function ConsultarDetallesFacturacion_OrdenPagosCreditosClientes_Historicos($conectarsistema, $IdUsuarios, $IdCuotas, $IdCreditoHistoricoClientes)
    {
        $resultado = mysqli_query($conectarsistema, "CALL MostrarDetallesDatosClientes_FacturacionCreditosHistoricos('" . $IdCuotas . "','" . $IdUsuarios . "','" . $IdCreditoHistoricoClientes . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCuotasClientes($Gestiones['idcuotas']);
            $this->setIdCuotasClientesHistorico($Gestiones['idhistorico']);
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setMontoCuotaCancelar($Gestiones['montocancelar']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setMontoCapitalClientes($Gestiones['montocapital']);
            $this->setFechaVencimientoCuotasClientes($Gestiones['fechavencimiento']);
            $this->setReferenciaTransaccionCreditosClientes($Gestiones['referencia']);
            $this->setFechaTransaccionCreditosClientes($Gestiones['fecha']);
            $this->setDiasIncumplimientoCuotasClientes($Gestiones['dias_incumplimiento']);
            $this->setEmpleadoGestionTransaccionCreditosClientes($Gestiones['empleado_gestion']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA ESPECIFICA -> DATOS CLIENTES FACTURACION -> ORDEN DE PAGOS CLIENTES
    public function ConsultaTransacciones_PagosCreditosClientes($conectarsistema, $IdUsuarios, $IdCuotas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL MostrarDetallesDatosClientes_FacturacionCreditosCashManHa('" . $IdUsuarios . "','" . $IdCuotas . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdTransaccionCreditosClientes($Gestiones['idtransaccion']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCuotasClientes($Gestiones['idcuotas']);
            $this->setReferenciaTransaccionCreditosClientes($Gestiones['referencia']);
            $this->setMontoTransaccionCreditosClientes($Gestiones['monto']);
            $this->setFechaTransaccionCreditosClientes($Gestiones['fecha']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA BANDEJA DE ENTRADA -> MENSAJERIA USUARIOS CASHMAN HA
    public function ConsultarMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaMensajesBandejaEntradaUsuariosCashmanHa('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTA DETALLES DE MENSAJERIAS BANDEJA DE ENTRADA -> MENSAJERIA USUARIOS CASHMAN HA
    public function ConsultarDetallesMensajesBandejaEntradaUsuarios($conectarsistema, $IdUsuarios, $IdMensaje)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarDetallesMensajesBandejaEntradaUsuariosCashmanHa('" . $IdUsuarios . "','" . $IdMensaje . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdMensajeria($Gestiones['idmensajeria']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoUsuarios($Gestiones['codigousuario']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setNombreMensajeria($Gestiones['nombremensaje']);
            $this->setAsuntoMensajeria($Gestiones['asuntomensaje']);
            $this->setDetalleMensajeria($Gestiones['detallemensaje']);
            $this->setFechaMensajeria($Gestiones['fechamensaje']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA DE TODOS LOS USUARIOS REGISTRADOS DISPONIBLES PARA ENVIO DE MENSAJERIA INTERNA CASHMAN HA
    public function ConsultarListadoUsuariosCompleto_MensajeriaCashmanHa($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaNombresCompletos_EnviarMensajeriaNuevaUsuariosCashManHa();");
        return $resultado;
    }
    // REGISTRO DE NUEVOS MENSAJES -> ENVIO MENSAJERIA INTERNA CASHMAN H.A
    public function EnvioNuevosMensajes_MensajeriaInternaCashmanHa($conectarsistema, $IdUsuarios, $NombreMensajeria, $AsuntoMensajeria, $DetalleMensajeria, $IdUsuarioDestinatarioMensajeria)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroNuevosMensajesUsuarios_MensajeriaCashManHa ('" . $IdUsuarios . "','" . $NombreMensajeria . "','" . $AsuntoMensajeria . "','" . $DetalleMensajeria . "','" . $IdUsuarioDestinatarioMensajeria . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // OCULTAR MENSAJES RECIBIDOS -> MENSAJERIA INTERNA CASHMAN H.A 
    public function OcultarMensajes_MensajeriaInternaCashmanHa($conectarsistema, $IdMensajeria)
    {
        $resultado = mysqli_query($conectarsistema, "CALL OcultarMensajesRecibidos_MensajeriaInternaUsuariosCashManHa ('" . $IdMensajeria . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTAR LISTADO GENERAL DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    public function MostrarListadoNotificacionesRecibidasUsuarios($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarNotificacionesRecibidasUsuarios('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTAR LISTADO GENERAL DE NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    public function OcultarMisNotificacionesUsuarios($conectarsistema, $IdNotificaciones)
    {
        $resultado = mysqli_query($conectarsistema, "CALL OcultarNotificacionesRecibidasUsuarios('" . $IdNotificaciones . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // OCULTAR NOTIFICACIONES RECIBIDAS -> VALIDO PARA TODOS LOS USUARIOS
    public function MostrarListadoNotificacionesRecortadaRecibidasUsuarios($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaNotificacionesRecortada_BarraHerramientasPlataforma('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTA DETALLES REGISTROS -> TOTALES INTERFAZ ADMINISTRADORES
    public function ConsultarDetallesRegistros_Administradores($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosGenerales_InicioPlataformaAdministradores();");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setNumeroUsuariosRegistrados($Gestiones['numero_usuarios_registrados']);
            $this->setNumeroProductosRegistrados($Gestiones['numero_productos_registrados']);
            $this->setNumeroReportesFallosPlataformaRegistrados($Gestiones['numero_reportes_registrados']);
            $this->setNumeroSolicitudesRecuperacionesRegistrados($Gestiones['numero_solicitudes_recuperaciones']);
            $this->setNumeroCuotasClientesRegistradas($Gestiones['numero_cuotas']);
            $this->setNumeroTransaccionesClientesRegistradas($Gestiones['numero_transacciones']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA DETALLES REGISTROS -> TOTALES INTERFAZ PRESIDENCIA
    public function ConsultarDetallesRegistros_Presidencia($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosGenerales_InicioPlataformaPresidencia();");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setNumeroProductosRegistrados($Gestiones['numero_productos_registrados']);
            $this->setNumeroCuotasClientesRegistradas($Gestiones['numero_cuotas_registrados']);
            $this->setNumeroTransaccionesClientesRegistradas($Gestiones['numero_transacciones_creditos']);
            $this->setNumeroCuentasAhorroClientesRegistradas($Gestiones['numero_cuentasahorro_registradas']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA DETALLES REGISTROS -> TOTALES INTERFAZ PRESIDENCIA
    public function ConsultarDetallesRegistros_Gerencia($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosGenerales_InicioPlataformaGerencia();");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setNumeroProductosRegistrados($Gestiones['numero_productos_registrados']);
            $this->setNumeroCuotasClientesRegistradas($Gestiones['numero_cuotas_registrados']);
            $this->setNumeroTransaccionesClientesRegistradas($Gestiones['numero_transacciones_creditos']);
            $this->setNumeroCuentasAhorroClientesRegistradas($Gestiones['numero_cuentasahorro_registradas']);
            $this->setNumeroCuotasPagadasTarde($Gestiones['numero_cuotas_pagadas_tarde']);
            $this->setNumeroCuotasPagadasCanceladas($Gestiones['numero_cuotas_canceladas']);
            $this->setNumeroCuotasVencidas($Gestiones['numero_cuotas_vencidas']);
            $this->setNumeroTransferenciasProcesadas($Gestiones['numero_transferencias']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR LISTADO ULTIMAS 200 TRANSACCIONES PROCESADAS CLIENTES -> INTERFAZ ADMINISTRADORES
    public function ConsultaListadoGeneralUltimasTransaccionesClientes($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarTransaccionesProcesadasClientes_UltimasTransacciones();");
        return $resultado;
    }
    // CONSULTAR LISTADO TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [CONSULTA GENERAL]
    public function ConsultaListadoGeneralTransaccionesClientes($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarTransaccionesProcesadasClientes_General();");
        return $resultado;
    }
    // CONSULTAR LISTADO TODAS LAS TRANSACCIONES PROCESADAS CLIENTES [CONSULTA ESPECIFICA MIS TRANSACCIONES]
    public function ConsultarMisTransaccionesProcesadasClientes_Especifica($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarMisTransaccionesProcesadasClientes_Especifica('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTAR LISTADO CLIENTES -> REGISTRO NUEVAS CUENTAS DE AHORROS Y DEPOSITOS PLAZO FIJO
    public function ConsultaListadoGeneralClientes_NuevasCuentasCashmanha($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosClientes_NuevasCuentasAhorrosDepositoPlazoFijo();");
        return $resultado;
    }
    // REGISTRO DE NUEVAS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
    public function RegistroNuevasCuentasAhorroClientesCashmanha($conectarsistema, $NumeroCuentaClientes, $MontoDepositoAperturaCuenta, $IdProductos, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroNuevasCuentasAhorroClientesCashmanha('" . $NumeroCuentaClientes . "','" . $MontoDepositoAperturaCuenta . "','" . $IdProductos . "','" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTAR LISTADO COMPLETO DE CUENTAS DE AHORROS REGISTRADAS
    public function ConsultaListadoCuentasAhorrosRegistradasClientes($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaListadoCuentasAhorrosRegistradas();");
        return $resultado;
    }
    // CONSULTA COMPLETA ESPECIFICA DE DATOS CLIENTES -> CUENTAS DE AHORRO REGISTRADAS
    public function ConsultaEspecificaClientes_CuentasAhorros($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaDatosCuentasAhorroClientesCashmanha('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCuentaAhorroClientes($Gestiones['idcuentas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setFotoUsuarios($Gestiones['fotoperfil']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setNumeroCuentaAhorroClientes($Gestiones['numerocuenta']);
            $this->setSaldoCuentaAhorroClientes($Gestiones['montocuenta']);
            $this->setEstadoCuentaAhorroClientes($Gestiones['estadocuenta']);
            $this->setFechaAperturaCuentaAhorroClientes($Gestiones['fechaapertura']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA COMPLETA ESPECIFICA DE DATOS CLIENTES -> CUENTAS DE AHORRO REGISTRADAS
    public function ConsultaDatosClientes_TransferenciasCuentasAhorros($conectarsistema, $IdCuentaAhorroClientes)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDatosClientes_TransferenciasCuentasAhorros('" . $IdCuentaAhorroClientes . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdTransaccionesDepositosRetirosCuentasTransferencias($Gestiones['idcuentas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdCuentaAhorroTransferenciaDestinoClientes($Gestiones['idusuarios']);
            $this->setNombresClienteCuentaAhorroClientesTransferencias($Gestiones['nombres']);
            $this->setApellidosClienteCuentaAhorroClientesTransferencias($Gestiones['apellidos']);
            $this->setNumeroCuentaAhorroClientesTransferencias($Gestiones['numerocuenta']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // REGISTRO DEPOSITOS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
    public function RegistroDepositosCuentasAhorroClientesCashmanha($conectarsistema, $IdUsuarios, $IdProductos, $IdCuentaAhorroClientes, $ReferenciaTransaccionDepositoCuentas, $MontoDepositoCuentas, $EmpleadoGestionTransaccionDepositoCuentas, $TipoTransaccionDepositosRetirosCuentas, $EstadoTransaccionDepositosRetirosCuentas, $SaldoNuevoTransaccionDepositosRetirosCuentas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroDepositoCuentasAhorrosClientesCashManHa('" . $IdUsuarios . "','" . $IdProductos . "','" . $IdCuentaAhorroClientes . "','" . $ReferenciaTransaccionDepositoCuentas . "','" . $MontoDepositoCuentas . "','" . $EmpleadoGestionTransaccionDepositoCuentas . "','" . $TipoTransaccionDepositosRetirosCuentas . "','" . $EstadoTransaccionDepositosRetirosCuentas . "','" . $SaldoNuevoTransaccionDepositosRetirosCuentas . "');");
        return $resultado;
    }
    // REGISTRO RETIROS CUENTAS DE AHORROS CLIENTES CASHMAN H.A
    public function RegistroRetirosCuentasAhorroClientesCashmanha($conectarsistema, $IdUsuarios, $IdProductos, $IdCuentaAhorroClientes, $ReferenciaTransaccionDepositoCuentas, $MontoDepositoCuentas, $EmpleadoGestionTransaccionDepositoCuentas, $TipoTransaccionDepositosRetirosCuentas, $EstadoTransaccionDepositosRetirosCuentas, $SaldoNuevoTransaccionDepositosRetirosCuentas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroRetiroCuentasAhorrosClientesCashManHa('" . $IdUsuarios . "','" . $IdProductos . "','" . $IdCuentaAhorroClientes . "','" . $ReferenciaTransaccionDepositoCuentas . "','" . $MontoDepositoCuentas . "','" . $EmpleadoGestionTransaccionDepositoCuentas . "','" . $TipoTransaccionDepositosRetirosCuentas . "','" . $EstadoTransaccionDepositosRetirosCuentas . "','" . $SaldoNuevoTransaccionDepositosRetirosCuentas . "');");
        return $resultado;
    }
    // CONSULTA COMPLETA ESPECIFICA DE DATOS CLIENTES -> CUENTAS DE AHORRO REGISTRADAS
    public function ConsultaDetallesTransaccionCuentasClientes_Comprobantes($conectarsistema, $IdTransaccionesDepositoCuentas, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDetalleComprobanteDepositoCuentasAhorroClientes('" . $IdTransaccionesDepositoCuentas . "','" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdTransaccionesDepositosRetirosCuentas($Gestiones['idtransaccioncuentas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setIdCuentaAhorroClientes($Gestiones['idcuentas']);
            $this->setNumeroCuentaAhorroClientes($Gestiones['numerocuenta']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setReferenciaTransaccionDepositosRetirosCuentas($Gestiones['referencia']);
            $this->setMontoDepositosRetirosCuentas($Gestiones['monto']);
            $this->setFechaTransaccionDepositosRetirosCuentas($Gestiones['fecha']);
            $this->setEmpleadoGestionTransaccionDepositosRetirosCuentas($Gestiones['empleado_gestion']);
            $this->setTipoTransaccionDepositosRetirosCuentas($Gestiones['tipotransaccion']);
            $this->setSaldoNuevoTransaccionDepositosRetirosCuentas($Gestiones['saldonuevocuenta_transaccion']);
            $this->setEstadoTransaccionDepositosRetirosCuentas($Gestiones['estadotransaccion']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    /*
        -> IMPORTANTE: ESTA CONSULTA ES VALIDA PARA LA PRIMER TRANSACCION [TRANSACCION NUMERO UNO -> 1] QUE LOS CLIENTES REALICEN, ES DECIR LA PRIMERA ASOCIADA SEGUN EL ID DE USUARIO / CLIENTE... PARA LA MUESTRA AUTOMATICA DEL COMPROBANTE, ES LA CONSULTA ANTERIOR
        MOTIVO -> OBTENER TODOS LOS DATOS, YA QUE SIN REGISTRO PREVIO NO HAY COMPROBANTE QUE MOSTRAR
    */
    // CONSULTA COMPLETA ESPECIFICA DE DATOS CLIENTES -> CUENTAS DE AHORRO REGISTRADAS [PRIMERA VEZ]
    public function ConsultaDetallesTransaccionCuentasClientes_ComprobantesPrimerTransaccion($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDetalleComprobanteDepositoCuentasAhorroClientes_P1('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdTransaccionesDepositosRetirosCuentas($Gestiones['idtransaccioncuentas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setIdCuentaAhorroClientes($Gestiones['idcuentas']);
            $this->setNumeroCuentaAhorroClientes($Gestiones['numerocuenta']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setDuiUsuarios($Gestiones['dui']);
            $this->setNitUsuarios($Gestiones['nit']);
            $this->setReferenciaTransaccionDepositosRetirosCuentas($Gestiones['referencia']);
            $this->setMontoDepositosRetirosCuentas($Gestiones['monto']);
            $this->setFechaTransaccionDepositosRetirosCuentas($Gestiones['fecha']);
            $this->setEmpleadoGestionTransaccionDepositosRetirosCuentas($Gestiones['empleado_gestion']);
            $this->setTipoTransaccionDepositosRetirosCuentas($Gestiones['tipotransaccion']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR ULTIMO ID DE TRANSACCION -> CUENTAS CLIENTES
    public function ConsultarUltimoIdRegistroTransaccion_CuentasClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarUltimoIdTransaccion_CuentasClientes();");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setUltimoIdTransaccionesDepositosRetirosCuentas($Gestiones['idtransaccioncuentas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA DETALLES COMPLETO DE TRANSACCIONES CUENTAS CLIENTES
    // -> VALIDO PARA CONSULTA PERSONAL [MIS TRANSACCIONES CLIENTES] Y CONSULTA GENERAL ESPECIFICA DE TRANSACCIONES POR CLIENTE
    // CONSULTA COMPLETA ESPECIFICA DE DATOS CLIENTES -> CUENTAS DE AHORRO REGISTRADAS
    public function ConsultaGeneralTransaccionesCuentasClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaTransaccionesCuentasClientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdTransaccionesDepositosRetirosCuentas($Gestiones['idtransaccioncuentas']);
            $this->setIdCuentaAhorroClientes($Gestiones['idcuentas']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNombresUsuarios($Gestiones['nombres']);
            $this->setApellidosUsuarios($Gestiones['apellidos']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setNumeroCuentaAhorroClientes($Gestiones['numerocuenta']);
            $this->setReferenciaTransaccionDepositosRetirosCuentas($Gestiones['referencia']);
            $this->setMontoDepositosRetirosCuentas($Gestiones['monto']);
            $this->setFechaTransaccionDepositosRetirosCuentas($Gestiones['fecha']);
            $this->setEmpleadoGestionTransaccionDepositosRetirosCuentas($Gestiones['empleado_gestion']);
            $this->setEstadoTransaccionDepositosRetirosCuentas($Gestiones['estadotransaccion']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTA ESPECIFICA DE TRANSACCIONES REGISTRADAS CUENTAS CLIENTES [MIS TRANSACCIONES]
    public function ConsultaMisTransaccionesCuentasClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaEspecificaTransaccionesCuentasClientes('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTA GENERAL DE TRANSACCIONES REGISTRADAS CUENTAS CLIENTES [TODOS LOS CLIENTES QUE POSEEAN CUENTAS] -> FILTRO SOLAMENTE TRANSACCIONES PROCESADAS
    public function ConsultaGeneralTransaccionesProcesadasClientesCuentas($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralTransaccionesCuentasClientesProcesadas();");
        return $resultado;
    }
    // CONSULTA GENERAL DE TRANSACCIONES REGISTRADAS CUENTAS CLIENTES [TODOS LOS CLIENTES QUE POSEEAN CUENTAS] -> FILTRO SOLAMENTE TRANSACCIONES ANULADAS
    public function ConsultaGeneralTransaccionesAnuladasClientesCuentas($conectarsistema)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaGeneralTransaccionesCuentasClientesAnuladas();");
        return $resultado;
    }
    // ANULAR TRANSACCIONES DE DEPOSITOS PROCESADAS -> CUENTAS CLIENTES
    public function AnularDepositosProcesadosClientes($conectarsistema, $IdTransaccionesDepositoCuentas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL AnularDepositosTransaccionesCuentasClientes('" . $IdTransaccionesDepositoCuentas . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ANULAR TRANSACCIONES DE RETIROS PROCESADAS -> CUENTAS CLIENTES
    public function AnularRetirosProcesadosClientes($conectarsistema, $IdTransaccionesDepositoCuentas)
    {
        $resultado = mysqli_query($conectarsistema, "CALL AnularRetirosTransaccionesCuentasClientes('" . $IdTransaccionesDepositoCuentas . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // REGISTRAR CODIGO DE SEGURIDAD AUTOMATICAMENTE AL MOMENTO DE VALIDAR NUMERO DE CUENTA  -> VALIDO PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENT
    public function RegistroCodigoSeguridad_TransferenciasCuentas($conectarsistema, $CodigoSeguridadTransferencias, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistroCodigoSeguridadTransferenciasCuentasClientes('" . $CodigoSeguridadTransferencias . "','" . $IdUsuarios . "');");
        return $resultado;
    }
    // REGISTRAR TRANSFERENCIAS ENVIADAS Y PROCESADAS CUENTAS CLIENTES -> VALIDO PARA TODOS LOS USUARIOS QUE POSEAN UNA CUENTA 
    public function RegistroTransferenciasCuentasClientes($conectarsistema, $NumeroCuentaAhorroClientes, $MontoTransferencia, $ReferenciaTransferencia, $EstadoTransferencia, $IdUsuarios, $IdUsuarioDestinoTransferencia, $IdProductos, $IdCuentaAhorroClientes, $IdCuentaAhorroClientesDestino)
    {
        $resultado = mysqli_query($conectarsistema, "CALL RegistrarTransferenciasEnviadasClientes('" . $NumeroCuentaAhorroClientes . "','" . $MontoTransferencia . "','" . $ReferenciaTransferencia . "','" . $EstadoTransferencia . "','" . $IdUsuarios . "','" . $IdUsuarioDestinoTransferencia . "','" . $IdProductos . "','" . $IdCuentaAhorroClientes . "','" . $IdCuentaAhorroClientesDestino . "');");
        return $resultado;
    }
    // BLOQUEAR CUENTAS DE AHORRO REGISTRADAS -> CUENTAS CLIENTES
    public function BloquearCuentasAhorroClientes($conectarsistema, $IdCuentaAhorroClientes)
    {
        $resultado = mysqli_query($conectarsistema, "CALL BloquearCuentasAhorroRegistradasClientes('" . $IdCuentaAhorroClientes . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CERRAR CUENTAS DE AHORRO REGISTRADAS -> CUENTAS CLIENTES
    public function CerrarCuentasAhorroClientes($conectarsistema, $IdCuentaAhorroClientes)
    {
        $resultado = mysqli_query($conectarsistema, "CALL CerrarCuentasAhorroRegistradasClientes('" . $IdCuentaAhorroClientes . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // ACTIVAR CUENTAS DE AHORRO REGISTRADAS -> CUENTAS CLIENTES
    // -> MANTENIMIENTO VALIDO PARA CUENTAS CERRADAS Y BLOQUEADAS
    public function ActivarCuentasAhorroClientes($conectarsistema, $IdCuentaAhorroClientes)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActivarCuentasAhorroRegistradasClientes('" . $IdCuentaAhorroClientes . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // CONSULTA AVANCE DE CREDITOS ASIGNADOS CLIENTES -> VALIDO PARA INTERFAZ DE INICIO CLIENTE CASHMAN H.A
    public function ConsultarAvanceCreditos_ClientesCashmanhaInterfaz($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarAvanceCreditosClientes_InterfazInicioClientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdCreditos($Gestiones['idcreditos']);
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setIdProductos($Gestiones['idproducto']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setCodigoProductos($Gestiones['codigo']);
            $this->setMontoFinanciamientoCreditos($Gestiones['montocredito']);
            $this->setCuotaMensualCreditos($Gestiones['cuotamensual']);
            $this->setTasaInteresCreditos($Gestiones['interescredito']);
            $this->setTiempoPlazoCreditos($Gestiones['plazocredito']);
            $this->setMontoCapitalClientes($Gestiones['montocapital']);
            $this->setTotalCuotasCanceladasCreditosClientes($Gestiones['cuotas_canceladas']);
            $this->setComprobacion_EnviarAlHistoricoClientes($Gestiones['enviaralhistorico']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR LISTADO ULTIMAS 200 TRANSACCIONES PROCESADAS CLIENTES -> INTERFAZ CLIENTES
    public function ConsultarListadoUltimasTrasacciones_PortalClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarTransaccionesProcesadasClientes_PortalInicioClientes('" . $IdUsuarios . "');");
        return $resultado;
    }
    // CONSULTAR LISTADO ULTIMAS 200 TRANSACCIONES PROCESADAS CLIENTES -> INTERFAZ ATENCION AL CLIENTE
    public function ConsultarListadoUltimasTrasacciones_PortalAtencionClientes($conectarsistema, $CodigoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaDetalleCompletoTransacciones_PagoCuotasCreditosEmpleados('" . $CodigoUsuarios . "');");
        return $resultado;
    }
    // CONSULTAR TOTAL DE TRANSACCIONES PROCESADAS -> SEGUN CODIGO UNICO DE USUARIOS [INICIO INTERFAZ EMPLEADOS DE ATENCION AL CLIENTE]
    public function Consulta_ContadorTransaccionesProcesadas_AtencionClientes($conectarsistema, $CodigoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ContadorTransaccionesProcesadas_EmpleadosAtencionClientes('" . $CodigoUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setTotalTransaccionesProcesadas_AtencionClientes($Gestiones['numero_transacciones_empleados_atencionclientes']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR TOTAL DE SOLICITUDES DE CREDITOS PROCESADOS -> SEGUN CODIGO UNICO DE USUARIOS [INICIO INTERFAZ EMPLEADOS DE ATENCION AL CLIENTE]
    public function Consulta_ContadorSolicitudesCreditosProcesadas_AtencionClientes($conectarsistema, $CodigoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaSolicitudesCreditosProcesadas_EmpleadosAtencionClientes('" . $CodigoUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setTotalSolicitudesCreditosProcesadas_AtencionClientes($Gestiones['numero_creditos_gestionados']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR TOTAL DE SOLICITUDES DE CREDITOS PROCESADOS -> SEGUN CODIGO UNICO DE USUARIOS [INICIO INTERFAZ EMPLEADOS DE ATENCION AL CLIENTE]
    public function Consulta_TotalIngresosTransaccionesCreditosProcesadas_AtencionClientes($conectarsistema, $CodigoUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultaTotalIngresosTransaccionesCreditos_EmpleadosAtencion('" . $CodigoUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setTotalIngresosTransaccionesCreditos_AtencionClientes($Gestiones['monto_transacciones_empleados']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // ACTUALIZACION CONFIGURACION MUY ESPECIFICA DE CUENTA USUARIOS [NUEVOS USUARIOS QUE INICIAN SESION POR PRIMERA VEZ]
    public function ActualizacionDatosCuentas_InicioSesionPrimeraVez($conectarsistema, $IdUsuarios, $CodigoUnicoUsuario, $ContraseniaUsuarios, $ComprobadorNuevoUsuario)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizacionDatosCuenta_InicioSesionUsuariosPrimeraVez('" . $IdUsuarios . "','" . $CodigoUnicoUsuario . "','" . $ContraseniaUsuarios . "','" . $ComprobadorNuevoUsuario . "');");
        return $resultado;
    }
    // MOSTRAR DATOS COPIAS DE CONTRATOS SUSCRITOS -> CREDITOS ACTIVOS EN CURSO CLIENTES
    public function ConsultarCopiaContratoCreditosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarCopiaContratoCreditos_Clientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setNombreCopiaContratosSuscritosCreditosClientes($Gestiones['copiacontratocliente']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // CONSULTAR ESTADO SOLICITUD CREDITICIA -> PORTAL CLIENTES [BIENVENIDA NUEVOS CLIENTES]
    public function ConsultarEstadoSolicitudCrediticia_PortalNuevosClientes($conectarsistema, $IdUsuarios)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ConsultarEstadoSolicitudCrediticia_BienvenidaPortalClientes('" . $IdUsuarios . "');");
        $Gestiones = mysqli_fetch_array($resultado); // RECORRIDO EN BUSCA DE REGISTRO CONSULTADO
        // EXTRAER DETALLES DE USUARIOS SOLAMENTE SI EXISTEN REGISTROS QUE SE SEAN ASOCIADOS
        // AL USUARIO QUE ESTA SIENDO CONSULTADO EN CUESTION Y NO SEA CONSULTA VACIA [NULA]
        if (mysqli_num_rows($resultado) > 0) {
            // OBTENER VALORES EXTRAIDOS EN LA CONSULTA
            $this->setIdUsuarios($Gestiones['idusuarios']);
            $this->setEstadoActualCreditos($Gestiones['estado']);
            $this->setProgresoInicialSolicitudCreditos($Gestiones['progreso_solicitud']);
            $this->setNombreProductos($Gestiones['nombreproducto']);
            $this->setCodigoProductos($Gestiones['codigo']);
        } // CIERRE if(mysqli_num_rows($resultado)>0){
    }
    // ACTUALIZACION SALDO CREDITOS CLIENTES -> REESTRUCTURACION SOLICITUDES CREDITOS CLIENTES
    public function ActualizacionSaldoCreditosClientes_Reestructuracion($conectarsistema, $IdUsuarios, $NuevoSaldoCreditosClientes)
    {
        $resultado = mysqli_query($conectarsistema, "CALL ActualizacionSaldoCreditosClientes_ReestructuracionSolicitudes('" . $IdUsuarios . "','" . $NuevoSaldoCreditosClientes . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
    // -> ELIMINAR SOLICITUDES CREDITICIAS -> MANTENIMIENTO VALIDO SOLO PARA CLIENTES QUE HAN FINALIZADO DE CANCELAR SU SOLICITUD CREDITICIA AL 100%
    public function EliminarSolicitudesCrediticiasActivasCanceladas($conectarsistema, $IdCreditos)
    {
        $resultado = mysqli_query($conectarsistema, "CALL EliminarSolicitudesCrediticiasCanceladas_Clientes('" . $IdCreditos . "');");
        if ($resultado) {
            return "OK";
        } else {
            return "ERROR";
        }
    }
}// CIERRE class GestionesClientes
