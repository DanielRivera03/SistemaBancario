function comprobarCodigoSeguridad() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "../modelo/consulta-codigo-seguridad-usuarios.php",
	data:'val-codesecurity='+$("#val-codesecurity").val(),
	type: "POST",
	success:function(data){
		$("#estadousuario").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
    
}