$(document).ready(function () {

loadPred();

function loadPred(){
    var tabpred = "";
    var formulario = getParameterByName("formCode");
    $.getJSON("index.php/form/get_Pred/" + formulario , function(objRData){
        arrayPred = objRData;
        if (arrayPred.length > 0){
            tabpred += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Formulario</th><th scope='col'>Pregunta</th><th scope='col'>Fecha</th><th scope='col'>Estado</th><th scope='col'>a09O01</th><th scope='col'>a09O02</th><th scope='col'>a09O03</th><th scope='col'>a09O04</th><th scope='col'>a09O05</th><th scope='col'>a09O06</th><th scope='col'>a09O07</th><th scope='col'>a09O08</th><th scope='col'>a09O09</th><th scope='col'>a09O10</th><th scope='col'>Código catastral</th></tr></thead><tbody>";

            for (var c = arrayPred.length -1; c >=0; c--){
                tabpred += "<tr><td>" + arrayPred[c].a09Formulario + "</td><td>" + arrayPred[c].a09Pregunta + "</td><td>" + arrayPred[c].a09Fecha + "</td><td>" + arrayPred[c].a09Estado + "</td><td>" + arrayPred[c].a09O01 + "</td><td>" + arrayPred[c].a09O02 + "</td><td>" + arrayPred[c].a09O03 + "</td><td>" + arrayPred[c].a09O04 + "</td><td>" + arrayPred[c].a09O05 + "</td><td>" + arrayPred[c].a09O06 + "</td><td>" + arrayPred[c].a09O07 + "</td><td>" + arrayPred[c].a09O08 + "</td><td>" + arrayPred[c].a09O09 + "</td><td>" + arrayPred[c].a09O10 + "</td><td>" + arrayPred[c].cod_catastral + "</td></tr>";
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