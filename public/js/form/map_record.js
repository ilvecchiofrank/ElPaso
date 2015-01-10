$(document).ready(function () {

loadRecord();

function loadRecord(){
    var tipo = getParameterByName("Mt");
    var vereda = getParameterByName("Vd");
    var municipio = getParameterByName("Mp");
    var predio = getParameterByName("Pr");
    var tabmap = "";
    var tabMR = "";
    var tabMR2 = "";
    var tabPre1 = "";
    var tabPre2 = "";

    $("#lblVda").html("Vereda: " + vereda);
    $("#lblMpo").html("Municipio: " + municipio);

    //Carga de tablas iniciales
    $.getJSON("index.php/form/get_Map_Pre1/" + vereda, function(objRData){
        arrayPre1 = objRData;

        if (arrayPre1.length > 0) {
            tabPre1 += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Área</th><th scope='col'>Jornales año</th><th scope='col'>Empleos permanentes</th></tr></thead>"

            for (var i = arrayPre1.length - 1; i >= 0; i--) {
                tabPre1 += "<tr><td>" + arrayPre1[i].municipio + "</td><td>" + arrayPre1[i].VEREDA + "</td><td>" + arrayPre1[i].AREA + "</td><td>" + arrayPre1[i].JORNALES_AÑO + "</td><td>" + arrayPre1[i].empleos_permanentes + "</td></tr>";
            };

        }else{
            $("#pre1").css("display", "none");
        }

        tabPre1 += "</body></table><br/>";
        $("#tablePre1Results").html(tabPre1);
    });

    $.getJSON("index.php/form/get_Map_Pre2/" + vereda, function(objRData){
        arrayPre2 = objRData;

        if (arrayPre2.length > 0) {
            tabPre2 += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Uso del suelo</th><th scope='col'>Área</th><th scope='col'>Jornales año</th><th scope='col'>Empleos permanentes</th></tr></thead>"

            for (var i = arrayPre2.length - 1; i >= 0; i--) {
                tabPre2 += "<tr><td>" + arrayPre2[i].municipio + "</td><td>" + arrayPre2[i].VEREDA + "</td><td>" + arrayPre2[i].USO_SUELO + "</td><td>" + arrayPre2[i].AREA + "</td><td>" + arrayPre2[i].JORNALES_AÑO + "</td><td>" + arrayPre2[i].empleos_permanentes + "</td></tr>";
            };

        }else{
            $("#pre2").css("display", "none");
        }

        tabPre2 += "</body></table><br/>";
        $("#tablePre2Results").html(tabPre2);
    });

    $.getJSON("index.php/form/get_Map_Record_1/" + vereda, function(objRData){
        arrayMR1 = objRData;

        if (arrayMR1.length > 0) {
            tabMR += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Empleos permanentes</th><th scope='col'>Jornales año</th></tr></thead>"

            for (var i = arrayMR1.length - 1; i >= 0; i--) {
                tabMR += "<tr><td>" + arrayMR1[i].MUNICIPIO + "</td><td>" + arrayMR1[i].VEREDA + "</td><td>" + arrayMR1[i].EMPLEOS_PERMANENTES + "</td><td>" + arrayMR1[i].JORNALES_AÑO + "</td></tr>";
            };

        }else{
            $("#tableMapResults1").css("display", "none");
        }

        tabMR += "</body></table><br/>";
        $("#tableMapResults1").html(tabMR);
    });

    $.getJSON("index.php/form/get_Map_Record_2/" + vereda, function(objRData){
        arrayMR2 = objRData;

        if (arrayMR2.length > 0) {
            tabMR2 += "<table border='1' cellpadding='1' cellspacing='1' style='width 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Empleos permanentes</th><th scope='col'>Jornales año</th></tr></thead>"

            for (var i = arrayMR2.length - 1; i >= 0; i--) {
                tabMR2 += "<tr><td>" + arrayMR2[i].MUNICIPIO + "</td><td>" + arrayMR2[i].VEREDA + "</td><td>" + arrayMR2[i].EMPLEOS_PERMANENTES + "</td><td>" + arrayMR2[i].JORNALES_AÑO + "</td></tr>"
            };

        }else{
            $("#tableMapResults2").css("display", "none");
        }

        tabMR2 += "</body></table><br/>";
        $("#tableMapResults2").html(tabMR2);
    });

    if (tipo == "2") {
        //Vereda
        $("#imgMpo").attr("src", "public/img/veredas/" + vereda + ".png");
        $("#predial").css("display", "none");
    }else{
        //Predio
        $("#veredal").css("display", "none");
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