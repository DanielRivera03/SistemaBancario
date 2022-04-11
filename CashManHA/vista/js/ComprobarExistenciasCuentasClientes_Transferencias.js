function comprobarCuentasClientes() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "../modelo/consultar-existencia-cuentas-transferencias-clientes.php",
	data:'val-numerocuentaclientes='+$("#val-numerocuentaclientes").val(),
	type: "POST",
	success:function(data){
		$("#estadousuariocuenta").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
    
}