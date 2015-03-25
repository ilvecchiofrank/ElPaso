$(document).ready(function () {

$("#results").css("display", "none");

function loadResults(){
    var tipo = "";
    var form = 0;
    var cedula = 0;
    var nombre = 0;
    var tabResult = "";
    var btnPrint = "";

    //Definir tipo de query
    if($("#TxtFormNo").val() != ''){
        tipo = "form";
        form = $("#TxtFormNo").val();
    }else{
        if($("#TxtPersonIdentity").val() != ''){
            tipo = "cedula";
            cedula = $("#TxtPersonIdentity").val();
        }else{
            if($("#TxtPersonName").val() !=''){
                tipo = "nombre";
                nombre = $("#TxtPersonName").val();
            }
        }
    }

    $.getJSON("index.php/form/do_Alt_Search/" + form + "/" + cedula + "/" + nombre + "/" + tipo, function(objRData){
        arrayResult = objRData;
        if(arrayResult.length > 0){
            tabResult += "<table border='1' cellpadding='1' cellspacing='1'><thead><tr><th scope='col'>Identificación</th><th scope='col'>Nombre</th><th scope='col'>Formulario</th><th scope='col'>Acción</th></tr></thead><tbody>";

            for (var i = arrayResult.length - 1; i >= 0; i--) {

                if(arrayResult[i].finalizada == 1){
                    btnPrint = "<a href='" + "index.php/form/print_letter/" + arrayResult[i].form + "/" + arrayResult[i].id_respuesta + "' target='_blank' class='btn btn-default'>Imprimir</a>";
                }

                tabResult += "<tr><td>" + arrayResult[i].cc + "</td><td>" + arrayResult[i].nombresapellidos + "</td><td>" + arrayResult[i].form + "</td><td>" + "<a href='" + "index.php/form/files?formCode=" + arrayResult[i].form + "&docId=" + arrayResult[i].cc + "' target='_blank' class='btn btn-default'>Certificaciones</a>" + "<a href='" + "index.php/form/print_full/" + arrayResult[i].form + "' target='_blank' class='btn btn-warning'>Respuestas</a>" + "<a href='" + "index.php/form/dbmatch?docId=" + arrayResult[i].cc + "' target='_blank' class='btn btn-info'>Cruces DB</a>" + "<a href='" + "index.php/form/tutelas?docId=" + arrayResult[i].cc + "' target='_blank' class='btn btn-success'>Tutelas</a>" + "<a href='" + "index.php/form/comad?fId=" + arrayResult[i].form + "' target='_blank' class='btn btn-danger'>Comunicaciones Adicionales</a>" + btnPrint + "</td></tr>";
            }

            tabResult += "</tbody></table><br/>";
            $("#tableResults").html(tabResult);
            $("#results").css("display", "block");

        }else{
            $("#results").css("display", "none");
        }

    });

}

//-Busqueda-//
$("#btnSearch").click(function(){

    //Validar todos los campos vacíos
    if($("#TxtFormNo").val() == '' && $("#TxtPersonIdentity").val() == '' && $("#TxtPersonName").val() == ''){
        $("#lblError").html('<p style="color: red">Debe diligenciar por lo menos un campo.</p>');
        return;
    }else{
        $("#lblError").html('');
    }

    loadResults();

});

//-Limpiar form-//
$("#btnClear").click(function(){
    $("#TxtFormNo").val('');
    $("#TxtPersonIdentity").val('');
    $("#TxtPersonName").val('');
});

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