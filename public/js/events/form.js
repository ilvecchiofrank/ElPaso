$(document).ready(function() {
    loadSelects();
    $(".departamentos").trigger("change");
    if(actividadid > 0){
        getData();
    }
});

function loadSelects() {
    //Cargar listado de tipos de actividad
    $.getJSON("index.php/events/getEventTypes/", function(objRData) {
        $("#actividadTipos").html(objRData);
    });

    $(".departamentos").change(function() {
        var munChildId = "municipios";
        $.getJSON("index.php/form/get_Mpo/" + $(this).val(), function(objRData) {
            $("#" + munChildId).html(objRData);
        });
    });

    //Cargar listado de departamentos
    $.getJSON("index.php/form/get_Dpto/", function(objRData) {
        $(".departamentos").html(objRData);
    });
}

function save() {
    $.ajax({
        url: "index.php/events/save",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "actividadid": actividadid, 
            "actividadtipoid": $("#actividadTipos").val(),
            "dpto": $("#departamentos").val(),
            "mpo": $("#municipios").val(),
            "fechaini": $("#fechaini").val(),
            "fechafin": $("#fechafin").val(),
            "horainicio": $("#horainicio").val(),
            "horafin": $("#horafin").val(),
            "sitionombre": $("#sitionombre").val(),
            "actividaddescripcion": $("#actividaddescripcion").val()
        },
        success: function(data) {
            $("#save").after("<br/><br/><div class='alert alert-success'><strong>Guardado Exitoso!</strong><br/><p>La actividad se grabo correctamente, por favor espere...</p></div>");
            setTimeout("window.location = 'index.php/events/dash/';", 1000);
        },
        error: function() {
            //Error
        }

    });
}
var actividadObject = null;
function getData() {
    $.ajax({
        url: "index.php/events/getEvent",
        type: "POST",
        dataType: "JSON",
        data: {
            "csrf_test_name": get_csrf_hash,
            "actividadid": actividadid
        },
        success: function(data) {
            
            actividadObject = data[0];
            setTimeout('$("#departamentos").val(' + data[0].dpto + '); $("#departamentos").trigger("change");', 200);
            $("#fechaini").val(data[0].fechaini);
            $("#fechafin").val(data[0].fechafin);
            $("#horainicio").val(data[0].horainicio);
            $("#horafin").val(data[0].horafin);
            $("#sitionombre").val(data[0].sitionombre);
            $("#actividaddescripcion").val(data[0].actividaddescripcion);
            setTimeout('$("#actividadTipos").val(' + data[0].actividadtipoid + ');', 200);
            setTimeout('$("#municipios").val(' + data[0].mpo + ');', 400);
            
        },
        error: function() {
            //Error
        }
    });
}