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

        case '6':
        $("#lgndTitle").html("Reporte Categorías Redactor");
        loadReportData(tipo);
        break;

        case '7':
        $("#lgndTitle").html("Reporte Tipologías Redactor");
        loadReportData(tipo);
        break;

        case '8':
        $("#lgndTitle").html("Reporte Categorías Jurídico");
        loadReportData(tipo);
        break;

        case '9':
        $("#lgndTitle").html("Reporte Tipologías Jurídico");
        loadReportData(tipo);
        break;

        case '10':
        $("#lgndTitle").html("Reporte Tipologías Gerente");
        loadReportData(tipo);
        break;

        case '11':
        $("#lgndTitle").html("Reporte General Tipologías");
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
    var tablatotal = "";
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
            tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Redactor (Pend.)</th><th scope='col'>Redactor (Cerr.)</th><th scope='col'>Coordinador (Pend.)</th><th scope='col'>Coordinador (Cerr.)</th><th scope='col'>Juridico (Pend.)</th><th scope='col'>Juridico (Cerr.)</th><th scope='col'>Gerente (Pend.)</th><th scope='col'>Gerente (Cerr.)</th><th scope='col'>Cartas Enviadas - Terminados</th><th scope='col'>Tip 6 - Sin asignar</th></tr></thead><tbody>";
            tablareporte += arrayReport;
            console.log(arrayReport);
            tablareporte += "</tbody></table><br/>";
            $("#tableReports").html(tablareporte);
        });

        $("#report_total").css("display", "none");

        break;

        //Reporte redactores
        case '2':

        //Totales
        $.getJSON("index.php/form/get_Report_Total_Redactor", function(objRData){
            arrayTotal = objRData;
            tablatotal += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Total</th></tr></thead><tbody>";

            if (arrayTotal.length >0) {
                for (var i = arrayTotal.length - 1; i >= 0; i--) {
                    tablatotal += "<tr><td>" + arrayTotal[i].nombre_estado_carta + "</td><td>" + arrayTotal[i].TOTAL + "</td></tr>";
                }

                tablatotal += "</tbody></table><br/>";
                $("#tableTotal").html(tablatotal);
            }
            else
            {
                $("#report_total").css("display", "none");
            }

        });

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

        //Totales
        $.getJSON("index.php/form/get_Report_Total_Consultor", function(objRData){
            arrayTotal = objRData;
            tablatotal += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Total</th></tr></thead><tbody>";

            if (arrayTotal.length >0) {
                for (var i = arrayTotal.length - 1; i >= 0; i--) {
                    tablatotal += "<tr><td>" + arrayTotal[i].nombre_estado_carta + "</td><td>" + arrayTotal[i].TOTAL + "</td></tr>";
                }

                tablatotal += "</tbody></table><br/>";
                $("#tableTotal").html(tablatotal);
            }
            else
            {
                $("#report_total").css("display", "none");
            }

        });

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

        //Totales
        $.getJSON("index.php/form/get_Report_Total_Juridico", function(objRData){
            arrayTotal = objRData;
            tablatotal += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Total</th></tr></thead><tbody>";

            if (arrayTotal.length >0) {
                for (var i = arrayTotal.length - 1; i >= 0; i--) {
                    tablatotal += "<tr><td>" + arrayTotal[i].nombre_estado_carta + "</td><td>" + arrayTotal[i].TOTAL + "</td></tr>";
                }

                tablatotal += "</tbody></table><br/>";
                $("#tableTotal").html(tablatotal);
            }
            else
            {
                $("#report_total").css("display", "none");
            }

        });

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
            $("#report_total").css("display", "none");
        });
        break;

        //Reporte categorias redactor
        case '6':
        $.getJSON("index.php/form/get_Report_Cat_Redactor", function(objRData){
            arrayReport = objRData;
            if (arrayReport.length >0) {
                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Nombre estado carta</th><th scope='col'>Categoría</th><th scope='col'>Conteo</th></tr><tbody>";

                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].estado + "</td><td>" + arrayReport[i].nombre_estado_carta + "</td><td>" + arrayReport[i].categoria + "</td><td>" + arrayReport[i].conteo + "</td></tr>" ;
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }
            $("#report_total").css("display", "none");
        });
        break;

        //Reporte tipologias redactor
        case '7':
        $.getJSON("index.php/form/get_Report_Tip_Redactor", function(objRData){
            arrayReport = objRData;
            if (arrayReport.length >0) {
                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Nombre estado carta</th><th scope='col'>Tipología</th><th scope='col'>Conteo</th></tr><tbody>";

                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].estado + "</td><td>" + arrayReport[i].nombre_estado_carta + "</td><td>" + arrayReport[i].tipologia + "</td><td>" + arrayReport[i].conteo + "</td></tr>" ;
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }
            $("#report_total").css("display", "none");
        });
        break;

        //Reporte categorias juridico
        case '8':
        $.getJSON("index.php/form/get_Report_Cat_Juridico", function(objRData){
            arrayReport = objRData;
            if (arrayReport.length >0) {
                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Nombre estado carta</th><th scope='col'>Categoría</th><th scope='col'>Conteo</th></tr><tbody>";

                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].estado + "</td><td>" + arrayReport[i].nombre_estado_carta + "</td><td>" + arrayReport[i].categoria + "</td><td>" + arrayReport[i].conteo + "</td></tr>" ;
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }
            $("#report_total").css("display", "none");
        });
        break;

        //Reporte tipologias juridico
        case '9':
        $.getJSON("index.php/form/get_Report_Tip_Juridico", function(objRData){
            arrayReport = objRData;
            if (arrayReport.length >0) {
                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Nombre estado carta</th><th scope='col'>Tipología</th><th scope='col'>Conteo</th></tr><tbody>";

                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].estado + "</td><td>" + arrayReport[i].nombre_estado_carta + "</td><td>" + arrayReport[i].tipologia + "</td><td>" + arrayReport[i].conteo + "</td></tr>" ;
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }
            $("#report_total").css("display", "none");
        });
        break;

        //Reporte tipologias gerente
        case '10':
        $.getJSON("index.php/form/get_Report_Tip_Gerente", function(objRData){
            arrayReport = objRData;
            if (arrayReport.length >0) {
                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>Nombre estado carta</th><th scope='col'>Tipología</th><th scope='col'>Conteo</th></tr><tbody>";

                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].estado + "</td><td>" + arrayReport[i].nombre_estado_carta + "</td><td>" + arrayReport[i].tipologia + "</td><td>" + arrayReport[i].conteo + "</td></tr>" ;
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }
            $("#report_total").css("display", "none");
        });
        break;

        //Tipologias general
        case '11':
        $.getJSON("index.php/form/get_Report_Tip_General", function(objRData){
            arrayReport = objRData;
            console.log(arrayReport);
            if (arrayReport.length >0) {
                tablareporte += "<table border='1' cellpadding='1' cellspacing='1' style='width: 85%'><thead><tr><th scope='col'>Estado</th><th scope='col'>1</th><th scope='col'>2</th><th scope='col'>3</th><th scope='col'>4</th><th scope='col'>5</th><th scope='col'>6</th><th scope='col'>7</th><th scope='col'>8</th><th scope='col'>9</th><th scope='col'>10</th><th scope='col'>11</th><th scope='col'>12</th><th scope='col'>13</th><th scope='col'>14</th><th scope='col'>15</th><th scope='col'>16</th><th scope='col'>17</th><th scope='col'>18</th><th scope='col'>19</th><th scope='col'>20</th><th scope='col'>21</th><th scope='col'>22</th><th scope='col'>23</th><th scope='col'>Total</th></tr><tbody>";

                for (var i = arrayReport.length - 1; i >= 0; i--) {
                    tablareporte += "<tr><td>" + arrayReport[i].Estado + "</td><td>" + arrayReport[i].t_1 + "</td><td>" + arrayReport[i].t_2 + "</td><td>" + arrayReport[i].t_3 + "</td><td>" + arrayReport[i].t_4 + "</td><td>" + arrayReport[i].t_5 + "</td><td>" + arrayReport[i].t_6 + "</td><td>" + arrayReport[i].t_7 + "</td><td>" + arrayReport[i].t_8 + "</td><td>" + arrayReport[i].t_9 + "</td><td>" + arrayReport[i].t_10 + "</td><td>" + arrayReport[i].t_11 + "</td><td>" + arrayReport[i].t_12 + "</td><td>" + arrayReport[i].t_13 + "</td><td>" + arrayReport[i].t_14 + "</td><td>" + arrayReport[i].t_15 + "</td><td>" + arrayReport[i].t_16 + "</td><td>" + arrayReport[i].t_17 + "</td><td>" + arrayReport[i].t_18 + "</td><td>" + arrayReport[i].t_19 + "</td><td>" + arrayReport[i].t_20 + "</td><td>" + arrayReport[i].t_21 + "</td><td>" + arrayReport[i].t_22 + "</td><td>" + arrayReport[i].t_23 + "</td><td>" + arrayReport[i].Total + "</td></tr>" ;
                }

                tablareporte += "</tbody></table><br/>";
                $("#tableReports").html(tablareporte);
            }
            else
            {
                $("#tableReports").css("display","none");
            }
            $("#report_total").css("display", "none");
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