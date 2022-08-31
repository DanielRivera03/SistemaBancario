
DELIMITER $$
DROP PROCEDURE IF EXISTS ActivarCuentasAhorroRegistradasClientes$$
CREATE PROCEDURE ActivarCuentasAhorroRegistradasClientes (IN _idcuentas INT)   UPDATE cuentas SET estadocuenta="activa" WHERE idcuentas=_idcuentas$$

DROP PROCEDURE IF EXISTS ActivarProductosCashManHa$$
CREATE PROCEDURE ActivarProductosCashManHa (IN _idproducto INT)   UPDATE productos SET estado="activo" WHERE idproducto=_idproducto$$

DROP PROCEDURE IF EXISTS ActualizacionDatosCuenta_InicioSesionUsuariosPrimeraVez$$
CREATE PROCEDURE ActualizacionDatosCuenta_InicioSesionUsuariosPrimeraVez (IN _idusuarios INT, IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _nuevousuario CHAR(2))   UPDATE usuarios SET codigousuario = _codigousuario, contrasenia=_contrasenia, nuevousuario=_nuevousuario WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizacionDatosNuevasSolicitudesCreditos_PrimeraRevision$$
CREATE PROCEDURE ActualizacionDatosNuevasSolicitudesCreditos_PrimeraRevision (IN _idcreditos INT, IN _tipocliente VARCHAR(50), IN _montocredito DECIMAL(9,2), IN _interescredito FLOAT, IN _plazocredito INT, IN _cuotamensual DECIMAL(9,2), IN _salariocliente DECIMAL(9,2), IN _saldocredito DECIMAL(9,2), IN _estado VARCHAR(30), IN _observacion_gerencia VARCHAR(1500), IN _progreso_solicitud TINYINT(4), IN _fecha_ultimarevision TIMESTAMP, IN _usuario_gestionando VARCHAR(255))   UPDATE creditos SET tipocliente=_tipocliente, montocredito=_montocredito, interescredito=_interescredito, plazocredito=_plazocredito, cuotamensual=_cuotamensual, salariocliente=_salariocliente, saldocredito = _saldocredito, observacion_gerencia=_observacion_gerencia, estado=_estado, progreso_solicitud=_progreso_solicitud, fecha_ultimarevision=_fecha_ultimarevision, usuario_gestionando=_usuario_gestionando WHERE idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS ActualizacionRevisionFinalPresidencia_SolicitudCreditoClientes$$
CREATE PROCEDURE ActualizacionRevisionFinalPresidencia_SolicitudCreditoClientes (IN _idcreditos INT, IN _estado VARCHAR(30), IN _observacion_presidencia VARCHAR(1500), IN _progreso_solicitud TINYINT(4), IN _fecha_ultimarevision TIMESTAMP, IN _usuario_gestionando VARCHAR(255))   UPDATE creditos SET estado=_estado, observacion_presidencia=_observacion_presidencia, progreso_solicitud=_progreso_solicitud, fecha_ultimarevision=_fecha_ultimarevision, usuario_gestionando=_usuario_gestionando WHERE idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS ActualizacionSaldoCreditosClientes_ReestructuracionSolicitudes$$
CREATE PROCEDURE ActualizacionSaldoCreditosClientes_ReestructuracionSolicitudes (IN idcreditos INT, IN _saldocredito DECIMAL(9,2))   UPDATE creditos SET saldocredito=_saldocredito WHERE idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS ActualizacionTicketsReportesFallosPlataforma$$
CREATE PROCEDURE ActualizacionTicketsReportesFallosPlataforma (IN _idreporte INT, IN _estado VARCHAR(50), IN _comentarioactualizacion VARCHAR(3000), IN _empleado_gestion VARCHAR(255))   UPDATE reporteproblemasplataforma SET estado=_estado, comentarioactualizacion=_comentarioactualizacion, empleado_gestion=_empleado_gestion WHERE idreporte=_idreporte$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasAdministradoresConFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasAdministradoresConFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasAdministradoresSinFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasAdministradoresSinFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasClientesConFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasClientesConFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasClientesSinFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasClientesSinFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasGerenciaConFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasGerenciaConFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasGerenciaSinFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasGerenciaSinFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasPresidenciaConFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasPresidenciaConFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarConfiguracionCuentasPresidenciaSinFoto$$
CREATE PROCEDURE ActualizarConfiguracionCuentasPresidenciaSinFoto (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ActualizarDetallesUsuarios$$
CREATE PROCEDURE ActualizarDetallesUsuarios (IN _idusuarios INT, IN _dui VARCHAR(10), IN _nit VARCHAR(17), IN _telefono VARCHAR(9), IN _celular VARCHAR(9), IN _telefonotrabajo VARCHAR(9), IN _direccion VARCHAR(255), IN _empresa VARCHAR(255), IN _cargo VARCHAR(255), IN _direcciontrabajo VARCHAR(255), IN _fechanacimiento DATE, IN _genero CHAR(1), IN _estadocivil VARCHAR(30))   UPDATE detalleusuarios SET dui=_dui, nit=_nit, telefono=_telefono, celular=_celular, telefonotrabajo=_telefonotrabajo, direccion=_direccion, empresa=_empresa, cargo=_cargo, direcciontrabajo=_direcciontrabajo, fechanacimiento=_fechanacimiento, genero=_genero, estadocivil=_estadocivil WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS AnularDepositosTransaccionesCuentasClientes$$
CREATE PROCEDURE AnularDepositosTransaccionesCuentasClientes (IN _idtransaccioncuentas INT)   UPDATE transaccionescuentasclientes SET estadotransaccion="AnularDeposito" WHERE idtransaccioncuentas=_idtransaccioncuentas$$

DROP PROCEDURE IF EXISTS AnularRetirosTransaccionesCuentasClientes$$
CREATE PROCEDURE AnularRetirosTransaccionesCuentasClientes (IN _idtransaccioncuentas INT)   UPDATE transaccionescuentasclientes SET estadotransaccion="AnularRetiro" WHERE idtransaccioncuentas=_idtransaccioncuentas$$

DROP PROCEDURE IF EXISTS BloquearCuentasAhorroRegistradasClientes$$
CREATE PROCEDURE BloquearCuentasAhorroRegistradasClientes (IN _idcuentas INT)   UPDATE cuentas SET estadocuenta="bloqueada" WHERE idcuentas=_idcuentas$$

DROP PROCEDURE IF EXISTS BloquearUsuarios_Clientes$$
CREATE PROCEDURE BloquearUsuarios_Clientes (IN _idusuarios INT)   UPDATE usuarios SET estado_usuario="bloqueado" WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS CambioContraseniaRecuperacion$$
CREATE PROCEDURE CambioContraseniaRecuperacion (IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))   UPDATE usuarios SET contrasenia=_contrasenia WHERE correo=_correo$$

DROP PROCEDURE IF EXISTS CambioEstadoCodigoSeguridad$$
CREATE PROCEDURE CambioEstadoCodigoSeguridad ()   UPDATE vista_calculoexpiracion_codigocambiocredencialesusuarios SET estado="vencido" WHERE minutos_expiracion>6 AND estado="usado"$$

DROP PROCEDURE IF EXISTS CambioEstadoToken$$
CREATE PROCEDURE CambioEstadoToken (IN _correo VARCHAR(255), IN _token VARCHAR(255), IN _codigo INT, IN _estado VARCHAR(15))   UPDATE recuperacion SET estado="usado" WHERE correo=_correo AND token=_token AND codigo=_codigo$$

DROP PROCEDURE IF EXISTS CerrarCuentasAhorroRegistradasClientes$$
CREATE PROCEDURE CerrarCuentasAhorroRegistradasClientes (IN _idcuentas INT)   UPDATE cuentas SET estadocuenta="cerrada" WHERE idcuentas=_idcuentas$$

DROP PROCEDURE IF EXISTS ComprobacionRegistroNuevasSolicitudesCrediticias_Clientes$$
CREATE PROCEDURE ComprobacionRegistroNuevasSolicitudesCrediticias_Clientes (IN _idusuarios INT)   SELECT * FROM vista_consultardisponibilidadnuevoscreditosclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaCompletaRolesDeUsuariosRegistrados$$
CREATE PROCEDURE ConsultaCompletaRolesDeUsuariosRegistrados ()   SELECT * FROM vista_rolesdeusuarioscompleto$$

DROP PROCEDURE IF EXISTS ConsultaCompleta_CuotasGeneradasClientes_CreditosActivos$$
CREATE PROCEDURE ConsultaCompleta_CuotasGeneradasClientes_CreditosActivos (IN _idusuarios INT)   SELECT * FROM vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaCompleta_CuotasGeneradasClientes_CreditosCancelados$$
CREATE PROCEDURE ConsultaCompleta_CuotasGeneradasClientes_CreditosCancelados (IN _idusuarios INT, IN _idcreditos INT)   SELECT * FROM vista_consultacuotashistoricocreditosclientes WHERE idusuarios=_idusuarios AND idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS ConsultaCompleta_ReportesFallosPlataforma$$
CREATE PROCEDURE ConsultaCompleta_ReportesFallosPlataforma ()   SELECT * FROM vista_consultareportesfallosplataforma ORDER BY fecharegistroreporte ASC$$

DROP PROCEDURE IF EXISTS ConsultaConfirmacionIngresoReferenciasPersonalesClientes$$
CREATE PROCEDURE ConsultaConfirmacionIngresoReferenciasPersonalesClientes (IN _idusuarios INT)   SELECT * FROM vista_consultanuevo_prestamopersonal_asignado_clientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaCuotasVencidasClientes$$
CREATE PROCEDURE ConsultaCuotasVencidasClientes (IN _idcuotas INT)   SELECT DATEDIFF(CURDATE() , (select MAX(fechavencimiento)
                             from cuotas 
                             where idcuotas = _idcuotas))$$

DROP PROCEDURE IF EXISTS ConsultaDatosClientes_NuevasCuentasAhorrosDepositoPlazoFijo$$
CREATE PROCEDURE ConsultaDatosClientes_NuevasCuentasAhorrosDepositoPlazoFijo ()   SELECT * FROM vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo$$

DROP PROCEDURE IF EXISTS ConsultaDatosClientes_TransferenciasCuentasAhorros$$
CREATE PROCEDURE ConsultaDatosClientes_TransferenciasCuentasAhorros (IN _numerocuenta INT)   SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas WHERE numerocuenta=_numerocuenta$$

DROP PROCEDURE IF EXISTS ConsultaDatosGenerales_InicioPlataformaAdministradores$$
CREATE PROCEDURE ConsultaDatosGenerales_InicioPlataformaAdministradores ()   SELECT * FROM vista_consulta_datosgeneralesresultadosinicioadmins$$

DROP PROCEDURE IF EXISTS ConsultaDatosGenerales_InicioPlataformaGerencia$$
CREATE PROCEDURE ConsultaDatosGenerales_InicioPlataformaGerencia ()   SELECT * FROM vista_detalleinterfazgerencia$$

DROP PROCEDURE IF EXISTS ConsultaDatosGenerales_InicioPlataformaPresidencia$$
CREATE PROCEDURE ConsultaDatosGenerales_InicioPlataformaPresidencia ()   SELECT * FROM vista_consultadetallesinterfazpresidencia$$

DROP PROCEDURE IF EXISTS ConsultaDatosSolicitudCrediticiaClientes_Historicos$$
CREATE PROCEDURE ConsultaDatosSolicitudCrediticiaClientes_Historicos (IN _idusuarios INT, IN _idcreditos INT)   SELECT * FROM vista_datosgeneralescreditoscanceladoshistoricoclientes  WHERE idusuarios=_idusuarios AND idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS ConsultaDatosVehiculos_PrestamosdeVehiculosClientes$$
CREATE PROCEDURE ConsultaDatosVehiculos_PrestamosdeVehiculosClientes (IN _idusuarios INT)   SELECT * FROM vista_consultadatosprestamosdevehiculosclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaDetalleCompletoTransacciones_PagoCuotasCreditosEmpleados$$
CREATE PROCEDURE ConsultaDetalleCompletoTransacciones_PagoCuotasCreditosEmpleados (IN _empleado_gestion VARCHAR(255))   SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE empleado_gestion=_empleado_gestion ORDER BY fecha DESC LIMIT 200$$

DROP PROCEDURE IF EXISTS ConsultaDetalleComprobanteDepositoCuentasAhorroClientes$$
CREATE PROCEDURE ConsultaDetalleComprobanteDepositoCuentasAhorroClientes (IN _idtransaccioncuentas INT, IN _idusuarios INT)   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE  idtransaccioncuentas=_idtransaccioncuentas AND idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaDetalleComprobanteDepositoCuentasAhorroClientes_P1$$
CREATE PROCEDURE ConsultaDetalleComprobanteDepositoCuentasAhorroClientes_P1 (IN _idusuarios INT)   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaDisponibilidadCodigoUnicoProductos$$
CREATE PROCEDURE ConsultaDisponibilidadCodigoUnicoProductos (IN _codigo VARCHAR(255))   SELECT * FROM productos WHERE codigo=_codigo$$

DROP PROCEDURE IF EXISTS ConsultaDisponibilidadUsuariosUnicos$$
CREATE PROCEDURE ConsultaDisponibilidadUsuariosUnicos (IN _codigousuario VARCHAR(255))   SELECT * FROM usuarios WHERE codigousuario=_codigousuario$$

DROP PROCEDURE IF EXISTS ConsultaEspecificaCuotasClientes_OrdenPagoSistemaPagos$$
CREATE PROCEDURE ConsultaEspecificaCuotasClientes_OrdenPagoSistemaPagos (IN _idusuarios INT, IN _idcuotas INT)   SELECT * FROM vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios AND idcuotas=_idcuotas$$

DROP PROCEDURE IF EXISTS ConsultaEspecificaDatosCuentasAhorroClientesCashmanha$$
CREATE PROCEDURE ConsultaEspecificaDatosCuentasAhorroClientesCashmanha (IN _idusuarios INT)   SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaEspecificaRolesDeUsuarios$$
CREATE PROCEDURE ConsultaEspecificaRolesDeUsuarios (IN _idrol INT)   SELECT * from vista_rolesdeusuarioscompleto WHERE idrol=_idrol$$

DROP PROCEDURE IF EXISTS ConsultaEspecificaSolicitudesCreditosAprobadas_EnCurso$$
CREATE PROCEDURE ConsultaEspecificaSolicitudesCreditosAprobadas_EnCurso (IN _idusuarios INT)   SELECT * FROM vista_consultadetallessolicitudescreditosaprobadosclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaEspecificaSolicitudesReestructuracionCreditosClientes$$
CREATE PROCEDURE ConsultaEspecificaSolicitudesReestructuracionCreditosClientes (IN _usuario_empleado VARCHAR(255))   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="reestructuracion" AND usuario_empleado=_usuario_empleado$$

DROP PROCEDURE IF EXISTS ConsultaEspecificaTransaccionesCuentasClientes$$
CREATE PROCEDURE ConsultaEspecificaTransaccionesCuentasClientes (IN _idusuarios INT)   SELECT * FROM vista_consultadetallecompletotransaccionescuentasclientes WHERE idusuarios=_idusuarios ORDER BY fecha DESC$$

DROP PROCEDURE IF EXISTS ConsultaEspecifica_ReportesFallosPlataforma$$
CREATE PROCEDURE ConsultaEspecifica_ReportesFallosPlataforma (IN _idreporte INT)   SELECT * FROM vista_consultareportesfallosplataforma WHERE idreporte=_idreporte$$

DROP PROCEDURE IF EXISTS ConsultaGeneralCompletaUsuarios$$
CREATE PROCEDURE ConsultaGeneralCompletaUsuarios (IN _idusuarios INT)   SELECT * FROM vista_consultacompletausuariosdetalles WHERE completoperfil="si" AND idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaGeneralListadoClientesNuevosCreditos$$
CREATE PROCEDURE ConsultaGeneralListadoClientesNuevosCreditos ()   SELECT * FROM vista_consulta_asignarnuevoscreditosclientes WHERE completoperfil="si"$$

DROP PROCEDURE IF EXISTS ConsultaGeneralProductosRegistrados$$
CREATE PROCEDURE ConsultaGeneralProductosRegistrados (IN _idproducto INT)   SELECT * FROM vista_productoscashmanha WHERE idproducto=_idproducto$$

DROP PROCEDURE IF EXISTS ConsultaGeneralReestructuracionCreditosClientes$$
CREATE PROCEDURE ConsultaGeneralReestructuracionCreditosClientes ()   SELECT * FROM vista_consultageneralreestructuracioncreditosclientes WHERE cuotas_generadas="no" AND estado="reestructuracion"$$

DROP PROCEDURE IF EXISTS ConsultaGeneralSolicitudesCreditosDenegadasClientes$$
CREATE PROCEDURE ConsultaGeneralSolicitudesCreditosDenegadasClientes ()   SELECT * FROM vista_consultageneralreestructuracioncreditosclientes WHERE cuotas_generadas="no" AND estado="denegado"$$

DROP PROCEDURE IF EXISTS ConsultaGeneralTransaccionesCuentasClientesAnuladas$$
CREATE PROCEDURE ConsultaGeneralTransaccionesCuentasClientesAnuladas ()   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE estadotransaccion="AnularDeposito" OR estadotransaccion="AnularRetiro" ORDER BY fecha DESC$$

DROP PROCEDURE IF EXISTS ConsultaGeneralTransaccionesCuentasClientesProcesadas$$
CREATE PROCEDURE ConsultaGeneralTransaccionesCuentasClientesProcesadas ()   SELECT * FROM vista_consultatransaccionescuentasclientes WHERE estadotransaccion="Procesada" ORDER BY fecha DESC$$

DROP PROCEDURE IF EXISTS ConsultaGeneralUsuariosBloqueados$$
CREATE PROCEDURE ConsultaGeneralUsuariosBloqueados ()   SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="bloqueado" AND completoperfil="si"$$

DROP PROCEDURE IF EXISTS ConsultaGeneralUsuariosInactivos$$
CREATE PROCEDURE ConsultaGeneralUsuariosInactivos ()   SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="inactivo" AND completoperfil="si"$$

DROP PROCEDURE IF EXISTS ConsultaGeneralUsuariosRegistrados$$
CREATE PROCEDURE ConsultaGeneralUsuariosRegistrados ()   SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="activo" AND completoperfil="si"$$

DROP PROCEDURE IF EXISTS ConsultaGestionadorCuotasMensualesContratos_CreditosAprobados$$
CREATE PROCEDURE ConsultaGestionadorCuotasMensualesContratos_CreditosAprobados (IN _idusuarios INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="aprobado" OR estado="cancelado"$$

DROP PROCEDURE IF EXISTS ConsultaIdUnicoCreditos_ProductosClientes$$
CREATE PROCEDURE ConsultaIdUnicoCreditos_ProductosClientes (IN _idusuarios INT)   SELECT idcreditos, idproducto, nombreproducto, progreso_solicitud FROM vista_consultanuevo_prestamopersonal_asignado_clientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultaListadoCuentasAhorrosRegistradas$$
CREATE PROCEDURE ConsultaListadoCuentasAhorrosRegistradas ()   SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas ORDER BY nombres ASC$$

DROP PROCEDURE IF EXISTS ConsultaListadoGeneralCreditosAprobados_EnCurso$$
CREATE PROCEDURE ConsultaListadoGeneralCreditosAprobados_EnCurso ()   SELECT * FROM vista_consultadetallessolicitudescreditosaprobadosclientes WHERE estado="aprobado" OR estado="cancelado"$$

DROP PROCEDURE IF EXISTS ConsultaListadoGeneralCuotasClientesMorosos$$
CREATE PROCEDURE ConsultaListadoGeneralCuotasClientesMorosos ()   SELECT * FROM vista_consultaclientesmorosos WHERE dias_incumplimiento>0 AND estadocuota="pendiente" ORDER BY dias_incumplimiento DESC$$

DROP PROCEDURE IF EXISTS ConsultaMensajesBandejaEntradaUsuariosCashmanHa$$
CREATE PROCEDURE ConsultaMensajesBandejaEntradaUsuariosCashmanHa (IN _idusuariosdestinatario INT)   SELECT * FROM vista_bandejaentradamensajescashmanha WHERE idusuariosdestinatario=_idusuariosdestinatario AND ocultarmensaje="no" ORDER BY fechamensaje DESC$$

DROP PROCEDURE IF EXISTS ConsultaNombresCompletos_EnviarMensajeriaNuevaUsuariosCashManHa$$
CREATE PROCEDURE ConsultaNombresCompletos_EnviarMensajeriaNuevaUsuariosCashManHa ()   SELECT idusuarios, nombres, apellidos, codigousuario FROM usuarios ORDER BY nombres ASC$$

DROP PROCEDURE IF EXISTS ConsultaNotificacionesRecortada_BarraHerramientasPlataforma$$
CREATE PROCEDURE ConsultaNotificacionesRecortada_BarraHerramientasPlataforma (IN _idusuarios INT)   SELECT titulonotificacion,descripcionnotificacion,fechanotificacion,clasificacionnotificacion FROM vista_notificacionesrecibidasusuarios WHERE idusuarios=_idusuarios AND ocultarnotificacion="no" ORDER BY fechanotificacion DESC LIMIT 25$$

DROP PROCEDURE IF EXISTS ConsultaNuevasAsignacioneCreditosClientes_PrimeraRevision$$
CREATE PROCEDURE ConsultaNuevasAsignacioneCreditosClientes_PrimeraRevision (IN _idusuarios INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="en proceso"$$

DROP PROCEDURE IF EXISTS ConsultaNuevasAsignacioneCreditosClientes_SegundaRevision$$
CREATE PROCEDURE ConsultaNuevasAsignacioneCreditosClientes_SegundaRevision (IN _idusuarios INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="aprobacioninicial"$$

DROP PROCEDURE IF EXISTS ConsultarAvanceCreditosClientes_InterfazInicioClientes$$
CREATE PROCEDURE ConsultarAvanceCreditosClientes_InterfazInicioClientes (IN _idusuarios INT)   SELECT * FROM vista_consultacalculoavancecreditos_interfazclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarConfiguracionCuentaUsuarios$$
CREATE PROCEDURE ConsultarConfiguracionCuentaUsuarios (IN _idusuarios INT)   SELECT * FROM vista_configuracionusuariosgeneral WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarCopiaContratoCreditos_Clientes$$
CREATE PROCEDURE ConsultarCopiaContratoCreditos_Clientes (IN _idusuarios INT)   SELECT * FROM vista_consultacopiascontrato_suscritocreditosclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarCorreoRecuperacion$$
CREATE PROCEDURE ConsultarCorreoRecuperacion (IN _correo VARCHAR(255))   SELECT * FROM usuarios WHERE correo=_correo$$

DROP PROCEDURE IF EXISTS ConsultarDatosClientes_CreditosCanceladosFiniquitoCancelacion$$
CREATE PROCEDURE ConsultarDatosClientes_CreditosCanceladosFiniquitoCancelacion (IN _idusuarios INT, IN _idhistorico INT)   SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" AND idusuarios=_idusuarios AND idhistorico=_idhistorico$$

DROP PROCEDURE IF EXISTS ConsultarDetallesMensajesBandejaEntradaUsuariosCashmanHa$$
CREATE PROCEDURE ConsultarDetallesMensajesBandejaEntradaUsuariosCashmanHa (IN _idusuariosdestinatario INT, IN _idmensajeria INT)   SELECT * FROM vista_bandejaentradamensajescashmanha WHERE idusuariosdestinatario=_idusuariosdestinatario AND idmensajeria=_idmensajeria$$

DROP PROCEDURE IF EXISTS ConsultarDisponibilidadNumeroCuentaAhorroClientes$$
CREATE PROCEDURE ConsultarDisponibilidadNumeroCuentaAhorroClientes (IN _numerocuenta INT)   SELECT * FROM cuentas WHERE numerocuenta=_numerocuenta$$

DROP PROCEDURE IF EXISTS ConsultaReestructuracionesCreditosNuevasSolicitudesClientes$$
CREATE PROCEDURE ConsultaReestructuracionesCreditosNuevasSolicitudesClientes (IN _idusuarios INT)   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="reestructuracion"$$

DROP PROCEDURE IF EXISTS ConsultarEstadoSolicitudCrediticia_BienvenidaPortalClientes$$
CREATE PROCEDURE ConsultarEstadoSolicitudCrediticia_BienvenidaPortalClientes (IN _idusuarios INT)   SELECT * FROM vista_consultaestadosolicitudcredito_portalclientesbienvenida WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarExistenciaCuentaAhorros_SistemaTransferenciasClientes$$
CREATE PROCEDURE ConsultarExistenciaCuentaAhorros_SistemaTransferenciasClientes (IN _numerocuenta INT)   SELECT * FROM cuentas WHERE numerocuenta=_numerocuenta$$

DROP PROCEDURE IF EXISTS ConsultarExistenciasReferenciasClientesCreditos$$
CREATE PROCEDURE ConsultarExistenciasReferenciasClientesCreditos (IN _idusuarios INT)   SELECT * FROM vista_consultaexistenciareferenciasclientes WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarListadoCreditosClientesCancelados$$
CREATE PROCEDURE ConsultarListadoCreditosClientesCancelados ()   SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado"$$

DROP PROCEDURE IF EXISTS ConsultarListadoCreditosClientesCanceladosPortalClientes$$
CREATE PROCEDURE ConsultarListadoCreditosClientesCanceladosPortalClientes (IN _idusuarios INT)   SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" AND idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarMisTransaccionesProcesadasClientes_Especifica$$
CREATE PROCEDURE ConsultarMisTransaccionesProcesadasClientes_Especifica (IN _idusuarios INT)   SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE idusuarios=_idusuarios ORDER BY fecha DESC$$

DROP PROCEDURE IF EXISTS ConsultarNotificacionesRecibidasUsuarios$$
CREATE PROCEDURE ConsultarNotificacionesRecibidasUsuarios (IN _idusuarios INT)   SELECT * FROM vista_notificacionesrecibidasusuarios WHERE idusuarios=_idusuarios AND ocultarnotificacion="no" ORDER BY fechanotificacion DESC$$

DROP PROCEDURE IF EXISTS ConsultarNumeroUsuarios$$
CREATE PROCEDURE ConsultarNumeroUsuarios ()   SELECT * FROM vista_configuracionusuariosgeneral$$

DROP PROCEDURE IF EXISTS ConsultarPerfilUsuarios$$
CREATE PROCEDURE ConsultarPerfilUsuarios (IN _idusuarios INT)   SELECT * FROM vista_detallesusuarios WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ConsultarProductosCashManHARegistrados_Activos$$
CREATE PROCEDURE ConsultarProductosCashManHARegistrados_Activos ()   SELECT * FROM vista_productoscashmanha WHERE estado="activo"$$

DROP PROCEDURE IF EXISTS ConsultarProductosCashManHARegistrados_Expirados$$
CREATE PROCEDURE ConsultarProductosCashManHARegistrados_Expirados ()   SELECT * FROM vista_productoscashmanha WHERE estado="expirado"$$

DROP PROCEDURE IF EXISTS ConsultarProductosCashManHARegistrados_Inactivos$$
CREATE PROCEDURE ConsultarProductosCashManHARegistrados_Inactivos ()   SELECT * FROM vista_productoscashmanha WHERE estado="inactivo"$$

DROP PROCEDURE IF EXISTS ConsultarProductosDisponibles_NuevosCreditos$$
CREATE PROCEDURE ConsultarProductosDisponibles_NuevosCreditos ()   SELECT * FROM vista_consultaproductosnuevoscreditos WHERE estado="activo"$$

DROP PROCEDURE IF EXISTS ConsultarTransaccionesProcesadasClientes_General$$
CREATE PROCEDURE ConsultarTransaccionesProcesadasClientes_General ()   SELECT * FROM vista_consultatransaccionesclientesgeneral ORDER BY fecha DESC$$

DROP PROCEDURE IF EXISTS ConsultarTransaccionesProcesadasClientes_PortalInicioClientes$$
CREATE PROCEDURE ConsultarTransaccionesProcesadasClientes_PortalInicioClientes (IN _idusuarios INT)   SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE idusuarios=_idusuarios ORDER BY fecha DESC LIMIT 51$$

DROP PROCEDURE IF EXISTS ConsultarTransaccionesProcesadasClientes_UltimasTransacciones$$
CREATE PROCEDURE ConsultarTransaccionesProcesadasClientes_UltimasTransacciones ()   SELECT * FROM vista_consultatransaccionesclientesgeneral ORDER BY fecha DESC LIMIT 200$$

DROP PROCEDURE IF EXISTS ConsultarUltimoIdTransaccion_CuentasClientes$$
CREATE PROCEDURE ConsultarUltimoIdTransaccion_CuentasClientes ()   SELECT idtransaccioncuentas, idusuarios FROM vista_consultatransaccionescuentasclientes ORDER BY fecha DESC LIMIT 1$$

DROP PROCEDURE IF EXISTS ConsultaSolicitudesCreditosAprobadas$$
CREATE PROCEDURE ConsultaSolicitudesCreditosAprobadas ()   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="aprobado" AND cuotas_generadas="no"$$

DROP PROCEDURE IF EXISTS ConsultaSolicitudesCreditosProcesadas_EmpleadosAtencionClientes$$
CREATE PROCEDURE ConsultaSolicitudesCreditosProcesadas_EmpleadosAtencionClientes (IN _usuario_empleado VARCHAR(255))   SELECT * FROM vista_contadorcreditosgestionados_empleadosatencionclientes WHERE usuario_empleado=_usuario_empleado$$

DROP PROCEDURE IF EXISTS ConsultaTotalIngresosTransaccionesCreditos_EmpleadosAtencion$$
CREATE PROCEDURE ConsultaTotalIngresosTransaccionesCreditos_EmpleadosAtencion (IN _empleado_gestion VARCHAR(255))   SELECT * FROM vista_calculoingresostransacciones_empleadosatencionclientes WHERE empleado_gestion=_empleado_gestion$$

DROP PROCEDURE IF EXISTS ConsultaTransacciones_PagosCreditosClientes$$
CREATE PROCEDURE ConsultaTransacciones_PagosCreditosClientes (IN _idusuarios INT, IN _idcuotas INT)   SELECT * FROM vista_transaccionespagocuotascreditosclientes WHERE idusuarios=_idusuarios AND idcuotas=_idcuotas$$

DROP PROCEDURE IF EXISTS ConsultaUsuariosGestorNuevosCreditos$$
CREATE PROCEDURE ConsultaUsuariosGestorNuevosCreditos (IN _idusuarios INT)   SELECT * FROM vista_consulta_asignarnuevoscreditosclientes WHERE idusuarios=_idusuarios AND completoperfil="si"$$

DROP PROCEDURE IF EXISTS ConsultaUsuariosIngresoNuevasSolicitudesCreditos$$
CREATE PROCEDURE ConsultaUsuariosIngresoNuevasSolicitudesCreditos ()   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="en proceso"$$

DROP PROCEDURE IF EXISTS ConsultaUsuariosIngresoNuevasSolicitudesCreditosUltimaRevision$$
CREATE PROCEDURE ConsultaUsuariosIngresoNuevasSolicitudesCreditosUltimaRevision ()   SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="aprobacioninicial"$$

DROP PROCEDURE IF EXISTS ConsultaUsuariosPerfilIncompleto$$
CREATE PROCEDURE ConsultaUsuariosPerfilIncompleto (IN _quienregistro VARCHAR(255))   SELECT * FROM vista_usuariosperfilincompleto WHERE completoperfil="no" AND estado_usuario="activo" AND quienregistro=_quienregistro$$

DROP PROCEDURE IF EXISTS ContadorTransaccionesProcesadas_EmpleadosAtencionClientes$$
CREATE PROCEDURE ContadorTransaccionesProcesadas_EmpleadosAtencionClientes (IN _empleado_gestion VARCHAR(255))   SELECT * FROM vista_contadortransacciones_empleadosatencionclientes WHERE empleado_gestion=_empleado_gestion$$

DROP PROCEDURE IF EXISTS ConteoCuotasCanceladasClientes$$
CREATE PROCEDURE ConteoCuotasCanceladasClientes (IN _idusuarios INT)   SELECT idusuarios,estadocuota from vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios AND estadocuota="cancelado"$$

DROP PROCEDURE IF EXISTS DesactivarProductosCashmanHa$$
CREATE PROCEDURE DesactivarProductosCashmanHa (IN _idproducto INT)   UPDATE productos SET estado="inactivo" WHERE idproducto=_idproducto$$

DROP PROCEDURE IF EXISTS DesactivarUsuarios_Clientes$$
CREATE PROCEDURE DesactivarUsuarios_Clientes (IN _idusuarios INT)   UPDATE usuarios SET estado_usuario="inactivo" WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS EliminarRolesUsuarios$$
CREATE PROCEDURE EliminarRolesUsuarios (IN _idrol INT)   DELETE FROM roles WHERE idrol=_idrol$$

DROP PROCEDURE IF EXISTS EliminarSolicitudesCrediticiasCanceladas_Clientes$$
CREATE PROCEDURE EliminarSolicitudesCrediticiasCanceladas_Clientes (IN _idcreditos INT)   DELETE FROM creditos WHERE idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS EnvioHistoricoSolicitudesCreditos$$
CREATE PROCEDURE EnvioHistoricoSolicitudesCreditos (IN _idcreditos INT)   DELETE FROM creditos WHERE idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS Evaluar_IncumplimientosPagosCuotasClientes$$
CREATE PROCEDURE Evaluar_IncumplimientosPagosCuotasClientes (IN __idcuotas INT)   UPDATE cuotas SET estadocuota="SI" WHERE idcuotas=_idcuotas$$

DROP PROCEDURE IF EXISTS ExpirarProductosCashmanHa$$
CREATE PROCEDURE ExpirarProductosCashmanHa (IN _idproducto INT)   UPDATE productos SET estado="expirado" WHERE idproducto=_idproducto$$

DROP PROCEDURE IF EXISTS IngresoSolicitudNuevosPrestamosClientes_NuevasAsignaciones$$
CREATE PROCEDURE IngresoSolicitudNuevosPrestamosClientes_NuevasAsignaciones (IN _idusuarios INT, IN _idproducto INT, IN _tipocliente VARCHAR(50), IN _montocredito DECIMAL(9,2), IN _interescredito FLOAT, IN _plazocredito INT, IN _cuotamensual DECIMAL(9,2), IN _fechasolicitud DATE, IN _salariocliente DECIMAL(9,2), IN _saldocredito DECIMAL(9,2), IN _observaciones VARCHAR(1500), IN _usuario_empleado VARCHAR(255))   INSERT INTO creditos (idusuarios,idproducto,tipocliente,montocredito,interescredito,plazocredito,cuotamensual,fechasolicitud,salariocliente,saldocredito,observaciones,usuario_empleado) VALUES (_idusuarios,_idproducto,_tipocliente,_montocredito,_interescredito,_plazocredito,_cuotamensual,_fechasolicitud,_salariocliente,_saldocredito,_observaciones,_usuario_empleado)$$

DROP PROCEDURE IF EXISTS IniciarSesion$$
CREATE PROCEDURE IniciarSesion (IN Usuario VARCHAR(255), IN Pass VARCHAR(255))   BEGIN
SELECT * FROM usuarios WHERE (codigousuario=Usuario OR correo=Usuario) AND contrasenia=Pass AND estado_usuario="activo";
END$$

DROP PROCEDURE IF EXISTS ModificarConfiguracionCuentaUsuarios_Administradores$$
CREATE PROCEDURE ModificarConfiguracionCuentaUsuarios_Administradores (IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _correo VARCHAR(255), IN _idrol INT, IN _estado_usuario VARCHAR(25))   UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, correo=_correo, idrol=_idrol, estado_usuario=_estado_usuario WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ModificarDetallesUsuarios_Clientes$$
CREATE PROCEDURE ModificarDetallesUsuarios_Clientes (IN _idusuarios INT, IN _dui VARCHAR(10), IN _nit VARCHAR(17), IN _telefono VARCHAR(9), IN _celular VARCHAR(9), IN _telefonotrabajo VARCHAR(9), IN _direccion VARCHAR(255), IN _empresa VARCHAR(255), IN _cargo VARCHAR(255), IN _direcciontrabajo VARCHAR(255), IN _fechanacimiento DATE, IN _genero CHAR(1), IN _estadocivil VARCHAR(30), IN _fotoduifrontal VARCHAR(255), IN _fotoduireverso VARCHAR(255), IN _fotonit VARCHAR(255), IN _fotofirma VARCHAR(255))   UPDATE detalleusuarios SET dui=_dui,nit=_nit,telefono=_telefono,celular=_celular,telefonotrabajo=_telefonotrabajo,direccion=_direccion,empresa=_empresa,cargo=_cargo,direcciontrabajo=_direcciontrabajo,fechanacimiento=_fechanacimiento,genero=_genero,estadocivil=_estadocivil,fotoduifrontal=_fotoduifrontal,fotoduireverso=_fotoduireverso,fotonit=_fotonit,fotofirma=_fotofirma WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ModificarProductosRegistradosCashManHa$$
CREATE PROCEDURE ModificarProductosRegistradosCashManHa (IN _idproducto INT, IN _codigo VARCHAR(255), IN _nombreproducto VARCHAR(255), IN _descripcionproducto VARCHAR(255), IN _requisitosproductos VARCHAR(1000), IN _estado VARCHAR(15))   UPDATE productos SET codigo=_codigo, nombreproducto=_nombreproducto, descripcionproducto=_descripcionproducto, requisitosproductos=_requisitosproductos, estado=_estado WHERE idproducto=_idproducto$$

DROP PROCEDURE IF EXISTS ModificarReferenciasPersonalesLaboralesClientes$$
CREATE PROCEDURE ModificarReferenciasPersonalesLaboralesClientes (IN _idreferencias INT, IN _idcreditos INT, IN _idproducto INT, IN _nombres_referencia1 VARCHAR(255), IN _apellidos_referencia1 VARCHAR(255), IN _empresa_referencia1 VARCHAR(255), IN _profesion_oficioreferencia1 VARCHAR(255), IN _telefono_referencia1 VARCHAR(9), IN _nombres_referencia2 VARCHAR(255), IN _apellidos_referencia2 VARCHAR(255), IN _empresa_referencia2 VARCHAR(255), IN _profesion_oficioreferencia2 VARCHAR(255), IN _telefono_referencia2 VARCHAR(255))   UPDATE referenciaspersonales SET idcreditos=_idcreditos, idproducto=_idproducto, nombres_referencia1=_nombres_referencia1, apellidos_referencia1=_apellidos_referencia1, empresa_referencia1=_empresa_referencia1, profesion_oficioreferencia1=_profesion_oficioreferencia1, telefono_referencia1=_telefono_referencia1, nombres_referencia2=_nombres_referencia2, apellidos_referencia2=_apellidos_referencia2, empresa_referencia2=_empresa_referencia2,profesion_oficioreferencia2=_profesion_oficioreferencia2, telefono_referencia2=_telefono_referencia2 WHERE idreferencias=_idreferencias$$

DROP PROCEDURE IF EXISTS ModificarRolesUsuarios$$
CREATE PROCEDURE ModificarRolesUsuarios (IN _idrol INT, IN _nombrerol VARCHAR(75), IN _descripcionrol VARCHAR(255))   UPDATE roles SET nombrerol=_nombrerol, descripcionrol=_descripcionrol WHERE idrol=_idrol$$

DROP PROCEDURE IF EXISTS MostrarDetallesDatosClientes_FacturacionCreditosCashManHa$$
CREATE PROCEDURE MostrarDetallesDatosClientes_FacturacionCreditosCashManHa (IN _idcuotas INT, IN _idusuarios INT)   SELECT * FROM vista_detallesfacturacioncreditosclientes WHERE idcuotas=_idcuotas AND idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS MostrarDetallesDatosClientes_FacturacionCreditosHistoricos$$
CREATE PROCEDURE MostrarDetallesDatosClientes_FacturacionCreditosHistoricos (IN `_idcuotas` INT, IN `_idusuarios` INT, IN `_idhistorico` INT)   SELECT * FROM vista_detallesfacturacioncreditosclienteshistoricos WHERE idcuotas=_idcuotas AND idusuarios=_idusuarios AND idhistorico=_idhistorico$$

DROP PROCEDURE IF EXISTS OcultarMensajesRecibidos_MensajeriaInternaUsuariosCashManHa$$
CREATE PROCEDURE OcultarMensajesRecibidos_MensajeriaInternaUsuariosCashManHa (IN _idmensajeria INT)   UPDATE mensajeria SET ocultarmensaje="si" WHERE idmensajeria=_idmensajeria$$

DROP PROCEDURE IF EXISTS OcultarNotificacionesRecibidasUsuarios$$
CREATE PROCEDURE OcultarNotificacionesRecibidasUsuarios (IN _idnotificacion INT)   UPDATE notificaciones SET ocultarnotificacion="si" WHERE idnotificacion=_idnotificacion$$

DROP PROCEDURE IF EXISTS ReactivarUsuarios_Clientes$$
CREATE PROCEDURE ReactivarUsuarios_Clientes (IN _idusuarios INT)   UPDATE usuarios SET estado_usuario="activo" WHERE idusuarios=_idusuarios$$

DROP PROCEDURE IF EXISTS ReestablecerContrasenias$$
CREATE PROCEDURE ReestablecerContrasenias (IN _correo VARCHAR(255), IN _token VARCHAR(255), IN _codigo INT)   BEGIN
INSERT INTO recuperacion (correo,token,codigo) VALUES (_correo,_token,_codigo);
END$$

DROP PROCEDURE IF EXISTS RegistrarAccesosUsuarios$$
CREATE PROCEDURE RegistrarAccesosUsuarios (IN _dispositivo VARCHAR(255), IN _sistemaoperativo VARCHAR(255), IN _idusuarios INT)   INSERT INTO accesos (dispositivo,sistemaoperativo,idusuarios) VALUES (_dispositivo,_sistemaoperativo,_idusuarios)$$

DROP PROCEDURE IF EXISTS RegistrarCuotasMensualesHistoricoCreditosClientes$$
CREATE PROCEDURE RegistrarCuotasMensualesHistoricoCreditosClientes (IN _idcreditos INT, IN _idproducto INT, IN _idusuarios INT, IN _montocancelar DECIMAL(9,2), IN _nombreproducto VARCHAR(255), IN _montocapital DECIMAL(9,2), IN _fechavencimiento DATE)   INSERT INTO historicocuotascreditos (idcreditos,idproducto,idusuarios,montocancelar,nombreproducto,montocapital,fechavencimiento) VALUES (_idcreditos,_idproducto,_idusuarios,_montocancelar,_nombreproducto,_montocapital,_fechavencimiento)$$

DROP PROCEDURE IF EXISTS RegistrarCuotasMensualesNuevosCreditosClientes$$
CREATE PROCEDURE RegistrarCuotasMensualesNuevosCreditosClientes (IN _idcreditos INT, IN _idproducto INT, IN _idusuarios INT, IN _montocancelar DECIMAL(9,2), IN _nombreproducto VARCHAR(255), IN _montocapital DECIMAL(9,2), IN _fechavencimiento DATE)   INSERT INTO cuotas (idcreditos,idproducto,idusuarios,montocancelar,nombreproducto,montocapital,fechavencimiento) VALUES (_idcreditos,_idproducto,_idusuarios,_montocancelar,_nombreproducto,_montocapital,_fechavencimiento)$$

DROP PROCEDURE IF EXISTS RegistrarDetallesUsuarios_Clientes$$
CREATE PROCEDURE RegistrarDetallesUsuarios_Clientes (IN _dui VARCHAR(10), IN _nit VARCHAR(17), IN _telefono VARCHAR(9), IN _celular VARCHAR(9), IN _telefonotrabajo VARCHAR(9), IN _direccion VARCHAR(255), IN _empresa VARCHAR(255), IN _cargo VARCHAR(255), IN _direcciontrabajo VARCHAR(255), IN _fechanacimiento DATE, IN _genero CHAR(1), IN _estadocivil VARCHAR(30), IN _fotoduifrontal VARCHAR(255), IN _fotoduireverso VARCHAR(255), IN _fotonit VARCHAR(255), IN _fotofirma VARCHAR(255), IN _idusuarios INT)   INSERT INTO detalleusuarios (dui,nit,telefono,celular,telefonotrabajo,direccion,empresa,cargo,direcciontrabajo,fechanacimiento,genero,estadocivil,fotoduifrontal,fotoduireverso,fotonit,fotofirma,idusuarios) VALUES (_dui,_nit,_telefono,_celular,_telefonotrabajo,_direccion,_empresa,_cargo,_direcciontrabajo,_fechanacimiento,_genero,_estadocivil,_fotoduifrontal,_fotoduireverso,_fotonit,_fotofirma,_idusuarios)$$

DROP PROCEDURE IF EXISTS RegistrarNuevosClientesAdministradores$$
CREATE PROCEDURE RegistrarNuevosClientesAdministradores (IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _idrol INT, IN _quienregistro VARCHAR(255))   INSERT INTO usuarios (nombres,apellidos,codigousuario,contrasenia,correo,idrol,quienregistro) VALUES (_nombres,_apellidos,_codigousuario,_contrasenia,_correo,_idrol,_quienregistro)$$

DROP PROCEDURE IF EXISTS RegistrarNuevosProductosCashManHa$$
CREATE PROCEDURE RegistrarNuevosProductosCashManHa (IN _codigo VARCHAR(255), IN _nombreproducto VARCHAR(255), IN _descripcionproducto VARCHAR(255), IN _requisitosproductos VARCHAR(1000), IN _estado VARCHAR(15))   INSERT INTO productos (codigo,nombreproducto,descripcionproducto,requisitosproductos,estado) VALUES (_codigo,_nombreproducto,_descripcionproducto,_requisitosproductos,_estado)$$

DROP PROCEDURE IF EXISTS RegistrarSolicitudesCreditosClientesHistorico_Cancelados$$
CREATE PROCEDURE RegistrarSolicitudesCreditosClientesHistorico_Cancelados (IN _idusuarios INT, IN _idproducto INT, IN _idcreditos INT, IN _montocredito DECIMAL(9,2), IN _interescredito FLOAT, IN _plazocredito INT, IN _cuotamensual DECIMAL(9,2), IN _estado VARCHAR(30))   INSERT INTO historicocreditos (idusuarios,idproducto,idcreditos,montocredito,interescredito,plazocredito,cuotamensual,estado) VALUES (_idusuarios,_idproducto,_idcreditos,_montocredito,_interescredito,_plazocredito,_cuotamensual,_estado)$$

DROP PROCEDURE IF EXISTS RegistrarTransferenciasEnviadasClientes$$
CREATE PROCEDURE RegistrarTransferenciasEnviadasClientes (IN _numerocuenta INT, IN _monto DECIMAL(9,2), IN _referencia VARCHAR(255), IN _estado VARCHAR(50), IN _idusuarios INT, IN _idusuariodestino INT, IN _idproducto INT, IN _idcuentas INT, IN _idcuentadestino INT)   INSERT INTO transferencias (numerocuenta,monto,referencia,estado,idusuarios,idusuariodestino ,idproducto,idcuentas,idcuentadestino) VALUES (_numerocuenta,_monto,_referencia,_estado,_idusuarios,_idusuariodestino ,_idproducto,_idcuentas,_idcuentadestino)$$

DROP PROCEDURE IF EXISTS RegistroCodigoSeguridadTransferenciasCuentasClientes$$
CREATE PROCEDURE RegistroCodigoSeguridadTransferenciasCuentasClientes (IN _codigoseguridad INT, IN _idusuarios INT)   INSERT INTO codigostransferencias (codigoseguridad,idusuarios) VALUES(_codigoseguridad,_idusuarios)$$

DROP PROCEDURE IF EXISTS RegistroCopiaContratoClientesFinal$$
CREATE PROCEDURE RegistroCopiaContratoClientesFinal (IN _idcreditos INT, IN _copiacontratocliente VARCHAR(255))   UPDATE creditos SET copiacontratocliente=_copiacontratocliente, proceso_finalizado="si" WHERE idcreditos=_idcreditos$$

DROP PROCEDURE IF EXISTS RegistroDepositoCuentasAhorrosClientesCashManHa$$
CREATE PROCEDURE RegistroDepositoCuentasAhorrosClientesCashManHa (IN _idusuarios INT, IN _idproducto INT, IN _idcuentas INT, IN _referencia VARCHAR(255), IN _monto DECIMAL(9,2), IN _empleado_gestion VARCHAR(255), IN _tipotransaccion VARCHAR(50), IN _estadotransaccion VARCHAR(50), IN _saldonuevocuenta_transaccion DECIMAL(9,2))   INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES (_idusuarios,_idproducto,_idcuentas,_referencia,_monto,_empleado_gestion,_tipotransaccion,_estadotransaccion,_saldonuevocuenta_transaccion)$$

DROP PROCEDURE IF EXISTS RegistroInformacionVehiculosCreditosClientes$$
CREATE PROCEDURE RegistroInformacionVehiculosCreditosClientes (IN _idcreditos INT, IN _idproducto INT, IN _idusuarios INT, IN _placa VARCHAR(8), IN _clase VARCHAR(30), IN _anio INT, IN _capacidad VARCHAR(5), IN _asientos VARCHAR(5), IN _marca VARCHAR(255), IN _modelo VARCHAR(255), IN _numeromotor VARCHAR(17), IN _chasisgrabado VARCHAR(17), IN _chasisvin VARCHAR(17), IN _color VARCHAR(40))   INSERT INTO datosvehiculoscreditos (idcreditos,idproducto,idusuarios,placa,clase,anio,capacidad,asientos,marca,modelo,numeromotor,chasisgrabado,chasisvin,color) VALUES (_idcreditos,_idproducto,_idusuarios,_placa,_clase,_anio,_capacidad,_asientos,_marca,_modelo,_numeromotor,_chasisgrabado,_chasisvin,_color)$$

DROP PROCEDURE IF EXISTS RegistroNuevasCuentasAhorroClientesCashmanha$$
CREATE PROCEDURE RegistroNuevasCuentasAhorroClientesCashmanha (IN _numerocuenta INT, IN _montocuenta DECIMAL(9,2), IN _idproducto INT, IN _idusuarios INT)   INSERT INTO cuentas (numerocuenta,montocuenta,idproducto,idusuarios) VALUES (_numerocuenta,_montocuenta,_idproducto,_idusuarios)$$

DROP PROCEDURE IF EXISTS RegistroNuevasReferenciasPersonalesLaboralesClientes$$
CREATE PROCEDURE RegistroNuevasReferenciasPersonalesLaboralesClientes (IN _idcreditos INT, IN _idusuarios INT, IN _idproducto INT, IN _nombres_referencia1 VARCHAR(255), IN _apellidos_referencia1 VARCHAR(255), IN _empresa_referencia1 VARCHAR(255), IN _profesion_oficioreferencia1 VARCHAR(255), IN _telefono_referencia1 VARCHAR(9), IN _nombres_referencia2 VARCHAR(255), IN _apellidos_referencia2 VARCHAR(255), IN _empresa_referencia2 VARCHAR(255), IN _profesion_oficioreferencia2 VARCHAR(255), IN _telefono_referencia2 VARCHAR(9))   INSERT INTO referenciaspersonales (idcreditos,idusuarios,idproducto,nombres_referencia1,apellidos_referencia1,empresa_referencia1,profesion_oficioreferencia1,telefono_referencia1,nombres_referencia2,apellidos_referencia2,empresa_referencia2,profesion_oficioreferencia2,telefono_referencia2) VALUES (_idcreditos,_idusuarios,_idproducto,_nombres_referencia1,_apellidos_referencia1,_empresa_referencia1,_profesion_oficioreferencia1,_telefono_referencia1,_nombres_referencia2,_apellidos_referencia2,_empresa_referencia2,_profesion_oficioreferencia2,_telefono_referencia2)$$

DROP PROCEDURE IF EXISTS RegistroNuevosMensajesUsuarios_MensajeriaCashManHa$$
CREATE PROCEDURE RegistroNuevosMensajesUsuarios_MensajeriaCashManHa (IN _idusuarios INT, IN _nombremensaje VARCHAR(255), IN _asuntomensaje VARCHAR(255), IN _detallemensaje VARCHAR(5000), IN _idusuariosdestinatario INT)   INSERT INTO mensajeria (idusuarios,nombremensaje,asuntomensaje,detallemensaje,idusuariosdestinatario) VALUES (_idusuarios,_nombremensaje,_asuntomensaje,_detallemensaje,_idusuariosdestinatario)$$

DROP PROCEDURE IF EXISTS RegistroNuevosRolesDeUsuarios$$
CREATE PROCEDURE RegistroNuevosRolesDeUsuarios (IN _nombrerol VARCHAR(75), IN _descripcionrol VARCHAR(255))   INSERT INTO roles (nombrerol,descripcionrol) VALUES (_nombrerol,_descripcionrol)$$

DROP PROCEDURE IF EXISTS RegistroPagoCuotasCreditosClientes_OrdenPagosCashManHa$$
CREATE PROCEDURE RegistroPagoCuotasCreditosClientes_OrdenPagosCashManHa (IN _idusuarios INT, IN _idproducto INT, IN _idcreditos INT, IN _idcuotas INT, IN _referencia VARCHAR(255), IN _monto DECIMAL(9,2), IN _dias_incumplimiento INT, IN _empleado_gestion VARCHAR(255))   INSERT INTO transacciones (idusuarios,idproducto,idcreditos,idcuotas,referencia,monto,dias_incumplimiento,empleado_gestion) VALUES (_idusuarios,_idproducto,_idcreditos,_idcuotas,_referencia,_monto,_dias_incumplimiento,_empleado_gestion)$$

DROP PROCEDURE IF EXISTS RegistroReportesFallosPlataforma$$
CREATE PROCEDURE RegistroReportesFallosPlataforma (IN _idusuarios INT, IN _nombrereporte VARCHAR(255), IN _descripcionreporte VARCHAR(3000), IN _fotoreporte VARCHAR(255), IN _fecharegistroreporte DATETIME, IN _estado VARCHAR(50))   INSERT INTO reporteproblemasplataforma (idusuarios,nombrereporte,descripcionreporte,fotoreporte,fecharegistroreporte,estado) VALUES (_idusuarios,_nombrereporte,_descripcionreporte,_fotoreporte,_fecharegistroreporte,_estado)$$

DROP PROCEDURE IF EXISTS RegistroRetiroCuentasAhorrosClientesCashManHa$$
CREATE PROCEDURE RegistroRetiroCuentasAhorrosClientesCashManHa (IN _idusuarios INT, IN _idproducto INT, IN _idcuentas INT, IN _referencia VARCHAR(255), IN _monto DECIMAL(9,2), IN _empleado_gestion VARCHAR(255), IN _tipotransaccion VARCHAR(50), IN _estadotransaccion VARCHAR(50), IN _saldonuevocuenta_transaccion DECIMAL(9,2))   INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES (_idusuarios,_idproducto,_idcuentas,_referencia,_monto,_empleado_gestion,_tipotransaccion,_estadotransaccion,_saldonuevocuenta_transaccion)$$

DROP PROCEDURE IF EXISTS ReporteCompletoIniciosdeSesionesUsuarios$$
CREATE PROCEDURE ReporteCompletoIniciosdeSesionesUsuarios (IN _idusuarios INT)   SELECT * FROM vista_reporteiniciosdesesiones WHERE idusuarios=_idusuarios ORDER BY fechaacceso DESC$$

DROP PROCEDURE IF EXISTS SumatoriaIncumplimientoMora_CuotasClientes$$
CREATE PROCEDURE SumatoriaIncumplimientoMora_CuotasClientes ()   UPDATE cuotas SET montocancelar=montocancelar+5.99 WHERE incumplimiento_pago="SI"$$

DROP PROCEDURE IF EXISTS VerificarCodigoSeguridad$$
CREATE PROCEDURE VerificarCodigoSeguridad (IN _codigo INT, IN _correo VARCHAR(255), IN _token VARCHAR(255))   SELECT * FROM recuperacion WHERE codigo=_codigo AND correo=_correo AND token=_token AND estado="nousado" ORDER BY idrecuperaciones DESC LIMIT 1$$

DROP PROCEDURE IF EXISTS Verificar_ValidacionCodigoSeguridadTransferencias$$
CREATE PROCEDURE Verificar_ValidacionCodigoSeguridadTransferencias (IN _codigoseguridad INT, IN _idusuarios INT)   SELECT * FROM vista_codigosseguridadtransferenciasclientes WHERE codigoseguridad = _codigoseguridad AND idusuarios = _idusuarios AND estado="Valido"$$

DELIMITER ;
