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
          <div id='dash_status' class='form-group'>
            <table id='tableDashStatus' align='center'>
              <tr>
                <td><a id='btnStatTotal' class='btn btn-default btn-md'>Total ( 0 )</a></td>
                <td><a id='btnStatPend' class='btn btn-warning btn-md'>Pendientes ( 0 )</a></td>
                <td><a id='btnStatNew' class='btn btn-info btn-md'>Nuevos ( 0 )</a></td>
                <td><a id='btnStatSaved' class='btn btn-success btn-md'>Guardados ( 0 )</a></td>
                <td><a id='btnStatClosed' class='btn btn-warning btn-md'>Cerrados ( 0 )</a></td>
                <td><a id='btnStatReturned' class='btn btn-danger btn-md'>Devueltos para mí ( 0 )</a></td>
                <td><a id='btnStatReturned2' class='btn btn-primary btn-md'>Devueltos por mí ( 0 )</a></td>
                <td><a id='btnFinished' class='btn btn-danger btn-md'>Finalizados ( 0 )</a></td>
                <!-- <td><a id='btnStatRecat'>Recategorizados?</a></td> -->
              </tr>
            </table>
            <br/>
          </div>
          <div id='report_action'></div>
          <div id='dash_letters' class='form-group'>
            <br/>
            <legend>Inicio</legend>
            <table id='tableLetters' class='table table-striped'>
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
