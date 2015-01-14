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
            <legend id='lgndTitulo'>Ficha Veredal:</legend>
            <label id='lblSubTitulo'>1. Información a nivel Vereda</label>
            <table style="width: 65%">
              <tr>
                <td style="width: 50%"><label id='lblMpo'></label></td>
                <td style="width: 50%"><label id='lblVda'></label></td>
              </tr>
            </table>
            <br/>
            <div id='pre1' class='form-group'>
              <br/>
              <label>2. Área, jornales y empleos permanentes por año por hectarea TOTAL</label>
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
              <label>3. Área, jornales y empleos permanentes por año por hectarea por USO</label>
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

            <label>4. Fuente: Respuestas encuesta 2014</label>
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
            <label>5. Fuente: Certificaciones adjuntadas</label>
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
            <table id='tableVerResults' class='table table-striped'>
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
            <table id='tablePredResults' class='table table-striped'>
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
