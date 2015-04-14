$(document).ready(function() {
    loadSelects();
    $(".departamentos").trigger("change");
    loadData();
    getPersonasActividad();
});

var jqueryDatatable = null;
var jqueryDatatableActividadesPersona = null;

function loadData() {
    $.ajax({
        url: "index.php/events/getPeople/",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "nombres": $("#nombresSearch").val(),
            "apellidos": $("#apellidosSearch").val(),
            "documento": $("#documentoSearch").val()
        },
        success: function(data) {
            $("#searchResult tbody").html(data);

            if (jqueryDatatable != null) {
                jqueryDatatable.destroy();
            }

            jqueryDatatable = $('#searchResult').dataTable({
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
        },
        error: function() {
            //Error
        }

    });
}

function loadSelects() {
    //Cargar listado de tipos de actividad
    /*$.getJSON("index.php/events/getEventTypes/", function(objRData) {
     $("#actividadTipos").html(objRData);
     });*/

    $.getJSON("index.php/events/getSexo/", function(objRData) {
        $("#sexo").html(objRData);
    });

    $.getJSON("index.php/events/getTiposDocumento/", function(objRData) {
        $("#tipoDocumento").html(objRData);
    });

    $("#departamentos").change(function() {
        var munChildId = "municipios";
        $.getJSON("index.php/form/get_Mpo/" + $(this).val(), function(objRData) {
            $("#" + munChildId).html(objRData);
        });
    });

    //Cargar listado de departamentos
    $.getJSON("index.php/form/get_Dpto/", function(objRData) {
        $("#departamentos").html(objRData);
    });
}

var personaid = 0;

function savePersona() {
    if (validate()) {
        $.ajax({
            url: "index.php/events/savePersona",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "personaid": personaid,
                "nombres": $("#nombres").val(),
                "dpto": $("#departamentos").val(),
                "mpo": $("#municipios").val(),
                "apellidos": $("#apellidos").val(),
                "documento": $("#documento").val(),
                "tipo_documento_id": $("#tipoDocumento").val(),
                "telefono": $("#telefono").val(),
                "celular": $("#celular").val(),
                "direccion": $("#direccion").val(),
                "fechanac": $("#fechanac").val(),
                "cargo": $("#cargo").val(),
                "entidad": $("#entidad").val(),
                "sexo": $("#sexo").val()
            },
            success: function(data) {
                /*$("#save").after("<br/><br/><div class='alert alert-success rm'><strong>Guardado Exitoso!</strong><br/><p>La actividad se grabo correctamente, por favor espere...</p></div>");
                 //setTimeout("window.location = 'index.php/events/dash/';", 1000);
                 $("#filesPanel").css("display", "block");
                 setTimeout("$('.rm').remove();", 2000);
                 actividadid = parseInt(data);
                 $("#actividadidhdd").val(actividadid);*/
                if(data == 'NV'){
                    alert("El número de documento ya está registrado para otro participante.");
                }else{
                    clearControls();

                    loadData();
                    $('#modalPeopleAdmin').modal('hide');
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

function getData() {
    $.ajax({
        url: "index.php/events/getPersona",
        type: "POST",
        dataType: "JSON",
        data: {
            "csrf_test_name": get_csrf_hash,
            "personaid": personaid
        },
        success: function(data) {
            data = data[0];
            $("#nombres").val(data.nombres);
            $("#departamentos").val(data.dptoresidencia);
            $("#departamentos").trigger("change");
            setTimeout('$("#municipios").val(' + data.mporesidencia + ');', 1000);
            $("#apellidos").val(data.apellidos);
            $("#documento").val(data.nodocumento);
            $("#tipoDocumento").val(data.tipo_documento_id);
            $("#telefono").val(data.telefono);
            $("#celular").val(data.celular);
            $("#direccion").val(data.direccion);
            $("#fechanac").val(data.fechanac);
            $("#cargo").val(data.cargo);
            $("#entidad").val(data.entidad);
            $("#sexo").val(data.sexo_id);
            $("#modalPeopleAdmin").modal();
        },
        error: function() {
            //Error
        }
    });
}

function clearControls() {
    $("#nombres").val("");
    $("#departamentos").val("");
    $("#municipios").val("");
    $("#apellidos").val("");
    $("#documento").val("");
    $("#tipoDocumento").val("");
    $("#telefono").val("");
    $("#celular").val("");
    $("#direccion").val("");
    $("#fechanac").val("");
    $("#cargo").val("");
    $("#entidad").val("");
    $("#sexo").val("");
}

function agregarActividadPersona(personaidP) {
    $.ajax({
        url: "index.php/events/setPersonaActividad",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "personaid": personaidP,
            "actividadid": actividadid
        },
        success: function(data) {
            getPersonasActividad();
        },
        error: function() {
            alert("La persona que intenta agregar ya hace parte de la actividad.");
        }

    });
}

function eliminarActividadPersona(personaidP) {
    $.ajax({
        url: "index.php/events/removePersonaActividad",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "personaid": personaidP,
            "actividadid": actividadid
        },
        success: function(data) {
            getPersonasActividad();
        },
        error: function() {
            //alert("La persona que intenta agregar ya hace parte de la actividad.");
        }

    });
}

function getPersonasActividad() {
    $.ajax({
        url: "index.php/events/getPersonasActividad",
        type: "POST",
        data: {
            "csrf_test_name": get_csrf_hash,
            "actividadid": actividadid
        },
        success: function(data) {
            $("#tableParticipantesActividad tbody").html(data);
            
            $("#contadorParticipantesRegistrados").html($("#tableParticipantesActividad tbody").find("tr").length);
            
            if (jqueryDatatableActividadesPersona != null && jqueryDatatableActividadesPersona != undefined) {
                jqueryDatatableActividadesPersona.destroy();
            }

            jqueryDatatableActividadesPersona = $('#tableParticipantesActividad').dataTable({
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
            
        },
        error: function() {

        }

    });
}