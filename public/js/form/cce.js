$(document).ready(function () {

loadCce();

function loadCce(){
    var tabcce = "";
    var prefijoArch = "https://s3.amazonaws.com/emgesa/CONCEPTOS_COMITE_EXPERTOS/";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Cce", function(objRData){
        arrayCce = objRData;

        if (arrayCce.length > 0){
            tabcce += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var c = arrayCce.length -1; c >=0; c--){
                var ruta = prefijoArch + arrayCce[c].path;
                console.log(c + "-" + arrayCce[c].path);
                tabcce += "<tr><td>" + arrayCce[c].tipologia_id + "</td><td>" + arrayCce[c].categoria_id + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>"
            }
        }
        else
        {
            $("#cce").css("display","none");
        }

        tabcce += "</body></table><br/>";
        $("#tableCceResults").html(tabcce);
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
})