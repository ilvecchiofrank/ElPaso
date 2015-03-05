<script type="text/javascript">
    var idFormT08 = '<?php echo $id; ?>';
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<style>
    label{
        display: block;
    }
    hgroup {
        margin: 0 auto;
        width: 50%;
        text-align: center;
    }
    h1, h2, h3, h4{
        font-weight: bold;
    }

    #tablepreg44 thead tr th {
        text-align: center;
    }
    #tablepreg44 tbody tr td {
        padding: 1em 1em 1em 1em;
    }
</style>
<section class="main-content">
    <div class="container">
        <div style="width: 95%; margin: 0 auto;">
            <hgroup>
                <h3>ENTREVISTA A PROFUNDIDAD</h3>
                <h4>GUIA PARA EL ENTREVISTADOR  DE CADENAS PRODUCTIVAS</h4>
                <h4>SELECCION DE PERSONAS REGISTRADAS EN EL CENSO 2014 Y CLASIFICADA SEGÚN TIPOLOGÍA</h4>
            </hgroup>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        A. IDENTIFICACIÓN Y PREPARACIÓN DE LA ENTREVISTA 
                    </h3>
                    <label>
                        Las preguntas 1 a 12 son diligenciadas por el entrevistador de acuerdo a los datos tomados del registro censal realizado en el 2014 y del documento de identidad del entrevistado
                    </label>
                </div>
                <div class="panel-body">
                    <label>1. Número de formulario seleccionado:</label><br/>
                    <label><span style="font-size: 1.5em;" class="label label-info"><?php echo $id; ?></span></label><br/>
                    <label>2. Departamento y municipio actual de residencia (A3 Registro Censo 2014):</label>
                    <label>Departamento:</label><br/>
                    <select id="pregunta2Departamento" mun-child-id="pregunta2Municipio" class="saveSelect form-control departamentos">
                        <option>Seleccione Departamento...</option>
                    </select>
                    <br/>
                    <label>Municipio:</label><br/>
                    <select id="pregunta2Municipio" class="saveSelect form-control">
                        <option>Seleccione Municipio...</option>
                    </select>
                    <br/>
                    <legend></legend>
                    <label >3. Dirección (A4 Censo 2014):</label><br/>
                    <textarea id='preguntano3' class="saveTextarea form-control"></textarea><br/>
                    <legend></legend>
                    <label >4. Zona:</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta4" class="saveRadio" value="1"> Urbana
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta4" class="saveRadio" value="2"> Rural
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Barrio</label>
                    <select id="pregunta4Barrio" class="saveSelect form-control">
                        <option>Seleccione Barrio...</option>
                    </select>
                    <legend></legend>
                    <label>Vereda</label>
                    <select id="pregunta4Vereda" class="saveSelect form-control">
                        <option>Seleccione Vereda...</option>
                    </select>
                    <legend></legend>
                    <label >5. Nombres del entrevistado (como aparece en el formulario de registro del Censo 2014):</label><br/>
                    <input id='preguntano5' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label >6. Apellidos del entrevistado (como aparece en el formulario de registro del Censo 2014):</label><br/>
                    <input id='preguntano6' type='text' class="saveText form-control" /><br/>            
                    <legend></legend>
                    <label >7. Edad actual del entrevistado (calcule la edad de acuerdo a la casilla A11 del registro del Censo 2014):</label><br/>
                    <input id='preguntano7' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label id='preguntano8'>8. ¿Existe cambio en el municipio de residencia entre el 2008 y la actualidad? (verifique con casillas A3 y B1 del registro)</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta8" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta8" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label >9. Actividad económica del entrevistado en el 2008 (Código registrado en la casilla B7 del registro del censo 2014).</label><br/>
                    <input id='preguntano9' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>10. ¿A qué cadena productiva se integra esta actividad económica?</label><br/>
                    <label>Código de cadena productiva</label><br/>
                    <input id="preguntano10" type='text' class="saveText form-control" /><br/>            
                    <label>¿Otro Cual?</label><br/>
                    <input id="preguntano10OtroCual" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>11. ¿En el proceso de registro el entrevistado autorizó el habeas data? (el cual se mantiene hasta el momento)</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta11" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta11" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>12. Números de teléfono registrados (casilla A6 del Censo 2014):</label><br/>
                    <label>Telefono 1</label>
                    <input id="preguntano12Telefono1" type='text' class="saveText form-control"><br/>
                    <label >Telefono 2</label>
                    <input id="preguntano12Telefono2" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>13. Fecha de la comunicación por parte de EMGESA de la realización de la entrevista:</label><br/>
                    <input id="preguntano13" type='date' class="saveText form-control"><br/>
                    <legend></legend>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta13" class="saveRadio" value="2"> N/D
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>14. ¿Se pudo realizar la entrevista?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta14" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta14" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Por qué?</label><br/>
                    <input id="preguntano14Porque" type='date' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Para el diligenciamiento de las preguntas 15 a 19 solicite el documento de identidad del entrevistado</label><br/>
                    <label >15. Tipo de documento:</label><br/>
                    <select id='preguntano15' class="saveSelect form-control">
                        <option>Seleccione Tipo de documento...</option>
                    </select>
                    <br/>
                    <label >16. Número de documento:</label><br/>
                    <input type='text' id='preguntano16' class="saveText form-control"><br/>
                    <label >17. ¿El tipo y número de documento de identidad coincide con el registrado en el censo 2014?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta17" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta17" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>18. Lugar de expedición:</label><br/>
                    <label>Departamento:</label><br/>
                    <select id="preguntano18Departamento" mun-child-id="preguntano18Municipio" class="saveSelect form-control departamentos">
                        <option>Seleccione Departamento...</option>
                    </select>
                    <br/>
                    <legend></legend>
                    <label>Municipio:</label><br/>
                    <select id="preguntano18Municipio" class="saveSelect form-control">
                        <option>Seleccione Municipio...</option>
                    </select>
                    <br/>
                    <legend></legend>
                    <label>19. Fecha de expedición:</label><br/>
                    <input id='preguntano19' type='date' class="saveText form-control"><br/>
                    <label>20. ¿Se autorizó la grabación de la entrevista?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta20" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta20" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Por qué?</label><br/>
                    <input id="preguntano20Porque" type='date' class="saveText form-control"><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        B. DATOS GENERALES DEL ENTREVISTADO
                    </h3>
                </div>
                <div class="panel-body">
                    <label>21. ¿Hay cambio de residencia? (diligencie de acuerdo a la pregunta 8)</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta21" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta21" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>22. ¿Cuál fue la principal razón por la que cambió de residencia?</label><br/>
                    <textarea id="preguntano22" class="saveTextarea form-control"></textarea><br/>
                    <legend></legend>
                    <label>23. Si pudiera, ¿volvería al lugar en donde residía en el 2008?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta23" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta23" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <label>¿Por qué?</label><br/>
                    <input id="preguntano23Porque" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label id='preguntano2'>24. ¿Considera que el PHEQ tuvo que ver con su decisión de cambiar su residencia?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta24" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta24" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <label>¿Por qué?</label><br/>
                    <input id="preguntano24Porque" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>25. ¿Cuántas personas hacían parte de su hogar en agosto de 2008?</label><br/>
                    <input id="preguntano25" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>26. ¿ Tiene el recibo de pago de energía eléctrica solicitado?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta26" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta26" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Por qué?</label><br/>
                    <input id="preguntano26Porque" type='date' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>27. Del recibo solicitado diligencie la siguiente información: (estos datos deben tomarse del recibo físico)</label><br/>
                    <label>a. ¿El nombre de la persona en el recibo es el mismo del entrevistado?</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta27a" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta27a" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>b. ¿La dirección del recibo es la misma registrada por el entrevistado? (pregunta 3 de este formulario)</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta27b" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta27b" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>c. El estrato que aparece en el recibo</label>
                    <label>(tenga en cuenta las homologaciones para estrato del manual)</label>
                    <input id="preguntano27c" type='text' class="saveText form-control" /><br/>
                    <label>d. ¿Se cuenta con un medidor o contador?</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta27d" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta27d" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <label>Registre el consumo en kw/h del último mes</label>
                    <input id="preguntano27dConsumoUltimoMes" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>e. ¿Cuál es el valor a pagar del recibo?</label>
                    <label>(registre el valor en pesos sin puntos ni comas)</label>
                    $<input id="preguntano27e" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>28. ¿Cuál es su nivel educativo y el último año aprobado en ese nivel?</label><br/>
                    <label>Último grado o año aprobado (marque con una X el grado o año):</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28a" class="saveCheck" value="1"> Ninguno
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28b" class="saveCheck" value="2"> Preescolar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28c" class="saveCheck" value="3"> Primaria
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28d" class="saveCheck" value="4"> Secundaria
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28e" class="saveCheck" value="5"> Media
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28f" class="saveCheck" value="6"> Ténico profesional
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28g" class="saveCheck" value="7"> Tecnológico
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28h" class="saveCheck" value="8"> Universitario
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28i" class="saveCheck" value="9"> Especialización
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28j" class="saveCheck" value="10"> Maestría
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta28k" class="saveCheck" value="11"> Doctorado
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label >29. ¿Cuál es el nombre de la institución en la que cursó el último año aprobado?</label><br/>
                    <label >a. Nombre de institución:</label><br/>
                    <input id="preguntano29" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label >b. ¿En qué municipio se ubica o ubicaba?</label><br/>
                    <select id="preguntano29Municipio" class="saveSelect form-control">
                        <option>
                            Seleccione Muncipio...
                        </option>
                    </select>
                    <br/>
                    <legend></legend>
                    <label>30. ¿Entre el 2008 y el presente ha recibido algún tipo de curso o formación para el trabajo?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta30" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta30" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label id='preguntano3'>31. ¿Quién o quienes le han brindado estos cursos o formación? (puede seleccionar más de una opción)</label><br/>
                    <label>a. EMGESA o el PHEQ</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta31a" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta31a" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>b. El SENA </label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta31b" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta31b" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>c. Otra entidad, ¿Cuál?</label><br/>
                    <input id="preguntano31c" type='text' class="saveText form-control" /><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta31c" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta31c" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        
                    </h3>
                </div>
                <div class="panel-body">
                    <label>32. ¿Desea usted recibir formación para fortalecer sus capacidades y obtener un mejor trabajo?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta32" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta32" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>33. ¿En qué área le interesaría recibir esta formación?</label><br/>
                    <input id="preguntano33" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008
                    </h3>
                </div>
                <div class="panel-body">
                    <label>34. ¿A qué actividad dedicaba usted la mayor parte del tiempo en agosto de 2008?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta34a" class="saveCheck" value="1"> Trabajar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta34b" class="saveCheck" value="2"> Buscar Trabajo
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta34c" class="saveCheck" value="3"> Oficios del Hogar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta34d" class="saveCheck" value="4"> Estudiar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta34e" class="saveCheck" value="5"> Otra Actividad
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta34f" class="saveCheck" value="6"> Estaba incapacitado permanentemente para trabajar
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Cual?</label>
                    <input id="preguntano34" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>35. Además de realizar esta actividad, ¿Tenía un negocio o trabajo por el que recibía ingresos en agosto de 2008?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta35" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta35" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>36. ¿Qué hacía en ese trabajo o actividad? (sea lo más detallado posible)</label><br/>
                    <textarea id='preguntano36' class="saveTextarea form-control"></textarea><br/>
                    <label id='preguntano3'>37. ¿Con que frecuencia realizó este trabajo durante el mes de agosto de 2008?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta37" class="saveRadio" value="1"> Todas las semanas
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta37" class="saveRadio" value="2"> Algunas semanas
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta37" class="saveRadio" value="3"> De vez en cuando
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legen></legen>
                    <label>Número de días por semana</label>
                    <input id="preguntano37Numerodiasporsemana" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Número de semanas</label>
                    <input id="preguntano37NumeroSemanas" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Número de días</label>
                    <input id="preguntano37Numerodias" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>38. ¿Cuántas horas a la semana dedicaba a este trabajo en agosto de 2008?</label><br/>
                    <label>Horas</label><br/>
                    <input id="preguntano38" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>39. Desde enero hasta agosto de 2008, ¿durante cuántos meses realizó este trabajó?</label><br/>
                    <label>Número de meses</label><br/>
                    <input id="preguntano39" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label >40. ¿Cuál era el nombre de la empresa, negocio, finca o persona donde trabajaba?</label><br/>
                    <input id="preguntano40" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>41. ¿En dónde estaba ubicada esa empresa,negocio,finca o persona donde usted trabajaba?</label><br/>
                    <label>Departamento:</label><br/>
                    <select id="pregunta41Departamento" mun-child-id="pregunta41Municipio" class="saveSelect form-control departamentos">
                        <option>Seleccione Departamento...</option>
                    </select>
                    <br/>
                    <label>Municipio:</label><br/>
                    <select id="pregunta41Municipio" class="saveSelect form-control">
                        <option>Seleccione Municipio...</option>
                    </select>
                    <br/>
                    <label>Barrio o vereda:</label><br/>
                    <select id="pregunta41Barrio" class="saveSelect form-control">
                        <option>Seleccione Barrio o Vereda...</option>
                    </select>
                    <br/>
                    <legend></legend>
                    <label >42. ¿A qué actividad se dedicaba principalmente la empresa, negocio, finca o persona  donde usted trabajaba?</label><br/>
                    <textarea id='preguntano42' class="saveTextarea form-control"></textarea>
                    <legend></legend>
                    <br/>
                    <label id='preguntano4'>43. ¿Usted era el propietario de la empresa, negocio o finca?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta43" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta43" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        
                    </h3>
                </div>
                <div class="panel-body">
                    <label>Entrevistador: Revise la documentación entregada por el entrevistado en el momento de  su inscripción en el Censo y verifique que la informacion reportada en materia de actividad laboral, nombre de empresa, finca, negocio o persona para quien laboraba coincida  0</label><br/>
                    <label>44.   ¿La información reportada en la preguntas anteriores coincide con lo reportado por las certificaciones entregadas en el proceso de inscripción del censo 2014?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta44" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta44" class="saveRadio" value="2"> No
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta44" class="saveRadio" value="3"> No se adjuntaron certificaciones
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Entrevistador: De acuerdo a la narración de las preguntas 36, 40, 41, 42 y 43, así como de la información que el entrevistado haya adjuntado con anterioridad a la entrevista diligencie el cuadro que aparece a continuación</label>
                    <br/>
                    <table id="tablepreg44">
                        <thead>
                            <tr>
                                <th>Posición ocupacional</th>
                                <th>Cadena Productiva</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Obrero o empleado de empresa particular</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1a" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1b" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1c" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1d" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1e" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1f" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1g" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1h" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1i" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1j" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1k" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1l" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_1m" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                    <br/>
                                    <input id="preguntano44_1Cual" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>2. Trabajador o ayudante sin remuneración</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2a" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2b" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2c" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2d" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2e" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2f" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2g" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2h" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2i" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2j" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2k" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2l" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_2m" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                    <br/>
                                    <input id="preguntano44_2Cual" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>3. Jornalero o peón</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3a" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3b" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3c" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3d" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3e" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3f" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3g" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3h" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3i" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3j" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3k" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3l" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_3m" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                    <br/>
                                    <input id="preguntano44_3Cual" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>4. Trabajador por cuenta propia</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4a" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4b" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4c" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4d" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4e" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4f" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4g" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4h" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4i" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4j" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4k" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4l" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_4m" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                    <br/>
                                    <input id="preguntano44_4Cual" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>5. Patrón o empleador</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5a" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5b" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5c" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5d" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5e" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5f" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5g" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5h" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5i" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5j" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5k" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5l" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_5m" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                    <br/>
                                    <input id="preguntano44_5Cual" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6. Otro, ¿cuál?<br/>
                                    <input id="preguntano44_6CualHeader" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6a" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6b" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6c" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6d" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6e" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6f" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6g" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6h" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6i" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6j" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6k" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6l" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" id="pregunta44_6m" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                    <br/>
                                    <input id="preguntano44_6Cual" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>45. ¿Para realizar ese trabajo tenía algún tipo de contrato?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta45" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta45" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>El contrato era verbal o escrito?</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta45TipoContrato" class="saveRadio" value="1"> Verbal
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta45TipoContrato" class="saveRadio" value="2"> Escrito
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>46. Antes de descuentos (Salud, pensión u otros descuentos de nómina), ¿Cuánto ganó usted el mes de agosto de 2008?</label><br/>
                    <label>(Excluya pagos en especie) Valor en pesos:</label><br/>
                    <input id="preguntano46" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>47. Además del salario en dinero en agosto de 2008, ¿usted recibía como parte de pago de su trabajo:</label><br/>
                    <label>a. Vivienda</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47a" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47a" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47atipo" class="saveRadio" value="1"> Permanente
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47atipo" class="saveRadio" value="2"> Temporal
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47a3" class="saveRadio" value="1"> Individual
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47a3" class="saveRadio" value="2"> Para el hogar
                        </label>
                    </div>
                    <label>Area Ocupada</label>
                    <input id="preguntano47AreaOcupada" type='text' class="saveText form-control" /> mts2<br/>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>b. Alimentación</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47b" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47b" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47btipo" class="saveRadio" value="1"> Permanente
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47btipo" class="saveRadio" value="2"> Temporal
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47b3" class="saveRadio" value="1"> Individual
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47b3" class="saveRadio" value="2"> Para el hogar
                        </label>
                    </div>
                    <label>Comidas principales</label>
                    <input id="preguntano47ComidasPrincipales" type='text' class="saveText form-control" /> día<br/>
                    <label>Onces o refrigerios</label>
                    <input id="preguntano47Onces" type='text' class="saveText form-control" /> día<br/>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>c. Transporte</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47c" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47c" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47ctipo" class="saveRadio" value="1"> Permanente
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47ctipo" class="saveRadio" value="2"> Temporal
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47c3" class="saveRadio" value="1"> Individual
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta47c3" class="saveRadio" value="2"> Para el hogar
                        </label>
                    </div>
                    <label>Tipo de Vehiculo</label>
                    <input id="preguntano47TipoVehiculo" type='text' class="saveText form-control" /><br/>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>48. Además del salario en dinero, en agosto de 2008, ¿usted recibía una parte del producto como parte de pago de su trabajo?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta48" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta48" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Qué proporción recibía? (registre la cantidad en porcentaje)</label>
                    <input id="preguntano48Porcentaje" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>49. ¿La empresa, negocio o persona que le contrataba fue reubicada por la ejecución del PHEQ?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta49" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta49" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        
                    </h3>
                </div>
                <div class="panel-body">
                    <label>50. ¿Sabe usted, dónde se ubica actualmente dicha empresa negocio o persona?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta50" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta50" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Departamento</label>
                    <input id="preguntano50Departamento" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Municipio</label>
                    <input id="preguntano50Municipio" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Dirección</label>
                    <input id="preguntano50Dirección" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de cotacto</label>
                    <input id="preguntano50Personacontacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos</label>
                    <input id="preguntano50Teléfonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label id='preguntanoE'>Entrevistador: 
                    De acuerdo a la clasificación hecha en el cuadro de cruce entre posición ocupacional y cadena productiva que se encuentra antes de la pregunta 45, proceda de la siguiente manera: <br/><br/>
                    Si la cadena es código 1 a 5, y la posición ocupacional 4 o 5 continúe con la pregunta 51, relacionada con actividades agricolas Si la cadena es código 6, y la posición ocupacional 4 o 5, pase a la pregunta 60 relacionada con sector forestal <br/><br/>
                    Si la cadena es código 7, y la posición ocupacional 4 o 5, pase a la pregunta 67, sobre actividades pecuarias Si la cadena es código 8, y la posición ocupacional 4 o 5, pase a la pregunta 73 relacionada con actividades de pesca<br/><br/>
                    Si la cadena es código 9, y la posición ocupacional 4 o 5, pase a la pregunta 81, relacionada con actividades mineras o extractivas Si la cadena es código 10, y la posición ocupacional 4 o 5, pase a pregunta 87, relacionada con actividades de transporte de mercancías o insumos<br/><br/>
                    Si la cadena es código 11, y la posición ocupacional 4 o 5, pase a pregunta 92, relacionadas con actividades de transporte de pasajeros Si la cadena es código 12, y la posición ocupacional 4 o 5, pase a la pregunta 97, relacionada con actividades comerciales Si la cadena es código 13, pase a la pregunta 104<br/><br/></label><br/>
                    <legend></legend>
                    <label>51. En la finca donde usted trabajaba ¿Cuál era el área destinada para ese cultivo en el 2008?</label><br/>
                    <label>Area</label><br/>
                    <input id='preguntano51Area' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta51" class="saveRadio" value="1"> Hectáreas
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta51" class="saveRadio" value="2"> Fanegadas, cuadras o plazas
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta51" class="saveRadio" value="3"> Metros cuadrados
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta51" class="saveRadio" value="4"> Otro
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Cuál?</label><br/>
                    <input id='preguntano51OtroCual' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>52. ¿Hacía rotación de ese cultivo con otro tipo de cultivos?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta52" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta52" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Con cuáles?</label><br/>
                    <label>a.</label><br/>
                    <input id="preguntano52a" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>b.</label><br/>
                    <input id="preguntano52b" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>c.</label><br/>
                    <input id="preguntano52c" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>d.</label><br/>
                    <input id="preguntano52d" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>52A. ¿Asociaba ese cultivo con otro tipo de cultivos?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta52a" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta52a" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Con cuáles?</label><br/>
                    <label>a.</label><br/>
                    <input id="preguntano52aa" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>b.</label><br/>
                    <input id="preguntano52ab" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>c.</label><br/>
                    <input id="preguntano52ac" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>d.</label><br/>
                    <input id="preguntano52ad" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>53. ¿Las labores de siembra, mantenimiento y cosecha del cultivo las realizaba sólo o con otras personas?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta53" class="saveRadio" value="1"> Solo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta53" class="saveRadio" value="2"> Con otras personas
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>54. Cuántas personas pagadas y no pagadas le ayudaban en ese cultivo y que labores desarrollaban?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Etapa</th>
                                <th>Número total de personas</th>
                                <th>Número de personas pagas</th>
                                <th>Número de personas no pagas</th>
                                <th>Labores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Siembra
                                </td>
                                <td>
                                    <input id="preguntano54Siembra1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Siembra2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Siembra3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Siembra4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mantenimiento
                                </td>
                                <td>
                                    <input id="preguntano54Mantenimiento1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Mantenimiento2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Mantenimiento3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Mantenimiento4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cosecha
                                </td>
                                <td>
                                    <input id="preguntano54Cosecha1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Cosecha2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Cosecha3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano54Cosecha4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>55. ¿Qué tipo de abonos o fertilizantes utilizaba para este cultivo?</label><br/>
                    <label>Abonos o fertilizantes</label><br/>
                    <textarea id='preguntano55' class="form-control saveTextarea"></textarea><br/>
                    <legend></legend>
                    <label>56. ¿Dónde adquiría los abonos o  fertilizantes que utilizaba para este cultivo? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta56a" class="saveCheck" value="1"> N/A
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Abonos o Fertilizantes</label><br/>
                    <textarea id='preguntano56a' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>Nombred el sitio de compra</label><br/>
                    <textarea id='preguntano56b' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>Dirección y teléfono</label><br/>
                    <textarea id='preguntano56c' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>57. ¿Qué porcentaje de la producción vendía y a quien lo hacía?  (Nombre, dirección y telefono del comprador)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    %
                                </th>
                                <th>
                                    Nombre, dirección y teléfono del comprador o compradores
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano57a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <textarea id='preguntano57a2' class="form-control saveTextarea" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano57b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <textarea id='preguntano57b2' class="form-control saveTextarea" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano57c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <textarea id='preguntano57c2' class="form-control saveTextarea" ></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label>58. ¿De qué manera transportaba su producción al sitio de venta?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta58" class="saveRadio" value="1"> En vehículo propio
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta58" class="saveRadio" value="2"> En un vehículo contratado
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta58" class="saveRadio" value="3"> No la transportaba
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Tipo de vehículo</label><br/>
                    <input id="preguntano58TipoVehiculo" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de contacto</label><br/>
                    <input id="preguntano58PersonaContacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos</label><br/>
                    <input id="preguntano58Telefonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>59. ¿Qué tipo de semillas utilizaba y cómo las obtenía?</label><br/>
                    <label>Tipo de semillas</label><br/>
                    <textarea id='preguntano59a' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>Modo de obtención</label><br/>
                    <textarea id='preguntano59b' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>60. ¿Cuál era el área destinada para la producción forestal en el 2008?</label><br/>
                    <label>Area</label><br/>
                    <input id='preguntano60Area' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta60" class="saveRadio" value="1"> Hectáreas
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta60" class="saveRadio" value="2"> Fanegadas, cuadras o plazas
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta60" class="saveRadio" value="3"> Metros cuadrados
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta60" class="saveRadio" value="4"> Otro
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Cuál?</label><br/>
                    <input id='preguntano60OtroCual' type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>61. ¿Qué especies de árboles tenía plantados, cuántos árboles por especie tenía y que área ocupaban en el 2008?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Especie</th>
                                <th>Cantidad</th>
                                <th>área</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano61a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d1" class="saveRadio" value="1"> Ha.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d1" class="saveRadio" value="2"> Faneg.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d1" class="saveRadio" value="3"> Mts2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano61a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d2" class="saveRadio" value="1"> Ha.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d2" class="saveRadio" value="2"> Faneg.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d2" class="saveRadio" value="3"> Mts2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano61a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d3" class="saveRadio" value="1"> Ha.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d3" class="saveRadio" value="2"> Faneg.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d3" class="saveRadio" value="3"> Mts2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano61a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61b4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61c4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d4" class="saveRadio" value="1"> Ha.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d4" class="saveRadio" value="2"> Faneg.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d4" class="saveRadio" value="3"> Mts2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano61a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61b5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61c5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d5" class="saveRadio" value="1"> Ha.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d5" class="saveRadio" value="2"> Faneg.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d5" class="saveRadio" value="3"> Mts2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano61a6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61b6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano61c6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d6" class="saveRadio" value="1"> Ha.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d6" class="saveRadio" value="2"> Faneg.
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="pregunta61d6" class="saveRadio" value="3"> Mts2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label>62. ¿Las labores de siembra, mantenimiento o tala las realizaba sólo o con otras personas?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta62" class="saveRadio" value="1"> Solo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta62" class="saveRadio" value="2"> Con otras personas
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label id='preguntano6'>63. ¿Cuántas personas pagadas y no pagadas le ayudaban y  qué labores realizaban?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Etapa</th>
                                <th>Número total de personas</th>
                                <th>Número de personas pagas</th>
                                <th>Número de personas no pagas</th>
                                <th>Labores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Siembra
                                </td>
                                <td>
                                    <input id="preguntano63Siembra1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Siembra2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Siembra3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Siembra4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mantenimiento
                                </td>
                                <td>
                                    <input id="preguntano63Mantenimiento1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Mantenimiento2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Mantenimiento3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Mantenimiento4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tala
                                </td>
                                <td>
                                    <input id="preguntano63Tala1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Tala2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Tala3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano63Tala4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>64. ¿Qué cantidad de su producción vendía, con qué periodicidad y a quién lo hacía?  (Nombre, dirección y telefono del comprador)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>%</th>
                                <th>Periodicidad</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano64a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64d1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64e1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano64a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64d2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64e2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano64a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64d3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano64e3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label >65. ¿De qué manera transportaba su producción?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta65" class="saveRadio" value="1"> En vehículo propio
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta65" class="saveRadio" value="2"> En un vehículo contratado
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta65" class="saveRadio" value="3"> No la transportaba
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Tipo de vehículo</label><br/>
                    <input id="preguntano65TipoVehiculo" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de contacto</label><br/>
                    <input id="preguntano65PersonaContacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos</label><br/>
                    <input id="preguntano65Telefonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>65A. ¿Qué tipo de semillas utilizaba y cómo las obtenía?</label><br/>
                    <label>Tipo de semillas</label><br/>
                    <textarea id='preguntano65a' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>Modo de obtención</label><br/>
                    <textarea id='preguntano65b' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>66. ¿Tenía permiso para realizar la explotación forestal?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta66" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta66" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿De qué entidad?</label><br/>
                    <input id="preguntano66Entidad" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>67. En Agosto de 2008, ¿Qué que razas de ganado vacuno tenía, cuántos animales tenía por raza y cuál era el uso que les daba?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Razas</th>
                                <th>Cantidad Total</th>
                                <th>Cantidad para carne</th>
                                <th>Cantidad para leche</th>
                                <th>Cantidad para uso mixto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano67a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67d1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67e1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano67a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67d2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67e2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano67a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67d3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano67e3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>68. ¿Elaboraba productos derivados como queso, quesillo o embutidos entre otros?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta68" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta68" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>69. ¿Qué tipo de productos elaboraba y cuál era su producción mensual?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th colspan="2">Producción mensual</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Cantidades</th>
                                <th>Unidad de medida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano69a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano69b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano69c1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano69a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano69b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano69c2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano69a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano69b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano69c3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label id='preguntano7'>70. ¿Las labores de producción las realizaba sólo o con otras personas?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta70" class="saveRadio" value="1"> Solo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta70" class="saveRadio" value="2"> Con otras personas
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>71. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores? </label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Etapa</th>
                                <th>Número total de personas</th>
                                <th>Número de personas pagas</th>
                                <th>Número de personas no pagas</th>
                                <th>Labores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Cría
                                </td>
                                <td>
                                    <input id="preguntano71Cria1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Cria2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Cria3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Cria4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Levante u ordeño
                                </td>
                                <td>
                                    <input id="preguntano71Levante1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Levante2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Levante3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Levante4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sacrificio
                                </td>
                                <td>
                                    <input id="preguntano71Sacrificio1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Sacrificio2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Sacrificio3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Sacrificio4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Producción de derivados
                                </td>
                                <td>
                                    <input id="preguntano71Derivados1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Derivados2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Derivados3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano71Derivados4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>72. ¿Qué cantidad de su producción vendía mensualmente y a quien lo hacía?  (Nombre, dirección y telefono del comprador)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th>Cantidad</th>
                                <th>U. medida</th>
                                <th>Datos del comprador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano72a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72d1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano72a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72d2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano72a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano72d3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label>72A. ¿De qué manera transportaba su producción?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta72a" class="saveRadio" value="1"> En vehículo propio
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta72a" class="saveRadio" value="2"> En un vehículo contratado
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta72a" class="saveRadio" value="3"> No la transportaba
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Tipo de vehículo</label><br/>
                    <input id="preguntano72aTipoVehiculo" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de contacto</label><br/>
                    <input id="preguntano72aPersonaContacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos</label><br/>
                    <input id="preguntano72aTelefonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>72B. ¿Dónde adquiría los insumos (terneros, vacunas, insumos para la producción de derivados entre otros) que utilizaba para la producción pecuaria? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta72b" class="saveCheck" value="1"> N/A
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Abonos o Fertilizantes</label><br/>
                    <textarea id='preguntano72ba' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>Nombred el sitio de compra</label><br/>
                    <textarea id='preguntano72bb' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>Dirección y teléfono</label><br/>
                    <textarea id='preguntano72bc' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>73. ¿En qué sitios pescaba usted en agosto del 2008?</label><br/>
                    <textarea id='preguntano73' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>74. ¿Qué cantidad de pescado y que variedades extraía usted a la semana?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Variedad</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano74a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano74b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano74c1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano74a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano74b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano74c2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano74a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano74b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano74c3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>75. ¿En qué mes o meses del año era su mayor pesca y cuántas unidades extraía?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mes del año</th>
                                <th>Variedad</th>
                                <th>Cantidad extraída al día</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano75a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano75b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano75c1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano75a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano75b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano75c2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano75a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano75b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano75c3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>76. ¿Qué técnica de pesca utilizaba?</label><br/>
                    <textarea id='preguntano76' class="form-control saveTextarea"></textarea><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>77. ¿Pescaba con  embarcación?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta77" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta77" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Usted era el dueño?</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta77Dueno" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta77Dueno" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>78. ¿Podría suministrarme los datos de la persona dueña de la embarcación?</label><br/>                    
                    <label>Tipo de embarcación:</label><br/>
                    <input id="preguntano78TipoEmbarcación" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de contacto:</label><br/>
                    <input id="preguntano78PersonaContacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos:</label><br/>
                    <input id="preguntano78Telefonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>79. ¿Qué cantidad de su producción vendía al día y a quién lo hacía?  (Nombre, dirección y teléfono del comprador si era mayorista)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Variedad</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano79a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79d1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79e1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano79a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79d2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79e2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano79a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79d3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano79e3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label>80. ¿Tenía permiso para realizar esta actividad?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta80" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta80" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿De qué entidad?</label><br/>
                    <input id="preguntano80Entidad" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>81. ¿En qué lugar o lugares realizaba esta actividad extractiva, que tipo de material extraía, que cantidad y con qué periodicidad lo hacía?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Tipo de material</th>
                                <th>Cantidad</th>
                                <th>Periodicidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano81a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81d1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano81a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81d2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano81a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano81d3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label id='preguntano8'>82. ¿Las labores de extracción las realizaba sólo o con otras personas?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta82" class="saveRadio" value="1"> Solo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta82" class="saveRadio" value="2"> Con otras personas
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>83. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores? </label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número total de personas</th>
                                <th>Número de personas pagas</th>
                                <th>Número de personas no pagas</th>
                                <th>Labores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano83a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83a4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano83b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano83c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano83c4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label>84. ¿De qué manera transportaba el material que extraía?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta84" class="saveRadio" value="1"> En vehículo propio
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta84" class="saveRadio" value="2"> En un vehículo contratado
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta84" class="saveRadio" value="3"> No la transportaba
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Tipo de vehículo</label><br/>
                    <input id="preguntano84TipoVehiculo" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de contacto</label><br/>
                    <input id="preguntano84PersonaContacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos</label><br/>
                    <input id="preguntano84Telefonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>85. En dónde y a quiénes vendía el producto de la explotación</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>En dónde</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano85a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85d1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano85a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85d2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano85a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano85d3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label>86. ¿Tenía permiso para realizar esta actividad?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta86" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta86" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿De qué entidad?</label><br/>
                    <input id="preguntano86Entidad" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>87. Entre los meses de enero y agosto de 2008, ¿Qué rutas cubría y con qué frecuencia? (pida al entrevistado que sea lo más específico con la ubicación de los situios de inicio y finalización de cada ruta)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rutas</th>
                                <th>Frecuencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano87a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano87b1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano87a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano87b2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano87a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano87b3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano87a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano87b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano87a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano87b5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>88. ¿Qué tipo de productos trasportaba y con qué tipo de vehículos lo hacía?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Clase de productos</th>
                                <th colspan="3">Tipo de vehículo</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Tipo de marca</th>
                                <th>Modelo</th>
                                <th>Capacidad (Ton)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano88a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88d1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano88a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88d2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano88a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88d3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano88a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88b4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88c4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano88d4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>89. ¿El transporte de estos productos lo realizaba sólo o con otras personas?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta89" class="saveRadio" value="1"> Solo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta89" class="saveRadio" value="2"> Con otras personas
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label >90. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número total de personas</th>
                                <th>Número de personas pagas</th>
                                <th>Número de personas no pagas</th>
                                <th>Labores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano90a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90a4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano90b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano90c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano90c4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>91. ¿Quiénes eran sus principales clientes en la zona de influencia del PHEQ y dónde se ubicaban?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Clientes</th>
                                <th>Ubicación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano91a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91b1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano91a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91b2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano91a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91b3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano91a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label id='preguntano9'>91A. ¿Dónde adquiría los insumos (Gasolina, lubricantes, repuestos entre otros) que utilizaba para realizar esta actividad? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tipo de insumo</th>
                                <th>Nombre del sitio de compra</th>
                                <th>Dirección y Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano91aa1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ab1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ac1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano91aa2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ab2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ac2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano91aa3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ab3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ac3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano91aa4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ab4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano91ac4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>92. Entre los meses de enero y agosto de 2008, ¿Qué rutas cubría con qué frecuencia y cuántas personas por frecuencia transportaba? (pida al entrevistado que sea lo más específico con la ubicación de los sitios de inicio y finalización de cada ruta)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rutas(Inicio, intermedias, fin)</th>
                                <th>Frecuencia</th>
                                <th>Número de personas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano92a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92c1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano92a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92c2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano92a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92c3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano92a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92b4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92c4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano92a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92b5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92c5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano92a6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92b6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano92c6" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                </div>  
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>93. ¿Qué tipo de vehículos utilizaba y cuál era su capacidad?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Vehículo</th>
                                <th>Capacidad (pasajeros)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano93a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano93b1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano93a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano93b2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano93a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano93b3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano93a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano93b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano93a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano93b5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>94. ¿Esta actividad la  realizaba sólo o con otras personas?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta94" class="saveRadio" value="1"> Solo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta94" class="saveRadio" value="2"> Con otras personas
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>95. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número total de personas</th>
                                <th>Número de personas pagas</th>
                                <th>Número de personas no pagas</th>
                                <th>Labores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano95a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95a4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano95b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano95c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano95c4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>96.  ¿Se encontraba afiliado o asociado a alguna empresa?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta96" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta96" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Nombre de la empresa</label>
                    <input id="preguntano96NombreEmpresa" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>96A. ¿Dónde adquiría los insumos (Gasolina, lubricantes, repuestos entre otros) que utilizaba para realizar esta actividad? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tipo de insumo</th>
                                <th>Nombre del sitio de compra</th>
                                <th>Dirección y Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano96aa1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ab1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ac1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano96aa2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ab2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ac2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano96aa3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ab3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ac3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano96aa4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ab4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano96ac4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label id='preguntano9'>97. Durante el mes de agosto de 2008, ¿Qué productos, Qué cantidades y con que frecuencia comercializaba?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tipo de productos</th>
                                <th>Cantidad</th>
                                <th>Unidad de medida</th>
                                <th>Frecuencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano97a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97b1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97c1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97d1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano97a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97b2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97c2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97d2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano97a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97b3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97c3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97d3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano97a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97b4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97c4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97d4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano97a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97b5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97c5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97d5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano97a6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97b6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97c6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano97d6" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>98. ¿Comercializaba sus productos en forma estacionaria o ambulante?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta98" class="saveRadio" value="1"> Estacionaria
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta98" class="saveRadio" value="2"> Ambulante
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>99. En agosto de 2008, ¿cuántos establecimientos tenía para comercializar sus productos y en donde estaban ubicados?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nro.</th>
                                <th>Nombre</th>
                                <th>Ubicación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <input id="preguntano99a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano99b1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <input id="preguntano99a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano99b2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <input id="preguntano99a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano99b3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <input id="preguntano99a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano99b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <input id="preguntano99a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano99b5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>
                                    <input id="preguntano99a6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano99b6" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        B. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>100. Entre los meses de enero y agosto de 2008, ¿Qué recorrido hacía  para vender sus productos y con que frecuencia lo realizaba? (pida al entrevistado que sea lo más específico con la ubicación de los situios de inicio y finalización de cada ruta)</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Recorrido</th>
                                <th>Frecuencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano100a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano100b1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano100a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano100b2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano100a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano100b3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano100a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano100b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano100a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano100b5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano100a6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano100b6" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>101. Entre los meses de enero y agosto de 2008, ¿A quién(es) le compraba los productos que comercializaba?</label><br/>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tipo de producto</th>
                                <th>Datos del proveedor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="preguntano101a1" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano101b1" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano101a2" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano101b2" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano101a3" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano101b3" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano101a4" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano101b4" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano101a5" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano101b5" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="preguntano101a6" type='text' class="saveText form-control" />
                                </td>
                                <td>
                                    <input id="preguntano101b6" type='text' class="saveText form-control" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <legend></legend>
                    <label>102. ¿Para comercializar sus productos utilizaba algún vehículo?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta102" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta102" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>103. ¿El vehículo era de su propiedad o contratado?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta103" class="saveRadio" value="1"> En vehículo propio
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta103" class="saveRadio" value="2"> En un vehículo contratado
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Tipo de vehículo</label><br/>
                    <input id="preguntano103TipoVehiculo" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Nombre de la persona de contacto</label><br/>
                    <input id="preguntano103PersonaContacto" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Teléfonos</label><br/>
                    <input id="preguntano103Telefonos" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>104. ¿Cuál fue la ganancia neta por esa actividad o negocio durante el mes de agosto de 2008?</label><br/>
                    $<input id="preguntano104" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>105. ¿Cuál fue su ganancia neta por esa actividad o negocio entre los meses de septiembre de 2007 y julio de 2008?</label><br/>
                    $<input id="preguntano105" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label id='preguntano1'>106. Entre enero y agosto de 2008, ¿Cuántos meses trabajo en esa empresa, negocio o finca o para esa persona?</label><br/>
                    <label>Número de meses</label>
                    <input id="preguntano106" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        D. SITUACIÓN LABORAL ACTUAL
                    </h3>
                </div>
                <div class="panel-body">
                    <label id='preguntano1'>107. ¿En este momento continúa realizando  el mismo trabajo o negocio?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta107" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta107" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label id='preguntano1'>108. ¿A qué actividad dedicó usted la mayor parte del tiempo la semana pasada?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta108a" class="saveCheck" value="1"> Trabajar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta108b" class="saveCheck" value="2"> Buscar Trabajo
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta108c" class="saveCheck" value="3"> Oficios del Hogar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta108d" class="saveCheck" value="4"> Estudiar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta108e" class="saveCheck" value="5"> Otra Actividad
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" id="pregunta108f" class="saveCheck" value="6"> Estaba incapacitado permanentemente para trabajar
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Cual?</label>
                    <input id="preguntano108" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label id='preguntano1'>109. Ademas de realizar esta actividad, ¿Tenía la semana pasada un negocio o trabajo por el que recibía ingresos?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta109" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta109" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>110. ¿Qué hace en ese trabajo? (sea lo más detallado posible)</label><br/>
                    <textarea id="preguntano110" class="form-control saveTextarea"></textarea><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        D. SITUACIÓN LABORAL ACTUAL (continuación)
                    </h3>
                </div>
                <div class="panel-body">
                    <label>111. ¿Con que frecuencia realizó este trabajo el mes pasado?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta111" class="saveRadio" value="1"> El mes completo
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta111" class="saveRadio" value="2"> Menos del mes
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Número de días</label>
                    <input id="preguntano111NumeroDias" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>112. ¿Cuántas horas a la semana trabaja normalmente?</label><br/>
                    <label>Horas</label>
                    <input id="preguntano112" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label id='preguntano1'>113. ¿Desde hace cuántos meses realiza este trabajo?</label><br/>
                    <label>Número de meses</label>
                    <input id="preguntano113" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>114. ¿Cuál es el nombre de la empresa, negocio,  finca o persona donde o para la cual trabaja?</label><br/>
                    <textarea id='preguntano114' class="form-control saveTextarea"></textarea><br/>
                    <legend></legend>
                    <label id='preguntano1'>115. ¿En dónde está ubicado esa empresa, negocio o finca donde trabaja?</label><br/>
                    <label>Departamento:</label><br/>
                    <select id="pregunta115Departamento" mun-child-id="pregunta115Municipio" class="saveSelect form-control departamentos">
                        <option>Seleccione Departamento...</option>
                    </select>
                    <br/>
                    <label>Municipio:</label><br/>
                    <select id="pregunta115Municipio" class="saveSelect form-control">
                        <option>Seleccione Municipio...</option>
                    </select>
                    <br/>
                    <label>Barrio o Vereda:</label><br/>
                    <select id="pregunta115Barrio" class="saveSelect form-control">
                        <option>Seleccione Barrio o Vereda...</option>
                    </select>
                    <br/>
                    <legend></legend>
                    <label>116. ¿A que actividad se dedica principalmente la empresa o negocio en la que usted realiza su trabajo?</label><br/>
                    <textarea id='preguntano116' class="form-control saveTextarea"></textarea><br/>
                    <legend></legend>
                    <label>117. En este trabajo usted es:</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="1"> Obrero o empleado de empresa particular
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="2"> Obrero o empleado del gobierno
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="3"> Empleado doméstico
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="4"> Jornalero o peón
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="5"> Trabajador po cuenta propia
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="6"> Patrón o empleador
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta117" class="saveCheck" value="7"> Trabajador sin remuneración
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>118. Antes de descuentos, ¿Cuánto ganó usted el mes pasado en este empleo?</label><br/>
                    <label>$</label>
                    <input id="preguntano118" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>119. ¿Para realizar este trabajo tiene algún tipo de contrato?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta119" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta119" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>El contrato es verbal o escrito?</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta119Tipo" class="saveRadio" value="1"> Verbal
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta119Tipo" class="saveRadio" value="2"> Escrito
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label >120. ¿Cuál fue la ganacia neta por esa actividad o negocio durante el mes pasado?</label><br/>
                    <label>$</label>
                    <input id="preguntano120" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>121. ¿Entre septiembre de 2008 y la actualidad, qué ha cambiado en su situación laboral?</label><br/>
                    <textarea id='preguntano121' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label >122. ¿Por qué considera que el PHEQ ha afectado su situación laboral?</label><br/>
                    <textarea id='preguntano122' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        E. CONSIDERACIONES GENERALES DEL ENTREVISTADO SOBRE LA COMPENSACIÓN Y LA INSCRIPCIÓN
                    </h3>
                </div>
                <div class="panel-body">
                    <label>123. En sus palabras, ¿qué es una compensación, cuándo se aplica y quienes tienen derecho a recibirla?</label><br/>
                    <textarea id='preguntano123' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>124. ¿Por qué cuándo el proyecto hizo censos en el 2008 y 2009, usted no fue incluído?</label><br/>
                    <textarea id='preguntano124' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        E. CONSIDERACIONES GENERALES DEL ENTREVISTADO SOBRE LA COMPENSACIÓN Y LA INSCRIPCIÓN
                    </h3>
                </div>
                <div class="panel-body">
                    <label id='preguntanoF'>F. OBSERVACIONES DEL ENTREVISTADOR</label><br/>
                    <label>125. Apreciación del entevistador sobre la consistencia de las respuestas:</label><br/>
                    <textarea id='preguntano125' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>126. Observaciones sobre la afectación en el desarrollo de su trabajo entre 2008 y la actualidad</label><br/>
                    <textarea id='preguntano126' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                    <label>127. Otras observaciones</label><br/>
                    <textarea id='preguntano127' class="form-control saveTextarea" ></textarea><br/>
                    <legend></legend>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        G. CONTROL DE LA ENTREVISTA
                    </h3>
                </div>
                <div class="panel-body">                    
                    <label>128. Fecha de aplicación de la entrevista</label><br/>
                    <input id="preguntano128" type='date' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Hora de inicio</label>
                    <input id="preguntano128Inicio" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>Hora de finalización</label>
                    <input id="preguntano128Finalizacion" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>129. Nombre del entrevistador</label><br/>
                    <label>Nombre del Entrevistador</label>
                    <input id="preguntano129" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>CC.</label>
                    <input id="preguntano129CC" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                    <label>130. Resultado final de la entrevista</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta130" class="saveRadio" value="1"> Completa
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta130" class="saveRadio" value="2"> Incompleta
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="pregunta130" class="saveRadio" value="2"> No se pudo realizar
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>Motivo</label>
                    <input id="preguntano130Motivo" type='text' class="saveText form-control" /><br/>
                    <legend></legend>
                </div>
            </div>
        </div>
    </div>
</section>