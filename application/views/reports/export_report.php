<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=report.xls");
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
</div>
<div class="panel-body">
<table border="1" class="table table-bordered table-condensed">
  <tr>
    <td>Departamento: <?php echo $arrHeader[0]->dpto; ?></td>
    <td>Municipio: <?php echo $arrHeader[0]->mpo; ?></td>
  </tr>
  </table>
  <br/>
</div>
<table>
  <tr>
    <td></td>
  </tr>
</table>
<div class="panel-body">
  <label>1. Resumen</label>
  <?php echo $arrResume; ?>
</div>
<table>
  <tr>
    <td></td>
  </tr>
</table>
<div class="panel-body">
  <label>2. Detalle</label>
  <?php echo $arrContent; ?>
</div>

</body>