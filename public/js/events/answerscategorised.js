$(document).ready(function() {
    getRespuestasCategorizadas();
});

var answerid = 0;
var jqueryDatatable = null;
var jqueryDatatableQuestions = null;

function saveAnswerCategorised() {
    if (validate()) {
        $.ajax({
            url: "index.php/events/saveRespuestaCategorizada",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "answerid": answerid,
                "answer": $("#answer").val()
            },
            success: function(data) {
                $("#save").after("<br/><br/><div class='alert alert-success rm'><strong>Guardado Exitoso!</strong><br/><p>La respuesta se guardo correctamente, por favor espere...</p></div>");
                //setTimeout("window.location = 'index.php/events/dash/';", 1000);
                setTimeout("$('.rm').remove();", 2000);
                $("#answer").val("");
                getRespuestasCategorizadas();

                if (answerid != 0) {
                    answerid = 0;
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

function getRespuestasCategorizadas() {
    $("#tableAnswersCategorised tbody").html("");
    $.ajax({
        url: "index.php/events/getRespuestasCategorizadas/",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash
        },
        success: function(data) {
            $("#tableAnswersCategorised tbody").html(data);
            if (jqueryDatatable != null) {

                jqueryDatatable.destroy();
            }

            jqueryDatatable = $('#tableAnswersCategorised').dataTable({
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

function updateAnswerCategorised(id, answer) {
    $("#answer").val(answer);
    answerid = id;
}

function deleteRespuestasCategorizadas(id) {
    if (confirm("¿Está seguro que desea eliminar la respuesta seleccionada?, recuerde que la asignación de respuestas a inquietudes categorizadas se perderá!")) {
        $.ajax({
            url: "index.php/events/deleteRespuestasCategorizadas",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "id": id
            },
            success: function(data) {
                getRespuestasCategorizadas();
                alert("La respuesta se eliminó correctamente!");
            },
            error: function() {
                //alert("La persona que intenta agregar ya hace parte de la actividad.");
            }

        });
    }
}

function getPreguntasCategorizadas() {
    $("#tableQuestionsCategorised tbody").empty();
    $.ajax({
        url: "index.php/events/getPreguntasCategorizadasAnswers/",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "answerForSet": answerForSet
        },
        success: function(data) {
            if (jqueryDatatableQuestions != null) {
                jqueryDatatableQuestions.fnDestroy();
                $("#tableQuestionsCategorised tbody").empty();
            }
            
            $("#tableQuestionsCategorised tbody").html(data);
            
            jqueryDatatableQuestions = $('#tableQuestionsCategorised').dataTable({
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

            $(".insertCheck").change(function() {
                $.ajax({
                    url: "index.php/events/setQuestionAnswerCategorised/",
                    type: "POST",
                    data: {
                        "csrf_test_name": get_csrf_hash,
                        "questioncategorisedid": $(this).attr("questioncategorisedid"),
                        "answercategorisedid": answerForSet
                    },
                    success: function(data) {
                        getPreguntasCategorizadas();
                        console.log("Asigno despues del insert");
                    },
                    error: function() {

                    }
                });
            });

            $(".deleteCheck").change(function() {
                $.ajax({
                    url: "index.php/events/deleteQuestionAnswerCategorised/",
                    type: "POST",
                    data: {
                        "csrf_test_name": get_csrf_hash,
                        "questioncategorisedid": $(this).attr("questioncategorisedid"),
                        "answercategorisedid": answerForSet
                    },
                    success: function(data) {
                        getPreguntasCategorizadas();
                    },
                    error: function() {

                    }
                });
            });
        }
    });
}
var answerForSet = 0;
function showAnswer(id, answer) {
    answerForSet = id;
    $("#answerChoose").html("Respuesta seleccionada: " + id + " - " + answer);
    getPreguntasCategorizadas();
}