$(document).ready(function () {

$(".modal").modal('show');
loadT8();
loadData();
resumeForm();
$(".modal").modal('hide');
//loadMun();
saveForm();
fader();

 $("#processtype").change(function(){
    //Verificar la opcion seleccionada
    if($("#processtype").val()=='1'){
        //Tutela
        $("#participacion").hide();
        $("#participacion").removeAttr('checked');
        $("#lblParticipacion").hide();
        $("#casacion").hide();
        $("#casacion").removeAttr('checked');
        $("#lblCasacion").hide();
        $("#desacato").show();
        $("#lblDesacato").show();
        $("#selecRevision").show();
        $("#lblSelecRevision").show();
    }
    else
    {
        //Acción de grupo
        $("#participacion").show();
        $("#lblParticipacion").show();
        $("#casacion").show();
        $("#lblCasacion").show();
        $("#desacato").hide();
        $("#desacato").removeAttr('checked');
        $("#lblDesacato").hide();
        $("#selecRevision").hide();
        $("#selecRevision").removeAttr('checked');
        $("#lblSelecRevision").hide();
    }
});

$("#txtCedula").html(getParameterByName("docId"));

//Autosave
var autoGuardar = setInterval(
    function(){
        autosave();
    }, 1200000
);

//Cargar editor
var fillEditor = setInterval(
    function(){
        CKEDITOR.instances['contenido'].setData($("#hfContent").val());
        clearInterval(fillEditor);
        //-Ocultar controles ckeditor-//
        $("#cke_23").css("display","none");
        $("#cke_30").css("display","none");
        $("#cke_32").css("display","none");
    }, 4000
);

function prevalida(){

//Validar seleccion del campo reune los requisitos
var radio = $('input:radio[name="firma"]:checked');
if(radio.length == 0)//No se ha seleccionado nada
   {
       $("#lblAplica").html("*Campo obligatorio");
       return;
   }
    $("#lblAplica").html("");

}

function autosave(){
    saveNotify('auto');
}

function check_status(boton_llama){

    //Iniciar estado Nuevo
    var estado = 1;

    switch(boton_llama) {
    case "G":
        //Guardar
        estado = 2;
        break;
    case "C":
        //Cerrar
        estado = 3;
        break;
    case "R":
        //Recategorizar
        estado = 6;
        break;
    default:
        //Devolver
        if($("#hfUserType") < 6){
            estado = 4;
        }
        else
        {
            estado = 2;
        }
    }

    return estado;

}

function saveNotify(auto, boton){

var cedula = getParameterByName("docId");
var formulario_id = getParameterByName("formCode");
var categoria_id = getParameterByName("cId");
var tipologia_id = getParameterByName("tId");
var tipo_usuario = $("#hfUserType").val();
var id_usuario = $("#hfUserId").val();
var contenido = CKEDITOR.instances.contenido.getData();
var estado = check_status(boton);

            //-Consultar si ya existe una carta por la cedula con un proceso activo-//
            $.getJSON("index.php/form/get_Letter_Exist/" + cedula, function(objRData){
                arrayLetterExists = objRData;

                if(arrayLetterExists.length > 0){
                    //Si existe tutela
                    console.log("Carta existe, actualización");
                     $.ajax({
                    url: "index.php/form/do_updateLetters/" + getParameterByName("letId"),
                    type: "POST",
					data: { csrf_test_name: get_csrf_hash, "modulo_actual": tipo_usuario,  "estado": estado, "cuerpo_mensaje": JSON.stringify(contenido), "categoria":categoria_id, "tipologia":tipologia_id, "formulario":formulario_id, "cedula":cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray())},
                    success: function(result){
                        if (result == "ok"){
                            //Guardado ok
                                if(auto=='auto'){
                                    notify('auto');
                                }else{
                                    notify('ok');
                                }
                        }else{
                            console.log('Resultado update: ' + result);
                        }

                            //Evaluar redireccion
                            if (auto == undefined){
                                //Boton cerrar
                                window.close();
                                //window.location.href = "index.php/form/dash?uT=" + $("#hfUserType").val() + "&uI=" + $("#hfUserId").val();
                                //console.log("Redirecciona");
                            }
                            else{
                                console.log("No redirecciona");
                            }
                    },
                    error: function(){
                        //Error
                        notify('error');
                    }
                 });
                }else{
                    //Tutela nueva
                    console.log("Carta nueva, crear");
                    $.ajax({
                        url: "index.php/form/do_SaveLetter",
                        type: "POST",
                        data: { csrf_test_name: get_csrf_hash, "estado": estado, "cuerpo_mensaje": JSON.stringify(contenido), "categoria":categoria_id, "tipologia":tipologia_id, "formulario":formulario_id, "cedula":cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray())},
                        success: function(result){
                            if (result == "ok"){
                                //Guardado ok
                                console.log("guardado ok");
                                if(auto=='auto'){
                                    notify('auto');
                                }else{
                                    notify('ok');
                                }
                            }else{
                                console.log('Resultado insert: ' + result);
                            }

                            //Evaluar redireccion
                            if (auto == undefined){
                                //Boton
                                window.close();
                                //window.location.href = "index.php/form/dash?uT=" + $("#hfUserType").val() + "&uI=" + $("#hfUserId").val();
                                //console.log("Redirecciona");
                            }
                            else{
                                console.log("No redirecciona");
                            }

                        },
                        error: function(){
                            //Error
                            notify('error');
                        }
                    });
                }

            });

}

function notify(tipo){
    //Se crea el mensaje para la notificación
     var act_date = new Date();
     var mes = "";
     var mes2 = act_date.getMonth() + 1;
     var dia = act_date.getDate();
     var año = "";
     var hora = act_date.getHours();
     var minuto =act_date.getMinutes();
     var segundo = act_date.getSeconds();

    //Poner cero a digitos simples
     dia = (dia < 10) ? '0' + dia : dia;
     hora = (hora < 10) ? '0' + hora : hora;
     minuto = (minuto < 10) ? '0' + minuto : minuto;
     segundo = (segundo < 10) ? '0' + segundo : segundo;

    switch(act_date.getMonth()) {
        default:
     mes = (mes2 < 10) ? '0' + mes2 : mes2;
    }

    switch(tipo){
        case 'auto':
            $("#divUpdate").html("<b>Registro actualizado. </b> Última modificación: " + dia + "/" + mes + "/" + act_date.getFullYear() + " " + hora + ":" + minuto + ":" + segundo);
            $("#divUpdate").fadeIn("slow");
        break;

        case 'error':
            $("#divError").html("<b>Falló el guardado. </b> Ha ocurrido un error al guardar. " + dia + "/" + mes + "/" + act_date.getFullYear() + " " + hora + ":" + minuto + ":" + segundo);
            $("#divError").fadeIn("slow");
        break;

        case 'ok':
            $("#divUpdate").html("<b>Registro guardado. </b> Última modificación: " + dia + "/" + mes + "/" + act_date.getFullYear() + " " + hora + ":" + minuto + ":" + segundo);
            $("#divUpdate").fadeIn("slow");
        break;
    }

}

//Carga de municipios y departamento
function loadMun(){

    //Cargar listado de departamentos
    $.getJSON("index.php/form/get_Dpto/", function(objRData){
        $("#departamento").html(objRData);
    });

    //Cargar municipios en el cambio de departamento
    $("#departamento").change(function(){
        $(".modal").modal('show');
        updDepto();
        $(".modal").modal('hide');
    });
}

function updDepto(){

    if($("#departamento").val() != ''){

        var departamento = $("#departamento").val();
        $.getJSON("index.php/form/get_Mpo/" + departamento, function(objRData){
        $("#municipio").html(objRData);

        if($("#hfMunicipio").val != ''){
            $("#municipio").val($("#hfMunicipio").val());
        }

        });
    }

}

function saveForm(){
       $("#saveInfo").click( function(){
            //Validar seleccion del campo reune los requisitos
            var radio = $('input:radio[name="firma"]:checked');
            if(radio.length == 0)//No se ha seleccionado nada
               {
                   $("#lblAplica").html("*Campo obligatorio");
                   return;
               }
                $("#lblAplica").html("");

            saveNotify('no','G');
            // $("#divActions").after('<div class="alert alert-success tmpAlert" style="margin-top: 1em;" role="alert"><strong>Guardado Exitoso!</strong><br/>El formulario de almaceno con exito.</div>');
            // setTimeout("$('.tmpAlert').fadeOut();", 2000);
         });

       $("#saveClose").click( function(){
            //Validar seleccion del campo reune los requisitos
            var radio = $('input:radio[name="firma"]:checked');
            if(radio.length == 0)//No se ha seleccionado nada
               {
                   $("#lblAplica").html("*Campo obligatorio");
                   return;
               }
                $("#lblAplica").html("");

            $("#saveClose").css("display", "none");
            saveNotify(undefined,'C');
         });

       $("#btnRecat").click( function(){

            //Validar seleccion del campo reune los requisitos
            var radio = $('input:radio[name="firma"]:checked');
            if(radio.length == 0)//No se ha seleccionado nada
               {
                   $("#lblAplica").html("*Campo obligatorio");
                   return;
               }
                $("#lblAplica").html("");

            if( $("#divDevolver").css('display') == 'none' ){
            $("#lblDevolver").html('Motivo de la recategorización:');
            $("#divDevolver").css('display', 'block');
            $("#btnRecat").html('Confirmar recategorización');
            }else{
            //$("#divDevolver").css('display', 'none');

                if($("#txtDevolver").size < 3){
                    $("#lblDevolver").html('Motivo de la recategorización: <font color = "red">*(Campo requerido)</font>');
                    $("#txtDevolver").focus();
                }
                else
                {
                    //saveNotify(undefined, 'R');
					//console.log("recategorizar");
					var cedula = getParameterByName("docId");
					var formulario_id = getParameterByName("formCode");
					var categoria_id = getParameterByName("cId");
					var tipologia_id = getParameterByName("tId");
					var tipo_usuario = $("#hfUserType").val();
					var id_usuario = $("#hfUserId").val();
					var contenido = CKEDITOR.instances.contenido.getData();
					var estado = 6;

					$.ajax({
					url: "index.php/form/do_recatLetters/" + getParameterByName("letId"),
					type: "POST",
					data: { csrf_test_name: get_csrf_hash, "modulo_actual": tipo_usuario,  "estado": estado, "cuerpo_mensaje": JSON.stringify(contenido), "categoria":categoria_id, "tipologia":tipologia_id, "formulario":formulario_id, "cedula":cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray())},
					success: function(result){
						if(result == "ok"){
							window.close();
							//console.log("recategorizado!");
						}else{
							//console.log("error");
						}
					}
					});

                }

            }

       });
}

function fader(){
    $("#divError").click( function(){
        $("#divError").fadeOut("slow");
        }
    );

    $("#divUpdate").click( function(){
        $("#divUpdate").fadeOut("slow");
        }
    );

    $("#divClose").click( function(){
        $("#divClose").fadeOut("slow");
        }
    );

}

//-Cargar Datos-//
function loadData(){

var formulario_id = getParameterByName("formCode");

//- Cargar tipologias y categorias -//
$.getJSON("index.php/form/get_Cat_Info/" + formulario_id, function(objRData){
    arrayTipCat = objRData;
    if (arrayTipCat.length > 0) {
        for(var e = arrayTipCat.length -1; e >=0; e--){
            $("#lblTipologia_adic").html(arrayTipCat[e].tipologias);
            $("#lblCategoria_adic").html(arrayTipCat[e].categorias);
        }
    }
});

var categoria_id = getParameterByName("cId");
var tipologia_id = getParameterByName("tId");

    //-Cargar label categoria y tipologia-//
    $.getJSON("index.php/form/get_Tipologias/" + tipologia_id, function(objRData){
        arrayTip = objRData;
        if(arrayTip.length > 0){
            for(var e = arrayTip.length -1; e >=0; e--){

                $("#lblTipologia").html(tipologia_id + ' - ' + arrayTip[e].nombre_tipologia);

            }
        }
    });

    $.getJSON("index.php/form/get_Categorias/" + categoria_id, function(objRData){
        arrayCat = objRData;
        if(arrayCat.length > 0){
            for(var e = arrayCat.length -1; e >=0; e--){

                $("#lblCategoria").html(categoria_id + ' - ' + arrayCat[e].nombre_categoria);

            }
        }
    });

    //-Llenar campos de bloques-//
    $.getJSON("index.php/form/get_Letter_Blocks/", function(objRData){
        arrayBlock = objRData;
        if (arrayBlock.length > 0){
            $("#lblBloque1").html(arrayBlock[0].Cuerpo_txt + " " + formulario_id + " " + arrayBlock[1].Cuerpo_txt  + "<br/><br/>" +  arrayBlock[2].Cuerpo_txt);
            $("#lblBloque2").html(arrayBlock[3].Cuerpo_txt + "<br/><br/>" + arrayBlock[4].Cuerpo_txt + arrayBlock[5].Cuerpo_txt + arrayBlock[6].Cuerpo_txt);
        }

    });

    //-Validaciones de rol-//
    if($("#hfUserType").val() < 6 ){
    $("#putBack").css("display", "none");
    }

    //-Validaciones gerente-//
    if($("#hfUserType").val() == 8 ){
        $("#btnFinish").css("display", "none");
        $("#btnRecat").css("display", "none");
    }

    //-Imprimir Finalizar-//
    if($("#hfUserType").val() != 1){
        if($("#hfUserType").val() != 10){
            $("#btnPrint").css("display", "none");
            $("#btnFinish").css("display", "none");
        }
    }

    //-Validaciones documental-//
    if($("#hfUserType").val() == 10){
        $("#saveClose").css("display", "none");
        $("#putBack").css("display", "none");
        $("#btnRecat").css("display", "none");
    }

    //-Acciones boton Finalizar-//
    $("#btnFinish").click( function(){

        //Validar seleccion del campo reune los requisitos
        var radio = $('input:radio[name="firma"]:checked');
        if(radio.length == 0)//No se ha seleccionado nada
           {
               $("#lblAplica").html("*Campo obligatorio");
               return;
           }
            $("#lblAplica").html("");

        var tipo_usuario = $("#hfUserType").val();
        var cedula = getParameterByName("docId");
        var formulario = getParameterByName("formCode");
        var estado = 10;
        var carta_id = getParameterByName("letId");
        var cuerpo_carta = CKEDITOR.instances['contenido'].getData();

        $.ajax({
                url: "index.php/form/do_finishLetters/" + getParameterByName("letId"),
                type: "POST",
                data:{ csrf_test_name: get_csrf_hash, "modulo_actual": tipo_usuario, "estado": estado, "cuerpo_mensaje": JSON.stringify(cuerpo_carta), "categoria": categoria_id, "tipologia": tipologia_id, "formulario": formulario_id, "cedula": cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray()) },

                success: function(result){
                    if(result == "ok"){
                        window.location.href = 'index.php/form/print_letter/' + formulario + '/' + carta_id;
                    }else{
                        console.log("error");
                    }
                }
        });
    });

	//-Acciones boton devolver-//
	$("#putBack").click( function(){

            //Validar seleccion del campo reune los requisitos
            var radio = $('input:radio[name="firma"]:checked');
            if(radio.length == 0)//No se ha seleccionado nada
               {
                   $("#lblAplica").html("*Campo obligatorio");
                   return;
               }
                $("#lblAplica").html("");

			if( $("#divDevolver").css('display') == 'none' ){
            $("#lblDevolver").html('Motivo de la devolución:');
			$("#divDevolver").css('display', 'block');
			$("#putBack").html('Confirmar devolución');
			}else{

                //Validar contenido
                if ($("#txt_Devolver").val().length > 3) {
                    //llamar proceso de devolucion
                    var cedula = getParameterByName("docId");
                    var formulario_id = getParameterByName("formCode");
                    var categoria_id = getParameterByName("cId");
                    var tipologia_id = getParameterByName("tId");
                    var tipo_usuario = $("#hfUserType").val();
                    var id_usuario = $("#hfUserId").val();
                    var contenido = CKEDITOR.instances.contenido.getData();
                    var estado = 7;//7 es el estado devuelto para el historico

                    $.ajax({
                        url: "index.php/form/do_getBackLetter/" + getParameterByName("letId"),
                        type: "POST",
                        data:{ csrf_test_name: get_csrf_hash, "modulo_actual": tipo_usuario, "estado": estado, "cuerpo_mensaje": JSON.stringify(contenido), "categoria": categoria_id, "tipologia": tipologia_id, "formulario": formulario_id, "cedula": cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray()) },
                        success: function(result){
                            if(result == "ok"){
                                //console.log("Devuelto!");
                                window.close();
                            }
                        }
                    });

                }else{
                    $("#lblDevolver").html('Motivo de la devolución: <font color = "red">*(Campo requerido)</font>');
                    $("#txtDevolver").focus();
                }

			}

        }
    );

}

//-Cargar desde T8-//
function loadT8(){
    var cedula = getParameterByName("docId");
	var formulario = getParameterByName("formCode");
    var carta_id = getParameterByName("letId");
    $.getJSON("index.php/form/get_Tut_Answ_Header/" + cedula, function(objRData){
        arrayT8 = objRData;
        if(arrayT8.length > 0){
            for(var e = arrayT8.length -1; e >=0; e--){

                $("#lblNombres").html(arrayT8[e].nombre + ' ' + arrayT8[e].apellido);
                $("#lblDireccion").html(arrayT8[e].direccion);
                $("#lblVereda").html(arrayT8[e].barrio);
                $("#lblTelefono").html('Teléfono: ' + arrayT8[e].telefono);
                $("#lblMunicipio").html(arrayT8[e].mpo);
                $("#lblDepartamento").html(arrayT8[e].depto);
                var ap_1 = arrayT8[e].apellido.split(' ');

                if(arrayT8[e].genero=='Hombre'){
                    $("#lblSenor").html('Señor:');
                    $("#lblSaludo").html('Estimado señor ' + ap_1[0]);
                }else{
                    $("#lblSenor").html('Señora:');
                    $("#lblSaludo").html('Estimada señora ' + ap_1[0]);
                }

                /*Acciones de los botones de consulta*/
                $("#btnDBMatch").attr("target","_blank");
                $("#btnDBMatch").attr("href", 'index.php/form/dbmatch?docId=' + cedula);
                $("#btnTutela").attr("target","_blank");
                $("#btnTutela").attr("href", 'index.php/form/tutelas?docId=' + cedula);
				$("#btnCert").attr("target","_blank");
                $("#btnCert").attr("href", 'index.php/form/files?formCode=' + formulario + '&docId=' + cedula);
                $("#btnAnswer").attr("target","_blank");
                $("#btnAnswer").attr("href", 'index.php/form/print_full/' + formulario);
                $("#btnCCT").attr("target","_blank");
                $("#btnCCT").attr("href", 'index.php/form/cce');
                $("#btnSuppCon").attr("target","_blank");
                $("#btnSuppCon").attr("href", 'index.php/form/supp_con');
                $("#btnPred").attr("target","_blank");
                $("#btnPred").attr("href", 'index.php/form/pred?formCode=' + formulario);

                /*Vista impresion*/
                $("#btnPrint").attr("target", "_blank");
                $("#btnPrint").attr("href", 'index.php/form/print_letter/' + formulario + '/' + carta_id);
            }
        }
    });
}

//-Precargar Edicion-//
function resumeForm(){
    var carta = getParameterByName("letId");

    //-Consultar los datos de la carta actual-//
    $.getJSON("index.php/form/get_Letter_Info/" + carta, function(objRData){
        arrayCarta = objRData;
        if(arrayCarta.length > 0){
            for (var t = arrayCarta.length -1; t >=0; t--){
                $("#rad_emgesa").val(arrayCarta[t].rad_emgesa);
                $("#rad_stick").val(arrayCarta[t].rad_stick);
                $("#fec_carta").val(arrayCarta[t].fec_carta);
                $("#hfContent").val(arrayCarta[t].cuerpo_mensaje);
                $("input[type='radio'][value='" + arrayCarta[t].firma + "']").parent().trigger('click');

                //- Cargar usuarios asignados -//
                $.getJSON("index.php/form/get_Asigned_Users/" + arrayCarta[t].usuario_redactor + "/" + arrayCarta[t].usuario_consultor + "/" + arrayCarta[t].usuario_juridico + "/" + arrayCarta[t].usuario_gerente , function(objRData){
                    arrayAsigUsr = objRData;
                    if (arrayAsigUsr.length > 0){
                        for (var us = arrayAsigUsr.length -1; us >=0; us--){

                            switch (arrayAsigUsr[us].a01Tipo){

                            case '5':
                            $("#lblRedac").html("Elaboró: " + arrayAsigUsr[us].a01Nombres);
                            break;

                            case '6':
                            $("#lblConsul").html("Revisó: " + arrayAsigUsr[us].a01Nombres);
                            break;

                            case '7':
                            $("#lblJurid").html("Validó: " + arrayAsigUsr[us].a01Nombres);
                            break;

                            case '8':
                            $("#lblGeren").html("Aprobó: " + arrayAsigUsr[us].a01Nombres);
                            break;

                            default:
                            console.log("ninguna");
                            break;
                            }

                        }

                    }
                });

                var limpiar = $("#hfContent").val().replace(/(?:\\[rnt])+/gi,"");
                limpiar = limpiar.replace(/<p>&quot;<\/p>/g,"");
                var frstLetter = limpiar.substring(0, 1);

                if (frstLetter = '"'){
                    limpiar = limpiar.substr(0, limpiar.length - 1);
                }
                $("#hfContent").val(limpiar);
                //CKEDITOR.instances['contenido'].setData(arrayCarta[t].cuerpo_mensaje);

                if(arrayCarta[t].txt_Devolver != null && arrayCarta[t].txt_Devolver.length > 2){
                    $("#txt_Devolver").val(arrayCarta[t].txt_Devolver);
                    $("#divDevolver").css("display", "block");
                }

                //-Revisar el estado del documento-//
                if(arrayCarta[t].estado == 3 || arrayCarta[t].estado == 7){
                    $("#divClose").fadeIn("slow");
                    $("#divActions").css("display", "none");
                    $("#rad_emgesa").attr('readonly', true);
                    $("#fec_carta").attr('readonly', true);
                    CKEDITOR.instances['contenido'].setReadOnly(true);
                    $("#txt_Devolver").attr('readonly', true);
                    clearInterval(autoGuardar);
                }

                if(arrayCarta[t].estado == 8){
                    $("#divClose").fadeIn("slow");
                    $("#saveInfo").css("display", "none");
                    $("#saveClose").css("display", "none");
                    $("#putBack").css("display", "none");
                    $("#btnRecat").css("display", "none");
                    $("#btnFinish").css("display", "none");
                    $("#rad_emgesa").attr('readonly', true);
                    $("#fec_carta").attr('readonly', true);
                    $("#txt_Devolver").attr('readonly', true);
                    CKEDITOR.instances['contenido'].setReadOnly(true);
                    clearInterval(autoGuardar);
                }

            }
        }else{
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