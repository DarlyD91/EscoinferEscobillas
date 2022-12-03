/*Alerta de cambio de estado del repuesto en listar*/
function alerta(){
var resultado = window.confirm('¿Está seguro que desea cambiar el estado de este Repuesto?');
if (resultado === true) {
    return true;
} else { 
    return false;
}
}

/*ALerta de actualizar repuesto*/
function check(){
    window.alert("El repuesto fue Editado correctamente");
}


