$(document).ready(function () {

$("#txtCedula").html(getParameterByName("docId"));

loadEmpleo();
loadResid();
loadNoResid();
loadPesca();
loadTransp();
loadElectro();
loadCenso();

//-Cargar Empleo-//
function loadEmpleo(){
    console.log("Empleo");
    $(".modal").modal('show');
    var cedula = getParameterByName("docId");
    var tablaempleo = "";
    $.getJSON("index.php/form/get_Empleo/" + cedula, function(objRData){
        arrayEmpleo = objRData;
        if(arrayEmpleo.length >= 1){
            tablaempleo += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Cédula</td><td>Cargo</td><td>Número de contrato</td><td>Tipo de contrato</td><td>Fecha de contratación</td><td>Fecha de terminación de contrato</td></tr>";
            for (var e = arrayEmpleo.length -1; e >=0; e--){
                tablaempleo += "<tr><td>" + arrayEmpleo[e].Cedula + "</td><td>" + arrayEmpleo[e].Cargo + "</td><td>" + arrayEmpleo[e].N_Contrato + "</td><td>" + arrayEmpleo[e].Tipo_Contrato + "</td><td>" + arrayEmpleo[e].Fecha_Contratacion + "</td><td>" + arrayEmpleo[e].Fecha_Terminacion_Contrato + "</td></tr>";
            }
        }else{
            $("#tableEmpleo").css("display","none");
        }
            tablaempleo += "</tbody></table>";
            $("#tableEmpleo").html(tablaempleo);
    });
}

//-Cargar Compensación Residentes-//
function loadResid(){
    //console.log("Residentes");
    var cedula = getParameterByName("docId");
    var tablaresid = "";
}

//-Cargar Compensación No Residentes-//
function loadNoResid(){
    //console.log("No residentes");
    var cedula = getParameterByName("docId");
    var tablanoresid = "";
}

//-Cargar Pescadores-//
function loadPesca(){
    console.log("Pesca");
    var cedula = getParameterByName("docId");
    var tablapesca = "";
    $.getJSON("index.php/form/get_Pesca/" + cedula, function(objRData){
        arrayPesca = objRData;
        if(arrayPesca.length >= 1){
            tablapesca += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Cédula</td><td>Asociación</td><td>Arte de pesca</td><td>Número ICA</td><td>Tramo</td><td>Zona de pesca</td></tr>";
            for (var e = arrayPesca.length -1; e >=0; e--){
                tablapesca += "<tr><td>" + arrayPesca[e].CC + "</td><td>" + arrayPesca[e].ASOCIACION + "</td><td>" + arrayPesca[e].ARTE_PESCA + "</td><td>" + arrayPesca[e].No_ICA + "</td><td>" + arrayPesca[e].TRAMO + "</td><td>" + arrayPesca[e].ZONA_PESCA + "</td></tr>";
            }
        }else{
            $("#tablePescadores").css("display","none");
        }
            tablapesca += "</tbody></table>";
            $("#tablePescadores").html(tablapesca);
    });
}

//-Cargar Transportadores-//
function loadTransp(){
    console.log("Transp");
    var cedula = getParameterByName("docId");
    var tablatransp = "";
    $.getJSON("index.php/form/get_Transp/" + cedula, function(objRData){
        arrayPesca = objRData;
        if(arrayPesca.length >= 1){
            tablatransp += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Cédula</td><td>Año</td><td>Destino</td><td>Viajes</td><td>Pasajeros</td></tr>";
            for (var e = arrayPesca.length -1; e >=0; e--){
                tablatransp += "<tr><td>" + arrayPesca[e].CC + "</td><td>" + arrayPesca[e].AÑO + "</td><td>" + arrayPesca[e].DESTINO + "</td><td>" + arrayPesca[e].VIAJES + "</td><td>" + arrayPesca[e].PASAJEROS + "</td></tr>";
            }
        }else{
            $("#tableTransportadores").css("display","none");
        }
            tablatransp += "</tbody></table>";
            $("#tableTransportadores").html(tablatransp);
    });
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
            $("#tableElectro").css("display","none");
            $("#labelElectro").css("display","none");
        }
            tablaelectro += "</tbody></table>";
            $("#tableElectro").html(tablaelectro);
    });
}

//-Cargar Censo-//
function loadCenso(){
    //console.log("Censo");
    var cedula = getParameterByName("docId");
    var tablacenso = "";
    $(".modal").modal('hide');
}

//-Extraer parametros QueryString-//
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

});