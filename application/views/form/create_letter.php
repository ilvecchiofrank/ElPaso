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
                  <label id="lblAsunto" name="lblAsunto">T-02 Solicitud complementar info.</label>
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

          <div id='divControles' name='divControles'>
            <table>
              <tr>
                <td>
                  <label>Tipología:</label>
                  <label id="lblTipologia"></label>
<!--                    <select class='form-control' id="tipologia" name="tipologia">
                      <option value="">Seleccione...</option>
                    </select> -->
                </td>
                <td>
                  <label>Categoría:</label>
                  <label id="lblCategoria"></label>
<!--                    <select class='form-control' id="categoria" name="categoria">
                      <option value="">Seleccione...</option>
                    </select> -->
                </td>
              </tr>
              <tr>
                <td colspan='2'>
                  <br/>
                  <a id='btnCert' href="#" class="btn btn-default btn-md">Certificaciones</a>
                  <a id='btnTutela' href="#" class="btn btn-success btn-md">Tutelas</a>
                  <a id='btnAnswer' href="#" class="btn btn-warning btn-md">Respuestas</a>
                  <a id='btnDBMatch' href="#" class="btn btn-info btn-md">Cruces BD</a>
                  <a id='btnCCT' href="#" class="btn btn-danger btn-md">Concepto comité técnico</a>
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

            <script src="public/js/jquery-1.11.0.min.js" type="text/javascript">
            console.log("test!");
              $("#cke_23").css("display","none");
              $("#cke_30").css("display","none");
              $("#cke_32").css("display","none");
            </script>

            <br/>
          </div>
          <div id='divCierre' name='divCierre'>
            <label id='lblDespedida'>Cordialmente,</label>
            <br/>
            <label id='lblSigner'>MILLER AUGUSTO PERDOMO</label>
            <br/>
            <label id='lblSignerWork'>Responsable de Desarrollo Económico</label>
            <br/>
            <label id='lblSignerEnterprise'>Proyecto Hidroeléctrico El Quimbo</label>
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
      </div>

        </div>
        </br>
      </div>
      <input type="hidden" name="hfCreate" id="hfCreate">
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