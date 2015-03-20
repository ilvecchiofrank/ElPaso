<link href="public/css/certifications/form.css" rel="stylesheet" />
<script type='text/javascript'>
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<section class="main-content">
    <div class="container">
        <div id='controls'>
          <br/>

          <div id='formulario' class='form-group' >
              <legend>Buscar</legend>
              <table id="tableForm" style="width: 85% ">
                <thead></thead>
                  <tbody>
                    <tr>
                      <td style="width: 40%" ><p class="pull-right">Identificador del formulario:</p></td>
                      <td style="width: 10%" ></td>
                      <td style="width: 50%" ><input type="text" class="form-control" id="TxtFormNo" name="TxtFormNo" placeholder="Identificador del Formulario" title="Ingrese el Identificador del Formulario!"></td>
                    </tr>
                    <tr>
                      <td><p class="pull-right">Identificación de la persona:</p></td>
                      <td></td>
                      <td><input type="text" class="form-control" id="TxtPersonIdentity" name="TxtPersonIdentity" placeholder="Número de Identificación" title="Ingrese el Número de Identificación!"></td>
                    </tr>
                    <tr>
                      <td><p class="pull-right">Nombres y/o apellidos:</p></td>
                      <td></td>
                      <td><input type="text" class="form-control" id="TxtPersonName" name="TxtPersonName" placeholder="Nombres" title="Ingrese el Nombre!"></td>
                    </tr>
                  </tbody>
              </table>
              <label id="lblError"></label>
          </div>
          <div class="form-actions clearfix">
            <div class="pull-right">
              <button id="btnSearch" class="btn btn-default">Buscar <span class="fa fa-search"></span></button>
              <button id="btnClear" class="btn btn-warning">Limpiar</button>
            </div>
          </div>
          <br/>

          <div id='results' class='form-group'>
            <br/>
            <legend>Resultados de la búsqueda:</legend>
            <table id='tableResults' class='table table-striped'>
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