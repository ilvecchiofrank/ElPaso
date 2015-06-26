$(document).ready(function(){
    loadSelects();
    $(".departamentos").trigger("change");
    loadData();
});
var jqueryDatatable = null;
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
            $("#tableContentEvents tbody").html(data);
            if(jqueryDatatable != undefined){
                table.destroy();
            }
            jqueryDatatable = $('#tableContentEvents').dataTable({
                "language": {
                                "sProcessing":     "Procesando...",
                                "sLengthMenu":     "Mostrar _MENU_ registros",
                                "sZeroRecords":    "No se encontraron resultados",
                                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                "sInfoPostFix":    "",
                                "sSearch":         "Buscar:",
                                "sUrl":            "",
                                "sInfoThousands":  ",",
                                "sLoadingRecords": "Cargando...",
                                "oPaginate": {
                                        "sFirst":    "Primero",
                                        "sLast":     "Último",
                                        "sNext":     "Siguiente",
                                        "sPrevious": "Anterior"
                                },
                                "oAria": {
                                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                }
                        }
            });
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