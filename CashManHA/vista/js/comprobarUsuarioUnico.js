function comprobarUsuario() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "../modelo/consulta-usuarios-unicos.php",
	data:'val-usuariounico='+$("#val-usuariounico").val(),
	type: "POST",
	success:function(data){
		$("#estadousuario").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
}