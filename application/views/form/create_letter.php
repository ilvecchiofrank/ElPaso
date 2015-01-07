<script src="<?php echo base_url(); ?>/public/js/ckeditor/ckeditor.js"></script>
<!-- <script type="text/javascript" src="/asset/ckfinder/ckfinder.js"></script> -->
<link href="public/css/certifications/form.css" rel="stylesheet" />
<style type="text/css">

  input[type=checkbox] {
  margin-left: 1em;
  margin-right: 0.5em;
  transform: scale(1.2);
  -webkit-transform: scale(1.2);
  }

</style>
<script type='text/javascript'>
    var docId = '<?php echo $_GET["docId"]; ?>';
    var code = '<?php
if (isset($_GET["code"])) {
    echo $_GET["code"];
} else {
    echo "0";
}
?>';
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';

</script>
    <section class="main-content">
      <div class="container">
          <div id='controls'>
          <br/>

          <div id='divLogo' class='form-group'>
            <table style="width:95%">
              <tr>
                <td style="width:33%"><img alt="Emgesa" src="public/img/logoprint.gif" class="img-responsive" width="150"></td>
                <td style="width:33%"></td>
                <td style="width:33%; text-align: right">EMGESA S.A. E.S.P.<br/>Radicado: <input type="text" name="rad_emgesa" id="rad_emgesa" class='form-control'><br/>Documento Externo<br/><input type="date" name="fec_carta" id="fec_carta" class='form-control'></td>
              </tr>
            </table>
            <br/>
          </div>
          <div id='divEncabezado' class='form-group'>
            <label id="lblConsecutivo" name="lblConsecutivo">PQ-UGS-ECO-1548-56</label>
            <br/>
            <table>
              <tr>
                <td>
                  <label id="lblSenor" name="lblSenor">Señor</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label id="lblNombres" name="lblNombres">Nombres_Apellidos</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label id="lblDireccion" name="lblDireccion">Direccion</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label id="lblVereda" name="lblVereda">BarrioVereda</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label id="lblTelefono" name="lblTelefono">Teléfono: 123456789</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label id="lblMunicipio" name="lblMunicipio">MunicipioResidencia</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label id="lblDepartamento" name="lblDepartamento">DepartamentoResidencia</label>
                </td>
              </tr>
            </table>
            <br/>
          </div>
          <div id='divAsunto' name='divAsunto'>
            <table>
              <th>
                Asunto:
              </th>
              <tr>
                <td>
                  <label id="lblAsunto" name="lblAsunto">Respuesta Censo sentencia T135/13</label>
                </td>
              </tr>
            </table>
            <br/>
          </div>

          <div id='divSaludo' name='divSaludo'>
            <table>
              <tr>
                <td>
                  <label id="lblSaludo" name="lblSaludo">Respetado Señor Apellido</label>
                </td>
              </tr>
            </table>
            <br/>
          </div>

          <div id='bloque1' name='bloque1'>
            <label id='lblBloque1'></label>
          </div>

          <div id='divControles' name='divControles'>
            <table>
              <tr>
                <td style='width:50%'>
                  <label>Tipología:</label>
                  <label id="lblTipologia"></label>

                </td>
                <td style='width:50%'>
                  <label>Categoría:</label>
                  <label id="lblCategoria"></label>

                </td>
              </tr>
              <tr>
                <td>
                  <label>Tipologías adicionales:</label>
                  <label id="lblTipologia_adic"></label>
                </td>
                <td>
                  <label>Categorías adicionales:</label>
                  <label id="lblCategoria_adic"></label>
                </td>
              </tr>
              <tr>
                <td colspan='2'>
                  <br/>
                  <a id='btnCert' href="#" class="btn btn-default btn-md">Certificaciones</a>
                  <a id='btnTutela' href="#" class="btn btn-success btn-md">Tutelas</a>
                  <a id='btnAnswer' href="#" class="btn btn-warning btn-md">Respuestas</a>
                  <a id='btnDBMatch' href="#" class="btn btn-info btn-md">Cruces BD</a>
                  <a id='btnCCT' href="#" class="btn btn-danger btn-md">Concepto Comité de Expertos</a>
                  <a id='btnSuppCon' href="#" class="btn btn-default btn-md">Conceptos de soporte</a>
                </td>
              </tr>
            </table>
            <br/>
          </div>
          <div id='divRedaccion' name='divRedaccion'>
            <textarea name="contenido" id="contenido" cols="30" rows="10" class='form-control'></textarea>

            <script>
              CKEDITOR.replace('contenido');
            </script>

            <br/>
          </div>

          <div id='bloque2' name='bloque2'>
            <label id='lblBloque2'></label>
          </div>

          <div id='divCierre' name='divCierre'>
            <label id='lblDespedida'>Cordialmente,</label>
            <label id='lblSigner' style='display: none'>MILLER AUGUSTO PERDOMO</label>
            <label id='lblSignerWork' style='display: none'>Responsable de Desarrollo Económico</label>
            <label id='lblSignerEnterprise' style='display: none'>Proyecto Hidroeléctrico El Quimbo</label>
            <br/>
            <br/>
            <label id='lblRedac'>Elaboró:</label>
            <br/>
            <label id='lblConsul'>Validó:</label>
            <br/>
            <label id='lblJurid'>Revisó:</label>
            <br/>
            <label id='lblGeren'>Aprobó:</label>
            <br/>
            <label id='lblFooter' style='display: none' >Pie de página</label>
          </div>
          <legend style='clear: both;'></legend>
			<div id='divDevolver' style='display:none'>
			<label id='lblDevolver'>Motivo de la devolución:</label>
			<br/>
			<input type="text" name="txt_Devolver" id="txt_Devolver" class='form-control'>
			<br/>
			</div>

      <div id='divActions'>
        <button id='saveInfo' class='btn btn-success btn-md'>Guardar Información</button>
        <button id='saveClose' class='btn btn-danger btn-md'>Guardar y Cerrar</button>
        <button id='putBack' class='btn btn-warning btn-md'>Devolver</button>
        <button id='btnRecat' class='btn btn-info btn-md'>Recategorizar</button>
        <a id='btnFinish' class="btn btn-danger btn-md">Terminar</a>
        <a id='btnPrint' class="btn btn-default btn-md">Imprimir</a>
      </div>

        </div>
        </br>
      </div>
      <input type="hidden" name="hfCreate" id="hfCreate">
      <input type="hidden" name="hfContent" id="hfContent">
      <input type="hidden" name="hfRedac" id="hfRedac" value=0>
      <input type="hidden" name="hfConsul" id="hfConsul" value=0>
      <input type="hidden" name="hfJurid" id="hfJurid" value=0>
      <input type="hidden" name="hfGeren" id="hfGeren" value=0>
      <input type="hidden" name="hfUserType" id="hfUserType" value=<?php echo $this->session->userdata("inRUserType") ?>>
      <input type="hidden" name="hfUserId" id="hfUserId" value=<?php echo $this->session->userdata("inRUserID") ?>>
    </section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Información:</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" style='text-align: center;' role="alert">
                    <img src='public/img/ajax-loader.gif' alt='loading...'/>
                    Cargando por favor espere...
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div id="divUpdate" style="z-index:1000; position:fixed; bottom:0; right:0; width:25%; display: none;" class="alert alert-success" role="alert" ><b>Guardado automatico. </b>Última modificación: 01/01/2001 01:01</div>
<div id="divError" style="z-index:1000; position:fixed; bottom:0; right:0; width:25%; display: none;" class="alert alert-danger" role="alert" ><b>Falló el guardado. </b>Ha ocurrido un error al guardar.</div>
<div id="divClose" style="z-index:1000; position:fixed; top:25%; left:25%; width:50%; display: none;" class="alert alert-warning" role="alert"> <h2>Atención:</h2> <br/> El formulario ya cuenta con una respuesta. Haga click aquí para ocultar este mensaje.</div>