$(document).ready(function() {
    loadSelects();
    $(".departamentos").trigger("change");
});

function loadSelects() {
    //Cargar listado de tipos de actividad
    $.getJSON("index.php/events/getEventTypes/", function(objRData) {
        console.log(objRData);
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

var actividadid = 0;

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
            alert("La actividad se almaceno correctamente!");
        },
        error: function() {
            //Error
        }

    });
}