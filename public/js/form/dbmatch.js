$(document).ready(function() {

    $("#txtCedula").html(getParameterByName("docId"));

    loadEmpleo();
    loadResid();
    loadNoResid();
    loadPesca();
    loadTransp();
    loadElectro();
    loadBovinaICA();
    loadMatadero_Gte();
    loadExpendedores_Carne_Gte();
    loadSalvoconducto();
    loadAprobForestal();
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

//-Cargar Bovina ICA-//
function loadBovinaICA() {
    console.log("BovinaICA");
    var cedula = getParameterByName("docId");
    var tablabovina = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_BovinaICA/" + cedula, function(objRData) {
        arrayBovina = objRData;
        if (arrayBovina.length >= 1) {
            tablabovina += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Num</td><td>No Guía</td><td>Fecha</td><td>Autoriza a</td><td>C.C.</td><td>Finca Origen</td><td>Propietario Finca</td><td>Mun Finca Orig</td><td>Dpto Finca Orig</td><td>Finca Destino</td><td>Prop. Finca Destino</td><td>Mun. Finca Destino</td><td>Depto. Finca Destino</td><td>Especie</td><td>Total Animales</td><td>Placa Vehiculo</td><td>Empresa</td><td>Ruta</td><td>Conductor</td><td>Cédula</td></tr>";
            for (var e = arrayBovina.length - 1; e >= 0; e--) {
                tablabovina += "<tr><td>" + arrayBovina[e].num + "</td><td>" + arrayBovina[e].no_guia + "</td><td>" + arrayBovina[e].fecha + "</td><td>" + arrayBovina[e].autoriza_a + "</td><td>" + arrayBovina[e].cc + "</td><td>" + arrayBovina[e].finca_origen + "</td><td>" + arrayBovina[e].propietario_finca_orig + "</td><td>" + arrayBovina[e].mun_finca_orig + "</td><td>" + arrayBovina[e].dpto_finca_orig + "</td><td>" + arrayBovina[e].finca_destino + "</td><td>" + arrayBovina[e].propietario_finca_dest + "</td><td>" + arrayBovina[e].mun_finca_dest + "</td><td>" + arrayBovina[e].depto_finca_dest + "</td><td>" + arrayBovina[e].especie + "</td><td>" + arrayBovina[e].total_animales + "</td><td>" + arrayBovina[e].placa_vehiculo + "</td><td>" + arrayBovina[e].empresa + "</td><td>" + arrayBovina[e].ruta + "</td><td>" + arrayBovina[e].conductor + "</td><td>" + arrayBovina[e].cedula + "</td></tr>";
            }
        } else {
            $("#tableBovinaIca").css("display", "none");
            $("#labelBovinaIca").css("display", "none");
        }
        tablabovina += "</tbody></table>";
        $("#tableBovinaIca").html(tablabovina);
    });
    //$(".modal").modal('hide');
}

//-Cargar Matadero_Gte-//
function loadMatadero_Gte() {
    console.log("Matadero_Gte");
    var cedula = getParameterByName("docId");
    var tablamataderogte = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Matadero_Gte/" + cedula, function(objRData) {
        arrayMatadero = objRData;
        if (arrayMatadero.length >= 1) {
            tablamataderogte += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Nombres</td><td>Cedula</td><td>Teléfono</td></tr>";
            for (var e = arrayMatadero.length - 1; e >= 0; e--) {
                tablamataderogte += "<tr><td>" + arrayMatadero[e].nombres + "</td><td>" + arrayMatadero[e].cc + "</td><td>" + arrayMatadero[e].telefono + "</td></tr>";
            }
        } else {
            $("#tableMataderoGigante").css("display", "none");
            $("#labelMataderoGigante").css("display", "none");
        }
        tablamataderogte += "</tbody></table>";
        $("#tableMataderoGigante").html(tablamataderogte);
    });
    //$(".modal").modal('hide');
}

//-Cargar Expendedores_Carne_Gte-//
function loadExpendedores_Carne_Gte() {
    console.log("Expendedores_Carne_Gte");
    var cedula = getParameterByName("docId");
    var tablaexpendedoresgte = "";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Expendedores_Carne_Gte/" + cedula, function(objRData) {
        arrayExp = objRData;
        if (arrayExp.length >= 1) {
            tablaexpendedoresgte += "<table border='1' cellpadding='0' cellspacing='0' style='width: 95%;'><tbody><tr><td>Censo</td><td>Inscrip.</td><td>Razón Social</td><td>Nombres Propietario</td><td>CC. Nit</td><td>Teléfono</td><td>Dirección</td><td>Carne Res</td><td>Pollo</td><td>Pescado</td><td>Cerdo</td><td>Vísceras Blancas</td><td>Cabezas</td><td>Bufalo</td><td>Vísceras Rojas</td><td>Independiente</td><td>Super Mini</td><td>Plaza</td><td>Realiza Inscripción</td></tr>";
            for (var e = arrayExp.length - 1; e >= 0; e--) {
                tablaexpendedoresgte += "<tr><td>" + arrayExp[e].censo + "</td><td>" + arrayExp[e].inscrip + "</td><td>" + arrayExp[e].razon_social + "</td><td>" + arrayExp[e].nombres_propietario + "</td><td>" + arrayExp[e].cc_nit + "</td><td>" + arrayExp[e].telefono + "</td><td>" + arrayExp[e].direccion + "</td><td>" + arrayExp[e].carne_res +  "</td><td>" + arrayExp[e].pollo + "</td><td>" + arrayExp[e].pescado + "</td><td>" + arrayExp[e].cerdo + "</td><td>" + arrayExp[e].visceras_blancas + "</td><td>" + arrayExp[e].cabezas + "</td><td>" + arrayExp[e].bufalo + "</td><td>" + arrayExp[e].visceras_rojas + "</td><td>" + arrayExp[e].independiente + "</td><td>" + arrayExp[e].super_minimercado +  "</td><td>" + arrayExp[e].plaza_mercado +  "</td><td>" + arrayExp[e].realiza_inscripcion_sanitaria + "</td></tr>";
            }
        } else {
            $("#tableExpendedoresCarneGigante").css("display", "none");
            $("#labelExpendedoresCarneGigante").css("display", "none");
        }
        tablaexpendedoresgte += "</tbody></table>";
        $("#tableExpendedoresCarneGigante").html(tablaexpendedoresgte);
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

$(document).ajaxStart(function() {
    $(".modal").modal('show');
}).ajaxStop(function() {
    $(".modal").modal('hide');
});