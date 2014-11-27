$(document).ready(function () {

var rol = getParameterByName("uT");
loadDash();

//loadTutelas();

function loadDash(){
    var uid = getParameterByName("uI");
    var tabLetters = "";
    var totalStats = 0;

    $.getJSON("index.php/form/get_Dash_Status/" + uid, function(objRData){
        arrayStats = objRData;
        if (arrayStats.length >0 ) {
            for (var s = arrayStats.length -1; s >=0; s--){

                totalStats = totalStats + parseInt(arrayStats[s].conteo);

                switch(arrayStats[s].estado) {
                    case '1':
                    $("#btnStatNew").attr("target","_blank");
                    $("#btnStatNew").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado);
                    $("#btnStatNew").html("Nuevos ( " + arrayStats[s].conteo + " )");
                        break;

                    case '2':
                    $("#btnStatSaved").attr("target","_blank");
                    $("#btnStatSaved").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado);
                    $("#btnStatSaved").html("Guardados ( " + arrayStats[s].conteo + " )");
                        break;

                    case '3':
                    $("#btnStatClosed").attr("target","_blank");
                    $("#btnStatClosed").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado);
                    $("#btnStatClosed").html("Cerrados ( " + arrayStats[s].conteo + " )");
                        break;

                    case '4':
                    $("#btnStatReturned").attr("target","_blank");
                    $("#btnStatReturned").attr("href", 'index.php/form/dash_filter?uId=' + uid + '&statId=' + arrayStats[s].estado);
                    $("#btnStatReturned").html("Devueltos ( " + arrayStats[s].conteo + " )");
                        break;

                    case '5':
                    console.log("Pendiente " + arrayStats[s].conteo);
                        break;

                    case '6':
                    console.log("Recategorizar " + arrayStats[s].conteo);
                        break;

                    default:
                    console.log(":(");
                        break;
                }

            $("#btnStatTotal").html("Total ( " + totalStats + " )");

            }

        }else{
            $("#dash_status").css("display","none");
        }
    });

    //$(".modal").modal('show');
    $.getJSON("index.php/form/get_Dash_Works/" + uid, function(objRData){
        arrayLetters = objRData;
        if (arrayLetters.length >= 1){
             tabLetters += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Nombre y apellidos</th><th scope='col'>Formulario</th><th scope='col'>Cédula</th><th scope='col'>Estado</th><th scope='col'>Tipología</th><th scope='col'>Categoría</th><th scope='col'>Vulnerable</th><th scope='col'>Detalle</th></tr></thead><tbody>";

             for (var t = arrayLetters.length -1; t >=0; t--){
                var ruta = "index.php/form/create_letter?formCode=" + arrayLetters[t].formulario + "&docId=" + arrayLetters[t].cedula + "&tId=" + arrayLetters[t].tip_id + "&cId=" + arrayLetters[t].cat_id + "&letId=" + arrayLetters[t].id_respuesta;

                if (arrayLetters[t].vulnerable == "Si"){
                    var vulnerable = "<td style ='background-color: #e67e22; color: white;'>" + arrayLetters[t].vulnerable + "</td>";
                }else{
                    var vulnerable = "<td>" + arrayLetters[t].vulnerable + "</td>";
                }

                tabLetters += "<tr><td>" + arrayLetters[t].nombresapellidos + "</td><td>" + arrayLetters[t].formulario + "</td><td>" + arrayLetters[t].cedula + "</td><td>" + arrayLetters[t].texto_estado + "</td><td>" + arrayLetters[t].tip_id + " - " + arrayLetters[t].tipologia + "</td><td>" + arrayLetters[t].categoria + "</td>" + vulnerable + "<td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
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