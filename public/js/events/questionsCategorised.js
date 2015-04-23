$(document).ready(function() {
    getPreguntasCategorizadas();
});

var inquietudid = 0;
var jqueryDatatable = null;

function saveQuestionCategorised() {
    if (validate()) {
        $.ajax({
            url: "index.php/events/saveParticipanteCategorizada",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "inquietudid": inquietudid,
                "inquietud": $("#inquietud").val()
            },
            success: function(data) {
                $("#save").after("<br/><br/><div class='alert alert-success rm'><strong>Guardado Exitoso!</strong><br/><p>La inquietud se guardo correctamente, por favor espere...</p></div>");
                //setTimeout("window.location = 'index.php/events/dash/';", 1000);
                setTimeout("$('.rm').remove();", 2000);
                $("#inquietud").val("");
                getPreguntasCategorizadas();

                if (inquietudid != 0) {
                    inquietudid = 0;
                }
            },
            error: function() {
                //Error
            }

        });
    }
}


function validate() {
    return true;
}

function getPreguntasCategorizadas() {
    $("#tableQuestionsCategorised tbody").html("");
    $.ajax({
        url: "index.php/events/getPreguntasCategorizadas/",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash
        },
        success: function(data) {
            $("#tableQuestionsCategorised tbody").html(data);
            if (jqueryDatatable != null) {

                jqueryDatatable.destroy();
            }

            jqueryDatatable = $('#tableQuestionsCategorised').dataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
    });
}

function updateQuestionCategorised(id, inquietud) {
    $("#inquietud").val(inquietud);
    inquietudid = id;
}

function deletePreguntasCategorizadas(id) {
    if (confirm("¿Está seguro que desea eliminar la inquietud seleccionada?")) {
        $.ajax({
            url: "index.php/events/deletePreguntasCategorizadas",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "id": id
            },
            success: function(data) {
                getPreguntasCategorizadas();
                alert("La inquietud se eliminó correctamente!");
            },
            error: function() {
                //alert("La persona que intenta agregar ya hace parte de la actividad.");
            }

        });
    }
}