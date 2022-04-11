function CalculoCuotaMensual() {
    var MontoCredito = document.formulariocreditosclientes.valmontocreditoclientes.value;
    var PlazoCredito = document.formulariocreditosclientes.valplazocredito.value;
    var TasaInteres = document.formulariocreditosclientes.rangointereses.value;
    try{
        MontoCredito = (isNaN(parseFloat(MontoCredito)))? 0 : parseFloat(MontoCredito);
        PlazoCredito = (isNaN(parseInt(PlazoCredito)))? 0 : parseInt(PlazoCredito);
        TasaInteres = (isNaN(parseFloat(TasaInteres)))? 0 : parseFloat(TasaInteres);
        // SETEAR A CERO CUANDO NO EXISTA DIVISIBLE POSIBLE Y TAMBIEN EXISTAN DATOS VACIOS
        if(MontoCredito==0 | PlazoCredito==0 | MontoCredito=="" | PlazoCredito==""){
             CalcularCuotaMensual=0.00;
        }else{
            // VALIDACION DE GASTOS ADMINISTRATIVOS Y SEGURO DE DEUDA, SEGUN MONTO SOLICITADO A ENTIDAD FINANCIERA
            // -> EXPLICITAMENTE DETALLADO EN EL CONTRATO ENTREGADO AL CLIENTE POSTERIORMENTE
            if(MontoCredito>=10000 && MontoCredito<=25000){// $10,000.00 - $25,000.00 USD
                 SeguroDeuda = 12.99;
                 GastosAdministrativos = 25.99;
                 ServicioGPS = 20.99;
             }else if(MontoCredito>25000 && MontoCredito<=50000){// $25,001.00 - $50,000.00 USD
                SeguroDeuda = 18.99;
                GastosAdministrativos = 29.99;
                ServicioGPS = 20.99;
            }else if(MontoCredito>50000 && MontoCredito<=100000){// $50,001.00 - $100,000.00 USD
                SeguroDeuda = 26.99;
                GastosAdministrativos = 59.99;
                ServicioGPS = 20.99;
            }else if(MontoCredito>100000 && MontoCredito<=200000){// $100,001.00 - $200,000.00 USD
                SeguroDeuda = 37.99;
                GastosAdministrativos = 99.99;
                ServicioGPS = 20.99;
            }
             // CALCULO CUOTA MENSUAL A CANCELAR [  IVA INCLUIDO ]
             CalcularCuotaMensual = parseFloat((MontoCredito/PlazoCredito+(MontoCredito/PlazoCredito)*TasaInteres/100)+SeguroDeuda+ServicioGPS)*.13+parseFloat((MontoCredito/PlazoCredito+(MontoCredito/PlazoCredito)*TasaInteres/100)+SeguroDeuda+ServicioGPS);
        }
        CalcularCuotaMensual = (isNaN(parseFloat(CalcularCuotaMensual)))? 0 : parseFloat(CalcularCuotaMensual);
        // CALCULO DESEMBOLSO CLIENTE FINAL
        TotalDesembolso = MontoCredito-GastosAdministrativos;
        // SETEO DE CALCULO DESEMBOLSO -> NO MONTOS NEGATIVOS
        if(TotalDesembolso<0){TotalDesembolso=0;}
        // IMPRESION DE RESULTADOS
        document.getElementById('resultado').innerHTML = CalcularCuotaMensual.toFixed(2);
        document.getElementById('calculodesembolso').innerHTML = TotalDesembolso.toFixed(2);
        document.getElementById('segurodeuda').innerHTML = SeguroDeuda.toFixed(2);
        document.getElementById('gastosadministrativos').innerHTML = GastosAdministrativos.toFixed(2);
        document.getElementById("cuotamensualasignada").value = CalcularCuotaMensual.toFixed(2);
        document.getElementById('serviciogps').innerHTML = ServicioGPS.toFixed(2);
        
 }
    catch(e) {// POSTERIORMENTE SI SE DESEA, LANZAR ALERTA DE ERROR O SIMPLEMENTE NO HACER NADA
}
}

function LimpiezaDatos(){
    // VARIABLES GLOBALES
    CalcularCuotaMensual=0; TotalDesembolso=0; CreditoSolicitado=0; MesesPlazo=0; SeguroDeuda=0; GastosAdministrativos=0; ServicioGPS=0;
    // FORMULARIO DE CREDITOS
    document.getElementById("ingreso-datos-credito-clientes").reset();
    // SECCION CALCULO CUOTA FINAL
    document.getElementById('resultado').innerHTML = CalcularCuotaMensual.toFixed(2);
    document.getElementById('calculodesembolso').innerHTML = TotalDesembolso.toFixed(2);
    document.getElementById('monto-credito-solicitado').innerHTML = CreditoSolicitado.toFixed(2);
    document.getElementById('plazo-credito').innerHTML = CreditoSolicitado+" meses";
    document.getElementById('segurodeuda').innerHTML = SeguroDeuda.toFixed(2);
    document.getElementById('gastosadministrativos').innerHTML = GastosAdministrativos.toFixed(2);
    document.getElementById('serviciogps').innerHTML = ServicioGPS.toFixed(2);
}