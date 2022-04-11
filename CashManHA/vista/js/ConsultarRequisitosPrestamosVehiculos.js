function ConsultarRequisitosPrestamosVehiculos(){
    // VALIDACION CLIENTES TIPO "ASALARIADOS"
    if(document.getElementById("valtipoclientecredito").value === "asalariado"){
        // INTERES MENOR A 10.00% MENSUAL
        if(document.getElementById("rangointereses").value<10){
            var AlertaInteresAsalariados = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Tasa de Interés!</h5><p class="mb-0">Lo sentimos, la tasa de interés mínima establecida para clientes "Empleados - Asalariados es de 10% Mensual <br> Usted ha seleccionado una tasa de interés de: ['+document.getElementById("rangointereses").value+'%.]</p></div></div></div></div>';
            document.getElementById('consultarequisitos').innerHTML = AlertaInteresAsalariados;
            // BLOQUEO BOTON ENVIO DE DATOS
            $('#enviar-datos-creditos').prop('disabled', true);
        }else{
            // DESBLOQUEO BOTON ENVIO DE DATOS
            $('#enviar-datos-creditos').prop('disabled', false);
            if(document.getElementById("valsalariocliente").value<700){
                // SI INGRESO ES MENOR A $700.00 -> ERROR
                var AlertaSalarioMenor = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Requisitos!</h5><p class="mb-0">Lo sentimos, el ingreso m&iacute;nimo para acceder a un cr&eacute;dito es de $700.00 USD. para clientes "Empleados - Asalariados".<br> Salario Ingresado: $'+document.getElementById("valsalariocliente").value+' USD.</p></div></div></div></div>';
                document.getElementById('consultarequisitos').innerHTML = AlertaSalarioMenor;
                // BLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', true);
            }
            else if(document.getElementById("valsalariocliente").value==0){
                document.getElementById('consultarequisitos').innerHTML = "";
            }
            else{
                document.getElementById('consultarequisitos').innerHTML = "";
                // DESBLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', false);
            }                       
        }
        // VALIDACION MONTO MAXIMO MESES DE FINANCIAMIENTO
        if(document.getElementById("valplazocredito").value>90){
            var AlertaPlazoMaximo = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Requisitos!</h5><p class="mb-0">Lo sentimos, el plazo máximo de financiamiento para nuestro producto es de 90 meses.<br> Plazo Meses Ingresado: '+document.getElementById("valplazocredito").value+' meses.</p></div></div></div></div>';
                document.getElementById('consultarequisitos').innerHTML = AlertaPlazoMaximo;
                // BLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', true);
        }
        // VALIDACION MONTO MAXIMO A OTORGAR FINANCIEMIENTO
        if(document.getElementById("valmontocreditoclientes").value>100000){
            var AlertaMontoMaximo = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Requisitos!</h5><p class="mb-0">Lo sentimos, el monto máximo a financiar es de $100,000.00 USD.</p></div></div></div></div>';
                document.getElementById('consultarequisitos').innerHTML = AlertaMontoMaximo;
                // BLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', true);
        }
    // VALIDACION CLIENTES TIPO "INDEPENDIENTES - FORMALES"       
    }else if(document.getElementById("valtipoclientecredito").value === "independiente"){
        // INTERES MENOR A 6.00% MENSUAL
        if(document.getElementById("rangointereses").value<17){
            var AlertaInteresIndependientes = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Tasa de Interés!</h5><p class="mb-0">Lo sentimos, la tasa de interés mínima establecida para clientes "Independientes - Formales" es de 17% Mensual <br> Usted ha seleccionado una tasa de interés de: ['+document.getElementById("rangointereses").value+'%.]</p></div></div></div></div>';
            document.getElementById('consultarequisitos').innerHTML = AlertaInteresIndependientes;
            // BLOQUEO BOTON ENVIO DE DATOS
            $('#enviar-datos-creditos').prop('disabled', true);
        }else{
            // DESBLOQUEO BOTON ENVIO DE DATOS
            $('#enviar-datos-creditos').prop('disabled', false);
            if(document.getElementById("valsalariocliente").value<1000){
                // SI INGRESO ES MENOR A $1000.00 -> ERROR
                var AlertaSalarioMenor = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Requisitos!</h5><p class="mb-0">Lo sentimos, el ingreso m&iacute;nimo para acceder a un cr&eacute;dito es de $1,000.00 USD. para clientes "Independientes - Formales".<br> Salario Ingresado: $'+document.getElementById("valsalariocliente").value+' USD.</p></div></div></div></div>';
                document.getElementById('consultarequisitos').innerHTML = AlertaSalarioMenor;
                // BLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', true);
            }
            else if(document.getElementById("valsalariocliente").value==0){
                document.getElementById('consultarequisitos').innerHTML = "";
            }
            else{
                document.getElementById('consultarequisitos').innerHTML = "";
                // DESBLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', false);
            }                       
        }
        // VALIDACION MONTO MAXIMO MESES DE FINANCIAMIENTO
        if(document.getElementById("valplazocredito").value>90){
            var AlertaPlazoMaximo = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Requisitos!</h5><p class="mb-0">Lo sentimos, el plazo máximo de financiamiento para nuestro producto es de 90 meses.<br> Plazo Meses Ingresado: '+document.getElementById("valplazocredito").value+' meses.</p></div></div></div></div>';
                document.getElementById('consultarequisitos').innerHTML = AlertaPlazoMaximo;
                // BLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', true);
        }
        // VALIDACION MONTO MAXIMO A OTORGAR FINANCIEMIENTO
        if(document.getElementById("valmontocreditoclientes").value>200000){
            var AlertaMontoMaximo = '<div class="col-xl-12"><div class="alert alert-danger left-icon-big alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button><div class="media"><div class="alert-left-icon-big"><span><i class="mdi mdi-alert"></i></span></div><div class="media-body"><h5 class="mt-1 mb-2">No Cumple Requisitos!</h5><p class="mb-0">Lo sentimos, el monto máximo a financiar es de $200,000.00 USD.</p></div></div></div></div>';
                document.getElementById('consultarequisitos').innerHTML = AlertaMontoMaximo;
                // BLOQUEO BOTON ENVIO DE DATOS
                $('#enviar-datos-creditos').prop('disabled', true);
        }
    }                                  
};