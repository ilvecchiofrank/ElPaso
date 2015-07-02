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

}

