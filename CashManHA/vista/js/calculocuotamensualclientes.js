function CalculoCuotaMensual() {
    var TipoClienteCashman = document.formulariocreditosclientes.tipoclientecredito.value;
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
            if(MontoCredito<300){// $0.00 - $299.00 USD
                 SeguroDeuda = 0.00;
                 GastosAdministrativos = 0.00;
             }else if(MontoCredito>=300 && MontoCredito<500){ // $300.00 - $499.00 USD
                 SeguroDeuda = 1.95;
                 GastosAdministrativos = 0.00
             }else if(MontoCredito>=500 && MontoCredito<1000){ // $500.00 - $999.00 USD
                 SeguroDeuda = 3.95;
                 GastosAdministrativos = 2.00
             }else if(MontoCredito>=1000 && MontoCredito<2500){ // $1000.00 - $2499.00 USD
                 SeguroDeuda = 6.95;
                 GastosAdministrativos = 6.00
             }else if(MontoCredito>=2500 && MontoCredito<9500){ // $2500.00 - $9499.00 USD
                 SeguroDeuda = 7.95;
                 GastosAdministrativos = 12.00
             }else if(MontoCredito>=9500){ // $9500.00 USD HASTA POLITICA DE ENTIDAD FINANCIERA
                 SeguroDeuda = 13.95;
                 GastosAdministrativos = 18.00
             }
             // CALCULO CUOTA MENSUAL A CANCELAR [  IVA INCLUIDO ]
             CalcularCuotaMensual = parseFloat((MontoCredito/PlazoCredito+(MontoCredito/PlazoCredito)*TasaInteres/100)+SeguroDeuda)*.13+parseFloat((MontoCredito/PlazoCredito+(MontoCredito/PlazoCredito)*TasaInteres/100)+SeguroDeuda);
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
        
 }
    catch(e) {// POSTERIORMENTE SI SE DESEA, LANZAR ALERTA DE ERROR O SIMPLEMENTE NO HACER NADA
}
}

function LimpiezaDatos(){
    // VARIABLES GLOBALES
    CalcularCuotaMensual=0; TotalDesembolso=0; CreditoSolicitado=0; MesesPlazo=0; SeguroDeuda=0; GastosAdministrativos=0; 
    // FORMULARIO DE CREDITOS
    document.getElementById("ingreso-datos-credito-clientes").reset();
    // SECCION CALCULO CUOTA FINAL
    document.getElementById('resultado').innerHTML = CalcularCuotaMensual.toFixed(2);
    document.getElementById('calculodesembolso').innerHTML = TotalDesembolso.toFixed(2);
    document.getElementById('monto-credito-solicitado').innerHTML = CreditoSolicitado.toFixed(2);
    document.getElementById('plazo-credito').innerHTML = CreditoSolicitado+" meses";
    document.getElementById('segurodeuda').innerHTML = SeguroDeuda.toFixed(2);
    document.getElementById('gastosadministrativos').innerHTML = GastosAdministrativos.toFixed(2);
}