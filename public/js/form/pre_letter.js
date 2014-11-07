$(document).ready(function () {

loadLetters();

$("#txtCedula").html(getParameterByName("docId"));

/*Cargar listado de cartas existentes*/
function loadLetters(){
    var cedula = getParameterByName("docId");
    var formulario = getParameterByName("formCode");
    var tabletters = "";
    $(".modal").modal('show');
    $.getJSON("index.php/form/get_Letters/" + cedula, function(objRData){
        arrayLetters = objRData;

        if (arrayLetters.length > 0){
            tabletters += "<table><tr><th>Estado</th><th>Cierre</th><th>Fecha de Creación</th><th>Detalle</th></tr>";
            for (var l = arrayLetters.length -1; l >=0; l--){
                tabletters += "<tr><td>" + arrayLetters[l].estado + "</td><td>" + arrayLetters[l].finalizada + "</td><td>" + arrayLetters[l].fecha_creacion + "</td><td>" + "<a href='index.php/form/create_letter?docId=" + cedula + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }
        }
        else
        {
            $("#letters").css("display", "none");
            $("#btnCreate").attr("target","_blank");
            $("#btnCreate").attr("href", 'index.php/form/create_letter?docId=' + cedula + '&formCode=' + formulario);
            $("#no_letters").css("display", "block");
        }

        tabletters += "</table><br/>";
        $("#tableLettersResults").html(tabletters);
        $(".modal").modal('hide');
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