function comprobarCorreoPerfilUsuario() {
	$("#loaderIcon1").show();
	jQuery.ajax({
	url: "../modelo/consultar-correo-perfil-usuarios.php",
	data:'val-correo='+$("#val-correo").val(),
	type: "POST",
	success:function(data){
		$("#estadocorreo").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon1").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
    
}