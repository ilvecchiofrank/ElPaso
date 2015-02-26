$(document).ready(function () {

loadReport(getParameterByName("tId"));
reportDate();

function loadReport(tipo){
    switch(tipo){

        case '1':
        $("#lgndTitle").html("Reporte General");
        loadReportData(tipo);
        break;

        case '2':
        $("#lgndTitle").html("Reporte General Redactor");
        loadReportData(tipo);
        break;

        case '3':
        $("#lgndTitle").html("Reporte General Coordinador");
        loadReportData(tipo);
        break;

        case '4':
        $("#lgndTitle").html("Reporte General Validador Jurídico");
        loadReportData(tipo);
        break;

        case '5':
        $("#lgndTitle").html("Reporte General Gerente");
        loadReportData(tipo);
        break;

        default:
        console.log(":(");
        break;
    }

}

function reportDate(){
    var objToday = new Date(),
                weekday = new Array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'),
                dayOfWeek = weekday[objToday.getDay()],
                domEnder = new Array( '', '', '', '', '', '', '', '', '', '' ),
                dayOfMonth = today + (objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder[objToday.getDate()] : objToday.getDate() + domEnder[parseFloat(("" + objToday.getDate()).substr(("" + objToday.getDate()).length - 1))],
                months = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                curMonth = months[objToday.getMonth()],
                curYear = objToday.getFullYear(),
                curHour = objToday.getHours() > 12 ? objToday.getHours() - 12 : (objToday.getHours() < 10 ? "0" + objToday.getHours() : objToday.getHours()),
                curMinute = objToday.getMinutes() < 10 ? "0" + objToday.getMinutes() : objToday.getMinutes(),
                curSeconds = objToday.getSeconds() < 10 ? "0" + objToday.getSeconds() : objToday.getSeconds(),
                curMeridiem = objToday.getHours() > 11 ? "PM" : "AM";

var today = 'Corte: ' + dayOfWeek + ", " + curMonth + " " + dayOfMonth + " de " + curYear + " - " + curHour + ":" + curMinute + " " + curMeridiem ;
$("#fechaCorte").html(today);
}

function loadReportData(reporte){
    var tablareporte = "";
    var totalRegistros = 0;
    var nuevos = 0;
    var guardados = 0;
    var devueltos = 0;
    var finalizados = 0;

    switch (reporte){

        //Reporte General
        case '1':
        $.getJSON("index.php/form/get_Report_General", function(objRData){
            arrayReport = objRData;
            tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Redactor (Pend.)</th><th scope='col'>Redactor (Cerr.)</th><th scope='col'>Coordinador (Pend.)</th><th scope='col'>Coordinador (Cerr.)</th><th scope='col'>Juridico (Pend.)</th><th scope='col'>Juridico (Cerr.)</th><th scope='col'>Gerente (Pend.)</th><th scope='col'>Gerente (Cerr.)</th><th scope='col'>Terminados</th><th scope='col'>Sin asignar</th></tr></thead><tbody>";
            tablareporte += arrayReport;
            console.log(arrayReport);
            tablareporte += "</tbody></table><br/>";
            $("#tableReports").html(tablareporte);
        });
        break;

        //Reporte redactores
        case '2':
        $.getJSON("index.php/form/get_Report_Redactor", function(objRData){
            arrayReport = objRData;
            tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Nombres</th><th scope='col'>Estado</th><th scope='col'>Total</th></tr></thead><tbody>";

            if (arrayReport.length >0){
                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].a01Nombres + "</td><td>" + arrayReport[i].ESTADO + "</td><td>" + arrayReport[i].TOTAL + "</td></tr>";
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }

        });
        break;

        //Reporte consultores
        case '3':
        $.getJSON("index.php/form/get_Report_Consultor", function(objRData){
            arrayReport = objRData;
            tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Nombres</th><th scope='col'>Estado</th><th scope='col'>Total</th></tr></thead><tbody>";

            if (arrayReport.length >0){
                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].a01Nombres + "</td><td>" + arrayReport[i].ESTADO + "</td><td>" + arrayReport[i].TOTAL + "</td></tr>";
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }

        });
        break;

        //Reporte juridicos
        case '4':
        $.getJSON("index.php/form/get_Report_Juridico", function(objRData){
            arrayReport = objRData;
            tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Nombres</th><th scope='col'>Estado</th><th scope='col'>Total</th></tr></thead><tbody>";

            if (arrayReport.length >0){
                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].a01Nombres + "</td><td>" + arrayReport[i].ESTADO + "</td><td>" + arrayReport[i].TOTAL + "</td></tr>";
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }

        });
        break;

        //Reporte Gerente
        case '5':
        $.getJSON("index.php/form/get_Report_Gerente", function(objRData){
            arrayReport = objRData;
            if(arrayReport.length >0){
                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    totalRegistros = totalRegistros + parseInt(arrayReport[i].conteo);

                    switch(arrayReport[i].estado){
                        //Nuevo
                        case '1':
                        nuevos = parseInt(arrayReport[i].conteo);
                        break;

                        //Guardado
                        case '2':
                        guardados = parseInt(arrayReport[i].conteo);
                        break;

                        //Devuelto historico
                        case '7':
                        devueltos = parseInt(arrayReport[i].conteo);
                        break;

                        //Finalizado
                        case '8':
                        finalizados = parseInt(arrayReport[i].conteo);
                        break;

                        default:
                        break;

                    }

                }

                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Redactor</th><th scope='col'>Nuevo</th><th scope='col'>Guardado</th><th scope='col'>Devuelto Histórico</th><th scope='col'>Finalizado</th><th scope='col'>Total</th></tr></thead><tbody>";
                tablareporte += "<tr><td>Gerente</td><td>" + nuevos + "</td><td>" + guardados + "</td><td>" + devueltos + "</td><td>" + finalizados + "</td><td>" + totalRegistros + "</td></tr>";
                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);

            }
            else
            {
                $("#tableReports").css("display","none");
            }
        });
        break;
    }

}

//-Extraer parametros QueryString-//
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

});


$(document).ajaxStart(function() {
    $(".modal").modal('show');
}).ajaxStop(function() {
    $(".modal").modal('hide');
});