# CashMan H.A - Sistema Bancario Financiero / Banca en Línea





![Portada](https://user-images.githubusercontent.com/44457989/162852787-9390b870-1901-439e-a365-1dd09a167e69.png)





<h2>Configuración Inicial</h2>
<p>Estimado(a) usuario(a), es un placer y honor compartir este nuevo proyecto, agradezco mucho la visita a este repositorio. Antes de iniciar, usted debe realizar algunas configuraciones iniciales para el buen funcionamiento de este proyecto en su servidor. A continuación se detallará los cambios que usted debe realizar en el código fuente de la aplicación.</p>

<p><b>1) Configuración variable global de aplicación:</b> Este proyecto ha sido trabajado bajo el prefijo del puerto número 90. (http://localhost:90/) Por lo cual si usted tiene configurado el mismo con otro puerto, o en su defecto mantiene el estándar original, debe realizar ese cambio; caso contrario los estilos y redirecciones de la aplicación no funcionarán y será imposible el óptimo funcionamiento del mismo. Para realizar el cambio, por favor ubique los siguientes archivos: (CashManHa/controlador/cIniciosSesionesUsuarios.php y CashManHa/controlador/cGestionesCashman.php) dónde usted podrá ubicar la variable $UrlGlobal; y realizar el cambio pertinente.</p>


![Configuracion URL Servidor](https://user-images.githubusercontent.com/44457989/162665594-8b420d9f-7c61-44d9-9c3d-8c3c75eb48e0.png)



<p><b>2) Configuración ajustes SMTP PHPMAILER:</b> Este proyecto cuenta con el envío de correos electrónicos automáticos, que su función principal son el envío de código de validación / seguridad para recuperación de contraseñas olvidadas, aviso de confirmación actualización credenciales de acceso contraseñas olvidadas y envío de código de seguridad para realizar transferencias de dinero a otras cuentas de ahorro (clientes). Por lo cual para realizar el cambio, por favor ubique los siguientes archivos (CashManHa/controlador/cIniciosSesionesUsuarios.php y CashManHa/controlador/cGestionesCashman.php) y realice los cambios pertinentes de configuración SMTP PHPMAILER. Para información más detallada, por favor consulte la documentación oficial de PHPMAILER. Usted es libre de utilizar su SMTP ya sea de prueba como Papercut o Mailtrap por mencionar algunos ejemplos; o bien un hosting de pago con un correo institucional real.</p>


![ConfiguracionSMTP](https://user-images.githubusercontent.com/44457989/162666915-69127bf8-4679-4066-bd88-70b2b808b11a.png)



<p><b>3) Configuración importación estilos CSS:</b> Lo mencionado en el primer punto, algunos estilos css son importados mediante una regla especial css. Motivo por el cual usted debe cambiar la URL asignada por defecto a la de su servidor (entiéndase por defecto http://localhost:90/) Por favor ubique el archivo en CashManHa/vista/css/style.css y realice los cambios pertinentes.</p>


![ConfiguracionCSS (2)](https://user-images.githubusercontent.com/44457989/162667364-7507fd10-f058-49b0-a259-27a12203bc94.png)


<p><b>4) Enlace descarga carpeta imágenes:</b> Si por alguna razón tiene problemas en visualizar todas las imágenes de este proyecto, por favor sustituya la carpeta de imagenes por este archivo. Alojado en Google Drive = Enlace: https://drive.google.com/file/d/1BUKOcMmnws7Am91ilkKR6j9IoDXlmzkd/view?usp=sharing (CashManHa/vista/pegaraquí)</p>

<p><b>5) Base de datos:</b> Si por alguna razón al momento de importar la base de datos a su servidor existen errores o alertas de advertencia, quiere decir que parcialmente se ha importado la base de datos y no en su totalidad. Se ha incluido cada uno de los query sql para que usted proceda manualmente a ejecutarlos en su SGBD. (Más detalles de los elementos en total más abajo).</p>



<h2>Importante - Nuevos ajustes trigger base de datos</h2>


<p>Se ha realizado una pequeña correción al trigger / disparador llamado (RecalcularSaldoFinal_CreditosClientes) y ubicar la variable _saldocredito. Originalmente aparece como DECLARE _saldocredito decimal(9,2); <b>Por favor realizar el cambio únicamente a los valores y no al tipo de dato de la siguiente manera: DECLARE _saldocredito decimal(15,6);</b>. Motivo: no realizaba el cálculo exacto de los saldos finales de las solicitudes crediticias al momento de procesar los pagos de las cuotas mensuales asignadas. A LOS USUARIOS QUE CLONARON O DESCARGARON ESTE REPOSITORIO ANTES DE ESTA EDICION, FAVOR REALIZAR EL CAMBIO. NUEVAS CLONACIONES Y DESCARGAS SE HA SOLVENTADO EXITOSAMENTE ESE ERROR.</p>



<h2>Recomendación:</h2>


<p>Se recomienda encarecidamente el uso del SGBD Mysql Workbench, de esta manera la importación de todos los datos que este sistema necesita se realiza de mejor manera que usando phpMyAdmin. Para ello debe seguir los siguientes pasos:
<ul>
  <li>Primero cree el esquema de la base de datos. Se recomienda el nombre <b>cashmanha</b>. Ya que ese es el nombre de conexión el cuál se refleja en la aplicación. Usted es libre de elegir el nombre de esquema que desee crear. Cualquier cambio se deben realizar los respectivos ajustes en el archivo de conexión de la aplicación.</li>
  <li>En este punto puede importar el respectivo archivo sql que contiene todo lo que la aplicación necesita. Sí por alguna razón no utiliza el SGBD mencionado, puede realizarlo manualmente, en este caso primero ejecute archivo sql que contiene todas las tablas del sistema.</li>
  <li>Inserte todos los registros (datos) de las tablas del sistema.</li>
  <li>Agregué los índices respectivos de relaciones de las tablas del sistema.</li>
  <li>Ejecute todas las instrucciones sql de las respectivas vistas de las tablas del sistema.</li>
  <li>Ejecute todas las instrucciones sql de las respectivos procedimientos almacenados de las tablas del sistema.</li>
  <li>Ejecute todas las instrucciones sql de las respectivos disparadores de las tablas del sistema.</li>
  <li>Ejecute todas las instrucciones sql de las respectivos eventos de las tablas del sistema.</li>
  </ul>
  Y de este modo, usted ha importado con éxito toda la información e instrucciones que la base de datos necesita para comunicarse óptimamente con la aplicación. Sí registra fallos, ejecute las instrucciones una por una para así descartar cualquier fallo (punto de pocas probabilidades sí ha seguido los pasos como deben ser). Por favor verifique que la cantidad de elementos coindicen con lo detallado más abajo.

</p>



<h2>Información General</h2>


<p>Siguiendo todos los pasos anteriores, enhorabuena ʕ•́ᴥ•̀ʔっ usted ya tiene todo listo para ejecutar este proyecto en su servidor. A continuación se detallarán aspectos técnicos de esta aplicación.</p>


<img src="https://user-images.githubusercontent.com/44457989/162668859-a5678266-bda2-4996-8308-6a890276af2a.png" width="500">


<p><b>¿Qué es CashMan H.A?</b> Es una aplicación financiera / bancaria que simula un entorno real de algunas tradicionales bancas en línea de los corporativos financieros reconocidos. Usted puede adquirir préstamos (que son divididos en tres / Personales / Vehículos / Hipotecarios). Además de obtener una cuenta de ahorro personal y poder realizar transferencias de dinero a otras cuentas registradas. Puede conocer el status de su solicitud crediticia antes de ser aprobada y cuando este ha sido marcado así, además de posibilidad de reestructurar créditos o simplemente denegarlos. Puede consultar su estado de cuenta respecto a su solicitud crediticia y ver los comprobantes de cada operación efectuada dentro de la aplicación (aplica para créditos activos, históricos y cuentas de ahorro). Es un sistema muy completo que se encuentra dividido en cinco roles de usuarios</p>




![ezgif-1-afbd8fd598](https://user-images.githubusercontent.com/44457989/206926940-4f334e61-4ee1-4315-9ede-8d0edef82cdf.gif)



<p>Este sistema a nivel de código y base de datos se encuentra distribuido de la siguiente manera:<ul><li>Base de Datos:</li><ul><li>21 Tablas.</li><li>148 Procedimientos Almacenados.</li><li>67 Vistas.</li><li>21 Disparadores.</li><li>5 Eventos.</li></ul></ul><ul><li>Sistema:</li><ul><li>Lenguaje de Programación PHP.</li><li>Versión 8.XX</li><li>Patrón MVC (Modelo, Vista, Controlador).</li><li>Gestiones AJAX, JQuery.</li><li>Complementos JQuery, Javascript</li><li>Plantilla Bootstrap.</li><li>División de cinco roles de usuarios, los cuales son (administradores, presidencia, gerencia, atención al cliente y clientes).</li></ul></ul></p>
<p><b>Es importante mencionar que dentro del código del sistema no existen llamadas directas en código SQL, sino únicamente los llamados a los procedimientos almacenados declarados en la base de datos, con su pase de parámetros respectivos.</b></p>


<h2>¿Qué se puede hacer dentro de esta aplicación bancaria / financiera?</h2>
<p><ul>
  <li>Registar nuevos usuarios (dónde pueden ser usuarios administrativos o clientes).</li>
  <li>Generación de informe PDF con las credenciales de acceso para todos los nuevos usuarios (punto de estricto cumplimiento para absolutamente todos los nuevos usuarios).</li>
  <li>Registar nuevos productos (tomar en cuenta que nuevos productos requieren de adecuaciones significativas dentro de la aplicación).</li>
  <li>Registar nuevos roles de usuario (tomar en cuenta que roles de usuario requieren de adecuaciones significativas dentro de la aplicación).</li>
  <li>Registar nuevas solicitudes crediticias (con sus mantenimientos tales como aprobarlas, denegarlas o reestructurarlas)</li>
  <li>Registar cuotas mensuales de X a Y fecha, según el requerimiento solicitado por clientes.</li>
  <li>Registar pagos de cuotas mensuales de solicitudes crediticias aprobadas.</li>
  <li>Generación de informe PDF con los detalles de todos los movimientos efectuados en la aplicación (aplicable para créditos y cuentas de ahorro).</li>
  <li>Registar nuevos productos (tomar en cuenta que nuevos productos requieren de adecuaciones significativas dentro de la aplicación).</li>
  <li>Registar nuevas cuentas de ahorro personales.</li>
  <li>Realizar retiros, depósitos y anular transacciones efectuadas en las cuentas de ahorro personales.</li>
  <li>Cálculo automático de saldos (aplicable para créditos y cuentas de ahorro).</li>
  <li>Cálculo automático de cuotas que han caído en impago (moras) <b>El estándar definido que por cada día de atraso, será cargada a la cuota en impago un total de $5.99 por cada día de incumplimiento.</b>.</li>
  <li>Consulta de cuotas no pagadas (clientes morosos) y consulta detallada de perfil de cliente moroso.</li>
  <li>Consulta general de todos los movimientos efectuados en la aplicación, con sus respectivos comprobantes de pago.</li>
  <li>Registrar tickets de soporte y notificación de problemas dentro de la aplicación.</li>
  <li>Envío de mensajes a otros usuarios dentro de la aplicación.</li>
  <li>Registro automático de notificaciones de movimientos de interés efectuados dentro de la plataforma.</li>
  <li>Envío de dinero por medio de transferencia a otras cuentas personales registradas en la aplicación.</li>
  <li>Consulta de mi perfil personal, con mantenimientos de interés y consulta de datos de interés tales como información personal e información de sesión activa y sesiones anteriores.</li>
  <li>Consulta de estado de cuenta y la posibilidad de generar una versión impresa.</li>
  <li>Todos los nuevos usuarios, es de estricto cumplimiento que deben cambiar sus credenciales de acceso. Además de la posibilidad de cambiar su usuario único por una sola vez (según roles de usuario).</li>
  <li><strong>Requisitos créditos:

 <br>Préstamos Personales:
<br>▪ Disponible para asalariados, independientes y jubilados
<br>▪ Tasas de interés mensual desde el 3% hasta el 20% mensual 
sobre el crédito
<br>▪ Monto máximo a financiar hasta $10,000.00 USD para 
asalariados y jubilados, y $15,000.00 para independientes
<br>▪ Plazo máximo de financiamiento de hasta 120 meses

<br>Préstamos Hipotecarios:
<br>▪ Disponible para asalariados e independientes
<br>▪ Tasas de interés mensual desde 1.05% hasta 12% mensual 
sobre el crédito
<br>▪ Monto mínimo de financiamiento desde $30,000.00 USD hasta 
un máximo de $3,000000.00
<br>▪ Plazo máximo de financiamiento hasta 20 años

<br>Préstamos de Vehículos:
<br>▪ Disponible para asalariados e independientes
<br>▪ Tasas de interés mensual desde 10% hasta 60% mensual 
sobre el crédito
<br>▪ Monto máximo de financiamiento de $100,000.00 USD para 
asalariados y $200,000.00 USD para independientes
<br>▪ Plazo máximo de financiamiento hasta 90 meses


<br> Todos los créditos se someten a un estudio, que, en base al salario 
devengado por el cliente interesado, tendrá que ser aprobado por 
presidencia y gerencia, antes de ser aprobado finalmente, y registrar su crédito en el sistema, con sus cuotas a cumplir, dar de alta a ese 
cliente en el sistema y entregar el estado de cuenta y copia de contrato 
celebrado con el que el debe de cumplir a cabalidad.


</strong>
</ul>Son algunas de las funciones más principales e importantes que tú puedes realizar dentro de esta plataforma. Tome nota que son acciones descritas de manera general, por cada rol de usuario existen limitaciones según a lo descrito anteriormente</p>


<h2>Fórmulas Matemáticas</h2>

<h4>* Préstamos Personales</h4>

![carbon (6)](https://user-images.githubusercontent.com/44457989/211438399-fb9d9c56-9883-40b8-8c21-e55272e7f446.png)


<h4>* Seguro de deuda y gastos administrativos según rango de crédito solicitado</h4>


![carbon (1)](https://user-images.githubusercontent.com/44457989/211431285-c93bff73-52cd-47fa-b17f-d85c8b45faf1.png)


<h4>* Préstamos Hipotecarios: Financiamiento máximo hasta un 90% sobre el valor del inmueble</h4>

![carbon (2)](https://user-images.githubusercontent.com/44457989/211434769-5c7b9b50-ec2b-452f-ae5b-0628cbd5e0bb.png)


<h4>* Seguro de deuda y gastos administrativos según rango de crédito solicitado</h4>



![carbon (3)](https://user-images.githubusercontent.com/44457989/211435024-90e18b01-ac14-476c-b18e-2cabe1d7fcbb.png)


<h4>* Préstamos de Vehículos:</h4>


![carbon (4)](https://user-images.githubusercontent.com/44457989/211437019-a691a440-4f19-4a95-b18f-65397900bc4c.png)


<h4>* Seguro de deuda, gastos administrativos y servicio de GPS según rango de crédito solicitado</h4>


![carbon (5)](https://user-images.githubusercontent.com/44457989/211437663-6b1303fe-b3ca-4798-9070-9282dabc4976.png)



<h5>* Seguro de deuda: Monto añadido a la cuota de los clientes, protección desempleo.</h5>
<h5>* Gastos administrativos: Monto que se descuenta al préstamo solicitado por los clientes.</h5>
<h5>* Servicio GPS: Monto añadido a la cuota de los clientes exclusivamente en créditos de vehículos.</h5>
<h5>* Total Desembolso: Monto final que recibirá el cliente, en concepto del crédito solicitado.</h5>

<!--
<h2>¿Deseas probar la demo en vivo?</h2>


<p>Se ha habilitado un espacio dentro de un hosting gratuito para efectuar pruebas de este sistema, por favor tome en cuenta que la velocidad de respuesta así como su ancho de banda y cantidad de usuarios se ve limitada al ser un hosting gratuito. Puede acceder a la demo en el siguiente enlace: https://cashmanha.helioho.st/ A continación se detallan los datos de acceso para ingresar (puede hacerlo por medio de su usuario único o correo electrónico)<br><br>
<strong>Actualización: Se ha realizado la migración de la base de datos, hacia otro proveedor. Por lo cual se ha realizado una limpieza de la misma y restaurados los datos por defecto que se encuentran en los respectivos backup de este repositorio. Ahora los procesos tardan menos tiempo respecto al proveedor anterior.</strong>
<br><br>
<strong>Actualización Hosting: Se ha realizado la migración hacia otro proveedor de hosting, por lo cuál ahora la velocidad de transferencia de datos, carga y tráfico ha mejorado notablemente. Además de contar con un certificaco SSL y encriptación de todos los datos que se procesen dentro de la aplicación</strong>
<br>
<ul>
  <li>Administrador: usuario = francisco.salcedo | correo: franciscosalcedo@correo1.com| clave: 123456789</li>
  <li>Presidencia: usuario = julio.cesar | correo: julio@correo2.com  | clave: 123456789</li>
  <li>Gerencia: usuario = 	victor.jurado | correo: victor@correo3.com | clave: 123456789</li>
  <li>Atención al Cliente: usuario = 	alicia.fernandez | correo: alicia@correo4.com | clave: 123456789</li>
  <li>Clientes: usuario = 	leonel.franco | correo: leonel@correo6.com | clave: 123456789</li>
  <li>Clientes: usuario = 	natalia.jazmin| correo: nathy@correo5.com | clave: 123456789</li>
  <li>Para la recepción de correos automáticos, debe establecer su correo real; de lo contrario lamentamos informarle que no podrá visualizar el contenido deseado.</li>
</ul>Accesos validados dentro de la plataforma, por favor tome nota de cada uno de los roles de usuario asignados.</p>
-->

<h2>Modelo Entidad Relación (m-ER) Base de Datos</h2>


![DiagramaER_CashmanHa](https://user-images.githubusercontent.com/44457989/188288230-ecff7211-7b97-49b8-bdec-5dbe8afc6246.png)



<h2>Adicional</h2>


<p>Por favor realiza los ajustes antes mencionados, de igual forma cambia las URL que hacen los llamados a los correos electrónicos automáticos, sustituyendo el http://localhost:90/ por la URL de tu servidor de prueba o real. Además se ha optado a bien el revelar la API KEY que básicamente es informar sobre el estado del tiempo climático actual en la ciudad de San Salvador, El Salvador. Motivo que únicamente funciona como consulta de datos. NUNCA REVELAR API KEY QUE INTEGREN OTROS SERVICIOS.</p>



<h2>Algunas Capturas</h2>

<h4>* Login / inicio de sesión general</h4>


![1](https://user-images.githubusercontent.com/44457989/162672950-ddbd50d4-7412-4f7a-9c3f-7b8947634812.png)



<h4>* Registro Nuevos Usuarios</h4>


![RegistroUsuarios](https://user-images.githubusercontent.com/44457989/172267726-3f71e22c-dd20-43db-b056-a77b6c91a37d.jpeg)




<h4>* Consulta usuarios y asignación nuevas solicitudes crediticias</h4>


![NuevosCreditos](https://user-images.githubusercontent.com/44457989/172268097-ba3b3182-44b0-485d-94e1-4a4b1f8dda7e.jpeg)




![InformacionNuevosCreditos](https://user-images.githubusercontent.com/44457989/172268378-da38e308-1550-48dc-92e2-e1cca4da263e.jpeg)




![InformacionProductosCreditos](https://user-images.githubusercontent.com/44457989/172268549-4f6b2b02-c07e-4e9b-8cfb-d410aa91cbc5.jpeg)





![NuevoCreditoAsignacion](https://user-images.githubusercontent.com/44457989/172268762-372f181d-e4ed-4586-bdca-5130b1edf034.jpeg)





![ReferenciasPersonales](https://user-images.githubusercontent.com/44457989/172269059-48d0156d-fe5b-4644-8259-f9ce7b3dbf5b.jpeg)









<h4>* Consulta créditos aprobados</h4>


![CreditosAprobados](https://user-images.githubusercontent.com/44457989/172267908-d6438aa8-8f5f-4eff-ab96-6414af03e500.jpeg)




<h4>* Sistema de pagos CashMan H.A</h4>

![SistemaPagos](https://user-images.githubusercontent.com/44457989/172269258-a9b3472d-aea5-4502-b043-9cc133f34fb1.jpeg)



![OrdenPagos](https://user-images.githubusercontent.com/44457989/172269554-0f600f39-b3b5-4682-b250-4c3c07f911f5.jpeg)





<h4>* Transferencias Dinero Otras Cuentas</h4>


![TransferenciasCuentasDatos](https://user-images.githubusercontent.com/44457989/172269961-448ccce8-4ca5-4a20-8b83-88d83fcb282d.jpeg)




![TransferenciasCuentasEnvio](https://user-images.githubusercontent.com/44457989/172270114-0614aae0-18da-420b-9344-0e083d5526ee.jpeg)





<h4>* Comprobante pago créditos (mismo modelo aplica con transacciones cuentas de ahorro clientes)</h4>

![Comprobante3](https://user-images.githubusercontent.com/44457989/172273658-7771bc81-08e2-491e-9fc8-f775fc075b32.png)




![Comprobante1](https://user-images.githubusercontent.com/44457989/172273028-738b2ebe-b86f-4c69-aba2-c09ce77e1f55.png)



![Comprobante2](https://user-images.githubusercontent.com/44457989/172273491-0f259c27-66ed-434b-96a8-fa3091e36d76.png)





<h4>* Perfil de usuarios</h4>


![Perfil1](https://user-images.githubusercontent.com/44457989/172270694-5f0f6d55-0857-415d-81a4-8111883f2494.jpeg)


![Perfil2](https://user-images.githubusercontent.com/44457989/172270697-cfe35ba0-8b8e-4e29-8dc8-fb1f9add1c40.jpeg)


![Perfil3](https://user-images.githubusercontent.com/44457989/172270700-58293d0d-630a-4a67-9d1c-e5a83d6e25cd.jpeg)


![Perfil4](https://user-images.githubusercontent.com/44457989/172270702-ed40f20f-15c1-448d-8ad7-1dcef1630a56.jpeg)




<h4>* Envío de mensajes a otros usuarios (Bandeja de Entrada, Lectura Mensajes y Envío Mensajes)</h4>


![Mensaje1](https://user-images.githubusercontent.com/44457989/172271038-ab88a6a6-96bc-43fc-b4a9-c5061deb424c.jpeg)


![Mensaje2](https://user-images.githubusercontent.com/44457989/172271041-a9d23848-89ec-455a-97ee-c5870e14a914.jpeg)


![Mensaje3](https://user-images.githubusercontent.com/44457989/172271042-bdc445fc-efae-4e54-a048-22e757d7d668.jpeg)


<h4>* Consulta notificaciones recibidas</h4>


![Notificaciones](https://user-images.githubusercontent.com/44457989/172271258-c8a3f3bf-915f-44cd-8243-98a415ccdd0d.jpeg)




<h4>* Consulta estado de cuenta créditos y vista impresión</h4>


![EstadodeCuenta](https://user-images.githubusercontent.com/44457989/172271851-a4ceed98-defe-44ba-8451-58919026ceb8.jpeg)




![16](https://user-images.githubusercontent.com/44457989/162675303-920d60aa-b921-4dc7-8ac3-1e4acf9518b4.png)




<h4>* Contrato generado automáticamente, según producto asociado créditos clientes (Préstamos Hipotecarios)</h4>


![CopiaContratoHipoteca](https://user-images.githubusercontent.com/44457989/172271973-1dde6934-d271-45b4-877f-dd3814277318.png)

<h4>* Contrato generado automáticamente, según producto asociado créditos clientes (Préstamos Personales)</h4>

![CopiaContratoPersonales](https://user-images.githubusercontent.com/44457989/215891253-2fa76259-e87a-4284-b9d3-3e1452d73d59.png)

<h4>* Contrato generado automáticamente, según producto asociado créditos clientes (Préstamos de Vehículos)</h4>

![CopiaContratoVehiculos](https://user-images.githubusercontent.com/44457989/215891464-ec33c8cf-676b-4ce5-80df-822b55d3c69a.png)





<h4>* Consulta cliente moroso (problemas de impagos en su responsabilidad crediticia)</h4>

![CuotasImpagoMoras](https://user-images.githubusercontent.com/44457989/172272462-49d316b0-4883-47fb-a2de-43d365ee1db9.jpeg)


![EstadoCuotaMoraCliente](https://user-images.githubusercontent.com/44457989/172272464-f6eda666-96e4-42b1-8bba-0b37c7110f10.jpeg)



<h4>* Vista General Todas Las Transacciones Procesadas (Cuentas de Ahorro)</h4>


![VistaTransaccionesCuentas](https://user-images.githubusercontent.com/44457989/172272689-641b8b95-c19c-40f4-b4c1-0c1c1572fc0c.jpeg)





<h4>* Inicio Portal Administradores</h4>


![admin](https://user-images.githubusercontent.com/44457989/162853568-807bc907-ab9a-4623-8fe5-46e9469a7f9e.png)



<h4>* Inicio Portal Presidencia</h4>

![presidencia](https://user-images.githubusercontent.com/44457989/162853573-83b08872-2361-4a8e-abe6-1a0b50d1a859.png)


<h4>* Inicio Portal Gerencia</h4>


![gerencia](https://user-images.githubusercontent.com/44457989/162853576-50a346b1-f94d-4f58-bf08-c4a846e01ee1.png)



<h4>* Inicio Portal Atención al Cliente</h4>



![atencioncliente](https://user-images.githubusercontent.com/44457989/162853578-bfdee37c-6a95-431e-b355-c09234d8d52a.png)


<h4>* Inicio Portal Clientes</h4>

![17](https://user-images.githubusercontent.com/44457989/162675685-0a8dffff-544f-4616-8908-266e933fa5d0.png)



<h4>* Recuperación cuentas | contraseñas olvidadas</h4>


![Recuperacion1](https://user-images.githubusercontent.com/44457989/172274186-86ca35da-88d2-4f74-8407-b79ab6f865db.jpeg)


![Recuperacion2](https://user-images.githubusercontent.com/44457989/172274189-f6594a2c-17a5-4651-9835-6dbc947566fa.jpeg)


![Recuperacion3](https://user-images.githubusercontent.com/44457989/172274192-558e5d93-d685-4dfb-94f1-385324c319ac.jpeg)


![Recuperacion4](https://user-images.githubusercontent.com/44457989/172274194-8297cfcc-edb4-4f88-886a-1767c5169d35.jpeg)





<h4>* Muestra recepción correos automáticos</h4>


![19](https://user-images.githubusercontent.com/44457989/162676203-db5712be-e9de-4f5e-b620-aba4dd3cb551.png)

![20](https://user-images.githubusercontent.com/44457989/162676206-f53c33b9-b461-4c6d-b53a-6204f314b300.png)

![21](https://user-images.githubusercontent.com/44457989/162676209-6a98d0f0-868c-422a-b28f-c081d91df784.png)



<h2>** Los datos de usuarios no son reales. Cumplen únicamente la función del llenado de posible información real a gestionar en esta plataforma.</h2>


<h2>Créditos Especiales:</h2>
<p>Para la realización de este proyecto, se ha utilizado diferentes recursos, los cuales se mencionan a continuación:

 <b>1. API Climatica: OpenWeather -> https://openweathermap.org/</b><br>
 <b>2. Iconos animados SVG Clima: basmilius -> https://github.com/basmilius/weather-icons</b><br>
 <b>3. Conversión cifras números a letras: lecano -> https://github.com/lecano/php-numero-a-letras</b><br>
 <b>4. Documentos PDF: FPDF -> http://www.fpdf.org/</b><br>
  
</p>




<h2>Muchas gracias por obtener este repositorio hecho con muchas tazas de café ☕ ❤️</h2>



![poster_5dfe44fc8738c205dc24cc919a7de3fd](https://user-images.githubusercontent.com/44457989/84722426-6d047d80-af40-11ea-8a6d-31b4466c1c08.png)




<h4>*** Fecha de Subida: 11 abril 2022 ***</h4>







