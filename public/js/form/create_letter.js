$(document).ready(function () {

$(".modal").modal('show');
loadT8();
loadData();
resumeForm();
$(".modal").modal('hide');

//-Prediligenciar tipologia y categoria-//
// var tipo = getParameterByName("tId");
// var categ = getParameterByName("cId");
// $("#tipologia").val(1);
// $("#categoria").val(1);

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
    }, 120000
);

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
                                console.log("guardado ok");
                                if(auto=='auto'){
                                    notify('auto');
                                }else{
                                    notify('ok');
                                }
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
            saveNotify('no','G');
         });

       $("#saveClose").click( function(){
            saveNotify(undefined,'C');
         });

       $("#btnRecat").click( function(){

            if( $("#divDevolver").css('display') == 'none' ){
            $("#lblDevolver").html('Motivo de la recategorización:');
            $("#divDevolver").css('display', 'block');
            $("#btnRecat").html('Confirmar recategorización');
            }else{
            //$("#divDevolver").css('display', 'none');

                if($("#txtDevolver").val() == ''){
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
}

//-Cargar Datos-//
function loadData(){

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

    //-Ocultar controles ckeditor-//
    // $("#cke_23").css("display","none");
    // $("#cke_30").css("display","none");
    // $("#cke_32").css("display","none");

    //-Validaciones de rol-//
    if($("#hfUserType").val() < 6 ){
    $("#putBack").css("display", "none");
    }

	//-Acciones boton devolver-//
	$("#putBack").click( function(){
			if( $("#divDevolver").css('display') == 'none' ){
            $("#lblDevolver").html('Motivo de la devolución:');
			$("#divDevolver").css('display', 'block');
			$("#putBack").html('Confirmar devolución');
			}else{
			$("#divDevolver").css('display', 'none');
			}

        }
    );

}

//-Cargar desde T8-//
function loadT8(){
    var cedula = getParameterByName("docId");
	var formulario = getParameterByName("formCode");
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
                $("#fec_carta").val(arrayCarta[t].fec_carta);
                CKEDITOR.instances['contenido'].setData(arrayCarta[t].cuerpo_mensaje);

                if(arrayCarta[t].txt_Devolver != null){
                    console.log('Mostrar devolver ' + arrayCarta[t].txt_Devolver);
                    $("#txtDevolver").val(arrayCarta[t].txt_Devolver);
                    $("#divDevolver").css("display", "block");
                }

                //-Revisar el estado del documento-//
                if(arrayCarta[t].estado == 3){
                    $("#divActions").css("display", "none");
                    $("#rad_emgesa").attr('readonly', true);
                    $("#fec_carta").attr('readonly', true);
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