DROP TRIGGER IF EXISTS EnviarSolicitudesCreditosDenegadas_HistoricoCreditos;
DELIMITER $$
CREATE TRIGGER EnviarSolicitudesCreditosDenegadas_HistoricoCreditos AFTER DELETE ON creditos FOR EACH ROW INSERT INTO historicocreditos (idusuarios,idproducto,idcreditos,montocredito,interescredito,plazocredito,cuotamensual,estado) VALUES (old.idusuarios,old.idproducto,old.idcreditos,old.montocredito,old.interescredito,old.plazocredito,old.cuotamensual,old.estado)
$$
DELIMITER ;

DROP TRIGGER IF EXISTS HabilitarSistemaCuentasClientes_PortalCashman;
DELIMITER $$
CREATE TRIGGER HabilitarSistemaCuentasClientes_PortalCashman AFTER INSERT ON cuentas FOR EACH ROW UPDATE usuarios SET poseecuenta="si" WHERE idusuarios=NEW.idusuarios
$$
DELIMITER ;

DROP TRIGGER IF EXISTS CambioEstadoComprobadorCuotasMensualesClientes;
DELIMITER $$
CREATE TRIGGER CambioEstadoComprobadorCuotasMensualesClientes AFTER INSERT ON cuotas FOR EACH ROW UPDATE creditos SET cuotas_generadas="si" WHERE idcreditos=NEW.idcreditos
$$
DELIMITER ;
DROP TRIGGER IF EXISTS HabilitarSistemaPortalClientes_Creditos;
DELIMITER $$
CREATE TRIGGER HabilitarSistemaPortalClientes_Creditos AFTER INSERT ON cuotas FOR EACH ROW UPDATE usuarios SET habilitarsistema="si" WHERE idusuarios=NEW.idusuarios
$$
DELIMITER ;

DROP TRIGGER IF EXISTS ComprobacionCompletarPerfilUsuarios;
DELIMITER $$
CREATE TRIGGER ComprobacionCompletarPerfilUsuarios AFTER INSERT ON detalleusuarios FOR EACH ROW UPDATE usuarios SET completoperfil="si" WHERE idusuarios=NEW.idusuarios
$$
DELIMITER ;

DROP TRIGGER IF EXISTS HabilitarNuevasSolicitudesCrediticias_Clientes;
DELIMITER $$
CREATE TRIGGER HabilitarNuevasSolicitudesCrediticias_Clientes AFTER INSERT ON historicocreditos FOR EACH ROW UPDATE usuarios SET habilitarnuevoscreditos="si" WHERE idusuarios=new.idusuarios
$$
DELIMITER ;

DROP TRIGGER IF EXISTS ComprobacionSolicitudCrediticiaCanceladaClientes_EnvioHistorico;
DELIMITER $$
CREATE TRIGGER ComprobacionSolicitudCrediticiaCanceladaClientes_EnvioHistorico AFTER INSERT ON historicocuotascreditos FOR EACH ROW UPDATE creditos SET enviaralhistorico="si" WHERE idcreditos =NEW.idcreditos
$$
DELIMITER ;
DROP TRIGGER IF EXISTS OcultarTransaccionesProcesadasPortalClientes_CreditosCancelados;
DELIMITER $$
CREATE TRIGGER OcultarTransaccionesProcesadasPortalClientes_CreditosCancelados AFTER INSERT ON historicocuotascreditos FOR EACH ROW UPDATE creditos SET ocultartransacciones_clientes="si" WHERE idcreditos=new.idcreditos
$$
DELIMITER ;

DROP TRIGGER IF EXISTS EnvioNotificacionNuevosMensajesUsuarios;
DELIMITER $$
CREATE TRIGGER EnvioNotificacionNuevosMensajesUsuarios AFTER INSERT ON mensajeria FOR EACH ROW INSERT INTO notificaciones (idusuarios,titulonotificacion,descripcionnotificacion,clasificacionnotificacion) VALUES (new.idusuariosdestinatario,"Nuevo Mensaje Recibido","Por favor revisa tu bandeja de entrada, has recibido un nuevo mensaje","nuevomensaje")
$$
DELIMITER ;

DROP TRIGGER IF EXISTS CambioEstadoCancelacionCreditosClientes_UltimaCuotaPagada;
DELIMITER $$
CREATE TRIGGER CambioEstadoCancelacionCreditosClientes_UltimaCuotaPagada AFTER INSERT ON transacciones FOR EACH ROW BEGIN
-- VARIABLE DE DATO SALDO CREDITO CLIENTES
   DECLARE _saldocredito decimal(15,6);
   -- OBTENER LAS CONSULTA DE LOS DATOS REQUERIDOS
   SET
    _saldocredito := (
      SELECT saldocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   -- SI EL SALDO ES IGUAL A CERO "0" ENTONCES CLIENTE HA TERMINADO DE PAGAR SU RESPONSABILIDAD CREDITICIA Y AUTOMATICAMENTE EL CREDITO TOMA EL ESTADO << CANCELADO >>
   IF _saldocredito<1 THEN
   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;
   END IF;
   IF _saldocredito<0 THEN
   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;
   END IF;
   IF _saldocredito = 0 THEN
   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;
   END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS CambioEstadoCrediticio_EstadoExcelenteCreditosClientes;
DELIMITER $$
CREATE TRIGGER CambioEstadoCrediticio_EstadoExcelenteCreditosClientes AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	-- VARIABLE GLOBAL PARA OBTENER CONSULTA
	DECLARE _cuotas_pagadas INT;
    DECLARE _estadocrediticio varchar(255);
 	SET
    	_cuotas_pagadas := (
      		SELECT cuotas_pagadas
      		FROM vista_contadorpagosatiempo_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    SET
    	_estadocrediticio := (
      		SELECT estadocrediticio
      		FROM vista_contadorpagosatiempo_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    -- SI CLIENTES NO PRESENTA MAYORES RETRASOS Y ES NUEVO CLIENTE, ESTADO SERA EXCELENTE
	IF _cuotas_pagadas>=10 THEN
    	IF _estadocrediticio="Nuevo Cliente" THEN
			UPDATE creditos SET estadocrediticio="Excelente" WHERE idcreditos = NEW.idcreditos;
       	END IF;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS CambioEstadoCuotasVencidas;
DELIMITER $$
CREATE TRIGGER CambioEstadoCuotasVencidas AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	DECLARE _incumplimiento_pago char(2);
    SET
    _incumplimiento_pago := (
      SELECT incumplimiento_pago
      FROM cuotas
      WHERE idcuotas = NEW.idcuotas
    );
    IF _incumplimiento_pago="SI" THEN
    	UPDATE cuotas SET incumplimiento_pago="PT" WHERE idcuotas=NEW.idcuotas; 
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS CambioEstadoCuotas_OrdenPagoCreditosClientes;
DELIMITER $$
CREATE TRIGGER CambioEstadoCuotas_OrdenPagoCreditosClientes AFTER INSERT ON transacciones FOR EACH ROW UPDATE cuotas SET estadocuota="cancelado" WHERE idcuotas=new.idcuotas
$$
DELIMITER ;
DROP TRIGGER IF EXISTS CambioEstadoRecordCrediticio_CreditocClientes;
DELIMITER $$
CREATE TRIGGER CambioEstadoRecordCrediticio_CreditocClientes AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	-- VARIABLE GLOBAL PARA OBTENER CONSULTA
	DECLARE _cuotas_pagadas_tarde INT;
 	SET
    	_cuotas_pagadas_tarde := (
      		SELECT cuotas_pagadas_tarde
      		FROM vista_contadorpagoscuotastardias_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    -- SI CLIENTE PRESENTA 2 RETRASOS, SERA REGULAR
	IF _cuotas_pagadas_tarde>=2 THEN
		UPDATE creditos SET estadocrediticio="Regular" WHERE idcreditos = NEW.idcreditos;
    -- SI CLIENTE PRESENTA MAS DE 5 RETRASOS, SERA DEFICIENTE
	IF _cuotas_pagadas_tarde>5 THEN
    	UPDATE creditos SET estadocrediticio="Deficiente" WHERE idcreditos = NEW.idcreditos;
	END IF;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS EnvioNotificacionPagoRecibidoClientesCashmanHa;
DELIMITER $$
CREATE TRIGGER EnvioNotificacionPagoRecibidoClientesCashmanHa AFTER INSERT ON transacciones FOR EACH ROW INSERT INTO notificaciones (idusuarios,titulonotificacion,descripcionnotificacion,clasificacionnotificacion) SELECT CONCAT(new.idusuarios),CONCAT("Pago Cuota Mensual Recibido"),CONCAT("Pago efectuado con éxito referencia ",new.referencia),CONCAT("pagorecibido")
$$
DELIMITER ;
DROP TRIGGER IF EXISTS RecalcularSaldoFinal_CreditosClientes;
DELIMITER $$
CREATE TRIGGER RecalcularSaldoFinal_CreditosClientes AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocredito decimal(9,2);
   DECLARE _saldocredito decimal(15,6);
   DECLARE _plazocredito INT;
   DECLARE _idproducto INT;
    -- CALCULAR EL CAPITAL AUTOMATICAMENTE
   DECLARE calculocapital decimal(15,6);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocredito := (
      SELECT montocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   SET
    _plazocredito := (
      SELECT plazocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
    SET
    _idproducto := (
      SELECT idproducto
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   SET
    _saldocredito := (
      SELECT saldocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   -- CALCULO CAPITAL PRESTAMOS HIPOTECARIOS -> CONVERSION A MESES
   IF _idproducto=3 THEN
   SET calculocapital=_montocredito/(_plazocredito*12);
   -- CALCULO DEMÁS PRODUCTOS
   ELSE 
   SET calculocapital=_montocredito/_plazocredito;
   END IF;
   -- ACTUALIZAR CAPITAL DE CLIENTE ESPECIFICO
   UPDATE creditos SET saldocredito=saldocredito-calculocapital WHERE idcreditos=new.idcreditos;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS RegistroTransaccionesCuotasCreditosClientes_Historico;
DELIMITER $$
CREATE TRIGGER RegistroTransaccionesCuotasCreditosClientes_Historico AFTER INSERT ON transacciones FOR EACH ROW INSERT INTO historicotransacciones (idusuarios,idproducto,idcreditos,idcuotas,referencia,monto,fecha,dias_incumplimiento,empleado_gestion) VALUES (NEW.idusuarios,NEW.idproducto,NEW.idcreditos,NEW.idcuotas,NEW.referencia,NEW.monto,NEW.fecha,NEW.dias_incumplimiento,NEW.empleado_gestion)
$$
DELIMITER ;

DROP TRIGGER IF EXISTS AnularTransaccionesCuentasClientes;
DELIMITER $$
CREATE TRIGGER AnularTransaccionesCuentasClientes AFTER UPDATE ON transaccionescuentasclientes FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _estadotransaccion varchar(50);
   DECLARE _monto decimal(9,2);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _estadotransaccion := (
      SELECT estadotransaccion
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    SET
    _monto := (
      SELECT monto
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
   -- CALCULO REINTEGRO TRANSACCION ANULADA A CUENTAS DE CLIENTES
   IF _estadotransaccion="AnularRetiro" THEN
   UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentas;
   END IF;
   IF _estadotransaccion="AnularDeposito" THEN
   UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
   END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS RecalcularSaldoFinal_CuentasAhorroClientes;
DELIMITER $$
CREATE TRIGGER RecalcularSaldoFinal_CuentasAhorroClientes AFTER INSERT ON transaccionescuentasclientes FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE _tipotransaccion varchar(50);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    SET
    _tipotransaccion := (
      SELECT tipotransaccion
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    -- VALIDAR SI EL CLIENTE REALIZA UN DEPOSITO O RETIRO A SU CUENTA
    IF (_tipotransaccion = "Entrada") THEN
    UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentas;
    END IF;
    IF (_tipotransaccion = "Salida") THEN
    UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
    END IF;
END
$$
DELIMITER ;

DROP TRIGGER IF EXISTS RecalcularSaldoFinal_TransferenciasClientes;
DELIMITER $$
CREATE TRIGGER RecalcularSaldoFinal_TransferenciasClientes AFTER INSERT ON transferencias FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE _tipotransaccion varchar(50);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transferencias
      WHERE idtransferencia   = NEW.idtransferencia  
    ); 
    -- RESTAR SALDO DE TRANSFERENCIA CUENTA DE ORIGEN CLIENTE
    UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
    -- SUMAR SALDO A FAVOR DE TRANSFERENCIA RECIBIDA CLIENTE
    UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentadestino;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS RegistroMovimientosTransferencias_EnvioTransferencias;
DELIMITER $$
CREATE TRIGGER RegistroMovimientosTransferencias_EnvioTransferencias AFTER INSERT ON transferencias FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE montocuenta decimal(9,2);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
    SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transferencias
      WHERE idtransferencia   = NEW.idtransferencia  
    ); 
    -- REGISTRAR MOVIMIENTO ENVIO DE TRANSFERENCIA CLIENTES
    INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES(new.idusuarios,new.idproducto,new.idcuentas,new.referencia,new.monto,"Clientes","EnvioTransferencia","Procesada",_monto);
    INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES(new.idusuariodestino,new.idproducto,new.idcuentas,new.referencia,new.monto,"Clientes","DepositoTransferencia","Procesada",_monto);
    
END
$$
DELIMITER ;
