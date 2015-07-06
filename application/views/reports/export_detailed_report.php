<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=report_detail.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="panel-body" style="text-align: center;">
  <img alt="Emgesa" src="http://i.imgur.com/l2Ho1jG.gif" class="img-responsive" width="150">
  <h4 style="text-align: center;">PROYECTO HIDROELÉCRICO EL PASO </h4>
  <br/>
  <h5 style="text-align: center;">Ficha detallada de la actividad</h5>
</div>
<div class="panel-body">
  <label>1. Descripción</label>
  <table border="1">
      <tr>
          <td>Actividad</td>
          <td colspan="3"><label><?php echo $arrResume[0]->actividaddescripcion; ?></label></td>
      </tr>
      <tr>
          <td>Departamento:</td>
          <td><label><?php echo $arrResume[0]->dpto; ?></label></td>
          <td>Municipio:</td>
          <td><label><?php echo $arrResume[0]->mpo; ?></label></td>
      </tr>
      <tr>
          <td>Tipo actividad:</td>
          <td><label><?php echo $arrResume[0]->act_tipo; ?></label></td>
          <td>Nombre del sitio:</td>
          <td><label><?php echo $arrResume[0]->sitionombre; ?></label></td>
      </tr>
      <tr>
          <td>Fecha inicio:</td>
          <td><label><?php echo $arrResume[0]->fechaini; ?></label></td>
          <td>Fecha fin:</td>
          <td><label><?php echo $arrResume[0]->fechafin; ?></label></td>
      </tr>
      <tr>
          <td>Hora inicio:</td>
          <td><label><?php echo $arrResume[0]->horainicio; ?></label></td>
          <td>Hora fin:</td>
          <td><label><?php echo $arrResume[0]->horafin; ?></label></td>
      </tr>
  </table>
</div>
<table>
  <tr>
    <td></td>
  </tr>
</table>
<div class="panel-body">
  <label>2. Cobertura</label>
  <table border="1">
      <tr><td>Departamento</td><td>Municipio</td></tr>
      <?php 
      for ($i = 0; $i < count($arrDetails); $i++)
      {
         echo "<tr><td>" . $arrDetails[$i]->depto . "</td><td>" . $arrDetails[$i]->mpo . "</td></tr>";
      }?>
  </table>
</div>
<table>
  <tr>
    <td></td>
  </tr>
</table>
<div class="panel-body">
  <label>3. Soportes asociados a la actividad</label>
  <table border="1">
      <tr><td>Tipo Soporte</td><td>Nombre del Soporte</td><td>Descripción</td><td>Consultar Soporte</td></tr>
      <?php 
      for ($i = 0; $i < count($arrSupport); $i++)
      {
         echo "<tr><td>" . $arrSupport[$i]->soportetxt . "</td><td>" . $arrSupport[$i]->nombre . "</td><td>" . $arrSupport[$i]->descripcion . "</td><td>" . $arrSupport[$i]->linkdescargasoporte . "</td></tr>";
      }?>
  </table>
</div>
<table>
  <tr>
    <td></td>
  </tr>
</table>
<div class="panel-body">
  <label>4. Participantes</label>
  <table border="1"><tr><td>Total Personas:</td><td><label><?php echo($arrTotalAssistant[0]->conteo); ?></label></td></tr></table>
  <table border="1">
      <tr><td>Nombres</td><td>Apellidos</td><td>Sexo</td><td>No. Documento</td><td>Dpto. Residencia</td><td>Mpo. Residencia</td><td>Teléfono</td><td>Celular</td></tr>
      <?php 
      for ($i = 0; $i < count($arrAssistant); $i++)
      {
         echo "<tr><td>" . $arrAssistant[$i]->nombres . "</td><td>" . $arrAssistant[$i]->apellidos . "</td><td>" . $arrAssistant[$i]->sexo . "</td><td>" . $arrAssistant[$i]->nodocumento . "</td><td>" . $arrAssistant[$i]->depto . "</td><td>" . $arrAssistant[$i]->mpo . "</td><td>" . $arrAssistant[$i]->telefono . "</td><td>" . $arrAssistant[$i]->celular . "</td></tr>";
      }?>
  </table>
</div>
<table>
  <tr>
    <td></td>
  </tr>
</table>
<div class="panel-body">
  <label>5. Inquietudes y respuestas</label>
  <table border="1"><tr><td>Total Inquietudes:</td><td><label><?php echo($arrTotalQuestion[0]->conteo); ?></label></td></tr></table>
  <table border="1">
      <tr><td>No. Documento</td><td>Nombres y apellidos</td><td>Tipo</td><td>Inquietud</td><td>Respuesta dada</td><td>Categoria inquietud manifestada</td><td>Categoria respuesta dada</td></tr>
      <?php 
      for ($i = 0; $i < count($arrQuestion); $i++)
      {
         echo "<tr><td>" . $arrQuestion[$i]->nodocumento . "</td><td>" . $arrQuestion[$i]->fullname . "</td><td>" . $arrQuestion[$i]->tipo . "</td><td>" . $arrQuestion[$i]->pregunta_txt . "</td><td>" . $arrQuestion[$i]->respuesta_txt . "</td><td>" . $arrQuestion[$i]->pregunta_categorizadatxt . "</td><td>" . $arrQuestion[$i]->respuestadescripciontxt . "</td></tr>";
      }?>
  </table>
</div>
<div class="panel-body">
  <table>
    <tr>
      <td><i>Generado: <?php echo date('d-m-Y H:i:s'); ?></i></td>
    </tr>
  </table>
</div>
</body>