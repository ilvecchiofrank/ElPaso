$(document).ready(function() {

    $("#txtCedula").html(getParameterByName("docId"));

    $(".modal").modal('show');
    loadEmpleo();
    loadResid();
    loadNoResid();
    loadPesca();
    loadTransp();
    loadElectro();
    loadSalvoconducto();
    loadAprobForestal();
    $(".modal").modal('hide');
});
//loadCenso();

//-Cargar Empleo-//
function loadEmpleo() {
    console.log("Empleo");
    var cedula = getParameterByName("docId");
    var tablaempleo = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Empleo/" + cedula, function(objRData) {
        arrayEmpleo = objRData;
        if (arrayEmpleo.length >= 1) {
            tablaempleo += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Fecha</td><td>Cargo</td><td>Número de contrato</td><td>Tipo de contrato</td><td>Fecha de contratación</td><td>Fecha de terminación de contrato</td></tr>";
            for (var e = arrayEmpleo.length - 1; e >= 0; e--) {
                tablaempleo += "<tr><td>" + arrayEmpleo[e].FECHA + "</td><td>" + arrayEmpleo[e].Cargo + "</td><td>" + arrayEmpleo[e].N_Contrato + "</td><td>" + arrayEmpleo[e].Tipo_Contrato + "</td><td>" + arrayEmpleo[e].Fecha_Contratacion + "</td><td>" + arrayEmpleo[e].Fecha_Terminacion_Contrato + "</td></tr>";
            }
        } else {
            $("#tableEmpleo").css("display", "none");
        }
        tablaempleo += "</tbody></table>";
        $("#tableEmpleo").html(tablaempleo);
    });
    //$(".modal").modal('hide');
}

//-Cargar Compensación Residentes-//
function loadResid() {
    //console.log("Residentes");
    var cedula = getParameterByName("docId");
    var tablaresid = "";
}

//-Cargar Compensación No Residentes-//
function loadNoResid() {
    console.log("No residentes");
    var cedula = getParameterByName("docId");
    var tablanoresid = "";
    $.getJSON("index.php/form/get_No_Residentes/" + cedula, function(objRData) {
        arrayNr = objRData;
        if (arrayNr.length >= 1) {
            tablanoresid += "<table border ='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Nombres</td><td>Empleado</td><td>Municipio</td><td>Vereda</td><td>Nombre Predio</td><td>Propietarios</td><td>Nombre Encuestado</td></tr>";
            for (var i = arrayNr.length - 1; i >= 0; i--) {
                tablanoresid += "<tr><td>" + arrayNr[i].Nombres_trabajadores + "</td><td>" + arrayNr[i].Empleado_Contratista + "</td><td>" + arrayNr[i].Municipio + "</td><td>" + arrayNr[i].Vereda + "</td><td>" + arrayNr[i].Nombre_Predio + "</td><td>" + arrayNr[i].Propietarios + "</td><td>" + arrayNr[i].Nombre_Encuestado + "</td></tr>";
            }
        } else {
            $("#tableCompNoResidentes").css("display", "none");
        }
        tablanoresid += "</tbody></table>";
        $("#tableCompNoResidentes").html(tablanoresid);
    });
}

//-Cargar Pescadores-//
function loadPesca() {
    console.log("Pesca");
    var cedula = getParameterByName("docId");
    var tablapesca = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Pesca/" + cedula, function(objRData) {
        arrayPesca = objRData;
        if (arrayPesca.length >= 1) {
            tablapesca += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Cédula</td><td>Asociación</td><td>Arte de pesca</td><td>Número ICA</td><td>Tramo</td><td>Zona de pesca</td></tr>";
            for (var e = arrayPesca.length - 1; e >= 0; e--) {
                tablapesca += "<tr><td>" + arrayPesca[e].CC + "</td><td>" + arrayPesca[e].ASOCIACION + "</td><td>" + arrayPesca[e].ARTE_PESCA + "</td><td>" + arrayPesca[e].No_ICA + "</td><td>" + arrayPesca[e].TRAMO + "</td><td>" + arrayPesca[e].ZONA_PESCA + "</td></tr>";
            }
        } else {
            $("#tablePescadores").css("display", "none");
        }
        tablapesca += "</tbody></table>";
        $("#tablePescadores").html(tablapesca);
    });
    //$(".modal").modal('hide');
}

//-Cargar Transportadores-//
function loadTransp() {
    console.log("Transp");
    var cedula = getParameterByName("docId");
    var tablatransp = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Transp/" + cedula, function(objRData) {
        arrayPesca = objRData;
        if (arrayPesca.length >= 1) {
            tablatransp += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Cédula</td><td>Año</td><td>Destino</td><td>Viajes</td><td>Pasajeros</td></tr>";
            for (var e = arrayPesca.length - 1; e >= 0; e--) {
                tablatransp += "<tr><td>" + arrayPesca[e].CC + "</td><td>" + arrayPesca[e].AÑO + "</td><td>" + arrayPesca[e].DESTINO + "</td><td>" + arrayPesca[e].VIAJES + "</td><td>" + arrayPesca[e].PASAJEROS + "</td></tr>";
            }
        } else {
            $("#tableTransportadores").css("display", "none");
        }
        tablatransp += "</tbody></table>";
        $("#tableTransportadores").html(tablatransp);
    });
    //$(".modal").modal('hide');
}

//-Cargar ElectroHuila-//
function loadElectro() {
    console.log("Electro");
    var cedula = getParameterByName("docId");
    var tablaelectro = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Electro/" + cedula, function(objRData) {
        arrayElectro = objRData;
        console.log(arrayElectro);
        if (arrayElectro.length >= 1) {
            tablaelectro += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Año</td><td>Mes</td><td>Municipio</td><td>Ubicación</td><td>Cédula</td><td>Dirección</td><td>Contador</td><td>Fecha Matricula</td></tr>";
            for (var e = arrayElectro.length - 1; e >= 0; e--) {
                tablaelectro += "<tr><td>" + arrayElectro[e].Año + "</td><td>" + arrayElectro[e].Mes + "</td><td>" + arrayElectro[e].Mpio + "</td><td>" + arrayElectro[e].Ubicacion + "</td><td>" + arrayElectro[e].CC + "</td><td>" + arrayElectro[e].Direccion + "</td><td>" + arrayElectro[e].Contador + "</td><td>" + arrayElectro[e].Fecha_Matricula + "</td></tr>";
            }
        } else {
            $("#tableElectro").css("display", "none");
            $("#labelElectro").css("display", "none");
        }
        tablaelectro += "</tbody></table>";
        $("#tableElectro").html(tablaelectro);
    });
    //$(".modal").modal('hide');
}

//-Cargar Salvoconductos-//
function loadSalvoconducto() {
    console.log("Salvoconducto");
    var cedula = getParameterByName("docId");
    var tableSalvoconducto = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Salvoconducto/" + cedula, function(objRData) {
        var arraySalvoconducto = objRData;
        console.log(arraySalvoconducto);
        if (arraySalvoconducto.length >= 1) {
            tableSalvoconducto += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>titular_aprov</td><td>volumen_mtcub</td><td>mun_proclegal</td><td>vda_proclegal</td><td>mun_origen_rutamovil</td><td>mun_destino_rutamovil</td><td>especie</td><td>vig_desde</td><td>vig_hasta</td></tr>";
            for (var e = arraySalvoconducto.length - 1; e >= 0; e--) {
                tableSalvoconducto += "<tr><td>" + arraySalvoconducto[e].titular_aprov + "</td><td>" + arraySalvoconducto[e].volumen_mtcub + "</td><td>" + arraySalvoconducto[e].mun_proclegal + "</td><td>" + arraySalvoconducto[e].vda_proclegal + "</td><td>" + arraySalvoconducto[e].mun_origen_rutamovil + "</td><td>" + arraySalvoconducto[e].mun_destino_rutamovil + "</td><td>" + arraySalvoconducto[e].especie + "</td><td>" + arraySalvoconducto[e].vig_desde + "</td><td>" + arraySalvoconducto[e].vig_hasta + "</td></tr>";
            }
        } else {
            $("#tableSalvoconducto").css("display", "none");
            $("#tableSalvoconducto").css("display", "none");
        }
        tableSalvoconducto += "</tbody></table>";
        $("#tableSalvoconducto").html(tableSalvoconducto);
    });
    //$(".modal").modal('hide');
}

//-Cargar Salvoconductos-//
function loadAprobForestal() {
    console.log("AprobForestal");
    var cedula = getParameterByName("docId");
    var tableAprovechamientoForestal = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_AprobForestal/" + cedula, function(objRData) {
        var array = objRData;
        console.log(array);
        if (array.length >= 1) {
            tableAprovechamientoForestal += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>dir_territorial</td><td>rad_solicitud</td><td>fecha_rad</td><td>tramite</td><td>nombre_usuario</td><td>apellido_usuario</td><td>mun_predio</td><td>vda_predio</td><td>rad_expediente</td></tr>";
            for (var e = array.length - 1; e >= 0; e--) {
                tableAprovechamientoForestal += "<tr><td>" + array[e].dir_territorial + "</td><td>" + array[e].rad_solicitud + "</td><td>" + array[e].fecha_rad + "</td><td>" + array[e].tramite + "</td><td>" + array[e].nombre_usuario + "</td><td>" + array[e].apellido_usuario + "</td><td>" + array[e].mun_predio + "</td><td>" + array[e].vda_predio + "</td><td>" + array[e].rad_expediente + "</td></tr>";
            }
        } else {
            $("#tableAprovechamientoForestal").css("display", "none");
            $("#tableAprovechamientoForestal").css("display", "none");
        }
        tableAprovechamientoForestal += "</tbody></table>";
        $("#tableAprovechamientoForestal").html(tableAprovechamientoForestal);
    });
    //$(".modal").modal('hide');
}

//-Extraer parametros QueryString-//
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

