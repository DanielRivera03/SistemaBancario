function comprobarCodigoProductos() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "../modelo/consulta-codigo-unico-productos.php",
	data:'val-codigoproducto='+$("#val-codigoproducto").val(),
	type: "POST",
	success:function(data){
		$("#estadocodigo").html(data); // MOSTRAR ESTADO USUARIO
        $("#loaderIcon").hide(); // EFECTO DE CARGA PROCESANDO INFORMACION
	},
	});
}