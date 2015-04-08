var arrayMunicipiosCobertura = [];

$(document).ready(function() {
    loadSelects();
    $(".departamentos").trigger("change");
    if (actividadid > 0) {
        getData();
    }
});

function loadSelects() {
    //Cargar listado de tipos de actividad
    $.getJSON("index.php/events/getEventTypes/", function(objRData) {
        $("#actividadTipos").html(objRData);
    });

    $("#departamentos").change(function() {
        var munChildId = "municipios";
        $.getJSON("index.php/form/get_Mpo/" + $(this).val(), function(objRData) {
            $("#" + munChildId).html(objRData);
        });
    });

    $("#departamentosCobertura").change(function() {
        var munChildId = "municipiosCobertura";
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
            "actividaddescripcion": $("#actividaddescripcion").val(),
            "municipiosCobertura": JSON.stringify(arrayMunicipiosCobertura)
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
            setTimeout(function(){ 
                $("#departamentos").val(data[0].dpto);
                $("#departamentos").trigger("change");
                
                setTimeout('$("#municipios").val(' + data[0].mpo + ');', 1000);
            }, 200);
            $("#fechaini").val(data[0].fechaini);
            $("#fechafin").val(data[0].fechafin);
            $("#horainicio").val(data[0].horainicio);
            $("#horafin").val(data[0].horafin);
            $("#sitionombre").val(data[0].sitionombre);
            $("#actividaddescripcion").val(data[0].actividaddescripcion);
            setTimeout('$("#actividadTipos").val(' + data[0].actividadtipoid + ');', 200);
            arrayMunicipiosCobertura = data[0].municipiosCobertura;
            cargarTablaMunicipiosCobertura();
        },
        error: function() {
            //Error
        }
    });
}

function asignarMunicipiosCobertura() {
    if ($.trim($("#municipiosCobertura :selected").text()) != "Seleccione..." && $.trim($("#departamentosCobertura :selected").text()) != "Seleccione...") {
        var jsonMunicipio = {
            "departamento": $("#departamentosCobertura :selected").text(),
            "departamentoid": $("#departamentosCobertura").val(),
            "municipio": $("#municipiosCobertura :selected").text(),
            "municipioid": $("#municipiosCobertura").val()

        };
        
        var exist = false;
        $.each(arrayMunicipiosCobertura, function(key, value) {
            if(value.municipioid == $("#municipiosCobertura").val() && value.departamentoid == $("#departamentosCobertura").val()){
               exist = true; 
            }
        });
        
        if(!exist){
            arrayMunicipiosCobertura.push(jsonMunicipio);
        }else{
            $("#tableMunicipiosCobertura").before("<div class='alert alert-danger rm'><strong>Oppsss...</strong><br/><p style='text-align: justify;'>El departamento y municipio seleccionados ya fueron registrados en la lista.</p></div>");
            setTimeout("$('.rm').remove();",2000);
        }
        
        cargarTablaMunicipiosCobertura();
    }else{
        $("#tableMunicipiosCobertura").before("<div class='alert alert-danger rm'><strong>Oppsss...</strong><br/><p style='text-align: justify;'>Es necesario seleccionar un departamento y un municipio para asignarlo a la actividad.</p></div>");
        setTimeout("$('.rm').remove();",2000);
    }
}

function cargarTablaMunicipiosCobertura() {
    $("#tableMunicipiosCobertura tbody").html("");
    $.each(arrayMunicipiosCobertura, function(key, value) {
        $("#tableMunicipiosCobertura tbody").append("<tr><td>" + value.departamento + "</td><td>" + value.municipio + "</td><td><button onclick='deleteItem(" + key + ");' class='btn btn-danger'>Quitar de la lista</button></td></tr>");
    });
}

function deleteItem(key) {
    arrayMunicipiosCobertura.splice(key, 1);
    cargarTablaMunicipiosCobertura();

}