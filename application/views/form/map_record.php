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
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
    <section class="main-content">
      <div class="container">
          <div id='controls'>
          <br/>

          <div id='map' class='form-group'>
            <br/>
            <legend id='lgndTitulo'>FICHA VEREDAL:</legend>
            <label id='lblSubTitulo' style="font-size: 16px;">1. INFORMACIÓN A NIVEL VEREDA</label>
            <table style="width: 65%">
              <tr>
                <td style="width: 50%"><label id='lblMpo'></label></td>
                <td style="width: 50%"><label id='lblVda'></label></td>
              </tr>
            </table>
            <br/>
            <div id='pre1' class='form-group'>
              <br/>
              <label style="font-size: 16px;">2. ÁREA, JORNALES Y EMPLEOS PERMANENTES POR AÑO POR HECTAREA TOTAL</label>
              <table id='tablePre1Results' class='table table-striped'>
                <thead>
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </thead>
              </table>
            </div>

            <div id='pre2' class='form-group'>
              <br/>
              <label style="font-size: 16px;">3. ÁREA, JORNALES Y EMPLEOS PERMANENTES POR AÑO POR HECTAREA POR USO</label>
              <table id='tablePre2Results' class='table table-striped'>
                <thead>
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </thead>
              </table>
            </div>

            <label style="font-size: 16px;">4. FUENTE: RESPUESTAS ENCUESTA 2014</label>
            <table id='tableMapResults1' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <label style="font-size: 16px;">5. FUENTE: CERTIFICACIONES ADJUNTADAS</label>
            <table id='tableMapResults2' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
          </div>

          <div id='geo'>
            <br/>
            <img id='imgMpo' src="" alt="Mapa" style="width:100%">
          </div>

          <div id='veredal'>
          <br/>
          <label style="font-size: 16px;">6. INFORMACIÓN DE PREDIOS</label>
            <table id='tableVer6' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
          </div>

          <div id='predial'>
          <br/>
          <label style="font-size: 16px;">6. INFORMACIÓN DETALLADA PREDIO</label>
            <table id='tablePred6' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
          </div>

        </div>
        </br>
      </div>
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
