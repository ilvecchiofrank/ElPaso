$(document).ready(function () {
    loadData();
    var actId = 0;
});

function loadData(){

    //Asignar variable ID
    var dissect = window.location.pathname.split("/");
    actId = dissect[dissect.length-1];

    if (actId == 0) {
        console.log("No especificado");
        return;
    }

    //Cargar detalle del reporte
    $.getJSON("index.php/reports/get_Report_By_Id/" + actId, function(objRData) {
        arrReporte = objRData;

        if (arrReporte.length > 0) {
            $("#lblDepto").text(arrReporte[0].dpto);
            $("#lblMpo").text(arrReporte[0].mpo);
            $("#lblTypeActivity").text(arrReporte[0].act_tipo);
            $("#lblSiteName").text(arrReporte[0].sitionombre);
            $("#lblActivity").text(arrReporte[0].actividaddescripcion);
            $("#lblFIni").text(arrReporte[0].fechaini);
            $("#lblFFin").text(arrReporte[0].fechafin);
            $("#lblHIni").text(arrReporte[0].horainicio);
            $("#lblHFin").text(arrReporte[0].horafin);
        }

    });

    //Cargar municipios de cobertura reporte
    $.getJSON("index.php/reports/get_Cobertura_By_Id/" + actId, function(objRData) {
        arrReporte = objRData;
        var table = "<table><tr><td>Departamento</td><td>Municipio</td></tr>"

        if (arrReporte.length > 0) {
            for (var i = arrReporte.length - 1; i >= 0; i--) {
                table += "<tr><td>" + arrReporte[i].depto + "</td><td>" + arrReporte[i].mpo + "</td></tr>";
            };

            table += "</table>"
            $("#tblDetails").html(table);
        }

    });

    //Cargar archivos de soporte
    $.getJSON("index.php/reports/get_Soporte_By_Id/" + actId, function(objRData) {
        arrReporte = objRData;
        var table = "<table><tr><td>Tipo Soporte</td><td>Nombre del Soporte</td><td>Descripción</td><td>Consultar Soporte</td></tr>"

        if (arrReporte.length > 0) {
            for (var i = arrReporte.length - 1; i >= 0; i--) {
                table += "<tr><td>" + arrReporte[i].soportetxt + "</td><td>" + arrReporte[i].nombre + "</td><td>" + arrReporte[i].descripcion + "</td><td>" +  "<a id='btnTutela' href=" + arrReporte[i].linkdescargasoporte + " class='btn btn-success btn-md'>Ver</a>" + "</td></tr>";
            };

            table += "</table>"
            $("#tblSupport").html(table);
        }

    });

    //Cargar participantes
    $.getJSON("index.php/reports/get_Personas_By_Id/" + actId, function(objRData) {
        arrReporte = objRData;
        var table = "<table><tr><td>Nombres</td><td>Apellidos</td><td>Sexo</td><td>No. Documento</td><td>Dpto. Residencia</td><td>Mpo. Residencia</td><td>Teléfono</td><td>Celular</td></tr>"

        if (arrReporte.length > 0) {
            for (var i = arrReporte.length - 1; i >= 0; i--) {
                table += "<tr><td>" + arrReporte[i].nombres + "</td><td>" + arrReporte[i].apellidos + "</td><td>" + arrReporte[i].sexo + "</td><td>" + arrReporte[i].nodocumento + "</td><td>" + arrReporte[i].depto + "</td><td>" + arrReporte[i].mpo + "</td><td>" + arrReporte[i].telefono + "</td><td>" + arrReporte[i].celular + "</td></tr>";
            };

            table += "</table>"
            $("#tblAssistants").html(table);
        }

    });

    //Cargar total participantes
    $.getJSON("index.php/reports/get_Total_Personas_By_Id/" + actId, function(objRData) {
        arrReporte = objRData;

        if (arrReporte.length > 0) {
            $("#tblTotalAssistants").text("Total Personas: " + arrReporte[0].conteo);
        }

    });

}

