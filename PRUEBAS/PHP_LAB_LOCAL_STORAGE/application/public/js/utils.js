/**
 * 
 */
function obtenerUsuario(){
	return JSON.parse(localStorage["__usuario"]);
}
function guardarUsuario(usuario){
	if(usuario !== null && usuario !== "null"){
		localStorage["__usuario"] = usuario;
	}
}
function logOut(){
	localStorage["__usuario"] = null;
}