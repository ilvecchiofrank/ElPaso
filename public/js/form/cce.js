$(document).ready(function () {

//-Prediligenciar tipologia y categoria-//
//var tipo = getParameterByName("tId");
//var categ = getParameterByName("cId");
// $("#tipologia").val(1);
// $("#categoria").val(1);

loadCombos();
loadCce();

function loadCombos(){
    //Cargar listado de tipologias
    $.getJSON("index.php/form/get_Tipologias_List/", function(objRData){
        $("#tipologia").html(objRData);
    });

    $("#tipologia").change(function() {
        //Cargar listado de categorias
        var tipo = $("#tipologia").val();
        $.getJSON("index.php/form/get_Categorias_List/" + tipo , function(objRData){
            $("#categoria").html(objRData);
        });
    });

    $("#categoria").change(function(){
        //Actualizar tabla
        var tipo = $("#tipologia").val();
        var cat = $("#categoria").val();
        var tabcce ="";
        var prefijoArch = "https://s3.amazonaws.com/emgesa/CONCEPTOS_COMITE_EXPERTOS/";

        $.getJSON("index.php/form/get_Filtered_Cce/" + tipo + "/" + cat, function(objRData){
        arrayCce = objRData;

        if (arrayCce.length > 0){
            tabcce += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Observaciones</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var c = arrayCce.length -1; c >=0; c--){
                var ruta = prefijoArch + arrayCce[c].path;
                tabcce += "<tr><td>" + arrayCce[c].tipologia_id + "</td><td>" + arrayCce[c].categoria_id + "</td><td>" + arrayCce[c].observaciones + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }
            $("#cce").css("display","block");
        }
        else
        {
            $("#cce").css("display","none");
        }

        tabcce += "</body></table><br/>";
        $("#tableCceResults").html(tabcce);
        });
    });

}

function loadCce(){
    var tabcce = "";
    var prefijoArch = "https://s3.amazonaws.com/emgesa/CONCEPTOS_COMITE_EXPERTOS/";
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Cce", function(objRData){
        arrayCce = objRData;

        if (arrayCce.length > 0){
            tabcce += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Observaciones</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var c = arrayCce.length -1; c >=0; c--){
                var ruta = prefijoArch + arrayCce[c].path;
                tabcce += "<tr><td>" + arrayCce[c].tipologia_id + "</td><td>" + arrayCce[c].categoria_id + "</td><td>" + arrayCce[c].observaciones + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
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
});