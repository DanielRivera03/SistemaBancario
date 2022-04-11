function comprobarCodigoSeguridadTransferencias() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "../modelo/consulta-validacion-codigo-seguridad-transferencias.php",
	data:'val-codigoseguridadtransferencia='+$("#val-codigoseguridadtransferencia").val(),
	type: "POST",
	success:function(data){
		$("#estado_codigoseguridad_transferencias").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
    
}