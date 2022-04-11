$("#cambioestadotoken").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = "../controlador/cIniciosSesionesUsuarios.php?cashmanha=cambio-estado-token";
    var TokenAcceso = $(this).data('id'); // ID ENVIADA POR GET DESDE EL CONTROLADOR HACIA EL MODELO  
    $.ajax({
           type: "POST",
           url: url,
           data: 'token='+TokenAcceso,
           success: function(data)
           {
               location.href="../controlador/cIniciosSesionesUsuarios.php?cashmanha=cambio-contrasenia-usuarios&token="+TokenAcceso;
           }
    });    
});

