$(document).ready(function () {

console.log("<");
loadReport(getParameterByName("tId"));
console.log(">");

function loadReport(tipo){
console.log(tipo);
    switch(tipo){

        case '1':
        $("#lgndTitle").html("Reporte General");
        loadReportData(tipo);
        break;

        case '2':
        $("#lgndTitle").html("Reporte General Redactor");
        loadReportData(tipo);
        break;

        case '3':
        $("#lgndTitle").html("Reporte General Coordinador");
        loadReportData(tipo);
        break;

        case '4':
        $("#lgndTitle").html("Reporte General Validador Jurídico");
        loadReportData(tipo);
        break;

        case '5':
        $("#lgndTitle").html("Reporte General Gerente");
        loadReportData(tipo);
        break;

        default:
        console.log(":(");
        break;
    }

}

function loadReportData(reporte){
    var tablareporte = "";

/*   $.getJSON("index.php/form/get_Pqr/" + cedula, function(objRData){
        arrayPqrs = objRData;

        if(arrayPqrs.length >= 1){

            tablapqr += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipo</th><th scope='col'>Año</th><th scope='col'>Radicado</th><th scope='col'>Caso</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var p = arrayPqrs.length -1; p >=0; p--){
                var ruta = arrayPqrs[p].path.replace("Q:emgesaCD/", "https://emgesa.s3.amazonaws.com/CD/");
                tablapqr += "<tr><td>" + arrayPqrs[p].tipo + "</td><td>" + arrayPqrs[p].año + "</td><td>" + arrayPqrs[p].radicado + "</td><td>" + arrayPqrs[p].caso + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }

        }
        else
        {
            $("tablePqrsResults").css("display","none");
        }

        tablapqr += "</tbody></table><br/>";
        $("#tablePqrsResults").html(tablapqr);
    });*/

}

//-Extraer parametros QueryString-//
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

});


$(document).ajaxStart(function() {
    $(".modal").modal('show');
}).ajaxStop(function() {
    $(".modal").modal('hide');
});