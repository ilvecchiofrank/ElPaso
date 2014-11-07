$(document).ready(function () {

console.log("Carga de t8");

$(".modal").modal('show');
loadT8();
loadData();
$(".modal").modal('hide');

//loadMun();
//resumeForm();

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
setInterval(
    function(){
        autosave();
    }, 120000
);

function autosave(){
    saveNotify('auto');
}

function saveNotify(auto){

var cedula = getParameterByName("docId");
            //-Consultar si ya existe una carta por la cedula con un proceso activo-//
            $.getJSON("index.php/form/get_Letter_Exist/" + cedula, function(objRData){
                arrayLetterExists = objRData;

                if(arrayLetterExists.length > 0){
                    //Si existe tutela
                    console.log("Carta existe, actualización");
                     $.ajax({
                    url: "index.php/form/do_updateLetters",
                    type: "POST",
                    data: { csrf_test_name: get_csrf_hash, "cedula":cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray())},
                    success: function(result){
                        if (result == "ok"){
                            //Guardado ok
                                if(auto=='auto'){
                                    notify('auto');
                                }else{
                                    notify('ok');
                                }
                        }

                            //Evaluar redireccion
                            if (auto == undefined){
                                //Boton
                                window.location.href = "index.php/form/search"; //"index.php/form/tutelas?docId=" + $("#cedula").val();
                                console.log("Redirecciona");
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
                        data: { csrf_test_name: get_csrf_hash, "cedula":cedula, "dataForm": JSON.stringify($('#controls input, select, textarea, input[type="checkbox"]').serializeArray())},
                        success: function(result){
                            if (result == "ok"){
                                //Guardado ok
                                if(auto=='auto'){
                                    notify('auto');
                                }else{
                                    notify('ok');
                                }
                            }

                            //Evaluar redireccion
                            if (auto == undefined){
                                //Boton
                                window.location.href = "index.php/form/search";//"index.php/form/tutelas?docId=" + $("#cedula").val();
                                console.log("Redirecciona");
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
            console.log(CKEDITOR.instances.contenido.getData());
            saveNotify();
         });

       $("#saveClose").click( function(){
            console.log(CKEDITOR.instances.contenido.getData());
            saveNotify();
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

    //-Cargar combo de categoría-//
    $.getJSON("index.php/form/get_Categorias", function(objRData){
        $("#categoria").html(objRData);
    });

    //-Cargar combo de tipología-//
    $.getJSON("index.php/form/get_Tipologias", function(objRData){
        $("#tipologia").html(objRData);
    });

    //-Ocultar controles ckeditor-//
    $("#cke_23").css("display","none");
    $("#cke_30").css("display","none");
    $("#cke_32").css("display","none");

	//-acciones boton devolver-//
	$("#putBack").click( function(){
			if( $("#divDevolver").css('display') == 'none' ){
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
                $("#btnCert").attr("href", 'index.php/form/files?formCode' + formulario + '&docId=' + cedula);
                $("#btnAnswer").attr("target","_blank");
                $("#btnAnswer").attr("href", 'index.php/form/print_full/' + formulario);
            }
        }
    });
}

//-Precargar Edicion-//
function resumeForm(){
    var tutela = getParameterByName("tutId");
    //-Consultar si ya existen datos de la tutela actual-//
    $.getJSON("index.php/form/get_Tutela_Exist/" + tutela, function(objRData){
        arrayTutelaExists = objRData;

        if(arrayTutelaExists.length > 0){
            //Si existe tutela
            console.log("Tutela existe, actualización");

            $.getJSON("index.php/form/get_Tutela_Info_2/" + tutela, function(objRData){
                arrayTutela = objRData;
                if(arrayTutela.length > 0){
                    for (var t = arrayTutela.length -1; t >=0; t--){
                        $("#dir_contacto").val(arrayTutela[t].dir_contacto);
                        $("#fec_nacimiento").val(arrayTutela[t].fec_nacimiento);
                        $("#ordenes_pi").val(arrayTutela[t].ordenes_pi);
                        $("#argumento_pi").val(arrayTutela[t].argumento_pi);
                        $("#ordenes_si").val(arrayTutela[t].ordenes_si);
                        $("#argumento_si").val(arrayTutela[t].argumento_si);
                        $("#departamento").val(arrayTutela[t].departamento);
                        //$("#departamento").trigger('change');
                        updDepto();
                        $("#hfMunicipio").val(arrayTutela[t].municipio);
                        $("#estado_civ").val(arrayTutela[t].estado_civ);
                        $("#sexo").val(arrayTutela[t].sexo);
                        $("#processtype").val(arrayTutela[t].processtype);
                        $("#processtype").trigger('change');
                        $("#prim_instancia").val(arrayTutela[t].prim_instancia);
                        $("#seg_instancia").val(arrayTutela[t].seg_instancia);
                        $("#act_principal").val(arrayTutela[t].act_principal);

                        if(arrayTutela[t].trabajo == 1 ){$("#trabajo").attr("checked","checked");}
                        if(arrayTutela[t].minimo_vital == 1 ){$("#minimo_vital").attr("checked","checked");}
                        if(arrayTutela[t].igualdad == 1 ){$("#igualdad").attr("checked","checked");}
                        if(arrayTutela[t].medio_ambiente == 1 ){$("#medio_ambiente").attr("checked","checked");}
                        if(arrayTutela[t].debido_proceso == 1 ){$("#debido_proceso").attr("checked","checked");}
                        if(arrayTutela[t].integridad_fisica == 1 ){$("#integridad_fisica").attr("checked","checked");}
                        if(arrayTutela[t].participacionA == 1 ){$("#participacionA").attr("checked","checked");}
                        if(arrayTutela[t].otro == 1 ){$("#otro").attr("checked","checked");}
                        if(arrayTutela[t].participacion == 1 ){$("#participacion").attr("checked","checked");}
                        if(arrayTutela[t].casacion == 1 ){$("#casacion").attr("checked","checked");}
                        if(arrayTutela[t].desacato == 1 ){$("#desacato").attr("checked","checked");}
                        if(arrayTutela[t].selecRevision == 1 ){$("#selecRevision").attr("checked","checked");}
                    }
                }else{
                }
            });

        }else{
            //Tutela nueva
            //console.log("Tutela nueva, crear");
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