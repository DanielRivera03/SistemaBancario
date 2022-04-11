function comprobarNumeroCuentaAhorroCliente() {
	$("#loaderIcon1").show();
	jQuery.ajax({
	url: "../modelo/consulta-validacion-numero-cuentas-clientes.php",
	data:'val-numerocuentaahorro='+$("#val-numerocuentaahorro").val(),
	type: "POST",
	success:function(data){
		$("#estadonumerocuenta").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon1").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
    
}