function CalculoCuotaMensualHipotecas() {
    var MontoCredito = document.formulariocreditosclienteshipotecas.valmontocreditoclientes.value;
    var PlazoCredito = document.formulariocreditosclienteshipotecas.valplazocredito.value;
    var TasaInteres = document.formulariocreditosclienteshipotecas.rangointereses.value;
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
            if(MontoCredito>=30000 && MontoCredito<=50000){// $30,000.00 - $50,0000.00 USD
                SeguroDeuda = 35.50;
                GastosAdministrativos = 110.99;
            }else if(MontoCredito>50000 && MontoCredito<=50000){// $50,001.00 - $75,000.00 USD
               SeguroDeuda = 41.50;
               GastosAdministrativos = 114.99;
           }else if(MontoCredito>50000 && MontoCredito<=150000){// $75,001.00 - $150,000.00 USD
               SeguroDeuda = 61.50;
               GastosAdministrativos = 154.99;
           }else if(MontoCredito>150000 && MontoCredito<=500000){// $150,001.00 - $500,000.00 USD
               SeguroDeuda = 140.50;
               GastosAdministrativos = 354.99;
           }else if(MontoCredito>500000){ // MAYORES A $500,000.00 USD
               SeguroDeuda = 540.50;
               GastosAdministrativos = 954.99;
           }
             // CONVERTIR AÑOS PLAZO A MESES
             ConversorMesesPlazo = PlazoCredito*12;
             // CALCULO CUOTA MENSUAL A CANCELAR [  IVA INCLUIDO ]
             CalcularCuotaMensual = parseFloat((MontoCredito/ConversorMesesPlazo+(MontoCredito/ConversorMesesPlazo)*TasaInteres/100)+SeguroDeuda)*.13+parseFloat((MontoCredito/ConversorMesesPlazo+(MontoCredito/ConversorMesesPlazo)*TasaInteres/100)+SeguroDeuda);
             // CALCULO MAXIMO DE FINANCIAMIENTO 
            CalculoFinanciamiento = MontoCredito*.9;
        }
        CalcularCuotaMensual = (isNaN(parseFloat(CalcularCuotaMensual)))? 0 : parseFloat(CalcularCuotaMensual);
        // CALCULO DESEMBOLSO CLIENTE FINAL
        TotalDesembolso = CalculoFinanciamiento-GastosAdministrativos;
        // SETEO DE CALCULO DESEMBOLSO -> NO MONTOS NEGATIVOS
        if(TotalDesembolso<0){TotalDesembolso=0;}
        // IMPRESION DE RESULTADOS
        document.getElementById('resultado').innerHTML = CalcularCuotaMensual.toFixed(2);
        document.getElementById('calculodesembolso').innerHTML = new Intl.NumberFormat().format(TotalDesembolso.toFixed(2));
        document.getElementById('segurodeuda').innerHTML = SeguroDeuda.toFixed(2);
        document.getElementById('gastosadministrativos').innerHTML = GastosAdministrativos.toFixed(2);
        document.getElementById("cuotamensualasignada").value = CalcularCuotaMensual.toFixed(2);
        document.getElementById('calculofinanciamientomaximo').innerHTML = new Intl.NumberFormat().format(CalculoFinanciamiento.toFixed(2));
        
 }
    catch(e) {// POSTERIORMENTE SI SE DESEA, LANZAR ALERTA DE ERROR O SIMPLEMENTE NO HACER NADA
}
}

function LimpiezaDatos(){
    // VARIABLES GLOBALES
    CalcularCuotaMensual=0; TotalDesembolso=0; CreditoSolicitado=0; MesesPlazo=0; SeguroDeuda=0; GastosAdministrativos=0; CalculoFinanciamiento=0;
    // FORMULARIO DE CREDITOS
    document.getElementById("ingreso-datos-credito-clientes").reset();
    // SECCION CALCULO CUOTA FINAL
    document.getElementById('resultado').innerHTML = CalcularCuotaMensual.toFixed(2);
    document.getElementById('calculodesembolso').innerHTML = TotalDesembolso.toFixed(2);
    document.getElementById('monto-credito-solicitado').innerHTML = CreditoSolicitado.toFixed(2);
    document.getElementById('plazo-credito').innerHTML = CreditoSolicitado+" meses";
    document.getElementById('segurodeuda').innerHTML = SeguroDeuda.toFixed(2);
    document.getElementById('gastosadministrativos').innerHTML = GastosAdministrativos.toFixed(2);
    document.getElementById('calculofinanciamientomaximo').innerHTML = CalculoFinanciamiento.toFixed(2);
}