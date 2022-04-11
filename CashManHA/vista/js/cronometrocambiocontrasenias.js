window.onload = updateClock;
var totalTime = 120;
function updateClock() {
    document.getElementById('cronometro').innerHTML = totalTime;
    if(totalTime==0){
        location.href="../controlador/cIniciosSesionesUsuarios.php?cashmanha=expiracion-cambio-contrasenia";
    }else{
        totalTime-=1;
        setTimeout("updateClock()",1000);
    }
}