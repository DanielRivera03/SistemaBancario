---
name: Corrección error trigger (disparador)
about: Actualización valores trigger RecalcularSaldoFinal_CreditosClientes
title: 'Motivo: no realizaba cálculo exacto de saldos finales créditos clientes.'
labels: bug
assignees: DanielRivera03

---

Se ha realizado una pequeña correción al trigger / disparador llamado (RecalcularSaldoFinal_CreditosClientes) y ubicar la variable _saldocredito. Originalmente aparece como DECLARE _saldocredito decimal(9,2); Por favor realizar el cambio únicamente a los valores y no al tipo de dato de la siguiente manera: DECLARE _saldocredito decimal(15,6);. Motivo: no realizaba el cálculo exacto de los saldos finales de las solicitudes crediticias al momento de procesar los pagos de las cuotas mensuales asignadas. A LOS USUARIOS QUE CLONARON O DESCARGARON ESTE REPOSITORIO ANTES DE ESTA EDICION, FAVOR REALIZAR EL CAMBIO. NUEVAS CLONACIONES Y DESCARGAS SE HA SOLVENTADO EXITOSAMENTE ESE ERROR.


DELIMITER $$
CREATE TRIGGER `RecalcularSaldoFinal_CreditosClientes` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocredito decimal(9,2);
   DECLARE _saldocredito decimal(15,6); -- REALIZAR CAMBIO ACA
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

Sintaxis como debe quedar:
