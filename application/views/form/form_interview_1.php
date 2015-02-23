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
                    <select id="pregunta2Departamento" class="saveSelect form-control">
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
                    <input id='preguntano4' type='text' class="saveText form-control"><br/>  
                    <legend></legend>
                    <label >5. Nombres del entrevistado (como aparece en el formulario de registro del Censo 2014):</label><br/>
                    <input id='preguntano5' type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label >6. Apellidos del entrevistado (como aparece en el formulario de registro del Censo 2014):</label><br/>
                    <input id='preguntano6' type='text' class="saveText form-control"><br/>            
                    <legend></legend>
                    <label >7. Edad actual del entrevistado (calcule la edad de acuerdo a la casilla A11 del registro del Censo 2014):</label><br/>
                    <input type='text' class="saveText form-control"><br/>
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
                    <input id='preguntano9' type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>10. ¿A qué cadena productiva se integra esta actividad económica?</label><br/>
                    <label>Código de cadena productiva</label><br/>
                    <input id="preguntano10" type='text' class="saveText form-control"><br/>            
                    <label>¿Otro Cual?</label><br/>
                    <input id="preguntano10OtroCual" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>11. ¿En el proceso de registro el entrevistado autorizó el habeas data? (el cual se mantiene hasta el momento)</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="preguntano11" class="saveRadio" value="1"> Si
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="preguntano11" class="saveRadio" value="2"> No
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>12. Números de teléfono registrados (casilla A6 del Censo 2014):</label><br/>
                    <label>Telefono 1</label>
                    <input id="preguntano12Telefono1" type='text' class="form-control"><br/>
                    <label >Telefono 2</label>
                    <input id="preguntano12Telefono2" type='text' class="form-control"><br/>
                    <legend></legend>
                    <label>13. Fecha de la comunicación por parte de EMGESA de la realización de la entrevista:</label><br/>
                    <input id="preguntano13" type='date' class="saveText form-control"><br/>
                    <label id='preguntano1'>14. ¿Se pudo realizar la entrevista?</label><br/>
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
                    <input id="preguntano18" type='text' class="saveText form-control"><br/>
                    <label>Departamento:</label><br/>
                    <select id="preguntano18Departamento" class="saveSelect form-control">
                        <option>Seleccione Departamento...</option>
                    </select>
                    <br/>
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
                    <input id="preguntano23Porque" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano24Porque" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>25. ¿Cuántas personas hacían parte de su hogar en agosto de 2008?</label><br/>
                    <input id="preguntano25" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano27c" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano27dConsumoUltimoMes" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>e. ¿Cuál es el valor a pagar del recibo?</label>
                    <label>(registre el valor en pesos sin puntos ni comas)</label>
                    $<input id="preguntano27e" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>28. ¿Cuál es su nivel educativo y el último año aprobado en ese nivel?</label><br/>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="1"> Ninguno
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="2"> Preescolar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="3"> Primaria
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="4"> Secundaria
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="5"> Media
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="6"> Ténico profesional
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="7"> Tecnológico
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="8"> Universitario
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="9"> Especialización
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="10"> Maestría
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta28" class="saveCheck" value="11"> Doctorado
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label >29. ¿Cuál es el nombre de la institución en la que cursó el último año aprobado?</label><br/>
                    <label >a. Nombre de institución:</label><br/>
                    <input id="preguntano29" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano31c" type='text' class="saveText form-control"><br/>
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
                        B. DATOS GENERALES DEL ENTREVISTADO (continuación)
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
                    <input id="preguntano33" type='text' class="saveText form-control"><br/>
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
                            <input type="checkbox" name="pregunta34" class="saveCheck" value="1"> Trabajar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta34" class="saveCheck" value="2"> Buscar Trabajo
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta34" class="saveCheck" value="3"> Oficios del Hogar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta34" class="saveCheck" value="4"> Estudiar
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta34" class="saveCheck" value="5"> Otra Actividad
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" name="pregunta34" class="saveCheck" value="6"> Estaba incapacitado permanentemente para trabajar
                        </label>
                    </div>
                    <br/>
                    <br/>
                    <legend></legend>
                    <label>¿Cual?</label>
                    <input id="preguntano34" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano37Numerodiasporsemana" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Número de semanas</label>
                    <input id="preguntano37NumeroSemanas" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Número de días</label>
                    <input id="preguntano37Numerodias" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>38. ¿Cuántas horas a la semana dedicaba a este trabajo en agosto de 2008?</label><br/>
                    <label>Horas</label><br/>
                    <input id="preguntano38" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>39. Desde enero hasta agosto de 2008, ¿durante cuántos meses realizó este trabajó?</label><br/>
                    <label>Número de meses</label><br/>
                    <input id="preguntano39" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label >40. ¿Cuál era el nombre de la empresa, negocio, finca o persona donde trabajaba?</label><br/>
                    <input id="preguntano40" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>41. ¿En dónde estaba ubicada esa empresa,negocio,finca o persona donde usted trabajaba?</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label>Departamento:</label><br/>
                    <select id="pregunta41Departamento" class="saveSelect form-control">
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
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
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
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_1" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2. Trabajador o ayudante sin remuneración</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_2" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3. Jornalero o peón</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3 class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_3" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4. Trabajador por cuenta propia</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_4" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5. Patrón o empleador</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_5" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6. Otro, ¿cuál?</td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="1"> 1. Tabaco
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="2"> 2. Maíz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="3"> 3. Arroz
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="4"> 4. Cacao
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="5"> 5. Pasifloras
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="6"> 6. Forestal
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="7"> 7. Pecuaria (Carne o Leche)
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="8"> 8. Pesca o acuicultura
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="9"> 9. Extracción de minerales no metálicos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="10"> 10. Transporte de insumos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="11"> 11. Transporte de pasajeros
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="12"> 12. Comercialización de productos
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="checkbox" name="pregunta44_6" class="saveCheck" value="13"> 13. Otra, ¿cuál?
                                        </label>
                                    </div>
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
                    <input id="preguntano46" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano47AreaOcupada" type='text' class="saveText form-control"> mts2<br/>
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
                    <input id="preguntano47ComidasPrincipales" type='text' class="saveText form-control"> día<br/>
                    <label>Onces o refrigerios</label>
                    <input id="preguntano47Onces" type='text' class="saveText form-control"> día<br/>
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
                    <input id="preguntano47ComidasPrincipales" type='text' class="saveText form-control"><br/>
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
                    <input id="preguntano48Porcentaje" type='text' class="saveText form-control"><br/>
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
                        C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)
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
                    <input id="preguntano50Departamento" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Municipio</label>
                    <input id="preguntano50Municipio" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Dirección</label>
                    <input id="preguntano50Dirección" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Nombre de la persona de cotacto</label>
                    <input id="preguntano50Personacontacto" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label>Teléfonos</label>
                    <input id="preguntano50Teléfonos" type='text' class="saveText form-control"><br/>
                    <legend></legend>
                    <label id='preguntanoE'>Entrevistador: De acuerdo a la clasificación hecha en  el cuadro de cruce entre posición ocupacional y cadena productiva que se encuentra antes de la pregunta 45,  proceda de la siguiente manera:
                        Si la cadena es código 1 a 5,  y la posición ocupacional 4 o 5 continúe con la pregunta 51, relacionada con actividades agricolas
                        Si la cadena es código 6, y la posición ocupacional 4 o 5,  pase a la pregunta 60 relacionada con sector forestal
                        Si la cadena es código 7, y la posición ocupacional 4 o 5, pase a la pregunta 67, sobre actividades pecuarias
                        Si la cadena es código 8, y la posición ocupacional 4 o 5, pase a la pregunta 73 relacionada con actividades de pesca
                        Si la cadena es código 9, y la posición ocupacional 4 o 5, pase a la pregunta 81, relacionada con actividades mineras o extractivas
                        Si la cadena es código 10, y la posición ocupacional 4 o 5, pase a pregunta 87, relacionada con actividades de transporte de  mercancías o insumos                                                                                                                                                                                                                                                       Si la cadena es código 11, y la posición ocupacional 4 o 5, pase a pregunta 92, relacionadas con actividades de transporte de pasajeros
                        Si la cadena es código 12, y la posición ocupacional 4 o 5, pase a la pregunta 97, relacionada con actividades comerciales
                        Si la cadena es código 13, pase a la pregunta 104 0</label><br/>

                    <label id='preguntano5'>51. En la finca donde usted trabajaba ¿Cuál era el área destinada para ese cultivo en el 2008?</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Área</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano5'>52. ¿Hacía rotación de ese cultivo con otro tipo de cultivos?</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Sí.</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 No.</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano5'>52A. ¿Asociaba ese cultivo con otro tipo de cultivos?</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Sí.</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 No.</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano5'>53. ¿Las labores de siembra, mantenimiento y cosecha del cultivo las realizaba sólo o con otras personas?</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Solo</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Con otras personas</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano5'>54. Cuántas personas pagadas y no pagadas le ayudaban en ese cultivo y que labores desarrollaban?</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Etapa</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Siembra</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Mantenimiento</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <label id='preguntano0'>0 Cosecha</label><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                    <textarea class="form-control"></textarea><br/>
                </div>
            </div>
            <label id='preguntanoC'>C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano5'>55. ¿Qué tipo de abonos o fertilizantes utilizaba para este cultivo?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Abonos o fertilizantes </label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano5'>56. ¿Dónde adquiría los abonos o  fertilizantes que utilizaba para este cultivo? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 N/A</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Abonos o Fertilizantes</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano5'>57. ¿Qué porcentaje de la producción vendía y a quien lo hacía?  (Nombre, dirección y telefono del comprador)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 %</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano5'>58. ¿De qué manera transportaba su producción al sitio de venta?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo propio</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo contratado</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No la transportaba</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano5'>59. ¿Qué tipo de semillas utilizaba y cómo las obtenía?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de semillas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>60. ¿Cuál era el área destinada para la producción forestal en el 2008?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Área</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>61. ¿Qué especies de árboles tenía plantados, cuántos árboles por especie tenía y que área ocupaban en el 2008?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Especie</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>62. ¿Las labores de siembra, mantenimiento o tala las realizaba sólo o con otras personas?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Solo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Con otras personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoC'>C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>63. ¿Cuántas personas pagadas y no pagadas le ayudaban y  qué labores realizaban?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Etapa</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Siembra</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Mantenimiento</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tala</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>64. ¿Qué cantidad de su producción vendía, con qué periodicidad y a quién lo hacía?  (Nombre, dirección y telefono del comprador)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 %</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>65. ¿De qué manera transportaba su producción?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo propio</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo contratado</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No la transportaba</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>65A. ¿Qué tipo de semillas utilizaba y cómo las obtenía?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de semillas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>66. ¿Tenía permiso para realizar la explotación forestal?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Si</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>67. En Agosto de 2008, ¿Qué que razas de ganado vacuno tenía, cuántos animales tenía por raza y cuál era el uso que les daba?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Razas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>68. ¿Elaboraba productos derivados como queso, quesillo o embutidos entre otros?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sí.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano6'>69. ¿Qué tipo de productos elaboraba y cuál era su producción mensual?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Productos</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>70. ¿Las labores de producción las realizaba sólo o con otras personas?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Solo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Con otras personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoC'>C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>71. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores? </label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Etapa</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Cría</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Levante u ordeño</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sacrificio</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Producción de derivados</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>72. ¿Qué cantidad de su producción vendía mensualmente y a quien lo hacía?  (Nombre, dirección y telefono del comprador)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Producto</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>72A. ¿De qué manera transportaba su producción?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo propio</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo contratado</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No la transportaba</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>72B. ¿Dónde adquiría los insumos (terneros, vacunas, insumos para la producción de derivados entre otros) que utilizaba para la producción pecuaria? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 N/A</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de insumo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>73. ¿En qué sitios pescaba usted en agosto del 2008?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>74. ¿Qué cantidad de pescado y que variedades extraía usted a la semana?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Variedad</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>75. ¿En qué mes o meses del año era su mayor pesca y cuántas unidades extraía?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Mes del año</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>76. ¿Qué técnica de pesca utilizaba?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoC'>C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>77. ¿Pescaba con  embarcación?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sí.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>78. ¿Podría suministrarme los datos de la persona dueña de la embarcación?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de embarcación:</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Nombre de la persona de contacto:</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Teléfonos:</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano7'>79. ¿Qué cantidad de su producción vendía al día y a quién lo hacía?  (Nombre, dirección y teléfono del comprador si era mayorista)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Cantidad</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>80. ¿Tenía permiso para realizar esta actividad?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Si</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>81. ¿En qué lugar o lugares realizaba esta actividad extractiva, que tipo de material extraía, que cantidad y con qué periodicidad lo hacía?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Lugar</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>82. ¿Las labores de extracción las realizaba sólo o con otras personas?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Solo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Con otras personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>83. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores? </label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Número total de personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>84. ¿De qué manera transportaba el material que extraía?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo propio</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo contratado</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No lo transportaba</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>85. En dónde y a quiénes vendía el producto de la explotación</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En dónde</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>86. ¿Tenía permiso para realizar esta actividad?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Si</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoC'>C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>87. Entre los meses de enero y agosto de 2008, ¿Qué rutas cubría y con qué frecuencia? (pida al entrevistado que sea lo más específico con la ubicación de los situios de inicio y finalización de cada ruta)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Rutas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>88. ¿Qué tipo de productos trasportaba y con qué tipo de vehículos lo hacía?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Clase de productos</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano8'>89. ¿El transporte de estos productos lo realizaba sólo o con otras personas?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Solo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Con otras personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>90. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Número total de personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>91. ¿Quiénes eran sus principales clientes en la zona de influencia del PHEQ y dónde se ubicaban?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Clientes</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>91A. ¿Dónde adquiría los insumos (Gasolina, lubricantes, repuestos entre otros) que utilizaba para realizar esta actividad? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de insumo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Entre los meses de enero y agosto de 2008, ¿Qué rutas cubría con qué frecuencia y cuántas personas por frecuencia transportaba? (pida al entrevistado que sea lo más específico con la ubicación de los sitios de inicio y finalización de cada ruta)</label><br/>
            <label id='preguntano9'>92. 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Rutas (Inicio, intermedias, fin)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoC'>C. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>93. ¿Qué tipo de vehículos utilizaba y cuál era su capacidad?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Vehículo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>94. ¿Esta actividad la  realizaba sólo o con otras personas?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Solo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Con otras personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>95. ¿Cuántas personas pagadas y no pagadas le ayudaban y para que labores?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Número total de personas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>96.  ¿Se encontraba afiliado o asociado a alguna empresa?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Si</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>96A. ¿Dónde adquiría los insumos (Gasolina, lubricantes, repuestos entre otros) que utilizaba para realizar esta actividad? (Nombre, dirección y telefono del proveedor si los compraba)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de insumo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 104 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>97. Durante el mes de agosto de 2008, ¿Qué productos, Qué cantidades y con que frecuencia comercializaba?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de productos</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>98. ¿Comercializaba sus productos en forma estacionaria o ambulante?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Estacionaria</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Ambulante</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano9'>99. En agosto de 2008, ¿cuántos establecimientos tenía para comercializar sus productos y en donde estaban ubicados?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Nro.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 1</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 2</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 3</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 4</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 101 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoB'>B. SITUACIÓN LABORAL EN AGOSTO DE 2008 (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>100. Entre los meses de enero y agosto de 2008, ¿Qué recorrido hacía  para vender sus productos y con que frecuencia lo realizaba? (pida al entrevistado que sea lo más específico con la ubicación de los situios de inicio y finalización de cada ruta)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Recorrido</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>101. Entre los meses de enero y agosto de 2008, ¿A quién(es) le compraba los productos que comercializaba?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Tipo de producto</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>102. ¿Para comercializar sus productos utilizaba algún vehículo?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sí.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>103. ¿El vehículo era de su propiedad o contratado?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo propio</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 En un vehículo contratado</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>104. ¿Cuál fue la ganancia neta por esa actividad o negocio durante el mes de agosto de 2008?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 $</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>105. ¿Cuál fue su ganancia neta por esa actividad o negocio entre los meses de septiembre de 2007 y julio de 2008?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 $</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>106. Entre enero y agosto de 2008, ¿Cuántos meses trabajo en esa empresa, negocio o finca o para esa persona?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Número de meses</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoD'>D. SITUACIÓN LABORAL ACTUAL</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>107. ¿En este momento continúa realizando  el mismo trabajo o negocio?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sí.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>108. ¿A qué actividad dedicó usted la mayor parte del tiempo la semana pasada?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Trabajar</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Buscar trabajo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Oficios del hogar</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Estudiar</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Otra actividad, ¿cuál?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Estaba incapacitado permanentemente para trabajar</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>109. Ademas de realizar esta actividad, ¿Tenía la semana pasada un negocio o trabajo por el que recibía ingresos?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sí.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>110. ¿Qué hace en ese trabajo? (sea lo más detallado posible)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoD'>D. SITUACIÓN LABORAL ACTUAL (continuación)</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>111. ¿Con que frecuencia realizó este trabajo el mes pasado?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 El mes completo</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Menos del mes</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>112. ¿Cuántas horas a la semana trabaja normalmente?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Horas</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>113. ¿Desde hace cuántos meses realiza este trabajo?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Número de meses</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>114. ¿Cuál es el nombre de la empresa, negocio,  finca o persona donde o para la cual trabaja?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>115. ¿En dónde está ubicado esa empresa, negocio o finca donde trabaja?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Departamento</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Barrio o vereda:</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>116. ¿A que actividad se dedica principalmente la empresa o negocio en la que usted realiza su trabajo?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>117. En este trabajo usted es:</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Obrero o empleado de empresa particular</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Obrero o empleado del gobierno</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Empleado doméstico</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Jornalero o peón</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Trabajador po cuenta propia</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Patrón o empleador</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Trabajador sin remuneración</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>118. Antes de descuentos, ¿Cuánto ganó usted el mes pasado en este empleo?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 $</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>119. ¿Para realizar este trabajo tiene algún tipo de contrato?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Sí.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoP'>Pase a la pregunta 121 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>120. ¿Cuál fue la ganacia neta por esa actividad o negocio durante el mes pasado?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 $</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>121. ¿Entre septiembre de 2008 y la actualidad, qué ha cambiado en su situación laboral?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>122. ¿Por qué considera que el PHEQ ha afectado su situación laboral?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoE'>E. CONSIDERACIONES GENERALES DEL ENTREVISTADO SOBRE LA COMPENSACIÓN Y LA INSCRIPCIÓN</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>123. En sus palabras, ¿qué es una compensación, cuándo se aplica y quienes tienen derecho a recibirla?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>124. ¿Por qué cuándo el proyecto hizo censos en el 2008 y 2009, usted no fue incluído?</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoF'>F. OBSERVACIONES DEL ENTREVISTADOR</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>125. Apreciación del entevistador sobre la consistencia de las respuestas:</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>126. Observaciones sobre la afectación en el desarrollo de su trabajo entre 2008 y la actualidad</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>127. Otras observaciones</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoG'>G. CONTROL DE LA ENTREVISTA</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>128. Fecha de aplicación de la entrevista</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>129. Nombre del entrevistador</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 CC.</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano1'>130. Resultado final de la entrevista</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Competa</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 Incompleta</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntano0'>0 No se pudo realizar</label><br/>
            <textarea class="form-control"></textarea><br/>
            <label id='preguntanoF'>Firma del entrevistado 0</label><br/>
            <textarea class="form-control"></textarea><br/>
            <textarea class="form-control"></textarea><br/>
        </div>
    </div>
</section>