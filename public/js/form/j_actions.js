$(document).ready(function () {

loadData();
loadMun();
saveForm();
fader();

 $("#processtype").change(function(){
    //Verificar la opcion seleccionada
    if($("#processtype").val()=='1'){
        //Tutela
        $("#participacion").hide();
        $("#lblParticipacion").hide();
        $("#casacion").hide();
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
        $("#lblDesacato").hide();
        $("#selecRevision").hide();
        $("#lblSelecRevision").hide();
    }
});

$("#txtCedula").html(getParameterByName("docId"));

//Autosave
setInterval(
    function(){
        $("#saveInformation").trigger("click");
    }, 120000
);

//Carga de municipios y departamento
function loadMun(){

    //Cargar listado de departamentos
    $(".modal").modal('show');
    $.getJSON("index.php/form/get_Dpto/", function(objRData){
        $("#departamento").html(objRData);
        $(".modal").modal('hide');
    });

    //Cargar municipios en el cambio de departamento
    $("#departamento").change(function(){
        if($("#departamento").val() != ''){
            $(".modal").modal('show');
            var departamento = $("#departamento").val();
            $.getJSON("index.php/form/get_Mpo/" + departamento, function(objRData){
            $("#municipio").html(objRData);
            $(".modal").modal('hide');
    });
        }
    });
}

function saveForm(){
      $("#saveInformation").click( function()
           {
             var act_date = new Date();
             var mes = "";
             var mes2 = act_date.getMonth() + 1;
             var dia = act_date.getDate();
             var año = "";
             var hora = act_date.getHours();
             var minuto =act_date.getMinutes();
             var segundo = act_date.getSeconds();

             dia = (dia < 10) ? '0' + dia : dia;
             hora = (hora < 10) ? '0' + hora : hora;
             minuto = (minuto < 10) ? '0' + minuto : minuto;
             segundo = (segundo < 10) ? '0' + segundo : segundo;

            switch(act_date.getMonth()) {
                default:
             mes = (mes2 < 10) ? '0' + mes2 : mes2;
            }

             $("#divUpdate").html("<b>Guardado automático. </b> Última modificación: " + dia + "/" + mes + "/" + act_date.getFullYear() + " " + hora + ":" + minuto + ":" + segundo);
             $("#divUpdate").fadeIn("slow");
           }
      );
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
    var tutela = getParameterByName("tutId");
    $(".modal").modal('show');
    $.getJSON("index.php/form/get_Tutela_Info/" + tutela, function(objRData){
        arrayTutela = objRData;
        if(arrayTutela.length >= 1){
            for (var t = arrayTutela.length -1; t >=0; t--){
                $("#cedula").val(arrayTutela[t].cedula);
                $("#demandante").val(arrayTutela[t].demandante);
                $("#no_proceso").val(arrayTutela[t].numero_proceso);
                $("#juzgado").val(arrayTutela[t].juzgado);
                $("#abog_asignado").val(arrayTutela[t].abogado_asig);
                $("#depto").val(arrayTutela[t].depto);
                $("#mpo").val(arrayTutela[t].ciudad);
                $("#termino").val(arrayTutela[t].termino);
                $("#fecha_auto_adm").val(arrayTutela[t].fecha_auto_admisorio);
                $("#temas").val(arrayTutela[t].temas);
                $("#sentencia").val(arrayTutela[t].sentencia);
                $("#impugnacion").val(arrayTutela[t].impugnacion);
            }
            $(".modal").modal('hide');
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