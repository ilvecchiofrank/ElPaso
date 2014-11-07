$(document).ready(function () {

var rol = getParameterByName("uT");

//loadTutelas();

function loadDash(){
    // var cedula = getParameterByName("docId");
    // var tabtutelas = "";
    // $(".modal").modal('show');
    // $.getJSON("index.php/form/get_Tutelas/" + cedula, function(objRData){
    //     arrayTutelas = objRData;

    //     if (arrayTutelas.length >= 1){
    //         tabtutelas += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Número de proceso</th><th scope='col'>Tema</th><th scope='col'>Detalle</th></tr></thead><tbody>";

    //         for (var t = arrayTutelas.length -1; t >=0; t--){
    //             var ruta = "index.php/form/j_actions?tutId=" +arrayTutelas[t].tutela_id ;
    //             tabtutelas += "<tr><td>" + arrayTutelas[t].numero_proceso + "</td><td>" + arrayTutelas[t].temas + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
    //         }

    //     }
    //     else
    //     {
    //         $("#tutelas").css("display","none");
    //     }

    //     tabtutelas += "</tbody></table><br/>";
    //     $("#tableTutelasResults").html(tabtutelas);
    // $(".modal").modal('hide');
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