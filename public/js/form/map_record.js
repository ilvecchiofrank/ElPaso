$(document).ready(function () {

loadRecord();

function loadRecord(){
    var tipo = getParameterByName("Mt");
    var vereda = getParameterByName("Vd");
    var municipio = getParameterByName("Mp");
    var tabmap = "";

    $("#lblVda").html("Vereda: " + vereda);
    $("#lblMpo").html("Municipio: " + municipio);

    if (tipo == "2") {
        //Vereda
        $("#lgndTitulo").html("Ficha Veredal:");
        $("#lblSubTitulo").html("Información a nivel Vereda");
        $("#imgMpo").attr("src", "public/img/veredas/" + vereda + ".png");
        console.log(vereda);
    }else{
        //Predio
        $("#lgndTitulo").html("Ficha Predial:");
        $("#lblSubTitulo").html("Información a nivel Predio");
        var predio = getParameterByName("Pr");
        console.log(predio);
    }


    // $.getJSON("index.php/form/get_Cce", function(objRData){
    //     arrayCce = objRData;

    //     if (arrayCce.length > 0){
    //         tabcce += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Observaciones</th><th scope='col'>Detalle</th></tr></thead><tbody>";

    //         for (var c = arrayCce.length -1; c >=0; c--){
    //             var ruta = prefijoArch + arrayCce[c].path;
    //             tabcce += "<tr><td>" + arrayCce[c].tipologia_id + "</td><td>" + arrayCce[c].categoria_id + "</td><td>" + arrayCce[c].observaciones + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
    //         }
    //     }
    //     else
    //     {
    //         $("#cce").css("display","none");
    //     }

    //     tabcce += "</body></table><br/>";
    //     $("#tableCceResults").html(tabcce);
    // });
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