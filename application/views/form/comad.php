<link href="public/css/certifications/form.css" rel="stylesheet" />

<script type='text/javascript'>
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
    <section class="main-content">
      <div class="container">
          <div id='controls'>
          <br/>

          <div id='comad' clas='form-group'>
            <br/>
            <legend>Comunicaciones adicionales:</legend>

            <table id="comadHeader" class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td style="width: 40%">
                      <label for="documento">Documento:</label>
                      <select class='form-control' id="documento" name="documento">
                        <option value="">Seleccione...</option>
                      </select>
                    </td>
                    <td style="width: 20%">
                      <label for="fec_documento">Fecha:</label>
                      <input type="date" name="fec_documento" id="fec_documento" class='form-control'>
                    </td>
                    <td style="width: 40%">
                      <label for="obs_documento">Observaciones:</label>
                      <input type="text" name="obs_documento" id="obs_documento" class='form-control'>
                    </td>
                  </tr>
                </tbody>
              </thead>
            </table>

            <table id='tableLoad Files' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td>
                      <label>Placeholder carga de archivos</label>
                      <input type="text" name="dummy" id="dummy" class='form-control'>
                    </td>
                    <td>
                      <label>Cargar</label>
                    </td>
                  </tr>
                </tbody>
              </thead>
            </table>

            <table id='tableComad' class='table table-striped'>
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
