CREATE TABLE accesos (
  idacceso int(11) NOT NULL,
  fechaacceso timestamp NOT NULL DEFAULT current_timestamp(),
  dispositivo varchar(255) NOT NULL,
  sistemaoperativo varchar(255) NOT NULL,
  idusuarios int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE codigostransferencias (
  idcodigo int(11) NOT NULL,
  codigoseguridad int(11) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  estado varchar(50) NOT NULL DEFAULT 'Valido',
  idusuarios int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE creditos (
  idcreditos int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  tipocliente varchar(50) NOT NULL,
  montocredito decimal(9,2) NOT NULL,
  interescredito float NOT NULL,
  plazocredito int(11) NOT NULL,
  cuotamensual decimal(9,2) NOT NULL,
  fechasolicitud date NOT NULL,
  salariocliente decimal(9,2) NOT NULL,
  saldocredito decimal(15,6) DEFAULT NULL,
  estado varchar(30) NOT NULL DEFAULT 'en proceso',
  observaciones varchar(1500) DEFAULT NULL,
  observacion_gerencia varchar(1500) DEFAULT NULL,
  observacion_presidencia varchar(1500) DEFAULT NULL,
  usuario_empleado varchar(255) NOT NULL,
  progreso_solicitud tinyint(4) NOT NULL DEFAULT 10,
  progreso_pagocredito tinyint(4) NOT NULL DEFAULT 0,
  fecha_ultimarevision timestamp NULL DEFAULT NULL,
  usuario_gestionando varchar(255) DEFAULT NULL,
  cuotas_generadas char(2) NOT NULL DEFAULT 'no',
  copiacontratocliente varchar(255) DEFAULT NULL,
  estadocrediticio varchar(255) NOT NULL DEFAULT 'Nuevo Cliente',
  proceso_finalizado char(2) NOT NULL DEFAULT 'no',
  enviaralhistorico char(2) NOT NULL DEFAULT 'no',
  ocultartransacciones_clientes char(2) NOT NULL DEFAULT 'no',
  creditoactivo char(2) NOT NULL DEFAULT 'si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE cuentas (
  idcuentas int(11) NOT NULL,
  numerocuenta int(12) NOT NULL,
  montocuenta decimal(9,2) NOT NULL,
  fechaapertura timestamp NOT NULL DEFAULT current_timestamp(),
  idproducto int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  estadocuenta varchar(50) NOT NULL DEFAULT 'activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE cuotas (
  idcuotas int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  montocancelar decimal(9,2) NOT NULL,
  estadocuota varchar(30) NOT NULL DEFAULT 'pendiente',
  nombreproducto varchar(255) NOT NULL,
  montocapital decimal(9,2) NOT NULL,
  fechavencimiento date NOT NULL,
  incumplimiento_pago char(2) NOT NULL DEFAULT 'NO',
  disponiblehistorico char(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE datosvehiculoscreditos (
  iddatosvehiculos int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  placa varchar(8) NOT NULL,
  clase varchar(30) NOT NULL,
  anio int(11) NOT NULL,
  capacidad varchar(5) NOT NULL,
  asientos varchar(5) NOT NULL,
  marca varchar(255) NOT NULL,
  modelo varchar(255) NOT NULL,
  numeromotor varchar(17) NOT NULL,
  chasisgrabado varchar(17) NOT NULL,
  chasisvin varchar(17) NOT NULL,
  color varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE detalleusuarios (
  iddetalle int(11) NOT NULL,
  dui varchar(10) NOT NULL,
  nit varchar(17) NOT NULL,
  telefono varchar(9) DEFAULT NULL,
  celular varchar(9) DEFAULT NULL,
  telefonotrabajo varchar(9) DEFAULT NULL,
  direccion varchar(255) NOT NULL,
  empresa varchar(255) NOT NULL,
  cargo varchar(255) NOT NULL,
  direcciontrabajo varchar(255) NOT NULL,
  fechanacimiento date NOT NULL,
  genero char(1) NOT NULL,
  estadocivil varchar(30) NOT NULL,
  fotoduifrontal varchar(255) NOT NULL,
  fotoduireverso varchar(255) NOT NULL,
  fotonit varchar(255) NOT NULL,
  fotofirma varchar(255) NOT NULL,
  idusuarios int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE historicocreditos (
  idhistorico int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  montocredito decimal(9,2) NOT NULL,
  interescredito float NOT NULL,
  plazocredito int(11) NOT NULL,
  cuotamensual decimal(9,2) NOT NULL,
  estado varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE historicocuotascreditos (
  idhistorico int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  montocancelar decimal(9,2) NOT NULL,
  nombreproducto varchar(255) NOT NULL,
  montocapital decimal(9,2) NOT NULL,
  fechavencimiento date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE historicotransacciones (
  idhistoricotransaccion int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  idcuotas int(11) NOT NULL,
  referencia varchar(255) NOT NULL,
  monto decimal(9,2) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  dias_incumplimiento int(11) NOT NULL,
  empleado_gestion varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE mensajeria (
  idmensajeria int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  nombremensaje varchar(255) NOT NULL,
  asuntomensaje varchar(255) NOT NULL,
  detallemensaje varchar(5000) NOT NULL,
  fechamensaje timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  idusuariosdestinatario int(11) NOT NULL,
  ocultarmensaje char(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE notificaciones (
  idnotificacion int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  titulonotificacion varchar(255) NOT NULL,
  descripcionnotificacion varchar(255) NOT NULL,
  fechanotificacion timestamp NOT NULL DEFAULT current_timestamp(),
  clasificacionnotificacion varchar(100) NOT NULL,
  ocultarnotificacion char(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE productos (
  idproducto int(11) NOT NULL,
  codigo varchar(255) NOT NULL,
  nombreproducto varchar(255) NOT NULL,
  descripcionproducto varchar(255) NOT NULL,
  requisitosproductos varchar(1000) NOT NULL,
  estado varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE recuperacion (
  idrecuperaciones int(11) NOT NULL,
  correo varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  codigo int(11) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  estado varchar(15) NOT NULL DEFAULT 'nousado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE referenciaspersonales (
  idreferencias int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  nombres_referencia1 varchar(255) NOT NULL,
  apellidos_referencia1 varchar(255) NOT NULL,
  empresa_referencia1 varchar(255) NOT NULL,
  profesion_oficioreferencia1 varchar(255) NOT NULL,
  telefono_referencia1 varchar(9) NOT NULL,
  nombres_referencia2 varchar(255) NOT NULL,
  apellidos_referencia2 varchar(255) NOT NULL,
  empresa_referencia2 varchar(255) NOT NULL,
  profesion_oficioreferencia2 varchar(255) NOT NULL,
  telefono_referencia2 varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE reporteproblemasplataforma (
  idreporte int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  nombrereporte varchar(255) NOT NULL,
  descripcionreporte varchar(3000) NOT NULL,
  fotoreporte varchar(255) NOT NULL,
  fecharegistroreporte datetime NOT NULL,
  fechaactualizacionreporte timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  estado varchar(50) NOT NULL,
  comentarioactualizacion varchar(3000) DEFAULT NULL,
  empleado_gestion varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE roles (
  idrol int(11) NOT NULL,
  nombrerol varchar(75) NOT NULL,
  descripcionrol varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transacciones (
  idtransaccion int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idcreditos int(11) NOT NULL,
  idcuotas int(11) NOT NULL,
  referencia varchar(255) NOT NULL,
  monto decimal(9,2) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  dias_incumplimiento int(11) NOT NULL,
  empleado_gestion varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transaccionescuentasclientes (
  idtransaccioncuentas int(11) NOT NULL,
  idusuarios int(11) NOT NULL,
  idproducto int(11) NOT NULL,
  idcuentas int(11) NOT NULL,
  referencia varchar(255) NOT NULL,
  monto decimal(9,2) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  empleado_gestion varchar(255) NOT NULL,
  tipotransaccion varchar(50) NOT NULL,
  estadotransaccion varchar(50) NOT NULL,
  saldonuevocuenta_transaccion decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transferencias (
  idtransferencia int(11) NOT NULL,
  numerocuenta int(11) DEFAULT NULL,
  monto decimal(9,2) DEFAULT NULL,
  referencia varchar(255) DEFAULT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  estado varchar(15) DEFAULT 'NoProcesado',
  idusuarios int(11) DEFAULT NULL,
  idusuariodestino int(11) NOT NULL,
  idproducto int(11) DEFAULT NULL,
  idcuentas int(11) DEFAULT NULL,
  idcuentadestino int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE usuarios (
  idusuarios int(11) NOT NULL,
  nombres varchar(255) NOT NULL,
  apellidos varchar(255) NOT NULL,
  codigousuario varchar(255) NOT NULL,
  contrasenia varchar(255) NOT NULL,
  correo varchar(255) NOT NULL,
  fotoperfil varchar(255) DEFAULT 'foto_usuarios_nuevos.png',
  idrol int(11) NOT NULL,
  estado_usuario varchar(25) NOT NULL DEFAULT 'activo',
  completoperfil varchar(2) NOT NULL DEFAULT 'no',
  habilitarsistema char(2) NOT NULL DEFAULT 'no',
  nuevousuario char(2) NOT NULL DEFAULT 'si',
  poseecuenta char(2) NOT NULL DEFAULT 'no',
  poseecredito char(2) NOT NULL DEFAULT 'no',
  habilitarnuevoscreditos char(2) NOT NULL DEFAULT 'si',
  quienregistro varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
