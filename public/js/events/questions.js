$(document).ready(function() {
    loadSelects();
    getPreguntasParticipantes();
    
    $("#categoriaInquietud").change(function() {
        $.getJSON("index.php/events/getAnsweridForQuestionid?questionid=" + $("#categoriaInquietud").val(), function(id) {
            $("#categoriaRespuesta").val(id);
        });
    });
});

function loadSelects() {
    //Cargar listado de tipos de actividad
    $.getJSON("index.php/events/getPreguntasCategorias/", function(objRData) {
        $("#preguntasCategorias").html(objRData);
    });

    $.getJSON("index.php/events/getPreguntasCategorizadasSelect/", function(html) {
        $("#categoriaInquietud").html(html);
    });

    $.getJSON("index.php/events/getRespuestasCategorizadasSelect/", function(html) {
        $("#categoriaRespuesta").html(html);
    });

}

var actividadpersona_pregunta_id = 0;
var jqueryDatatable = null;

function saveParticipantePregunta() {
    if (validate()) {
        $.ajax({
            url: "index.php/events/saveParticipantePregunta",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "personaid": personaid,
                "actividadid": actividadid,
                "inquietud": $("#inquietud").val().replace("\n", " "),
                "respuesta": $("#respuesta").val().replace("\n", " "),
                "categoriaInquietud": $("#categoriaInquietud").val(),
                "categoriaRespuesta": $("#categoriaRespuesta").val(),
                "preguntasCategoriaId": $("#preguntasCategorias").val(),
                "actividadpersona_pregunta_id": actividadpersona_pregunta_id
            },
            success: function(data) {
                $("#save").after("<br/><br/><div class='alert alert-success rm'><strong>Guardado Exitoso!</strong><br/><p>La inquietud se guardo correctamente, por favor espere...</p></div>");
                //setTimeout("window.location = 'index.php/events/dash/';", 1000);
                setTimeout("$('.rm').remove();", 2000);
                $("#inquietud").val("");
                $("#respuesta").val("");
                $("#preguntasCategorias").val("");
                $("#categoriaInquietud").val("");
                $("#categoriaRespuesta").val("");
                getPreguntasParticipantes();

                if (actividadpersona_pregunta_id != 0) {
                    actividadpersona_pregunta_id = 0;
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

function getPreguntasParticipantes() {
    $("#tableQuestions tbody").html("");
    $.ajax({
        url: "index.php/events/getPreguntasParticipantes/",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "actividadid": actividadid,
            "personaid": personaid
        },
        success: function(data) {
            $("#tableQuestions tbody").html(data);
            if (jqueryDatatable != null) {

                jqueryDatatable.destroy();
            }

            jqueryDatatable = $('#tableQuestions').dataTable({
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

function updateQuestion(id, categoria, inquietud, respuesta, preguntaCategoria, respuestaCategoria) {
    $("#inquietud").val(inquietud);
    $("#preguntasCategorias").val(categoria);
    $("#respuesta").val(respuesta);
    $("#categoriaInquietud").val(preguntaCategoria);
    $("#categoriaRespuesta").val(respuestaCategoria);
    actividadpersona_pregunta_id = id;

    //Scroll
    $('html, body').animate({
        scrollTop: $("#miga").offset().top
    }, 1000);

}

function deletePreguntasParticipantes(id) {
    if (confirm("¿Está seguro que desea eliminar la inquietud seleccionada?")) {
        $.ajax({
            url: "index.php/events/deletePreguntasParticipantes",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "id": id
            },
            success: function(data) {
                getPreguntasParticipantes();
                alert("La inquietud se eliminó correctamente!");
            },
            error: function() {
                //alert("La persona que intenta agregar ya hace parte de la actividad.");
            }

        });
    }
}