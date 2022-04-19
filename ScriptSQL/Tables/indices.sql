ALTER TABLE accesos
  ADD PRIMARY KEY (idacceso),
  ADD KEY accesos_ibfk_1 (idusuarios);

ALTER TABLE codigostransferencias
  ADD PRIMARY KEY (idcodigo),
  ADD KEY codigostransferencias_ibfk_1 (idusuarios);

ALTER TABLE creditos
  ADD PRIMARY KEY (idcreditos),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idproducto (idproducto);

ALTER TABLE cuentas
  ADD PRIMARY KEY (idcuentas),
  ADD UNIQUE KEY numerocuenta (numerocuenta),
  ADD UNIQUE KEY idusuarios (idusuarios),
  ADD KEY idproducto (idproducto);

ALTER TABLE cuotas
  ADD PRIMARY KEY (idcuotas),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idproducto (idproducto),
  ADD KEY cuotas_ibfk_2 (idcreditos);

ALTER TABLE datosvehiculoscreditos
  ADD PRIMARY KEY (iddatosvehiculos),
  ADD KEY datosvehiculoscreditos_ibfk_1 (idcreditos),
  ADD KEY datosvehiculoscreditos_ibfk_2 (idproducto),
  ADD KEY datosvehiculoscreditos_ibfk_3 (idusuarios);

ALTER TABLE detalleusuarios
  ADD PRIMARY KEY (iddetalle),
  ADD UNIQUE KEY dui (dui,nit),
  ADD KEY detalleusuarios_ibfk_1 (idusuarios);

ALTER TABLE historicocreditos
  ADD PRIMARY KEY (idhistorico),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idproducto (idproducto),
  ADD KEY idcreditos (idcreditos);

ALTER TABLE historicocuotascreditos
  ADD PRIMARY KEY (idhistorico),
  ADD KEY historicocuotascreditos_ibfk_2 (idproducto),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idcreditos (idcreditos);

ALTER TABLE historicotransacciones
  ADD PRIMARY KEY (idhistoricotransaccion),
  ADD KEY idproducto (idproducto);

ALTER TABLE mensajeria
  ADD PRIMARY KEY (idmensajeria),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idusuariosdestinatario (idusuariosdestinatario);

ALTER TABLE notificaciones
  ADD PRIMARY KEY (idnotificacion),
  ADD KEY idusuarios (idusuarios);

ALTER TABLE productos
  ADD PRIMARY KEY (idproducto);

ALTER TABLE recuperacion
  ADD PRIMARY KEY (idrecuperaciones);

ALTER TABLE referenciaspersonales
  ADD PRIMARY KEY (idreferencias),
  ADD KEY referenciaspersonales_ibfk_1 (idcreditos),
  ADD KEY referenciaspersonales_ibfk_2 (idproducto),
  ADD KEY referenciaspersonales_ibfk_3 (idusuarios);

ALTER TABLE reporteproblemasplataforma
  ADD PRIMARY KEY (idreporte),
  ADD KEY idusuarios (idusuarios);

ALTER TABLE roles
  ADD PRIMARY KEY (idrol),
  ADD UNIQUE KEY nombrerol (nombrerol);

ALTER TABLE transacciones
  ADD PRIMARY KEY (idtransaccion),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idcreditos (idcreditos),
  ADD KEY idproducto (idproducto),
  ADD KEY idcuotas (idcuotas);

ALTER TABLE transaccionescuentasclientes
  ADD PRIMARY KEY (idtransaccioncuentas),
  ADD KEY idusuarios (idusuarios),
  ADD KEY idproducto (idproducto),
  ADD KEY transaccionescuentasclientes_ibfk_3 (idcuentas);

ALTER TABLE transferencias
  ADD PRIMARY KEY (idtransferencia),
  ADD KEY transferencias_ibfk_1 (idusuarios),
  ADD KEY transferencias_ibfk_2 (idproducto),
  ADD KEY transferencias_ibfk_3 (idcuentas),
  ADD KEY transferencias_ibfk_4 (idusuariodestino),
  ADD KEY transferencias_ibfk_5 (idcuentadestino);

ALTER TABLE usuarios
  ADD PRIMARY KEY (idusuarios),
  ADD UNIQUE KEY codigousuario (codigousuario),
  ADD UNIQUE KEY correo (correo),
  ADD KEY usuarios_ibfk_1 (idrol);

ALTER TABLE accesos
  MODIFY idacceso int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

ALTER TABLE codigostransferencias
  MODIFY idcodigo int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE creditos
  MODIFY idcreditos int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE cuentas
  MODIFY idcuentas int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE cuotas
  MODIFY idcuotas int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

ALTER TABLE datosvehiculoscreditos
  MODIFY iddatosvehiculos int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE detalleusuarios
  MODIFY iddetalle int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE historicocreditos
  MODIFY idhistorico int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE historicocuotascreditos
  MODIFY idhistorico int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE historicotransacciones
  MODIFY idhistoricotransaccion int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE mensajeria
  MODIFY idmensajeria int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE notificaciones
  MODIFY idnotificacion int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE productos
  MODIFY idproducto int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE recuperacion
  MODIFY idrecuperaciones int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE referenciaspersonales
  MODIFY idreferencias int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE reporteproblemasplataforma
  MODIFY idreporte int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE roles
  MODIFY idrol int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE transacciones
  MODIFY idtransaccion int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE transaccionescuentasclientes
  MODIFY idtransaccioncuentas int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE transferencias
  MODIFY idtransferencia int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE usuarios
  MODIFY idusuarios int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
  
ALTER TABLE accesos
  ADD CONSTRAINT accesos_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE codigostransferencias
  ADD CONSTRAINT codigostransferencias_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE creditos
  ADD CONSTRAINT creditos_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE,
  ADD CONSTRAINT creditos_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE CASCADE;

ALTER TABLE cuentas
  ADD CONSTRAINT cuentas_ibfk_1 FOREIGN KEY (idproducto) REFERENCES productos (idproducto),
  ADD CONSTRAINT cuentas_ibfk_2 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios);

ALTER TABLE cuotas
  ADD CONSTRAINT cuotas_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE NO ACTION,
  ADD CONSTRAINT cuotas_ibfk_2 FOREIGN KEY (idcreditos) REFERENCES creditos (idcreditos) ON DELETE CASCADE,
  ADD CONSTRAINT cuotas_ibfk_3 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE NO ACTION;

ALTER TABLE datosvehiculoscreditos
  ADD CONSTRAINT datosvehiculoscreditos_ibfk_1 FOREIGN KEY (idcreditos) REFERENCES creditos (idcreditos) ON DELETE CASCADE,
  ADD CONSTRAINT datosvehiculoscreditos_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE CASCADE,
  ADD CONSTRAINT datosvehiculoscreditos_ibfk_3 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE detalleusuarios
  ADD CONSTRAINT detalleusuarios_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE historicocreditos
  ADD CONSTRAINT historicocreditos_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto);

ALTER TABLE historicocuotascreditos
  ADD CONSTRAINT historicocuotascreditos_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto);

ALTER TABLE historicotransacciones
  ADD CONSTRAINT historicotransacciones_ibfk_1 FOREIGN KEY (idproducto) REFERENCES productos (idproducto);

ALTER TABLE mensajeria
  ADD CONSTRAINT mensajeria_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE,
  ADD CONSTRAINT mensajeria_ibfk_2 FOREIGN KEY (idusuariosdestinatario) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE notificaciones
  ADD CONSTRAINT notificaciones_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE referenciaspersonales
  ADD CONSTRAINT referenciaspersonales_ibfk_1 FOREIGN KEY (idcreditos) REFERENCES creditos (idcreditos) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT referenciaspersonales_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT referenciaspersonales_ibfk_3 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE reporteproblemasplataforma
  ADD CONSTRAINT reporteproblemasplataforma_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE;

ALTER TABLE transacciones
  ADD CONSTRAINT transacciones_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE,
  ADD CONSTRAINT transacciones_ibfk_2 FOREIGN KEY (idcreditos) REFERENCES creditos (idcreditos) ON DELETE CASCADE,
  ADD CONSTRAINT transacciones_ibfk_3 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE CASCADE,
  ADD CONSTRAINT transacciones_ibfk_4 FOREIGN KEY (idcuotas) REFERENCES cuotas (idcuotas) ON DELETE CASCADE;

ALTER TABLE transaccionescuentasclientes
  ADD CONSTRAINT transaccionescuentasclientes_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE,
  ADD CONSTRAINT transaccionescuentasclientes_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE CASCADE,
  ADD CONSTRAINT transaccionescuentasclientes_ibfk_3 FOREIGN KEY (idcuentas) REFERENCES cuentas (idcuentas) ON DELETE CASCADE;

ALTER TABLE transferencias
  ADD CONSTRAINT transferencias_ibfk_1 FOREIGN KEY (idusuarios) REFERENCES usuarios (idusuarios) ON DELETE CASCADE,
  ADD CONSTRAINT transferencias_ibfk_2 FOREIGN KEY (idproducto) REFERENCES productos (idproducto) ON DELETE CASCADE,
  ADD CONSTRAINT transferencias_ibfk_3 FOREIGN KEY (idcuentas) REFERENCES cuentas (idcuentas) ON DELETE CASCADE,
  ADD CONSTRAINT transferencias_ibfk_4 FOREIGN KEY (idusuariodestino) REFERENCES usuarios (idusuarios) ON DELETE CASCADE,
  ADD CONSTRAINT transferencias_ibfk_5 FOREIGN KEY (idcuentadestino) REFERENCES cuentas (idcuentas) ON DELETE CASCADE;

ALTER TABLE usuarios
  ADD CONSTRAINT usuarios_ibfk_1 FOREIGN KEY (idrol) REFERENCES roles (idrol);
