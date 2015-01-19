$(document).ready(function () {

loadPred();

function loadPred(){
    var tabpred = "";
    var tabfont = "";
    var formulario = getParameterByName("formCode");
    $.getJSON("index.php/form/get_Pred/" + formulario , function(objRData){
        arrayPred = objRData;
        if (arrayPred.length > 0){
            tabpred += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>Código Municipio</th><th scope='col'>Municipio</th><th scope='col'>Vereda</th><th scope='col'>Predio</th><th scope='col'>Propietario</th><th scope='col'>Código Catastral</th><th scope='col'>Fuente</th><th scope='col'>Año</th><th scope='col'>Detalle</th></tr></thead><tbody>";
            for (var c = arrayPred.length -1; c >=0; c--){
                var ruta = "http://localhost/pmapper/map_default.phtml";
                var ruta2 = "index.php/form/map_record?Mt=1&Pr=";
                var ruta3 = "index.php/form/map_record?Mt=2&Vd=";
                tabpred += "<tr><td>" + arrayPred[c].mpo_cod + "</td><td>" + arrayPred[c].municipio + "</td><td>" + arrayPred[c].vereda + "</td><td>" + arrayPred[c].predio + "</td><td>" + arrayPred[c].propietario + "</td><td>" + arrayPred[c].cod_catastral + "</td><td>" + arrayPred[c].fuente + "</td><td>" + arrayPred[c].annio + "</td><td>" + "<a href='" + ruta3 + arrayPred[c].vereda + "&Mp=" + arrayPred[c].municipio + "' target='_blank' class='btn btn-warning'>Ver Ficha Veredal</a>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Geo</a>" + "<a href='" + ruta2 + arrayPred[c].predio + "&Vd=" + arrayPred[c].vereda + "&Mp=" + arrayPred[c].municipio + "&cCat=" + arrayPred[c].cod_catastral + "' target='_blank' class='btn btn-info'>Ver Ficha Predial</a>" + "</td></tr>";
            }
        }
        else
        {
            $("#pred").css("display","none");
        }

        tabpred += "</body></table><br/>";
        $("#tablePredResults").html(tabpred);
    });

    $.getJSON("index.php/form/get_Pred_Font/" + formulario, function(objRData){
        arrayPredFont = objRData;
        if (arrayPredFont.length > 0) {
            tabfont += "<table border='1' cellpadding='1' cellspacing='1' style='width: 95%'><thead><tr><th scope='col'>FECH</th><th scope='col'>C</th><th scope='col'>F.I</th><th scope='col'>F.F</th><th scope='col'>TIPO_P</th><th scope='col'>NOMBRE</th><th scope='col'>DOC</th><th scope='col'>NIT_P</th><th scope='col'>NOM</th><th scope='col'>NIT</th><th scope='col'>DESC</th><th scope='col'>VALOR</th><th scope='col'>U</th><th scope='col'>C</th><th scope='col'>DES</th><th scope='col'>DIREC</th><th scope='col'>Z</th><th scope='col'>B</th><th scope='col'>TIPO</th><th scope='col'>OTRA</th><th scope='col'>PER</th><th scope='col'>NOMBR</th><th scope='col'>CARG</th><th scope='col'>OBS</th><th scope='col'>M</th><th scope='col'>V</th><th scope='col'>P</th><th scope='col'>OTR</th><th scope='col'>OT</th><th scope='col'>OT</th><th scope='col'>COD</th><th scope='col'>Detalle</th></tr></thead>";

            for (var i = arrayPredFont.length - 1; i >= 0; i--) {
                var ruta = "http://localhost/pmapper/map_default.phtml";
                var ruta2 = "index.php/form/map_record?Mt=1&Pr=";
                var ruta3 = "index.php/form/map_record?Mt=2&Vd=";
                tabfont += "<tr><td>" + arrayPredFont[i].FECHA_EXPEDICION + "</td><td>" + arrayPredFont[i].CARGO + "</td><td>" + arrayPredFont[i].FECHA_INICIO + "</td><td>" + arrayPredFont[i].FECHA_FIN + "</td><td>" + arrayPredFont[i].TIPO_PERSONA_JURIDICA + "</td><td>" + arrayPredFont[i].NOMBRE_PERSONA_JURIDICA  + "</td><td>" + arrayPredFont[i].DOC_IDENTIFICACION + "</td><td>" + arrayPredFont[i].NIT_PERSONA_JURIDICA + "</td><td>" + arrayPredFont[i].NOMBRE_EMPRESA + "</td><td>" + arrayPredFont[i].NIT_EMPRESA + "</td><td>" + arrayPredFont[i].DESCRIP_RELACION + "</td><td>" + arrayPredFont[i].VALORES_CERTIFICADOS  + "</td><td>" + arrayPredFont[i].UNIDADES + "</td><td>" + arrayPredFont[i].CANTIDAD + "</td><td>" + arrayPredFont[i].DESCRIP_UNIDADES + "</td><td>" + arrayPredFont[i].DIRECCION_CERTIFICACION + "</td><td>" + arrayPredFont[i].ZONA + "</td><td>" + arrayPredFont[i].BARRIO + "</td><td>" + arrayPredFont[i].TIPO_CERTIFICACION + "</td><td>" + arrayPredFont[i].OTRA_DESCRIP_UNIDADES + "</td><td>" + arrayPredFont[i].PERSONA_FIGURA + "</td><td>" + arrayPredFont[i].NOMBRE_PERSONA_FIRMA + "</td><td>" + arrayPredFont[i].CARGO_PERSONA_FIRMA + "</td><td>" + arrayPredFont[i].OBSERVACIONES + "</td><td>" + arrayPredFont[i].MUNICIPIO + "</td><td>" + arrayPredFont[i].VEREDA + "</td><td>" + arrayPredFont[i].PREDIO + "</td><td>" + arrayPredFont[i].OTRO_MUNICIPIO + "</td><td>" + arrayPredFont[i].OTRA_VEREDA + "</td><td>" + arrayPredFont[i].OTRO_PREDIO + "</td><td>" + arrayPredFont[i].COD_CATASTRAL + "</td><td>" + "<a href='" + ruta3 + arrayPredFont[i].VEREDA + "&Mp=" + arrayPredFont[i].MUNICIPIO + "' target='_blank' class='btn btn-warning'>Ver Ficha Veredal</a>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Geo</a>" + "<a href='" + ruta2 + arrayPredFont[i].PREDIO + "&Vd=" + arrayPredFont[i].VEREDA + "&Mp=" + arrayPredFont[i].MUNICIPIO + "&cCat=" + arrayPredFont[i].COD_CATASTRAL  + "' target='_blank' class='btn btn-info'>Ver Ficha Predial</a>" + "</td></tr>";
            }

        }else{
            $("#font").css("display","none");
        }

        tabfont += "</body></table><br/>";
        $("#tableFontResults").html(tabfont);
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