$(document).ready(function () {

var rol = getParameterByName("uT");

loadDash();

//loadTutelas();

function loadDash(){
    var uid = getParameterByName("uI");
    var tabLetters = "";
    var totalStats = 0;
    var pendingStats = 0;

    if (rol < 6){
        $("#btnStatReturned2").css("display", "none");
    }

    if (rol==8){
        $("#btnStatReturned").css("display", "none");
    }
    else
    {
        $("#btnFinished").css("display", "none");
    }

    if (rol != 10){
        $("#btnPrint").css("display", "none");
    }else{
        $("#btnStatReturned").css("display", "none");
        $("#btnStatClosed").css("display", "none");
    }

console.log("validar rol");

    //Usuario impresor
    if (rol==9){
    //Boton reportes
    $("#report_action").html("<a id='btnReport' href='index.php/form/reports' target='_blank' class='btn btn-success btn-md'>Consultar Reportes</a>");

    //Query impresion
    $("#dash_status").css("display", "none");

    $.getJSON("index.php/form/get_Dash_Finished/", function(objRData){
        arrayLetters = objRData;
        if (arrayLetters.length >= 1){
             tabLetters += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Nombre y apellidos</th><th scope='col'>Formulario</th><th scope='col'>Cédula</th><th scope='col'>Estado</th><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Vuln.</th><th scope='col'>Imprimir</th></tr></thead><tbody>";

             for (var t = arrayLetters.length -1; t >=0; t--){
                var ruta = "index.php/form/print_letter/" + arrayLetters[t].formulario + "/" + arrayLetters[t].id_respuesta;

                if (arrayLetters[t].vulnerable == "Si"){
                    var vulnerable = "<td style ='background-color: #e67e22; color: white;'>" + arrayLetters[t].vulnerable + "</td>";
                }else{
                    var vulnerable = "<td>" + arrayLetters[t].vulnerable + "</td>";
                }

                tabLetters += "<tr><td>" + arrayLetters[t].nombresapellidos + "</td><td>" + arrayLetters[t].formulario + "</td><td>" + arrayLetters[t].cedula + "</td><td>" + arrayLetters[t].texto_estado + "</td><td>" + arrayLetters[t].tip_id + " - " + arrayLetters[t].tipologia + "</td><td>" + arrayLetters[t].categoria + "</td>" + vulnerable + "<td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Imprimir</a>" + "</td></tr>";
            }

        }
        else
        {
            $("#dash_letters").css("display","none");
        }
        tabLetters += "</tbody></table><br/>";
        $("#tableLetters").html(tabLetters);
    });

    console.log('impresor');
    }
    else //Query normal
    {
console.log("query normal");
        $.getJSON("index.php/form/get_Dash_Status/" + uid + "/" + rol, function(objRData){
        arrayStats = objRData;
        console.table(arrayStats);
        if (arrayStats.length >0 ) {
            for (var s = arrayStats.length -1; s >=0; s--){

                totalStats = totalStats + parseInt(arrayStats[s].conteo);

                switch(arrayStats[s].estado) {
                    case '1':
                    $("#btnStatNew").attr("target","_blank");
                    $("#btnStatNew").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado + '&rId=' + rol);
                    $("#btnStatNew").html("Nuevos ( " + arrayStats[s].conteo + " )");
                    pendingStats = pendingStats + parseInt(arrayStats[s].conteo);
                        break;

                    case '2':
                    $("#btnStatSaved").attr("target","_blank");
                    $("#btnStatSaved").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado  + '&rId=' + rol);
                    $("#btnStatSaved").html("Guardados ( " + arrayStats[s].conteo + " )");
                    pendingStats = pendingStats + parseInt(arrayStats[s].conteo);
                        break;

                    case '3':
                    $("#btnStatClosed").attr("target","_blank");
                    $("#btnStatClosed").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado  + '&rId=' + rol);
                    $("#btnStatClosed").html("Cerrados ( " + arrayStats[s].conteo + " )");
                        break;

                    case '4':
                    $("#btnStatReturned").attr("target","_blank");
                    $("#btnStatReturned").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado  + '&rId=' + rol);
                    $("#btnStatReturned").html("Devueltos para mi ( " + arrayStats[s].conteo + " )");
                    pendingStats = pendingStats + parseInt(arrayStats[s].conteo);
                        break;

                    case '5':
                    console.log("Pendiente " + arrayStats[s].conteo);
                        break;

                    case '6':
                    console.log("Recategorizar " + arrayStats[s].conteo);
                        break;

                    case '7':
                    $("#btnStatReturned2").attr("target","_blank");
                    $("#btnStatReturned2").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado  + '&rId=' + rol);
                    $("#btnStatReturned2").html("Devueltos por mi ( " + arrayStats[s].conteo + " )");
                        break;

                    case '8':
                    $("#btnFinished").attr("target","_blank");
                    $("#btnFinished").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado  + '&rId=' + rol);
                    $("#btnFinished").html("Finalizados ( " + arrayStats[s].conteo + " )");
                        break;

                    case '10':
                    $("#btnPrint").attr("target", "_blank");
                    $("#btnPrint").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado  + '&rId=' + rol);
                    $("#btnPrint").html("Imprimir ( " + arrayStats[s].conteo + " )");
                    break;

                    default:
                    console.log(":(");
                        break;
                }

            $("#btnStatPend").html("Pendientes ( " + pendingStats + " )");
            $("#btnStatTotal").html("Total ( " + totalStats + " )");

            }

        }else{
            $("#dash_status").css("display","none");
        }
    });
console.log("fix");
    //Fix para estadisticas usuario documental
    $.getJSON("index.php/form/get_Fix_Dash_Docum/" + uid, function(objRData){
        arrayStats = objRData;
        if (arrayStats.length > 0){
            $("#btnPrint").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + '10'  + '&rId=' + rol);
            $("#btnPrint").html("Imprimir ( " + arrayStats[0].conteo + " )");
        }
    });
console.log("sale fix");
    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Dash_Works/" + uid + "/" + rol, function(objRData){
        arrayLetters = objRData;
        console.table(arrayLetters);
        if (arrayLetters.length >= 1){

            //Encabezado de tabla
            switch(rol){
                case '5':
                    tabLetters += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Nombre y apellidos</th><th scope='col'>Formulario</th><th scope='col'>Cédula</th><th scope='col'>Estado</th><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Detalle</th></tr></thead><tbody>";
                    break;
                case '7':
                    tabLetters += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Nombre y apellidos</th><th scope='col'>Formulario</th><th scope='col'>Cédula</th><th scope='col'>Estado</th><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Fecha</th><th scope='col'>Detalle</th></tr></thead><tbody>";
                    break;
                default:
                    tabLetters += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Nombre y apellidos</th><th scope='col'>Formulario</th><th scope='col'>Cédula</th><th scope='col'>Estado</th><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Fecha</th><th scope='col'>Responsable</th><th scope='col'>Detalle</th></tr></thead><tbody>";
                    break;
            }

             for (var t = arrayLetters.length -1; t >=0; t--){
                var ruta = "index.php/form/create_letter?formCode=" + arrayLetters[t].formulario + "&docId=" + arrayLetters[t].cedula + "&tId=" + arrayLetters[t].tip_id + "&cId=" + arrayLetters[t].cat_id + "&letId=" + arrayLetters[t].id_respuesta;

                if (arrayLetters[t].vulnerable == "Si"){
                    var vulnerable = "<td style ='background-color: #e67e22; color: white;'>" + arrayLetters[t].vulnerable + "</td>";
                }else{
                    var vulnerable = "<td>" + arrayLetters[t].vulnerable + "</td>";
                }

                //Mostrar responsables por rol
                switch(rol) {
                    case '8':
                        var responsables = "E:" + arrayLetters[t].E + " - " + "R:" + arrayLetters[t].R + " - " + "V:" + arrayLetters[t].V;
                        break;
                    case '6':
                        var responsables = "E:" + arrayLetters[t].E;
                        break;
                    default:
                        var responsables = "";
                        break;
                }

                //Boton para terminar desde el dash
                var btn_Finish_Dash = "";

                switch(rol){
                    case '6':
                        btn_Finish_Dash ="<button class='btn btn-warning' onclick='finishCloseDash(" + arrayLetters[t].id_respuesta + "," + rol + ")'>Guardar y Cerrar</button>";
                        break;
                    case '8':
                        //btn_Finish_Dash = "<a href='" + rol + "' target='_blank' class='btn btn-danger'>Terminar</a>";
                        //btn_Finish_Dash = "<button class='btn btn-danger' onclick='finishDash(" + arrayLetters[t].id_respuesta + ")'>Terminar</button>";
                        btn_Finish_Dash ="<button class='btn btn-warning' onclick='finishCloseDash(" + arrayLetters[t].id_respuesta + "," + rol + ")'>Guardar y Cerrar</button>";
                        break;
                    case '10':
                        btn_Finish_Dash = "<button class='btn btn-danger' onclick='finishDash(" + arrayLetters[t].id_respuesta + ")'>Terminar</button>";
                        break;
                    default:
                        btn_Finish_Dash = "";
                        break;
                }

                //Filas de tabla
                switch(rol){
                    case '5':
                        tabLetters += "<tr><td>" + arrayLetters[t].nombresapellidos + "</td><td>" + arrayLetters[t].formulario + "</td><td>" + arrayLetters[t].cedula + "</td><td>" + arrayLetters[t].texto_estado + "</td><td>" + arrayLetters[t].tip_id + " - " + arrayLetters[t].tipologia + "</td><td>" + arrayLetters[t].categoria + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver</a>" + "</td></tr>";
                        break;
                    case '7':
                        tabLetters += "<tr><td>" + arrayLetters[t].nombresapellidos + "</td><td>" + arrayLetters[t].formulario + "</td><td>" + arrayLetters[t].cedula + "</td><td>" + arrayLetters[t].texto_estado + "</td><td>" + arrayLetters[t].tip_id + " - " + arrayLetters[t].tipologia + "</td><td>" + arrayLetters[t].categoria + "</td><td>" + arrayLetters[t].Fecha + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver</a>" + "</td></tr>";
                        break;
                    default:
                        tabLetters += "<tr><td>" + arrayLetters[t].nombresapellidos + "</td><td>" + arrayLetters[t].formulario + "</td><td>" + arrayLetters[t].cedula + "</td><td>" + arrayLetters[t].texto_estado + "</td><td>" + arrayLetters[t].tip_id + " - " + arrayLetters[t].tipologia + "</td><td>" + arrayLetters[t].categoria + "</td><td>" + arrayLetters[t].Fecha + "</td><td>" + responsables + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver</a>" + btn_Finish_Dash + "</td></tr>";
                        break;
                }
            }

        }
        else
        {
            $("#dash_letters").css("display","none");
        }
        tabLetters += "</tbody></table><br/>";
        $("#tableLetters").html(tabLetters);
    //$(".modal").modal('hide');
    });
console.log("fin");
    }

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

function finishDash(carta){

    $.ajax({
    url: "index.php/form/do_Finish_Dash/",
    type: "POST",
    data: { csrf_test_name: get_csrf_hash, "idLetter": carta},
    success: function(result){
        if(result == "ok"){
            location.reload();
        }else{
            //console.log("Error");
        }
    }
    });

}

function finishCloseDash(carta, rol){
    //console.log("guardar y cerrar" + carta + " - " + rol);
    var modulo = 7;

    switch (rol){
        case 8:
        modulo = 10;
        break;

        default:
        modulo = 7;
        break;
    }

    $.ajax({
    url: "index.php/form/do_Finish_Close_Dash/",
    type: "POST",
    data:{ csrf_test_name: get_csrf_hash, "idLetter": carta, "Modulo": modulo},
    success: function(result){
        if(result == "ok"){
            location.reload();
        }else{
            //console.log("Error")
        }
    }
    });
}