$(document).ready(function(){
    loadSelects();
    $(".departamentos").trigger("change");
    loadData();
});

function loadData(){ 
    $.ajax({
        url: "index.php/events/getDataEvents/",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "actividadtipoid": $("#actividadTipos").val(),
            "dpto": $("#departamentos").val(),
            "mpo": $("#municipios").val(),
            "fechaini": $("#fechaini").val(),
            "fechafin": $("#fechafin").val(),
            "sitionombre": $("#sitionombre").val()
        },
        success: function(data) {
            $("#contentEvents").html(data);
        },
        error: function() {
            //Error
        }

    });
}

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