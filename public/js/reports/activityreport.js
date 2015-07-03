$(document).ready(function () {
    loadData();
});

function loadData(){
    //Cargar listado de departamentos
    $.getJSON("index.php/reports/get_Activity_Dpto/", function(objRData) {
        $(".departamentos").html(objRData);
    });

    //Cargar listado de municipios
    $(".departamentos").change(function() {
        var munChildId = "municipios";
        $.getJSON("index.php/reports/get_Activity_Mpo/" + $(this).val(), function(objRData) {
            $("#" + munChildId).html(objRData);
        });
    });

    //Cargar resumen del reporte
    $.getJSON("index.php/reports/get_Report_Resume", function(objRData) {
        $("#tblResume").html(objRData);
    });

    //Cargar detalle del reporte
    $.getJSON("index.php/reports/get_Report_Details", function(objRData) {
        $("#tblDetails").html(objRData);
    });

}

$("#btnRemoveFilter").click(function() {
    loadData();
    $("#municipios").html("<select id='municipios' class='form-control municipios'><option>Seleccione...</option></select>");
});

$("#btnFilter").click(function(){
    loadFilteredData();
});

function loadFilteredData(){
    var departamento = $("#departamentos").val();
    var municipio = $("#municipios").val();

    //Validacion departamento
    if (departamento == "") {
        alert("Debe seleccionar un departamento.");
        return;
    }

    if (municipio == "") {
        municipio = 0;
    }

    //Cargar resumen del reporte filtrado
    $.getJSON("index.php/reports/get_Filtered_Report_Resume/" + departamento + "/" + municipio, function(objRData) {
        $("#tblResume").html(objRData);
    });

    //Cargar detalle del reporte filtrado
    $.getJSON("index.php/reports/get_Filtered_Report_Details/" + departamento + "/" + municipio, function(objRData) {
        $("#tblDetails").html(objRData);
    });

}

$(document).ajaxStart(function() {
    $(".modal").modal('show');
}).ajaxStop(function() {
    $(".modal").modal('hide');
});