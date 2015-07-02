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

function loadFilteredData(){
    //Cargar resumen del reporte filtrado
    //Cargar detalle del reporte filtado
}