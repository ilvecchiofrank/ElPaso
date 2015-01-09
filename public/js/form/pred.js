$(document).ready(function () {

loadPred();

function loadPred(){
    var tabpred = "";
    var formulario = getParameterByName("formCode");
    $.getJSON("index.php/form/get_Pred/" + formulario , function(objRData){
        arrayPred = objRData;
        if (arrayPred.length > 0){
            tabpred += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Código Municipio</th><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Predio</th><th scope='col'>Propietario</th><th scope='col'>Código Catastral</th><th scope='col'>Fuente</th><th scope='col'>Año</th></tr></thead><tbody>";

            for (var c = arrayPred.length -1; c >=0; c--){
                tabpred += "<tr><td>" + arrayPred[c].mpo_cod + "</td><td>" + arrayPred[c].mpo + "</td><td>" + arrayPred[c].vereda + "</td><td>" + arrayPred[c].predio + "</td><td>" + arrayPred[c].propietario + "</td><td>" + arrayPred[c].cod_catastral + "</td><td>" + arrayPred[c].fuente + "</td><td>" + arrayPred[c].annio + "</td></tr>";
            }
        }
        else
        {
            $("#pred").css("display","none");
        }

        tabpred += "</body></table><br/>";
        $("#tablePredResults").html(tabpred);
        //$(".modal").modal('hide');
    });
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