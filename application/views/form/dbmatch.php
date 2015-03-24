<link href="public/css/certifications/form.css" rel="stylesheet" />
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

          <div id='emgesa' class'form-group'>
            <legend>Bases de datos Emgesa:</legend>
            <br/>
            <legend>Empleo</legend>
            <br/>
            <table id='tableEmpleo' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <legend>Compensación Residentes</legend>
            <br/>
            <table id='tableCompResidentes' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <legend>Compensación No Residentes</legend>
            <br/>
            <table id='tableCompNoResidentes' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>

          </div>
          <br/>
          <div id='externas' class'form-group'>
            <legend>Bases de datos Externas:</legend>
            <br/>
            <legend>Pescadores</legend>
            <br/>
            <table id='tablePescadores' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableTransportadores' class='table table-striped'>
            <legend>Transportadores</legend>
            <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableElectro' class='table table-striped'>
              <legend id='labelElectro'>ElectroHuila</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableSalvoconducto' class='table table-striped'>
              <legend id="Salvoconductos">Salvoconductos</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableAprovechamientoForestal' class='table table-striped'>
              <legend id="AprovechamientoForestal">Aprovechamiento Forestal</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableBovinaIca' class='table table-striped'>
              <legend id="labelBovinaIca">Bovina ICA</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableMataderoGigante' class='table table-striped'>
              <legend id="labelMataderoGigante">Matadero Gigante</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableExpendedoresCarneGigante' class='table table-striped'>
              <legend id="labelExpendedoresCarneGigante">Expendedores Carne Gigante</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableSisben' class='table table-striped'>
              <legend id="labelSisben">Sisben</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
            <table id='tableFlorh' class='table table-striped'>
              <legend id="labelFlorh">Productores de arroz Florhuila 2009</legend>
              <br/>
              <thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <br/>
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