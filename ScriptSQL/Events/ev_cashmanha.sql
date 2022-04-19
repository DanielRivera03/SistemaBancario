DELIMITER $$

DROP EVENT IF EXISTS CambioEstadosCodigoSeguridad$$
CREATE EVENT CambioEstadosCodigoSeguridad ON SCHEDULE EVERY 30 SECOND STARTS '2022-04-08 00:00:00' ON COMPLETION PRESERVE ENABLE DO CALL CambioEstadoCodigoSeguridad()$$

DROP EVENT IF EXISTS CambioEstadoCuotasClientes_IncumplimientoPagos$$
CREATE EVENT CambioEstadoCuotasClientes_IncumplimientoPagos ON SCHEDULE EVERY 100 SECOND STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculodiasfechavencimiento_cuotasclientes SET incumplimiento_pago="SI" WHERE dias_incumplimiento>0 AND estadocuota="pendiente"$$

DROP EVENT IF EXISTS SumatoriaMoraCuotasClientesVencidas$$
CREATE EVENT SumatoriaMoraCuotasClientesVencidas ON SCHEDULE EVERY 1 DAY STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cuotas SET montocancelar=montocancelar+5.99 WHERE incumplimiento_pago="SI"$$

DROP EVENT IF EXISTS CambioEstadoTicketsReportesPlataforma_Inactividad$$
CREATE EVENT CambioEstadoTicketsReportesPlataforma_Inactividad ON SCHEDULE EVERY 2 MINUTE STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculo_ultimaactividad_ticketsreportesplataforma SET estado="cerrado" WHERE estado="resuelto" OR estado="no resuelto" OR dias_ultima_actividad>3$$

DROP EVENT IF EXISTS ExpirarCodigoSeguridad_TransferenciasClientes$$
CREATE EVENT ExpirarCodigoSeguridad_TransferenciasClientes ON SCHEDULE EVERY 30 SECOND STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculaduracioncodigoseguridad_transferencias SET estado="Vencido" WHERE minutos_expiracion>2$$

DELIMITER ;
