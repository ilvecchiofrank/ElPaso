// JavaScript Document
// Created by: Alvaro Arturo Montenegro Silva
// Email: arthvrian@yahoo.com
// Date: 2014-04-23
$(document).ready(function() {
    $("#FormSearch").validate({
        rules : {
            TxtFormNo: {
                required: function () {
                    return $("#TxtPersonIdentity").val() == "" && $("#TxtPersonName").val() == "";
                }
            },
            TxtPersonIdentity: {
                required: function () {
                    return $("#TxtFormNo").val() == "" && $("#TxtPersonName").val() == "";
                }
            },
            TxtPersonName: {
                required: function () {
                    return $("#TxtPersonIdentity").val() == "" && $("#TxtFormNo").val() == "";
                }
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                beforeSubmit: showRequestSearch,
                success: showResponseSearch,
                dataType: "json"
            });
            return false;
        }
    });
});
/**
 * Funcion showRequestSearch
 *
 * Ejecuta procesos antes de enviar el formulario
 *
 * @param formData
 * @param jqForm
 * @param options
 */
function showRequestSearch(formData, jqForm, options) {
    $("#responseContainer").hide();
    $(".results").hide();
    $(".table tbody").html("");
    $("button[type=submit]").click(function () {
        $(this).button("loading");
    });
}
/**
 * Funcion showResponseSearch
 *
 * Ejecuta procesos despesu de enviar el formulario con los datos
 * obtenidos en la respuesta
 *
 * @param responseText
 * @param statusText
 * @param xhr
 * @param $form
 */
function showResponseSearch(responseText, statusText, xhr, $form) {
    if (statusText == "success") {
        $("#responseContainer").find("h4")
            .html(responseText.TxtTitle);

        if (responseText.TxtErrorForm) {
            $("#responseContainer").find("div.alert")
                .addClass("alert-danger")
                .removeClass("alert-success");
            $("#responseText").html(responseText.TxtError);
        }
        if (responseText.TxtSuccessForm) {
            $($form).resetForm();
            $(".table tbody").html("");
            $(".results").show();

            $("#responseContainer").find("div.alert")
                .removeClass("alert-danger")
                .addClass("alert-success");
            $("#responseText").html(responseText.TxtSuccess);

            $.each(responseText.arrRResults, function(inRIndex, arrRData) {
                var objLTableRow = document.createElement("tr");
                var objLTableData = document.createElement("td");
                var objLAnchorC = document.createElement("a");
                var objLAnchorD = $(objLAnchorC).clone();
                var objLAnchorU = $(objLAnchorC).clone();
                var objLAnchorP = $(objLAnchorC).clone();
                var objLAnchorPF = $(objLAnchorC).clone();
                var objLAnchorA = $(objLAnchorC).clone();
                var objLAnchorJA = $(objLAnchorC).clone();
                var objLAnchorCRBD = $(objLAnchorC).clone();
                var objLAnchorE = $(objLAnchorC).clone();
                var objLAnchorUD = $(objLAnchorC).clone();
                var objLAnchorCERT = $(objLAnchorC).clone();
                var objLAnchorF = $(objLAnchorC).clone();
                var objLAnchorRJ = $(objLAnchorC).clone();

                $(objLAnchorC).attr("href", "index.php/form/chapter/A/" + arrRData.a11Codigo)
                    .html("Completar").addClass("btn btn-warning");
                $(objLAnchorD).attr("href", "index.php/form/view/" + arrRData.form)
                    .html("Imagen/PDF").addClass("btn btn-success");
                $(objLAnchorU).attr("href", "index.php/form/done/" + arrRData.form)
                    .html("Terminar").addClass("btn btn-danger");
                $(objLAnchorU).attr("target","_blank");
                $(objLAnchorJA).attr("target","_blank");
                $(objLAnchorJA).attr("href", "index.php/form/tutelas?docId=" + arrRData.cc)
                    .html("Tutelas").addClass("btn btn-default");
                $(objLAnchorP).attr("target","_blank");
                $(objLAnchorP).attr("href", "index.php/form/print_form/" + arrRData.form)
                    .html("Imprimir").addClass("btn btn-info");
                $(objLAnchorP).attr("target","_blank");
                $(objLAnchorRJ).attr("target", "_blank");
                $(objLAnchorRJ).attr("href", "index.php/form/pre_letter?formCode=" + arrRData.form + "&docId=" + arrRData.cc)
                    .html("Responder").addClass("btn btn-danger");
                $(objLAnchorPF).attr("target","_blank");
                $(objLAnchorPF).attr("href", "index.php/form/print_full/" + arrRData.form)
                    .html("Ver Respuestas").addClass("btn btn-info");
                $(objLAnchorPF).attr("target","_blank");
                $(objLAnchorCRBD).attr("target","_blank");
                $(objLAnchorCRBD).attr("href", "index.php/form/dbmatch?docId=" + arrRData.cc)
                    .html("Ver Cruces DB").addClass("btn btn-warning");
                $(objLAnchorCRBD).attr("target","_blank");
                $(objLAnchorA).attr("href", "index.php/form/print_form/" + arrRData.form + "/full")
                    .html("Ver").addClass("btn btn-warning");
                $(objLAnchorE).attr("href", "index.php/form/chapter/A/" + arrRData.form)
                    .html("Editar").addClass("btn btn-success");
                $(objLAnchorUD).attr("href", "index.php/form/upload/" + arrRData.form)
                    .html("Subir Documentos").addClass("btn btn-default");
                $(objLAnchorUD).attr("target","_blank");
                $(objLAnchorCERT).attr("href", "index.php/certifications/admin?formCode=" + arrRData.form)
                    .html("Digitar Certificaciones").addClass("btn btn-success");
                $(objLAnchorCERT).attr("target","_blank");
                $(objLAnchorF).attr("target","_blank");
                $(objLAnchorF).attr("href", "index.php/form/files?formCode=" + arrRData.form + "&docId=" + arrRData.cc)
                    .html("Ver Certificaciones").addClass("btn btn-success");
                $(objLTableRow).appendTo(".table");
                $(objLTableData).clone().html(++inRIndex).appendTo(objLTableRow);

                if (arrRData.cc) {
                    $(objLTableData).clone().html(arrRData.cc).appendTo(objLTableRow);
                    $(objLTableData).clone().html(arrRData.nombresapellidos).appendTo(objLTableRow);
                    $(objLTableData).clone().html(arrRData.form).appendTo(objLTableRow);
                    //$(objLTableData).clone().html(arrRData.a11Direccion).appendTo(objLTableRow);
                    //$(objLTableData).clone().html(arrRData.a11Telefono).appendTo(objLTableRow);

                    if (!arrRData.nombresapellidos) {
                        /*Switch RUser*/
                        switch(responseText.inRUserType) {

                            case "4":
                            $(objLTableData).clone().append(objLAnchorF).appendTo(objLTableRow);
                            break;

                            default:
                            $(objLTableData).clone().append(objLAnchorC).appendTo(objLTableRow);
                            break;
                        }
                    }
                }
                if (arrRData.nombresapellidos) {
                    // $(objLTableData).clone().html(arrRData.cc).appendTo(objLTableRow);
                    // $(objLTableData).clone().html(arrRData.nombresapellidos).appendTo(objLTableRow);
                    // $(objLTableData).clone().html(arrRData.form).appendTo(objLTableRow);
                    //$(objLTableData).clone().html(arrRData.a08AP04).appendTo(objLTableRow);
                    //$(objLTableData).clone().html(arrRData.a08AP06).appendTo(objLTableRow);

                    var objLAction = $(objLTableData).clone().appendTo(objLTableRow);

                    /*Switch RUser*/
                    switch(responseText.inRUserType) {
                        case "1":
                            $(objLAction).append(" ").append(objLAnchorE);
                            $(objLAction).append(" ").append(objLAnchorP);
                            $(objLAction).append(" ").append(objLAnchorPF);
                            break;

                        case "2":
                            if (!arrRData.a07Imagen || !arrRData.a07CodigoBarras) {
                                $(objLAction).append(" ").append(objLAnchorU);
                            }
                            else {
                                $(objLAction).append(" ").append(objLAnchorD);
                            }
                            if (arrRData.a07Busqueda) {
                                $(objLAction).append(" ").append(objLAnchorA);
                            }
                            $(objLAction).append(" ").append(objLAnchorP);
                            $(objLAction).append(" ").append(objLAnchorPF);
                            break;

                        case "3":
                            $(objLAction).append(" ").append(objLAnchorUD);
                            $(objLAction).append(" ").append(objLAnchorCERT);
                            break;

                        case "4":
                            $(objLAction).append(" ").append(objLAnchorF);
                            $(objLAction).append(" ").append(objLAnchorPF);
                            $(objLAction).append(" ").append(objLAnchorCRBD);
                            $(objLAction).append(" ").append(objLAnchorJA);
                            $(objLAction).append(" ").append(objLAnchorRJ);
                            break;

                        default:
                            break;
                    }
                }
            });
        }

        $("button[type=submit]").button("reset");
        $(".btn-group input, .btn-group-vertical input").find("label")
            .removeClass("btn-success").addClass("btn-default");

        if (responseText.inRUserType != 3) {
            $("#responseContainer").show();
        }
    }
}