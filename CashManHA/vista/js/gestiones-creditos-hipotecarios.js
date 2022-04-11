/* EL INPUT */
var elInput3 = document.querySelector("#rangointereses");
var w = parseInt(window.getComputedStyle(elInput3, null).getPropertyValue("width"));

/* LA ETIQUETA */
var etq = document.querySelector('.etiqueta');
/* el valor de la etiqueta (el tooltip) */
etq.innerHTML = elInput3.value;

/* calcula la posición inicial de la etiqueta (el tooltip) */
var inputMin = elInput3.getAttribute('min');
var inputMax = elInput3.getAttribute('max');

var pxls = w/100;
var k = (inputMax - inputMin)/100; 


var valorCalculado = ((elInput3.value -inputMin)/k)*pxls;
etq.style.left =  (valorCalculado - 15)+"px";




elInput3.addEventListener('input',function(){
/* cambia el valor de la etiqueta (el tooltip) */
etq.innerHTML =this.value;
/* cambia la posición de la etiqueta (el tooltip) */
var nuevoValorCalculado = ((this.value -inputMin)/k)*pxls;
etq.style.left =  (nuevoValorCalculado - 15)+"px";

}, false);






/* LA ETIQUETA */
var etq1 = document.querySelector('.tasa-interes-credito');
/* el valor de la etiqueta (el tooltip) */
etq1.innerHTML = elInput3.value;

/* calcula la posición inicial de la etiqueta (el tooltip) */
var inputMin = elInput3.getAttribute('min');
var inputMax = elInput3.getAttribute('max');

var pxls = w/100;
var k = (inputMax - inputMin)/100; 


var valorCalculado = ((elInput3.value -inputMin)/k)*pxls;
etq1.style.left =  (valorCalculado - 15)+"px";




elInput3.addEventListener('input',function(){
/* cambia el valor de la etiqueta (el tooltip) */
etq1.innerHTML =this.value;
/* cambia la posición de la etiqueta (el tooltip) */
var nuevoValorCalculado = ((this.value -inputMin)/k)*pxls;
etq1.style.left =  (nuevoValorCalculado - 15)+"px";

}, false);



const DatosCreditosClientes = document.querySelector('#tarjeta'), // TODO CONTENEDOR DATOS CREDITOS
    IngresoDatoMontoCredito = document.querySelector('#ingreso-datos-credito-clientes'), // TODO DATOS CLIENTES FORMULARIO
    MontoCredito = document.querySelector('#tarjeta .monto-credito-solicitado'); // MONTO CREDITO	
    PlazoCredito = document.querySelector('#tarjeta .plazo-credito'); // MONTO CREDITO	

    IngresoDatoMontoCredito.valmontocreditoclientes.addEventListener('keyup', (e) => {
	let ValorPeticion = e.target.value;
	IngresoDatoMontoCredito.valmontocreditoclientes.value = ValorPeticion.replace(/\s/g, '').replace(/\D/g, '');
	MontoCredito.textContent = ValorPeticion;
	if(ValorPeticion == ''){
		MontoCredito.textContent = '0.00';
	}
});

IngresoDatoMontoCredito.valplazocredito.addEventListener('keyup', (e) => {
	let ValorPeticion = e.target.value;
	IngresoDatoMontoCredito.valplazocredito.value = ValorPeticion.replace(/\s/g, '').replace(/\D/g, '');
	PlazoCredito.textContent = ValorPeticion+" años";
	if(ValorPeticion == ''){
		PlazoCredito.textContent = '0 años';
	}
});

