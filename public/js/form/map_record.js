$(document).ready(function () {

loadRecord();

function loadRecord(){
    var tipo = getParameterByName("Mt");
    var vereda = getParameterByName("Vd");
    var municipio = getParameterByName("Mp");
    var predio = getParameterByName("Pr");
    var cod_catastral = getParameterByName("cCat");
    //Variables de tablas
    var tabmap = "";
    var tabMR = "";
    var tabMR2 = "";
    var tabPre1 = "";
    var tabPre2 = "";
    var tabVer6 = "";

    $("#lblVda").html("Vereda: " + vereda);
    $("#lblMpo").html("Municipio: " + municipio);

    //Carga de tablas iniciales
    $.getJSON("index.php/form/get_Map_Pre1/" + vereda, function(objRData){
        arrayPre1 = objRData;

        if (arrayPre1.length > 0) {
            tabPre1 += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Área</th><th scope='col'>Jornales año</th><th scope='col'>Empleos permanentes</th></tr></thead>";

            for (var i = arrayPre1.length - 1; i >= 0; i--) {
                tabPre1 += "<tr><td>" + arrayPre1[i].municipio + "</td><td>" + arrayPre1[i].VEREDA + "</td><td>" + arrayPre1[i].AREA + "</td><td>" + arrayPre1[i].JORNALES_AÑO + "</td><td>" + arrayPre1[i].empleos_permanentes + "</td></tr>";
            }

        }else{
            $("#pre1").css("display", "none");
        }

        tabPre1 += "</body></table><br/>";
        $("#tablePre1Results").html(tabPre1);
    });

    $.getJSON("index.php/form/get_Map_Pre2/" + vereda, function(objRData){
        arrayPre2 = objRData;

        if (arrayPre2.length > 0) {
            tabPre2 += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Uso del suelo</th><th scope='col'>Área</th><th scope='col'>Jornales año</th><th scope='col'>Empleos permanentes</th></tr></thead>";

            for (var i = arrayPre2.length - 1; i >= 0; i--) {
                tabPre2 += "<tr><td>" + arrayPre2[i].municipio + "</td><td>" + arrayPre2[i].VEREDA + "</td><td>" + arrayPre2[i].USO_SUELO + "</td><td>" + arrayPre2[i].AREA + "</td><td>" + arrayPre2[i].JORNALES_AÑO + "</td><td>" + arrayPre2[i].empleos_permanentes + "</td></tr>";
            }

        }else{
            $("#pre2").css("display", "none");
        }

        tabPre2 += "</body></table><br/>";
        $("#tablePre2Results").html(tabPre2);
    });

    $.getJSON("index.php/form/get_Map_Record_1/" + vereda, function(objRData){
        arrayMR1 = objRData;

        if (arrayMR1.length > 0) {
            tabMR += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Empleos permanentes</th><th scope='col'>Jornales año</th></tr></thead>";

            for (var i = arrayMR1.length - 1; i >= 0; i--) {
                tabMR += "<tr><td>" + arrayMR1[i].MUNICIPIO + "</td><td>" + arrayMR1[i].VEREDA + "</td><td>" + arrayMR1[i].EMPLEOS_PERMANENTES + "</td><td>" + arrayMR1[i].JORNALES_AÑO + "</td></tr>";
            }

        }else{
            $("#tableMapResults1").css("display", "none");
        }

        tabMR += "</body></table><br/>";
        $("#tableMapResults1").html(tabMR);
    });

    $.getJSON("index.php/form/get_Map_Record_2/" + vereda, function(objRData){
        arrayMR2 = objRData;

        if (arrayMR2.length > 0) {
            tabMR2 += "<table border='1' cellpadding='1' cellspacing='1' style='width 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Empleos permanentes</th><th scope='col'>Jornales año</th></tr></thead>";

            for (var i = arrayMR2.length - 1; i >= 0; i--) {
                tabMR2 += "<tr><td>" + arrayMR2[i].MUNICIPIO + "</td><td>" + arrayMR2[i].VEREDA + "</td><td>" + arrayMR2[i].EMPLEOS_PERMANENTES + "</td><td>" + arrayMR2[i].JORNALES_AÑO + "</td></tr>";
            }

        }else{
            $("#tableMapResults2").css("display", "none");
        }

        tabMR2 += "</body></table><br/>";
        $("#tableMapResults2").html(tabMR2);
    });

    if (tipo == "2") {
        //Vereda
        $("#imgMpo").attr("src", "https://s3.amazonaws.com/emgesa/MAPAS/VEREDAS/" + vereda + ".png");
        $("#predial").css("display", "none");

    $.getJSON("index.php/form/get_Veredas_Table_6/" + vereda + "/" + municipio, function(objRData){
        arrayTab6 = objRData;

        if (arrayTab6.length > 0) {
            tabVer6 += "<table border='1' cellpadding='1' cellspacing='1' style='width 95%'><thead><tr><th scope='col'>Nombre_predio</th><th scope='col'>Area_ha</th><th scope='col'>Area_Afectada</th><th scope='col'>Porc_Afectacion_Predio</th></tr></thead>";

            for (var i = arrayTab6.length - 1; i >= 0; i--) {
                tabVer6 += "<tr><td>" + arrayTab6[i].Nombre_Predio + "</td><td>" + arrayTab6[i].Area_ha + "</td><td>" + arrayTab6[i].Area_Afectada + "</td><td>" + arrayTab6[i].Porc_Afectacion_Predio + "</td></tr>";
            }

        }else{
            $("#tableVer6").css("display", "none");
        }

        tabVer6 += "</body></table><br/>";
        $("#tableVer6").html(tabVer6);

    });

    }else{
        //Predio
        $("#veredal").css("display", "none");
        $("#lgndTitulo").html("FICHA PREDIAL");
        console.log("predio " + predio);
        $("#imgMpo").attr("src", "https://s3.amazonaws.com/emgesa/MAPAS/PREDIOS/" + cod_catastral + ".jpg");

    $.getJSON("index.php/form/get_Predios_Table_6/" + municipio + "/" + vereda + "/" + cod_catastral , function(objRData){
        arrayTab6 = objRData;

        if (arrayTab6.length > 0) {
            //tabVer6 += "<table border='1' cellpadding='1' cellspacing='1' style='width 95%'><thead><tr><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Uso_Suelo</th><th scope='col'>Area</th><th scope='col'>Jornales_Año</th><th scope='col'>Empleos_permanentes</th></tr></thead>";
            tabVer6 += "<table border='1' cellpadding='1' cellspacing='1' style='width 95%'><thead><tr><th scope='col'>Nombre Predio</th><th scope='col'>Uso</th><th scope='col'>Área</th><th scope='col'>Jornales Año</th><th scope='col'>Empleos Permanentes</th></tr></thead>";

            for (var i = arrayTab6.length - 1; i >= 0; i--) {
                //tabVer6 += "<tr><td>" + arrayTab6[i].municipio + "</td><td>" + arrayTab6[i].vereda + "</td><td>" + arrayTab6[i].USO_SUELO + "</td><td>" + arrayTab6[i].AREA + "</td><td>" + arrayTab6[i].JORNALES_ANNIO + "</td><td>" + arrayTab6[i].empleos_permanentes + "</td></tr>";
                tabVer6 += "<tr><td>" + arrayTab6[i].Nombre_Predio + "</td><td>" + arrayTab6[i].USO + "</td><td>" + arrayTab6[i].AREA + "</td><td>" + arrayTab6[i].Jornales_anio + "</td><td>" + arrayTab6[i].empleos_permanentes + "</td></tr>";
            }

        }else{
            $("#tablePred6").css("display", "none");
        }

        tabVer6 += "</body></table><br/>";
        $("#tablePred6").html(tabVer6);

    });

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