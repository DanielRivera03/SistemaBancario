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



<h2>Información General</h2>


<p>Siguiendo todos los pasos anteriores, enhorabuena ʕ•́ᴥ•̀ʔっ usted ya tiene todo listo para ejecutar este proyecto en su servidor. A continuación se detallarán aspectos técnicos de esta aplicación.</p>


<img src="https://user-images.githubusercontent.com/44457989/162668859-a5678266-bda2-4996-8308-6a890276af2a.png" width="500">


<p><b>¿Qué es CashMan H.A?</b> Es una aplicación financiera / bancaria que simula un entorno real de algunas tradicionales bancas en línea de los corporativos financieros reconocidos. Usted puede adquirir préstamos (que son divididos en tres / Personales / Vehículos / Hipotecarios). Además de obtener una cuenta de ahorro personal y poder realizar transferencias de dinero a otras cuentas registradas. Puede conocer el status de su solicitud crediticia antes de ser aprobada y cuando este ha sido marcado así, además de posibilidad de reestructurar créditos o simplemente denegarlos. Puede consultar su estado de cuenta respecto a su solicitud crediticia y ver los comprobantes de cada operación efectuada dentro de la aplicación (aplica para créditos activos, históricos y cuentas de ahorro). Es un sistema muy completo que se encuentra dividido en cinco roles de usuarios</p>

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
  <li>Tpdos los nuevos usuarios, es de estricto cumplimiento que deben cambiar sus credenciales de acceso. Además de la posibilidad de cambiar su usuario único por una sola vez (según roles de usuario).</li>
</ul>Son algunas de las funciones más principales e importantes que tú puedes realizar dentro de esta plataforma. Tome nota que son acciones descritas de manera general, por cada rol de usuario existen limitaciones según a lo descrito anteriormente</p>


<h2>¿Deseas probar la demo en vivo?</h2>


<p>Se ha habilitado un espacio dentro de un hosting gratuito para efectuar pruebas de este sistema, por favor tome en cuenta que la velocidad de respuesta así como su ancho de banda y cantidad de usuarios se ve limitada al ser un hosting gratuito. Puede acceder a la demo en el siguiente enlace: http://cashmanha.unaux.com/ A continación se detallan los datos de acceso para ingresar (puede hacerlo por medio de su usuario único o correo electrónico)<ul>
  <li>Administrador: usuario = norma.boix | correo: normaboix@yahoo.es | clave: 123456789</li>
  <li>Presidencia: usuario = ester.cuenca | correo: estercuenca@gmail.com | clave: 123456789</li>
  <li>Gerencia: usuario = 	faustino.padron | correo: faustopadron@gmail.com | clave: 123456789</li>
  <li>Atención al Cliente: usuario = 	marco.almagro | correo: marco111@gmail.com | clave: 123456789</li>
  <li>Clientes: usuario = 	leonel.franco | correo: modificarcorreoreal@gmail.com | clave: 123456789</li>
  <li>Para la recepción de correos automáticos, debe establecer su correo real; de lo contrario lamentamos informarle que no podrá visualizar el contenido deseado.</li>
</ul>Accesos validados dentro de la plataforma, por favor tome nota de cada uno de los roles de usuario asignados.</p>


<h2>Modelo Entidad Relación (m-ER) Base de Datos</h2>


![MER](https://user-images.githubusercontent.com/44457989/162854283-df1bf407-afca-4cbf-ad6d-cb17a25852d8.png)



<h2>Adicional</h2>


<p>Por favor realiza los ajustes antes mencionados, de igual forma cambia las URL que hacen los llamados a los correos electrónicos automáticos, sustituyendo el http://localhost:90/ por la URL de tu servidor de prueba o real. Además se ha optado a bien el revelar la API KEY que básicamente es informar sobre el estado del tiempo climático actual en la ciudad de San Salvador, El Salvador. Motivo que únicamente funciona como consulta de datos. NUNCA REVELAR API KEY QUE INTEGREN OTROS SERVICIOS.</p>



<h2>Algunas Capturas</h2>

<h4>* Login / inicio de sesión general</h4>


![1](https://user-images.githubusercontent.com/44457989/162672950-ddbd50d4-7412-4f7a-9c3f-7b8947634812.png)



<h4>* Registro Nuevos Usuarios</h4>


![2](https://user-images.githubusercontent.com/44457989/162673153-5880980d-4b9f-4753-a283-f3790059dde6.png)



<h4>* Consulta usuarios y asignación nuevas solicitudes crediticias</h4>



![3](https://user-images.githubusercontent.com/44457989/162673256-d70f62ef-491e-417a-a6aa-2f1f9ea7cb10.png)



![4](https://user-images.githubusercontent.com/44457989/162673535-d9d3f643-97ff-4e22-91bf-2e9b1fe542bf.png)


![5](https://user-images.githubusercontent.com/44457989/162673540-2d23d009-6571-43a4-bf4e-a520b078069a.png)




<h4>* Consulta créditos aprobados</h4>



![6](https://user-images.githubusercontent.com/44457989/162673783-bc7e0e3b-624a-4960-bb15-477106c2001f.png)




<h4>* Sistema de pagos CashMan H.A</h4>

![7](https://user-images.githubusercontent.com/44457989/162674136-7fb3d172-3c5e-438b-9724-ac7767ae377d.png)


![8](https://user-images.githubusercontent.com/44457989/162674129-020636ea-fded-44ca-8fa8-c9f135d2c5c4.png)


![9](https://user-images.githubusercontent.com/44457989/162674134-a89dc30a-afe8-429f-a1e7-30e35f195114.png)




<h4>* Transferencias Dinero Otras Cuentas</h4>


![10](https://user-images.githubusercontent.com/44457989/162674502-3a9a95df-59e8-40e3-a295-a49d0e3827f4.png)



<h4>* Comprobante pago créditos (mismo modelo aplica con transacciones cuentas de ahorro clientes)</h4>


![11](https://user-images.githubusercontent.com/44457989/162674580-3e1c2cd7-d70b-4d6e-bb83-49bd88075b24.png)


<h4>* Perfil de usuarios</h4>

![12](https://user-images.githubusercontent.com/44457989/162674856-b2db70c5-9270-418c-96d3-9aea86b8a288.png)



<h4>* Envío de mensajes a otros usuarios</h4>


![13](https://user-images.githubusercontent.com/44457989/162674861-438a2f6b-d2ab-4f7f-9c91-524138516b79.png)



<h4>* Consulta estado de cuenta créditos y vista impresión</h4>


![14](https://user-images.githubusercontent.com/44457989/162675297-d44593b8-58fa-4851-9b64-e74a9950627a.png)



![16](https://user-images.githubusercontent.com/44457989/162675303-920d60aa-b921-4dc7-8ac3-1e4acf9518b4.png)




<h4>* Contrato generado automáticamente, según producto asociado créditos clientes</h4>


![15](https://user-images.githubusercontent.com/44457989/162675301-66f6e22a-056b-46ac-a5bb-17e7b8eac9dc.png)

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


![18](https://user-images.githubusercontent.com/44457989/162675687-31911ace-4f89-48ca-ba22-684711dc8db8.png)




<h4>* Muestra recepción correos automáticos</h4>


![19](https://user-images.githubusercontent.com/44457989/162676203-db5712be-e9de-4f5e-b620-aba4dd3cb551.png)

![20](https://user-images.githubusercontent.com/44457989/162676206-f53c33b9-b461-4c6d-b53a-6204f314b300.png)

![21](https://user-images.githubusercontent.com/44457989/162676209-6a98d0f0-868c-422a-b28f-c081d91df784.png)




<h2>Muchas gracias por obtener este repositorio hecho con muchas tazas de café ☕ ❤️</h2>



![poster_5dfe44fc8738c205dc24cc919a7de3fd](https://user-images.githubusercontent.com/44457989/84722426-6d047d80-af40-11ea-8a6d-31b4466c1c08.png)




<h4>*** Fecha de Subida: 11 abril 2022 ***</h4>







