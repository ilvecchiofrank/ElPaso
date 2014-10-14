$(document).ready(function () {

$("#txtCedula").html(getParameterByName("docId"));

$(".modal").modal('show');
loadEmpleo();
loadResid();
loadNoResid();
loadPesca();
loadTransp();
loadElectro();
loadCenso();
$(".modal").modal('hide');

//-Cargar Empleo-//
function loadEmpleo(){
    console.log("Empleo");
    var cedula = getParameterByName("docId");
    var tablaempleo = "";
}

//-Cargar Compensación Residentes-//
function loadResid(){
    console.log("Residentes");
    var cedula = getParameterByName("docId");
    var tablaresid = "";
}

//-Cargar Compensación No Residentes-//
function loadNoResid(){
    console.log("No residentes");
    var cedula = getParameterByName("docId");
    var tablanoresid = "";
}

//-Cargar Pescadores-//
function loadPesca(){
    console.log("Pesca");
    var cedula = getParameterByName("docId");
    var tablapesca = "";
}

//-Cargar Transportadores-//
function loadTransp(){
    console.log("Transp");
    var cedula = getParameterByName("docId");
    var tablatransp = "";
}

//-Cargar ElectroHuila-//
function loadElectro(){
    console.log("Electro");
    var cedula = getParameterByName("docId");
    var tablaelectro = "";
    $.getJSON("index.php/form/get_Electro/" + cedula, function(objRData){
        arrayElectro = objRData;
        if(arrayElectro.length >= 1){
            tablaelectro += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Año</td><td>Mes</td><td>Municipio</td><td>Ubicación</td><td>Cédula</td><td>Dirección</td><td>Contador</td><td>Fecha Matricula</td></tr>";
            for (var e = arrayElectro.length -1; e >=0; e--){
                tablaelectro += "<tr><td>" + arrayElectro[e].Año + "</td><td>" + arrayElectro[e].Mes + "</td><td>" + arrayElectro[e].MUNICIPIO + "</td><td>" + arrayElectro[e].Ubicacion + "</td><td>" + arrayElectro[e].CC + "</td><td>" + arrayElectro[e].Direccion + "</td><td>" + arrayElectro[e].Contador + "</td><td>" + arrayElectro[e].Fecha_Matricula + "</td></tr>";
            }
        }else{
            $("tableElectro").css("display","none");
        }
            tablaelectro += "</tbody></table>";
            $("#tableElectro").html(tablaelectro);
    });
}

//-Cargar Censo-//
function loadCenso(){
    console.log("Censo");
    var cedula = getParameterByName("docId");
    var tablacenso = "";
}

//-Extraer parametros QueryString-//
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

});