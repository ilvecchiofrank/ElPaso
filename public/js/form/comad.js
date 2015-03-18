$(document).ready(function () {

loadCombos();
loadData();

function loadCombos(){

//Cargar lista de tipos de documento
$.getJSON("index.php/form/get_Comad_List/", function(objRData){
    $("#documento").html(objRData);
});

}

function loadData(){


//Cargar lista de comunicaciones adicionales
var formulario = getParameterByName('fId');
var tabcomad = "";

$.getJSON("index.php/form/get_Comad/" + formulario, function(objRData){
arrayComad = objRData;

if (arrayComad.length > 0){
    tabcomad += "<table border='1' cellpadding='1' cellspacing='1'><thead><tr><th scope='col'>Documento</th><th scope='col'>Fecha</th><th scope='col'>Observaciones</th><th scope='col'>Detalle</th></tr></thead><tbody>";

    for (var i = arrayComad.length - 1; i >= 0; i--) {
        tabcomad += "<tr><td>" + arrayComad[i].tipo_comunic + "</td><td>" + arrayComad[i].fecha + "</td><td>" + arrayComad[i].observaciones + "</td></tr>";
    }

    tabcomad += "</tbody></table>";

    $("#tableComad").html(tabcomad);

}else{
    $("#tableComad").css("display", "none");
}

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