$(document).ready(function () {

loadSup();

function loadSup(){
    var tabsup = "";
    var prefijoArch = "https://emgesa.s3.amazonaws.com/CONCEPTOS_DE_SOPORTE/";
    $.getJSON("index.php/form/get_Supp_con", function(objRData){
        arraySup = objRData;

        if (arraySup.length > 0){
            tabsup += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Descripción</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var c = arraySup.length -1; c >=0; c--){
                var ruta = prefijoArch + arraySup[c].path;
                tabsup += "<tr><td>" + arraySup[c].descripcion + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>"
            }
        }
        else
        {
            $("#supp_con").css("display","none");
        }

        tabsup += "</body></table><br/>";
        $("#tableSupp_conResults").html(tabsup);
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