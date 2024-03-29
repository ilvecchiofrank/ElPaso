$(document).ready(function () {

loadControlValues();

loadTutelas();
loadEntrev();
loadpqrs();
loadRadicanex();

$("#txtIdentificador").html(getParameterByName("formCode"));
$("#txtCedula").html(getParameterByName("docId"));

/*Validar formulario*/
if (formCode == 'undefined'){
  $("#formulario").css("display","none");
  $("#results").css("display","none");
  $("#docuIdentifica").css("display","block");
}

function loadRadicanex(){
    var cedula = getParameterByName("docId");
    var tablaRadicanex = "";
    $.getJSON("index.php/form/get_Radicanex/" + cedula, function(objRData){
        arrayRadicanex = objRData;

        if(arrayRadicanex.length >0){
            tablaRadicanex += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipo</th><th scope='col'>Cédula</th><th scope='col'>Detalle</th></tr></thead><tbody>";


            for (var i = arrayRadicanex.length - 1; i >= 0; i--) {

                var ruta = arrayRadicanex[i].path.replace("Q:emgesaCD/", "https://emgesa.s3.amazonaws.com/CD/");
                tablaRadicanex += "<tr><td>" + arrayRadicanex[i].tipo + "</td><td>" + arrayRadicanex[i].cedula + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";

            }

            tablaRadicanex += "</tbody></table><br/>";
            $("#tableRadicAnexResults").html(tablaRadicanex);

        }else{
            $("#tableRadicAnexResults").css("display", "none");
        }

    });
}

function loadpqrs(){
    var cedula = getParameterByName("docId");
    var tablapqr = "";
    $.getJSON("index.php/form/get_Pqr/" + cedula, function(objRData){
        arrayPqrs = objRData;

        if(arrayPqrs.length >= 1){

            tablapqr += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Tipo</th><th scope='col'>Año</th><th scope='col'>Radicado</th><th scope='col'>Caso</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var p = arrayPqrs.length -1; p >=0; p--){
                var ruta = arrayPqrs[p].path.replace("Q:emgesaCD/", "https://emgesa.s3.amazonaws.com/CD/");
                tablapqr += "<tr><td>" + arrayPqrs[p].tipo + "</td><td>" + arrayPqrs[p].año + "</td><td>" + arrayPqrs[p].radicado + "</td><td>" + arrayPqrs[p].caso + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }

        }
        else
        {
            $("tablePqrsResults").css("display","none");
        }

        tablapqr += "</tbody></table><br/>";
        $("#tablePqrsResults").html(tablapqr);
    });
}

function loadEntrev(){
    var cedula = getParameterByName("docId");
    var tablaentrev = "";
/*    $.getJSON("index.php/form/get_Entrev/" + cedula, function(objRData){
        arrayEntrev = objRData;
        if (arrayEntrev.length >=1) {
            tablaentrev += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Actividad</th><th scope='col'>Fecha Entrevista</th><th scope='col'>Observaciones</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var e = arrayEntrev.length - 1; e >= 0; e--) {
            var ruta = "http://emgesa.s3.amazonaws.com/CD/" + arrayEntrev[e].PATH;
            tablaentrev += "<tr><td>" + arrayEntrev[e].ACTIVIDAD + "</td><td>" + arrayEntrev[e].FECHA_ENTREVISTA + "</td><td>" + arrayEntrev[e].OBSERVACIONES + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }

        }
        else
        {
            $("#tableEntrevResults").css("display","none");
        }

        tablaentrev += "</tbody></table><br/>";
        $("#tableEntrevResults").html(tablaentrev);

    });*/

}

function loadTutelas(){
    var cedula = getParameterByName("docId");
    var tabtutelas = "";
    $.getJSON("index.php/form/get_Tutelas/" + cedula, function(objRData){
        arrayTutelas = objRData;

        if (arrayTutelas.length >= 1){
            tabtutelas += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%'><thead><tr><th scope='col'>Número de proceso</th><th scope='col'>Tema</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var t = arrayTutelas.length -1; t >=0; t--){
                var ruta = arrayTutelas[t].path.replace("Q:emgesaTutelas", "https://s3.amazonaws.com/emgesa/Tutelas/");
                tabtutelas += "<tr><td>" + arrayTutelas[t].numero_proceso + "</td><td>" + arrayTutelas[t].temas + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }

        }
        else
        {
            $("#tutelas").css("display","none");
        }

        tabtutelas += "</tbody></table><br/>";
        $("#tableTutelasResults").html(tabtutelas);
    });
}

function loadControlValues(){
    var code = getParameterByName("formCode");
    var tabla = "";
    var tablaBefore = "";

    $.getJSON("index.php/form/get_FilesN/" + code, function(objRData){
        arrayNDocuments = objRData;

        if (arrayNDocuments.length >= 1){
            tabla += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%;'><thead><tr><th scope='col'>Tipo de Documento</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var i = arrayNDocuments.length - 1; i >= 0; i--) {
                var ruta = arrayNDocuments[i].a18RutaArchivo.replace("amazon_root/emgesa/00REPOSITORIO", "https://s3.amazonaws.com/emgesa/00REPOSITORIO13092014");
                var tipo = "";

                switch(arrayNDocuments[i].a18TipoArchivo) {
                case "01Formato":
                    tipo = "Formato de inscripción y Habeas Data";
                    break;

                case "02Cedula":
                    tipo = "Cédula de ciudadanía";
                    break;

                case "03Poder":
                    tipo = "Poder";
                    break;

                case "04CL":
                    tipo = "Certificación Laboral";
                    break;

                case "05AutoEntidades":
                    tipo = "Auto Entidades";
                    break;

                case "06Terceros":
                    tipo = "Terceros";
                    break;

                case "07CertComercial":
                    tipo = "Certificación Comercial";
                    break;

                case "08Factura":
                    tipo = "Factura";
                    break;

                case "09CertVecindad":
                    tipo = "Certificación de Vecindad";
                    break;
                case "10DerPeticion":
                    tipo = "Derecho de petición";
                    break;

                case "11RadicadosEmgesa":
                    tipo = "Radicados Emgesa";
                    break;

                case "12Otros":
                    tipo = "Otros Documentos";
                    break;

                case "Formato No VÃ¡lido":
                    tipo = "Formato No Válido";
                    break;

                case "Video":
                    tipo = "Video";
                    break;
                }

                tabla += "<tr><td>" + tipo + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }

            tabla += "</tbody></table><br/>";
            $("#tableResults").html(tabla);
        }
        else
        {
            $("#tableResults").css("display", "none");
        }

    });

    $.getJSON("index.php/form/get_FilesNBefore/" + code, function(objRData){
        arrayNDocuments = objRData;
        if (arrayNDocuments.length > 0) {
            tablaBefore += "<table border='1' cellpadding='1' cellspacing='1' style='width: 65%;'><thead><tr><th scope='col'>Tipo de Documento</th><th scope='col'>Detalle</th></tr></thead><tbody>";

            for (var i = arrayNDocuments.length - 1; i >= 0; i--) {
                var ruta = arrayNDocuments[i].a18RutaArchivo.replace("amazon_root/emgesa/ENTREVISTAS/La_Honda", "https://s3.amazonaws.com/emgesa/ENTREVISTAS/La_Honda");
                var tipo = "";

            switch(arrayNDocuments[i].a18TipoArchivo) {
                case "01Formato":
                    tipo = "Formato de inscripción y Habeas Data";
                    break;

                case "02Cedula":
                    tipo = "Cédula de ciudadanía";
                    break;

                case "03Poder":
                    tipo = "Poder";
                    break;

                case "04CL":
                    tipo = "Certificación Laboral";
                    break;

                case "05AutoEntidades":
                    tipo = "Auto Entidades";
                    break;

                case "06Terceros":
                    tipo = "Terceros";
                    break;

                case "07CertComercial":
                    tipo = "Certificación Comercial";
                    break;

                case "08Factura":
                    tipo = "Factura";
                    break;

                case "09CertVecindad":
                    tipo = "Certificación de Vecindad";
                    break;
                case "10DerPeticion":
                    tipo = "Derecho de petición";
                    break;

                case "11RadicadosEmgesa":
                    tipo = "Radicados Emgesa";
                    break;

                case "12Otros":
                    tipo = "Otros Documentos";
                    break;

                case "Formato No VÃ¡lido":
                    tipo = "Formato No Válido";
                    break;

                case "Video":
                    tipo = "Video";
                    break;
                }

                tablaBefore += "<tr><td>" + tipo + "</td><td>" + "<a href='" + ruta + "' target='_blank' class='btn btn-success'>Ver Detalle</a>" + "</td></tr>";
            }

            tablaBefore += "</tbody></table><br/>";
            $("#tableEntrevResults").html(tablaBefore);
        }
        else
        {
            $("#tableEntrevResults").css("display", "none");
        }

    });

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