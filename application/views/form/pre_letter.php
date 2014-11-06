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

          <div id='docuIdentifica' class='form-group'>
              <label for='txtCedula'>Número de Identificación:</label>
              <br/>
              <label class='label label-info' id='txtCedula'></label>
          </div>
          <br/>

          <div id='letters' class='form-group'>
            <br/>
            <legend>Respuestas:</legend>
            <table id='tableLettersResults' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
          </div>

          <div id='no_letters' class='form-group' style='display: none'>
            <br>
            <label>No existen respuestas para el documento solicitado.</label>
            <a id='btnCreate' href="#" class="btn btn-success btn-md">Crear respuesta</a>
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
