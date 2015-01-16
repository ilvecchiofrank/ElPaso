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

    //Usuario impresor
    if (rol==9){
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

        $.getJSON("index.php/form/get_Dash_Status/" + uid + "/" + rol, function(objRData){
        arrayStats = objRData;
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

    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Dash_Works/" + uid + "/" + rol, function(objRData){
        arrayLetters = objRData;
        if (arrayLetters.length >= 1){
             tabLetters += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Nombre y apellidos</th><th scope='col'>Formulario</th><th scope='col'>Cédula</th><th scope='col'>Estado</th><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Vuln.</th><th scope='col'>Detalle</th></tr></thead><tbody>";

             for (var t = arrayLetters.length -1; t >=0; t--){
                var ruta = "index.php/form/create_letter?formCode=" + arrayLetters[t].formulario + "&docId=" + arrayLetters[t].cedula + "&tId=" + arrayLetters[t].tip_id + "&cId=" + arrayLetters[t].cat_id + "&letId=" + arrayLetters[t].id_respuesta;

                if (arrayLetters[t].vulnerable == "Si"){
                    var vulnerable = "<td style ='background-color: #e67e22; color: white;'>" + arrayLetters[t].vulnerable + "</td>";
                }else{
                    var vulnerable = "<td>" + arrayLetters[t].vulnerable + "</td>";
                }

                tabLetters += "<tr><td>" + arrayLetters[t].nombresapellidos + "</td><td>" + arrayLetters[t].formulario + "</td><td>" + arrayLetters[t].cedula + "</td><td>" + arrayLetters[t].texto_estado + "</td><td>" + arrayLetters[t].tip_id + " - " + arrayLetters[t].tipologia + "</td><td>" + arrayLetters[t].categoria + "</td>" + vulnerable + "<td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver</a>" + "</td></tr>";
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